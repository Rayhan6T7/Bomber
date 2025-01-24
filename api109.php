<?php

$phn = $_REQUEST["phone"];


$url = "https://circle.robi.com.bd/mylife/gateway/register_fcm.php?regId&msisdn=88". $phn;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

if (curl_exec($curl) == 200) {
     echo 'Circel OTP Sent Done';
} else {
     echo 'sms sent faild';
 }




?>

