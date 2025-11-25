-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 08:02 AM
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
-- Database: `farhanas_garments_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Present',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-19', 'Absent', '2025-11-18 21:28:56', '2025-11-18 21:29:21'),
(2, 2, '2025-11-20', 'Present', '2025-11-18 22:51:02', '2025-11-18 22:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `company_name`, `contact_no`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Farhana', 'Sunshine cloth store', '0123654789', 'farhana@gmail.com', 'Mirpur 10', '2025-11-11 00:03:56', '2025-11-11 00:03:56'),
(2, 'Sharmin Akter', 'Sharmin Store', '01788219092', 'sharmin@gmail.com', 'Azimpur', '2025-11-11 00:20:40', '2025-11-11 00:20:40'),
(3, 'Rafi Hassan', 'Rainbow Cloth Store', '0123654789', 'rafi@gmail.com', 'Nilkhet, Dhaka', '2025-11-18 23:31:47', '2025-11-18 23:31:47'),
(4, 'Nisat Hassan', 'NexDrop store', '01788229092', 'nisat@gmail.com', 'Technical Road, Dhaka', '2025-11-18 23:32:36', '2025-11-18 23:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `order_id`, `delivery_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-12', 'on_the_way', '2025-11-11 00:09:15', '2025-11-11 00:09:15'),
(2, 2, '2025-11-18', 'delivered', '2025-11-17 22:18:50', '2025-11-17 22:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Merchandising Department', NULL, '2025-11-18 20:50:55', '2025-11-18 20:50:55'),
(2, 'Planning Department (PPC – Production Planning & Control)', NULL, '2025-11-18 20:51:13', '2025-11-18 20:51:13'),
(3, 'Design / Product Development Department', NULL, '2025-11-18 20:51:31', '2025-11-18 20:51:31'),
(4, 'Sampling Department', NULL, '2025-11-18 20:51:40', '2025-11-18 20:51:40'),
(5, 'Fabric Sourcing Department', NULL, '2025-11-18 20:51:47', '2025-11-18 20:51:47'),
(6, 'Accessories & Trims Sourcing Department', NULL, '2025-11-18 20:51:54', '2025-11-18 20:51:54'),
(7, 'Cutting Department', NULL, '2025-11-18 20:52:05', '2025-11-18 20:52:05'),
(8, 'Sewing / Stitching Department', NULL, '2025-11-18 20:52:13', '2025-11-18 20:52:13'),
(9, 'Finishing Department', NULL, '2025-11-18 20:52:22', '2025-11-18 20:52:22'),
(10, 'Quality Control (QC) Department', NULL, '2025-11-18 20:52:29', '2025-11-18 20:52:29'),
(11, 'Industrial Engineering (IE) Department', NULL, '2025-11-18 20:52:40', '2025-11-18 20:52:40'),
(12, 'Maintenance / Engineering Department', NULL, '2025-11-18 20:52:47', '2025-11-18 20:52:47'),
(13, 'Wash Department', NULL, '2025-11-18 20:52:53', '2025-11-18 20:52:53'),
(14, 'Embroidery / Printing Department', NULL, '2025-11-18 20:53:01', '2025-11-18 20:53:01'),
(15, 'Inventory Department', NULL, '2025-11-18 20:53:13', '2025-11-18 20:53:13'),
(16, 'Shipping Department', NULL, '2025-11-18 20:53:32', '2025-11-18 20:53:32'),
(17, 'HR & Compliance Department', NULL, '2025-11-18 20:54:23', '2025-11-18 20:54:23'),
(18, 'Accounts & Finance Department', NULL, '2025-11-18 20:54:30', '2025-11-18 20:54:30'),
(19, 'Administration Department', NULL, '2025-11-18 20:54:37', '2025-11-18 20:54:37'),
(20, 'Logistics Department', NULL, '2025-11-18 20:54:43', '2025-11-18 20:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `department_id`, `position`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Farhana', 'Shetu', 'farhana@gmail.com', '0176512454', 2, 'Staff', 0.00, '2025-11-18 21:19:01', '2025-11-18 21:19:01'),
(2, 'Ishtiaque', 'Islam Khan', 'khan@gmail.com', '0176512454', 17, 'Manager', 0.00, '2025-11-18 22:50:47', '2025-11-18 22:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `month` int(255) NOT NULL,
  `year` int(11) NOT NULL,
  `basic` double NOT NULL,
  `house_rent` double NOT NULL,
  `medical` double NOT NULL,
  `transport` double NOT NULL,
  `overtime_amount` double NOT NULL,
  `absent_deduction` double NOT NULL,
  `gross_salary` double NOT NULL,
  `net_salary` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `employee_id`, `month`, `year`, `basic`, `house_rent`, `medical`, `transport`, `overtime_amount`, `absent_deduction`, `gross_salary`, `net_salary`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 2025, 25500, 3000, 1000, 1500, 234, 1200, 12000, 35000, '2025-11-18 23:08:58', '2025-11-18 23:26:14'),
