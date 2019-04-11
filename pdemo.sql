-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 06:28 PM
-- Server version: 5.5.62
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `schno` int(11) NOT NULL DEFAULT '0',
  `scode` varchar(10) NOT NULL DEFAULT '',
  `semester` int(2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`schno`,`scode`),
  KEY `scode` (`scode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`schno`, `scode`, `semester`, `status`) VALUES
(101, '1', 4, 'P'),
(101, '2', 4, 'P'),
(101, '3', 4, 'P'),
(101, '4', 4, 'P'),
(101, '5', 4, 'A'),
(102, '1', 4, 'P'),
(102, '2', 4, 'A'),
(102, '3', 4, 'P'),
(102, '4', 4, 'A'),
(102, '5', 4, 'P'),
(103, '1', 4, 'A'),
(103, '2', 4, 'A'),
(103, '3', 4, 'P'),
(103, '4', 4, 'P'),
(103, '5', 4, 'A'),
(104, '1', 4, 'P'),
(104, '2', 4, 'A'),
(104, '3', 4, 'P'),
(104, '4', 4, 'P'),
(104, '5', 4, 'A'),
(105, '1', 4, 'P'),
(105, '2', 4, 'A'),
(105, '3', 4, 'P'),
(105, '4', 4, 'A'),
(105, '5', 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `schno` int(11) NOT NULL,
  `stuname` varchar(30) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `section` int(2) DEFAULT NULL,
  PRIMARY KEY (`schno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`schno`, `stuname`, `semester`, `section`) VALUES
(101, 'rahul', 4, 1),
(102, 'shubham coder', 4, 2),
(103, 'munni ', 4, 2),
(104, 'anant', 4, 2),
(105, 'jain sahab', 4, 2),
(201, 'rishabh', 6, 2),
(202, 'siddhi', 6, 2),
(203, 'akshat', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `studied`
--

CREATE TABLE IF NOT EXISTS `studied` (
  `schno` int(11) NOT NULL DEFAULT '0',
  `scode` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`schno`,`scode`),
  KEY `scode` (`scode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studied`
--

INSERT INTO `studied` (`schno`, `scode`) VALUES
(101, '1'),
(102, '1'),
(103, '1'),
(104, '1'),
(105, '1'),
(101, '2'),
(102, '2'),
(103, '2'),
(104, '2'),
(105, '2'),
(101, '3'),
(102, '3'),
(103, '3'),
(104, '3'),
(105, '3'),
(101, '4'),
(102, '4'),
(103, '4'),
(104, '4'),
(105, '4'),
(101, '5'),
(102, '5'),
(103, '5'),
(104, '5'),
(105, '5');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `scode` varchar(10) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`scode`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`scode`, `sname`, `tid`) VALUES
('1', 'dbms', 1),
('2', 'toc', 2),
('3', 'pqt', 3),
('4', 'se', 4),
('5', 'ada', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `tname` varchar(40) NOT NULL,
  `tid` int(11) NOT NULL,
  `tpw` varchar(100) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tname`, `tid`, `tpw`) VALUES
('jtc', 1, 'iamjtc'),
('nilay bhai', 2, 'iamnilaydon'),
('rasool chacha', 3, 'iamcomedian'),
('shreemoyee', 4, 'ihavebf'),
('shweta', 5, 'iamshweta'),
('devansh', 140, '123456'),
('anant', 147, 'joshi'),
('vivek', 150, 'vivek');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`schno`) REFERENCES `student` (`schno`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`scode`) REFERENCES `subject` (`scode`);

--
-- Constraints for table `studied`
--
ALTER TABLE `studied`
  ADD CONSTRAINT `studied_ibfk_1` FOREIGN KEY (`schno`) REFERENCES `student` (`schno`),
  ADD CONSTRAINT `studied_ibfk_2` FOREIGN KEY (`scode`) REFERENCES `subject` (`scode`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`);
