-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 04:41 PM
-- Server version: 10.4.21-MariaDB
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
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'View', '2022-05-08 05:44:21', '2022-05-08 05:44:21'),
(2, 'Add', '2022-05-08 05:44:21', '2022-05-08 05:44:21'),
(3, 'Edit', '2022-05-08 05:44:21', '2022-05-08 05:44:21'),
(4, 'Delete', '2022-05-08 05:44:21', '2022-05-08 05:44:21'),
(5, 'Export', '2022-05-08 05:44:21', '2022-05-08 05:44:21'),
(6, 'Import', '2022-05-08 05:44:21', '2022-05-08 05:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654946530', 'Made in Bangladesh', 1, 1, '2022-06-11 05:22:10', '2022-06-11 05:22:45'),
(2, '1654946552', 'Morium Fashion', 1, 1, '2022-06-11 05:22:32', '2022-06-11 05:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654945275', 'Category', 1, 1, '2022-06-11 05:01:15', '2022-06-11 05:01:15'),
(2, '1654945324', 'check category', 1, 1, '2022-06-11 05:02:04', '2022-06-11 05:02:04'),
(3, '1654945329', 'check category 02', 1, 1, '2022-06-11 05:02:09', '2022-06-11 05:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654948964', 'Green', 1, 1, '2022-06-11 06:02:44', '2022-06-11 06:02:55'),
(2, '1654948984', 'red', 1, 1, '2022-06-11 06:03:04', '2022-06-11 06:03:04'),
(3, '1654948987', 'blue', 1, 1, '2022-06-11 06:03:07', '2022-06-11 06:03:07');

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
(6, 'Md Shohagh', '01918305499', '1989269640500371', 'House # 29, Polashnagar, Block # E, Mirpur', 250, NULL, 1, NULL, 1, 1, '2022-10-10 01:21:07', '2022-10-10 01:21:07'),
(7, 'Sydnee Weiss', '01534645492', 'Cumque omnis id ipsa', 'Sit aut do delectus', 20, 1, 1, NULL, 1, 1, '2022-10-10 01:22:06', '2022-10-10 01:22:06'),
(8, NULL, '01918305499', 'Sit qui dolor amet', 'Ipsum ipsum deserunt', 200, 1, 1, NULL, 1, 1, '2022-10-10 01:23:21', '2022-10-10 01:23:21'),
(9, 'Md Shohagh', '01918305499', '019856458', 'House # 29, Polashnagar, Block # E, Mirpur', 20, NULL, 1, NULL, 1, 1, '2022-10-10 01:25:36', '2022-10-10 01:25:36'),
(10, 'Md Shohagh', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 20, NULL, 1, NULL, 1, 1, '2022-10-10 01:26:23', '2022-10-10 01:26:23'),
(11, 'Sydnee Weiss', '01918305499', '0132321465', 'House # 29, Polashnagar, Block # E, Mirpur', 200, NULL, 1, NULL, 1, 1, '2022-10-10 02:20:46', '2022-10-10 02:20:46'),
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
(25, 'Astra Heath', 'Totam re', 'Eum libero distincti', 'Enim nihil ipsa nis', 20, 1, 1, NULL, 1, 1, '2022-10-10 02:27:05', '2022-10-10 02:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `unique_id`, `name`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2545632', 'Customer update', 'description', 1, 1, 1, '2022-06-16 09:24:48', '2022-06-16 03:35:02'),
(2, '1655372045', 'Customer check for update 02', NULL, 1, 1, 1, '2022-06-16 03:34:05', '2022-06-16 03:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654752512', 'Department 01', 1, 1, '2022-06-04 11:18:51', '2022-06-08 23:51:29'),
(2, '1654678891', 'test asdf', 1, 1, '2022-06-08 03:01:31', '2022-06-08 23:50:21'),
(3, '1654679093', 'check list', 1, 1, '2022-06-08 03:04:53', '2022-06-08 03:04:53'),
(4, '1654679139', 'asdf', 1, 1, '2022-06-08 03:05:39', '2022-06-08 03:05:39'),
(5, '1654679205', 'majadul', 1, 1, '2022-06-08 03:06:45', '2022-06-09 00:17:21'),
(6, '1654679246', 'eee44', 1, 1, '2022-06-08 03:07:26', '2022-06-08 03:07:26'),
(7, '1654679413', 'dddexxx', 1, 1, '2022-06-08 03:10:13', '2022-06-08 03:10:13'),
(8, '1654679535', 'fffeesssddd', 1, 1, '2022-06-08 03:12:15', '2022-06-08 03:12:15'),
(9, '1654679549', 'fffeesssdd', 1, 1, '2022-06-08 03:12:29', '2022-06-09 00:42:26'),
(10, '1654679600', 'ddeessss', 1, 1, '2022-06-08 03:13:20', '2022-06-08 03:13:20'),
(11, '1654679697', 'ddessqq', 1, 1, '2022-06-08 03:14:57', '2022-06-08 03:14:57'),
(12, '1654679700', 'ddessqq', 1, 1, '2022-06-08 03:15:00', '2022-06-08 03:15:00'),
(13, '1654679764', 'adfllo', 1, 1, '2022-06-08 03:16:04', '2022-06-08 03:16:04'),
(14, '1654752007', 'dddes', 1, 1, '2022-06-08 23:20:07', '2022-06-08 23:20:07'),
(15, '1654756872', 'dd', 1, 1, '2022-06-09 00:41:12', '2022-06-09 00:41:12'),
(16, '1654756877', 'xxesdd', 1, 1, '2022-06-09 00:41:17', '2022-06-09 00:41:25'),
(17, '1654756890', 'ddxx', 1, 1, '2022-06-09 00:41:30', '2022-06-09 00:41:30'),
(18, '1654756903', 'ddes', 1, 1, '2022-06-09 00:41:43', '2022-06-09 00:41:43'),
(19, '1654756913', 'shohagh', 1, 1, '2022-06-09 00:41:53', '2022-06-09 00:41:53'),
(20, '1654756958', 'robin', 1, 1, '2022-06-09 00:42:38', '2022-06-09 00:42:38'),
(21, '1654756968', 'manik', 1, 1, '2022-06-09 00:42:48', '2022-06-09 00:42:48'),
(22, '1654757019', 'cafe', 1, 1, '2022-06-09 00:43:39', '2022-06-09 01:45:24'),
(23, '1654757202', 'type', 1, 1, '2022-06-09 00:46:42', '2022-06-09 00:46:42'),
(24, '1654757299', 'akash', 1, 1, '2022-06-09 00:48:19', '2022-06-09 00:48:19'),
(25, '1654760942', 'majadul', 1, 1, '2022-06-09 01:49:02', '2022-06-11 04:26:03');

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
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `department_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1 = Active, 0 = Deactive',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `others` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `unique_id`, `barcode`, `item_name`, `department_id`, `category_id`, `brand_id`, `unit_id`, `size_id`, `color_id`, `purchase_price`, `sale_price`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `others`) VALUES
(1, '1655179442', '0001655179442', 'Chadwick Reese 07', 2, 3, 2, 2, 2, 1, 500, 600, NULL, 1, 1, 1, '2022-06-13 22:04:02', '2022-06-14 06:25:14', NULL),
(2, '1655179492', '0001655179499', 'Florence Espinoza 02', 2, 1, 2, 1, 1, 3, 700, 760, NULL, 1, 1, 1, '2022-06-13 22:04:52', '2022-06-13 22:04:52', NULL),
(3, '1655180030', '0001655180030', 'Tamara Norman 07', 16, 3, 1, 1, 2, 3, 500, 600, NULL, 1, 1, 1, '2022-06-13 22:13:50', '2022-06-14 05:43:48', NULL),
(4, '1655180128', '0001655180128', 'Martena Oneal 0', 13, 1, 2, 3, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:15:28', '2022-06-13 22:15:28', NULL),
(5, '1655180202', '0001655180202', 'Hiram Howe 0', 16, 3, 2, 2, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:16:42', '2022-06-13 22:16:42', NULL),
(6, '1655180219', '0001655180219', 'Hiram Howe 0', 16, 3, 2, 2, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:16:59', '2022-06-13 22:16:59', NULL),
(7, '1655180376', '0001655180376', 'Alfonso Vazquez 0', 19, 3, 1, 1, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:19:36', '2022-06-13 22:19:36', NULL),
(8, '1655180440', '0001655180440', 'Kiona Caldwell 0', 5, 2, 1, 2, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:20:40', '2022-06-13 22:20:40', NULL),
(9, '1655180488', '0001655180488', 'Dorian Clark 0', 12, 2, 1, 1, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:21:28', '2022-06-13 22:21:28', NULL),
(10, '1655180510', '0001655180510', 'Dorian Clark 0', 12, 2, 1, 1, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:21:50', '2022-06-13 22:21:50', NULL),
(11, '1655180643', '0001655180643', 'Ethan Ingram 11', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:03', '2022-06-13 22:24:03', NULL),
(12, '1655180649', '0001655180649', 'Ethan Ingram 12', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:09', '2022-06-13 22:24:09', NULL),
(13, '1655180654', '0001655180654', 'Ethan Ingram 13', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:14', '2022-06-13 22:24:14', NULL),
(14, '1655180658', '0001655180658', 'Ethan Ingram 14', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:18', '2022-06-13 22:24:18', NULL),
(15, '1655180663', '0001655180663', 'Ethan Ingram 15', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:23', '2022-06-13 22:24:23', NULL),
(16, '1655180667', '0001655180667', 'Ethan Ingram 16', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:27', '2022-06-13 22:24:27', NULL),
(17, '1655180674', '0001655180674', 'Ethan Ingram 17', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:34', '2022-06-13 22:24:34', NULL),
(18, '1655180678', '0001655180678', 'Ethan Ingram 18', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:38', '2022-06-13 22:24:38', NULL),
(19, '1655180682', '0001655180682', 'Ethan Ingram 19', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:42', '2022-06-13 22:24:42', NULL),
(20, '1655180688', '0001655180688', 'Ethan Ingram 20', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:24:48', '2022-06-13 22:24:48', NULL),
(21, '1655180705', '0001655180705', 'Ethan Ingram 21', 10, 3, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:25:05', '2022-06-13 22:25:05', NULL),
(22, '1655180819', '0001655180819', 'Hedy Combs 22', 3, 1, 2, 3, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:26:59', '2022-06-13 22:26:59', NULL),
(23, '1655180861', '0001655180861', 'Frances Leonard 23', 24, 1, 2, 1, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:27:41', '2022-06-13 22:27:41', NULL),
(24, '1655180869', '0001655180869', 'Frances Leonard 24', 24, 1, 2, 1, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:27:49', '2022-06-13 22:27:49', NULL),
(25, '1655180875', '0001655180875', 'Frances Leonard 25', 24, 1, 2, 1, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:27:55', '2022-06-13 22:27:55', NULL),
(26, '1655180967', '0001655180967', 'Drake Patel 26', 3, 1, 2, 3, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:29:27', '2022-06-13 22:29:27', NULL),
(27, '1655181161', '0001655181161', 'Liberty Mckee 27', 21, 2, 1, 2, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:32:41', '2022-06-13 22:32:41', NULL),
(28, '1655181195', '32163215487965', 'Ignatius Sexton 02', 12, 3, 1, 1, 2, 1, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:33:15', '2022-06-13 22:33:15', NULL),
(29, '1655181265', '32163215487966', 'Diana Chavez 29', 18, 2, 2, 3, 1, 3, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:34:25', '2022-06-13 22:34:25', NULL),
(30, '1655181444', '85201236548795', 'Malik Garrison 30', 19, 1, 2, 3, 2, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:37:24', '2022-06-13 22:37:24', NULL),
(31, '1655182267', '0001655182267', 'Jin Lloyd 02', 13, 1, 1, 1, 1, 3, 1, 2, NULL, 1, 1, 1, '2022-06-13 22:51:07', '2022-06-13 22:51:07', NULL),
(32, '1655182954', '1234564568978542', 'Martin Bright 32', 7, 1, 1, 3, 1, 3, 1, 2, NULL, 1, 1, 1, '2022-06-13 23:02:34', '2022-06-13 23:02:34', NULL),
(33, '1655183020', '12362145698756', 'Judith Farley 33', 5, 3, 1, 1, 2, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 23:03:40', '2022-06-13 23:03:40', NULL),
(34, '1655183212', '123456789', 'Amir Guy 34', 2, 2, 2, 2, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 23:06:52', '2022-06-13 23:06:52', NULL),
(35, '1655183504', '123655', 'Kirk Roberson 35', 23, 3, 1, 2, 1, 3, 1, 2, NULL, 1, 1, 1, '2022-06-13 23:11:44', '2022-06-13 23:11:44', NULL),
(36, '1655183671', '32132321312321', 'Craig Stark 35', 16, 1, 1, 1, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-13 23:14:31', '2022-06-13 23:14:31', NULL),
(37, '1655183697', '6456', 'Jolene Chapman', 10, 2, 1, 1, 2, 3, 467, 159, NULL, 1, 1, 1, '2022-06-13 23:14:57', '2022-06-13 23:14:57', NULL),
(38, '1655183707', '5456', 'Stephen Buckner', 18, 1, 1, 3, 2, 2, 856, 635, NULL, 1, 1, 1, '2022-06-13 23:15:07', '2022-06-13 23:15:07', NULL),
(39, '16551837011', '5456456', 'Stephen Buckner', 18, 1, 1, 3, 2, 2, 856, 635, NULL, 1, 1, 1, '2022-06-13 23:15:07', '2022-06-13 23:15:07', NULL),
(40, '1655183722', '123654789562', 'Uma Dean 02_', 12, 1, 2, 1, 1, 1, 361, 656, NULL, 1, 1, 1, '2022-06-13 23:15:22', '2022-06-14 00:09:15', NULL),
(41, '1655187032', '0001655187032', 'Xaviera Roberts 40', 10, 1, 2, 3, 2, 3, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:10:32', '2022-06-14 00:10:32', NULL),
(42, '1655187136', '0001655187136', 'Maisie Oneill 41', 10, 1, 2, 3, 1, 1, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:12:16', '2022-06-14 00:12:16', NULL),
(43, '1655187263', '0001655187263', 'Brendan Spence 42', 3, 2, 2, 2, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:14:23', '2022-06-14 00:14:23', NULL),
(44, '1655187381', '0001655187381', 'Alma Small 43', 1, 1, 1, 2, 1, 2, 415, 546, NULL, 1, 1, 1, '2022-06-14 00:16:21', '2022-06-14 00:16:21', NULL),
(45, '1655187390', '0001655187390', 'Alma Small 43', 1, 1, 1, 2, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:16:30', '2022-06-14 00:16:30', NULL),
(46, '1655187461', '0001655187461', 'Cole Estes 45', 14, 3, 2, 3, 2, 3, 20, 690, NULL, 1, 1, 1, '2022-06-14 00:17:41', '2022-06-14 00:17:41', NULL),
(47, '1655187510', '0001655187510', 'Chaim Rich 46', 18, 2, 2, 3, 1, 3, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:18:30', '2022-06-14 00:18:30', NULL),
(48, '1655187588', '0001655187588', 'Vielka Austin 47', 24, 2, 2, 3, 2, 3, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:19:48', '2022-06-14 00:19:48', NULL),
(49, '1655187679', '0001655187679', 'Graiden Chang 48', 20, 2, 1, 3, 2, 2, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:21:19', '2022-06-14 00:21:19', NULL),
(50, '1655187851', '0001655187851', 'Zahir Dickerson 49', 2, 2, 2, 1, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:24:11', '2022-06-14 00:24:11', NULL),
(51, '1655187905', '0001655187905', 'Callie Downs 50', 17, 1, 2, 3, 2, 3, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:25:05', '2022-06-14 00:25:05', NULL),
(52, '1655187988', '0001655187988', 'Jorden Sanchez 51', 8, 3, 2, 2, 1, 2, 1, 2, NULL, 1, 1, 1, '2022-06-14 00:26:28', '2022-06-23 02:36:05', NULL),
(53, '1655188053', '0001655188053', 'Emma Hobbs 52', 24, 1, 1, 2, 2, 2, 2, 5, NULL, 1, 1, 1, '2022-06-14 00:27:33', '2022-06-23 02:36:16', NULL),
(54, '1655188164', '0001655188164', 'Aladdin Ryan 53', 25, 1, 2, 2, 1, 1, 1, 3, NULL, 1, 1, 1, '2022-06-14 00:29:24', '2022-06-14 00:29:24', NULL),
(55, '1655198445', '222256', 'Charity Jensen', 6, 3, 2, 1, 1, 3, 192, 588, NULL, 1, 1, 1, '2022-06-14 00:34:05', '2022-06-14 00:34:05', NULL),
(56, '1655189445', '22225646', 'Charity Jensen', 6, 3, 2, 1, 1, 3, 192, 588, NULL, 1, 1, 1, '2022-06-14 00:34:05', '2022-06-14 00:34:05', NULL),
(57, '1655188499', '222256466', 'Charity Jensen', 6, 3, 2, 1, 1, 3, 192, 588, NULL, 1, 1, 1, '2022-06-14 00:34:05', '2022-06-14 00:34:05', NULL),
(58, '1655188447', '2222564665', 'Charity Jensen', 6, 3, 2, 1, 1, 3, 192, 588, NULL, 1, 1, 1, '2022-06-14 00:34:07', '2022-06-14 00:34:07', NULL),
(59, '1655188454', '2222564665654', 'Charity Jensen', 6, 3, 2, 1, 1, 3, 192, 588, NULL, 1, 1, 1, '2022-06-14 00:34:14', '2022-06-14 00:34:14', NULL),
(60, '1655188596', '0001655188596', 'Wade Price 222', 21, 3, 2, 2, 1, 1, 95, 604, NULL, 1, 1, 1, '2022-06-14 00:36:36', '2022-06-14 00:36:36', NULL),
(61, '1655188645', '0001655188645', 'Jesse Pennington 120', 17, 2, 1, 2, 1, 3, 5, 10, NULL, 1, 1, 1, '2022-06-14 00:37:25', '2022-06-14 00:37:25', NULL),
(62, '1655188678', '0001655188678', '00000000000', 19, 2, 1, 1, 2, 1, 10, 15, NULL, 1, 1, 1, '2022-06-14 00:37:58', '2022-08-06 23:27:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `unique_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'Item Master', NULL, NULL),
(2, '12345679', 'Inventory Master', NULL, NULL),
(3, '12345610', 'Costing vs Pricing', NULL, NULL),
(4, '12345680', 'Print Barcode', NULL, NULL),
(5, '12345681', 'Requisition / Pre-Order', NULL, NULL),
(6, '12345682', 'Purchase Master', NULL, NULL),
(7, '12345683', 'Customer Master', NULL, NULL),
(8, '12345684', 'Vendor Master', NULL, NULL),
(9, '12345685', 'Standard POS Settings', NULL, NULL),
(10, '12345686', 'POS Window', NULL, NULL),
(11, '12345699', 'Department', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(12, '12345690', 'Company Settings', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(13, '12345590', 'HR Settings', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(14, '12345591', 'Role', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(15, '12345592', 'Permission', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(16, '12345593', 'Other Settings', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(17, '12345594', 'Unit', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(18, '12345595', 'Category', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(19, '12345596', 'Brand', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(20, '12345597', 'Size', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(21, '12345598', 'Color', '2022-06-04 12:03:51', '2022-06-04 12:03:51'),
(22, 'p12345598', 'Payables', '2022-06-15 12:03:51', '2022-06-15 12:03:51'),
(23, 'r12345598', 'Receivables', '2022-06-15 12:03:51', '2022-06-15 12:03:51'),
(24, 'ma12345598', 'Manage Accounts', '2022-06-15 12:03:51', '2022-06-15 12:03:51'),
(25, 'v1234559', 'Vendor Type', '2022-06-15 12:03:51', '2022-06-15 12:03:51'),
(26, 'C1234559', 'Customer Type', '2022-06-15 12:03:51', '2022-06-15 12:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `menu_actions`
--

CREATE TABLE `menu_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_actions`
--

INSERT INTO `menu_actions` (`id`, `menu_id`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(43, 2, 1, NULL, NULL),
(44, 2, 2, NULL, NULL),
(45, 2, 3, NULL, NULL),
(46, 2, 4, NULL, NULL),
(47, 3, 1, NULL, NULL),
(48, 3, 2, NULL, NULL),
(49, 3, 3, NULL, NULL),
(50, 3, 4, NULL, NULL),
(51, 4, 1, NULL, NULL),
(52, 4, 2, NULL, NULL),
(53, 4, 3, NULL, NULL),
(54, 4, 4, NULL, NULL),
(55, 5, 1, NULL, NULL),
(56, 5, 2, NULL, NULL),
(57, 5, 3, NULL, NULL),
(58, 5, 4, NULL, NULL),
(59, 6, 1, NULL, NULL),
(60, 6, 2, NULL, NULL),
(61, 6, 3, NULL, NULL),
(62, 6, 4, NULL, NULL),
(63, 7, 1, NULL, NULL),
(64, 7, 2, NULL, NULL),
(65, 7, 3, NULL, NULL),
(66, 7, 4, NULL, NULL),
(67, 8, 1, NULL, NULL),
(68, 8, 2, NULL, NULL),
(69, 8, 3, NULL, NULL),
(70, 8, 4, NULL, NULL),
(71, 9, 1, NULL, NULL),
(72, 9, 2, NULL, NULL),
(73, 9, 3, NULL, NULL),
(74, 9, 4, NULL, NULL),
(75, 10, 1, NULL, NULL),
(76, 10, 2, NULL, NULL),
(77, 10, 3, NULL, NULL),
(78, 10, 4, NULL, NULL),
(79, 11, 1, NULL, NULL),
(80, 11, 2, NULL, NULL),
(81, 11, 3, NULL, NULL),
(82, 11, 4, NULL, NULL),
(83, 12, 1, NULL, NULL),
(84, 12, 2, NULL, NULL),
(85, 12, 3, NULL, NULL),
(86, 12, 4, NULL, NULL),
(87, 13, 1, NULL, NULL),
(88, 13, 2, NULL, NULL),
(89, 13, 3, NULL, NULL),
(90, 13, 4, NULL, NULL),
(91, 14, 1, NULL, NULL),
(92, 14, 2, NULL, NULL),
(93, 14, 3, NULL, NULL),
(94, 14, 4, NULL, NULL),
(95, 15, 1, NULL, NULL),
(96, 15, 2, NULL, NULL),
(97, 15, 3, NULL, NULL),
(98, 15, 4, NULL, NULL),
(99, 16, 1, NULL, NULL),
(100, 16, 2, NULL, NULL),
(101, 16, 3, NULL, NULL),
(102, 16, 4, NULL, NULL),
(103, 17, 1, NULL, NULL),
(104, 17, 2, NULL, NULL),
(105, 17, 3, NULL, NULL),
(106, 17, 4, NULL, NULL),
(107, 18, 1, NULL, NULL),
(108, 18, 2, NULL, NULL),
(109, 18, 3, NULL, NULL),
(110, 18, 4, NULL, NULL),
(111, 19, 1, NULL, NULL),
(112, 19, 2, NULL, NULL),
(113, 19, 3, NULL, NULL),
(114, 19, 4, NULL, NULL),
(115, 20, 1, NULL, NULL),
(116, 20, 2, NULL, NULL),
(117, 20, 3, NULL, NULL),
(118, 20, 4, NULL, NULL),
(119, 21, 1, NULL, NULL),
(120, 21, 2, NULL, NULL),
(121, 21, 3, NULL, NULL),
(122, 21, 4, NULL, NULL),
(123, 22, 1, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(124, 22, 2, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(125, 22, 3, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(126, 22, 4, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(127, 23, 1, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(128, 23, 2, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(129, 23, 3, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(130, 23, 4, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(131, 24, 1, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(132, 24, 2, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(133, 24, 3, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(134, 24, 4, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(135, 25, 1, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(136, 25, 2, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(137, 25, 3, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(138, 25, 4, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(139, 26, 1, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(140, 26, 2, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(141, 26, 3, '2022-06-15 04:29:41', '2022-06-15 04:29:41'),
(142, 26, 4, '2022-06-15 04:29:41', '2022-06-15 04:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `menu_to_roles`
--

CREATE TABLE `menu_to_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_to_roles`
--

INSERT INTO `menu_to_roles` (`id`, `role_id`, `menu_id`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(2, 4, 4, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(3, 4, 4, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(4, 4, 2, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(5, 4, 1, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(6, 4, 2, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(7, 4, 4, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(8, 4, 5, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(9, 4, 6, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(10, 4, 7, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(11, 4, 8, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(12, 4, 9, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(13, 4, 10, 1, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(14, 4, 10, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(15, 4, 10, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(16, 4, 10, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(17, 4, 9, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(18, 4, 9, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(19, 4, 9, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(20, 4, 8, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(21, 4, 7, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(22, 4, 6, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(23, 4, 5, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(24, 4, 5, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(25, 4, 6, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(26, 4, 7, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(27, 4, 8, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(28, 4, 8, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(29, 4, 7, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(30, 4, 6, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(31, 4, 5, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(32, 4, 4, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(33, 4, 3, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(34, 4, 3, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(35, 4, 3, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(36, 4, 2, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(37, 4, 2, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(38, 4, 1, 2, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(39, 4, 1, 3, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(40, 4, 1, 4, '2022-05-30 00:56:33', '2022-05-30 00:56:33'),
(41, 1, 1, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(42, 1, 1, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(43, 1, 1, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(44, 1, 1, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(45, 1, 2, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(46, 1, 3, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(47, 1, 4, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(48, 1, 5, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(49, 1, 6, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(50, 1, 7, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(51, 1, 8, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(52, 1, 9, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(53, 1, 10, 1, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(54, 1, 10, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(55, 1, 9, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(56, 1, 8, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(57, 1, 7, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(58, 1, 6, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(59, 1, 5, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(60, 1, 4, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(61, 1, 3, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(62, 1, 2, 2, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(63, 1, 2, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(64, 1, 3, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(65, 1, 4, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(66, 1, 5, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(67, 1, 6, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(68, 1, 7, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(69, 1, 8, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(70, 1, 9, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(71, 1, 10, 3, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(72, 1, 10, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(73, 1, 9, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(74, 1, 8, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(75, 1, 7, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(76, 1, 6, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(77, 1, 5, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(78, 1, 4, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(79, 1, 3, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(80, 1, 2, 4, '2022-06-02 02:00:33', '2022-06-02 02:00:33'),
(89, 2, 10, 1, '2022-07-17 22:42:28', '2022-07-17 22:42:28'),
(90, 2, 10, 2, '2022-07-17 22:42:28', '2022-07-17 22:42:28'),
(91, 2, 10, 3, '2022-07-17 22:42:28', '2022-07-17 22:42:28'),
(92, 2, 10, 4, '2022-07-17 22:42:28', '2022-07-17 22:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `menu_to_users`
--

CREATE TABLE `menu_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_to_users`
--

INSERT INTO `menu_to_users` (`id`, `user_id`, `menu_id`, `action_id`, `created_at`, `updated_at`) VALUES
(5, 2, 2, 1, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(6, 2, 2, 2, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(7, 2, 2, 3, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(8, 2, 2, 4, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(9, 2, 7, 1, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(10, 2, 7, 2, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(11, 2, 7, 3, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(12, 2, 7, 4, '2022-04-15 00:52:04', '2022-04-15 00:52:04'),
(45, 1, 1, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(46, 1, 1, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(47, 1, 1, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(48, 1, 1, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(49, 1, 2, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(50, 1, 2, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(51, 1, 2, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(52, 1, 2, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(53, 1, 3, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(54, 1, 3, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(55, 1, 3, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(56, 1, 3, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(57, 1, 4, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(58, 1, 4, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(59, 1, 4, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(60, 1, 4, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(61, 1, 5, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(62, 1, 5, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(63, 1, 5, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(64, 1, 5, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(65, 1, 6, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(66, 1, 6, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(67, 1, 6, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(68, 1, 6, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(69, 1, 7, 1, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(70, 1, 7, 2, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(71, 1, 7, 3, '2022-05-06 23:09:28', '2022-05-06 23:09:28'),
(72, 1, 7, 4, '2022-05-06 23:09:28', '2022-05-06 23:09:28');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_23_014645_create_menus_table', 2),
(6, '2022_03_23_015312_create_roles_table', 2),
(7, '2022_03_23_020938_create_actions_table', 2),
(8, '2022_03_23_022409_create_menu_activities_table', 2),
(9, '2022_03_23_022651_create_menu_to_users_table', 2),
(10, '2022_03_23_022806_create_menu_to_roles_table', 2),
(13, '2022_06_02_073135_create_customers_table', 3),
(14, '2022_06_04_105309_create_departments_table', 3),
(21, '2022_08_15_075230_create_sales_table', 4),
(22, '2022_08_17_050059_create_sell_transactions_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654948964', '1254680', 1, 1, '2022-06-11 06:02:44', '2022-06-11 06:02:55'),
(2, '1654948984', '1258456', 1, 1, '2022-06-11 06:03:04', '2022-06-11 06:03:04'),
(3, '1654948987', '1023548', 1, 1, '2022-06-11 06:03:07', '2022-06-11 06:03:07'),
(4, '1656571930', '12356898', 1, 1, '2022-06-30 00:52:10', '2022-08-06 23:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `unique_id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '19145546', 'Super Admin', 1, '2022-05-08 05:41:08', '2022-05-08 05:41:08'),
(2, '19145544', 'Manager', 1, '2022-05-08 05:41:08', '2022-05-08 05:41:08'),
(3, '19145566', 'Cashier', 1, '2022-05-08 05:41:08', '2022-05-08 05:41:08'),
(4, '1653134676', 'master', 1, '2022-05-21 06:04:36', '2022-05-21 06:04:36'),
(136, '1656585917', 'Sale Man', 1, '2022-06-30 04:45:17', '2022-06-30 04:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cancel, Hold, Drawer, Return, Completed',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `register_no`, `transaction_id`, `product_id`, `barcode`, `product_title`, `quantity`, `vat`, `tax`, `price`, `total_amount`, `color`, `size`, `unit`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1023548', '1660713803', 2, '0001655179499', 'Florence Espinoza 02', '1', '0', '0', '760', '760', 'blue', '48', 'KG-2', NULL, 1, '2022-08-16 23:23:23', '2022-08-16 23:23:23'),
(2, '1023548', '1660713803', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-16 23:23:23', '2022-08-16 23:23:23'),
(3, '1023548', '1660714126', 8, '0001655180440', 'Kiona Caldwell 0', '1', '0', '0', '2', '2', 'Green', '44', 'PCS', NULL, 1, '2022-08-16 23:28:46', '2022-08-16 23:28:46'),
(4, '1023548', '1660714126', 7, '0001655180376', 'Alfonso Vazquez 0', '1', '0', '0', '2', '2', 'red', '48', 'KG-2', NULL, 1, '2022-08-16 23:28:46', '2022-08-16 23:28:46'),
(5, '1023548', '1660714329', 18, '0001655180678', 'Ethan Ingram 18', '1', '0', '0', '2', '2', 'Green', '48', 'Dorzon', NULL, 1, '2022-08-16 23:32:09', '2022-08-16 23:32:09'),
(6, '1023548', '1660714329', 12, '0001655180649', 'Ethan Ingram 12', '1', '0', '0', '2', '2', 'Green', '48', 'Dorzon', NULL, 1, '2022-08-16 23:32:09', '2022-08-16 23:32:09'),
(7, '1023548', '1660714351', 18, '0001655180678', 'Ethan Ingram 18', '1', '0', '0', '2', '2', 'Green', '48', 'Dorzon', NULL, 1, '2022-08-16 23:32:31', '2022-08-16 23:32:31'),
(8, '1023548', '1660714351', 18, '0001655180678', 'Ethan Ingram 18', '1', '0', '0', '2', '2', 'Green', '48', 'Dorzon', NULL, 1, '2022-08-16 23:32:31', '2022-08-16 23:32:31'),
(9, '1023548', '1660714537', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-16 23:35:37', '2022-08-16 23:35:37'),
(10, '1023548', '1660714558', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-16 23:35:58', '2022-08-16 23:35:58'),
(11, '1023548', '1660714599', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-16 23:36:39', '2022-08-16 23:36:39'),
(12, '1023548', '1660714618', 2, '0001655179499', 'Florence Espinoza 02', '1', '0', '0', '760', '760', 'blue', '48', 'KG-2', NULL, 1, '2022-08-16 23:36:58', '2022-08-16 23:36:58'),
(13, '1023548', '1660716146', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-17 00:02:26', '2022-08-17 00:02:26'),
(14, '1023548', '1660716146', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-17 00:02:26', '2022-08-17 00:02:26'),
(15, '1023548', '1660716179', 1, '0001655179442', 'Chadwick Reese 07', '1', '0', '0', '600', '600', 'Green', '44', 'PCS', NULL, 1, '2022-08-17 00:02:59', '2022-08-17 00:02:59'),
(16, '1023548', '1660716800', 25, '0001655180875', 'Frances Leonard 25', '1', '0', '0', '2', '2', 'Green', '48', 'KG-2', NULL, 1, '2022-08-17 00:13:20', '2022-08-17 00:13:20'),
(17, '1023548', '1660716921', 25, '0001655180875', 'Frances Leonard 25', '1', '0', '0', '2', '2', 'Green', '48', 'KG-2', NULL, 1, '2022-08-17 00:15:21', '2022-08-17 00:15:21'),
(18, '1023548', '1660716938', 25, '0001655180875', 'Frances Leonard 25', '1', '0', '0', '2', '2', 'Green', '48', 'KG-2', NULL, 1, '2022-08-17 00:15:38', '2022-08-17 00:15:38'),
(19, '1023548', '1660716938', 25, '0001655180875', 'Frances Leonard 25', '1', '0', '0', '2', '2', 'Green', '48', 'KG-2', NULL, 1, '2022-08-17 00:15:38', '2022-08-17 00:15:38'),
(20, '1023548', '1661058695', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:11:35', '2022-08-20 23:11:35'),
(21, '1023548', '1661058904', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:15:04', '2022-08-20 23:15:04'),
(22, '1023548', '1661059137', 43, '0001655187263', 'Brendan Spence 42', '1', '0', '0', '2', '2', 'red', '48', 'PCS', NULL, 1, '2022-08-20 23:18:57', '2022-08-20 23:18:57'),
(23, '1023548', '1661059137', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', NULL, 1, '2022-08-20 23:18:57', '2022-08-20 23:18:57'),
(24, '1023548', '1661059549', 51, '0001655187905', 'Callie Downs 50', '1', '0', '0', '2', '2', 'blue', '44', 'Dorzon', NULL, 1, '2022-08-20 23:25:49', '2022-08-20 23:25:49'),
(25, '1023548', '1661059549', 51, '0001655187905', 'Callie Downs 50', '1', '0', '0', '2', '2', 'blue', '44', 'Dorzon', NULL, 1, '2022-08-20 23:25:49', '2022-08-20 23:25:49'),
(26, '1023548', '1661059775', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:29:35', '2022-08-20 23:29:35'),
(27, '1023548', '1661059775', 51, '0001655187905', 'Callie Downs 50', '1', '0', '0', '2', '2', 'blue', '44', 'Dorzon', NULL, 1, '2022-08-20 23:29:35', '2022-08-20 23:29:35'),
(28, '1023548', '1661059836', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:30:36', '2022-08-20 23:30:36'),
(29, '1023548', '1661059836', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:30:36', '2022-08-20 23:30:36'),
(30, '1254680', '1661060741', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', NULL, 1, '2022-08-20 23:45:41', '2022-08-20 23:45:41'),
(31, '1254680', '1661060858', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', NULL, 1, '2022-08-20 23:47:38', '2022-08-20 23:47:38'),
(32, '1254680', '1661060858', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', NULL, 1, '2022-08-20 23:47:38', '2022-08-20 23:47:38'),
(33, '1023548', '1663138163', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', NULL, 1, '2022-09-14 00:49:23', '2022-09-14 00:49:23'),
(34, '1023548', '1663138163', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', NULL, 1, '2022-09-14 00:49:23', '2022-09-14 00:49:23'),
(35, '1023548', '1663138163', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', NULL, 1, '2022-09-14 00:49:23', '2022-09-14 00:49:23'),
(36, '1023548', '1663138414', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-14 00:53:34', '2022-09-14 00:53:34'),
(37, '1023548', '1663138414', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-09-14 00:53:34', '2022-09-14 00:53:34'),
(38, '1023548', '1663138414', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-09-14 00:53:34', '2022-09-14 00:53:34'),
(43, '1023548', '1663230718', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Hold', 1, '2022-09-15 02:31:59', '2022-09-15 02:31:59'),
(47, '1023548', '1663230882', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 02:34:43', '2022-09-15 02:34:43'),
(48, '1023548', '1663230882', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 02:34:43', '2022-09-15 02:34:43'),
(52, '1023548', '1663231059', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 02:37:39', '2022-09-15 02:37:39'),
(53, '1023548', '1663231071', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 02:37:51', '2022-09-15 02:37:51'),
(54, '1023548', '1663231090', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 02:38:10', '2022-09-15 02:38:10'),
(58, '1023548', '1663238077', 55, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:34:37', '2022-09-15 04:34:37'),
(59, '1023548', '1663238077', 56, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:34:37', '2022-09-15 04:34:37'),
(60, '1023548', '1663238077', 57, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:34:37', '2022-09-15 04:34:37'),
(61, '1023548', '1663238095', 51, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:34:55', '2022-09-15 04:34:55'),
(62, '1023548', '1663238288', 55, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:38:08', '2022-09-15 04:38:08'),
(63, '1023548', '1663238288', 56, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:38:08', '2022-09-15 04:38:08'),
(64, '1023548', '1663238288', 57, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:38:08', '2022-09-15 04:38:08'),
(65, '1023548', '1663238465', 50, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:41:05', '2022-09-15 04:41:05'),
(73, '1023548', '1663238630', 69, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-15 04:43:50', '2022-09-15 04:43:50'),
(74, '1023548', '1663238630', 70, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:43:50', '2022-09-15 04:43:50'),
(75, '1023548', '1663238630', 71, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:43:50', '2022-09-15 04:43:50'),
(76, '1023548', '1663238630', 72, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:43:50', '2022-09-15 04:43:50'),
(77, '1023548', '1663238643', 44, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-15 04:44:03', '2022-09-15 04:44:03'),
(78, '1023548', '1663238643', 45, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-15 04:44:03', '2022-09-15 04:44:03'),
(79, '1023548', '1663238673', 51, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:44:33', '2022-09-15 04:44:33'),
(80, '1023548', '1663238712', 46, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-15 04:45:12', '2022-09-15 04:45:12'),
(84, '1023548', '1663238831', 57, '222256466', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:47:11', '2022-09-15 04:47:11'),
(85, '1023548', '1663238844', 81, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-09-15 04:47:24', '2022-09-15 04:47:24'),
(86, '1023548', '1663238844', 82, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-15 04:47:24', '2022-09-15 04:47:24'),
(87, '1023548', '1663238844', 83, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-15 04:47:24', '2022-09-15 04:47:24'),
(95, '1023548', '1663577197', 39, '0001655188053', 'Emma Hobbs 52', '1', '0', '0', '5', '5', 'red', '44', 'PCS', 'Completed', 1, '2022-09-19 02:46:37', '2022-09-19 02:46:37'),
(96, '1023548', '1663577197', 40, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-09-19 02:46:37', '2022-09-19 02:46:37'),
(97, '1023548', '1663577197', 41, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-19 02:46:37', '2022-09-19 02:46:37'),
(98, '1023548', '1663577197', 42, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-19 02:46:37', '2022-09-19 02:46:37'),
(99, '1023548', '1663675748', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(100, '1023548', '1663675748', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(101, '1023548', '1663675748', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(102, '1023548', '1663675748', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(103, '1023548', '1663675748', 61, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(104, '1023548', '1663675748', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(105, '1023548', '1663675748', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(106, '1023548', '1663675748', 62, '0001655188678', '00000000000', '1', '0', '0', '15', '15', 'Green', '44', 'KG-2', 'Completed', 1, '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(109, '1023548', '1663679551', 107, '222256466', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-20 07:12:31', '2022-09-20 07:12:31'),
(110, '1023548', '1663679551', 108, '222256466', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-20 07:12:31', '2022-09-20 07:12:31'),
(111, '1023548', '1663761412', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-21 05:56:53', '2022-09-21 05:56:53'),
(112, '1023548', '1663763766', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-21 06:36:06', '2022-09-21 06:36:06'),
(113, '1023548', '1663764143', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-21 06:42:23', '2022-09-21 06:42:23'),
(114, '1023548', '1663764143', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-21 06:42:23', '2022-09-21 06:42:23'),
(115, '1023548', '1664017284', 54, '0001655188164', 'Aladdin Ryan 53', '1', '0', '0', '3', '3', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-24 05:01:24', '2022-09-24 05:01:24'),
(116, '1023548', '1664017347', 54, '0001655188164', 'Aladdin Ryan 53', '1', '0', '0', '3', '3', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-24 05:02:27', '2022-09-24 05:02:27'),
(117, '1023548', '1664017900', 54, '0001655188164', 'Aladdin Ryan 53', '1', '0', '0', '3', '3', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-24 05:11:40', '2022-09-24 05:11:40'),
(118, '1023548', '1664017968', 54, '0001655188164', 'Aladdin Ryan 53', '1', '0', '0', '3', '3', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-24 05:12:48', '2022-09-24 05:12:48'),
(119, '1023548', '1664017993', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-24 05:13:13', '2022-09-24 05:13:13'),
(121, '1023548', '1664432573', 57, '222256466', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 00:22:53', '2022-09-29 00:22:53'),
(122, '1023548', '1664432573', 57, '222256466', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 00:22:53', '2022-09-29 00:22:53'),
(123, '1023548', '1664433007', 120, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Return', 1, '2022-09-29 00:30:07', '2022-09-29 00:30:07'),
(126, '1023548', '1664434926', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-29 01:02:06', '2022-09-29 01:02:06'),
(127, '1023548', '1664434926', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-29 01:02:06', '2022-09-29 01:02:06'),
(128, '1023548', '1664434926', 124, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Hold', 1, '2022-09-29 01:02:06', '2022-09-29 01:02:06'),
(129, '1023548', '1664434926', 125, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 01:02:06', '2022-09-29 01:02:06'),
(130, '1023548', '1664442555', 127, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Return', 1, '2022-09-29 03:09:15', '2022-09-29 03:09:15'),
(131, '1023548', '1664442555', 129, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Return', 1, '2022-09-29 03:09:15', '2022-09-29 03:09:15'),
(132, '1023548', '1664442585', 91, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Return', 1, '2022-09-29 03:09:45', '2022-09-29 03:09:45'),
(133, '1023548', '1664442585', 92, '0001655188645', 'Jesse Pennington 120', '1', '0', '0', '10', '10', 'blue', '48', 'PCS', 'Return', 1, '2022-09-29 03:09:45', '2022-09-29 03:09:45'),
(141, '1023548', '1664443564', 136, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-09-29 03:26:04', '2022-09-29 03:26:04'),
(142, '1023548', '1664443564', 139, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 03:26:04', '2022-09-29 03:26:04'),
(143, '1023548', '1664444392', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(144, '1023548', '1664444392', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(145, '1023548', '1664444392', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(146, '1023548', '1664444392', 58, '2222564665', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(147, '1023548', '1664444392', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(148, '1023548', '1664444392', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(149, '1023548', '1664444392', 143, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Return', 1, '2022-09-29 03:40:01', '2022-09-29 03:40:01'),
(150, '1023548', '1664444392', 144, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Return', 1, '2022-09-29 03:40:01', '2022-09-29 03:40:01'),
(151, '1023548', '1664444392', 148, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Return', 1, '2022-09-29 03:40:01', '2022-09-29 03:40:01'),
(152, '1023548', '1664444466', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:06', '2022-09-29 03:41:06'),
(153, '1023548', '1664444466', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:06', '2022-09-29 03:41:06'),
(154, '1023548', '1664444466', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:06', '2022-09-29 03:41:06'),
(155, '1023548', '1664444466', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:06', '2022-09-29 03:41:06'),
(156, '1023548', '1664444470', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:10', '2022-09-29 03:41:10'),
(157, '1023548', '1664444470', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Hold', 1, '2022-09-29 03:41:10', '2022-09-29 03:41:10'),
(158, '1023548', '1664444497', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 03:41:37', '2022-09-29 03:41:37'),
(159, '1023548', '1664444497', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 03:41:37', '2022-09-29 03:41:37'),
(160, '1023548', '1664444497', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 03:41:37', '2022-09-29 03:41:37'),
(161, '1023548', '1664444497', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 03:41:37', '2022-09-29 03:41:37'),
(162, '1023548', '1664448581', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:49:41', '2022-09-29 04:49:41'),
(163, '1023548', '1664448581', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:49:41', '2022-09-29 04:49:41'),
(164, '1023548', '1664448581', 55, '222256', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:49:41', '2022-09-29 04:49:41'),
(165, '1023548', '1664448662', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:51:02', '2022-09-29 04:51:02'),
(166, '1023548', '1664448662', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:51:02', '2022-09-29 04:51:02'),
(167, '1023548', '1664448662', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:51:02', '2022-09-29 04:51:02'),
(168, '1023548', '1664448662', 59, '2222564665654', 'Charity Jensen', '1', '0', '0', '588', '588', 'blue', '48', 'KG-2', 'Completed', 1, '2022-09-29 04:51:02', '2022-09-29 04:51:02'),
(174, '1023548', '1665212985', 169, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:09:45', '2022-10-08 01:09:45'),
(175, '1023548', '1665212935', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Return', 1, '2022-10-08 01:10:02', '2022-10-08 01:10:02'),
(183, '1023548', '1665213457', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:17:37', '2022-10-08 01:17:37'),
(184, '1023548', '1665213457', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:17:37', '2022-10-08 01:17:37'),
(185, '1023548', '1665213457', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:17:37', '2022-10-08 01:17:37'),
(186, '1023548', '1665213486', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:18:06', '2022-10-08 01:18:06'),
(187, '1023548', '1665213486', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:18:06', '2022-10-08 01:18:06'),
(188, '1023548', '1665213526', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:18:46', '2022-10-08 01:18:46'),
(189, '1023548', '1665214042', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:27:22', '2022-10-08 01:27:22'),
(190, '1023548', '1665214042', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:27:22', '2022-10-08 01:27:22'),
(191, '1023548', '1665214042', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:27:22', '2022-10-08 01:27:22'),
(192, '1023548', '1665214255', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:30:55', '2022-10-08 01:30:55'),
(193, '1023548', '1665214255', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:30:55', '2022-10-08 01:30:55'),
(194, '1023548', '1665214273', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:31:13', '2022-10-08 01:31:13'),
(195, '1023548', '1665214337', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:32:17', '2022-10-08 01:32:17'),
(196, '1023548', '1665214475', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:34:35', '2022-10-08 01:34:35'),
(197, '1023548', '1665214496', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:34:56', '2022-10-08 01:34:56'),
(198, '1023548', '1665214516', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:35:16', '2022-10-08 01:35:16'),
(199, '1023548', '1665214540', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:35:40', '2022-10-08 01:35:40'),
(200, '1023548', '1665214540', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 01:35:40', '2022-10-08 01:35:40'),
(201, '1023548', '1665217115', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:18:35', '2022-10-08 02:18:35'),
(202, '1023548', '1665217115', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:18:35', '2022-10-08 02:18:35'),
(203, '1023548', '1665217165', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:19:25', '2022-10-08 02:19:25'),
(204, '1023548', '1665217165', 60, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:19:25', '2022-10-08 02:19:25'),
(205, '1023548', '1665217303', 177, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:43', '2022-10-08 02:21:43'),
(206, '1023548', '1665217303', 178, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:43', '2022-10-08 02:21:43'),
(207, '1023548', '1665217303', 179, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:43', '2022-10-08 02:21:43'),
(208, '1023548', '1665217304', 177, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:44', '2022-10-08 02:21:44'),
(209, '1023548', '1665217304', 178, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:44', '2022-10-08 02:21:44'),
(210, '1023548', '1665217304', 179, '0001655188596', 'Wade Price 222', '1', '0', '0', '604', '604', 'Green', '48', 'PCS', 'Completed', 1, '2022-10-08 02:21:44', '2022-10-08 02:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `sell_registers`
--

CREATE TABLE `sell_registers` (
  `id` bigint(20) NOT NULL,
  `openning_balance` varchar(100) DEFAULT NULL,
  `register_no` varchar(255) NOT NULL,
  `staff_id` varchar(25) NOT NULL,
  `created_day` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_registers`
--

INSERT INTO `sell_registers` (`id`, `openning_balance`, `register_no`, `staff_id`, `created_day`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, '20', '1023548', '00000', '2022-09-19', 'Open', 1, 1, '2022-09-19 05:17:49', '2022-09-19 05:17:49'),
(4, '200', '1023548', '00000', '2022-09-20', 'Open', 1, 1, '2022-09-20 04:05:38', '2022-09-20 04:05:38'),
(5, '200', '1258456', '00000', '2022-09-21', 'Open', 1, 1, '2022-09-20 23:22:50', '2022-09-20 23:22:50'),
(6, '20', '1023548', '00000', '2022-09-24', 'Open', 1, 1, '2022-09-24 05:00:29', '2022-09-24 05:00:29'),
(7, '200', '1023548', '00000', '2022-09-29', 'Close', 1, 1, '2022-09-29 00:20:21', '2022-09-29 00:20:21'),
(8, '20', '1023548', '00000', '2022-10-01', 'Open', 1, 1, '2022-10-01 02:51:57', '2022-10-01 02:51:57'),
(9, '20', '1258456', '00000', '2022-10-08', 'Open', 1, 1, '2022-10-08 01:08:19', '2022-10-08 01:08:19'),
(10, '20', '1258456', '00000', '2022-10-10', 'Open', 1, 1, '2022-10-09 23:03:04', '2022-10-09 23:03:04'),
(11, '20', '1258456', '00000', '2022-10-13', 'Open', 1, 1, '2022-10-13 08:15:21', '2022-10-13 08:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `sell_transactions`
--

CREATE TABLE `sell_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `vat` double NOT NULL,
  `vat_amount` double DEFAULT 0,
  `tax` double NOT NULL,
  `tax_amount` double DEFAULT 0,
  `discount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double DEFAULT 0,
  `total_amount` double NOT NULL,
  `grand_total` double DEFAULT 0,
  `exchange_amount` double DEFAULT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '''Cash''',
  `others_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_amount` double DEFAULT NULL,
  `register_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cancel, Hold, Drawer, Return, Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_transactions`
--

INSERT INTO `sell_transactions` (`id`, `order_no`, `transaction_id`, `quantity`, `vat`, `vat_amount`, `tax`, `tax_amount`, `discount`, `discount_amount`, `total_amount`, `grand_total`, `exchange_amount`, `payment_type`, `others_transaction_id`, `return_amount`, `register_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '1660713803', '1660713803', 2, 0, 0, 0, 0, NULL, 0, 1360, 0, 1400, 'Cash', NULL, 40, NULL, NULL, '2022-08-16 23:23:23', '2022-08-16 23:23:23'),
(2, '1660714126', '1660714126', 2, 0, 0, 0, 0, NULL, 0, 4, 0, 5, 'Cash', NULL, 1, NULL, NULL, '2022-08-16 23:28:46', '2022-08-16 23:28:46'),
(3, '1660714329', '1660714329', 2, 0, 0, 0, 0, NULL, 0, 4, 0, 5, 'Cash', NULL, 1, NULL, NULL, '2022-08-16 23:32:09', '2022-08-16 23:32:09'),
(4, '1660714351', '1660714351', 2, 0, 0, 0, 0, NULL, 0, 4, 0, 5, 'Cash', NULL, 1, NULL, NULL, '2022-08-16 23:32:31', '2022-08-16 23:32:31'),
(5, '1660714537', '1660714537', 1, 0, 0, 0, 0, NULL, 0, 600, 0, 600, 'Cash', NULL, 0, NULL, NULL, '2022-08-16 23:35:37', '2022-08-16 23:35:37'),
(6, '1660714558', '1660714558', 1, 0, 0, 0, 0, NULL, 0, 600, 0, 600, 'Cash', NULL, 0, NULL, NULL, '2022-08-16 23:35:58', '2022-08-16 23:35:58'),
(7, '1660714599', '1660714599', 1, 0, 0, 0, 0, NULL, 0, 600, 0, 600, 'Cash', NULL, 0, NULL, NULL, '2022-08-16 23:36:39', '2022-08-16 23:36:39'),
(8, '1660714618', '1660714618', 1, 0, 0, 0, 0, NULL, 0, 760, 0, 800, 'Cash', NULL, 40, NULL, NULL, '2022-08-16 23:36:58', '2022-08-16 23:36:58'),
(9, '1660716146', '1660716146', 2, 0, 0, 0, 0, NULL, 0, 1200, 0, 2000, 'Cash', NULL, NULL, NULL, NULL, '2022-08-17 00:02:26', '2022-08-17 00:02:26'),
(10, '1660716179', '1660716179', 1, 0, 0, 0, 0, NULL, 0, 600, 0, 600, 'Cash', NULL, 0, NULL, NULL, '2022-08-17 00:02:59', '2022-08-17 00:02:59'),
(11, '1660716800', '1660716800', 1, 0, 0, 0, 0, NULL, 0, 2, 0, 2, 'Cash', NULL, 0, NULL, NULL, '2022-08-17 00:13:20', '2022-08-17 00:13:20'),
(12, '1660716921', '1660716921', 1, 0, 0, 0, 0, NULL, 0, 2, 0, 2, 'Cash', NULL, 0, NULL, NULL, '2022-08-17 00:15:21', '2022-08-17 00:15:21'),
(13, '1660716938', '1660716938', 2, 0, 0, 0, 0, NULL, 0, 4, 0, 5, 'Cash', NULL, 1, NULL, NULL, '2022-08-17 00:15:38', '2022-08-17 00:15:38'),
(14, '1661058904', '1661058904', 1, 0, 0, 0, 0, NULL, 0, 15, 0, NULL, 'visa', '002XYXRE', 0, NULL, NULL, '2022-08-20 23:15:04', '2022-08-20 23:15:04'),
(15, '1661059137', '1661059137', 2, 0, 0, 0, 0, NULL, 0, 590, 0, NULL, 'master', 'XYJT580', -588, NULL, NULL, '2022-08-20 23:18:57', '2022-08-20 23:18:57'),
(16, '1661059549', '1661059549', 2, 0, 0, 0, 0, NULL, 0, 4, 0, NULL, 'amex', '02GTRFgty01', -2, NULL, NULL, '2022-08-20 23:25:49', '2022-08-20 23:25:49'),
(17, '1661059775', '1661059775', 2, 0, 0, 0, 0, NULL, 0, 17, 0, NULL, 'master', 'XYJT580SDFE', -2, NULL, NULL, '2022-08-20 23:29:35', '2022-08-20 23:29:35'),
(18, '1661059836', '1661059836', 2, 0, 0, 0, 0, NULL, 0, 30, 0, NULL, 'master', 'XYJT580SDFE2', -15, NULL, NULL, '2022-08-20 23:30:36', '2022-08-20 23:30:36'),
(19, '1661060741', '1661060741', 1, 0, 0, 0, 0, NULL, 0, 15, 0, NULL, 'amex', '02GTRFgty01', 0, '1254680', NULL, '2022-08-20 23:45:41', '2022-08-20 23:45:41'),
(20, '1661060858', '1661060858', 2, 0, 0, 0, 0, NULL, 0, 20, 0, NULL, 'master', '02GTRFgty055', -10, '1254680', NULL, '2022-08-20 23:47:38', '2022-08-20 23:47:38'),
(21, '1663138163', '1663138163', 3, 0, 0, 0, 0, NULL, 0, 624, 0, 650, 'cash', 'modal', 26, '1023548', NULL, '2022-09-14 00:49:23', '2022-09-14 00:49:23'),
(22, '1663138414', '1663138414', 3, 0, 0, 0, 0, NULL, 0, 1796, 0, 1800, 'cash', 'modal', 4, '1023548', 'Completed', '2022-09-14 00:53:34', '2022-09-14 00:53:34'),
(24, '1663230719', '1663230718', 1, 0, 0, 0, 0, NULL, 0, 15, 0, NULL, 'cash', 'modal', 0, '1023548', 'Hold', '2022-09-15 02:31:59', '2022-09-15 02:31:59'),
(27, '1663230883', '1663230882', 2, 0, 0, 0, 0, NULL, 0, 1176, 0, NULL, 'bkash', '1176', -588, '1023548', 'Completed', '2022-09-15 02:34:43', '2022-09-15 02:34:43'),
(31, '1663231059', '1663231059', 1, 0, 0, 0, 0, NULL, 0, 588, 0, 600, 'cash', 'modal', 12, '1023548', 'Completed', '2022-09-15 02:37:39', '2022-09-15 02:37:39'),
(32, '1663231071', '1663231071', 1, 0, 0, 0, 0, NULL, 0, 588, 0, NULL, 'bkash', '588', 0, '1023548', 'Completed', '2022-09-15 02:37:51', '2022-09-15 02:37:51'),
(33, '1663231090', '1663231090', 1, 0, 0, 0, 0, NULL, 0, 588, 0, 1000, 'cash', '588', 412, '1023548', 'Completed', '2022-09-15 02:38:10', '2022-09-15 02:38:10'),
(35, '1663238077', '1663238077', 3, 0, 0, 0, 0, NULL, 0, 1764, 0, 2000, 'cash', 'modal', 236, '1023548', 'Completed', '2022-09-15 04:34:37', '2022-09-15 04:34:37'),
(36, '1663238095', '1663238095', 1, 0, 0, 0, 0, NULL, 0, 588, 0, 600, 'cash', 'modal', 12, '1023548', 'Completed', '2022-09-15 04:34:55', '2022-09-15 04:34:55'),
(37, '1663238288', '1663238288', 3, 0, 0, 0, 0, NULL, 0, 1764, 0, 1800, 'cash', 'modal', 36, '1023548', 'Completed', '2022-09-15 04:38:08', '2022-09-15 04:38:08'),
(38, '1663238465', '1663238465', 1, 0, 0, 0, 0, NULL, 0, 588, 0, 600, 'cash', 'modal', 12, '1023548', 'Completed', '2022-09-15 04:41:05', '2022-09-15 04:41:05'),
(41, '1663238630', '1663238630', 4, 0, 0, 0, 0, NULL, 0, 1774, 0, 1800, 'cash', 'modal', 26, '1023548', 'Completed', '2022-09-15 04:43:50', '2022-09-15 04:43:50'),
(42, '1663238643', '1663238643', 2, 0, 0, 0, 0, NULL, 0, 30, 0, 50, 'cash', 'modal', 20, '1023548', 'Completed', '2022-09-15 04:44:03', '2022-09-15 04:44:03'),
(43, '1663238673', '1663238673', 1, 0, 0, 0, 0, NULL, 0, 588, 0, NULL, 'amex', '250001556', 0, '1023548', 'Completed', '2022-09-15 04:44:33', '2022-09-15 04:44:33'),
(44, '1663238712', '1663238712', 1, 0, 0, 0, 0, NULL, 0, 15, 0, 20, 'cach', '250001556', 5, '1023548', 'Completed', '2022-09-15 04:45:12', '2022-09-15 04:45:12'),
(46, '1663238831', '1663238831', 1, 0, 0, 0, 0, NULL, 0, 588, 0, NULL, 'bkash', '250001556', 0, '1023548', 'Completed', '2022-09-15 04:47:11', '2022-09-15 04:47:11'),
(47, '1663238844', '1663238844', 3, 0, 0, 0, 0, NULL, 0, 1202, 0, 1220, 'cash', '250001556', 18, '1023548', 'Completed', '2022-09-15 04:47:24', '2022-09-15 04:47:24'),
(50, '1663577197', '1663577197', 4, 0, 0, 0, 0, NULL, 0, 1785, 0, 1800, 'cash', 'modal', 15, '1023548', 'Completed', '2022-09-19 02:46:37', '2022-09-19 02:46:37'),
(51, '1663675748', '1663675748', 8, 0, 0, 0, 0, NULL, 0, 673, 0, 700, 'cash', 'modal', 27, '1023548', 'Completed', '2022-09-20 06:09:08', '2022-09-20 06:09:08'),
(53, '1663679551', '1663679551', 2, 0, 0, 0, 0, NULL, 0, 1176, 0, 1200, 'cash', 'modal', 24, '1023548', 'Completed', '2022-09-20 07:12:31', '2022-09-20 07:12:31'),
(54, '1663761413', '1663761412', 1, 0, 0, 0, 0, NULL, 0, 588, 0, 710, 'cash', 'modal', 122, '1258456', 'Completed', '2022-09-21 05:56:53', '2022-09-21 05:56:53'),
(55, '1663763766', '1663763766', 1, 12, 70.56, 0, 0, NULL, NULL, 588, 0, 700, 'cash', 'modal', 41.44, '1258456', 'Completed', '2022-09-21 06:36:06', '2022-09-21 06:36:06'),
(56, '1663764143', '1663764143', 2, 10, 117.6, 0, 0, '10', 117.6, 1176, 1176, 1200, 'cash', 'modal', 24, '1258456', 'Completed', '2022-09-21 06:42:23', '2022-09-21 06:42:23'),
(57, '1664017968', '1664017968', 1, 0, 0, 0, 0, '0', 0, 3, 3, NULL, 'cash', 'modal', 0, '1023548', 'Hold', '2022-09-24 05:12:48', '2022-09-24 05:12:48'),
(58, '1664017993', '1664017993', 1, 0, 0, 0, 0, '0', 0, 588, 588, NULL, 'cash', 'modal', 0, '1023548', 'Hold', '2022-09-24 05:13:13', '2022-09-24 05:13:13'),
(60, '1664432573', '1664432573', 2, 0, 0, 0, 0, '0', 0, 1176, 1176, NULL, 'bkash', '1180', -588, '1023548', 'Completed', '2022-09-29 00:22:53', '2022-09-29 00:22:53'),
(61, '1664433007', '1664433007', 1, 0, 0, 0, 0, '0', 0, 588, 588, NULL, 'cash', '1180', 0, '1023548', 'Return', '2022-09-29 00:30:07', '2022-09-29 00:30:07'),
(64, '1664442555', '1664442555', 2, 0, 0, 0, 0, '0', 0, 1192, 1192, NULL, 'cash', 'modal', -1796, '1023548', 'Return', '2022-09-29 03:09:15', '2022-09-29 03:09:15'),
(65, '1664442585', '1664442585', 2, 0, 0, 0, 0, '0', 0, 20, 20, NULL, 'cash', 'modal', -30, '1023548', 'Return', '2022-09-29 03:09:45', '2022-09-29 03:09:45'),
(68, '1664443564', '1664443564', 2, 0, 0, 0, 0, '0', 0, 1192, 1192, 1200, 'cash', 'modal', 8, '1023548', 'Completed', '2022-09-29 03:26:04', '2022-09-29 03:26:04'),
(69, '1664444392', '1664444392', 6, 0, 0, 0, 0, '0', 0, 3528, 3528, NULL, 'cash', 'modal', -2940, '1023548', 'Hold', '2022-09-29 03:39:52', '2022-09-29 03:39:52'),
(70, '1664444401', '1664444392', 3, 0, 0, 0, 0, '0', 0, 1764, 1764, NULL, 'cash', 'modal', -2352, '1023548', 'Return', '2022-09-29 03:40:01', '2022-09-29 03:40:01'),
(71, '1664444466', '1664444466', 4, 0, 0, 0, 0, '0', 0, 2352, 2352, NULL, 'cash', 'modal', -1764, '1023548', 'Hold', '2022-09-29 03:41:06', '2022-09-29 03:41:06'),
(72, '1664444470', '1664444470', 2, 0, 0, 0, 0, '0', 0, 1176, 1176, NULL, 'cash', 'modal', -588, '1023548', 'Hold', '2022-09-29 03:41:10', '2022-09-29 03:41:10'),
(73, '1664444497', '1664444497', 4, 0, 0, 0, 0, '0', 0, 2352, 2352, 2360, 'cash', 'modal', 8, '1023548', 'Completed', '2022-09-29 03:41:37', '2022-09-29 03:41:37'),
(74, '1664448581', '1664448581', 3, 0, 0, 0, 0, '0', 0, 1764, 1764, 1800, 'cash', 'modal', 36, '1023548', 'Completed', '2022-09-29 04:49:41', '2022-09-29 04:49:41'),
(75, '1664448662', '1664448662', 4, 0, 0, 0, 0, '0', 0, 2352, 2352, 2400, 'cash', 'modal', 48, '1023548', 'Completed', '2022-09-29 04:51:02', '2022-09-29 04:51:02'),
(78, '1665212985', '1665212985', 1, 0, 0, 0, 0, '0', 0, 604, 604, 610, 'cash', 'modal', 6, '1258456', 'Completed', '2022-10-08 01:09:45', '2022-10-08 01:09:45'),
(79, '1665213002', '1665212935', 1, 0, 0, 0, 0, '0', 0, 604, 604, NULL, 'cash', 'modal', 0, '1258456', 'Return', '2022-10-08 01:10:02', '2022-10-08 01:10:02'),
(82, '1665213457', '1665213457', 3, 0, 0, 0, 0, '0', 0, 1812, 1812, 1900, 'cach', '250001556', 88, '1258456', 'Completed', '2022-10-08 01:17:37', '2022-10-08 01:17:37'),
(83, '1665213486', '1665213486', 2, 0, 0, 0, 0, '0', 0, 1208, 1208, 1250, 'cash', 'modal', 42, '1258456', 'Completed', '2022-10-08 01:18:06', '2022-10-08 01:18:06'),
(84, '1665213526', '1665213526', 1, 0, 0, 0, 0, '0', 0, 604, 604, 610, 'cash', 'modal', 6, '1258456', 'Completed', '2022-10-08 01:18:46', '2022-10-08 01:18:46'),
(85, '1665214042', '1665214042', 3, 0, 0, 0, 0, '0', 0, 1812, 1812, 1900, 'cash', 'modal', 88, '1258456', 'Completed', '2022-10-08 01:27:22', '2022-10-08 01:27:22'),
(86, '1665214255', '1665214255', 2, 0, 0, 0, 0, '0', 0, 1208, 1208, 1250, 'cash', 'modal', 42, '1258456', 'Completed', '2022-10-08 01:30:55', '2022-10-08 01:30:55'),
(87, '1665214273', '1665214273', 1, 0, 0, 0, 0, '0', 0, 604, 604, 650, 'cash', 'modal', 46, '1258456', 'Completed', '2022-10-08 01:31:13', '2022-10-08 01:31:13'),
(88, '1665214337', '1665214337', 1, 0, 0, 0, 0, '0', 0, 604, 604, 650, 'cash', 'modal', 46, '1258456', 'Completed', '2022-10-08 01:32:17', '2022-10-08 01:32:17'),
(89, '1665214475', '1665214475', 1, 0, 0, 0, 0, '0', 0, 604, 604, 610, 'cash', 'modal', 6, '1258456', 'Completed', '2022-10-08 01:34:35', '2022-10-08 01:34:35'),
(90, '1665214496', '1665214496', 1, 0, 0, 0, 0, '0', 0, 604, 604, 610, 'cash', 'modal', 6, '1258456', 'Completed', '2022-10-08 01:34:56', '2022-10-08 01:34:56'),
(91, '1665214516', '1665214516', 1, 0, 0, 0, 0, '0', 0, 604, 604, 610, 'cash', 'modal', 6, '1258456', 'Completed', '2022-10-08 01:35:16', '2022-10-08 01:35:16'),
(92, '1665214540', '1665214540', 2, 0, 0, 0, 0, '0', 0, 1208, 1208, NULL, 'bkash', '016854kjj', -604, '1258456', 'Completed', '2022-10-08 01:35:40', '2022-10-08 01:35:40'),
(93, '1665217115', '1665217115', 2, 0, 0, 0, 0, '0', 0, 1208, 1208, 1210, 'cash', 'modal', 2, '1258456', 'Completed', '2022-10-08 02:18:35', '2022-10-08 02:18:35'),
(94, '1665217165', '1665217165', 2, 0, 0, 0, 0, '0', 0, 1208, 1208, NULL, 'bkash', '1208', -604, '1258456', 'Completed', '2022-10-08 02:19:25', '2022-10-08 02:19:25'),
(95, '1665217303', '1665217303', 3, 0, 0, 0, 0, '0', 0, 1812, 1812, 1812, 'cash', '1208', 0, '1258456', 'Completed', '2022-10-08 02:21:43', '2022-10-08 02:21:43'),
(96, '1665217304', '1665217304', 3, 0, 0, 0, 0, '0', 0, 1812, 1812, 1812, 'cash', '1208', 0, '1258456', 'Completed', '2022-10-08 02:21:44', '2022-10-08 02:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654948075', '48', 1, 1, '2022-06-11 05:47:55', '2022-06-11 05:48:19'),
(2, '1654948082', '44', 1, 1, '2022-06-11 05:48:02', '2022-06-11 05:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unique_id`, `name`, `unit_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654951821', 'KG-2', '2', 1, 1, '2022-06-11 06:50:21', '2022-06-11 06:51:02'),
(2, '1654951874', 'PCS', '1', 1, 1, '2022-06-11 06:51:14', '2022-06-11 06:51:14'),
(3, '1654951882', 'Dorzon', '1', 1, 1, '2022-06-11 06:51:22', '2022-06-11 06:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `role_id`, `name`, `email`, `contact`, `joining_date`, `salary`, `staff_id`, `profile_pic`, `description`, `others`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '000000', 1, 'Md Majadul Islam', 'majadul.dev@gmail.com', NULL, NULL, NULL, '00000', NULL, NULL, NULL, NULL, '$2y$10$R3Fi17h3OF4DTxXdbnJD7uYMxV4bT9isBi7Pu1UpvsCkXcdNkgWx2', 'p8HffO4mH8P46rk3IzoWegMHdrAmEkoSor9vhnGDx5gwy94KyXAnkM06TIdW', '2022-04-23 21:55:07', '2022-04-23 21:55:07'),
(3, '000001', 1, 'majadshohagh', 'majadshohagh_7148256@mail.com', '01672270944', '2022-06-20', 35000, '500', 'majadshohagh_7148256.jpeg', NULL, NULL, NULL, '$2y$10$BgRODRfLy8eRobZddVbnB.M7ko0hWGexampbcpfJc50LWdg5qTJVy', NULL, '2022-06-20 06:28:35', '2022-06-20 06:28:35'),
(4, '000002', 1, 'Md Majadul Islam', 'md_majadul_islam_5479478@mail.com', '01672270944', '2022-06-20', 35000, '5092', 'md_majadul_islam_5479478.jpeg', NULL, NULL, NULL, '$2y$10$VybfhgftO0uJAxqlfpbWXuhNsGcs8ZRzOwm0nL338cftAWgFAlc7O', NULL, '2022-06-20 06:35:17', '2022-06-20 06:35:17'),
(5, '1655728551', 1, 'Md Majadul Islam', 'md_majadul_islam_3119097@mail.com', '01672270944', '2022-06-20', 35000, '5098', 'md_majadul_islam_3119097.jpeg', NULL, NULL, NULL, '$2y$10$Qpg4Es.hkLnJ4i95LLO/ze.GTEdnVVKxUNrtfw31mNN24.VnBh5g.', NULL, '2022-06-20 06:35:51', '2022-06-20 06:35:51'),
(8, '1655728871', 2, 'Majadul Isalam', 'majadul_isalam_4995698@mail.com', '01672270944', '2022-06-20', 35000, '5094', 'majadul_isalam_4995698.jpeg', NULL, NULL, NULL, '$2y$10$6uKfd0El2Irxr8SCcTJok.y5OPk1Hf.UsEeK4JfBd/ECf2TGMn4MW', '4YWNcXqad2TEUfykB9VObhFg68Mwxli2X9Zi6G324hXbDW1tJzsNTCs38G84', '2022-06-20 06:41:11', '2022-06-20 06:41:11'),
(10, '1655731155', 2, 'check for test', 'check_for_test_6193302@mail.com', '01672270944', '2022-06-01', 25000, '5052', 'check_for_test_6193302.jpeg', NULL, NULL, NULL, '$2y$10$4nWefkYTIfFLvlx39H1Liu3tKnHTFnDPM8Z1FBTGG0M.x5wOayRZW', NULL, '2022-06-20 07:19:15', '2022-06-20 07:19:15'),
(13, '1655731622', 1, 'Majadul Isalam', 'majadul_isalam_1246128@mail.com', '01672270944', '2022-05-31', 2200, '500222', 'majadul_isalam_1246128.jpeg', NULL, NULL, NULL, '$2y$10$OeOF8oG0lJCg/zyR6bg4suOZL.cRv33mOomV643Qlqi4MVMNd/Um.', NULL, '2022-06-20 07:27:02', '2022-06-20 07:27:02'),
(14, '1655731646', 1, 'Majadul Isalam', 'majadul_isalam_2873421@mail.com', '01672270944', '2022-05-31', 2200, '50022', 'majadul_isalam_2873421.jpeg', NULL, NULL, NULL, '$2y$10$CnL48MMnYmbQyRyE8S.Q8OJzjV2KgGnvdEjWcMEQozzlqz8OMZKVi', NULL, '2022-06-20 07:27:26', '2022-06-20 07:27:26'),
(15, '1655731682', 1, 'Majadul Isalam', 'majadul_isalam_8267189@mail.com', '01672270944', '2022-05-31', 2200, '50020q', 'majadul_isalam_8267189.jpeg', NULL, NULL, NULL, '$2y$10$DKBCDoGwC0nCC8P8dk6hUeUJh0/e9K9XisQW04/m6cnIq.GAoxKNO', NULL, '2022-06-20 07:28:02', '2022-06-22 05:51:43'),
(16, '1655731797', 1, 'Hakeem Parrish', 'hakeem_parrish_1876136@mail.com', 'Sint magni vero et', '2010-08-03', 2100, '2562', 'hakeem_parrish_1876136.jpeg', NULL, NULL, NULL, '$2y$10$QMQnI9TgEK/.89lbUwBzaO5CGWnuDdXLJUByOtYYzcHLhSaw.2A/q', NULL, '2022-06-20 07:29:57', '2022-06-20 07:29:57'),
(17, '1655731813', 1, 'Hakeem Parrish', 'hakeem_parrish_6596682@mail.com', 'Sint magni vero et', '2010-08-03', 2100, '25620', 'hakeem_parrish_6596682.jpeg', NULL, NULL, NULL, '$2y$10$eDxkSwM2jIMEjtq5Nq15FOT416IDEmdVIl6EBq1tBbC9tT0AkGMta', NULL, '2022-06-20 07:30:13', '2022-06-20 07:30:13'),
(18, '1655731846', 1, 'Hakeem Parrish', 'hakeem_parrish_8792514@mail.com', 'Sint magni vero et', '2010-08-03', 2100, '25621', 'hakeem_parrish_8792514.jpeg', NULL, NULL, NULL, '$2y$10$wjwG6fQpjCEsRUpIQ6/4YedLOLt7KvtShyt8yCJ6jBhhN/hcpRJze', NULL, '2022-06-20 07:30:46', '2022-06-20 07:30:46'),
(19, '1655731858', 1, 'Hakeem Parrish', 'hakeem_parrish_2088636@mail.com', 'Sint magni vero et', '2010-08-03', 2100, '25622', 'hakeem_parrish_2088636.jpeg', NULL, NULL, NULL, '$2y$10$29T2w.rhq3grBewUUZEU5uM5W7CjV7kDYrAePGBb5JXAji7OG51J2', NULL, '2022-06-20 07:30:58', '2022-06-20 07:30:58'),
(20, '1655731997', 1, 'Hakeem Parrish', 'hakeem_parrish_5265128@mail.com', 'Sint magni vero et', '2010-08-03', 2100, '25629', 'hakeem_parrish_5265128.jpeg', NULL, NULL, NULL, '$2y$10$UjoB.s.FBOqO3/5ZfxVyAOt6h/3muTJYrcQxrxJZJJJUIHCfaKDhC', NULL, '2022-06-20 07:33:17', '2022-06-20 07:33:17'),
(21, '1655732804', 2, 'Stewart Craig', 'stewart_craig_3404105@mail.com', 'Placeat aut quia de', '2020-12-17', 5000, '55654', 'stewart_craig_3404105.jpeg', NULL, NULL, NULL, '$2y$10$km6EsDhhuU0aCsezVkeF/OUqt0xCTN7flytF2GzRRqnLpcGkQSk.W', NULL, '2022-06-20 07:46:44', '2022-06-20 07:46:44'),
(22, '1655732976', 1, 'Juliet Ingram', 'juliet_ingram_8168391@mail.com', 'Qui omnis voluptatum', '1983-09-15', 5000, '1256', 'juliet_ingram_8168391.jpeg', NULL, NULL, NULL, '$2y$10$aDwWjFbHGBzp904mvo5gu..Aq0PhF93nex3cTA0KRX28mLnLYKMBy', NULL, '2022-06-20 07:49:36', '2022-06-20 07:49:36'),
(23, '1655733046', 4, 'Inez Lara', 'inez_lara_7103306@mail.com', 'Necessitatibus et iu', '1976-02-03', 5855, '1253', 'inez_lara_7103306.jpeg', NULL, NULL, NULL, '$2y$10$rjM0x0FGI16NNV8AbXJ6huYVE6R50YR9bxVTbF3pvbUr5CPxeHfV.', NULL, '2022-06-20 07:50:46', '2022-06-20 07:50:46'),
(24, '1655733110', 2, 'Lacey Skinner', 'lacey_skinner_8992222@mail.com', 'Esse officia assumen', '2019-08-03', 2555, '555', 'lacey_skinner_8992222.jpeg', NULL, NULL, NULL, '$2y$10$zAdqUvwSdWOPvkYfxDO7bu/gqmZt2B5cW.Y.AX8GlOTHCSZMUkcLq', NULL, '2022-06-20 07:51:50', '2022-06-20 07:51:50'),
(25, '1655733375', 4, 'Irene Gibbs', 'irene_gibbs_2731006@mail.com', 'Consequat Rerum bea', '2015-03-04', 12, '222', 'irene_gibbs_2731006.jpeg', NULL, NULL, NULL, '$2y$10$BJKQVlRTFEUojJSEkAIrqO2k92TFWW.j9mjOLJPgwzP8qRfHoG/n6', NULL, '2022-06-20 07:56:15', '2022-06-20 07:56:15'),
(26, '1655733457', 2, 'Bryar Mcclain', 'bryar_mcclain_6533178@mail.com', 'Est ullamco cupidat', '1995-07-10', 5555, '5555', 'bryar_mcclain_6533178.jpeg', NULL, NULL, NULL, '$2y$10$7UIvOTYs5bLuzEKmU5xwEO247cXu5b6YJItaXSgFACYb.GY9Y.KmO', NULL, '2022-06-20 07:57:37', '2022-06-20 07:57:37'),
(27, '1655733798', 4, 'Ulysses Boyd', 'ulysses_boyd_9105250@mail.com', 'Esse eiusmod facere', '1997-11-05', 555, '5855', 'ulysses_boyd_9105250.jpeg', NULL, NULL, NULL, '$2y$10$QjLFAwvDyPDGy2jNVefYLOh6j63eenu184/dze81cwMg71MtOmg02', NULL, '2022-06-20 08:03:18', '2022-06-20 08:03:18'),
(28, '1655734988', 4, 'Vivien Mcbride', 'vivien_mcbride_7884397@mail.com', 'Reprehenderit fugiat', '1991-04-22', 2300, '655', 'vivien_mcbride_7884397.jpeg', NULL, NULL, NULL, '$2y$10$rk8kZ13mJdceEp6Fh8QLh.VAbpwUakb5qJo7JtFYtv8lNs.tZW3Zq', NULL, '2022-06-20 08:23:08', '2022-06-20 08:23:08'),
(30, '1655735373', 1, 'Merrill Villarreal', 'merrill_villarreal_2784412@mail.com', 'Enim non aute volupt', '2020-07-01', 3223, '43223', 'merrill_villarreal_2784412.jpeg', NULL, NULL, NULL, '$2y$10$0wZE81tWTtgeCc7DtIu9hOrCjoP/uS1ZPvUbRU/wr0SWvqWh..GsG', NULL, '2022-06-20 08:29:33', '2022-06-20 08:29:33'),
(31, '1655735442', 1, 'Merrill Villarreal 02', 'merrill_villarreal_02_4217513@mail.com', 'Enim non aute volupt', '2020-07-01', 32235, '43224', 'merrill_villarreal_02_4217513.jpeg', NULL, NULL, NULL, '$2y$10$sJqnLJkynP/uFDngMJH..O.Hss215NKX6rqkRueWeETGrdV2WqAYO', NULL, '2022-06-20 08:30:42', '2022-06-20 08:30:42'),
(32, '1655735643', 1, 'Autumn Hoffman', 'autumn_hoffman_7523754@mail.com', 'Ipsa quos qui sint', '2009-11-07', 12555, '22202', NULL, NULL, NULL, NULL, '$2y$10$7lLBtAFSEPAaw5qGYAxpn.jmRDFIqmLldkJxH/siKHFl.PKvcGD2G', NULL, '2022-06-20 08:34:03', '2022-06-20 08:34:03'),
(33, '1655735682', 1, 'Shoshana Wynn', 'shoshana_wynn_9163226@mail.com', 'Nobis recusandae Of', '1998-12-17', 556, '888', NULL, NULL, NULL, NULL, '$2y$10$0EVsS20gu5LkOc6oaWgkI.W/WIUwVlTj7I3jxWxUbmhQ8cXYs.A26', NULL, '2022-06-20 08:34:42', '2022-06-20 08:34:42'),
(34, '1655735701', 3, 'Tasha Sutton', 'tasha_sutton_6736049@mail.com', 'Vel sunt unde ad do', '1993-06-07', 55888, '55520', 'tasha_sutton_6244028.jpeg', NULL, NULL, NULL, '$2y$10$sCg5fkHrngZf8eX9H9J5OeOmDU9815Ijd1kmScL89Ciq3GQdWq1sK', NULL, '2022-06-20 08:35:01', '2022-06-20 08:35:01'),
(35, '1655735814', 2, 'Quyn Hickman', 'quyn_hickman_3144627@mail.com', 'Error vel voluptatem', '2021-02-10', 5222, '2222', NULL, NULL, NULL, NULL, '$2y$10$AaykWZJ/JbBRQtj8KfGFlu68c9HBLGDRQ0txn86fSZKwdutInyiGK', NULL, '2022-06-20 08:36:54', '2022-06-20 08:36:54'),
(36, '1655736301', 2, 'Janna Valdez', 'janna_valdez_1893479@mail.com', 'Dolore optio accusa', '1983-03-21', 215, 'Veniam ex pariatur', NULL, NULL, NULL, NULL, '$2y$10$.VfhpOn30Gc3l8cqJT0b7.yunIZo/pZwcoR4pWJaC5Z50/1jKSnui', NULL, '2022-06-20 08:45:01', '2022-06-20 08:45:01'),
(37, '1655779148', 1, 'Drew Albert', 'drew_albert_8883835@mail.com', '01672270944', '2009-06-04', 250, '55411', NULL, NULL, NULL, NULL, '$2y$10$PFBXWKQaK5FrF5npvOZrze27H.08QXpFjQQaIGn1tMfLUY25OQE8S', NULL, '2022-06-20 20:39:08', '2022-06-20 20:39:08'),
(38, '1655779232', 2, 'Rhoda Kirkland', 'rhoda_kirkland_8049765@mail.com', '01918305499', '2006-09-25', 1000, '4585', NULL, NULL, NULL, NULL, '$2y$10$1xgw/iWKxu2Yv5ygUORwqeJ6dUeWJgS0Cf9KZsP.McDQ7mXUZswNi', NULL, '2022-06-20 20:40:32', '2022-06-20 20:40:32'),
(39, '1655779350', 2, 'Rhoda Kirkland', 'rhoda_kirkland_8521642@mail.com', '01918305499', '2006-09-25', 1000, '4588', NULL, NULL, NULL, NULL, '$2y$10$EaWk8BORmJgpzw4Z0220WeCGBQS.RMtp/0cDJYUovmqjhrJDP8hZO', NULL, '2022-06-20 20:42:30', '2022-06-20 20:42:30'),
(40, '1655779558', 4, 'Colby Burns', 'colby_burns_6217025@mail.com', '01534645492', '2017-05-16', 200, '568', NULL, NULL, NULL, NULL, '$2y$10$gf7F/iSefcjJc.f6mD4Ake4R7ymDW86xKeez.yz1OxNhTYm0H7d1C', NULL, '2022-06-20 20:45:58', '2022-06-20 20:45:58'),
(41, '1655780049', 3, 'Iola Osborn', 'iola_osborn_3350540@mail.com', '01818305499', '2018-01-13', 5, '5', NULL, NULL, NULL, NULL, '$2y$10$4OSLxJ6LuDAmG9Lw0lJbau9YbsNnxdvbOLV11t5EBmECwen5Ujddy', NULL, '2022-06-20 20:54:09', '2022-06-20 20:54:09'),
(42, '1655780172', 3, 'Jonas Berg', 'jonas_berg_3745998@mail.com', '019183021544', '1998-02-20', 22, '223', NULL, NULL, NULL, NULL, '$2y$10$huopWeAp4ZgCjcFdwGLpHublPweR9jKi19VmucjlChuuCTvE8uH5G', NULL, '2022-06-20 20:56:12', '2022-06-20 20:56:12'),
(43, '1655780228', 2, 'Thomas Duran', 'thomas_duran_3439922@mail.com', '0125689520', '1984-09-15', 20036, '5563', NULL, NULL, NULL, NULL, '$2y$10$tYlsQr7qN0TIp7f/cH9KCOj50uwzhBbr0H5j9ARECDXZ6IjRMnISy', NULL, '2022-06-20 20:57:08', '2022-06-20 20:57:08'),
(44, '1655780361', 2, 'Giselle Sanford', 'giselle_sanford_7983182@mail.com', 'Proident et aut ven', '1999-09-25', 555, 'Soluta mollit eos en', NULL, NULL, NULL, NULL, '$2y$10$VUHsR9yRVYEysSKcuxwdHO41fKdwSQ/4LxOOutkK5IfstOaSTS3Ga', NULL, '2022-06-20 20:59:21', '2022-06-20 20:59:21'),
(45, '1655780417', 3, 'Grace Mccullough', 'grace_mccullough_5035041@mail.com', 'Suscipit molestiae s', '2010-04-27', 7410, 'Nulla natus id cons', NULL, NULL, NULL, NULL, '$2y$10$J/rcqRAMymJI9GNGoNM1xOEVk9J1t8ZzbC4eLDgjnuZwimr3erJ36', NULL, '2022-06-20 21:00:17', '2022-06-20 21:00:17'),
(46, '1655780464', 3, 'Taylor Case', 'taylor_case_1846126@mail.com', 'Cupiditate ut corpor', '1985-12-28', 22112, 'Velit ipsa nesciunt', NULL, NULL, NULL, NULL, '$2y$10$gvIjS90.vgDUXmNm6jJfpeNxKKVReSWbtvKsIYlEbwt8qD0dsLNoe', NULL, '2022-06-20 21:01:04', '2022-06-20 21:01:04'),
(47, '1655780498', 3, 'Taylor Case', 'taylor_case_9422936@mail.com', 'Cupiditate ut corpor', '1985-12-28', 22112, 'Velit ipsa nesciuntee', NULL, NULL, NULL, NULL, '$2y$10$kWyl.SEBc2W54nG2R/0eAeDfl3EikhSdqYR2A9zonwk8Q9pBFYhPy', NULL, '2022-06-20 21:01:38', '2022-06-20 21:01:38'),
(48, '1655780777', 1, 'Ocean Savage', 'ocean_savage_8614059@mail.com', 'Qui et Nam amet mag', '1997-08-19', 555, 'Molestias amet adip00', NULL, NULL, NULL, NULL, '$2y$10$8iSuDph25iX3vpKzfOyxFOW7qs7.dIXMnBNoMOaEIfCKbpjhBdntW', NULL, '2022-06-20 21:06:17', '2022-06-22 04:58:33'),
(49, '1655780798', 1, 'Ocean Savage02', 'ocean_savage02_9098662@mail.com', 'Qui et Nam amet mag', '1997-08-19', 555, '5888', NULL, NULL, NULL, NULL, '$2y$10$C1rlx9IOohUj6nwsUuGCjepWXh73AHJpagh6o87QgwJdgc4BJdqCy', NULL, '2022-06-20 21:06:38', '2022-06-20 21:06:38'),
(50, '1655780930', 2, 'Guy Kim', 'guy_kim_5658278@mail.com', 'Eos consequatur in', '1984-11-30', 554, 'Blanditiis commodo v', NULL, NULL, NULL, NULL, '$2y$10$Ov23PGYq68CttPWSsa6UseJt6GxfTBU7PjG7AvMTdz/r1mczfbSs6', NULL, '2022-06-20 21:08:50', '2022-06-20 21:08:50'),
(52, '1655780983', 2, 'Guy Kim', 'guy_kim_8195572@mail.com', 'Eos consequatur in', '1984-11-30', 5545, 'Blanditiis commodo', NULL, NULL, NULL, NULL, '$2y$10$MKfczfGcn/Xnc7YVMZ269u4IYzdOotA9ajHbeLlRo99/K5aY92jlO', NULL, '2022-06-20 21:09:43', '2022-06-20 21:09:43'),
(53, '1655781074', 2, 'Guy Kim', 'guy_kim_8703732@mail.com', 'Eos consequatur in', '1984-11-30', 5545, 'Blanditiis comm', NULL, NULL, NULL, NULL, '$2y$10$aDslS3js8VXjBykb/vkGdOWd7vHXbgon3VO2su2FYmuUk9IagYBAG', NULL, '2022-06-20 21:11:14', '2022-06-20 21:11:14'),
(54, '1655781105', 2, 'Guy Kim 02', 'guy_kim_02_3056913@mail.com', 'Eos consequatur in', '1984-11-30', 5545, 'Blanditiis', NULL, NULL, NULL, NULL, '$2y$10$I1lyfyKt7etGbsyKEXQW7euPmCbCsCWS9BPPv/Fid868sIwjtuGFK', NULL, '2022-06-20 21:11:45', '2022-06-20 21:11:45'),
(55, '1655781125', 2, 'Guy Kim 02', 'guy_kim_02_3748066@mail.com', 'Eos consequatur in', '1984-11-30', 5545, 'Blanditiis0', NULL, NULL, NULL, NULL, '$2y$10$M6.JbIENoDVxLZY3bsSuK.zXwV5h9gADB9RYahXU8a4LUPfstV7PW', NULL, '2022-06-20 21:12:05', '2022-06-20 21:12:05'),
(56, '1655781273', 3, 'Perry Nicholson', 'perry_nicholson_6981831@mail.com', 'Rem quas voluptas fu', '1998-04-02', 25, 'Rerum quis error rer', NULL, NULL, NULL, NULL, '$2y$10$2bkkVo34XU/YTLVPWrd8muF.aKJuxav9qli01pULBs.1zjqMujdPO', NULL, '2022-06-20 21:14:33', '2022-06-20 21:14:33'),
(57, '1655781293', 3, 'Perry Nicholson', 'perry_nicholson_5309400@mail.com', 'Rem quas voluptas fu', '1998-04-02', 25, 'Rerum quis error', NULL, NULL, NULL, NULL, '$2y$10$cacnq68fnMfA0RQr6J95KOZVluLSmdEgb9yM3oA3URWfMtfKUF332', NULL, '2022-06-20 21:14:53', '2022-06-20 21:14:53'),
(59, '1655781329', 3, 'Perry', 'perry_9644529@mail.com', 'Rem quas voluptas fu', '1998-04-02', 25, 'Rerum quis', NULL, NULL, NULL, NULL, '$2y$10$54S5zxxc7kxRWxZeOP42w.Ym5KDgEIV6W4pJy/wcWufbgiubJYwiG', NULL, '2022-06-20 21:15:29', '2022-06-20 21:15:29'),
(60, '1655781393', 4, 'Rhona Munoz', 'rhona_munoz_1917563@mail.com', 'Odit amet quidem su', '1971-11-29', 25, 'Ipsum eos sed expe', NULL, NULL, NULL, NULL, '$2y$10$8kIo/W6.MK77Fc7igQV/R.yy3Nc74jgnoihIasaF7XCu7.tZojd8G', NULL, '2022-06-20 21:16:33', '2022-06-20 21:16:33'),
(61, '1655781561', 2, 'Cole Gonzales', 'cole_gonzales_1381477@mail.com', 'Exercitation et magn', '2021-11-13', 200, 'Vero iure distinctio', NULL, NULL, NULL, NULL, '$2y$10$Isq.sUO8YBzT3SU3sAhdiO8U98uafo1oYXgdZcCYD6wpA4u/.sFV.', NULL, '2022-06-20 21:19:21', '2022-06-20 21:19:21'),
(62, '1655781578', 2, 'Cole Gonzales', 'cole_gonzales_5726575@mail.com', 'Exercitation et magn', '2021-11-13', 200, 'Vero iure', NULL, NULL, NULL, NULL, '$2y$10$ciMwCstr3LY6k1YbtKRJSOdB/XMKwrWemEy3r4pUPdMg25Nlb0qdC', NULL, '2022-06-20 21:19:38', '2022-06-20 21:19:38'),
(63, '1655781616', 2, 'Cole Gonzales', 'cole_gonzales_5560352@mail.com', 'Exercitation et magn', '2021-11-13', 200, 'Vero', NULL, NULL, NULL, NULL, '$2y$10$XYZ93YcAzcqsq1335VolyeqTAa4INWG/J65PmbC1R22PKGYSn/lpq', NULL, '2022-06-20 21:20:16', '2022-06-20 21:20:16'),
(64, '1655781658', 2, 'Wynter Blankenship', 'wynter_blankenship_1175704@mail.com', 'Suscipit quas qui ut', '2001-10-11', 55, 'Repellendus Molesti', NULL, NULL, NULL, NULL, '$2y$10$rHXYJHFdagCWqJuZLAbGXuPk5mBCLzuEwrUSF5TNcOhzWlcOL4jiu', NULL, '2022-06-20 21:20:58', '2022-06-20 21:20:58'),
(65, '1655781676', 2, 'fdgsdf', 'fdgsdf_4525106@mail.com', 'Suscipit quas qui ut', '2001-10-11', 55, 'Repellendus', NULL, NULL, NULL, NULL, '$2y$10$zQoE4OjEQQFmBwW66xPBB.G3aUJg6D95ZD0N2pdnImlOmoEJRDF6m', NULL, '2022-06-20 21:21:16', '2022-06-20 21:21:16'),
(66, '1655781989', 3, 'Michelle Harrell', 'michelle_harrell_7914251@mail.com', 'Ea ea id optio maio', '2017-02-02', 5555, 'Quos et qui sit inci', NULL, NULL, NULL, NULL, '$2y$10$rY3C.mr/TVuYwAnp6TUZBuknBZko.MhRK2JpiX.HJdV1xKPZrxPVi', NULL, '2022-06-20 21:26:29', '2022-06-20 21:26:29'),
(67, '1655782006', 3, 'Michelle Harrell', 'michelle_harrell_1145335@mail.com', 'Ea ea id optio maio', '2017-02-02', 5555, 'Quos et qui', NULL, NULL, NULL, NULL, '$2y$10$2ndslLz.9He.GHqcI.6QLu1/PBKqywdzmSh9ZAo0VoDlmsS0Kqt1a', NULL, '2022-06-20 21:26:46', '2022-06-20 21:26:46'),
(68, '1655782092', 3, 'check for test', 'check_for_test_1566588@mail.com', 'Ea ea id optio maio', '2017-02-02', 5555, 'Quos et qui02', NULL, NULL, NULL, NULL, '$2y$10$TOQBoQWfgiIqutsQtQ.MeeNj2tc2ValJdGiyQ7Dz/MLMr.API0DKa', NULL, '2022-06-20 21:28:12', '2022-06-20 21:28:12'),
(69, '1655782168', 3, 'Mufutau Hubbard', 'mufutau_hubbard_2427152@mail.com', 'Ut qui nostrum dolor', '1983-09-13', 3333, 'Et quibusdam officia', NULL, NULL, NULL, NULL, '$2y$10$IjyoJLYaRkW/TO6XkMVtMegytKAwt0R9UOVIlTbYQCOrPDpZgrs96', NULL, '2022-06-20 21:29:28', '2022-06-20 21:29:28'),
(70, '1655782240', 4, 'Cheyenne Macias', 'cheyenne_macias_5336679@mail.com', 'Adipisicing in magna', '2017-10-17', 9999, 'Quia eu velit tempor', NULL, NULL, NULL, NULL, '$2y$10$WqZrPvlSKQ3h3nshDRZDXO0b81pSM22C8F7iBfT6T5175IZi3hfyu', NULL, '2022-06-20 21:30:40', '2022-06-20 21:30:40'),
(71, '1655782389', 1, 'Martha Jackson', 'martha_jackson_2542733@mail.com', 'Blanditiis praesenti', '1970-03-05', 215654, '0000', NULL, NULL, NULL, NULL, '$2y$10$r59GgQ0eNF88gxac8i3TRu7s70mdBOEMyGEiHzR2/9vVGs.0u8QTK', NULL, '2022-06-20 21:33:09', '2022-06-20 21:33:09'),
(72, '1655782452', 1, 'Martha Jackson', 'martha_jackson_6490088@mail.com', 'Blanditiis praesenti', '1970-03-05', 215654, '000001', NULL, NULL, NULL, NULL, '$2y$10$hYpLs52OYuyBeB.gdZfO5.HA8Atkz8pd9mdzlg480s1fchRtcSqla', NULL, '2022-06-20 21:34:12', '2022-06-20 21:34:12'),
(73, '1655782792', 2, 'Quon Caldwell', 'quon_caldwell_7871490@mail.com', 'Asperiores maiores e', '1994-11-04', 2, '3333', NULL, NULL, NULL, NULL, '$2y$10$DI35AJe/CPt8q8rlvftrw.1Nc.U9Yfxqr..Xap7cbN.O3V2.mCAua', NULL, '2022-06-20 21:39:52', '2022-06-20 21:39:52'),
(74, '1655782836', 2, 'Kirby Wilkins', 'kirby_wilkins_9090024@mail.com', 'Cum dolor hic commod', '2018-03-19', 8888, '9999', NULL, NULL, NULL, NULL, '$2y$10$Qaku.CBkQyy5KNQ3y5WYee6ZFx89xpugpq0ZvGZmmS7dxnaQxoJ9S', NULL, '2022-06-20 21:40:36', '2022-06-20 21:40:36'),
(75, '1655782919', 1, 'Caryn Walsh', 'caryn_walsh_2863475@mail.com', 'Et ullamco aliqua I', '2018-05-09', 56324, 'Ullam et quis sit s', 'caryn_walsh_5318834.jpeg', NULL, NULL, NULL, '$2y$10$pxefIQ2UCXKkqwDEfqDrAeeyUSwBc.oT27Tc0a3sVRxgMxooyHWnm', NULL, '2022-06-20 21:41:59', '2022-06-20 21:41:59'),
(76, '1655782971', 2, 'Ashely Alexander', 'ashely_alexander_4220102@mail.com', 'Aut maiores esse ips', '2000-04-11', 55885, 'Error sed labore ut', NULL, NULL, NULL, NULL, '$2y$10$kn9ET.zGxvbWJskr2ipGdujIV6dftawGdFjzb5TkOH1wu8YWS5Hde', NULL, '2022-06-20 21:42:51', '2022-06-20 21:42:51'),
(77, '1655783975', 3, 'Oleg Mccray', 'oleg_mccray_4087664@mail.com', 'Nesciunt non sapien', '1983-07-04', 2548, 'Quis do ullamco unde', NULL, NULL, NULL, NULL, '$2y$10$n1NFxXBCzzPE3.Rnmu7u3.MgNyQabgc/5uDCYicx2k4jucxA0CwLC', NULL, '2022-06-20 21:59:35', '2022-06-20 21:59:35'),
(78, '1655784116', 3, 'Elliott Kelly', 'elliott_kelly_9421802@mail.com', 'Dicta aut mollit vit', '2011-10-12', 0, 'Molestiae quaerat er', 'elliott_kelly_2735245.jpeg', NULL, NULL, NULL, '$2y$10$J12jn6AfEmBIdsVcfyBxl.H2WAsJms.pMKyoRWarBbfDo8NB2R1T2', NULL, '2022-06-20 22:01:56', '2022-06-20 22:01:56'),
(79, '1655784496', 1, 'Melvin Calhoun', 'melvin_calhoun_4000350@mail.com', 'Magnam voluptatem a', '2007-10-12', 20, 'Quae natus velit ali', 'melvin_calhoun_2549809.jpeg', NULL, NULL, NULL, '$2y$10$2hsnd7Wg5CqCEHez6goNoOZSBduH.1C85642JMdvybIXcV7n.4rZ6', NULL, '2022-06-20 22:08:16', '2022-06-20 22:08:16'),
(80, '1655784569', 1, 'Paki Cardenas', 'paki_cardenas_6671911@mail.com', '01918305499', '1984-01-09', 552, 'A123455', 'paki_cardenas_3864127.jpeg', NULL, NULL, NULL, '$2y$10$8FHvkpuClbzF1NZpmxveXe2.ozzTJW8OO5e7i/ileIgzk42EB7rF2', NULL, '2022-06-20 22:09:29', '2022-06-22 05:02:46'),
(85, '1655895810', 2, 'Adena Lawrence', 'adena_lawrence_4828961@mail.com', 'Iure culpa molestia', '2007-01-31', 8898, '4589', NULL, NULL, NULL, NULL, '$2y$10$W7Irs.Y66l2aV5vT4EORJOK8MV9O/8dMCrAWWdBhGyewqJsRoAvSy', NULL, '2022-06-22 05:03:30', '2022-06-22 05:03:30'),
(86, '1655895843', 2, 'Lesley Hinton', 'lesley_hinton_1754774@mail.com', 'Aut nulla dolor eum', '1982-03-27', 122211, 'eerrt', NULL, NULL, NULL, NULL, '$2y$10$NMIiIJ6lHAY4WkfsJSvxSevvKUYZqsXODmlRryFwIz42LGhA3sLfu', NULL, '2022-06-22 05:04:03', '2022-06-22 05:04:03'),
(87, '1655895871', 3, 'Pagination check', 'pagination_check_7376105@mail.com', 'Aperiam laboris est', '2018-08-13', 110111, '234', NULL, NULL, NULL, NULL, '$2y$10$HD/JV6Z/YppEyTgodfv5g.OTfkLFfzfgmeqz0KG9HAya3XGfcPiPO', NULL, '2022-06-22 05:04:31', '2022-06-22 05:04:31'),
(88, '1655898293', 3, 'Lunea Ratliff', 'lunea_ratliff_9614222@mail.com', 'Sit harum excepturi', '2000-09-27', 555, 'Nisi error vel sed a', NULL, NULL, NULL, NULL, '$2y$10$xmnOGTr1vGNpIO1BcGdJx.phyWIy1TdgFsaJLAyIHdhVB5tmOt7Vm', NULL, '2022-06-22 05:44:53', '2022-06-22 05:44:53'),
(89, '1655898490', 2, 'Yvette Becker', 'yvette_becker_5921097@mail.com', 'Dolor non ut quia de', '2017-07-05', 33255, 'Est amet aut conse', NULL, NULL, NULL, NULL, '$2y$10$Xi1UiQnbxjpIATp7D9mHDODQpp3Dkh021Q3Av/QgND9uyB8qqf9Ku', NULL, '2022-06-22 05:48:10', '2022-06-22 05:48:10'),
(90, '1655898526', 4, 'Nero Chapman', 'nero_chapman_5054573@mail.com', 'Nisi velit sit duis', '1998-05-06', 1122, 'In aspernatur quibus', NULL, NULL, NULL, NULL, '$2y$10$3rwEhkEWKBig1yaQ9Pe3Qum2x9ECMyEdKOmQq7f8/hon6uXV4rH0C', NULL, '2022-06-22 05:48:46', '2022-06-22 05:48:46'),
(91, '1655898576', 1, 'Latifah Bryan', 'latifah_bryan_8266982@mail.com', 'Tempora est nesciunt', '1981-05-06', 4444, 'Rerum accusantium do', NULL, NULL, NULL, NULL, '$2y$10$7CBDMjKzRpoAymJbWpt7VuvTUVbjxY3Bjwhwlk//CpWvy7wMvcbJC', NULL, '2022-06-22 05:49:36', '2022-06-22 05:49:36'),
(92, '1655898670', 4, 'Alfonso Cantrell', 'alfonso_cantrell_6011894@mail.com', 'Ratione ex temporibu', '2002-02-21', 1234, 'eeee', NULL, NULL, NULL, NULL, '$2y$10$a1qpHhgRBx1m13gBZ8Y8fedFuanqzCaDJ/Aq2x3dkXBN/BTQzzKAm', NULL, '2022-06-22 05:51:10', '2022-06-22 05:51:23'),
(93, '1655898824', 4, 'Pandora Cunningham', 'pandora_cunningham_4838858@mail.com', 'Culpa magna alias vo', '2007-12-20', 1122, '0002', NULL, NULL, NULL, NULL, '$2y$10$I8CSTjprPd2R4K6jsDg8G.KMRy9jSmlmon3ZAeYtBU76z1aGJCuLO', NULL, '2022-06-22 05:53:44', '2022-06-23 02:35:37'),
(94, '1655898912', 2, 'Joseph Ortiz', 'joseph_ortiz_6442615@mail.com', 'Qui voluptatem archi', '2018-03-23', 1234, 'Voluptatibus iusto m', NULL, NULL, NULL, NULL, '$2y$10$zrsYQ45JFJKxv5fPv2Y6D.rmDm3SM2IWja1gC/i5SvsPTEACJAQVC', NULL, '2022-06-22 05:55:12', '2022-06-22 05:55:12'),
(95, '1655899076', 2, 'Denton Middleton', 'denton_middleton_8125404@mail.com', 'Pariatur Cupiditate', '2002-11-16', 234533, 'Deserunt animi et m', NULL, NULL, NULL, NULL, '$2y$10$qvQzjqeS0zLqsN5LQmtNHebHdqO/vKacKCLUH4LVHKJ9t1dK0qlSu', NULL, '2022-06-22 05:57:56', '2022-06-22 05:57:56'),
(96, '1655973305', 3, 'Scarlet Green', 'scarlet_green_6119947@mail.com', 'Dolore nemo ut possi', '2005-12-25', 5564, 'Magni quia laboriosa02', NULL, NULL, NULL, NULL, '$2y$10$BrCSPnhnSWATioX9AxRl1OZFdOGBxuCjEKm/1iCsEiIVuKVq7DZiS', NULL, '2022-06-23 02:35:05', '2022-06-23 02:35:26'),
(99, '1656586143', 136, '000001', '000001_7995038@mail.com', '01672270944', '2022-06-30', 35000, '000002', NULL, NULL, NULL, NULL, '$2y$10$kEEC6oJBadvFsUeQNhjDruX2My90tN2IcbnNwOiAdGeVxD5grvyxi', 'f5vXzfHpt72OgekkHS6FT1DLkDIUVOSufB8mHmxzY0IqagIzk9NGcqkTj42K', '2022-06-30 04:49:03', '2022-06-30 04:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vats`
--

INSERT INTO `vats` (`id`, `unique_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1654948964', '10', 1, 1, '2022-06-11 06:02:44', '2022-06-11 06:02:55'),
(2, '1654948984', '11', 1, 1, '2022-06-11 06:03:04', '2022-06-25 23:29:50'),
(3, '1654948987', '25', 1, 1, '2022-06-11 06:03:07', '2022-06-11 06:03:07'),
(4, '1656163693', '25', 1, 1, '2022-06-25 07:28:13', '2022-06-25 22:50:43'),
(5, '1656163767', '2', 1, 1, '2022-06-25 07:29:27', '2022-06-25 22:54:49'),
(6, '1656164233', '9', 1, 1, '2022-06-25 07:37:13', '2022-06-29 03:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_type`
--

CREATE TABLE `vendor_type` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_type`
--

INSERT INTO `vendor_type` (`id`, `unique_id`, `name`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '12546523', 'Test Vendor 02', NULL, 1, 1, 1, '2022-06-15 06:28:47', '2022-06-15 01:31:03'),
(2, '1655275480', 'name', NULL, 1, 1, 1, '2022-06-15 00:44:40', '2022-06-15 00:44:40'),
(3, '1655275573', 'check for test 03', NULL, 1, 1, 1, '2022-06-15 00:46:13', '2022-06-16 02:54:17'),
(4, '1655369786', 'majadul', NULL, 1, 1, 1, '2022-06-16 02:56:26', '2022-06-16 02:56:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_actions`
--
ALTER TABLE `menu_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_to_roles`
--
ALTER TABLE `menu_to_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_to_users`
--
ALTER TABLE `menu_to_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_registers`
--
ALTER TABLE `sell_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_transactions`
--
ALTER TABLE `sell_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_type`
--
ALTER TABLE `vendor_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menu_actions`
--
ALTER TABLE `menu_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `menu_to_roles`
--
ALTER TABLE `menu_to_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `menu_to_users`
--
ALTER TABLE `menu_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `sell_registers`
--
ALTER TABLE `sell_registers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sell_transactions`
--
ALTER TABLE `sell_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor_type`
--
ALTER TABLE `vendor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
