-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 08:33 AM
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
(1, 2, '2023-04-16 08:27:16', 0),
(2, 2, '2023-04-16 08:28:50', 100),
(3, 2, '2023-04-16 08:30:04', 700);

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
(2, 2);

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
(2, 'hptisme', '123', 'Tùng', '0971479331', '372/23/7 CMT8 P10 Q3', '2002-02-17', NULL);

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
(2, 4),
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

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_release` date NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `amount`, `price`, `date_release`, `image`) VALUES
(1, 'banana', 10, 100, '2023-04-26', '/image/products/banana.png'),
(2, 'computer', 10, 100, '2023-04-26', '/image/products/computer.png'),
(3, 'usb', 10, 100, '2023-04-26', '/image/products/USB.png'),
(4, 'TV', 10, 100, '2023-04-26', '/image/products/tv.png'),
(5, 'phone', 10, 100, '2023-04-26', '/image/products/phone.png'),
(6, 'Keyboard', 10, 500, '2023-04-26', '/image/products/keyboard.png');

-- --------------------------------------------------------

--
-- Table structure for table `products_of_bill`
--

CREATE TABLE `products_of_bill` (
  `Bill_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_of_bill`
--

INSERT INTO `products_of_bill` (`Bill_ID`, `Product_ID`, `amount`) VALUES
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(2, 4, 1),
(2, 5, 2),
(2, 6, 1),
(3, 4, 1),
(3, 5, 1),
(3, 6, 1);

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
  ADD PRIMARY KEY (`Bill_ID`,`Product_ID`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `products_of_bill_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
