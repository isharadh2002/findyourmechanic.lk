<?php

require_once("header.php");

?>
<div class="container">
  <div class="formElements">
    <h1><u><b>Mechanic Login</b></u></h1>
    <hr>


    <form action="Login.opr.php" method="post">
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


      <br>

      <p id="msg">The Value is empty</p>
      <br>

      <button type="submit" class="submitButton" name="submitButton">LogIn</button>

    </form>


  </div>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const msg = document.getElementById('msg');

    // Check if fields are empty
    if (!email || !password) {
      event.preventDefault(); // Prevent form submission
      msg.style.display = 'block'; // Show error message
    } else {
      msg.style.display = 'none'; // Hide error message
    }
  });
  </script>
  </body>

  </html>