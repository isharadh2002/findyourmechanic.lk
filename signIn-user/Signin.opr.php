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
    if (isValuesSet($name) && isValuesSet($email) && isValuesSet($password) && isValuesSet($contactNumber) && isValuesSet($address)) {

        $qry = qrySetting($name, $email, $password, $contactNumber, $address);

        executeQry($qry, $con);
    } else {


        header("Location:signup-User.php");
        echo "sacess";
        exit(1);
    }
}
mysqli_stmt_close($stmt);
mysqli_close($con);
