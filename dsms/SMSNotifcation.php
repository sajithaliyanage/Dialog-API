<?php   
class SMSNotifcation {
   private $applicationId;
   private $password;
   private $charging_amount;
   private $encoding;
   private $version;
   private $deliveryStatusRequest;
   private $binaryHeader;
   private $sourceAddress;
   private $address;
   private $serverURL;

    public function getVersion(){
        return $this->version;
    }
    
    // Get the encoding of the incomming message
    public function getEncoding(){
        return $this->encoding;
    }
    
    // Get the Application of the incomming message
    public function getApplicationId(){
        return $this->applicationId;
    }

    // Get the address of the incomming message
    public function getSourceAddress(){
        return $this->sourceAddress;
    }    

    public function getAddress(){
        return $this->address;
    }

    // Get the Message of the incomming request 
    public function getMessage(){
        return $this->message;
    }

    // Get the unique requestId of the incomming message    
    public function getRequestId(){
        return $this->requestId;
    }
    
    /**
     * Setters
     */    
    public function setApplicationId($applicationId) {
        $this->applicationId = $applicationId;
    }    

    public function setDestinationAddress($address) {
        $this->address = $address;
    }

    public function setSourceAddress($sourceAddress){
        $this->sourceAddress=$sourceAddress;
    }

    public function setCharging_amount($charging_amount){
        $this->charging_amount=$charging_amount;
    }

    public function setEncoding($encoding){
        $this->encoding=$encoding;
    }

    public function setVersion($version){
        $this->version=$version;
    }

    public function setBnaryHeader($binaryHeader){
        $this->binaryHeader=$binaryHeader;
    }

    public function setDeliveryStatusRequest($deliveryStatusRequest){
        $this->deliveryStatusRequest=$deliveryStatusRequest;
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