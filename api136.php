<?php
$phn = $_REQUEST["phone"];
$url = "https://cihno.aibl.com.bd/cihno-service/api/v1/public/user/send/otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "authorization: Otp bnVsbA==",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
"countryId"=>"19","mobileNumber"=>$phn,"purpose"=>"registration"
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

