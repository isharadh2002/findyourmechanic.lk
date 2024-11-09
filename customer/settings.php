<?php
function convertToSentenceCase($text)
{
    // Convert the entire string to lowercase
    $text = strtolower($text);

    // Capitalize the first letter of the entire string
    $text = ucfirst($text);

    return $text;
}

require "../shared/connect.php";
session_start();
if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];

    $query = "SELECT * FROM `user` WHERE `user`.`UserID`=$UserID";
    $result = mysqli_query($con, $query);
    $userDetails = "";

    if (mysqli_num_rows($result) == 1) {
        $userDetails = mysqli_fetch_assoc($result);
    } else {
        echo "<script>window.alert(\"Something went wrong when retrieving data. Please try again. \");
    window.location.href='../';</script>";
    }

    //Retrieving Profile Picture Information
    $queryCustomerTable = "SELECT ProfilePicture FROM customer WHERE UserID = $UserID;";
    $result = mysqli_query($con, $queryCustomerTable);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['ProfilePicture'])) {
            $profilePicture = "../" . $row['ProfilePicture'];
        } else {
            $profilePicture = "../assets/DefaultProfilePicture.png";
        }
    } else {
        $profilePicture = "../assets/DefaultProfilePicture.png";
    }
} else {
    echo "<script>window.alert(\"You are not logged in\");
    window.location.href='../';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/settings.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <script defer src="script.js"></script>
    <style>
        #settings {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    ?>
    
    <!-- Main Content -->
    <main class="settings-container">
        <!-- Profile Section -->
        <section class="profile-section">
            <div class="profile-logo">
                <img src="<?php echo $profilePicture ?>" alt="Profile Picture" class="profile-picture">
                <button class="upload-btn" onclick="window.location.href='upload-profilepicture.php'">Upload New</button>
            </div>
            <h2><?php echo convertToSentenceCase($userDetails['Username']); ?></h2>
            <p><?php echo convertToSentenceCase($userDetails['UserType']); ?></p>
        </section>

        <!-- Account Information Section -->
        <section class="settings-card">
            <h3>Personal Details</h3>
            <form id="personal-details-form" method="post" action="process/submit-settings.php">
                <input type="hidden" name="form_type" value="personal_details">

                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $userDetails['Username']; ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $userDetails['Email']; ?>">

                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" name="contact" value="<?php echo $userDetails['PhoneNumber']; ?>">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $userDetails['Address']; ?>">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </section>

        <section class="settings-card">
            <h3>Password Change</h3>
            <form id="password-change-form" method="post" action="process/submit-settings.php">

                <input type="hidden" name="form_type" value="change_password">

                <label for="old-password">Old Password</label>
                <input type="password" id="old-password" name="old-password" required>

                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" minlength="6" required>

                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" name="confirm-password" minlength="6" required>

                <p id="password-error-message" class="error-message"></p>

                <button type="submit" class="save-btn">Update Password</button>
            </form>
        </section>

        <!-- Popup Box for Messages -->
        <div id="popup-box" class="popup-box">
            <div class="popup-content">
                <span id="popup-message"></span>
                <button id="popup-close-btn" class="popup-btn">OK</button>
            </div>
        </div>
        <!--
        <section class="settings-card">
            <h3>Notifications</h3>
            <label class="toggle-switch">
                <input type="checkbox" checked>
                <span class="slider"></span>
                Email Notifications
            </label>
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="slider"></span>
                SMS Notifications
            </label>
        </section> -->

    </main>
    <script>
        const oldPassword = document.getElementById("old-password");
        const newPassword = document.getElementById("new-password");
        const confirmPassword = document.getElementById("confirm-password");
        const errorMessage = document.getElementById("password-error-message");
        const form = document.getElementById("password-change-form");
        const popupBox = document.getElementById("popup-box");
        const popupMessage = document.getElementById("popup-message");
        const popupCloseBtn = document.getElementById("popup-close-btn");

        // Real-time validation for confirm password input
        function validatePasswords() {
            if (newPassword.value.length < 6) {
                errorMessage.textContent = "New password must be at least 6 characters long.";
                setErrorStyles();
                return false;
            }

            if (newPassword.value !== confirmPassword.value) {
                errorMessage.textContent = "Passwords do not match.";
                setErrorStyles();
                return false;
            }

            clearErrorStyles();
            errorMessage.textContent = "";
            return true;
        }

        // Apply error styles
        function setErrorStyles() {
            newPassword.classList.add("input-error");
            confirmPassword.classList.add("input-error");
            newPassword.classList.remove("input-success");
            confirmPassword.classList.remove("input-success");
        }

        // Clear error styles
        function clearErrorStyles() {
            newPassword.classList.add("input-success");
            confirmPassword.classList.add("input-success");
            newPassword.classList.remove("input-error");
            confirmPassword.classList.remove("input-error");
        }

        // Show popup box
        function showPopup(message) {
            popupMessage.textContent = message;
            popupBox.style.display = "flex";
        }

        // Close popup box
        popupCloseBtn.addEventListener("click", function() {
            popupBox.style.display = "none";
        });

        // Event listener for real-time validation
        confirmPassword.addEventListener("input", validatePasswords);
        newPassword.addEventListener("input", validatePasswords);

        // Form submission validation
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Stop form submission initially
            if (!validatePasswords()) {
                showPopup("Please correct the errors before submitting.");
            } else {
                // Submit the form manually after showing the success popup
                showPopup("Processing request. Please wait...");

                // Wait briefly before submitting to allow user to see the message
                setTimeout(() => {
                    form.submit();
                }, 1000); // 1-second delay
            }
        });
    </script>
    <br>
    <?php
    //print_r($userDetails);
    require "../shared/footer.php";
    ?>
</body>

</html>