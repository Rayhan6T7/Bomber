<?php
$phn=$_GET['phone'];
$url = "https://api.kormi24.com/graphql";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/4544 Firefox/109.0",
    "Referer: https://kormi24.com/",
    "Content-Type: application/json",
    "Authorization: tok",
    "Origin: https://kormi24.com",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array(
    "operationName" => "sendOTP",
    "variables" => array(
        "type" => 1,
        "mobile" => $phn,
        "additional" => '{"user_agent":"web","mobile":"$phn"}'
    ),
    "query" => "mutation sendOTP(\$mobile: String!, \$type: Int!, \$additional: String) {
        sendOTP(mobile: \$mobile, type: \$type, additional: \$additional) {
            status
            message
            __typename
        }
    }"
);

// Convert the array to JSON
$jsonData = json_encode($data);

curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>
