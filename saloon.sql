-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 09:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `User_id` int(11) NOT NULL,
  `From_time` time NOT NULL,
  `To_time` time NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('Pending','Approved','Cancel') NOT NULL DEFAULT 'Pending',
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_id`, `Date`, `User_id`, `From_time`, `To_time`, `Category`, `Description`, `Created_at`, `Updated_at`, `Status`, `Remark`) VALUES
(1, '2018-12-12', 5, '08:20:00', '08:30:00', 'Bleach', '                                slkll;k ;kdfjoivj x', '2018-12-07 14:09:01', '2018-12-07 14:42:44', 'Cancel', '       we can not approve                                     '),
(2, '2018-02-21', 5, '03:23:00', '04:30:00', 'SPA', '                                serty werty sdfgh ', '2018-12-07 14:16:03', '2018-12-07 14:48:01', 'Approved', '                    good                        '),
(3, '2022-02-17', 11, '13:05:00', '15:09:00', 'SPA', '                       zsdfgb         ', '2022-02-15 11:05:26', '2022-02-15 11:24:55', 'Pending', '                       a                     ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Sub_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_id`, `User_id`, `Cat_id`, `Sub_id`, `Pro_id`, `Date`) VALUES
(3, 5, 4, 11, 2, '2018-12-07'),
(4, 5, 5, 13, 3, '2018-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` int(11) NOT NULL,
  `Cat_Name` varchar(40) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Id_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `Cat_Name`, `Image`, `Created_at`, `Updated_at`, `Id_deleted`) VALUES
(4, 'blich', '2681674.JPG', '2018-12-07 04:45:05', '2018-12-08 09:45:37', 0),
(5, 'Massage', '61NxZU+hvKL._SL1000_.jpg', '2018-12-07 05:44:34', '2018-12-08 09:46:38', 0),
(6, 'makup', '1.jpg', '2018-12-08 05:37:24', '2018-12-08 05:37:24', 0),
(7, 'faciyal', '51Zm6xQGucL.jpg', '2018-12-08 06:32:56', '2018-12-08 06:32:56', 0),
(8, 'spa', '61NxZU+hvKL._SL1000_.jpg', '2018-12-08 06:39:46', '2018-12-08 06:39:46', 0),
(9, 'jjjjjjj', '4.jpg', '2019-03-30 12:51:53', '2019-03-30 12:51:53', 0),
(10, 'Testing Cat', '1.png', '2019-04-16 10:01:02', '2019-04-16 10:01:02', 0),
(11, 'PD Pandya', '6.jpg', '2019-04-17 07:44:20', '2019-04-17 07:44:20', 0),
(12, 'Jeans', '1.png', '2019-05-15 09:28:32', '2019-05-15 09:28:32', 0),
(13, 'Men', '2.jpeg', '2019-06-04 08:05:23', '2019-06-04 08:05:23', 0),
(14, 'Men', '6.jpg', '2019-06-10 07:01:31', '2019-06-10 07:01:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Cid` int(11) NOT NULL,
  `CName` varchar(255) NOT NULL,
  `Sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Cid`, `CName`, `Sid`) VALUES
(1, 'Jaipur', 1),
(2, 'Ahmedabad', 2),
(3, 'Surat', 2),
(4, 'Delhi', 3),
(5, 'Jodhpur', 1),
(6, 'Gurgaon', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fed_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fed_id`, `User_id`, `Message`, `Created_at`, `Updated_at`) VALUES
(1, 7, 'This Application is very nice and we would like to carry forward our work.', '2019-03-29 01:12:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `Inq_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`Inq_id`, `Name`, `Subject`, `Description`, `Email`, `Contact`, `Created_at`, `Updated_at`) VALUES
(1, 'Mukesh', 'for testing Purpose', '             hello to everyone                  ', 'm.kumar3636@gmail.com', 7891666918, '2018-12-04 16:19:23', '2018-12-04 16:19:23'),
(2, 'Sumer', 'just inquiry', 'fdgjdlgjl                                ', 'sumer.singh22@gmail.com', 8141241169, '2018-12-06 10:28:17', '2018-12-06 10:28:17'),
(3, 'a', 'a', '                                a', 'a', 0, '2022-02-15 11:04:08', '2022-02-15 11:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Od_id` int(11) NOT NULL,
  `Orderid` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Price` decimal(6,0) NOT NULL,
  `Total` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `User_id` int(11) NOT NULL,
  `Status` enum('Pending','Completed','Cancel','') NOT NULL DEFAULT 'Pending',
  `total` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Date`, `User_id`, `Status`, `total`) VALUES
