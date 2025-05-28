<?php
require_once 'config.php';

// Generate a unique user ID if not exists
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = uniqid('visitor_');
}

try {
    // Use the existing PDO connection from config.php
    $stmt = $pdo->prepare("INSERT INTO user_activity (user_id, activity_type, activity_time) VALUES (?, 'visit', NOW())");
    
    // Execute with the user ID
    $stmt->execute([$_SESSION['user_id']]);
    
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    error_log("Error tracking visit: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Failed to track visit']);
}
?> 