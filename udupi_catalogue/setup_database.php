<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "123vaishu";

try {
    // Create connection without database
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Read SQL file
    $sql = file_get_contents('database.sql');
    
    // Split SQL file into individual queries
    $queries = array_filter(array_map('trim', explode(';', $sql)));
    
    // Execute each query
    foreach ($queries as $query) {
        if (!empty($query)) {
            $conn->exec($query);
        }
    }
    
    echo "Database and tables created successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?> 