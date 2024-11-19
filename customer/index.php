<?php
require "../shared/connect.php";

session_start();
$userID = $_SESSION['UserID'];
$query = "SELECT * FROM `user` WHERE `user`.`UserID` = '$userID'";
$result = mysqli_query($con, $query);
$userInfo = array();

if(mysqli_num_rows($result) == 1){
    $userInfo = mysqli_fetch_assoc($result);
    print_r($userInfo);
}
else{
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Find Your Mechanic</title>
    <link rel="stylesheet" href="stylesheets/dashboard.css">
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <style>
        #dashboard {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Top Navigation Bar -->

    <?php
    require "header.php";
    ?>

    <main class="content">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome, <?php echo $userInfo['Username'] ?>!</h1>
            <p>Your personalized dashboard is here to help manage your vehicle and service needs efficiently.</p>
        </section>

        <!-- Notification Panel -->
        <section class="notifications">
            <h2>Notifications</h2>
            <div class="notification">
                <p><strong>Upcoming Appointment Reminder:</strong> You have an appointment with John Doe on 2024-11-05 at 10:00 AM.</p>
            </div>
            <div class="notification">
                <p><strong>New Feedback:</strong> Help us improve by providing feedback on your last service.</p>
            </div>
        </section>

        <!-- Overview Section -->
        <section class="overview">
            <h2>Dashboard Overview</h2>
            <div class="overview-cards">
                <div class="card vehicle-card">
                    <h3>Registered Vehicle</h3>
                    <p><strong>Model:</strong> Toyota Corolla 2020</p>
                    <p><strong>License Plate:</strong> ABC-1234</p>
                    <button onclick="window.location.href='#'">Manage Vehicle</button>
                </div>
                <div class="card appointment-card">
                    <h3>Upcoming Appointment</h3>
                    <div class="appointment-progress">
                        <div class="progress-bar" style="width: 75%;"></div>
                    </div>
                    <p><strong>Date:</strong> 2024-11-05</p>
                    <p><strong>Mechanic:</strong> John Doe</p>
                    <button onclick="window.location.href='#'">View Appointment</button>
                </div>
                <div class="card request-card">
                    <h3>Request Service</h3>
                    <p>Need assistance? Book a service with a nearby mechanic.</p>
                    <button onclick="window.location.href='#'">Request Now</button>
                </div>
            </div>
        </section>

        <!-- Recent Services Section -->
        <section class="recent-services">
            <h2>Recent Services</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Service Type</th>
                        <th>Mechanic</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-10-20</td>
                        <td>Oil Change</td>
                        <td>Jane Smith</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>2024-09-15</td>
                        <td>Tire Replacement</td>
                        <td>Mike Johnson</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Feedback Section -->
        <section class="feedback">
            <h2>Provide Feedback</h2>
            <p>We value your input! Please share your feedback on your latest experience.</p>
            <form method="get" action="index.php">
                <br><label for="feedback">Your Feedback</label><br>
                <textarea name="user-feedback" id="feedback" rows="4" placeholder="Share your experience..."></textarea><br>
                <button type="submit">Submit Feedback</button>
            </form>
        </section>
    </main>

    <?php
        require "../shared/footer.php";
    ?>
</body>

</html>