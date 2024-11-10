<?php
$massege_mail = '';
if (isset($_POST['submitButton'])) {

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $textArea = $_POST['textArea '];


    $to = 'findyourmechanic.lk@gmail.com';
    $subject_email = 'Massege from web site';
    $email_body   = 'Messege from notification panel in the findyourmechanic web site:';
    $email_body  .= '<b>From :</b> {$fullName} ';
    $email_body  .= '<b>Email :</b> {$email}';
    $email_body  .= '<b>Subject :</b> {$subject}';
    $email_body  .= '<b>Messege :</b> {$textarea}';
    $header = '<b>Email From Findyourmechanic.lk....</b>';

    $mail_sent = mail($to, $subject_email, $email_body, $header);
    if ($mail_sent) {

        $massege_mail = '<p> The Mail was sen sucessfully!..............</p>';
    } else {
        $massege_mail = '<p> The Mail was not sen sucessfully!..............</p>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            overflow: hidden;


        }

        /* Full-page container */
        .page {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100vw;
            height: 100vh;
            background-color: #ffffff;
            /* Background color for the right side */
            overflow: hidden;
        }

        /* Angled color section */
        .leftContent {
            position: absolute;
            top: 0;
            left: 0;
            width: 60%;
            /* Adjust to control width of colored area */
            height: 100%;
            background: linear-gradient(135deg, #064edd, #b0b9fc);
            /* Gradient colors */
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);
            /* Creates the angled cut */
            z-index: 1;
        }

        /* Content styling */
        
        

        .container {
            display: flex;


            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            border-radius: 45px;





        }

        .leftContent,
        .rightContent {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-right: 28px;
        }
        .rightContent{
            position: fixed;
             right: 0;
             justify-content: space-between;
        }

        .leftContent {
            align-content: left;



            font-family: Arial, Helvetica, sans-serif;
            font-weight: bolder;
            color: rgb(144 202 243);

            text-indent: 5px;
            text-wrap: wordwrap;
            margin-bottom: 10px;


        }

        img {

            width: 403px;
        }

        /* Animated Gradient Background */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Form rightContent */
        .notificationContainer {
            width: 100%;
            max-width: 400px;
            padding: 24px;
            background: rgb(144 202 243);
            border-radius: 12px;
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1s ease;
            margin: 0px 78px;
        }

        .notification {
            font-size: 24px;
            color: #2f4e8d;
            margin-bottom: 20px;
            font-weight: bold;
            animation: slideIn 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .inputrightContent {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .input-rightContent__label {
            position: absolute;
            top: 14px;
            left: 15px;
            font-size: 16px;
            color: #888;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 0 4px;
            transition: 0.3s ease all;
            pointer-events: none;
        }

        .inputs {
            width: 100%;
            padding: 16px 15px 12px;
            font-size: 16px;
            color: #333;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .inputs:hover {
            border-color: #6200ea;
        }

        .inputs:focus {
            border-color: #6200ea;
            box-shadow: 0 0 8px rgba(98, 0, 234, 0.3);
        }

        .inputs:focus+.input-rightContent__label+.input-rightContent__label {
            top: -10px;
            left: 10px;
            font-size: 14px;
            color: #6200ea;
        }





        .inputs:focus {
            animation: pulse 0.2s ease-in-out;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }

            100% {
                transform: scale(1);
            }
        }

        .submitButton {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #2f4e8d;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .submitButton:hover {
            background-color: #4500b5;
        }

        .submitButton:active {
            transform: scale(0.98);
        }

        .image {

            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .image img {
            width: 48px;
            height: 48px;



        }
    </style>
</head>

<body>
    <div class="container">
        <div class="leftContent">
            <p> <img src="Pic/mail (1).png" alt="Notificaions"></p>
            <div class="image"> <br><img src="Pic/security.png" alt="bullets">
                <p>Giving Feedback </p>
            </div>
            <div class="image"> <br><img src="Pic/security.png" alt="bullets">
                <p>Comments </p>
            </div>
            <div class="image"> <br><img src="Pic/security.png" alt="bullets">
                <p>Reporting Issues </p>
            </div>








        </div>
        <div class="rightContent">
            <div class="notificationContainer">
                <?php echo $massege_mail; ?>
                <div class="notification">Notifications !</div>
                <div class="form_elements">
                    <form action="notification.php" method="post">
                        <div class="inputrightContent">
                            <input type="text" name="fullName" class="inputs" placeholder="fullName...">
                            <input type="text" name="email" class="inputs" placeholder="Email...">
                            <input type="text" name="subject" class="inputs" placeholder="subject...">
                            <textarea name="textArea" class="inputs" cols="30" rows="10" placeholder="Enter your Messege......"></textarea>
                            <button class="submitButton">Send</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>