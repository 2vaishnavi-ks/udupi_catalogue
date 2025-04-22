<?php
require_once 'config.php';
require_once 'includes/auth.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Log the view event
logView($pdo, $_SESSION['user_id'], 'experiences'); // Change 'destinations' to 'accommodation', 'food', or 'experiences' as needed

// Fetch and display destinations
// ...

// Fetch 6 experiences from each taluk with taluk names
$stmt = $pdo->prepare("
    SELECT e.*, t.taluk_name,
    CASE 
        WHEN e.experience_id <= 9 THEN CONCAT('exp-', e.experience_id, '.jpg')
        ELSE 'default.jpg'
    END as display_image
    FROM (
        SELECT le.*, 
        ROW_NUMBER() OVER (PARTITION BY le.taluk_id ORDER BY le.name) as rn 
        FROM local_experiences le
    ) e 
    JOIN taluk t ON e.taluk_id = t.taluk_id
    WHERE e.rn <= 6
    ORDER BY e.taluk_id, e.name
");
$stmt->execute();
$experiences = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Experiences - Udupi Tourism</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="places.php">Places to Visit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="experiences.php">Local Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food & Cuisine</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Experiences Hero Section -->
    <section class="sub-hero-section" style="background-image: url('images/experiences/default-hero.jpg'); background-size: cover; background-position: center; position: relative;">
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="hero-content" style="position: relative; z-index: 1;">
            <h1>Local Experiences</h1>
            <p class="lead">Immerse yourself in the culture and traditions of Udupi</p>
        </div>
    </section>


    <!-- Image Gallery Section -->
    <section class="image-gallery-section">
        <div class="container">
            <h2 class="section-title">Photo Gallery</h2>
            <div class="image-gallery">
                <div class="gallery-item">
                    <img src="images/experiences/exp-1.jpg" alt="Experience 1" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/experiences/exp-7.jpg" alt="Experience 2" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/experiences/exp-9.jpg" alt="Experience 3" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/experiences/exp-5.jpg" alt="Experience 3" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Experiences Grid Section -->
    <section class="experiences-grid-section">
        <div class="container">
            <h2 class="section-title">Cultural Activities</h2>
            <div class="row g-4">
                <?php foreach ($experiences as $experience): ?>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="card-content">
                            <div class="taluk-badge"><?php echo htmlspecialchars(ucfirst($experience['taluk_name'])); ?></div>
                            <h3><?php echo htmlspecialchars($experience['name']); ?></h3>
                            <p class="type"><i class="fas fa-tag"></i> <?php echo htmlspecialchars($experience['category']); ?></p>
                            <p class="description"><?php echo htmlspecialchars($experience['description']); ?></p>
                            <div class="experience-details">
                                <p><i class="fas fa-clock"></i> Duration: <?php echo htmlspecialchars($experience['duration']); ?></p>
                                <p><i class="fas fa-rupee-sign"></i> Price Range: <?php echo htmlspecialchars($experience['price_range']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2024 Udupi Tourism. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html> 