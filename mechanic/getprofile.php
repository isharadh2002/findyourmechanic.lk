<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mechanic_name = $_POST['mechanic_name'];
    $qualifications = $_POST['qualifications'];
    $salary = $_POST['salary'];
    $working_hours = $_POST['working_hours'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Handle file upload for profile picture
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
    }

    // Database connection and query
    $conn = new mysqli("localhost", "username", "password", "mechanic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE mechanics SET name='$mechanic_name', qualifications='$qualifications', salary='$salary', working_hours='$working_hours', email='$email', phone='$phone' WHERE mechanic_id = 1";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $conn->close();
}
?>