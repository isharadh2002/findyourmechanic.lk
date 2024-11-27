<?php
function promptingImage($msg)
{
    echo "<script>
            promptingPicJs({$msg});
          </script>";
}

function errorMessage()
{
    echo '<script>
              document.getElementById("message-text").innerHTML = "Error Occurred";
          </script>';
    exit();
}

function successMessage()
{
    echo '<script>
              document.getElementById("message-text").innerHTML = "Success! You can move to the next page.";
          </script>';
    exit();
}

$msg = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

if (!empty($msg)) {
    // error -> 0 & success -> 1
    switch ($msg) {
        case 'emptyInputs':
        case 'invalidInputs':
        case 'UserEmailNOTExists':
        case 'db_error':
        case 'db_st_error':
        case 'db_st_error_Mechanic':
        case 'execution_error':
        case 'db_st_errorVehicle':
        case 'userRetrievalError':
        case 'fileUploadError':
        case 'UserEmailExistsSign':
            errorMessage();
            promptingImage(0);
            break;
        case 'success':
        case 'UserEmailExistsLogin':
        case 'mechanicRegistrationSuccess':
            successMessage();
            promptingImage(1);
            break;
        default:
            echo '<script>
                    document.getElementById("message-text").innerHTML = "Oops! Something went wrong.";
                  </script>';
            break;
        }
        if(isset($_POST("name"))){

            header("Location:index.php");
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
        body {
            font-family: Arial, sans-serif;
            background-color: #a2caf13d;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            color: #48e139;
        }

        .message-container {
            max-width: 600px;
            padding: 45px;
            background-color: #e3fcef;
            border-radius: 10px;
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.1);
        }

        #message-text_style {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .next-button {
            font-size: 1em;
            padding: 10px 20px;
            background-color: #0c8952;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .next-button:hover {
            background-color: #225b3f;
        }

        img {

            width: 250px;
            height: fit-content;
            margin: 61px;
        }
    </style>
</head>

<body>
    <img id="status-image" src="Pic/done.png" alt="Status Image" />
    <div class="message-container">
        <div id="message-text_style" ><p id="massage-text"></p></div>
        <button name="nextpage" class="next-button">Next &rarr;</button>
    </div>
    <script>
        function promptingPicJs(number) {
            let images = ['Pic/error.png', 'Pic/done.png'];
            const imgElement = document.getElementById('status-image');
            imgElement.src = images[number] || 'Pic/error.png';
        }

        window.onload = function() {
            // 0 for error, 1 for success
            promptingPicJs(1);
        };
    </script>
</body>

</html>