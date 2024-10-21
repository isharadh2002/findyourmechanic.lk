<?php

require_once("header.php");

?>
<div class="container">
  <div class="formElements">
    <h1><u><b>User Details</b></u></h1>
    <hr>


    <form action="login.opr.php" method="post">
      <br>
      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />
        <br>
      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required />
        <br><br>
      </div>
     

      <br><br>

      <button type="submit" class="submitButton" name="submitButton">Next</button>

    </form>


  </div>
  </body>

  </html>