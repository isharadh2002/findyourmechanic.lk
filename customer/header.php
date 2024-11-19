<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../shared/connect.php";

if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];

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
}

?>

<header class="navbar">
    <img src="../assets/FindYourMechanic_Circle.png" alt="Website Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php" id="dashboard">Dashboard</a></li>
            <li><a href="vehicles.php" id="vehicles">My Vehicles</a></li>
            <li><a href="appointments.php" id="appointments">Appointments</a></li>
            <!--
            <li><a href="#" id="servicehistory">Service History</a></li>
            <li><a href="#" id="feedback">Feedback</a></li>
            -->
            <li><a href="settings.php" id="settings">Account Settings</a></li>
        </ul>
    </nav>
    <div class="profile-section-header">
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-pic">
        <a href="logout.php" id="logout" class="logout-btn">Logout</a>
    </div>
</header>