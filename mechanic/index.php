<?php
require_once "../shared/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Dashboard</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
   <link rel="stylesheet" href="index.css">
   <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
</head>
<body>

    <?php
        require_once "header.php";
    ?>

    <!-- Navbar -->
    <!--<div class="navbar">
        <h1>Mechanic Dashboard</h1>
        <div class="nav-links">
            <a href="/findyourmechanic/mechanic/appointment.php">Appointments</a>
            <a href="/findyourmechanic/mechanic/payment.php">Payments</a>
            <a href='/findyourmechanic/mechanic/service.php'>Services</a>
            <a href="/findyourmechanic/mechanic/profile.php">Profile</a>
        </div>
    </div>-->

    <!-- Content Section -->
    <div class="content">
        <h2>Dashboard Overview</h2>
        
        <!-- Cards Section -->
        <div class="card-container">
            <div class="card">
                <h3>Total Appointments</h3>
                <p class="stat">120</p>
                <p>Appointments this month</p>
            </div>
            <div class="card">
                <h3>Completed Repairs</h3>
                <p class="stat">95</p>
                <p>Repairs completed this month</p>
            </div>
            <div class="card">
                <h3>Revenue</h3>
                <p class="stat">$15,000</p>
                <p>Total revenue this month</p>
            </div>
        </div>

        <!-- Upcoming Appointments Table -->
        <div class="appointments">
            <h3>Upcoming Appointments</h3>
            <table>
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Oil Change</td>
                        <td>Nov 2</td>
                        <td>10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>Brake Replacement</td>
                        <td>Nov 3</td>
                        <td>1:30 PM</td>
                    </tr>
                    <tr>
                        <td>Alex Johnson</td>
                        <td>Tire Rotation</td>
                        <td>Nov 4</td>
                        <td>9:00 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
require "../shared/footer.php"

?>

</body>
</html>
