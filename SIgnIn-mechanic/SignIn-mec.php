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
        <span id="name_msg" class="requiredMsg"></span>
      </div>


      <br><br>

      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" required pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />
        <span id="email_msg" class="requiredMsg"></span>


      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required />
        <span id="password_msg" class="requiredMsg"></span><br><br>
      </div>


      <br>
      <div class="inputs">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" name="contactNumber" id="contactNumber" required />
        <span id="number_msg" class="requiredMsg"></span>
      </div>

      <br><br>
      <div class="inputs">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required />
        <span id="address_msg" class="requiredMsg"></span> <br><br>
      </div>
      <div class="inputs">
        <label for="specification">Specification:</label>
        <input type="text" name="specification" id="specification" required />
        <br><span>(Ex:-EV system Specialist,Cae engine specialist,.....)</span><br>
        <span id="specification_msg" class="requiredMsg"></span>
      </div>
      <br><br>
      <div id="msg">
        <label for="Qulification">Qulifications:</label>
        <input type="file" name="Qulification" id="Qulification" required />


        <p id="msg">Insert a Zip file, including softcopy of<br>
          NIC, Certificates You Gain!</p>
        <span id="Qulification_msg" class="requiredMsg"></span>
      </div>
      <br>
      <hr><br>
      <p id="msg">Filling Following Fields are not neccesary!</p><br><br>
      <div id="msg">
        <label for="profilePicture">Profile Picture:</label>
        <input type="file" name="profilePicture" id="profilePicture" />
        <p id="msg">Insert a jpg or png!</p>
        <br>
      </div>
      <div id="msg">
        <label for="coverPhoto">Cover Photo:</label>
        <input type="file" name="coverPhoto" id="coverPhoto" />
        <p id="msg">Insert a jpg or png!</p>
        <br>
      </div>
      <div id="inputs">
        <label for="description">Description:</label>
        <br>
        <textarea name="description" id="description" rows="6" cols="45" maxlength="300" placeholder="Description..........." required spellcheck="true" wrap="hard"></textarea>
        <br>
      </div>





      <br><br>
      <div class="inputs">

        <input type="submit" class="submitButton" name="submitButton" value="Sign In" onclick="inputsRequire();">
      </div>
      <br><br>
    </form>

  </div>
</div>
<script>
  function inputsRequire() {
    if (!document.getElementById("name")) {

      document.getElementById("name_msg").innerHTML = 'Name is required!';

      if (!document.getElementById("email")) {

        document.getElementById("email_msg").innerHTML = 'Email is required!';
        if (!document.getElementById("password")) {

          document.getElementById("password_msg").innerHTML = 'Password is required!';
          if (!document.getElementById("contactNumber")) {

            document.getElementById("number_msg").innerHTML = 'Number is required!';

            if (!document.getElementById("address")) {

              document.getElementById("address_msg").innerHTML = 'Address is required!';
              if (!document.getElementById("Qualificaton")) {

                document.getElementById("qualification_msg").innerHTML = 'Qualifications are required!';

              }


            }
          }
        }
      }
    }
  }

  
</script>
</body>

</html>