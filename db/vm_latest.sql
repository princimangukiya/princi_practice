-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 11:53 AM
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
-- Database: `vm`
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
  `doReady` int(15) DEFAULT NULL,
  `isReady` tinyint(1) DEFAULT NULL,
  `isReturn` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_purchase`
--

INSERT INTO `d_purchase` (`d_id`, `c_id`, `s_id`, `d_barcode`, `d_wt`, `d_n_wt`, `d_col`, `d_pc`, `d_exp_pr`, `d_exp`, `d_cla`, `shape_id`, `doReady`, `isReady`, `isReturn`, `created_at`, `updated_at`) VALUES
(2, 2, 7, '1007711', '0.270', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:45:51', '2021-08-29 11:45:51'),
(3, 2, 7, '999702', '0.219', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:47:16', '2021-08-29 11:47:16'),
(4, 2, 7, '999820', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:48:54', '2021-08-29 11:48:54'),
(5, 2, 7, '999789', '0.197', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:49:29', '2021-08-29 11:49:29'),
(6, 2, 7, '1007595', '0.156', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:50:30', '2021-08-29 11:50:30'),
(7, 2, 7, '999747', '0.224', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:50:53', '2021-08-29 11:50:53'),
(8, 2, 7, '1007530', '0.315', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:51:27', '2021-08-29 11:51:27'),
(9, 2, 7, '1007476', '0.177', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:51:52', '2021-08-29 11:51:52'),
(10, 2, 7, '1007469', '0.253', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:52:20', '2021-08-29 11:52:20'),
(11, 2, 7, '1008908', '0.299', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:52:41', '2021-08-29 11:52:41'),
(12, 2, 7, '1046015', '0.286', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:53:00', '2021-08-29 11:53:00'),
(13, 2, 7, '1007580', '.316', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:53:32', '2021-08-29 11:53:32'),
(14, 2, 7, '1008854', '0.201', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:54:03', '2021-08-29 11:54:03'),
(15, 2, 7, '1007666', '0.229', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:54:16', '2021-08-29 11:54:16'),
(16, 2, 7, '1007563', '0.264', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:54:35', '2021-08-29 11:54:35'),
(17, 2, 7, '1007706', '0.312', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:54:55', '2021-08-29 11:54:55'),
(18, 2, 7, '1007559', '0.291', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:55:10', '2021-08-29 11:55:10'),
(19, 2, 7, '1007630', '0.167', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:55:30', '2021-08-29 11:55:30'),
(20, 2, 7, '1007629', '0.279', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:56:38', '2021-08-29 11:56:38'),
(21, 2, 7, '1080997', '0.263', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:56:58', '2021-08-29 11:56:58'),
(22, 2, 7, '1007566', '0.178', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:57:15', '2021-08-29 11:57:15'),
(23, 2, 7, '1008915', '0.309', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:57:45', '2021-08-29 11:57:45'),
(24, 2, 7, '1007470', '0.310', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:58:04', '2021-08-29 11:58:04'),
(25, 2, 7, '1007616', '0.280', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:58:20', '2021-08-29 11:58:20'),
(26, 2, 7, '1007582', '`0.480', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:58:30', '2021-08-29 11:58:30'),
(27, 2, 7, '999810', '0.312', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:58:47', '2021-08-29 11:58:47'),
(28, 2, 7, '1007657', '0.300', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:59:04', '2021-08-29 11:59:04'),
(29, 2, 7, '1007621', '0.344', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:59:17', '2021-08-29 11:59:17'),
(30, 2, 7, '1007635', '0.160', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:59:35', '2021-08-29 11:59:35'),
(31, 2, 7, '1007554', '0.225', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-08-29 11:59:47', '2021-08-29 11:59:47'),
(32, 1, 7, '999703', '0.219', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 00:15:36', '2021-09-07 00:15:36'),
(33, 1, 1, '101010', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 00:39:57', '2021-09-07 00:39:57'),
(34, 1, 7, '121212', '0.152', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 01:15:58', '2021-09-07 01:15:58'),
(35, 1, 7, '101011', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 03:56:57', '2021-09-07 03:56:57'),
(36, 1, 1, '101012', '0.285', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 03:58:30', '2021-09-07 03:58:30'),
(37, 1, 7, '101020', '0.286', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2021-09-07 04:12:59', '2021-09-07 04:12:59');

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
(1, 1, 'NARESHBHAI', 'VM JEWEL', '9979966346', 'naresh@gmail.com', '2021-07-31 13:05:36', '2021-07-31 13:05:36');

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
  `Rates` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`r_id`, `Rates`, `created_at`, `updated_at`) VALUES
(1, '0.010-0.209', 0, 0),
(2, '0.210-0.409', 0, 0),
(3, '0.410-5.000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate_masters`
--

CREATE TABLE `rate_masters` (
  `Rate_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `Price` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_masters`
--

INSERT INTO `rate_masters` (`Rate_id`, `s_id`, `r_id`, `Price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, '2021-09-04 03:43:06', '2021-09-06 08:03:46'),
(2, 1, 2, 23, '2021-09-04 03:43:17', '2021-09-04 03:43:17'),
(3, 1, 3, 25, '2021-09-04 03:43:29', '2021-09-04 03:43:29');

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
(7, 2, 'kikani jems', 'pramukh bulding', '24aakfk0018n1zd', '2021-08-11 02:42:32', '2021-08-11 02:42:32');

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
(2, 'gbm', 'gbm@gmail.com', NULL, '$2y$10$Q5bZdekXn6LdU/FkOb7BrOn39Z4TJ5GsxHIjGVDIW29M/t1k6tsCa', 'aE5LUQzaAsehp9EeuRJmLhGgemCuOaUjyw42C7Q8Ft5qTlyE4F6UORTLl7Ue', '2021-07-19 16:56:33', '2021-07-19 16:56:33');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `s_id` (`s_id`,`r_id`),
  ADD KEY `r_id` (`r_id`);

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
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate_masters`
--
ALTER TABLE `rate_masters`
  MODIFY `Rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell_stock`
--
ALTER TABLE `sell_stock`
  MODIFY `sell_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `working_stock`
--
ALTER TABLE `working_stock`
  MODIFY `w_id` int(15) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `rate_masters_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rates` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `working_stock_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
