<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Selection</title>
    <link rel="stylesheet" href="2.css">
</head>
<body>

    <div class="container">
        <h2>Choose any Service You need!</h2>

        <div class="services-grid">
            <div class="service-box" id="Profile" >
                <img src="/findyourmechanic.lk/Images/profile.png" alt="Pe">
                <p>Profile</p>
            </div>
            <div class="service-box" id="Appointment" >
                <img src="/findyourmechanic.lk/Images/appointment.png" alt="Appointment" onclick="window.location.href='3\appointment.php';">
                <p>Appointment</p>
            </div>
            <div class="service-box" id="repair" onclick="selectService(this)">
                <img src="/findyourmechanic.lk/Images/repair.png" alt="Repair">
                <p>Repair</p>
            </div>
            <div class="service-box" id="Payments" onclick="selectService(this)">
                <img src="/findyourmechanic.lk/Images/payment.png" alt="Payments">
                <p>Payments</p>
            </div>
        </div>

        <button class="continue-btn">Continue</button>
    </div>


</body>
</html>
