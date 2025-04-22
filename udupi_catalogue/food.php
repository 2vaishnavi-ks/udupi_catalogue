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
logView($pdo, $_SESSION['user_id'], 'food'); // Change 'destinations' to 'accommodation', 'food', or 'experiences' as needed

// Fetch and display destinations
// ...

// Fetch 6 food items from each taluk with taluk names
$stmt = $pdo->prepare("
    SELECT f.*, t.taluk_name,
    CASE 
        WHEN f.food_id <= 9 THEN CONCAT('food-', f.food_id, '.jpg')
        ELSE 'default.jpg'
    END as display_image
    FROM (
        SELECT fd.*, 
        ROW_NUMBER() OVER (PARTITION BY fd.taluk_id ORDER BY fd.name) as rn 
        FROM food fd
    ) f 
    JOIN taluk t ON f.taluk_id = t.taluk_id
    WHERE f.rn <= 6
    ORDER BY f.taluk_id, f.name
");
$stmt->execute();
$foods = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food & Cuisine - Udupi Tourism</title>
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
                        <a class="nav-link" href="experiences.php">Local Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="food.php">Food & Cuisine</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="sub-hero-section" style="background-image: url('images/food/default.jpg'); background-size: cover; background-position: center; position: relative;">
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="hero-content" style="position: relative; z-index: 1;">
            <h1>Local Cuisine</h1>
            <p class="lead">Savor the authentic flavors of Udupi's traditional cuisine</p>
        </div>
    </section>


    <!-- Image Gallery Section -->
    <section class="image-gallery-section">
        <div class="container">
            <h2 class="section-title">Photo Gallery</h2>
            <div class="image-gallery">
                <div class="gallery-item">
                    <img src="images/food/food-1.jpg" alt="Food 1" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/food/food-2.jpg" alt="Food 2" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/food/food-3.jpg" alt="Food 3" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/food/food-4.jpg" alt="Food 3" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Food Grid Section -->
    <section class="food-grid-section">
        <div class="container">
            <h2 class="section-title">Local Delicacies</h2>
            <div class="row g-4">
                <?php foreach ($foods as $food): ?>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="card-content">
                            <div class="taluk-badge"><?php echo htmlspecialchars(ucfirst($food['taluk_name'])); ?></div>
                            <h3><?php echo htmlspecialchars($food['name']); ?></h3>
                            <p class="type"><i class="fas fa-utensils"></i> <?php echo htmlspecialchars($food['category']); ?></p>
                            <p class="description"><?php echo htmlspecialchars($food['description']); ?></p>
                            <div class="food-details">
                                <p><i class="fas fa-rupee-sign"></i> Price Range: <?php echo htmlspecialchars($food['price_range']); ?></p>
                                <p><i class="fas fa-map-marker-alt"></i> Best Places: <?php echo htmlspecialchars($food['best_places']); ?></p>
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