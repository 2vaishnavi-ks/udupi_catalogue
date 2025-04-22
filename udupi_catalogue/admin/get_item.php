<?php
require_once '../config.php';
require_once '../includes/auth.php';

// Check if user is logged in and is admin
if (!isAdmin()) {
    http_response_code(403);
    exit('Unauthorized');
}

if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($item) {
            header('Content-Type: application/json');
            echo json_encode($item);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Item not found']);
        }
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing parameters']);
}
?> 