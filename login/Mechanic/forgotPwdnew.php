<?php

require_once("../../shared/connect.php");
if (isset($_POST['resend'])) {
    $email = $_POST['email'];
    $qry = "SELECT UserID FROM user WHERE Email = ?";

    $stmt = mysqli_stmt_init($con);





    if (!mysqli_stmt_prepare($stmt, $qry)) {
        echo "  <script>
        alert('Error Occurred...');
        

        
        </script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


























    if ($row = mysqli_fetch_assoc($result) > 0) {

        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));


        $update_sql = "UPDATE user SET reset_token = '{$token}', reset_token_expiry = '{$expiry}' WHERE email = '}{$email}'}";

        if (mysqli_prepare($con, $update_sql)) {

            mysqli_stmt_bind_param($stmt, 'sss', $email,$token,$expiry);
            mysqli_stmt_execute($stmt);
            $updatedresult = mysqli_stmt_get_result($stmt);
            
            $resetLink = "http://findyourmechanic.com/reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click on this link to reset your password: $resetLink";
            $headers = "From: no-reply@findyourmechanic.lk";

            if (mail($email, $subject, $message, $headers)) {
                echo "<script>
       alert('The password resetting link was sent...'');
        
        </script>";
            } else {
                echo "<script>
        alert('Failed to send a email...'');
        
        </script>";
            }
        } else {
            echo "<script>
        alert('Error uploading resend token...'');
        
        </script>";
        }
    } else {
        echo "<script>
        alert('There is not any account from entered email...');
        
        </script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Full-page container */
        .page {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            /* Right side background color */
        }

        /* Diagonal color section */
        .diagonal-section {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2dd5c3, #2575fc);

            clip-path: polygon(0 0, 60% 0, 40% 100%, 0 100%);
            z-index: 1;
        }

        /* Content styling */
        .content {
            position: relative;
            z-index: 2;
            /* Ensures content appears on top */
            width: 90%;
            display: flex;
            justify-content: space-between;
            color: #333;
        }

        /* Left content area */
        .left-content {
            width: 45%;

            color: #fff;
            /* Text color for better contrast on gradient */
        }

        .left-content h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .left-content p {
            font-size: 1.2em;
        }

        /* Right content area */
        .right-content {
            width: 45%;
            padding: 20px;
            color: #333;
            /* Dark text color for the white background */
        }

        .right-content p {
            font-size: 1.2em;
        }

        /* Basic form styling */


        .formcontainer {
            width: 100%;
            max-width: 458px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
        }




        input[type="email"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;

            background-color: #f9f9f9;
            color: #333;
        }


        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
        }



        button {
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #0f96becf;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #106e7f;
        }

        #resend:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* Form feedback */
        input:invalid {
            border-color: #dc3545;
        }

        input:valid {
            border-color: #28a745;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            button {
                padding: 10px;
            }

        }

        small {
            text-align: center;
            color: #1054e6;
        }

        .formcontainer h2 {

            font-size: 29px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="diagonal-section"></div>
        <div class="content">
            <div class="left-content">
                <h2 style="font-size:58px;">Welcome to hello </h2>
                <h1 style="font-size: 61px;"> findyourmechanic.lk !...</h1>
                <p style="text-align: center;font-size: 57px;">So, You can reset <br> your password from <br> here......</p>

            </div>
            <div class="right-content">
                <div class="formcontainer">
                    <h2>Reset Your Password</h2>
                    <form action="forgotPwdnew.php" method="post">

                        <input type="email" name="email" id="email" placeholder="E-mail..." oninput="buttonBehavior();">
                        <small>(Enter your E-mail of having Account)</small>
                        <br><br>
                        <button name="resend" id="resend" disabled>Resend</button><br><br>
                        <small>Once,Reset your Password go back and login...</small><br>
                        <button name="back" id="back">Login</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <script>
        function buttonBehavior() {
            let email = document.getElementById('email').value;
            const emailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email.match(emailFormat)) {

                document.getElementById("resend").disabled = false;

            } else {
                document.getElementById("resend").disabled = true;
            }


        }
    </script>
</body>

</html>