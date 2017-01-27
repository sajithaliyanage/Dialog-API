<?php

define('SERVER_URL', 'https://drawningbunny.azurewebsites.net/sms/sms.php');	
define('APP_ID', 'APP_033050');
define('APP_PASSWORD', '2749bbeadec3a2907eff38dd8e389bcc');

try{

	// Creating a receiver and intialze it with the incomming data
	$jsonData = json_decode(file_get_contents('php://input'), true);
	$message = $jsonData['message'];
	$address = $jsonData['sourceAddress'];
	//$address = substr($jsonData['sourceAddress'],4);
	
	//send SMS to applier
	$array = array("applicationId"=> APP_ID,
			  "password"=> APP_PASSWORD,
			  "version"=> "1.0",
			  "action"=> "1",
			  "subscriberId"=> $address
	);
	$val = json_encode($array);
	$file = fopen("log2.txt","a+");
	fwrite($file,$val." \n");
	fclose($file);
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.dialog.lk/subscription/send',
    //CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode(array("applicationId"=> APP_ID,
			  "password"=> APP_PASSWORD,
			  "version"=> "1.0",
			  "action"=> "1",
			  "subscriberId"=> $address
	))
	));
	// Send the request & save response to $resp
	curl_exec($curl);


	// Close request to clear up some resources
	curl_close($curl);

}catch(Exception $e){
	$file = fopen("log2.txt","a+");
	fwrite($file,$e." \n");
	fclose($file);
}

?>