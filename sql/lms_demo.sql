-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 07:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_type` varchar(30) NOT NULL,
  `target_type` varchar(30) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `user_id`, `action_type`, `target_type`, `target_id`, `book_id`, `member_id`, `description`, `created_at`) VALUES
(1, 1, 'add_book', 'book', 1001, 1001, NULL, 'add_book book', '2025-10-09 14:03:31'),
(2, 1, 'update_book', 'book', 1001, 1001, NULL, 'update_book book', '2025-10-09 14:05:37'),
(3, 1, 'add_book', 'book', 1002, 1002, NULL, 'add_book book', '2025-10-09 14:06:43'),
(4, 1, 'deactivated_book', 'book', 1001, 1001, NULL, 'deactivated_book book', '2025-10-09 14:06:48'),
(5, 1, 'add_book', 'book', 1003, 1003, NULL, 'add_book book', '2025-10-09 14:07:34'),
(6, 1, 'update_book', 'book', 1003, 1003, NULL, 'update_book book', '2025-10-09 14:08:23'),
(7, 1, 'add_book', 'book', 1004, 1004, NULL, 'add_book book', '2025-10-09 14:09:39'),
(8, 1, 'add_book', 'book', 1005, 1005, NULL, 'add_book book', '2025-10-09 14:12:01'),
(9, 1, 'add_book', 'book', 1006, 1006, NULL, 'add_book book', '2025-10-09 14:13:08'),
(10, 1, 'add_book', 'book', 1007, 1007, NULL, 'add_book book', '2025-10-09 14:14:13'),
(11, 1, 'update_book', 'book', 1007, 1007, NULL, 'update_book book', '2025-10-09 14:14:24'),
(12, 1, 'add_book', 'book', 1008, 1008, NULL, 'add_book book', '2025-10-09 14:15:28'),
(13, 1, 'update_book', 'book', 1008, 1008, NULL, 'update_book book', '2025-10-09 14:15:55'),
(14, 1, 'add_book', 'book', 1009, 1009, NULL, 'add_book book', '2025-10-09 14:16:45'),
(15, 1, 'update_book', 'book', 1009, 1009, NULL, 'update_book book', '2025-10-09 14:16:57'),
(16, 1, 'add_book', 'book', 1010, 1010, NULL, 'add_book book', '2025-10-09 14:17:32'),
(17, 1, 'update_book', 'book', 1010, 1010, NULL, 'update_book book', '2025-10-09 14:17:41'),
(18, 1, 'add_book', 'book', 1011, 1011, NULL, 'add_book book', '2025-10-09 14:19:30'),
(19, 1, 'add_book', 'book', 1012, 1012, NULL, 'add_book book', '2025-10-09 14:20:13'),
(20, 1, 'add_book', 'book', 1013, 1013, NULL, 'add_book book', '2025-10-09 14:20:55'),
(21, 1, 'add_book', 'book', 1014, 1014, NULL, 'add_book book', '2025-10-09 14:21:55'),
(22, 1, 'add_book', 'book', 1015, 1015, NULL, 'add_book book', '2025-10-09 14:22:51'),
(23, 1, 'update_book', 'book', 1015, 1015, NULL, 'update_book book', '2025-10-09 14:23:27'),
(24, 1, 'add_book', 'book', 1016, 1016, NULL, 'add_book book', '2025-10-09 14:24:55'),
(25, 1, 'update_book', 'book', 1016, 1016, NULL, 'update_book book', '2025-10-09 14:25:03'),
(26, 1, 'add_book', 'book', 1017, 1017, NULL, 'add_book book', '2025-10-09 14:26:09'),
(27, 1, 'add_book', 'book', 1018, 1018, NULL, 'add_book book', '2025-10-09 14:27:02'),
(28, 1, 'add_book', 'book', 1019, 1019, NULL, 'add_book book', '2025-10-09 14:27:50'),
(29, 1, 'add_book', 'book', 1020, 1020, NULL, 'add_book book', '2025-10-09 14:28:44'),
(30, 1, 'add_book', 'book', 1021, 1021, NULL, 'add_book book', '2025-10-09 14:29:55'),
(31, 1, 'add_book', 'book', 1022, 1022, NULL, 'add_book book', '2025-10-09 14:30:30'),
(32, 1, 'add_book', 'book', 1023, 1023, NULL, 'add_book book', '2025-10-09 14:30:59'),
(33, 1, 'add_book', 'book', 1024, 1024, NULL, 'add_book book', '2025-10-09 14:31:31'),
(34, 1, 'add_book', 'book', 1025, 1025, NULL, 'add_book book', '2025-10-09 14:32:53'),
(35, 1, 'add_book', 'book', 1026, 1026, NULL, 'add_book book', '2025-10-09 14:33:39'),
(36, 1, 'add_book', 'book', 1027, 1027, NULL, 'add_book book', '2025-10-09 14:34:35'),
(37, 1, 'add_book', 'book', 12354, 12354, NULL, 'add_book book', '2025-10-09 14:40:45'),
(38, 1, 'add_book', 'book', 1030, 1030, NULL, 'add_book book', '2025-10-09 14:42:20'),
(39, 1, 'update_book', 'book', 1030, 1030, NULL, 'update_book book', '2025-10-09 14:42:33'),
(40, 1, 'add_book', 'book', 1029, 1029, NULL, 'add_book book', '2025-10-09 14:51:22'),
(41, 1, 'add_book', 'book', 1028, 1028, NULL, 'add_book book', '2025-10-09 14:52:38'),
(42, 1, 'add_book', 'book', 1031, 1031, NULL, 'add_book book', '2025-10-09 14:53:41'),
(43, 1, 'add_book', 'book', 1032, 1032, NULL, 'add_book book', '2025-10-09 14:54:43'),
(44, 1, 'add_book', 'book', 1033, 1033, NULL, 'add_book book', '2025-10-09 14:55:45'),
(45, 1, 'add_book', 'book', 1034, 1034, NULL, 'add_book book', '2025-10-09 14:56:42'),
(46, 1, 'add_book', 'book', 1035, 1035, NULL, 'add_book book', '2025-10-09 14:57:32'),
(47, 1, 'add_book', 'book', 1036, 1036, NULL, 'add_book book', '2025-10-09 14:58:51'),
(48, 1, 'add_book', 'book', 1037, 1037, NULL, 'add_book book', '2025-10-09 14:59:30'),
(49, 1, 'add_book', 'book', 1038, 1038, NULL, 'add_book book', '2025-10-09 15:00:12'),
(50, 1, 'add_book', 'book', 1039, 1039, NULL, 'add_book book', '2025-10-09 15:01:05'),
(51, 1, 'add_book', 'book', 1040, 1040, NULL, 'add_book book', '2025-10-09 15:02:14'),
(52, 1, 'add_book', 'book', 1041, 1041, NULL, 'add_book book', '2025-10-09 15:03:05'),
(53, 1, 'add_book', 'book', 1042, 1042, NULL, 'add_book book', '2025-10-09 15:03:40'),
(54, 1, 'add_book', 'book', 1044, 1044, NULL, 'add_book book', '2025-10-09 15:05:15'),
(55, 1, 'add_book', 'book', 1045, 1045, NULL, 'add_book book', '2025-10-09 15:05:58'),
(56, 1, 'add_book', 'book', 1043, 1043, NULL, 'add_book book', '2025-10-09 15:06:57'),
(57, 1, 'add_book', 'book', 1046, 1046, NULL, 'add_book book', '2025-10-09 15:07:54'),
(58, 1, 'add_book', 'book', 1047, 1047, NULL, 'add_book book', '2025-10-09 15:11:45'),
(59, 1, 'add_book', 'book', 1048, 1048, NULL, 'add_book book', '2025-10-09 15:12:50'),
(60, 1, 'add_book', 'book', 1049, 1049, NULL, 'add_book book', '2025-10-09 15:13:30'),
(61, 1, 'add_book', 'book', 1050, 1050, NULL, 'add_book book', '2025-10-09 15:15:46'),
(62, 1, 'add_book', 'book', 1051, 1051, NULL, 'add_book book', '2025-10-09 15:16:16'),
(63, 1, 'add_book', 'book', 1052, 1052, NULL, 'add_book book', '2025-10-09 15:16:48'),
(64, 1, 'add_book', 'book', 1053, 1053, NULL, 'add_book book', '2025-10-09 15:17:17'),
(65, 1, 'add_book', 'book', 1054, 1054, NULL, 'add_book book', '2025-10-09 16:11:13'),
(66, 1, 'add_book', 'book', 1055, 1055, NULL, 'add_book book', '2025-10-09 16:11:47'),
(67, 1, 'add_book', 'book', 1056, 1056, NULL, 'add_book book', '2025-10-09 16:12:46'),
(68, 1, 'add_book', 'book', 1057, 1057, NULL, 'add_book book', '2025-10-09 16:13:31'),
(69, 1, 'add_book', 'book', 1058, 1058, NULL, 'add_book book', '2025-10-09 16:19:54'),
(70, 1, 'update_book', 'book', 1058, 1058, NULL, 'update_book book', '2025-10-09 16:20:08'),
(71, 1, 'deactivated_book', 'book', 1035, 1035, NULL, 'deactivated_book book', '2025-10-09 16:20:29'),
(72, 1, 'add_book', 'book', 1059, 1059, NULL, 'add_book book', '2025-10-09 16:21:29'),
(73, 1, 'add_book', 'book', 1060, 1060, NULL, 'add_book book', '2025-10-09 16:22:15'),
(74, 1, 'add_book', 'book', 1061, 1061, NULL, 'add_book book', '2025-10-09 16:22:44'),
(75, 1, 'add_book', 'book', 1062, 1062, NULL, 'add_book book', '2025-10-09 16:23:20'),
(76, 1, 'add_book', 'book', 1063, 1063, NULL, 'add_book book', '2025-10-09 16:23:57'),
(77, 1, 'issue', 'book', 1, 1010, 9337, 'issue book', '2025-10-09 16:37:28'),
(78, 1, 'issue', 'book', 2, 1056, 9338, 'issue book', '2025-10-09 16:37:37'),
(79, 1, 'issue', 'book', 3, 1041, 9341, 'issue book', '2025-10-09 16:37:46'),
(80, 1, 'issue', 'book', 4, 1038, 9346, 'issue book', '2025-10-09 16:37:53'),
(81, 2, 'return', 'book', 3, 1041, 9341, 'return book', '2025-10-09 16:38:29'),
(82, 2, 'return', 'book', 1, 1010, 9337, 'return book', '2025-10-09 16:38:34'),
(83, 2, 'issue', 'book', 5, 1045, 9337, 'issue book', '2025-10-09 16:38:45'),
(84, 2, 'issue', 'book', 6, 1025, 9365, 'issue book', '2025-10-09 16:38:56'),
(85, 2, 'return', 'book', 4, 1038, 9346, 'return book', '2025-10-09 16:39:10'),
(86, 1, 'issue', 'book', 7, 1024, 9341, 'issue book', '2025-10-09 16:40:33'),
(87, 1, 'issue', 'book', 8, 1022, 9338, 'issue book', '2025-10-09 16:40:50'),
(88, 1, 'issue', 'book', 9, 1057, 9338, 'issue book', '2025-10-09 16:41:01'),
(89, 1, 'deactivated_member', 'member', 9340, NULL, 9340, 'deactivated_member member', '2025-10-09 16:41:08'),
(90, 1, 'activated_member', 'member', 9339, NULL, 9339, 'activated_member member', '2025-10-09 16:41:11'),
(91, 2, 'update_member', 'member', 9340, NULL, 9340, 'update_member member', '2025-10-09 16:41:28'),
(92, 2, 'return', 'book', 5, 1045, 9337, 'return book', '2025-10-09 16:41:38'),
(93, 2, 'deactivated_member', 'member', 9344, NULL, 9344, 'deactivated_member member', '2025-10-09 16:41:44'),
(94, 2, 'issue', 'book', 10, 1010, 9335, 'issue book', '2025-10-09 16:42:05'),
(95, 2, 'issue', 'book', 11, 1063, 9376, 'issue book', '2025-10-09 16:42:15'),
(96, 2, 'issue', 'book', 12, 1063, 9365, 'issue book', '2025-10-09 16:42:22'),
(97, 2, 'issue', 'book', 13, 1063, 9335, 'issue book', '2025-10-09 16:42:58'),
(98, 2, 'issue', 'book', 14, 1063, 9345, 'issue book', '2025-10-09 16:43:07'),
(99, 1, 'return', 'book', 14, 1063, 9345, 'return book', '2025-10-09 16:43:44'),
(100, 1, 'return', 'book', 13, 1063, 9335, 'return book', '2025-10-09 16:44:12'),
(101, 1, 'update_book', 'book', 1026, 1026, NULL, 'update_book book', '2025-10-09 17:03:00'),
(102, 1, 'add_book', 'book', 1064, 1064, NULL, 'add_book book', '2025-10-09 17:07:17'),
(103, 1, 'add_book', 'book', 1065, 1065, NULL, 'add_book book', '2025-10-09 17:42:52'),
(104, 1, 'add_book', 'book', 1065, 1065, NULL, 'add_book book', '2025-10-09 17:43:11'),
(105, 1, 'update_book', 'book', 1065, 1065, NULL, 'update_book book', '2025-10-09 17:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `genre_id` int(11) DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `book_cover` varchar(255) DEFAULT NULL,
  `shelf_number` varchar(10) DEFAULT NULL,
  `row_number` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author`, `publisher`, `year`, `genre_id`, `stock`, `status`, `book_cover`, `shelf_number`, `row_number`, `created_at`) VALUES
