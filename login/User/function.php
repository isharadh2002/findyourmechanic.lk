<?php

function emptyInputs($email, $password)
{

    if (isset($email) && isset($password)) {


        return true;
    }
}

function SearchLogin($email, $password)
{

    $searchQry = "SELECT {MechanicID} FROM {user} WHERE {Email}={$email}  AND  {Password}={$password}";
    if ($searchQry) {

        //have to fill this one
        // header("Location:");
        echo "<script> console.log('Login sucess'); </script>";
    } else {

        require_once("script.js");
        //have to fill
        echo "";
    }
}
