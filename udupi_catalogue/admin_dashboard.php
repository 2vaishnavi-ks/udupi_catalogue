<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get admin user data
$admin_id = $_SESSION['admin_id'];
$stmt = $pdo->prepare("SELECT username FROM admin_users WHERE id = ?");
$stmt->execute([$admin_id]);
$admin = $stmt->fetch();

// Get counts from each table
$counts = [];
$tables = ['destinations', 'accommodation', 'local_experiences', 'food'];

foreach ($tables as $table) {
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM " . $pdo->quote($table));
    $stmt->execute();
    $result = $stmt->fetch();
    $counts[$table] = $result['count'];
}

// Get recent activities
$stmt = $pdo->prepare("
    SELECT a.*, au.username 
    FROM activities a 
    JOIN admin_users au ON a.admin_id = au.id 
    ORDER BY a.created_at DESC 
    LIMIT 3
");
$stmt->execute();
$recent_activities = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <div class="sidebar-user">
            <i class="fas fa-user-circle"></i>
            <span>Welcome, <?php echo htmlspecialchars($admin['username']); ?></span>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="active">
                    <a href="#"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-map-marker-alt"></i> Manage Places</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-bed"></i> Manage Accommodations</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-hiking"></i> Manage Experiences</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-utensils"></i> Manage Food</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-bus"></i> Manage Transportation</a>
                </li>
                <li>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <button class="sidebar-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-header">
                <h2>Dashboard Overview</h2>
                <p>Welcome to your admin dashboard</p>
            </div>

            <div class="row stats-cards">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-content">
                            <h3>Destinations</h3>
                            <p class="stat-number"><?php echo $counts['destinations']; ?></p>
                        </div>
                        <div class="stat-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-content">
                            <h3>Accommodations</h3>
                            <p class="stat-number"><?php echo $counts['accommodation']; ?></p>
                        </div>
                        <div class="stat-card-icon">
                            <i class="fas fa-bed"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-content">
                            <h3>Experiences</h3>
                            <p class="stat-number"><?php echo $counts['local_experiences']; ?></p>
                        </div>
                        <div class="stat-card-icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-card-content">
                            <h3>Food Items</h3>
                            <p class="stat-number"><?php echo $counts['food']; ?></p>
                        </div>
                        <div class="stat-card-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard Overview -->
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Views</h5>
                <h2><?php echo $stats['total_views']; ?></h2>
            </div>
        </div>
    </div>
</div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="dashboard-card">
                        <h4>Recent Activities</h4>
                        <div class="activity-list">
                            <?php if (empty($recent_activities)): ?>
                            <div class="activity-item">
                                <div class="activity-content">
                                    <p>No recent activities</p>
                                </div>
                            </div>
                            <?php else: ?>
                                <?php foreach ($recent_activities as $activity): ?>
                                <div class="activity-item">
                                    <?php
                                    $icon_class = 'fas ';
                                    switch ($activity['action']) {
                                        case 'add':
                                            $icon_class .= 'fa-plus-circle text-success';
                                            break;
                                        case 'update':
                                            $icon_class .= 'fa-edit text-primary';
                                            break;
                                        case 'delete':
                                            $icon_class .= 'fa-trash-alt text-danger';
                                            break;
                                        default:
                                            $icon_class .= 'fa-info-circle text-info';
                                    }
                                    ?>
                                    <i class="<?php echo $icon_class; ?>"></i>
                                    <div class="activity-content">
                                        <p><?php echo htmlspecialchars($activity['description']); ?></p>
                                        <small>by <?php echo htmlspecialchars($activity['username']); ?> - 
                                        <?php echo date('F j, Y g:i a', strtotime($activity['created_at'])); ?></small>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-card">
                        <h4>Quick Actions</h4>
                        <div class="quick-actions">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Add New Destination</button>
                            <button class="btn btn-success"><i class="fas fa-plus"></i> Add Accommodation</button>
                            <button class="btn btn-info"><i class="fas fa-plus"></i> Add Experience</button>
                            <button class="btn btn-warning"><i class="fas fa-plus"></i> Add Food Item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const dashboardContainer = document.querySelector('.dashboard-container');
    
    sidebarToggle.addEventListener('click', function() {
        dashboardContainer.classList.toggle('sidebar-collapsed');
    });

    // Active link handling
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(l => l.parentElement.classList.remove('active'));
            this.parentElement.classList.add('active');
        });
    });
});
</script>

</body>
</html>