-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 04:54 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 5.6.34-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'ddd', 'ddd', 'ddd', 860306214, 'dddd');

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
