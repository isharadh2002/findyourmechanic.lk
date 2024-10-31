<?php
require_once("../shared/connect.php");
require_once("function.php");

if (isset($_POST['submitButton'])) {
    // Gather POST data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $usertype = 'user';
    $registrationNumber=$_POST['registrationNumber'];
    $brandName=$_POST['brandName'];
    $modelName=$_POST['modelName'];
    

   
    // Input validation
    if (isInputsEmpty($name, $email, $password, $contactNumber, $address,$registrationNumber,$brandName,$modelName)) {
        header("Location: Signin-mec.php?error=emptyInputs");
        exit();
    }

    if (inValidResponse($name, $email, $contactNumber)) {
        header("Location: Signin-mec.php?error=invalidInputs");
        exit();
    }

    if (emailExists($con, $email, $name) > 0) {
        header("Location: Signin-mec.php?error=UserEmailExists");
        exit();
    }

    // Insert user data into `user` table
    insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address);
    //to solve things

    // Retrieve UserID for the new user
    $userId = getUserIDUserTable($con, $email);
    if (!$userId) {
        header("Location: Signin-mec.php?error=userRetrievalError");
        exit();
    }

    // Upload profile picture and cover photo
    $uploadDir = 'uploads/'; // Ensure this directory exists and is writable
    $profilePicturePath = $uploadDir . $profilePicture['name'];
    $coverPhotoPath = $uploadDir . $coverPhoto['name'];

    if (
        move_uploaded_file($profilePicture['tmp_name'], $profilePicturePath) &&
        move_uploaded_file($coverPhoto['tmp_name'], $coverPhotoPath)
    ) {

        // Update mechanic table with additional details
        updateMechanicTable($con, $userId, $address, $contactNumber, $specification, $isApproved, $profilePicturePath, $coverPhotoPath, $description);
        header("Location: Signin-mec.php?success=mechanicRegistrationSuccess");
    } else {
        header("Location: Signin-mec.php?error=fileUploadError");
    }
     session_start();

    
    mysqli_close($con);
















    exit();
}
