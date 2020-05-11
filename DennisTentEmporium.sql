-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2019 at 11:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TentEmporium`
--
CREATE DATABASE IF NOT EXISTS `TentEmporium` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TentEmporium`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `fname`, `lname`, `email`, `phone`, `message`) VALUES
(1, 'Test', 'Test', 'test@test.com', '111-222-1234', 'This is a test'),
(2, 'Hello', 'World', 'hello@world.com', '111-222-3334', 'Hello world!'),
(3, '2', 'test', '2@test.com', '123-456-7890', '2nd test.'),
(4, 'h', 'h', 'h@h.com', 'h', 'h'),
(5, 'Include', 'Test', 'include@test.com', '111-111-1111', 'Testing include functionality.'),
(6, 'Final', 'Test', 'final@test.com', '444-444-4444', 'This is a final test');

-- --------------------------------------------------------

--
-- Table structure for table `customerAccounts`
--

CREATE TABLE `customerAccounts` (
  `customerID` int(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerAccounts`
--

INSERT INTO `customerAccounts` (`customerID`, `firstName`, `lastName`, `email`, `registrationDate`, `phone`, `username`, `hashed_password`) VALUES
(2, 'Second', 'Customer', 'second@customer.com', '2019-11-21 21:48:16', '222-222-2222', 'secondCustomer', '$2y$10$VuvK9kOLU2LCQY1/XE8xEeXdhvqVm4pdcr/noFxmUtBD0IDCTY3ha'),
(3, 'Third', 'Customer', 'third@customer.com', '2019-11-21 21:50:01', '333-333-3333', 'thirdCustomer', '$2y$10$KZeAVgqsOrdd9LkvM9rDz..PwI0rHHhxTKg82mClx6/wYATRjHYkm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `customerAccounts`
--
ALTER TABLE `customerAccounts`
  ADD PRIMARY KEY (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerAccounts`
--
ALTER TABLE `customerAccounts`
  MODIFY `customerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
