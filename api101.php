<?php
$phn = $_REQUEST["phone"];


$url = "https://coreapi.shadhinmusic.com/api/v5/otp/otpreq";

$data = array(
    "msisdn" => "88".$phn,
    "user" => "sh@dHinOTP",
    "servicename" => "Shadhin Music",
    "action" => "Registration"
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
    ),
    CURLOPT_RETURNTRANSFER => true,
);

$curl = curl_init();
curl_setopt_array($curl, $options);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($httpCode == 200) {
    // Request successful, handle the response
    $responseData = json_decode($response, true);
    print_r($responseData);
} else {
    // Request failed
    echo "Error: " . $httpCode;
}
?>
