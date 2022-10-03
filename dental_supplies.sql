-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 10:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_supplies`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(4) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `startLetter` varchar(5) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `startLetter`, `active`) VALUES
(1, 'กลุ่ม 1', 'A', 1),
(2, 'กลุ่ม 2', 'B', 1),
(3, 'กลุ่ม 3', 'C', 0),
(4, 'กลุ่ม 4', 'D', 1),
(5, 'กลุ่ม 5', 'F', 1),
(6, 'กลุ่ม 6', 'G', 1),
(7, 'กลุ่ม 7', 'H', 1),
(8, 'กลุ่ม 8', 'I', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `productBarcode` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `typeId` int(5) NOT NULL,
  `itemBrand` varchar(255) NOT NULL,
  `itemDetail` varchar(255) NOT NULL,
  `sellerCompany` varchar(255) NOT NULL,
  `unitCount` varchar(100) NOT NULL,
  `price` float(8,2) NOT NULL,
  `lowerLimit` int(7) NOT NULL,
  `upperLimit` int(7) NOT NULL,
  `storageLocation` varchar(255) NOT NULL,
  `amount` int(7) NOT NULL,
  `expireDate` date NOT NULL,
  `expireNotice` varchar(50) NOT NULL,
  `itemActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `productBarcode`, `itemName`, `typeId`, `itemBrand`, `itemDetail`, `sellerCompany`, `unitCount`, `price`, `lowerLimit`, `upperLimit`, `storageLocation`, `amount`, `expireDate`, `expireNotice`, `itemActive`) VALUES
(1, '000001', 'ไอเท็ม 1', 1, 'Brand 1', 'สำหรับทดสอบ', 'บริษัท ฮาไม่จำกัด', 'อัน', 25.50, 10, 500, 'ห้องเก็บของ ชั้น 1', 27, '2024-08-01', '1-y', 1),
(2, '000002', 'ไอเท็ม 2', 4, 'Brand 2', 'อยู่ประเภท 4', '4mantech', 'กล่อง', 500.00, 5, 300, 'ห้องเก็บของ ชั้น 4', 13, '2023-04-04', '1-y', 0),
(3, '0001', 'ทดสอบเพิ่ม 1', 1, 'ฮาโหล', 'ทดสอบทรายละเอียด', 'บริษัท', 'ชิ้น', 500.00, 1, 99, 'ชั้น 5', 18, '2023-12-18', '1-y', 1),
(4, '00002', 'ทดสอบ 2', 1, 'ยี่ห้อ 1', 'ทดสอบเพิ่ม 2', 'บริษัท', 'กล่อง', 100.00, 1, 99, 'ในตู้', 19, '2022-09-14', '12-m', 1),
(8, '033300', 'ทดสอบ 3', 3, '2', '1', '3', 'ชิ้น', 500.00, 1, 99, 'ห้อง', 0, '2023-09-09', '1-m', 1),
(9, '5556998', 'ทดสอบชื่อยาวววววววววววววววววววววววววววววววววววววววว', 2, 'Brand 1', 'อิอิ', 'บริษัท ฮาไม่จำกัด', 'ชิ้น', 500.00, 1, 300, 'ห้องเก็บของ ชั้น 4', 7, '2022-10-01', '1-y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `orderDate` date NOT NULL,
  `userId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderDate`, `userId`) VALUES
(0000000001, '2022-09-01', 2),
(0000000002, '2022-09-01', 2),
(0000000003, '2022-09-15', 2),
(0000000004, '2022-09-29', 2),
(0000000005, '2022-09-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL,
  `orderId` int(10) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderId`, `itemId`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 3, 1),
(3, 2, 4, 3),
(4, 2, 8, 3),
(5, 3, 8, 10),
(6, 4, 9, 5),
(7, 4, 4, 2),
(8, 5, 1, 1),
(9, 5, 3, 1),
(10, 5, 4, 1),
(11, 5, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restock`
--

CREATE TABLE `restock` (
  `id` int(10) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `userId` int(4) NOT NULL,
  `restockDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restock`
--

INSERT INTO `restock` (`id`, `itemId`, `quantity`, `userId`, `restockDate`) VALUES
(1, 1, 3, 2, '2022-09-27'),
(2, 1, 7, 2, '2022-09-27'),
(3, 3, 2, 2, '2022-09-27'),
(4, 4, 12, 2, '2022-09-27'),
(5, 1, 10, 2, '2022-09-27'),
(6, 3, 5, 2, '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(5) NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `groupId` int(4) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `typeName`, `groupId`, `active`) VALUES
(1, 'ประเภท 1', 1, 0),
(2, 'ประเภท 2', 1, 1),
(3, 'ประเภท 3', 2, 0),
(4, 'ประเภท 4', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` int(1) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `role`, `active`) VALUES
(1, 'administrator', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'administrator', 'Tanapong', 'admin@gmail.com', 0, 1),
(2, 'admin', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'admin', 'Role1', 'userrole1@gmail.com', 1, 1),
(3, 'user', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'User', 'Role2', 'userrole2@gmail.com', 2, 1),
(4, 'disabled', '1234', 'user2', 'disabled', 'disabled@gmail.com', 2, 0),
(7, 'testedit', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'Tanapong1', 'Keawpho1', 'jadae22251@gmail.com', 1, 1),
(8, 'test1', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'Tanapong', 'Keawpho', 'jadae2225@gmail.com', 0, 1),
(9, 'test12', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'Tanapong', 'Keawpho', 'jadae2225@gmail.com', 0, 1),
(10, 'test3', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'Tanapong', 'Keawpho', 'jadae2225@gmail.com', 0, 1),
(11, 'test99', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'T', 'E', 'test@gmail.com', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groupName` (`groupName`),
  ADD UNIQUE KEY `startLetter` (`startLetter`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeName` (`typeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restock`
--
ALTER TABLE `restock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
