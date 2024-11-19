<?php

function isInputsEmpty($name, $email, $password, $contactNumber, $address)
{
    return empty($name) || empty($email) || empty($password) || empty($contactNumber) || empty($address);
}
function invalidUsername($name)
{
    return !preg_match('/^[a-zA-Z0-9_ ]*$/', $name);
}

function invalidEmail($email)
{
    return !preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email);
}

function invalidContactNumber($contactNumber)
{
    return !preg_match('/^\+?[0-9]{0,11}$/', $contactNumber);
}

function inValidResponse($name, $email, $contactNumber)
{
    return invalidUsername($name) || invalidEmail($email) || invalidContactNumber($contactNumber);
}

function emailExists($con, $email, $name)
{
    $qry = "SELECT UserID FROM (SELECT * FROM user WHERE UserType='customer') a WHERE a.Username=? OR a.Email=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location:../msg.php?error=db_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $name, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return mysqli_num_rows($result);
}

function insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address)
{
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $qry = "INSERT INTO user (Username, Password, UserType, Email, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location:../msg.php?error=db_st_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssssss', $name, $hashedPwd, $usertype, $email, $contactNumber, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function getUserIDUserTable($con, $email)
{
    $qry = "SELECT UserID FROM user WHERE Email=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location:../msg.php?error=db_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) !== 0) {
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $user['UserID'];
    }

    mysqli_stmt_close($stmt);
    return false;
}

function updateCustomerTable($con, $userId, $profilePicturePath)
{
    $qry = "INSERT INTO customer (UserID, NoOfVehicles,ProfilePicture) VALUES (?, 0, ?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location: ../msg.php?error=db_st_error_Mechanic");
        exit();
    }
    $relativePath = substr($profilePicturePath, 3);
    mysqli_stmt_bind_param($stmt, 'is', $userId, $relativePath);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Execution failed: " . mysqli_stmt_error($stmt));
        header("Location: ../msg.php?error=execution_error");
        exit();
    }

    mysqli_stmt_close($stmt);
    return true;
}

function updateVehicleTable($con, $userId, $registrationNumber, $brandName, $modelName)
{
    $qry = "INSERT INTO vehicle (UserID, RegistrationNumber, Brand, Model) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location:../msg.php?error=db_st_errorVehicle");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'isss', $userId, $registrationNumber, $brandName, $modelName);
    if (!mysqli_stmt_execute($stmt)) {
        header("Location:../msg.php?error=execution_error");
        exit();
    }

    mysqli_stmt_close($stmt);
    return true;
}
