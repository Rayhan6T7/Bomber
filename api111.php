<?php
$phn = $_REQUEST["phone"];

$url = "http://68.183.88.91/adpoke/cnt/dot/nserve/bd/send/otp?msisdnprefix=880&msisdn=".$phn."&token=1693254641407n62562185n33&l=";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: http://68.183.88.91/",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo "otp send succesfully"

?>


