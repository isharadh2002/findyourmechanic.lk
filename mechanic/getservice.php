<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_type = $_POST['service_type'];

    // Database connection
   
    $sql = "INSERT INTO services (name, price, type) VALUES ('$service_name', '$service_price', '$service_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Service added successfully";
    } else {
        echo "Error adding service: " . $conn->error;
    }

    $conn->close();
}
?>


