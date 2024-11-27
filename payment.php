<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Payment Integration</title>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AbJy7CM_ITn2Shi9LZWc0MP4bEaGQwfXL9gPz6p5k64OxlLmLmef9wigwfewXGSeM2NvSh1PwMwmZMDs&currency=USD"></script>
    <!-- Replace ****** with your PayPal Client ID -->
    <style>
        :root {
            --primary-color: #007BFF;
            /* Matches the blue palette you are using */
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --font-family: 'Arial', sans-serif;
        }

        body {
            margin: 0;
            font-family: var(--font-family);
            background-color: var(--secondary-color);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .order-summary {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .order-summary .item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .order-summary .item:last-child {
            border-bottom: none;
        }

        .order-summary .total {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        #paypal-button-container {
            margin-top: 20px;
            padding: 20px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Complete Your Payment</h1>
    <div class="order-summary">
        <div class="item">
            <span>Items Cost</span>
            <span>$75.00</span>
        </div>
        <div class="item">
            <span>Shipping Cost</span>
            <span>$5.00</span>
        </div>
        <div class="item total">
            <span>Total</span>
            <span>$80.00</span>
        </div>
    </div>
    <div id="paypal-button-container"></div>

    <div class="footer">
        Need help? <a href="contact.html">Contact Support</a>
    </div>

    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                // Set up the transaction
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '80.00' // Replace with the total amount
                        },
                        description: "Order #12345" // Optional: Add order description
                    }]
                });
            },
            onApprove: function (data, actions) {
                // Capture the funds
                return actions.order.capture().then(function (details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);

                    // Send transaction details to the server
                    fetch('process_paypal_payment.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Payment verified and processed successfully.');
                            } else {
                                alert('Payment verification failed: ' + data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            },
            onError: function (err) {
                console.error('PayPal Button Error:', err);
                alert('An error occurred while processing the payment.');
            }
        }).render('#paypal-button-container'); // Render PayPal button
    </script>
</body>

</html>