<?php
require_once("../shared/connect.php");
require_once("function.php");

if (isset($_POST['submitButton'])) {
    // Gather POST data//
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $usertype = 'customer';
    $profilePicture = $_FILES['profilePicture'];
    $noOfVehicle = $_POST['numberOfVehicles'];



    // Upload profile picture and cover photo
    $uploadDir = 'uploads/'; // Ensure this directory exists and is writable


    $profilePicturePath =  $uploadDir . basename($profilePicture['name']);


    if (isInputsEmpty($name, $email, $password, $contactNumber, $address, $profilePicture)) {
        header("Location: ../msg.php?error=emptyInputs");
        exit();
    }

    if (inValidResponse($name, $email, $contactNumber)) {
        header("Location: ../msg.php?error=invalidInputs");
        exit();
    }

    if (emailExists($con, $email, $name) > 0) {
        header("Location: ../msg.php?error=UserEmailExists");
        exit();
    }

    insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address);

    $userId = getUserIDUserTable($con, $email);
    if (!$userId) {
        header("Location: ../msg.php?error=userRetrievalError");
        exit();
    }

    if ($profilePicture && move_uploaded_file($profilePicture['tmp_name'], $profilePicturePath)) {
        updateCustomerTable($con, $userId, $noOfVehicle, $profilePicturePath);
    } else {
        header("Location: ../msg.php?error=fileUploadError");
        exit();
    }

    /*if (!updateVehicleTable($con, $userId, $registrationNumber, $brandName, $modelName)) {
        
        header("Location: ../msg.php?success=mechanicRegistrationSuccess");
    }*/
    session_start();
    $_SESSION['noOfVehicles'] = $noOfVehicle;
    $_SESSION['userId'] = $userId;
    mysqli_close($con);
    header('Location:vehicles.php?userid=.$userid.$noof=.$noOfVehicles');
    exit();
}
