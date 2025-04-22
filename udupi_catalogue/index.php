<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udupi Tourism - Explore the Cultural Capital of Karnataka</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-umbrella-beach"></i> Udupi Tourism
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#taluks">Taluks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="places.php">Places to Visit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="experiences.php">Local Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food & Cuisine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="video-background">
            <video autoplay muted loop playsinline preload="auto">
                <source src="udupi-bg.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-content">
            <h1>Welcome to Udupi</h1>
            <p class="lead">Discover the cultural heritage, pristine beaches, and rich traditions of Karnataka's coastal gem</p>
            <a href="#history" class="btn btn-explore">Explore Udupi</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="section-title">
                <h2>About Udupi Tourism</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h3>Welcome to Rajatha Peetha pura</h3>
                        <p>Udupi, a coastal paradise in Karnataka, is renowned for its pristine beaches, ancient temples, and rich cultural heritage. Our mission is to showcase the beauty and diversity of this remarkable region to visitors from around the world.</p>
                        <p>From the iconic Krishna Temple to the serene beaches of Malpe, from the historic Manipal to the lush Western Ghats, Udupi offers a perfect blend of spirituality, nature, and modern amenities.</p>
                        <div class="about-features">
                            <div class="feature">
                                <i class="fas fa-gopuram"></i>
                                <h4>Spiritual Heritage</h4>
                                <p>Home to ancient temples and sacred sites</p>
                            </div>
                            <div class="feature">
                                <i class="fas fa-umbrella-beach"></i>
                                <h4>Pristine Beaches</h4>
                                <p>Miles of untouched coastline</p>
                            </div>
                            <div class="feature">
                                <i class="fas fa-utensils"></i>
                                <h4>Culinary Excellence</h4>
                                <p>Famous for authentic coastal cuisine</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="images/udupi-collage.jpg" alt="Udupi Tourism" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="history" class="history-section">
        <div class="container">
            <div class="section-title">
                <h2>The Rich History of Udupi</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="history-content">
                        <p>Udupi, known as the cultural capital of Karnataka, has a history that dates back to the 13th century. The city is famous for its Krishna Temple and the Madhwa philosophy established by Sri Madhwacharya.</p>
                        <p>The region has been a center of learning and culture for centuries, with its unique blend of religious traditions, architectural marvels, and cultural practices that continue to thrive today.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="history-image">
                        <img src="images/about-1.jpg" alt="Historical Udupi" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Taluks Section -->
    <section id="taluks" class="taluks-section">
        <div class="container">
            <div class="section-title">
                <h2>Explore the Seven Taluks</h2>
            </div>
            <div class="row g-4">
                <!-- Udupi Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-1.jpeg" alt="Udupi Taluk">
                        <div class="card-content">
                            <h3>Udupi</h3>
                            <p>The cultural and administrative center of the district</p>
                            <a href="taluk.php?name=udupi" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Karkala Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-2.jpeg" alt="Karkala Taluk">
                        <div class="card-content">
                            <h3>Karkala</h3>
                            <p>Known for its historical monuments and Jain heritage</p>
                            <a href="taluk.php?name=karkala" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Kundapura Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-3.jpeg" alt="Kundapura Taluk">
                        <div class="card-content">
                            <h3>Kundapura</h3>
                            <p>Famous for its beaches and scenic beauty</p>
                            <a href="taluk.php?name=kundapura" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Brahmavar Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-7.jpg" alt="Brahmavar Taluk">
                        <div class="card-content">
                            <h3>Brahmavar</h3>
                            <p>Known for its agricultural lands and temples</p>
                            <a href="taluk.php?name=brahmavar" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Kaup Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-4.jpeg" alt="Kaup Taluk">
                        <div class="card-content">
                            <h3>Kaup</h3>
                            <p>Famous for its lighthouse and beautiful beaches</p>
                            <a href="taluk.php?name=kaup" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Hebri Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-5.jpg" alt="Hebri Taluk">
                        <div class="card-content">
                            <h3>Hebri</h3>
                            <p>Known for its Western Ghats landscapes and waterfalls</p>
                            <a href="taluk.php?name=hebri" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <!-- Byndoor Taluk -->
                <div class="col-md-4">
                    <div class="taluk-card">
                        <img src="images/place-6.jpeg" alt="Byndoor Taluk">
                        <div class="card-content">
                            <h3>Byndoor</h3>
                            <p>Famous for its pristine beaches and fishing villages</p>
                            <a href="taluk.php?name=byndoor" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Udupi Tourism</h5>
                    <p>Discover the beauty of Udupi district</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Video background handling
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('.video-background video');
            const videoContainer = document.querySelector('.video-background');
            
            // Handle video loading
            video.addEventListener('loadeddata', function() {
                videoContainer.classList.add('loaded');
            });

            // Ensure video plays on mobile devices
            video.addEventListener('play', function() {
                video.play().catch(function(error) {
                    console.log("Video autoplay failed:", error);
                });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Back to top button
            const backToTop = document.querySelector('.back-to-top');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html> 