<?php
include 'config.php';

// Get taluk_id from URL, or fallback using 'name'
if (isset($_GET['taluk_id'])) {
    $taluk_id = (int)$_GET['taluk_id'];  // Cast to integer for safety
} elseif (isset($_GET['name'])) {
    $taluk_name = $_GET['name'];
    $stmt = $conn->prepare("SELECT taluk_id FROM taluk WHERE taluk_name = ?");
    $stmt->bind_param("s", $taluk_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($data = $result->fetch_assoc()) {
        $taluk_id = $data['taluk_id'];
    } else {
        die("Invalid taluk name.");
    }
} else {
    die("Taluk ID or name is required.");
}

// Get category
if (!isset($_GET['category'])) {
    die("Category is missing.");
}
$category = $_GET['category'];

// Map category to table
$valid_categories = [
    'destinations' => 'destinations',
    'food' => 'food',
    'experiences' => 'local_experiences',
    'accommodation' => 'accommodation',
    'transport' => 'transportation'
];

if (!array_key_exists($category, $valid_categories)) {
    die("Invalid category.");
}

$table = $valid_categories[$category];

// Get data using prepared statement
$stmt = $conn->prepare("SELECT * FROM $table WHERE taluk_id = ?");
$stmt->bind_param("i", $taluk_id);
$stmt->execute();
$result = $stmt->get_result();

// Get taluk name
$stmt = $conn->prepare("SELECT taluk_name FROM taluk WHERE taluk_id = ?");
$stmt->bind_param("i", $taluk_id);
$stmt->execute();
$taluk_name = $stmt->get_result()->fetch_assoc()['taluk_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($category) ?> in <?= ucfirst($taluk_name) ?> - Udupi Tourism</title>
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

    <!-- Sub Hero Section -->
    <section class="taluk-hero-section" style="background-image: linear-gradient(135deg, rgba(147, 41, 30, 0.85), rgba(69, 36, 105, 0.85)), url('<?php
        switch($category) {
            case 'destinations':
                echo 'images/hero/destinations-bg.jpg';
                break;
            case 'food':
                echo 'images/hero/food-bg.jpg';
                break;
            case 'experiences':
                echo 'images/hero/experiences-bg.jpg';
                break;
            case 'accommodation':
                echo 'images/hero/accommodation-bg.jpg';
                break;
            case 'transport':
                echo 'images/hero/transport-bg.jpg';
                break;
            default:
                echo 'images/hero/default-bg.jpg';
        }
    ?>');">
        <div class="hero-content">
            <h1 class="text-white"><?= ucfirst($category) ?> in <?= ucfirst($taluk_name) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="taluk.php?name=<?= strtolower($taluk_name) ?>" class="text-white"><?= ucfirst($taluk_name) ?></a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?= ucfirst($category) ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="container py-5">
        <div class="info-card">
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <?php if ($category === 'accommodation') echo '<th>Price Range</th>'; ?>
                            <?php if ($category === 'transport') echo '<th>Route</th><th>Frequency</th>'; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . htmlspecialchars($row['name'] ?? $row['mode']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['category'] ?? '') . "</td>";
                            if ($category === 'accommodation') echo "<td>" . htmlspecialchars($row['price_range']) . "</td>";
                            if ($category === 'transport') {
                                echo "<td>" . htmlspecialchars($row['route']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['frequency']) . "</td>";
                            }
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="javascript:history.back()" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Show/hide back to top button
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.querySelector('.back-to-top').classList.add('show');
            } else {
                document.querySelector('.back-to-top').classList.remove('show');
            }
        };
    </script>
</body>
</html>
