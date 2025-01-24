<?php
$phn = $_REQUEST["phone"];
$url = "https://appbackend-api.prod.svc.dh.health/api/v1/auth/send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent:okhttp/5.0.0-alpha.2",
   "x-app-name: allnet",
   "org-code: TOS",
   "operator: NON_GP",
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"msisdn"=>"88" .$phn
);

$data = http_build_query($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
printf($resp);

?>

