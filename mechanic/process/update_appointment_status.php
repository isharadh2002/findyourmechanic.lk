<?php
session_start();
require_once "../../shared/connect.php";
if (isset($_SESSION['MechanicID']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['appointment_id']) && $_POST['status']) {
        $appointmentID = $_POST['appointment_id'];
        $status = $_POST['status'];
        $query = "UPDATE `appointment` SET `Status`='{$status}' WHERE AppointmentID={$appointmentID}";
        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Updated Appointment Sucessfully";
            $popupType = "success";
        } else {
            $message = "Failed to update appointment";
            $popupType = "error";
        }
    } else {
        $message = "Invalid Parameters !!";
        $popupType = "error";
    }
} else {
    $message = "You are not logged in !!!";
    $popupType = "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Popup box styles */
        .popup-box {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s;
        }

        .popup-content {
            background: #fff;
            padding: 10px;
            padding-bottom: 20px;
            border-radius: 8px;
            max-width: 300px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .popup-content h2 {
            margin-bottom: 20px;
        }

        .popup-content button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }

        .success {
            background-color: #28a745;
        }

        .error {
            background-color: #dc3545;
        }
    </style>
</head>

<body>

    <div id="popupBox" class="popup-box">
        <div class="popup-content">
            <h2 id="popupMessage"></h2>
            <button id="popupButton" class="success">OK</button>
        </div>
    </div>

    <script>
        // Function to show the popup box
        function showPopup(message, type) {
            const popupBox = document.getElementById('popupBox');
            const popupMessage = document.getElementById('popupMessage');
            const popupButton = document.getElementById('popupButton');

            // Set message and type
            popupMessage.textContent = message;
            popupButton.className = type;

            // Show the popup
            popupBox.style.visibility = 'visible';
            popupBox.style.opacity = '1';

            // Redirect on button click
            popupButton.addEventListener('click', () => {
                window.location.href = '../appointments.php';
            });
        }

        // Display the popup with PHP message
        <?php if (isset($message) && isset($popupType)): ?>
            showPopup("<?php echo $message; ?>", "<?php echo $popupType; ?>");
        <?php endif; ?>
    </script>

</body>

</html>