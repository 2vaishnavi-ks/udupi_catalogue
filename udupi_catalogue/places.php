<?php
require_once 'config.php';

// Fetch 6 destinations from each taluk
$stmt = $pdo->prepare("
    SELECT d.*, t.taluk_name,
    CASE 
        WHEN d.destination_id <= 2 THEN CONCAT('des-', d.destination_id, '.jpg')
        ELSE 'default.jpg'
    END as display_image
    FROM (
        SELECT *, 
        ROW_NUMBER() OVER (PARTITION BY taluk_id ORDER BY name) as rn 
        FROM destinations
    ) d 
    JOIN taluk t ON d.taluk_id = t.taluk_id
    WHERE d.rn <= 6
    ORDER BY t.taluk_name, d.name
");
$stmt->execute();
$destinations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations to Visit - Udupi Tourism</title>
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
                        <a class="nav-link active" href="places.php">Destinations to Visit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="experiences.php">Local Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food & Cuisine</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Destinations Hero Section -->
    <section class="sub-hero-section" style="background-image: url('images/places/default.jpg'); background-size: cover; background-position: center; position: relative;">
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="hero-content" style="position: relative; z-index: 1;">
            <h1>Places to Visit</h1>
            <p class="lead">Discover the most beautiful destinations across Udupi's taluks</p>
        </div>
    </section>

    <!-- Image Gallery Section -->
    <section class="image-gallery-section">
        <div class="container">
            <h2 class="section-title">Photo Gallery</h2>
            <div class="image-gallery">
                <div class="gallery-item">
                    <img src="images/places/pla-1.jpg" alt="Destination 1" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/places/pla-2.jpg" alt="Destination 2" class="img-fluid">
                </div>
                <div class="gallery-item">
                    <img src="images/places/pla-3.jpg" alt="Destination 3" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Grid Section -->
    <section class="places-grid-section">
        <div class="container">
            <h2 class="section-title">Tourist Destinations</h2>
            <div class="row g-4">
                <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="card-content">
                            <div class="taluk-badge"><?php echo htmlspecialchars(ucfirst($destination['taluk_name'])); ?></div>
                            <h3><?php echo htmlspecialchars($destination['name']); ?></h3>
                            <p class="type"><i class="fas fa-tag"></i> <?php echo htmlspecialchars($destination['category']); ?></p>
                            <p class="description"><?php echo htmlspecialchars($destination['description']); ?></p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($destination['location']); ?></p>
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