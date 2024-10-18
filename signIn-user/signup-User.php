
<?php
require_once("../../../../../C:/xamppNew/htdocs/connection.php");
include_once("signup-User-css.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sign In|User</title>
  <link rel="stylesheet" href="signup-User-css.css">

</head>

<body>
  
  <ul class="navigation">
    <li><a class="active" href="#signup-User.php">User Registration</a></li>
    <li><a href="../signin-machanic/signIn-mac.php ">Mechanic Registration</a></li>
  
  </ul>
  <div class="container">
    <div class="formElements">
      <h1><u><b>User Details</b></u></h1>
      <hr>

      <form action="" method="post">
        <label for="userName">Name:</label>
        <input type="text" name="userName" id="userName" />

        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email" />

        <label for="c_number">Contact Number:</label>
        <input type="number" name="c_number" id="c_number" />

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" />

        <label for="password_confirm">Confirm Password:</label>
        <input
          type="password"
          name="password_confirm"
          id="password_confirm" />
      </form>
    </div>
  </div>
</body>

</html>