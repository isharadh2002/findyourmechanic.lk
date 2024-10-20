<?php
require_once("header-mec.php");


?>



<div class="container">
  <div class="formElements">
    <h1><u><b>Login</b></u></h1>
    <hr>

    <form action="function.php" method="post">
      <br>
      
      
      <label for="email">E-Mail:</label>
      <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />
      <br> <br>
      
      <br> <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required />
      
      <br>
      <button class="submitButton" name="submitButton">Login =></button>
    </form>
  </div>
</div>
</body>

</html>