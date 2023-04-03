-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2023 at 08:37 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `BOOKING_ID` int NOT NULL AUTO_INCREMENT,
  `JOURNEYDETAILSID` int NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `MOBILE` varchar(12) NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`BOOKING_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `JOURNEYDETAILSID`, `NAME`, `MOBILE`, `EMAIL`) VALUES
(2, 1, 'Shraddha', '9876543212', 'keni08@gmail.com'),
(4, 1, 'Saiesh', '9876543212', 'keni08@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `journey_details`
--

DROP TABLE IF EXISTS `journey_details`;
CREATE TABLE IF NOT EXISTS `journey_details` (
  `JOURNEYDETAILSID` int NOT NULL AUTO_INCREMENT,
  `FLIGHTORIGINID` varchar(4) NOT NULL,
  `FLIGHTDESTINATIONID` varchar(4) NOT NULL,
  `AIRLINEID` int NOT NULL,
  `PRICE` int DEFAULT NULL,
  `DEPARTURE` date DEFAULT NULL,
  `ARRIVAL` date DEFAULT NULL,
  `DURATION` varchar(20) DEFAULT NULL,
  `AVAILABLESEAT` int DEFAULT NULL,
  `FLIGHTNUMBER` int DEFAULT NULL,
  PRIMARY KEY (`JOURNEYDETAILSID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `journey_details`
--

INSERT INTO `journey_details` (`JOURNEYDETAILSID`, `FLIGHTORIGINID`, `FLIGHTDESTINATIONID`, `AIRLINEID`, `PRICE`, `DEPARTURE`, `ARRIVAL`, `DURATION`, `AVAILABLESEAT`, `FLIGHTNUMBER`) VALUES
(1, 'PNQ', 'DEL', 1, 6733, '2013-01-01', '2013-01-01', '2h 33m', 116, 186),
(2, 'PNQ', 'DEL', 5, 677, '2023-04-01', '2023-04-05', '5', 4, 45),
(3, 'PNQ', 'DEL', 5, 677, '2023-04-01', '2023-04-05', '5', 4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(6, 'shraddha', 'keni', 'keni1@gmail.com', '$2y$10$RS.FHaSpw1hKgZJlf2Cb0egzJ/tREuSzXS/So.RU0OVIsO1KJQux2'),
(5, 'shraddha', 'keni', 'keni@gmail.com', '$2y$10$Lh4gBKa386SzVSLWRraBR.8FunjenuFPEqQwXy.ZZYWc1aI609bTG'),
(7, 'saiesh', 'keni', 'keni2@gmail.com', '$2y$10$75VhQJ.Cnmx4W9dZw9/G/.K.Xkt/nt0WjODj6ZdOTffctYkbup9pO'),
(8, 'shraddha', 'keni', 'keni@gmail.com', '$2y$10$ou02wgi0spbNhksK0irfj.LZJdMFjWN6TpR561LJDvzaPqZKIbsxu'),
(9, 'shraddha1', 'keni', 'keni3@gmail.com', '$2y$10$vgKfqziVEy3ThTdrtiXfBeNmASWEdIewqMEwRnmBgkTtbJlLadNR.'),
(10, 'shraddha1', 'keni', 'keni44@gmail.com', '$2y$10$eUe9QfSlQMBJbqBy7xBFpuk/I2MMFcucxor2VCUWX3lvRXs1GEjOy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
