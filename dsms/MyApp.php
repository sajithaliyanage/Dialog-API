<?php
require_once 'SubscriptionReceiver.php';

try {
	$sr = new SubscriptionReceiver();		
	$logmsg = $sr->getMessage()->getApplicationId();
	$file = fopen("log2.txt","a+");
	fwrite($file,$logmsg." \n");
	fclose($file);
}
catch(Exception $e ) {
	echo $e->getErrorCode().' '.$e->getErrorMessage();
}
?>
