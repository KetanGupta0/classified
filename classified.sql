-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 05:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classified`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `add_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `main_cat_id` int(11) NOT NULL,
  `add_title` varchar(255) NOT NULL DEFAULT 'Unknown',
  `add_detail` varchar(255) NOT NULL DEFAULT 'No available details',
  `add_status` varchar(255) NOT NULL DEFAULT 'pending',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`add_id`, `user_id`, `cat_id`, `main_cat_id`, `add_title`, `add_detail`, `add_status`, `timestamp`) VALUES
(8, 2, 300, 5, 'Expired add test', 'R-700', 'expired', '2023-03-13 09:45:28'),
(9, 3, 300, 1, 'Active add test', 'No available details', 'approved', '2023-03-13 09:47:31'),
(10, 3, 300, 6, 'Hidden by user add', 'some random details', 'hidden', '2023-03-13 10:47:02'),
(11, 2, 300, 4, 'Rejected Add for test', 'Nothing to show here', 'rejected', '2023-03-13 10:47:02'),
(12, 2, 300, 7, 'Pending add test', 'No available details', 'pending', '2023-03-13 10:47:02'),
(13, 3, 300, 5, 'Resubmitted Test Add', 'No available details', 'resubmitted', '2023-03-13 11:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `adminauths`
--

CREATE TABLE `adminauths` (
  `aid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminauths`
--

INSERT INTO `adminauths` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `purl` text DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `title`, `slug`, `icon`, `purl`, `parent`, `sort`) VALUES
(1, 'Cars', 'cars', '<ion-icon name=\"car-sport-outline\"></ion-icon>', NULL, 0, NULL),
(2, 'Real Estate', 'real-estate', '<ion-icon name=\"home-outline\"></ion-icon>', NULL, 0, NULL),
(3, 'Services', 'services', '<ion-icon name=\"construct-outline\"></ion-icon>', NULL, 0, NULL),
(4, 'Engines & Machines', 'engines-machines', '<ion-icon name=\"bus-outline\"></ion-icon>', NULL, 0, NULL),
(5, 'Contracting / Crafts', 'contracting-crafts', '<ion-icon name=\"build-outline\"></ion-icon>', NULL, 0, NULL),
(6, 'Furniture / Curtains', 'furniture-curtains', '<ion-icon name=\"bed-outline\"></ion-icon>', NULL, 0, NULL),
(7, 'Animals & Accessories', 'animals-accessories', '<ion-icon name=\"paw-outline\"></ion-icon>', NULL, 0, NULL),
(8, 'Home Appliances / Electronics', 'home-appliances-electronics', '<ion-icon name=\"tv-outline\"></ion-icon>', NULL, 0, NULL),
(9, 'Yacht / Sea', 'yacht-sea', '<ion-icon name=\"boat-outline\"></ion-icon>', NULL, 0, NULL),
(10, 'Family / Health', 'family-health', '<ion-icon name=\"medkit-outline\"></ion-icon>', NULL, 0, NULL),
(11, 'Jobs', 'jobs', '<ion-icon name=\"briefcase-outline\"></ion-icon>', NULL, 0, NULL),
(12, 'Auto', 'auto', NULL, NULL, 1, 1),
(13, 'Auto Services', 'auto-services', NULL, NULL, 1, 2),
(14, 'Spare Parts', 'spare-parts', NULL, NULL, 1, 3),
(15, 'Properties For Rent', 'properties-for-rent', NULL, NULL, 2, 1),
(16, 'Properties For Sale', 'properties-for-sale', NULL, NULL, 2, 2),
(17, 'International Properties', 'international-properties', NULL, NULL, 2, 3),
(18, 'Properties Under Construction', 'properties-under-construction', NULL, NULL, 2, 4),
(19, 'Furniture Moving', 'furniture-moving', NULL, NULL, 3, 1),
(20, 'Satellite', 'satellite', NULL, NULL, 3, 2),
(21, 'Pest Control', 'pest-control', NULL, NULL, 3, 3),
(22, 'Cleaning', 'cleaning', NULL, NULL, 3, 4),
(23, 'Shipping', 'shipping', NULL, NULL, 3, 5),
(24, 'Delivery Services', 'delivery-services', NULL, NULL, 3, 6),
(25, 'Lockers', 'lockers', NULL, NULL, 3, 7),
(26, 'Dancing Service', 'dancing-service', NULL, NULL, 3, 8),
(27, 'Wedding / Events', 'wedding-events', NULL, NULL, 3, 9),
(28, 'Training / Institutes', 'training-institutes', NULL, NULL, 3, 10),
(29, 'Land / Camps', 'land-camps', NULL, NULL, 3, 11),
(30, 'Visas / Pursuer Transaction', 'visas-pursuer-transaction', NULL, NULL, 3, 12),
(31, 'Travel / Tourism', 'travel-tourism', NULL, NULL, 3, 13),
(32, 'Taxi', 'taxi', NULL, NULL, 3, 14),
(33, 'Learning Driving', 'learning-driving', NULL, NULL, 3, 15),
(34, 'Grocery / Laundry', 'grocery-laundry', NULL, NULL, 3, 16),
(35, 'Restaurants / Food', 'restaurants-food', NULL, NULL, 3, 17),
(36, 'Musical Instruments', 'musical-instruments', NULL, NULL, 3, 18),
(37, 'Others', 'others', NULL, NULL, 3, 19),
(38, 'Marine Boats', 'marine-boats', NULL, NULL, 4, 1),
(39, 'Bikes', 'bikes', NULL, NULL, 4, 2),
(40, 'Engines / Heavy Equipment', 'engines-heavy-equipment', NULL, NULL, 4, 3),
(41, 'Pigments', 'pigments', NULL, NULL, 5, 1),
(42, 'Air conditioning', 'air-conditioning', NULL, NULL, 5, 2),
(43, 'Decor', 'decor', NULL, NULL, 5, 3),
(44, 'Kitchen / Aluminum', 'kitchen-aluminum', NULL, NULL, 5, 4),
(45, 'Blacksmith', 'blacksmith', NULL, NULL, 5, 5),
(46, 'Tiles / Ceramics', 'tiles-ciramics', NULL, NULL, 5, 6),
(47, 'Nurseries / Gardens', 'nurseries-gardens', NULL, NULL, 5, 7),
(48, 'Electrical Contractor', 'electrical-contractor', NULL, NULL, 5, 8),
(49, 'Carpenter', 'carpenter', NULL, NULL, 5, 9),
(50, 'Electronics Technician', 'electronics-technician', NULL, NULL, 5, 10),
(51, 'Glass Technician', 'glass-technician', NULL, NULL, 5, 11),
(52, 'Tanks', 'tanks', NULL, NULL, 5, 12),
(53, 'Insulator', 'insulator', NULL, NULL, 5, 13),
(54, 'Marble / Granite', 'marble-granite', NULL, NULL, 5, 14),
(55, 'Doors', 'doors', NULL, NULL, 5, 15),
(56, 'Drainage', 'drainage', NULL, NULL, 5, 16),
(57, 'Lockers', 'lockers', NULL, NULL, 5, 17),
(58, 'Gibson Board', 'gibson-board', NULL, NULL, 5, 18),
(59, 'Umbrella', 'umbrella', NULL, NULL, 5, 19),
(60, 'Contracting / Building Materials', 'contracting-building-materials', NULL, NULL, 5, 20),
(61, 'Plumbers', 'plumbers', NULL, NULL, 5, 21),
(62, 'Others', 'others', NULL, NULL, 5, 22),
(63, 'Home Furniture', 'home-furniture', NULL, NULL, 6, 1),
(64, 'Upholstery / Curtains', 'upholstery-curtains', NULL, NULL, 6, 2),
(65, 'Furnishings', 'furnishings', NULL, NULL, 6, 3),
(66, 'Office Furniture', 'office-furniture', NULL, NULL, 6, 4),
(67, 'Carpets / Parquet', 'carpets-parquet', NULL, NULL, 6, 5),
(68, 'Used furniture', 'used-furniture', NULL, NULL, 6, 6),
(69, 'Furniture Buyers', 'furniture-buyers', NULL, NULL, 6, 7),
(70, 'Other', 'other', NULL, NULL, 6, 8),
(71, 'Dogs', 'dogs', NULL, NULL, 7, 1),
(72, 'Birds of prey', 'birds-of-prey', NULL, NULL, 7, 2),
(73, 'Various Birds', 'various-birds', NULL, NULL, 7, 3),
(74, 'Camels / Cattle', 'camels-cattle', NULL, NULL, 7, 4),
(75, 'Horses', 'horses', NULL, NULL, 7, 5),
(76, 'Cats', 'cats', NULL, NULL, 7, 6),
(77, 'Other Animals', 'other-animals', NULL, NULL, 7, 7),
(78, 'Feeding / Eating Animals', 'feeding-eating-animals', NULL, NULL, 7, 8),
(79, 'Fishes', 'fishes', NULL, NULL, 7, 9),
(80, 'Equipment', 'equipment', NULL, NULL, 7, 10),
(81, 'Other Services', 'other-services', NULL, NULL, 5, 11),
(82, 'Vet / Clinics', 'vet-clinics', NULL, NULL, 7, 12),
(83, 'Companies / Shops', 'companies-shops', NULL, NULL, 7, 13),
(84, 'Elevators', 'elevators', NULL, NULL, 8, 1),
(85, 'Home Appliances', 'home-appliances', NULL, NULL, 8, 2),
(86, 'Mobile / Accessories', 'mobile-accessories', NULL, NULL, 8, 3),
(87, 'Electronics', 'electronics', NULL, NULL, 8, 4),
(88, 'Video Games / Accessories', 'video-games-accessories', NULL, NULL, 8, 5),
(89, 'Yacht', 'yacht', NULL, NULL, 9, 1),
(90, 'Boats', 'boats', NULL, NULL, 9, 2),
(91, 'Jet Ski', 'jet-ski', NULL, NULL, 9, 3),
(92, 'Equipment / Marine Tools', 'equipment-marine-tools', NULL, NULL, 9, 4),
(93, 'Repair / Spare Parts', 'repair-spare-parts', NULL, NULL, 9, 5),
(94, 'Sea Trips', 'sea-trips', NULL, NULL, 9, 6),
(95, 'Marinas', 'marinas', NULL, NULL, 9, 7),
(96, 'Wanted Boats', 'wanted-boats', NULL, NULL, 9, 8),
(97, 'Other', 'other', NULL, NULL, 9, 9),
(98, 'Women\'s Fashion', 'women\'s-fashion', NULL, NULL, 10, 1),
(99, 'Men\'s Fashion', 'men\'s-fashion', NULL, NULL, 10, 2),
(100, 'Baby Stuff', 'baby-stuff', NULL, NULL, 10, 3),
(101, 'Health', 'health', NULL, NULL, 10, 4),
(102, 'Jobs Available', 'jobs-available', NULL, NULL, 11, 1),
(103, 'Seeking For Jobs', 'seeking-for-jobs', NULL, NULL, 11, 2),
(105, 'European', 'european', NULL, NULL, 12, 2),
(106, 'Japanese', 'japanese', NULL, NULL, 12, 3),
(107, 'Korean', 'korean', NULL, NULL, 12, 4),
(108, 'China', 'china', NULL, NULL, 12, 5),
(109, 'Classic', 'classic', NULL, NULL, 12, 6),
(110, 'Wanted Cars', 'wanted-cars', NULL, NULL, 12, 7),
(111, 'Other Types', 'other-types', NULL, NULL, 12, 8),
(112, 'Car Rental', 'car-rental', NULL, NULL, 13, 1),
(113, 'Scrap', 'scrap', NULL, NULL, 13, 2),
(114, 'Learning Driving', 'learning-driving', NULL, NULL, 13, 3),
(115, 'Polishing / shading', 'polishing-shading', NULL, NULL, 13, 4),
(116, 'Repairing', 'repairing', NULL, NULL, 13, 5),
(117, 'Remote Programming', 'remote-programming', NULL, NULL, 13, 6),
(118, 'Surface / Crane / Winch', 'surface-crane-winch', NULL, NULL, 13, 7),
(119, 'Shipping Cars', 'shipping-cars', NULL, NULL, 13, 8),
(120, 'Insurance', 'insurance', NULL, NULL, 13, 9),
(121, 'Taxi', 'taxi', NULL, NULL, 13, 10),
(122, 'Others', 'others', NULL, NULL, 13, 11),
(123, 'American', 'american', NULL, NULL, 14, 1),
(124, 'European', 'european', NULL, NULL, 14, 2),
(125, 'Japanese', 'japanese', NULL, NULL, 14, 3),
(126, 'Korean / Chinese', 'korean-chinese', NULL, NULL, 14, 4),
(127, 'Accessories / Screens', 'accessories-screens', NULL, NULL, 14, 5),
(128, 'Used', 'used', NULL, NULL, 14, 6),
(129, 'Wheels / Tires', 'wheels-tires', NULL, NULL, 14, 7),
(130, 'Machinery / Ceres', 'machinery-ceres', NULL, NULL, 14, 8),
(131, 'Others', 'others', NULL, NULL, 14, 9),
(132, 'Residential / Investment', 'residential-investment', NULL, NULL, 15, 1),
(133, 'Commercial / Industrial', 'commercial-industrial', NULL, NULL, 15, 2),
(134, 'Rest houses & Chalets', 'rest-houses-chalets', NULL, NULL, 15, 3),
(135, 'Residential', 'residential', NULL, NULL, 16, 1),
(136, 'Commercial / Investment', 'commercial-investment', NULL, NULL, 16, 2),
(137, 'Chalets / Parks', 'chalets-parks', NULL, NULL, 16, 3),
(138, 'Arab Properties', 'arab-properties', NULL, NULL, 17, 1),
(139, 'Foreign Properties', 'foreign-properties', NULL, NULL, 17, 2),
(140, 'Properties For Rent', 'properties-for-rent', NULL, NULL, 17, 3),
(141, 'Other', 'other', NULL, NULL, 17, 4),
(142, 'Residential / Investment', 'residential-investment', NULL, NULL, 18, 1),
(143, 'Commercial / Industrial', 'commercial-industrial', NULL, NULL, 18, 2),
(144, 'Other', 'other', NULL, NULL, 18, 3),
(145, 'University Services', 'university-services', NULL, NULL, 28, 1),
(146, 'Teaching Arbic Language', 'teaching-arbic-language', NULL, NULL, 28, 2),
(147, 'Teaching English Language', 'teaching-english-language', NULL, NULL, 28, 3),
(148, 'Mathematics Teaching', 'mathematics-teaching', NULL, NULL, 28, 4),
(149, 'Teaching French Language', 'teaching-french-language', NULL, NULL, 28, 5),
(150, 'Science', 'science', NULL, NULL, 28, 6),
(151, 'Physics / Chemistry', 'physics-chemistry', NULL, NULL, 28, 7),
(152, 'School Supplies', 'school-supplies', NULL, NULL, 28, 8),
(153, 'Different Subjects', 'different-subjects', NULL, NULL, 28, 9),
(154, 'Books / Others', 'books-others', NULL, NULL, 28, 10),
(155, 'Tents / Accessories', 'tents-accessories', NULL, NULL, 29, 1),
(156, 'Cabins / Strolling chalets', 'cabins-strolling-chalets', NULL, NULL, 29, 2),
(157, 'Miscellaneous Marine Equipment', 'miscellaneous-marine-equipment', NULL, NULL, 29, 3),
(158, 'Tourism Trips', 'tourism-trips', NULL, NULL, 29, 4),
(159, 'Games / Bouncy', 'games-bouncy', NULL, NULL, 29, 5),
(160, 'Solar Energy', 'solar-energy', NULL, NULL, 29, 6),
(161, 'Generators', 'generators', NULL, NULL, 29, 7),
(162, 'Fishing Tools / Gardening', 'fishing-tools-gardening', NULL, NULL, 29, 8),
(163, 'Others', 'other', NULL, NULL, 29, 9),
(164, 'Motorcycles', 'motorcycles', NULL, NULL, 39, 1),
(165, 'Quad Bikes', 'quad-bikes', NULL, NULL, 39, 2),
(166, 'Bicycles', 'bicycles', NULL, NULL, 39, 3),
(167, 'Accessories', 'accessories', NULL, NULL, 39, 4),
(168, 'Repair / Spare Parts', 'repair-spare-parts', NULL, NULL, 39, 5),
(169, 'Wanted', 'Wanted', NULL, NULL, 39, 6),
(170, 'Others', 'Others', NULL, NULL, 39, 7),
(171, 'Large Buses', 'large-buses', NULL, NULL, 40, 1),
(172, 'Heavy Equipment', 'heavy-equipment', NULL, NULL, 40, 2),
(173, 'Construction Equipment', 'construction-equipment', NULL, NULL, 40, 3),
(174, 'Water tankers', 'water-tankers', NULL, NULL, 40, 4),
(175, 'Spare Parts', 'spare-parts', NULL, NULL, 40, 5),
(176, 'Trucks', 'trucks', NULL, NULL, 40, 6),
(177, 'Excavators', 'excavators', NULL, NULL, 40, 7),
(178, 'Maintenance', 'maintenance', NULL, NULL, 40, 8),
(179, 'Other Engines / Heavy Equipment', 'other-engines-heavy-equipment', NULL, NULL, 40, 9),
(180, 'Wanted', 'wanted', NULL, NULL, 40, 10),
(181, 'Air Conditioners / Air Purifier', 'air-conditioners-air-purifier', NULL, NULL, 85, 1),
(182, 'Fridges', 'fridges', NULL, NULL, 85, 2),
(183, 'Televisions / Receivers', 'televisions-receivers', NULL, NULL, 85, 3),
(184, 'Washing', 'washing', NULL, NULL, 85, 4),
(185, 'Cookers', 'cookers', NULL, NULL, 85, 5),
(186, 'Others', 'others', NULL, NULL, 85, 6),
(187, 'Iphone', 'iphone', NULL, NULL, 86, 1),
(188, 'Samsung', 'samsung', NULL, NULL, 86, 2),
(189, 'Huawei', 'huawei', NULL, NULL, 86, 3),
(190, 'Other Mobile', 'other-mobile', NULL, NULL, 86, 4),
(191, 'Buy / Sell', 'buy-sell', NULL, NULL, 86, 5),
(192, 'Special Numbers For Sale', 'special-numbers-for-sale', NULL, NULL, 86, 6),
(193, 'Accessories / Chargers', 'accessories-chargers', NULL, NULL, 86, 7),
(194, 'Maintenance / Repairing', 'maintenance-repairing', NULL, NULL, 86, 8),
(195, 'Samsung', 'samsung', NULL, NULL, 87, 1),
(196, 'Navigation Devices', 'navigation-devices', NULL, NULL, 87, 2),
(197, 'Computers / Laptop', 'computers-laptop', NULL, NULL, 87, 3),
(198, 'Cameras', 'cameras', NULL, NULL, 87, 4),
(199, 'Aircraft', 'aircraft', NULL, NULL, 87, 5),
(200, 'Apple', 'apple', NULL, NULL, 87, 6),
(201, 'Other', 'other', NULL, NULL, 87, 7),
(202, 'Play Station', 'play-station', NULL, NULL, 88, 1),
(203, 'X-Box', 'x-box', NULL, NULL, 88, 2),
(204, 'Wireless Games', 'wireless-games', NULL, NULL, 88, 3),
(205, 'Accessories', 'accessories', NULL, NULL, 88, 4),
(206, 'Repairing', 'repairing', NULL, NULL, 88, 5),
(207, 'Others', 'others', NULL, NULL, 88, 6),
(208, 'Salons / Institutes', 'salons-institutes', NULL, NULL, 98, 1),
(209, 'Clothes', 'clothes', NULL, NULL, 98, 2),
(210, 'Jewelry / Accessories', 'jewelry-accessories', NULL, NULL, 98, 3),
(211, 'Perfumes', 'perfumes', NULL, NULL, 98, 4),
(212, 'Shoes / Bags', 'shoes-bags', NULL, NULL, 98, 5),
(213, 'Cosmetics', 'cosmetics', NULL, NULL, 98, 6),
(214, 'Watches / Glasses', 'watches-glasses', NULL, NULL, 98, 7),
(215, 'Others', 'others', NULL, NULL, 98, 8),
(216, 'Men Salons / Institutes', 'men-salons-institutes', NULL, NULL, 99, 1),
(217, 'Shoes / Clothing', 'shoes-clothing', NULL, NULL, 99, 2),
(218, 'Perfumes', 'perfumes', NULL, NULL, 99, 3),
(219, 'Sebha / Pens', 'sebha-pens', NULL, NULL, 99, 4),
(220, 'Leather / wallets', 'leather-wallets', NULL, NULL, 99, 5),
(221, 'Watches / Glasses', 'watches-glasses', NULL, NULL, 99, 6),
(222, 'Sports Equipment / Tools', 'sports-equipment-tools', NULL, NULL, 99, 7),
(223, 'Accessories / Other', 'accessories-other', NULL, NULL, 99, 8),
(224, 'Children\'s Toys', 'children\'s-toys', NULL, NULL, 100, 1),
(225, 'Children Supplies', 'children-supplies', NULL, NULL, 100, 2),
(226, 'Children\'s salons', 'children\'s-salons', NULL, NULL, 100, 3),
(227, 'Children\'s Clothing', 'children\'s-clothing', NULL, NULL, 100, 4),
(228, 'Newborn Clothes', 'newborn-clothes', NULL, NULL, 100, 5),
(229, 'Baby Supplies', 'baby-supplies', NULL, NULL, 100, 6),
(230, 'Other Games', 'other-games', NULL, NULL, 100, 7),
(231, 'Doctors', 'doctors', NULL, NULL, 101, 1),
(232, 'Medical Equipment', 'medical-equipment', NULL, NULL, 101, 2),
(233, 'Special Needs', 'special-needs', NULL, NULL, 101, 3),
(234, 'Nursing', 'nursing', NULL, NULL, 101, 4),
(235, 'Pharmacies', 'pharmacies', NULL, NULL, 101, 5),
(236, 'Other', 'other', NULL, NULL, 101, 6),
(237, 'Administrator / Secretary', 'administrator-secretary', NULL, NULL, 102, 1),
(238, 'Financial / Accounting', 'financial-accounting', NULL, NULL, 102, 2),
(239, 'Computer / IT Services', 'computer-it-services', NULL, NULL, 102, 3),
(240, 'Teaching / Training', 'teaching-training', NULL, NULL, 102, 4),
(241, 'Marketing / Sales', 'marketing-sales', NULL, NULL, 102, 5),
(242, 'Design / Graphic', 'design-graphic', NULL, NULL, 102, 6),
(243, 'Recruitment / Human resources', 'recruitment-human-resources', NULL, NULL, 102, 7),
(244, 'Media / Advertising', 'media-advertising', NULL, NULL, 102, 8),
(245, 'Reception/ Customer service', 'reception-customer-service', NULL, NULL, 102, 9),
(246, 'Served / Domestic workers', 'served-domestic-workers', NULL, NULL, 102, 10),
(247, 'Travel / Tourism', 'travel-tourism', NULL, NULL, 102, 11),
(248, 'Management / Business Administration', 'management-business-administration', NULL, NULL, 102, 12),
(249, 'Craftsman / Professionals', 'craftsman-professionals', NULL, NULL, 102, 13),
(250, 'Hotel / Restaurant', 'hotel-restaurant', NULL, NULL, 102, 14),
(251, 'Lawyers / Legal', 'lawyers-legal', NULL, NULL, 102, 15),
(252, 'Engineering', 'engineering', NULL, NULL, 102, 16),
(253, 'Medical / Nursing', 'medical-nursing', NULL, NULL, 102, 17),
(254, 'Drivers', 'drivers', NULL, NULL, 102, 18),
(255, 'Guard / Security', 'guard-security', NULL, NULL, 102, 19),
(256, 'Barber / Coiffure', 'barber-coiffure', NULL, NULL, 102, 20),
(257, 'Administrator / Secretary', 'administrator-secretary', NULL, NULL, 103, 1),
(258, 'Financial / Accounting', 'financial-accounting', NULL, NULL, 103, 2),
(259, 'Computer / IT Services', 'computer-it-services', NULL, NULL, 103, 3),
(260, 'Marketing / Sales', 'marketing-sales', NULL, NULL, 103, 4),
(261, 'Reception / Customer service', 'reception-customer-service', NULL, NULL, 103, 5),
(262, 'Domestic workers', 'domestic-workers', NULL, NULL, 103, 6),
(263, 'Management / Business Administration', 'management-business-administration', NULL, NULL, 103, 7),
(264, 'Travel / Tourism', 'travel-tourism', NULL, NULL, 103, 8),
(265, 'Teaching / Training', 'teaching-training', NULL, NULL, 103, 9),
(266, 'Design / Graphic', 'design-graphic', NULL, NULL, 103, 10),
(267, 'Recruitment / Human resources', 'recruitment-human-resources', NULL, NULL, 103, 11),
(268, 'Media / Advertising', 'media-advertising', NULL, NULL, 103, 12),
(269, 'Craftsman / Professionals', 'craftsman-professionals', NULL, NULL, 103, 13),
(270, 'Hotel / Restaurant', 'hotel-restaurant', NULL, NULL, 103, 14),
(271, 'Lawyers / Legal', 'lawyers-legal', NULL, NULL, 103, 15),
(272, 'Engineering', 'engineering', NULL, NULL, 103, 16),
(273, 'Medical / Nursing', 'medical-nursing', NULL, NULL, 103, 17),
(274, 'Drivers', 'drivers', NULL, NULL, 103, 18),
(275, 'Guard / Security', 'guard-security', NULL, NULL, 103, 19),
(276, 'Barber / Beauty Shop', 'barber-beauty-shop', NULL, NULL, 103, 20),
(277, 'American', 'american', NULL, NULL, 12, 1),
(285, 'GMC', 'gmc', NULL, NULL, 277, 1),
(286, 'Chevrolet', 'chevrolet', NULL, NULL, 277, 2),
(287, 'Ford', 'ford', NULL, NULL, 277, 3),
(288, 'Lincoln', 'lincoln', NULL, NULL, 277, 4),
(289, 'Cadillac', 'cadillac', NULL, NULL, 277, 5),
(290, 'Chrysler', 'chrysler', NULL, NULL, 277, 6),
(291, 'Dodge', 'dodge', NULL, NULL, 277, 7),
(292, 'Jeep', 'jeep', NULL, NULL, 277, 8),
(293, 'Hummer', 'hummer', NULL, NULL, 277, 9),
(294, 'Others American Cars', 'others-american-cars', NULL, NULL, 277, 10),
(295, 'Pontiac', 'pontiac', NULL, NULL, 277, 11),
(296, 'TESLA', 'tesla', NULL, NULL, 277, 12),
(297, 'Wanted American Cars', 'wanted-american Cars', NULL, NULL, 277, 13),
(298, 'Mercury', 'mercury', NULL, NULL, 277, 14),
(299, 'RAM', 'ram', NULL, NULL, 277, 15),
(300, 'Savana', 'savana', NULL, NULL, 285, 1),
(301, 'Acadia', 'acadia', NULL, NULL, 285, 2),
(302, 'Envoy', 'envoy', NULL, NULL, 285, 3),
(303, 'Terrain', 'terrain', NULL, NULL, 285, 4),
(304, 'Denali', 'denali', NULL, NULL, 285, 5),
(305, 'Van', 'van', NULL, NULL, 285, 6),
(306, 'Safari', 'safari', NULL, NULL, 285, 7),
(307, 'Suburban', 'suburban', NULL, NULL, 285, 8),
(308, 'Sierra', 'sierra', NULL, NULL, 285, 9),
(309, 'Yukon', 'yukon', NULL, NULL, 285, 10),
(310, 'Sonoma', 'sonoma', NULL, NULL, 285, 11),
(311, 'Other', 'other', NULL, NULL, 285, 12),
(312, 'N 300', 'n-300', NULL, NULL, 286, 1),
(313, 'Equinox', 'equinox', NULL, NULL, 286, 2),
(314, 'Caprice', 'caprice', NULL, NULL, 286, 3),
(315, 'Tahoe', 'tahoe', NULL, NULL, 286, 4),
(316, 'Corvette', 'corvette', NULL, NULL, 286, 5),
(317, 'Silverado', 'silverado', NULL, NULL, 286, 6),
(318, 'Camaro', 'camaro', NULL, NULL, 286, 7),
(319, 'Trailblazer', 'trailblazer', NULL, NULL, 286, 8),
(320, 'Suburban', 'suburban', NULL, NULL, 286, 9),
(321, 'Malibu', 'malibu', NULL, NULL, 286, 10),
(322, 'Optra', 'optra', NULL, NULL, 286, 11),
(323, 'Epica', 'epica', NULL, NULL, 286, 12),
(324, 'Uplander', 'uplander', NULL, NULL, 286, 13),
(325, 'Avalanche', 'avalanche', NULL, NULL, 286, 14),
(326, 'Van', 'van', NULL, NULL, 286, 15),
(327, 'Ambala', 'ambala', NULL, NULL, 286, 16),
(328, 'Finisher', 'finisher', NULL, NULL, 286, 17),
(329, 'Captiva', 'captiva', NULL, NULL, 286, 18),
(330, 'Traverse', 'traverse', NULL, NULL, 286, 19),
(331, 'Lumina', 'lumina', NULL, NULL, 286, 20),
(332, 'Mondeo', 'mondeo', NULL, NULL, 287, 1),
(333, 'Grand C Max', 'grand-c-max', NULL, NULL, 287, 2),
(334, 'Kuga', 'kuga', NULL, NULL, 287, 3),
(335, 'Crown Victoria', 'crown-victoria', NULL, NULL, 287, 4),
(336, 'Mustang', 'mustang', NULL, NULL, 287, 5),
(337, 'Explorer', 'explorer', NULL, NULL, 287, 6),
(338, 'Expedition', 'expedition', NULL, NULL, 287, 7),
(339, 'Excursion', 'excursion', NULL, NULL, 287, 8),
(340, 'Fiesta', 'fiesta', NULL, NULL, 287, 9),
(341, 'Escape', 'escape', NULL, NULL, 287, 10),
(342, 'Edge', 'edge', NULL, NULL, 287, 11),
(343, 'Figo', 'figo', NULL, NULL, 287, 12),
(344, 'Flex', 'flex', NULL, NULL, 287, 13),
(345, 'Focus', 'focus', NULL, NULL, 287, 14),
(346, 'Fusion', 'fusion', NULL, NULL, 287, 15),
(347, 'Wayne', 'wayne', NULL, NULL, 287, 16),
(348, 'Raptor', 'raptor', NULL, NULL, 287, 17),
(349, 'Taurus', 'taurus', NULL, NULL, 287, 18),
(350, 'Windstar', 'windstar', NULL, NULL, 287, 19),
(351, 'Aerostar', 'aerostar', NULL, NULL, 287, 20),
(352, 'Town Car', 'town-car', NULL, NULL, 288, 1),
(353, 'Cartier', 'cartier', NULL, NULL, 288, 2),
(354, 'Continental', 'Continental', NULL, NULL, 288, 3),
(355, 'LS', 'LS', NULL, NULL, 288, 4),
(356, 'Mark LT', 'Mark LT', NULL, NULL, 288, 5),
(357, 'MKS', 'MKS', NULL, NULL, 288, 6),
(358, 'MKT', 'MKT', NULL, NULL, 288, 7),
(359, 'MKX', 'MKX', NULL, NULL, 288, 8),
(360, 'MKZ', 'MKZ', NULL, NULL, 288, 9),
(361, 'Navigator', 'Navigator', NULL, NULL, 288, 10),
(362, 'Other', 'Other', NULL, NULL, 288, 11),
(363, 'Escalade', 'Escalade', NULL, NULL, 289, 1),
(364, 'Deville', 'Deville', NULL, NULL, 289, 2),
(365, 'XLR', 'XLR', NULL, NULL, 289, 3),
(366, 'ATS', 'ATS', NULL, NULL, 289, 4),
(367, 'CTS', 'CTS', NULL, NULL, 289, 5),
(368, 'DTS', 'DTS', NULL, NULL, 289, 6),
(369, 'Eldorado', 'Eldorado', NULL, NULL, 289, 7),
(370, 'SRX', 'SRX', NULL, NULL, 289, 8),
(371, 'Fleetwood', 'Fleetwood', NULL, NULL, 289, 9),
(372, 'STS', 'STS', NULL, NULL, 289, 10),
(373, 'XLP', 'XLP', NULL, NULL, 289, 11),
(374, 'XTS', 'XTS', NULL, NULL, 289, 12),
(375, 'Other', 'Other', NULL, NULL, 289, 13),
(376, 'Chrysler Sebring', 'Chrysler Sebring', NULL, NULL, 290, 1),
(377, 'Town & Country', 'Town & Country', NULL, NULL, 290, 2),
(378, 'Voyager Caravan', 'Voyager Caravan', NULL, NULL, 290, 3),
(379, 'C-200', 'C-200', NULL, NULL, 290, 4),
(380, 'C-300', 'C-300', NULL, NULL, 290, 5),
(381, 'PT Cruiser', 'PT Cruiser', NULL, NULL, 290, 6),
(382, 'Crossfire', 'Crossfire', NULL, NULL, 290, 7),
(383, 'Other', 'Other', NULL, NULL, 290, 8),
(384, 'Durango Hybrid', 'Durango Hybrid', NULL, NULL, 291, 1),
(385, 'Colt', 'Colt', NULL, NULL, 291, 2),
(386, 'Grand Caravan', 'Grand Caravan', NULL, NULL, 291, 3),
(387, 'Dynasty', 'Dynasty', NULL, NULL, 291, 4),
(388, 'Daytona', 'Daytona', NULL, NULL, 291, 5),
(389, 'Dart', 'Dart', NULL, NULL, 291, 6),
(390, 'Charger', 'Charger', NULL, NULL, 291, 7),
(391, 'Challenger', 'Challenger', NULL, NULL, 291, 8),
(392, 'Nitro', 'Nitro', NULL, NULL, 291, 9),
(393, 'Avenger', 'Avenger', NULL, NULL, 291, 10),
(394, 'Intrepid', 'Intrepid', NULL, NULL, 291, 11),
(395, 'Dakota', 'Dakota', NULL, NULL, 291, 12),
(396, 'Durango', 'Durango', NULL, NULL, 291, 13),
(397, 'Van', 'Van', NULL, NULL, 291, 14),
(398, 'Viper', 'Viper', NULL, NULL, 291, 15),
(399, 'Caravan', 'Caravan', NULL, NULL, 291, 16),
(400, 'Caliber', 'Caliber', NULL, NULL, 291, 17),
(401, 'Other', 'Other', NULL, NULL, 291, 18),
(402, 'Renegade', 'Renegade', NULL, NULL, 292, 1),
(403, 'Grand Cherokee', 'Grand Cherokee', NULL, NULL, 292, 2),
(404, 'Wrangler', 'Wrangler', NULL, NULL, 292, 3),
(405, 'Cherokee', 'Cherokee', NULL, NULL, 292, 4),
(406, 'Commander', 'Commander', NULL, NULL, 292, 5),
(407, 'Compass', 'Compass', NULL, NULL, 292, 6),
(408, 'Other', 'Other', NULL, NULL, 292, 7),
(409, 'H1', 'H1', NULL, NULL, 293, 1),
(410, 'H2', 'H2', NULL, NULL, 293, 2),
(411, 'H3', 'H3', NULL, NULL, 293, 3),
(412, 'Grand Marquis', 'Grand Marquis', NULL, NULL, 298, 1),
(413, 'Mountaineer', 'Mountaineer', NULL, NULL, 298, 2),
(414, 'Milan', 'Milan', NULL, NULL, 298, 3),
(415, 'Other', 'Other', NULL, NULL, 298, 4),
(416, 'Mercedes-Benz', 'Mercedes-Benz', NULL, NULL, 105, 1),
(417, 'BMW', 'BMW', NULL, NULL, 105, 2),
(418, 'Land Rover', 'Land Rover', NULL, NULL, 105, 3),
(419, 'Audi', 'Audi', NULL, NULL, 105, 4),
(420, 'Fiat', 'Fiat', NULL, NULL, 105, 5),
(421, 'Seat', 'Seat', NULL, NULL, 105, 6),
(422, 'OPEL', 'OPEL', NULL, NULL, 105, 7),
(423, 'Alfa Romeo', 'Alfa Romeo', NULL, NULL, 105, 8),
(424, 'MG', 'MG', NULL, NULL, 105, 9),
(425, 'Citroen', 'Citroen', NULL, NULL, 105, 10),
(426, 'Peugeot', 'Peugeot', NULL, NULL, 105, 11),
(427, 'Mini', 'Mini', NULL, NULL, 105, 12),
(428, 'Renault', 'Renault', NULL, NULL, 105, 13),
(429, 'Aston Martin', 'Aston Martin', NULL, NULL, 105, 14),
(430, 'Volvo', 'Volvo', NULL, NULL, 105, 15),
(431, 'Lamborghini', 'Lamborghini', NULL, NULL, 105, 16),
(432, 'Volkswagen', 'Volkswagen', NULL, NULL, 105, 17),
(433, 'Lotus', 'Lotus', NULL, NULL, 105, 18),
(434, 'Ferrari', 'Ferrari', NULL, NULL, 105, 19),
(435, 'Maserati', 'Maserati', NULL, NULL, 105, 20),
(436, 'GLE', 'GLE', NULL, NULL, 416, 1),
(437, 'GLS', 'GLS', NULL, NULL, 416, 2),
(438, 'R-Class', 'R-Class', NULL, NULL, 416, 3),
(439, 'SL', 'SL', NULL, NULL, 416, 4),
(440, 'SLC', 'SLC', NULL, NULL, 416, 5),
(441, 'V-Class', 'V-Class', NULL, NULL, 416, 6),
(442, 'CL', 'CL', NULL, NULL, 416, 7),
(443, 'C180', 'C180', NULL, NULL, 416, 8),
(444, 'E300', 'E300', NULL, NULL, 416, 9),
(445, 'CLA 180', 'CLA 180', NULL, NULL, 416, 10),
(446, 'GLA 200', 'GLA 200', NULL, NULL, 416, 11),
(447, 'E 180', 'E 180', NULL, NULL, 416, 12),
(448, 'GLC 250', 'GLC 250', NULL, NULL, 416, 13),
(449, 'GLC 300', 'GLC 300', NULL, NULL, 416, 14),
(450, 'CLS 350', 'CLS 350', NULL, NULL, 416, 15),
(451, 'S450', 'S450', NULL, NULL, 416, 16),
(452, 'Maybach', 'Maybach', NULL, NULL, 416, 17),
(453, 'CLK', 'CLK', NULL, NULL, 416, 18),
(454, 'GL', 'GL', NULL, NULL, 416, 19),
(455, 'SLK', 'SLK', NULL, NULL, 416, 20),
(456, 'ALPINA', 'ALPINA', NULL, NULL, 417, 1),
(457, 'Series 1', 'Series 1', NULL, NULL, 417, 2),
(458, 'Series 2', 'Series 2', NULL, NULL, 417, 3),
(459, 'Series 3', 'Series 3', NULL, NULL, 417, 4),
(460, 'Series 4', 'Series 4', NULL, NULL, 417, 5),
(461, 'Series 5', 'Series 5', NULL, NULL, 417, 6),
(462, 'Series 6', 'Series 6', NULL, NULL, 417, 7),
(463, 'Series 7', 'Series 7', NULL, NULL, 417, 8),
(464, 'A Series', 'A Series', NULL, NULL, 417, 9),
(465, 'Series 8', 'Series 8', NULL, NULL, 417, 10),
(466, 'X Series', 'X Series', NULL, NULL, 417, 11),
(467, 'Z Series', 'Z Series', NULL, NULL, 417, 12),
(468, 'M Series', 'M Series', NULL, NULL, 417, 13),
(469, 'Z4 2020', 'Z4 2020', NULL, NULL, 417, 14),
(470, '418i 2020', '418i 2020', NULL, NULL, 417, 15),
(471, 'M850i 2020', 'M850i 2020', NULL, NULL, 417, 16),
(472, '640i', '640i', NULL, NULL, 417, 17),
(473, 'X4', 'X4', NULL, NULL, 417, 18),
(474, '520i', '520i', NULL, NULL, 417, 19),
(475, '318i', '318i', NULL, NULL, 417, 20),
(476, 'Defender', 'Defender', NULL, NULL, 418, 1),
(477, 'Discovery', 'Discovery', NULL, NULL, 418, 2),
(478, 'Discovery Sport', 'Discovery Sport', NULL, NULL, 418, 3),
(479, 'Evoque', 'Evoque', NULL, NULL, 418, 4),
(480, 'Sport', 'Sport', NULL, NULL, 418, 5),
(481, 'Range Rover', 'Range Rover', NULL, NULL, 418, 6),
(482, 'Range Rover sport', 'Range Rover sport', NULL, NULL, 418, 7),
(483, 'vogue', 'vogue', NULL, NULL, 418, 8),
(484, 'Velar', 'Velar', NULL, NULL, 418, 9),
(485, 'Other', 'Other', NULL, NULL, 418, 10),
(486, 'A1', 'A1', NULL, NULL, 419, 1),
(487, 'A3', 'A3', NULL, NULL, 419, 2),
(488, 'A4', 'A4', NULL, NULL, 419, 3),
(489, 'A5', 'A5', NULL, NULL, 419, 4),
(490, 'A6', 'A6', NULL, NULL, 419, 5),
(491, 'A7', 'A7', NULL, NULL, 419, 6),
(492, 'A8', 'A8', NULL, NULL, 419, 7),
(493, 'Q2', 'Q2', NULL, NULL, 419, 8),
(494, 'Q3', 'Q3', NULL, NULL, 419, 9),
(495, 'Q5', 'Q5', NULL, NULL, 419, 10),
(496, 'Q7', 'Q7', NULL, NULL, 419, 11),
(497, 'R8', 'R8', NULL, NULL, 419, 12),
(498, 'RS', 'RS', NULL, NULL, 419, 13),
(499, 'Audi S', 'Audi S', NULL, NULL, 419, 14),
(500, 'TT', 'TT', NULL, NULL, 419, 15),
(501, 'Other', 'Other', NULL, NULL, 419, 16),
(502, 'Coupe', 'Coupe', NULL, NULL, 420, 1),
(503, 'Panda', 'Panda', NULL, NULL, 420, 2),
(504, 'Punto', 'Punto', NULL, NULL, 420, 3),
(505, '500', '500', NULL, NULL, 420, 4),
(506, 'Doblo', 'Doblo', NULL, NULL, 420, 5),
(507, '500C', '500C', NULL, NULL, 420, 6),
(508, '500X', '500X', NULL, NULL, 420, 7),
(509, 'Tipo', 'Tipo', NULL, NULL, 420, 8),
(510, 'Other', 'Other', NULL, NULL, 420, 9),
(511, 'Toledo', 'Toledo', NULL, NULL, 421, 1),
(512, 'Ibiza', 'Ibiza', NULL, NULL, 421, 2),
(513, 'Leon', 'Leon', NULL, NULL, 421, 3),
(514, 'Ateca', 'Ateca', NULL, NULL, 421, 4),
(515, 'Arona', 'Arona', NULL, NULL, 421, 5),
(516, 'Other', 'Other', NULL, NULL, 421, 6),
(517, 'Adam', 'Adam', NULL, NULL, 422, 1),
(518, 'Corsa', 'Corsa', NULL, NULL, 422, 2),
(519, 'Astra', 'Astra', NULL, NULL, 422, 3),
(520, 'Astra GTC', 'Astra GTC', NULL, NULL, 422, 4),
(521, 'Insignia', 'Insignia', NULL, NULL, 422, 5),
(522, 'Tigra', 'Tigra', NULL, NULL, 422, 6),
(523, 'Grandland', 'Grandland', NULL, NULL, 422, 7),
(524, 'Rekord', 'Rekord', NULL, NULL, 422, 8),
(525, 'Zafira', 'Zafira', NULL, NULL, 422, 9),
(526, 'Vectra', 'Vectra', NULL, NULL, 422, 10),
(527, 'Kadett', 'Kadett', NULL, NULL, 422, 11),
(528, 'Crossland', 'Crossland', NULL, NULL, 422, 12),
(529, 'Cascada', 'Cascada', NULL, NULL, 422, 13),
(530, 'Calibra', 'Calibra', NULL, NULL, 422, 14),
(531, 'Mokka', 'Mokka', NULL, NULL, 422, 15),
(532, 'Other', 'Other', NULL, NULL, 422, 16),
(533, 'Mito', 'Mito', NULL, NULL, 423, 1),
(534, 'Giulietta', 'Giulietta', NULL, NULL, 423, 2),
(535, 'Giulia', 'Giulia', NULL, NULL, 423, 3),
(536, 'Stelvio', 'Stelvio', NULL, NULL, 423, 4),
(537, '147', '147', NULL, NULL, 423, 5),
(538, '156', '156', NULL, NULL, 423, 6),
(539, '4C', '4C', NULL, NULL, 423, 7),
(540, 'Spider', 'Spider', NULL, NULL, 423, 8),
(541, 'Other', 'Other', NULL, NULL, 423, 9),
(542, 'ZS', 'ZS', NULL, NULL, 424, 1),
(543, 'RX5', 'RX5', NULL, NULL, 424, 2),
(544, '360', '360', NULL, NULL, 424, 3),
(545, 'MG 6', 'MG 6', NULL, NULL, 424, 4),
(546, 'Other', 'Other', NULL, NULL, 424, 5),
(547, 'C4 Spacetourer', 'C4 Spacetourer', NULL, NULL, 425, 1),
(548, 'C5 Aircross', 'C5 Aircross', NULL, NULL, 425, 2),
(549, 'DS3', 'DS3', NULL, NULL, 425, 3),
(550, 'DS4', 'DS4', NULL, NULL, 425, 4),
(551, 'DS7', 'DS7', NULL, NULL, 425, 5),
(552, 'DS5', 'DS5', NULL, NULL, 425, 6),
(553, 'C Elysee', 'C Elysee', NULL, NULL, 425, 7),
(554, 'C3 Aircross', 'C3 Aircross', NULL, NULL, 425, 8),
(555, 'Other', 'Other', NULL, NULL, 425, 9),
(556, '1007', '1007', NULL, NULL, 426, 1),
(557, '104', '104', NULL, NULL, 426, 2),
(558, '106', '106', NULL, NULL, 426, 3),
(559, '107', '107', NULL, NULL, 426, 4),
(560, '2008', '2008', NULL, NULL, 426, 5),
(561, '204', '204', NULL, NULL, 426, 6),
(562, '205', '205', NULL, NULL, 426, 7),
(563, '206', '206', NULL, NULL, 426, 8),
(564, '207', '207', NULL, NULL, 426, 9),
(565, '208', '208', NULL, NULL, 426, 10),
(566, '3008', '3008', NULL, NULL, 426, 11),
(567, '301', '301', NULL, NULL, 426, 12),
(568, '304', '304', NULL, NULL, 426, 13),
(569, '305', '305', NULL, NULL, 426, 14),
(570, '306', '306', NULL, NULL, 426, 15),
(571, '307', '307', NULL, NULL, 426, 16),
(572, '308', '308', NULL, NULL, 426, 17),
(573, '404', '404', NULL, NULL, 426, 18),
(574, '405', '405', NULL, NULL, 426, 19),
(575, '406', '406', NULL, NULL, 426, 20),
(576, 'Cooper', 'Cooper', NULL, NULL, 427, 1),
(577, 'Clubman', 'Clubman', NULL, NULL, 427, 2),
(578, 'Countryman', 'Countryman', NULL, NULL, 427, 3),
(579, 'S Countryman', 'S Countryman', NULL, NULL, 427, 4),
(580, 'Paceman', 'Paceman', NULL, NULL, 427, 5),
(581, 'Miner', 'Miner', NULL, NULL, 427, 6),
(582, 'Other', 'Other', NULL, NULL, 427, 7),
(583, 'Logan', 'Logan', NULL, NULL, 428, 1),
(584, 'Duster', 'Duster', NULL, NULL, 428, 2),
(585, 'Sandero', 'Sandero', NULL, NULL, 428, 3),
(586, 'Sandero Stepway', 'Sandero Stepway', NULL, NULL, 428, 4),
(587, 'Captur', 'Captur', NULL, NULL, 428, 5),
(588, 'Kadjar', 'Kadjar', NULL, NULL, 428, 6),
(589, 'Laguna', 'Laguna', NULL, NULL, 428, 7),
(590, 'Koleos', 'Koleos', NULL, NULL, 428, 8),
(591, 'Megane', 'Megane', NULL, NULL, 428, 9),
(592, 'Other', 'Other', NULL, NULL, 428, 10),
(593, 'DB9', 'DB9', NULL, NULL, 429, 1),
(594, 'Vantage', 'Vantage', NULL, NULL, 429, 2),
(595, 'Vanquish', 'Vanquish', NULL, NULL, 429, 3),
(596, 'Virage', 'Virage', NULL, NULL, 429, 4),
(597, 'Rapide', 'Rapide', NULL, NULL, 429, 5),
(598, 'Other', 'Other', NULL, NULL, 429, 6),
(599, 'S 40', 'S 40', NULL, NULL, 430, 1),
(600, 'XC 90', 'XC 90', NULL, NULL, 430, 2),
(601, 'C 70', 'C 70', NULL, NULL, 430, 3),
(602, 'XC 60', 'XC 60', NULL, NULL, 430, 4),
(603, 'S 80', 'S 80', NULL, NULL, 430, 5),
(604, '850', '850', NULL, NULL, 430, 6),
(605, 'S 60', 'S 60', NULL, NULL, 430, 7),
(606, 'V 40', 'V 40', NULL, NULL, 430, 8),
(607, 'V 60', 'V 60', NULL, NULL, 430, 9),
(608, 'V 70', 'V 70', NULL, NULL, 430, 10),
(609, 'XC 70', 'XC 70', NULL, NULL, 430, 11),
(610, 'Other', 'Other', NULL, NULL, 430, 12),
(611, 'Gallardo', 'Gallardo', NULL, NULL, 431, 1),
(612, 'Diablo', 'Diablo', NULL, NULL, 431, 2),
(613, 'Marcelago', 'Marcelago', NULL, NULL, 431, 3),
(614, 'Aventador', 'Aventador', NULL, NULL, 431, 4),
(615, 'Huracan', 'Huracan', NULL, NULL, 431, 5),
(616, 'Other', 'Other', NULL, NULL, 431, 6),
(617, 'Golf', 'Golf', NULL, NULL, 432, 1),
(618, 'Multivan', 'Multivan', NULL, NULL, 432, 2),
(619, 'Scirocco', 'Scirocco', NULL, NULL, 432, 3),
(620, 'Tiguan', 'Tiguan', NULL, NULL, 432, 4),
(621, 'Eos', 'Eos', NULL, NULL, 432, 5),
(622, 'Passat', 'Passat', NULL, NULL, 432, 6),
(623, 'Bora', 'Bora', NULL, NULL, 432, 7),
(624, 'Polo', 'Polo', NULL, NULL, 432, 8),
(625, 'Beetle', 'Beetle', NULL, NULL, 432, 9),
(626, 'Jetta', 'Jetta', NULL, NULL, 432, 10),
(627, 'Sharan', 'Sharan', NULL, NULL, 432, 11),
(628, 'Touareg', 'Touareg', NULL, NULL, 432, 12),
(629, 'Phaeton', 'Phaeton', NULL, NULL, 432, 13),
(630, 'Caddy', 'Caddy', NULL, NULL, 432, 14),
(631, 'Amarok', 'Amarok', NULL, NULL, 432, 15),
(632, 'Touran', 'Touran', NULL, NULL, 432, 16),
(633, 'Other', 'Other', NULL, NULL, 432, 17),
(634, 'F 430', 'F 430', NULL, NULL, 434, 1),
(635, 'Modena', 'Modena', NULL, NULL, 434, 2),
(636, 'California', 'California', NULL, NULL, 434, 3),
(637, 'GTB', 'GTB', NULL, NULL, 434, 4),
(638, 'Italia', 'Italia', NULL, NULL, 434, 5),
(639, 'Spider', 'Spider', NULL, NULL, 434, 6),
(640, 'Stallion', 'Stallion', NULL, NULL, 434, 7),
(641, 'Testarossa', 'Testarossa', NULL, NULL, 434, 8),
(642, 'TB 348', 'TB 348', NULL, NULL, 434, 9),
(643, 'Berlinetta', 'Berlinetta', NULL, NULL, 434, 10),
(644, 'Other', 'Other', NULL, NULL, 434, 11),
(645, 'Spyder', 'Spyder', NULL, NULL, 435, 1),
(646, 'Granturismo', 'Granturismo', NULL, NULL, 435, 2),
(647, 'Corsa', 'Corsa', NULL, NULL, 435, 3),
(648, 'Ghibli', 'Ghibli', NULL, NULL, 435, 4),
(649, 'Levante', 'Levante', NULL, NULL, 435, 5),
(650, 'Grancabrio', 'Grancabrio', NULL, NULL, 435, 6),
(651, 'Quattroporte', 'Quattroporte', NULL, NULL, 435, 7),
(652, 'Other', 'Other', NULL, NULL, 435, 8),
(653, 'Toyota', 'Toyota', NULL, NULL, 106, 1),
(654, 'Nissan', 'Nissan', NULL, NULL, 106, 2),
(655, 'Mitsubishi', 'Mitsubishi', NULL, NULL, 106, 3),
(656, 'Mazda', 'Mazda', NULL, NULL, 106, 4),
(657, 'Infiniti', 'Infiniti', NULL, NULL, 106, 5),
(658, 'Lexus', 'Lexus', NULL, NULL, 106, 6),
(659, 'Honda', 'Honda', NULL, NULL, 106, 7),
(660, 'Suzuki', 'Suzuki', NULL, NULL, 106, 8),
(661, 'Subaru', 'Subaru', NULL, NULL, 106, 9),
(662, 'Isuzu', 'Isuzu', NULL, NULL, 106, 10),
(663, 'Acura', 'Acura', NULL, NULL, 106, 11),
(664, 'HINO', 'HINO', NULL, NULL, 106, 12),
(665, 'SCION', 'SCION', NULL, NULL, 106, 13),
(666, 'Japan Cars Wanted', 'Japan Cars Wanted', NULL, NULL, 106, 14),
(667, 'Other', 'Other', NULL, NULL, 106, 15),
(668, 'Land Cruiser', 'Land Cruiser', NULL, NULL, 653, 1),
(669, 'Fj Cruiser', 'Fj Cruiser', NULL, NULL, 653, 2),
(670, 'Prado', 'Prado', NULL, NULL, 653, 3),
(671, 'Hilux', 'Hilux', NULL, NULL, 653, 4),
(672, 'Camry', 'Camry', NULL, NULL, 653, 5),
(673, 'Alphard', 'Alphard', NULL, NULL, 653, 6),
(674, 'Tundra', 'Tundra', NULL, NULL, 653, 7),
(675, 'Aurion', 'Aurion', NULL, NULL, 653, 8),
(676, 'Avallon', 'Avallon', NULL, NULL, 653, 9),
(677, 'Coaster', 'Coaster', NULL, NULL, 653, 10),
(678, 'Corola', 'Corola', NULL, NULL, 653, 11),
(679, 'Fortuner', 'Fortuner', NULL, NULL, 653, 12),
(680, 'FT-86', 'FT-86', NULL, NULL, 653, 13),
(681, 'Half Lorry', 'Half Lorry', NULL, NULL, 653, 14),
(682, 'Hiace', 'Hiace', NULL, NULL, 653, 15),
(683, 'Innova', 'Innova', NULL, NULL, 653, 16),
(684, 'Previa', 'Previa', NULL, NULL, 653, 17),
(685, 'Rav 4', 'Rav 4', NULL, NULL, 653, 18),
(686, 'Sequoia', 'Sequoia', NULL, NULL, 653, 19),
(687, 'Supra', 'Supra', NULL, NULL, 653, 20),
(688, 'Juke', 'Juke', NULL, NULL, 654, 1),
(689, 'juke platinum', 'juke platinum', NULL, NULL, 654, 2),
(690, 'Maxima', 'Maxima', NULL, NULL, 654, 3),
(691, 'Murano', 'Murano', NULL, NULL, 654, 4),
(692, 'Navara', 'Navara', NULL, NULL, 654, 5),
(693, 'Pathfinder', 'Pathfinder', NULL, NULL, 654, 6),
(694, 'GT', 'GT', NULL, NULL, 654, 7),
(695, 'Pick-up', 'Pick-up', NULL, NULL, 654, 8),
(696, 'Sentra', 'Sentra', NULL, NULL, 654, 9),
(697, 'Altima', 'Altima', NULL, NULL, 654, 10),
(698, 'Sunny', 'Sunny', NULL, NULL, 654, 11),
(699, 'Tida', 'Tida', NULL, NULL, 654, 12),
(700, 'X-Trail', 'X-Trail', NULL, NULL, 654, 13),
(701, 'Xterra', 'Xterra', NULL, NULL, 654, 14),
(702, 'Qashqai', 'Qashqai', NULL, NULL, 654, 15),
(703, 'Nissan Z', 'Nissan Z', NULL, NULL, 654, 16),
(704, 'Patrol', 'Patrol', NULL, NULL, 654, 17),
(705, 'Armada', 'Armada', NULL, NULL, 654, 18),
(706, 'Bus', 'Bus', NULL, NULL, 654, 19),
(707, 'Other', 'Other', NULL, NULL, 654, 20),
(708, 'Half Lorry', 'Half Lorry', NULL, NULL, 655, 1),
(709, 'Pajero', 'Pajero', NULL, NULL, 655, 2),
(710, 'Galant', 'Galant', NULL, NULL, 655, 3),
(711, 'Magna', 'Magna', NULL, NULL, 655, 4),
(712, 'Lancer', 'Lancer', NULL, NULL, 655, 5),
(713, 'Nativa', 'Nativa', NULL, NULL, 655, 6),
(714, 'Pick-up', 'Pick-up', NULL, NULL, 655, 7),
(715, 'Outlander', 'Outlander', NULL, NULL, 655, 8),
(716, 'Bus', 'Bus', NULL, NULL, 655, 9),
(717, 'Colt', 'Colt', NULL, NULL, 655, 10),
(718, 'ASX', 'ASX', NULL, NULL, 655, 11),
(719, 'Grandis', 'Grandis', NULL, NULL, 655, 12),
(720, 'Montero Sport', 'Montero Sport', NULL, NULL, 655, 13),
(721, 'Eclipse', 'Eclipse', NULL, NULL, 655, 14),
(722, 'Xpander', 'Xpander', NULL, NULL, 655, 15),
(723, 'Attrage', 'Attrage', NULL, NULL, 655, 16),
(724, 'Other', 'Other', NULL, NULL, 655, 17),
(725, 'Mazda 2', 'Mazda 2', NULL, NULL, 656, 1),
(726, 'Mazda 3', 'Mazda 3', NULL, NULL, 656, 2),
(727, 'Mazda 6', 'Mazda 6', NULL, NULL, 656, 3),
(728, 'BT 50', 'BT 50', NULL, NULL, 656, 4),
(729, 'Bus', 'Bus', NULL, NULL, 656, 5),
(730, 'CX', 'CX', NULL, NULL, 656, 6),
(731, 'Half Lorry', 'Half Lorry', NULL, NULL, 656, 7),
(732, 'Other', 'Other', NULL, NULL, 656, 8),
(733, 'EX', 'EX', NULL, NULL, 657, 1),
(734, 'FX', 'FX', NULL, NULL, 657, 2),
(735, 'Infiniti G', 'Infiniti G', NULL, NULL, 657, 3),
(736, 'JX', 'JX', NULL, NULL, 657, 4),
(737, 'Infiniti M', 'Infiniti M', NULL, NULL, 657, 5),
(738, 'Infiniti Q', 'Infiniti Q', NULL, NULL, 657, 6),
(739, 'QX', 'QX', NULL, NULL, 657, 7),
(740, 'Q30', 'Q30', NULL, NULL, 657, 8),
(741, 'Other', 'Other', NULL, NULL, 657, 9),
(742, 'LS500', 'LS500', NULL, NULL, 658, 1),
(743, 'ES', 'ES', NULL, NULL, 658, 2),
(744, 'GS', 'GS', NULL, NULL, 658, 3),
(745, 'GX', 'GX', NULL, NULL, 658, 4),
(746, 'IS', 'IS', NULL, NULL, 658, 5),
(747, 'LX', 'LX', NULL, NULL, 658, 6),
(748, 'RX', 'RX', NULL, NULL, 658, 7),
(749, 'RC', 'RC', NULL, NULL, 658, 8),
(750, 'LX570', 'LX570', NULL, NULL, 658, 9),
(751, 'SC', 'SC', NULL, NULL, 658, 10),
(752, 'CT', 'CT', NULL, NULL, 658, 11),
(753, 'LS', 'LS', NULL, NULL, 658, 12),
(754, 'Other', 'Other', NULL, NULL, 658, 13),
(755, 'Accord', 'Accord', NULL, NULL, 659, 1),
(756, 'CRV', 'CRV', NULL, NULL, 659, 2),
(757, 'CRX', 'CRX', NULL, NULL, 659, 3),
(758, 'MRV', 'MRV', NULL, NULL, 659, 4),
(759, 'S 2000', 'S 2000', NULL, NULL, 659, 5),
(760, 'Pilot', 'Pilot', NULL, NULL, 659, 6),
(761, 'Jazz', 'Jazz', NULL, NULL, 659, 7),
(762, 'City', 'City', NULL, NULL, 659, 8),
(763, 'Civic', 'Civic', NULL, NULL, 659, 9),
(764, 'Legend', 'Legend', NULL, NULL, 659, 10),
(765, 'Ridgeline', 'Ridgeline', NULL, NULL, 659, 11),
(766, 'Crosstour', 'Crosstour', NULL, NULL, 659, 12),
(767, 'RSX', 'RSX', NULL, NULL, 659, 13),
(768, 'Odyssey', 'Odyssey', NULL, NULL, 659, 14),
(769, 'Other', 'Other', NULL, NULL, 659, 15);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `form_data_id` int(11) NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `add_id` int(11) NOT NULL,
  `main_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`form_data_id`, `form_field_id`, `add_id`, `main_data`) VALUES
(1, 1, 1, '2021'),
(2, 2, 1, 'Used'),
(3, 3, 1, 'Blue'),
(4, 4, 1, '5049'),
(5, 5, 1, '200000'),
(6, 6, 1, 'false'),
(7, 7, 1, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `form_field_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`form_field_id`, `cat_id`, `label`, `type`) VALUES
(1, 300, 'Year of make', 'select'),
(2, 300, 'Status of Car', 'select'),
(3, 300, 'Color', 'select'),
(4, 300, 'Kilometer', 'input'),
(5, 300, 'Price', 'input'),
(6, 300, 'The price is hidden', 'checkbox'),
(7, 300, 'Price is negotiable', 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `form_select_data`
--

CREATE TABLE `form_select_data` (
  `form_select_id` int(11) NOT NULL,
  `form_fields_id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_select_data`
--

INSERT INTO `form_select_data` (`form_select_id`, `form_fields_id`, `value`) VALUES
(1, 1, '2023'),
(2, 1, '2022'),
(3, 1, '2021'),
(4, 1, '2020'),
(5, 1, '2019'),
(6, 1, '2018'),
(7, 1, '2017'),
(8, 1, '2016'),
(9, 1, '2015'),
(10, 1, '2014'),
(11, 1, '2013'),
(12, 1, '2012'),
(13, 1, '2011'),
(14, 1, '2010'),
(15, 1, '2009'),
(16, 1, '2008'),
(17, 1, '2007'),
(18, 1, '2006'),
(19, 1, '2005'),
(20, 1, '2004'),
(21, 1, '2002'),
(22, 1, '2003'),
(23, 1, '2001'),
(24, 1, '2000'),
(25, 2, 'Used'),
(26, 2, 'New'),
(27, 3, 'White'),
(28, 3, 'Red'),
(29, 3, 'Burgundy'),
(30, 3, 'Green'),
(31, 3, 'Blue'),
(32, 3, 'Teal'),
(33, 3, 'Tan'),
(34, 3, 'Black'),
(35, 3, 'Yellow'),
(36, 3, 'Purple'),
(37, 3, 'Brown'),
(38, 3, 'Gold'),
(39, 3, 'Grey'),
(40, 3, 'Silver'),
(41, 3, 'Another Color');

-- --------------------------------------------------------

--
-- Table structure for table `userlists`
--

CREATE TABLE `userlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `user_mob` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlists`
--

INSERT INTO `userlists` (`user_id`, `user_name`, `phonecode`, `user_mob`, `user_password`, `user_code`, `created_at`, `updated_at`) VALUES
(2, 'Ketan Gupta', 91, '8709250721', '12345678', '3654', NULL, NULL),
(3, 'Chandan', 91, '8678861104', '12345678', '1234', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `adminauths`
--
ALTER TABLE `adminauths`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`form_data_id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`form_field_id`);

--
-- Indexes for table `form_select_data`
--
ALTER TABLE `form_select_data`
  ADD PRIMARY KEY (`form_select_id`);

--
-- Indexes for table `userlists`
--
ALTER TABLE `userlists`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `adminauths`
--
ALTER TABLE `adminauths`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=770;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `form_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `form_field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form_select_data`
--
ALTER TABLE `form_select_data`
  MODIFY `form_select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `userlists`
--
ALTER TABLE `userlists`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
