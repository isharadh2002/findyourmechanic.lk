<?php

function emptyInputs($email, $password)
{

    if (isset($email) && isset($password)) {


        return true;
    }
}

function SearchLogin($email,$password){

$searchQry="SELECT {UserID} FROM {user} WHERE {Email}={$email}  AND  {Password}={$password}";
if($searchQry){


    header("Location:")
}


}
