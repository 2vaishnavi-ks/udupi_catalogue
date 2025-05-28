<?php
require_once 'config.php';

// Fetch all taluks
$stmt = $pdo->query("SELECT * FROM taluk ORDER BY taluk_name");
$taluks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all destinations
$stmt = $pdo->query("SELECT d.*, t.taluk_name 
                     FROM destinations d 
                     JOIN taluk t ON d.taluk_id = t.taluk_id 
                     ORDER BY t.taluk_name, d.name");
$destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group destinations by taluk_id
$destinations_by_taluk = [];
foreach ($destinations as $dest) {
    $destinations_by_taluk[$dest['taluk_id']][] = $dest;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner - Udupi Tourism</title>
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
        .planner-section {
            padding: 100px 0 50px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
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
        .section-title p {
            color: #666;
            font-size: 1.1rem;
        }
        .form-label {
            font-weight: 500;
            color: #444;
        }
        .form-select, .form-control {
            border: 1px solid #ddd;
            padding: 0.75rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .form-select:focus, .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.2rem rgba(0,86,179,0.25);
        }
        .btn {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
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

    <!-- Trip Planner Section -->
    <section class="planner-section">
        <div class="container">
            <div class="section-title">
                <h2>Plan Your Udupi Adventure</h2>
                <p>Customize your trip to explore the best of what Udupi has to offer</p>
            </div>
            
            <?php if (isset($_GET['error']) && $_GET['error'] === 'destination_not_found'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> Sorry, the selected destination could not be found. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container">
                        <form action="plan_result.php" method="POST">
                            <div class="mb-4">
                                <label class="form-label">Select Taluk</label>
                                <select name="taluk" id="talukSelect" class="form-select" required>
                                    <option value="">Choose a taluk</option>
                                    <?php foreach ($taluks as $taluk): ?>
                                        <option value="<?= $taluk['taluk_id'] ?>">
                                            <?= htmlspecialchars($taluk['taluk_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Select Destination</label>
                                <select name="destination" id="destinationSelect" class="form-select" required disabled>
                                    <option value="">First select a taluk</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary me-md-2">
                                    <i class="fas fa-route"></i> Get Trip Details
                                </button>
                                <a href="index.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Home
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Store all destinations grouped by taluk
        const destinationsByTaluk = <?= json_encode($destinations_by_taluk) ?>;

        // Get the select elements
        const talukSelect = document.getElementById('talukSelect');
        const destinationSelect = document.getElementById('destinationSelect');

        // Add event listener to taluk select
        talukSelect.addEventListener('change', function() {
            const selectedTalukId = this.value;
            
            // Clear and disable destination select if no taluk is selected
            if (!selectedTalukId) {
                destinationSelect.innerHTML = '<option value="">First select a taluk</option>';
                destinationSelect.disabled = true;
                return;
            }

            // Get destinations for selected taluk
            const destinations = destinationsByTaluk[selectedTalukId] || [];

            // Enable destination select and update options
            destinationSelect.disabled = false;
            destinationSelect.innerHTML = '<option value="">Choose a destination</option>';

            // Add destination options
            destinations.forEach(dest => {
                const option = document.createElement('option');
                option.value = dest.destination_id;
                option.textContent = dest.name;
                destinationSelect.appendChild(option);
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
    </script>
</body>
</html> 