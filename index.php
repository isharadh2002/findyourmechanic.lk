<?php
require __DIR__ . "/shared/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Mechanic</title>
    <link rel="stylesheet" href="stylesheets/header.css">
    <link rel="stylesheet" href="stylesheets/homepage-images.css">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo-section">
                <img src="assets/FindYourMechanic_Circle.png" alt="Website Logo">
                <span>Find Your Mechanic</span>
            </div>
            <div class="login-section">
                <button onclick="window.location.href='login.php'">Log In</button>
                <button onclick="window.location.href='siignup.php'">Sign Up</button>
            </div>
        </div>
    </header>
    <br>

    <div class="slide-container">
        <div class="slider">
            <div class="overlay">
                <h1>Welcome to Find Your Mechanic</h1>
                <p>Find mechanics nearby quickly and easily.</p>
            </div>
            <div class="slides">
                <!-- Each image slide -->
                <img src="assets/HomepageImages/auto-mechanic-s-hand-holding-spanners.jpg" alt="Image 1">
                <img src="assets/HomepageImages/male-mechanic-working-auto-repair-shop-car.jpg" alt="Image 2">
                <img src="assets/HomepageImages/mechanic-man-uniform-holding-wrenches-auto-service-center-smiling-camera.jpg" alt="Image 3">
                <img src="assets/HomepageImages/modern-automobile-mechanic-composition.jpg" alt="Image 4">
            </div>
        </div>
    </div>
    <script>
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slides img').length;

        function showNextSlide() {
            currentIndex++;
            if (currentIndex >= totalSlides) {
                currentIndex = 0;
            }
            slides.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        // Set the interval for changing images every 3 seconds
        setInterval(showNextSlide, 3000);
    </script>



</body>

</html>