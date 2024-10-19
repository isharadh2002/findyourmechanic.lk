<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sign In|User</title>
    <link rel="stylesheet" href="signin-mac-css.php">

</head>

<body>

    <ul class="navigation">
        <li><a href="../signIn-user/signup-User.php">User Registration</a></li>
        <li><a class="active" href="#signIn-mac.php ">Mechanic Registration</a></li>

    </ul>
    <div class="container">
        <div class="formElements">
            <h1><u><b>Machanic Details</b></u></h1>
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