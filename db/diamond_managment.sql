-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamond_managment`
--

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
(1, 'પાન', NULL, NULL),
(2, 'ઓવલ', NULL, NULL),
(3, 'એમરલ', NULL, NULL),
(4, 'ચોકી', NULL, NULL),
(5, 'કુસન', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `d_purchase`
--

CREATE TABLE `d_purchase` (
  `d_id` int(15) NOT NULL,
  `d_barcode` varchar(150) NOT NULL,
  `d_wt` varchar(50) NOT NULL,
  `d_col` varchar(100) DEFAULT NULL,
  `d_pc` varchar(50) DEFAULT NULL,
  `d_exp_pr` varchar(50) DEFAULT NULL,
  `d_exp` varchar(50) DEFAULT NULL,
  `d_cla` varchar(50) DEFAULT NULL,
  `shape_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_purchase`
--

INSERT INTO `d_purchase` (`d_id`, `d_barcode`, `d_wt`, `d_col`, `d_pc`, `d_exp_pr`, `d_exp`, `d_cla`, `shape_id`, `created_at`, `updated_at`) VALUES
(2, '121212', '222', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 04:43:41', '2021-06-30 04:43:41'),
(5, '5555', '8888', NULL, NULL, NULL, NULL, NULL, 4, '2021-06-30 05:07:03', '2021-06-30 05:07:03'),
(6, '121212111', '8548', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 05:08:31', '2021-06-30 05:08:31'),
(7, '11111111', '8888888', NULL, NULL, NULL, NULL, NULL, 4, '2021-06-30 05:54:18', '2021-06-30 05:54:18'),
(8, '55555', '888', NULL, NULL, NULL, NULL, NULL, 5, '2021-06-30 05:59:32', '2021-06-30 05:59:32'),
(9, '1212121', '22', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 06:00:54', '2021-06-30 06:00:54'),
(10, '8755', '65', NULL, NULL, NULL, NULL, NULL, 2, '2021-06-30 06:01:09', '2021-06-30 06:01:09'),
(12, '2525', '52', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 06:14:25', '2021-06-30 06:14:25'),
(13, '3232', '32', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 06:15:43', '2021-06-30 06:15:43'),
(14, '5554', '54', NULL, NULL, NULL, NULL, NULL, 1, '2021-06-30 06:16:49', '2021-06-30 06:16:49'),
(17, '87968', '96', NULL, NULL, NULL, NULL, NULL, 2, '2021-06-30 06:24:11', '2021-06-30 06:24:11'),
(18, '87969', '96', NULL, NULL, NULL, NULL, NULL, 2, '2021-06-30 06:25:00', '2021-06-30 06:25:00');

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

INSERT INTO `manager_details` (`m_id`, `m_name`, `m_address`, `m_phone`, `m_email`, `created_at`, `updated_at`) VALUES
(2, 'pk', 'pk', '8320576969', 'pk@gmail.com', '2021-06-26 03:08:37', '2021-06-26 03:10:20');

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

-- --------------------------------------------------------

--
-- Table structure for table `ready_stock`
--

CREATE TABLE `ready_stock` (
  `r_id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `d_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `s_id` int(15) NOT NULL,
  `s_name` varchar(150) NOT NULL,
  `s_address` varchar(200) DEFAULT NULL,
  `s_gst` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`s_id`, `s_name`, `s_address`, `s_gst`, `created_at`, `updated_at`) VALUES
(2, 'PARTH ENTERPRISE', 'MORBI', 'DERS659875WWER', '2021-06-23 01:17:11', '2021-06-23 02:35:54');

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

-- --------------------------------------------------------

--
-- Table structure for table `working_stock`
--

CREATE TABLE `working_stock` (
  `w_id` int(15) NOT NULL,
  `c_id` int(15) NOT NULL,
  `diamond_array` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
  ADD KEY `shape_id` (`shape_id`);

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
  ADD UNIQUE KEY `m_phone` (`m_phone`);

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
-- Indexes for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diamond_shape`
--
ALTER TABLE `diamond_shape`
  MODIFY `shape_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `d_purchase`
--
ALTER TABLE `d_purchase`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
