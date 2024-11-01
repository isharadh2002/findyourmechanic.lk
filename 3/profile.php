<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="file"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
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








</body>
</html>
