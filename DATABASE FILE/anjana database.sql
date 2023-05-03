-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2023 at 12:18 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rposystem1`
--

-- --------------------------------------------------------

--
-- Table structure for table `rpos_admin`
--

DROP TABLE IF EXISTS `rpos_admin`;
CREATE TABLE IF NOT EXISTS `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'Admin', 'admin@gmail.com', '53b201059751d0f5968f2d1cbf98a0f1d4d7220d');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_booking`
--

DROP TABLE IF EXISTS `rpos_booking`;
CREATE TABLE IF NOT EXISTS `rpos_booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `booking_name` varchar(255) NOT NULL,
  `booking_Tname` varchar(255) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rpos_booking`
--

INSERT INTO `rpos_booking` (`booking_id`, `booking_name`, `booking_Tname`) VALUES
(1, 'anjana', ''),
(2, 'anjana', ''),
(3, 'krishi', 'balconi special table');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_cashier`
--

DROP TABLE IF EXISTS `rpos_cashier`;
CREATE TABLE IF NOT EXISTS `rpos_cashier` (
  `cashier_id` int NOT NULL AUTO_INCREMENT,
  `cashier_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cashier_number` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cashier_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cashier_password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`cashier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_cashier`
--

INSERT INTO `rpos_cashier` (`cashier_id`, `cashier_name`, `cashier_number`, `cashier_email`, `cashier_password`, `created_at`) VALUES
(7, 'Nikhil', 'LRQP-2841', 'nikhil@gmail.com', 'f17526eaa7927e040e9bce862942265062daed33', '2023-05-02 21:04:21.873591');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders`
--

DROP TABLE IF EXISTS `rpos_orders`;
CREATE TABLE IF NOT EXISTS `rpos_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`order_id`),
  KEY `CustomerOrder` (`customer_id`),
  KEY `ProductOrder` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
(1, 'GCYA-5849', NULL, 'anjana', NULL, 'Thakali khana', '480', '1', '', '2023-05-03 12:01:16.133992'),
(2, 'OFJG-5837', NULL, 'krishi', NULL, 'Thakali khana', '480', '3', '', '2023-05-03 12:02:42.852003'),
(3, 'MCIF-9301', NULL, 'krishi', NULL, 'Thakali khana', '480', '199', 'Paid', '2023-05-03 12:10:01.205016'),
(40, 'DLFT-1796', NULL, 'anjana', '156b327392', 'MOMO', '250', '11', '', '2023-05-03 12:12:12.094762'),
(41, 'IRBZ-3427', NULL, 'krishi', '156b327392', 'MOMO', '250', '12345', '', '2023-05-03 12:12:52.677111'),
(42, 'GPWS-4783', NULL, 'krishi', NULL, 'MOMO', '250', '12', '', '2023-05-03 12:15:26.634961');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_pass_resets`
--

DROP TABLE IF EXISTS `rpos_pass_resets`;
CREATE TABLE IF NOT EXISTS `rpos_pass_resets` (
  `reset_id` int NOT NULL AUTO_INCREMENT,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`reset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_payments`
--

DROP TABLE IF EXISTS `rpos_payments`;
CREATE TABLE IF NOT EXISTS `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`pay_id`),
  KEY `order` (`order_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
('d4ab06', 'BVITF48KRP', 'ZXEC-0375', '473eb579b723', '500', 'Cash', '2023-05-02 21:52:09.044526'),
('ddbb63', 'aaaaaaaaaa', 'MCIF-9301', '', '95520', 'Cash', '2023-05-03 12:10:01.201151');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_products`
--

DROP TABLE IF EXISTS `rpos_products`;
CREATE TABLE IF NOT EXISTS `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('156b327392', 'ELPX-0784', 'MOMO', '2022-06-21.jpg', 'MOMO', '250', '2023-05-03 07:16:27.683532'),
('d67593d76d', 'XWOT-9523', 'Thakali khana', 'download (1).jfif', 'b', '480', '2023-05-03 07:18:34.763109');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_super_admin`
--

DROP TABLE IF EXISTS `rpos_super_admin`;
CREATE TABLE IF NOT EXISTS `rpos_super_admin` (
  `superadmin_id` varchar(200) NOT NULL,
  `superadmin_name` varchar(200) NOT NULL,
  `superadmin_email` varchar(200) NOT NULL,
  `superadmin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_super_admin`
--

INSERT INTO `rpos_super_admin` (`superadmin_id`, `superadmin_name`, `superadmin_email`, `superadmin_password`) VALUES
('1', 'Anjana', 'anjana@gmail.com', '7ed49cb18d2a3ad77ce27d4114b8e1df5efe65b0'),
('3', 'James ', 'james@gmail.com', '7a62b703464c982bb9b294433ccf79df043fe449');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_waiter`
--

DROP TABLE IF EXISTS `rpos_waiter`;
CREATE TABLE IF NOT EXISTS `rpos_waiter` (
  `waiter_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_phoneno` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`waiter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_waiter`
--

INSERT INTO `rpos_waiter` (`waiter_id`, `waiter_name`, `waiter_phoneno`, `waiter_email`, `waiter_password`, `created_at`) VALUES
('1fc1f694985d', 'krishi', '2145896547', 'krishi@mail.com', '123456789', '2023-05-03 10:29:16.664291'),
('27e4a5bc74c2', 'rekha', '4589654780', 'rekha@mail.com', '123456789', '2023-05-03 10:29:42.369233');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_waiter1`
--

DROP TABLE IF EXISTS `rpos_waiter1`;
CREATE TABLE IF NOT EXISTS `rpos_waiter1` (
  `waiter_id` int NOT NULL AUTO_INCREMENT,
  `waiter_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_number` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waiter_password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`waiter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_waiter1`
--

INSERT INTO `rpos_waiter1` (`waiter_id`, `waiter_name`, `waiter_number`, `waiter_email`, `waiter_password`, `created_at`) VALUES
(5, 'Popta', 'GCDV-1642', 'po@gmail.com', '79148bcb13b9a94f8864b78b970820653c520c8d', '2023-04-30 15:23:04.921765'),
(6, 'Anjana', 'IVOA-1976', 'Bimal@gmail.com', 'ab97a29332fc7f927b432368217added985daab6', '2023-05-02 23:12:08.582874');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_waiter` (`waiter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
