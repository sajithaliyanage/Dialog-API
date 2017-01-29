<?php	
class SubscriptionNotification {
	
	private $applicationId;
	private $frequency;
	private $status;
	private $subscriberId;
	private $version;
	private $timeStamp;
    /*SMS Receiveres*/
    private $sourceAddress; 
    private $requestId;         
    private $encoding;  

	public function getApplicationId() {
    	return $this->applicationId;
    }
    
    public function getFrequency() {
    	return $this->frequency;
    }
    
    public function getStatus() {
    	return $this->status;
    }
    
    public function getSubscriberId() {
    	return $this->subscriberId;
    }
    
    public function getVersion() {
    	return $this->version;
    }
    
    public function getTimeStamp() {
        return $this->timeStamp;
    }       
    
    /*-----------*/
    public function getsourceAddress() {
    	return $this->sourceAddress;
    }	
    
    /**
     * Setters
     */    
    public function setApplicationId($applicationId) {
    	$this->applicationId = $applicationId;
    }
    
    public function setFrequency($frequency) {
    	$this->frequency = $frequency;
    }
    
    public function setStatus($status) {
    	$this->status = $status;
    }
    
    public function setSubscriberId($subscriberId) {
    	$this->subscriberId = $subscriberId;
    }
    
    public function setVersion($version) {
    	$this->version = $version;
    }
    
    public function setTimeStamp($timeStamp) {
    	$this->timeStamp = $timeStamp;
    }
    
    /**
     * Return the values of all the parameters
     */
    public function toString() {
    	/*$vars = get_object_vars($this);
    	$str = "";
    	foreach ($vars as $name => $value) {
   	 		$str = $str.$name.":".$value.",";
		}
		return $str;*/
		return json_encode($this);
    }       
}?>