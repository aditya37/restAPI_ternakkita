-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2019 at 12:20 AM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.2.22-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ternakkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userData`
--

CREATE TABLE `tbl_userData` (
  `id_userData` int(16) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` text NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `id_login` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userLogin`
--

CREATE TABLE `tbl_userLogin` (
  `id_login` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `userLevel` enum('Customer','Vendor') NOT NULL,
  `dateRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userLogin`
--

INSERT INTO `tbl_userLogin` (`id_login`, `username`, `password`, `userLevel`, `dateRegister`) VALUES
('1', '33', '33', 'Vendor', '2019-09-11'),
('111', '333', '333', 'Vendor', '2019-02-02'),
('1141', '34433', '333', 'Vendor', '2019-02-02'),
('2234343', '4', '4', 'Vendor', '2019-09-11'),
('GIusbSodEJXxACby', '44', '4', 'Customer', '2019-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userRegion`
--

CREATE TABLE `tbl_userRegion` (
  `id_userRegion` int(11) NOT NULL,
  `administrative_area_level_1` varchar(32) NOT NULL,
  `administrative_area_level_2` varchar(32) NOT NULL,
  `administrative_area_level_3` varchar(32) NOT NULL,
  `administrative_area_level_4` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `postalCode` text NOT NULL,
  `id_login` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_userData`
--
ALTER TABLE `tbl_userData`
  ADD KEY `id_customer` (`id_login`);

--
-- Indexes for table `tbl_userLogin`
--
ALTER TABLE `tbl_userLogin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_userRegion`
--
ALTER TABLE `tbl_userRegion`
  ADD PRIMARY KEY (`id_userRegion`),
  ADD KEY `id_login` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_userRegion`
--
ALTER TABLE `tbl_userRegion`
  MODIFY `id_userRegion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_userData`
--
ALTER TABLE `tbl_userData`
  ADD CONSTRAINT `tbl_userData_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tbl_userLogin` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_userRegion`
--
ALTER TABLE `tbl_userRegion`
  ADD CONSTRAINT `tbl_userRegion_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tbl_userLogin` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
