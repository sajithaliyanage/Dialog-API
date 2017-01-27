<?php
	$logmsg = file_get_contents('php://input');
	$file = fopen("log2.txt","a+");
	fwrite($file,$logmsg." \n");
	fclose($file);

?>