

<?php



function beforeSignin($email, $con)
{
    $qry = "SELECT * FROM user WHERE Email = ?";

    $stmt = mysqli_prepare($con, $qry);

    mysqli_stmt_bind_param($stmt, 's', $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
                    document.getElementById("afterSigninMsg").innerHTML = "";

            document.getElementById("afterSigninMsg").innerHTML = "Account already exists,So go to User login!";
document.getElementById("afterSigninMsg").classList.add("visible");
        </script>';

        header('Location: signup-User.php');
        exit();
    }


    return true;
}



function getValues($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

function isValuesSet($value)
{
    if (empty($value)) {
        return false;
    }

    echo "<script>console.log('The value is set!');</script>";
    return true;
}

function qrySetting()
{
    return "INSERT INTO user (Username, Password, UserType, Email, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?, ?)";
}
function msg($message)
{
    $escapedMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    echo "<script>console.log('{$escapedMessage}');</script>";
}

function executeQry($qry, $con, $name, $password, $usertype, $email, $contactNumber, $address)
{
    $stmt = mysqli_prepare($con, $qry);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $password, $usertype, $email, $contactNumber, $address);

    if (mysqli_stmt_execute($stmt)) {
        msg("The Sign-In is Successful");
    } else {
        msg("The Sign-In Failed");
        exit(1);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
