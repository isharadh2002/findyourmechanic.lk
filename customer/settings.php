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
                <img src="../assets/FindYourMechanic_Circle.png" alt="Profile Picture" class="profile-picture">
                <button class="upload-btn" onclick="window.location.href='upload-profilepicture.php'">Upload New</button>
            </div>
            <h2><?php echo convertToSentenceCase($userDetails['Username']); ?></h2>
            <p><?php echo convertToSentenceCase($userDetails['UserType']); ?></p>
        </section>

        <!-- Account Information Section -->
        <section class="settings-card">
            <h3>Personal Details</h3>
            <form id="personal-details-form" method="get" action="process/submit-settings.php">
                <input type="hidden" name="form_type" value="personal_details">

                <label for="name">Name</label>
                <input type="text" id="name" value="<?php echo $userDetails['Username']; ?>">

                <label for="email">Email</label>
                <input type="email" id="email" value="<?php echo $userDetails['Email']; ?>">

                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" value="<?php echo $userDetails['PhoneNumber']; ?>">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </section>

        <section class="settings-card">
            <h3>Password Change</h3>
            <form id="password-change-form" method="get" action="process/submit-settings.php">

                <input type="hidden" name="form_type" value="change_password">

                <label for="old-password">Old Password</label>
                <input type="password" id="old-password">

                <label for="new-password">New Password</label>
                <input type="password" id="new-password">

                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password">

                <p id="password-error-message" class="error-message"></p>

                <button type="submit" class="save-btn">Update Password</button>
            </form>
        </section>
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
        const newPassword = document.getElementById("new-password");
        const confirmPassword = document.getElementById("confirm-password");
        const errorMessage = document.getElementById("password-error-message");

        // Real-time validation on confirm password input
        confirmPassword.addEventListener("input", function() {
            if (confirmPassword.value === newPassword.value) {
                // Passwords match: apply success styles, hide error message
                newPassword.classList.add("input-success");
                confirmPassword.classList.add("input-success");
                newPassword.classList.remove("input-error");
                confirmPassword.classList.remove("input-error");
                errorMessage.textContent = ""; // Clear error message
            } else {
                // Passwords do not match: apply error styles, show error message
                newPassword.classList.remove("input-success");
                confirmPassword.classList.remove("input-success");
                newPassword.classList.add("input-error");
                confirmPassword.classList.add("input-error");
                errorMessage.textContent = "Passwords do not match."; // Display error message
            }
        });

        // Submit form validation
        document.getElementById("password-change-form").addEventListener("submit", function(event) {
            event.preventDefault();
            if (newPassword.value === confirmPassword.value) {
                alert("Password updated successfully!");
            } else {
                alert("Please ensure the passwords match before submitting.");
            }
        });
    </script>
    <br>
    <?php
    print_r($userDetails);
    require "../shared/footer.php";
    ?>
</body>

</html>