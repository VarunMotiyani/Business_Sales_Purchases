-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 03, 2022 at 03:35 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(12) NOT NULL,
  `profile` text NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `mobile`, `email`, `password`, `profile`, `delete_status`) VALUES
(3, 'Varun', 'Motiyani', '9595661281', 'admin@admin.com', 'admin', 'user.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `First` varchar(50) NOT NULL,
  `Last` varchar(50) NOT NULL,
  `DateTime` datetime(6) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`First`, `Last`, `DateTime`, `Amount`) VALUES
('Varun', 'M', '2022-10-06 20:48:37.000000', 40000),
('Sarvesh', 'C', '2022-10-06 20:54:37.000000', 3333),
('Sahil', 'K', '2022-10-06 20:49:27.000000', 33),
('Varun', 'M', '2022-10-06 23:13:33.000000', 50000),
('Aman', 'Paryani', '2022-11-04 02:00:26.000000', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `Customer_id` int(20) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_no` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Zip_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_data`
--

INSERT INTO `customer_data` (`Customer_id`, `First_name`, `Last_name`, `Email`, `Phone_no`, `Address`, `Country`, `State`, `City`, `Zip_code`) VALUES
(1, 'Varun', 'M', '2020.varun.motiyani@ves.ac.in', 234322, 'abc', 'India', 'MH', 'Mumbai', 400074),
(2, 'Sarvesh', 'H', '2020.sarvesh.chandnani@ves.ac.in', 33223, 'dd', 'Nigeria', 'XZ', 'FF', 352672),
(3, 'Sahil', 'K', '20202020@gmail.com', 94933030, 'hello', 'hello', 'hello', 'hello', 49392),
(4, 'Bhavik', 'h', '392-Q@gmail.com', 930202, 'hello', 'hello', 'hello', 'hello', 49220),
(5, 'Nidhi', 'Badiger', 'fjjffj@gmail.com', 573832929, 'djskss', 'AF', 'CA', 'h', 53322),
(6, 'Bhavik', 'Rajpal', 'hddjdjd@gmail.com', 48392922, 'fjjjd', 'IND', 'MH', 'MUM', 622771);

-- --------------------------------------------------------

--
-- Table structure for table `Login_data`
--

CREATE TABLE `Login_data` (
  `login_id` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login_data`
--

INSERT INTO `Login_data` (`login_id`, `Password`) VALUES
('var', 'var@123');

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Cost_Price` float NOT NULL,
  `Price` float NOT NULL,
  `Margin` double NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`Product_id`, `Product_name`, `Cost_Price`, `Price`, `Margin`, `Quantity`) VALUES
(1, 'Lays', 8.5, 10, 0, 100),
(2, 'Kitkat', 17, 20, 0, 500),
(3, 'Kurkure', 7.5, 10, 0, 1000),
(4, 'Dairy Milk', 16, 20, 0, 500),
(5, 'Good Day', 13.5, 15, 0, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `Customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
