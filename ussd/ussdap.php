<?php

ini_set('error_log', 'ussd-app-error.log');

require 'libs/MoUssdReceiver.php';
require 'libs/MtUssdSender.php';
require 'class/operationsClass.php';
require 'libs/Log.php';
require 'db.php';
require 'connect.php';


$production=false;

	if($production==false){
		$ussdserverurl ='http://localhost:7000/ussd/send';
	}
	else{
		$ussdserverurl= 'https://api.dialog.lk/ussd/send';
	}


$receiver 	= new UssdReceiver();
$sender 	= new UssdSender($ussdserverurl,'APP_033050','2749bbeadec3a2907eff38dd8e389bcc');
$operations = new Operations();

$receiverSessionId = $receiver->getSessionId();
$content 			= 	$receiver->getMessage(); // get the message content
$address 			= 	$receiver->getAddress(); // get the sender's address
$requestId 			= 	$receiver->getRequestID(); // get the request ID
$applicationId 		= 	$receiver->getApplicationId(); // get application ID
$encoding 			=	$receiver->getEncoding(); // get the encoding value
$version 			= 	$receiver->getVersion(); // get the version
$sessionId 			= 	$receiver->getSessionId(); // get the session ID;
$ussdOperation 		= 	$receiver->getUssdOperation(); // get the ussd operation


$responseMsg = array(
    "main" =>  
    "Purchase Mode
1. 250 coins - Rs.1
2. 750 coins - Rs.3
3. 2500 coins - Rs.5
4. 6250 coins - Rs.10
5. 20000 coins - Rs.30

99. Exit"
);


if ($ussdOperation  == "mo-init") { 
   
	try {
		
		$sessionArrary=array( "sessionid"=>$sessionId,"tel"=>$address,"menu"=>"main","pg"=>"","others"=>"");

  		$operations->setSessions($sessionArrary);

		$sender->ussd($sessionId, $responseMsg["main"],$address );

	} catch (Exception $e) {
			$sender->ussd($sessionId, 'Sorry error occured try again',$address );
	}
	
}else {

	$flag=0;

  	$sessiondetails=  $operations->getSession($sessionId);
  	$cuch_menu=$sessiondetails['menu'];
  	$operations->session_id=$sessiondetails['sessionsid'];
	
	$sql = "Select user_id from user where phone='$address'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$userID = $row['user_id'];

		switch($cuch_menu ){
		
			case "main": 	// Following is the main menu
					switch ($receiver->getMessage()) {
						case "1":
							$operations->session_menu="small";
							$operations->saveSesssion();
							//$sender->ussd($sessionId,'Enter Your Purchase',$address );					
							break;
						case "2":
							$operations->session_menu="medium";
							$operations->saveSesssion();
							//$sender->ussd($sessionId,'Enter Your Purchase',$address );							
							break;
						case "3":
							$operations->session_menu="large";
							$operations->saveSesssion();
							//$sender->ussd($sessionId,'Enter Your Purchase',$address );
							break;
						case "4":
							$operations->session_menu="large1";
							$operations->saveSesssion();
							//$sender->ussd($sessionId,'Enter Your Purchase',$address );						
							break;
						case "5":
							$operations->session_menu="large2";
							$operations->saveSesssion();
							$sender->ussd($sessionId,'Enter Your Purchase',$address );							
							break;
						default:
							$operations->session_menu="main";
							$operations->saveSesssion();
							$sender->ussd($sessionId, $responseMsg["main"],$address );
							break;
					}
					break;
			case "small":
				$sender->ussd($sessionId,'You Purchased 250 coins. Thank you! TOKEN ID - QWER'.$userID,$address ,'mt-fin');
				$sql = "UPDATE user SET coin=coin+250 WHERE phone='$address'";
				mysqli_query($conn, $sql);
				break;
			case "medium":
				$sender->ussd($sessionId,'You Purchased 750 coins. Thank you! \n TOKEN ID - QWER'.$userID,$address ,'mt-fin');
				$sql = "UPDATE user SET coin=coin+750 WHERE phone='$address'";
				mysqli_query($conn, $sql);
				break;
			case "large":
				$sender->ussd($sessionId,'You Purchased 2500 coins. Thank you! \n TOKEN ID - QWER'.$userID,$address ,'mt-fin');
				$sql = "UPDATE user SET coin=coin+2500 WHERE phone='$address'";
				mysqli_query($conn, $sql);
				break;
			case "large1":
				$sender->ussd($sessionId,'You Purchased 6250 coins. Thank you! \n TOKEN ID - QWER'.$userID,$address ,'mt-fin');
				$sql = "UPDATE user SET coin=coin+6250 WHERE phone='$address'";
				mysqli_query($conn, $sql);
				break;
			case "large2":
				$sender->ussd($sessionId,'You Purchased 20000 coins. Thank you! \n TOKEN ID - QWER'.$userID,$address ,'mt-fin');
				$sql = "UPDATE user SET coin=coin+20000 WHERE phone='$address'";
				mysqli_query($conn, $sql);
				break;
			default:
				$operations->session_menu="main";
				$operations->saveSesssion();
				$sender->ussd($sessionId,'Incorrect option',$address );
				break;
		}
	
}