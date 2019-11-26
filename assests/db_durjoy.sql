-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 08:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_durjoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `unit` varchar(5000) NOT NULL,
  `is_science` varchar(5000) NOT NULL,
  `is_arts` varchar(5000) NOT NULL,
  `is_commerce` varchar(5000) NOT NULL,
  `application_start` varchar(5000) NOT NULL,
  `application_end` varchar(5000) NOT NULL,
  `exam_start` varchar(5000) NOT NULL,
  `exam_end` varchar(5000) NOT NULL,
  `science_ssc_gpa` double NOT NULL,
  `science_hsc_gpa` double NOT NULL,
  `arts_ssc_gpa` double NOT NULL,
  `arts_hsc_gpa` double NOT NULL,
  `commerce_ssc_gpa` double NOT NULL,
  `commerce_hsc_gpa` double NOT NULL,
  `ssc_min_year` int(11) NOT NULL,
  `hsc_min_year` int(11) NOT NULL,
  `circular` varchar(5000) NOT NULL,
  `visiblity` varchar(50) NOT NULL DEFAULT 'false',
  `published_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id`, `name`, `unit`, `is_science`, `is_arts`, `is_commerce`, `application_start`, `application_end`, `exam_start`, `exam_end`, `science_ssc_gpa`, `science_hsc_gpa`, `arts_ssc_gpa`, `arts_hsc_gpa`, `commerce_ssc_gpa`, `commerce_hsc_gpa`, `ssc_min_year`, `hsc_min_year`, `circular`, `visiblity`, `published_time`) VALUES
