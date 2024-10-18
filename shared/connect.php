<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "findyourmechanic";

    $con = mysqli_connect($host, $username, $password, $database);

    if($con){
        echo "<script>console.log(\"Connected to database successfully. \");</script>";
    }
    else{
        die("Something went wrong : " . mysqli_connect_error($con));
    }
?>