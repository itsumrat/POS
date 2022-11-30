-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 07:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_no` int(100) DEFAULT NULL,
  `purchase_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `other_charge` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Received',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `requisition_no`, `purchase_no`, `purchase_date`, `unique_id`, `vendor_id`, `total`, `vat`, `other_charge`, `discount`, `description`, `grand_total`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(34, 14, 'P#00000001', '2022-11-18 12:46:00', '1668797160', NULL, 6100, NULL, NULL, NULL, NULL, 6161, 'Received', 1, 1, '2022-11-18 12:46:00', '2022-11-18 12:46:00'),
(35, 16, 'P#00000035', '2022-11-18 12:47:39', '1668797259', NULL, 25, 10, NULL, NULL, NULL, 27.5, 'Received', 1, 1, '2022-11-18 12:47:39', '2022-11-18 12:47:39'),
(36, 15, 'P#00000036', '2022-11-18 12:48:40', '1668797320', NULL, 15250, NULL, NULL, NULL, NULL, 15402.5, 'Received', 1, 1, '2022-11-18 12:48:40', '2022-11-18 12:48:40'),
(37, 15, 'P#00000037', '2022-11-18 12:56:10', '1668797770', NULL, 15250, NULL, NULL, NULL, NULL, 15402.5, 'Received', 1, 1, '2022-11-18 12:56:10', '2022-11-18 12:56:10'),
(38, 17, 'P#00000038', '2022-11-18 12:56:51', '1668797811', NULL, 67210, NULL, NULL, NULL, NULL, 67882.1, 'Received', 1, 1, '2022-11-18 12:56:51', '2022-11-18 12:56:51'),
(39, 18, 'P#00000039', '2022-11-18 13:03:18', '1668798198', NULL, 15250, NULL, NULL, NULL, NULL, 15402.5, 'Received', 1, 1, '2022-11-18 13:03:18', '2022-11-18 13:03:18'),
(40, 19, 'P#00000040', '2022-11-18 13:08:17', '1668798497', NULL, 13875, NULL, NULL, NULL, NULL, 14013.75, 'Received', 1, 1, '2022-11-18 13:08:17', '2022-11-18 13:08:17'),
(41, 20, 'P#00000041', '2022-11-18 13:12:49', '1668798769', NULL, 6752, NULL, NULL, NULL, NULL, 6819.52, 'Received', 1, 1, '2022-11-18 13:12:49', '2022-11-18 13:12:49'),
(42, 21, 'P#00000042', '2022-11-18 13:15:42', '1668798942', NULL, 3229, NULL, NULL, NULL, NULL, 3261.29, 'Received', 1, 1, '2022-11-18 13:15:42', '2022-11-18 13:15:42'),
(43, NULL, 'P#00000043', '2022-11-18 13:31:04', '1668799864', NULL, 8550, NULL, NULL, NULL, NULL, 8635.5, 'Received', 1, 1, '2022-11-18 13:31:04', '2022-11-18 13:31:04'),
(44, 22, 'P#00000044', '2022-11-18 13:33:12', '1668799992', NULL, 5016, NULL, NULL, NULL, NULL, 5066.16, 'Received', 1, 1, '2022-11-18 13:33:12', '2022-11-18 13:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `old_unit_price` double DEFAULT NULL,
  `new_unit_price` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_no`, `unique_id`, `barcode`, `item_id`, `item_name`, `uom`, `quantity`, `old_unit_price`, `new_unit_price`, `subtotal`, `created_at`, `updated_at`) VALUES
(36, 'P#00000001', '1668797161', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 10, 600, 610, 6100, '2022-11-18 12:46:01', '2022-11-18 12:46:01'),
(37, 'P#00000035', '1668797259', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 12, 600, 1000, 12000, '2022-11-18 12:47:39', '2022-11-18 12:47:39'),
(38, 'P#00000035', '1668797259', '0001655180488', 9, 'Dorian Clark 0', 'KG-2', 5, 2, 5, 25, '2022-11-18 12:47:39', '2022-11-18 12:47:39'),
(39, 'P#00000036', '1668797320', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 25, 600, 610, 15250, '2022-11-18 12:48:40', '2022-11-18 12:48:40'),
(40, 'P#00000037', '1668797770', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 25, 600, 610, 15250, '2022-11-18 12:56:10', '2022-11-18 12:56:10'),
(41, 'P#00000038', '1668797811', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 110, 600, 611, 67210, '2022-11-18 12:56:51', '2022-11-18 12:56:51'),
(42, 'P#00000039', '1668798198', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 25, 600, 610, 15250, '2022-11-18 13:03:19', '2022-11-18 13:03:19'),
(43, 'P#00000040', '1668798497', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 25, 600, 555, 13875, '2022-11-18 13:08:17', '2022-11-18 13:08:17'),
(44, 'P#00000041', '1668798769', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 11, 600, 610, 6710, '2022-11-18 13:12:49', '2022-11-18 13:12:49'),
(45, 'P#00000041', '1668798769', '0001655180869', 24, 'Frances Leonard 24', 'KG-2', 21, 2, 2, 42, '2022-11-18 13:12:49', '2022-11-18 13:12:49'),
(46, 'P#00000042', '1668798942', '0001655180128', 4, 'Martena Oneal 0', 'Dorzon', 12, 2, 10, 120, '2022-11-18 13:15:42', '2022-11-18 13:15:42'),
(47, 'P#00000042', '1668798942', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 19, 600, 111, 2109, '2022-11-18 13:15:42', '2022-11-18 13:15:42'),
(48, 'P#00000042', '1668798943', '0001655180869', 24, 'Frances Leonard 24', 'KG-2', 100, 2, 10, 1000, '2022-11-18 13:15:43', '2022-11-18 13:15:43'),
(49, 'P#00000043', '1668799864', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 19, 600, 450, 8550, '2022-11-18 13:31:04', '2022-11-18 13:31:04'),
(50, 'P#00000044', '1668799992', '0001655179442', 1, 'Chadwick Reese 07', 'PCS', 11, 600, 456, 5016, '2022-11-18 13:33:12', '2022-11-18 13:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisition_date` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `other_charge` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=pending,1=approved',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'order' COMMENT 'order,purchased,received',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `requisition_no`, `requisition_date`, `unique_id`, `vendor_id`, `total`, `vat`, `other_charge`, `discount`, `grand_total`, `status`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'R#00000001', '2022-11-18 12:44:09', '1668797049', 4, 6000, NULL, NULL, NULL, 6060, 0, 'purchased', 1, 1, '2022-11-18 12:44:09', '2022-11-18 12:46:01'),
(15, 'R#00000015', '2022-11-18 12:44:20', '1668797060', 2, 7200, NULL, NULL, NULL, 7272, 0, 'purchased', 1, 1, '2022-11-18 12:44:20', '2022-11-18 12:56:10'),
(16, 'R#00000016', '2022-11-18 12:45:12', '1668797112', 2, 7210, 10, NULL, NULL, 7282.1, 0, 'purchased', 1, 1, '2022-11-18 12:45:12', '2022-11-18 12:47:40'),
(17, 'R#00000017', '2022-11-18 12:56:27', '1668797787', 2, 66000, NULL, NULL, NULL, 66660, 0, 'purchased', 1, 1, '2022-11-18 12:56:27', '2022-11-18 12:56:51'),
(18, 'R#00000018', '2022-11-18 13:03:03', '1668798183', 2, 15000, NULL, NULL, NULL, 15150, 0, 'purchased', 1, 1, '2022-11-18 13:03:03', '2022-11-18 13:03:19'),
(19, 'R#00000019', '2022-11-18 13:08:02', '1668798482', 2, 15000, NULL, NULL, NULL, 15150, 0, 'purchased', 1, 1, '2022-11-18 13:08:02', '2022-11-18 13:08:17'),
(20, 'R#00000020', '2022-11-18 13:12:12', '1668798732', NULL, 6642, NULL, NULL, NULL, 6708.42, 0, 'purchased', 1, 1, '2022-11-18 13:12:12', '2022-11-18 13:12:49'),
(21, 'R#00000021', '2022-11-18 13:14:19', '1668798859', NULL, 11624, NULL, NULL, NULL, 11740.24, 0, 'purchased', 1, 1, '2022-11-18 13:14:19', '2022-11-18 13:15:43'),
(22, 'R#00000022', '2022-11-18 13:30:54', '1668799854', 3, 9000, NULL, NULL, NULL, 9090, 0, 'purchased', 1, 1, '2022-11-18 13:30:54', '2022-11-18 13:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_details`
--

CREATE TABLE `requisition_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisition_details`
--

INSERT INTO `requisition_details` (`id`, `requisition_id`, `item_id`, `unique_id`, `barcode`, `item_name`, `uom`, `quantity`, `unit_price`, `subtotal`, `created_at`, `updated_at`) VALUES
(23, '14', 1, '1668797049', '0001655179442', 'Chadwick Reese 07', 'PCS', 10, 600, 6000, '2022-11-18 12:44:09', '2022-11-18 12:44:09'),
(24, '15', 1, '1668797060', '0001655179442', 'Chadwick Reese 07', 'PCS', 12, 600, 7200, '2022-11-18 12:44:21', '2022-11-18 12:44:21'),
(25, '16', 1, '1668797112', '0001655179442', 'Chadwick Reese 07', 'PCS', 12, 600, 7200, '2022-11-18 12:45:12', '2022-11-18 12:45:12'),
(26, '16', 9, '1668797112', '0001655180488', 'Dorian Clark 0', 'KG-2', 5, 2, 10, '2022-11-18 12:45:12', '2022-11-18 12:45:12'),
(27, '17', 1, '1668797787', '0001655179442', 'Chadwick Reese 07', 'PCS', 110, 600, 66000, '2022-11-18 12:56:28', '2022-11-18 12:56:28'),
(28, '18', 1, '1668798183', '0001655179442', 'Chadwick Reese 07', 'PCS', 25, 600, 15000, '2022-11-18 13:03:03', '2022-11-18 13:03:03'),
(29, '19', 1, '1668798482', '0001655179442', 'Chadwick Reese 07', 'PCS', 25, 600, 15000, '2022-11-18 13:08:02', '2022-11-18 13:08:02'),
(30, '20', 1, '1668798732', '0001655179442', 'Chadwick Reese 07', 'PCS', 11, 600, 6600, '2022-11-18 13:12:12', '2022-11-18 13:12:12'),
(31, '20', 24, '1668798732', '0001655180869', 'Frances Leonard 24', 'KG-2', 21, 2, 42, '2022-11-18 13:12:12', '2022-11-18 13:12:12'),
(32, '21', 1, '1668798860', '0001655179442', 'Chadwick Reese 07', 'PCS', 19, 600, 11400, '2022-11-18 13:14:20', '2022-11-18 13:14:20'),
(33, '21', 24, '1668798860', '0001655180869', 'Frances Leonard 24', 'KG-2', 100, 2, 200, '2022-11-18 13:14:20', '2022-11-18 13:14:20'),
(34, '21', 4, '1668798860', '0001655180128', 'Martena Oneal 0', 'Dorzon', 12, 2, 24, '2022-11-18 13:14:20', '2022-11-18 13:14:20'),
(35, '22', 1, '1668799854', '0001655179442', 'Chadwick Reese 07', 'PCS', 15, 600, 9000, '2022-11-18 13:30:54', '2022-11-18 13:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `unique_id`, `barcode`, `item_id`, `department`, `category`, `brand`, `uom`, `size`, `color`, `quantity`, `created_at`, `updated_at`) VALUES
(5, '1668797259', '0001655179442', 1, 'test asdf', 'check category 02', 'Morium Fashion', 'PCS', '44', 'Green', 100, '2022-11-18 12:47:39', '2022-11-18 13:33:12'),
(6, '1668797259', '0001655180488', 9, 'ddessqq', 'check category', 'Made in Bangladesh', 'KG-2', '44', 'Green', 5, '2022-11-18 12:47:39', '2022-11-18 12:47:39'),
(7, '1668798769', '0001655180869', 24, 'akash', 'Category', 'Morium Fashion', 'KG-2', '48', 'Green', 121, '2022-11-18 13:12:49', '2022-11-18 13:15:43'),
(8, '1668798942', '0001655180128', 4, 'adfllo', 'Category', 'Morium Fashion', 'Dorzon', '44', 'Green', 12, '2022-11-18 13:15:42', '2022-11-18 13:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `stock_history`
--

CREATE TABLE `stock_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_history`
--

INSERT INTO `stock_history` (`id`, `unique_id`, `barcode`, `item_id`, `quantity`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1668799992', '0001655179442', 1, 11, 1, 1, '2022-11-18 13:33:12', '2022-11-18 13:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `openning_balance` double DEFAULT NULL,
  `vendor_type` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive	',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_contact`, `unique_id`, `vendor_name`, `nid_no`, `address`, `openning_balance`, `vendor_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, '017101465887', '1668539587', 'Test', '121', 'Dhaka', 10000, 4, 1, 1, 1, '2022-11-15 13:13:07', '2022-11-15 13:13:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_history`
--
ALTER TABLE `stock_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_history`
--
ALTER TABLE `stock_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
