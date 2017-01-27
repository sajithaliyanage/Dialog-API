<?php

//extract data from the post
//set POST variables
$url = 'https://drawningbunny.azurewebsites.net/test_curl/2.php';
$fields = array(
	'postvar1' => 1,
	'postvar2' => 2
	
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);
echo $result."@@@@";
//close connection
curl_close($ch);
?>