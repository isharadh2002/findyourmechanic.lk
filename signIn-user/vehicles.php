<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flexbox with Hover Effect</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Full viewport height for the flex container */
        body,
        html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        /* Flexbox container */
        .flex-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            padding: 20px;
            width: 300px;
            background-color: #e0e0e0;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        /* Hover effect */
        .flex-container:hover {
            background-color: #d1c4e9;
        }

        /* Input styles */
        .flex-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button */
        .flex-container button {
            padding: 10px;
            width: 100%;
            background-color: #673ab7;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        .flex-container button:hover {
            background-color: #5e35b1;
        }
    </style>
</head>

<body>
    <div class="flex-container">
        <input type="text" placeholder="Enter your name">
        <input type="email" placeholder="Enter your email">
        <input type="password" placeholder="Enter your password">
        <button type="submit">Submit</button>
    </div>
</body>

</html>