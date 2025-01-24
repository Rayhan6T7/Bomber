<?php
$phn= $_GET['phone'];

$url = 'https://gpwebms.grameenphone.com/api/v1/flexiplan-purchase/activation';

$data = array(
    "payment_mode" => "mobile_balance",
    "longevity" => 7,
    "voice" => 25,
    "data" => 1536,
    "fourg" => 0,
    "bioscope" => 0,
    "sms" => 0,
    "mca" => 0,
    "msisdn" => $phn,
    "price" => 73.34,
    "bundle_id" => 26571,
    "is_login" => false
);

$payload = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload),
));

$response = curl_exec($ch);

if ($response === FALSE) {
    echo 'Error occurred while sending the request: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
