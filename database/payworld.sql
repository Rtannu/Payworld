-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2018 at 01:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `login_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`login_id`, `password`) VALUES
('raj', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `adm_menu_id` int(20) NOT NULL,
  `adm_menu_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`adm_menu_id`, `adm_menu_name`) VALUES
(1, 'User Details'),
(2, 'Update User Details'),
(3, 'Mobile Transaction'),
(4, 'Update Mobile Transaction'),
(6, 'Delete User'),
(7, 'Today Sales'),
(9, 'Home'),
(10, 'Search By Transaction id');

-- --------------------------------------------------------

--
-- Table structure for table `circle`
--

CREATE TABLE `circle` (
  `circle_id` int(20) NOT NULL,
  `circle_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle`
--

INSERT INTO `circle` (`circle_id`, `circle_name`) VALUES
(1, 'select'),
(2, 'delhi'),
(3, 'chennai'),
(4, 'assam'),
(5, 'assam'),
(6, 'harayana'),
(7, 'kerla'),
(8, 'kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`name`, `email_id`, `phone_no`, `pwd`, `amount`) VALUES
('roushanr', 'o', 23, '3', 0),
('roushan', 'reo', 90324, 'we', 0),
('-178', 'rr', 999, '34', -275),
('0', 'rraj', 30, '23', 44);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(20) NOT NULL,
  `menu_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(1, 'mobile'),
(2, 'Electricity'),
(3, 'Landline'),
(4, 'Broadband'),
(5, 'Gas'),
(6, 'Water');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_transaction`
--

CREATE TABLE `mobile_transaction` (
  `mobile_payment_transaction_id` varchar(100) NOT NULL,
  `recharged_mobile_no` varchar(20) NOT NULL,
  `recharged_operator` varchar(20) NOT NULL,
  `recharged_circle` varchar(20) NOT NULL,
  `recharged_amount` int(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_transaction`
--

INSERT INTO `mobile_transaction` (`mobile_payment_transaction_id`, `recharged_mobile_no`, `recharged_operator`, `recharged_circle`, `recharged_amount`, `payment_mode`, `time`, `date`) VALUES
('rr15274375117555151675b0ad8c74ca778.91038835', '34', 'Bsnl', 'chennai', 45, 'wallet', '9:41 am', '18/05/28'),
('rr15276451083619179115b0e03b421c5a3.48768125', '993', 'Bsnl', 'chennai', 20, 'wallet', '7:21 am', '18/05/30'),
('rr15276452198073792565b0e042357b2b0.10875752', '9934054413', 'Bsnl', 'assam', 20, 'wallet', '7:23 am', '18/05/30');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(20) NOT NULL,
  `operator_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `operator_name`) VALUES
(1, 'select'),
(2, 'aircel'),
(3, 'Bsnl'),
(4, 'jio'),
(5, 'airtel'),
(6, 'vodafone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`adm_menu_id`);

--
-- Indexes for table `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`circle_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`email_id`,`phone_no`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `mobile_transaction`
--
ALTER TABLE `mobile_transaction`
  ADD PRIMARY KEY (`mobile_payment_transaction_id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `adm_menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `circle`
--
ALTER TABLE `circle`
  MODIFY `circle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
