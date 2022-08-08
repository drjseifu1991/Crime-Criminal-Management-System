-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2022 at 07:43 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

DROP TABLE IF EXISTS `accident`;
CREATE TABLE IF NOT EXISTS `accident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funame_vihecle_owner` varchar(100) NOT NULL,
  `driver_licence` varchar(100) NOT NULL,
  `vehicle_board_no` varchar(100) NOT NULL,
  `crime_level` varchar(100) NOT NULL,
  `accident_date` datetime NOT NULL,
  `crime_type` varchar(1000) NOT NULL,
  `session` int(11) NOT NULL,
  `punishment_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accident_ibfk_1` (`session`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accident`
--

INSERT INTO `accident` (`id`, `funame_vihecle_owner`, `driver_licence`, `vehicle_board_no`, `crime_level`, `accident_date`, `crime_type`, `session`, `punishment_type`, `description`) VALUES
(1, 'fdrt', 'rjkkg', 'fgjijkfd', 'fcvb', '2022-07-07 00:00:00', 'ttrert', 11, '', ''),
(2, 'dbnxvc', 'sdfg', 'esfdgfd', 'sdfgf', '2022-07-14 00:00:00', 'wfghhfds', 11, '', ''),
(3, 'ddk', 'dsdkjd', 'djjdk', 'djjd', '2022-07-15 00:00:00', 'djjdk', 11, '', ''),
(4, 'Abeba Kebedenn', 'AA 2384489', '03 84847', 'High', '2022-08-25 00:00:00', 'Accident', 1, 'High', 'kdsjksd'),
(5, 'High', 'Bdu1010976', 'Minibas', 'Bahir Dar', '2022-07-05 00:00:00', 'Car Accident', 1, '', ''),
(6, 'Dereje', 'Dereje', 'Dereje', 'Dereje', '2022-07-01 00:00:00', 'Dereje', 1, 'Dereje', 'Dereje'),
(7, 'nan sam', '90944475', '984', 'High', '2022-08-19 00:00:00', 'High', 12, 'High', 'edjekdjdk'),
(8, 'Hanna', '900', '87', 'low', '2022-08-19 00:00:00', 'low', 12, 'low', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `accusation`
--

DROP TABLE IF EXISTS `accusation`;
CREATE TABLE IF NOT EXISTS `accusation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crime_type` varchar(100) NOT NULL,
  `crime_level` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accusation`
--

INSERT INTO `accusation` (`id`, `crime_type`, `crime_level`, `description`, `user_id`) VALUES
(1, 'High', 'High', 'I don know', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accused`
--

DROP TABLE IF EXISTS `accused`;
CREATE TABLE IF NOT EXISTS `accused` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(50) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `crime` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `accused_zone` (`zone`),
  KEY `accused_woreda` (`woreda`),
  KEY `accused_kebele` (`kebele`),
  KEY `accused_region` (`region`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accused`
--

INSERT INTO `accused` (`id`, `fname`, `mname`, `lname`, `gender`, `age`, `mobile`, `nationality`, `region`, `zone`, `woreda`, `kebele`, `elevel`, `mstatus`, `religion`, `job`, `crime`, `datetime`, `photo`, `description`) VALUES
(1, 'Dereje', 'Seifu', 'Dereje', 'male', 11, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 21:01:09', NULL, 'sdfds'),
(2, 'Taddese', 'Abebe', 'Abera', 'male', 30, '0988765445', 'Ethiopia', 1, 1, 1, 1, 'University', 'Married', 'orthodox', 'Employee', 'High', '2022-07-22 20:02:46', NULL, 'Bahir Dar');

-- --------------------------------------------------------

--
-- Table structure for table `accuser`
--

DROP TABLE IF EXISTS `accuser`;
CREATE TABLE IF NOT EXISTS `accuser` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(15) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `crime` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accuser_zone` (`zone`),
  KEY `accuser_woreda` (`woreda`),
  KEY `accuser_region` (`region`),
  KEY `accuser_kebele` (`kebele`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accuser`
--

INSERT INTO `accuser` (`id`, `fname`, `mname`, `lname`, `gender`, `age`, `mobile`, `nationality`, `region`, `zone`, `woreda`, `kebele`, `elevel`, `mstatus`, `religion`, `job`, `crime`, `datetime`, `description`, `photo`) VALUES
(1, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 20:43:17', 'efdsaas', NULL),
(2, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 20:46:20', 'ewqe', NULL),
(3, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 20:52:22', 'dsdsd', NULL),
(4, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 20:53:05', 'dserres', NULL),
(5, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'Simple', '2022-07-08 20:55:09', 'dcfdx', NULL),
(6, 'Dereje', 'Seifu', 'Dereje', 'male', 22, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Married', 'orthodox', 'Student', 'Simple', '2022-07-12 15:15:23', 'jhgfd', NULL),
(7, 'Dereje', 'Seifu', 'Dereje', 'male', 23, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'orthodox', 'Student', 'High', '2022-07-13 20:16:50', 'kfjkodld', NULL),
(8, 'Abebe', 'Taddese', 'Abera', 'male', 30, '0954536555', 'Ethiopia', 2, 1, 1, 1, 'College', 'Married', 'orthodox', 'Employee', 'Simple', '2022-07-22 20:01:29', 'Bahir Dar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_role`
--

DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE IF NOT EXISTS `auth_role` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `role_id` int(15) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_role_role` (`role_id`),
  KEY `auth_role_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_role`
--

INSERT INTO `auth_role` (`id`, `user_id`, `role_id`, `description`) VALUES
(1, 1, 7, NULL),
(3, 10, 3, NULL),
(4, 11, 8, NULL),
(7, 12, 1, NULL),
(8, 13, 6, NULL),
(10, 14, 2, NULL),
(11, 16, 5, NULL),
(12, 17, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `comment`, `datetime`) VALUES
(1, 1, 'Hello', '2022-07-30 21:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casee` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `casee`, `date_time`, `description`, `user_id`) VALUES
(1, 'I don know', '2022-07-30 21:48:05', 'I don know', 1),
(2, 'hello', '2022-07-31 15:53:11', 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

DROP TABLE IF EXISTS `crime`;
CREATE TABLE IF NOT EXISTS `crime` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `accuser_id` int(15) NOT NULL,
  `accused_id` int(15) NOT NULL,
  `witness_1` int(15) DEFAULT NULL,
  `controller` int(15) NOT NULL,
  `ctype` varchar(100) NOT NULL,
  `clevel` varchar(100) NOT NULL,
  `rdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `witness_2` int(11) DEFAULT NULL,
  `witness_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crime_accused` (`accused_id`),
  KEY `crime_accuser` (`accuser_id`),
  KEY `crime_users` (`controller`),
  KEY `crime_witness` (`witness_1`),
  KEY `witness 2` (`witness_2`),
  KEY `witness 3` (`witness_3`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`id`, `accuser_id`, `accused_id`, `witness_1`, `controller`, `ctype`, `clevel`, `rdatetime`, `file`, `description`, `witness_2`, `witness_3`) VALUES
(1, 1, 1, 1, 1, 'simple', 'high', '2022-07-27 00:00:00', NULL, 'dssdddfsd', 1, 1),
(2, 2, 1, 1, 1, 'fedwefrg', 'fdwert', '2022-07-28 00:00:00', '', 'fddfgfds', 1, 1),
(3, 1, 1, 1, 1, 'simple', 'high', '2022-07-27 00:00:00', 'cartoon-summer-background-landscape-steppe-mountains-125428790.jpg', 'dfghjnkml', 1, 1),
(4, 2, 2, 2, 10, 'simple', 'high', '2022-07-25 00:00:00', 'download.pdf', 'Car accident', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

DROP TABLE IF EXISTS `criminal`;
CREATE TABLE IF NOT EXISTS `criminal` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `kebele` varchar(100) NOT NULL,
  `crime_type` varchar(100) NOT NULL,
  `crime_level` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`id`, `fname`, `lname`, `city`, `kebele`, `crime_type`, `crime_level`, `description`, `file`, `user_id`, `status`) VALUES
(1, 'Dereje', 'Dereje', 'Sendafa', '02', 'High', 'High', 'I don know', '', 1, 'Arrested');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `name`, `datetime`, `description`) VALUES
(1, 'fbvkvvfvnfvnf', '2022-06-13 00:05:52', 'jkfjfnvdmnjnf');

-- --------------------------------------------------------

--
-- Table structure for table `kebele`
--

DROP TABLE IF EXISTS `kebele`;
CREATE TABLE IF NOT EXISTS `kebele` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `woreda_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `woreda_id` (`woreda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kebele`
--

INSERT INTO `kebele` (`id`, `woreda_id`, `name`, `description`) VALUES
(1, 1, 'Mehale Meda', 'Mehale Meda');

-- --------------------------------------------------------

--
-- Table structure for table `missing_criminal`
--

DROP TABLE IF EXISTS `missing_criminal`;
CREATE TABLE IF NOT EXISTS `missing_criminal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_criminal`
--

INSERT INTO `missing_criminal` (`id`, `fname`, `lname`, `photo`, `city`, `kebele`, `date`, `description`, `user_id`) VALUES
(2, 'Dereje', 'Dereje', '', 'Sendafa', 'gfgdfdf', '2022-07-21', 'asdfghj', 1),
(3, 'Dereje', 'Dereje', '', 'Sendafa', 'Arba Arat', '2022-08-09', 'dkxm', 12),
(4, 'Dereje', 'Dereje', '', 'Sendafa', 'Arba Arat', '2022-08-24', 'fgvb', 12),
(5, 'Dereje', 'Dereje', 'betlehemAlemu1.jpg', 'Sendafa', 'Sebdaaf', '2022-08-24', 'fghbjnkm', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nomination`
--

DROP TABLE IF EXISTS `nomination`;
CREATE TABLE IF NOT EXISTS `nomination` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `ntype` varchar(100) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `village` varchar(100) NOT NULL,
  `ndatetime` datetime NOT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `nomination_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nomination`
--

INSERT INTO `nomination` (`id`, `user_id`, `ntype`, `kebele`, `village`, `ndatetime`, `file`, `description`, `datetime`) VALUES
(1, 10, 'Sendafa Bake Addis Abeba', 'Sendafa', 'Bake', '2022-06-22 22:38:43', 'This helps you to display your error so you would be able to find out the exact reason a query is not working. ', 'This helps you to display your error so you would be able to find out the exact reason a query is not working. This is helpful when you are using conditions or trying to find specific columns in a table. Tired eyes can make you skip the fact that a particular column is not on your current database and other factors that you can casually overlook when writing a query. If your e', '2022-06-16 22:38:43'),
(2, 1, 'hello', 'bake', 'Addis ketema', '2022-07-06 00:00:00', '61SzrFgktsL._AC_SL1200_.jpg', 'This is for trail!', '2022-07-04 09:16:30'),
(3, 1, 'Hello1', 'Sendafa', 'Sategn Meda', '2022-07-06 00:00:00', '61yl8juaArL._AC_SL1200_.jpg', 'This for checking if the code is work correctly as we imagined it.', '2022-07-04 09:23:11'),
(4, 1, 'Hello2', 'Arba Arat', 'Dabee', '2022-07-06 00:00:00', 'lorem.txt', 'This for checking if the system take txt file as input.', '2022-07-04 09:27:24'),
(5, 1, 'Hello3', 'Asera Arat', 'Fenote', '2022-07-14 00:00:00', 'ALX SE Programme Guide_2022.pdf', 'This for checking eco message after successfully adding nomination.', '2022-07-04 09:33:08'),
(6, 1, 'Car accidient', 'Bahir dar', 'Eferata', '2022-07-05 00:00:00', 'handy men 2.png', 'Car accidient was happen because of lazyness of driver', '2022-07-07 20:13:36'),
(7, 1, 'gklglk', 'Arba Arat', 'gfdsf', '2022-07-19 00:00:00', 'handy men 1.png', 'deww', '2022-07-08 21:49:41'),
(8, 1, 'gklglk', 'Arba Arat', 'gfdsf', '2022-07-14 00:00:00', 'handy men 1.png', 'ewqe', '2022-07-08 21:50:21'),
(9, 11, 'gklglk', 'Arba Arat', 'Dabee', '2022-07-20 00:00:00', 'handy men 1.png', 'sdfg', '2022-07-08 21:53:05'),
(10, 11, 'gklglk', 'frezsae', 'gfdsf', '2022-07-26 00:00:00', 'handy men 2.png', 'swdserd', '2022-07-08 21:54:08'),
(11, 10, 'gklglk', 'Arba Arat', 'gfdsf', '2022-07-06 00:00:00', '', 'sdfghj', '2022-07-10 19:16:43'),
(12, 10, 'gklglk', 'Arba Arat', 'gfdsf', '2022-07-07 00:00:00', '', 'sdfghjk', '2022-07-10 19:17:30'),
(13, 10, 'gklglk', 'Arba Arat', 'Hana', '2022-07-21 00:00:00', '', 'Haana', '2022-07-10 19:18:14'),
(14, 10, 'ytreg', 'htgffg', 'hgfdfb', '2022-07-20 00:00:00', '', 'gggggggggggggggggg', '2022-07-10 21:57:06'),
(15, 1, 'Type1', '14', 'Bahir Dar', '2022-07-05 00:00:00', 'cartoon-summer-background-landscape-steppe-mountains-125428790.jpg', 'bahir dar', '2022-07-22 19:56:03'),
(16, 11, 'Car accidient', '14', 'Fenote', '2022-07-06 00:00:00', '', 'Car accident', '2022-07-22 20:05:36'),
(17, 11, 'Car accidient', 'Arba Arat', 'Fenote', '2022-07-05 00:00:00', '', 'Car Accident', '2022-07-22 20:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `notice` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `datetime`, `description`) VALUES
(1, 'dsbnx', '2022-07-10 15:59:23', 'sbnxz'),
(2, 'kjs', '2022-07-10 15:59:59', 'skks'),
(3, 'sdfghj', '2022-07-10 19:23:37', 'dfghjkljhanna'),
(4, 'oiuytr', '2022-07-12 15:16:53', 'yoituruggggggggggg'),
(5, 'Meeting', '2022-07-22 20:07:35', 'come to meeting'),
(6, 'Car accident', '2022-07-22 20:13:56', 'Car Accident');

-- --------------------------------------------------------

--
-- Table structure for table `penality`
--

DROP TABLE IF EXISTS `penality`;
CREATE TABLE IF NOT EXISTS `penality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `person_id` varchar(20) NOT NULL,
  `car_type` varchar(100) NOT NULL,
  `car_id` varchar(100) NOT NULL,
  `case_type` varchar(100) NOT NULL,
  `penality_date` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `session` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penality`
--

INSERT INTO `penality` (`id`, `fname`, `lname`, `person_id`, `car_type`, `car_id`, `case_type`, `penality_date`, `amount`, `description`, `session`) VALUES
(1, 'Dereje', 'Aserat', 'dfghjk', 'ghjk', 'dfghjk', 'cvbnm', '2022-07-27 00:00:00', 100, 'tfygdshuijokpl', 11),
(2, 'Dereje', 'Aserat', 'dfghjk', 'fgjijkfd', 'rjkkg', 'cvbnm', '2022-08-05 00:00:00', 2000, 'ffjkvnjkvnkf', 11),
(3, 'Abebe', 'Taddesse', 'Bdu1010976', 'Minibas', 'BDU1010976', 'High', '2022-07-26 00:00:00', 1000, 'Traffic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

DROP TABLE IF EXISTS `placement`;
CREATE TABLE IF NOT EXISTS `placement` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kebele` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`id`, `kebele`, `place`, `datetime`, `description`) VALUES
(1, 'Sendafa', 'Addis Abeba', '2022-07-07 21:04:59', 'Ethiopia');

-- --------------------------------------------------------

--
-- Table structure for table `place_history`
--

DROP TABLE IF EXISTS `place_history`;
CREATE TABLE IF NOT EXISTS `place_history` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `up_id` int(15) NOT NULL,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `place_history_up` (`up_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place_history`
--

INSERT INTO `place_history` (`id`, `up_id`, `description`) VALUES
(1, 1, 'sdxfcvbn');

-- --------------------------------------------------------

--
-- Table structure for table `police_order`
--

DROP TABLE IF EXISTS `police_order`;
CREATE TABLE IF NOT EXISTS `police_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(300) NOT NULL,
  `date_time` date NOT NULL,
  `description` text NOT NULL,
  `police_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `police_id` (`police_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_order`
--

INSERT INTO `police_order` (`id`, `place`, `date_time`, `description`, `police_id`) VALUES
(1, 'Bahir Dar', '2022-08-20', 'I don know', 10),
(2, 'tfilkjed', '2022-08-12', 'ldkjxcm', 10);

-- --------------------------------------------------------

--
-- Table structure for table `progress_case`
--

DROP TABLE IF EXISTS `progress_case`;
CREATE TABLE IF NOT EXISTS `progress_case` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `accused_id` int(15) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appo_date` datetime NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `crime_type` varchar(100) NOT NULL,
  `crime_level` varchar(100) DEFAULT NULL,
  `accuser_id` int(11) DEFAULT NULL,
  `witness_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crime_id` (`accused_id`),
  KEY `accuser_id` (`accuser_id`),
  KEY `witness_id` (`witness_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_case`
--

INSERT INTO `progress_case` (`id`, `accused_id`, `datetime`, `appo_date`, `status`, `description`, `crime_type`, `crime_level`, `accuser_id`, `witness_id`) VALUES
(1, 2, '2022-08-02 22:08:05', '2022-08-23 00:00:00', NULL, 'jdsmnx', 'High', NULL, NULL, NULL),
(2, 1, '2022-08-02 22:11:42', '2022-08-04 00:00:00', NULL, 'hgn', 'High', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `description`) VALUES
(1, 'Tigria', 'Tigria'),
(2, 'Amhara', 'Amhara');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `r_case` varchar(200) NOT NULL,
  `r_desc` text NOT NULL,
  `r_date_time` date DEFAULT NULL,
  `r_type` varchar(100) NOT NULL,
  `r_level` varchar(100) NOT NULL,
  `file_r` varchar(200) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `r_case`, `r_desc`, `r_date_time`, `r_type`, `r_level`, `file_r`, `user_id`) VALUES
(1, 'Accident Happeen', 'dfgfhgf', '2022-08-11', 'accident', 'low', 'betlehemAlemu1.jpg', 12),
(2, 'Accident Happeen', 'rfdokld', '2022-08-11', 'crime', 'low', 'betlehemAlemu3.jpg', 1),
(3, 'Accident Happeen', 'edskdk', '2022-08-18', 'crime', 'high', 'betlehemAlemu3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `datetime`, `description`) VALUES
(1, 'Dtective Police', '2021-01-07 22:38:52', NULL),
(2, 'Traffic Police Officer', '2021-01-07 22:39:32', NULL),
(3, 'Preventive Police', '2021-01-07 22:39:58', NULL),
(4, 'Traffic Police', '2021-01-07 22:40:33', NULL),
(5, 'Customer', '2021-01-07 22:41:01', NULL),
(6, 'Head Police', '2022-07-25 18:25:51', NULL),
(7, 'Admin', '2022-08-01 07:21:50', NULL),
(8, 'HR', '2022-08-01 07:22:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` varchar(15) NOT NULL,
  `job` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `gender`, `age`, `job`, `mobile`, `email`, `uname`, `password`, `photo`, `description`) VALUES
(1, 'Abeba', 'Alemu', 'kebede', 'male', '23', 'Student', '0957676745', 'abebe@gmail.com', 'abebe', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(10, 'Abebech', 'Kebede', 'Alemu', 'female', '28', 'Student', '0985457657', 'abebech@gmail.com', 'abebech', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(11, 'Kebede', 'Abebe', 'Alemu', 'male', '25', 'Student', '0957463746', 'kebede@gmail.com', 'kebede', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(12, 'Alemu', 'kebede', 'Abebe', 'male', '27', NULL, '0974787455', 'alemu@gmail.com', 'alemu', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(13, 'Girma', 'Abeba', 'Kebde', 'male', '30', NULL, '0975774444', 'girma@gmail.com', 'girma', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(14, 'Fikadu', 'Girma', 'Kebede', 'male', '35', NULL, '0987763666', 'fikadu@gmail.com', 'fikadu', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(16, 'Yoosef', 'Fikadu', 'Abebe', 'male', '29', NULL, '0975465444', 'yoosef@gmail.com', 'yoosef', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(17, 'Samuel', 'Kebede', 'Abebe', 'male', '28', NULL, '0968877777', 'samuel@gmail.com', 'samuel', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_place`
--

DROP TABLE IF EXISTS `user_place`;
CREATE TABLE IF NOT EXISTS `user_place` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `place_id` int(15) NOT NULL,
  `stime` datetime NOT NULL,
  `ftime` datetime NOT NULL,
  `rtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_place_placement` (`place_id`),
  KEY `user_place_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_place`
--

INSERT INTO `user_place` (`id`, `user_id`, `place_id`, `stime`, `ftime`, `rtime`, `description`) VALUES
(1, 1, 1, '2022-07-19 21:05:23', '2022-07-28 21:05:23', '2022-07-07 21:06:24', 'Ethiopia'),
(14, 1, 1, '2022-08-12 00:00:00', '2022-08-19 00:00:00', '2022-08-02 21:29:46', 'kdk'),
(15, 10, 1, '2022-08-17 00:00:00', '2022-08-18 00:00:00', '2022-08-03 15:16:12', 'dkldklx'),
(16, 11, 1, '2022-08-19 00:00:00', '2022-08-12 00:00:00', '2022-08-03 15:19:27', 'edjnm');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

DROP TABLE IF EXISTS `witness`;
CREATE TABLE IF NOT EXISTS `witness` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(15) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `witness_kebele` (`kebele`),
  KEY `witness_zone` (`zone`),
  KEY `witness_woreda` (`woreda`),
  KEY `witness_region` (`region`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `witness`
--

INSERT INTO `witness` (`id`, `fname`, `mname`, `lname`, `gender`, `age`, `mobile`, `nationality`, `region`, `zone`, `woreda`, `kebele`, `elevel`, `mstatus`, `job`, `religion`, `datetime`, `description`, `photo`) VALUES
(1, 'Dereje', 'Seifu', 'Dereje', 'male', 24, '0966016473', 'Ethiopia', 2, 1, 1, 1, 'University', 'Single', 'Student', 'orthodox', '2022-07-08 21:17:54', 'dfdsdc', NULL),
(2, 'Abera', 'Abebe', 'Taddese', 'male', 30, '0987665544', 'Ethiopia', 2, 1, 1, 1, 'University', 'Married', 'Employee', 'orthodox', '2022-07-22 20:03:52', 'Bahir Dar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `woreda`
--

DROP TABLE IF EXISTS `woreda`;
CREATE TABLE IF NOT EXISTS `woreda` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `zone_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `zone_id` (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `woreda`
--

INSERT INTO `woreda` (`id`, `zone_id`, `name`, `description`) VALUES
(1, 1, 'Menejar', 'Menjar');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

DROP TABLE IF EXISTS `zone`;
CREATE TABLE IF NOT EXISTS `zone` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `region_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `region_id`, `name`, `description`) VALUES
(1, 2, 'Semen Shewa', 'North Shewa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accident`
--
ALTER TABLE `accident`
  ADD CONSTRAINT `accident_ibfk_1` FOREIGN KEY (`session`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accusation`
--
ALTER TABLE `accusation`
  ADD CONSTRAINT `accusation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accused`
--
ALTER TABLE `accused`
  ADD CONSTRAINT `accused_kebele` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_woreda` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_zone` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `accuser`
--
ALTER TABLE `accuser`
  ADD CONSTRAINT `accuser_ibfk_1` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_ibfk_2` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_ibfk_3` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_ibfk_4` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_role`
--
ALTER TABLE `auth_role`
  ADD CONSTRAINT `auth_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_role_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_accused` FOREIGN KEY (`accused_id`) REFERENCES `accused` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_accuser` FOREIGN KEY (`accuser_id`) REFERENCES `accuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`witness_2`) REFERENCES `witness` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_ibfk_2` FOREIGN KEY (`witness_3`) REFERENCES `witness` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_ibfk_3` FOREIGN KEY (`witness_1`) REFERENCES `witness` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_users` FOREIGN KEY (`controller`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criminal`
--
ALTER TABLE `criminal`
  ADD CONSTRAINT `criminal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kebele`
--
ALTER TABLE `kebele`
  ADD CONSTRAINT `kebele_ibfk_1` FOREIGN KEY (`woreda_id`) REFERENCES `woreda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `missing_criminal`
--
ALTER TABLE `missing_criminal`
  ADD CONSTRAINT `missing_criminal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nomination`
--
ALTER TABLE `nomination`
  ADD CONSTRAINT `nomination_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `place_history`
--
ALTER TABLE `place_history`
  ADD CONSTRAINT `place_history_up` FOREIGN KEY (`up_id`) REFERENCES `user_place` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `police_order`
--
ALTER TABLE `police_order`
  ADD CONSTRAINT `police_order_ibfk_1` FOREIGN KEY (`police_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress_case`
--
ALTER TABLE `progress_case`
  ADD CONSTRAINT `progress_case_ibfk_1` FOREIGN KEY (`accused_id`) REFERENCES `accused` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_case_ibfk_2` FOREIGN KEY (`accuser_id`) REFERENCES `accuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_case_ibfk_3` FOREIGN KEY (`witness_id`) REFERENCES `witness` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_place`
--
ALTER TABLE `user_place`
  ADD CONSTRAINT `user_place_placement` FOREIGN KEY (`place_id`) REFERENCES `placement` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_place_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `witness_kebele` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_woreda` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_zone` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `woreda`
--
ALTER TABLE `woreda`
  ADD CONSTRAINT `woreda_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
