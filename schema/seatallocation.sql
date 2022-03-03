-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 09:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seatallocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `e_room_id` int(11) UNSIGNED NOT NULL,
  `supervisor_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `e_name`, `e_date`, `start_time`, `end_time`, `e_room_id`, `supervisor_id`) VALUES
(1, 'Project 1 Presentation', '2022-01-27', '08:00:00', '11:00:00', 1, '1,2'),
(2, 'Project II Presentation', '2022-02-15', '08:00:00', '11:00:00', 3, '2,3');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `migration` varchar(100) NOT NULL,
  `migrated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `migrated_at`) VALUES
(1, '2021_10_28_004229_create_users_table', '2022-01-18 20:17:02'),
(2, '2021_10_28_005147_create_password_resets_table', '2022-01-18 20:17:03'),
(3, '2022_01_16_184357_create_rooms_table', '2022-01-18 20:17:03'),
(4, '2022_01_16_184414_create_seats_table', '2022-01-18 20:17:03'),
(5, '2022_01_16_184439_create_supervisors_table', '2022-01-18 20:17:04'),
(6, '2022_01_16_184528_create_sitting_arrangements_table', '2022-01-18 20:17:04'),
(7, '2022_01_16_184549_create_exams_table', '2022-01-18 20:17:04'),
(8, '2022_01_16_184424_create_students_table', '2022-01-18 20:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(35) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `capacity` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `capacity`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'LLT 1A', 40, '2022-01-19 15:51:19', NULL, NULL),
(2, 'LLT 1B', 50, '2022-02-02 23:23:42', NULL, NULL),
(3, 'BIG LAB 1', 150, '2022-02-02 23:23:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) UNSIGNED NOT NULL,
  `occupied` int(5) NOT NULL DEFAULT 0,
  `available` int(5) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `room_id`, `occupied`, `available`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 1, 0, 40, '2022-01-19 19:29:11', NULL, NULL),
(2, 3, 0, 150, '2022-02-02 23:24:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitting_arrangements`
--

CREATE TABLE `sitting_arrangements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) UNSIGNED NOT NULL,
  `seat_id` int(11) UNSIGNED NOT NULL,
  `s_no` varchar(15) NOT NULL,
  `exam_id` int(11) UNSIGNED NOT NULL,
  `dated` date NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitting_arrangements`
--

INSERT INTO `sitting_arrangements` (`id`, `room_id`, `seat_id`, `s_no`, `exam_id`, `dated`, `deleted_at`) VALUES
(1, 3, 202201270, '1800722776', 1, '2022-01-27', NULL),
(2, 3, 202201271, '1800722840', 1, '2022-01-27', NULL),
(3, 3, 202201272, '1800722845', 1, '2022-01-27', NULL),
(4, 3, 202201273, '1800713733', 1, '2022-01-27', NULL),
(5, 3, 202201274, '180070335', 1, '2022-01-27', NULL),
(6, 3, 202201275, '1800742633', 1, '2022-01-27', NULL),
(7, 3, 202201276, '1800724185', 1, '2022-01-27', NULL),
(8, 3, 202201277, '18007041741', 1, '2022-01-27', NULL),
(9, 3, 202201278, '18/U/327', 1, '2022-01-27', NULL),
(10, 3, 202201279, '1800722836', 1, '2022-01-27', NULL),
(11, 3, 2022012710, '1800722657', 1, '2022-01-27', NULL),
(12, 3, 2022012711, '180070328', 1, '2022-01-27', NULL),
(13, 3, 2022012712, '1800741739', 1, '2022-01-27', NULL),
(14, 3, 2022012713, '1800741742', 1, '2022-01-27', NULL),
(15, 3, 2022012714, '1800720883', 1, '2022-01-27', NULL),
(16, 3, 2022012715, '1800722816', 1, '2022-01-27', NULL),
(17, 3, 2022012716, '1800722871', 1, '2022-01-27', NULL),
(18, 3, 2022012717, '1800713731', 1, '2022-01-27', NULL),
(19, 3, 2022012718, '18007041588', 1, '2022-01-27', NULL),
(20, 3, 2022012719, '1800722835', 1, '2022-01-27', NULL),
(21, 3, 2022012720, '1800722791', 1, '2022-01-27', NULL),
(22, 3, 2022012721, '1800722872', 1, '2022-01-27', NULL),
(23, 3, 2022012722, '18007137367', 1, '2022-01-27', NULL),
(24, 3, 2022012723, '1800722842', 1, '2022-01-27', NULL),
(25, 3, 2022012724, '1800722853', 1, '2022-01-27', NULL),
(26, 3, 2022012725, '18007041734', 1, '2022-01-27', NULL),
(27, 3, 2022012726, '1800721004', 1, '2022-01-27', NULL),
(28, 3, 2022012727, '1800722875', 1, '2022-01-27', NULL),
(29, 3, 2022012728, '1800722786', 1, '2022-01-27', NULL),
(30, 3, 2022012729, '1800741725', 1, '2022-01-27', NULL),
(31, 3, 2022012730, '1800723468', 1, '2022-01-27', NULL),
(32, 3, 2022012731, '1800713732', 1, '2022-01-27', NULL),
(33, 3, 2022012732, '1800722827', 1, '2022-01-27', NULL),
(34, 3, 2022012733, '1800722817', 1, '2022-01-27', NULL),
(35, 3, 2022012734, '1800720890', 1, '2022-01-27', NULL),
(36, 3, 2022012735, '1800722805', 1, '2022-01-27', NULL),
(37, 3, 2022012736, '1800722777', 1, '2022-01-27', NULL),
(38, 3, 2022012737, '18007042096', 1, '2022-01-27', NULL),
(39, 3, 2022012738, '1800713752', 1, '2022-01-27', NULL),
(40, 3, 2022012739, '1800710386', 1, '2022-01-27', NULL),
(41, 3, 2022012740, '1800722848', 1, '2022-01-27', NULL),
(42, 3, 2022012741, '1800720894', 1, '2022-01-27', NULL),
(43, 3, 2022012742, '1800722865', 1, '2022-01-27', NULL),
(44, 3, 2022012743, '1800713765', 1, '2022-01-27', NULL),
(45, 3, 2022012744, '18/U/41773', 1, '2022-01-27', NULL),
(46, 3, 2022012745, '180070331', 1, '2022-01-27', NULL),
(47, 3, 2022012746, '1800721015', 1, '2022-01-27', NULL),
(48, 3, 2022012747, '1800722860', 1, '2022-01-27', NULL),
(49, 3, 2022012748, '180073746', 1, '2022-01-27', NULL),
(50, 3, 2022012749, '1800726077', 1, '2022-01-27', NULL),
(51, 3, 2022012750, '1800722767', 1, '2022-01-27', NULL),
(52, 3, 2022012751, '180070321', 1, '2022-01-27', NULL),
(53, 3, 2022012752, '180070326', 1, '2022-01-27', NULL),
(54, 3, 2022012753, '180070334', 1, '2022-01-27', NULL),
(55, 3, 2022012754, '1800741079', 1, '2022-01-27', NULL),
(56, 3, 2022012755, '1800722961', 1, '2022-01-27', NULL),
(57, 3, 2022012756, '18007041789', 1, '2022-01-27', NULL),
(58, 3, 2022012757, '1800722858', 1, '2022-01-27', NULL),
(59, 3, 2022012758, '1800720948', 1, '2022-01-27', NULL),
(60, 3, 2022012759, '1800721058', 1, '2022-01-27', NULL),
(61, 3, 2022012760, '1800722792', 1, '2022-01-27', NULL),
(62, 3, 2022012761, '1800721014', 1, '2022-01-27', NULL),
(63, 3, 2022012762, '1800721007', 1, '2022-01-27', NULL),
(64, 3, 2022012763, '1800722864', 1, '2022-01-27', NULL),
(65, 3, 2022012764, '1800703736', 1, '2022-01-27', NULL),
(66, 3, 2022012765, '1800722788', 1, '2022-01-27', NULL),
(67, 3, 2022012766, '18/U/337', 1, '2022-01-27', NULL),
(68, 3, 2022012767, '1800713750', 1, '2022-01-27', NULL),
(69, 3, 2022012768, '1800722826', 1, '2022-01-27', NULL),
(70, 3, 2022012769, '1800722797', 1, '2022-01-27', NULL),
(71, 3, 2022012770, '1500720792', 1, '2022-01-27', NULL),
(72, 3, 2022012771, '18/U/4159', 1, '2022-01-27', NULL),
(73, 3, 2022012772, '1800700332', 1, '2022-01-27', NULL),
(74, 3, 2022012773, '1870022837', 1, '2022-01-27', NULL),
(75, 3, 2022012774, '1800722866', 1, '2022-01-27', NULL),
(76, 3, 2022012775, '1800741736', 1, '2022-01-27', NULL),
(77, 3, 2022012776, '180070329', 1, '2022-01-27', NULL),
(78, 3, 2022012777, '18007041644', 1, '2022-01-27', NULL),
(79, 3, 2022012778, '1800722808', 1, '2022-01-27', NULL),
(80, 3, 2022012779, '1800709973', 1, '2022-01-27', NULL),
(81, 3, 2022012780, '1800722820', 1, '2022-01-27', NULL),
(82, 3, 2022012781, '1800722834', 1, '2022-01-27', NULL),
(83, 3, 2022012782, '1800721055', 1, '2022-01-27', NULL),
(84, 3, 2022012783, '1800720965', 1, '2022-01-27', NULL),
(85, 3, 2022012784, '180070336', 1, '2022-01-27', NULL),
(86, 3, 2022012785, '1800713767', 1, '2022-01-27', NULL),
(87, 3, 2022012786, '1800722822', 1, '2022-01-27', NULL),
(88, 3, 2022012787, '1800713717', 1, '2022-01-27', NULL),
(89, 3, 2022012788, '1800721010', 1, '2022-01-27', NULL),
(90, 3, 2022012789, '1800741666', 1, '2022-01-27', NULL),
(91, 3, 2022012790, '1800720982', 1, '2022-01-27', NULL),
(92, 3, 2022012791, '18007013723', 1, '2022-01-27', NULL),
(93, 3, 2022012792, '1800741139', 1, '2022-01-27', NULL),
(94, 3, 2022012793, '1800727114', 1, '2022-01-27', NULL),
(95, 3, 2022012794, '1800720947', 1, '2022-01-27', NULL),
(96, 3, 2022012795, '18/U/1037', 1, '2022-01-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `st_no` varchar(15) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `course` varchar(5) NOT NULL DEFAULT 'BIST',
  `phone_number` varchar(14) NOT NULL DEFAULT '256760422367',
  `email` varchar(65) NOT NULL DEFAULT 'brianmugumem@gmail.com',
  `secret` varchar(255) NOT NULL DEFAULT '41a3b5c54cdba604eee5c1882e07878ff272a359',
  `joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `st_no`, `reg_no`, `course`, `phone_number`, `email`, `secret`, `joined`, `deleted_at`) VALUES
(2, 'ABDULIHADHI WALUSIMBI', '18007041644', '18/U/41644', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(3, 'ABWANGO ANDREW TIMOTHY ', '1800713750', '18/U/13750/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(4, 'ACHEN JANET FLORENCE               ', '1800726077', '18/U/26077/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(5, 'ADOCOR EMMANUEL                  ', '1800722826', '18/U/22826/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(6, 'AGABA RAYMOND                        ', '1800722657', '18/U/22657/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(7, 'AHABWE NARATH                       ', '1800720982', '18/U/20982/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(8, 'AHIMBISIBWE LUCKY          ', '1800722822', '18/U/22822/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(9, 'ALAROKER FLORENCE         ', '180070326', '18/U/326', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(10, 'AMONO BRENDA BENNA              ', '1800700332', '18/U/332', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(11, 'ATIMU ANGELLA                            ', '1800722792', '18/U/22792/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(12, 'ATIONO SERAH                            ', '1800741725', '18/U/41725', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(13, 'AUPAL EMMANUEL                       ', '1800722786', '18/U/22786/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(14, 'AWALLI JESCA OLIVIA               ', '180070335', '18/U/335', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(15, 'BASEMERA INNOCENT                    ', '18007041734', '18/U/41734', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(16, 'BATENGA MARIA GORRET         ', '1800722791', '18/U/22791/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(17, 'BULYA JACKIE KAKONGE                 ', '1800722788', '18/U/22788/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(18, 'BYAMUGISHA MILTON            ', '180070334', '18/U/334', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(19, 'BYARUHANGA KENNETH           ', '18007042096', '18/U/42096', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(20, 'BYERETA TIMOTHY                   ', '18007041588', ' 18/U/41588', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(21, 'CHELIMO JOAN SOMIKWO    ', '18007041789', '18/U/41789', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(22, 'CHEPTEGEI SAM                             ', '180070328', '18/U/328', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(23, 'EJADU SIMON                            ', '18007041741', '18/U/41741', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(24, 'EKUBU ISAAC ', '18007013723', '18/U/13723/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(25, 'KAAYA BRIAN                               ', '1800721058', '18/U/21058/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(26, 'KAFEERO YUSUF                               ', '180070329', '18/U/329', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(27, 'KAGAME STEVEN                           ', '1800721055', '18/U/21055', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(28, 'KAKEMBO HENRY                           ', '1800722875', '18/U/22875/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(29, 'KALIBBALA PAUL M                       ', '1800741139', '18/U/41139/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(31, 'KALUME MARY ALEGAN              ', '18/U/41773', '18/U/41773', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(32, 'KAMUKAMA SOLOMON        ', '1800722817', '18/U/22817/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(33, 'KEBIRUNGI HELLEN                        ', '1800741736', '18/U/41736', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(34, 'KINENE SHARIF                                ', '1800722836', '18/U/22836/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(35, 'KISITU JAMES                                  ', '180070321', '18/U/321', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(36, 'KITEKO MERCY FAITH                      ', '1800720894', '18/U/20894', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(37, 'KITIMBO HILLARY                        ', '1800722827', '18/U/22827/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(38, 'KUGONZA STEPHEN               ', '1800741739', '18/U/41739', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(39, 'KYEWALYANGA FRANCO                ', '1800722797', '18/U/22797/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(40, 'KYOBE RONALD                       ', '1800713765', '18/U/13765', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(41, 'LUCKY PAUL                                  ', '1800722776', '18/U/22776/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(42, 'LUTALO ISHAK                                 ', '1800713733', '18/U/13733/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(43, 'MAKABULI KENNETH                    ', '1800721007', '18/U/21007/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(44, 'MATALIKA KEITH                    ', '1870022837', '18/U/22837/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(45, 'MAYANJA DRUCILLA NAKANWAGI ', '1800722871', '18/U/22871/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(46, 'MEKYALA LINDA                           ', '1800724185', ' 18/U/24185/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(47, 'MIGISHA VIENA MELLAN              ', '1800703736', ' 18/U/3736', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(48, 'MARK NSENGE                                 ', '1800722853', ' 18/U/22853/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(49, 'MUBANDA DENIS                          ', '1800722820', '18/U/22820/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(50, 'MUHANGI MARK                       ', '1800713717', '18/U/13717/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(51, 'MUHINDO TUGUME ROLAND      ', '1800722860', '18/U/22860/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(52, 'MUJUNI DENIS JOSEPH           ', '1800709973', ' 18/U/9973', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(53, 'MUJUNI EDMOND                     ', '1800722834', ' 18/U/22834/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(54, 'MUKARUKAKA NATASHA        ', '180070336', '18/U/336', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(55, 'MUNDERE KIRENGA FIACRE            ', '1800722842', '18/U/22842/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(56, 'MUTEBI RASHID                         ', '1800720947', '18/U/20947/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(57, 'MUTUMBA SPENCER                   ', '1800721010', '18/U/21010/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(58, 'MUWONGE JONATHAN                ', '1800722858', '18/U/22858/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(59, 'MWESIGWA ERIC                         ', '1800713732', '18/U/13732/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(60, 'MWESUGYE MOSES                   ', '1800721014', '18/U/21014/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(61, 'MWOGEREZA DELICK             ', '1800713767', ' 18/U/13767/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(62, 'NABUTIKO SARAH                        ', '1800722866', '18/U/22866/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(63, 'NAKINTU REBECCA                ', '1800722872', ' 18/U/22872/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(64, 'NAMATOVU REBECCA SHEEBA      ', '1800722961', '18/U/22961/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(65, 'NAMBAZIRA SHAKIRA             ', '1800722805', ' 18/U/22805/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(66, 'NAMUGEMA BRIDGET            ', '18/U/327', '18/U/327', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(67, 'NANNONO JULIET                           ', '18007137367', '18/U/13736/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(68, 'NANSAMBA OLIVIA ', '1800722840', '18/U/22840/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(69, 'NASSANGA SHADIAH                     ', '1800722777', '18/U/22777/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(70, 'NINSIMA ONECIOUS                     ', '1800713731', '18/U/13731/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(71, 'NSABIMANA LEONARD                ', '1800720883', '18/U/20883/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(72, 'NUWAMANYA GODWINE        ', '18/U/337', '18/U/337', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(73, 'NYESIGA HENRY                          ', '18/U/4159', '18/U/4159', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(74, 'OBBA JONATHAN                         ', '18/U/1037', '18/U/1037', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(75, 'OBURU JACKSON EMMANUEL    ', '1800722767', '18/U/22767/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(76, 'OJOK DAVID ODONGA ', '1800742633', '18/U/42633/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(77, 'OJULA HAMIS                                 ', '1800722848', '18/U/22848/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(78, 'OKALANGA JOSEPH                 ', '180070331', '18/U/331', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(79, 'OLUPOT RAYMOND ADELO ', '1800713752', '18/U/13752/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(80, 'OTIENO BRIGHTON                        ', '1800741079', '18/U/41079/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(81, 'OTIM JOSEPH                           ', '1800741742', '18/U/41742', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(82, 'PAUL OMIRIA EPEJU                        ', '1500720792', '15/U/20792/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(83, 'SENYONDO BRIAN NTANDA     ', '1800722845', '18/U/22845/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(84, 'SSEKABEMBE ARAFAT                    ', '1800727114', '18/U/27114', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(85, 'SSEMBEJJWE MARVIN ARTHUR', '1800720965', '18/U/20965/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(86, 'SSERUBIRI FAIZAH                       ', '1800721004', '18/U/21004/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(87, 'TALEMWA AGNES                            ', '180073746', '18/U/3746', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(88, 'TAYEBWA JONH                             ', '1800710386', ' 18/U/10386/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(89, 'TEBANDEKE ASHRAF MUSANJE    ', '1800720890', '18/U/20890/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(90, 'TUMUHIMBISE GODWIN           ', '1800722816', '18/U/22816/PS', 'BIST', '256741033402', 'godwintumuhimbise96@gmail.com', 'c27d63e3e38094460a8e36662d6211f5f97ea93c', '2022-02-03 19:52:58', NULL),
(91, 'BRIAN MUGUME', '1800722864', '18/U/22864/PS', 'BIST', '256753144225', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-04 11:43:09', NULL),
(92, 'WUWAYEZU CLAUDE                         ', '1800721015', '18/U/21015', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(93, 'WAISWA ANTHONY                       ', '1800722865', '18/U/22865/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(94, 'WAISWA TREVOR MARK        ', '1800722808', '18/U/22808/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(95, 'WASWA ISAAC                                ', '1800722835', ' 18/U/22835/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(96, 'WASWA JOTHAM                          ', '1800720948', '18/U/20948', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(97, 'WOLIJJA PROSSY', '1800741666', '18/U/41666/PS', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL),
(98, 'Mbusa Joseph', '1800723468', '18/U/23468/EVE', 'BIST', '256760422367', 'brianmugumem@gmail.com', '2381c66086fbd785292e0f474aa2cd364fc29def', '2022-02-03 16:56:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_name` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `sup_name`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'Mr. Muchake Brian', '2022-03-03 23:13:19', NULL, NULL),
(2, 'Mr. Bitwire Albert George', '2022-03-03 23:14:18', NULL, NULL),
(3, 'Dr. Mercy Amio', '2022-03-03 23:15:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `account_type` varchar(100) NOT NULL DEFAULT 'user',
  `password` varchar(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `account_type`, `password`, `img_url`, `created_at`, `update_at`) VALUES
(1, 'BRIAN', 'MUGUME', 'brianmugumem@gmail.com', '256760422367', 'Admin', '7e758c62ae95fe6e2691ae64a340bb9eb505a82e', NULL, '2022-02-03 16:40:47', NULL),
(5, 'Muchake', 'Brian', 'muchake.brian@cis.mak.ac.ug', '256378965428', 'user', 'dcb874f6c60289f540ab89817c7cbbc33ea2edfc', NULL, '2022-03-03 23:13:19', NULL),
(6, 'Bitwire', 'Albert George', 'bitwire.albert.george@cis.mak.ac.ug', '256789645213', 'user', '2bde39c3e3e2eed3b006d72a9db21dd6f1eb5647', NULL, '2022-03-03 23:14:18', NULL),
(7, 'Mercy', 'Amio', 'mercy.amio@cis.mak.ac.ug', '256795236480', 'user', '4a060e4ec1770a782749e5ef0e4b19b3993d8bbd', NULL, '2022-03-03 23:15:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitting_arrangements`
--
ALTER TABLE `sitting_arrangements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `st_no` (`st_no`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitting_arrangements`
--
ALTER TABLE `sitting_arrangements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
