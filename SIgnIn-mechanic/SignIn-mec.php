<?php
require_once("header-mec.php");

//hello
?>
<div class="container">
<div class="leftcontainer">


<p style="color: white;
    font-family: cursive;
    font-size: 15vh;
    font-weight: bolder;
    text-align: center;
    font-variant: all-petite-caps; ">Be <br> Register <br>For <br> Join With <br> Us <br>& <br>Enhance your <br>Future!... </p>


</div>


<div class="rightcontainer">
  <div class="formElements">
    <h1><u><b>Mechanics Details</b></u></h1>
    <hr>

    <form action="Signin.opr.php" method="post" enctype="multipart/form-data">
      <div class="inputs">
        <br>
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" onblur="inputsRequire();" />
        <span id="name_msg" class="requiredMsg"></span>
      </div>


      <br><br>

      <div class="inputs">
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" onblur="inputsRequire();" pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" />
        <span id="email_msg" class="requiredMsg"></span>


      </div>
      <br><br>
      <div class="inputs">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" onblur="inputsRequire();" />
        <span id="password_msg" class="requiredMsg"></span><br><br>
      </div>


      <br>
      <div class="inputs">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" name="contactNumber" id="contactNumber" onblur="inputsRequire();" />
        <span id="number_msg" class="requiredMsg"></span>
      </div>

      <br><br>
      <div class="inputs">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" onblur="inputsRequire();" />
        <span id="address_msg" class="requiredMsg"></span> <br><br>
      </div>
      <div class="inputs">
        <label for="specification">Specification:</label>
        <input type="text" name="specification" id="specification" onblur="inputsRequire();" />
        <br><span>(Ex:-EV system Specialist,Cae engine specialist,.....)</span><br>
        <span id="specification_msg" class="requiredMsg"></span>
      </div>
      <br><br>
      <div id="msg">
        <label for="Qulification">Qulifications:</label>
        <input type="file" name="Qulification" id="Qulification" onblur="inputsRequire();" required />


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

        <input type="submit" class="submitButton" name="submitButton" value="Sign In">
      </div>
      <br><br>
    </form>

  </div>
</div>
</div>
<script>
  function inputsRequire() {
    // Check if the "name" input is empty
    if (document.getElementById("name").value.trim() === "") {
      document.getElementById("name_msg").innerHTML = 'Name is required!';
      return;
    }

    // Check if the "email" input is empty
    if (document.getElementById("email").value.trim() === "") {
      document.getElementById("email_msg").innerHTML = 'Email is required!';
      return;
    }

    // Check if the "password" input is empty
    if (document.getElementById("password").value.trim() === "") {
      document.getElementById("password_msg").innerHTML = 'Password is required!';
      return;
    }

    // Check if the "contactNumber" input is empty
    if (document.getElementById("contactNumber").value.trim() === "") {
      document.getElementById("number_msg").innerHTML = 'Number is required!';
      return;
    }

    // Check if the "address" input is empty
    if (document.getElementById("address").value.trim() === "") {
      document.getElementById("address_msg").innerHTML = 'Address is required!';
      return;
    }

    // Check if the "qualification" input is empty
    if (document.getElementById("qualification").value.trim() === "") {
      document.getElementById("qualification_msg").innerHTML = 'Qualifications are required!';
      return;
    }





  }
</script>
</body>

</html>