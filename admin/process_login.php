<?php
session_start();
require_once '../shared/connect.php'; // Update with your database configuration file path

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if fields are not empty
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=Please fill in all fields");
        exit();
    }

    // SQL query to check admin credentials
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $userDetails = $result->fetch_assoc();
        print_r($userDetails);

        // Verify the password
        if (password_verify($password, $userDetails['Password']) || $password == $userDetails['Password']) {
            // Set session variables
            $_SESSION['UserID'] = $userDetails['UserID'];

            //Retrieve Admin information
            $query = "SELECT * FROM admin WHERE UserID = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $userDetails['UserID']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $adminDetails = $result->fetch_assoc();

                $_SESSION['AdminID'] = $adminDetails['AdminID'];
                //print_r($adminDetails); 

                // Redirect to the admin dashboard
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=You are not a admin");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: login.php?error=Invalid username");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
