-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2025 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Ananda NL', '08123456789', 'Jl. kenangan no 54', '2025-06-30 00:48:37', '2025-06-30 00:48:37'),
(2, 'Lutfi', '08645645645', 'Jl. jalan lagi yeay no 90', '2025-06-30 00:50:11', '2025-06-30 00:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Operator', NULL, NULL),
(3, 'Leader', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_orders`
--

CREATE TABLE `trans_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(30) NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(4) DEFAULT 0,
  `order_pay` int(11) DEFAULT NULL,
  `order_change` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trans_orders`
--

INSERT INTO `trans_orders` (`id`, `id_customer`, `order_code`, `order_end_date`, `order_status`, `order_pay`, `order_change`, `total`, `created_at`, `updated_at`) VALUES
(4, 2, 'TR-01072025-001', '2025-07-06', 1, 30000, 15000, 15000, '2025-07-01 00:22:36', '2025-07-03 18:08:53'),
(5, 1, 'TR-07072025-001', '2025-07-10', 1, 60000, 40000, 20000, '2025-07-06 21:04:31', '2025-07-06 21:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_services`
--

CREATE TABLE `type_of_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(35) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_of_services`
--

INSERT INTO `type_of_services` (`id`, `service_name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hanya Cuci', 5000, 'Cuci reguler', NULL, NULL, NULL),
(2, 'Hanya Gosok', 4000, 'Gosok reguler, bukan express', NULL, NULL, NULL),
(3, 'Cuci dan Gosok', 8000, 'Paket bersih sekaligus', NULL, NULL, NULL),
(4, 'Laundry besar', 7000, 'khusus selimut, karpet, mantel dan sprei my love', NULL, NULL, NULL),
(5, 'Bigger Laundry', 15000, 'wleowleo', '2025-06-30 00:03:35', '2025-06-30 00:21:11', '2025-06-30 00:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$faLOKzPlRkARNsGZhGHAlu3HXB5H.zZe/gJtkRI1kiRHLw9yiJeKG', NULL, '2025-06-24 20:48:39', '2025-06-24 20:48:39'),
(2, 'Operator', 'op@gmail.com', NULL, '$2y$12$oElfiqmlDLwV2cZvEm9cMOqBCZjhCLzWxu15Y4SsYqFmSa/fk0VJS', NULL, '2025-06-30 18:54:42', '2025-06-30 18:54:42'),
(3, 'Pimpinan', 'lead@gmail.com', NULL, '$2y$12$Y/87Od38DPPWjRHQ5/V87.KdsA5fS/wHfbMqgW13/Ty3iHwtHyRYK', NULL, '2025-06-30 18:54:58', '2025-06-30 18:54:58'),
(9, 'Lutfi', 'uhuy@gmail.com', NULL, '$2y$12$F/vxhTPOjQmoYBVS7WhHjO89AdbM3fZEGv/ZA0HxsClGLvUmDO6.i', NULL, '2025-07-03 21:35:06', '2025-07-03 21:35:06'),
(12, 'Biila', 'user@gmail.com', NULL, '$2y$12$e6LSbKpj1YSVvoTFI4kQ9efEzqeikZxkabZQTWgBUTf5u32Ggf0o6', NULL, '2025-07-04 00:34:50', '2025-07-04 00:34:50'),
(13, 'Nanda', 'cewe@gmail.com', NULL, '$2y$12$Qdyl6zJ/ozKmkmlyBghUEeMM/gucerWpAGKszHYO5afPSsBp5GG62', NULL, '2025-07-04 00:35:14', '2025-07-04 00:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_orders_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `type_of_services`
--
ALTER TABLE `type_of_services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trans_orders`
--
ALTER TABLE `trans_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_of_services`
--
ALTER TABLE `type_of_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD CONSTRAINT `trans_orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
