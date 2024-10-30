<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Mechanics</title>
    <link rel="stylesheet" href="stylesheets/add-appointment.css">
    <style>
        
    </style>
</head>
<body>

<h1>Find a Mechanic</h1>

<div class="search-container">
    <input type="text" class="search-bar" placeholder="Search for mechanics by name, location, or specialty...">
</div>

<table class="mechanic-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Specialty</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample Data (Replace with PHP code to dynamically display data) -->
        <tr>
            <td>John Doe</td>
            <td>Los Angeles</td>
            <td>Engine Repair</td>
            <td>(555) 123-4567</td>
            <td><a href="add_appointment.php?mechanic_id=1"><button class="select-button">Select</button></a></td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>New York</td>
            <td>Transmission</td>
            <td>(555) 987-6543</td>
            <td><a href="add_appointment.php?mechanic_id=2"><button class="select-button">Select</button></a></td>
        </tr>
        <tr>
            <td>Michael Johnson</td>
            <td>Chicago</td>
            <td>Brake Service</td>
            <td>(555) 456-7890</td>
            <td><a href="add_appointment.php?mechanic_id=3"><button class="select-button">Select</button></a></td>
        </tr>
        <!-- Add more rows or dynamically fetch data with PHP -->
    </tbody>
</table>

</body>
</html>
