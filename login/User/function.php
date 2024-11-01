<?php



function isInputsEmpty($email, $password)
{
    return empty($email) || empty($password);
}




function invalidEmail($email)
{
    return !preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email);
}



function emailExists($con, $email, $password)
{
    $qry = "SELECT UserID FROM (SELECT * FROM user WHERE UserType='user') a WHERE  a.Email=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $qry)) {
        header("Location: ../../msg.php?error=db_error");
        exit();
    }



    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    return  $result['UserID'];
}
