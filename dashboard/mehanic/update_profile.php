<?php


include 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']==="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
$address=$_POST['address'];
$sql= "UPDATE user SET Username='$name' ,Email='$email',PhoneNumber='$phone',Address='$address' WHERE Username='$name'";
if ($con->query($sql)===TRUE)
{
    echo "Profile updated Sucessfully";
}else{
    echo "Error updating profile:" .$con->error;
}
$con->close();
}
?>
