-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 06:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mealbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_name` varchar(255) NOT NULL,
  `Admin_contact` bigint(10) NOT NULL,
  `Admin_email` varchar(255) NOT NULL,
  `Admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_name`, `Admin_contact`, `Admin_email`, `Admin_pass`) VALUES
(1, 'Saira', 8745987412, 'szkhan2908@gmail.com', 's123'),
(2, 'Jinal', 9874563214, 'jin07pat04@gmail.com', 'j123'),
(3, 'Mitali', 8745621453, 'mitalimori33@gmail.com', 'm123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(20) NOT NULL,
  `Category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`) VALUES
(1, 'chinese'),
(2, 'Dessert'),
(3, 'Salads'),
(4, 'Soups'),
(5, 'Appetizer'),
(6, 'Beverage'),
(7, 'Italian'),
(8, 'Fast food'),
(9, 'Non-veg'),
(10, 'Mexican'),
(11, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Contact` bigint(10) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Name`, `Email`, `Contact`, `Message`) VALUES
('jinal ', 'jinal@gmail.com', 9874563214, 'Hii.... I am Jinal'),
('Siya', 'siya@gmail.com', 7456321485, 'Hello '),
('Saira', 'szkhan2908@gmail.com', 9874574157, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_contact` bigint(10) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `Customer_pass` varchar(255) NOT NULL,
  `Customer_address` varchar(255) NOT NULL,
  `Customer_email` varchar(255) NOT NULL,
  `Customer_Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_contact`, `Customer_id`, `Customer_name`, `Customer_pass`, `Customer_address`, `Customer_email`, `Customer_Image`) VALUES
