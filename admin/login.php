<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    // If already logged in, redirect to admin dashboard
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link rel="stylesheet" href="stylesheets/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Admin Login</h2>
            <form action="process_login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
            <?php if (isset($_GET['error'])): ?>
            <p class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
