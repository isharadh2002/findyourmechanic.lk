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
    $usertype = 'mechanic';
    $specification = $_POST['specification'];
    $isApproved = 0; // Assuming default approval is 0
    $description = $_POST['description'];

    // File upload handling
    $profilePicture = $_FILES['profilePicture'];
    $coverPhoto = $_FILES['coverPhoto'];

    // Input validation
    if (isInputsEmpty($name, $email, $password, $contactNumber, $address, $specification, $description)) {
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
    /* session_start();

    // Check if the file was uploaded
    if (isset($_FILES['Qulification'])) {
        $file = $_FILES['Qulification'];

        // Check for upload errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Move the uploaded file to a directory (optional)
            $uploadDir = 'uploads/'; // Make sure this directory exists and is writable
            $uploadFilePath = $uploadDir . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
                // Store the filename in session
                $_SESSION['uploaded_file'] = $file['name'];
                header("Location:../msg.php?error=sucessFileUploading");
            } else {
                header("Location:../msg.php?error=FailedUploadingFile");
            }
        } else {
            header("Location:../msg.php?error=ErrorDuringUpload");
        }
    } else {
        header("Location:../msg.php?error=Error");
    }*/
    mysqli_close($con);
















    exit();
}
