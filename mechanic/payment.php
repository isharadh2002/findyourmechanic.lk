<div class="dashboard-container">
    <h2 class="section-title">Payments</h2>
    <form id="filter-form" method="GET" action="get_payments.php">
        <label for="date-range">Date Range</label>
        <input type="date" id="start-date" name="start_date"> to
        <input type="date" id="end-date" name="end_date">
        <button type="submit">Filter</button>
    </form>
    <div id="payment-list">
        <!-- Payment data will be dynamically loaded here -->
    </div>
</div>






<?php
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Database connection
$conn = new mysqli("localhost", "username", "password", "mechanic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payments WHERE mechanic_id = 1 AND payment_date BETWEEN '$start_date' AND '$end_date'";
$result = $conn->query($sql);

echo "<ul>";
while($row = $result->fetch_assoc()) {
    echo "<li>Customer: " . $row['customer_name'] . " - Amount: $" . $row['amount'] . "</li>";
}
echo "</ul>";

$conn->close();
?>
