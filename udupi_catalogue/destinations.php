<?php
require_once 'config.php';

session_start();


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Log the view event
logView($pdo, $_SESSION['user_id'], 'destinations'); // Change 'destinations' to 'accommodation', 'food', or 'experiences' as needed

// Fetch and display destinations
// ...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Udupi Tourism</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="taluks.php">Taluks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="destinations.php">Destinations</a>
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

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tourist Destinations in Udupi</h1>
            <button id="viewAllBtn" class="btn btn-primary">View All</button>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <!-- Filter sidebar -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Filter by Category</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        try {
                            $categories = $pdo->query("SELECT DISTINCT category FROM destinations ORDER BY category");
                            while ($category = $categories->fetch(PDO::FETCH_ASSOC)) {
                                echo '<div class="form-check">';
                                echo '<input class="form-check-input category-filter" type="checkbox" value="' . htmlspecialchars($category['category']) . '" id="category_' . htmlspecialchars($category['category']) . '">';
                                echo '<label class="form-check-label" for="category_' . htmlspecialchars($category['category']) . '">';
                                echo htmlspecialchars($category['category']);
                                echo '</label>';
                                echo '</div>';
                            }
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9">
                <!-- Destinations grid -->
                <div class="row" id="destinationsGrid">
                    <?php
                    try {
                        $stmt = $pdo->query("SELECT d.*, t.taluk_name 
                                            FROM destinations d 
                                            JOIN taluk t ON d.taluk_id = t.taluk_id 
                                            ORDER BY d.name");
                        
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="col-md-6 mb-4 destination-card" data-category="' . htmlspecialchars($row['category']) . '">';
                            echo '<div class="card h-100">';
                            if (!empty($row['image_url'])) {
                                echo '<img src="' . htmlspecialchars($row['image_url']) . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
                            }
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
                            echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['category']) . '</h6>';
                            echo '<p class="card-text">Located in ' . htmlspecialchars($row['taluk_name']) . ' Taluk</p>';
                            if (!empty($row['description'])) {
                                echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                            }
                            echo '<a href="destination_details.php?id=' . $row['destination_id'] . '" class="btn btn-primary">View Details</a>';
                            echo '</div></div></div>';
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewAllBtn = document.getElementById('viewAllBtn');
        const categoryFilters = document.querySelectorAll('.category-filter');
        const destinationCards = document.querySelectorAll('.destination-card');

        // View All button click handler
        viewAllBtn.addEventListener('click', function() {
            destinationCards.forEach(card => {
                card.style.display = 'block';
            });
            // Uncheck all category filters
            categoryFilters.forEach(filter => {
                filter.checked = false;
            });
        });

        // Category filter change handler
        categoryFilters.forEach(filter => {
            filter.addEventListener('change', function() {
                const checkedCategories = Array.from(categoryFilters)
                    .filter(f => f.checked)
                    .map(f => f.value);

                destinationCards.forEach(card => {
                    if (checkedCategories.length === 0 || checkedCategories.includes(card.dataset.category)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>
</body>
</html>