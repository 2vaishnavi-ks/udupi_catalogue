-- Create database if not exists
CREATE DATABASE IF NOT EXISTS udupi_catalogue;

-- Use the database
USE udupi_catalogue;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS food;
DROP TABLE IF EXISTS local_experiences;
DROP TABLE IF EXISTS accommodation;
DROP TABLE IF EXISTS destinations;
DROP TABLE IF EXISTS activities;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS admin_users;
DROP TABLE IF EXISTS taluk;

-- Admin users table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Regular users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(100),
    phone VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Taluk Table
CREATE TABLE taluk (
    taluk_id INT PRIMARY KEY AUTO_INCREMENT,
    taluk_name VARCHAR(50) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Destinations Table
CREATE TABLE destinations (
    destination_id INT PRIMARY KEY AUTO_INCREMENT,
    taluk_id INT,
    category VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
);

-- Create Accommodation Table
CREATE TABLE accommodation (
    accommodation_id INT PRIMARY KEY AUTO_INCREMENT,
    taluk_id INT,
    category VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    contact VARCHAR(100),
    price_range VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
);

-- Create Local Experiences Table
CREATE TABLE local_experiences (
    experience_id INT PRIMARY KEY AUTO_INCREMENT,
    taluk_id INT,
    category VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    duration VARCHAR(50),
    price_range VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
);

-- Create Food Table
CREATE TABLE food (
    food_id INT PRIMARY KEY AUTO_INCREMENT,
    taluk_id INT,
    category VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    best_places TEXT,
    price_range VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (taluk_id) REFERENCES taluk(taluk_id)
);

-- Create Activities log table
CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    action VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admin_users(id)
);

-- Count number of views into the website
CREATE TABLE IF NOT EXISTS `view_logs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    `viewed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data for taluks
INSERT INTO taluk (taluk_name, description) VALUES 
('Udupi', 'Known for Sri Krishna Temple and beautiful beaches'),
('Karkala', 'Famous for Jain temples and historical monuments'),
('Hebri', 'Rich in natural beauty and wildlife'),
('Kundapura', 'Coastal paradise with pristine beaches'),
('Brahmavara', 'Cultural hub with traditional arts'),
('Byndoor', 'Scenic coastal region'),
('Kaup', 'Historic lighthouse and beaches');

-- Insert sample destinations
INSERT INTO destinations (taluk_id, category, name, description, location) VALUES 
(1, 'Religious Sites', 'Sri Krishna Temple', 'Ancient temple with rich history', 'Car Street, Udupi'),
(1, 'Beaches', 'Malpe Beach', 'Popular beach with water sports', 'Malpe'),
(1, 'Islands', 'St. Mary''s Island', 'Geological monument with unique rock formations', 'Off Malpe Coast'),
(2, 'Monuments', 'Gomateshwara Statue', '42-feet tall monolithic statue', 'Karkala'),
(3, 'Nature', 'Hebri Falls', 'Scenic waterfall in Western Ghats', 'Hebri'),
(4, 'Beaches', 'Maravanthe Beach', 'Beach with highway running parallel', 'Kundapura'),
(5, 'Temples', 'Brahmalingeshwara Temple', 'Ancient temple dedicated to Lord Shiva', 'Brahmavara'),
(5, 'Heritage', 'Kodi Beach', 'Pristine beach with traditional fishing boats', 'Kodi, Brahmavara'),
(6, 'Beaches', 'Ottinene Beach', 'Scenic viewpoint and beach', 'Byndoor'),
(6, 'Nature', 'Someshwara Wildlife Sanctuary', 'Rich biodiversity and wildlife', 'Byndoor'),
(7, 'Landmarks', 'Kaup Lighthouse', 'Historic lighthouse with panoramic views', 'Kaup Beach Road'),
(7, 'Beaches', 'Kaup Beach', 'Serene beach with lighthouse views', 'Kaup');

-- Insert sample accommodation
INSERT INTO accommodation (taluk_id, category, name, description, location, price_range) VALUES 
(1, 'Hotels', 'Paradise Isle Beach Resort', 'Luxury beach resort', 'Malpe Beach Road', 'Premium'),
(1, 'Hotels', 'Country Inn', 'Business hotel', 'Udupi City', 'Moderate'),
(2, 'Homestays', 'Heritage House', 'Traditional homestay', 'Karkala', 'Budget'),
(4, 'Resorts', 'Blue Waters', 'Beach resort', 'Kundapura', 'Premium'),
(5, 'Hotels', 'Brahmavara Inn', 'Comfortable stay near temple', 'Brahmavara Town', 'Moderate'),
(5, 'Homestays', 'Beach View Home', 'Homestay near Kodi Beach', 'Kodi, Brahmavara', 'Budget'),
(6, 'Resorts', 'Ottinene Beach Resort', 'Beach resort with scenic views', 'Byndoor', 'Premium'),
(7, 'Hotels', 'Lighthouse View Hotel', 'Hotel with lighthouse views', 'Kaup Beach Road', 'Moderate');

-- Insert sample local experiences
INSERT INTO local_experiences (taluk_id, category, name, description, duration, price_range) VALUES 
(1, 'Cultural', 'Temple Tour', 'Guided tour of ancient temples', '4 hours', 'Budget'),
(1, 'Adventure', 'Water Sports', 'Various water activities at Malpe', '2 hours', 'Moderate'),
(4, 'Nature', 'Sunset Cruise', 'Evening boat ride', '1 hour', 'Premium'),
(2, 'Heritage', 'Jain Heritage Walk', 'Walking tour of Jain monuments', '3 hours', 'Budget'),
(5, 'Cultural', 'Traditional Fishing Experience', 'Experience local fishing methods', '3 hours', 'Budget'),
(5, 'Spiritual', 'Temple Morning Rituals', 'Witness traditional morning rituals', '2 hours', 'Budget'),
(6, 'Adventure', 'Wildlife Safari', 'Guided tour of wildlife sanctuary', '4 hours', 'Premium'),
(7, 'Heritage', 'Lighthouse Tour', 'Guided tour of historic lighthouse', '1 hour', 'Budget');

-- Insert sample food items
INSERT INTO food (taluk_id, category, name, description, best_places, price_range) VALUES 
(1, 'Local Cuisine', 'Masala Dosa', 'Crispy dosa with potato filling', 'Mitra Samaj, Woodlands', 'Budget'),
(1, 'Seafood', 'Fish Curry', 'Spicy coconut-based curry', 'Thamboolam, Fish Market', 'Moderate'),
(4, 'Street Food', 'Neer Dosa', 'Rice crepe with curry', 'Local restaurants', 'Budget'),
(2, 'Snacks', 'Goli Baje', 'Deep fried snack', 'Local cafes', 'Budget'),
(5, 'Seafood', 'Kodi Fish Fry', 'Fresh fish fry from Kodi Beach', 'Kodi Beach Restaurants', 'Moderate'),
(5, 'Local Cuisine', 'Brahmavara Special Thali', 'Traditional local thali', 'Brahmavara Food Court', 'Budget'),
(6, 'Seafood', 'Byndoor Fish Curry', 'Special coastal fish curry', 'Coastal Delights Restaurant', 'Moderate'),
(7, 'Seafood', 'Kaup Beach Grilled Fish', 'Fresh grilled fish by the beach', 'Beach Side Restaurants', 'Moderate');

--ALTER TABLE destinations ADD COLUMN season VARCHAR(50);
--ALTER TABLE destinations ADD COLUMN season VARCHAR(50);
