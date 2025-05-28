<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: trip_planner.php');
    exit();
}

// Get form data
$destination_id = $_POST['destination'] ?? '';

// Get destination details
$stmt = $pdo->prepare("
    SELECT d.*, t.taluk_name 
    FROM destinations d 
    JOIN taluk t ON d.taluk_id = t.taluk_id 
    WHERE d.destination_id = ?
");
$stmt->execute([$destination_id]);
$destination = $stmt->fetch(PDO::FETCH_ASSOC);

// If destination not found, redirect back with error
if (!$destination) {
    header('Location: trip_planner.php?error=destination_not_found');
    exit();
}

// Get nearby accommodations
$stmt = $pdo->prepare("
    SELECT * FROM accommodation 
    WHERE taluk_id = ? 
    LIMIT 3
");
$stmt->execute([$destination['taluk_id']]);
$accommodations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get nearby food options
$stmt = $pdo->prepare("
    SELECT * FROM food 
    WHERE taluk_id = ? 
    LIMIT 3
");
$stmt->execute([$destination['taluk_id']]);
$food_options = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Details - Udupi Tourism</title>
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
    <style>
        .trip-details-section {
            padding: 100px 0 50px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .section-title {
            text-align: center;
            margin-bottom: 2rem;
        }
        .section-title h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }
        .card-header {
            background-color: #0056b3;
            color: white;
            font-weight: 500;
            padding: 1rem 1.5rem;
            border: none;
        }
        .card-header h4 {
            margin: 0;
            font-size: 1.25rem;
        }
        .card-body {
            padding: 1.5rem;
        }
        .destination-title {
            color: #0056b3;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .info-item {
            margin-bottom: 0.5rem;
            color: #444;
        }
        .info-item strong {
            color: #333;
            font-weight: 500;
        }
        .list-group-item {
            padding: 1rem 1.5rem;
            border-color: #eee;
        }
        .list-group-item h5 {
            color: #0056b3;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .list-group-item p {
            color: #666;
            margin-bottom: 0.25rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-primary:hover {
            background-color: #004494;
            border-color: #004494;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
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
                        <a class="nav-link" href="index.php#taluks">Taluks</a>
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
                        <a class="nav-link active" href="trip_planner.php"><i class="fas fa-map-marked-alt"></i> Trip Planner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Trip Details Section -->
    <section class="trip-details-section">
        <div class="container">
            <div class="section-title">
                <h2>Your Trip Details</h2>
            </div>

            <!-- Basic Info -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-info-circle"></i> Destination Information</h4>
                </div>
                <div class="card-body">
                    <h3 class="destination-title"><?= htmlspecialchars($destination['name']) ?></h3>
                    <p class="info-item"><strong>Location:</strong> <?= htmlspecialchars($destination['taluk_name']) ?></p>
                    <?php if (!empty($destination['description'])): ?>
                        <p class="info-item"><strong>About:</strong> <?= htmlspecialchars($destination['description']) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Accommodations -->
            <?php if (!empty($accommodations)): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-bed"></i> Nearby Places to Stay</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($accommodations as $acc): ?>
                            <li class="list-group-item">
                                <h5><?= htmlspecialchars($acc['name']) ?></h5>
                                <p><i class="fas fa-building"></i> Type: <?= htmlspecialchars($acc['category']) ?></p>
                                <?php if (!empty($acc['price_range'])): ?>
                                    <p><i class="fas fa-rupee-sign"></i> Price Range: <?= htmlspecialchars($acc['price_range']) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <!-- Food Options -->
            <?php if (!empty($food_options)): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h4><i class="fas fa-utensils"></i> Food Options</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($food_options as $food): ?>
                            <li class="list-group-item">
                                <h5><?= htmlspecialchars($food['name']) ?></h5>
                                <p><i class="fas fa-tag"></i> Category: <?= htmlspecialchars($food['category']) ?></p>
                                <?php if (!empty($food['best_places'])): ?>
                                    <p><i class="fas fa-map-marker-alt"></i> Where to find: <?= htmlspecialchars($food['best_places']) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="trip_planner.php" class="btn btn-primary me-md-2">
                    <i class="fas fa-route"></i> Plan Another Trip
                </a>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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