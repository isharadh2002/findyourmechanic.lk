<?php
require "../shared/connect.php";
$userInput = "";

if (isset($_GET['search-input'])) {
    $userInput = $_GET['search-input'];
}

$query = "SELECT  * FROM `mechanic` INNER JOIN `user` ON `mechanic`.`UserID` = `user`.`UserID` WHERE `username` LIKE \"%$userInput%\" OR `WorkAddress` LIKE \"%$userInput%\" OR `Specification` LIKE \"%$userInput%\" LIMIT 30";
$result = mysqli_query($con, $query);

$mechanics = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $mechanics[] = $row;
        //echo "<script> console.log('" . print_r($row) . "');</script><br><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Mechanics</title>
    <link rel="stylesheet" href="stylesheets/add-appointment.css">
    <link rel="stylesheet" href="stylesheets/header.css">
    <style>

    </style>
</head>

<body>
    <?php
    require "header.php"
    ?>
    <main class="content">
        <h1>Find a Mechanic</h1>

        <div class="search-container">
            <form action="" method="get" class="search-form">
                <input type="text" name="search-input" class="search-bar" placeholder="Search for mechanics by name, location, or specialty...">
                <button type="submit" class="search-button">Search</button>
            </form>
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
                <?php
                if (count($mechanics) == 0) {
                    echo "<tr><td colspan='5'>No mechanics found. </td></tr>";
                }
                foreach ($mechanics as $mechanic):
                ?>
                    <tr>
                        <td><?php echo $mechanic['Username']; ?></td>
                        <td><?php echo $mechanic['WorkAddress'] ?></td>
                        <td><?php echo $mechanic['Specification'] ?></td>
                        <td><?php echo $mechanic['WorkPhoneNumber'] ?></td>
                        <td><a href="add-appointment-details.php?mechanic-id=<?php echo $mechanic['MechanicID'] ?>"><button class="select-button">Select</button></a></td>
                    </tr>
                <?php
                endforeach;
                ?>

                <!--
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
                </tr> -->
                <!-- Add more rows or dynamically fetch data with PHP -->
            </tbody>
        </table>
    </main>
</body>

</html>