<?php

require_once("header.php");

?>
<div class="container">
  <div class="formElements">
    <h1><u><b>User Details</b></u></h1>
    <hr>


    <form action="function.php" method="post">
      <br>
      <label for="userName">Name:</label>
      <input type="text" name="userName" id="userName" required />
      <br> <br>
      <label for="email">E-Mail:</label>
      <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />
      <br> <br>
      <label for="c_number">Contact Number:</label>
      <input type="tele" name="c_number" id="c_number" required pattern="/^\+?[1-9]\d{1,14}$/" />
      <br> <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required />
      <br> <br>
      <label for="password_confirm">Confirm Password:</label>
      <input type="password" name="password_confirm" id="password_confirm" required />
      <br>
      <button type="submit" class="submitButton" name="submitButton">Submit</button>
    </form>


  </div>
  </body>

  </html>