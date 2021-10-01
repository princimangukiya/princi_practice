-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 03:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vm_jewel`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `c_id` int(15) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`c_id`, `c_name`, `created_at`, `updated_at`) VALUES
(1, 'VM JEWEL', NULL, NULL),
(2, 'EKLINGJI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diamond_shape`
--

CREATE TABLE `diamond_shape` (
  `shape_id` int(15) NOT NULL,
  `shape_name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diamond_shape`
--

INSERT INTO `diamond_shape` (`shape_id`, `shape_name`, `created_at`, `updated_at`) VALUES
(1, 'પાન | માર્કિસ | ઓવલ', NULL, NULL),
(2, 'ચોકી', NULL, NULL),
(3, 'એમરલ', NULL, NULL),
(4, 'કુસન', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `d_purchase`
--

CREATE TABLE `d_purchase` (
  `d_id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `s_id` int(15) NOT NULL,
  `d_barcode` varchar(150) NOT NULL,
  `d_wt` varchar(50) NOT NULL,
  `d_n_wt` varchar(50) DEFAULT NULL,
  `d_col` varchar(100) DEFAULT NULL,
  `d_pc` varchar(50) DEFAULT NULL,
  `d_exp_pr` varchar(50) DEFAULT NULL,
  `d_exp` varchar(50) DEFAULT NULL,
  `d_cla` varchar(50) DEFAULT NULL,
  `shape_id` int(20) NOT NULL,
  `d_wt_category` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `doReady` int(15) DEFAULT NULL,
  `isReady` tinyint(1) DEFAULT NULL,
  `isReturn` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_purchase`
--

INSERT INTO `d_purchase` (`d_id`, `c_id`, `s_id`, `d_barcode`, `d_wt`, `d_n_wt`, `d_col`, `d_pc`, `d_exp_pr`, `d_exp`, `d_cla`, `shape_id`, `d_wt_category`, `price`, `bill_date`, `doReady`, `isReady`, `isReturn`, `created_at`, `updated_at`) VALUES
(2, 2, 7, '1007711', '0.270', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-18', 3, NULL, NULL, '2021-08-29 11:45:51', '2021-09-24 01:40:13'),
(3, 2, 7, '999702', '0.219', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:47:16', '2021-09-24 01:40:20'),
(4, 2, 7, '999820', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:48:54', '2021-09-24 01:40:28'),
(5, 2, 7, '999789', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:49:29', '2021-09-24 01:40:41'),
(6, 2, 7, '1007595', '0.156', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:50:30', '2021-09-24 01:40:04'),
(7, 2, 7, '999747', '0.224', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:50:53', '2021-09-24 01:41:00'),
(8, 2, 7, '1007530', '0.315', '0.310', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, 1, 1, '2021-08-29 11:51:27', '2021-09-24 01:57:59'),
(9, 2, 7, '1007476', '0.177', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:51:52', '2021-09-24 01:41:17'),
(10, 2, 7, '1007469', '0.253', '0.245', NULL, NULL, NULL, NULL, NULL, 3, 2, 58, '2021-08-29', 3, 1, NULL, '2021-08-29 11:52:20', '2021-09-24 01:57:07'),
(11, 2, 7, '1008908', '0.299', '0.280', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, 1, 1, '2021-08-29 11:52:41', '2021-09-24 01:58:18'),
(12, 2, 7, '1046015', '0.286', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:53:00', '2021-08-29 11:53:00'),
(13, 2, 7, '1007580', '0.316', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:53:32', '2021-08-29 11:53:32'),
(14, 2, 7, '1008854', '0.201', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:03', '2021-08-29 11:54:03'),
(15, 2, 7, '1007666', '0.229', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:16', '2021-08-29 11:54:16'),
(16, 2, 7, '1007563', '0.264', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:35', '2021-08-29 11:54:35'),
(17, 2, 7, '1007706', '0.312', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:55', '2021-08-29 11:54:55'),
(18, 2, 7, '1007559', '0.291', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:55:10', '2021-08-29 11:55:10'),
(19, 2, 7, '1007630', '0.167', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:55:30', '2021-08-29 11:55:30'),
(20, 2, 7, '1007629', '0.279', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:56:38', '2021-08-29 11:56:38'),
(21, 2, 7, '1080997', '0.263', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:56:58', '2021-08-29 11:56:58'),
(22, 2, 7, '1007566', '0.178', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:57:15', '2021-08-29 11:57:15'),
(23, 2, 7, '1008915', '0.309', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:57:45', '2021-08-29 11:57:45'),
(24, 2, 7, '1007470', '0.310', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:04', '2021-08-29 11:58:04'),
(25, 2, 7, '1007616', '0.280', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:20', '2021-09-18 01:42:14'),
(26, 2, 7, '1007582', '0.480', '0.470', NULL, NULL, NULL, NULL, NULL, 3, 3, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:30', '2021-09-18 01:43:51'),
(27, 2, 7, '999810', '0.312', '0.308', NULL, NULL, NULL, NULL, NULL, 3, 2, 40, '2021-08-29', 3, 1, 1, '2021-08-29 11:58:47', '2021-09-24 01:58:37'),
(28, 2, 7, '1007657', '0.300', '0.285', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, 1, NULL, '2021-08-29 11:59:04', '2021-09-18 01:57:35'),
(29, 2, 7, '1007621', '0.344', '0.335', NULL, NULL, NULL, NULL, NULL, 3, 2, 40, '2021-08-29', 3, 1, NULL, '2021-08-29 11:59:17', '2021-09-18 01:51:19'),
(30, 2, 7, '1007635', '0.160', '0.150', NULL, NULL, NULL, NULL, NULL, 3, 1, 55, '2021-08-29', 1, 1, NULL, '2021-08-29 11:59:35', '2021-09-18 01:54:07'),
(31, 2, 7, '1007554', '0.225', '0.215', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, 1, 1, '2021-08-29 11:59:47', '2021-09-18 01:52:05'),
(32, 1, 7, '999703', '0.219', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-12', NULL, NULL, NULL, '2021-09-07 00:15:36', '2021-09-07 00:15:36'),
(33, 1, 1, '101010', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-13', NULL, NULL, NULL, '2021-09-07 00:39:57', '2021-09-07 00:39:57'),
(34, 1, 7, '121212', '0.152', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-19', NULL, NULL, NULL, '2021-09-07 01:15:58', '2021-09-07 01:15:58'),
(35, 1, 7, '101011', '0.285', '0.270', NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-12', 1, 1, NULL, '2021-09-07 03:56:57', '2021-09-16 05:02:43'),
(36, 1, 1, '101012', '0.285', '0.270', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-19', 1, 1, 1, '2021-09-07 03:58:30', '2021-09-20 00:18:03'),
(38, 2, 7, '145236', '0.125', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 50, '2021-08-12', NULL, NULL, NULL, '2021-09-17 01:56:28', '2021-09-17 01:56:28'),
(39, 1, 1, '1452368', '0.205', '0.199', NULL, NULL, NULL, NULL, NULL, 2, 1, 55, '2021-09-12', 1, 1, NULL, '2021-09-17 02:06:53', '2021-09-20 00:11:23'),
(40, 1, 1, '12546', '0.125', '0.120', NULL, NULL, NULL, NULL, NULL, 2, 1, 55, '2021-09-08', 1, 1, NULL, '2021-09-17 02:07:31', '2021-09-20 00:07:13'),
(41, 1, 1, '021456', '0.125', '0.123', NULL, NULL, NULL, NULL, NULL, 1, 1, 50, '2021-09-03', 1, 1, 1, '2021-09-17 02:08:03', '2021-09-22 07:52:36'),
(42, 1, 1, '459882', '0.85', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', NULL, NULL, NULL, '2021-09-17 02:09:11', '2021-09-17 02:09:11'),
(43, 1, 1, '4598823', '0.85', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', NULL, NULL, NULL, '2021-09-17 02:09:33', '2021-09-17 02:09:33'),
(44, 1, 1, '4598824', '0.85', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', NULL, NULL, NULL, '2021-09-17 02:09:54', '2021-09-17 02:09:54'),
(45, 1, 1, '456212', '0.52', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-09', NULL, NULL, NULL, '2021-09-17 02:10:40', '2021-09-17 02:10:40'),
(46, 1, 1, '456213', '0.52', '0.50', NULL, NULL, NULL, NULL, NULL, 2, 1, 55, '2021-09-09', 2, 1, 1, '2021-09-17 03:17:20', '2021-09-20 00:18:32'),
(47, 1, 8, '125436', '0.250', '0.240', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-11', 2, 1, 1, '2021-09-17 04:03:10', '2021-09-20 00:17:43'),
(48, 1, 8, '1254387', '0.250', '0.230', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-11', 2, 1, 1, '2021-09-17 04:03:30', '2021-09-17 07:01:48'),
(49, 1, 1, '456898', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-14', NULL, NULL, NULL, '2021-09-17 07:56:04', '2021-09-17 07:56:04'),
(50, 1, 8, '78965', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-17', NULL, NULL, NULL, '2021-09-17 21:59:32', '2021-09-17 21:59:32'),
(51, 1, 1, '458961', '0.212', '0.205', NULL, NULL, NULL, NULL, NULL, 1, 2, 60, '2021-09-16', 1, 1, 1, '2021-09-18 00:45:44', '2021-09-21 06:19:11'),
(52, 1, 1, '4589621', '0.450', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-15', NULL, NULL, NULL, '2021-09-18 00:47:44', '2021-09-18 00:47:44'),
(53, 1, 1, '14758585', '0.254', '0.248', NULL, NULL, NULL, NULL, NULL, 1, 2, 55, '2021-09-17', 1, 1, NULL, '2021-09-18 04:47:48', '2021-09-18 05:46:55'),
(54, 1, 8, '56446', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-16', NULL, NULL, NULL, '2021-09-18 05:41:37', '2021-09-18 05:41:37'),
(55, 1, 1, '985632', '0.268', '0.260', NULL, NULL, NULL, NULL, NULL, 2, 2, 70, '2021-09-19', 1, 1, NULL, '2021-09-20 00:12:11', '2021-09-20 00:14:45'),
(56, 1, 1, '985633', '0.269', '0.260', NULL, NULL, NULL, NULL, NULL, 2, 2, 70, '2021-09-19', 1, 1, NULL, '2021-09-20 00:12:24', '2021-09-20 00:16:13'),
(57, 1, 1, '985634', '0.270', '0.265', NULL, NULL, NULL, NULL, NULL, 2, 2, 45, '2021-09-19', 1, 1, NULL, '2021-09-20 00:12:32', '2021-09-20 00:37:43'),
(58, 1, 1, '985635', '0.280', '0.275', NULL, NULL, NULL, NULL, NULL, 2, 2, 45, '2021-09-19', 1, 1, NULL, '2021-09-20 00:12:47', '2021-09-20 00:42:55'),
(59, 1, 1, '985636', '0.480', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 80, '2021-09-19', 1, NULL, NULL, '2021-09-20 00:12:56', '2021-09-20 00:46:39'),
(60, 1, 1, '985637', '0.470', '0.475', NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-19', 1, 1, NULL, '2021-09-20 00:13:10', '2021-09-20 01:31:13'),
(61, 1, 8, '9856321', '0.450', '0.445', NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-15', 2, 1, 1, '2021-09-20 01:45:16', '2021-09-20 23:13:10'),
(62, 1, 8, '9856322', '0.240', '0.235', NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-15', 2, 1, 1, '2021-09-20 01:45:27', '2021-09-20 23:13:15'),
(63, 1, 8, '9856323', '0.225', '0.215', NULL, NULL, NULL, NULL, NULL, 3, 2, 150, '2021-09-15', 2, 1, 1, '2021-09-20 01:45:43', '2021-09-20 23:13:22'),
(64, 1, 8, '9856324', '0.285', '0.284', NULL, NULL, NULL, NULL, NULL, 3, 2, 90, '2021-09-19', 2, 1, 1, '2021-09-20 01:48:57', '2021-09-20 23:13:27'),
(65, 1, 1, '458612', '0.485', '0.480', NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-15', 1, 1, NULL, '2021-09-20 04:24:41', '2021-09-24 01:54:00'),
(66, 1, 8, '123456789', '0.268', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-17', NULL, NULL, NULL, '2021-09-20 05:00:53', '2021-09-20 05:00:53'),
(67, 1, 1, '458962', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 05:01:39', '2021-09-20 05:01:39'),
(68, 1, 1, '789456123', '0.412', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-18', NULL, NULL, NULL, '2021-09-20 05:06:28', '2021-09-20 05:06:28'),
(69, 1, 1, '985476', '0.426', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-11', NULL, NULL, NULL, '2021-09-20 06:42:47', '2021-09-20 06:42:47'),
(70, 1, 1, '458621', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-19', NULL, NULL, NULL, '2021-09-20 07:11:18', '2021-09-20 07:11:18'),
(71, 1, 1, '785241', '0.214', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:37:08', '2021-09-20 07:37:08'),
(72, 1, 1, '9513574', '0.351', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 60, '2021-09-25', NULL, NULL, NULL, '2021-09-20 07:38:09', '2021-09-20 07:38:09'),
(73, 1, 1, '7531598', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 07:39:37', '2021-09-20 07:39:37'),
(74, 1, 1, '458968', '0.485', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-14', NULL, NULL, NULL, '2021-09-20 07:40:51', '2021-09-20 07:40:51'),
(75, 1, 8, '651248', '0.351', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:42:20', '2021-09-20 07:42:20'),
(76, 1, 8, '65249', '0.421', NULL, NULL, '20', NULL, NULL, NULL, 3, 3, 100, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:43:01', '2021-09-20 07:43:01'),
(77, 1, 8, '965874', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-12', NULL, NULL, NULL, '2021-09-20 07:44:07', '2021-09-20 07:44:07'),
(78, 1, 8, '652143', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-19', NULL, NULL, NULL, '2021-09-20 07:52:43', '2021-09-20 07:52:43'),
(79, 1, 1, '852369', '0.510', '0.250', NULL, NULL, NULL, NULL, NULL, 3, 5, 200, '2021-09-16', 1, 1, NULL, '2021-09-20 22:13:03', '2021-09-28 07:31:51'),
(80, 1, 8, '852147', '0.485', '0.240', NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-16', 1, 1, 1, '2021-09-20 22:20:12', '2021-10-01 00:32:20'),
(81, 1, 1, '741369', '0.245', '0.235', NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-20', 1, 1, NULL, '2021-09-20 22:24:52', '2021-09-24 01:53:30'),
(82, 1, 1, '896574', '0.452', '0.443', NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-15', 1, 1, NULL, '2021-09-20 22:26:24', '2021-09-24 01:54:25'),
(83, 1, 8, '987456', '0.469', '0.234', NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-18', 1, 1, NULL, '2021-09-20 22:28:16', '2021-09-28 05:09:02'),
(84, 1, 1, '457812', '0.212', '0.106', NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-18', 1, 1, NULL, '2021-09-20 22:28:49', '2021-09-28 07:23:47'),
(85, 1, 1, '147896325', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-09-17', 1, NULL, NULL, '2021-09-20 22:30:52', '2021-09-20 22:59:18'),
(86, 1, 1, '74589632', '0.485', '0.290', NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-19', 1, 1, NULL, '2021-09-20 22:34:26', '2021-09-28 07:26:03'),
(87, 1, 1, '1478952', '0.245', '0.120', NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-18', 1, 1, NULL, '2021-09-20 22:38:54', '2021-09-28 07:26:20'),
(88, 1, 8, '24578873', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 90, '2021-09-17', 1, NULL, NULL, '2021-09-20 22:52:37', '2021-09-20 22:59:46'),
(89, 1, 1, '1457872', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 22:57:24', '2021-09-20 22:57:24'),
(90, 1, 1, '1458797', '0.265', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-18', NULL, NULL, NULL, '2021-09-20 22:58:19', '2021-09-20 22:58:19'),
(91, 1, 1, '1452637', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-13', NULL, NULL, NULL, '2021-09-20 23:23:46', '2021-09-20 23:23:46'),
(92, 1, 1, '7458961', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-17', NULL, NULL, NULL, '2021-09-20 23:29:56', '2021-09-20 23:29:56'),
(93, 1, 1, '1147852', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-02', NULL, NULL, NULL, '2021-09-21 05:30:23', '2021-09-21 05:30:23'),
(94, 1, 8, '4785396', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 90, '2021-09-02', NULL, NULL, NULL, '2021-09-22 03:59:49', '2021-09-22 03:59:49'),
(95, 1, 1, '74583', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-09-01', NULL, NULL, NULL, '2021-09-22 04:01:39', '2021-09-22 04:01:39'),
(96, 1, 8, '456982', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:38:15', '2021-09-22 22:38:15'),
(97, 1, 1, '235468', '0.251', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:47:52', '2021-09-22 22:47:52'),
(98, 1, 1, '4574884', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 50, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:54:35', '2021-09-22 22:54:35'),
(99, 1, 8, '7893254', '0.265', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-24', NULL, NULL, NULL, '2021-09-24 01:16:39', '2021-09-24 01:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_details`
--

CREATE TABLE `manager_details` (
  `m_id` int(10) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_address` varchar(500) NOT NULL,
  `m_phone` varchar(10) NOT NULL,
  `m_email` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_details`
--

INSERT INTO `manager_details` (`m_id`, `c_id`, `m_name`, `m_address`, `m_phone`, `m_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'NARESHBHAI', 'VM JEWEL', '9979966346', 'naresh@gmail.com', '2021-07-31 13:05:36', '2021-07-31 13:05:36'),
(3, 2, 'MAHESH', 'Varchha', '796541230', 'mahesh@gmail.com', '2021-09-18 01:40:58', '2021-09-18 01:40:58'),
(4, 1, 'KAMLESH', 'hirabugh', '7096717095', 'kamlesh@gmail.com', '2021-09-21 06:24:42', '2021-09-21 06:24:42'),
(5, 2, 'RAMESH', 'Varchha', '6541239807', 'ramesh@gmail.com', '2021-09-24 01:56:09', '2021-09-24 01:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$iu9w73RXoYdIiBcAlFtnluB5Qv718FQm7yaRw.rW0pkyIsvSPtPA2', '2021-07-17 05:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `r_id` int(11) NOT NULL,
  `wt_category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`r_id`, `wt_category`, `created_at`, `updated_at`) VALUES
(1, '0.010-0.209', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '0.210-0.409', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '0.410-5.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '0.501-6.000', '2021-09-18 04:53:44', '2021-09-18 04:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `rate_masters`
--

CREATE TABLE `rate_masters` (
  `Rate_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `json_price` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_masters`
--

INSERT INTO `rate_masters` (`Rate_id`, `c_id`, `s_id`, `json_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '[{\"1\":\"50\",\"3\":\"70\",\"2\":\"60\",\"5\":\"200\"}]', '2021-09-16 09:20:50', '2021-09-23 07:42:44'),
(4, 2, 7, '[{\"1\":\"80\",\"3\":\"100\",\"2\":\"50\",\"5\":\"110\"}]', '2021-09-17 00:54:52', '2021-09-24 01:46:23'),
(6, 1, 8, '[{\"1\":\"30\",\"2\":\"60\",\"3\":\"70\",\"5\":\"80\"}]', NULL, '2021-09-23 07:46:02'),
(10, 2, 11, '[{\"1\":\"50\",\"2\":\"70\",\"3\":\"90\",\"5\":\"120\"}]', '2021-09-24 07:14:31', '2021-09-24 01:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `ready_stock`
--

CREATE TABLE `ready_stock` (
  `r_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `m_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `d_n_wt` varchar(50) DEFAULT NULL,
  `d_barcode` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ready_stock`
--

INSERT INTO `ready_stock` (`r_id`, `c_id`, `m_id`, `d_id`, `d_n_wt`, `d_barcode`, `created_at`, `updated_at`) VALUES
(10, 2, 3, 29, '0.335', '1007621', '2021-09-18 01:51:19', '2021-09-18 01:51:19'),
(13, 2, 3, 28, '0.285', '1007657', '2021-09-18 01:57:35', '2021-09-18 01:57:35'),
(16, 1, 1, 53, '0.248', '14758585', '2021-09-18 05:46:55', '2021-09-18 05:46:55'),
(17, 1, 1, 40, '0.120', '12546', '2021-09-20 00:07:13', '2021-09-20 00:07:13'),
(18, 1, 1, 39, '0.199', '1452368', '2021-09-20 00:11:23', '2021-09-20 00:11:23'),
(19, 1, 1, 55, '0.260', '985632', '2021-09-20 00:14:45', '2021-09-20 00:14:45'),
(20, 1, 1, 56, '0.260', '985633', '2021-09-20 00:16:13', '2021-09-20 00:16:13'),
(21, 1, 1, 57, '0.265', '985634', '2021-09-20 00:37:43', '2021-09-20 00:37:43'),
(24, 1, 1, 60, '0.475', '985637', '2021-09-20 01:31:13', '2021-09-20 01:31:13'),
(30, 1, 1, 81, '0.235', '741369', '2021-09-24 01:53:30', '2021-09-24 01:53:30'),
(31, 1, 1, 65, '0.480', '458612', '2021-09-24 01:54:00', '2021-09-24 01:54:00'),
(32, 1, 1, 82, '0.443', '896574', '2021-09-24 01:54:25', '2021-09-24 01:54:25'),
(34, 2, 3, 10, '0.245', '1007469', '2021-09-24 01:57:07', '2021-09-24 01:57:07'),
(36, 1, 1, 83, '0.234', '987456', '2021-09-28 05:09:02', '2021-09-28 05:09:02'),
(79, 1, 1, 84, '0.106', '457812', '2021-09-28 07:23:47', '2021-09-28 07:23:47'),
(80, 1, 1, 86, '0.290', '74589632', '2021-09-28 07:26:03', '2021-09-28 07:26:03'),
(82, 1, 1, 87, '0.120', '1478952', '2021-09-28 07:26:20', '2021-09-28 07:26:20'),
(98, 1, 1, 79, '0.250', '852369', '2021-09-28 07:31:51', '2021-09-28 07:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `sell_stock`
--

CREATE TABLE `sell_stock` (
  `sell_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `s_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `d_barcode` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_stock`
--

INSERT INTO `sell_stock` (`sell_id`, `c_id`, `s_id`, `d_id`, `d_barcode`, `created_at`, `updated_at`) VALUES
(5, 2, 7, 31, '1007554', '2021-09-18 01:52:05', '2021-09-18 01:52:05'),
(6, 1, 8, 47, '125436', '2021-09-20 00:17:43', '2021-09-20 00:17:43'),
(7, 1, 1, 36, '101012', '2021-09-20 00:18:03', '2021-09-20 00:18:03'),
(8, 1, 1, 46, '456213', '2021-09-20 00:18:32', '2021-09-20 00:18:32'),
(9, 1, 8, 61, '9856321', '2021-09-20 23:13:10', '2021-09-20 23:13:10'),
(10, 1, 8, 62, '9856322', '2021-09-20 23:13:15', '2021-09-20 23:13:15'),
(11, 1, 8, 63, '9856323', '2021-09-20 23:13:22', '2021-09-20 23:13:22'),
(12, 1, 8, 64, '9856324', '2021-09-20 23:13:27', '2021-09-20 23:13:27'),
(13, 1, 1, 51, '458961', '2021-09-21 06:19:11', '2021-09-21 06:19:11'),
(14, 1, 1, 41, '021456', '2021-09-22 07:52:36', '2021-09-22 07:52:36'),
(15, 2, 7, 8, '1007530', '2021-09-24 01:57:59', '2021-09-24 01:57:59'),
(16, 2, 7, 11, '1008908', '2021-09-24 01:58:18', '2021-09-24 01:58:18'),
(17, 2, 7, 27, '999810', '2021-09-24 01:58:37', '2021-09-24 01:58:37'),
(18, 1, 8, 80, '852147', '2021-10-01 00:32:20', '2021-10-01 00:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `s_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `s_name` varchar(150) NOT NULL,
  `s_address` varchar(200) DEFAULT NULL,
  `s_gst` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`s_id`, `c_id`, `s_name`, `s_address`, `s_gst`, `created_at`, `updated_at`) VALUES
(1, 1, 'ALOK IMPEX', 'PLOT NO - 2&3, THE PURSHOTTAM GINNING MILLS COMPOUND, KHAN BAZAR, A.K. ROAD, SURAT - 395006', '24AAACA1033E1ZL', '2021-07-31 11:56:26', '2021-07-31 11:56:26'),
(7, 2, 'kikani jems', 'pramukh bulding', '24aakfk0018n1zd', '2021-08-11 02:42:32', '2021-08-11 02:42:32'),
(8, 1, 'KIRAN', 'HIRABAG', '24AAACA1033E1Z', '2021-09-17 04:02:25', '2021-09-17 04:02:25'),
(11, 2, 'GAJERA', 'varchha', '24AAACA1033E1Y', '2021-09-24 01:43:37', '2021-09-24 01:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UciKUhn6HK3fGVx1/d..o.ZkMop7iWyJjNTqjPYOaHcLIsf3okEFO', NULL, '2021-07-01 12:40:38', '2021-07-01 12:40:38'),
(2, 'gbm', 'gbm@gmail.com', NULL, '$2y$10$Q5bZdekXn6LdU/FkOb7BrOn39Z4TJ5GsxHIjGVDIW29M/t1k6tsCa', 'XuHr7DtQJIHmbl8pdiL6zTscLAfwRlAgrGhnlKcCZ5aj4JsMQZKHboGCVyBC', '2021-07-19 16:56:33', '2021-07-19 16:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `working_stock`
--

CREATE TABLE `working_stock` (
  `w_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `m_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `d_barcode` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `working_stock`
--

INSERT INTO `working_stock` (`w_id`, `c_id`, `m_id`, `d_id`, `d_barcode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 1, 1, 79, '852369', '2021-09-20 22:59:01', '2021-09-28 07:31:51', '2021-09-28 13:01:51'),
(30, 1, 1, 80, '852147', '2021-09-20 22:59:07', '2021-09-28 07:32:31', '2021-09-28 13:02:31'),
(31, 1, 1, 85, '147896325', '2021-09-20 22:59:18', '2021-09-20 22:59:18', NULL),
(32, 1, 1, 88, '24578873', '2021-09-20 22:59:46', '2021-09-20 22:59:46', NULL),
(33, 1, 1, 87, '1478952', '2021-09-20 22:59:55', '2021-09-20 22:59:55', NULL),
(34, 1, 1, 86, '74589632', '2021-09-20 23:00:03', '2021-09-20 23:00:03', NULL),
(36, 1, 1, 83, '987456', '2021-09-20 23:00:39', '2021-09-20 23:00:39', NULL),
(41, 2, 3, 6, '1007595', '2021-09-24 01:40:04', '2021-09-24 01:40:04', NULL),
(42, 2, 3, 2, '1007711', '2021-09-24 01:40:13', '2021-09-24 01:40:13', NULL),
(43, 2, 3, 3, '999702', '2021-09-24 01:40:20', '2021-09-24 01:40:20', NULL),
(44, 2, 3, 4, '999820', '2021-09-24 01:40:28', '2021-09-24 01:40:28', NULL),
(45, 2, 3, 5, '999789', '2021-09-24 01:40:40', '2021-09-24 01:40:40', NULL),
(46, 2, 3, 7, '999747', '2021-09-24 01:41:00', '2021-09-24 01:41:00', NULL),
(48, 2, 3, 9, '1007476', '2021-09-24 01:41:17', '2021-09-24 01:41:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `diamond_shape`
--
ALTER TABLE `diamond_shape`
  ADD PRIMARY KEY (`shape_id`);

--
-- Indexes for table `d_purchase`
--
ALTER TABLE `d_purchase`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `diamond_barcode_unique` (`d_barcode`),
  ADD KEY `shape_id` (`shape_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manager_details`
--
ALTER TABLE `manager_details`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_phone` (`m_phone`),
  ADD KEY `company_id` (`c_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `rate_masters`
--
ALTER TABLE `rate_masters`
  ADD PRIMARY KEY (`Rate_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `m_id` (`m_id`,`d_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `d_barcode` (`d_barcode`),
  ADD KEY `m_id_2` (`m_id`,`d_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `sell_stock`
--
ALTER TABLE `sell_stock`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`,`d_id`,`d_barcode`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_stock`
--
ALTER TABLE `working_stock`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `d_barcode` (`d_barcode`),
  ADD KEY `m_id` (`m_id`,`d_id`),
  ADD KEY `d_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diamond_shape`
--
ALTER TABLE `diamond_shape`
  MODIFY `shape_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `d_purchase`
--
ALTER TABLE `d_purchase`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate_masters`
--
ALTER TABLE `rate_masters`
  MODIFY `Rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `sell_stock`
--
ALTER TABLE `sell_stock`
  MODIFY `sell_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `working_stock`
--
ALTER TABLE `working_stock`
  MODIFY `w_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_purchase`
--
ALTER TABLE `d_purchase`
  ADD CONSTRAINT `d_purchase_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_purchase_ibfk_2` FOREIGN KEY (`shape_id`) REFERENCES `diamond_shape` (`shape_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_purchase_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `supplier_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager_details`
--
ALTER TABLE `manager_details`
  ADD CONSTRAINT `manager_details_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_masters`
--
ALTER TABLE `rate_masters`
  ADD CONSTRAINT `rate_masters_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `supplier_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_masters_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD CONSTRAINT `ready_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`),
  ADD CONSTRAINT `ready_stock_ibfk_2` FOREIGN KEY (`d_barcode`) REFERENCES `d_purchase` (`d_barcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ready_stock_ibfk_3` FOREIGN KEY (`m_id`) REFERENCES `manager_details` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ready_stock_ibfk_4` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell_stock`
--
ALTER TABLE `sell_stock`
  ADD CONSTRAINT `sell_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`),
  ADD CONSTRAINT `sell_stock_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `supplier_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_stock_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD CONSTRAINT `supplier_details_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`);

--
-- Constraints for table `working_stock`
--
ALTER TABLE `working_stock`
  ADD CONSTRAINT `working_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`),
  ADD CONSTRAINT `working_stock_ibfk_2` FOREIGN KEY (`d_barcode`) REFERENCES `d_purchase` (`d_barcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `working_stock_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `working_stock_ibfk_4` FOREIGN KEY (`m_id`) REFERENCES `manager_details` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
