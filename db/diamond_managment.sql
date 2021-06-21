-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 01:07 PM
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
-- Table structure for table `company_data`
--

CREATE TABLE `company_data` (
  `c_id` int(15) NOT NULL,
  `c_name` varchar(150) NOT NULL,
  `c_address` varchar(200) DEFAULT NULL,
  `c_gst` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_purchase`
--

CREATE TABLE `d_purchase` (
  `d_id` int(15) NOT NULL,
  `d_barcode` varchar(150) NOT NULL,
  `d_wt` varchar(50) NOT NULL,
  `d_col` varchar(100) NOT NULL,
  `d_pc` varchar(50) NOT NULL,
  `d_exp_pr` varchar(50) NOT NULL,
  `d_exp` varchar(50) NOT NULL,
  `d_cla` varchar(50) NOT NULL,
  `d_shape` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `d_purchase`
--
ALTER TABLE `d_purchase`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `diamond_barcode_unique` (`d_barcode`);

--
-- Indexes for table `ready_stock`
--
ALTER TABLE `ready_stock`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_purchase`
--
ALTER TABLE `d_purchase`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ready_stock`
--
ALTER TABLE `ready_stock`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
