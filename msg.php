<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In Success Message</title>
    <style>
        /* Basic styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #2d6a4f;
        }

        /* Success message styling */
        .message-container {
            max-width: 600px;
            padding: 20px;
            background-color: #e3fcef;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Message text */
        .message-text {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Button styling */
        .next-button {
            font-size: 1em;
            padding: 10px 20px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .next-button:hover {
            background-color: #225b3f;
        }
    </style>
</head>
<body>

    <!-- Message container with success message and button -->
    <div class="message-container">
        <div class="message-text">Sign-in successful! Welcome back.</div>
        <a href="nextpage.html" class="next-button">Go to Next Page</a>
    </div>

</body>
</html>
