<?php
session_start();
if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];
    print_r($UserID);
} else {
    echo "<script>window.alert(\"You are not logged in\");
    window.location.href='../';</script>";
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
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <style>
        #vehicles {
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

                $sql = "SELECT VehicleID , RegistrationNumber, Brand, Model FROM vehicle WHERE `vehicle`.`UserID`=$UserID";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["VehicleID"] . "</td>";
                        echo "<td>" . $row["Brand"] . "</td>";
                        echo "<td>" . $row["Model"] . "</td>";
                        echo "<td>" . $row["RegistrationNumber"] . "</td>";
                        echo "<td><button class='remove-button' onclick=\"openPopup({$row['VehicleID']})\">Remove</button></td>";
                        echo "</tr>\n";
                    }
                } else {
                    echo "<tr><td colspan='4'>No vehicles registered yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <!-- Delete Confirmation Popup -->
    <div id="deletePopup" class="popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <h2>Warning!</h2>
            <p>Deleting this vehicle will also delete all related appointments and records. Are you sure you want to proceed?</p>
            <button class="confirm-button" onclick="confirmDelete()">Yes</button>
            <button class="cancel-button" onclick="closePopup()">No</button>
        </div>
    </div>

    <script>
        let vehicleIDToDelete = null; // To store the vehicle ID to delete

        // Function to open the confirmation popup
        function openPopup(vehicleID) {
            vehicleIDToDelete = vehicleID; // Store the vehicle ID
            document.getElementById("deletePopup").style.display = "block"; // Show the popup
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("deletePopup").style.display = "none"; // Hide the popup
            vehicleIDToDelete = null; // Reset the vehicle ID
        }

        // Function to confirm deletion
        function confirmDelete() {
            // Redirect to the removal URL
            window.location.href = "process/remove-vehicle.php?VehicleID=" + vehicleIDToDelete;
        }
    </script>

    <?php
    require "../shared/footer.php";
    ?>
</body>

</html>