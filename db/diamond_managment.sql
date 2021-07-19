-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 11:32 AM
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
(1, 2, 2, '121212', '25', '25', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, '2021-07-01 14:11:50', '2021-07-17 12:03:52'),
(2, 2, 2, 'hdhddh', '12', '25.62', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2021-07-01 14:14:01', '2021-07-17 12:10:42');

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
(1, 2, 'pk', 'pk', '987458265', 'pk@gmail.com', '2021-07-01 13:39:10', '2021-07-01 13:39:10');

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
(3, 2, 1, 2, '25.62', 'hdhddh', '2021-07-17 12:10:42', '2021-07-17 12:10:42');

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
(1, 2, 2, 1, '121212', '2021-07-17 11:23:42', '2021-07-17 11:23:42');

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
(1, 1, 'PARTH', 'MORBI', 'DERS659875WWER', '2021-07-01 13:33:56', '2021-07-01 13:35:10'),
(2, 2, 'pk', 'pk', '784897rfgtg6498', '2021-07-01 14:09:22', '2021-07-01 14:09:22');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UciKUhn6HK3fGVx1/d..o.ZkMop7iWyJjNTqjPYOaHcLIsf3okEFO', NULL, '2021-07-01 12:40:38', '2021-07-01 12:40:38');

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
-- Dumping data for table `working_stock`
--

INSERT INTO `working_stock` (`w_id`, `c_id`, `m_id`, `d_id`, `d_barcode`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 1, '121212', '2021-07-17 12:03:52', '2021-07-17 12:03:52');

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
  ADD KEY `c_id` (`c_id`);

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
-- Indexes for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `sell_stock`
--
ALTER TABLE `sell_stock`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `c_id` (`c_id`);

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
  ADD KEY `c_id` (`c_id`);

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
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell_stock`
--
ALTER TABLE `sell_stock`
  MODIFY `sell_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `working_stock`
--
ALTER TABLE `working_stock`
  MODIFY `w_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_purchase`
--
ALTER TABLE `d_purchase`
  ADD CONSTRAINT `d_purchase_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager_details`
--
ALTER TABLE `manager_details`
  ADD CONSTRAINT `manager_details_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD CONSTRAINT `ready_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`);

--
-- Constraints for table `sell_stock`
--
ALTER TABLE `sell_stock`
  ADD CONSTRAINT `sell_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`);

--
-- Constraints for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD CONSTRAINT `supplier_details_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`);

--
-- Constraints for table `working_stock`
--
ALTER TABLE `working_stock`
  ADD CONSTRAINT `working_stock_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
