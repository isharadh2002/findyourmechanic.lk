<?php
require "../shared/connect.php";
session_start();

if (isset($_SESSION['UserID']) && isset($_GET['appointment_id'])) {
    $UserID = $_SESSION['UserID'];
    $appointmentID = $_GET['appointment_id'];


    $query = "SELECT * FROM `appointment` INNER JOIN `vehicle` ON `vehicle`.`VehicleID` = `appointment`.`VehicleID` 
    INNER JOIN `mechanic` ON `mechanic`.`MechanicID` = `appointment`.`MechanicID` INNER JOIN `user`
    ON `mechanic`.`UserID` = `user`.`UserID` WHERE `appointment`.`AppointmentID`= $appointmentID;";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) ==1) {
        $appointment = mysqli_fetch_assoc($result);
        //print_r($appointment);
        //echo "<br><br>";
    }
} else {
    echo "<script>window.alert(\"You are not logged in\");
    window.location.href='../';</script>";
}

function convertTimeTo12H($time24)
{
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
    <title>Appointment Details</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/appointment-details.css"> <!-- Link to main CSS file if you have one -->
    <style>
        #StatusIndicator{
            color: 
            <?php 
                if ($appointment['Status'] === 'Completed') {
                    echo '#2ecc71'; // Green
                } else {
                    echo '#e67e22'; // Amber
                }
            ?>;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header with Back Button -->
        <div class="header">
            <h2>Appointment Details</h2>
            <a href="appointments.php" class="btn-back">Back to Appointments</a>
        </div>

        <!-- Appointment Details Cards -->
        <div class="detail-card">
            <div>
                <h3>Appointment Date</h3>
                <p><?php echo explode(" ", $appointment['ScheduleDate'])[0]; ?></p>
            </div>
            <div>
                <h3>Time</h3>
                <p><?php echo convertTimeTo12H(explode(" ", $appointment['ScheduleDate'])[1]); ?></p>
            </div>
        </div>

        <div class="detail-card">
            <div>
                <h3>Mechanic</h3>
                <p><?php echo $appointment['Username']; ?></p>
            </div>
            <div>
                <h3>Vehicle</h3>
                <p><?php echo $appointment['Brand'] . " " . $appointment['Model'] . " - " . $appointment['RegistrationNumber']; ?></p>
            </div>
        </div>

        <div class="detail-card">
            <div>
                <h3>Status</h3>
                <p class="highlight" id="StatusIndicator"><?php echo $appointment['Status']; ?></p>
            </div>
            <div>
                <h3>Contact</h3>
                <p><?php echo $appointment['WorkPhoneNumber']; ?></p>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="notes-section">
            <h4>Notes</h4>
            <p><?php echo $appointment['IssueDescription']; ?></p>
        </div>
    </div>
</body>

</html>