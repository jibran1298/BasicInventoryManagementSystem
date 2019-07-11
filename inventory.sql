-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2019 at 07:06 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `minimum` int(11) NOT NULL,
  `shelf` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `added_date` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `shelf` (`shelf`,`supplier`),
  KEY `supplier` (`supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `barcode`, `name`, `quantity`, `minimum`, `shelf`, `supplier`, `added_date`) VALUES
(17, 23223, 'Lays', 88, 75, 1, 5, '2019-05-27'),
(22, 1101010, 'Dalda Cooking Oil', 250, 500, 1, 6, '2019-05-28'),
(23, 11010101, 'Surf Excel', 90, 75, 8, 6, '2019-05-28'),
(24, 1001001, 'Rooh Afza', 98, 75, 10, 9, '2019-05-28'),
(25, 12100020, 'Sandal', 56, 50, 10, 9, '2019-05-28'),
(26, 1220022, 'Coca Cola', 990, 1000, 1, 7, '2019-05-28'),
(27, 122222, 'Wavy', 50, 40, 10, 5, '2019-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

DROP TABLE IF EXISTS `shelf`;
CREATE TABLE IF NOT EXISTS `shelf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `number`) VALUES
(1, 'A1'),
(8, 'A2'),
(10, 'A3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `contact`, `address`, `status`) VALUES
(5, 'Pepsi', '042-28447292', 'Gulberg,Lahore', 1),
(6, 'Unilever', '090078601', 'Karachi, Pakistan', 1),
(7, 'Coca cola', '090078611', 'Karachi, Pakistan', 1),
(8, 'Qarshi', '010101001', 'Karachi, Pakistan', 1),
(9, 'Hamdard', '110101000', 'Gulberg,Lahore', 1),
(10, 'Nestle', '+162678122222', 'Massachusetts, USA', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`shelf`) REFERENCES `shelf` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
