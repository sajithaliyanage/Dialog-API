<?php
	$logmsg = $_POST['postvar1'].$_POST['postvar2'];
	$file = fopen("log2.txt","a+");
	fwrite($file,$logmsg." \n");
	fclose($file);

?>