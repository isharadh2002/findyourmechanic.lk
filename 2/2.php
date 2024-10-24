<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Selection</title>
    <link rel="stylesheet" href="2.css">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    width: 320px;
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    color: #333;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 20px;
}

.service-box {
    background-color: #eee;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    color: #333;
    cursor: pointer;
    transition: 0.3s;
}

.service-box.selected {
    border: 2px solid #0c0c0c;
    background-color: #e6e9ff;
}

.service-box img {
    width: 40px;
    height: 40px;
}

.service-box p {
    margin-top: 10px;
    font-size: 14px;
}

.continue-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #3a3dd8;
    color: white;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.continue-btn:hover {
    background-color: #2c2fd3;
}
    </style>

    <div class="container">
        <h2>Choose any Service You need!</h2>

        <div class="services-grid">
            <div class="service-box" id="Profile" >
                <img src="/findyourmechanic.lk/Images/profile.png" alt="Profile" onclick="window.location.href='/findyourmechanic.lk/3/profile.php';">
                <p>Profile</p>
            </div>
            <div class="service-box" id="Appointment" >
                <img src="/findyourmechanic.lk/Images/appointment.png" alt="Appointment" onclick="window.location.href='/findyourmechanic.lk/3/appointment.php';">
                <p>Appointment</p>
            </div>
            <div class="service-box" id="repair" >
                <img src="/findyourmechanic.lk/Images/repair.png" alt="Repair"  onclick="window.location.href='/findyourmechanic.lk/3/service.php';">
                <p>Repair</p>
            </div>
            <div class="service-box" id="Payments" >
                <img src="/findyourmechanic.lk/Images/payment.png" alt="Payments" onclick="window.location.href='/findyourmechanic.lk/3/payment.php';">
                <p>Payments</p>
            </div>
        </div>

        <button class="continue-btn">Continue</button>
    </div>


</body>
</html>
