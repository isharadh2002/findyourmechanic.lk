<?php

// Replace these with your PayPal credentials
$clientID = "AbJy7CM_ITn2Shi9LZWc0MP4bEaGQwfXL9gPz6p5k64OxlLmLmef9wigwfewXGSeM2NvSh1PwMwmZMDs";
$secret = "ENgeUoxkgK_UGmHHUNS1ZDgrWwT26k6Rjw6ALh-vD9XppfIQzRrYp9Q5gQS5QbbmAt6huF9hPoIzYCD9";

// Get the order ID from the client
$input = json_decode(file_get_contents('php://input'), true);
$orderID = $input['orderID'];

if (!$orderID) {
    echo json_encode(['success' => false, 'message' => 'Missing order ID.']);
    exit;
}

// Set up the PayPal API endpoint for sandbox or live
$apiUrl = "https://api-m.sandbox.paypal.com/v2/checkout/orders/$orderID"; // Use live endpoint for production

// Set up cURL to communicate with PayPal API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode("$clientID:$secret")
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['success' => false, 'message' => 'Curl error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Decode PayPal's response
$orderDetails = json_decode($response, true);

// Check the status of the order
if (isset($orderDetails['status']) && $orderDetails['status'] === 'COMPLETED') {
    // Payment is successful, process the order
    echo json_encode(['success' => true, 'message' => 'Payment verified successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Payment verification failed.']);
}

?>
