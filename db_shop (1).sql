-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2018 at 05:47 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Jamiul alam sohel', 'sohel', 'admin@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'Samsung'),
(3, 'Canon'),
(4, 'Acer'),
(5, 'Books'),
(6, 'Drinks'),
(7, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `carId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `carId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`carId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Software'),
(3, 'Clothing'),
(5, 'Books'),
(6, 'Plastic'),
(7, 'Accessories'),
(8, 'Sports &amp; Fitness'),
(9, 'Home Decor &amp; Kitchen'),
(10, 'Beauty &amp; Healthcare'),
(11, 'Toys, Kids &amp; Babies'),
(12, 'Laptop'),
(13, 'Jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Shaheed Nasim', 'Banasree', 'Dhaka', 'Bangladesh', '1212', '01755acangdd', 'nasim@gmailc.om', '123'),
(2, 'Abu Yousuf', 'Mirpur', 'Dhaka', 'Bangladesh', '1000', '0167543883', 'abu@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `carId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `carId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Lorem ipsum', 2, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 300.00, 'upload/55155c04c3.png', 0),
(2, 'LATEST FROM IPHONE', 5, 3, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 239.00, 'upload/920a833270.jpg', 0),
(3, 'LATEST FROM Books', 9, 4, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 289.00, 'upload/3d290c627c.png', 0),
(4, 'LATEST FROM Clothing', 2, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 333.00, 'upload/2757633723.jpg', 1),
(5, 'LATEST FROM Software', 2, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 230.00, 'upload/f87c2add98.jpg', 0),
(6, 'LATEST FROM IPHONE', 2, 7, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 890.00, 'upload/74c2a43316.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
