<?php
session_start();
$UserID = $_SESSION['UserID'];
require "../../shared/connect.php";
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Display POST data and file data for debugging (can be removed once tested)
    //print_r($_POST);
    //echo "<br><br>";
    //print_r($_FILES['profilePicture']);
    //echo "<br><br>";

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
                        //echo "Old profile picture deleted.<br>";
                    }
                }

                // Move the file to the target directory
                if (move_uploaded_file($tmpName, $targetPath)) {
                    //echo "File uploaded successfully!<br>";

                    // Save the file path in the database (without the `../../`)
                    $relativePath = "uploads/profilePictures/" . $newFileName;  // Path relative to the root

                    // Update the profile picture in the database
                    $sql = "UPDATE customer SET ProfilePicture = ? WHERE UserID = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param('si', $relativePath, $UserID);

                    if ($stmt->execute()) {
                        //echo "Profile picture updated successfully!<br>";
                        $success = true;
                    } else {
                        //echo "Error updating profile picture: " . $con->error;
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, sans-serif;
        }

        /* Modal CSS */
        .modal {
            display: block;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
        }

        .modal-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin: 0 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Display if file processing is successful -->
    <?php
    if ($success == 1): // Success message
    ?>
        <div id="messageModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-header">
                    Success!
                </div>
                <div class="modal-body">
                    Your file has been uploaded successfully!
                </div>
                <div class="modal-footer">
                    <a href="../settings.php" class="btn">Go to Dashboard</a>
                </div>
            </div>
        </div>
    <?php
    else: // Error message
    ?>
        <div id="messageModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-header">
                    Error!
                </div>
                <div class="modal-body">
                    There was an error processing your file. Please try again.
                </div>
                <div class="modal-footer">
                    <a href="../settings.php" class="btn">Try Again</a>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>

    <!-- JavaScript for modal functionality -->
    <script>
        // Close the modal when the user clicks on <span> (x)
        document.querySelector('.close').onclick = function() {
            //document.getElementById('messageModal').style.display = 'none';
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('messageModal')) {
                //document.getElementById('messageModal').style.display = 'none';
            }
        }
    </script>
</body>

</html>