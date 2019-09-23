-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2019 at 02:07 PM
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
-- Table structure for table `tbl_detailProduct`
--

CREATE TABLE `tbl_detailProduct` (
  `id_detailP` varchar(16) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `type` enum('Sapi','Kuda','Kambing','Kerbau') NOT NULL,
  `weight` double NOT NULL,
  `price` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `idProduct` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailProduct`
--

INSERT INTO `tbl_detailProduct` (`id_detailP`, `gender`, `type`, `weight`, `price`, `description`, `note`, `age`, `image`, `idProduct`) VALUES
('1302', 'Male', 'Sapi', 22, '1000,000', 'Sapi Lymousin No KW', '', 2, '-', '7568');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `idProduct` varchar(16) NOT NULL,
  `productTittle` varchar(255) NOT NULL,
  `productCreated` date NOT NULL,
  `productUpdate` date NOT NULL,
  `productStatus` enum('Sold Out','Available') NOT NULL,
  `idVendor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`idProduct`, `productTittle`, `productCreated`, `productUpdate`, `productStatus`, `idVendor`) VALUES
('7568', 'Sapi Lymousin', '2019-09-12', '2019-09-19', 'Available', '1999');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userData`
--

CREATE TABLE `tbl_userData` (
  `id_userData` varchar(16) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` text NOT NULL,
  `locationImg` varchar(255) NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `id_login` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userData`
--

INSERT INTO `tbl_userData` (`id_userData`, `firstName`, `lastName`, `birth`, `gender`, `phone`, `locationImg`, `profilePhoto`, `id_login`) VALUES
('1111', 'Vendor', 'Test', '1998-05-02', 'Male', '081336601129', '-', '-', '1999');

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
('1998', 'vendor', 'vendor', 'Vendor', '2019-09-02'),
('1999', 'testVendor', 'vendorTest', 'Vendor', '2019-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userRegion`
--

CREATE TABLE `tbl_userRegion` (
  `id_userRegion` varchar(16) NOT NULL,
  `administrative_area_level_1` varchar(32) NOT NULL,
  `administrative_area_level_2` varchar(32) NOT NULL,
  `administrative_area_level_3` varchar(32) NOT NULL,
  `administrative_area_level_4` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `postalCode` text NOT NULL,
  `id_login` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userRegion`
--

INSERT INTO `tbl_userRegion` (`id_userRegion`, `administrative_area_level_1`, `administrative_area_level_2`, `administrative_area_level_3`, `administrative_area_level_4`, `address`, `postalCode`, `id_login`) VALUES
('3522', 'Jawa Timur', 'Bojonegoro', 'Dander', 'Mojoranu', 'Jln Haryo Matahun No 113 Rt 02', '62171', '1999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detailProduct`
--
ALTER TABLE `tbl_detailProduct`
  ADD PRIMARY KEY (`id_detailP`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idVendor` (`idVendor`);

--
-- Indexes for table `tbl_userData`
--
ALTER TABLE `tbl_userData`
  ADD PRIMARY KEY (`id_userData`),
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
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detailProduct`
--
ALTER TABLE `tbl_detailProduct`
  ADD CONSTRAINT `tbl_detailProduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbl_product` (`idProduct`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`idVendor`) REFERENCES `tbl_userLogin` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

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
