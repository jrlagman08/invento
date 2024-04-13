-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2024 at 04:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invento`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`categoryID`, `name`) VALUES
(1, 'T-shirt'),
(2, 'Socks'),
(3, 'Pants'),
(4, 'Underwear');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classification`
--

CREATE TABLE `tbl_classification` (
  `classificationID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_classification`
--

INSERT INTO `tbl_classification` (`classificationID`, `name`) VALUES
(1, 'Footcover'),
(2, 'Kneehigh Stockings'),
(4, 'Pantyhose Stockings'),
(5, 'Short socks Stockings'),
(6, 'Stayup Stockings'),
(7, 'Support Pantyhose');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `colorID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`colorID`, `name`) VALUES
(14, '#3'),
(16, '#4'),
(17, '#5'),
(20, '#6'),
(21, 'Black'),
(22, 'Dark Grey'),
(23, 'Grey');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

CREATE TABLE `tbl_companyinfo` (
  `companyinfoID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int NOT NULL,
  `country` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`companyinfoID`, `name`, `email`, `mobile`, `phone`, `address`, `address2`, `city`, `province`, `zipcode`, `country`, `logo`, `website`) VALUES
(1, 'Invento', 'invento@email.com', '0987654321', '1234567890', 'Dau', 'Homesite', 'Mabalacat', 'Pampanga', 2010, 'Philippines', 'img/companylogo/219707.png', 'https://invento.ph/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_count`
--

CREATE TABLE `tbl_count` (
  `countID` int NOT NULL,
  `countDate` datetime NOT NULL,
  `userID` int NOT NULL,
  `notes` text NOT NULL,
  `isPosted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_count`
--

INSERT INTO `tbl_count` (`countID`, `countDate`, `userID`, `notes`, `isPosted`) VALUES
(1, '2024-03-04 07:20:20', 5, 'sample count', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countitem`
--

CREATE TABLE `tbl_countitem` (
  `countitemID` int NOT NULL,
  `countID` int NOT NULL,
  `prodID` int NOT NULL,
  `systemCount` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_countitem`
--

INSERT INTO `tbl_countitem` (`countitemID`, `countID`, `prodID`, `systemCount`, `count`) VALUES
(1, 1, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int NOT NULL,
  `country` varchar(50) NOT NULL,
  `econtactPerson` varchar(100) NOT NULL,
  `econtactEmail` varchar(50) NOT NULL,
  `econtactMobile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerID`, `name`, `email`, `mobile`, `phone`, `address`, `address2`, `city`, `province`, `zipcode`, `country`, `econtactPerson`, `econtactEmail`, `econtactMobile`) VALUES
(1, 'Add One', 'na@yahoo.com', '09175293838', 'na', 'na', 'na', 'manila', 'ncr', 1006, 'philippines', 'Mr Uy', 'na@yahoo.com', '09175293838'),
(4, 'Ben Ventures', 'na@yahoo.com', 'na', 'na', 'na', 'na', 'Manila', 'NCR', 0, 'Philippines', 'Kendrick', 'na@google.com', '09178388890'),
(5, 'Cebu Tesing Textile', 'ad@yahoo.com', '09173230317', '(032)2536790', '18 Panganiban St, Cebu City, 6000 Cebu', 'na', 'na', 'na', 0, 'Philippines', 'na', 'asdf@yahoo.com', '09173230317'),
(6, 'Davao New Star', 'naw@yahoo.com', '09177011446', '(082)221-0058', '34 B.R. Magsaysay Avenue Brgy 27-C Poblacion District 8000 Davao City, Philippines', 'na', 'Davao', 'Davao', 0, 'Philippines', 'na', 'da@yahoo.com', '09177011446'),
(7, 'Evergood Alliance Traders', 'na@yahoo.com', '09178575588', 'na', 'na', 'na', 'manila', 'ncr', 1006, 'Philippines', 'na', 'na@yahoo.com', 'na'),
(8, 'Grace', 'and@google.com', '09178566883', 'na', 'na', 'na', 'Manila', 'NCR', 0, 'Philippines', 'na', 'adw@google.com', '09178566883'),
(9, 'Hobson Trading', 'a@yahoo.com', '09175892779', 'na', 'na', 'na', 'Manila', 'NCR', 0, 'Philippines', 'michelle lao', 'f@yahoo.com', '09175892779'),
(10, 'Hua San', 'as@google.com', '09175824801', 'na', 'na', 'na', 'Manila', 'NCR', 0, 'Philippines', 'Henry Ong', 'naw@google.com', '09175824801'),
(11, 'Ok Department', 'na@yahoo.com', '09178156815', 'na', 'na', 'na', 'Manila', 'NCR', 1006, 'Philippines', 'na', 'na@google.com', '09178156815'),
(12, ' Ping Ting Trading', 'bd@yahoo.com', '09915441866', '(033)338-1714', '117 Iznart Street, Iloilo City, Philippines', 'na', 'na', 'Iloilo City', 0, 'Philippines', 'na', 'abd@yahoo.com', 'na'),
(13, 'Susan', 'a@yahoo.com', '09458977712', 'na', 'na', 'na', 'Manila', 'Manila', 0, 'Philippines', 'Susan Dy', 'wah@yahoo.com', '09458977712');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `departmentID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`departmentID`, `name`) VALUES
(1, 'IT'),
(2, 'Sales'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `imgID` int NOT NULL,
  `prodID` int NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`imgID`, `prodID`, `path`) VALUES
(2, 2, 'img/gallery/616563ballon-service-icon.png'),
(3, 1, 'img/gallery/490646optimum-performance-&-operartion.jpg'),
(4, 1, 'img/gallery/182424flexibility-line.jpg'),
(5, 1, 'img/gallery/43754cost-efficient-line.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderNum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `customerID` int NOT NULL,
  `userID` int NOT NULL,
  `paymentID` int NOT NULL,
  `paymentref` varchar(50) NOT NULL,
  `amountPaid` decimal(10,0) NOT NULL,
  `grandTotal` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `orderDate`, `orderNum`, `customerID`, `userID`, `paymentID`, `paymentref`, `amountPaid`, `grandTotal`, `balance`) VALUES
(3, '2024-03-04 00:26:00', 'AA11', 1, 5, 2, 'AA11', '2411', '0', '241'),
(4, '2024-03-04 00:29:00', 'FFF123', 7, 5, 1, 'FGG123', '1515', '0', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitem`
--

CREATE TABLE `tbl_orderitem` (
  `orderitemID` int NOT NULL,
  `orderID` int NOT NULL,
  `prodID` int NOT NULL,
  `origPrice` decimal(10,0) NOT NULL,
  `salePrice` decimal(10,0) NOT NULL,
  `discountedPrice` decimal(10,0) NOT NULL,
  `discountAmount` decimal(10,0) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orderitem`
--

INSERT INTO `tbl_orderitem` (`orderitemID`, `orderID`, `prodID`, `origPrice`, `salePrice`, `discountedPrice`, `discountAmount`, `qty`) VALUES
(1, 3, 1, '1', '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `paymentID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`paymentID`, `name`) VALUES
(1, 'Cash'),
(3, 'Post Dated Checks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prodID` int NOT NULL,
  `categoryID` int NOT NULL,
  `subCategoryID` int NOT NULL,
  `prodCode` varchar(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `shortDesc` varchar(200) NOT NULL,
  `fullDesc` varchar(500) NOT NULL,
  `classificationID` int NOT NULL,
  `colorID` int NOT NULL,
  `rackID` int NOT NULL,
  `seasonID` int NOT NULL,
  `uomID` int NOT NULL,
  `warehouseID` int NOT NULL,
  `origPrice` decimal(10,0) NOT NULL DEFAULT '0',
  `salePrice` decimal(10,0) NOT NULL DEFAULT '0',
  `discountedPrice` decimal(10,0) NOT NULL DEFAULT '0',
  `lowQty` int NOT NULL DEFAULT '0',
  `highQty` int NOT NULL DEFAULT '0',
  `runningBal` int NOT NULL DEFAULT '0',
  `isRepackage` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prodID`, `categoryID`, `subCategoryID`, `prodCode`, `prodName`, `shortDesc`, `fullDesc`, `classificationID`, `colorID`, `rackID`, `seasonID`, `uomID`, `warehouseID`, `origPrice`, `salePrice`, `discountedPrice`, `lowQty`, `highQty`, `runningBal`, `isRepackage`) VALUES
(1, 2, 1, 'PR111', 'Test Prod 111', 'Short Desc', 'Full Desc', 4, 14, 1, 1, 3, 1, '20', '15', '5', 50, 80, 60, 0),
(2, 4, 0, 'SAM123', 'Same Same', 'descd', 'desc', 5, 23, 2, 2, 3, 2, '10', '5', '5', 50, 80, 0, 0),
(3, 3, 3, 'RP333', 'Repack 3', 'repack 3', 'repack 3', 1, 14, 1, 3, 3, 1, '100', '50', '50', 30, 80, 0, 1),
(4, 3, 4, 'GMA123', 'SubCat Test', 'SubCat Test', 'SubCat Test', 1, 14, 1, 3, 3, 1, '100', '50', '50', 60, 60, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rack`
--

CREATE TABLE `tbl_rack` (
  `rackID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rack`
--

INSERT INTO `tbl_rack` (`rackID`, `name`) VALUES
(1, 'Rack 1'),
(2, 'Rack 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received`
--

CREATE TABLE `tbl_received` (
  `receivedID` int NOT NULL,
  `receivedDate` datetime NOT NULL,
  `userID` int NOT NULL,
  `notes` text NOT NULL,
  `isPosted` tinyint(1) NOT NULL,
  `grandTotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_received`
--

INSERT INTO `tbl_received` (`receivedID`, `receivedDate`, `userID`, `notes`, `isPosted`, `grandTotal`) VALUES
(1, '2024-03-04 07:21:32', 5, 'sample received', 1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiveditem`
--

CREATE TABLE `tbl_receiveditem` (
  `receiveditemID` int NOT NULL,
  `receivedID` int NOT NULL,
  `prodID` int NOT NULL,
  `origPrice` decimal(10,0) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_receiveditem`
--

INSERT INTO `tbl_receiveditem` (`receiveditemID`, `receivedID`, `prodID`, `origPrice`, `qty`) VALUES
(1, 1, 1, '20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repackageitem`
--

CREATE TABLE `tbl_repackageitem` (
  `repackageitemID` int NOT NULL,
  `prodID` int NOT NULL,
  `prodGroup` int NOT NULL,
  `prodQty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_season`
--

CREATE TABLE `tbl_season` (
  `seasonID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_season`
--

INSERT INTO `tbl_season` (`seasonID`, `name`) VALUES
(1, 'Summer'),
(2, 'Winter'),
(3, 'Rainy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subCategoryID` int NOT NULL,
  `categoryID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subCategoryID`, `categoryID`, `name`) VALUES
(1, 2, 'Sub Cat 1'),
(3, 3, 'Sub Cat 2'),
(4, 3, 'Test Sub');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplierID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int NOT NULL,
  `country` varchar(50) NOT NULL,
  `econtactPerson` varchar(100) NOT NULL,
  `econtactEmail` varchar(50) NOT NULL,
  `econtactMobile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplierID`, `name`, `email`, `mobile`, `phone`, `address`, `address2`, `city`, `province`, `zipcode`, `country`, `econtactPerson`, `econtactEmail`, `econtactMobile`) VALUES
(1, 'PMC Printing Press', 'naw@yahoo.com', '09222159967', 'na', '#105 4th St Bel; 9th and 10th ave caloocan city', 'na', 'Caloocan', 'NCR', 0, 'Philippines', 'Sherry', 'sa@yahoo.com', '09222159967'),
(3, 'china', 'na@yahoo.com', 'na', 'na', 'china', 'china', 'china', 'na', 5154, 'china', 'na', 'na@yahoo.com', 'na'),
(4, 'Megaworld Trucking Services Corp', 'na@yahoo.com', 'na', 'na', '6243 sevilla st; del pan tondo, manila', 'na', 'Manila', 'NCR', 0, 'Philippines', 'na', 'na@google.com', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplieritem`
--

CREATE TABLE `tbl_supplieritem` (
  `supplieritemID` int NOT NULL,
  `supplierID` int NOT NULL,
  `prodCode` varchar(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `prodDetails` varchar(200) NOT NULL,
  `origPrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uom`
--

CREATE TABLE `tbl_uom` (
  `uomID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_uom`
--

INSERT INTO `tbl_uom` (`uomID`, `name`) VALUES
(3, 'Dozen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userID` int NOT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `departmentID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `email`, `pword`, `fname`, `lname`, `departmentID`) VALUES
(5, 'jrlagman08@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 'Admin', 'Admin', 1),
(6, 'wilbertlim@gmail.com', '6a11c021425831a2396592bf6597d177', 'Wilbert', 'Lim', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `warehouseID` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`warehouseID`, `name`) VALUES
(1, 'Warehouse 1'),
(2, 'Warehouse 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tbl_classification`
--
ALTER TABLE `tbl_classification`
  ADD PRIMARY KEY (`classificationID`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`colorID`);

--
-- Indexes for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  ADD PRIMARY KEY (`companyinfoID`);

--
-- Indexes for table `tbl_count`
--
ALTER TABLE `tbl_count`
  ADD PRIMARY KEY (`countID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_countitem`
--
ALTER TABLE `tbl_countitem`
  ADD PRIMARY KEY (`countitemID`),
  ADD KEY `prodID` (`prodID`),
  ADD KEY `inventorycountID` (`countID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  ADD PRIMARY KEY (`orderitemID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `warehouseID` (`warehouseID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `subCategoryID` (`subCategoryID`),
  ADD KEY `classificationID` (`classificationID`),
  ADD KEY `colorID` (`colorID`),
  ADD KEY `seasonID` (`seasonID`),
  ADD KEY `uomID` (`uomID`);

--
-- Indexes for table `tbl_rack`
--
ALTER TABLE `tbl_rack`
  ADD PRIMARY KEY (`rackID`);

--
-- Indexes for table `tbl_received`
--
ALTER TABLE `tbl_received`
  ADD PRIMARY KEY (`receivedID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_receiveditem`
--
ALTER TABLE `tbl_receiveditem`
  ADD PRIMARY KEY (`receiveditemID`),
  ADD KEY `receivedID` (`receivedID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `tbl_repackageitem`
--
ALTER TABLE `tbl_repackageitem`
  ADD PRIMARY KEY (`repackageitemID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `tbl_season`
--
ALTER TABLE `tbl_season`
  ADD PRIMARY KEY (`seasonID`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subCategoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `tbl_supplieritem`
--
ALTER TABLE `tbl_supplieritem`
  ADD PRIMARY KEY (`supplieritemID`),
  ADD KEY `supplierID` (`supplierID`);

--
-- Indexes for table `tbl_uom`
--
ALTER TABLE `tbl_uom`
  ADD PRIMARY KEY (`uomID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`warehouseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_classification`
--
ALTER TABLE `tbl_classification`
  MODIFY `classificationID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `colorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  MODIFY `companyinfoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_count`
--
ALTER TABLE `tbl_count`
  MODIFY `countID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countitem`
--
ALTER TABLE `tbl_countitem`
  MODIFY `countitemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `departmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `imgID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  MODIFY `orderitemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `paymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prodID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rack`
--
ALTER TABLE `tbl_rack`
  MODIFY `rackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_received`
--
ALTER TABLE `tbl_received`
  MODIFY `receivedID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_receiveditem`
--
ALTER TABLE `tbl_receiveditem`
  MODIFY `receiveditemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_repackageitem`
--
ALTER TABLE `tbl_repackageitem`
  MODIFY `repackageitemID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_season`
--
ALTER TABLE `tbl_season`
  MODIFY `seasonID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subCategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplierID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplieritem`
--
ALTER TABLE `tbl_supplieritem`
  MODIFY `supplieritemID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_uom`
--
ALTER TABLE `tbl_uom`
  MODIFY `uomID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `warehouseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
