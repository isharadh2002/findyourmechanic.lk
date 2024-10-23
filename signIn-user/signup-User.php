<?php

require_once("header.php");

?>
<div class="container">
  <div class="formElements">
    <h1><u><b>User Details</b></u></h1>
    <hr>


    <form action="Signin.opr.php" method="post" enctype="multipart/form-data" onsubmit="refresh(event);">
      <div class="inputs">
        <br>
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" required />

      </div>


      <br><br>

      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" required />



      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required />
        <br><br>
      </div>


      <br>
      <div class="inputs">
        <label for="contactNumber">Contact Number:</label>
        <input type="tele" name="contactNumber" id="contactNumber" required pattern="^(\+94|0)?[1-9]\d{8}$" />

      </div>
      <br><br>
      <div class="inputs">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required />

        <br><br>
      </div>


      <br><br>
      <div class="center-message">
        <h1 id="afterSigninMsg"></h1>
      </div>


      <br><br>
      <div class="inputs">

        <input type="submit" class="submitButton" name="submitButton" value="SignIn" onclick="submitValues();">
      </div>
      <br><br>
    </form>


  </div>

  <script src="s.js"></script>
  </body>

  </html>