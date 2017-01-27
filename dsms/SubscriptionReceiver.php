<?php
require_once 'Receiver.php';
require_once 'SubscriptionNotification.php';
require_once 'Response.php';
require_once 'Sender.php';

class SubscriptionReceiver extends Receiver {
	private $subNotification;
	
	/**
	*	Handle subscription/unsubscription requests
	**/
	public function handleRequest(array $data) {
		$this->subNotification = new SubscriptionNotification();		
					
		if(isset($data['applicationId'])) {
			$this->subNotification->setApplicationId($data['applicationId']);
			$this->subNotification->setFrequency($data['frequency']);
			$this->subNotification->setStatus($data['status']);
			$this->subNotification->setSubscriberId($data['subscriberId']);
			$this->subNotification->setVersion($data['version']);
			$this->subNotification->setTimeStamp($data['timeStamp']);			
		}
		
		$this->getLogger()->LogInfo("Request Received: -> ".$this->subNotification->toString());
		
		$resp = new Response("S1000","Success");
		echo $resp->toJson(); 
	}
	
	/**
	 * 
	 */
	public function getMessage() {
		return $this->subNotification;
	}
}
?>