(3, 1, 7, 2025, 2900, 411444, 1144, 1111, 1111, 111, 11, 37000, '2025-11-18 23:18:05', '2025-11-18 23:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transactions`
--

CREATE TABLE `inventory_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` enum('inflow','outflow') NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `transactionable_type` varchar(255) NOT NULL,
  `transactionable_id` bigint(20) UNSIGNED NOT NULL,
  `related_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_production_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_transactions`
--

INSERT INTO `inventory_transactions` (`id`, `transaction_type`, `quantity`, `transactionable_type`, `transactionable_id`, `related_order_id`, `related_production_id`, `created_at`, `updated_at`) VALUES
(1, 'inflow', 1000.00, 'App\\Models\\Material', 1, NULL, NULL, '2025-11-17 22:37:36', '2025-11-17 22:37:36'),
(2, 'inflow', 1000.00, 'App\\Models\\Material', 1, NULL, NULL, '2025-11-17 22:37:54', '2025-11-17 22:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_id`, `start_date`, `end_date`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-20', '2025-11-20', 'Sick', 'Rejected', '2025-11-18 21:34:00', '2025-11-18 21:34:37'),
(2, 2, '2025-11-21', '2025-11-22', 'Inspection Tour', 'Approved', '2025-11-18 22:51:37', '2025-11-18 22:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `current_stock` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `supplier_id`, `name`, `unit`, `current_stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cotton', 'KG', 10000.00, '2025-11-11 00:22:10', '2025-11-11 00:22:52');

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
(1, '2025_11_09_041048_create_buyers_table', 1),
(2, '2025_11_09_041110_create_orders_table', 1),
(3, '2025_11_09_041143_create_departments_table', 1),
(4, '2025_11_09_041202_create_suppliers_table', 1),
(5, '2025_11_09_041211_create_materials_table', 1),
(6, '2025_11_09_041222_create_purchases_table', 1),
(7, '2025_11_09_041239_create_employees_table', 1),
(8, '2025_11_09_164409_create_purchase_orders_table', 1),
(9, '2025_11_09_175242_create_purchase_items_table', 1),
(10, '2025_11_10_050751_create_product_categories_table', 1),
(11, '2025_11_10_050805_create_products_table', 1),
(12, '2025_11_10_050828_create_order_items_table', 1),
(13, '2025_11_10_050840_create_deliveries_table', 1),
(14, '2025_11_11_052138_create_production_lines_table', 1),
(15, '2025_11_11_052318_create_productions_table', 1),
(16, '2025_11_11_052444_create_production_defects_table', 1),
(17, '2025_11_19_030230_create_employees_table', 2),
(18, '2025_11_19_030302_create_attendances_table', 2),
(19, '2025_11_19_030319_create_leave_requests_table', 2),
(20, '2025_11_19_040416_create_salary_settings_table', 3),
(21, '2025_11_19_040455_create_employee_salaries_table', 3),
(22, '2025_11_19_033907_create_salary_settings_table', 4),
(23, '2025_11_19_0052319_create_production_defects_table', 5),
(24, '2025_11_19_063835_create_production_defects_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `total_qty` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','in_production','completed','delivered') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `order_number`, `order_date`, `delivery_date`, `total_qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORD-1001', '2025-11-11', '2025-11-29', 2000, 'pending', '2025-11-11 00:08:35', '2025-11-11 00:08:35'),
(2, 1, 'ORD-1002', '2025-11-12', '2025-11-27', 5000, 'in_production', '2025-11-11 00:16:58', '2025-11-11 00:16:58'),
(3, 2, 'ORD-1003', '2025-11-12', '2025-11-30', 4000, 'pending', '2025-11-11 00:21:08', '2025-11-11 00:21:08'),
(4, 4, 'ORD-1004', '2025-11-19', '2025-11-25', 5000, 'pending', '2025-11-18 23:34:31', '2025-11-18 23:34:31'),
(5, 3, 'ORD-1005', '2025-11-19', '2025-11-28', 5000, 'pending', '2025-11-19 00:17:01', '2025-11-19 00:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000, 80.00, '2025-11-11 00:08:57', '2025-11-11 00:08:57'),
(2, 3, 1, 100, 120.00, '2025-11-17 22:18:26', '2025-11-17 22:18:26'),
(3, 4, 2, 5000, 70.00, '2025-11-18 23:35:17', '2025-11-18 23:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `productions` (`id`, `order_id`, `production_date`, `planned_qty`, `produced_qty`, `defect_qty`, `remarks`, `is_completed`, `line_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-12', 23000, 21000, 1500, NULL, 1, 1, '2025-11-11 00:16:29', '2025-11-18 23:50:55'),
(2, 3, '2025-11-12', 4000, 3500, 500, NULL, 0, 2, '2025-11-11 00:23:40', '2025-11-11 00:23:40'),
(3, 4, '2025-11-20', 5000, 4500, 20, NULL, 0, 1, '2025-11-18 23:48:13', '2025-11-18 23:48:13'),
(4, 5, '2025-11-20', 5000, 4500, 0, NULL, 0, 4, '2025-11-19 00:18:29', '2025-11-19 00:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `production_defects`
--

CREATE TABLE `production_defects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productions_line_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `production_defects` (`id`, `productions_line_id`, `order_id`, `defect_type`, `defect_qty`, `reported_by`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Scrapped', 20, 'Farhana', NULL, 'defect_images/BbdqxBZFYeRKDdYEbaAnwRpj5278FJna6HfWZ8nq.jpg', 'pending', '2025-11-19 00:51:49', '2025-11-19 00:51:49');

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
(1, 'Production Line', NULL, '2025-11-11 00:03:29', '2025-11-19 00:13:21'),
(2, 'Cutting Line', NULL, '2025-11-11 00:23:07', '2025-11-11 00:23:07'),
(3, 'Sewing Line', NULL, '2025-11-18 23:43:59', '2025-11-18 23:43:59'),
(4, 'Finishing Line', NULL, '2025-11-18 23:44:26', '2025-11-18 23:44:26'),
(5, 'Quality Control (QC) Line', NULL, '2025-11-18 23:44:35', '2025-11-18 23:44:35'),
(6, 'Packing Line', NULL, '2025-11-18 23:44:44', '2025-11-18 23:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cotton', 170.00, NULL, 0, '2025-11-11 00:08:12', '2025-11-11 00:08:12'),
(2, 3, 'Polyester', 5000.00, NULL, 0, '2025-11-18 23:30:32', '2025-11-18 23:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'T-shirt', '1762841271_shirt.jpg', '2025-11-11 00:07:51', '2025-11-11 00:07:51'),
(2, 'Denim', '1763530054_91mkkg7dORL._AC_SL1500_.jpg', '2025-11-18 23:27:34', '2025-11-18 23:27:34'),
(3, 'Polo Shirt', '1763530134_download (4).jpg', '2025-11-18 23:28:54', '2025-11-18 23:28:54'),
(4, 'Sweater', '1763530183_download (5).jpg', '2025-11-18 23:29:43', '2025-11-18 23:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `purchase_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `material_id`, `supplier_id`, `quantity`, `unit_price`, `status`, `purchase_order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000.00, 120.00, 'approved', 1, '2025-11-11 00:22:27', '2025-11-11 00:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` enum('pending','approved','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `supplier_id`, `order_date`, `status`, `total_amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-11-11', 'pending', 2400000.00, NULL, '2025-11-11 00:22:27', '2025-11-11 00:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `salary_settings`
--

CREATE TABLE `salary_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_percentage` double NOT NULL,
  `house_rent_percentage` double NOT NULL,
  `medical_allowance` double NOT NULL,
  `transport_allowance` double NOT NULL,
  `overtime_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sabrina', '01755875874', 'sa@gmail.com', 'Bogura', '2025-11-11 00:21:54', '2025-11-11 00:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_supplier_id_foreign` (`supplier_id`);

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
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productions_order_id_foreign` (`order_id`),
  ADD KEY `productions_line_id_foreign` (`line_id`);

--
-- Indexes for table `production_defects`
--
ALTER TABLE `production_defects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_defects_productions_line_id_foreign` (`productions_line_id`),
  ADD KEY `production_defects_order_id_foreign` (`order_id`);

--
-- Indexes for table `production_lines`
--
ALTER TABLE `production_lines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `production_lines_name_unique` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchases_material_id_foreign` (`material_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_material_id_foreign` (`material_id`),
  ADD KEY `purchase_items_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_items_purchase_order_id_foreign` (`purchase_order_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_orders_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `salary_settings`
--
ALTER TABLE `salary_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production_defects`
--
ALTER TABLE `production_defects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `production_lines`
--
ALTER TABLE `production_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary_settings`
--
ALTER TABLE `salary_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD CONSTRAINT `employee_salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `production_lines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_defects`
--
ALTER TABLE `production_defects`
  ADD CONSTRAINT `production_defects_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_defects_productions_line_id_foreign` FOREIGN KEY (`productions_line_id`) REFERENCES `production_lines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
