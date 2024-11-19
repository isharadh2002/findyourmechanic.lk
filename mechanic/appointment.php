<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<link rel="stylesheet" href="../stylesheets/footer.css">
<link rel="stylesheet" href="appointment.css">
<div class="dashboard-container">
    <h2 class="section-title">Appointment Management</h2>
    <div id="appointment-list">
       
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
-->

<?php
session_start();
if (isset($_SESSION['MechanicID'])) {
    $MechanicID = $_SESSION['MechanicID'];
    // Database connection
    include "../shared/connect.php";

    $sql = "SELECT * FROM `appointment` WHERE MechanicID=3 and status='Confirmed'and status='Scheduled'";
    $result = $con->query($sql);

    $sql1 = "SELECT * FROM `appointment` WHERE MechanicID=3 and status='completed'";
    $result1 = $con->query($sql1);



    $pendingAppointments = array();
    $finishedAppointments = array();


    //$appointments = array();
    if (mysqli_num_rows($result) > 0) {
        // Start HTML table
        echo "<table border='1'>
            <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Mechanic</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th>Location</th>
            </tr>";
    } else {
        echo "no record found";
    }
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
    <title>Appointment Management</title>
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="appointment.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>

    <?php
        require "header.php";
    ?>

    <div class="container">
        <h2 class="section-title">Appointment Management</h2>

        <div class="appointments">
            <h3>Pending Appointments</h3>
            <table id="pending-appointments">




                <tbody>
                    <!-- Pending appointments will be dynamically loaded here -->
                    <?php
                    while ($row = $result->fetch_assoc()):
                        //print_r($row);
                        //echo "<br><br>";
                    ?>
                        <tr>
                            <td> <?php echo $row['AppointmentDate']; ?></td>
                            <td> <?php echo $row['AppointmentDate']; ?> </td>
                            <td> <?php echo $row['MechanicID']; ?> </td>
                            <td> <?php echo $row['VehicleID']; ?> </td>
                            <td> <?php echo $row['Status']; ?> </td>
                            <td> <?php echo $row['Location']; ?> </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>

                </tbody>
            </table>
        </div>

        <div class="appointments">
            <h3>Completed Appointments</h3>
            <table id="completed-appointments">

                <?php echo  "<table border='1'>
            <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Mechanic</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th>Location</th>
            </tr>";
                ?>
                <tbody>
                    <!-- Completed appointments will be dynamically loaded here -->
                    <?php while ($row = $result1->fetch_assoc()):
                        //print_r($row);
                        //echo "<br><br>"; 
                    ?>
                        <tr>
                            <td> <?php echo $row['AppointmentDate']; ?></td>
                            <td> <?php echo $row['AppointmentDate']; ?> </td>
                            <td> <?php echo $row['MechanicID']; ?> </td>
                            <td> <?php echo $row['VehicleID']; ?> </td>
                            <td> <?php echo $row['Status']; ?> </td>
                            <td> <?php echo $row['Location']; ?> </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>

                </tbody>
            </table>
            </tbody>
            </table>
        </div>
                </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_appointments.php')
                .then(response => response.json())
                .then(data => {
                    const pendingTable = document.querySelector('#pending-appointments tbody');
                    const completedTable = document.querySelector('#completed-appointments tbody');

                    data.forEach(appointment => {
                        const row = `<tr>
                            <td>${appointment.customer_name}</td>
                            <td>${appointment.service_type}</td>
                            <td>${appointment.appointment_time}</td>
                            ${appointment.status === 'pending' ? 
                                `<td>
                                    <button onclick="markAsCompleted(${appointment.id})">Complete</button>
                                    <button onclick="cancelAppointment(${appointment.id})">Cancel</button>
                                </td>` : 
                                '<td></td>'}
                        </tr>`;

                        if (appointment.status === 'pending') {
                            pendingTable.innerHTML += row;
                        } else if (appointment.status === 'completed') {
                            completedTable.innerHTML += row;
                        }
                    });
                });
        });

        function markAsCompleted(appointmentId) {
            fetch('update_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: appointmentId,
                    status: 'completed'
                })
            }).then(() => {
                alert('Appointment marked as completed');
                location.reload();
            });
        }

        function cancelAppointment(appointmentId) {
            fetch('update_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: appointmentId,
                    status: 'cancelled'
                })
            }).then(() => {
                alert('Appointment cancelled');
                location.reload();
            });
        }
    </script>

    <?php require "../shared/footer.php"; ?>
</body>

</html>