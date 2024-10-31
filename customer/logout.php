<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect after a delay (e.g., 5 seconds)
$redirectAfter = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }
        .logout-container {
            text-align: center;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .logout-container h1 {
            color: #333;
        }
        .logout-container p {
            color: #666;
        }
        .logout-container a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-container a:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        // Set initial countdown value
        let countdown = <?= $redirectAfter ?>;

        // Update countdown every second
        const countdownTimer = setInterval(() => {
            document.getElementById('countdown').textContent = countdown;
            countdown--;

            // Redirect when countdown reaches 0
            if (countdown < 0) {
                clearInterval(countdownTimer);
                window.location.href = "../";  // Change to your homepage URL
            }
        }, 1000);
    </script>
</head>
<body>
    <div class="logout-container">
        <h1>You've Logged Out</h1>
        <p>You have been successfully logged out.</p>
        <p>Redirecting to the homepage in <span id="countdown"><?= $redirectAfter ?></span> seconds...</p>
        <a href="../">Return to Homepage</a> <!-- Link to the homepage in case the user prefers to click -->
    </div>
</body>
</html>
