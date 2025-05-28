<?php
require_once 'config.php';
require_once 'stats_functions.php';

header('Content-Type: application/json');

try {
    $total_views = getTotalViews();
    $active_users = getCurrentActiveUsers();
    
    echo json_encode([
        'success' => true,
        'total_views' => $total_views,
        'active_users' => $active_users
    ]);
} catch (Exception $e) {
    error_log("Error getting statistics: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => 'Failed to fetch statistics'
    ]);
}
?> 