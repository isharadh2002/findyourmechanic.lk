<?php
// Include database connection
require "../shared/connect.php";

// Set pagination limits
$limit = 3;

// Get the current page for pending and completed appointments
$pagePending = isset($_GET['page_pending']) ? $_GET['page_pending'] : 1;
$pageCompleted = isset($_GET['page_completed']) ? $_GET['page_completed'] : 1;

$offsetPending = ($pagePending - 1) * $limit;
$offsetCompleted = ($pageCompleted - 1) * $limit;

// Fetch pending appointments
$sqlPending = "SELECT * FROM appointment inner join user on appointment.UserID = user.UserID inner join vehicle on vehicle.VehicleID = appointment.VehicleID WHERE  status = 'Pending' or status = 'Scheduled' order by appointment.AppointmentID ASC LIMIT $offsetPending, $limit";
$sqlPendingMechanicDetails = "SELECT * FROM appointment inner join mechanic on appointment.MechanicID = mechanic.MechanicID inner join user on mechanic.UserID = user.UserID WHERE status = 'Pending' or status = 'Scheduled' order by appointment.AppointmentID ASC LIMIT $offsetPending, $limit";
$resultPending = $con->query($sqlPending);
$resultPendingMechanicDetails = $con->query($sqlPendingMechanicDetails);

// Fetch completed appointments
$sqlCompleted = "SELECT * FROM appointment inner join user on appointment.UserID = user.UserID inner join vehicle on vehicle.VehicleID = appointment.VehicleID WHERE status = 'Completed' order by appointment.AppointmentID ASC LIMIT $offsetCompleted, $limit";
$sqlCompletedMechanicDetails = "SELECT * FROM appointment inner join mechanic on appointment.MechanicID = mechanic.MechanicID inner join user on mechanic.UserID = user.UserID WHERE status = 'Completed' ORDER BY appointment.AppointmentID ASC LIMIT $offsetCompleted, $limit";
$resultCompleted = $con->query($sqlCompleted);
$resultCompletedMechanicDetails = $con->query($sqlCompletedMechanicDetails);

// Get total count of pending and completed records for pagination
$totalPending = $con->query("SELECT COUNT(*) AS total FROM appointment inner join user on appointment.UserID = user.UserID inner join vehicle on vehicle.VehicleID = appointment.VehicleID WHERE status = 'Pending' or status = 'Scheduled'")->fetch_assoc()['total'];
$totalCompleted = $con->query("SELECT COUNT(*) AS total FROM appointment inner join user on appointment.UserID = user.UserID inner join vehicle on vehicle.VehicleID = appointment.VehicleID WHERE status = 'Completed'")->fetch_assoc()['total'];

$totalPagesPending = ceil($totalPending / $limit);
$totalPagesCompleted = ceil($totalCompleted / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Appointments</title>
    <link rel="stylesheet" href="stylesheets/appointments.css">
    <link rel="stylesheet" href="stylesheets/sidebar.css">
</head>

<body>

    <?php
    require "sidebar.php";
    ?>

    <div class="admin-container">
        <h1>Manage Appointments</h1>

        <!-- Pending Appointments Table -->
        <h2>Pending Appointments</h2>
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Customer Name</th>
                    <th>Mechanic</th>
                    <th>Vehicle</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultPending->num_rows > 0): ?>
                    <?php while ($row = $resultPending->fetch_assoc()): ?>
                        <tr>
                            <?php
                            $rowMechanicDetails = $resultPendingMechanicDetails->fetch_assoc();
                            print_r($row);
                            echo "<br><br>";
                            print_r(($rowMechanicDetails));
                            echo "<br><br>";
                            ?>
                            <td><?= $row['AppointmentID'] ?></td>
                            <td><?= $row['Username'] ?></td>
                            <td><?= $rowMechanicDetails['Username'] ?></td>
                            <td><?php echo $row['RegistrationNumber'] . " - " . $row['Brand'] . " " . $row['Model'] . " " . $row['Year']; ?></td>
                            <td><?= explode(" ", $row['ScheduleDate'])[0] ?></td>
                            <td><?= $row['Status'] ?></td>
                            <td>
                                <a href="view_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-view">View</a>
                                <a href="edit_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-edit">Edit</a>
                                <a href="delete_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No pending appointments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pending Appointments Pagination -->
        <div class="pagination">
            <span>Records: <?= $totalPending ?></span>
            <?php if ($pagePending > 1): ?>
                <a href="?page_pending=1&page_completed=<?= $pageCompleted ?>">First</a>
                <a href="?page_pending=<?= $pagePending - 1 ?>&page_completed=<?= $pageCompleted ?>">Previous</a>
            <?php endif; ?>

            <?php if ($pagePending < $totalPagesPending): ?>
                <a href="?page_pending=<?= $pagePending + 1 ?>&page_completed=<?= $pageCompleted ?>">Next</a>
                <a href="?page_pending=<?= $totalPagesPending ?>&page_completed=<?= $pageCompleted ?>">Last</a>
            <?php endif; ?>
        </div>

        <!-- Completed Appointments Table -->
        <h2>Completed Appointments</h2>
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Mechanic</th>
                    <th>Vehicle</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultCompleted->num_rows > 0): ?>
                    <?php while ($row = $resultCompleted->fetch_assoc()): ?>
                        <tr>
                            <?php
                            $rowMechanicDetails = $resultCompletedMechanicDetails->fetch_assoc();
                            print_r($row);
                            echo "<br><br>";
                            print_r(($rowMechanicDetails));
                            echo "<br><br>";
                            ?>
                            <td><?= $row['AppointmentID'] ?></td>
                            <td><?= $row['Username'] ?></td>
                            <td><?= $rowMechanicDetails['Username'] ?></td>
                            <td><?php echo $row['RegistrationNumber'] . " - " . $row['Brand'] . " " . $row['Model'] . " " . $row['Year']; ?></td>
                            <td><?= explode(" ", $row['ScheduleDate'])[0] ?></td>
                            <td><?= $row['Status'] ?></td>
                            <td>
                                <a href="view_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-view">View</a>
                                <a href="edit_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-edit">Edit</a>
                                <a href="delete_appointment.php?appointment_id=<?= $row['AppointmentID'] ?>" class="btn btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No completed appointments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Completed Appointments Pagination -->
        <div class="pagination">
            <span>Records: <?= $totalCompleted ?></span>
            <?php if ($pageCompleted > 1): ?>
                <a href="?page_completed=1&page_pending=<?= $pagePending ?>">First</a>
                <a href="?page_completed=<?= $pageCompleted - 1 ?>&page_pending=<?= $pagePending ?>">Previous</a>
            <?php endif; ?>

            <?php if ($pageCompleted < $totalPagesCompleted): ?>
                <a href="?page_completed=<?= $pageCompleted + 1 ?>&page_pending=<?= $pagePending ?>">Next</a>
                <a href="?page_completed=<?= $totalPagesCompleted ?>&page_pending=<?= $pagePending ?>">Last</a>
            <?php endif; ?>
        </div>
    </div>

    <?php //include '../footer.php'; 
    ?>

</body>

</html>

<?php
$con->close();
?>