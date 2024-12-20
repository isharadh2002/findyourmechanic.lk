<?php
session_start();
require "../shared/connect.php";
// Check if admin is logged in; redirect if not
if (!isset($_SESSION['admin_logged_in'])) {
    //header("Location: ../login.php");
    //exit;
}

$usersQuery = "SELECT COUNT(*) FROM `user` WHERE UserType='customer';";
$result = mysqli_query($con, $usersQuery);
$userCount = mysqli_fetch_assoc($result)['COUNT(*)'];

$mechanicsQuery = "SELECT COUNT(*) FROM `user` WHERE UserType='mechanic';";
$result = mysqli_query($con, $mechanicsQuery);
$mechanicsCount = mysqli_fetch_assoc($result)['COUNT(*)'];

$appointmentQuery = "SELECT COUNT(*) FROM `appointment` WHERE Status!='Completed';";
$result = mysqli_query($con, $appointmentQuery);
$appointmentCount = mysqli_fetch_assoc($result)['COUNT(*)'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Find Your Mechanic</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="stylesheets/index.css">
    <link rel="stylesheet" href="stylesheets/sidebar.css">
</head>

<body>
    
    <?php
        require "sidebar.php";
    ?>
    <!-- Main Dashboard Content -->
    <main class="main-content">
        <header class="header">
            <h1>Admin Dashboard</h1>
        </header>

        <section id="overview" class="dashboard-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Mechanics</h3>
                    <p><?php echo $mechanicsCount; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Total Users</h3>
                    <p><?php echo $userCount; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Pending Appointments</h3>
                    <p><?php echo $appointmentCount; ?></p>
                </div>
            </div>
        </section>

        <section id="mechanics" class="dashboard-section">
            <div class="section-header">
                <h2>Manage Mechanics</h2>
                <button class="action-button" onclick="openAddMechanic()">+ Add Mechanic</button>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>New York</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>Los Angeles</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>Chicago</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="users" class="dashboard-section">
            <div class="section-header">
                <h2>Manage Users</h2>
                <button class="action-button" onclick="openAddUser()">+ Add User</button>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alice Brown</td>
                            <td>alice@example.com</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bob White</td>
                            <td>bob@example.com</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Charlie Green</td>
                            <td>charlie@example.com</td>
                            <td><button class="action-button">Edit</button> <button class="action-button">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="appointments" class="dashboard-section">
            <h2>Appointments Management</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Mechanic</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alice Brown</td>
                            <td>John Doe</td>
                            <td>Pending</td>
                            <td><button class="action-button">View</button> <button class="action-button">Cancel</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bob White</td>
                            <td>Jane Smith</td>
                            <td>Completed</td>
                            <td><button class="action-button">View</button> <button class="action-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Charlie Green</td>
                            <td>Michael Johnson</td>
                            <td>Pending</td>
                            <td><button class="action-button">View</button> <button class="action-button">Cancel</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="admin_dashboard.js"></script>
</body>

</html>