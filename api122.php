<?php
$phn1=$_GET['phone'];
$phn = ltrim($phn1, '0');  //to remove 0 from 11 digit number
$url = "https://bj88.live/playerFE/V1/sendVerificationCode?v=0.8317709276227074";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
    "Content-Type: application/x-www-form-urlencoded",
    "X-Requested-With: XMLHttpRequest",
    "Origin: https://bj88.live",
    "Alt-Used: bj88.live",
    "Connection: keep-alive",
    "Referer: https://bj88.live/",
    "Cookie: JSESSIONID=32163E0DE059EE9DB434BD2D961B671C; affDomainCookie=bjbaji.com; route=inhouseweb06; __cflb=02DiuFAUHsfdzMgdGYnAgcdLW1N3Rrf8NhErjHHwVZKEC; cf_clearance=2HD8PC_.lmFy52pBy20vYe3sOSza2pFs2w_sfVw5aMg-1705938426-1-AY3Iaz+4APs0K7jxO9a7ElLT4R6nWqX9qKfComc0SuJ0NyCF5WGYfdZxZv/qjsMwJhYi/b5Tj3fSVZbYOlNcVu8=; language=en; intercom-id-rcx236c7=ff52af25-5745-4873-a667-6b2a99a1087c; intercom-session-rcx236c7=Wkg2Qm90UXU0Z01aSkJHUlRULzFSbTAwNVRlT2xWaUhpSysxZXhwK3ljNGVvSk9vTk9ybFV0ZDdtck45K2NtMC0tdkcrVXZxZ1puUGNvdEpqWHZXdkNlUT09--12ba305dbeae6f7bf80cc8109dfc57e858c60a65; intercom-device-id-rcx236c7=9bc91077-3647-47f5-945f-a0f3a6678e1e",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array(
    'receiver' => $phn,
    'callingCode' => '880',
    'type' => '2',
    'domain' => 'bj88.live',
);

curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>
