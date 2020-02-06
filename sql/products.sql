-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 10:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE `dimensions` (
  `Product_ID` int(11) DEFAULT NULL,
  `Width` int(11) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`Product_ID`, `Width`, `Height`, `Length`) VALUES
(1, 24, 45, 15),
(2, 10, 4, 13),
(3, 15, 9, 20),
(4, 20, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `SKU` char(12) DEFAULT NULL,
  `Name` char(250) DEFAULT NULL,
  `Price` char(16) DEFAULT NULL,
  `Type` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `SKU`, `Name`, `Price`, `Type`) VALUES
(1, 'TR12055', 'Chair', '40.00', 'Dimensions'),
(2, 'TR123123', 'Yellow chair', '100.00', 'Dimensions'),
(3, 'TR123456', 'Red chair', '50.00', 'Dimensions'),
(4, 'TR543211', 'Modern style chair', '250.00', 'Dimensions'),
(5, 'GGWP0007', 'War and Peace', '20.00', 'Weight'),
(6, 'GGWP0008', 'Mysterious Island', '15.00', 'Weight'),
(7, 'GGWP0009', 'Pride and prejudice', '40.99', 'Weight'),
(8, 'GGWP0010', '20000 leagues under the sea', '50.00', 'Weight'),
(9, 'JVC200123', 'Acme DISK', '1.00', 'Size'),
(10, 'JVC123123', 'FUJIFILM CD DISK', '5.00', 'Size'),
(11, 'JVC9165478', 'VERBATIM CD-RW DISK', '1.89', 'Size'),
(12, 'JVC734673', 'Maxell DISK', '9.00', 'Size');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `Product_ID` int(11) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`Product_ID`, `Size`) VALUES
(9, 1000),
(10, 10000),
(11, 700),
(12, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `Product_ID` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`Product_ID`, `Weight`) VALUES
(5, 2),
(6, 1),
(7, 1),
(8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `weight`
--
ALTER TABLE `weight`
  ADD CONSTRAINT `weight_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
