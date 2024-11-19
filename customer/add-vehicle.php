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
        <form action="process/submit-vehicle.php" method="GET" class="vehicle-form" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="vehicleBrand">Vehicle Brand:</label>
                <input type="text" id="vehicleBrand" name="vehicle_brand">
            </div>

            <div class="form-group">
                <label for="vehicleModel">Vehicle Model:</label>
                <input type="text" id="vehicleModel" name="vehicle_model">
            </div>

            <div class="form-group">
                <label for="vehicleYear">Year:</label>
                <input type="number" id="vehicleYear" name="vehicle_year">
            </div>

            <div class="form-group">
                <label for="licensePlate">License Plate:</label>
                <input type="text" id="licensePlate" name="license_plate">
            </div>

            <button type="submit" class="submit-btn">Add Vehicle</button>
        </form>
    </main>

    <!-- Modal for validation messages -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <p id="errorMessage"></p>
            <button class="close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function validateForm() {
            console.log("Validating form..."); // Debug line
            const brand = document.getElementById("vehicleBrand").value.trim();
            const model = document.getElementById("vehicleModel").value.trim();
            const year = document.getElementById("vehicleYear").value;
            const licensePlate = document.getElementById("licensePlate").value.trim();
            const yearMin = 1900;
            const yearMax = 2100;

            if (brand === "") {
                showModal("Please enter the vehicle brand.");
                return false;
            }
            if (model === "") {
                showModal("Please enter the vehicle model.");
                return false;
            }
            if (year === "" || isNaN(year) || year < yearMin || year > yearMax) {
                showModal(`Please enter a valid year between ${yearMin} and ${yearMax}.`);
                return false;
            }
            if (licensePlate === "") {
                showModal("Please enter the license plate.");
                return false;
            }

            return true;
        }

        function showModal(message) {
            console.log("Showing modal with message:", message); // Debug line
            const modal = document.getElementById("errorModal");
            const errorMessage = document.getElementById("errorMessage");
            errorMessage.textContent = message;
            modal.style.display = "flex";
        }

        function closeModal() {
            console.log("Closing modal..."); // Debug line
            const modal = document.getElementById("errorModal");
            modal.style.display = "none";
        }

        // Close modal on click outside of modal content
        window.onclick = function(event) {
            const modal = document.getElementById("errorModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script>
</body>

</html>