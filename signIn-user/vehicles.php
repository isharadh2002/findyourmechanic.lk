<?php 
if(isset($_SESSION['userId'])){

$userId=$_SESSION['userId'];




}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Details</title>


  <style>
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

    .upperSection {
      display: flex;
      justify-content: center;
      align-items: center;

      margin: 2vh;
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;




    }

    .centered-flex {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loverSection {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2vh;
      flex-wrap: wrap;
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
      <h1>Fill Your Vehicles Details Here....</h1>
      <h2>No Of Vehicles:Number</h2>





    </div>




    <div class="loverSection">
      <div class="vehicles">
        <div id="vehicleDetails">
          <p>Vehicle 01</p>
          <div class="inputs">

            <input type="text" name="registrationNumber" id="registrationNumber" required placeholder="Registration Number" />
          </div>
          <br><br>
          <div class="inputs">
            <input type="text" name="brandName" id="brandName" required placeholder="Brand Name" />
          </div>
          <br><br>
          <div class="inputs">
            <input type="text" name="modelName" id="modelName" required placeholder="Model Name" />
          </div>

        </div>
      </div>
    </div>
  </div>
</body>

</html>