-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2014 at 07:50 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khidmtgar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE IF NOT EXISTS `tblcategories` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`id`, `title`) VALUES
(1, 'Agriculture'),
(2, 'Engineering'),
(3, 'Information Technology'),
(4, 'Health'),
(5, 'Education'),
(6, 'Law');

-- --------------------------------------------------------

--
-- Table structure for table `tblmembers`
--

CREATE TABLE IF NOT EXISTS `tblmembers` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblmembers`
--

INSERT INTO `tblmembers` (`id`, `name`, `email`, `status`) VALUES
(1, '', 'haroon.ishaq@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproblems`
--

CREATE TABLE IF NOT EXISTS `tblproblems` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `picture` varchar(100) NOT NULL,
  `parent_id` int(32) NOT NULL,
  `title` varchar(100) NOT NULL,
  `page_tags` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblproblems`
--

INSERT INTO `tblproblems` (`id`, `picture`, `parent_id`, `title`, `page_tags`, `details`) VALUES
(1, 'problem_in_pakistan_1.jpg', 3, 'Web Based Attendence managment system for Schools and Colleges.', '', 'Web Based Attendence managment system for Schools and Colleges. Web Based Attendence managment system for Schools and Colleges.  ');

-- --------------------------------------------------------

--
-- Table structure for table `tblsolutions`
--

CREATE TABLE IF NOT EXISTS `tblsolutions` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `problem_id` int(32) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblsolutions`
--

INSERT INTO `tblsolutions` (`id`, `problem_id`, `member_id`, `picture`, `details`) VALUES
(1, 1, 'haroon.ishaq@gmail.com', 'solutions_in_pakistan_1.rar', 'Web Based Attendence managment system .. Please call for more help 03325402023'),
(2, 1, 'haroon.ishaq@gmail.com', 'solutions_in_pakistan_2.rar', 'dsfg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
