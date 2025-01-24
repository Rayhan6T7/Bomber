 <?php
$phn=$_GET['phone'];


$url = "https://da-api.robi.com.bd/da-nll/otp/send";
$data = array(
    "msisdn" => $phn
);

$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($data),
    CURLOPT_HTTPHEADER     => array(
        'Content-Type: application/json',
    ),
    CURLOPT_RETURNTRANSFER => true,
);

$curl = curl_init();
curl_setopt_array($curl, $options);
$response = curl_exec($curl);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curl);
}

curl_close($curl);

// Handle the response as needed
echo($response);
?>
