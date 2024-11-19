<?php

require_once("header.php");
require_once("login.opr.php");
//
?>
<div class="container">
  <div class="formElements">
    <h1><u><b>User Login</b></u></h1>
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

      <p style="text-align: center;">Already haven't an account? <a href="../../signIn-user/signup-User.php">SignUp.</a></p>
      <br>
      <a href="forgotPwdnew.php" style="text-align: right;">Forget Password.</a>

      <p id="msg">The Value is empty</p>
      <br>

      <button type="submit" class="submitButton" name="submitButton" onclick="onclick('email','password');">LogIn</button>

    </form>


  </div>
  <script>
    function slidingBackground(e) {
      let image1 = '../../Pic/young-stressed-man-having-trouble-with-his-stress-broken-car-engine-room-crash-failed-engine-wait-help_109549-3144.avif';
      let image2 = '../../Pic/man-holds-smartphone-his-hands-mock-up-phone-white-screen-background-car-man-holds-smartphone-his-217630203.webp';
      let image3 = '../../Pic/1675677064849.jpg';
      let image4 = '../../Pic/worker-uniform-disassembles-vehicle-engine-car-service-station-automobile-checking-inspection-professional-diagnostics-173424972.webp';
      let image6 = '../../Pic/side-view-confident-young-businessman-600nw-1764190718.webp';

      let images = [image1, image2, image3,image4,image6];

      let index = 0;

      function changeBackground() {
        const backgroundElement = document.querySelector('body');

        if (backgroundElement) {
          backgroundElement.style.backgroundImage = `url('${images[index]}')`;
          index = (index + 1) % images.length;
        } else {
          console.error('Element with class .sliding-background not found.');
        }
      }

      setInterval(changeBackground, 7000);
    }
    document.querySelector('body').addEventListener('onload', slidingBackground(event));

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