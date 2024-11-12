<?php
// Start session and check if the mechanic is logged in
session_start();
if (!isset($_SESSION['MechanicID'])) {
    header('Location: ../');
    exit();
}

// Connect to the database
include '../shared/connect.php';

// Fetch appointments for the logged-in mechanic
$mechanic_id = $_SESSION['MechanicID'];
$query = "SELECT * FROM appointment INNER JOIN user ON appointment.UserID = user.UserID INNER JOIN vehicle ON appointment.VehicleID = vehicle.VehicleID WHERE appointment.MechanicID = $mechanic_id ORDER BY AppointmentID DESC";
$result = mysqli_query($con, $query);

echo $mechanic_id . " - Number of rows - " . mysqli_num_rows($result);
$appointments = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Appointments</title>
    <link rel="stylesheet" href="../css/mechanic_appointments.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="header.css">
    <style>
        /* mechanic_appointments.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            margin-top: 125px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .appointment-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .appointment-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e0e0e0;
            transition: transform 0.2s ease;
        }

        .appointment-card:hover {
            transform: translateY(-3px);
        }

        .appointment-info p {
            margin: 5px 0;
            color: #555;
            margin-right: 10px;
        }

        .status-change {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-left: 10px;
        }

        .status-select {
            padding: 6px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        .btn-update-status {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-update-status:hover {
            background-color: #0056b3;
        }

        .status-label {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php
    require_once "header.php";
    ?>
    <div class="container">
        <h2>My Appointments</h2>
        <div class="appointment-list">
            <?php /* if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php print_r($row); ?>
                    <div class="appointment-card">
                        <div class="appointment-info">

                            <p><strong>Customer:</strong> <?= htmlspecialchars($row['customer_name']) ?></p>
                            <p><strong>Vehicle:</strong> <?= htmlspecialchars($row['vehicle_name']) ?></p>
                            <p><strong>Date:</strong> <?= date('d M Y', strtotime($row['date'])) ?></p>
                            <p><strong>Time:</strong> <?= htmlspecialchars($row['time']) ?></p>
                            <p><strong>Status:</strong> <span class="status-label"><?= htmlspecialchars($row['status']) ?></span></p>
                        </div>
                        <div class="status-change">
                            <form method="POST" action="update_appointment_status.php">
                                <input type="hidden" name="appointment_id" value="<?= $row['id'] ?>">
                                <select name="status" class="status-select">
                                    <option value="Scheduled" <?= $row['status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
                                    <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn-update-status">Update</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No appointments found.</p>
            <?php endif; */ ?>
            <?php if (count($appointments) > 0): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <div class="appointment-card">
                        <div class="appointment-info">

                            <p><strong>Customer:</strong> <?= htmlspecialchars($appointment['Username']) ?></p>
                            <p><strong>Vehicle:</strong> <?= htmlspecialchars($appointment['RegistrationNumber'] . " - " . $appointment['Brand'] . " " . $appointment['Model'] . " " . $appointment['Year']) ?></p>
                            <p><strong>Date:</strong> <?= date('d M Y', strtotime($appointment['ScheduleDate'])) ?></p>
                            <p><strong>Time:</strong> <?= date('h:i A', strtotime($appointment['ScheduleDate'])) ?></p>
                            <p><strong>Status:</strong> <span class="status-label"><?= htmlspecialchars($appointment['Status']) ?></span></p>
                        </div>
                        <div class="status-change">
                            <form method="POST" action="update_appointment_status.php">
                                <input type="hidden" name="appointment_id" value="<?= $appointment['AppointmentID'] ?>">
                                <select name="status" class="status-select">
                                    <option value="Scheduled" <?= $appointment['Status'] == 'Scheduled' ? 'selected' : '' ?>>Scheduled</option>
                                    <option value="Pending" <?= $appointment['Status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Completed" <?= $appointment['Status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                </select>
                                <button type="submit" class="btn-update-status">Update</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No appointments found.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    require_once "../shared/footer.php";
    ?>
</body>

</html>