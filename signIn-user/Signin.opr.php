<?php
require_once("../shared/connect.php");
require_once("function.php");
print_r($_POST);

if (isset($_POST['submitButton'])) {
    // Gather POST data//
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $usertype = 'customer';
    $profilePicture = $_FILES['profilePicture'];
    //$noOfVehicle = $_POST['numberOfVehicles'];



    // Upload profile picture and cover photo
    $uploadDir = '../uploads/profilePictures/'; // Ensure this directory exists and is writable


    $profilePicturePath =  $uploadDir . basename($profilePicture['name']);


    if (isInputsEmpty($name, $email, $password, $contactNumber, $address, $profilePicture)) {
        header("Location: ../msg.php?error=emptyInputs&message=InputsEmpty");
        exit();
    }

    if (inValidResponse($name, $email, $contactNumber)) {
        header("Location: ../msg.php?error=invalidInputs&message=invalidResponse");
        exit();
    }

    if (emailExists($con, $email, $name) > 0) {

        header("Location: ../msg.php?error=UserEmailExists&message=emailExists");

        exit();
    }

    insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address);
//
    $userId = getUserIDUserTable($con, $email);
    if (!$userId) {
        header("Location: ../msg.php?error=userRetrievalError");
        exit();
    }

    if ($profilePicture && move_uploaded_file($profilePicture['tmp_name'], $profilePicturePath)) {
        updateCustomerTable($con, $userId, $profilePicturePath);
    } else {
        header("Location: ../msg.php?error=fileUploadError");
        exit();
    }

    
    session_start();

    //$_SESSION['noOfVehicles'] = $noOfVehicle;
    $_SESSION['UserID'] = $userId;
    $_SESSION['UserType'] = $usertype;
    mysqli_close($con);
    //header('Location:vehicles.php?userid=.$userid.$noof=.$noOfVehicles');
    if(strcasecmp($usertype, "customer")==0){
        header("location:customer");
    }

    exit();
}
