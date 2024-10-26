<?php

if (isset($_POST['submitButton'])) {
    require_once("../shared/connect.php");
    require_once("function.php");
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $usertype = 'mechanic';
    if (isset($_FILES['Qulifications'])) {
        $fileTmpPath = $_FILES['Qulification']['tmp_name'];
        $fileName = basename($_FILES['Qulification']['name']);
        $fileType = $_FILES['Qulifiaation']['type'];
    }
    if (isInputsEmpty($name, $email, $password, $contactNumber, $address) !== false) {
        header("LOcation:Signin-mec.php?error=emptyInputs");
        exit();
    }
    if (inValidResponse($name, $email,  $contactNumber) !== false) {

        header("LOcation:Signin-mec.php?error=invalidInputs");
        exit();
    }

    if (emailExists($con, $email, $name)) {

        header("Location:Signin.mec.php?error=UseremailExisits");
        exit();
    }
    $hashedPwd = sha1($password, PASSWORD_DEFAULT);
    $qry = "INSERT INTO user(Username,Password,UserType,Email,PhoneNumber,Address)
     VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location: Signin-mec.php?error=dbsterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssssss', $name, $hashedPwd, $usertype, $email, $contactNumber, $address);

    mysqli_stmt_execute($stmt);

    header("Location:Signin-mec.php?error=sucessentry");
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit();
}
