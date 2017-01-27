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
	$file = fopen("log2.txt","a+");
	fwrite($file,($e->getErrorMessage())." \n");
	fclose($file);
	echo $e->getErrorCode().' '.$e->getErrorMessage();
}
?>
