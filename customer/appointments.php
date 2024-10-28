<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="stylesheets/appointments.css">
    <link rel="stylesheet" href="stylesheets/header.css">
    <style>
        #appointments {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    ?>
    <div class="container">
        <!-- Header with Add Appointment Button -->
        <div class="header">
            <h2>Appointments</h2>
            <button class="btn-add" onclick="window.location.href='add_appointment.html'">Add New Appointment</button>
        </div>

        <!-- Pending Appointments Table -->
        <div class="table-container">
            <div class="table-title">Pending Appointments</div>
            <table>
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Mechanic</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-11-05</td>
                        <td>10:00 AM</td>
                        <td>John's Auto Repair</td>
                        <td>Honda Civic - ABC1234</td>
                        <td><span class="status-pending">Pending</span></td>
                        <td><button class="view-btn">View</button></td>
                    </tr>
                    <!-- Add more pending appointments here -->
                </tbody>
            </table>
        </div>

        <!-- Past Appointments Table -->
        <div class="table-container">
            <div class="table-title">Past Appointments</div>
            <table>
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Mechanic</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-10-15</td>
                        <td>2:00 PM</td>
                        <td>Quick Fix Garage</td>
                        <td>Toyota Corolla - XYZ5678</td>
                        <td><span class="status-completed">Completed</span></td>
                        <td><button class="view-btn">View</button></td>
                    </tr>
                    <!-- Add more past appointments here -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>