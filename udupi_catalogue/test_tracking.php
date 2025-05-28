<?php
require_once 'config.php';
require_once 'includes/stats_functions.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Testing Tracking System</h2>";

// Test 1: Check if user_activity table exists and show structure
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'user_activity'");
    $tableExists = $stmt->rowCount() > 0;
    echo "<p>Test 1 - user_activity table exists: " . ($tableExists ? "✅ Yes" : "❌ No") . "</p>";
    
    if ($tableExists) {
        // Show table structure
        $stmt = $pdo->query("DESCRIBE user_activity");
        echo "<h4>Table Structure:</h4>";
        echo "<pre>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
        }
        echo "</pre>";

        // Show create table statement
        $stmt = $pdo->query("SHOW CREATE TABLE user_activity");
        $createTable = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h4>Create Table Statement:</h4>";
        echo "<pre>" . $createTable['Create Table'] . "</pre>";
    }
} catch(PDOException $e) {
    echo "<p>Test 1 Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 2: Insert test visit
try {
    $user_id = uniqid('test_user_', true);
    $current_page = $_SERVER['REQUEST_URI'];
    
    echo "<h4>Attempting to insert test visit:</h4>";
    echo "<pre>";
    echo "User ID: " . $user_id . "\n";
    echo "Page URL: " . $current_page . "\n";
    echo "</pre>";

    $stmt = $pdo->prepare("INSERT INTO user_activity (user_id, activity_type, page_url) VALUES (?, 'visit', ?)");
    $success = $stmt->execute([$user_id, $current_page]);
    
    if ($success) {
        echo "<p>Test 2 - Insert test visit: ✅ Success</p>";
        
        // Show the inserted record
        $stmt = $pdo->query("SELECT * FROM user_activity ORDER BY id DESC LIMIT 1");
        $lastRecord = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h4>Last Inserted Record:</h4>";
        echo "<pre>";
        print_r($lastRecord);
        echo "</pre>";
    } else {
        echo "<p>Test 2 - Insert test visit: ❌ Failed</p>";
        print_r($stmt->errorInfo());
    }
} catch(PDOException $e) {
    echo "<p>Test 2 Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p>Error Code: " . $e->getCode() . "</p>";
}

// Test 3: Check total views
try {
    $totalViews = getTotalViews();
    echo "<p>Test 3 - Total views count: ✅ " . $totalViews . "</p>";
} catch(PDOException $e) {
    echo "<p>Test 3 Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 4: Check active users
try {
    $activeUsers = getCurrentActiveUsers();
    echo "<p>Test 4 - Active users count: ✅ " . $activeUsers . "</p>";
} catch(PDOException $e) {
    echo "<p>Test 4 Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 5: View recent activity
try {
    $stmt = $pdo->query("
        SELECT * FROM user_activity 
        ORDER BY activity_time DESC 
        LIMIT 5
    ");
    $recentActivity = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>Recent Activity:</h3>";
    if (count($recentActivity) > 0) {
        echo "<pre>";
        foreach ($recentActivity as $activity) {
            echo "ID: " . $activity['id'] . "\n";
            echo "Time: " . $activity['activity_time'] . "\n";
            echo "User: " . $activity['user_id'] . "\n";
            echo "Type: " . $activity['activity_type'] . "\n";
            echo "Page: " . ($activity['page_url'] ?? 'N/A') . "\n";
            echo "-------------------\n";
        }
        echo "</pre>";
    } else {
        echo "<p>No recent activity found.</p>";
    }
} catch(PDOException $e) {
    echo "<p>Test 5 Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

?> 