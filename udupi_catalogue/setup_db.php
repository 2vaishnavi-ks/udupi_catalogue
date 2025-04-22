<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";

try {
    // Create connection without database
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS udupi_catalogue";
    $conn->exec($sql);
    echo "Database created successfully<br>";
    
    // Select database
    $conn->exec("USE udupi_catalogue");
    
    // Create tables
    $sql = "
    -- Drop existing tables
    DROP TABLE IF EXISTS food;
    DROP TABLE IF EXISTS local_experiences;
    DROP TABLE IF EXISTS accommodation;
    DROP TABLE IF EXISTS destinations;
    DROP TABLE IF EXISTS taluk;

    -- Create Taluk Table
    CREATE TABLE taluk (
        taluk_id INT PRIMARY KEY AUTO_INCREMENT,
        taluk_name VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Create Destinations Table
    CREATE TABLE destinations (
        destination_id INT PRIMARY KEY AUTO_INCREMENT,
        taluk_id INT,
        category VARCHAR(50) NOT NULL,
        name VARCHAR(100) NOT NULL,
        FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
    );

    -- Create Accommodation Table
    CREATE TABLE accommodation (
        accommodation_id INT PRIMARY KEY AUTO_INCREMENT,
        taluk_id INT,
        category VARCHAR(50) NOT NULL,
        name VARCHAR(100) NOT NULL,
        FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
    );

    -- Create Local Experiences Table
    CREATE TABLE local_experiences (
        experience_id INT PRIMARY KEY AUTO_INCREMENT,
        taluk_id INT,
        category VARCHAR(50) NOT NULL,
        name VARCHAR(100) NOT NULL,
        FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
    );

    -- Create Food Table
    CREATE TABLE food (
        food_id INT PRIMARY KEY AUTO_INCREMENT,
        taluk_id INT,
        category VARCHAR(50) NOT NULL,
        name VARCHAR(100) NOT NULL,
        FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
    );
    ";
    
    $conn->exec($sql);
    echo "Tables created successfully<br>";
    
    // Insert sample data
    $sql = "
    -- Insert Taluks
    INSERT INTO taluk (taluk_name) VALUES 
    ('Udupi'),
    ('Karkala'),
    ('Hebri'),
    ('Kundapura'),
    ('Bramhavara'),
    ('Byndoor'),
    ('Kaup');

    -- Insert Destinations (for Udupi taluk)
    INSERT INTO destinations (taluk_id, category, name) VALUES 
    (1, 'Religious Sites', 'Sri Krishna Temple'),
    (1, 'Religious Sites', 'Anantheshwara Temple'),
    (1, 'Religious Sites', 'Chandramouleshwara Temple'),
    (1, 'Beaches', 'Malpe Beach'),
    (1, 'Beaches', 'St. Mary''s Island'),
    (1, 'Natural Attractions', 'Manipal Lake'),
    (1, 'Natural Attractions', 'Hanging Bridge');

    -- Insert Accommodation (for Udupi taluk)
    INSERT INTO accommodation (taluk_id, category, name) VALUES 
    (1, 'Luxury Hotels', 'Paradise Isle Beach Resort'),
    (1, 'Luxury Hotels', 'Hotel Sri Krishna Residency'),
    (1, 'Beach Resorts', 'Summer Sands Beach Resort'),
    (1, 'Beach Resorts', 'Ocean Pearl Beach Resort'),
    (1, 'Budget Stays', 'Hotel Sri Krishna'),
    (1, 'Budget Stays', 'Hotel Kediyoor');

    -- Insert Local Experiences (for Udupi taluk)
    INSERT INTO local_experiences (taluk_id, category, name) VALUES 
    (1, 'Cultural Experiences', 'Temple Rituals'),
    (1, 'Cultural Experiences', 'Traditional Dance Shows'),
    (1, 'Adventure Activities', 'Beach Sports'),
    (1, 'Adventure Activities', 'Island Hopping'),
    (1, 'Shopping Experiences', 'Local Markets'),
    (1, 'Shopping Experiences', 'Handicraft Shops');

    -- Insert Food (for Udupi taluk)
    INSERT INTO food (taluk_id, category, name) VALUES 
    (1, 'Traditional Restaurants', 'Woodlands Restaurant'),
    (1, 'Traditional Restaurants', 'Mitra Samaj'),
    (1, 'Street Food', 'Goli Bajje'),
    (1, 'Street Food', 'Masala Dosa'),
    (1, 'Seafood Specialties', 'Prawn Ghee Roast'),
    (1, 'Seafood Specialties', 'Fish Curry');
    ";
    
    $conn->exec($sql);
    echo "Sample data inserted successfully<br>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 