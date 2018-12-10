-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2018 at 10:28 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` varchar(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `workingSince` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `password`, `firstName`, `lastName`, `workingSince`) VALUES
('#puteikis1', 'puteikis@mail.com', '$2y$10$8lI4PARabKaXWEbeGPmPceeEn6QvlCkQw6TfaBjvqiiHw35rKxtEe', 'Naglis', 'Puteikis', '2018-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `emailVerified` tinyint(1) NOT NULL,
  `emailVerificationToken` varchar(50) NOT NULL,
  `passwordRecoveryToken` varchar(50) DEFAULT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `emailVerified`, `emailVerificationToken`, `passwordRecoveryToken`, `firstName`, `lastName`, `phoneNumber`, `isAdmin`) VALUES
(2, 'admin@mail.com', '$2y$10$axNjL2QJz.7GCrnpqU.z4e5Rj3Eir9QWiq6Lz.R.xTrzB9bjYmtRu', 1, '000', NULL, 'Vardenis', 'Pavardenis', '+37066666666', 1),
(3, 'test@mail.com', '$2y$10$guXYOLDSsZ7NauqhTRi6Ter54A01n0gbH/ZS/dsownH1mFGhCldgW', 1, '000', NULL, 'Rolandas', 'Paksas', '+37066666667', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
