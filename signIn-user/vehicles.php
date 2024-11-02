<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['noOfVehicles'])) {
  $userId = $_SESSION['userId'];
  $noOfVehicles = $_SESSION['noOfVehicles'];
} else {
  header('Location:../msg.php?error=filenotset');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Details</title>

  <style>
    /* Your CSS styling */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #a3e7f036;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2vh;
      flex-direction: column;
      flex-wrap: wrap;
    }

    .upperSection,
    .beforeFooter {

      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2vh;
      flex-wrap: wrap;
      flex-direction: column;
    }

    .loverSection {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2vh;
      flex-wrap: wrap;
      align-content: space-around;
    }

    .vehicles {
      width: auto;
      height: auto;
      margin: 1vh;
      padding: 2vh;
      background-color: #90bfdc4f;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: box-shadow 0.3s;
    }

    .vehicles:hover,
    input[type='text']:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    #vehicleDetails {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2vh;
      flex-wrap: wrap;
      flex-direction: column;
    }

    p {
      margin-bottom: 4.6vh;
      font-weight: 200;
      font-size: x-large;
      font-family: monospace;
      font-weight: bolder;
    }

    input[type='text'] {
      padding: 2.5vh;
      border: none;
      border-radius: 10px;
    }

    .beforeFooter input[type='submit'] {
      background-color: #0295f161;
      color: #30629b;
      padding: 24px 48px;
      font-size: 24px;
      text-align: center;
      cursor: pointer;
      border-radius: 10px;
      border: none;
      transition: background-color 0.3s ease;

    }

    .beforeFooter[type='submit']:hover {
      background-color: #0295f1e6;
    }

    h1,
    h2,
    p {
      font-family: monospace;
      color: #2393b8;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="upperSection">
      <h1>Fill Your Vehicle Details Here....</h1>

      <h2>No Of Vehicles: <?= $noOfVehicles ?></h2>
    </div>

    <div class="loverSection">
      <?php for ($i = 1; $i <= $noOfVehicles; $i++): ?>
        <div class="vehicles">
          <div id="vehicleDetails">
            <p>Vehicle <?= $i ?></p>
            <div class="inputs">
              <input type="text" name="registrationNumber_<?= $i ?>" id="registrationNumber_<?= $i ?>" required placeholder="Registration Number" />
            </div>
            <br><br>
            <div class="inputs">
              <input type="text" name="brandName_<?= $i ?>" id="brandName_<?= $i ?>" required placeholder="Brand Name" />
            </div>
            <br><br>
            <div class="inputs">
              <input type="text" name="modelName_<?= $i ?>" id="modelName_<?= $i ?>" required placeholder="Model Name" />
            </div>
          </div>
        </div>

      <?php endfor; ?>
    </div>
    <div class="beforeFooter">

      <input type="submit" class="submitButton" name="submitButton" value="Sign In">
    </div>
  </div>




</body>

</html>