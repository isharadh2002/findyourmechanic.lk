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
        <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" value="<?php echo isset($_COOKIE['email_m']) ? $_COOKIE['email_m'] : ''; ?>"/>
        <br>


      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required value="<?php echo isset($_COOKIE['password_m']) ? $_COOKIE['password_m'] : ''; ?>"/>
        <br><br>
      </div>

      <div class="remeberContainer">
        <label for="remeberMe">Remember me</label>
        <input type="checkbox" name="remember" id="remember" <?php echo isset($_COOKIE['email_m']) ? 'checked' : ''; ?>>
      </div>

      <br>

      <p id="msg">The Value is empty</p>
      <br>

      <button type="submit" class="submitButton" name="submitButton">LogIn</button>

    </form>


  </div>
  <script>
    function slidingBackground() {
      // Define the image paths
      let images = [
        '../../Pic/automobile-3239764_1920.jpg',
        '../../Pic/man-holds-smartphone-his-hands-mock-up-phone-white-screen-background-car-man-holds-smartphone-his-217630203.webp',
        '../../Pic/Towing-in-Lakewood-WA.jpeg'
      ];

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