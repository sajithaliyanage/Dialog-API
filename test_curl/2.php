<?php
	$logmsg = array("POST1"=>$_POST['postvar1'],"POST2"=>$_POST['postvar2']);
	$file = fopen("log2.txt","a+");
	fwrite($file,json_decode($logmsg)." \n");
	fclose($file);

?>