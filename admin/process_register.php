<?php
require_once '../shared/connect.php'; // Update with your database configuration file path

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);

    // Validate form fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($address) || empty($phone)) {
        header("Location: register.php?error=All fields are required");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: register.php?error=Passwords do not match");
        exit();
    }

    // Check if username or email already exists
    $query = "SELECT * FROM user WHERE username = ? OR email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: register.php?error=Username or Email already exists");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new admin into database
    $query = "INSERT INTO `user`(`Username`, `Password`, `UserType`, `Email`, `PhoneNumber`, `Address`) VALUES (ssssss)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssss", $username, $hashed_password, 'admin', $email, $phone, $address);
    $query = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: register.php?success=Registration successful! You can now log in.");
    } else {
        header("Location: register.php?error=Registration failed. Please try again.");
    }

    $stmt->close();
    $conn->close();
}
?>