(40, '2022-02-07', 11, 'Completed', '1000'),
(41, '2022-02-07', 11, 'Completed', '1000'),
(42, '2022-02-08', 11, 'Completed', '1178'),
(43, '2022-02-08', 8, 'Completed', '1200'),
(44, '2022-02-15', 11, 'Completed', '1512'),
(45, '2022-02-15', 11, 'Completed', '1512');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(222) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(222) NOT NULL,
  `price` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `product_id`, `qty`, `order_id`, `product_name`, `price`) VALUES
(28, 2, '1', 40, 'himalya Face cream', '1000'),
(29, 2, '1', 41, 'himalya Face cream', '1000'),
(30, 2, '1', 42, 'himalya Face cream', '1000'),
(31, 4, '1', 42, 'liner', '178'),
(32, 3, '1', 43, 'Nail Polish Remover', '200'),
(33, 2, '1', 43, 'himalya Face cream', '1000'),
(34, 4, '4', 44, 'liner', '178'),
(35, 3, '4', 44, 'Nail Polish Remover', '200'),
(36, 4, '4', 45, 'liner', '178'),
(37, 3, '4', 45, 'Nail Polish Remover', '200');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_id` int(11) NOT NULL,
  `Pro_Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Sub_id` int(11) NOT NULL,
  `Price` varchar(4) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_id`, `Pro_Name`, `Description`, `Image`, `Cat_id`, `Sub_id`, `Price`, `Quantity`, `Created_at`, `Updated_at`, `Is_deleted`) VALUES
(2, 'himalya Face cream', '                                                                                                                                                                                            completely natural product and good result                                                                                                                                                                                                                      ', '100-purifying-neem-face-wash-himalaya-original-imafbkq4k2ht3z9h.jpeg', 4, 11, '1000', 15, '2018-12-07 07:30:30', '2022-02-08 09:18:01', 0),
(3, 'Nail Polish Remover', 'no chance to chemical reaction                                             ', 'minimal.png', 5, 13, '200', 22, '2018-12-07 07:34:31', '2018-12-07 07:34:31', 0),
(4, 'liner', '                            \r\nThis item: Maybelline Hyper Glossy Liquid Liner, Black, 3g   178.00                ', '41tp-OEqQKL._SL1000_.jpg', 6, 14, '178', 30, '2018-12-08 06:05:52', '2018-12-08 06:05:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `Role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `state` varchar(222) NOT NULL,
  `city` varchar(222) NOT NULL,
  `address` varchar(222) NOT NULL,
  `pincode` varchar(222) NOT NULL,
  `contact` varchar(222) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_id`, `fname`, `lname`, `state`, `city`, `address`, `pincode`, `contact`, `user_id`, `order_id`) VALUES
(40, 'jainish', 'd', 'q', 'q', 'abcd', 'q', 'q', 11, 40),
(41, 'jainish', 'd', 'q', 'q', 'abcd', 'q', 'q', 11, 41),
(42, 'jainish', 'd', 'GUJARAT', 'SURAT', 'abcd', '232323', '23232322323', 11, 42),
(43, 'Nidhi', 'Bhayani', 'gujarat', 'amd', '602,Kaivanna Complex Nr.\r\nCentral Mall, Panchvati,\r\nAhmedabad-380006.', '987665', '12345678', 8, 43),
(44, 'jainish', 'd', 'd', 'd', 'abcd', '3456', '1235', 11, 44),
(45, 'jainish', 'd', 'a', 'a', 'abcd', 'a', 'a', 11, 45);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `Sid` int(11) NOT NULL,
  `SName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`Sid`, `SName`) VALUES
(1, 'Rajasthan'),
(2, 'Gujarat'),
(3, 'Haryana');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catogery`
--

CREATE TABLE `sub_catogery` (
  `Sub_id` int(11) NOT NULL,
  `Sub_Name` varchar(255) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catogery`
--

INSERT INTO `sub_catogery` (`Sub_id`, `Sub_Name`, `Cat_id`, `Image`, `Created_at`, `Updated_at`) VALUES
(11, 'lotus', 4, 'd.jpg', '2018-12-07 05:20:34', '2018-12-08 06:14:59'),
(13, 'lotus', 6, 'd.jpg', '2018-12-07 05:57:18', '2018-12-08 06:15:27'),
(14, 'loreal', 6, 'Saloon-IN-Logo-1-3236.png', '2018-12-08 05:38:34', '2022-02-08 09:20:53'),
(15, 'mac', 6, 'e.jpg', '2018-12-08 06:12:36', '2018-12-08 06:12:36'),
(16, 'l-a-girl', 6, '8.-L.A-Girl-1.jpg', '2018-12-08 06:13:24', '2018-12-08 06:13:24'),
(17, 'lakme', 6, '3.-Lakme-1.jpg', '2018-12-08 06:13:52', '2018-12-08 06:13:52'),
(18, 'NYX', 8, '5.-NYX-1.jpg', '2018-12-08 06:41:11', '2018-12-08 06:41:11'),
(19, 'Student', 11, '6.jpg', '2019-04-17 07:44:49', '2019-04-17 07:44:49'),
(20, 'Black-Narrow', 12, '6.jpg', '2019-05-15 09:28:57', '2019-05-15 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Gender` varchar(90) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL,
  `Sid` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '0',
  `Role_id` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `FName`, `LName`, `Email`, `Contact`, `Gender`, `DOB`, `Address`, `Sid`, `Cid`, `Password`, `Status`, `Role_id`, `Created_at`, `Updated_at`) VALUES
