

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B7E0FF;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4379F2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #4379F2;
        }
        input, #card-element {
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
    <script src="https://js.stripe.com/v3/"></script> <!-- Stripe.js -->
</head>
<body>
    <div class="container">
        <h1><u>Payment Service</u></h1>
        <form id="paymentForm" method="POST" action="process_payment.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="amount">Amount (USD):</label>
                <input type="number" id="amount" name="amount" required min="1" />
            </div>
            <div class="form-group">
                <label>Card Details:</label>
                <div id="card-element"><!-- Stripe card element goes here --></div>
            </div>
            <button type="submit">Pay Now</button>
        </form>
        <div id="errorMessages" class="error"></div>
    </div>
    <script>
        const stripe = Stripe("your-publishable-key"); // Replace with your Stripe publishable key
        const elements = stripe.elements();
        const card = elements.create("card");
        card.mount("#card-element");

        document.getElementById("paymentForm").addEventListener("submit", async function (event) {
            event.preventDefault();
            const { error, token } = await stripe.createToken(card);
            const errorMessages = document.getElementById("errorMessages");
            errorMessages.innerHTML = "";

            if (error) {
                errorMessages.textContent = error.message;
            } else {
                const form = document.getElementById("paymentForm");
                const hiddenToken = document.createElement("input");
                hiddenToken.setAttribute("type", "hidden");
                hiddenToken.setAttribute("name", "stripeToken");
                hiddenToken.setAttribute("value", token.id);
                form.appendChild(hiddenToken);
                form.submit(); // Submit the form to the PHP back-end with the token
            }
        });
    </script>
</body>
</html>
