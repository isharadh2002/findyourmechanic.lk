<?php


include 'dbconnect.php';
include 'view_profile.php';
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
<form action="" id="profileForm" method="POST">
            <label for="name">Name</label><br>
                <input type="text" name="name" placeholder="Name"><br><br>
                <label for="email">Email</label><br>
                <input type="email"name="email" placeholder="Email"><br><br>
                <label for="phonenumber">Phone</label><br>
                <input type="phonenumber" name="phone" placeholder="Phone"><br><br>
                <label for="address">Address</label><br>
                <input type="text" name="address" placeholder="Address"><br><br>
                <button type="submit">Update Profile</button><br><br>
                <div id=change>
            <button onclick="changePassword">Change Password</button>
</div>
            </form>

