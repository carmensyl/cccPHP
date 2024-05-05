-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 06:02 PM
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
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

CREATE TABLE `cart_order` (
  `cart_order_id` int(11) NOT NULL,
  `order_date_time` datetime NOT NULL,
  `ship_loc` varchar(100) NOT NULL,
  `bill_info` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`cart_order_id`, `order_date_time`, `ship_loc`, `bill_info`, `user_name`, `status`) VALUES
(17, '2024-01-11 08:38:46', '334 Bay Ave, Vancouver', '1111 1111 1111', 'Carmen', 'Place Orde'),
(18, '2024-01-12 07:48:55', '334 Bay Ave, Vancouver', '1111 2222 3333', 'Carmen', 'Place Orde');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_detail`
--

CREATE TABLE `cart_order_detail` (
  `cart_order_id` int(11) NOT NULL,
  `cart_order_detail_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_desc` varchar(100) DEFAULT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `cat_desc` varchar(100) DEFAULT NULL,
  `cat_type` varchar(100) DEFAULT NULL,
  `order_qty` int(6) DEFAULT NULL,
  `order_amt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_order_detail`
--

INSERT INTO `cart_order_detail` (`cart_order_id`, `cart_order_detail_id`, `item_id`, `item_name`, `item_desc`, `cat_name`, `cat_desc`, `cat_type`, `order_qty`, `order_amt`) VALUES
(17, 1, 1, 'THESSALIA', 'recycled', 'cat_name', 'cat_desc', 'cat_type', 1, 799),
(17, 2, 6, 'VALENCE', 'velvet,', 'cat_name', 'cat_desc', 'cat_type', 1, 899),
(18, 1, 5, 'CARME', 'king', 'cat_name', 'cat_desc', 'cat_type', 2, 699),
(18, 2, 1, 'THESSALIA', 'recycled', 'cat_name', 'cat_desc', 'cat_type', 1, 799),
(18, 3, 8, 'ODENSE', 'black', 'cat_name', 'cat_desc', 'cat_type', 4, 139);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `type`) VALUES
(1, 'Table', 'Table', 'Dining/ Office'),
(2, 'Bed', 'Bed', 'Bedroom'),
(3, 'Chair', 'Chair', 'Dining/ Office');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `qty` int(6) NOT NULL,
  `price` double NOT NULL,
  `img_src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `cat_id`, `item_name`, `item_desc`, `qty`, `price`, `img_src`) VALUES
(1, 1, 'THESSALIA', 'recycled timber and mango wood, 200cm, natural', 10, 799, 'images\\table0001.webp'),
(2, 1, 'JERRY', 'wood and metal, 160 cm, walnut', 8, 299, 'images\\table0002.webp'),
(3, 1, 'METZ', 'glass and wood, 140 cm, brown', 3, 329, 'images\\table0003.webp'),
(4, 2, 'RAVEL', 'king-size w/ storage, cream', 15, 999, 'images\\bed0004.jpg'),
(5, 2, 'CARME', 'king size, dark grey', 8, 699, 'images\\bed0005.webp'),
(6, 2, 'VALENCE', ' velvet, queen size, grey', 3, 899, 'images\\bed0006.webp'),
(7, 3, 'SANDY', 'rust', 1, 179, 'images\\chair0007.webp'),
(8, 3, 'ODENSE', 'black', 2, 139, 'images\\chair0008.webp'),
(9, 3, 'SHARON', 'velvet, armchair, beige', 3, 169, 'images\\chair0009.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD PRIMARY KEY (`cart_order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_order`
--
ALTER TABLE `cart_order`
  MODIFY `cart_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
