<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }
        .payment-container h1 {
            background-color: #4093ff;
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .payment-container form {
            padding: 20px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: calc(100% - 10px);
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .card-icons {
            margin: 10px 0;
        }
        .card-icons img {
            width: 40px;
            margin-right: 10px;
        }
        .expiration-cvv {
            display: flex;
            justify-content: space-between;
        }
        .expiration-cvv .form-group {
            width: 48%;
        }
        .order-summary {
            border-top: 1px solid #ccc;
            padding-top: 15px;
            margin-top: 15px;
        }
        .order-summary .summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .order-summary .summary-row strong {
            font-weight: bold;
        }
        .pay-now {
            background-color: #4093ff;
            color: white;
            font-size: 18px;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .pay-now:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Enter Card Details</h1>
        <form>
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" placeholder="Enter your card number">
            </div>
            <div class="card-icons">
                <img src="https://img.icons8.com/color/48/visa.png" alt="Visa">
                <img src="https://img.icons8.com/color/48/mastercard.png" alt="Mastercard">
                <img src="https://img.icons8.com/color/48/amex.png" alt="Amex">
            </div>
            <div class="form-group">
                <label for="cardholder-name">Cardholder's Name</label>
                <input type="text" id="cardholder-name" placeholder="Cardholder's Name">
            </div>
            <div class="expiration-cvv">
                <div class="form-group">
                    <label for="expiry-date">Expiration Date</label>
                    <input type="text" id="expiry-date" placeholder="MM/YY">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="CVV">
                </div>
            </div>
            <div class="order-summary">
                <div class="summary-row">
                    <span>Items Cost</span>
                    <span>Rs. 7,500.00</span>
                </div>
                <div class="summary-row">
                    <span>Shipping Cost</span>
                    <span>Rs. 500.00</span>
                </div>
                <div class="summary-row">
                    <strong>Total</strong>
                    <strong>Rs. 8,000.00</strong>
                </div>
            </div>
            <button type="button" class="pay-now">Pay Now</button>
        </form>
    </div>
</body>
</html>
