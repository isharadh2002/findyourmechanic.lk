<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Details</title>
  <link rel="stylesheet" href="stylesheets/header.css">
  <link rel="stylesheet" href="stylesheets/appointment-details.css"> <!-- Link to main CSS file if you have one -->
  <style>
   
  </style>
</head>
<body>
  <div class="container">
    <!-- Header with Back Button -->
    <div class="header">
      <h2>Appointment Details</h2>
      <a href="appointments.php" class="btn-back">Back to Appointments</a>
    </div>

    <!-- Appointment Details Cards -->
    <div class="detail-card">
      <div>
        <h3>Appointment Date</h3>
        <p>2024-11-05</p>
      </div>
      <div>
        <h3>Time</h3>
        <p>10:00 AM</p>
      </div>
    </div>

    <div class="detail-card">
      <div>
        <h3>Mechanic</h3>
        <p>John's Auto Repair</p>
      </div>
      <div>
        <h3>Vehicle</h3>
        <p>Honda Civic - ABC1234</p>
      </div>
    </div>

    <div class="detail-card">
      <div>
        <h3>Status</h3>
        <p class="highlight">Pending</p>
      </div>
      <div>
        <h3>Contact</h3>
        <p>(555) 123-4567</p>
      </div>
    </div>

    <!-- Notes Section -->
    <div class="notes-section">
      <h4>Notes</h4>
      <p>Customer requested a checkup for a possible engine noise and oil change.</p>
    </div>
  </div>
</body>
</html>
