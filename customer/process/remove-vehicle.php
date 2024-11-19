<?php
require "../../shared/connect.php";
session_start();
if(isset($_SESSION['UserID']) && isset($_GET['VehicleID'])){
    $UserID = $_SESSION['UserID'];
    $VehicleID = $_GET['VehicleID'];
    echo  "You are logged in as $UserID and viewing vehicle $VehicleID";

    

    $deleteQuery = "DELETE FROM `vehicle` WHERE `vehicle`.`VehicleID`=$VehicleID";
    mysqli_query($con, $deleteQuery);
}
?>