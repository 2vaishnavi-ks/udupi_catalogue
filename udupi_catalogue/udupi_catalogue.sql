-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 04:45 PM
-- Server version: 8.0.41
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udupi_catalogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accommodation_id` int NOT NULL,
  `taluk_id` int DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `price_range` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`accommodation_id`, `taluk_id`, `category`, `name`, `description`, `location`, `contact`, `price_range`, `image_url`, `created_at`) VALUES
(1, 1, 'Hotels', 'Paradise Isle Beach Resort', 'Luxury beach resort', 'Malpe Beach Road', NULL, 'Premium', NULL, '2025-04-21 19:47:20'),
(2, 1, 'Hotels', 'Country Inn', 'Business hotel', 'Udupi City', NULL, 'Moderate', NULL, '2025-04-21 19:47:20'),
(3, 2, 'Homestays', 'Heritage House', 'Traditional homestay', 'Karkala', NULL, 'Budget', NULL, '2025-04-21 19:47:20'),
(4, 4, 'Resorts', 'Blue Waters', 'Beach resort', 'Kundapura', NULL, 'Premium', NULL, '2025-04-21 19:47:20'),
(5, 1, 'Hotel', 'Paradise Isle Beach Resort', 'Luxury beach resort', 'Malpe Beach Road', NULL, 'Premium', NULL, '2025-04-22 14:50:12'),
(6, 1, 'Hotel', 'Country Inn', 'Business hotel', 'Udupi City', NULL, 'Moderate', NULL, '2025-04-22 14:50:12'),
(7, 1, 'Lodge', 'Samanvay Boutique Hotel', 'Modern boutique lodge', 'Main road, next to Govinda Mantapa, Kinnimulki, Udupi', '08202500250', 'Premium', NULL, '2025-04-22 14:50:12'),
(8, 1, 'Homestay', 'Svarna Homestay', 'Serene riverside homestay', 'Near bridge, Santhekatte, Nayampally', NULL, 'Luxury', NULL, '2025-04-22 14:50:12'),
(9, 1, 'Hotel', 'Essentia Manipal Inn', '4-star hotel with fine dining', 'Near Karavali bypass, NH66, Udupi', NULL, 'Premium', NULL, '2025-04-22 14:50:12'),
(10, 1, 'Hotel', 'Hotel Udupi Inn', 'Comfortable city hotel', 'Shiribeedu Tower, near City Bus Stand, Udupi', '918202010333', 'Moderate', NULL, '2025-04-22 14:50:12'),
(11, 1, 'Hotel', 'Krishna Kausthubha Apartment', 'Furnished service apartments', 'Katte Acharya Marg, Kunjibettu, Udupi', '07022288141', 'Budget', NULL, '2025-04-22 14:50:12'),
(12, 1, 'Hotel', 'Udupi Yatrinivas', 'Traditional hotel near temple', 'Sri Krishna Temple Complex, Udupi', NULL, 'Budget', NULL, '2025-04-22 14:50:12'),
(13, 1, 'Hotel', 'Hotel Sri Krishna Residency', 'Well-located city hotel', 'Badagubet Road, Udupi', '09591811362', 'Moderate', NULL, '2025-04-22 14:50:12'),
(14, 1, 'Hotel', 'Chithara Comforts', 'Family-friendly hotel', 'Kavi Muddana Road, Udupi', '06366373353', 'Budget', NULL, '2025-04-22 14:50:12'),
(15, 1, 'Hotel', 'Paradise Isle Beach Resort', 'Luxury beach resort', 'Malpe Beach Road', NULL, 'Premium', NULL, '2025-04-22 14:57:44'),
(16, 1, 'Hotel', 'Country Inn', 'Business hotel', 'Udupi City', NULL, 'Moderate', NULL, '2025-04-22 14:57:44'),
(17, 1, 'Lodge', 'Samanvay Boutique Hotel', 'Modern boutique lodge', 'Main road, Kinnimulki, Udupi', '08202500250', 'Premium', NULL, '2025-04-22 14:57:44'),
(18, 1, 'Homestay', 'Svarna Homestay', 'Serene riverside homestay', 'Santhekatte, Nayampally', NULL, 'Luxury', NULL, '2025-04-22 14:57:44'),
(19, 1, 'Hotel', 'Essentia Manipal Inn', '4-star hotel with fine dining', 'Karavali bypass, NH66, Udupi', NULL, 'Premium', NULL, '2025-04-22 14:57:44'),
(20, 2, 'Hotel', 'Hotel Prakash', '3-star comfort stay', 'SH 37, Karkala', '9632826562', 'Moderate', NULL, '2025-04-22 14:57:44'),
(21, 2, 'Lodge', 'Usha Boarding and Lodging', 'Basic affordable lodge', 'Jodurasthe, Karkala', '9845155791', 'Budget', NULL, '2025-04-22 14:57:44'),
(22, 2, 'Hotel', 'Hotel Kateel International', '5-star hotel with banquet', 'Market Rd, Karkala', '7022593107', 'Premium', NULL, '2025-04-22 14:57:44'),
(23, 2, 'Homestay', 'Angels Avenue', 'Peaceful homestay beside church', 'CSI Bethanya church, Karkala', '9980881076', 'Luxury', NULL, '2025-04-22 14:57:44'),
(24, 2, 'Hotel', 'Hotel Balaji Inn', 'Business class hotel', 'Udupi Main Road, Karkala', '9663729867', 'Moderate', NULL, '2025-04-22 14:57:44'),
(25, 3, 'Hotel', 'Samudyatha Inn and Suites', 'Modern hotel near market', 'Fish Market Rd, Kundapura', '9481249777', 'Moderate', NULL, '2025-04-22 14:57:44'),
(26, 3, 'Hotel', 'UVA Manish', 'Executive hotel stay', 'Kundapura Main Road', '08867112555', 'Premium', NULL, '2025-04-22 14:57:44'),
(27, 3, 'Hotel', 'Glucklich Beach Cottages', 'Sea view cottages', 'Beejadi Beach Road', '6366716766', 'Luxury', NULL, '2025-04-22 14:57:44'),
(28, 3, 'Hotel', 'Travelers Guest House', 'Simple guesthouse stay', 'E Block Rd, Kundapura', NULL, 'Budget', NULL, '2025-04-22 14:57:44'),
(29, 3, 'Hotel', 'Blue Waters', 'Sea facing heritage hotel', 'Fort Gate, Kundapura', NULL, 'Premium', NULL, '2025-04-22 14:57:44'),
(30, 4, 'Hotel', 'Sea Breeze Resort', 'Beachfront resort stay', 'Someshwara Beach, Byndoor', '08254257457', 'Luxury', NULL, '2025-04-22 14:57:44'),
(31, 4, 'Homestay', 'Byndoor Bliss Stay', 'Countryside homestay', 'Kergalu, Byndoor', '08123999988', 'Budget', NULL, '2025-04-22 14:57:44'),
(32, 4, 'Hotel', 'Maravanthe Beach Residency', 'Hotel near beach strip', 'Maravanthe Road, Byndoor', NULL, 'Moderate', NULL, '2025-04-22 14:57:44'),
(33, 5, 'Hotel', 'Sai International', 'Budget hotel in Kapu', 'Kapu Main Road', '9845012345', 'Budget', NULL, '2025-04-22 14:57:44'),
(34, 5, 'Resort', 'Kapu Beach Resorts', 'Sea view luxury cottages', 'Kapu Beach Road', '9886054321', 'Premium', NULL, '2025-04-22 14:57:44'),
(35, 6, 'Hotel', 'Southern Heritage', 'Modern hotel stay', 'Saiberakatte, Brahmavara', '9876543210', 'Moderate', NULL, '2025-04-22 14:57:44'),
(36, 6, 'Homestay', 'Palm Grove Stay', 'Family run homestay', 'Brahmavar outskirts', NULL, 'Budget', NULL, '2025-04-22 14:57:44'),
(37, 7, 'Hotel', 'Western Woods', 'Eco-themed hotel', 'Hebri Town', '9988776655', 'Moderate', NULL, '2025-04-22 14:57:44'),
(38, 7, 'Lodge', 'Hebri Comfort Lodge', 'Simple comfortable lodge', 'NH169A, Hebri', '9123456780', 'Budget', NULL, '2025-04-22 14:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `admin_id`, `action`, `description`, `created_at`) VALUES
(1, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 03:22:25'),
(2, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 03:22:29'),
(3, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:29'),
(4, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:32'),
(5, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:35'),
(6, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:40'),
(7, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:43'),
(8, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:45'),
(9, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:49'),
(10, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 04:57:51'),
(11, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 05:00:10'),
(12, 1, 'Data Management', 'Deleted record from destinations', '2025-04-22 05:00:13'),
(13, 1, 'Data Management', 'Added new record to destinations', '2025-04-22 05:03:28'),
(14, 1, 'Data Management', 'Added new record to destinations', '2025-04-22 05:06:55'),
(15, 2, 'Data Management', 'Added new record to destinations', '2025-04-22 06:12:29'),
(16, 2, 'Data Management', 'Added new record to destinations', '2025-04-23 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sumedha', '$2y$10$T6GTGD1mwF2/090z3dIqc.kBHn5U4JeGGsxbov7A1UYmOebNkOoqK', 'nnm23cc068@nmamit.in', '2025-04-22 03:11:08', '2025-04-22 03:11:08'),
(2, 'admin', '$2y$10$371.b/zHtkNf6KMkeo5vzOY7Rq/POmDemMa.w4NJ7SKdU8QgN4V6q', 'admin12@gmail.com', '2025-04-22 06:11:20', '2025-04-22 06:11:20'),
(3, 'vaishnavivbhat', '$2y$10$pW3IKyiUeuaIQcsdiKqJS.R6v93auPqwZxeHun2Mtc5ruuQ8GKkC6', 'nnm23cc069@nmamit.in', '2025-04-22 09:10:05', '2025-04-22 09:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int NOT NULL,
  `taluk_id` int DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `taluk_id`, `category`, `name`, `description`, `location`, `image_url`, `created_at`) VALUES
(1, 1, 'Religious Sites', 'Sri Krishna Temple', 'Ancient temple with rich history', 'Car Street, Udupi', NULL, '2025-04-21 19:47:20'),
(2, 1, 'Beaches', 'Malpe Beach', 'Popular beach with water sports', 'Malpe', NULL, '2025-04-21 19:47:20'),
(3, 1, 'Islands', 'St. Mary\'s Island', 'Geological monument with unique rock formations', 'Off Malpe Coast', NULL, '2025-04-21 19:47:20'),
(6, 4, 'Beaches', 'Maravanthe Beach', 'Beach with highway running parallel', 'Kundapura', NULL, '2025-04-21 19:47:20'),
(8, 1, 'Beach', 'Malpe Beach', 'Famous for water sports, golden sands, and sunset views.', 'Malpe, 6km from Udupi', NULL, '2025-04-22 03:25:59'),
(9, 1, 'Scenic Place', 'St. Marys Island', 'Unique island with volcanic rock formations and clear waters.', 'Off Malpe Coast', NULL, '2025-04-22 03:25:59'),
(10, 1, 'Scenic Place', 'Manipal End Point', 'Hilltop viewpoint with a breathtaking city and valley view.', 'Manipal', NULL, '2025-04-22 03:25:59'),
(11, 1, 'Temple', 'Kadiyali Mahisha Mardini Temple', 'An ancient temple dedicated to Goddess Durga.', 'Kadiyali, Udupi', NULL, '2025-04-22 03:25:59'),
(12, 1, 'Temple', 'Shree Balakrishna Temple', 'A temple dedicated to Lord Krishna with historical significance.', 'Neelavara, Udupi', NULL, '2025-04-22 03:25:59'),
(13, 1, 'Beach', 'Delta Beach', 'A beautiful beach where the river and sea intersect.', 'Near Udyavara', NULL, '2025-04-22 03:25:59'),
(14, 1, 'Historical Site', 'Kodi Bengre Historic Port', 'A historic port used in ancient maritime trade.', 'Kodi Bengre', NULL, '2025-04-22 03:25:59'),
(15, 1, 'Scenic Place', 'Udyavara Backwaters', 'Scenic backwaters with traditional boat rides.', 'Udyavara', NULL, '2025-04-22 03:25:59'),
(16, 1, 'Scenic Place', 'Kallianpur Riverside', 'A tranquil riverside location with cultural heritage.', 'Kallianpur', NULL, '2025-04-22 03:25:59'),
(17, 1, 'Temple', 'Kalyanapura Temple', 'Ancient temple with intricate carvings and historical significance.', 'Kalyanapura', NULL, '2025-04-22 03:25:59'),
(19, 1, 'Beach', 'Kapu Beach', 'Clean sandy beach with peaceful surroundings and fishing activity.', 'Kapu', NULL, '2025-04-22 03:25:59'),
(20, 1, 'Historical Site', 'Pajaka Kshetra', 'Birthplace of Saint Madhvacharya with historical and religious importance.', 'Pajaka, Near Udupi', NULL, '2025-04-22 03:25:59'),
(21, 1, 'Temple', 'Indrali Temple', 'A unique temple dedicated to Goddess Indrani, rarely found in India.', 'Indrali', NULL, '2025-04-22 03:25:59'),
(22, 1, 'Historical Site', 'Malpe Fort', 'Ruins of an old fort built by Tipu Sultan near Malpe beach.', 'Malpe', NULL, '2025-04-22 03:25:59'),
(23, 1, 'Historical Site', 'Kemmanu Hanging Bridge', 'A historic hanging bridge built over a river.', 'Kemmanu', NULL, '2025-04-22 03:25:59'),
(24, 1, 'Temple', 'Shree Laxmi Venkatesha Temple', 'A revered temple dedicated to Lord Venkatesha and Goddess Laxmi.', 'Katapady', NULL, '2025-04-22 03:25:59'),
(27, 2, 'Temple', 'Shree Veeranarayana Temple', 'A historical temple dedicated to Lord Narayana.', 'Karkala Town', NULL, '2025-04-22 03:28:37'),
(28, 2, 'Temple', 'Shree Chaturmukha Basadi', 'A famous Jain temple with four identical entrances.', 'Karkala Town', NULL, '2025-04-22 03:28:37'),
(29, 2, 'Temple', 'Shree Sowthadka Mahaganapathi Temple', 'A unique open-air temple dedicated to Lord Ganesha.', 'Belman, Karkala', NULL, '2025-04-22 03:28:37'),
(30, 2, 'Historical Site', 'Varanga Jain Temple', 'Famous Jain pilgrimage center with a tranquil lake.', 'Varanga', NULL, '2025-04-22 03:28:37'),
(31, 2, 'Waterfalls', 'Arbi Falls', 'A small stream near the town; easily accessible.', 'Manipal, Karkala', NULL, '2025-04-22 03:28:37'),
(32, 2, 'Scenic Place', 'Varanga Lake', 'Serene lake with a floating Jain temple.', 'Varanga', NULL, '2025-04-22 03:28:37'),
(33, 2, 'Historical Site', 'Moodabidri Thousand Pillar Temple', 'A 15th-century Jain temple with a thousand pillars.', 'Moodabidri', NULL, '2025-04-22 03:28:37'),
(34, 2, 'Historical Site', 'Jain Basadis of Karkala', 'Collection of ancient Jain temples in Karkala.', 'Karkala Town', NULL, '2025-04-22 03:28:37'),
(35, 2, 'Historical Site', 'Karkala Gomateshwara Statue', '42-foot monolithic statue of Lord Bahubali.', 'Karkala Town', NULL, '2025-04-22 03:28:37'),
(36, 2, 'Historical Site', 'Gomatheshwara Statue at Venoor', 'Another site of Lord Bahubali\'s monolithic statues.', 'Venoor', NULL, '2025-04-22 03:28:37'),
(37, 2, 'Religious Site', 'Attur Church', 'Historic church known for annual feast of St. Lawrence.', 'Attur, Karkala', NULL, '2025-04-22 03:28:37'),
(38, 2, 'Temple', 'Hiriyangadi Vinayaka Temple', 'Ancient temple dedicated to Lord Ganesha.', 'Hiriyangadi, Karkala', NULL, '2025-04-22 03:28:37'),
(40, 2, 'Waterfalls', 'Durga Falls', 'A river flowing over rocks, creating a waterfall effect; easily accessible.', 'Karkala', NULL, '2025-04-22 03:28:37'),
(41, 2, 'Temple', 'Nere Hanuman Temple', 'Temple known for its unique idol and religious significance.', 'Nere, Karkala', NULL, '2025-04-22 03:28:37'),
(42, 2, 'Historical Site', 'Belmannu Durga Parameshwari Temple', 'Temple with historical connections to the regions rulers.', 'Belmannu', NULL, '2025-04-22 03:28:37'),
(43, 6, 'Temple', 'Kollur Mookambika Temple', 'A renowned temple dedicated to Goddess Mookambika, visited by thousands.', 'Kollur, Byndoor', NULL, '2025-04-22 03:30:33'),
(44, 6, 'Beach', 'Someshwara Beach', 'Less crowded, known for its natural beauty and scenic sunset views.', 'Baindur', NULL, '2025-04-22 03:30:33'),
(45, 6, 'Beach', 'Uppunda Beach', 'A hidden gem with serene waves and an excellent picnic spot.', 'Uppunda Beach', NULL, '2025-04-22 03:30:33'),
(46, 6, 'Waterfalls', 'Belkal Theertha', 'Requires a 3 km uphill trek; entry fee applies.', 'Kollur, Byndoor', NULL, '2025-04-22 03:30:33'),
(47, 6, 'Waterfalls', 'Koosalli Falls', 'A six-tiered waterfall; involves a 4 km trek through dense forest.', 'Byndoor', NULL, '2025-04-22 03:30:33'),
(48, 6, 'Waterfalls', 'Kudumari Falls', 'Also known as Chaktikal Falls; accessible via a challenging trek.', 'Byndoor', NULL, '2025-04-22 03:30:33'),
(49, 6, 'Waterfalls', 'Thombattu Falls', 'A small waterfall; accessible via a short trek; best visited if already in the area.', 'Haladi', NULL, '2025-04-22 03:30:33'),
(50, 6, 'Waterfalls', 'Haklamane Falls', 'Involves off-roading and a moderate hike; a smaller waterfall.', 'Gangolli', NULL, '2025-04-22 03:30:33'),
(51, 6, 'Waterfalls', 'Gulnadi Falls', 'Lesser-known waterfall; details about accessibility are limited.', 'Gangolli', NULL, '2025-04-22 03:30:33'),
(53, 6, 'Scenic Place', 'Ottinene Sunset Viewpoint', 'Panoramic viewpoint for breathtaking sunset views.', 'Byndoor', NULL, '2025-04-22 03:30:33'),
(54, 6, 'Scenic Place', 'Mookambika Wildlife Sanctuary', 'Rich in biodiversity, home to various flora and fauna.', 'Kollur', NULL, '2025-04-22 03:30:33'),
(55, 6, 'Scenic Place', 'Byndoor Estuary', 'Stunning estuary with golden sandbanks.', 'Byndoor', NULL, '2025-04-22 03:30:33'),
(56, 6, 'Historical Site', 'Kollur Arishina Gundi', 'A scenic waterfall with spiritual importance.', 'Kollur', NULL, '2025-04-22 03:30:33'),
(57, 6, 'Historical Site', 'Byndoor Seneshwara Temple', 'Temple with ancient stone inscriptions.', 'Byndoor', NULL, '2025-04-22 03:30:33'),
(58, 6, 'Historical Site', 'Uppunda Fort', 'A fort built for coastal defense.', 'Uppunda', NULL, '2025-04-22 03:30:33'),
(59, 6, 'Temple', 'Heggarne Temple', 'Ancient temple with unique architectural features.', 'Heggarne, Byndoor', NULL, '2025-04-22 03:30:33'),
(61, 4, 'Temple', 'Shree Kumbashi Ganapathi Temple', 'A well-known temple dedicated to Lord Ganapathi.', 'Kumbashi, Kundapur', NULL, '2025-04-22 03:32:30'),
(62, 4, 'Temple', 'Shree Kundeshwara Temple', 'A Shiva temple famous for its annual Rathotsava festival.', 'Kundapur Town', NULL, '2025-04-22 03:32:30'),
(63, 4, 'Temple', 'Shree Kamalashile Brahmi Durgaparameshwari Temple', 'A famous temple with a sacred river and cave.', 'Kundapur', NULL, '2025-04-22 03:32:30'),
(64, 4, 'Beach', 'Maravanthe Beach', 'Unique beach with a river on one side and the Arabian Sea on the other.', 'Maravanthe', NULL, '2025-04-22 03:32:30'),
(65, 4, 'Beach', 'Kodi Beach', 'A tranquil delta beach where a river meets the sea.', 'Kodi, Kundapur', NULL, '2025-04-22 03:32:30'),
(66, 4, 'Beach', 'Trasi Beach', 'Offers a long stretch of pristine sand, perfect for beach walks.', 'Trasi', NULL, '2025-04-22 03:32:30'),
(67, 4, 'Historical Site', 'Koteshwara Kotilingeshwara Temple', 'Temple with historical significance in Koteswara.', 'Koteswara', NULL, '2025-04-22 03:32:30'),
(68, 4, 'Historical Site', 'Shankaranarayana Temple', 'A temple associated with the Pandavas\' exile.', 'Shankaranarayana', NULL, '2025-04-22 03:32:30'),
(69, 4, 'Historical Site', 'Basrur Historical Village', 'An ancient village with many historic temples.', 'Basrur', NULL, '2025-04-22 03:32:30'),
(70, 4, 'Historical Site', 'Maravanthe Beach Historic Site', 'A unique beach location with historical relevance.', 'Maravanthe', NULL, '2025-04-22 03:32:30'),
(71, 4, 'Historical Site', 'Shiriyara Koti (Small Fort)', 'A small fort that played a role in regional battles.', 'Shiriyara', NULL, '2025-04-22 03:32:30'),
(72, 4, 'Historical Site', 'Kundapura Jain Temples', 'Cluster of historic Jain temples in the region.', 'Kundapura', NULL, '2025-04-22 03:32:30'),
(74, 4, 'Scenic Place', 'Malyadi Bird Sanctuary', 'Sanctuary famous for migratory birds and wetland ecosystem.', 'Kundapura', NULL, '2025-04-22 03:32:30'),
(75, 4, 'Scenic Place', 'Shankaranarayana Hills', 'A spiritual and scenic hill with breathtaking views.', 'Shankaranarayana', NULL, '2025-04-22 03:32:30'),
(76, 4, 'Scenic Place', 'Halady Riverbank', 'A calm and picturesque riverbank.', 'Halady', NULL, '2025-04-22 03:32:30'),
(77, 7, 'Temple', 'Shree Durga Parameshwari Temple', 'A famous temple located on an island in the middle of the river Nandini.', 'Kateel, Kaup', NULL, '2025-04-22 03:36:16'),
(78, 7, 'Temple', 'Shree Vishnumurthy Temple', 'An ancient temple dedicated to Lord Vishnu.', 'Kota, Kaup', NULL, '2025-04-22 03:36:16'),
(79, 7, 'Temple', 'Shree Siddi Vinayaka Temple', 'A powerful temple dedicated to Lord Ganesha, visited for wish fulfillment.', 'Anegudde, Kaup', NULL, '2025-04-22 03:36:16'),
(80, 7, 'Temple', 'Shree Janardhana Mahakali Temple', 'A twin deity temple with Lord Janardhana and Goddess Mahakali.', 'Ambalpadi, Kaup', NULL, '2025-04-22 03:36:16'),
(81, 7, 'Beach', 'Kaup Beach', 'Known for its lighthouse and breathtaking sea views.', 'Kaup Beach', NULL, '2025-04-22 03:36:16'),
(82, 7, 'Beach', 'Padubidri Beach', 'Clean and serene, ideal for family outings and water sports.', 'Padubidri', NULL, '2025-04-22 03:36:16'),
(83, 7, 'Historical Site', 'Kaup Light House', 'A British-era lighthouse with panoramic coastal views.', 'Kaup', NULL, '2025-04-22 03:36:16'),
(84, 7, 'Historical Site', 'Belle Durga Parameshwari Temple', 'A temple with mythological importance and ancient origins.', 'Belle', NULL, '2025-04-22 03:36:16'),
(85, 7, 'Historical Site', 'Padubidri Temple', 'A significant place of worship with historical value.', 'Padubidri', NULL, '2025-04-22 03:36:16'),
(86, 7, 'Scenic Place', 'Mulki Backwaters', 'Scenic water stretch for kayaking and boat rides.', 'Mulki', NULL, '2025-04-22 03:36:16'),
(87, 7, 'Scenic Place', 'Belle Hanging Bridge', 'A hanging bridge over a river, ideal for photography.', 'Belle', NULL, '2025-04-22 03:36:16'),
(88, 7, 'Temple', 'Panchlingeshwara Temple', 'Historic temple with five lingams representing five aspects of Lord Shiva.', 'Kaup Town', NULL, '2025-04-22 03:36:16'),
(89, 7, 'Temple', 'Haleangadi Devi Temple', 'Ancient temple known for its cultural significance and festivals.', 'Haleangadi, Kaup', NULL, '2025-04-22 03:36:16'),
(90, 7, 'Temple', 'Nandikeshwara Temple', 'Temple dedicated to Nandi, the vehicle of Lord Shiva.', 'Mulki, Kaup', NULL, '2025-04-22 03:36:16'),
(91, 7, 'Temple', 'Shri Veerabhadra Temple', 'Historical temple dedicated to Lord Veerabhadra, a fierce form of Shiva.', 'Kaup', NULL, '2025-04-22 03:36:16'),
(92, 7, 'Beach', 'Nadsal Beach', 'Less explored beach with natural beauty and fishing activities.', 'Nadsal, Kaup', NULL, '2025-04-22 03:36:16'),
(93, 7, 'Scenic Place', 'Pilikula Lake', 'Serene lake surrounded by greenery, ideal for boating.', 'Pilikula, Kaup', NULL, '2025-04-22 03:36:16'),
(94, 7, 'Beach', 'Uliyargoli Beach', 'Pristine beach with golden sands and scenic views.', 'Uliyargoli, Kaup', NULL, '2025-04-22 03:36:16'),
(95, 7, 'Beach', 'Tannirbhavi Beach', 'Popular beach with water sports and recreational activities.', 'Tannirbhavi, Kaup', NULL, '2025-04-22 03:36:16'),
(96, 7, 'Temple', 'Shri Bhadrakali Temple', 'Ancient temple dedicated to Goddess Bhadrakali.', 'Kaup Town', NULL, '2025-04-22 03:36:16'),
(97, 3, 'Temple', 'Shree Siddhi Vinayaka Temple', 'A famous Ganesha temple known for its unique idol of Lord Ganesha.', 'Hattiangadi, Hebri', NULL, '2025-04-22 03:37:48'),
(98, 3, 'Temple', 'Shree Nandikeshwara Temple', 'A historic temple dedicated to Nandi, the vehicle of Lord Shiva.', 'Karkala, Hebri', NULL, '2025-04-22 03:37:48'),
(99, 3, 'Temple', 'Shree Vaidyanatha Temple', 'A temple dedicated to Lord Shiva, known for its healing powers.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(100, 3, 'Waterfalls', 'Kudlu Theertha', 'A 300‑feet waterfall; often requires a 4 km trek; may be closed during certain periods.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(101, 3, 'Waterfalls', 'Jomlu Theertha', 'A smaller waterfall about 20 feet high; easily accessible but sometimes closed.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(102, 3, 'Waterfalls', 'Koodlu Falls', 'Beautiful falls surrounded by lush vegetation.', 'Kundapur, Hebri', NULL, '2025-04-22 03:37:48'),
(103, 3, 'Waterfalls', 'Barkana Waterfalls', 'Tallest waterfall in Udupi with stunning misty views.', 'Agumbe', NULL, '2025-04-22 03:37:48'),
(104, 3, 'Waterfalls', 'Onake Abbi Falls', 'A 500‑feet waterfall; requires a 4–6 km challenging trek; forest department permission needed.', 'Agumbe', NULL, '2025-04-22 03:37:48'),
(105, 3, 'Historical Site', 'Hosangadi Fort', 'Remains of a fort dating back to the Vijayanagara era.', 'Hosangadi', NULL, '2025-04-22 03:37:48'),
(106, 3, 'Historical Site', 'Perdoor Mahalingeshwara Temple', 'Ancient temple dedicated to Lord Shiva.', 'Perdoor', NULL, '2025-04-22 03:37:48'),
(107, 3, 'Scenic Place', 'Kudremukh National Park', 'Biodiversity hotspot famous for trekking and wildlife spotting.', 'Kudremukh', NULL, '2025-04-22 03:37:48'),
(109, 3, 'Scenic Place', 'Kudremukh Peak', 'Challenging trek with a breathtaking peak view.', 'Kudremukh', NULL, '2025-04-22 03:37:48'),
(110, 3, 'Scenic Place', 'Kundadri Hills', 'Hilltop with mesmerizing sunrise and sunset views.', 'Agumbe', NULL, '2025-04-22 03:37:48'),
(111, 3, 'Scenic Place', 'Someshwara Wildlife Sanctuary', 'Wildlife sanctuary known for its dense forest and rich birdlife.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(112, 3, 'Scenic Place', 'Seethanadi Nature Camp', 'A nature camp ideal for birdwatching and eco‑tourism.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(113, 3, 'Scenic Place', 'Sitanadi River Viewpoint', 'A peaceful river viewpoint perfect for picnics.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(114, 3, 'Historical Site', 'Hebri Someshwara Wildlife Temple', 'Located inside a wildlife sanctuary, of historical importance.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(115, 3, 'Historical Site', 'Kudlu Theertha Temple', 'Temple near a famous waterfall; has deep mythological ties.', 'Hebri', NULL, '2025-04-22 03:37:48'),
(116, 3, 'Historical Site', 'Kudremukh Iron Ore Co. Township', 'An old mining town with remnants of British‑era structures.', 'Kudremukh', NULL, '2025-04-22 03:37:48'),
(117, 5, 'Temple', 'Shree Mahalingeshwara Temple', 'A historic Shiva temple located in the Barkur region.', 'Barkur, Brahmavara', NULL, '2025-04-22 03:38:24'),
(118, 5, 'Temple', 'Shree Panchalingeshwara Temple', 'A temple dedicated to five Lingams of Lord Shiva.', 'Kundapur, Brahmavara', NULL, '2025-04-22 03:38:24'),
(119, 5, 'Historical Site', 'Barkur Fort', 'Ruins of a historical fort in Barkur, a former capital of Tulu Nadu.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(120, 5, 'Historical Site', 'Barkur Temples', 'Cluster of ancient temples built in different architectural styles.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(121, 5, 'Scenic Place', 'Mandarthi Hills', 'Scenic hill with religious significance and nature trails.', 'Mandarthi', NULL, '2025-04-22 03:38:24'),
(122, 5, 'Scenic Place', 'Barkur Riverside', 'A historic riverfront with picturesque views.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(123, 5, 'Temple', 'Brahmalingeshwara Temple', 'Ancient temple dedicated to Lord Shiva in his creator form.', 'Brahmavara Town', NULL, '2025-04-22 03:38:24'),
(125, 5, 'Temple', 'Barkur Panchalingeshwara Temple', 'Famous for its five lingams and historical significance.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(126, 5, 'Temple', 'Hangaluru Temple', 'Ancient temple with historical importance.', 'Hangaluru, Brahmavara', NULL, '2025-04-22 03:38:24'),
(127, 5, 'Waterfalls', 'Kokkarne Waterfalls', 'Seasonal waterfall in a serene environment.', 'Kokkarne, Brahmavara', NULL, '2025-04-22 03:38:24'),
(128, 5, 'Historical Site', 'Barkur Museum', 'Museum displaying artifacts from Barkurs rich history.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(129, 5, 'Scenic Place', 'Nandalike River Camp', 'Riverside camping spot with natural beauty.', 'Nandalike, Brahmavara', NULL, '2025-04-22 03:38:24'),
(130, 5, 'Scenic Place', 'Chara Hanging Bridge', 'Suspension bridge offering scenic views of the river.', 'Chara, Brahmavara', NULL, '2025-04-22 03:38:24'),
(131, 5, 'Temple', 'Barkur Jain Temple', 'Ancient Jain temple showcasing historical architecture.', 'Barkur', NULL, '2025-04-22 03:38:24'),
(132, 5, 'Cultural Site', 'Kakkunje Village', 'Traditional village known for its cultural heritage.', 'Kakkunje, Brahmavara', NULL, '2025-04-22 03:38:24'),
(133, 5, 'Beach', 'Kodi Bengre Beach Extension', 'Extension of Kodi Bengre beach with pristine sands.', 'Kodi, Brahmavara', NULL, '2025-04-22 03:38:24'),
(134, 5, 'Scenic Place', 'Saligrama River View', 'Scenic spot along the river with peaceful surroundings.', 'Saligrama, Brahmavara', NULL, '2025-04-22 03:38:24'),
(135, 5, 'Temple', 'Hattiyangadi Shiva Temple', 'Historic temple with unique architecture.', 'Hattiyangadi, Brahmavara', NULL, '2025-04-22 03:38:24'),
(136, 5, 'Historical Site', 'Kumbashi Historic Site', 'Archaeological site with remnants of ancient structures.', 'Kumbashi, Brahmavara', NULL, '2025-04-22 03:38:24'),
(139, 7, 'temple', 'udupi', 'a beautiful location', 'udupi', '123490eqld[pql', '2025-04-22 06:12:29'),
(140, 2, 'twmple', 'shiva', 'tqjjnfjsnkj', 'udupi', '12wdefryhtgrfdsd', '2025-04-23 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int NOT NULL,
  `taluk_id` int DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `best_places` text,
  `price_range` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `taluk_id`, `category`, `name`, `description`, `best_places`, `price_range`, `image_url`, `created_at`) VALUES
(1, 1, 'Local Cuisine', 'Masala Dosa', 'Crispy dosa with potato filling', 'Mitra Samaj, Woodlands', 'Budget', NULL, '2025-04-21 19:47:20'),
(2, 1, 'Seafood', 'Fish Curry', 'Spicy coconut-based curry', 'Thamboolam, Fish Market', 'Moderate', NULL, '2025-04-21 19:47:20'),
(3, 4, 'Street Food', 'Neer Dosa', 'Rice crepe with curry', 'Local restaurants', 'Budget', NULL, '2025-04-21 19:47:20'),
(4, 2, 'Snacks', 'Goli Baje', 'Deep fried snack', 'Local cafes', 'Budget', NULL, '2025-04-21 19:47:20'),
(5, 1, 'Breakfast', 'Neer Dosa', 'Thin, soft rice crepes made without fermentation, usually served with chutney.', 'Udupi Town, Manipal', NULL, NULL, '2025-04-21 19:55:49'),
(6, 1, 'Snack', 'Goli Baje', 'Deep-fried maida fritters, soft inside and crispy outside, often served with coconut chutney.', 'Udupi Town, Malpe', NULL, NULL, '2025-04-21 19:55:49'),
(7, 4, 'Breakfast', 'Sajjige Bajil', 'A mix of poha (flattened rice) and upma, served as a light meal.', 'Kundapura, Brahmavara', NULL, NULL, '2025-04-21 19:55:49'),
(8, 2, 'Breakfast', 'Kotte Kadubu', 'Idlis steamed in jackfruit or banana leaves, giving a unique aroma.', 'Karkala, Hebri', NULL, NULL, '2025-04-21 19:55:49'),
(9, 1, 'Main Course', 'Udupi Sambar', 'A mildly sweet and tangy lentil-based curry with vegetables, signature to Udupi cuisine.', 'Udupi Town', NULL, NULL, '2025-04-21 19:55:49'),
(10, 2, 'Snack/Main', 'Pathrode', 'Steamed rolls made from colocasia leaves layered with spiced rice paste.', 'Karkala, Moodbidri', NULL, NULL, '2025-04-21 19:55:49'),
(11, 4, 'Dessert', 'Kayi Holige', 'Coconut and jaggery stuffed flatbread, typically made during festivals.', 'Kundapura, Kota', NULL, NULL, '2025-04-21 19:55:49'),
(12, 1, 'Dessert', 'Rasayana', 'A sweet dish made of mashed banana or mango mixed with coconut milk and jaggery.', 'Udupi Town, Manipal', NULL, NULL, '2025-04-21 19:55:49'),
(13, 4, 'Side Dish', 'Kadle Manoli Gassi', 'A curry made with black chickpeas and ivy gourd in coconut masala.', 'Kundapura, Saligrama', NULL, NULL, '2025-04-21 19:55:49'),
(14, 2, 'Curry', 'Majjige Huli', 'Buttermilk-based curry made with vegetables like ash gourd or cucumber.', 'Karkala, Hebri', NULL, NULL, '2025-04-21 19:55:49'),
(15, 1, 'Dessert', 'Ragi Manni', 'Finger millet (ragi) pudding made with jaggery and coconut milk.', 'Udupi Town, Kaup', NULL, NULL, '2025-04-21 19:55:49'),
(16, 4, 'Snack', 'Chakkuli', 'Crisp spiral-shaped snack made from rice flour and urad dal.', 'Kundapura, Koteshwara', NULL, NULL, '2025-04-21 19:55:49'),
(17, 1, 'Snack', 'Avalakki Upkari', 'Spiced flattened rice sautéed with mustard, curry leaves, and grated coconut.', 'Udupi Town', NULL, NULL, '2025-04-21 19:55:49'),
(18, 1, 'Dessert', 'Banana Halwa', 'Dense, sweet halwa made using ripe bananas, ghee, and jaggery.', 'Udupi Town, Manipal', NULL, NULL, '2025-04-21 19:55:49'),
(19, 2, 'Salad', 'Kosambari', 'Fresh salad made of soaked lentils, cucumber, coconut, and lime juice.', 'Karkala, Moodbidri', NULL, NULL, '2025-04-21 19:55:49'),
(20, 1, 'Dessert', 'Madgane', 'Sweet made with chana dal, jaggery, and coconut milk, usually prepared during festivals.', 'Udupi Temple Kitchens', NULL, NULL, '2025-04-21 19:59:58'),
(21, 1, 'Breakfast', 'Taushe Idli', 'Cucumber-based idli that is soft and mildly sweet, served with coconut chutney.', 'Local homes in Katapady', NULL, NULL, '2025-04-21 19:59:58'),
(22, 1, 'Breakfast/Snack', 'Pundi Gatti', 'Steamed rice dumplings served with coconut chutney.', 'Shivalli eateries', NULL, NULL, '2025-04-21 19:59:58'),
(23, 1, 'Dessert', 'Sheera', 'Semolina pudding with ghee, sugar, and cardamom.', 'Shree Krishna Bhavan', NULL, NULL, '2025-04-21 19:59:58'),
(24, 1, 'Snack', 'Huli Avalakki', 'Spicy tamarind poha with mustard, curry leaves, and peanuts.', 'Manipal messes', NULL, NULL, '2025-04-21 19:59:58'),
(25, 2, 'Breakfast', 'Kharabath', 'Spiced rava upma cooked with vegetables.', 'Karkala bus stand canteens', NULL, NULL, '2025-04-21 19:59:58'),
(26, 2, 'Breakfast', 'Jackfruit Idli', 'Sweet idli made with ripe jackfruit pulp, jaggery, and rice.', 'Rural homes near Ajekar', NULL, NULL, '2025-04-21 19:59:58'),
(27, 2, 'Side Dish', 'Alambe Sukka', 'Stir-fried seasonal wild mushrooms in coconut masala.', 'Monsoon homes in Karkala', NULL, NULL, '2025-04-21 19:59:58'),
(28, 2, 'Chutney', 'Uppad Pachir', 'Spicy raw mango chutney with coconut and chili.', 'Karkala homes', NULL, NULL, '2025-04-21 19:59:58'),
(29, 2, 'Chutney', 'Kayi Chutney', 'Thick coconut chutney tempered with mustard and curry leaves.', 'Traditional households', NULL, NULL, '2025-04-21 19:59:58'),
(30, 4, 'Main Course', 'Kundapura Chicken', 'Fiery chicken curry with signature red coconut masala.', 'Shetty Lunch Home, Kundapura', NULL, NULL, '2025-04-21 19:59:58'),
(31, 4, 'Main Course', 'Kotte Roti', 'Dry rice wafers served with spicy chicken or veg curry.', 'Coastal restaurants', NULL, NULL, '2025-04-21 19:59:58'),
(32, 4, 'Main Course', 'Meen Gassi', 'Fish curry in red coconut gravy.', 'Fish land, Kundapura', NULL, NULL, '2025-04-21 19:59:58'),
(33, 4, 'Breakfast', 'Moode', 'Rice batter idli steamed in screw-pine leaves.', 'Temple-side vendors', NULL, NULL, '2025-04-21 19:59:58'),
(34, 4, 'Snack', 'Nendra Banana Fry', 'Ripe banana slices deep fried in jaggery batter.', 'Uppunda shops', NULL, NULL, '2025-04-21 19:59:58'),
(35, 6, 'Soup', 'Todede Saaru', 'Horse gram lentil soup with local spices.', 'Byndoor local eateries', NULL, NULL, '2025-04-21 19:59:58'),
(36, 6, 'Snack', 'Jackfruit Chips', 'Crispy fried jackfruit chips seasoned with salt.', 'Roadside stalls', NULL, NULL, '2025-04-21 19:59:58'),
(37, 6, 'Snack', 'Neerulli Bajji', 'Onion fritters served with spicy chutney.', 'Evening stalls', NULL, NULL, '2025-04-21 19:59:58'),
(38, 6, 'Main Course', 'Bamboo Shoot Curry', 'Tender bamboo shoots cooked in coastal spices.', 'Home kitchens', NULL, NULL, '2025-04-21 19:59:58'),
(39, 6, 'Side Dish', 'Bilimbi Pickle', 'Tangy pickle made from tree sorrel (bilimbi) and red chilies.', 'Homemade pickle vendors', NULL, NULL, '2025-04-21 19:59:58'),
(40, 3, 'Dessert', 'Patholi', 'Steamed rice rolls filled with coconut-jaggery mix in turmeric leaves.', 'Festive homes', NULL, NULL, '2025-04-21 19:59:58'),
(41, 3, 'Chutney', 'Tumbuli', 'Cooling buttermilk-based herb chutney.', 'Hebri homes in summer', NULL, NULL, '2025-04-21 19:59:58'),
(42, 3, 'Snack', 'Colocasia Patrode Fry', 'Fried version of the steamed colocasia roll.', 'Hebri rural kitchens', NULL, NULL, '2025-04-21 19:59:58'),
(43, 3, 'Breakfast', 'Ele Neer Dose', 'Banana leaf-steamed rice crepes.', 'Traditional households', NULL, NULL, '2025-04-21 19:59:58'),
(44, 3, 'Snack', 'Aritha Pundi', 'Savory steamed rice balls seasoned with mustard and coconut.', 'Weekly markets', NULL, NULL, '2025-04-21 19:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `local_experiences`
--

CREATE TABLE `local_experiences` (
  `experience_id` int NOT NULL,
  `taluk_id` int DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `duration` varchar(50) DEFAULT NULL,
  `price_range` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `local_experiences`
--

INSERT INTO `local_experiences` (`experience_id`, `taluk_id`, `category`, `name`, `description`, `duration`, `price_range`, `image_url`, `created_at`) VALUES
(1, 1, 'Cultural', 'Temple Tour', 'Guided tour of ancient temples', '4 hours', 'Budget', NULL, '2025-04-21 19:47:20'),
(2, 1, 'Adventure', 'Water Sports', 'Various water activities at Malpe', '2 hours', 'Moderate', NULL, '2025-04-21 19:47:20'),
(3, 4, 'Nature', 'Sunset Cruise', 'Evening boat ride', '1 hour', 'Premium', NULL, '2025-04-21 19:47:20'),
(4, 2, 'Heritage', 'Jain Heritage Walk', 'Walking tour of Jain monuments', '3 hours', 'Budget', NULL, '2025-04-21 19:47:20'),
(5, 1, 'Temple Tour', 'Sri Krishna Matha Visit', 'Visit the famous Udupi Krishna temple and its centuries-old traditions.', '2 hours', '0.00', NULL, '2025-04-22 03:54:22'),
(6, 1, 'Boat Ride', 'St. Mary\'s Island Trip', 'Ferry ride to unique basalt rock formations at St. Mary\'s Island.', '3 hours', '250.00', NULL, '2025-04-22 03:54:22'),
(7, 1, 'Adventure', 'Malpe Beach Parasailing', 'Experience thrilling parasailing at Malpe beach.', '20 mins', '800.00', NULL, '2025-04-22 03:54:22'),
(8, 1, 'Cultural', 'Manipal Museum Tour', 'Tour of anatomy and history museums in Manipal.', '1.5 hours', '100.00', NULL, '2025-04-22 03:54:22'),
(9, 1, 'Leisure', 'Malpe Beach Sunset', 'Relaxing evening watching sunset at Malpe Beach.', '1 hour', '0.00', NULL, '2025-04-22 03:54:22'),
(10, 1, 'Adventure', 'Kaup Lighthouse Climb', 'Climb the 100-year-old lighthouse and enjoy coastal views.', '30 mins', '50.00', NULL, '2025-04-22 03:54:22'),
(11, 1, 'Leisure', 'Delta Beach Visit', 'Relax and enjoy backwaters and beach views.', '2 hours', '0.00', NULL, '2025-04-22 03:54:22'),
(12, 1, 'Agri-tourism', 'Mattu Gulla Farm Visit', 'Visit farms of Udupi famous for Mattu Gulla brinjal.', '1 hour', '50.00', NULL, '2025-04-22 03:54:22'),
(13, 1, 'Culinary', 'Udupi Cuisine Workshop', 'Learn to cook traditional Udupi vegetarian meals.', '2 hours', '500.00', NULL, '2025-04-22 03:54:22'),
(14, 1, 'Outdoor', 'Malpe Sea Walk', 'Scenic walk along the Malpe sea pier.', '45 mins', '0.00', NULL, '2025-04-22 03:54:22'),
(15, 1, 'Adventure', 'Kodavoor Beach Cycling', 'Morning cycling trail along the coastline.', '1 hour', '200.00', NULL, '2025-04-22 03:54:22'),
(16, 1, 'Adventure', 'Manipal Lake Kayaking', 'Kayaking and water sports at Manipal Lake.', '1 hour', '300.00', NULL, '2025-04-22 03:54:22'),
(17, 1, 'Cultural', 'Coconut Tree Climbing Demo', 'Watch traditional coconut tree climbing.', '30 mins', '100.00', NULL, '2025-04-22 03:54:22'),
(18, 1, 'Cultural', 'Yakshagana Evening Show', 'Watch a traditional Yakshagana dance-drama.', '2 hours', '150.00', NULL, '2025-04-22 03:54:22'),
(19, 2, 'Temple Tour', 'Chaturmukha Basadi Visit', 'Explore the iconic 16th‑century Jain temple built with black granite.', '2 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(20, 2, 'Trekking', 'Gomateshwara Trek', 'Short trek up to the statue of Bahubali with panoramic views.', '1.5 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(21, 2, 'Cultural', 'Moodbidri Temple Tour', 'Discover ancient Jain temples and architecture in nearby Moodbidri.', '3 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(22, 2, 'Outdoor', 'Kudremukh Nature Walk', 'Guided walk through scenic forest trails of Kudremukh.', '4 hours', '300.00', NULL, '2025-04-22 03:59:39'),
(23, 2, 'Outdoor', 'Ramasamudra Lake Boating', 'Paddle boating and lakeside relaxation.', '1 hour', '150.00', NULL, '2025-04-22 03:59:39'),
(24, 2, 'Temple Visit', 'Ananthapadmanabha Temple', 'Historical Hindu temple visit with local guide.', '1 hour', '50.00', NULL, '2025-04-22 03:59:39'),
(25, 2, 'Adventure', 'Narasimha Parvatha Hike', 'Challenging hike to the highest peak in the Agumbe‑Kudremukh belt.', '6 hours', '500.00', NULL, '2025-04-22 03:59:39'),
(26, 2, 'Heritage', 'Heritage Walk', 'Guided walk through old market streets and heritage sites in Karkala town.', '2 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(27, 2, 'Cultural', 'Moodala Mane Show', 'Evening folk music and Yakshagana performance at a traditional home.', '2 hours', '200.00', NULL, '2025-04-22 03:59:39'),
(28, 2, 'Local Sport', 'Kambala Buffalo Race', 'Witness the traditional buffalo race at Koti‑Chennaya grounds.', '3 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(29, 2, 'Wellness', 'Natural Spring Bath', 'Bath in naturally occurring mineral springs.', '1 hour', '80.00', NULL, '2025-04-22 03:59:39'),
(30, 2, 'Trekking', 'Beluvai Hills Trek', 'Moderate trek with valley views and waterfall stop.', '3 hours', '250.00', NULL, '2025-04-22 03:59:39'),
(31, 2, 'Art Workshop', 'Yakshagana Workshop', 'Learn basics of Yakshagana dance and costume.', '2 hours', '400.00', NULL, '2025-04-22 03:59:39'),
(32, 2, 'Photography', 'Temple Photography Walk', 'Capture the beauty of ancient temples and landscapes.', '3 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(33, 2, 'Wellness', 'Nature Meditation Retreat', 'Outdoor guided meditation in serene surroundings.', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(34, 3, 'Temple Tour', 'Anegudde Temple Visit', 'Pilgrimage to the famous hilltop Ganesha temple at Anegudde.', '2 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(35, 3, 'Agri‑tourism', 'Hebri Spice Plantation Walk', 'Guided walk through cardamom & pepper plantations.', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(36, 3, 'Trekking', 'Kalenjimale Forest Trek', 'Explore dense evergreen forests of Kalenjimale.', '4 hours', '400.00', NULL, '2025-04-22 03:59:39'),
(37, 3, 'Nature', 'Sanchumukha Tree Visit', 'See the ancient five‑faced Sanchumukha tree and learn its legends.', '1 hour', '50.00', NULL, '2025-04-22 03:59:39'),
(38, 3, 'Boat Ride', 'Varahi Backwaters Boating', 'Early‑morning boat ride through tranquil backwaters.', '2 hours', '200.00', NULL, '2025-04-22 03:59:39'),
(39, 3, 'Cultural', 'Hebri Village Homestay', 'Experience local village life with a family homestay.', '24 hours', '1200.00', NULL, '2025-04-22 03:59:39'),
(40, 3, 'Trekking', 'Maandwa Falls Trek', 'Short trek ending at the cascading Maandwa waterfalls.', '3 hours', '250.00', NULL, '2025-04-22 03:59:39'),
(41, 3, 'Artisan Visit', 'Traditional Weaving Demo', 'Watch and interact with local handloom weavers.', '1 hour', '100.00', NULL, '2025-04-22 03:59:39'),
(42, 3, 'Culinary', 'Hebri Market Food Tour', 'Sample local snacks and sweets at Hebri weekly market.', '2 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(43, 3, 'Leisure', 'Sunset at Sunset Point', 'Drive up to a hill viewpoint for a panoramic sunset.', '1 hour', '0.00', NULL, '2025-04-22 03:59:39'),
(44, 3, 'Nature', 'Birdwatching at Hebri Lake', 'Guided early‑morning birdwatching walk.', '2 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(45, 3, 'Wellness', 'Yoga by the Backwaters', 'Sunrise yoga session beside the Varahi backwaters.', '1 hour', '200.00', NULL, '2025-04-22 03:59:39'),
(46, 3, 'Adventure', 'Kenchana Falls Expedition', 'Off‑road drive and trek to hidden Kenchana Falls.', '5 hours', '500.00', NULL, '2025-04-22 03:59:39'),
(47, 3, 'Art Workshop', 'Clay Pottery Workshop', 'Hands‑on lesson in traditional clay pottery making.', '2 hours', '300.00', NULL, '2025-04-22 03:59:39'),
(48, 3, 'Wellness', 'Herbal Nature Walk', 'Learn about local medicinal plants on a guided walk.', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(49, 4, 'Leisure', 'Kodi Bengre Beach Day', 'Relax on the pristine sands of Kodi Bengre beach.', '3 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(50, 4, 'Leisure', 'Maravanthe Sunrise Trip', 'Early morning visit to Maravanthe beach for sunrise over the Arabian Sea.', '1.5 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(51, 4, 'Boat Ride', 'Uppoor Boat Cruise', 'Scenic backwater cruise through Uppoor estuary.', '2 hours', '200.00', NULL, '2025-04-22 03:59:39'),
(52, 4, 'Temple Visit', 'Shree Kundeshwara Temple', 'Explore the ancient Shiva temple inside dense forests.', '2 hours', '50.00', NULL, '2025-04-22 03:59:39'),
(53, 4, 'Adventure', 'Kodapadi Sand Dune Trek', 'Guided walk across coastal sand dunes.', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(54, 4, 'Adventure', 'Netrani Island Snorkeling', 'Day‑trip snorkeling around Netrani Island coral reefs.', '4 hours', '1200.00', NULL, '2025-04-22 03:59:39'),
(55, 4, 'Heritage', 'Kundapura Heritage Walk', 'Walk through the old town, its colonial buildings & markets.', '2 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(56, 4, 'Adventure', 'Mangrove Kayak', 'Kayaking through Kundapura mangrove channels.', '2 hours', '300.00', NULL, '2025-04-22 03:59:39'),
(57, 4, 'Culinary', 'Fish Market Tour & Cooking', 'Visit the local fish market, then cook your catch with a home chef.', '3 hours', '600.00', NULL, '2025-04-22 03:59:39'),
(58, 4, 'Leisure', 'Sunset at Assonora Point', 'Cliff‑side viewpoint perfect for sunset photography.', '1 hour', '0.00', NULL, '2025-04-22 03:59:39'),
(59, 4, 'Culinary', 'Karavali Cuisine Class', 'Learn to prepare traditional coastal Karnataka dishes.', '2 hours', '500.00', NULL, '2025-04-22 03:59:39'),
(60, 4, 'Outdoor', 'Mangla Rocks Exploration', 'Explore ancient rock carvings at Mangla near Kundapura.', '1.5 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(61, 4, 'Adventure', 'Belekar Beach Camping', 'Overnight beach camping with bonfire.', '12 hours', '800.00', NULL, '2025-04-22 03:59:39'),
(62, 4, 'Nature', 'Birdwatching at Otteri Lake', 'Morning birdwatching tour at nearby lake.', '2 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(63, 4, 'Agri‑tourism', 'Herbal Garden Visit', 'Walk through a garden of medicinal herbs & spices.', '1 hour', '100.00', NULL, '2025-04-22 03:59:39'),
(64, 5, 'Agri‑tourism', 'Brahmavar Spice Garden', 'Guided tour of coastal spice plantations (pepper, cardamom).', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(65, 5, 'Boat Ride', 'Udane Backwaters Boat Ride', 'Sunset cruise through tranquil backwaters at Udane.', '2 hours', '200.00', NULL, '2025-04-22 03:59:39'),
(66, 5, 'Trekking', 'Mount Druz Travel Trek', 'Moderate trek with panoramic views of coastal plains.', '3 hours', '250.00', NULL, '2025-04-22 03:59:39'),
(67, 5, 'Cultural', 'St. Lawrence Church Visit', 'Visit the historic Portuguese‑era church at Udane.', '1 hour', '0.00', NULL, '2025-04-22 03:59:39'),
(68, 5, 'Heritage', 'Manga Heritage Walk', 'Explore traditional Brahmavar town markets and architecture.', '2 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(69, 5, 'Wellness', 'Yoga & Ayurveda Session', 'Morning yoga plus Ayurveda massage introduction.', '2 hours', '500.00', NULL, '2025-04-22 03:59:39'),
(70, 5, 'Culinary', 'Brahmavar Cooking Workshop', 'Learn local fish and vegetarian recipes with a home chef.', '2 hours', '600.00', NULL, '2025-04-22 03:59:39'),
(71, 5, 'Leisure', 'Sowparnika Estuary Picnic', 'Picnic on the banks of Sowparnika river estuary.', '3 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(72, 5, 'Artisan Visit', 'Boat‑making Demonstration', 'See traditional wooden boat construction techniques.', '1 hour', '100.00', NULL, '2025-04-22 03:59:39'),
(73, 5, 'Cultural', 'Fishermen Village Walk', 'Visit a coastal fishing village and learn net‑mending.', '1.5 hours', '0.00', NULL, '2025-04-22 03:59:39'),
(74, 5, 'Culinary', 'Seafood Market Tour', 'Guided tour of the early morning seafood auction.', '1.5 hours', '100.00', NULL, '2025-04-22 03:59:39'),
(75, 5, 'Photography', 'Nature Photography Workshop', 'Capture coastal flora & fauna with a pro photographer.', '3 hours', '300.00', NULL, '2025-04-22 03:59:39'),
(76, 5, 'Artisan Visit', 'Brahmavar Textile Demo', 'Watch weaving of local textiles.', '1 hour', '80.00', NULL, '2025-04-22 03:59:39'),
(77, 5, 'Leisure', 'Sunset at Udane Point', 'Cliff‑side viewpoint ideal for photos.', '1 hour', '0.00', NULL, '2025-04-22 03:59:39'),
(78, 5, 'Agri‑tourism', 'Herbal Tea Plantation Visit', 'Walk through and taste teas from a local herbal plantation.', '1.5 hours', '150.00', NULL, '2025-04-22 03:59:39'),
(79, 2, 'Temple Tour', 'Chaturmukha Basadi Visit', 'Explore the iconic 16th‑century Jain temple built with black granite.', '2 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(80, 2, 'Trekking', 'Gomateshwara Trek', 'Short trek up to the statue of Bahubali with panoramic views.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(81, 2, 'Cultural', 'Moodbidri Temple Tour', 'Discover ancient Jain temples and architecture in nearby Moodbidri.', '3 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(82, 2, 'Outdoor', 'Kudremukh Nature Walk', 'Guided walk through scenic forest trails of Kudremukh.', '4 hours', '300.00', NULL, '2025-04-22 04:01:06'),
(83, 2, 'Outdoor', 'Ramasamudra Lake Boating', 'Paddle boating and lakeside relaxation.', '1 hour', '150.00', NULL, '2025-04-22 04:01:06'),
(84, 2, 'Temple Visit', 'Ananthapadmanabha Temple', 'Historical Hindu temple visit with local guide.', '1 hour', '50.00', NULL, '2025-04-22 04:01:06'),
(85, 2, 'Adventure', 'Narasimha Parvatha Hike', 'Challenging hike to the highest peak in the Agumbe‑Kudremukh belt.', '6 hours', '500.00', NULL, '2025-04-22 04:01:06'),
(86, 2, 'Heritage', 'Heritage Walk', 'Guided walk through old market streets and heritage sites in Karkala town.', '2 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(87, 2, 'Cultural', 'Moodala Mane Show', 'Evening folk music and Yakshagana performance at a traditional home.', '2 hours', '200.00', NULL, '2025-04-22 04:01:06'),
(88, 2, 'Local Sport', 'Kambala Buffalo Race', 'Witness the traditional buffalo race at Koti‑Chennaya grounds.', '3 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(89, 2, 'Wellness', 'Natural Spring Bath', 'Bath in naturally occurring mineral springs.', '1 hour', '80.00', NULL, '2025-04-22 04:01:06'),
(90, 2, 'Trekking', 'Beluvai Hills Trek', 'Moderate trek with valley views and waterfall stop.', '3 hours', '250.00', NULL, '2025-04-22 04:01:06'),
(91, 2, 'Art Workshop', 'Yakshagana Workshop', 'Learn basics of Yakshagana dance and costume.', '2 hours', '400.00', NULL, '2025-04-22 04:01:06'),
(92, 2, 'Photography', 'Temple Photography Walk', 'Capture the beauty of ancient temples and landscapes.', '3 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(93, 2, 'Wellness', 'Nature Meditation Retreat', 'Outdoor guided meditation in serene surroundings.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(94, 3, 'Temple Tour', 'Anegudde Temple Visit', 'Pilgrimage to the famous hilltop Ganesha temple at Anegudde.', '2 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(95, 3, 'Agri‑tourism', 'Hebri Spice Plantation Walk', 'Guided walk through cardamom & pepper plantations.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(96, 3, 'Trekking', 'Kalenjimale Forest Trek', 'Explore dense evergreen forests of Kalenjimale.', '4 hours', '400.00', NULL, '2025-04-22 04:01:06'),
(97, 3, 'Nature', 'Sanchumukha Tree Visit', 'See the ancient five‑faced Sanchumukha tree and learn its legends.', '1 hour', '50.00', NULL, '2025-04-22 04:01:06'),
(98, 3, 'Boat Ride', 'Varahi Backwaters Boating', 'Early‑morning boat ride through tranquil backwaters.', '2 hours', '200.00', NULL, '2025-04-22 04:01:06'),
(99, 3, 'Cultural', 'Hebri Village Homestay', 'Experience local village life with a family homestay.', '24 hours', '1200.00', NULL, '2025-04-22 04:01:06'),
(100, 3, 'Trekking', 'Maandwa Falls Trek', 'Short trek ending at the cascading Maandwa waterfalls.', '3 hours', '250.00', NULL, '2025-04-22 04:01:06'),
(101, 3, 'Artisan Visit', 'Traditional Weaving Demo', 'Watch and interact with local handloom weavers.', '1 hour', '100.00', NULL, '2025-04-22 04:01:06'),
(102, 3, 'Culinary', 'Hebri Market Food Tour', 'Sample local snacks and sweets at Hebri weekly market.', '2 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(103, 3, 'Leisure', 'Sunset at Sunset Point', 'Drive up to a hill viewpoint for a panoramic sunset.', '1 hour', '0.00', NULL, '2025-04-22 04:01:06'),
(104, 3, 'Nature', 'Birdwatching at Hebri Lake', 'Guided early‑morning birdwatching walk.', '2 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(105, 3, 'Wellness', 'Yoga by the Backwaters', 'Sunrise yoga session beside the Varahi backwaters.', '1 hour', '200.00', NULL, '2025-04-22 04:01:06'),
(106, 3, 'Adventure', 'Kenchana Falls Expedition', 'Off‑road drive and trek to hidden Kenchana Falls.', '5 hours', '500.00', NULL, '2025-04-22 04:01:06'),
(107, 3, 'Art Workshop', 'Clay Pottery Workshop', 'Hands‑on lesson in traditional clay pottery making.', '2 hours', '300.00', NULL, '2025-04-22 04:01:06'),
(108, 3, 'Wellness', 'Herbal Nature Walk', 'Learn about local medicinal plants on a guided walk.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(109, 4, 'Leisure', 'Kodi Bengre Beach Day', 'Relax on the pristine sands of Kodi Bengre beach.', '3 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(110, 4, 'Leisure', 'Maravanthe Sunrise Trip', 'Early morning visit to Maravanthe beach for sunrise over the Arabian Sea.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(111, 4, 'Boat Ride', 'Uppoor Boat Cruise', 'Scenic backwater cruise through Uppoor estuary.', '2 hours', '200.00', NULL, '2025-04-22 04:01:06'),
(112, 4, 'Temple Visit', 'Shree Kundeshwara Temple', 'Explore the ancient Shiva temple inside dense forests.', '2 hours', '50.00', NULL, '2025-04-22 04:01:06'),
(113, 4, 'Adventure', 'Kodapadi Sand Dune Trek', 'Guided walk across coastal sand dunes.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(114, 4, 'Adventure', 'Netrani Island Snorkeling', 'Day‑trip snorkeling around Netrani Island coral reefs.', '4 hours', '1200.00', NULL, '2025-04-22 04:01:06'),
(115, 4, 'Heritage', 'Kundapura Heritage Walk', 'Walk through the old town, its colonial buildings & markets.', '2 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(116, 4, 'Adventure', 'Mangrove Kayak', 'Kayaking through Kundapura mangrove channels.', '2 hours', '300.00', NULL, '2025-04-22 04:01:06'),
(117, 4, 'Culinary', 'Fish Market Tour & Cooking', 'Visit the local fish market, then cook your catch with a home chef.', '3 hours', '600.00', NULL, '2025-04-22 04:01:06'),
(118, 4, 'Leisure', 'Sunset at Assonora Point', 'Cliff‑side viewpoint perfect for sunset photography.', '1 hour', '0.00', NULL, '2025-04-22 04:01:06'),
(119, 4, 'Culinary', 'Karavali Cuisine Class', 'Learn to prepare traditional coastal Karnataka dishes.', '2 hours', '500.00', NULL, '2025-04-22 04:01:06'),
(120, 4, 'Outdoor', 'Mangla Rocks Exploration', 'Explore ancient rock carvings at Mangla near Kundapura.', '1.5 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(121, 4, 'Adventure', 'Belekar Beach Camping', 'Overnight beach camping with bonfire.', '12 hours', '800.00', NULL, '2025-04-22 04:01:06'),
(122, 4, 'Nature', 'Birdwatching at Otteri Lake', 'Morning birdwatching tour at nearby lake.', '2 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(123, 4, 'Agri‑tourism', 'Herbal Garden Visit', 'Walk through a garden of medicinal herbs & spices.', '1 hour', '100.00', NULL, '2025-04-22 04:01:06'),
(124, 5, 'Agri‑tourism', 'Brahmavar Spice Garden', 'Guided tour of coastal spice plantations (pepper, cardamom).', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(125, 5, 'Boat Ride', 'Udane Backwaters Boat Ride', 'Sunset cruise through tranquil backwaters at Udane.', '2 hours', '200.00', NULL, '2025-04-22 04:01:06'),
(126, 5, 'Trekking', 'Mount Druz Travel Trek', 'Moderate trek with panoramic views of coastal plains.', '3 hours', '250.00', NULL, '2025-04-22 04:01:06'),
(127, 5, 'Cultural', 'St. Lawrence Church Visit', 'Visit the historic Portuguese‑era church at Udane.', '1 hour', '0.00', NULL, '2025-04-22 04:01:06'),
(128, 5, 'Heritage', 'Manga Heritage Walk', 'Explore traditional Brahmavar town markets and architecture.', '2 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(129, 5, 'Wellness', 'Yoga & Ayurveda Session', 'Morning yoga plus Ayurveda massage introduction.', '2 hours', '500.00', NULL, '2025-04-22 04:01:06'),
(130, 5, 'Culinary', 'Brahmavar Cooking Workshop', 'Learn local fish and vegetarian recipes with a home chef.', '2 hours', '600.00', NULL, '2025-04-22 04:01:06'),
(131, 5, 'Leisure', 'Sowparnika Estuary Picnic', 'Picnic on the banks of Sowparnika river estuary.', '3 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(132, 5, 'Artisan Visit', 'Boat‑making Demonstration', 'See traditional wooden boat construction techniques.', '1 hour', '100.00', NULL, '2025-04-22 04:01:06'),
(133, 5, 'Cultural', 'Fishermen Village Walk', 'Visit a coastal fishing village and learn net‑mending.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:06'),
(134, 5, 'Culinary', 'Seafood Market Tour', 'Guided tour of the early morning seafood auction.', '1.5 hours', '100.00', NULL, '2025-04-22 04:01:06'),
(135, 5, 'Photography', 'Nature Photography Workshop', 'Capture coastal flora & fauna with a pro photographer.', '3 hours', '300.00', NULL, '2025-04-22 04:01:06'),
(136, 5, 'Artisan Visit', 'Brahmavar Textile Demo', 'Watch weaving of local textiles.', '1 hour', '80.00', NULL, '2025-04-22 04:01:06'),
(137, 5, 'Leisure', 'Sunset at Udane Point', 'Cliff‑side viewpoint ideal for photos.', '1 hour', '0.00', NULL, '2025-04-22 04:01:06'),
(138, 5, 'Agri‑tourism', 'Herbal Tea Plantation Visit', 'Walk through and taste teas from a local herbal plantation.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:06'),
(139, 2, 'Temple Tour', 'Chaturmukha Basadi Visit', 'Explore the iconic 16th‑century Jain temple built with black granite.', '2 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(140, 2, 'Trekking', 'Gomateshwara Trek', 'Short trek up to the statue of Bahubali with panoramic views.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(141, 2, 'Cultural', 'Moodbidri Temple Tour', 'Discover ancient Jain temples and architecture in nearby Moodbidri.', '3 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(142, 2, 'Outdoor', 'Kudremukh Nature Walk', 'Guided walk through scenic forest trails of Kudremukh.', '4 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(143, 2, 'Outdoor', 'Ramasamudra Lake Boating', 'Paddle boating and lakeside relaxation.', '1 hour', '150.00', NULL, '2025-04-22 04:01:22'),
(144, 2, 'Temple Visit', 'Ananthapadmanabha Temple', 'Historical Hindu temple visit with local guide.', '1 hour', '50.00', NULL, '2025-04-22 04:01:22'),
(145, 2, 'Adventure', 'Narasimha Parvatha Hike', 'Challenging hike to the highest peak in the Agumbe‑Kudremukh belt.', '6 hours', '500.00', NULL, '2025-04-22 04:01:22'),
(146, 2, 'Heritage', 'Heritage Walk', 'Guided walk through old market streets and heritage sites in Karkala town.', '2 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(147, 2, 'Cultural', 'Moodala Mane Show', 'Evening folk music and Yakshagana performance at a traditional home.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(148, 2, 'Local Sport', 'Kambala Buffalo Race', 'Witness the traditional buffalo race at Koti‑Chennaya grounds.', '3 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(149, 2, 'Wellness', 'Natural Spring Bath', 'Bath in naturally occurring mineral springs.', '1 hour', '80.00', NULL, '2025-04-22 04:01:22'),
(150, 2, 'Trekking', 'Beluvai Hills Trek', 'Moderate trek with valley views and waterfall stop.', '3 hours', '250.00', NULL, '2025-04-22 04:01:22'),
(151, 2, 'Art Workshop', 'Yakshagana Workshop', 'Learn basics of Yakshagana dance and costume.', '2 hours', '400.00', NULL, '2025-04-22 04:01:22'),
(152, 2, 'Photography', 'Temple Photography Walk', 'Capture the beauty of ancient temples and landscapes.', '3 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(153, 2, 'Wellness', 'Nature Meditation Retreat', 'Outdoor guided meditation in serene surroundings.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(154, 3, 'Temple Tour', 'Anegudde Temple Visit', 'Pilgrimage to the famous hilltop Ganesha temple at Anegudde.', '2 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(155, 3, 'Agri‑tourism', 'Hebri Spice Plantation Walk', 'Guided walk through cardamom & pepper plantations.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(156, 3, 'Trekking', 'Kalenjimale Forest Trek', 'Explore dense evergreen forests of Kalenjimale.', '4 hours', '400.00', NULL, '2025-04-22 04:01:22'),
(157, 3, 'Nature', 'Sanchumukha Tree Visit', 'See the ancient five‑faced Sanchumukha tree and learn its legends.', '1 hour', '50.00', NULL, '2025-04-22 04:01:22'),
(158, 3, 'Boat Ride', 'Varahi Backwaters Boating', 'Early‑morning boat ride through tranquil backwaters.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(159, 3, 'Cultural', 'Hebri Village Homestay', 'Experience local village life with a family homestay.', '24 hours', '1200.00', NULL, '2025-04-22 04:01:22'),
(160, 3, 'Trekking', 'Maandwa Falls Trek', 'Short trek ending at the cascading Maandwa waterfalls.', '3 hours', '250.00', NULL, '2025-04-22 04:01:22'),
(161, 3, 'Artisan Visit', 'Traditional Weaving Demo', 'Watch and interact with local handloom weavers.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(162, 3, 'Culinary', 'Hebri Market Food Tour', 'Sample local snacks and sweets at Hebri weekly market.', '2 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(163, 3, 'Leisure', 'Sunset at Sunset Point', 'Drive up to a hill viewpoint for a panoramic sunset.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(164, 3, 'Nature', 'Birdwatching at Hebri Lake', 'Guided early‑morning birdwatching walk.', '2 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(165, 3, 'Wellness', 'Yoga by the Backwaters', 'Sunrise yoga session beside the Varahi backwaters.', '1 hour', '200.00', NULL, '2025-04-22 04:01:22'),
(166, 3, 'Adventure', 'Kenchana Falls Expedition', 'Off‑road drive and trek to hidden Kenchana Falls.', '5 hours', '500.00', NULL, '2025-04-22 04:01:22'),
(167, 3, 'Art Workshop', 'Clay Pottery Workshop', 'Hands‑on lesson in traditional clay pottery making.', '2 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(168, 3, 'Wellness', 'Herbal Nature Walk', 'Learn about local medicinal plants on a guided walk.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(169, 4, 'Leisure', 'Kodi Bengre Beach Day', 'Relax on the pristine sands of Kodi Bengre beach.', '3 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(170, 4, 'Leisure', 'Maravanthe Sunrise Trip', 'Early morning visit to Maravanthe beach for sunrise over the Arabian Sea.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(171, 4, 'Boat Ride', 'Uppoor Boat Cruise', 'Scenic backwater cruise through Uppoor estuary.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(172, 4, 'Temple Visit', 'Shree Kundeshwara Temple', 'Explore the ancient Shiva temple inside dense forests.', '2 hours', '50.00', NULL, '2025-04-22 04:01:22'),
(173, 4, 'Adventure', 'Kodapadi Sand Dune Trek', 'Guided walk across coastal sand dunes.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(174, 4, 'Adventure', 'Netrani Island Snorkeling', 'Day‑trip snorkeling around Netrani Island coral reefs.', '4 hours', '1200.00', NULL, '2025-04-22 04:01:22'),
(175, 4, 'Heritage', 'Kundapura Heritage Walk', 'Walk through the old town, its colonial buildings & markets.', '2 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(176, 4, 'Adventure', 'Mangrove Kayak', 'Kayaking through Kundapura mangrove channels.', '2 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(177, 4, 'Culinary', 'Fish Market Tour & Cooking', 'Visit the local fish market, then cook your catch with a home chef.', '3 hours', '600.00', NULL, '2025-04-22 04:01:22'),
(178, 4, 'Leisure', 'Sunset at Assonora Point', 'Cliff‑side viewpoint perfect for sunset photography.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(179, 4, 'Culinary', 'Karavali Cuisine Class', 'Learn to prepare traditional coastal Karnataka dishes.', '2 hours', '500.00', NULL, '2025-04-22 04:01:22'),
(180, 4, 'Outdoor', 'Mangla Rocks Exploration', 'Explore ancient rock carvings at Mangla near Kundapura.', '1.5 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(181, 4, 'Adventure', 'Belekar Beach Camping', 'Overnight beach camping with bonfire.', '12 hours', '800.00', NULL, '2025-04-22 04:01:22'),
(182, 4, 'Nature', 'Birdwatching at Otteri Lake', 'Morning birdwatching tour at nearby lake.', '2 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(183, 4, 'Agri‑tourism', 'Herbal Garden Visit', 'Walk through a garden of medicinal herbs & spices.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(184, 5, 'Agri‑tourism', 'Brahmavar Spice Garden', 'Guided tour of coastal spice plantations (pepper, cardamom).', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(185, 5, 'Boat Ride', 'Udane Backwaters Boat Ride', 'Sunset cruise through tranquil backwaters at Udane.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(186, 5, 'Trekking', 'Mount Druz Travel Trek', 'Moderate trek with panoramic views of coastal plains.', '3 hours', '250.00', NULL, '2025-04-22 04:01:22'),
(187, 5, 'Cultural', 'St. Lawrence Church Visit', 'Visit the historic Portuguese‑era church at Udane.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(188, 5, 'Heritage', 'Manga Heritage Walk', 'Explore traditional Brahmavar town markets and architecture.', '2 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(189, 5, 'Wellness', 'Yoga & Ayurveda Session', 'Morning yoga plus Ayurveda massage introduction.', '2 hours', '500.00', NULL, '2025-04-22 04:01:22'),
(190, 5, 'Culinary', 'Brahmavar Cooking Workshop', 'Learn local fish and vegetarian recipes with a home chef.', '2 hours', '600.00', NULL, '2025-04-22 04:01:22'),
(191, 5, 'Leisure', 'Sowparnika Estuary Picnic', 'Picnic on the banks of Sowparnika river estuary.', '3 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(192, 5, 'Artisan Visit', 'Boat‑making Demonstration', 'See traditional wooden boat construction techniques.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(193, 5, 'Cultural', 'Fishermen Village Walk', 'Visit a coastal fishing village and learn net‑mending.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(194, 5, 'Culinary', 'Seafood Market Tour', 'Guided tour of the early morning seafood auction.', '1.5 hours', '100.00', NULL, '2025-04-22 04:01:22'),
(195, 5, 'Photography', 'Nature Photography Workshop', 'Capture coastal flora & fauna with a pro photographer.', '3 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(196, 5, 'Artisan Visit', 'Brahmavar Textile Demo', 'Watch weaving of local textiles.', '1 hour', '80.00', NULL, '2025-04-22 04:01:22'),
(197, 5, 'Leisure', 'Sunset at Udane Point', 'Cliff‑side viewpoint ideal for photos.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(198, 5, 'Agri‑tourism', 'Herbal Tea Plantation Visit', 'Walk through and taste teas from a local herbal plantation.', '1.5 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(199, 6, 'Leisure', 'Kodi Beach Relaxation', 'Chill out on the sandy shores of Kodi Beach.', '3 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(200, 6, 'Trekking', 'Jaldhara Falls Trek', 'Short trek to the Jaldhara waterfalls through forest trails.', '3 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(201, 6, 'Cultural', 'Kemmannu Market Walk', 'Explore the bustling Kemmannu weekly market.', '2 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(202, 6, 'Boat Ride', 'Mangroves of Kollur Boat Tour', 'Navigate serene mangrove channels near Kollur.', '2 hours', '250.00', NULL, '2025-04-22 04:01:22'),
(203, 6, 'Adventure', 'Byndoor Coral Reef Snorkeling', 'Discover shallow coral reefs just offshore of Byndoor.', '1.5 hours', '800.00', NULL, '2025-04-22 04:01:22'),
(204, 6, 'Temple Tour', 'Pilgrimage to Kollur Mookambika', 'Visit the famous Kollur Mookambika temple.', '3 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(205, 6, 'Local Experience', 'Fishing with Locals', 'Join fishermen at dawn and learn traditional fishing methods.', '3 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(206, 6, 'Leisure', 'Sunset at Byndoor Lighthouse', 'Watch the sunset near the old lighthouse structure.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(207, 6, 'Cultural', 'Coconut Climbing Demo', 'Traditional coconut tree climbing demonstration.', '30 mins', '100.00', NULL, '2025-04-22 04:01:22'),
(208, 6, 'Agri‑tourism', 'Herbal Garden at Kollur', 'Visit a small medicinal plant nursery.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(209, 6, 'Cultural', 'Village Homestay Experience', 'Overnight homestay with a local family.', '24 hours', '1200.00', NULL, '2025-04-22 04:01:22'),
(210, 6, 'Adventure', 'Kayaking at Kollur Backwaters', 'Kayak through the tranquil backwaters near Kollur.', '1 hour', '300.00', NULL, '2025-04-22 04:01:22'),
(211, 6, 'Nature', 'Birdwatching at Byndoor Wetlands', 'Spot migratory birds in the coastal wetlands.', '2 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(212, 6, 'Artisan Visit', 'Boat‑making Artisan Visit', 'See craftsmen build traditional wooden boats.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(213, 6, 'Culinary', 'Local Cuisine Tasting Tour', 'Sample coastal Karnataka dishes at roadside stalls.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(214, 7, 'Leisure', 'Kaup Beach Sunrise', 'Early morning visit to watch the sun rise over Kaup Beach.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(215, 7, 'Adventure', 'Kaup Lighthouse Tour', 'Climb the historic lighthouse and enjoy coastal views.', '30 mins', '50.00', NULL, '2025-04-22 04:01:22'),
(216, 7, 'Heritage', 'Annekatta Bridge Walk', 'Walk across the old wooden Annekatta bridge spanning Kaup river.', '1 hour', '0.00', NULL, '2025-04-22 04:01:22'),
(217, 7, 'Boat Ride', 'Nada River Boat Ride', 'Leisurely boat ride along the Nada river estuary.', '2 hours', '200.00', NULL, '2025-04-22 04:01:22'),
(218, 7, 'Art Workshop', 'Wood‑carving Workshop', 'Hands‑on session carving coconut shells into souvenirs.', '2 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(219, 7, 'Cultural', 'Coconut Palm Climb Demo', 'Watch expert climbers harvest coconuts.', '30 mins', '100.00', NULL, '2025-04-22 04:01:22'),
(220, 7, 'Photography', 'Sunset Photography Session', 'Guided photography session at the sand dunes during sunset.', '2 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(221, 7, 'Local Experience', 'Fishing Village Visit', 'Explore the nearby fishing hamlet and learn net‑repairing.', '1.5 hours', '0.00', NULL, '2025-04-22 04:01:22'),
(222, 7, 'Wellness', 'Yoga by the Sea', 'Morning yoga session on the beach.', '1 hour', '200.00', NULL, '2025-04-22 04:01:22'),
(223, 7, 'Culinary', 'Kaup Fish Market Tour', 'Visit the local fish market and sample fresh catches.', '1 hour', '150.00', NULL, '2025-04-22 04:01:22'),
(224, 7, 'Artisan Visit', 'Boat‑building Demonstration', 'See traditional boat‑building techniques.', '1 hour', '100.00', NULL, '2025-04-22 04:01:22'),
(225, 7, 'Adventure', 'Mangrove Kayaking', 'Kayak through Kaup’s mangrove creek.', '2 hours', '300.00', NULL, '2025-04-22 04:01:22'),
(226, 7, 'Culinary', 'Local Sweet Making Class', 'Learn to make traditional coastal sweets.', '2 hours', '400.00', NULL, '2025-04-22 04:01:22'),
(227, 7, 'Nature', 'Birdwatching at Kaup Backwaters', 'Spot water‑birds in the nearby backwaters.', '2 hours', '150.00', NULL, '2025-04-22 04:01:22'),
(228, 7, 'Wellness', 'Starlit Beach Meditation', 'Evening guided meditation under the stars.', '1 hour', '150.00', NULL, '2025-04-22 04:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `taluk`
--

CREATE TABLE `taluk` (
  `taluk_id` int NOT NULL,
  `taluk_name` varchar(50) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taluk`
