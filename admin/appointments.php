<?php
// Include database connection
require "../shared/connect.php";

// Set pagination limits
$limit = 25;

// Get the current page for pending and completed appointments
$pagePending = isset($_GET['page_pending']) ? $_GET['page_pending'] : 1;
$pageCompleted = isset($_GET['page_completed']) ? $_GET['page_completed'] : 1;

$offsetPending = ($pagePending - 1) * $limit;
$offsetCompleted = ($pageCompleted - 1) * $limit;

// Fetch pending appointments
$sqlPending = "SELECT * FROM appointment WHERE status = 'Pending' or status = 'Scheduled' LIMIT $offsetPending, $limit";
$resultPending = $con->query($sqlPending);

// Fetch completed appointments
$sqlCompleted = "SELECT * FROM appointment WHERE status = 'Completed' LIMIT $offsetCompleted, $limit";
$resultCompleted = $con->query($sqlCompleted);

// Get total count of pending and completed records for pagination
$totalPending = $con->query("SELECT COUNT(*) AS total FROM appointment WHERE status = 'Pending' or status = 'Scheduled'")->fetch_assoc()['total'];
$totalCompleted = $con->query("SELECT COUNT(*) AS total FROM appointment WHERE status = 'Completed'")->fetch_assoc()['total'];

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
                        <?php print_r($row); ?>
                        <td><?= $row['AppointmentID'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['mechanic_name'] ?></td>
                        <td><?= $row['vehicle_model'] ?></td>
                        <td><?= $row['appointment_date'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="view_appointment.php?id=<?= $row['id'] ?>" class="btn btn-view">View</a>
                            <a href="edit_appointment.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="delete_appointment.php?id=<?= $row['id'] ?>" class="btn btn-delete">Delete</a>
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
            <a href="?page_pending=1">First</a>
            <a href="?page_pending=<?= $pagePending - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php if ($pagePending < $totalPagesPending): ?>
            <a href="?page_pending=<?= $pagePending + 1 ?>">Next</a>
            <a href="?page_pending=<?= $totalPagesPending ?>">Last</a>
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
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['mechanic_name'] ?></td>
                        <td><?= $row['vehicle_model'] ?></td>
                        <td><?= $row['appointment_date'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="view_appointment.php?id=<?= $row['id'] ?>" class="btn btn-view">View</a>
                            <a href="edit_appointment.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                            <a href="delete_appointment.php?id=<?= $row['id'] ?>" class="btn btn-delete">Delete</a>
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
            <a href="?page_completed=1">First</a>
            <a href="?page_completed=<?= $pageCompleted - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php if ($pageCompleted < $totalPagesCompleted): ?>
            <a href="?page_completed=<?= $pageCompleted + 1 ?>">Next</a>
            <a href="?page_completed=<?= $totalPagesCompleted ?>">Last</a>
        <?php endif; ?>
    </div>
</div>

<?php include '../footer.php'; ?>

</body>
</html>

<?php
$conn->close();
?>
