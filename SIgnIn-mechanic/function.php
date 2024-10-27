<?php
function isInputsEmpty($name, $email, $password, $contactNumber, $address,  $specification, $description)
{
    if (empty($name) || empty($email) || empty($password) || empty($contactNumber) || empty($address) || empty($specification) || empty($description)) {
        return true;
    }
    return false;
}



function inValidResponse($name, $email,  $contactNumber)
{

    $inValidName = invalidUsername($name);
    $invalideEmail = invalidEmail($email);

    $invalidContactNumber = invalidContactNumber($contactNumber);


    if ($invalidContactNumber !== false || $inValidName !== false || $contactNumber !== false) {


        return false;
    }
    return true;
}
function invalidUsername($name)
{
    if (!preg_match('/^[a-zA-Z0-9_]*$/', $name)) {

        return true;
    }

    return false;
}
function invalidEmail($email)
{



    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {

        return true;
    }

    return false;
}
function invalidContactNumber($contactNumber)
{

    if (!preg_match('/^\+?[0-9]{0,11}$/', $contactNumber)) {

        return true;
    }

    return false;
}
function emailExists($con, $email, $name)
{

    $qry = "SELECT UserID FROM (SELECT * FROM user WHERE UserType='mechanic') a WHERE( a.Username=? OR a.Email=?);";

    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {

        header("Location: Signin-mec.php?error=dberror");
        exit();
    }



    mysqli_stmt_bind_param($stmt, 'ss', $email, $name);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) !== 0) {
        mysqli_stmt_close($stmt);
        header("Location: Signin-mec.php?error=sterror");
        exit();
    }

    mysqli_stmt_close($stmt);
    return false;
}
function updateMechanicTable($con, $email)
{

    $qry = "SELECT UserID FROM (SELECT * FROM user WHERE UserType='mechanic') a WHERE( a.Username=? OR a.Email=?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {

        header("Location: Signin-mec.php?error=updateMechanicDberror");
        exit();
    }



    mysqli_stmt_bind_param($stmt, 'ss', $email, $name);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
function insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address)
{
    $hashedPwd = sha1($password, PASSWORD_DEFAULT);
    $qry = "INSERT INTO user(Username,Password,UserType,Email,PhoneNumber,Address)
        VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location: Signin-mec.php?error=dbsterror");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $hashedPwd, $usertype, $email, $contactNumber, $address);

        mysqli_stmt_execute($stmt);

        header("Location:Signin-mec.php?error=sucessentry");
        mysqli_stmt_close($stmt);

        exit();
    }
}
function getUserIDUserTable($con, $email)
{

    $qry = "SELECT UserID FROM users WHERE Email=?;";

    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {

        header("Location: Signin-mec.php?error=dberror");
        exit();
    }



    mysqli_stmt_bind_param($stmt, 'ss', $email, $name);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) !== 0) {
        mysqli_stmt_close($stmt);
        header("Location: Signin-mec.php?error=sterror");
        exit();
    }

    mysqli_stmt_close($stmt);
    return $result;
}

