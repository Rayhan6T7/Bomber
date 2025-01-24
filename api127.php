<?php
$phn=$_GET["phone"];
$url = 'https://userapp.steadfast.com.bd/api/send-otp/1';
$data = array(
    'b_name' => '',
    'name' => 'Korim Mia',
    'email' => 'korimmia@gmail.com',
    'mobile' => $phn,
    'password' => 'Boss2024'
);

$payload = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'User-Agent: okhttp/4.9.2'
));

$result = curl_exec($ch);

curl_close($ch);

echo $result;
?>
