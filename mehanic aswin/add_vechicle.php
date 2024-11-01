<?php
include 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $userid=$_POST['user_id'];
    $model=$_POST['model'];
    $registrationnumber=$_POST['registration'];
    $brand=$_POST['brand'];
    $sql="INSERT INTO vehicle(UserID,RegistrationNumber,Brand,Model)VALUES('$registrationnumber','$brand','$model')";
    if($con->query($sql)=== TRUE)
    {
        echo "New record created sucessfully";
    }else
    {
        echo "Error:".$con->error;
    }
    
}