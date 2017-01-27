<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost/img/2.php");
curl_setopt($ch, CURLOPT_POST, 2);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "postvar1=1&postvar2=2");


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
if ($server_output == "OK") { echo "Ok"; } else { echo "Fail"; }

?>