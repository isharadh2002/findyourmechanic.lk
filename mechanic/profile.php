<?php
function convertToSentenceCase($text)
{
    // Convert the entire string to lowercase
    $text = strtolower($text);

    // Capitalize the first letter of the entire string
    $text = ucwords($text);

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
    $queryCustomerTable = "SELECT * FROM mechanic WHERE UserID = $UserID;";
    $result = mysqli_query($con, $queryCustomerTable);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['ProfilePicture'])) {
            $mechanicDetails = $row;
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
    <title>Mechanic Dashboard</title>
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="header.css">
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
</head>

<body>

    <?php
    require "header.php";
    ?>
    <div class="container">
        <!-- Profile Section -->
        <section class="profile-section">
            <div class="profile-logo">
                <img src="<?php echo $profilePicture ?>" alt="Profile Picture" class="profile-picture">
                <button class="upload-btn" onclick="window.location.href='upload-profilepicture.php'">Upload New</button>
            </div>
            <h2><?php echo convertToSentenceCase($userDetails['Username']); ?></h2>
            <p><?php echo convertToSentenceCase($userDetails['UserType']); ?></p>
        </section>
        <div class="profile-settings">
            <h2 class="section-title">Profile Management</h2>
            <form id="profile-form" method="POST" action="process/update_profile.php">
                <input type="hidden" name="form_type" value="change_profile">
                <div class="form-group">
                    <label for="mechanic-name">Mechanic Name</label>
                    <input type="text" id="mechanic-name" name="mechanic_name" value="<?php echo $userDetails['Username']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $userDetails['Email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="qualifications">Specification</label>
                    <input type="text" id="specification" name="specification" value="<?php echo $mechanicDetails['Specification'] ?>" required>
                </div>
                <!--
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" id="salary" name="salary" step="0.01">
                </div>
                -->
                <div class="form-group">
                    <label for="working-hours">Working Hours</label>
                    <input type="text" id="working-hours" name="working_hours" value="<?php echo $mechanicDetails['WorkingHours'] ?>" placeholder="e.g.: 08.00 AM - 04.00 PM" required>
                </div>
                <div class="form-group">
                    <label for="address">Work Address</label>
                    <input type="text" id="address" name="address" value="<?php echo $mechanicDetails['WorkAddress'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="personal_phone">Personal Phone Number</label>
                    <input type="text" id="personal_phone" name="personal_phone" value="<?php echo $userDetails['PhoneNumber'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="work_phone">Work Phone Number</label>
                    <input type="text" id="work_phone" name="work_phone" value="<?php echo $mechanicDetails['WorkPhoneNumber'] ?>" required>
                </div>
                <button type="submit">Update Profile</button>
            </form>
        </div>

        <div class="password-settings">
            <h3 class="section-title">Password Change</h3>
            <form id="password-change-form" method="post" action="process/update_profile.php">
                <input type="hidden" name="form_type" value="change_password">

                <div class="form-group">
                    <label for="old-password">Old Password</label>
                    <input type="password" id="old-password" name="old-password" required>
                </div>

                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="new-password" minlength="6" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" minlength="6" required>
                </div>

                <p id="password-error-message" class="error-message"></p>

                <button type="submit" class="save-btn">Update Password</button>
            </form>
        </div>

        <div class="bio-settings">
            <h3 class="section-title">Manage Bio</h3>
            <form id="bio-change-form" method="post" action="process/update_profile.php">
                <input type="hidden" name="form_type" value="change_bio">

                <div class="form-group">
                    <label for="bio">Bio Details</label>
                    <!-- Changed from input text to textarea -->
                    <textarea id="bio" name="bio" rows="5" maxlength="4000" placeholder="Enter bio details" required><?php echo $mechanicDetails['Description'] ?></textarea>
                    <div class="character-counter">
                        <span id="charCount">0</span>/4000 characters
                    </div>
                </div>

                <button type="submit">Update Bio</button>
            </form>
        </div>
    </div>

    <div id="popup-box" class="popup-box">
        <div class="popup-content">
            <span id="popup-message"></span>
            <button id="popup-close-btn" class="popup-btn">OK</button>
        </div>
    </div>

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

    <script>
        //Script to count characters in the textarea
        document.addEventListener("DOMContentLoaded", function() {
            const bioTextarea = document.getElementById("bio");
            const charCountSpan = document.getElementById("charCount");
            const maxLength = 4000;

            // Set initial character count based on existing text
            charCountSpan.textContent = bioTextarea.value.length;

            // Update character count on input
            bioTextarea.addEventListener("input", () => {
                const currentLength = bioTextarea.value.length;
                charCountSpan.textContent = currentLength;
            });
        });
    </script>

    <?php
    require "../shared/footer.php"

    ?>





</body>

</html>