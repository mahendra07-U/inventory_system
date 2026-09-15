-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2026 at 05:03 PM
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
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `admin_password`, `created_at`) VALUES
(1, 'Admin Mahendra', 'admin@inventory.com', '$2y$10$.2aBoaw.OVcY2SOb.gDTne8Db0435baE8GZJDKgrMkB1.LDIA73Vm', '2026-09-15 12:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_allocated` int(11) DEFAULT NULL,
  `allocation_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`id`, `student_id`, `item_id`, `quantity_allocated`, `allocation_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2026-09-15', '2026-09-15', 'Returned', '2026-09-15 13:21:01', '2026-09-15 14:16:24'),
(3, 1, 2, 1, '2026-09-15', '2026-09-15', 'Returned', '2026-09-15 13:21:06', '2026-09-15 14:15:04'),
(4, 1, 2, 1, '2026-09-15', NULL, 'Active', '2026-09-15 14:15:25', '2026-09-15 14:15:25'),
(5, 1, 2, 1, '2026-09-15', '2026-09-15', 'Returned', '2026-09-15 14:15:26', '2026-09-15 14:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT 0,
  `available_quantity` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `item_name`, `category`, `total_quantity`, `available_quantity`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'pencils Pack (with sharpner and eraser)', 'Pens & Pencils', 16, 15, 'here is premium pencils', '1789476194_5111a98b4145fb9c483b.webp', '2026-09-15 12:43:14', '2026-09-15 14:16:25'),
(3, 'Cello Pen Box', 'Pens & Pencils', 100, 100, '', '1789479135_7a86adedca4c839bd9ce.jpg', '2026-09-15 13:32:15', '2026-09-15 13:32:15'),
(4, 'Eraser ', 'Miscellaneous', 1000, 1000, 'erasers', '1789479182_2a4fe9d79d36e03ae1b3.jpg', '2026-09-15 13:33:02', '2026-09-15 13:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(11) NOT NULL,
  `allocation_id` int(11) NOT NULL,
  `returned_quantity` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `item_condition` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `student_password` varchar(255) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `student_password`, `roll_no`, `department`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'mahendra', 'mahi@gmail.com', '$2y$10$ZcFuYPKX0xeQm0iCMylX.uoka5bU4Ji.2ZHesChrPZRdIUF3Fmei2', '364', 'BCA', '8949839498', '2026-09-14 10:06:03', '2026-09-15 07:19:39'),
(2, 'somesh trivedi', 'somesh@gmail.com', '$2y$10$CpVaP2vPcDIuiDSTtz6nfuP4PHGWEbtexDAwbQwMPBmB/Rkyg.Hf2', '362', 'BCA', '9939399931', '2026-09-15 06:32:41', '2026-09-15 06:32:41'),
(3, 'akshay', 'akshay@gmail.com', '$2y$10$j7B0OgTaR5jHFxUx/IPrqe43OHWPRPhYtkf.Tqud7j490l9F1FZGy', '330', 'BBA', '9939399931', '2026-09-15 06:34:48', '2026-09-15 06:34:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allocation_id` (`allocation_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `allocations_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`allocation_id`) REFERENCES `allocations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
