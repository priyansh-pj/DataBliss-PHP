-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2023 at 12:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databliss`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_1`
--

CREATE TABLE `contact_1` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `contact_pincode` int(11) DEFAULT NULL,
  `gst_number` varchar(20) DEFAULT NULL,
  `contact_type` enum('seller','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_1`
--

INSERT INTO `contact_1` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_pincode`, `gst_number`, `contact_type`) VALUES
(1, 'Priyansh', 'me.priyanshjain@gmail.com', '9770423319', 452009, 'PJ0808', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `expense_1`
--

CREATE TABLE `expense_1` (
  `id` int(11) NOT NULL,
  `expense_name` varchar(50) NOT NULL,
  `expense_type` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s_no` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s_no`, `username`, `email`, `password`) VALUES
(1, 'priyansh', '9770423319', '$2y$10$6tON/KR/kSenBbcFSx27gO4JgfpnSkU.mg6rvVl47Uliyx8Vo2H72');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `organization_id` int(20) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `gst_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`organization_id`, `organization_name`, `gst_id`, `email`, `contact_no`, `address`, `city`, `state`, `pincode`, `registration_date`) VALUES
(1, 'Aisat Edge', 'PJ002', 'me.priyanshjain@gmail.com', 9770423319, 'Address', 'indore', 'madhya pradesh', 452009, '2023-03-16 15:54:04'),
(2, 'AiSAT', 'PRIY0002', 'aisat@aisat.com', 9770423319, 'Vaishali Nagar', 'indore', 'madhya pradesh', 452001, '2023-03-17 08:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_1`
--

CREATE TABLE `product_1` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `sku_code` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `gst` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_1`
--

INSERT INTO `product_1` (`id`, `product_name`, `sku_code`, `description`, `quantity`, `gst`, `price`) VALUES
(1, 'data', 'data-101', NULL, 10, 12, 100);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_1`
--

CREATE TABLE `purchase_1` (
  `id` int(11) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_gst` varchar(15) DEFAULT NULL,
  `purchase_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_log_1`
--

CREATE TABLE `purchase_log_1` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `s_no` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `organization_id` int(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`s_no`, `uid`, `organization_id`, `role`) VALUES
(1, 1, 1, 'OWNER'),
(4, 1, 2, 'Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `sales_1`
--

CREATE TABLE `sales_1` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `buyer_gst` varchar(15) DEFAULT NULL,
  `sales_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_log_1`
--

CREATE TABLE `sales_log_1` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(5,2) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `uid` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(39) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `organization_id` varchar(255) DEFAULT NULL,
  `creation_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`uid`, `username`, `first_name`, `last_name`, `email`, `contact_no`, `organization_id`, `creation_datetime`) VALUES
(1, 'priyansh', 'Priyansh', 'Jain', 'me.priyansh@gmail.com', 9770423319, '1,2', '2023-03-17 08:16:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_1`
--
ALTER TABLE `contact_1`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `gst_number` (`gst_number`);

--
-- Indexes for table `expense_1`
--
ALTER TABLE `expense_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`organization_id`),
  ADD UNIQUE KEY `gst_id` (`gst_id`);

--
-- Indexes for table `product_1`
--
ALTER TABLE `product_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_1`
--
ALTER TABLE `purchase_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_log_1`
--
ALTER TABLE `purchase_log_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `sales_1`
--
ALTER TABLE `sales_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_log_1`
--
ALTER TABLE `sales_log_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_1`
--
ALTER TABLE `contact_1`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_1`
--
ALTER TABLE `expense_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `organization_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_1`
--
ALTER TABLE `product_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_1`
--
ALTER TABLE `purchase_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_log_1`
--
ALTER TABLE `purchase_log_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_1`
--
ALTER TABLE `sales_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_log_1`
--
ALTER TABLE `sales_log_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_log_1`
--
ALTER TABLE `purchase_log_1`
  ADD CONSTRAINT `purchase_log_1_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase_1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_log_1`
--
ALTER TABLE `sales_log_1`
  ADD CONSTRAINT `sales_log_1_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales_1` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
