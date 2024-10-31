<?php
session_start();

// Redirect if mechanic ID isn't set
if (!isset($_GET['mechanic-id'])) {
    header("Location: add-appointment.php");
    exit;
}

// Capture mechanic ID and connect to database
$mechanicId = $_GET['mechanic-id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findyourmechanic";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get mechanic details
$sql = "SELECT `Username` FROM `mechanic` INNER JOIN  `user` ON `mechanic`.`UserID` = `user`.`UserID` WHERE MechanicID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $mechanicId);
$stmt->execute();
$stmt->bind_result($mechanicName);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/add-appointment-details.css">
</head>

<body>
    <?php
    require "header.php";
    ?>
    <main class="main-container">
        <div class="container">
            <h2>Schedule Your Appointment</h2>
            <p class="mechanic-info">Mechanic: <strong><?php echo htmlspecialchars($mechanicName); ?></strong></p>

            <form id="appointmentForm" action="submit-appointment.php" method="GET">
                <input type="hidden" name="mechanic-id" value="<?php echo htmlspecialchars($mechanicId); ?>">

                <label for="vehicle_id">Select Your Vehicle:</label>
                <select id="vehicle_id" name="vehicle_id" required>
                    <?php
                    //$userId = $_SESSION['user_id'];
                    $userID = 3;
                    $sql = "SELECT * FROM vehicle WHERE UserID = $userID";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=\"{$row['VehicleID']}\">{$row['RegistrationNumber']} - {$row['Brand']} {$row['Model']}</option>";
                            //print_r($row);
                        }
                    } else {
                        echo "<option>No Vehicles Found</option>";
                    }
                    ?>
                </select>

                <label for="appointment_date">Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">

                <label for="appointment_time">Time:</label>
                <input type="time" id="appointment_time" name="appointment_time" required>

                <label for="issue_description">Describe the Issue:</label>
                <textarea id="issue_description" name="issue_description" rows="4" placeholder="Describe the issue in detail" required></textarea>

                <button type="submit" id="submitBtn">Confirm Appointment</button>
            </form>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmationModal" class="modal">
            <div class="modal-content">
                <h3>Confirm Appointment</h3>
                <p>Are you sure you want to schedule this appointment?</p>
                <button id="confirmYes">Yes</button>
                <button id="confirmNo">No</button>
            </div>
        </div>

        <!-- Warning Modal -->
        <div id="warningModal" class="modal">
            <div class="modal-content">
                <h3>Warning</h3>
                <p>Please select a vehicle to continue.</p>
                <button id="warningOk">OK</button>
            </div>
        </div>

    </main>
    <script>
        const form = document.getElementById("appointmentForm");
        const modal = document.getElementById("confirmationModal");
        const warningModal = document.getElementById("warningModal"); // New warning modal
        const submitBtn = document.getElementById("submitBtn");
        const confirmYes = document.getElementById("confirmYes");
        const confirmNo = document.getElementById("confirmNo");
        const warningOk = document.getElementById("warningOk"); // OK button for warning modal
        const vehicleSelect = document.getElementById("vehicle_id");

        submitBtn.addEventListener("click", function(event) {
            // Check if a vehicle is selected
            if (vehicleSelect.value === "" || vehicleSelect.value === "No Vehicles Found") {
                event.preventDefault();
                warningModal.style.display = "flex"; // Show warning modal
            } else {
                // Show confirmation modal if a vehicle is selected
                event.preventDefault();
                modal.style.display = "flex"; // Use flex to center modal content
            }
        });

        confirmYes.addEventListener("click", function() {
            form.submit();
        });

        confirmNo.addEventListener("click", function() {
            modal.style.display = "none";
        });

        warningOk.addEventListener("click", function() {
            warningModal.style.display = "none"; // Hide warning modal
        });
    </script>
</body>

</html>

<?php $conn->close(); ?>