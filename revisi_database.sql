-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 03:10 AM
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
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `idCustomer` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `dateRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`idCustomer`, `username`, `password`, `dateRegister`) VALUES
('seRViaUOkWTyMfRB', 'customer', 'customer', '2019-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerData`
--

CREATE TABLE `tbl_customerData` (
  `id_userData` varchar(16) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` text NOT NULL,
  `locationImg` varchar(255) NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `idCustomer` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customerData`
--

INSERT INTO `tbl_customerData` (`id_userData`, `firstName`, `lastName`, `birth`, `gender`, `phone`, `locationImg`, `profilePhoto`, `idCustomer`) VALUES
('CzhnprytgKXVLZVw', 'yos', 'yosh', '2019-08-02', 'Male', '08111111', '/PHONE/', 'customer/photo/WhatsApp Image 2019-10-02 at 13.20.56(1).jpeg', 'seRViaUOkWTyMfRB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerRegion`
--

CREATE TABLE `tbl_customerRegion` (
  `id_userRegion` varchar(16) NOT NULL,
  `administrative_area_level_1` varchar(32) NOT NULL,
  `administrative_area_level_2` varchar(32) NOT NULL,
  `administrative_area_level_3` varchar(32) NOT NULL,
  `administrative_area_level_4` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalCode` text NOT NULL,
  `idCustomer` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customerRegion`
--

INSERT INTO `tbl_customerRegion` (`id_userRegion`, `administrative_area_level_1`, `administrative_area_level_2`, `administrative_area_level_3`, `administrative_area_level_4`, `address`, `postalCode`, `idCustomer`) VALUES
('mFYINTxZyLzNrXWd', 'Jawa Timur', 'Bojonegoro', 'Dander', 'Mojoranu', 'Jl Haryo Metahun Rt 05 Rw 2', '62171', 'seRViaUOkWTyMfRB');

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
  `description` varchar(9000) NOT NULL,
  `note` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `idProduct` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `idVendor` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `dateRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`idVendor`, `username`, `password`, `dateRegister`) VALUES
('11', 'aaa', 'bb', '2019-09-11'),
('22', 'agus', '33', '2019-02-22'),
('aiaVqZlCctunKdwu', 'Jawa Timur', 'Bojonegoro', '2019-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendorData`
--

CREATE TABLE `tbl_vendorData` (
  `id_userData` varchar(16) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` text NOT NULL,
  `locationImg` varchar(255) NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `idVendor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendorData`
--

INSERT INTO `tbl_vendorData` (`id_userData`, `firstName`, `lastName`, `birth`, `gender`, `phone`, `locationImg`, `profilePhoto`, `idVendor`) VALUES
('1122', '33', 'Aris', '1998-05-02', 'Male', 'sasas', 'aasa', 'ass', '11'),
('jxRXOXPvFsVVGLpM', 'yos', 'yosh', '2019-08-02', 'Male', '08111111', 'lokasi', 'vendor/photo/WhatsApp Image 2019-10-02 at 19.50.35(1).jpeg', 'aiaVqZlCctunKdwu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendorRegion`
--

CREATE TABLE `tbl_vendorRegion` (
  `id_userRegion` varchar(16) NOT NULL,
  `administrative_area_level_1` varchar(32) NOT NULL,
  `administrative_area_level_2` varchar(32) NOT NULL,
  `administrative_area_level_3` varchar(32) NOT NULL,
  `administrative_area_level_4` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalCode` text NOT NULL,
  `idVendor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendorRegion`
--

INSERT INTO `tbl_vendorRegion` (`id_userRegion`, `administrative_area_level_1`, `administrative_area_level_2`, `administrative_area_level_3`, `administrative_area_level_4`, `address`, `postalCode`, `idVendor`) VALUES
('jJfAdaNLFahzFbmx', 'Jawa Timur', 'Bojonegoro', 'Dander', 'Mojoranu', 'Jl Haryo Metahun Rt 05 Rw 2', '62171', 'aiaVqZlCctunKdwu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `tbl_customerData`
--
ALTER TABLE `tbl_customerData`
  ADD PRIMARY KEY (`id_userData`),
  ADD KEY `id_customer` (`idCustomer`);

--
-- Indexes for table `tbl_customerRegion`
--
ALTER TABLE `tbl_customerRegion`
  ADD PRIMARY KEY (`id_userRegion`),
  ADD KEY `id_login` (`idCustomer`);

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
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`idVendor`);

--
-- Indexes for table `tbl_vendorData`
--
ALTER TABLE `tbl_vendorData`
  ADD PRIMARY KEY (`id_userData`),
  ADD KEY `id_customer` (`idVendor`);

--
-- Indexes for table `tbl_vendorRegion`
--
ALTER TABLE `tbl_vendorRegion`
  ADD PRIMARY KEY (`id_userRegion`),
  ADD KEY `id_login` (`idVendor`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customerData`
--
ALTER TABLE `tbl_customerData`
  ADD CONSTRAINT `tbl_customerData_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `tbl_customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_customerRegion`
--
ALTER TABLE `tbl_customerRegion`
  ADD CONSTRAINT `tbl_customerRegion_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `tbl_customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detailProduct`
--
ALTER TABLE `tbl_detailProduct`
  ADD CONSTRAINT `tbl_detailProduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbl_product` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`idVendor`) REFERENCES `tbl_vendor` (`idVendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vendorData`
--
ALTER TABLE `tbl_vendorData`
  ADD CONSTRAINT `tbl_vendorData_ibfk_1` FOREIGN KEY (`idVendor`) REFERENCES `tbl_vendor` (`idVendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vendorRegion`
--
ALTER TABLE `tbl_vendorRegion`
  ADD CONSTRAINT `tbl_vendorRegion_ibfk_1` FOREIGN KEY (`idVendor`) REFERENCES `tbl_vendor` (`idVendor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
