-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2015 at 06:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `endinmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `image`, `status`) VALUES
(1, 'Christian John S. Alivio', 'cjalivio', 'cjalivio', '1.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `agencyid` varchar(15) NOT NULL,
  `agencyname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `officeno` int(15) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `contactpersonno` int(15) NOT NULL,
  `contactemail` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`agencyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencyprocess`
--

CREATE TABLE IF NOT EXISTS `agencyprocess` (
  `aprocessid` varchar(12) NOT NULL,
  `processname` int(50) NOT NULL,
  `agencyid` varchar(20) NOT NULL,
  `recurrence` varchar(20) NOT NULL,
  `numrec` int(5) NOT NULL,
  `createdon` timestamp NOT NULL,
  `datemodified` timestamp NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`aprocessid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enduser`
--

CREATE TABLE IF NOT EXISTS `enduser` (
  `euid` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `bdate` date NOT NULL,
  PRIMARY KEY (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enduser`
--

INSERT INTO `enduser` (`euid`, `firstname`, `lastname`, `mi`, `address`, `contactno`, `email`, `username`, `password`, `image`, `status`, `bdate`) VALUES
('E0', 'Christian John', 'Alivio', 'S', 'Lahug,Cebu City', '09435663244', 'cjalivio92@gmail.com', 'cjalivio', 'cjalivio', 'E0.jpg', 'Active', '1992-12-14'),
('E1', 'Mark', 'Cabil', 'T', 'Talisay', '7272727272', 'a@gmail.com', 'kianster', 'qwertyuiop', 'avatar.png', 'Active', '1992-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `enduserprocess`
--

CREATE TABLE IF NOT EXISTS `enduserprocess` (
  `euprocessid` varchar(15) NOT NULL,
  `processname` varchar(50) NOT NULL,
  `schedtype` varchar(15) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `datefinished` date NOT NULL,
  `euid` varchar(15) NOT NULL,
  `recurrence` varchar(15) NOT NULL,
  `numrec` int(3) NOT NULL,
  `createdon` timestamp NOT NULL,
  `datemodified` timestamp NOT NULL,
  `agencycopiedfrom` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`euprocessid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enduserprocess`
--

INSERT INTO `enduserprocess` (`euprocessid`, `processname`, `schedtype`, `startdate`, `enddate`, `datefinished`, `euid`, `recurrence`, `numrec`, `createdon`, `datemodified`, `agencycopiedfrom`, `status`) VALUES
('EP0', 'Thesis', '', '0000-00-00', '0000-00-00', '0000-00-00', 'E0', 'Null', 0, '2015-08-15 15:51:53', '2015-08-15 15:51:53', 'None', 'Deactivated'),
('EP1', 'Police Clearance12', ' ', '0000-00-00', '0000-00-00', '0000-00-00', 'E0', 'Null', 2, '2015-08-15 15:51:59', '2015-08-15 15:53:38', 'NBI123', 'Active'),
('EP2', 'House Loan', '', '0000-00-00', '0000-00-00', '0000-00-00', 'E0', 'Null', 0, '2015-08-15 15:52:07', '2015-08-15 15:52:07', 'SSS', 'Active'),
('EP3', 'Car Loan', '', '0000-00-00', '0000-00-00', '0000-00-00', 'E0', 'Null', 0, '2015-08-15 15:52:12', '2015-08-15 15:52:12', 'Pag-ibig', 'Active'),
('EP4', 'Police Clearance', '', '0000-00-00', '0000-00-00', '0000-00-00', 'E1', 'Null', 0, '2015-08-15 15:52:23', '2015-08-15 15:52:23', '', 'Deactivated'),
('EP5', '1', ' ', '0000-00-00', '0000-00-00', '0000-00-00', 'E1', 'Null', 0, '2015-08-15 15:52:30', '2015-08-15 15:54:28', '', 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `filemedia`
--

CREATE TABLE IF NOT EXISTS `filemedia` (
  `filemediaid` int(15) NOT NULL AUTO_INCREMENT,
  `file` varchar(50) NOT NULL,
  `filetype` varchar(25) NOT NULL,
  `tagforid` int(15) NOT NULL,
  `status` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  PRIMARY KEY (`filemediaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `planid` int(5) NOT NULL AUTO_INCREMENT,
  `plandesc` varchar(50) NOT NULL,
  `rate` int(10) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`planid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planid`, `plandesc`, `rate`, `usertype`, `status`) VALUES
(1, 'Monthly', 100, 'Agency', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `reqid` int(15) NOT NULL AUTO_INCREMENT,
  `reqname` varchar(50) NOT NULL,
  `createdon` date NOT NULL,
  `copyno` int(3) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `reqstatus` varchar(20) NOT NULL,
  `processid` varchar(15) NOT NULL,
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`reqid`, `reqname`, `createdon`, `copyno`, `notes`, `reqstatus`, `processid`) VALUES
(4, 'cedula', '2015-08-08', 1, '', 'unchecked', 'EP1'),
(5, 'barangay clearance', '2015-08-08', 1, '', 'unchecked', 'EP1'),
(6, 'Barangay Clearance', '2015-08-15', 1, '', 'unchecked', 'EP5'),
(7, 'Cedula', '2015-08-15', 1, '', 'unchecked', 'EP5');

-- --------------------------------------------------------

--
-- Table structure for table `steprequired`
--

CREATE TABLE IF NOT EXISTS `steprequired` (
  `steprequiredid` int(15) NOT NULL AUTO_INCREMENT,
  `stepid` int(15) NOT NULL,
  `reqid` int(15) NOT NULL,
  PRIMARY KEY (`steprequiredid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `steprequired`
--

INSERT INTO `steprequired` (`steprequiredid`, `stepid`, `reqid`) VALUES
(3, 27, 4),
(5, 45, 6),
(6, 45, 7);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE IF NOT EXISTS `steps` (
  `stepid` int(15) NOT NULL AUTO_INCREMENT,
  `stepdesc` varchar(500) NOT NULL,
  `createon` date NOT NULL,
  `stepseqno` int(3) NOT NULL,
  `stepstatus` varchar(20) NOT NULL,
  `parentstepid` varchar(15) NOT NULL,
  `processid` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`stepid`),
  KEY `stepseqno` (`stepseqno`),
  KEY `stepseqno_2` (`stepseqno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`stepid`, `stepdesc`, `createon`, `stepseqno`, `stepstatus`, `parentstepid`, `processid`, `status`) VALUES
(26, 'Go to Police station and submit all the requirements......', '2015-08-08', 1, 'hold', '', 'EP1', 'Deactivated'),
(27, 'Go to Police Station and pass you''re requirements to get the clearance.', '2015-08-08', 2, 'hold', '', 'EP1', 'Active'),
(28, 'dsadasdasdsadas', '2015-08-14', 3, 'hold', '', 'EP1', 'Active'),
(29, 'dsadasdasdas321312321', '2015-08-14', 4, 'hold', '', 'EP1', 'Active'),
(31, 'dsadasdsadasdasdas', '2015-08-15', 5, 'hold', '', 'EP1', 'Active'),
(41, 'dsadsadasdas21321312312dsadas1321312', '2015-08-15', 0, 'hold', '27', '', 'Active'),
(44, 'dsadsadasdsa12312312', '2015-08-15', 0, 'hold', '27', '', 'Active'),
(45, 'WA KOY NAHUNA HUNAAN', '2015-08-15', 1, 'hold', '', 'EP5', 'Active'),
(46, 'sdgsdhdhg', '2015-08-15', 2, 'hold', '', 'EP5', 'Deactivated'),
(47, 'IKA DUHA NGA STEP', '2015-08-15', 3, 'hold', '', 'EP5', 'Active'),
(48, 'ika tulo', '2015-08-15', 4, 'hold', '', 'EP5', 'Active'),
(49, '1 sub 1', '2015-08-15', 0, 'hold', '45', '', 'Deactivated'),
(50, '2 sub', '2015-08-15', 0, 'hold', '45', '', 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `stepscopre`
--

CREATE TABLE IF NOT EXISTS `stepscopre` (
  `copreid` int(15) NOT NULL AUTO_INCREMENT,
  `stepid` int(15) NOT NULL,
  `type` varchar(20) NOT NULL,
  `coprestepid` int(15) NOT NULL,
  PRIMARY KEY (`copreid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stepscopre`
--

INSERT INTO `stepscopre` (`copreid`, `stepid`, `type`, `coprestepid`) VALUES
(3, 27, 'Corequisite', 29);

-- --------------------------------------------------------

--
-- Table structure for table `subscribedprocess`
--

CREATE TABLE IF NOT EXISTS `subscribedprocess` (
  `spid` int(15) NOT NULL,
  `aprocessid` varchar(15) NOT NULL,
  `euid` varchar(15) NOT NULL,
  `schedtype` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `datefinished` date NOT NULL,
  `datesubscribed` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`spid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subid` int(5) NOT NULL AUTO_INCREMENT,
  `subscribedby` varchar(50) NOT NULL,
  `planid` int(5) NOT NULL,
  `numsubscription` int(5) NOT NULL,
  `totalamount` int(10) NOT NULL,
  `paypalactno` varchar(50) NOT NULL,
  `dateapplied` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
