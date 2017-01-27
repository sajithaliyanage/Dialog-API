<?php

class Response {
	private $statusCode;
	private $statusDetails;
	
	/**
	 * 
	 */
	public function __construct($statusCode, $statusDetails) {
		$this->statusCodec = $statusCode;
		$this->statusDetail = $statusDetails;
	}
	
	public function toJson() {
		return json_encode($this);
	}
}
?>
