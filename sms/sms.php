<?php

define('SERVER_URL', 'https://drawningbunny.azurewebsites.net/sms/sms.php');	
define('APP_ID', 'APP_033050');
define('APP_PASSWORD', '2749bbeadec3a2907eff38dd8e389bcc');

try{

	// Creating a receiver and intialze it with the incomming data
	$jsonData = json_decode(file_get_contents('php://input'), true);
	$message = $jsonData['message'];
	$address = $jsonData['address'];
	
	//send SMS to applier
	$array = array("message"=>"Ado goda","destinationAddresses"=>["$address"],"password"=>APP_PASSWORD,"applicationId"=>APP_ID);


}catch(Exception $e){
	
}

?>