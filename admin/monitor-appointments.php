<?php
require "../shared/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        #monitor-appointments {
            font-weight: bold;
            color: #b30000;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    ?>
    <?php
    $appointments = array();
    $query = "SELECT * FROM `appointment`";
    $results = mysqli_query($con, $query);
    $pending = 0;
    $finished = 0;

    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            $appointments[] = $row;
            if ($row['Status'] == 'Pending'  || $row['Status'] == 'Scheduled') {
                $pending++;
            } else if ($row['Status'] == 'Finished' || $row['Status'] == 'Completed') {
                $finished++;
            }
        }
    }
    ?>
    <h1>Pending Appointments : <?php echo $pending; ?></h1>
    <h1>Finished Appointments : <?php echo $finished; ?></h1>

    <h2>Pending Appointments</h2>
    <?php
    if ($pending == 0):
        echo "<h3>No pending appointments</h3>";
    else:
    ?>
        <table>
            <tr>
                <th>Appointment ID</th>
                <th>User ID</th>
                <th>Mechanic ID</th>
                <th>Vehicle ID</th>
                <th>Appointment Date</th>
                <th>Service Type</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
            <?php
            foreach ($appointments as $appointment) {
                if ($appointment['Status'] == 'Pending' || $appointment['Status'] == 'Scheduled'):
            ?>
                    <tr>
                        <td><?php echo $appointment['AppointmentID']; ?></td>
                        <td><?php echo $appointment['UserID']; ?></td>
                        <td><?php echo $appointment['MechanicID']; ?></td>
                        <td><?php echo $appointment['VehicleID']; ?></td>
                        <td><?php echo $appointment['AppointmentDate']; ?></td>
                        <td><?php echo $appointment['ServiceType']; ?></td>
                        <td><?php echo $appointment['Location']; ?></td>
                        <td><?php echo $appointment['Status']; ?></td>
                    </tr>
            <?php
                endif;
            }
            ?>
        </table>
    <?php
    endif;
    ?>

    <h2>Pending Appointments</h2>
    <?php
    if ($finished == 0):
        echo "<h3>No finished appointments</h3>";
    else:
    ?>
        <table>
            <tr>
                <th>Appointment ID</th>
                <th>User ID</th>
                <th>Mechanic ID</th>
                <th>Vehicle ID</th>
                <th>Appointment Date</th>
                <th>Service Type</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
            <?php
            foreach ($appointments as $appointment) {
                if ($appointment['Status'] == 'Finished' || $appointment['Status'] == 'Completed'):
            ?>
                    <tr>
                        <td><?php echo $appointment['AppointmentID']; ?></td>
                        <td><?php echo $appointment['UserID']; ?></td>
                        <td><?php echo $appointment['MechanicID']; ?></td>
                        <td><?php echo $appointment['VehicleID']; ?></td>
                        <td><?php echo $appointment['AppointmentDate']; ?></td>
                        <td><?php echo $appointment['ServiceType']; ?></td>
                        <td><?php echo $appointment['Location']; ?></td>
                        <td><?php echo $appointment['Status']; ?></td>
                    </tr>
            <?php
                endif;
            }
            ?>
        </table>
    <?php
    endif;
    ?>
</body>

</html>