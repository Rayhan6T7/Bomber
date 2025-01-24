<?php
header("Content-Type: application/json");
$phone = $_GET['phone'] ?? '';

if (empty($phone)) {
    $err = [
        "status" => false,
        "message" => "Parameter not found!"
    ];
    die(json_encode($err, JSON_PRETTY_PRINT));
    return;
}

$restricted_numbers = [
    '97',
    '1',
    '01616'
];

if (in_array($phone, $restricted_numbers)) {
    die(json_encode(['status' => false, 'message' => 'Sorry, this number is restricted!'], JSON_PRETTY_PRINT));
    return;
}

$base_url = "http://localhost:8080/Assest/api";
$multiCurl = [];
$mh = curl_multi_init();

// Prepare cURL requests for each API
for ($i = 1; $i <= 986; $i++) {
    $url = "{$base_url}{$i}.php?phone=$phone";
    $multiCurl[$i] = curl_init();

    curl_setopt($multiCurl[$i], CURLOPT_URL, $url);
    curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER, true);
    curl_setopt($multiCurl[$i], CURLOPT_TIMEOUT, 1); // Set timeout to avoid long waits
    curl_setopt($multiCurl[$i], CURLOPT_FRESH_CONNECT, true); // Avoid reusing connections

    // Add the individual cURL handle to the multi handle
    curl_multi_add_handle($mh, $multiCurl[$i]);
}

// Execute all requests concurrently
$active = null;
do {
    $status = curl_multi_exec($mh, $active);
    curl_multi_select($mh); // Wait for activity on any curl connection
} while ($active && $status == CURLM_OK);

// Close all cURL handles
foreach ($multiCurl as $ch) {
    curl_multi_remove_handle($mh, $ch);
    curl_close($ch);
}

// Close the multi handle
curl_multi_close($mh);

echo json_encode(['status' => true, 'message' => 'The request is being processed'], JSON_PRETTY_PRINT);

?>
