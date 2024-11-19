<?php

if(isset( $_GET['start_date'])&&isset($_GET['end_date'])){
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];


// Database connection
include "../shared/connect.php";
 

$sql = "SELECT * FROM payment inner join service on payment.ServiceID = service.ServiceID inner join appointment on service.AppointmentID = appointment.AppointmentID WHERE PaymentDate BETWEEN '$start_date' AND '$end_date' and MechanicID='3' ";
$result = $con->query($sql);

//echo "<ul>";
if (mysqli_num_rows($result) > 0) {
    // Start HTML table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Amount</th>
            </tr>";
  while($row = $result->fetch_assoc()) 
  {
    echo "<tr>
    <td>" . $row['AppointmentID'] . "</td>
    <td>" . $row['UserID'] . "</td>
    <td>" . $row['MechanicID'] . "</td>
    <td>" . $row['VehicleID'] . "</td>
  </tr>";
  }

echo "</table>"; // End HTML table

}
else
{
echo "no record found";
}
   // print_r($row);
   // echo "<br><br>";
    //echo "<li>Customer: " . $row['customer_name'] . " - Amount: $" . $row['amount'] . "</li>";

//echo "</ul>";

$con->close();
}

else{
    echo "parameters are not set";
}
?>
