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
        <div class="dashboard-container">


            <h2 class="section-title">Profile Management</h2>
            <form id="profile-form" method="POST" action="update_profile.php">
                <p>UserDetails : <?php print_r($userDetails); ?></p><br>
                <p>MechanicDetails : <?php print_r($mechanicDetails); ?></p><br>
                <div class="form-group">
                    <label for="mechanic-name">Mechanic Name</label>
                    <input type="text" id="mechanic-name" name="mechanic_name" value="<?php echo $userDetails['Username']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="qualifications">Specification</label>
                    <input type="text" id="specification" name="specification" value="<?php echo$mechanicDetails['Specification'] ?>">
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" id="salary" name="salary" step="0.01">
                </div>
                <div class="form-group">
                    <label for="working-hours">Working Hours</label>
                    <input type="text" id="working-hours" name="working_hours">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone">
                </div>
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <?php
    require "../shared/footer.php"

    ?>





</body>

</html>