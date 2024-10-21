<?php


require_once("../shared/connect.php");
require_once("function.php");


if (isset($_POST['submitButton'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (emptyInputs($email && $password) !== false) {

        exit(1);
    }
    searchLogin($email,$password);
} else {

    header('Location:signup-User.php');
    exit(1);
}
