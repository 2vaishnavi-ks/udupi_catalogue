<?php
session_start();
require_once '../config.php';
require_once '../includes/auth.php';

// Fetch dashboard statistics
try {
    $stats = [
        'total_views' => $pdo->query("SELECT COUNT(*) FROM view_logs")->fetchColumn()
    ];
} catch (PDOException $e) {
    $stats = [
        'total_views' => 0
    ];
}

// Check if user is logged in and is admin
if (!isAdmin()) {
    header('Location: login.php');
    exit();
}

// Fetch dashboard statistics
try {
    $stats = [
        'total_places' => $pdo->query("SELECT COUNT(*) FROM destinations")->fetchColumn(),
        'total_accommodations' => 0, // Temporarily set to 0 until table name is confirmed
        'total_experiences' => $pdo->query("SELECT COUNT(*) FROM experiences")->fetchColumn(),
        'total_foods' => $pdo->query("SELECT COUNT(*) FROM foods")->fetchColumn()
    ];
} catch (PDOException $e) {
    // If any table is missing, set its count to 0
    $stats = [
        'total_places' => 0,
        'total_accommodations' => 0,
        'total_experiences' => 0,
        'total_foods' => 0
    ];
}

// Fetch recent activities (last 5)
$activities = $pdo->query("SELECT a.*, u.username FROM activities a 
                          JOIN admin_users u ON a.admin_id = u.id 
                          ORDER BY a.created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Udupi Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active"><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="manage_data.php"><i class="fas fa-database"></i> Manage Data</a></li>
                    <li><a href="create_user.php"><i class="fas fa-user-plus"></i> Create Admin</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </div>
        // dashboard.php
// Fetch user activity data
$activityData = $pdo->query("SELECT action, COUNT(*) as count FROM activities GROUP BY action")->fetchAll(PDO::FETCH_ASSOC);

// Convert data to JSON for Chart.js
$activityLabels = array_column($activityData, 'action');
$activityCounts = array_column($activityData, 'count');
$activityJson = json_encode($activityCounts);
$activityLabelsJson = json_encode($activityLabels);
<!-- dashboard.php -->
<canvas id="activityChart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('activityChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $activityLabelsJson; ?>,
            datasets: [{
                label: 'User Activity',
                data: <?php echo $activityJson; ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <h2 class="mb-4">Dashboard Overview</h2>
                
                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tourist Destinations</h5>
                                <h2><?php echo $stats['total_places']; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Accommodations</h5>
                                <h2><?php echo $stats['total_accommodations']; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Experiences</h5>
                                <h2><?php echo $stats['total_experiences']; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Food Items</h5>
                                <h2><?php echo $stats['total_foods']; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Activities</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Admin</th>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($activity = $activities->fetch()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($activity['username']); ?></td>
                                        <td><?php echo htmlspecialchars($activity['action']); ?></td>
                                        <td><?php echo htmlspecialchars($activity['description']); ?></td>
                                        <td><?php echo date('Y-m-d H:i', strtotime($activity['created_at'])); ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 