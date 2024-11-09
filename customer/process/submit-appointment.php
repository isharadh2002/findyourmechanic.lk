<?php
require "../../shared/connect.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (
        isset($_SESSION['UserID']) && isset($_GET['mechanic_id']) && isset($_GET['vehicle_id']) && isset($_GET['service_type'])
        && isset($_GET['appointment_date']) && isset($_GET['appointment_time']) && isset($_GET['issue_description']) && isset($_GET['location'])
    ) {
        $UserID = $_SESSION['UserID'];
        $MechanicID = $_GET['mechanic_id'];
        $VehicleID = $_GET['vehicle_id'];
        $ServiceType = $_GET['service_type'];
        $AppointmentDate = $_GET['appointment_date'];
        $AppointmentTime = $_GET['appointment_time'] . ":00";
        $Location = $_GET['location'];
        $IssueDescription = $_GET['issue_description'];

        echo "<strong>User ID : $UserID, MechanicID : $MechanicID, Vehicle ID : $VehicleID, Service Type : $ServiceType,
        Appointment Date : $AppointmentDate, Appointment Time : $AppointmentTime, Location : $Location, Issue Description : $IssueDescription</strong><br><br>";

        $insertQuery = "INSERT INTO `appointment` (`UserID`, `MechanicID`, `VehicleID`, `ServiceType`, `ScheduleDate`, `IssueDescription`, `Location`, `Status`) VALUES 
        ($UserID, $MechanicID, $VehicleID, '$ServiceType', '$AppointmentDate $AppointmentTime', '$IssueDescription', '$Location', 'Scheduled');";

        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            $message = "Appointment added successfully.";
        } else {
            $message = "Error adding appointment. Please try again.";
        }
    } else {
        $message = "Invalid appointment details.";
    }
} else {
    header('location:../add-appointment.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <link rel="stylesheet" href="../../styles/style.css"> <!-- Link to your main CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Popup Box Styles */
        .popup {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            background-color: rgba(0, 0, 0, 0.7);
            /* Dark background with transparency */
            z-index: 999;
            /* Sit on top */
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
        }

        .popup-content {
            background-color: white;
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            /* Shadow effect */
            padding: 20px;
            width: 400px;
            /* Could be more or less, depending on screen size */
            text-align: center;
            margin: auto;
            margin-top: 20%;
        }

        h2 {
            margin: 0;
            /* Remove default margin */
            padding-bottom: 15px;
            /* Space below heading */
            color: #333;
            /* Dark gray text color */
        }

        .close-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            /* Rounded button */
            cursor: pointer;
            transition: background-color 0.3s;
            /* Smooth transition */
        }

        .close-btn:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }
    </style>
</head>

<body onload="showPopup()">

    <div class="popup" id="successPopup">
        <div class="popup-content">
            <h2><?php echo $message; ?></h2>
            <button class="close-btn" onclick="redirectToAppointments()">OK</button>
        </div>
    </div>

    <script>
        function showPopup() {
            document.getElementById('successPopup').style.display = 'block';
        }

        function redirectToAppointments() {
            window.location.href = '../appointments.php'; // Replace with the actual path to your appointments page
        }
    </script>
</body>

</html>