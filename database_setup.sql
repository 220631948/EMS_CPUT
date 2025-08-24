-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2023 at 06:18 PM
-- Server version: 8.0.34
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_db`
--
CREATE DATABASE IF NOT EXISTS `ems_db`;
USE `ems_db`;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `studentEmail` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstName`, `lastName`, `studentEmail`, `phoneNumber`, `password`) VALUES
(1, 'Mogammad Zain', 'Gamildien', 'mzaingamildien10.2@gmail.com', '0745523542', 'password'),
(2, 'Mogammad ', 'Gamildien', 'zaingamildien10.2@gmail.com', '0745523543', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

DROP TABLE IF EXISTS `transport`;
CREATE TABLE `transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `description2` varchar(100) NOT NULL,
  `description3` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `title`, `description`, `description2`, `description3`) VALUES
(1, 'Transport to Groote Schuur', 'Transport for trips to and from Groote Schuur Hospital', ' Available for both day and night shifts.', 'Dates available: 01 January 2024 - 31 January 2024'),
(2, 'Transport to Tygerburg Hospital', 'Transport for trips to and from Tygerburg Hospital.', 'Available for both day and night shifts.', 'Dates available: 15 January 2024 - 30 March 2024'),
(3, 'Transport to Red Cross Hospital', 'Transport for trips to and from Red Cross Hospital.', 'Available for Day shift only (7:00 - 19:00).', 'Dates available: 15 January 2024 - 15 February 2024'),
(4, 'Transport to Groote Schuur (Night Shift)', 'Transport for trips to and from Groote Schuur Hospital. ', 'Available for Night shift only (19:00 - 7:00).', 'Dates available: 20 February 2024 - 30 June 2024');

-- --------------------------------------------------------

--
-- Table structure for table `approved`
--

DROP TABLE IF EXISTS `approved`;
CREATE TABLE `approved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `description2` varchar(100) NOT NULL,
  `description3` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
