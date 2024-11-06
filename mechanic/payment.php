<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
       require "../mechanic/headerMechanic.php";
       ?>
</head>
<body>
<link rel="stylesheet" href="../stylesheets/footer.css">

<div class="dashboard-container">
    <h2 class="section-title">Payments</h2>
    <form id="filter-form" method="GET" action="get_payments.php">
        <label for="date-range">Date Range</label>
        <input type="date" id="start-date" name="start_date"> to
        <input type="date" id="end-date" name="end_date">
        <button type="submit">Filter</button>
    </form>
    <div id="payment-list">
        <!-- Payment data will be dynamically loaded here -->
    </div>
</div>
    
</body>
</html>




<?php
require "../shared/footer.php"


?>