(9874563215, 1, 'Siya', '2341', 'Rander', 'siya@gmail.com', 'siya.jpg'),
(5412365214, 2, 'Divya', '789654', 'Bhagal', 'divya123@gmail.com', 'divya.jpg'),
(6534789214, 3, 'Kiran', '8745', 'Patia', 'kpatel@gmail.com', 'kiran.jpg'),
(6987452314, 5, 'Aayesha', 'a1234', 'Ramnagar', 'aayeshakhan@gmail.com', 'aayesha.jpg'),
(7536214896, 6, 'Saira', 's123', 'rander', 'sairakhan@gmail.com', 'siya.jpg\r\n'),
(9874563285, 37, 'Kavya', 'k123', 'Piplod', 'kavya@gmail.com', 'kiran.jpg'),
(7854236988, 38, 'Shiva', 'shiv123', 'Navsari', 'shiva@gmail.com', 'shiva.jpg'),
(987456324, 42, 'Zain', '1234', 'Adajan', 'zain@gmail.com', '607877e99cdccshiva.jpg'),
(9874574157, 44, 'Ayaana', '123', 'rander', 'ayaana@gmail.com', '608bedd1cf2fcaayesha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_id` int(20) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_image` varchar(255) DEFAULT NULL,
  `Price` int(20) NOT NULL,
  `Restaurant_id` int(20) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_id`, `Item_name`, `Item_image`, `Price`, `Restaurant_id`, `Category`, `Rating`) VALUES
(1, 'Chocolate ice-cream', 'ice.jpg', 50, 1, 'Dessert', NULL),
(2, 'Tomato soup', 'tomsoup.jpg', 40, 2, 'Soups', NULL),
(3, 'Cappuccino', 'cap.jpg', 120, 3, 'Beverage', NULL),
(4, 'Manchurian', 'man.jpg', 80, 4, 'chinese', NULL),
(5, 'Mexican rice', 'mex.jpg', 150, 5, 'Mexican', NULL),
(6, 'Coffee', 'Coff.jpg', 20, 6, 'Beverage', NULL),
(7, 'Aloo paratha', 'aloopa.jpg', 50, 7, 'Indian', NULL),
(20, 'Espresso', 'espress.jpg', 80, 46, 'Beverage', NULL),
(26, 'Pizza', 'pizza.jpg', 100, 1, 'Italian', NULL),
(27, 'Pasta', 'pasta.jpg', 90, 1, 'Italian', NULL),
(28, 'Latte', 'latte.jpg', 90, 1, 'Beverage', NULL),
(29, 'Paneer tikka', 'paneert.jpg', 120, 2, 'Indian', NULL),
(30, 'Chhole bhature', 'chhole.jpg', 200, 2, 'Indian', NULL),
(31, 'Chapati', 'chapati.jpg', 20, 2, 'Indian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`, `zip`) VALUES
(7, '63', 'siya', 'patel', 'siya@gmail.com', 'Rander', 'Surat', 'Gujarat', 'patel'),
(8, '64', 'aayesha', 'khan', 'aayeshakhan@gmail.com', 'Ramnagar', 'Surat', 'Gujarat', 'khan'),
(9, '0', 'aayesha', 'khan', 'aayeshakhan@gmail.com', 'Ramnagar', 'Surat', 'Gujarat', 'khan'),
(10, '0', 'siya', 'patel', 'siya@gmail.com', 'Rander', 'Surat', 'Gujarat', 'patel'),
(11, '1', 'siya', 'patel', 'siya@gmail.com', 'Rander', 'Surat', 'Gujarat', 'patel'),
(12, '2', 'aayesha', 'khan', 'aayeshakhan@gmail.com', 'Ramnagar', 'Surat', 'Gujarat', 'khan');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `Order_id` int(20) NOT NULL,
  `Customer_id` int(20) NOT NULL,
  `Order_info` longtext NOT NULL,
  `order_date` datetime NOT NULL,
  `rest_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`Order_id`, `Customer_id`, `Order_info`, `order_date`, `rest_id`) VALUES
(63, 1, '\"[{\"id\":\"1\",\"name\":\"Chocolate ice-cream\",\"image\":\"ice.jpg\",\"price\":\"50\",\"qty\":1,\"rest_id\":1,\"restName\":\"Mysore cafe\"},{\"id\":\"29\",\"name\":\"Paneer tikka\",\"image\":\"paneert.jpg\",\"price\":\"120\",\"qty\":1,\"rest_id\":2,\"restName\":\"Topaz\"},{\"id\":\"31\",\"name\":\"Chapati\",\"image\":\"chapati.jpg\",\"price\":\"20\",\"qty\":1,\"rest_id\":2,\"restName\":\"Topaz\"}]\"', '2021-04-30 21:17:00', '[1,2,2]'),
(64, 5, '\"[{\"id\":\"27\",\"name\":\"Pasta\",\"image\":\"pasta.jpg\",\"price\":\"90\",\"qty\":1,\"rest_id\":1,\"restName\":\"Mysore cafe\"},{\"id\":\"3\",\"name\":\"Cappuccino\",\"image\":\"cap.jpg\",\"price\":\"120\",\"qty\":1,\"rest_id\":3,\"restName\":\"Barbeque nation\"}]\"', '2021-04-30 21:18:00', '[1,3]');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `R_id` int(20) NOT NULL,
  `Customer_id` int(20) NOT NULL,
  `Item_id` int(20) NOT NULL,
  `Rate` int(10) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`R_id`, `Customer_id`, `Item_id`, `Rate`, `Comment`) VALUES
(1, 0, 3, NULL, NULL),
(2, 0, 4, NULL, NULL),
(3, 0, 1, NULL, NULL),
(4, 0, 10, NULL, NULL),
(5, 0, 7, NULL, NULL),
(6, 0, 8, NULL, NULL),
(7, 0, 2, NULL, NULL),
(8, 0, 9, NULL, NULL),
(9, 0, 5, NULL, NULL),
(10, 0, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_id` int(20) NOT NULL,
  `Restaurant_name` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Restaurant_address` varchar(255) NOT NULL,
  `Restaurant_contact` bigint(10) NOT NULL,
  `Restaurant_email` varchar(255) NOT NULL,
  `Restaurant_image` varchar(255) DEFAULT NULL,
  `Restaurant_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_id`, `Restaurant_name`, `State`, `City`, `Restaurant_address`, `Restaurant_contact`, `Restaurant_email`, `Restaurant_image`, `Restaurant_pass`) VALUES
(1, 'Mysore cafe', 'Gujarat', 'Ahmedabad', 'Ahmedabad', 4521365470, 'mysorecafes@gmail.com', 'mysore.jpg', 'mcafe123'),
(2, 'Topaz', 'Gujarat', 'Surat', 'Athwalines', 9874214563, 'topaz@gmail.com', 'topaz.jpg', 'tp123'),
(3, 'Barbeque nation', 'Gujarat', 'Baroda', 'Baroda', 6532147878, 'bbqnation@gmail.com', 'bbq.jpg', 'bnation234'),
(4, 'Royal', 'Gujarat', 'Surat', 'Ramnagar', 9876543234, 'royal@gmail.com', 'royal.jpg', '123'),
(5, 'Indian cuisine restaurant', 'Gujarat', 'Surat', 'rander', 8745632145, 'inadiancusine@gmail.com', 'indian.jpg', '123456'),
(6, 'Ajays', 'Gujarat', 'Surat', 'rander', 8741254365, 'ajayscafe@gmail.com', 'ajays.jpg', '876542'),
(7, 'Aashirwaad', 'Gujarat', 'Surat', 'surat', 8745632145, 'aashirwad@gmail.com', 'aashirwad.jpg', '987465'),
(46, 'The Disaster Cafe', 'Gujarat', 'Surat', 'Vesu', 9874563214, 'disastercafe@gmail.com', '6077287438b8ddisaster.jpg', '4785'),
(61, 'Bistro', 'Gujarat', 'Surat', 'Jahangirpura', 7896541234, 'bistro@ymail.com', '6078718f0c76ebistro.jpg', '1234'),
(62, 'Pine and dine', 'Gujarat', 'Surat', 'Ramnagar', 5478123654, 'pine&dine@gmail.com', '6078729c6e727pine.jpg', '123'),
(63, 'The gourmet kitchen', 'Gujarat', 'Surat', 'Rander', 8745363214, 'gourmet@gmail.com', '6078732016c12gourmet.jpg', '9874'),
(64, 'Burgrill', 'Gujarat', 'Ahmedabad', 'Adajan', 987654345, 'burgrill@ymail.com', '607873935b4eaburgrill.jpg', '5874');

-- --------------------------------------------------------

--
-- Table structure for table `special_order`
--

CREATE TABLE `special_order` (
  `SP_order_id` int(20) NOT NULL,
  `Customer_id` int(20) NOT NULL,
  `Order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_order`
--

INSERT INTO `special_order` (`SP_order_id`, `Customer_id`, `Order_date`) VALUES
(1, 0, '2020-07-04'),
(2, 0, '2020-12-07'),
(3, 0, '2020-11-17'),
(4, 0, '2020-12-29'),
(5, 0, '2021-01-15'),
(6, 0, '2020-07-27'),
(7, 0, '2020-10-23'),
(8, 0, '2020-09-11'),
(9, 0, '2021-01-05'),
(10, 0, '2020-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `special_order_detail`
--

CREATE TABLE `special_order_detail` (
  `SP_order_id` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Order_info` varchar(255) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_order_detail`
--

INSERT INTO `special_order_detail` (`SP_order_id`, `Date`, `Order_info`, `Time`) VALUES
(1, '2020-07-04', '', '10:00'),
(2, '2020-12-07', '', '02:00'),
(3, '2020-11-17', '', '12:00'),
(4, '2020-12-29', '', '01:00'),
(5, '2020-01-15', '', '12:30'),
(6, '2020-07-27', '', '01:30'),
(7, '2020-10-23', '', '11:30'),
(8, '2020-09-11', '', '11:00'),
(9, '2020-01-05', '', '19:00'),
(10, '2020-08-12', '', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `special_tbl`
--

CREATE TABLE `special_tbl` (
  `Customer_id` int(10) NOT NULL,
  `Order_info` longtext NOT NULL,
  `order_date` datetime NOT NULL,
  `rest_id` int(10) NOT NULL,
  `Order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_tbl`
--

INSERT INTO `special_tbl` (`Customer_id`, `Order_info`, `order_date`, `rest_id`, `Order_id`) VALUES
(1, '\"{\"date\":[\"2021/05/01 04:00\"],\"items\":[[\"26\"]]}\"', '2021-04-30 21:31:00', 1, 1),
(1, '\"{\"date\":[\"2021/05/01 01:00\",\"2021/05/01 18:00\"],\"items\":[[\"28\"],[\"27\"]]}\"', '2021-04-30 21:37:00', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`Order_id`) USING BTREE;

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`R_id`,`Customer_id`,`Item_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_id`);

--
-- Indexes for table `special_order`
--
ALTER TABLE `special_order`
  ADD PRIMARY KEY (`SP_order_id`,`Customer_id`);

--
-- Indexes for table `special_order_detail`
--
ALTER TABLE `special_order_detail`
  ADD PRIMARY KEY (`SP_order_id`,`Date`);

--
-- Indexes for table `special_tbl`
--
ALTER TABLE `special_tbl`
  ADD PRIMARY KEY (`Order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `Order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `R_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `special_order`
--
ALTER TABLE `special_order`
  MODIFY `SP_order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `special_order_detail`
--
ALTER TABLE `special_order_detail`
  MODIFY `SP_order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `special_tbl`
--
ALTER TABLE `special_tbl`
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
