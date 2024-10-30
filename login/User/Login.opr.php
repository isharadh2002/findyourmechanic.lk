<?php


require_once("../../shared/connect.php");
require_once("function.php");


if (isset($_POST['submitButton'])) {
    // Gather POST data
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    


    if (isInputsEmpty( $email, $password)) 
        header("Location: Signin-mec.php?error=emptyInputs");
        exit();
    }

    if (inValidResponse( $email )) {
        header("Location: Signin-mec.php?error=invalidInputs");
        exit();
    }

    if (emailExists($con, $email, $name) > 0) {
        header("Location: Signin-mec.php?error=UserEmailExists");
        exit();
    }


