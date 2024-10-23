<?php


function getValues($name)
{




    $tmp = $_POST['name'];
    return $tmp;
}

function isValuesSet($name)
{

    if (isset($name)) {


        return true;
    } else {



        return false;
    }
}
function qrySetting($name, $email, $password, $contactNumber, $address)
{
    $qry = 'INSERT INTO user (Username, Password, UserType, Email, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?, ?);';



    return $qry;
}
function msg($massege)
{


    echo "<script>
    document.getElementsByTagName('body').style.opacity = 0.3;
    document.getElementsByClassName('center-message').style.opacity = 1;
    document.getElementById('afterSigninMsg').innerHTML = '{$massege}';
        
    
    <script>";
}

function executeQry($qry, $con)
{


    $stmt = mysqli_prepare($con, $qry);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $password, $usertype, $email, $contactNumber, $address);
    if (mysqli_stmt_execute($stmt)) {

        msg("The SignIn is Sucess");
    } else {

        msg("The SignIn is Not Sucess");
        exit(1);
    }
}
