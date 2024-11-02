<?php
session_start();
$_SESSION['MechanicID'] = 3;
$MechanicID = $_SESSION['MechanicID'];
// Database connection
include "../shared/connect.php";

$sql = "SELECT * FROM `appointment` WHERE MechanicID=3 and Status='confirmed'";
$result = $con->query($sql);

//$appointments = array();
if (mysqli_num_rows($result) > 0) {
    // Start HTML table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Amount</th>
            </tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>
                <td>" . $row['AppointmentID'] . "</td>
                <td>" . $row['UserID'] . "</td>
                <td>" . $row['MechanicID'] . "</td>
                <td>" . $row['VehicleID'] . "</td>
              </tr>";
    }

    echo "</table>"; // End HTML table
}else{
        echo "no record found";
    }
   // print_r($row);
   // echo "<br> <br>";
    //echo "<li>Customer: " . $row['customer_name'] . " - Amount: $" . $row['amount'] . "</li>";


$con->close();
?>
