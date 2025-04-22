<?php
require_once 'config.php';

// Get taluk ID from URL
$taluk_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {
    // Get taluk information
    $stmt = $conn->prepare("SELECT * FROM taluk WHERE taluk_id = ?");
    $stmt->execute([$taluk_id]);
    $taluk = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$taluk) {
        header("Location: index.php");
        exit();
    }

    // Get destinations for this taluk
    $stmt = $conn->prepare("SELECT * FROM destinations WHERE taluk_id = ?");
    $stmt->execute([$taluk_id]);
    $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get accommodation for this taluk
    $stmt = $conn->prepare("SELECT * FROM accommodation WHERE taluk_id = ?");
    $stmt->execute([$taluk_id]);
    $accommodation = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get local experiences for this taluk
    $stmt = $conn->prepare("SELECT * FROM local_experiences WHERE taluk_id = ?");
    $stmt->execute([$taluk_id]);
    $experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get food options for this taluk
    $stmt = $conn->prepare("SELECT * FROM food WHERE taluk_id = ?");
    $stmt->execute([$taluk_id]);
    $food = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($taluk['taluk_name']); ?> - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        :root {
            --primary-color:rgb(69, 36, 105);
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }

        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }

        .taluk-hero {
            height: 60vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .taluk-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: inline-block;
            padding-bottom: 1rem;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .card-text {
            color: #666;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0;
            margin-top: 5rem;
        }

        footer h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        footer p {
            color: rgba(255,255,255,0.8);
        }

        .category-badge {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .duration-badge {
            background-color: var(--accent-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
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
                        <a class="nav-link" href="taluks.php">Taluks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="destinations.php">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accommodation.php">Accommodation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="experiences.php">Local Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="taluk-hero" style="background-image: url('images/<?php echo $taluk['image'] ?? 'bg_7.jpg'; ?>');">
        <div class="hero-content">
            <h1 class="display-1"><?php echo htmlspecialchars($taluk['taluk_name']); ?></h1>
            <p class="lead"><?php echo htmlspecialchars($taluk['description'] ?? 'Explore the beauty and culture of this taluk'); ?></p>
        </div>
    </header>

    <div class="container mt-5">
        <!-- Destinations Section -->
        <section class="mb-5">
            <div class="section-title">
                <h2>Destinations</h2>
            </div>
            <div class="row">
                <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4">
                    <div class="card destination-card">
                        <img src="images/<?php echo $destination['image'] ?? 'destination-1.jpg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($destination['name']); ?>">
                        <div class="card-body">
                            <span class="category-badge"><?php echo htmlspecialchars($destination['category']); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($destination['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($destination['description'] ?? ''); ?></p>
                            <a href="destination_details.php?id=<?php echo $destination['destination_id']; ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Accommodation Section -->
        <section class="mb-5">
            <div class="section-title">
                <h2>Accommodation</h2>
            </div>
            <div class="row">
                <?php foreach ($accommodation as $place): ?>
                <div class="col-md-4">
                    <div class="card accommodation-card">
                        <img src="images/<?php echo $place['image'] ?? 'hotel-resto-5.jpg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($place['name']); ?>">
                        <div class="card-body">
                            <span class="category-badge"><?php echo htmlspecialchars($place['type']); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($place['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($place['description'] ?? ''); ?></p>
                            <p class="card-text"><i class="fas fa-phone"></i> <?php echo htmlspecialchars($place['contact'] ?? 'N/A'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Local Experiences Section -->
        <section class="mb-5">
            <div class="section-title">
                <h2>Local Experiences</h2>
            </div>
            <div class="row">
                <?php foreach ($experiences as $experience): ?>
                <div class="col-md-4">
                    <div class="card experience-card">
                        <img src="images/<?php echo $experience['image'] ?? 'services-1.jpg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($experience['name']); ?>">
                        <div class="card-body">
                            <span class="duration-badge"><?php echo htmlspecialchars($experience['duration'] ?? 'N/A'); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($experience['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($experience['description'] ?? ''); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Food Section -->
        <section class="mb-5">
            <div class="section-title">
                <h2>Local Cuisine</h2>
            </div>
            <div class="row">
                <?php foreach ($food as $item): ?>
                <div class="col-md-4">
                    <div class="card food-card">
                        <img src="images/<?php echo $item['image'] ?? 'services-2.jpg'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        <div class="card-body">
                            <span class="category-badge"><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></span>
                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($item['description'] ?? ''); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 