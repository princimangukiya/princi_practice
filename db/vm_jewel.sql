-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 03:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_purchase`
--

INSERT INTO `d_purchase` (`d_id`, `c_id`, `s_id`, `d_barcode`, `d_wt`, `d_n_wt`, `d_col`, `d_pc`, `d_exp_pr`, `d_exp`, `d_cla`, `shape_id`, `d_wt_category`, `price`, `bill_date`, `doReady`, `isReady`, `isReturn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 7, '1007711', '0.270', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-18', NULL, NULL, NULL, '2021-08-29 11:45:51', '2021-09-24 01:40:13', NULL),
(3, 2, 7, '999702', '0.219', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:47:16', '2021-09-24 01:40:20', NULL),
(4, 2, 7, '999820', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:48:54', '2021-09-24 01:40:28', NULL),
(5, 2, 7, '999789', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:49:29', '2021-09-24 01:40:41', NULL),
(6, 2, 7, '1007595', '0.156', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:50:30', '2021-09-24 01:40:04', NULL),
(7, 2, 7, '999747', '0.224', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:50:53', '2021-09-24 01:41:00', NULL),
(8, 2, 7, '1007530', '0.315', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:51:27', '2021-09-24 01:57:59', NULL),
(9, 2, 7, '1007476', '0.177', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:51:52', '2021-09-24 01:41:17', NULL),
(10, 2, 7, '1007469', '0.253', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 58, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:52:20', '2021-09-24 01:57:07', NULL),
(11, 2, 7, '1008908', '0.299', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:52:41', '2021-09-24 01:58:18', NULL),
(12, 2, 7, '1046015', '0.286', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', 3, NULL, NULL, '2021-08-29 11:53:00', '2021-10-12 04:51:05', NULL),
(13, 2, 7, '1007580', '0.316', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:53:32', '2021-08-29 11:53:32', NULL),
(14, 2, 7, '1008854', '0.201', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:03', '2021-08-29 11:54:03', NULL),
(15, 2, 7, '1007666', '0.229', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:16', '2021-08-29 11:54:16', NULL),
(16, 2, 7, '1007563', '0.264', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:35', '2021-08-29 11:54:35', NULL),
(17, 2, 7, '1007706', '0.312', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:54:55', '2021-08-29 11:54:55', NULL),
(18, 2, 7, '1007559', '0.291', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:55:10', '2021-08-29 11:55:10', NULL),
(19, 2, 7, '1007630', '0.167', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:55:30', '2021-08-29 11:55:30', NULL),
(20, 2, 7, '1007629', '0.279', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:56:38', '2021-08-29 11:56:38', NULL),
(21, 2, 7, '1080997', '0.263', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:56:58', '2021-08-29 11:56:58', NULL),
(22, 2, 7, '1007566', '0.178', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:57:15', '2021-08-29 11:57:15', NULL),
(23, 2, 7, '1008915', '0.309', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:57:45', '2021-08-29 11:57:45', NULL),
(24, 2, 7, '1007470', '0.310', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:04', '2021-08-29 11:58:04', NULL),
(25, 2, 7, '1007616', '0.280', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:20', '2021-09-18 01:42:14', NULL),
(26, 2, 7, '1007582', '0.480', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:30', '2021-09-18 01:43:51', NULL),
(27, 2, 7, '999810', '0.312', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 40, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:58:47', '2021-09-24 01:58:37', NULL),
(28, 2, 7, '1007657', '0.300', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:59:04', '2021-09-18 01:57:35', NULL),
(29, 2, 7, '1007621', '0.344', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 40, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:59:17', '2021-09-18 01:51:19', NULL),
(30, 2, 7, '1007635', '0.160', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 55, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:59:35', '2021-09-18 01:54:07', NULL),
(31, 2, 7, '1007554', '0.225', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-29', NULL, NULL, NULL, '2021-08-29 11:59:47', '2021-09-18 01:52:05', NULL),
(32, 1, 1, '999708', '0.483', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 100, '2021-08-01', NULL, NULL, NULL, '2021-09-07 00:15:36', '2021-10-12 04:33:22', NULL),
(33, 1, 1, '101010', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-13', 1, NULL, NULL, '2021-09-07 00:39:57', '2021-10-09 07:49:05', NULL),
(34, 1, 8, '121212', '0.152', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-08-19', 1, NULL, NULL, '2021-09-07 01:15:58', '2021-10-09 07:49:12', NULL),
(35, 1, 1, '101011', '0.410', NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 100, '2021-08-12', NULL, NULL, NULL, '2021-09-07 03:56:57', '2021-10-11 00:48:27', NULL),
(36, 1, 1, '101012', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-08-19', 1, NULL, NULL, '2021-09-07 03:58:30', '2021-10-09 08:08:35', NULL),
(39, 1, 1, '1452368', '0.205', '0.150', NULL, NULL, NULL, NULL, NULL, 2, 1, 90, '2021-09-12', 1, 1, NULL, '2021-09-17 02:06:53', '2021-10-11 03:27:30', NULL),
(40, 1, 1, '12546', '0.125', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 55, '2021-09-08', 1, NULL, NULL, '2021-09-17 02:07:31', '2021-10-09 07:49:54', NULL),
(41, 1, 1, '021456', '0.125', '0.60', NULL, NULL, NULL, NULL, NULL, 1, 1, 50, '2021-09-03', 1, 1, 1, '2021-09-17 02:08:03', '2021-10-09 07:55:51', NULL),
(42, 1, 1, '459882', '0.85', '0.40', NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', 1, 1, 1, '2021-09-17 02:09:11', '2021-10-09 07:56:10', NULL),
(43, 1, 1, '4598823', '0.85', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', 4, NULL, NULL, '2021-09-17 02:09:33', '2021-10-09 07:50:15', NULL),
(44, 1, 1, '4598824', '0.85', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-08', 4, NULL, NULL, '2021-09-17 02:09:54', '2021-10-09 07:50:21', NULL),
(45, 1, 1, '456212', '0.52', '0.25', NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-09', 4, 1, 1, '2021-09-17 02:10:40', '2021-10-09 07:56:16', NULL),
(46, 1, 1, '456213', '0.52', '0.25', NULL, NULL, NULL, NULL, NULL, 2, 1, 55, '2021-09-09', 4, 1, NULL, '2021-09-17 03:17:20', '2021-10-09 07:54:35', NULL),
(47, 1, 8, '125436', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, '2021-09-11', 4, 1, 1, '2021-09-17 04:03:10', '2021-10-11 05:13:00', NULL),
(48, 1, 8, '1254387', '0.250', '0.140', NULL, NULL, NULL, NULL, NULL, 3, 2, 70, '2021-09-11', 4, 1, NULL, '2021-09-17 04:03:30', '2021-10-11 01:45:41', NULL),
(49, 1, 1, '456898', '0.250', '0.80', NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-14', 4, 1, NULL, '2021-09-17 07:56:04', '2021-10-09 07:51:32', NULL),
(50, 1, 8, '78965', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 50, '2021-09-17', NULL, NULL, NULL, '2021-09-17 21:59:32', '2021-09-17 21:59:32', NULL),
(51, 1, 1, '458961', '0.212', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 60, '2021-09-16', NULL, NULL, NULL, '2021-09-18 00:45:44', '2021-09-21 06:19:11', NULL),
(52, 1, 1, '4589621', '0.450', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-15', NULL, NULL, NULL, '2021-09-18 00:47:44', '2021-09-18 00:47:44', NULL),
(53, 1, 1, '14758585', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 55, '2021-09-17', NULL, NULL, NULL, '2021-09-18 04:47:48', '2021-10-06 06:25:35', NULL),
(54, 1, 8, '56446', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-16', NULL, NULL, NULL, '2021-09-18 05:41:37', '2021-09-18 05:41:37', NULL),
(55, 1, 1, '985632', '0.268', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 70, '2021-09-19', NULL, NULL, NULL, '2021-09-20 00:12:11', '2021-09-20 00:14:45', NULL),
(56, 1, 1, '985633', '0.269', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 70, '2021-09-19', 8, NULL, NULL, '2021-09-20 00:12:24', '2021-10-12 04:14:56', NULL),
(57, 1, 1, '985634', '0.270', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 45, '2021-09-19', NULL, NULL, NULL, '2021-09-20 00:12:32', '2021-10-09 06:40:20', NULL),
(58, 1, 1, '985635', '0.280', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 45, '2021-09-19', NULL, NULL, NULL, '2021-09-20 00:12:47', '2021-09-20 00:42:55', NULL),
(59, 1, 1, '985636', '0.480', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 80, '2021-09-19', NULL, NULL, NULL, '2021-09-20 00:12:56', '2021-09-20 00:46:39', NULL),
(60, 1, 1, '985637', '0.470', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-19', NULL, NULL, NULL, '2021-09-20 00:13:10', '2021-09-20 01:31:13', NULL),
(61, 1, 8, '9856321', '0.450', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-15', NULL, NULL, NULL, '2021-09-20 01:45:16', '2021-09-20 23:13:10', NULL),
(62, 1, 8, '9856322', '0.240', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-15', NULL, NULL, NULL, '2021-09-20 01:45:27', '2021-09-20 23:13:15', NULL),
(63, 1, 8, '9856323', '0.225', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 150, '2021-09-15', NULL, NULL, NULL, '2021-09-20 01:45:43', '2021-09-20 23:13:22', NULL),
(64, 1, 8, '9856324', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 90, '2021-09-19', NULL, NULL, NULL, '2021-09-20 01:48:57', '2021-09-20 23:13:27', NULL),
(65, 1, 1, '458612', '0.485', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-15', NULL, NULL, NULL, '2021-09-20 04:24:41', '2021-09-24 01:54:00', NULL),
(66, 1, 8, '123456789', '0.268', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-17', NULL, NULL, NULL, '2021-09-20 05:00:53', '2021-09-20 05:00:53', NULL),
(67, 1, 1, '458962', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 05:01:39', '2021-09-20 05:01:39', NULL),
(68, 1, 1, '789456123', '0.412', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-18', NULL, NULL, NULL, '2021-09-20 05:06:28', '2021-09-20 05:06:28', NULL),
(69, 1, 1, '985476', '0.426', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-11', NULL, NULL, NULL, '2021-09-20 06:42:47', '2021-09-20 06:42:47', NULL),
(70, 1, 1, '458621', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-19', NULL, NULL, NULL, '2021-09-20 07:11:18', '2021-09-20 07:11:18', NULL),
(71, 1, 1, '785241', '0.214', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:37:08', '2021-09-20 07:37:08', NULL),
(72, 1, 1, '9513574', '0.351', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 60, '2021-09-25', NULL, NULL, NULL, '2021-09-20 07:38:09', '2021-09-20 07:38:09', NULL),
(73, 1, 1, '7531598', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 07:39:37', '2021-09-20 07:39:37', NULL),
(74, 1, 1, '458968', '0.485', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 70, '2021-09-14', NULL, NULL, NULL, '2021-09-20 07:40:51', '2021-09-20 07:40:51', NULL),
(75, 1, 8, '651248', '0.351', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:42:20', '2021-09-20 07:42:20', NULL),
(76, 1, 8, '65249', '0.421', NULL, NULL, '20', NULL, NULL, NULL, 3, 3, 100, '2021-09-16', NULL, NULL, NULL, '2021-09-20 07:43:01', '2021-09-20 07:43:01', NULL),
(77, 1, 8, '965874', '0.254', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 95, '2021-09-12', NULL, NULL, NULL, '2021-09-20 07:44:07', '2021-09-20 07:44:07', NULL),
(78, 1, 8, '652143', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 95, '2021-09-19', NULL, NULL, NULL, '2021-09-20 07:52:43', '2021-09-20 07:52:43', NULL),
(79, 1, 1, '852369', '0.510', NULL, NULL, NULL, NULL, NULL, NULL, 3, 5, 200, '2021-09-16', NULL, NULL, NULL, '2021-09-20 22:13:03', '2021-09-28 07:31:51', NULL),
(80, 1, 8, '852147', '0.485', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-16', NULL, NULL, NULL, '2021-09-20 22:20:12', '2021-10-01 00:32:20', NULL),
(81, 1, 1, '741369', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-20', NULL, NULL, NULL, '2021-09-20 22:24:52', '2021-09-24 01:53:30', NULL),
(82, 1, 1, '896574', '0.452', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-15', NULL, NULL, NULL, '2021-09-20 22:26:24', '2021-10-09 07:08:24', NULL),
(83, 1, 8, '987456', '0.469', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 100, '2021-09-18', NULL, NULL, NULL, '2021-09-20 22:28:16', '2021-10-09 06:42:34', NULL),
(84, 1, 1, '457812', '0.212', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-18', NULL, NULL, NULL, '2021-09-20 22:28:49', '2021-10-09 05:51:23', NULL),
(85, 1, 1, '147896325', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-09-17', NULL, NULL, NULL, '2021-09-20 22:30:52', '2021-09-20 22:59:18', NULL),
(86, 1, 1, '74589632', '0.485', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 70, '2021-09-19', NULL, NULL, NULL, '2021-09-20 22:34:26', '2021-10-09 07:09:33', NULL),
(87, 1, 1, '1478952', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-18', NULL, NULL, NULL, '2021-09-20 22:38:54', '2021-10-09 07:19:05', NULL),
(88, 1, 8, '24578873', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 90, '2021-09-17', NULL, NULL, NULL, '2021-09-20 22:52:37', '2021-09-20 22:59:46', NULL),
(89, 1, 1, '1457872', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-17', NULL, NULL, NULL, '2021-09-20 22:57:24', '2021-10-09 05:31:59', NULL),
(90, 1, 1, '1458797', '0.265', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 60, '2021-09-18', NULL, NULL, NULL, '2021-09-20 22:58:19', '2021-10-09 05:32:27', NULL),
(91, 1, 1, '1452637', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 60, '2021-09-13', NULL, NULL, NULL, '2021-09-20 23:23:46', '2021-10-09 06:13:34', NULL),
(92, 1, 1, '7458961', '0.145', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-17', NULL, NULL, NULL, '2021-09-20 23:29:56', '2021-10-09 07:36:34', NULL),
(93, 1, 1, '1147852', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-02', NULL, NULL, NULL, '2021-09-21 05:30:23', '2021-10-09 05:51:43', NULL),
(94, 1, 8, '4785396', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-09-02', NULL, NULL, NULL, '2021-09-22 03:59:49', '2021-09-22 03:59:49', NULL),
(95, 1, 1, '74583', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-09-01', NULL, NULL, NULL, '2021-09-22 04:01:39', '2021-09-22 04:01:39', NULL),
(96, 1, 8, '456982', '0.245', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 70, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:38:15', '2021-09-22 22:38:15', NULL),
(97, 1, 1, '235468', '0.251', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 70, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:47:52', '2021-09-22 22:47:52', NULL),
(98, 1, 1, '4574884', '0.124', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 50, '2021-09-01', NULL, NULL, NULL, '2021-09-22 22:54:35', '2021-10-09 06:10:19', NULL),
(100, 1, 1, '789456', '0.460', '0.230', NULL, NULL, NULL, NULL, NULL, 1, 3, 100, '2021-10-11', 1, 1, NULL, '2021-10-11 07:41:15', '2021-10-11 22:52:53', NULL),
(101, 1, 14, '9999999', '0.250', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 100, '2021-10-12', NULL, NULL, NULL, '2021-10-12 03:42:43', '2021-10-12 04:00:21', NULL),
(102, 1, 14, '999999999', '0.25', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 100, '2021-10-01', NULL, NULL, NULL, '2021-10-12 03:48:44', '2021-10-12 04:34:01', '2021-10-12 04:34:01'),
(103, 1, 14, '151515', '0.283', '0.140', NULL, NULL, NULL, NULL, NULL, 2, 2, 100, '2021-10-12', 1, 1, NULL, '2021-10-12 03:54:51', '2021-10-12 03:59:29', NULL),
(104, 1, 14, '848484', '0.222', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 100, '2021-10-01', NULL, NULL, NULL, '2021-10-12 04:30:49', '2021-10-12 04:30:49', NULL),
(105, 1, 14, '546235', '0.125', '0.60', NULL, NULL, NULL, NULL, NULL, 1, 1, 90, '2021-10-05', 8, 1, NULL, '2021-10-12 04:56:29', '2021-10-12 07:18:24', NULL),
(106, 2, 7, '985472', '0.120', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 40, '2021-10-08', 6, NULL, NULL, '2021-10-12 04:58:01', '2021-10-12 04:58:18', NULL),
(107, 1, 14, '4556464', '0.240', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 100, '2021-10-12', NULL, NULL, NULL, '2021-10-12 06:04:19', '2021-10-12 06:04:19', NULL),
(108, 1, 14, '4585621', '0.150', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 90, '2021-10-11', NULL, NULL, NULL, '2021-10-12 07:33:52', '2021-10-12 07:33:52', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_details`
--

INSERT INTO `manager_details` (`m_id`, `c_id`, `m_name`, `m_address`, `m_phone`, `m_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'NARESHBHAI', 'VM JEWEL', '9979966346', 'naresh@gmail.com', '2021-07-31 13:05:36', '2021-07-31 13:05:36', NULL),
(3, 2, 'MAHESH', 'Varchha', '796541230', 'mahesh@gmail.com', '2021-09-18 01:40:58', '2021-09-18 01:40:58', NULL),
(4, 1, 'KAMLESH', 'hirabugh', '7096717095', 'kamlesh@gmail.com', '2021-09-21 06:24:42', '2021-10-12 07:44:16', NULL),
(6, 2, 'RAMESH', 'Rambag', '7096717096', 'ramesh@gmail.com', '2021-10-06 06:13:10', '2021-10-06 06:13:10', NULL),
(8, 1, 'rishi', 'hiranagar', '9512727308', 'rushikeshantala@gmail.com', '2021-10-12 03:36:07', '2021-10-12 07:39:33', NULL);

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
(1, 1, 1, '[{\"1\":\"50\",\"2\":\"70\",\"5\":\"150\",\"3\":\"100\"}]', '2021-10-06 05:31:23', '2021-10-06 05:37:56'),
(2, 1, 8, '[{\"1\":\"70\",\"5\":\"200\",\"2\":\"100\",\"3\":\"150\"}]', '2021-10-06 05:38:11', '2021-10-06 05:38:59'),
(3, 2, 7, '[{\"1\":\"40\",\"3\":\"90\",\"2\":\"70\",\"5\":\"120\"}]', '2021-10-06 05:39:28', '2021-10-06 05:40:43'),
(5, 1, 14, '[{\"1\":\"90\",\"2\":\"100\",\"3\":\"120\",\"5\":\"150\"}]', '2021-10-12 03:39:15', '2021-10-12 03:40:04');

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
  `status` tinyint(1) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ready_stock`
--

INSERT INTO `ready_stock` (`r_id`, `c_id`, `m_id`, `d_id`, `d_n_wt`, `d_barcode`, `status`, `bill_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 4, 48, '0.120', '1254387', 1, NULL, '2021-10-09 07:51:50', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(3, 1, 1, 39, '0.150', '1452368', 1, NULL, '2021-10-09 07:52:16', '2021-10-11 03:27:30', NULL),
(4, 1, 1, 36, '0.149', '101012', 0, NULL, '2021-10-09 07:52:29', '2021-10-09 08:08:35', '2021-10-09 08:08:35'),
(5, 1, 1, 35, '0.145', '101011', 0, NULL, '2021-10-09 07:52:48', '2021-10-09 08:11:40', '2021-10-09 08:11:40'),
(6, 1, 4, 47, '0.125', '125436', 0, NULL, '2021-10-09 07:54:14', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(7, 1, 4, 46, '0.25', '456213', 1, NULL, '2021-10-09 07:54:35', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(8, 1, 4, 45, '0.25', '456212', 0, NULL, '2021-10-09 07:54:52', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(9, 1, 1, 42, '0.40', '459882', 0, NULL, '2021-10-09 07:55:20', '2021-10-09 07:56:10', NULL),
(10, 1, 1, 41, '0.60', '021456', 0, NULL, '2021-10-09 07:55:32', '2021-10-09 07:55:51', NULL),
(17, 1, 1, 100, '0.230', '789456', 1, '2021-10-01', '2021-10-11 22:52:53', '2021-10-11 22:52:53', NULL),
(18, 1, 1, 103, '0.140', '151515', 1, '2021-10-12', '2021-10-12 03:59:29', '2021-10-12 03:59:29', NULL),
(19, 1, 8, 105, '0.60', '546235', 1, '2021-10-12', '2021-10-12 07:18:24', '2021-10-12 07:18:24', NULL);

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
  `status` tinyint(1) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_stock`
--

INSERT INTO `sell_stock` (`sell_id`, `c_id`, `s_id`, `d_id`, `d_barcode`, `status`, `bill_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 41, '021456', 1, NULL, '2021-10-09 07:55:51', '2021-10-11 05:26:46', NULL),
(2, 1, 1, 42, '459882', 1, NULL, '2021-10-09 07:56:10', '2021-10-11 05:27:06', NULL),
(3, 1, 1, 45, '456212', 1, NULL, '2021-10-09 07:56:16', '2021-10-09 07:56:16', NULL),
(4, 1, 8, 47, '125436', 1, NULL, '2021-10-09 07:56:29', '2021-10-11 05:17:11', NULL),
(5, 1, 1, 36, '101012', 0, NULL, '2021-10-09 07:56:43', '2021-10-09 08:06:55', '2021-10-09 08:06:55');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`s_id`, `c_id`, `s_name`, `s_address`, `s_gst`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ALOK IMPEX', 'PLOT NO - 2&3, THE PURSHOTTAM GINNING MILLS COMPOUND, KHAN BAZAR, A.K. ROAD, SURAT - 395006', '24AAACA1033E1ZL', '2021-07-31 11:56:26', '2021-07-31 11:56:26', NULL),
(7, 2, 'kikani jems', 'pramukh bulding', '24aakfk0018n1zd', '2021-08-11 02:42:32', '2021-08-11 02:42:32', NULL),
(8, 1, 'KIRAN', 'HIRABAG', '24AAACA1033E1Z', '2021-09-17 04:02:25', '2021-09-17 04:02:25', NULL),
(12, 2, 'GAJERA', 'Varchha', '24AAACA1033E1R', '2021-10-06 05:49:38', '2021-10-06 05:49:54', NULL),
(13, 1, 'RAVI EXPORT', 'sdffsdf', '24AAACA1033E1S', '2021-10-12 03:25:51', '2021-10-12 07:33:12', '2021-10-12 07:33:12'),
(14, 1, 'Ravi', 'eorpermemkv', 'wiinevjvnejvner', '2021-10-12 03:33:39', '2021-10-12 05:06:44', NULL),
(15, 1, 'KIRAN', 'hiurabag', '24AAACA1033E1P', '2021-10-12 03:36:52', '2021-10-12 03:36:57', '2021-10-12 03:36:57');

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
  `status` tinyint(1) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `working_stock`
--

INSERT INTO `working_stock` (`w_id`, `c_id`, `m_id`, `d_id`, `d_barcode`, `status`, `bill_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 33, '101010', 1, NULL, '2021-10-09 07:49:05', '2021-10-09 07:49:05', NULL),
(2, 1, 1, 34, '121212', 1, NULL, '2021-10-09 07:49:12', '2021-10-09 07:49:12', NULL),
(3, 1, 1, 35, '101011', 1, NULL, '2021-10-09 07:49:20', '2021-10-09 08:17:53', '2021-10-09 08:17:53'),
(4, 1, 1, 36, '101012', 1, NULL, '2021-10-09 07:49:25', '2021-10-09 08:08:35', NULL),
(5, 1, 1, 39, '1452368', 0, NULL, '2021-10-09 07:49:49', '2021-10-09 07:52:16', NULL),
(6, 1, 4, 40, '12546', 1, NULL, '2021-10-09 07:49:54', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(7, 1, 1, 41, '021456', 0, NULL, '2021-10-09 07:49:59', '2021-10-09 07:55:32', NULL),
(8, 1, 1, 42, '459882', 0, NULL, '2021-10-09 07:50:04', '2021-10-09 07:55:20', NULL),
(9, 1, 4, 43, '4598823', 1, '2021-10-11', '2021-10-09 07:50:15', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(10, 1, 4, 44, '4598824', 1, '2021-10-11', '2021-10-09 07:50:21', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(11, 1, 4, 45, '456212', 0, NULL, '2021-10-09 07:50:26', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(12, 1, 4, 46, '456213', 0, NULL, '2021-10-09 07:50:33', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(13, 1, 4, 47, '125436', 0, '2021-10-11', '2021-10-09 07:50:51', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(14, 1, 4, 48, '1254387', 0, NULL, '2021-10-09 07:50:57', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(15, 1, 4, 49, '456898', 0, '2021-10-11', '2021-10-09 07:51:05', '2021-10-12 07:44:16', '2021-10-12 07:44:16'),
(16, 1, 1, 100, '789456', 0, '2021-10-12', '2021-10-11 22:12:57', '2021-10-11 22:52:53', NULL),
(17, 1, 1, 101, '9999999', 0, '2021-10-11', '2021-10-12 03:58:58', '2021-10-12 04:00:21', '2021-10-12 04:00:21'),
(18, 1, 1, 103, '151515', 0, '2021-10-11', '2021-10-12 03:59:05', '2021-10-12 03:59:29', NULL),
(19, 1, 8, 56, '985633', 1, '2021-10-12', '2021-10-12 04:14:56', '2021-10-12 04:14:56', NULL),
(20, 2, 3, 12, '1046015', 1, '2021-10-01', '2021-10-12 04:51:05', '2021-10-12 04:51:05', NULL),
(21, 1, 8, 105, '546235', 0, '2021-10-07', '2021-10-12 04:57:20', '2021-10-12 07:18:24', NULL),
(22, 2, 6, 106, '985472', 1, '2021-10-07', '2021-10-12 04:58:18', '2021-10-12 04:58:18', NULL);

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
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `Rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sell_stock`
--
ALTER TABLE `sell_stock`
  MODIFY `sell_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `working_stock`
--
ALTER TABLE `working_stock`
  MODIFY `w_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
