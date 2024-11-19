<?php

require_once("../../shared/connect.php");
require_once("function.php");
//
if (isset($_POST['submitButton'])) {
    // Gather Posting data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if inputs are empty
    if (isInputsEmpty($email, $password)) {
        header("Location:../../msg.php?error=emptyInputs");
        exit();
    }

    // Validate email
    if (inValidResponse($email)) {
        header("Location:../../msg.php?error=invalidInputs");
        exit();
    }

    // Check if email already exists
    $userId = emailExists($con, $email);
    if (!$userId) {
        header("Location:../../msg.php?error=UserEmailNOTExists");
        exit();
    }

<<<<<<< HEAD
    // If no error, start session and store user ID
    session_start();
    $_SESSION['userId'] = $userId;
    
=======
    //Check for Password Matching
    $Query = "SELECT * FROM user WHERE UserID = $userId";
    $result = mysqli_query($con, $Query);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    $hashedPassword = $row['Password'];
>>>>>>> 7e9843fd19d93e8d75c8198b8c92083d0e718c03

    if (password_verify($password, $hashedPassword) || $password == $hashedPassword) {
        echo "Successfully logged in";

        // If no error, start session and store user ID
        session_start();
        $_SESSION['UserID'] = $userId;
        mysqli_close($con);

        header("Location:../../customer");
    } else {
        echo "Invalid Password";
    }
    
}
