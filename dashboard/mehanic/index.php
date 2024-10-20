
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
    <h1>  Customer Dashboard</h1>
    <ul>
        <li><a href="#profile">Profile</a></li>
        <li><a href="#Vechicles">Vechicle Management</a></li>
        <li><a href="#find-mechanic">Find a Mechanic</a></li>
        <li><a href="#appionments">Appiontments</a></li>
        <li><a href="#payments">Payment History</a></li>
    </ul>
    <div class="container">
        <section id="profile">
            <h2>Profile</h2>
            <form action="update_profile.php" id="profileForm" method="POST">
            <label for="name">Name</label><br>
                <input type="text" name="name" placeholder="Name"><br><br>
                <label for="email">Email</label><br>
                <input type="email"name="email" placeholder="Email"><br><br>
                <label for="phonenumber">Phone</label><br>
                <input type="phonenumber" name="phone" placeholder="Phone"><br><br>
                <label for="address">Address</label><br>
                <input type="text" name="address" placeholder="Address"><br><br>
                <button type="submit">Update Profile</button><br><br>
                
            </form>
            <button onclick="changePassword">Change Password</button>
    </section>
    </div>
    <section id="Vechicles">
    <h2>Vechile Management</h2>
<form  action="add_vechicle.php" id="vechicleForm" method="POST">
    <label for="model">Model</label><br>
<input type="text" name="model" placeholder="Model"><br><br>
<label for="registration">Registration</label><br>
<input type="text" name="registration" placeholder="Registration Number"><br><br>
<label for="brand">Brand</label><br>
<input type="text" name="brand" placeholder="Brand"><br><br>
<button type="submit">Add Vechicle</button>
</form>
    </section>
    <section id="find-mechanic">
    <h2>Find a Mechanic</h2>
<input type="text"><br><br> 
<button onclick="findMchanic()">Search</button>   
    </section>
    
    <section id="appionments">
    <h2>Appiontment Booking</h2>
    <form action="booking.php" method="POST" id="bookingForm"></form>
    <label for="service">Service</label><br>
    <select name="service">
   
    <option value="oil_change">Oil change</option>
<option value="repair">Repair</option>
</select><br><br>
<label for="mechanic">Mechanic</label><br>
<select name="mechanic" >
    <option value="mechanic1">Mechanic 1</option>
    <option value="mechanic2">Mechanic 2</option>
</select><br><br>
<label for="vechicle">Vechicle</label><br>
<input type="text" name="vechicle" placeholder="Vechicle"><br><br>
<label for="location">Location</label><br>
<input type="text" name="location"placeholder="Location"><br><br>
<label for="appiontmentdate">Appointment Date</label><br>
<input type="date" name="appionmenttdate" id="date"><br><br>
<label for="appointmenttime">Appiontment Time</label><br>
<input type="datetime-local" name="appionmenttime" id="time"><br><br>
<button type="submit">Book Appiontment</button>
    </section>
   <section id="payments">
   <h2>Payment History</h2>

   </section> 
    
</div>
</body>
</html>