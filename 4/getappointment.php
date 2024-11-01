<?php
session_start();
$_SESSION['MechanicID'] = 3;
$MechanicID = $_SESSION['MechanicID'];
// Database connection
$conn = new mysqli("localhost", "username", "password", "findyourmechanic");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM appointments WHERE mechanic_id = 1 AND status = 'upcoming'";
$result = $conn->query($sql);

$appointments = array();
while($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode($appointments);

$conn->close();
?>
