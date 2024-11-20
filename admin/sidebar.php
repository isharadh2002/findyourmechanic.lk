<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['UserID'] , $_SESSION['AdminID'])){
    $UserID = $_SESSION['UserID'];
    $AdminID = $_SESSION['AdminID'];
}
else{
    echo "<script>
    window.alert('You are not logged in.');
    window.location.href='login.php';
</script>";
}
?>

<!-- Sidebar Navigation -->
<aside class="sidebar">
    <div class="image-container">
        <img src="../assets/FindYourMechanic_Circle.png" alt="Website Logo">
    </div>
    <h2>Find Your Mechanic</h2>
    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="mechanics.php">Mechanics</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="appointments.php">Appointments</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</aside>

