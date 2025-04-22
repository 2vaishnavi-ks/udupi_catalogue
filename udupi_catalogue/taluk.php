<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

// Get taluk name from URL parameter
$taluk_name = isset($_GET['name']) ? $_GET['name'] : '';

// Validate taluk name
$valid_taluks = ['udupi', 'karkala', 'kundapura', 'brahmavar', 'kaup', 'hebri', 'byndoor'];
if (!in_array(strtolower($taluk_name), $valid_taluks)) {
    header('Location: index.php');
    exit();
}

// Format taluk name for display
$display_name = ucfirst($taluk_name);

// Get taluk background image
$background_image = "images/taluks/{$taluk_name}_hero.jpg";
if (!file_exists($background_image)) {
    $background_image = "images/taluks/default_hero.jpg";
}

// Use the existing PDO connection from config.php
try {
    // $pdo is already defined in config.php
    if (!isset($pdo)) {
        throw new PDOException("Database connection not available");
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $display_name; ?> - Udupi Tourism</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="index.php#history">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#taluks">Taluks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Taluk Hero Section -->
    <section class="taluk-hero-section" style="background-image: url('<?php echo $background_image; ?>');">
        <div class="hero-content">
            <h1><?php echo $display_name; ?></h1>
            <p class="lead">Explore the beauty and culture of <?php echo $display_name; ?></p>
        </div>
    </section>

    <!-- Information Cards -->
    <section class="taluk-info-section">
        <div class="container">
            <!-- Places to Visit -->
            <div class="info-card">
                <h2><i class="fas fa-map-marker-alt me-2"></i>Places to Visit</h2>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">
                        <?php
                        $countStmt = $pdo->prepare("SELECT COUNT(*) FROM destinations WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                        $countStmt->execute([$taluk_name]);
                        $totalCount = $countStmt->fetchColumn();
                        echo "Showing 5 of $totalCount entries";
                        ?>
                    </span>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#placesModal">
                        View All
                    </button>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM destinations WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?)) LIMIT 5");
                            $stmt->execute([$taluk_name]);
                            $hasResults = false;
                            while($row = $stmt->fetch()) {
                                $hasResults = true;
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                echo "</tr>";
                            }
                            if (!$hasResults) {
                                echo "<tr><td colspan='2' class='text-center'>No places found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Places Modal -->
            <div class="modal fade" id="placesModal" tabindex="-1" aria-labelledby="placesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="placesModalLabel">Places to Visit in <?php echo $display_name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM destinations WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?)) ORDER BY name");
                                        $stmt->execute([$taluk_name]);
                                        $hasResults = false;
                                        while($row = $stmt->fetch()) {
                                            $hasResults = true;
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                                            echo "</tr>";
                                        }
                                        if (!$hasResults) {
                                            echo "<tr><td colspan='4' class='text-center'>No places found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accommodation -->
            <div class="info-card">
                <h2><i class="fas fa-hotel me-2"></i>Accommodation</h2>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#accommodationModal">
                        More Info
                    </button>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM accommodation WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?)) LIMIT 5");
                            $stmt->execute([$taluk_name]);
                            while($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Accommodation Modal -->
            <div class="modal fade" id="accommodationModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Accommodation in <?php echo $display_name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Contact</th>
                                            <th>Price Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM accommodation WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                                        $stmt->execute([$taluk_name]);
                                        while($row = $stmt->fetch()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['price_range']) . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Local Experiences -->
            <div class="info-card">
                <h2><i class="fas fa-compass me-2"></i>Local Experiences</h2>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#experiencesModal">
                        More Info
                    </button>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Experience</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM local_experiences WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?)) LIMIT 5");
                            $stmt->execute([$taluk_name]);
                            while($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Experiences Modal -->
            <div class="modal fade" id="experiencesModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Local Experiences in <?php echo $display_name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Experience</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Duration</th>
                                            <th>Price Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM local_experiences WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                                        $stmt->execute([$taluk_name]);
                                        while($row = $stmt->fetch()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['price_range']) . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Food & Cuisine -->
            <div class="info-card">
                <h2><i class="fas fa-utensils me-2"></i>Food & Cuisine</h2>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#foodModal">
                        More Info
                    </button>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Dish</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM food WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?)) LIMIT 5");
                            $stmt->execute([$taluk_name]);
                            while($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Food Modal -->
            <div class="modal fade" id="foodModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Food & Cuisine in <?php echo $display_name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Dish</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Best Places</th>
                                            <th>Price Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM food WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                                        $stmt->execute([$taluk_name]);
                                        while($row = $stmt->fetch()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['best_places']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['price_range']) . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transportation -->
            <div class="info-card">
                <h2><i class="fas fa-bus me-2"></i>Transportation</h2>
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transportModal">
                        More Info
                    </button>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mode</th>
                                <th>Route</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM transportation WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                            $stmt->execute([$taluk_name]);
                            while($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['mode']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['route']) . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Transportation Modal -->
            <div class="modal fade" id="transportModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Transportation in <?php echo $display_name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mode</th>
                                            <th>Route</th>
                                            <th>Frequency</th>
                                            <th>Contact</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM transportation WHERE taluk_id = (SELECT taluk_id FROM taluk WHERE LOWER(taluk_name) = LOWER(?))");
                                        $stmt->execute([$taluk_name]);
                                        while($row = $stmt->fetch()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['mode']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['route']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['frequency']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Test if Bootstrap is loaded
            console.log('Bootstrap version:', bootstrap.Modal.VERSION);
            
            // Test modal functionality
            const viewAllBtn = document.querySelector('[data-bs-target="#placesModal"]');
            const placesModal = document.getElementById('placesModal');
            
            if (viewAllBtn && placesModal) {
                console.log('Modal elements found');
                viewAllBtn.addEventListener('click', function() {
                    console.log('Button clicked');
                    try {
                        const modal = new bootstrap.Modal(placesModal);
                        modal.show();
                        console.log('Modal shown');
                    } catch (error) {
                        console.error('Error showing modal:', error);
                    }
                });
            } else {
                console.error('Modal elements not found:', {
                    button: viewAllBtn,
                    modal: placesModal
                });
            }
        });
    </script>
</body>
</html> 