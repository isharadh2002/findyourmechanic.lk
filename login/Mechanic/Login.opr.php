<?php

require_once("../../shared/connect.php");
require_once("function.php");

if (isset($_POST['submitButton'])) {
    // Gather POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if inputs are empty
    if (isInputsEmpty($email, $password)) {
        header("Location:../../msg.php?error=emptyInputs");
        exit();
    }

    // Validate email
    if (inValidResponse($email)) {
        header("Location:../../msg.php?error=invalidInputs");
        exit();
    }

    // Check if email already exists
    $userId = emailExists($con, $email);
    if (!$userId) {
        header("Location:../../msg.php?error=UserEmailNOTExists");
        exit();
    }

    //Check for Password Matching
    $query = "SELECT * FROM user WHERE UserID = $userId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    $hashedPassword = $row['Password'];


    if (password_verify($password, $hashedPassword) || $password == $hashedPassword) {
        echo "Successfully logged in";

        //Retrieve Mechanic ID
        $query = "SELECT * FROM mechanic WHERE UserID = $userId";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $mechanicID = $row['MechanicID'];
        } else {
            echo "<script>
                window.alert('Something went wrong when retrieving details...');
                window.location.href = '../';
                </script>";
        }

        // If no error, start session and store user ID
        session_start();
        $_SESSION['UserID'] = $userId;
        $_SESSION['MechanicID'] = $mechanicID;

        header("Location:../../mechanic");
        mysqli_close($con);
    } else {
        echo "Invalid Password";
        //echo "<br><br>".password_hash('Gobi1234', PASSWORD_DEFAULT);
    }
}
