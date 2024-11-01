<?php


require_once("../../shared/connect.php");
require_once("function.php");


if (isset($_POST['submitButton'])) {
    // Gather POST data

    $email = $_POST['email'];
    $password = $_POST['password'];



    if (isInputsEmpty($email, $password))
        header("Location: ../../msg.php?error=emptyInputs");
    exit();



$userId = emailExists($con, $email, $name);
if ($userId > 0) {
    header("Location: ../../msg.php?error=UserEmailExists");
    exit();
}
session_start();
$_SESSION['userId'] = $userId;
mysqli_close($con);
}