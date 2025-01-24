<?php
$phn = $_REQUEST["phone"];
$url = "https://user-api.jslglobal.co:444/v1/send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0)",
   "Origin: https://rental.jatri.co",
   "Referer: https://rental.jatri.co/",
  
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"phone"=> "+88".$phn,
"jatri_token"=>"J9vuqzxHyaWa3VaT66NsvmQdmUmwwrHj"
);

$data = http_build_query($ps);


curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

