<?php
require_once("header-mec.php");


?>



<div class="container">
  <div class="formElements">
    <h1><u><b>Mechanics Details</b></u></h1>
    <hr>

    <form action="Signin.opr.php" method="post" enctype="multipart/form-data">
      <div class="inputs">
        <br>
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" required />

      </div>


      <br><br>

      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />



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
        <input type="tele" name="contactNumber" id="contactNumber" required />

      </div>
      <br><br>
      <div class="inputs">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required />
        <br><br>
      </div>
      <div id="msg">
        <label for="Qulification">Qulifications:</label>
        <input type="file" name="Qulification" id="Qulification" required />
        <br><br>

        <p id="msg">Insert a Zip file, including softcopy of<br>
          NIC, Certificates You Gain!</p>
      </div>





      <br><br>
      <div class="inputs">

        <input type="submit" class="submitButton" name="submitButton" value="Sign In">
      </div>
      <br><br>
    </form>

  </div>
</div>
</body>

</html>