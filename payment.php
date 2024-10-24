<?php
require_once("shared/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $amount = htmlspecialchars($_POST['amount']);
    $cardNumber = htmlspecialchars($_POST['cardNumber']);
    $expiryDate = htmlspecialchars($_POST['expiryDate']);
    $cvv = htmlspecialchars($_POST['cvv']);

    
    echo "<h1>Payment Successful!</h1>";
    echo "<p>Thank you, $name! Your payment of $$amount has been processed.</p>";
    echo "<p>Card Number: **** **** **** " . substr($cardNumber, -4) . "</p>";
} else {
    echo "<h1>Error!</h1>";
    echo "<p>Invalid request method.</p>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#B7E0FF;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background:#f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color:#4379F2 ;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #4379F2;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4379F2;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #5A9BFF;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><u>Payment Service</u></h1>
        <form id="paymentForm" action="process_payment.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="amount">Amount (LKR):</label>
                <input type="number" id="amount" name="amount" required min="1" />
            </div>
            <div class="form-group">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" required  />
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date (MM/YY):</label>
                <input type="text" id="expiryDate" name="expiryDate" required placeholder="MM/YY" />
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required />
            </div>
            <button type="submit">Pay Now</button>
        </form>
        <div id="errorMessages" class="error"></div>
    </div>
    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const amount = document.getElementById('amount').value.trim();
            const cardNumber = document.getElementById('cardNumber').value.trim();
            const expiryDate = document.getElementById('expiryDate').value.trim();
            const cvv = document.getElementById('cvv').value.trim();
            const errorMessages = document.getElementById('errorMessages');
            errorMessages.innerHTML = '';

            // Validate input fields
            if (name === '') {
                errorMessages.innerHTML += 'Name is required.<br>';
                event.preventDefault();
            }
            if (email === '') {
                errorMessages.innerHTML += 'Email is required.<br>';
                event.preventDefault();
            }
            if (amount <= 0) {
                errorMessages.innerHTML += 'Amount must be greater than 0.<br>';
                event.preventDefault();
            }
            if (cardNumber.length !== 16 || isNaN(cardNumber)) {
                errorMessages.innerHTML += 'Card Number must be 16 digits.<br>';
                event.preventDefault();
            }
            if (!/^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(expiryDate)) {
                errorMessages.innerHTML += 'Expiry Date must be in MM/YY format.<br>';
                event.preventDefault();
            }
            if (cvv.length !== 3 || isNaN(cvv)) {
                errorMessages.innerHTML += 'CVV must be 3 digits.<br>';
                event.preventDefault();
            }
        });
    </script>
</body>

</html>