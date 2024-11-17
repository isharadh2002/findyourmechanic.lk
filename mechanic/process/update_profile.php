<?php
session_start();

//print_r and echo statements used temporarily
//print_r($_POST);
//echo "<br><br>";
//print_r($_SESSION);

require '../../shared/connect.php';

$formType = '';
$message = '';
$isSuccess = false;
//print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['UserID'], $_SESSION['MechanicID'])) {
    $UserID = $_SESSION['UserID'];
    $MechanicID = $_SESSION['MechanicID'];
    if (isset($_POST['form_type'])) {
        $formType = $_POST['form_type'];

        // Handle personal details update
        if ($formType == 'change_profile' && isset($_POST['mechanic_name'], $_POST['email'], $_POST['specification'], $_POST['working_hours'], $_POST['address'], $_POST['personal_phone'], $_POST['work_phone'])) {
            $name = $_POST['mechanic_name'];
            $email = $_POST['email'];
            $specification = $_POST['specification'];
            $workingHours = $_POST['working_hours'];
            $address = $_POST['address'];
            $personalPhone = $_POST['personal_phone'];
            $workPhone = $_POST['work_phone'];

            $userTableQuery = "UPDATE `user` SET `Username`='$name',`Email`='$email',`PhoneNumber`='$personalPhone',`Address`='$address' WHERE UserID = $UserID";
            $userTableResult = mysqli_query($con, $userTableQuery);
            $mechanicTableQuery = "UPDATE `mechanic` SET `WorkAddress`='$address',`WorkPhoneNumber`='$workPhone',`Specification`='$specification',`WorkingHours`='$workingHours' WHERE MechanicID = $MechanicID";
            $mechanicTableResult = mysqli_query($con, $mechanicTableQuery);

            if ($userTableResult && $mechanicTableResult) {
                $message = "Personal details updated successfully.";
                $isSuccess = true;
            } else {
                $message = "Failed to update personal details.";
            }
        }

        // Handle password change
        if ($formType == 'change_password' && isset($_POST['old-password'], $_POST['new-password'], $_POST['confirm-password'])) {
            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];
            $confirmPassword = $_POST['confirm-password'];

            // Retrieve the existing password from the database
            $retrieveQuery = "SELECT * FROM `user` WHERE UserID = $UserID";
            $result = mysqli_query($con, $retrieveQuery);

            if ($result && mysqli_num_rows($result) == 1) {
                $existingDetails = mysqli_fetch_assoc($result);
                $existingHashedPassword = $existingDetails['Password'];

                // Check if the old password matches
                if (password_verify($oldPassword, $existingHashedPassword) || $oldPassword == $existingHashedPassword) {
                    // Check if new password and confirm password match
                    if ($newPassword === $confirmPassword) {
                        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $updatePasswordQuery = "UPDATE `user` SET `Password`='$newHashedPassword' WHERE UserID = $UserID";
                        $updatePasswordResult = mysqli_query($con, $updatePasswordQuery);

                        if ($updatePasswordResult) {
                            $message = "Password updated successfully.";
                            $isSuccess = true;
                        } else {
                            $message = "Failed to update password.";
                        }
                    } else {
                        $message = "New password and confirm password do not match.";
                    }
                } else {
                    $message = "Old password is incorrect.";
                }
            } else {
                $message = "Failed to retrieve user details.";
            }
        }

        //Handle Bio details update
        if ($formType == 'change_bio' && isset($_POST['bio'])) {
            $bio = $_POST['bio'];
            $query = "UPDATE `mechanic` SET `Description`='$bio' WHERE MechanicID = $MechanicID";
            $result = mysqli_query($con, $query);
            if ($result) {
                $message = "Bio updated successfully.";
                $isSuccess = true;
            } else {
                $message = "Failed to update bio.";
            }
        }
    } else {
        $message = "Invalid form type";
    }
} else {
    $message = "Invalid Request Method";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <style>
        * {
            font-family: Arial, sans-serif;
        }

        /* Popup styles */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s ease;
        }

        .popup.active {
            visibility: visible;
            opacity: 1;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        .popup-content h2 {
            margin: 5px;
            font-size: xx-large;
        }

        .popup-content p {
            margin: 15px;
            margin-bottom: 20px;
            font-size: large;
        }

        .popup-content .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            background-color: #007bff;
        }

        .popup-content .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Popup HTML -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2><?php echo $isSuccess ? "Success" : "Error"; ?></h2>
            <p><?php echo htmlspecialchars($message); ?></p>
            <button class="btn" onclick="goBack()">OK</button>
        </div>
    </div>

    <script>
        // Display the popup when there is a message
        const popup = document.getElementById('popup');
        const message = "<?php echo $message; ?>";
        if (message) {
            popup.classList.add('active');
        }

        // Function to go back to the previous page
        function goBack() {
            window.location.href = '../profile.php';
        }
    </script>
</body>

</html>