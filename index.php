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
    <link rel="stylesheet" href="stylesheets/homepage-about.css">
    <link rel="stylesheet" href="stylesheets/homepage-services.css">
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
                <button onclick="window.location.href='signup.php'">Sign Up</button>
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
    <br><br>
    <div class="about-container">
        <h1>About Us</h1>
        <p>Welcome to <strong>Find Your Mechanic</strong>, your reliable solution
            for finding expert vehicle mechanics near you, anytime, anywhere. We understand
            that breakdowns can happen when you least expect them, and finding a trusted
            mechanic quickly is crucial. Our platform connects customers with certified
            mechanics in their area, making vehicle repairs fast, easy, and stress-free.</p>
        <p>Whether you're dealing with an unexpected issue or just need regular maintenance,
            our network of professionals is here to help. With a user-friendly interface,
            customers can register their vehicles, view mechanic profiles, and get in
            touch with the right expert in no time.</p>
        <p>At <strong>Find Your Mechanic</strong>, we're committed to providing efficient,
            trustworthy, and transparent services. Our mission is to take the hassle out
            of finding quality mechanics, ensuring you can get back on the road safely and confidently.</p>
    </div>
    <br><br>

    <!-- Services Section -->
    <div id="services" class="section">
        <h2 class="section-title">Our Services</h2>
        <div class="services-container">

            <!-- Service 1 -->
            <div class="service-tile">
                <h3 class="service-title">Emergency Repairs</h3>
                <p class="service-description">Fast, reliable emergency repair services to get you back on the road.</p>
            </div>

            <!-- Service 2 -->
            <div class="service-tile">
                <h3 class="service-title">Routine Maintenance</h3>
                <p class="service-description">Regular maintenance services to keep your vehicle in top condition.</p>
            </div>

            <!-- Service 3 -->
            <div class="service-tile">
                <h3 class="service-title">Tire Replacement</h3>
                <p class="service-description">Expert tire replacement services for your safety and convenience.</p>
            </div>

            <!-- Service 4 -->
            <div class="service-tile">
                <h3 class="service-title">Battery Services</h3>
                <p class="service-description">On-the-go battery replacement and testing services.</p>
            </div>

            <!-- Service 5 -->
            <div class="service-tile">
                <h3 class="service-title">Engine Diagnostics</h3>
                <p class="service-description">Comprehensive engine diagnostics to identify and solve any issues.</p>
            </div>

            <!-- Service 6 -->
            <div class="service-tile">
                <h3 class="service-title">Brake Repair</h3>
                <p class="service-description">Efficient brake repair services for your safety on the road.</p>
            </div>

        </div>
    </div>
</body>

</html>