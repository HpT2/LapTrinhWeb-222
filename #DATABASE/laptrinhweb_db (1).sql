-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 08:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptrinhweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` text NOT NULL,
  `totalcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `customerID`, `date`, `totalcost`) VALUES
(1, 2, '2023-04-17 04:18:18', 600),
(2, 2, '2023-04-17 04:52:19', 1200),
(3, 2, '2023-04-17 04:55:07', 600),
(4, 2, '2023-04-17 05:27:45', 2600),
(5, 2, '2023-04-17 05:40:13', 3400),
(6, 2, '2023-04-17 06:10:39', 3000),
(7, 2, '2023-04-17 06:17:04', 1800),
(8, 2, '2023-04-17 06:21:16', 600),
(9, 2, '2023-04-17 07:08:45', 600);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customerID`) VALUES
(2, 2),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `phone`, `address`, `birthday`, `adminID`) VALUES
(1, 'vinhtoan', '$2y$10$BvzPjKizP1YIZcQ1ppm25.WsXBPdBxhn7i1cyNgzuQ31vOEf23ubW', NULL, NULL, NULL, NULL, NULL),
(2, 'hptisme', '123', 'Tùng', '0971479331', '372/23/7 CMT8 P10 Q3', '2002-02-17', NULL),
(9, 'tung1', '$2y$10$6BGqlXzS35rhe3GdYPKwmunXU2UZeTGkTee1relFinspoIxh1YXN6', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keep`
--

CREATE TABLE `keep` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keep`
--

INSERT INTO `keep` (`cartID`, `productID`) VALUES
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `productID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL, /* */ 
  `name` varchar(255) NOT NULL, /* */
  `description` text NOT NULL, /* */
  `rating` int(11) NOT NULL, /* num star of product */
  `price` varchar(255) NOT NULL, /* */
  `brand` varchar(255) NOT NULL, /* product type */
  `cpu` varchar(255) NOT NULL, /* */
  `ram` varchar(255) NOT NULL, /* */
  `gpu` varchar(255) NOT NULL, /* */
  `screen` varchar(255) NOT NULL, /* */
  `battery` varchar(255) NOT NULL, /* */
  `config1` varchar(255) NOT NULL, /* */
  `config2` varchar(255) NOT NULL, /* */
  `config3` varchar(255) NOT NULL, /* */
  `image` varchar(255) NOT NULL, /* main img */
  `image1` varchar(255) NOT NULL, /* show img */
  `image2` varchar(255) NOT NULL, /* */
  `image3` varchar(255) NOT NULL, /* */
  `outstanding` varchar(255) NOT NULL, /* */
  `guarantee` varchar(255) NOT NULL /* */
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `products` (`id`, `name`, `description`, `rating`, `price`, `brand`, `cpu`, `ram`, `gpu`, `screen`, `battery`, `config1`, `config2`, `config3`, `image`, `image1`, `image2`, `image3`, `outstanding`, `guarantee`) VALUES
(1, 'Mac 2021', 'laptop', 4, '34,999,999', 'Macbook', 'i7 10th', '8G', '1640 ti', '15.6\" FHD (1920 x 1080) Mac ComfyView LCD, Anti-Glare', '10000mAh', 'i7 10th', 'i5 10th', 'i9 10th', 'https://cdn.dienthoaigiakho.vn/photos/1655452036715-macbookair-m2-sb-2.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036729-macbookair-m2-sb-3.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036703-macbookair-m2-sb-1.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036693-macbookair-m2-sb.jpg', 'Tận hưởng trải nghiệm chơi game mượt mà, không bị nhòe. Màn hình viền mỏng cũng đã được tăng tỷ lệ so với thân máy lên 80%.', 'Bảo hành: 12 tháng LaptopAZ');

-- --------------------------------------------------------

--
-- Table structure for table `products_of_bill`
--

CREATE TABLE `products_of_bill` (
  `Bill_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_of_bill`
--

INSERT INTO `products_of_bill` (`Bill_ID`, `Product_ID`, `amount`, `customerID`) VALUES
(1, 5, 1, 2),
(1, 6, 1, 2),
(2, 5, 2, 2),
(2, 6, 2, 2),
(3, 5, 1, 2),
(3, 6, 1, 2),
(4, 5, 1, 2),
(4, 6, 5, 2),
(5, 5, 14, 2),
(5, 6, 4, 2),
(6, 5, 5, 2),
(6, 6, 5, 2),
(7, 5, 3, 2),
(7, 6, 3, 2),
(8, 5, 1, 2),
(8, 6, 1, 2),
(9, 5, 1, 2),
(9, 6, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `keep`
--
ALTER TABLE `keep`
  ADD KEY `cartID` (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`productID`,`adminID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_of_bill`
--
ALTER TABLE `products_of_bill`
  ADD PRIMARY KEY (`Bill_ID`,`Product_ID`,`customerID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `keep`
--
ALTER TABLE `keep`
  ADD CONSTRAINT `keep_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keep_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`id`);

--
-- Constraints for table `products_of_bill`
--
ALTER TABLE `products_of_bill`
  ADD CONSTRAINT `products_of_bill_ibfk_1` FOREIGN KEY (`Bill_ID`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_4` FOREIGN KEY (`Bill_ID`) REFERENCES `bill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
