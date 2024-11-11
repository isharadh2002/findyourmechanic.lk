<?php require_once("header.php"); ?>

<div class="container">
  <div class="formElements">
    <h1><u><b>User Details</b></u></h1>
    <hr>

    <form action="Signin.opr.php" method="post" enctype="multipart/form-data" onsubmit="return submitValues();">
      <div class="inputs">
        <br>
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" required />
      </div>

      <br><br>

      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="email" name="email" id="email" required />
      </div>

      <br><br>

      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required />
      </div>

      <br>

      <div class="inputs">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" name="contactNumber" id="contactNumber" required pattern="^(\+94|0)?[1-9]\d{8}$" />
      </div>

      <br><br>

      <div class="inputs">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required />
      </div>
      <br><br>
      <div class="inputs">
        <label for="profilePicture">Profile Picture:</label>
        <input type="file" name="profilePicture" id="profilePicture" />
      </div>

      <!--
      <div class="inputs">
        <label for="numberOfVehicles">Number Of Vehicles:</label>
        <input type="number" name="numberOfVehicles" id="numberOfVehicles" required />
      </div>
      -->
      
      <div class="center-message">
        <h1 id="afterSigninMsg">Helllo</h1>
      </div>

      <div class="inputs">
        <input type="submit" class="submitButton" name="submitButton" value="Sign In">
      </div>

    </form>
  </div>

  <script>
    function submitValues() {
      const username = document.getElementById("username").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const contactNumber = document.getElementById("contactNumber").value.trim();
      const address = document.getElementById("address").value.trim();

      // Basic validation using JavaScript to supplement HTML validation
      if (username === '') {
        window.alert("Name is Required!");
        return false; // Prevent form submission
      }

      if (email === '') {
        window.alert("Email is Required!");
        return false;
      }

      if (password === '') {
        window.alert("Password is Required!");
        return false;
      }

      if (contactNumber === '') {
        window.alert("Contact Number is Required!");
        return false;
      }

      if (address === '') {
        window.alert("Address is Required!");
        return false;
      }
      //develop
      document.getElementById("afterSigninMsg").innerHTML = "Submission Successful";
      document.getElementById("afterSigninMsg").classList.add('visible');
      return true;
    }
  </script>

</div>
</body>

</html>