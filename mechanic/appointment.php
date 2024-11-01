<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="dashboard-container">
    <h2 class="section-title">Appointment Management</h2>
    <div id="appointment-list">
        <!-- Appointment data will be dynamically loaded here -->
    </div>
</div>




    <script>
       document.addEventListener('DOMContentLoaded', function() {
    fetch('get_appointments.php')
        .then(response => response.json())
        .then(data => {
            let appointmentList = document.getElementById('appointment-list');
            appointmentList.innerHTML = '';
            data.forEach(appointment => {
                let appointmentItem = `<div>
                    <h3>${appointment.customer_name} - ${appointment.service_type}</h3>
                    <p>Time: ${appointment.appointment_time}</p>
                    <button onclick="markAsCompleted(${appointment.id})">Mark as Completed</button>
                    <button onclick="cancelAppointment(${appointment.id})">Cancel</button>
                </div>`;
                appointmentList.innerHTML += appointmentItem;
            });
        });
});

function markAsCompleted(appointmentId) {
    fetch('update_appointment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: appointmentId, status: 'completed' })
    }).then(() => {
        alert('Appointment marked as completed');
        location.reload();
    });
}

function cancelAppointment(appointmentId) {
    fetch('update_appointment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: appointmentId, status: 'cancelled' })
    }).then(() => {
        alert('Appointment cancelled');
        location.reload();
    });
}
 


    </script>
<?php
/*
// Database connection
//include "connect.php";
$servername = "localhost";
$username = "root";
$password = "";
$database="gobidb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "SELECT * FROM appointments WHERE mechanic_id = 1 AND status = 'upcoming'";
$result = $conn->query($sql);

$appointments = array();
while($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode($appointments);

$conn->close();
*/
?>


</body>
</html>