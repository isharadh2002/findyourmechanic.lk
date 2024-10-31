<?php
session_start();
if(isset($_SESSION['UserID'])){
    $UserID = $_SESSION['UserID'];
    print_r($UserID);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Vehicle - Find Your Mechanic</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/vehicles.css">
    <style>
        #vehicles{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    ?>

<main class="container">
        <h1>Registered Vehicles</h1>
        <button onclick="location.href='add-vehicle.php'" class="add-vehicle-btn">+ Add Vehicle</button>
        
        <table class="vehicle-table">
            <thead>
                <tr>
                    <th>Vehicle ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Registration Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP to dynamically load registered vehicles -->
                <?php
                    include '../shared/connect.php';

                    $sql = "SELECT VehicleID , RegistrationNumber, Brand, Model FROM vehicle";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["VehicleID"] . "</td>";
                            echo "<td>" . $row["Brand"] . "</td>";
                            echo "<td>" . $row["Model"] . "</td>";
                            echo "<td>" . $row["RegistrationNumber"] . "</td>";
                            echo "<td><a href=\"#\">Remove<a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No vehicles registered yet.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>