-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 08:15 PM
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
-- Table structure for table `payables`
--

CREATE TABLE `payables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `current_balance` double DEFAULT NULL,
  `pay_amount` double DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payables`
--

INSERT INTO `payables` (`id`, `unique_id`, `ref_no`, `payment_date`, `vendor_id`, `current_balance`, `pay_amount`, `payment_type`, `cheque_no`, `account_id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '1671561171', 'PV-00000001', '2022-12-20 18:00:00', 11, NULL, 10000, 'Cash', '12323dfgfd', 2, 'test', 1, 1, '2022-12-20 12:32:51', '2022-12-20 12:32:51'),
(3, '1671561586', 'PV-00000003', '2022-12-06 18:00:00', 11, NULL, 10000, 'Cash', '12323dfgfd', 2, 'test', 1, 1, '2022-12-20 12:39:46', '2022-12-20 12:39:46'),
(4, '1671561669', 'PV-00000004', '2022-12-20 18:00:00', 11, NULL, 10000, 'Cash', '12323dfgfd', 2, 'test', 1, 1, '2022-12-20 12:41:09', '2022-12-20 12:41:09'),
(5, '1671635025', 'PV-00000005', '2022-12-21 18:00:00', 11, NULL, 1000, 'Cash', 'tyghj', 2, 'ghghj', 1, 1, '2022-12-21 09:03:45', '2022-12-21 09:03:45'),
(6, '1671635138', 'PV-00000006', '2022-12-21 18:00:00', 11, NULL, 1000, 'Cash', 'tyghj', 2, 'ghghj', 1, 1, '2022-12-21 09:05:38', '2022-12-21 09:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payables`
--
ALTER TABLE `payables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payables`
--
ALTER TABLE `payables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
