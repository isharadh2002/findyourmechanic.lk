<?php
require_once("../../shared/connect.php");

if (isset($_POST['resend'])) {
    //verify email exists
    $email = trim($_POST['email']);
    $qry = "SELECT UserID FROM user WHERE Email = ?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $qry)) {
        echo "<script>alert('Error Occurred while preparing the statement...');</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $token = bin2hex(random_bytes(4)); // Generates an 8-character OTP securely.
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));
        mysqli_stmt_close($stmt);
            //Update the database
        $update_sql = "UPDATE user SET Password = ?, reset_token_expiry = ? WHERE Email = ?";
        
        $update_stmt=mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($update_stmt, $update_sql)) {
            mysqli_stmt_bind_param($update_stmt, 'sss', $token, $expiry, $email);
            if (mysqli_stmt_execute($update_stmt)) {
                $resetLink = "This is the OTP to request to resent the password: {$token}";
                $subject = "Password Reset Request";
                $message = "The OTP is expired in 30 Minutes";
                $headers = "From: no-reply@findyourmechanic.lk";
                //mailing 
                if (mail($email, $subject, $message, $headers)) {
                    echo "<script>alert('The password reset link has been sent to your email.');</script>";
                } else {
                    echo "<script>alert('Failed to send the email. Please try again later.');</script>";
                }
            } else {
                echo "<script>alert('Error updating reset token.');</script>";
            }
        } else {
            echo "<script>alert('Error preparing update statement.');</script>";
        }

        
    } else {
        echo "<script>alert('No account found for the entered email.');

        </script>";

    }

    mysqli_stmt_close($update_stmt);


    //OTP configuration
    if(isset($_POST['OTP_Submit'])){
        $otp_number=$_POST['OTP'];
        if($otp === $token){
            echo '<script>
                    otpButtonBehavior();
            
            </script>';

        }
    }
    if(isset($_POST['submit'])){
        $newPassword=$_POST['Npassword'];
        $stmt=mysqli_stmt_init($con);
        $qry="UPDATE TABLE `user` SET Password=?";
        if (!mysqli_stmt_prepare($stmt, $qry)) {
            header("Location:../msg.php?error=db_error");
            exit();
        
    
        mysqli_stmt_bind_param($stmt, 's', $newPassword);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $final= mysqli_num_rows($result);
        if($final){
            echo "<script>
            alert('The password reset was completed');
            </script>";
        }else{
            
            echo "<script>
            alert('The password reset was not completed...There may Be Some Errors...');
            </script>";
        }
    }







    }
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
        .page {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
        }

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

        .content {
            position: relative;
            z-index: 2;
            width: 90%;
            display: flex;
            justify-content: space-between;
            color: #333;
        }

        .left-content {
            width: 45%;

            color: #fff;
        }

        .left-content h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .left-content p {
            font-size: 1.2em;
        }

       
        .right-content {
            width: 45%;
            padding: 20px;
            color: #333;
          
        }

        .right-content p {
            font-size: 1.2em;
        }

        


        .formcontainer {
            width: 100%;
            max-width: 458px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

      
        form {
            display: flex;
            flex-direction: column;
        }




        input {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;

            background-color: #f9f9f9;
            color: #333;
        }


        input:focus {
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
            margin: 3px 0px;
        }

        button:hover {
            background-color: #106e7f;
        }

        #resend:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        
        input:invalid {
            border-color: #dc3545;
        }

        input:valid {
            border-color: #28a745;
        }

       
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
                <h2 style="font-size:58px;">Welcome to </h2>
                <h1 style="font-size: 61px;"> findyourmechanic.lk !...</h1>
                <p style="text-align: center;font-size: 57px;">You can reset <br> your password from <br> here......</p>

            </div>
            <div class="right-content">
                <div class="formcontainer">
                    <h2>Reset Your Password</h2>
                    <form action="forgotPwdnew.php" method="post">
                        

                        <input type="email" name="email" id="email" placeholder="E-mail..." oninput="resendButtonBehavior();">
                        <small>(Enter your E-mail of having Account)</small>
                        <br><br>
                        <button name="resend" id="resend" disabled>Resend OTP</button><br><br>
                        <small>Once,You Had The OTP Please Enter In Following...</small><br>

                        <input type="OTP" name="OTP" id="OTP" placeholder="OTP..." oninput="otpButtonBehavior();">
                        <button name="OTP_Submit" id="OTP_Submit">Submit OTP</button>
                        <input type="Npasword" name="Npasword" id="Npasword" placeholder="New Password..." oninput="otpButtonBehavior();">
                        <button name="Submit" id="Submit">Submit</button>
                        <button name="next" id="next" disabled >Next</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <script>
        function refresh(e){
            

        }
        function resendButtonBehavior() {
    const email = document.getElementById('email').value.trim();
    const emailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    document.getElementById('resend').disabled = !email.match(emailFormat);
}

function otpButtonBehavior() {
   
    

    document.getElementById('next').disabled=false;
    alert("You can Go to Next Page Now!");
}


        
    </script>
</body>

</html>