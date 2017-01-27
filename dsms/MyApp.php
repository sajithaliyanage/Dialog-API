<?php
require_once 'SubscriptionReceiver.php';

try {
	$sr = new SubscriptionReceiver();		
	echo $sr->getMessage()->getApplicationId();
}
catch(Exception $e ) {
	echo $e->getErrorCode().' '.$e->getErrorMessage();
}
?>
