-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 03:30 PM
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
-- Database: `vm_jewel_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `c_id` int(15) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_adress` varchar(255) DEFAULT NULL,
  `c_mobile` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_gstin` varchar(255) DEFAULT NULL,
  `c_pan` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`c_id`, `c_name`, `c_adress`, `c_mobile`, `c_email`, `c_gstin`, `c_pan`, `c_state`, `created_at`, `updated_at`) VALUES
(1, 'VM JEWEL', '4TH FLOOR,PLOT NO. 39/40, GOPINATH COMPLEX, KAPUR VADI,KHODIYAR VADI, KHODIYAR NAGAR ROAD\nVARCHHA ROAD, SURAT. ', '98797 52799', 'vmjewel1001@gmail.com', '24AMKPP5226H1ZZ', '', '', NULL, NULL),
(2, 'EKLINGJI GEMS', 'FLAT NO-A/203, SUNDAY AVENUE,WING-A, AMBATALAVADI ROAD, KATARGAM, SURAT, GUJARAT,\n395004', NULL, NULL, '24DHCPM9189L1ZN', 'DHCPM9189L', '24-GUJARAT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `defective_pcs`
--

CREATE TABLE `defective_pcs` (
  `df_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `resone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defective_pcs`
--

INSERT INTO `defective_pcs` (`df_id`, `c_id`, `d_id`, `resone`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 125, 'missing', '2021-10-23', '2021-10-23 13:24:25', '2021-10-23 07:54:25', '2021-10-23 07:54:25'),
(2, 1, 126, 'missing', '2021-10-23', '2021-10-23 07:48:25', '2021-10-23 07:48:25', NULL);

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
  `status` tinyint(4) NOT NULL DEFAULT 0,
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

