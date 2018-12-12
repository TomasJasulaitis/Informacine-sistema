-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 02:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informacines_sistemos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokenitems`
--

CREATE TABLE `brokenitems` (
  `id` int(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `faults` text NOT NULL,
  `state` varchar(20) NOT NULL,
  `emploee` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brokenitems`
--

INSERT INTO `brokenitems` (`id`, `brand`, `model`, `faults`, `state`, `emploee`, `price`) VALUES
(1, 'Nokia', 'c55', 'Neisijungia.', 'Registruojama', '#puteikis1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `location` varchar(40) NOT NULL,
  `work_hours_start` time NOT NULL,
  `work_hours_finish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone_number`, `location`, `work_hours_start`, `work_hours_finish`) VALUES
(1, 'Tomas', 'Jasulaitis', 860306317, 'Kaunas', '09:00:00', '18:00:00'),
(2, 'Petras', 'Petras', 4458757, 'Vilnius', '09:00:00', '17:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` varchar(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `workingSince` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `password`, `firstName`, `lastName`, `workingSince`) VALUES
('#puteikis1', 'puteikis@mail.com', '$2y$10$8lI4PARabKaXWEbeGPmPceeEn6QvlCkQw6TfaBjvqiiHw35rKxtEe', 'Naglis', 'Puteikis', '2018-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `type`, `price`) VALUES
(7, 'Huawei x80', 'Telefonas', '800.00'),
(8, 'Iphone 58', 'Telefonas', '888.00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(10) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `question`) VALUES
(1, 'Tomas', 'Jasulaitis', 'phexsprays@gmail.com', 860306317, 'Ka daryti'),
(2, 'ddd', 'ddd', 'ddd', 860306214, 'dddd'),
(3, 'asd', 'asd', 'asd', 0, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `emailVerified` tinyint(1) NOT NULL,
  `emailVerificationToken` varchar(50) NOT NULL,
  `passwordRecoveryToken` varchar(50) DEFAULT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `emailVerified`, `emailVerificationToken`, `passwordRecoveryToken`, `firstName`, `lastName`, `phoneNumber`, `isAdmin`) VALUES
(3, 'test@mail.com', '$2y$10$guXYOLDSsZ7NauqhTRi6Ter54A01n0gbH/ZS/dsownH1mFGhCldgW', 1, '000', NULL, 'Rolandas', 'Paksas', '+37066666667', 0),
(4, 'ddd@gmail.com', '$2y$10$HNBC7sTAxhlq7z4etvjyae9/EygLO8JLeW3PxLGhh3d26/7/7Ml.G', 1, '000', NULL, 'gggg', 'gggg', '5555', 0),
(6, 'admin@gmail.com', '$2y$10$LZeKvaJru4Y6DQgPwZtgOOcpHgtXNsWYwrWcd8h4TkWcIYZF3owg6', 1, '000', NULL, 'Tomas', 'Tomas', '4444444', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokenitems`
--
ALTER TABLE `brokenitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repairing` (`emploee`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokenitems`
--
ALTER TABLE `brokenitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brokenitems`
--
ALTER TABLE `brokenitems`
  ADD CONSTRAINT `repairing` FOREIGN KEY (`emploee`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