(2, 'jj', 'Patel', 'admin@gmail.com', 7891666918, 'Male', '1998-07-13', 'vpo devgaon prasrapmura nawalgarh jhunjhunu', 1, 1, 'admin', '1', 1, '2018-12-03 10:16:45', '2022-02-15 05:55:34'),
(3, 'Sumer Singh', 'kumawat', 'sumer.singh@gmail.com', 8141241169, 'Male', '1993-12-12', 'devgaon ', 1, 1, '12345', '0', 2, '2018-12-04 07:19:29', '2018-12-07 09:25:29'),
(5, 'rajesh', 'kumawat', 'rajeshkumar@gmail.com', 1234567890, 'Male', '2000-12-12', 'elrlkgerlg', 1, 5, '12345', '0', 2, '2018-12-04 07:30:17', '2019-04-16 10:01:48'),
(7, 'rinkal', 'rathod', 'rink.rathod92@gmil.com', 85111129192, 'Female', '1992-01-29', 'bhat, gandhinagar', 2, 2, '123', '1', 2, '2018-12-06 05:56:32', '2019-05-15 09:29:21'),
(8, 'Nidhi', 'Bhayani', 'N@gmail.com', 9865235689, 'Female', '2004-12-31', '602,Kaivanna Complex Nr.\r\nCentral Mall, Panchvati,\r\nAhmedabad-380006.', 2, 2, '123', '1', 2, '2019-03-22 07:46:41', '2019-03-22 07:47:59'),
(9, 'Alkesh', 'Kaba', 'kabaalkesh293@gmail.com', 9016647480, 'Male', '2021-05-05', 'Bhaktinagar\r\nAhmedabad', 2, 2, '123', '1', 2, '2021-05-10 06:22:45', '2021-05-10 06:24:34'),
(10, 'Bhupesh', 'Rajput', 'bhupesh@gmail.com', 6351608965, 'Male', '2021-10-05', '13/220, Azad Chowk, Bapunagar', 2, 2, '123', '1', 2, '2021-10-13 05:18:26', '2021-10-13 05:19:31'),
(11, 'jainish', 'd', 'j@gmail.com', 234567, 'Male', '2000-06-05', 'abcd', 2, 3, '11', '0', 2, '2022-02-07 08:37:28', '2022-02-07 09:29:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Category_2` (`Category`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_id`),
  ADD KEY `User_id` (`User_id`,`Cat_id`,`Sub_id`,`Pro_id`),
  ADD KEY `Pro_id` (`Pro_id`),
  ADD KEY `Sub_id` (`Sub_id`),
  ADD KEY `Cat_id` (`Cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Sid` (`Sid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fed_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`Inq_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`Od_id`),
  ADD KEY `Orderid` (`Orderid`,`P_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_id`),
  ADD KEY `Cat_id` (`Cat_id`,`Sub_id`),
  ADD KEY `Sub_id` (`Sub_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `sub_catogery`
--
ALTER TABLE `sub_catogery`
  ADD PRIMARY KEY (`Sub_id`),
  ADD KEY `Cat_id` (`Cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `Sid` (`Sid`,`Cid`,`Role_id`),
  ADD KEY `Role_id` (`Role_id`),
  ADD KEY `Sid_2` (`Sid`),
  ADD KEY `Cid` (`Cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `Inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `Od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_catogery`
--
ALTER TABLE `sub_catogery`
  MODIFY `Sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Pro_id`) REFERENCES `product` (`Pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`Sub_id`) REFERENCES `sub_catogery` (`Sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`Cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `state` (`Sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`Orderid`) REFERENCES `orders` (`Order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`P_id`) REFERENCES `product` (`Pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`Order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`Cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Sub_id`) REFERENCES `sub_catogery` (`Sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipping_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`Order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_catogery`
--
ALTER TABLE `sub_catogery`
  ADD CONSTRAINT `sub_catogery_ibfk_1` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`Cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Sid`) REFERENCES `state` (`Sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `city` (`Cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
