<?php
include 'dbconnect.php';
$sql="select Amount duedate, status 
        FROM payments 
        WHERE user_id = $user_id AND status = 'Pending' 
        AND due_date >= CURDATE() 
        ORDER BY due_date ASC";
if ($result->num_rows > 0) {
    echo "<h2>Payment Reminders</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>Amount:</strong> $" . $row['Amount'] . "<br>";
        echo "<strong>Due Date:</strong> " . $row['duedate'] . "<br>";
        echo "<strong>Status:</strong> " . $row['Status'] . "<br>";
        echo "</div><hr>";
    }
} else {
    echo "No payment reminders found.";
}

?>