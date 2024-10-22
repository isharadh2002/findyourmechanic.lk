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
    <link rel="stylesheet" href="monitor-appointments.css">
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
        <table class="user-table">
            <tr class="table-heading-tr">
                <th class="table-heading">Appointment ID</th>
                <th class="table-heading">User ID</th>
                <th class="table-heading">Mechanic ID</th>
                <th class="table-heading">Vehicle ID</th>
                <th class="table-heading">Appointment Date</th>
                <th class="table-heading">Service Type</th>
                <th class="table-heading">Location</th>
                <th class="table-heading">Status</th>
            </tr>
            <?php
            foreach ($appointments as $appointment) {
                if ($appointment['Status'] == 'Pending' || $appointment['Status'] == 'Scheduled'):
            ?>
                    <tr class="table-data-tr">
                        <td class="table-data"><?php echo $appointment['AppointmentID']; ?></td>
                        <td class="table-data"><?php echo $appointment['UserID']; ?></td>
                        <td class="table-data"><?php echo $appointment['MechanicID']; ?></td>
                        <td class="table-data"><?php echo $appointment['VehicleID']; ?></td>
                        <td class="table-data"><?php echo $appointment['AppointmentDate']; ?></td>
                        <td class="table-data"><?php echo $appointment['ServiceType']; ?></td>
                        <td class="table-data"><?php echo $appointment['Location']; ?></td>
                        <td class="table-data"><?php echo $appointment['Status']; ?></td>
                    </tr>
            <?php
                endif;
            }
            ?>
        </table>
    <?php
    endif;
    ?>

    <h2>Finished Appointments</h2>
    <?php
    if ($finished == 0):
        echo "<h3>No finished appointments</h3>";
    else:
    ?>
        <table class="user-table">
            <tr class="table-heading-tr">
                <th class="table-heading">Appointment ID</th>
                <th class="table-heading">User ID</th>
                <th class="table-heading">Mechanic ID</th>
                <th class="table-heading">Vehicle ID</th>
                <th class="table-heading">Appointment Date</th>
                <th class="table-heading">Service Type</th>
                <th class="table-heading">Location</th>
                <th class="table-heading">Status</th>
            </tr>
            <?php
            foreach ($appointments as $appointment) {
                if ($appointment['Status'] == 'Finished' || $appointment['Status'] == 'Completed'):
            ?>
                    <tr class="table-data-tr">
                        <td class="table-data"><?php echo $appointment['AppointmentID']; ?></td>
                        <td class="table-data"><?php echo $appointment['UserID']; ?></td>
                        <td class="table-data"><?php echo $appointment['MechanicID']; ?></td>
                        <td class="table-data"><?php echo $appointment['VehicleID']; ?></td>
                        <td class="table-data"><?php echo $appointment['AppointmentDate']; ?></td>
                        <td class="table-data"><?php echo $appointment['ServiceType']; ?></td>
                        <td class="table-data"><?php echo $appointment['Location']; ?></td>
                        <td class="table-data"><?php echo $appointment['Status']; ?></td>
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