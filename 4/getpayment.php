<?php
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Database connection
include "connect.php";
 

$sql = "SELECT * FROM payments WHERE mechanic_id = 1 AND payment_date BETWEEN '$start_date' AND '$end_date'";
$result = $conn->query($sql);

echo "<ul>";
while($row = $result->fetch_assoc()) {
    echo "<li>Customer: " . $row['customer_name'] . " - Amount: $" . $row['amount'] . "</li>";
}
echo "</ul>";

$conn->close();
?>
