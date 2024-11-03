<?php 
$msg=$_GET['error'];
if(isset($msg)){

switch($msg){
    case
    




}






}

?>


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
            box-sizing: content-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #a2caf13d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #48e139;
        }

        /* Success message styling */
        .message-container {
            max-width: 600px;
            padding: 45px 45px;
            background-color: #e3fcef;
            border-radius: 10px;
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.1);
        }

        /* Message text */
        .message-text {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 70px;
        }

        /* Button styling */
        .next-button {
            font-size: 1em;
            padding: 10px 20px;
            background-color: #0c8952;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 6px 0px;
        }

        .next-button:hover {
            background-color: #225b3f;
        }
    </style>
</head>

<body>

    <!-- Message container with success message and button -->
    <div class="message-container">
        <div class="message-text">Sign-in successful! Welcome back.
            
        </div>
        <div class="button">
       <button name="nextpage" class="next-button"> Next ==></button>
        </div>
    </div>

</body>

</html>