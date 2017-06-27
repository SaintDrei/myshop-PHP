-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 02:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(5, 'Category 5');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `regionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `name`, `regionID`) VALUES
(1, 'Antipolo City', 1),
(2, 'Caloocan City', 1),
(3, 'Las Piñas City', 1),
(4, 'Makati City', 1),
(5, 'Malabon City', 1),
(6, 'Mandaluyong City', 1),
(7, 'Manila', 1),
(8, 'Marikina City', 1),
(9, 'Muntinlupa City', 1),
(10, 'Navotas City', 1),
(11, 'Paranaque City', 1),
(12, 'Pasay City', 1),
(13, 'Pasig City', 1),
(14, 'Pateros City', 1),
(15, 'Quezon City', 1),
(16, 'Rizal', 1),
(17, 'San Juan City', 1),
(18, 'Taguig', 1),
(19, 'Valenzuela City', 1),
(20, 'Abra', 2),
(21, 'Apayao', 2),
(22, 'Baguio', 2),
(23, 'Benguet', 2),
(24, 'Ifugao', 2),
(25, 'Kalinga', 2),
(26, 'Mountain Province', 2),
(27, 'Ilocos Norte', 3),
(28, 'Ilocos Sur', 3),
(29, 'La Union', 3),
(30, 'Pangasinan', 3),
(31, 'Batanes', 4),
(32, 'Cagayan', 4),
(33, 'Isabela', 4),
(34, 'Nueva Vizcaya', 4),
(35, 'Quirino', 4),
(36, 'Aurora', 5),
(37, 'Bataan', 5),
(38, 'Bulacan', 5),
(39, 'Nueva Ecija', 5),
(40, 'Pampanga', 5),
(41, 'Tarlac', 5),
(42, 'Zambales', 5),
(43, 'Batangas', 6),
(44, 'Cavite', 6),
(45, 'Laguna', 6),
(46, 'Quezon', 6),
(47, 'Rizal', 6),
(48, 'Tagaytay', 6),
(49, 'Marinduque', 7),
(50, 'Occidental Mindoro', 7),
(51, 'Oriental Mindoro', 7),
(52, 'Palawan', 7),
(53, 'Albay', 8),
(54, 'Camarines Norte', 8),
(55, 'Camaerines Sur', 8),
(56, 'Catanduanes', 8),
(57, 'Masbate', 8),
(58, 'Sorsogon', 8),
(59, 'Aklan', 9),
(60, 'Antique', 9),
(61, 'Boracay', 9),
(62, 'Capiz', 9),
(63, 'Guimaras', 9),
(64, 'Iloilo', 9),
(65, 'Negros Occidental', 9),
(66, 'Bohol', 10),
(67, 'Cebu', 10),
(68, 'Negros Oriental', 10),
(69, 'Siquijor', 10),
(70, 'Biliran', 11),
(71, 'Eastern Samar', 11),
(72, 'Leyte', 11),
(73, 'Northern Samar', 11),
(74, 'Samar', 11),
(75, 'Southern Leyte', 11),
(76, 'Zamboanga Del Norte', 12),
(77, 'Zamboanga Del Sur', 12),
(78, 'Zamboanga Sibugay', 12),
(79, 'Bukidnon', 13),
(80, 'Cagayan De Oro', 13),
(81, 'Camiguin', 13),
(82, 'Iligan City', 13),
(83, 'Lanao Del Norte', 13),
(84, 'Misamis Occidental', 13),
(85, 'Misamis Oriental', 13),
(86, 'Compostela Valley', 14),
(87, 'Davao Del Norte', 14),
(88, 'Davao Del Sur', 14),
(89, 'Davao Oriental', 14),
(90, 'Northen Cotabato', 15),
(91, 'Sarangani', 15),
(92, 'South Cotabato', 15),
(93, 'Sultan Kudarat', 15),
(94, 'Agusan del Norte', 16),
(95, 'Agusan del Sur', 16),
(96, 'Surigao del Norte', 16),
(97, 'Surigao del Sur', 16),
(98, 'Basilan', 17),
(99, 'Lanao del Sur', 17),
(100, 'Maguindanao', 17),
(101, 'Sulu', 17),
(102, 'Tawi-tawi', 17),
(103, 'name', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(300) NOT NULL,
  `available` int(11) NOT NULL,
  `critical` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `addedOn` datetime NOT NULL,
  `lastModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `regionID` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`regionID`, `name`) VALUES
(1, 'NCR'),
(2, 'CAR'),
(3, 'Region 01'),
(4, 'Region 02'),
(5, 'Region 03'),
(6, 'Region 04A'),
(7, 'Region 04B'),
(8, 'Region 05'),
(9, 'Region 06'),
(10, 'Region 07'),
(11, 'Region 08'),
(12, 'Region 09'),
(13, 'Region 10'),
(14, 'Region 11'),
(15, 'Region 12'),
(16, 'Region 13'),
(17, 'ARMM'),
(18, 'name');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeID` int(11) NOT NULL,
  `userType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `userType`) VALUES
(1, 'Administrator'),
(2, 'Sales Personnel'),
(3, 'Inventory Clerk'),
(4, 'Delivery Personnel'),
(5, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `street` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `cityID` int(11) NOT NULL,
  `landline` varchar(15) NOT NULL,
  `mobile` char(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `addedOn` datetime NOT NULL,
  `lastModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`regionID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `regionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
