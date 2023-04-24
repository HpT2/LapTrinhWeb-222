-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:17 AM
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
  `totalcost` int(11) NOT NULL,
  `Pay_method` char(10) DEFAULT NULL,
  `CHECKED` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `customerID`, `date`, `totalcost`, `Pay_method`, `CHECKED`) VALUES
(1, 14, '2023-04-24 06:48:44', 38, 'zalopay', b'0'),
(2, 14, '2023-04-24 06:49:40', 379, 'cash', b'0');

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
(14, 14),
(15, 15),
(16, 16);

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
  `active` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `phone`, `address`, `birthday`, `active`, `image`, `status`) VALUES
(1, 'vinhtoan', '$2y$10$BvzPjKizP1YIZcQ1ppm25.WsXBPdBxhn7i1cyNgzuQ31vOEf23ubW', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'tung1', '$2y$10$9K2Du/nGAMImy0c./UeL8eyQMOBbwYqtTudCVT.IShe2GrTWKGh76', 'Tùng', '0971479222', '372', '2002-02-17', 1, '/image/customer/tung1.png', NULL),
(15, 'tung2', '$2y$10$MrwKSy7y8/NhY/l703PUmOX6NzM0FXoIccUgtIIzgFf85uJ52aPii', 'Tùng', '0971479331', '372', '2005-01-19', NULL, NULL, NULL),
(16, 'tung223', '$2y$10$3wv/f6VyuQJbk7v26vvh.eRNeagzhZc28iKTno1rQT.X45neieRfy', 'Tùng', '0971479331', '372', '1960-12-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keep`
--

CREATE TABLE `keep` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `chip` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `outstanding` varchar(255) NOT NULL,
  `guarantee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `image`, `image1`, `image2`, `image3`, `amount`, `rating`, `chip`, `ram`, `screen`, `battery`, `outstanding`, `guarantee`) VALUES
(1, 'Mac 2021', '34.44', 'Macbook', 'https://cdn.dienthoaigiakho.vn/photos/1655452036715-macbookair-m2-sb-2.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036729-macbookair-m2-sb-3.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036703-macbookair-m2-sb-1.jpg', 'https://cdn.dienthoaigiakho.vn/photos/1655452036693-macbookair-m2-sb.jpg', 90, 4, 'i7 10th', '8G', '15.6\" FHD (1920 x 1080) Mac ComfyView LCD, Anti-Glare', '10000mAh', 'Tận hưởng trải nghiệm chơi game mượt mà, không bị nhòe. Màn hình viền mỏng cũng đã được tăng tỷ lệ so với thân máy lên 80%.', 'Bảo hành: 12 tháng LaptopAZ');

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
(1, 1, 1, 14),
(2, 1, 10, 14);

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
  ADD KEY `adminID` (`active`);

--
-- Indexes for table `keep`
--
ALTER TABLE `keep`
  ADD KEY `cartID` (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_of_bill`
--
ALTER TABLE `products_of_bill`
  ADD PRIMARY KEY (`Bill_ID`,`Product_ID`,`customerID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `Product_ID` (`Product_ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `keep`
--
ALTER TABLE `keep`
  ADD CONSTRAINT `keep_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keep_ibfk_3` FOREIGN KEY (`productID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `keep_ibfk_4` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_of_bill`
--
ALTER TABLE `products_of_bill`
  ADD CONSTRAINT `products_of_bill_ibfk_1` FOREIGN KEY (`Bill_ID`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_4` FOREIGN KEY (`Bill_ID`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_5` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_of_bill_ibfk_6` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
