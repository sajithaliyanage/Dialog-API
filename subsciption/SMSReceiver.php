<?php



require_once 'Receiver.php';
require_once 'SubscriptionNotification.php';
require_once 'Response.php';
require_once 'Sender.php';


class SubscriptionReceiver extends Receiver {
	private $smsnot;
	
	/**
	*	Handle subscription/unsubscription requests
	**/
	public function handleRequest(array $data) {
		$this->smsnot = new SubscriptionNotification();		
					
		if(isset($data['applicationId'])) {
			$this->smsnot->setApplicationId($data['applicationId']);
		}
		
		$this->getLogger()->LogInfo("Request Received: -> ".$this->smsnot->toString());
		
		$resp = new Response("S1000","Success");
		echo $resp->toJson(); 
	}
	
	/**
	 * 
	 */
	public function getMessage() {
		return $this->smsnot;
	}
}

?>