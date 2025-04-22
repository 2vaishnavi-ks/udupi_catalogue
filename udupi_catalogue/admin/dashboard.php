<?php
session_start();
require_once '../config.php';
require_once '../includes/auth.php';

// Fetch dashboard statistics
try {
    $stats = [
        'total_views' => $pdo->query("SELECT COUNT(*) FROM view_logs")->fetchColumn(),
        'total_places' => $pdo->query("SELECT COUNT(*) FROM destinations")->fetchColumn(),
        'total_accommodations' => 0, // Temporarily set to 0 until table name is confirmed
        'total_experiences' => $pdo->query("SELECT COUNT(*) FROM experiences")->fetchColumn(),
        'total_foods' => $pdo->query("SELECT COUNT(*) FROM foods")->fetchColumn()
    ];

    // Get view distribution by type
    $viewTypes = $pdo->query("
        SELECT type, COUNT(*) as count 
        FROM view_logs 
        GROUP BY type
    ")->fetchAll(PDO::FETCH_ASSOC);

    // Get unique visitors count
    $uniqueVisitors = $pdo->query("
        SELECT COUNT(DISTINCT user_id) as count 
        FROM view_logs
    ")->fetchColumn();

    // Get today's views
    $todayViews = $pdo->query("
        SELECT COUNT(*) as count 
        FROM view_logs 
        WHERE DATE(created_at) = CURDATE()
    ")->fetchColumn();

    // Prepare data for chart
    $viewLabels = array_column($viewTypes, 'type');
    $viewCounts = array_column($viewTypes, 'count');
    $viewLabelsJson = json_encode($viewLabels);
    $viewCountsJson = json_encode($viewCounts);
} catch (PDOException $e) {
    // If any table is missing, set its count to 0
    $stats = [
        'total_views' => 0,
        'total_places' => 0,
        'total_accommodations' => 0,
        'total_experiences' => 0,
        'total_foods' => 0
    ];
    $uniqueVisitors = 0;
    $todayViews = 0;
    $viewLabelsJson = json_encode([]);
    $viewCountsJson = json_encode([]);
}

// Check if user is logged in and is admin
if (!isAdmin()) {
    header('Location: login.php');
    exit();
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

        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <h2 class="mb-4">Dashboard Overview</h2>
                
                <!-- Statistics Cards -->
                <div class="row">
                    <!-- Views Card -->
                    <div class="col-md-4">
                        <div class="card view-stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Total Views</h5>
                                    <i class="fas fa-eye fa-2x text-primary"></i>
                                </div>
                                <h2 class="mt-3"><?php echo number_format($stats['total_views']); ?></h2>
                                <div class="view-stats-details mt-3">
                                    <div class="stat-item">
                                        <span class="stat-label">Today's Views</span>
                                        <span class="stat-value"><?php echo number_format($todayViews); ?></span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-label">Unique Visitors</span>
                                        <span class="stat-value"><?php echo number_format($uniqueVisitors); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                <!-- Views Distribution Chart -->
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Views Distribution</h5>
                        <div class="view-legend">
                            <?php foreach ($viewTypes as $type): ?>
                            <span class="legend-item">
                                <span class="legend-color" style="background-color: <?php echo getColorForType($type['type']); ?>"></span>
                                <?php echo ucfirst($type['type']); ?> (<?php echo number_format($type['count']); ?>)
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="viewsChart" width="400" height="200"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Views Distribution Chart
        var viewsCtx = document.getElementById('viewsChart').getContext('2d');
        var viewsChart = new Chart(viewsCtx, {
            type: 'pie',
            data: {
                labels: <?php echo $viewLabelsJson; ?>,
                datasets: [{
                    data: <?php echo $viewCountsJson; ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php
function getColorForType($type) {
    $colors = [
        'destinations' => 'rgba(255, 99, 132, 0.7)',
        'experiences' => 'rgba(54, 162, 235, 0.7)',
        'food' => 'rgba(255, 206, 86, 0.7)',
        'accommodation' => 'rgba(75, 192, 192, 0.7)'
    ];
    return $colors[$type] ?? 'rgba(153, 102, 255, 0.7)';
}
?> 