(1001, 'Hitler - A Global Biography', 'Brendan Simms', 'Maple & Ink Publishers', '2016', 20, 5, 'Inactive', '1760018727167_532.jpg', NULL, NULL, '2025-10-09 20:03:31'),
(1002, 'Mandela Martin Meredith', 'Martin Meredith', 'Maple & Ink Publishers', '2014', 20, 3, 'Active', '1760018769893_91.jpg', NULL, NULL, '2025-10-09 20:06:43'),
(1003, 'Brilliant Sometime', 'Patrick C Kirkland', 'Nimbus Books', '2017', 20, 4, 'Active', '1760018902372_880.jpg', NULL, NULL, '2025-10-09 20:07:34'),
(1004, 'My Life', 'Cecelia Krull', 'EchoVerse Media', '2017', 20, 4, 'Active', '1760018918030_325.jpg', NULL, NULL, '2025-10-09 20:09:39'),
(1005, 'Steve Jobs', 'Walter Issacson', 'Walter Media', '2014', 20, 3, 'Active', '1760019067636_477.jpg', NULL, NULL, '2025-10-09 20:12:01'),
(1006, 'The Adventure of Lily', 'Adele Williams', 'Saffron Pages', '2018', 21, 5, 'Active', '1760019140056_744.jpg', NULL, NULL, '2025-10-09 20:13:08'),
(1007, 'Dumb ways to die', 'Anwesha Dutta', 'Anchor Press', '2019', 21, 7, 'Active', '1760019262318_661.jpg', NULL, NULL, '2025-10-09 20:14:13'),
(1008, 'There Are Moms Way Worse Than You', 'Glenn Boozan', 'Pricilla Witte', '2021', 21, 5, 'Active', '1760019354187_843.jpg', NULL, NULL, '2025-10-09 20:15:28'),
(1009, 'Out Of The Bowl', 'Marc Twinn', 'Catstudio Publisher', '2022', 21, 4, 'Active', '1760019416703_346.jpg', NULL, NULL, '2025-10-09 20:16:45'),
(1010, 'Shit Went Down', 'James Fell', 'Odwell Publisher', '2022', 21, 5, 'Active', '1760019460503_131.jpg', NULL, NULL, '2025-10-09 20:17:32'),
(1011, 'Introduction to Geometry', 'Lydia McFarland', 'Willford Press', '2022', 23, 4, 'Active', '1760019540077_669.jpg', NULL, NULL, '2025-10-09 20:19:30'),
(1012, 'Quantum Physics in Minutes', 'Donald B. Grey', 'Willford Press', '2023', 23, 7, 'Active', '1760019587605_269.jpg', NULL, NULL, '2025-10-09 20:20:13'),
(1013, 'Linear Algebra', 'Dragu Atanasiu', 'World Scientific', '2023', 23, 10, 'Active', '1760019624040_781.jpg', NULL, NULL, '2025-10-09 20:20:55'),
(1014, 'Organic Chemistry', 'Reddy K', 'World Scientific', '2024', 23, 7, 'Active', '1760019666588_669.png', NULL, NULL, '2025-10-09 20:21:55'),
(1015, 'Concepts and Algorithms of Advance Data Structures', 'Anu Y B', 'ITC Press', '2024', 23, 7, 'Active', '1760019806325_228.jpg', NULL, NULL, '2025-10-09 20:22:51'),
(1016, 'The Witcher', 'Netflix', 'Netflix', '2022', 17, 4, 'Active', '1760019901850_273.jpg', NULL, NULL, '2025-10-09 20:24:55'),
(1017, 'Sins of the Kingdom', 'Michael Grayson', 'Starlit Path Press', '2019', 17, 6, 'Active', '1760019939622_334.jpg', NULL, NULL, '2025-10-09 20:26:09'),
(1018, 'Coraline', 'Neil Gaiman', 'Maple & Ink Publishers', '2023', 17, 7, 'Active', '1760019980738_590.jpg', NULL, NULL, '2025-10-09 20:27:02'),
(1019, 'The Last Sword', 'Seraphina Vale', 'Brass Feather Books', '2023', 17, 4, 'Active', '1760020029688_304.jpg', NULL, NULL, '2025-10-09 20:27:50'),
(1020, 'Vintage Book', 'Olivia Bennett', 'Twilight Scrolls', '2021', 17, 10, 'Active', '1760020076766_526.jpg', NULL, NULL, '2025-10-09 20:28:44'),
(1021, 'Space', 'Olivia Wilson', 'Darken Press', '2024', 14, 10, 'Active', '1760020172087_410.jpg', NULL, NULL, '2025-10-09 20:29:55'),
(1022, 'The Lighthouse ', 'Jonathan D. Burton', 'Darken Media ', '2024', 14, 9, 'Active', '1760020200799_822.jpg', NULL, NULL, '2025-10-09 20:30:30'),
(1023, 'Soul', 'Olivia Wilson', 'Darken Press', '2024', 14, 7, 'Active', '1760020237564_248.jpg', NULL, NULL, '2025-10-09 20:30:59'),
(1024, 'Heir to the Gift', 'Jonathan Sud', 'Prime Enlightment', '2023', 14, 3, 'Active', '1760020271280_266.jpg', NULL, NULL, '2025-10-09 20:31:31'),
(1025, 'The Blind Boxer', 'Jim Lester', 'Maple & Ink Publishers', '2022', 14, 6, 'Active', '1760020299096_815.jpg', NULL, NULL, '2025-10-09 20:32:53'),
(1026, 'The Outer Space', 'Kimbery Hopkins', 'Starlit Path Press', '2024', 23, 7, 'Active', '1760020380675_216.png', NULL, NULL, '2025-10-09 20:33:39'),
(1027, 'The Woman in the Storm', 'J Williamson', 'Subtle Press', '2023', 15, 8, 'Active', '1760020426312_644.jpg', NULL, NULL, '2025-10-09 20:34:35'),
(1028, 'Ancient Egypt', 'J. Thompson', 'Kyrin Press', '2019', 19, 4, 'Active', '1760021547735_193.jpg', NULL, NULL, '2025-10-09 20:52:38'),
(1029, 'Echoes of War', 'Robert J. Scott', 'Robert Press', '2023', 19, 7, 'Active', '1760021453163_853.jpg', NULL, NULL, '2025-10-09 20:51:22'),
(1030, 'The Berlin Wifes Choice', 'Marion Kummerow', 'Golden Lantern', '2021', 21, 5, 'Active', '1760020952896_400.jpg', NULL, NULL, '2025-10-09 20:42:20'),
(1031, 'Vow ', 'Katherine Bentley', 'Twilight Scrolls', '2023', 19, 6, 'Active', '1760021563684_126.jpg', NULL, NULL, '2025-10-09 20:53:41'),
(1032, 'Ancient Rome', 'Stella Caldwell', 'E. Nobati', '2018', 19, 4, 'Active', '1760021674328_869.jpg', NULL, NULL, '2025-10-09 20:54:43'),
(1033, 'The Prophecy', 'Richard W. Walker', 'Omen Pubs', '2024', 15, 5, 'Active', '1760021706705_189.jpg', NULL, NULL, '2025-10-09 20:55:45'),
(1034, 'Roman', 'Olivia Wilson', 'Inkspire Publishing', '2024', 15, 4, 'Active', '1760021771462_44.jpg', NULL, NULL, '2025-10-09 20:56:42'),
(1035, 'The Dark Side of Winter', 'Morgan Maxwell', 'Verdant Quill House', '2021', 15, 5, 'Inactive', '1760021808374_550.jpg', NULL, NULL, '2025-10-09 20:57:32'),
(1036, 'What Happened on Box Hill', 'Elizabeth Gilliland', 'Elena Pubs', '2024', 15, 4, 'Active', '1760021896987_303.jpg', NULL, NULL, '2025-10-09 20:58:51'),
(1037, 'If You Knew', 'George Paulson', 'Mystic Press', '2023', 15, 6, 'Active', '1760021939632_36.jpg', NULL, NULL, '2025-10-09 20:59:30'),
(1038, 'Detective Noir', 'Zee N. David', 'Inkspire Publishing', '2023', 15, 5, 'Active', '1760021978487_952.jpg', NULL, NULL, '2025-10-09 21:00:12'),
(1039, 'Shard', 'O. Krull', 'Brass Feather Books', '2018', 15, 4, 'Active', '1760022018607_38.jpg', NULL, NULL, '2025-10-09 21:01:05'),
(1040, 'The Title ', 'S. Tilen', 'Subtle Press', '2020', 15, 5, 'Active', '1760022093492_222.jpg', NULL, NULL, '2025-10-09 21:02:14'),
(1041, 'The Victims Picture', 'Norman B. Chambers', 'Pricilla Witte', '2024', 15, 5, 'Active', '1760022144283_803.jpg', NULL, NULL, '2025-10-09 21:03:05'),
(1042, 'Survive the Forest', 'Fellix Tullane', 'Mystic Press', '2024', 15, 6, 'Active', '1760022194913_43.jpg', NULL, NULL, '2025-10-09 21:03:40'),
(1043, 'The Color Of Quiet', 'F. Morgan', 'Design Dusk', '2025', 22, 5, 'Active', '1760022371020_645.jpg', NULL, NULL, '2025-10-09 21:06:57'),
(1044, 'As The Tide Rises', 'Priscilla Silopha', '', '2024', 22, 3, 'Active', '1760022283886_940.jpg', NULL, NULL, '2025-10-09 21:05:15'),
(1045, 'An Observer Book of Birds', 'Jona Raymonds', '', '2021', 22, 4, 'Active', '1760022321406_951.jpg', NULL, NULL, '2025-10-09 21:05:58'),
(1046, 'The Quiet Season', 'F. Murphy', 'Design Dusk', '2022', 22, 5, 'Active', '1760022443314_782.jpg', NULL, NULL, '2025-10-09 21:07:54'),
(1047, 'The Sky Within', 'A. Aurora', 'Tagline Press', '2022', 22, 5, 'Active', '1760022660516_544.jpg', NULL, NULL, '2025-10-09 21:11:45'),
(1048, 'Autumn with Love', 'R. William', 'Brosedesign', '2022', 16, 4, 'Active', '1760022719201_240.jpg', NULL, NULL, '2025-10-09 21:12:50'),
(1049, 'Healing With You', 'T. Thomas', '', '2022', 16, 6, 'Active', '1760022775593_478.jpg', NULL, NULL, '2025-10-09 21:13:30'),
(1050, 'Soulmate', 'Benjamin Cole', 'Ivory Press', '2021', 16, 3, 'Active', '1760022818359_857.jpg', NULL, NULL, '2025-10-09 21:15:46'),
(1051, 'My Last Night ', 'Natalie Rivers', 'Redwood Press', '2016', 16, 4, 'Active', '1760022951708_378.jpg', NULL, NULL, '2025-10-09 21:16:16'),
(1052, 'A Part of You', 'Lena Hartman', 'Redwood Press', '2016', 16, 5, 'Active', '1760022981907_175.jpg', NULL, NULL, '2025-10-09 21:16:48'),
(1053, 'Silver Fate', 'Steven Lee', '', '2017', 16, 6, 'Active', '1760023021003_472.jpg', NULL, NULL, '2025-10-09 21:17:17'),
(1054, 'The Ninth Life', 'Taylor B. Barton', '', '2024', 16, 6, 'Active', '1760026224783_178.jpg', NULL, NULL, '2025-10-09 22:11:13'),
(1055, 'Wild Dreamers', 'Margarita Engle', '', '2024', 16, 4, 'Active', '1760026287832_304.jpg', NULL, NULL, '2025-10-09 22:11:47'),
(1056, 'The Summers of Us', 'Taylor Crooks', 'Willow Gate Books', '2022', 16, 4, 'Active', '1760026315480_108.jpg', NULL, NULL, '2025-10-09 22:12:46'),
(1057, 'Questions I Want to Ask You', 'Michelle Falkoff', 'Phoenix Scroll Press', '2021', 16, 5, 'Active', '1760026373423_661.jpg', NULL, NULL, '2025-10-09 22:13:31'),
(1058, 'Vast Lands', 'Jemmalee Frasier', 'Wanderlight Press', '2024', 25, 6, 'Active', '1760026714822_341.jpg', NULL, NULL, '2025-10-09 22:19:54'),
(1059, 'The Ocean of Memories', 'C. Krull', 'Atlas Press', '2025', 25, 6, 'Active', '1760026851942_986.jpg', NULL, NULL, '2025-10-09 22:21:29'),
(1060, 'Travel around the world', 'F. Kilby', 'Romen Press', '2022', 25, 7, 'Active', '1760026898384_254.jpg', NULL, NULL, '2025-10-09 22:22:15'),
(1061, 'Journey to the Sky', 'S. Tilen', '', '2024', 25, 7, 'Active', '1760026941743_472.jpg', NULL, NULL, '2025-10-09 22:22:44'),
(1062, 'Wings of Freedom', 'S. Tilen', 'Maple & Ink Publishers', '2021', 25, 5, 'Active', '1760026979223_331.jpg', NULL, NULL, '2025-10-09 22:23:20'),
(1063, 'Quiet Journey', 'S. Tilen', 'Maple & Ink Publishers', '2025', 25, 6, 'Active', '1760027022135_567.jpg', NULL, NULL, '2025-10-09 22:23:57'),
(1064, 'Passion of Life', 'Joy Jewett', 'Inkspire Publishing', '2025', 14, 6, 'Active', '1760029598549_139.jpg', NULL, NULL, '2025-10-09 23:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(14, 'Fiction'),
(15, 'Mystery'),
(16, 'Romance'),
(17, 'Fantasy'),
(19, 'Historical Fiction'),
(20, 'Biography'),
(21, 'Comedy'),
(22, 'Poetry'),
(23, 'Educational'),
(25, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('Issued','Returned','Overdue') DEFAULT 'Issued',
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `issued_by` varchar(32) DEFAULT NULL,
  `returned_by` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `member_id`, `book_id`, `issue_date`, `return_date`, `status`, `remarks`, `created_at`, `updated_at`, `issued_by`, `returned_by`) VALUES
(1, 9337, 1010, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:37:28', '2025-10-09 16:38:34', 'BookHaven Admin', 'Staff 01'),
(2, 9338, 1056, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:37:37', '2025-10-09 16:37:37', 'BookHaven Admin', NULL),
(3, 9341, 1041, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:37:46', '2025-10-09 16:38:29', 'BookHaven Admin', 'Staff 01'),
(4, 9346, 1038, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:37:53', '2025-10-09 16:39:10', 'BookHaven Admin', 'Staff 01'),
(5, 9337, 1045, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:38:45', '2025-10-09 16:41:38', 'Staff 01', 'Staff 01'),
(6, 9365, 1025, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:38:56', '2025-10-09 16:38:56', 'Staff 01', NULL),
(7, 9341, 1024, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:40:33', '2025-10-09 16:40:33', 'BookHaven Admin', NULL),
(8, 9338, 1022, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:40:50', '2025-10-09 16:40:50', 'BookHaven Admin', NULL),
(9, 9338, 1057, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:41:01', '2025-10-09 16:41:01', 'BookHaven Admin', NULL),
(10, 9335, 1010, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:42:05', '2025-10-09 16:42:05', 'Staff 01', NULL),
(11, 9376, 1063, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:42:15', '2025-10-09 16:42:15', 'Staff 01', NULL),
(12, 9365, 1063, '2025-10-09', '2026-04-09', 'Issued', NULL, '2025-10-09 16:42:22', '2025-10-09 16:42:22', 'Staff 01', NULL),
(13, 9335, 1063, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:42:58', '2025-10-09 16:44:12', 'Staff 01', 'BookHaven Admin'),
(14, 9345, 1063, '2025-10-09', '2025-10-09', 'Returned', NULL, '2025-10-09 16:43:07', '2025-10-09 16:43:44', 'Staff 01', 'BookHaven Admin');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `join_date` date DEFAULT curdate(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `full_name`, `email`, `phone`, `address`, `join_date`, `status`) VALUES
(9335, 'Emily Carter', 'emily.carter@mail.com', '+1-202-555-0143', '45 Maple St, Boston, MA, USA', '2023-06-12', 'Active'),
(9336, 'James Whitmore', 'james.whitmore@outlook.com', '+1-310-555-0198', '88 Sunset Blvd, Los Angeles, CA, USA', '2023-07-05', 'Inactive'),
(9337, 'Olivia Bennett', 'olivia.bennett@gmail.com', '+44-7911-123456', '12 Rose Lane, London, UK', '2023-08-21', 'Active'),
(9338, 'Michael Grayson', 'michael.grayson@live.com', '+1-416-555-0172', '77 King St W, Toronto, ON, Canada', '2023-09-03', 'Active'),
(9339, 'Sophia Caldwell', 'sophia.caldwell@yahoo.com', '+61-412-345-678', '33 Swanston St, Melbourne, VIC, Australia', '2023-09-15', 'Active'),
(9340, 'Daniel Brooks', 'daniel.brooks@protonmail.com', '', '101 Wacker Dr, Chicago, IL, USA', '2023-10-01', 'Inactive'),
(9341, 'Ava Montgomery', 'ava.montgomery@icloud.com', '+1-917-555-0164', '22 Broadway, New York, NY, USA', '2023-10-08', 'Active'),
(9342, 'Ethan Wallace', 'ethan.wallace@gmail.com', '+1-604-555-0133', '55 Granville St, Vancouver, BC, Canada', '2023-10-09', 'Inactive'),
(9343, 'Grace Hamilton', 'grace.hamilton@outlook.com', '+44-7700-900123', '5 Queen St, Edinburgh, UK', '2023-10-09', 'Active'),
(9344, 'Logan Pierce', 'logan.pierce@mail.com', '+1-303-555-0188', '66 Colfax Ave, Denver, CO, USA', '2023-10-09', 'Inactive'),
(9345, 'Natalie Rivers', 'natalie.rivers@gmail.com', '+1-512-555-0147', '19 Barton Springs Rd, Austin, TX, USA', '2023-10-09', 'Active'),
(9346, 'Benjamin Cole', 'ben.cole@live.com', '+1-215-555-0177', '90 Walnut St, Philadelphia, PA, USA', '2023-10-09', 'Active'),
(9347, 'Lena Hartman', 'lena.hartman@outlook.com', '+1-206-555-0123', '73 Pine St, Seattle, WA, USA', '2023-10-09', 'Inactive'),
(9348, 'Darius Monroe', 'darius.monroe@gmail.com', '+1-305-555-0166', '44 Ocean Dr, Miami, FL, USA', '2023-10-09', 'Active'),
(9349, 'Isabella Frost', 'isabella.frost@mail.com', '+1-702-555-0190', '11 Fremont St, Las Vegas, NV, USA', '2023-10-09', 'Active'),
(9365, 'Javier Cruz', 'javier.cruz@mail.com', '+1-718-555-0175', '34 Flatbush Ave, Brooklyn, NY, USA', '2023-10-10', 'Active'),
(9366, 'Mei Lin Zhang', 'mei.zhang@outlook.com', '+1-415-555-0192', '88 Market St, San Francisco, CA, USA', '2023-10-10', 'Inactive'),
(9367, 'Noah Sinclair', 'noah.sinclair@gmail.com', '+1-403-555-0155', '21 4th Ave SW, Calgary, AB, Canada', '2023-10-10', 'Active'),
(9368, 'Chloe Westbrook', 'chloe.westbrook@mail.com', '+44-7400-123456', '9 Baker St, London, UK', '2023-10-10', 'Active'),
(9369, 'Marcus Ellington', 'marcus.ellington@live.com', '+1-214-555-0181', '77 Elm St, Dallas, TX, USA', '2023-10-10', 'Active'),
(9370, 'Natalie Rivers', 'natalie.rivers@icloud.com', '+1-602-555-0144', '55 Camelback Rd, Phoenix, AZ, USA', '2023-10-10', 'Active'),
(9371, 'Benjamin Cole', 'benjamin.cole@protonmail.com', '+1-617-555-0166', '101 Beacon St, Boston, MA, USA', '2023-10-10', 'Active'),
(9372, 'Lena Hartman', 'lena.hartman@gmail.com', '+61-412-987-654', '22 George St, Sydney, NSW, Australia', '2023-10-10', 'Inactive'),
(9373, 'Darius Monroe', 'darius.monroe@outlook.com', '+1-504-555-0199', '66 Bourbon St, New Orleans, LA, USA', '2023-10-10', 'Active'),
(9374, 'Isabella Gemin', 'isabella.gemin@mail.com', '+1-801-555-0177', '33 Temple Sq, Salt Lake City, UT, USA', '2023-10-10', 'Active'),
(9375, 'Aiden Blake', 'aiden.blake@gmail.com', '+1-919-555-0188', '12 Franklin St, Raleigh, NC, USA', '2023-10-10', 'Active'),
(9376, 'Harper Quinn', 'harper.quinn@outlook.com', '+64-21-456-789', '7 Queen St, Auckland, NZ', '2023-10-10', 'Active'),
(9377, 'Liam Prescott', 'liam.prescott@mail.com', '+1-720-555-0123', '44 Larimer St, Denver, CO, USA', '2023-10-10', 'Active'),
(9378, 'Amelia Vaughn', 'amelia.vaughn@icloud.com', '+1-312-555-0159', '19 Michigan Ave, Chicago, IL, USA', '2023-10-10', 'Inactive'),
(9379, 'Elliot Hayes', 'elliot.hayes@live.com', '+1-503-555-0142', '88 Hawthorne Blvd, Portland, OR, USA', '2023-10-10', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff','kiosk') DEFAULT 'kiosk',
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `created_at`, `last_login`, `status`) VALUES
(1, 'BookHaven Admin', 'admin@bookhaven.com', '$2y$10$83e2iCnK892fNC3Jky21Z.jxL.7mdzTQs15GmjbaYc6D6b8QPAu7m', 'admin', '01234567890', '2025-10-09 13:03:46', '2025-10-09 23:49:37', 'Active'),
(2, 'Staff 01', 'staff01@bookhaven.com', '$2y$10$xjVOE1gbxfXAG2G/MkieO.WqYuQmnjpdsXeng7SnHjcDab9EMLfR.', 'staff', '01111111111', '2025-10-09 16:35:00', '2025-10-09 23:49:46', 'Active'),
(3, 'Staff 02', 'staff02@bookhaven.com', '$2y$10$XlgXldIkjxbmoW4ry2kROuDoUNP.FOd.BA2xMlIenR9JXRnGAvp9e', 'staff', '02222222222', '2025-10-09 16:35:29', NULL, 'Inactive'),
(4, 'Kiosk Front Desk', 'kiosk1@bookhaven.com', '$2y$10$LwNj0CrM5Fm3GOgOWytFReXeGVosW2Fhdh4JN8lu0QNFjR4kVF6q2', 'kiosk', '1111', '2025-10-09 16:35:55', '2025-10-09 23:49:55', 'Active'),
(5, 'Visitor PC 01', 'visitor01@bookhaven.com', '$2y$10$ivnXhFvc0wbXXNlRFaepwuG3sCtsZLaAZ64Pn9vdmIzxbNNvu41IO', 'kiosk', '1111', '2025-10-09 16:36:43', NULL, 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_genre` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12355;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9380;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issues_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
