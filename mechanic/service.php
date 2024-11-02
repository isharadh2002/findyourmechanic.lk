<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
<link rel="stylesheet" href="../stylesheets/footer.css">
<div class="dashboard-container">
    <h2 class="section-title">Service Management</h2>
    <form id="service-form" method="POST" action="add_service.php">
        <div class="form-group">
            <label for="service-name">Service Name</label>
            <input type="text" id="service-name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="service-price">Price</label>
            <input type="number" id="service-price" name="service_price" required>
        </div>
        <div class="form-group">
            <label for="service-type">Service Type</label>
            <input type="text" id="service-type" name="service_type" required>
        </div>
        <button type="submit">Add Service</button>
    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_type = $_POST['service_type'];

    // Database connection
    $conn = new mysqli("localhost", "username", "password", "mechanic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO services (name, price, type) VALUES ('$service_name', '$service_price', '$service_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Service added successfully";
    } else {
        echo "Error adding service: " . $conn->error;
    }

    $conn->close();
}
?>

<?php
require "../shared/footer.php"

?>
</body>
</html>