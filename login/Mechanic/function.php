<?php

function emptyInputs($email, $password)
{

    if (isset($email) && isset($password)) {


        return true;
    }
}

function SearchLogin($email, $password)
{
    //change user to mechanic and add email attribute to mechanic table
    $searchQry = "SELECT {UserID} FROM {user} WHERE {Email}={$email}  AND  {Password}={$password}";
    if ($searchQry) {

        return true;
    } else {

        return false;
    }
}
