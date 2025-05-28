<?php
// Function to check and create user_activity table if it doesn't exist
function checkUserActivityTable() {
    global $pdo;
    try {
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS user_activity (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id VARCHAR(255) NOT NULL,
                activity_type VARCHAR(50) NOT NULL,
                activity_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                INDEX idx_activity_time (activity_time)
            )
        ");
    } catch(PDOException $e) {
        error_log("Error creating user_activity table: " . $e->getMessage());
    }
}

// Function to get total views
function getTotalViews() {
    global $pdo;
    try {
        // Count all visits
        $stmt = $pdo->query("
            SELECT COUNT(*) as total 
            FROM user_activity 
            WHERE activity_type = 'visit'
        ");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch(PDOException $e) {
        error_log("Error getting total views: " . $e->getMessage());
        return 0;
    }
}

// Function to get current active users (users who visited in last 5 minutes)
function getCurrentActiveUsers() {
    global $pdo;
    try {
        // Count distinct users in the last 5 minutes
        $stmt = $pdo->prepare("
            SELECT COUNT(DISTINCT user_id) as active_users 
            FROM user_activity 
            WHERE activity_type = 'visit' 
            AND activity_time >= DATE_SUB(NOW(), INTERVAL 5 MINUTE)
        ");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['active_users'];
    } catch(PDOException $e) {
        error_log("Error getting active users: " . $e->getMessage());
        return 0;
    }
}

// Function to debug stats (use this to verify counts)
function debugStats() {
    global $pdo;
    try {
        // Get all visits
        $stmt = $pdo->query("
            SELECT id, user_id, activity_time, page_url 
            FROM user_activity 
            WHERE activity_type = 'visit' 
            ORDER BY activity_time DESC
        ");
        $visits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Get active users
        $stmt = $pdo->query("
            SELECT DISTINCT user_id 
            FROM user_activity 
            WHERE activity_type = 'visit' 
            AND activity_time >= DATE_SUB(NOW(), INTERVAL 5 MINUTE)
        ");
        $activeUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'total_visits' => count($visits),
            'active_users' => count($activeUsers),
            'recent_visits' => $visits,
            'active_user_list' => $activeUsers
        ];
    } catch(PDOException $e) {
        error_log("Error in debug stats: " . $e->getMessage());
        return null;
    }
}
?> 