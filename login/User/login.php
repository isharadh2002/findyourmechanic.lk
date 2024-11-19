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
        <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>"/>
        <br>


      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"/>
        <br><br>
      </div>

      <div class="remeberContainer">
        <label for="remeberMe">Remember me</label>
        <input type="checkbox" name="remember" id="remember" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
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
    function slidingBackground() {
      // Define the image paths
      let image1 = '../../Pic/young-stressed-man-having-trouble-with-his-stress-broken-car-engine-room-crash-failed-engine-wait-help_109549-3144.avif';
      let image2 = '../../Pic/man-holds-smartphone-his-hands-mock-up-phone-white-screen-background-car-man-holds-smartphone-his-217630203.webp';
      let image3 = '../../Pic/1675677064849.jpg';
      let image4 = '../../Pic/worker-uniform-disassembles-vehicle-engine-car-service-station-automobile-checking-inspection-professional-diagnostics-173424972.webp';
      let image6 = '../../Pic/side-view-confident-young-businessman-600nw-1764190718.webp';

      let images = [image1, image2, image3,image4,image6];

      let index = 0; // Start with the first image

      function changeBackground() {
        const backgroundElement = document.querySelector('body'); // Select the body element

        if (backgroundElement) {
          backgroundElement.style.backgroundImage = `url('${images[index]}')`;
          backgroundElement.style.backgroundSize = 'cover'; // Ensure the image covers the viewport
          backgroundElement.style.backgroundPosition = 'center'; // Center the image
          backgroundElement.style.transition = 'background-image 1s ease-in-out'; // Smooth transition effect

          index = (index + 1) % images.length; // Update index for next image
        } else {
          console.error('Body element not found. Background animation cannot be applied.');
        }
      }

      // Show the first image immediately
      changeBackground();

      // Set up interval to change the background every 7 seconds
      setInterval(changeBackground, 7000);
    }

    // Ensure the slidingBackground function runs when the page loads
    window.onload = slidingBackground;

    // Form validation
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const msg = document.getElementById('msg');

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