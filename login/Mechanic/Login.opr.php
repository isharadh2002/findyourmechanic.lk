<?php

require_once("../../shared/connect.php");
require_once("function.php");

if (isset($_POST['submitButton'])) {
    // Gather POST data
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

    // If no error, start session and store user ID
    session_start();
    $_SESSION['UserID'] = $userId;

    header("Location:../../msg.php?error=success");
    mysqli_close($con);
}