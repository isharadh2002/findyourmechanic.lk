<?php

require 'autoload.php'; // Stripe SDK

\Stripe\Stripe::setApiKey('your-secret-key-here'); // Replace with your Stripe secret key

// Read the request payload.
$input = json_decode(file_get_contents("php://input"), true);
$paymentMethodId = $input['payment_method_id'];
$amount = $input['amount'];
$currency = $input['currency'];

try {
    // Create a PaymentIntent with the payment method.
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $amount, // Amount in cents
        'currency' => $currency,
        'payment_method' => $paymentMethodId,
        'confirmation_method' => 'manual',
        'confirm' => true,
    ]);

    if ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
        // Card action required (e.g., 3D Secure)
        echo json_encode([
            'requires_action' => true,
            'payment_intent_client_secret' => $paymentIntent->client_secret
        ]);
    } else if ($paymentIntent->status == 'succeeded') {
        // Payment was successful
        echo json_encode(['success' => true]);
    } else {
        // Other status
        echo json_encode(['error' => 'Invalid PaymentIntent status']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment with Stripe</title>
    <style>
        /* CSS from previous example */
    </style>
    <script src="https://js.stripe.com/v3/"></script> <!-- Stripe JS Library -->
</head>
<body>
    <div class="payment-container">
        <div class="header">Enter Card Details</div>
        <form id="paymentForm">
            <!-- Cardholder's name and email (non-sensitive) -->
            <div class="input-field">
                <label for="cardholder-name">Cardholder's Name</label>
                <input type="text" id="cardholder-name" placeholder="Cardholder’s Name" required>
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" required>
            </div>

            <!-- Stripe Elements Card Element -->
            <div id="card-element" class="input-field">
                <!-- A Stripe Element will be inserted here. -->
            </div>
            
            <div class="order-summary">
                <div class="item">
                    <span>Items Cost</span>
                    <span>Rs. 7,500.00</span>
                </div>
                <div class="item">
                    <span>Shipping Cost</span>
                    <span>Rs. 500.00</span>
                </div>
                <div class="item total">
                    <span>Total</span>
                    <span>Rs. 8,000.00</span>
                </div>
            </div>

            <button type="submit" class="pay-now">Pay Now</button>
        </form>
    </div>

    <script>
        const stripe = Stripe('your-publishable-key-here'); // Replace with your Stripe publishable key
        const elements = stripe.elements();

        // Create an instance of the card Element.
        const card = elements.create('card');
        card.mount('#card-element');

        // Handle form submission.
        const form = document.getElementById('paymentForm');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const cardholderName = document.getElementById('cardholder-name').value;
            const email = document.getElementById('email').value;

            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: cardholderName,
                    email: email,
                },
            });

            if (error) {
                // Display error.message in the UI.
                alert(error.message);
            } else {
                // Send the paymentMethod.id to your server.
                fetch('/process_payment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        payment_method_id: paymentMethod.id,
                        amount: 8000, // The amount in cents
                        currency: 'inr'
                    }),
                }).then((response) => {
                    if (response.ok) {
                        alert("Payment successful!");
                    } else {
                        alert("Payment failed. Please try again.");
                    }
                });
            }
        });
    </script>
</body>
</html>
