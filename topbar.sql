-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solartec`
--

-- --------------------------------------------------------

--
-- Table structure for table `topbar`
--

CREATE TABLE `topbar` (
  `address` varchar(50) NOT NULL,
  `office_time` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `youtube` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topbar`
--

INSERT INTO `topbar` (`address`, `office_time`, `contact_no`, `facebook`, `twitter`, `linkedin`, `instagram`, `email`, `youtube`) VALUES
('123, Mirpur-1, Dhaka', 'Mon-Fri: 9AM - 5PM', '01632459786', 'www.faceook.com/solartec', 'www.twitter.com/solartec', 'www.linkedlin.com/solartec', 'www.instagram.com/solartec', 'info.solartec.com', 'www.youtube.com/solartec');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
