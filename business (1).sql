-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2026 at 05:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryCode` varchar(2) NOT NULL,
  `CountryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryCode`, `CountryName`) VALUES
('AT', 'ออสเตรีย'),
('AU', 'Australia'),
('BD', 'บังคลาเทศ'),
('CN', 'China'),
('FI', 'Finland'),
('GL', 'Greenland'),
('ID', 'อินเดีย'),
('IT', 'อิตาลี'),
('JP', 'Japan'),
('MY', 'มาเลเชีย'),
('PH', 'ฟิลิปปินส์'),
('PK', 'ปากีสถาน'),
('RS', 'รัสเซีย'),
('SG', 'Singapore'),
('TH', 'ไทย');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(6) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(40) NOT NULL,
  `CountryCode` varchar(2) NOT NULL,
  `OutstandingDebt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `Birthdate`, `Email`, `CountryCode`, `OutstandingDebt`) VALUES
('Cus001', 'Nittaya Pinthong', '1976-12-23', 'n.pinthong@hotmail.com', 'TH', 8000),
('Cus002', 'Thanit Boonchu', '1978-11-03', 't.boonchu@gmail.com', 'TH', 15000),
('Cus003', 'Imran Haider', '1989-02-04', 'i.haider@hotmail.com', 'PK', 0),
('Cus004', 'Ariful Russell', '1966-11-20', 'a.russell@gmail.com', 'BD', 20000),
('Cus005', 'Emanuel Reiterer', '1977-12-03', 'e.reiterer@gmail.com', 'AT', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryCode`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `CountryCode` (`CountryCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`CountryCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
