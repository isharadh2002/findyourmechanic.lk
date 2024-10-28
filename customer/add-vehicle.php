<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/add-vehicle.css">
</head>
<body>
    <?php
    require "header.php";
    ?>

    <main class="container">
        <h1>Add New Vehicle</h1>
        <form action="submit_vehicle.php" method="POST" class="vehicle-form">
            <div class="form-group">
                <label for="vehicleMake">Vehicle Make:</label>
                <input type="text" id="vehicleMake" name="vehicle_make" required>
            </div>
            
            <div class="form-group">
                <label for="vehicleModel">Vehicle Model:</label>
                <input type="text" id="vehicleModel" name="vehicle_model" required>
            </div>
            
            <div class="form-group">
                <label for="vehicleYear">Year:</label>
                <input type="number" id="vehicleYear" name="year" required min="1900" max="2099">
            </div>
            
            <div class="form-group">
                <label for="licensePlate">License Plate:</label>
                <input type="text" id="licensePlate" name="license_plate" required>
            </div>

            <button type="submit" class="submit-btn">Add Vehicle</button>
        </form>
    </main>
</body>
</html>
