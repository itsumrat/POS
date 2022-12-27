-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 07:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE `inventory_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `unique_id`, `barcode`, `status`, `item_id`, `stock_id`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1672076252', '0001655180869', 'Adjust', 24, 7, 135, 1, 1, '2022-12-26 11:37:32', '2022-12-26 11:37:32'),
(2, '1672078659', '0001655180869', 'Damage', 24, 7, 130, 1, 1, '2022-12-26 12:17:39', '2022-12-26 12:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_history`
--
ALTER TABLE `inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_history`
--
ALTER TABLE `inventory_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
