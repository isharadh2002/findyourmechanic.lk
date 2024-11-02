<?php
require "../shared/connect.php";
session_start();

if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];

    $query = "SELECT * FROM `appointment` INNER JOIN `vehicle` ON `vehicle`.`VehicleID` = `appointment`.`VehicleID` 
    INNER JOIN `mechanic` ON `mechanic`.`MechanicID` = `appointment`.`MechanicID` INNER JOIN `user`
    ON `mechanic`.`UserID` = `user`.`UserID` WHERE `appointment`.`UserID`= $UserID;";
    $result = mysqli_query($con, $query);

    $pendingAppointments = array();
    $finishedAppointments = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Status'] == 'Completed') {
                $finishedAppointments[] = $row;
            } else {
                $pendingAppointments[] = $row;
            }
            //print_r($row);
            //echo "<br><br>";
        }
    }
} else {
    echo "<script>window.alert(\"You are not logged in\");
    window.location.href='../';</script>";
}

function convertTimeTo12H($time24) {
    // Create a DateTime object from the 24-hour format time
    $dateTime = DateTime::createFromFormat('H:i:s', $time24);
    
    // Format the time to 12-hour format with AM/PM
    return $dateTime->format('h:i A');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="stylesheets/appointments.css">
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
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
            <button class="btn-add" onclick="window.location.href='add-appointment.php'">Add New Appointment</button>
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
                        <td><button class="view-btn" onclick="redirectToDetails(3)">View</button></td>
                    </tr>
                    <?php
                    foreach ($pendingAppointments as $pendingAppointment):
                    ?>
                        <tr>
                            <td><?php echo explode(" ", $pendingAppointment['ScheduleDate'])[0] ?></td>
                            <td><?php echo convertTimeTo12H(explode(" ", $pendingAppointment['ScheduleDate'])[1]) ?></td>
                            <td><?php echo $pendingAppointment['Username'] ?></td>
                            <td><?php echo $pendingAppointment['Brand'] . " " . $pendingAppointment['Model'] . " - " . $pendingAppointment['RegistrationNumber'] ?></td>
                            <td><span class="status-pending"><?php echo $pendingAppointment['Status'] ?></span></td>
                            <td><button class="view-btn" onclick="redirectToDetails(3)">View</button></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
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
                        <td><button class="view-btn" onclick="redirectToDetails(2)">View</button></td>
                    </tr>
                    <!-- Add more past appointments here -->
                    <?php
                    foreach ($finishedAppointments as $finishedAppointment):
                    ?>
                        <tr>
                            <td><?php echo explode(" ", $finishedAppointment['ScheduleDate'])[0] ?></td>
                            <td><?php echo convertTimeTo12H(explode(" ", $finishedAppointment['ScheduleDate'])[1]) ?></td>
                            <td><?php echo $finishedAppointment['Username'] ?></td>
                            <td><?php echo $finishedAppointment['Brand'] . " " . $finishedAppointment['Model'] . " - " . $finishedAppointment['RegistrationNumber'] ?></td>
                            <td><span class="status-completed"><?php echo $finishedAppointment['Status'] ?></span></td>
                            <td><button class="view-btn" onclick="redirectToDetails(3)">View</button></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require "../shared/footer.php";
    ?>
    <script>
        let AppointmentID;

        function redirectToDetails(AppointmentID) {
            window.location.href = 'appointment-details?appointment_id=' + AppointmentID;
        }
    </script>
</body>

</html>