-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 10:45 AM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `unique_id`, `name`, `address`, `contact_no`, `trade_license_no`, `tin_no`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1669922430', 'dffgdfgf', 'dfdffd', '34345345', '34534566t', '56645', NULL, 1, 1, '2022-12-01 13:20:30', '2022-12-01 13:20:30'),
(2, '1669922561', 'dffgdfgfdfgfg', 'dfdffd', '34345345', '34534566t', '56645', NULL, 1, 1, '2022-12-01 13:22:41', '2022-12-01 13:22:41'),
(3, '1669922582', 'dffgdfgfdfgfg', 'dfdffd', '34345345', '34534566t', '56645', NULL, 1, 1, '2022-12-01 13:23:02', '2022-12-01 13:23:02'),
(4, '1669922721', 'wireless', 'dfsdfdf', '34345345', '34534566t', '56645', NULL, 1, 1, '2022-12-01 13:25:21', '2022-12-01 13:25:21'),
(5, '1669924405', 'unilever', 'fsdjfndfjfj', '34345345', '34534566t', '56645', 'unilever_5400868.jpeg', 1, 1, '2022-12-01 13:53:25', '2022-12-01 13:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `openning_balance` double DEFAULT NULL,
  `customer_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `description` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_contact`, `nid_no`, `address`, `openning_balance`, `customer_type`, `status`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'majadul islam', '01677270944', '19892696405000370', 'Mirpur, Pallabi, Dhaka', 200, 1, 1, NULL, NULL, NULL, '2022-10-10 00:55:02', '2022-10-10 00:55:02'),
(2, 'majadul islam', '01677270944', '19892696405000370', 'Mirpur, Pallabi, Dhaka', 200, 1, 1, NULL, 1, 1, '2022-10-10 00:56:23', '2022-10-10 00:56:23'),
(3, 'majadul islam', '01677270944', '19892696405000370', 'Mirpur, Pallabi, Dhaka', 200, 1, 1, NULL, 1, 1, '2022-10-10 00:58:36', '2022-10-10 00:58:36'),
(4, 'majadul islam', '01677270944', '19892696405000370', 'Mirpur, Pallabi, Dhaka', 200, 1, 1, NULL, 1, 1, '2022-10-10 00:58:47', '2022-10-10 00:58:47'),
(5, 'majadul islam', '01677270944', '19892696405000370', 'Mirpur, Pallabi, Dhaka', 200, 1, 1, NULL, 1, 1, '2022-10-10 01:01:07', '2022-10-10 01:01:07'),
(6, 'Md Shohagh', '01918305499', '1989269640500371', 'House # 29, Polashnagar, Block # E, Mirpur', 250, 1, 1, NULL, 1, 1, '2022-10-10 01:21:07', '2022-10-10 01:21:07'),
(7, 'Sydnee Weiss', '01534645492', 'Cumque omnis id ipsa', 'Sit aut do delectus', 20, 1, 1, NULL, 1, 1, '2022-10-10 01:22:06', '2022-10-10 01:22:06'),
(8, NULL, '01918305499', 'Sit qui dolor amet', 'Ipsum ipsum deserunt', 200, 1, 1, NULL, 1, 1, '2022-10-10 01:23:21', '2022-10-10 01:23:21'),
(9, 'Md Shohagh', '01918305499', '019856458', 'House # 29, Polashnagar, Block # E, Mirpur', 20, 1, 1, NULL, 1, 1, '2022-10-10 01:25:36', '2022-10-10 01:25:36'),
(10, 'Md Shohagh', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 20, 1, 1, NULL, 1, 1, '2022-10-10 01:26:23', '2022-10-10 01:26:23'),
(11, 'Sydnee Weiss', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 1, 1, NULL, 1, 1, '2022-10-10 02:20:46', '2022-10-10 02:20:46'),
(12, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 1, 1, NULL, 1, 1, '2022-10-10 02:22:25', '2022-10-10 02:22:25'),
(13, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 2, 1, NULL, 1, 1, '2022-10-10 02:22:36', '2022-10-10 02:22:36'),
(14, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 2, 1, NULL, 1, 1, '2022-10-10 02:22:46', '2022-10-10 02:22:46'),
(15, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 2, 1, NULL, 1, 1, '2022-10-10 02:22:52', '2022-10-10 02:22:52'),
(16, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 2, 1, NULL, 1, 1, '2022-10-10 02:22:54', '2022-10-10 02:22:54'),
(17, 'Joan Parrish', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, 2, 1, NULL, 1, 1, '2022-10-10 02:22:55', '2022-10-10 02:22:55'),
(18, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:26:58', '2022-10-10 02:26:58'),
(19, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:26:59', '2022-10-10 02:26:59'),
(20, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:00', '2022-10-10 02:27:00'),
(21, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:02', '2022-10-10 02:27:02'),
(22, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:03', '2022-10-10 02:27:03'),
(23, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:03', '2022-10-10 02:27:03'),
(24, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:04', '2022-10-10 02:27:04'),
(25, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:05', '2022-10-10 02:27:05'),
(26, 'Imran', '012334556', '12345678890', 'Dhaka', 10000, 2, 1, NULL, 1, 1, '2022-11-28 13:00:16', '2022-11-28 13:00:16'),
(27, 'Imran', '012334556', '12345678890', 'Dhaka', 10000, 2, 1, NULL, 1, 1, '2022-11-28 13:00:49', '2022-11-28 13:00:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
