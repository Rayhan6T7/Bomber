<?php
$phn=$_GET['phone'];
$url = "https://ekyc.globalislamibankbd.com/cihno-service/api/v1/public/user/send/otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array(
    "countryId" => "19",
    "mobileNumber" => $phn,
    "purpose" => "registration",
);

// Convert array to JSON string
$jsonData = json_encode($data);

curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>
