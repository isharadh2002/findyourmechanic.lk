<?php
include 'dbconnect.php';
$user_id = $_POST['user_id'];
$mechanic_id = $_POST['mechanic_id'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$sql="insert into reviews(UserID,MechanicID,rating,review,reviewDate)VALUES($userid,$mechanicid,$rating,$review,NOW())";
if ($con->query($sql) === TRUE) {
    echo "Your review has been submitted successfully.";
} else {
    echo "Error: " . $con->error;
}
?>