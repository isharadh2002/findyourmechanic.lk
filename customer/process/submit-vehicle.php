<?php
session_start();
require "../../shared/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_SESSION['UserID']) && isset($_GET['vehicle_brand']) && isset($_GET['vehicle_model']) && isset($_GET['vehicle_year']) && isset($_GET['license_plate'])) {
        $UserID = $_SESSION['UserID'];
        $vehicle_brand = $_GET['vehicle_brand'];
        $vehicle_model = $_GET['vehicle_model'];
        $vehicle_year = $_GET['vehicle_year'];
        $license_plate = $_GET['license_plate'];

        echo "UserID : $UserID";
        echo "Vehicle Brand : $vehicle_brand";
        echo "Vehicle Model : $vehicle_model";
        echo "Vehicle Year : $vehicle_year";
        echo "License Plate : $license_plate";

        $checkRegistrationQuery = "SELECT * FROM `vehicle` WHERE RegistrationNumber = '$license_plate'";
        $checkRegistrationResult = mysqli_query($con, $checkRegistrationQuery);
        /*if (mysqli_num_rows($checkRegistrationResult) > 0) {
            echo "<script>window.alert('Vehicle Already Registered');
            window.location.href='../add-vehicle.php';</script>";
        }

        $insertQuery = "INSERT INTO `vehicle` (`UserID`, `RegistrationNumber`, `Brand`, `Model`, `Year`) VALUES ('$UserID', '$license_plate', '$vehicle_brand', '$vehicle_model', '$vehicle_year');";
        $insertResult = mysqli_query($con, $insertQuery);
        print_r($insertResult);*/
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration Status</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Centered container for the popup */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .popup-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .popup-box p {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        .popup-box button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-box button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php if (mysqli_num_rows($checkRegistrationResult) > 0): ?>
        <!-- Display popup if the vehicle is already registered -->
        <div class="popup-overlay">
            <div class="popup-box">
                <p>This vehicle is already registered.</p>
                <button onclick="redirectToAddVehicle()">OK</button>
            </div>
        </div>
        <?php else:
        // Insert new vehicle data if registration number is unique
        $insertQuery = "INSERT INTO `vehicle` (`UserID`, `RegistrationNumber`, `Brand`, `Model`, `Year`) VALUES ('$UserID', '$license_plate', '$vehicle_brand', '$vehicle_model', '$vehicle_year');";
        if (mysqli_query($con, $insertQuery)): ?>
            <div class='popup-overlay'>
                <div class='popup-box'>
                    <p>Vehicle added successfully.</p>
                    <button onclick='redirectToAddVehicle()'>OK</button>
                </div>
            </div>
        <?php else: ?>
            <div class='popup-overlay'>
                <div class='popup-box'>
                    <p>Error: Could not add vehicle. Please try again.</p>
                    <button onclick='redirectToAddVehicle()'>OK</button>
                </div>
            </div>
    <?php endif;

    endif; ?>
    <script>
        function redirectToAddVehicle() {
            window.location.href = '../vehicles.php';
        }
    </script>
</body>

</html>