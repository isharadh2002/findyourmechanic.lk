<?php
session_start();
$UserID = $_SESSION['UserID'];
require "../../shared/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Display POST data and file data for debugging (can be removed once tested)
    print_r($_POST);
    echo "<br><br>";
    print_r($_FILES['profilePicture']);
    echo "<br><br>";

    // Extract file information
    $name = $_FILES['profilePicture']['name'];
    $tmpName = $_FILES['profilePicture']['tmp_name'];
    $error = $_FILES['profilePicture']['error'];
    $size = $_FILES['profilePicture']['size'];

    // Set the target directory
    $targetDir = "../../uploads/profilePictures/";
    $allowedTypes = ['image/jpeg', 'image/png'];
    $maxSize = 2 * 1024 * 1024; // 2 MB

    // Validate the file and check for errors
    if ($error === UPLOAD_ERR_OK) {
        // Validate file type
        if (in_array($_FILES['profilePicture']['type'], ['image/jpeg', 'image/png'])) {
            // Validate file size (max 2MB)
            if ($size <= 2 * 1024 * 1024) {
                // Generate a unique file name to avoid collisions
                $newFileName = uniqid('profile_', true) . '.' . pathinfo($name, PATHINFO_EXTENSION);
                $targetPath = $targetDir . $newFileName;

                // Check if the user already has a profile picture
                $sql = "SELECT ProfilePicture FROM customer WHERE UserID = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param('i', $UserID);
                $stmt->execute();
                $stmt->bind_result($oldImage);
                $stmt->fetch();
                $stmt->close();

                // If the user has an old profile picture, delete it
                if ($oldImage) {
                    $oldImagePath = "../../" . $oldImage;  // Get the full path of the old image
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);  // Delete the old image
                        echo "Old profile picture deleted.<br>";
                    }
                }

                // Move the file to the target directory
                if (move_uploaded_file($tmpName, $targetPath)) {
                    echo "File uploaded successfully!<br>";

                    // Save the file path in the database (without the `../../`)
                    $relativePath = "uploads/profilePictures/" . $newFileName;  // Path relative to the root

                    // Update the profile picture in the database
                    $sql = "UPDATE customer SET ProfilePicture = ? WHERE UserID = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param('si', $relativePath, $UserID);

                    if ($stmt->execute()) {
                        echo "Profile picture updated successfully!<br>";
                    } else {
                        echo "Error updating profile picture: " . $con->error;
                    }

                    $stmt->close();
                    $con->close();
                } else {
                    echo "Failed to move uploaded file.<br>";
                }
            } else {
                echo "File size exceeds the 2 MB limit.<br>";
            }
        } else {
            echo "Invalid file type. Only JPG and PNG are allowed.<br>";
        }
    } else {
        echo "File upload error code: $error<br>";
    }
}
