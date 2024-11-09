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
    <link rel="stylesheet" href="stylesheets/footer.css">
    <link rel="stylesheet" href="stylesheets/user-reviews.css">
    <link rel="icon" href="assets/FindYourMechanic_Circle.png">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo-section">
                <img src="assets/FindYourMechanic_Circle.png" alt="Website Logo">
                <span>Find Your Mechanic</span>
            </div>
            <div class="login-section">
                <button onclick="window.location.href='login.php'">Sign In</button>
                <button onclick="window.location.href='signup.php'">Register</button>
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

    <div class="reviews-section">
        <h1>User Reviews</h1>
        <div class="reviews-slider">
            <div class="reviews-container">
                <!-- Review Tiles -->
                <div class="review-tile">
                    <p>"Great service! The mechanic arrived quickly and solved my problem in no time!"</p>
                    <span>- John Doe</span>
                </div>
                <div class="review-tile">
                    <p>"Amazing experience. I will definitely recommend this to others."</p>
                    <span>- Jane Smith</span>
                </div>
                <div class="review-tile">
                    <p>"Very professional mechanics and excellent customer support."</p>
                    <span>- Emily Johnson</span>
                </div>
                <div class="review-tile">
                    <p>"Easy to use and very reliable service."</p>
                    <span>- Mark Wilson</span>
                </div>
                <div class="review-tile">
                    <p>"Saved me in the middle of nowhere. Awesome app!"</p>
                    <span>- Sarah Brown</span>
                </div>
                <div class="review-tile">
                    <p>"Quick and affordable repair services. Highly recommended."</p>
                    <span>- Alex Green</span>
                </div>
                <!-- Add more review tiles as necessary -->
            </div>
        </div>
        <!-- Navigation buttons -->
        <button class="prev-slide" onclick="prevSlide()">&#10094;</button>
        <button class="next-slide" onclick="nextSlide()">&#10095;</button>
    </div>

    <script>
        let currentSlide = 0;
        const totalTiles = document.querySelectorAll('.review-tile').length; // Count the total number of review tiles
        const tilesPerView = 4; // Number of tiles visible at a time
        const slideWidth = 250 + 20; // Width of each tile (250px) + margin (20px)
        const reviewsContainer = document.querySelector('.reviews-container');

        function updateSliderPosition() {
            const maxSlide = totalTiles - tilesPerView; // Max number of slides before resetting to the beginning
            if (currentSlide > maxSlide) {
                currentSlide = 0; // Reset to the first slide after the last set
            }
            reviewsContainer.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }

        function nextSlide() {
            const maxSlide = totalTiles - tilesPerView; // Max number of slides
            if (currentSlide < maxSlide) {
                currentSlide++;
            } else {
                currentSlide = 0; // Reset to first slide when reaching the end
            }
            updateSliderPosition();
        }

        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
            } else {
                currentSlide = totalTiles - tilesPerView; // Go to the last set of slides when at the beginning
            }
            updateSliderPosition();
        }

        // Automatically slide every 3 seconds
        let slideInterval = setInterval(nextSlide, 3000);

        // Pause sliding when hovering over the review section
        const reviewsSection = document.querySelector('.reviews-section');
        reviewsSection.addEventListener('mouseenter', () => clearInterval(slideInterval));
        reviewsSection.addEventListener('mouseleave', () => slideInterval = setInterval(nextSlide, 3000));
    </script>

    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>We help you find nearby vehicle mechanics quickly and easily, ensuring your vehicle gets the attention it needs wherever you are.</p>
            </div>
            <!--
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Mechanic Login</a></li>
                    <li><a href="#">Customer Login</a></li>
                </ul>
            </div>
            -->
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <ul>
                    <li>Email: support@findyourmechanic.lk</li>
                    <li>Phone: +94 71 386 3592</li>
                    <li>Address: No.315, Negombo Road, Kurunegala</li>
                </ul>
            </div>

            <div class="footer-section social">
                <h2>Follow Us</h2>
                <ul class="social-icons">
                <li><a href="https://www.youtube.com" target="_blank"><img src="../assets/SocialMediaIcons/YouTube.png" class="fa fa-facebook"></a></li>
                    <li><a href="https://www.facebook.com" target="_blank"><img src="../assets/SocialMediaIcons/Facebook.png" class="fa fa-twitter"></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><img src="../assets/SocialMediaIcons/Instagram.png" class="fa fa-instagram"></a></li>
                    <li><a href="https://www.x.com" target="_blank"><img src="../assets/SocialMediaIcons/X.png" class="fa fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 FindYourMechanic.lk</p>
        </div>
    </footer>
</body>

</html>