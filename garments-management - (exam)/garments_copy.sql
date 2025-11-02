-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 06:57 AM
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
-- Database: `garments_copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` enum('Present','Absent','Late','On Leave') NOT NULL DEFAULT 'Present',
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `organization_name`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Sunshine', 'Farhana', 'farhana@gmail.com', '01765124532', '2025-11-01 22:05:19', '2025-11-01 22:05:19'),
(2, 'Sunrise', 'Abu Hydar', 'vendor@gmail.com', '0176512454', '2025-11-01 23:48:47', '2025-11-01 23:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `employee_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_11_02_035306_create_buyers_table', 1),
(2, '2025_11_02_035423_create_orders_table', 1),
(3, '2025_11_02_035447_create_deliveries_table', 1),
(4, '2025_11_01_054804_create_departments_table', 2),
(5, '2025_11_01_054828_create_employees_table', 2),
(6, '2025_11_01_055805_create_attendances_table', 2),
(7, '2025_11_02_042827_create_suppliers_table', 3),
(8, '2025_11_02_042851_create_supplies_table', 3),
(9, '2025_11_02_043007_create_purchase_orders_table', 3),
(10, '2025_10_31_190232_create_productionlines_table', 4),
(11, '2025_10_31_190317_create_productions_table', 4),
(12, '2025_11_01_033856_create_production_defects_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `product`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shirt', 6000, 200000.00, 'Pending', '2025-11-01 23:23:52', '2025-11-01 23:23:52'),
(2, 2, 'Jeans', 4000, 98000.00, 'Pending', '2025-11-01 23:49:15', '2025-11-01 23:49:15'),
(3, 2, 'Shirt', 5000, 98000.00, 'Pending', '2025-11-01 23:53:56', '2025-11-01 23:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `production_date` date NOT NULL,
  `planned_qty` int(11) NOT NULL DEFAULT 0,
  `produced_qty` int(11) NOT NULL DEFAULT 0,
  `defect_qty` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `line_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `order_no`, `production_date`, `planned_qty`, `produced_qty`, `defect_qty`, `remarks`, `is_completed`, `line_id`, `created_at`, `updated_at`) VALUES
(1, 'ORD-1001', '2025-01-01', 6000, 6000, 0, NULL, 0, 1, '2025-11-01 23:38:05', '2025-11-01 23:47:27'),
(2, 'ORD-1002', '2025-11-02', 1000, 1000, 0, NULL, 0, 2, '2025-11-01 23:38:36', '2025-11-01 23:38:36'),
(3, 'ORD-1003', '2025-11-02', 1000, 1000, 40, NULL, 0, 3, '2025-11-01 23:39:01', '2025-11-01 23:41:43'),
(4, 'ORD-1004', '2025-11-02', 1000, 900, 100, NULL, 0, 4, '2025-11-01 23:39:36', '2025-11-01 23:40:30'),
(5, 'ORD-1006', '2025-11-03', 5000, 5000, 0, NULL, 0, 1, '2025-11-01 23:54:31', '2025-11-01 23:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `production_defects`
--

CREATE TABLE `production_defects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_id` bigint(20) UNSIGNED NOT NULL,
  `defect_type` varchar(255) NOT NULL,
  `defect_qty` int(11) NOT NULL DEFAULT 0,
  `reported_by` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','reworked','scrapped') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_defects`
--

INSERT INTO `production_defects` (`id`, `production_id`, `defect_type`, `defect_qty`, `reported_by`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Loose Stitch', 50, NULL, NULL, NULL, 'pending', '2025-11-01 23:40:30', '2025-11-01 23:40:30'),
(2, 3, 'Wrong Grain Alignment', 40, NULL, NULL, NULL, 'pending', '2025-11-01 23:41:43', '2025-11-01 23:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `production_lines`
--

CREATE TABLE `production_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_lines`
--

INSERT INTO `production_lines` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fabric Inspection Line', 'Raw fabric is checked for defects such as holes, stains, color variation, or misprints.\r\nThe fabric is measured, rolled, and marked for defects before being sent to cutting.\r\nEnsures only high-quality fabric enters production.', '2025-11-01 23:35:11', '2025-11-01 23:35:11'),
(2, 'Spreading Line', 'Fabric is spread in multiple layers on long tables according to the required garment size.', '2025-11-01 23:35:32', '2025-11-01 23:35:32'),
(3, 'Cutting Line', 'Fabric layers are cut into pattern pieces using cutting machines (straight knife, band knife, or laser cutting).', '2025-11-01 23:35:48', '2025-11-01 23:35:48'),
(4, 'Bundling Line', 'Cut fabric pieces are sorted and bundled according to size, color, and style.', '2025-11-01 23:36:06', '2025-11-01 23:36:06'),
(5, 'Sewing / Stitching Line', 'Bundles are sent to different sewing stations (e.g., front panel, back panel, sleeve attachment).', '2025-11-01 23:36:26', '2025-11-01 23:36:26'),
(6, 'Quality Control (In-Line & End-Line)', 'In-line QC checks are done at various sewing stages to catch defects early.', '2025-11-01 23:36:41', '2025-11-01 23:36:41'),
(7, 'Washing / Finishing Line', 'Garments may undergo washing, dyeing, or special finishing (stone wash, softening, or distressing).', '2025-11-01 23:37:01', '2025-11-01 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `supply_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `supplier_id`, `supply_id`, `quantity`, `price`, `status`, `order_date`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 300, 95000.00, 'Pending', '2025-11-02', '2025-11-01 23:08:04', '2025-11-01 23:08:04'),
(3, 1, 3, 20000, 98000.00, 'Pending', '2025-11-05', '2025-11-01 23:52:09', '2025-11-01 23:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Farhana', 'farhana@gmail.com', '01765124532', 'Mirpur 6', '2025-11-01 22:45:23', '2025-11-01 22:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `supplier_id`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fabric', 200, 5000.00, '2025-11-01 22:51:21', '2025-11-01 22:51:21'),
(2, 1, 'Thread', 400, 30000.00, '2025-11-01 23:07:47', '2025-11-01 23:07:47'),
(3, 1, 'Cotton', 10000, 500000.00, '2025-11-01 23:51:12', '2025-11-01 23:51:12'),
(4, 1, 'Buttons', 100000, 100000.00, '2025-11-01 23:51:47', '2025-11-01 23:51:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendances_employee_id_date_unique` (`employee_id`,`date`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyers_email_unique` (`email`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_order_id_foreign` (`order_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_department_id_foreign` (`department_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productions_line_id_foreign` (`line_id`);

--
-- Indexes for table `production_defects`
--
ALTER TABLE `production_defects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_defects_production_id_foreign` (`production_id`);

--
-- Indexes for table `production_lines`
--
ALTER TABLE `production_lines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `production_lines_name_unique` (`name`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_orders_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_orders_supply_id_foreign` (`supply_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplies_supplier_id_foreign` (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `production_defects`
--
ALTER TABLE `production_defects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_lines`
--
ALTER TABLE `production_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `production_lines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_defects`
--
ALTER TABLE `production_defects`
  ADD CONSTRAINT `production_defects_production_id_foreign` FOREIGN KEY (`production_id`) REFERENCES `productions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_orders_supply_id_foreign` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