--

INSERT INTO `taluk` (`taluk_id`, `taluk_name`, `description`, `image_url`, `created_at`) VALUES
(1, 'Udupi', 'Known for Sri Krishna Temple and beautiful beaches', NULL, '2025-04-21 19:47:20'),
(2, 'Karkala', 'Famous for Jain temples and historical monuments', NULL, '2025-04-21 19:47:20'),
(3, 'Hebri', 'Rich in natural beauty and wildlife', NULL, '2025-04-21 19:47:20'),
(4, 'Kundapura', 'Coastal paradise with pristine beaches', NULL, '2025-04-21 19:47:20'),
(5, 'Brahmavara', 'Cultural hub with traditional arts', NULL, '2025-04-21 19:47:20'),
(6, 'Byndoor', 'Scenic coastal region', NULL, '2025-04-21 19:47:20'),
(7, 'Kaup', 'Historic lighthouse and beaches', NULL, '2025-04-21 19:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `transport_id` int NOT NULL,
  `taluk_id` int NOT NULL,
  `mode` varchar(100) NOT NULL,
  `route` varchar(255) NOT NULL,
  `frequency` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`transport_id`, `taluk_id`, `mode`, `route`, `frequency`, `contact`, `description`) VALUES
(1, 1, 'Bus', 'Udupi to Manipal', 'Every 10 mins', '0820-2521234', NULL),
(2, 1, 'Auto', 'Udupi city local', 'On demand', '0820-2556789', NULL),
(3, 1, 'Train', 'Udupi to Mangaluru', '5 times daily', '139', NULL),
(4, 1, 'Taxi', 'Udupi to Malpe', 'Available 24/7', '0820-2678900', NULL),
(5, 1, 'Bus', 'Udupi to Kaup', 'Every 30 mins', '0820-2534567', NULL),
(6, 1, 'Private Van', 'Udupi to Shirva', 'Hourly', '0820-2612345', NULL),
(7, 1, 'Bike Taxi', 'Manipal to Udupi', 'On demand', '0820-2599888', NULL),
(8, 1, 'Bus', 'Udupi to Brahmavar', 'Every 20 mins', '0820-2502222', NULL),
(9, 1, 'Rickshaw', 'Udupi City Ride', 'On call', '0820-2581234', NULL),
(10, 1, 'Ferry', 'Malpe to St. Mary’s Island', 'Seasonal', '0820-2538888', NULL),
(11, 1, 'Bus', 'Udupi to Katapady', 'Hourly', '0820-2511234', NULL),
(12, 1, 'Taxi', 'Udupi to Mangaluru Airport', 'Pre-book', '0820-2700900', NULL),
(13, 1, 'Bus', 'Udupi to Perampalli', 'Every 45 mins', '0820-2545678', NULL),
(14, 1, 'Mini Bus', 'Udupi to Innanje', '2-3 times a day', '0820-2600900', NULL),
(15, 1, 'Car Rental', 'Local and Outstation', 'On demand', '0820-2700700', NULL),
(16, 2, 'Bus', 'Karkala to Udupi', 'Every 30 mins', '08258-230045', NULL),
(17, 2, 'Auto', 'Karkala Town Rides', 'On demand', '08258-220999', NULL),
(18, 2, 'Taxi', 'Karkala to Moodbidri', 'Pre-book', '08258-221111', NULL),
(19, 2, 'Bus', 'Karkala to Hebri', 'Every hour', '08258-223344', NULL),
(20, 2, 'Mini Bus', 'Karkala to Ajekar', '5 times daily', '08258-224555', NULL),
(21, 2, 'Bike Taxi', 'Karkala Local Rides', 'Available 8 AM–8 PM', '08258-225000', NULL),
(22, 2, 'Private Van', 'Karkala to Miyar', 'Daily morning', '08258-226789', NULL),
(23, 2, 'Bus', 'Karkala to Belman', 'Every 40 mins', '08258-227777', NULL),
(24, 2, 'Taxi', 'Karkala to Dharmasthala', 'On request', '08258-228888', NULL),
(25, 2, 'Auto', 'Karkala Bus Stand to Hospitals', 'Available', '08258-229999', NULL),
(26, 2, 'Bus', 'Karkala to Mala', 'Thrice a day', '08258-230000', NULL),
(27, 2, 'Private Jeep', 'Karkala to interior villages', 'Morning and Evening', '08258-230111', NULL),
(28, 2, 'Bus', 'Karkala to Kudremukh', '2 times daily', '08258-230222', NULL),
(29, 2, 'Taxi', 'Karkala to Mangaluru', 'Pre-book only', '08258-230333', NULL),
(30, 2, 'Car Rental', 'City and temple tours', 'On demand', '08258-230444', NULL),
(31, 4, 'Bus', 'Kundapura to Udupi', 'Every 20 mins', '08254-230045', NULL),
(32, 4, 'Taxi', 'Kundapura to Kollur', 'Available anytime', '08254-220111', NULL),
(33, 4, 'Bus', 'Kundapura to Byndoor', 'Every 40 mins', '08254-221222', NULL),
(34, 4, 'Auto', 'Kundapura Town Ride', 'On demand', '08254-222333', NULL),
(35, 4, 'Private Jeep', 'Kundapura to Hosangadi', 'Morning and Evening', '08254-223444', NULL),
(36, 4, 'Bike Taxi', 'Kundapura Bus Stand to Beaches', 'On call', '08254-224555', NULL),
(37, 4, 'Bus', 'Kundapura to Gangolli', 'Hourly', '08254-225666', NULL),
(38, 4, 'Taxi', 'Kundapura to Sringeri', 'Pre-book', '08254-226777', NULL),
(39, 4, 'Train', 'Kundapura to Karwar', 'Twice daily', '139', NULL),
(40, 4, 'Bus', 'Kundapura to Trasi', 'Every 2 hours', '08254-227888', NULL),
(41, 4, 'Boat', 'Kodi to Delta Beach', 'Seasonal', '08254-228999', NULL),
(42, 4, 'Bus', 'Kundapura to Vandse', '4 times daily', '08254-229000', NULL),
(43, 4, 'Car Rental', 'Hill and temple tours', 'On demand', '08254-230111', NULL),
(44, 4, 'Auto', 'Kundapura to Railway Station', 'Available all day', '08254-230222', NULL),
(45, 6, 'Bus', 'Byndoor to Kundapura', 'Every 30 mins', '08254-260001', NULL),
(46, 6, 'Train', 'Byndoor to Mangaluru', 'Twice daily', '139', NULL),
(47, 6, 'Auto', 'Byndoor Town Rides', 'On demand', '08254-260002', NULL),
(48, 6, 'Taxi', 'Byndoor to Kollur', 'Available 24/7', '08254-260003', NULL),
(49, 6, 'Bus', 'Byndoor to Shiroor', 'Hourly', '08254-260004', NULL),
(50, 6, 'Private Van', 'Byndoor to Uppunda', 'Morning and Evening', '08254-260005', NULL),
(51, 6, 'Bike Taxi', 'Byndoor to Beaches', 'On call', '08254-260006', NULL),
(52, 6, 'Bus', 'Byndoor to Bhatkal', 'Every 45 mins', '08254-260007', NULL),
(53, 6, 'Rickshaw', 'Byndoor Market Area', 'On demand', '08254-260008', NULL),
(54, 6, 'Ferry', 'Byndoor to Ottinene Beach', 'Seasonal', '08254-260009', NULL),
(55, 6, 'Bus', 'Byndoor to Baindur', 'Every 30 mins', '08254-260010', NULL),
(56, 6, 'Taxi', 'Byndoor to Murdeshwar', 'Pre-book', '08254-260011', NULL),
(57, 6, 'Bus', 'Byndoor to Maravanthe', 'Every 2 hours', '08254-260012', NULL),
(58, 6, 'Mini Bus', 'Byndoor to Kergalu', 'Thrice daily', '08254-260013', NULL),
(59, 6, 'Car Rental', 'Local and Outstation', 'On demand', '08254-260014', NULL),
(60, 5, 'Bus', 'Brahmavar to Udupi', 'Every 15 mins', '0820-256001', NULL),
(61, 5, 'Auto', 'Brahmavar Town Rides', 'On demand', '0820-256002', NULL),
(62, 5, 'Taxi', 'Brahmavar to Manipal', 'Available 24/7', '0820-256003', NULL),
(63, 5, 'Bus', 'Brahmavar to Barkur', 'Every 30 mins', '0820-256004', NULL),
(64, 5, 'Private Van', 'Brahmavar to Handadi', 'Morning and Evening', '0820-256005', NULL),
(65, 5, 'Bike Taxi', 'Brahmavar to Nearby Villages', 'On call', '0820-256006', NULL),
(66, 5, 'Bus', 'Brahmavar to Saligrama', 'Hourly', '0820-256007', NULL),
(67, 5, 'Rickshaw', 'Brahmavar Market Area', 'On demand', '0820-256008', NULL),
(68, 5, 'Ferry', 'Brahmavar to Sita River', 'Seasonal', '0820-256009', NULL),
(69, 5, 'Bus', 'Brahmavar to Kota', 'Every 45 mins', '0820-256010', NULL),
(70, 5, 'Taxi', 'Brahmavar to Kundapura', 'Pre-book', '0820-256011', NULL),
(71, 5, 'Bus', 'Brahmavar to Kunjal', 'Every 2 hours', '0820-256012', NULL),
(72, 5, 'Mini Bus', 'Brahmavar to Mabukala', 'Thrice daily', '0820-256013', NULL),
(73, 5, 'Car Rental', 'Local and Outstation', 'On demand', '0820-256014', NULL),
(74, 5, 'Bus', 'Brahmavar to Uppinakudru', 'Every 3 hours', '0820-256015', NULL),
(75, 7, 'Bus', 'Kaup to Udupi', 'Every 20 mins', '0820-257001', NULL),
(76, 7, 'Auto', 'Kaup Town Rides', 'On demand', '0820-257002', NULL),
(77, 7, 'Taxi', 'Kaup to Manipal', 'Available 24/7', '0820-257003', NULL),
(78, 7, 'Bus', 'Kaup to Shirva', 'Every 30 mins', '0820-257004', NULL),
(79, 7, 'Private Van', 'Kaup to Katapady', 'Morning and Evening', '0820-257005', NULL),
(80, 7, 'Bike Taxi', 'Kaup to Nearby Villages', 'On call', '0820-257006', NULL),
(81, 7, 'Bus', 'Kaup to Padubidri', 'Hourly', '0820-257007', NULL),
(82, 7, 'Rickshaw', 'Kaup Market Area', 'On demand', '0820-257008', NULL),
(83, 7, 'Ferry', 'Kaup to Pithrody Beach', 'Seasonal', '0820-257009', NULL),
(84, 7, 'Bus', 'Kaup to Belapu', 'Every 45 mins', '0820-257010', NULL),
(85, 7, 'Taxi', 'Kaup to Mangaluru Airport', 'Pre-book', '0820-257011', NULL),
(86, 7, 'Bus', 'Kaup to Yermal', 'Every 2 hours', '0820-257012', NULL),
(87, 7, 'Mini Bus', 'Kaup to Innanje', 'Thrice daily', '0820-257013', NULL),
(88, 7, 'Car Rental', 'Local and Outstation', 'On demand', '0820-257014', NULL),
(89, 7, 'Bus', 'Kaup to Muloor', 'Every 3 hours', '0820-257015', NULL),
(90, 3, 'Bus', 'Hebri to Karkala', 'Every 30 mins', '08258-231001', NULL),
(91, 3, 'Auto', 'Hebri Town Rides', 'On demand', '08258-231002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sumedha', '$2y$10$POAVTxoGPDccGky/8gTIj.doQZR0BCOTH8xiSp.aQ6L2rtjL7Ja4W', 'nnm23cc068@nmamit.in', 'Sumedha', '8088988647', 'active', '2025-04-22 05:31:42', '2025-04-22 05:31:42'),
(2, 'vasavi', '$2y$10$3DRtiZNYyM2sN./6BNqopuBsLaAAgAwwatNbhqEhbrZcE4dzfT.su', 'vaishnaviksharath@gmail.com', 'Gayatri', '08088988647', 'active', '2025-04-22 06:06:22', '2025-04-22 06:06:22'),
(3, 'vaishnavivbhat', '$2y$10$I7QfEJdJ6fFpXqIrtbPFlOeXP42a1gEAIGCAGLCIYJKvZ7zXbXEfW', 'nnm23cc069@nmamit.in', 'vaishnavivbhat', '9740237290', 'active', '2025-04-22 10:34:54', '2025-04-22 10:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `activity_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `page_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `activity_type`, `activity_time`, `page_url`) VALUES
(1, 'user_6807aea8c78fa9.17300555', 'visit', '2025-04-22 15:45:07', '/udupi_catalogue/index.php'),
(2, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 15:55:35', NULL),
(3, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 15:55:45', NULL),
(4, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:31:53', NULL),
(5, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:31:56', NULL),
(6, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:34:27', NULL),
(7, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:34:32', NULL),
(8, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:34:36', NULL),
(9, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:37:05', NULL),
(10, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:37:06', NULL),
(11, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:59:33', NULL),
(12, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 17:59:44', NULL),
(13, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:00:34', NULL),
(14, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:01:57', NULL),
(15, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:02:04', NULL),
(16, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:02:31', NULL),
(17, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:04:00', NULL),
(18, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:05:41', NULL),
(19, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:17:55', NULL),
(20, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:18:03', NULL),
(21, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:18:28', NULL),
(22, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:30:13', NULL),
(23, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:40:37', NULL),
(24, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:43:05', NULL),
(25, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 18:48:14', NULL),
(26, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 19:03:06', NULL),
(27, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 19:03:23', NULL),
(28, 'visitor_6807bb1976e9a', 'visit', '2025-04-22 19:10:55', NULL),
(29, '3', 'login', '2025-04-23 08:00:19', NULL),
(30, '3', 'visit', '2025-04-23 08:00:19', NULL),
(31, 'visitor_68089e98c3d75', 'visit', '2025-04-23 08:02:32', NULL),
(32, 'visitor_68089e98c3d75', 'visit', '2025-04-23 08:04:56', NULL),
(33, 'visitor_68089e98c3d75', 'visit', '2025-04-23 08:07:47', NULL),
(34, '3', 'login', '2025-04-24 03:49:04', NULL),
(35, '3', 'visit', '2025-04-24 03:49:04', NULL),
(36, '3', 'visit', '2025-04-24 04:07:28', NULL),
(37, '3', 'visit', '2025-04-24 04:09:27', NULL),
(38, '3', 'visit', '2025-04-24 04:14:36', NULL),
(39, 'visitor_6809bc2aae83c', 'visit', '2025-04-24 04:20:58', NULL),
(40, 'visitor_680a048c5f645', 'visit', '2025-04-24 09:29:48', NULL),
(41, 'visitor_680a048c5f645', 'visit', '2025-04-24 09:31:36', NULL),
(42, 'visitor_680a048c5f645', 'visit', '2025-04-24 09:35:06', NULL),
(43, 'visitor_680f6f33cf42b', 'visit', '2025-04-28 12:06:11', NULL),
(44, 'visitor_680f6f33cf42b', 'visit', '2025-04-28 12:06:48', NULL),
(45, 'visitor_680f6f33cf42b', 'visit', '2025-04-28 12:07:22', NULL),
(46, 'visitor_683716f95a684', 'visit', '2025-05-28 14:00:25', NULL),
(47, 'visitor_683716f95a684', 'visit', '2025-05-28 14:00:54', NULL),
(48, 'visitor_683716f95a684', 'visit', '2025-05-28 14:01:28', NULL),
(49, 'visitor_683716f95a684', 'visit', '2025-05-28 14:26:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accommodation_id`),
  ADD KEY `taluk_id` (`taluk_id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`),
  ADD KEY `taluk_id` (`taluk_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `taluk_id` (`taluk_id`);

--
-- Indexes for table `local_experiences`
--
ALTER TABLE `local_experiences`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `taluk_id` (`taluk_id`);

--
-- Indexes for table `taluk`
--
ALTER TABLE `taluk`
  ADD PRIMARY KEY (`taluk_id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`transport_id`),
  ADD KEY `taluk_id` (`taluk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_activity_time` (`activity_time`),
  ADD KEY `idx_user_activity` (`user_id`,`activity_type`,`activity_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `accommodation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `local_experiences`
--
ALTER TABLE `local_experiences`
  MODIFY `experience_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `taluk`
--
ALTER TABLE `taluk`
  MODIFY `taluk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `transport_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`taluk_id`) REFERENCES `taluk` (`taluk_id`);

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`taluk_id`) REFERENCES `taluk` (`taluk_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`taluk_id`) REFERENCES `taluk` (`taluk_id`);

--
-- Constraints for table `local_experiences`
--
ALTER TABLE `local_experiences`
  ADD CONSTRAINT `local_experiences_ibfk_1` FOREIGN KEY (`taluk_id`) REFERENCES `taluk` (`taluk_id`);

--
-- Constraints for table `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_ibfk_1` FOREIGN KEY (`taluk_id`) REFERENCES `taluk` (`taluk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
