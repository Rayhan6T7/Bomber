<?php
$phn = $_REQUEST["phone"];
$url = "https://api3.bioscopelive.com/auth/api/v2/login/send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Content-Type: application/json",
   "Access-code: QkQ%3D",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI0YTdhNTNmNC1lOTY5LTQxMTAtODU2MS1jN2MxNWJjMmJjNzMiLCJpc3MiOiJIRUlNREFMTCIsInJvbGVzIjpbIlJPTEVfVVNFUiIsIlJPTEVfVVNFUl9BTk9OWU1PVVMiXSwidXNlcm5hbWUiOiJhbm9ueW1vdXMiLCJjbGllbnRfbG9naW5faWQiOjc3NDk4NTkxMjcwLCJjbGllbnRfaWQiOm51bGwsInBsYXRmb3JtX2lkIjoiYzNjOThkMWItYzU4MS00NTJkLWEzODUtOTQxY2E2OTQwMWU5IiwiYm9uZ29faWQiOiI0YTdhNTNmNC1lOTY5LTQxMTAtODU2MS1jN2MxNWJjMmJjNzMiLCJ1c2VyX3R5cGUiOiJhbm9ueW1vdXMiLCJpYXQiOjE2OTI3ODY5NTYsImV4cCI6MTcwMDU2Mjk2Ni4wLCJjb3VudHJ5Q29k…G8Ee1qmq1G9YZ3jVc4CyxCKr0rET6ZVt4fefy-McQdwWUSQvYsyGHc1qfKGGzTbmW8wFTQSiIovBBL4QBdMAFmt1ucbwIFQyk6F9MKrZKkve_TRkiKVH7xZLltbJYDliTWmJttOTjW4As8lzDCsW4XP9WjsxWCe0XXN2pN-vPpLyqmB-_meqQ49ebPsHZ0IhLOl7Wy8J84T8nFTPUmXXG9qveivxcZr-TYImiCXtge6WQYkKx7vjdj3NSzEnrf38E_SOGfTU_w8lJMNhsI7W50AihviHyZZmydsEbWiVLcdlXPnPYveByPQcG4cLEw65mNAwEDGgjl0OUsw3gGFnsnuB50w2sTqOyYLFlGFPfLdIP2lIS8xywibjuA8SL4KjlTblqq86LuF-3xbj_28yoanP8plBhkFMK1_wJxRvuc88lZBgaA5oP4jrgDSSFflZT2BxzZmxoKozF8xG0sbNVjJxqNcNvGj_snbOixsSQSLQJSCZPpaWx2t20riVUec",
   "platform-id: c3c98d1b-c581-452d-a385-941ca69401e9",
   "Country-Code: QkQ%3D",
   "client-id: c3c98d1b-c581-452d-a385-941ca69401e9",
   "Origin: https://gp.bioscopelive.com",
   "Connection: keep-alive",
   "Referer: https://gp.bioscopelive.com/",
   
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//{"operator":"all","msisdn":"880163981341","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJleHAiOjE3MDk0NDQ3NjguMH0.IRbaa6KJvJON5UyH92HK7zkXFeJWugmpCUJ_iwJibyulYOyFkJkwLMIycbHJSUGdEo9GKobOW31oC7F5KOflsQ","token_type":"CUSTOM_TOKEN_V1"}

$ps = array(
"operator"=>"all","msisdn"=>"88".$phn,"token"=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJleHAiOjE3NDAzNzgwMzAuMH0.uqjbUG9iSJj6bWp2Kvfj7xbkhKupy8bCrEBtj6kfbdsq04LXryL8f0xyr9xbQBqh4susgCd76_LPLrThNfRRAQ","token_type"=>"CUSTOM_TOKEN_V1"
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

