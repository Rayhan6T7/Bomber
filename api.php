<?php
$phn = $_REQUEST["phone"];
$url = "https://app.eonbazar.com/api/auth/login";

// ডাটা প্রস্তুত করুন
$data = array(
    "method" => "otp",
    "mobile" => $phn
);

// cURL ইনিশিয়ালাইজ
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

$headers = array(
    "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// cURL চালিয়ে রেসপন্স নিন
$response = curl_exec($curl);
curl_close($curl);

echo($response);
?>