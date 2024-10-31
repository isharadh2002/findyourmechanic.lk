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
            <img src="profile.jpg" alt="Profile Picture" class="profile-picture">
            <button class="upload-btn">Upload New</button>
            <h2>John Doe</h2>
            <p>Customer</p>
        </section>

        <!-- Account Information Section -->
        <section class="settings-card">
            <h3>Personal Details</h3>
            <form id="personal-details-form">
                <label for="name">Name</label>
                <input type="text" id="name" value="John Doe">

                <label for="email">Email</label>
                <input type="email" id="email" value="johndoe@example.com">

                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" value="+1234567890">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </section>

        <section class="settings-card">
            <h3>Password Change</h3>
            <form id="password-change-form">
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
        </section>
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
        require "../shared/footer.php";
    ?>
</body>

</html>