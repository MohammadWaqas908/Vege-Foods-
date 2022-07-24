-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 07:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegefoods_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `ID` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Product_id` varchar(255) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `T_Price` int(11) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`ID`, `User_name`, `Product_id`, `Product_name`, `T_Price`, `Product_Quantity`, `Product_img`) VALUES
(1, 'waqas512', '3', 'Green Beans', 480, 4, 'product-3.jpg'),
(2, 'waqas512', '1', 'BELL PEPPER', 160, 2, 'product-1.jpg'),
(4, 'waqas5', '2', 'STRAWBERRY', 120, 1, 'product-2.jpg'),
(5, 'waqas5', '5', 'Tomatoe', 120, 1, 'product-5.jpg'),
(8, 'waqas512', '7', 'Carrots', 720, 6, 'product-7.jpg'),
(9, 'waqas512', '1', 'BELL PEPPER', 640, 8, 'product-1.jpg'),
(10, 'waqas512', '12', 'Chilli', 480, 4, 'product-12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`ID`, `Name`, `Email`, `Subject`, `Message`) VALUES
(1, 'Viki', 'abc@gamil.com', 'gen', 'best ecomm');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `ID` int(11) NOT NULL,
  `P_name` varchar(255) NOT NULL,
  `p_type` varchar(255) NOT NULL,
  `P_image` varchar(255) NOT NULL,
  `P_description` varchar(255) NOT NULL,
  `P_price` int(11) NOT NULL,
  `P_Quantity` int(11) NOT NULL,
  `Remaning_quantiy` int(11) NOT NULL,
  `Added_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`ID`, `P_name`, `p_type`, `P_image`, `P_description`, `P_price`, `P_Quantity`, `Remaning_quantiy`, `Added_Date`) VALUES
(1, 'BELL PEPPER', 'Vagitable', 'product-1.jpg', 'Fresh bell pepper from mordern garden', 80, 500, 500, '2021-01-01'),
(2, 'STRAWBERRY', 'Fruits', 'product-2.jpg', 'Fresh strawberry virity from a good form', 120, 300, 300, '2021-01-01'),
(3, 'Green Beans', 'Vagitables', 'product-3.jpg', 'Fresh Green Beans vagitable from form ', 120, 300, 300, '2021-01-01'),
(4, 'Purple Cabbage', 'Vagitables', 'product-4.jpg', 'Fresh purple cabbage from farm', 120, 300, 300, '2021-01-01'),
(5, 'Tomatoe', 'Vagitables', 'product-5.jpg', 'Fresh tomatoe from a best form.', 120, 300, 300, '2021-01-01'),
(6, 'Brocolli', 'Vagitables', 'product-6.jpg', 'Fresh brocolli from a farm', 120, 300, 300, '2021-01-01'),
(7, 'Carrots', 'Vagitables', 'product-7.jpg', 'Fresh carrots which are imported from pak.', 120, 300, 300, '2021-01-01'),
(8, 'Fruit Juice', 'Juice', 'product-8.jpg', 'Fresh juice of mix fruits', 120, 300, 300, '2021-01-01'),
(9, 'Onion', 'Vagitable', 'product-9.jpg', 'Fresh onion from a farm', 120, 300, 500, '2021-01-01'),
(10, 'Apple', 'Fruits', 'product-10.jpg', 'fresh golden apple varity', 120, 300, 300, '2021-01-01'),
(11, 'Garlic', 'Vagitable', 'product-11.jpg', 'Fresh garlic from a farm', 120, 300, 300, '2021-01-01'),
(12, 'Chilli', 'vagitable', 'product-12.jpg', 'Fresh chilli from a farm', 120, 300, 300, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Uname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Uname`, `Email`, `Password`) VALUES
(1, 'waqas5', 'abc@gamil.com', '12345'),
(2, 'waqas512', '7375@gamil.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

CREATE TABLE `wishlist_tbl` (
  `ID` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `Pro_name` varchar(255) NOT NULL,
  `Pro_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`ID`, `User_name`, `Pro_id`, `Pro_name`, `Pro_img`) VALUES
(7, 'waqas5', 3, 'Green Beans', 'product-3.jpg'),
(8, 'waqas5', 6, 'Brocolli', 'product-6.jpg'),
(9, 'waqas512', 4, 'Purple Cabbage', 'product-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
