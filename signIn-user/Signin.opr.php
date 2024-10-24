<?php
require_once("../shared/connect.php");
require_once("function.php");
if (isset($_POST['submitButton'])) {

    $name = getValues('username');
    $email = getValues('email');
    $password = getValues('password');
    $contactNumber = getValues('contactNumber');
    $address = getValues('address');
    $usertype = 'customer';
    if (beforeSignin($email, $con)) {


        if (isValuesSet($name) && isValuesSet($email) && isValuesSet($password) && isValuesSet($contactNumber) && isValuesSet($address)) {

            $qry = qrySetting();

            executeQry($qry, $con, $name, $password, $usertype, $email, $contactNumber, $address);
        } else {
            echo "<script>console.log('The value is not set!');</script>";
            header("Location: signup-User.php");
            exit();
        }
    }
}
