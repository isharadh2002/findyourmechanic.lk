<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Dashboard</title>
    <link rel="stylesheet" href="../stylesheets/header.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <style>
        /* General Reset and Layout */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f3f8ff;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Navbar */
        .navbar {
            width: 100%;
            background-color: #0066cc;
            padding: 1em 2em;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.2em;
        }
        .navbar h1 {
            font-weight: bold;
        }
        .navbar .nav-links a {
            color: #fff;
            margin: 0 1em;
            text-decoration: none;
        }
        /* Main Content */
        .content {
            width: 90%;
            max-width: 1200px;
            margin-top: 2em;
            display: flex;
            flex-direction: column;
            gap: 1.5em;
        }
        .content h2 {
            color: #0066cc;
            font-weight: 600;
        }
        /* Cards for Data Display */
        .card-container {
            display: flex;
            justify-content: space-between;
            gap: 1em;
            flex-wrap: wrap;
        }
        .card {
            flex: 1 1 30%;
            background-color: #eaf3ff;
            border-radius: 10px;
            padding: 1.5em;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            color: #004a99;
            font-size: 1.2em;
        }
        .card p {
            font-size: 1em;
            color: #333;
            margin-top: 0.5em;
        }
        .card .stat {
            font-size: 2em;
            font-weight: bold;
            color: #0066cc;
        }
        /* Upcoming Appointments Table */
        .appointments {
            background-color: #eaf3ff;
            border-radius: 10px;
            padding: 1.5em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }
        .appointments table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
        }
        .appointments th, .appointments td {
            padding: 0.8em;
            border-bottom: 1px solid #ddd;
        }
        .appointments th {
            background-color: #0066cc;
            color: #fff;
        }
        .appointments td {
            color: #333;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>Mechanic Dashboard</h1>
        <div class="nav-links">
            <a href="/findyourmechanic/mechanic/appointment.php">Appointments</a>
            <a href="../payment.php">Payments</a>
            <a href='../service.php'>Services</a>
            <a href="../profile.php">Profile</a>
        </div>
    </div>

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