(3, 'University of Dhaka', 'A', 'true', 'false', 'true', '2018-11-19', '2018-11-25', '2018-11-28', '2018-11-28', 5, 5, -1, -1, 5, 5, 1, 1, 'assests/pdf/2017_CertificateContestantPlace_Asia_Dhaka_2017_404692.pdf', 'true', '2018-11-28 07:23:31'),
(5, 'Shahjalal University of Science and Technology', 'A', 'false', 'true', 'true', '2018-12-14', '2018-12-20', '2018-12-31', '2018-12-31', -1, -1, 2.5, 2.5, 2.5, -1, 2016, 2018, 'assests/pdf/Add2018_v3.pdf', 'true', '2018-11-28 13:43:28'),
(6, 'Shahjalal University of Science and Technology', 'B', 'true', 'false', 'false', '2018-11-30', '2018-12-15', '2018-12-23', '2018-12-23', 3, 5, -1, -1, -1, -1, 2016, 2018, 'assests/pdf/Add2018_v3_1.pdf', 'true', '2018-11-28 13:43:28'),
(7, 'Bangladesh University of Engineering & Technology', 'All', 'true', 'false', 'true', '2018-11-19', '2018-11-25', '2018-11-28', '2018-11-28', 5, 5, -1, -1, -1, -1, 2016, 2018, 'assests/pdf/Notice_181018.pdf', 'true', '2018-12-01 10:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement_seen`
--

CREATE TABLE `tbl_announcement_seen` (
  `id` int(11) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `announcement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_announcement_seen`
--

INSERT INTO `tbl_announcement_seen` (`id`, `username`, `announcement_id`) VALUES
(1, 'admin', 0),
(2, 'emrul', 0),
(3, 'admin', 1),
(4, 'admin', 2),
(5, 'admin', 3),
(6, 'admin', 4),
(7, 'emrul', 3),
(8, 'emrul', 4),
(9, 'admin', 5),
(10, 'emrul', 5),
(11, 'admin', 6),
(12, 'emrul', 6),
(13, 'admin', 7),
(14, 'emrul', 7),
(15, 'admin', 8),
(16, 'emrul', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boards`
--

CREATE TABLE `tbl_boards` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_boards`
--

INSERT INTO `tbl_boards` (`id`, `name`) VALUES
(1, 'Barishal'),
(2, 'Chittagong'),
(3, 'Comilla'),
(4, 'Dhaka'),
(6, 'Jessore'),
(7, 'Rajshahi'),
(9, 'Madrasah'),
(10, 'Technical'),
(11, 'DIBS(Dhaka)'),
(13, 'Dinajpur'),
(17, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisions`
--

CREATE TABLE `tbl_divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisions`
--

INSERT INTO `tbl_divisions` (`id`, `name`) VALUES
(1, 'Barisal division'),
(2, 'Chittagong division'),
(3, 'Dhaka division'),
(4, 'Khulna division'),
(5, 'Mymensingh division'),
(6, 'Rajshahi division'),
(7, 'Rangpur division'),
(8, 'Sylhet division');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favourite`
--

CREATE TABLE `tbl_favourite` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `announcement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favourite`
--

INSERT INTO `tbl_favourite` (`id`, `username`, `announcement_id`) VALUES
(0, 'emrul', 4),
(0, 'emrul', 7),
(0, 'emrul', 5),
(0, 'emrul', 6),
(0, 'emrul', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`) VALUES
(1, 'Science'),
(3, 'Commerce'),
(4, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `activity` varchar(5000) NOT NULL,
  `servertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `activity`, `servertime`) VALUES
(1, 'admin updated his profile', '2018-11-30 18:15:16'),
(2, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-11-30 18:24:26'),
(3, ' changed role of:  to admin', '2018-11-30 18:32:01'),
(4, 'admin logged in', '2018-11-30 18:32:33'),
(10, 'admin changed role of: szxsbziy to admin', '2018-11-30 18:42:40'),
(11, 'admin changed role of: szxsbziy to user', '2018-11-30 18:42:59'),
(12, 'admin changed role of: bccfqmwh to user', '2018-11-30 18:43:03'),
(13, 'admin changed role of: txdzujtl to user', '2018-11-30 18:43:07'),
(14, 'admin changed role of: rzblm to user', '2018-11-30 18:43:10'),
(15, 'admin logged in', '2018-11-30 18:48:54'),
(16, 'admin logged in', '2018-11-30 18:49:45'),
(17, 'admin logged in', '2018-11-30 18:49:49'),
(18, 'admin logged in', '2018-11-30 18:49:54'),
(19, 'admin logged out', '2018-11-30 18:51:32'),
(20, 'admin logged in', '2018-11-30 18:51:52'),
(21, 'admin logged out', '2018-11-30 18:51:54'),
(22, 'admin logged in', '2018-11-30 18:52:19'),
(23, 'admin updated ssc_min year: 1996', '2018-11-30 18:52:36'),
(24, 'admin logged out', '2018-11-30 18:52:48'),
(25, 'emrul logged in', '2018-11-30 18:52:51'),
(26, 'emrul removed an anouncement:5 from favourite', '2018-11-30 18:53:01'),
(27, 'emrul updated his profile', '2018-11-30 18:53:11'),
(28, 'emrul logged out', '2018-11-30 18:53:22'),
(29, 'emrul logged in', '2018-11-30 18:53:31'),
(30, 'emrul logged out', '2018-11-30 18:53:36'),
(31, 'admin logged in', '2018-11-30 18:53:39'),
(32, 'admin logged out', '2018-11-30 19:07:45'),
(33, 'admin logged in', '2018-11-30 19:07:47'),
(34, 'admin updated specialization: Maritime', '2018-11-30 19:08:15'),
(35, 'admin updated board: Barishal', '2018-11-30 19:08:30'),
(36, 'admin updated divsion: Barisal division', '2018-11-30 19:08:39'),
(37, 'admin updated specialization: Science, Technology and Engineering', '2018-11-30 19:08:54'),
(38, 'admin logged out', '2018-11-30 19:09:17'),
(39, 'admin logged in', '2018-11-30 19:09:19'),
(40, 'admin deleted a user: wtfduk', '2018-11-30 19:10:13'),
(41, 'admin logged out', '2018-11-30 19:10:23'),
(42, 'admin logged in', '2018-11-30 19:10:39'),
(43, 'admin logged out', '2018-11-30 19:11:25'),
(44, 'admin logged in', '2018-11-30 19:11:29'),
(45, 'admin updated hsc_max year: 2018', '2018-11-30 19:11:54'),
(46, 'admin updated ssc_min year: 1996', '2018-11-30 19:12:05'),
(47, 'admin invisibled information of university: Bangabandhu Sheikh Mujib Medical University', '2018-11-30 19:12:20'),
(48, 'admin visibled information of university: Bangabandhu Sheikh Mujib Medical University', '2018-11-30 19:12:27'),
(49, 'admin updated ssc_max year: 2018', '2018-11-30 19:13:02'),
(50, 'emrul logged in', '2018-11-30 19:14:12'),
(51, 'emrul added an anouncement:5 to favourite', '2018-11-30 19:14:31'),
(52, 'emrul logged out', '2018-11-30 19:14:33'),
(53, 'admin logged in', '2018-11-30 19:15:54'),
(54, 'admin logged out', '2018-11-30 19:18:16'),
(55, 'admin logged in', '2018-11-30 19:18:24'),
(56, 'admin logged out', '2018-12-01 06:43:03'),
(57, 'admin logged in', '2018-12-01 06:43:05'),
(58, 'admin logged out', '2018-12-01 06:43:21'),
(59, 'admin logged in', '2018-12-01 06:43:23'),
(60, 'admin logged out', '2018-12-01 06:53:48'),
(61, 'admin logged in', '2018-12-01 06:53:51'),
(62, 'admin logged out', '2018-12-01 07:25:45'),
(63, 'admin logged out', '2018-12-01 07:48:13'),
(64, 'admin logged in', '2018-12-01 07:48:15'),
(65, 'admin logged out', '2018-12-01 07:49:35'),
(66, 'admin logged in', '2018-12-01 07:49:48'),
(67, 'admin logged out', '2018-12-01 07:56:13'),
(68, 'emrul logged in', '2018-12-01 07:56:17'),
(69, 'emrul removed an anouncement:6 from favourite', '2018-12-01 08:05:35'),
(70, 'emrul added an anouncement:6 to favourite', '2018-12-01 08:07:00'),
(71, 'emrul removed an anouncement:5 from favourite', '2018-12-01 08:07:48'),
(72, 'emrul added an anouncement:5 to favourite', '2018-12-01 08:07:50'),
(73, 'emrul logged out', '2018-12-01 08:26:39'),
(74, 'emrul logged in', '2018-12-01 08:26:40'),
(75, 'emrul logged out', '2018-12-01 08:26:44'),
(76, 'admin logged in', '2018-12-01 08:26:49'),
(77, 'admin logged out', '2018-12-01 08:27:05'),
(78, ' registered to durjoy', '2018-12-01 08:29:56'),
(79, 'admin logged in', '2018-12-01 08:29:59'),
(80, 'admin deleted a user: effff', '2018-12-01 08:31:10'),
(81, 'admin logged out', '2018-12-01 08:31:25'),
(82, 'admin logged in', '2018-12-01 08:31:51'),
(83, 'admin logged out', '2018-12-01 08:48:30'),
(84, 'admin logged in', '2018-12-01 08:48:32'),
(85, 'admin logged out', '2018-12-01 08:48:35'),
(86, 'emrul logged in', '2018-12-01 08:48:37'),
(87, 'emrul removed an anouncement:6 from favourite', '2018-12-01 08:48:52'),
(88, 'emrul added an anouncement:6 to favourite', '2018-12-01 08:48:54'),
(89, 'emrul removed an anouncement:5 from favourite', '2018-12-01 08:50:23'),
(90, 'emrul added an anouncement:5 to favourite', '2018-12-01 08:50:29'),
(91, 'emrul logged out', '2018-12-01 08:52:54'),
(92, 'admin logged in', '2018-12-01 08:53:08'),
(93, 'admin logged out', '2018-12-01 08:54:07'),
(94, 'emrul logged in', '2018-12-01 08:54:10'),
(95, 'emrul removed an anouncement: 6 from favourite', '2018-12-01 08:54:13'),
(96, 'emrul added an anouncement: 6 to favourite', '2018-12-01 08:54:17'),
(97, 'emrul logged out', '2018-12-01 08:54:19'),
(98, 'admin logged in', '2018-12-01 08:54:23'),
(99, 'admin logged out', '2018-12-01 08:59:23'),
(100, 'emrul logged in', '2018-12-01 08:59:36'),
(101, 'emrul logged out', '2018-12-01 09:04:02'),
(102, 'emrul logged in', '2018-12-01 09:04:04'),
(103, 'emrul removed an anouncement: 5 from favourite', '2018-12-01 09:06:07'),
(104, 'emrul removed an anouncement: 6 from favourite', '2018-12-01 09:06:09'),
(105, 'emrul added an anouncement: 5 to favourite', '2018-12-01 09:06:20'),
(106, 'emrul added an anouncement: 6 to favourite', '2018-12-01 09:06:22'),
(107, 'emrul logged out', '2018-12-01 09:14:13'),
(108, 'admin logged in', '2018-12-01 09:14:31'),
(109, 'admin logged out', '2018-12-01 09:35:18'),
(110, 'admin logged in', '2018-12-01 09:57:49'),
(111, 'admin logged out', '2018-12-01 09:59:33'),
(112, 'admin logged in', '2018-12-01 09:59:37'),
(113, 'admin updated ssc_min year: 1997', '2018-12-01 10:00:03'),
(114, 'admin updated ssc_min year: 1996', '2018-12-01 10:00:08'),
(115, 'admin logged out', '2018-12-01 10:00:26'),
(116, 'admin logged in', '2018-12-01 10:00:29'),
(117, 'admin added an anouncement:', '2018-12-01 10:04:01'),
(118, 'admin logged out', '2018-12-01 10:04:30'),
(119, 'emrul logged in', '2018-12-01 10:04:33'),
(120, 'emrul logged out', '2018-12-01 10:04:42'),
(121, 'admin logged in', '2018-12-01 10:04:46'),
(122, 'admin visibled an anouncement:7', '2018-12-01 10:04:53'),
(123, 'admin logged out', '2018-12-01 10:04:55'),
(124, 'emrul logged in', '2018-12-01 10:04:59'),
(125, 'emrul added an anouncement: 7 to favourite', '2018-12-01 10:05:07'),
(126, 'emrul logged out', '2018-12-01 10:11:20'),
(127, 'admin logged in', '2018-12-01 10:11:25'),
(128, 'admin updated an anouncement: 7', '2018-12-01 10:11:47'),
(129, 'admin logged out', '2018-12-01 10:11:56'),
(130, 'emrul logged in', '2018-12-01 10:12:02'),
(131, 'emrul removed an anouncement: 7 from favourite', '2018-12-01 10:12:12'),
(132, 'emrul logged out', '2018-12-01 10:13:09'),
(133, 'emrul logged in', '2018-12-01 10:13:14'),
(134, 'emrul updated his profile', '2018-12-01 10:13:40'),
(135, 'emrul logged out', '2018-12-01 10:14:07'),
(136, 'admin logged in', '2018-12-01 10:14:11'),
(137, 'admin logged out', '2018-12-01 10:16:17'),
(138, 'admin logged in', '2018-12-01 10:16:42'),
(139, 'admin logged out', '2018-12-01 10:16:55'),
(140, 'admin logged in', '2018-12-01 10:17:31'),
(141, 'admin logged out', '2018-12-01 10:17:57'),
(142, 'admin logged in', '2018-12-01 11:18:40'),
(143, 'admin logged out', '2018-12-01 12:14:24'),
(144, 'admin logged in', '2018-12-01 12:14:26'),
(145, 'admin updated board: Barishal', '2018-12-01 12:15:55'),
(146, 'admin logged out', '2018-12-01 12:19:28'),
(147, 'emrul logged in', '2018-12-01 12:19:34'),
(148, 'emrul logged out', '2018-12-01 17:21:13'),
(149, 'admin logged in', '2018-12-01 17:21:21'),
(150, 'admin logged out', '2018-12-01 17:42:10'),
(151, 'emrul logged in', '2018-12-01 17:42:14'),
(152, 'emrul added an anouncement: 7 to favourite', '2018-12-01 17:43:45'),
(153, 'emrul logged out', '2018-12-01 17:54:49'),
(154, 'emrul logged in', '2018-12-01 17:54:50'),
(155, 'emrul logged out', '2018-12-01 17:54:53'),
(156, 'admin logged in', '2018-12-01 17:54:57'),
(157, 'admin logged out', '2018-12-01 18:29:33'),
(158, 'emrul logged in', '2018-12-01 18:29:36'),
(159, 'emrul removed an anouncement: 7 from favourite', '2018-12-01 18:32:26'),
(160, 'emrul added an anouncement: 7 to favourite', '2018-12-01 18:32:30'),
(161, 'emrul updated his profile', '2018-12-01 18:32:38'),
(162, 'emrul logged out', '2018-12-01 18:32:51'),
(163, 'admin logged in', '2018-12-01 18:32:55'),
(164, 'admin logged out', '2018-12-01 18:34:56'),
(165, 'admin logged in', '2018-12-01 18:34:58'),
(166, 'admin logged out', '2018-12-01 18:46:05'),
(167, 'admin logged in', '2018-12-02 06:29:45'),
(168, 'admin logged out', '2018-12-02 06:30:45'),
(169, 'emrul logged in', '2018-12-02 06:30:49'),
(170, 'emrul removed an anouncement: 7 from favourite', '2018-12-02 06:31:10'),
(171, 'emrul added an anouncement: 7 to favourite', '2018-12-02 06:31:15'),
(172, 'emrul removed an anouncement: 6 from favourite', '2018-12-02 06:32:00'),
(173, 'emrul added an anouncement: 6 to favourite', '2018-12-02 06:32:04'),
(174, 'emrul logged out', '2018-12-02 06:32:26'),
(175, 'admin logged in', '2018-12-02 06:32:29'),
(176, 'admin logged out', '2018-12-02 06:39:18'),
(177, 'emrul logged in', '2018-12-02 06:39:45'),
(178, 'emrul logged out', '2018-12-02 06:39:59'),
(179, 'admin logged in', '2018-12-02 06:40:03'),
(180, ' updated ssc_min year: 1996', '2018-12-02 06:46:12'),
(181, ' updated ssc_min year: 1996', '2018-12-02 06:46:15'),
(182, ' updated ssc_min year: 1996', '2018-12-02 06:46:16'),
(183, 'admin updated ssc_min year: 1996', '2018-12-02 06:46:39'),
(184, 'admin updated ssc_min year: 1995', '2018-12-02 06:46:45'),
(185, 'admin updated ssc_min year: 1997', '2018-12-02 06:46:51'),
(186, 'admin logged out', '2018-12-02 06:46:54'),
(187, 'admin logged in', '2018-12-02 06:47:11'),
(188, 'admin updated ssc_min year: 1996', '2018-12-02 06:47:23'),
(189, 'admin invisibled an anouncement:7', '2018-12-02 06:50:07'),
(190, 'admin visibled an anouncement:7', '2018-12-02 06:50:12'),
(191, 'admin deleted an anouncement: 4', '2018-12-02 07:04:48'),
(192, 'admin updated an anouncement: 6', '2018-12-02 07:14:30'),
(193, 'admin updated an anouncement: 6', '2018-12-02 07:14:40'),
(194, 'admin updated an anouncement: 6', '2018-12-02 07:16:00'),
(195, 'admin updated an anouncement: 6', '2018-12-02 07:29:00'),
(196, 'admin updated an anouncement: 6', '2018-12-02 07:39:11'),
(197, 'admin updated an anouncement: 6', '2018-12-02 07:39:43'),
(198, 'admin updated an anouncement: 6', '2018-12-02 07:40:52'),
(199, 'admin updated an anouncement: 6', '2018-12-02 07:41:28'),
(200, 'admin updated an anouncement: 6', '2018-12-02 07:42:34'),
(201, 'admin updated an anouncement: 6', '2018-12-02 07:42:51'),
(202, 'admin updated an anouncement: 6', '2018-12-02 07:43:47'),
(203, 'admin updated an anouncement: 6', '2018-12-02 07:48:15'),
(204, 'admin updated an anouncement: 6', '2018-12-02 07:50:21'),
(205, 'admin updated an anouncement: 6', '2018-12-02 08:21:57'),
(206, 'admin logged out', '2018-12-02 08:23:22'),
(207, 'emrul logged in', '2018-12-02 08:23:26'),
(208, 'emrul logged in', '2018-12-02 08:23:26'),
(209, ' removed an anouncement: 7 from favourite', '2018-12-02 08:23:46'),
(210, 'emrul removed an anouncement: 7 from favourite', '2018-12-02 08:25:44'),
(211, 'emrul added an anouncement: 7 to favourite', '2018-12-02 08:25:48'),
(212, 'emrul logged out', '2018-12-02 08:26:00'),
(213, 'admin logged in', '2018-12-02 08:26:05'),
(214, 'admin updated an anouncement: 3', '2018-12-02 08:27:53'),
(215, 'admin updated information of university: Metropolitan University', '2018-12-02 09:31:44'),
(216, 'admin updated information of university: Metropolitan University', '2018-12-02 09:50:52'),
(217, 'admin updated information of university: Metropolitan University', '2018-12-02 09:52:44'),
(218, 'admin updated information of university: Metropolitan University', '2018-12-02 09:54:27'),
(219, 'admin updated information of university: Metropolitan University', '2018-12-02 09:56:00'),
(220, 'admin updated information of university: Metropolitan University', '2018-12-02 09:57:12'),
(221, 'admin updated information of university: Metropolitan University', '2018-12-02 09:59:56'),
(222, 'admin updated information of university: Metropolitan University', '2018-12-02 10:00:06'),
(223, 'admin updated information of university: Metropolitan University', '2018-12-02 10:01:01'),
(224, 'admin logged out', '2018-12-02 10:04:52'),
(225, 'admin logged in', '2018-12-02 10:07:38'),
(226, 'admin logged out', '2018-12-02 10:07:44'),
(227, 'emrul logged in', '2018-12-02 10:07:53'),
(228, 'emrul removed an anouncement: 7 from favourite', '2018-12-02 10:08:05'),
(229, 'emrul added an anouncement: 7 to favourite', '2018-12-02 10:08:15'),
(230, 'emrul logged out', '2018-12-02 10:11:04'),
(231, 'admin logged in', '2018-12-02 10:11:12'),
(232, 'admin added board: swwfr', '2018-12-02 10:19:05'),
(233, 'admin added board: fff', '2018-12-02 10:19:13'),
(234, 'admin deleted board: 19', '2018-12-02 10:19:19'),
(235, 'admin deleted board: 18', '2018-12-02 10:19:26'),
(236, 'admin added board: sfffff', '2018-12-02 10:19:39'),
(237, 'admin deleted board: 20', '2018-12-02 10:19:46'),
(238, 'admin logged out', '2018-12-02 10:19:56'),
(239, 'admin logged in', '2018-12-02 10:20:39'),
(240, 'admin added specialization: wff', '2018-12-02 10:21:06'),
(241, 'admin deleted specialization: 21', '2018-12-02 10:21:11'),
(242, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-12-03 15:20:57'),
(243, 'admin updated information of university: Metropolitan University', '2018-12-03 15:25:18'),
(244, 'admin updated information of university: Metropolitan University', '2018-12-03 15:25:30'),
(245, 'admin updated information of university: Khulna University', '2018-12-03 16:16:21'),
(246, 'admin updated information of university: Metropolitan University', '2018-12-03 16:25:47'),
(247, 'admin updated information of university: Khulna University', '2018-12-03 16:28:54'),
(248, 'admin added divsion: 1r3', '2018-12-03 16:48:52'),
(249, 'admin deleted divsion: 9', '2018-12-03 16:48:58'),
(250, 'admin updated an anouncement: 5', '2018-12-03 17:13:55'),
(251, 'admin updated an anouncement: 6', '2018-12-03 17:17:21'),
(252, 'admin updated an anouncement: 3', '2018-12-03 17:19:01'),
(253, 'admin updated an anouncement: 3', '2018-12-03 17:19:29'),
(254, 'admin updated an anouncement: 3', '2018-12-03 17:20:51'),
(255, 'admin updated an anouncement: 3', '2018-12-03 17:21:05'),
(256, 'admin updated an anouncement: 3', '2018-12-03 17:21:36'),
(257, 'admin updated an anouncement: 3', '2018-12-03 17:22:32'),
(258, 'admin updated an anouncement: 3', '2018-12-03 17:24:04'),
(259, 'admin logged out', '2018-12-04 06:54:28'),
(260, 'emrul logged in', '2018-12-04 06:54:32'),
(261, 'emrul removed an anouncement: 7 from favourite', '2018-12-04 06:54:56'),
(262, 'emrul added an anouncement: 7 to favourite', '2018-12-04 06:55:00'),
(263, 'emrul logged out', '2018-12-04 06:55:07'),
(264, 'emrul logged in', '2018-12-04 14:23:53'),
(265, 'emrul logged out', '2018-12-04 14:27:53'),
(266, 'admin logged in', '2018-12-04 14:27:58'),
(267, 'admin logged out', '2018-12-06 09:21:35'),
(268, 'emrul logged in', '2018-12-06 09:21:40'),
(269, 'emrul removed an anouncement: 7 from favourite', '2018-12-06 09:22:11'),
(270, 'emrul added an anouncement: 7 to favourite', '2018-12-06 09:22:16'),
(271, 'emrul removed an anouncement: 6 from favourite', '2018-12-06 09:22:25'),
(272, 'emrul logged out', '2018-12-06 09:23:03'),
(273, 'admin logged in', '2018-12-06 09:23:09'),
(274, 'admin logged out', '2018-12-06 09:24:49'),
(275, 'admin logged in', '2018-12-06 09:25:49'),
(276, 'admin added an anouncement:', '2018-12-06 09:28:48'),
(277, 'admin visibled an anouncement:8', '2018-12-06 09:30:02'),
(278, 'emrul logged in', '2018-12-06 09:31:05'),
(279, 'emrul logged out', '2018-12-06 09:32:10'),
(280, 'emrul logged in', '2018-12-06 09:32:31'),
(281, 'emrul updated his profile', '2018-12-06 09:32:58'),
(282, 'emrul updated his profile', '2018-12-06 09:34:12'),
(283, 'emrul updated his profile', '2018-12-06 09:35:07'),
(284, 'emrul updated his profile', '2018-12-06 09:35:32'),
(285, 'admin updated an anouncement: 3', '2018-12-06 09:39:42'),
(286, 'admin updated an anouncement: 3', '2018-12-06 09:42:18'),
(287, 'admin logged out', '2018-12-06 09:42:27'),
(288, 'admin logged in', '2018-12-07 12:14:23'),
(289, 'admin deleted an anouncement: 8', '2018-12-07 12:16:18'),
(290, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-12-07 13:13:44'),
(291, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-12-07 13:26:01'),
(292, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-12-07 13:26:07'),
(293, 'admin updated information of university: Khulna University', '2018-12-07 13:26:13'),
(294, 'admin updated his profile', '2018-12-07 13:32:44'),
(295, 'admin updated his profile', '2018-12-07 13:34:09'),
(296, 'admin updated his profile', '2018-12-07 13:35:11'),
(297, 'admin updated his profile', '2018-12-07 13:35:19'),
(298, 'admin updated his profile', '2018-12-07 13:35:58'),
(299, 'admin updated his profile', '2018-12-07 13:36:05'),
(300, 'admin logged out', '2018-12-07 13:37:09'),
(301, 'admin logged in', '2018-12-07 13:37:23'),
(302, 'admin changed role of: bccfqmwh to admin', '2018-12-07 13:37:30'),
(303, 'admin changed role of: bccfqmwh to user', '2018-12-07 13:37:36'),
(304, 'admin updated his profile', '2018-12-07 13:40:18'),
(305, 'admin updated his profile', '2018-12-07 13:40:20'),
(306, 'admin updated his profile', '2018-12-07 13:40:53'),
(307, 'admin logged out', '2018-12-07 13:44:35'),
(308, 'admin logged in', '2018-12-07 13:48:57'),
(309, 'admin updated ssc_min year: 2018', '2018-12-07 13:49:06'),
(310, 'admin logged out', '2018-12-07 13:49:10'),
(311, 'admin logged in', '2018-12-07 13:49:18'),
(312, 'admin updated ssc_min year: 1996', '2018-12-07 13:49:35'),
(313, 'admin logged out', '2018-12-07 13:49:43'),
(314, 'admin logged in', '2018-12-07 13:49:45'),
(315, 'admin updated his profile', '2018-12-07 13:49:53'),
(316, 'admin updated his profile', '2018-12-07 13:50:13'),
(317, 'admin updated his profile', '2018-12-07 13:50:22'),
(318, 'admin updated his profile', '2018-12-07 13:51:24'),
(319, 'admin updated his profile', '2018-12-07 13:51:32'),
(320, 'admin updated his profile', '2018-12-07 13:52:06'),
(321, 'admin updated his profile', '2018-12-07 13:52:14'),
(322, ' updated his profile', '2018-12-07 13:53:53'),
(323, ' logged out', '2018-12-07 13:54:09'),
(324, 'admin logged in', '2018-12-07 13:54:11'),
(325, 'admin updated his profile', '2018-12-07 13:55:19'),
(326, 'admin updated his profile', '2018-12-07 13:55:23'),
(327, 'admin updated his profile', '2018-12-07 13:55:27'),
(328, 'admin updated his profile', '2018-12-07 13:55:44'),
(329, 'admin logged out', '2018-12-07 13:55:48'),
(330, 'admin logged in', '2018-12-07 13:55:50'),
(331, 'admin logged out', '2018-12-07 13:56:11'),
(332, 'admin logged in', '2018-12-07 13:56:14'),
(333, 'admin added divsion: aswf', '2018-12-07 13:56:30'),
(334, 'admin deleted divsion: 9', '2018-12-07 14:01:20'),
(335, 'admin updated information of university: Bangabandhu Sheikh Mujib Medical University', '2018-12-07 14:19:31'),
(336, 'admin added divsion: eg', '2018-12-07 14:22:27'),
(337, 'admin deleted divsion: 10', '2018-12-07 14:22:37'),
(338, 'admin added group: edvrg', '2018-12-07 17:49:57'),
(339, 'admin deleted group: 5', '2018-12-07 17:50:06'),
(340, 'admin updated an anouncement: 7', '2018-12-07 19:32:31'),
(341, 'admin updated information of university: Metropolitan University', '2018-12-07 19:32:44'),
(342, 'admin logged out', '2018-12-08 05:46:48'),
(343, 'emrul logged in', '2018-12-08 05:46:56'),
(344, 'emrul added an anouncement: 6 to favourite', '2018-12-08 05:48:20'),
(345, 'emrul removed an anouncement: 6 from favourite', '2018-12-08 05:48:23'),
(346, 'emrul logged out', '2018-12-08 05:52:45'),
(347, 'admin logged in', '2018-12-08 05:53:00'),
(348, 'admin updated his profile', '2018-12-08 06:09:09'),
(349, 'admin logged out', '2018-12-08 14:47:26'),
(350, 'admin logged in', '2018-12-08 14:47:30'),
(351, 'admin updated ssc_min year: 1996', '2018-12-08 14:47:49'),
(352, 'admin updated ssc_min year: 1996', '2018-12-08 14:47:52'),
(353, 'admin updated ssc_min year: 1996', '2018-12-08 14:47:53'),
(354, 'admin updated an anouncement: 3', '2018-12-09 05:46:52'),
(355, 'admin logged out', '2018-12-09 05:48:16'),
(356, 'emrul logged in', '2018-12-09 05:54:49'),
(357, 'emrul added an anouncement: 6 to favourite', '2018-12-09 05:54:55'),
(358, 'emrul logged out', '2018-12-09 06:01:55'),
(359, 'emrul logged in', '2018-12-09 06:01:58'),
(360, 'emrul removed an anouncement: 6 from favourite', '2018-12-09 06:04:56'),
(361, 'emrul removed an anouncement: 7 from favourite', '2018-12-09 06:04:58'),
(362, 'emrul removed an anouncement: 5 from favourite', '2018-12-09 06:05:00'),
(363, 'emrul removed an anouncement: 3 from favourite', '2018-12-09 06:05:01'),
(364, 'emrul added an anouncement: 7 to favourite', '2018-12-09 06:08:20'),
(365, 'emrul added an anouncement: 5 to favourite', '2018-12-09 06:08:22'),
(366, 'emrul added an anouncement: 6 to favourite', '2018-12-09 06:08:24'),
(367, 'emrul added an anouncement: 3 to favourite', '2018-12-09 06:08:25'),
(368, 'emrul logged out', '2018-12-09 06:08:31'),
(369, 'admin logged in', '2018-12-09 06:08:35'),
(370, 'admin logged out', '2018-12-09 06:53:34'),
(371, 'emrul logged in', '2018-12-09 06:53:39'),
(372, 'emrul logged out', '2018-12-09 07:01:03'),
(373, 'emrul logged in', '2018-12-09 07:02:11'),
(374, 'emrul logged out', '2018-12-09 07:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specializations`
--

CREATE TABLE `tbl_specializations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_specializations`
--

INSERT INTO `tbl_specializations` (`id`, `name`) VALUES
(11, 'Agricultural Science'),
(12, 'Engineering'),
(13, 'General'),
(14, 'General & Technological'),
(15, 'Maritime'),
(16, 'Medical'),
(17, 'Science & Technology'),
(18, 'Science, Technology and Engineering'),
(19, 'Textile Engineering'),
(20, 'Veterinary Science');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university`
--

CREATE TABLE `tbl_university` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `type` varchar(50) NOT NULL,
  `acronym` varchar(5000) NOT NULL,
  `established` int(11) NOT NULL,
  `location` varchar(5000) NOT NULL,
  `division` varchar(5000) NOT NULL,
  `specialization` varchar(5000) NOT NULL,
  `phd_granting` varchar(5000) NOT NULL,
  `map_link` varchar(5000) NOT NULL,
  `logo_link` varchar(5000) NOT NULL,
  `web_link` varchar(5000) NOT NULL,
  `visiblity` varchar(50) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university`
--

INSERT INTO `tbl_university` (`id`, `name`, `type`, `acronym`, `established`, `location`, `division`, `specialization`, `phd_granting`, `map_link`, `logo_link`, `web_link`, `visiblity`) VALUES
(20, 'University of Rajshahi', 'Public', 'RU', 1953, 'Rajshahi', 'Rajshahi division', 'General', 'Yes', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"100%\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=university%20of%20rajshahi&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.crocothemes.net\"></a></div><style>.mapouter{text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>', 'assests/img/ru_logo.png', 'http://www.ru.ac.bd/', 'true'),
(22, 'Bangladesh Agricultural University', 'Public', 'BAU', 1961, 'Mymensingh', 'Mymensingh division', 'Agricultural Science', 'Yes', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"100%\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=bau&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.crocothemes.net\">crocothemes.net</a></div><style>.mapouter{text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>', 'assests/img/bau_logo.png', 'https://www.bau.edu.bd/', 'true'),
(33, 'Metropolitan University', 'Private', 'MU', 2003, 'Sylhet', 'Sylhet division', 'General', 'No', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"100%\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=Metropolitan%20University%2C%20Sylhet&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">pure black</a></div><style>.mapouter{text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>', 'assests/img/MU_sylhet_2003_logo.png', 'http://metrouni.edu.bd/', 'true'),
(34, 'University of Chittagong', 'Public', 'CU', 1966, 'Chittagong', 'Chittagong division', 'General', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d948.7278910425971!2d91.78800551526552!3d22.47122506910484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd6fe9a3a4473%3A0x7836276aef538552!2z4Kaa4Kaf4KeN4Kaf4KaX4KeN4Kaw4Ka-4KauIOCmrOCmv-CmtuCnjeCmrOCmrOCmv-CmpuCnjeCmr-CmvuCmsuCmr-CmvCzgpqzgpr7gpoLgprLgpr7gpqbgp4fgprY!5e0!3m2!1sbn!2sbd!4v1543158816398\" width=\"100%\" height=\"350px\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/CU_chittagong_1966_logo.png', 'http://cu.ac.bd/', 'true'),
(37, 'University of Dhaka', 'Public', 'DU', 1921, 'Dhaka', 'Dhaka division', 'General', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.375270075273!2d90.39059531408641!3d23.733993684597433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8e90a449e4f%3A0xb7092a9c25197fa4!2z4Kai4Ka-4KaV4Ka-IOCmrOCmv-CmtuCnjeCmrOCmrOCmv-CmpuCnjeCmr-CmvuCmsuCnnw!5e0!3m2!1sbn!2sbd!4v1543350272395\" width=\"100%\" height=\"350px\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/DU_dhaka_1921_logo.png', 'http://www.du.ac.bd/', 'true'),
(39, 'Jahangirnagar University', 'Public', 'JU', 1970, 'Savar, Dhaka', 'Dhaka division', 'General', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29185.621756567216!2d90.24822207479498!3d23.88242920954314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755e998af65bee5%3A0x51e41cefc20b8fa8!2z4Kac4Ka-4Ka54Ka-4KaZ4KeN4KaX4KeA4Kaw4Kao4KaX4KawIOCmrOCmv-CmtuCnjeCmrOCmrOCmv-CmpuCnjeCmr-CmvuCmsuCnnywg4Ka44Ka-4Kat4Ka-4KawIOCmh-CmieCmqOCmv-Cmr-CmvOCmqA!5e0!3m2!1sbn!2sbd!4v1543351491293\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/JU_dhaka_1970_logo.png', 'http://www.juniv.edu/', 'true'),
(40, 'Islamic University, Bangladesh', 'Public', 'IU', 1979, 'Kushtia', 'Khulna division', 'General & Technological', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4343.788533206907!2d89.1484075930458!3d23.723254278371567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39feeb0d36323c41%3A0x4c170899846e8597!2sIslamic+University!5e0!3m2!1sen!2sbd!4v1543392083252\" width=\"100%\" height=\"350px\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/IU_khulna_1979_logo.jpg', 'https://www.iu.ac.bd/', 'true'),
(41, 'Shahjalal University of Science and Technology', 'Public', 'SUST', 1986, 'Sylhet', 'Sylhet division', 'Science & Technology', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.435552381404!2d91.82972451431083!3d24.917228049118005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750556002144eab%3A0xe277e14dbca9f2ab!2sShahjalal+University+of+Science+and+Technology+(SUST)!5e0!3m2!1sen!2sbd!4v1543392205866\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/SUST_sylhet_1986_logo.png', 'https://www.sust.edu/', 'true'),
(42, 'Khulna University', 'Public', 'KU', 1991, 'Khulna', 'Khulna division', 'General', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d98734.05387631536!2d89.47210016059809!3d22.81732568488973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff85490c50d28f%3A0xadae6f7b93b7069a!2sKhulna+University!5e0!3m2!1sen!2sbd!4v1543392403059\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/KU_khulna_1991_logo.png', 'http://ku.ac.bd/', 'true'),
(43, 'Bangabandhu Sheikh Mujib Medical University', 'Public', 'BSMMU', 1998, 'Dhaka', 'Dhaka division', 'Medical', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1582853.7795763616!2d88.17249802511202!3d22.859932161568235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8eaaa0b8a81%3A0x6585127bdddcded2!2sBangabandhu+Sheikh+Mujib+Medical+University!5e0!3m2!1sen!2sbd!4v1543392898053\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/BSMMU_dhaka_1998_logo.png', 'http://www.bsmmu.edu.bd/', 'true'),
(44, 'Bangabandhu Sheikh Mujibur Rahman Agricultural University', 'Public', 'BSMRAU', 1998, 'Gazipur', 'Dhaka division', 'Agricultural Science', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3643.806834327892!2d90.3973723140943!3d24.037875984448483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755dbdb54d0ee8b%3A0x96a980a2214ff044!2sBangabandhu+Sheikh+Mujibur+Rahman+Agricultural+University+(BSMRAU)!5e0!3m2!1sen!2sbd!4v1543393098428\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/BSMRAU_dhaka_1998_logo.png', 'http://bsmrau.edu.bd/', 'true'),
(45, 'Bangladesh University of Engineering & Technology', 'Public', 'BUET', 1962, 'Dhaka', 'Dhaka division', 'Engineering', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.5526599843633!2d90.39065311408623!3d23.727663784600672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8c2c7ef84b5%3A0x140c494d6099d4cc!2z4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2IOCmquCnjeCmsOCmleCnjOCmtuCmsiDgpqzgpr_gprbgp43gpqzgpqzgpr_gpqbgp43gpq_gpr7gprLgp58!5e0!3m2!1sbn!2sbd!4v1543400584198\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/BUET_dhaka_1962_logo.png', 'http://www.buet.ac.bd/', 'true'),
(46, 'Hajee Mohammad Danesh Science & Technology University', 'Public', 'HSTU', 1999, 'Dinajpur', 'Rangpur division', 'Science & Technology', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4275.446628514165!2d88.64710452613122!3d25.6975449040822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e4ad0b5d200fa7%3A0x2e0c8f8bb049efa2!2sHajee+Mohammad+Danesh+Science+and+Technology+University!5e0!3m2!1sen!2sbd!4v1543401584230\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/HSTU_rangpur_1999_logo.png', 'https://www.hstu.ac.bd/', 'true'),
(47, 'Mawlana Bhashani Science And Technology University', 'Public', 'MBSTU', 1999, 'Tangail', 'Dhaka division', 'Science & Technology', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3638.18399732116!2d89.8896485142964!3d24.235342575995848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdfc7edb573571%3A0xda791ddc1ce793bd!2sMawlana+Bhashani+Science+and+Technology+University!5e0!3m2!1sen!2sbd!4v1543485761617\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/MBSTU_dhaka_1999_logo.png', 'http://mbstu.ac.bd/', 'true'),
(48, 'Patuakhali Science And Technology University', 'Public', 'PSTU', 2000, 'Patuakhali', 'Barisal division', 'Science & Technology', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.054877627621!2d90.3814207140545!3d22.464571985238408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30aacf2fe39e501f%3A0xec70c954a51b0386!2sPatuakhali+Science+and+Technology+University!5e0!3m2!1sen!2sbd!4v1543486083472\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/PSTU_barisal_2000_logo.png', 'http://www.pstu.ac.bd/', 'true'),
(49, 'Sher-e-bangla Agricultural University', 'Public', 'SAU', 2001, 'Dhaka', 'Dhaka division', 'Agricultural Science', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.3889226993733!2d90.3708228140873!3d23.769161084580098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ac84a0b959%3A0x293a6c9abcb2678d!2sSher-E-Bangla+Agricultural+University!5e0!3m2!1sen!2sbd!4v1543486931809\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'assests/img/SAU_dhaka_2001_logo.jpg', 'http://www.sau.edu.bd/', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university_seen`
--

CREATE TABLE `tbl_university_seen` (
  `id` int(11) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `uni_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university_seen`
--

INSERT INTO `tbl_university_seen` (`id`, `username`, `uni_id`) VALUES
(17, 'admin', 16),
(18, 'admin', 20),
(19, 'admin', 22),
(20, 'emrul', 16),
(21, 'emrul', 20),
(22, 'emrul', 22),
(23, 'admin', 23),
(24, '', 16),
(25, '', 20),
(26, '', 22),
(27, '', 23),
(28, 'emrul', 23),
(29, 'admin', 24),
(30, 'admin', 25),
(31, 'admin', 26),
(32, 'admin', 27),
(33, 'admin', 28),
(34, 'admin', 29),
(35, 'admin', 30),
(36, 'admin', 31),
(37, 'admin', 32),
(38, 'admin', 33),
(39, 'emrul', 33),
(40, 'admin', 34),
(41, 'admin', 35),
(42, 'rf-dd-', 16),
(43, 'rf-dd-', 20),
(44, 'rf-dd-', 22),
(45, 'rf-dd-', 23),
(46, 'rf-dd-', 33),
(47, 'admin', 36),
(48, 'emrul', 34),
(49, 'emrul', 35),
(50, 'emrul', 36),
(51, 'admin', 37),
(52, 'admin', 38),
(53, 'admin', 39),
(54, 'admin', 40),
(55, 'admin', 41),
(56, 'admin', 42),
(57, 'admin', 43),
(58, 'admin', 44),
(59, 'emrul', 37),
(60, 'emrul', 39),
(61, 'emrul', 40),
(62, 'emrul', 41),
(63, 'emrul', 42),
(64, 'emrul', 43),
(65, 'emrul', 44),
(66, 'admin', 45),
(67, 'admin', 46),
(68, 'emrul', 45),
(69, 'emrul', 46),
(70, 'admin', 47),
(71, 'admin', 48),
(72, 'admin', 49),
(73, 'admin', 50),
(74, 'admin', 51),
(75, 'emrul', 47),
(76, 'emrul', 48),
(77, 'emrul', 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `ssc_py` int(11) NOT NULL,
  `ssc_board` varchar(20) NOT NULL,
  `ssc_group` varchar(20) NOT NULL,
  `ssc_gpa` double NOT NULL,
  `ssc_marks` int(11) NOT NULL,
  `hsc_py` int(11) NOT NULL,
  `hsc_board` varchar(20) NOT NULL,
  `hsc_group` varchar(20) NOT NULL,
  `hsc_gpa` double NOT NULL,
  `hsc_marks` int(11) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `username`, `password`, `role`, `ssc_py`, `ssc_board`, `ssc_group`, `ssc_gpa`, `ssc_marks`, `hsc_py`, `hsc_board`, `hsc_group`, `hsc_gpa`, `hsc_marks`, `reg_time`) VALUES
(2, 'Emrul Chowdhury', 'emrul.cse@metrouni.edu.bd', 'emrul', '15103963f1f08ab553dffa24b1fa1496', 'user', 2015, 'Sylhet', 'Science', 3, 1100, 2015, 'Sylhet', 'Science', 3, 675, '2018-11-29 19:33:03'),
(4, 'Emrul Chowdhury', 'emrul@durjoy.net', 'admin', 'f84876fb37071050225b35dcd9f8168c', 'admin', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-29 19:33:03'),
(5, 'Qghumeay Nlfdxfir Vsc', 'ggbw@fnqdu.co', 'fnfoz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(6, 'Rtkjp Epggxrpn Vystmw', 'ysy@cqp.com', 'ikeffm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(7, 'Imkkasvw Ren Kycxfxtl', 'gypsf@dpooe.co', 'zbcoej', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(8, 'Pvaboygp Eylfpbn', 'ljvrvi@yamy.com', 'wqnqrq', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(9, 'Xuj Loov Owuxw', 'msncbx@oksfz.co', 'atxdkn', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(10, 'Jyhfixj Wnkku Nuxxzrzb', 'nmgqo@ket.co', 'hnkoaug', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(11, 'Rcddiut Iojwa Yzpvscm', 'sajl@vgubfa.com', 'vlzylnt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(12, 'Dcpwsrt Sjwhdiz Obzcnfw', 'qijt@dwvxhr.net', 'ldvgyl', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(13, 'Busbmbo Xtlhcsmp', 'ohgm@nkeuf.net', 'otogbgxp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(14, 'Anf Tcukepz', 'hklju@ggekj.co', 'zjenpev', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(15, 'Xiepj Rdzja', 'ujllch@bfqm.org', 'mwzobiw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(16, 'Xduu Fsksrsrt', 'kmq@cyzjee.co', 'msrqcozi', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(17, 'Pfi Nee Dpszrn', 'vym@tatbd.com', 'soemu', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(18, 'Pppsua Bazux Hec', 'hleg@punkdm.co', 'pweqtgjo', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(19, 'Rmo Zdqyoxy Jbbh', 'wdy@cprj.co', 'phoohp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(20, 'Qyuhr Zhnbn', 'uvqnqq@rzjpxi.net', 'vliexdz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(21, 'Osrkrusv Jbr', 'mwzpow@jil.com', 'raamdi', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(22, 'Npuuhgxp Njwjmwa', 'xmnsnh@lqqr.co', 'dltfz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(23, 'Cjtnzx Glsdsmz', 'noc@vfajf.co', 'xothowk', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(24, 'Zwucwl Frim Myhchz', 'iwkb@rxbgf.com', 'ceyhju', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(25, 'Xwtbv Rehbbcpx', 'fbx@fbcgkc.net', 'ckcotzg', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(26, 'Bmjrmbs Tssh', 'roefws@rxjhgu.com', 'upzww', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(27, 'Qurpixi Flduuve', 'owqcu@hnefnj.org', 'imuczfs', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(28, 'Iduburi Wtbrecu', 'kabfc@kdzezt.co', 'dukuhjz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(29, 'Czzzbf Qdpqz', 'kfobu@dht.com', 'djgkje', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(30, 'Lpaxam Erosw Tdptpcc', 'ifke@jyti.co', 'cqaybnef', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(31, 'Xvgz Dyyhngy Dru', 'mphmec@otrwo.net', 'ofghfo', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(32, 'Vlq Xwwk Fxdyygm', 'casz@gov.co', 'dkjgh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(33, 'Mbmxr Huyfyqg', 'jqkck@znay.org', 'kqoyzwm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(34, 'Bza Cpkhkt', 'ydz@vcuyp.org', 'fmbisgek', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(35, 'Gzvxdh Oamvaf', 'rarxs@khtqdi.org', 'rsigbhz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(36, 'Ujxmmysp Araewkeg Ccvhhr', 'vbjt@qdj.co', 'tgpknfp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(37, 'Cgfie Wqrwwwp Sqmeto', 'epspx@vjiu.co', 'lyynmkm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(38, 'Vkl Secdwrac Fmzkgip', 'fodk@mjqwiq.net', 'oqhimvf', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(39, 'Zwyvijg Ullkjduh Jafbtlk', 'fqr@yjf.com', 'hhssqcty', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(40, 'Eamdcjbp Htne Yiwxg', 'jwl@rsm.com', 'earwt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(41, 'Sjba Ioj Whypnvru', 'hoswk@fyg.com', 'dhacwyh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(42, 'Ewzmt Onzlt', 'hgau@nihreq.com', 'fwkjsm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(43, 'Jhaefqza Uld Chjc', 'dyrfv@rivu.net', 'egfivdr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(44, 'Gur Dreda', 'ubnfg@proqy.net', 'bcwqxkz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(45, 'Usj Mhcmhgd', 'mphnqk@mhurk.org', 'ffaclv', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(46, 'Zkkl Acll', 'eojo@onx.co', 'yjzgi', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(47, 'Nnzw Cxx Edrwu', 'xzrf@sewjt.com', 'xvynfhk', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(48, 'Cena Mnddxfd', 'vzcau@dcckxa.co', 'dzsxt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(49, 'Bbg Ngvvpjg Jog', 'mkxgbf@pyp.com', 'qchbddz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(50, 'Xbzm Rlxvo', 'twhxgi@fgfr.org', 'lmznm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(51, 'Gwwbsqf Ihu Sjol', 'msqsgh@cphel.com', 'tflbgsf', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(52, 'Cuzsrupc Ynvz Cpqugr', 'wni@xdf.net', 'wpxfbl', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(53, 'Npeelfjm Kuqp', 'omwn@mbup.co', 'tlptn', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(54, 'Pds Dsgvfpe Emwborif', 'uqhce@kmk.co', 'smvno', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(55, 'Afxwh Bibab Qopq', 'oviuss@fqw.com', 'txdzujtl', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(56, 'Xmrj Xwtl Gkytb', 'oly@nilq.net', 'ojskkvfx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(57, 'Hjmboclj Rintdwc', 'dvdx@opby.com', 'wyyoju', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(58, 'Hwml Rglfzdzd', 'tubx@offvn.co', 'swsaznmo', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(59, 'Oivv Obqpn', 'kwvnh@ebm.co', 'hvygkjis', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(60, 'Hatmuu Qbhm', 'nhf@axqxkj.org', 'zqtsjf', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(62, 'Fjpsswyx Ijjhev Yxozbafp', 'mowg@gonuat.com', 'lahyggy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(63, 'Ddjhml Edzl Dsr', 'eutgt@kntarj.co', 'xinovgzd', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(64, 'Unwooxvj Mpsvknhk Jopmm', 'ebksuc@zqlyqn.co', 'mbvbhrm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(65, 'Wpj Wyvwtg Oqnm', 'cxa@zark.net', 'xtuufarz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(66, 'Sdqws Tcjghec Udosr', 'jxyaay@qrxyc.org', 'uwjxnp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(67, 'Nbkcpdmo Alxap', 'mvbql@svxzku.co', 'ppwgzpd', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(68, 'Zkzcvbn Cvfxsxpj Oxt', 'hvxx@tgo.com', 'cxaeta', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(69, 'Gndmphw Yiayab', 'rqge@pxyj.co', 'tyzuvldv', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(70, 'Suxkbmfz Rtno', 'idzn@ghozva.co', 'snsnq', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(71, 'Mvubcwtf Rqtmk', 'epbh@wej.net', 'hkwcmm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(72, 'Ixxxlz Ysxtw Taidy', 'xyq@eprx.com', 'exxyfv', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(73, 'Dygthcuy Fwpjsfy', 'glgz@binta.co', 'nhodtonp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(74, 'Wotkgn Uphpk', 'eato@zabsd.org', 'qhkfcmof', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(75, 'Frfqgvp Vorpj', 'zslz@pjj.com', 'hrykx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(76, 'Ubuacc Fkcy Obgh', 'uoxr@jvp.org', 'cwgxx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(77, 'Wcgmm Edewdm Nqwcuq', 'sciliq@cih.co', 'ilgmfcs', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(78, 'Wkkx Cbhq', 'vcs@jeb.co', 'jlpgfgra', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(79, 'Bsgu Zifnhyxw Sjavwa', 'xpa@namxjd.co', 'uhnaczyh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(80, 'Wzol Uslrkvwp', 'vgzm@izw.org', 'wdfzlktb', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(81, 'Xgyyiu Sjve', 'kmesbj@kyer.co', 'hnexh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(82, 'Mji Bmusqdk', 'asolwj@ptxxeu.co', 'fwyucp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(83, 'Qseffunq Kfnnbecb', 'cjpdyj@ibit.co', 'plxelr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(84, 'Exdtquv Ttey Tlqlbbbv', 'qoz@yna.net', 'rbaqm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(85, 'Hzxnds Yfs', 'xwbio@wqv.net', 'tcdlpq', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(86, 'Jifvgy Kgo', 'zjmnzq@mrpnde.co', 'mthjitss', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(87, 'Qnjrd Yjwpy Tmley', 'svk@amsv.org', 'vxrlliv', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(88, 'Dkjig Vyxjv Qvrbacu', 'gai@yhbbxi.org', 'zncwhr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(89, 'Iriz Oqptqqwe Afjeqio', 'pyfauu@mvhxk.co', 'xmsyampt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(90, 'Anotls Wuhtfqjr Wbwhmq', 'zkhdkc@fvbeiy.net', 'vfvpzh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(91, 'Jab Qwwt', 'kdog@emhib.com', 'rnxsxrzl', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(92, 'Bqexkrqo Ernap', 'qyjpqo@bvjse.co', 'lwnks', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(93, 'Oidzfp Rwycztw Zvewxota', 'udkpe@upkczl.co', 'uskdnev', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(94, 'Plb Lpj Pfdcy', 'trc@vvtr.co', 'vpekkqmc', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(95, 'Ryja Teuvczv', 'cth@xsxclp.net', 'dlwxf', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(96, 'Gay Ueic', 'fdiam@tkbxot.org', 'rxxgvzq', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(97, 'Yro Fichqniv', 'jzau@fdf.co', 'mopsr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(98, 'Ugxt Hlcvspi', 'azrs@fszwx.org', 'murwmxc', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(99, 'Humrgj Mvnky Tnsjvwzx', 'sqx@jomuyj.net', 'uwrsyx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(100, 'Yyxcszp Klwjd', 'ltbsci@dpi.net', 'aqigesjs', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(101, 'Sjlrglmw Nrxrfnw', 'kzt@jhx.net', 'nfqjv', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(102, 'Ohnjq Jshymdov Gefhj', 'svhti@iojl.co', 'pmoxby', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(103, 'Opqjk Tvjgkw', 'kewpzh@jsut.co', 'yoefjgw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(104, 'Eoz Uhmg', 'bbsqr@crtx.net', 'vcaxxs', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(105, 'Ahyyayzk Uhjr', 'svoq@tydw.co', 'szxsbziy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(106, 'Gqml Nwscpir Fcbtsepl', 'gwfkh@ouoy.co', 'wmqojahy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(107, 'Fevsd Omr', 'hgdml@ukwyzc.org', 'skwgxuls', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(108, 'Kbs Pjeiszs', 'cezwa@qrvlwi.org', 'ovjcdzxx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(109, 'Qlsrzi Mgzrio Rqetk', 'fbld@iems.co', 'bhzfnw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(110, 'Mxx Dpylrax', 'lmt@iylbhc.org', 'lsyoyhgm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(111, 'Ppr Axqmom', 'yhg@giu.org', 'qbzxth', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(112, 'Pot Itnqw Oetonxwz', 'hutif@lgklr.co', 'wkmsy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(113, 'Puiva Qatmsc', 'maalk@csnxu.com', 'vtykrxa', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(114, 'Adjxwx Mndhldt', 'xsknxt@znjsq.org', 'bccfqmwh', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(115, 'Ssiigvij Uxi Caahmkw', 'wttjz@pkwl.co', 'jahtp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(116, 'Iebpbbmu Gyrhl', 'hxwg@prwv.co', 'hzyavqy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(117, 'Zto Oabn', 'nhr@bddndo.com', 'euiozi', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(118, 'Uozxq Ihwa', 'roqrd@wcvlx.net', 'podiisp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(119, 'Zomc Vaptgrg', 'fnyytk@wqqtm.net', 'uyvgaih', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(120, 'Hcc Huuy Htgdglf', 'ieb@utoeun.co', 'daxphb', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(121, 'Wzt Wjngjn', 'pxrjv@vccefk.net', 'mgsdy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(122, 'Mmkwdehf Ruq', 'yvecmp@sro.com', 'xllubryy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(123, 'Hqlzmre Qnk', 'itxgi@gqu.org', 'wtcznlt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(124, 'Xbltzy Yzvahnki', 'jwzztd@pqsuow.co', 'fccockvr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(125, 'Frjp Gdjdrwd Posr', 'gdrq@vqtvpp.co', 'hltjqvcc', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(126, 'Ezts Pynzfr Tqpox', 'whhwe@nvc.net', 'dkuzif', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(127, 'Rtwqqe Jueqb', 'skwz@ewz.com', 'ojursqg', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(128, 'Zvh Ujzumi', 'ofh@bkkfl.co', 'zkctk', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(129, 'Xks Fauwins', 'lsojtr@hwmhlv.co', 'pecjeiw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(130, 'Tne Iqubpgu', 'wgnmi@dwi.org', 'dilsnpd', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(131, 'Vmter Fblh', 'baf@garc.com', 'ijylbiim', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(132, 'Gxeirpbt Wqzapkk', 'afcom@ntmd.org', 'xlefppye', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(133, 'Oeqznbh Cwmfy Qqianny', 'qouizv@avgzj.org', 'blsgw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(134, 'Vjl Ivqcwvzx Cthy', 'muxqkw@mtf.com', 'gglgcox', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(135, 'Pytdbam Ykbo Mwg', 'ddpqk@zyjc.co', 'tmiepa', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(136, 'Hroqkhw Dbcih', 'qwaqzx@gkv.org', 'vlavksw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(137, 'Sdbv Idhtb Deytmpp', 'kuhs@orpu.co', 'hjrutks', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(138, 'Hlrxlydx Kosagg', 'pbgzv@afaz.co', 'hqsswto', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(139, 'Kqa Srehnr Yjiwtmhg', 'kozfkm@xty.com', 'xhfkxop', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(140, 'Bjzox Zubdnt Amzot', 'cjtueg@pqkcd.co', 'gckjqt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(141, 'Ichznppr Iswbdho', 'ncs@etlgb.org', 'iocfwx', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(142, 'Rnlffbfh Yxzu', 'jwocy@zqjzdh.co', 'rrrllktc', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(143, 'Nctpir Awon Dwwvu', 'buq@imcnl.org', 'odema', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(144, 'Unmax Omk', 'ywc@fqbkd.org', 'oizgqipz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(145, 'Ixr Dwsovhz', 'kgzskw@tkqcex.com', 'nxskyw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(146, 'Qizlzk Niss Mqa', 'hlnd@vilt.co', 'iafmeic', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(147, 'Uzxhrdj Zherus', 'avn@slonoa.net', 'udrnldkl', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(148, 'Fztag Enatjzw Clkk', 'lnc@qpton.com', 'lnbtodd', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(149, 'Ivazxzm Ojdhi Wka', 'iagtut@frs.co', 'phuraaai', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(150, 'Twdy Uumqadje Vvcvoi', 'wmtpbn@quiop.net', 'puwczda', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(151, 'Zgha Viyirojn Lsowrmv', 'jiqs@ricmz.com', 'avdqam', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(152, 'Hwfg Ohskkef Txx', 'bhpul@lwxqww.co', 'gdjgeqwa', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(153, 'Hlpudo Mnn Poua', 'gxjhzj@eplttr.co', 'bwucr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(154, 'Bvb Zvmxo Atkhqsqc', 'lhtb@fuikw.co', 'kcowuu', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(155, 'Fhpkde Hokqu Qvw', 'thhhug@zmfe.com', 'nipbn', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(156, 'Zockaad Lljre', 'tkh@dblpr.co', 'srwxoccs', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(157, 'Twqzs Tijvcwn Flrlukdi', 'ohqjh@aglgri.co', 'ldkdfrd', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(158, 'Jstc Rsxgy Fnhcb', 'pmesu@mtrv.org', 'fbktbw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(159, 'Ahoevnhx Rhhfob Ywcvh', 'tdoxq@ekiw.co', 'rzblm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(160, 'Lfib Vemunnlx Byk', 'vrgk@rerpti.net', 'zxhre', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(161, 'Xquezx Ugroohr Udidgv', 'tjhy@zky.com', 'fxwgpr', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(162, 'Eaccxkw Ixvfhq Awkf', 'jpye@vdgga.net', 'iekixe', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(163, 'Fcpxsc Kcfg', 'myh@mjti.com', 'spizhw', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(164, 'Zcy Ceglm Bgygfvt', 'vzqat@lgibyz.com', 'iajxm', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(165, 'Mkqlwhqn Hlvlz Ppx', 'oeoqx@pbpm.com', 'xnkeof', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(166, 'Iumjcafc Yvd', 'ueter@pjj.com', 'knkxt', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(167, 'Qfljnw Xgkfyln Kbiyspl', 'hju@fuwoh.co', 'phjbjy', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(168, 'Dlnbfrkv Emwytf', 'ynqm@zag.co', 'wekkoux', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(169, 'Ynkhtos Ytlucent Ilf', 'ldv@xlonvk.co', 'ecxepkmz', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(170, 'Xlu Hmj Ecsldje', 'dcpji@vpa.co', 'vkxgllis', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(171, 'Mbo Jkdq', 'kdor@fnyg.co', 'hptzif', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(172, 'Ftzqg Mnh', 'qyictm@yfpcv.co', 'aodak', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(173, 'Cqa Zyowd Sfqhkp', 'fbyz@nimdl.co', 'jydax', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(174, 'Necxsj Bhiqnvoc', 'enqm@ilx.co', 'oqfotpik', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(175, 'Udmom Kppzh Hfqsgbxi', 'syz@nhx.co', 'vydfmp', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00'),
(176, 'Omc Udcny Dgcnfjit', 'pmymxi@snebp.org', 'sgqsxdj', '', 'user', 0, '', '', 0, 0, 0, '', '', 0, 0, '2018-11-30 17:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_years`
--

CREATE TABLE `tbl_years` (
  `id` int(11) NOT NULL,
  `ssc_min` int(11) NOT NULL,
  `ssc_max` int(11) NOT NULL,
  `hsc_min` int(11) NOT NULL,
  `hsc_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_years`
--

INSERT INTO `tbl_years` (`id`, `ssc_min`, `ssc_max`, `hsc_min`, `hsc_max`) VALUES
(1, 1996, 2018, 1996, 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement_seen`
--
ALTER TABLE `tbl_announcement_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_boards`
--
ALTER TABLE `tbl_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_divisions`
--
ALTER TABLE `tbl_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_university`
--
ALTER TABLE `tbl_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_university_seen`
--
ALTER TABLE `tbl_university_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_years`
--
ALTER TABLE `tbl_years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_announcement_seen`
--
ALTER TABLE `tbl_announcement_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_boards`
--
ALTER TABLE `tbl_boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_divisions`
--
ALTER TABLE `tbl_divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_university`
--
ALTER TABLE `tbl_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_university_seen`
--
ALTER TABLE `tbl_university_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tbl_years`
--
ALTER TABLE `tbl_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
