<?php
include 'dbconnect.php';
$userid=$_GET['UserID'];
$sql="select service,appiontment_date,,Satus from appiontments where UserID=$userid and ApponitmentDate>=CURDATE() orderby AppiontmentDate ASC";
$res=$con->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Upcoming Appointments</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>Service:</strong> " . $row['service'] . "<br>";
        echo "<strong>Date:</strong> " . $row['appointment_date'] . "<br>";
        echo "<strong>Mechanic:</strong> " . $row['mechanic_name'] . "<br>";
        echo "<strong>Status:</strong> " . $row['status'] . "<br>";
        echo "</div><hr>";
    }
} else {
    echo "No upcoming appointments found.";
}

?>