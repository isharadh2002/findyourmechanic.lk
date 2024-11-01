<?php

if(isset( $_GET['start_date'])&&isset($_GET['end_date'])){
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];


// Database connection
include "../shared/connect.php";
 

$sql = "SELECT * FROM payment inner join service on payment.ServiceID = service.ServiceID inner join appointment on service.AppointmentID = appointment.AppointmentID WHERE PaymentDate BETWEEN '$start_date' AND '$end_date'";
$result = $con->query($sql);

//echo "<ul>";
while($row = $result->fetch_assoc()) {
    print_r($row);
    echo "<br><br>";
    //echo "<li>Customer: " . $row['customer_name'] . " - Amount: $" . $row['amount'] . "</li>";
}
//echo "</ul>";

$con->close();
}
else{
    echo "parameters are not set";
}
?>
