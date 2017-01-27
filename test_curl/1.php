<?php

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://drawningbunny.azurewebsites.net/test_curl/2.php',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'postvar1' => 'value',
        'postvar2' => 'value2'
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
?>