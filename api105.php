<?php
$phn1 = $_GET["phone"];
$phn = ltrim($phn1, '0');  // Remove leading zeros from the phone number

// Payload data
$data = array(
    "username" => "a" . $phn,
    "firstname" => "Korim Mia",
    "new_password" => "boss2023",
    "confirm_new_password" => "boss2023",
    "country" => "BD",
    "country_code" => "880",
    "currency" => "BDT",
    "mobileno" => $phn, // Leading zeros removed from the mobile number
    "ref" => "",
    "language" => "bn",
    "langCountry" => "bn-bd"
);

// User-agent
$userAgent = "Monibot";

// API endpoint
$url = "https://www.8mbets.net/api/register/confirm";

// Set up cURL options
$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data),
    CURLOPT_HTTPHEADER => array(
        "User-Agent: $userAgent"
    ),
    CURLOPT_RETURNTRANSFER => true
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, $options);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo "Error: " . curl_error($curl);
} else {
    // Output the response
    echo $response;
}

// Close cURL session
curl_close($curl);
?>
