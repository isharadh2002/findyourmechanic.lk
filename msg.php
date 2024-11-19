<?php
function promptingImage($msg)
{

    echo "<script>

            promptingPicJs({$msg});
    
        </script>";
}

function errorMassege()
{

    echo '<script>
              document.getElementById("msg").innerHtml="";
              document.getElementById("msg").innerHtml="Error Occurred";
                        

    </script>';
    exit();
}
function sucessMassege()
{

    echo '<script>
              document.getElementById("msg").innerHtml="";
              document.getElementById("msg").innerHtml=" SuccessFull!.... You can move to next page......";
                        

    </script>';
    exit();
}



$msg = $_GET['error'];
if (!empty($msg)) {

    //error---> 0 & Sucess---> 1
    switch ($msg) {
        case 'emptyInputs':
            errorMassege();
            promptingImage(0);
            break;
        case 'invalidInputs':
            errorMassege();
            promptingImage(0);
            break;
        case 'UserEmailNOTExists':
            errorMassege();
            promptingImage(0);
            break;
        case 'success':
            sucessMassege();
            promptingImage(1);
            break;
        case 'db_error':
            errorMassege();
            promptingImage(0);
            break;
        case 'db_st_error':
            errorMassege();
            promptingImage(0);
            break;
        case 'db_st_error_Mechanic':
            errorMassege();
            promptingImage(0);
            break;
        case 'execution_error':
            errorMassege();
            promptingImage(0);
            break;
        case 'db_st_errorVehicle':
            errorMassege();
            promptingImage(0);
            break;
        case 'UserEmailExistsSign':
            errorMassege();
            promptingImage(0);
            break;
        case 'UserEmailExistsLogin':
            sucessMassege();
            promptingImage(1);
            break;
        case 'userRetrievalError':
            errorMassege();
            promptingImage(0);
            break;;
        case 'fileUploadError':
            errorMassege();
            promptingImage(0);
            break;
        case 'mechanicRegistrationSuccess':
            sucessMassege();
            promptingImage(1);
            break;
        default:
            echo '<script>
    document.getElementById("msg").innerHtml="";
    document.getElementById("msg").innerHtml="Opps... Something went wrong!.......";
              

</script>';
            break;
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: content-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
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

       
        .message-container {
            max-width: 600px;
            padding: 45px 45px;
            background-color: #e3fcef;
            border-radius: 10px;
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0);
        }

        .message-text {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 70px;
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
            margin: 6px 0px;
        }

        .next-button:hover {
            background-color: #225b3f;
        }
    </style>
</head>

<body>
<img src="Pic/done.png" alt="SucessMasseg" />

   
    <div class="message-container">
        <div class="message-text">Sign-in successful! Welcome back.

        </div>
        <div class="button">
            <button name="nextpage" class="next-button"> Next ==></button>
        </div>
        
    </div>
    <script>
        addEventListener('onLoad',
        function promptingPicJs(number) {
            let images = ['Pic/error.png', 'Pic/done.png'];
            document.getElementsByTagName('img').src = '';
            if (number === 0) {

                document.getElementsByTagName('img').src = images[0];
                return;
            } else if (number === 1) {
                document.getElementsByTagName('img').src = images[1];
                return;
            } else {


                alert('There may be some bugs.');
            }


            return;

        }
    );
    </script>
</body>

</html>