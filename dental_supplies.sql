-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 10:17 AM
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
(1, 'admin', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'Admin', 'Tanapong', 'admin@gmail.com', 0, 1),
(2, 'user1', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'User', 'Role1', 'userrole1@gmail.com', 1, 1),
(3, 'user2', '7ec92e4e177d07491a95580d61cf5a7f36e0d50e5e7ef71d7cec71d9b3f28d21', 'User', 'Role2', 'userrole2@gmail.com', 2, 1);

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
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeName` (`typeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
