<?php
//
function isInputsEmpty($email, $password)
{
    return empty($email) || empty($password);
}
function invalidEmail($email)
{
    return !preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email);
}
function inValidResponse($email)
{
    return invalidEmail($email);
}



function emailExists($con, $email)
{
    $qry = "SELECT UserID FROM (SELECT * FROM user WHERE UserType='customer') a WHERE a.Email=?;";
    $stmt = mysqli_stmt_init($con);





    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location: ../../msg.php?error=db_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['UserID'];
    }
    return null; // No user found
}
