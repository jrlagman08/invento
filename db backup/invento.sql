-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2024 at 10:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

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

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_classification`;
CREATE TABLE IF NOT EXISTS `tbl_classification` (
  `classificationID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`classificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `colorID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`colorID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_companyinfo`;
CREATE TABLE IF NOT EXISTS `tbl_companyinfo` (
  `companyinfoID` int NOT NULL AUTO_INCREMENT,
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
  `website` varchar(50) NOT NULL,
  PRIMARY KEY (`companyinfoID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`companyinfoID`, `name`, `email`, `mobile`, `phone`, `address`, `address2`, `city`, `province`, `zipcode`, `country`, `logo`, `website`) VALUES
(1, 'Invento', 'invento@email.com', '0987654321', '1234567890', 'Dau', 'Homesite', 'Mabalacat', 'Pampanga', 2010, 'Philippines', 'img/companylogo/219707.png', 'https://invento.ph/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_count`
--

DROP TABLE IF EXISTS `tbl_count`;
CREATE TABLE IF NOT EXISTS `tbl_count` (
  `countID` int NOT NULL AUTO_INCREMENT,
  `countDate` datetime NOT NULL,
  `userID` int NOT NULL,
  `notes` text NOT NULL,
  `isPosted` tinyint(1) NOT NULL,
  PRIMARY KEY (`countID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_count`
--

INSERT INTO `tbl_count` (`countID`, `countDate`, `userID`, `notes`, `isPosted`) VALUES
(1, '2024-04-01 07:20:20', 5, 'sample count', 1),
(2, '2024-04-03 13:35:25', 5, 'sample count', 1),
(3, '2024-04-08 13:35:59', 5, 'sample count', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countitem`
--

DROP TABLE IF EXISTS `tbl_countitem`;
CREATE TABLE IF NOT EXISTS `tbl_countitem` (
  `countitemID` int NOT NULL AUTO_INCREMENT,
  `countID` int NOT NULL,
  `prodID` int NOT NULL,
  `systemCount` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`countitemID`),
  KEY `prodID` (`prodID`),
  KEY `inventorycountID` (`countID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_countitem`
--

INSERT INTO `tbl_countitem` (`countitemID`, `countID`, `prodID`, `systemCount`, `count`) VALUES
(1, 1, 1, 5, 5),
(2, 2, 2, 38, 36),
(3, 3, 4, 30, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customerID` int NOT NULL AUTO_INCREMENT,
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
  `econtactMobile` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `departmentID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_image`;
CREATE TABLE IF NOT EXISTS `tbl_image` (
  `imgID` int NOT NULL AUTO_INCREMENT,
  `prodID` int NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`imgID`),
  KEY `prodID` (`prodID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`imgID`, `prodID`, `path`) VALUES
(2, 2, 'img/gallery/616563ballon-service-icon.png'),
(3, 1, 'img/gallery/490646optimum-performance-&-operartion.jpg'),
(4, 1, 'img/gallery/182424flexibility-line.jpg'),
(5, 1, 'img/gallery/43754cost-efficient-line.jpg'),
(7, 3, 'img/gallery/676435icon-bins-simultaneously.jpg'),
(8, 10, 'img/gallery/894936icon-hot-cold-water.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `orderDate` datetime NOT NULL,
  `orderNum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `customerID` int NOT NULL,
  `userID` int NOT NULL,
  `paymentID` int NOT NULL,
  `paymentref` varchar(50) NOT NULL,
  `amountPaid` decimal(10,0) NOT NULL,
  `grandTotal` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`),
  KEY `userID` (`userID`),
  KEY `paymentID` (`paymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `orderDate`, `orderNum`, `customerID`, `userID`, `paymentID`, `paymentref`, `amountPaid`, `grandTotal`, `balance`) VALUES
(3, '2024-03-04 00:26:00', 'AA11', 1, 5, 2, 'AA11', '2411', '0', '241'),
(4, '2024-03-04 00:29:00', 'FFF123', 7, 5, 1, 'FGG123', '151511111', '0', '10'),
(5, '2024-04-16 12:50:00', 'OR123', 12, 5, 1, 'PAY123', '100', '160', '60'),
(6, '2024-04-02 13:31:00', 'FFFF123', 4, 5, 3, 'FFFF123aa', '800', '800', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitem`
--

DROP TABLE IF EXISTS `tbl_orderitem`;
CREATE TABLE IF NOT EXISTS `tbl_orderitem` (
  `orderitemID` int NOT NULL AUTO_INCREMENT,
  `orderID` int NOT NULL,
  `prodID` int NOT NULL,
  `origPrice` decimal(10,0) NOT NULL,
  `salePrice` decimal(10,0) NOT NULL,
  `discountedPrice` decimal(10,0) NOT NULL,
  `discountAmount` decimal(10,0) NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`orderitemID`),
  KEY `orderID` (`orderID`),
  KEY `prodID` (`prodID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orderitem`
--

INSERT INTO `tbl_orderitem` (`orderitemID`, `orderID`, `prodID`, `origPrice`, `salePrice`, `discountedPrice`, `discountAmount`, `qty`) VALUES
(2, 5, 3, '100', '180', '80', '20', 2),
(3, 6, 3, '200', '250', '0', '0', 4),
(4, 6, 4, '100', '150', '50', '50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `paymentID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prodID` int NOT NULL AUTO_INCREMENT,
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
  `isRepackage` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`prodID`),
  KEY `warehouseID` (`warehouseID`),
  KEY `categoryID` (`categoryID`),
  KEY `subCategoryID` (`subCategoryID`),
  KEY `classificationID` (`classificationID`),
  KEY `colorID` (`colorID`),
  KEY `seasonID` (`seasonID`),
  KEY `uomID` (`uomID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prodID`, `categoryID`, `subCategoryID`, `prodCode`, `prodName`, `shortDesc`, `fullDesc`, `classificationID`, `colorID`, `rackID`, `seasonID`, `uomID`, `warehouseID`, `origPrice`, `salePrice`, `discountedPrice`, `lowQty`, `highQty`, `runningBal`, `isRepackage`) VALUES
(1, 2, 1, 'PR111', 'Test Prod 111', 'Short Desc', 'Full Desc', 4, 14, 1, 1, 3, 1, '20', '15', '5', 50, 80, 80, 0),
(2, 4, 0, 'SAM123', 'Same Same', 'descd', 'desc', 5, 23, 2, 2, 3, 2, '10', '5', '5', 50, 80, 78, 0),
(3, 3, 3, 'RP333', 'Repack 3', 'repack 3', 'repack 3', 1, 14, 1, 3, 3, 1, '100', '50', '50', 30, 80, 94, 1),
(4, 3, 4, 'GMA123', 'SubCat Test', 'SubCat Test', 'SubCat Test', 1, 14, 1, 3, 3, 1, '100', '50', '50', 60, 60, 25, 0),
(10, 3, 3, 'RP14Apr', 'RP14Apr', 'RP14Apr', 'RP14Apr', 1, 14, 1, 3, 3, 1, '100', '50', '50', 30, 60, 2, 1),
(11, 3, 3, 'TodayRP', 'TodayRP', 'TodayRP', 'TodayRP', 1, 14, 1, 3, 3, 1, '100', '50', '50', 30, 60, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rack`
--

DROP TABLE IF EXISTS `tbl_rack`;
CREATE TABLE IF NOT EXISTS `tbl_rack` (
  `rackID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`rackID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_received`;
CREATE TABLE IF NOT EXISTS `tbl_received` (
  `receivedID` int NOT NULL AUTO_INCREMENT,
  `receivedDate` datetime NOT NULL,
  `userID` int NOT NULL,
  `notes` text NOT NULL,
  `isPosted` tinyint(1) NOT NULL,
  `grandTotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`receivedID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_received`
--

INSERT INTO `tbl_received` (`receivedID`, `receivedDate`, `userID`, `notes`, `isPosted`, `grandTotal`) VALUES
(1, '2024-04-01 07:21:32', 5, 'sample received', 1, '800'),
(2, '2024-04-10 13:43:58', 5, 'sample received', 1, '200');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiveditem`
--

DROP TABLE IF EXISTS `tbl_receiveditem`;
CREATE TABLE IF NOT EXISTS `tbl_receiveditem` (
  `receiveditemID` int NOT NULL AUTO_INCREMENT,
  `receivedID` int NOT NULL,
  `prodID` int NOT NULL,
  `origPrice` decimal(10,0) NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`receiveditemID`),
  KEY `receivedID` (`receivedID`),
  KEY `prodID` (`prodID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_receiveditem`
--

INSERT INTO `tbl_receiveditem` (`receiveditemID`, `receivedID`, `prodID`, `origPrice`, `qty`) VALUES
(1, 1, 1, '20', 20),
(2, 1, 2, '10', 40),
(3, 2, 4, '100', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repackageitem`
--

DROP TABLE IF EXISTS `tbl_repackageitem`;
CREATE TABLE IF NOT EXISTS `tbl_repackageitem` (
  `repackageitemID` int NOT NULL AUTO_INCREMENT,
  `repackage_prodID` int NOT NULL,
  `single_prodID` int NOT NULL,
  `prodGroup` int NOT NULL,
  `prodQty` int NOT NULL,
  PRIMARY KEY (`repackageitemID`),
  KEY `prodID` (`single_prodID`),
  KEY `repackageID` (`repackage_prodID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_repackageitem`
--

INSERT INTO `tbl_repackageitem` (`repackageitemID`, `repackage_prodID`, `single_prodID`, `prodGroup`, `prodQty`) VALUES
(16, 10, 2, 1, 2),
(17, 11, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_season`
--

DROP TABLE IF EXISTS `tbl_season`;
CREATE TABLE IF NOT EXISTS `tbl_season` (
  `seasonID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`seasonID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subCategoryID` int NOT NULL AUTO_INCREMENT,
  `categoryID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`subCategoryID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_supplier`;
CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `supplierID` int NOT NULL AUTO_INCREMENT,
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
  `econtactMobile` varchar(50) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplierID`, `name`, `email`, `mobile`, `phone`, `address`, `address2`, `city`, `province`, `zipcode`, `country`, `econtactPerson`, `econtactEmail`, `econtactMobile`) VALUES
(1, 'PMC Printing Press', 'naw@yahoo.com', '09222159967', 'na', '#105 4th St Bel; 9th and 10th ave caloocan city', 'na', 'Caloocan', 'NCR', 0, 'Philippines', 'Sherry', 'sa@yahoo.com', '09222159967'),
(3, 'china', 'na@yahoo.com', 'na', 'na', 'china', 'china', 'china', 'na', 5154, 'china', 'na', 'na@yahoo.com', 'na'),
(4, 'Megaworld Trucking Services Corp', 'na@yahoo.com', 'na', 'na', '6243 sevilla st; del pan tondo, manila', 'na', 'Manila', 'NCR', 0, 'Philippines', 'na', 'na@google.com', 'na'),
(5, 'SP101', 'SP101@gmail.com', '1243587654', '12345678908', 'SP101', 'SP101', 'SP101', 'SP101', 123, 'SP101', 'SP101', 'SP101@gmail.com', '23453234234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplieritem`
--

DROP TABLE IF EXISTS `tbl_supplieritem`;
CREATE TABLE IF NOT EXISTS `tbl_supplieritem` (
  `supplieritemID` int NOT NULL AUTO_INCREMENT,
  `supplierID` int NOT NULL,
  `prodCode` varchar(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `prodDetails` varchar(200) NOT NULL,
  `origPrice` decimal(10,0) NOT NULL,
  PRIMARY KEY (`supplieritemID`),
  KEY `supplierID` (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_supplieritem`
--

INSERT INTO `tbl_supplieritem` (`supplieritemID`, `supplierID`, `prodCode`, `prodName`, `prodDetails`, `origPrice`) VALUES
(1, 5, 'Pitem1', 'Pitem1aaa', 'Pitem1aaaffff', '10'),
(3, 5, 'Ass', 'Dvv', 'asd', '23'),
(4, 5, 'Test123', 'New Product', 'New Product', '50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uom`
--

DROP TABLE IF EXISTS `tbl_uom`;
CREATE TABLE IF NOT EXISTS `tbl_uom` (
  `uomID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`uomID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_uom`
--

INSERT INTO `tbl_uom` (`uomID`, `name`) VALUES
(3, 'Dozen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `departmentID` int NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `tbl_warehouse`;
CREATE TABLE IF NOT EXISTS `tbl_warehouse` (
  `warehouseID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`warehouseID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`warehouseID`, `name`) VALUES
(1, 'Warehouse 1'),
(2, 'Warehouse 2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