INSERT INTO `d_purchase` (`d_id`, `c_id`, `s_id`, `d_barcode`, `d_wt`, `d_n_wt`, `d_col`, `d_pc`, `d_exp_pr`, `d_exp`, `d_cla`, `shape_id`, `d_wt_category`, `price`, `bill_date`, `status`, `doReady`, `isReady`, `isReturn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(125, 1, 20, '10001', '0.103', '0.5', NULL, NULL, NULL, NULL, NULL, 2, 1, 50, '2021-10-01', 1, 17, 1, 1, '2021-10-22 06:51:40', '2021-10-23 07:54:25', NULL),
(126, 1, 20, '10002', '0.250', '0.120', NULL, NULL, NULL, NULL, NULL, 2, 2, 90, '2021-10-22', 0, 17, 1, 1, '2021-10-22 07:16:21', '2021-10-23 07:48:25', NULL),
(127, 1, 20, '10003', '0.25', '0.125', NULL, NULL, NULL, NULL, NULL, 2, 2, 90, '2021-10-22', 1, 17, 1, 1, '2021-10-22 07:16:30', '2021-10-23 07:11:33', NULL),
(128, 1, 20, '10005', '0.25', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 105, '2021-10-22', 1, NULL, NULL, NULL, '2021-10-22 07:17:17', '2021-10-23 07:45:41', NULL),
(129, 1, 20, '10006', '0.25', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 90, '2021-10-22', 1, 17, NULL, NULL, '2021-10-22 07:17:45', '2021-10-23 06:29:53', NULL),
(130, 1, 20, '10007', '0.101', '0.5', NULL, NULL, NULL, NULL, NULL, 3, 1, 50, '2021-10-14', 1, 17, 1, NULL, '2021-10-22 22:12:02', '2021-10-23 07:45:32', NULL),
(131, 2, 22, '100010', '0.203', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 50, '2021-10-23', 1, NULL, NULL, NULL, '2021-10-22 22:38:17', '2021-10-22 22:40:09', NULL),
(132, 2, 22, '100011', '0.10', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 20, '2021-10-23', 1, NULL, NULL, NULL, '2021-10-22 22:38:28', '2021-10-22 22:40:32', NULL),
(133, 2, 22, '100012', '0.203', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 50, '2021-10-23', 1, NULL, NULL, NULL, '2021-10-22 22:38:41', '2021-10-22 22:38:41', NULL),
(134, 1, 20, '10004', '0.230', '0.115', NULL, NULL, NULL, NULL, NULL, 2, 2, 90, '2021-10-23', 1, 17, 1, 1, '2021-10-23 05:43:58', '2021-10-23 07:11:36', NULL),
(135, 1, 20, '100015', '0.29', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 90, '2021-10-23', 1, NULL, NULL, NULL, '2021-10-23 05:45:39', '2021-10-23 07:16:45', NULL);

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
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_details`
--

INSERT INTO `manager_details` (`m_id`, `c_id`, `m_name`, `m_address`, `m_phone`, `m_email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 1, 'KAMLESH', 'Hirabaugh', '9512727308', 'kamlesh@gmail.com', 1, '2021-10-21 23:46:49', '2021-10-22 06:21:43', NULL),
(19, 1, 'RAMESH', 'HiraBaugh', '7096717096', 'ramesh@gmail.com', 0, '2021-10-22 03:39:22', '2021-10-23 07:54:11', NULL),
(31, 1, 'Rishikesh', 'Surat', '7096717097', 'meet@gmail.com', 1, '2021-10-22 04:54:39', '2021-10-23 07:54:07', NULL),
(32, 2, 'Ravi', 'Surat', '6355932737', 'ravi@gmail.com', 1, '2021-10-22 22:39:51', '2021-10-22 22:39:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0.001-0.201', '2021-10-22 01:52:56', '2021-10-22 01:52:56'),
(2, '0.202-0.30', '2021-10-22 01:54:59', '2021-10-22 01:54:59');

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
(9, 1, 20, '[{\"1\":\"50\",\"2\":\"90\"}]', '2021-10-22 06:50:03', '2021-10-22 06:50:21'),
(10, 2, 22, '[{\"1\":\"20\",\"2\":\"50\"}]', '2021-10-22 22:37:38', '2021-10-22 22:37:48');

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
  `status` tinyint(1) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ready_stock`
--

INSERT INTO `ready_stock` (`r_id`, `c_id`, `m_id`, `d_id`, `d_n_wt`, `status`, `return_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 17, 125, '0.5', 1, '2021-10-23', '2021-10-23 06:32:40', '2021-10-23 07:54:25', NULL),
(2, 1, 17, 126, '0.120', 0, '2021-10-23', '2021-10-23 06:48:07', '2021-10-23 07:48:25', NULL),
(3, 1, 17, 127, '0.125', 0, '2021-10-23', '2021-10-23 06:48:27', '2021-10-23 07:11:33', NULL),
(4, 1, 17, 134, '0.115', 0, '2021-10-23', '2021-10-23 06:48:56', '2021-10-23 07:11:36', NULL),
(5, 1, 17, 130, '0.5', 1, '2021-10-23', '2021-10-23 07:17:10', '2021-10-23 07:45:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sell_stock`
--

CREATE TABLE `sell_stock` (
  `sell_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `s_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_stock`
--

INSERT INTO `sell_stock` (`sell_id`, `c_id`, `s_id`, `d_id`, `return_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 20, 125, '2021-10-23', '2021-10-23 07:11:28', '2021-10-23 07:45:03', NULL),
(2, 1, 20, 126, '2021-10-23', '2021-10-23 07:11:31', '2021-10-23 07:11:31', NULL),
(3, 1, 20, 127, '2021-10-23', '2021-10-23 07:11:33', '2021-10-23 07:11:33', NULL),
(4, 1, 20, 134, '2021-10-23', '2021-10-23 07:11:35', '2021-10-23 07:11:35', NULL);

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
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`s_id`, `c_id`, `s_name`, `s_address`, `s_gst`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 1, 'ALOK IMPEX', 'surat', '24AAACA1033E1Z', 1, '2021-10-22 05:19:36', '2021-10-22 06:26:59', NULL),
(22, 2, 'Kikani Gems', 'Surat', '24AAACA1033E1R', 1, '2021-10-22 22:36:34', '2021-10-22 22:36:34', NULL),
(23, 1, 'GAJERA', 'Surat', '24AAACA1033E1S', 1, '2021-10-22 23:34:47', '2021-10-22 23:34:47', NULL);

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
(4, 'vm jewel', 'vmjewel@gmail.com', NULL, '$2y$10$LlW3ODkxL.NBfOoDVeS32OMNf8StFiIJKpe4QSA5hRCYYhJbX.tE.', NULL, '2021-10-21 23:09:57', '2021-10-21 23:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `working_stock`
--

CREATE TABLE `working_stock` (
  `w_id` int(15) NOT NULL,
  `c_id` int(15) DEFAULT NULL,
  `m_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `working_stock`
--

INSERT INTO `working_stock` (`w_id`, `c_id`, `m_id`, `d_id`, `status`, `bill_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 17, 125, 0, '2021-10-23', '2021-10-23 06:29:34', '2021-10-23 06:47:56', NULL),
(2, 1, 17, 126, 0, '2021-10-23', '2021-10-23 06:29:41', '2021-10-23 06:48:09', NULL),
(3, 1, 17, 127, 0, '2021-10-23', '2021-10-23 06:29:44', '2021-10-23 06:48:27', NULL),
(4, 1, 17, 134, 0, '2021-10-23', '2021-10-23 06:29:47', '2021-10-23 06:48:56', NULL),
(5, 1, 17, 128, 1, NULL, '2021-10-23 06:29:49', '2021-10-23 07:45:59', NULL),
(6, 1, 17, 129, 1, '2021-10-23', '2021-10-23 06:29:53', '2021-10-23 06:29:53', NULL),
(7, 1, 17, 130, 0, '2021-10-23', '2021-10-23 06:29:56', '2021-10-23 07:45:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `defective_pcs`
--
ALTER TABLE `defective_pcs`
  ADD PRIMARY KEY (`df_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `c_id_2` (`c_id`);

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
  ADD KEY `m_id_2` (`m_id`,`d_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `sell_stock`
--
ALTER TABLE `sell_stock`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`,`d_id`),
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
-- AUTO_INCREMENT for table `defective_pcs`
--
ALTER TABLE `defective_pcs`
  MODIFY `df_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diamond_shape`
--
ALTER TABLE `diamond_shape`
  MODIFY `shape_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `d_purchase`
--
ALTER TABLE `d_purchase`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rate_masters`
--
ALTER TABLE `rate_masters`
  MODIFY `Rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sell_stock`
--
ALTER TABLE `sell_stock`
  MODIFY `sell_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `working_stock`
--
ALTER TABLE `working_stock`
  MODIFY `w_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `defective_pcs`
--
ALTER TABLE `defective_pcs`
  ADD CONSTRAINT `defective_pcs_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `defective_pcs_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `company_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `working_stock_ibfk_3` FOREIGN KEY (`d_id`) REFERENCES `d_purchase` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `working_stock_ibfk_4` FOREIGN KEY (`m_id`) REFERENCES `manager_details` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
