<?php
require_once 'lib/KLogger.php';

//All receiver classes should implement this abstract class
abstract class Receiver {
	private $log;
	
    public function __construct() {
    	$this->log = new KLogger ("log.txt", KLogger::DEBUG );		
        $jsonData = json_decode(file_get_contents('php://input'), true);
		$this->log->LogDebug("Received Data:".$jsonData);
		$this->handleRequest($jsonData);		
    }

	/**
	*	Return a instance of KLogger
	**/
	public function getLogger() {
		return $this->log;
	}
	
	/**
	 * gets the received message
	 */
	public abstract function getMessage();
	
	/**
	* 	This method is responsible for decoding the incoming data. It's recommended that this method return an 
	*	object of type ResponseObject
	**/
    public abstract function handleRequest(array $data);
}
?>