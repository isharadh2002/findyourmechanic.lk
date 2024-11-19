<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    // Redirect to admin dashboard if already logged in
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="stylesheets/register.css">
</head>

<body>
    <div class="register-container">
        <div class="register-form">
            <h2>Admin Registration</h2>
            <form action="process_register.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="input-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" name="register">Register</button>
            </form>
            <?php if (isset($_GET['error'])): ?>
                <p class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </p>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <p class="success-message">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>