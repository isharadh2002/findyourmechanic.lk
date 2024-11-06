<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Dashboard</title>
    
    <?php
   require "../mechanic/headerMechanic.php";
    ?>


 <link rel="stylesheet" href="../stylesheets/footer.css">
 <link rel="stylesheet" href="profile.css">
</head>
<body>

<div class="dashboard-container">
    <h2 class="section-title">Profile Management</h2>
    <form id="profile-form" method="POST" action="update_profile.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="mechanic-name">Mechanic Name</label>
            <input type="text" id="mechanic-name" name="mechanic_name" required>
        </div>
        <div class="form-group">
            <label for="qualifications">Qualifications</label>
            <input type="text" id="qualifications" name="qualifications">
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" step="0.01">
        </div>
        <div class="form-group">
            <label for="working-hours">Working Hours</label>
            <input type="text" id="working-hours" name="working_hours">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="profile-picture">Profile Picture</label>
            <input type="file" id="profile-picture" name="profile_picture">
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>


<?php
require "../shared/footer.php"

?>





</body>
</html>
