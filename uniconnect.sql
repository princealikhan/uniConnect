-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2015 at 06:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uniconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `admin` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `subdate` date NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`aid`, `title`, `desc`, `doc`, `subdate`) VALUES
(1, 'sadfa', 'asddf', '2015-03-17', '2015-03-23'),
(2, 'new', 'php', '2015-03-23', '2015-03-23'),
(3, 'sadf', 'adsf', '2015-03-20', '2015-03-20'),
(4, 'Mobile Computing', 'Unit 3 One mark', '2015-03-31', '2015-03-31'),
(5, 'MMS Ass', 'MMS Third assignment', '2015-03-29', '2015-03-29'),
(6, 'cns', 'cns assignment', '2015-03-25', '2015-03-25'),
(7, 'mc', 'hjhk', '0002-12-02', '0002-12-02'),
(8, 'mc', 'addfadsfds', '2012-02-02', '2012-02-02'),
(9, 'mc', 'kljcsk', '2012-02-02', '2012-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dept_Id` int(11) NOT NULL,
  `Dept_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Dept_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `accept` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `uid`, `fid`, `accept`) VALUES
(1, 11111, 46473, 0),
(2, 11111, 46539, 0),
(3, 11111, 46539, 0),
(4, 46407, 11111, 0),
(5, 11111, 46407, 0);

-- --------------------------------------------------------

--
-- Table structure for table `friend_array`
--

CREATE TABLE IF NOT EXISTS `friend_array` (
  `fid` int(10) DEFAULT NULL,
  `u_id` int(10) NOT NULL DEFAULT '0',
  `fri_id` int(10) DEFAULT NULL,
  `accept` int(10) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `nid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `title`, `date`, `desc`) VALUES
(1, 'College Leave', '2015-03-12', 'College will be close due to heavy rain according to government.'),
(2, 'Project Submission', '2015-03-13', 'sldkfjladskjfkljadsklfjdsklajlkdsaj;lkasdj'),
(3, 'Class on Saturday', '2015-03-13', 'This Saturday will be working day 04/042015'),
(4, 'today leave', '2015-03-13', 'due to heavy rain'),
(5, 'no need come college', '2015-03-13', 'whose login this website no need to come college other have to attend'),
(6, 'today holiday', '2015-03-16', 'due to heavy rain');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Reg_No` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Batch` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Street` varchar(60) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `Created` int(1) DEFAULT NULL,
  `Dept_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Reg_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Reg_No`, `Name`, `Batch`, `DOB`, `Email`, `Password`, `Street`, `City`, `State`, `Contact_No`, `Country`, `Created`, `Dept_Id`) VALUES
(5555, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11111, 'Prince Ali Khan', '2010', NULL, 'aaa@bbb.in', 'e10adc3949ba59abbe56e057f20f883e', 'St Thomas Mount', 'Chennai', 'Tamil Nadu', '9940619658', 'lkj', 1, NULL),
(12345, NULL, NULL, NULL, 'slkdjfdlsk@sldkfj.com', '04f8513ac675a0a2b50518c5f5c002a7', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(45555, 'New', NULL, NULL, 'abc@ddd.in', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(46407, 'Sarath', '2012', NULL, 'sarath@hiet.in', 'e10adc3949ba59abbe56e057f20f883e', 'Velechary', 'Chennai', 'Tamil Nadu', '9940619655', 'India', 1, NULL),
(46473, 'Magesh Buddy', '2013', NULL, 'mag@hiet.in', 'e10adc3949ba59abbe56e057f20f883e', 'Velechary', 'Chennai', 'Tamil Nadu', '9042636957', 'India', 1, NULL),
(46479, NULL, NULL, NULL, 'magesh@gmail', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(46539, 'sathan', '2010', NULL, 'sathan@hiet.in', 'b98bba8ab8e7743e6a300f73db321570', 'akll', 'rqrqewre', 'qtw', '6455656', 'gw3', 1, NULL),
(46645, 'sumit', NULL, NULL, 'h@gamil.com', '47bce5c74f589f4867dbd57e9ca9f808', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(46647, 'Prince', NULL, '2015-02-03', 'abc@xyz.in', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(54026, 'Piter', NULL, NULL, 'aaabb@ss.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(55555, NULL, NULL, NULL, 'sathan@hiet.in', 'b98bba8ab8e7743e6a300f73db321570', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(99999, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
