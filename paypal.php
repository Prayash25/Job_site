<?php
require 'vendor/autoload.php'; // Include the PayPal SDK

// Set up PayPal API credentials
$clientId = 'sb-fp4dr26168750_api1.business.example.com';
$clientSecret = 'A2D4DKJFlDsBtCK3KOnr2fCSH4sUAe9LpV4CgtsIE3xPuYtj1Y8j9i10';

// Create a new PayPal environment
$environment = new \vendor\PayPal\Core\SandboxEnvironment($clientId, $clientSecret);
$client = new \PayPal\PayPalHttpClient($environment);

// Create a new PayPal order
$request = new \PayPalCheckoutSdk\Orders\OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
    'intent' => 'CAPTURE',
    'purchase_units' => [
        [
            'amount' => [
                'currency_code' => 'USD',
                'value' => '10.00'
            ]
        ]
    ]
];

try {
    // Send the request to PayPal's API
    $response = $client->execute($request);

    // Retrieve the order ID
    $orderId = $response->result->id;

    // Redirect the user to the PayPal payment page
    header('Location: ' . $response->result->links[1]->href);
} catch (HttpException $ex) {
    // Handle any errors
    echo $ex->statusCode;
    echo $ex->getMessage();
}
?>
