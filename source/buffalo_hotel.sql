-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 04:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buffalo_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` varchar(8) COLLATE latin1_bin NOT NULL,
  `first_name` varchar(100) COLLATE latin1_bin NOT NULL,
  `last_name` varchar(100) COLLATE latin1_bin NOT NULL,
  `gender` varchar(6) COLLATE latin1_bin NOT NULL,
  `tel_no` int(10) NOT NULL,
  `email` varchar(30) COLLATE latin1_bin NOT NULL,
  `password` int(8) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `first_name`, `last_name`, `gender`, `tel_no`, `email`, `password`, `reg_date`) VALUES
('34116141', 'peter', 'karis', 'male', 748508564, 'slimkaris7@gmail.com', 0, '2020-03-02'),
('34742830', 'betty', 'mukami', 'Female', 704305527, 'betty@gmail.com', 0, '2020-03-02'),
('35232618', 'KELVIN', 'MWENDA', 'MALE', 797277971, 'mweshkevo2@gmail.com', 6, '2020-02-29'),
('35665154', 'mary', 'ngila', 'Female', 796668138, 'maria@gmail.com', 0, '2020-03-02'),
('43246689', 'LINET', 'GAKII', 'Female', 711702751, 'LIN@GMAIL.COM', 25, '2020-03-08'),
('87654321', 'lilian', 'kanana', 'Female', 702652526, 'nash@gmail.com', 25, '2020-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` varchar(3) COLLATE latin1_bin NOT NULL,
  `rtype` varchar(100) COLLATE latin1_bin NOT NULL,
  `beds` int(2) NOT NULL,
  `ac` varchar(100) COLLATE latin1_bin NOT NULL,
  `cost` varchar(5) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `rtype`, `beds`, `ac`, `cost`) VALUES
('', '', 0, '', ''),
('D1', 'DOUBLE', 2, 'available', '2000'),
('K1', 'KING SIZE', 1, 'available', '3,000'),
('K2', 'KING SIZE', 1, 'available', '3,000'),
('K3', 'KING SIZE', 1, 'available', '3,000'),
('K4', 'KING SIZE', 1, 'available', '3,000'),
('M1', 'master suite', 2, 'available', '3,000'),
('M2', 'MASTER SUITE', 2, 'available', '3,000'),
('M3', 'MASTER SUITE', 3, 'available', '3500'),
('M4', 'MASTER SUITE', 3, 'available', '3500'),
('S1', 'SINGLE', 1, 'unavailable', '1000'),
('S2', 'SINGLE', 1, 'unavailable', '1000'),
('S3', 'SINGLE', 2, 'available', '1200'),
('S4', 'SINGLE', 1, 'available', '1200'),
('S5', 'single', 1, 'available', '1500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
