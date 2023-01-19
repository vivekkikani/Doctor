-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2022 at 10:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdf_export`
--

-- --------------------------------------------------------

--
-- Table structure for table `admit_details`
--

DROP TABLE IF EXISTS `admit_details`;
CREATE TABLE IF NOT EXISTS `admit_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patients_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `admitdate` date NOT NULL,
  `dischardate` date NOT NULL,
  `fee` float NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admit_details`
--

INSERT INTO `admit_details` (`id`, `patients_id`, `disease_id`, `doctors_id`, `admitdate`, `dischardate`, `fee`, `status`, `created_at`, `update_at`) VALUES
(1, 3, 0, 6, '1981-05-24', '0000-00-00', 28, 1, '2022-11-18 18:28:50', '2022-11-18 18:28:50'),
(2, 3, 1, 6, '2005-05-26', '0000-00-00', 62, 1, '2022-11-18 18:29:00', '2022-11-18 18:29:00'),
(3, 1, 1, 6, '1978-05-24', '0000-00-00', 60, 1, '2022-11-19 11:01:44', '2022-11-19 11:01:44'),
(4, 4, 1, 8, '1993-04-05', '0000-00-00', 94, 1, '2022-11-19 11:59:22', '2022-11-19 11:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

DROP TABLE IF EXISTS `disease`;
CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disease` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `disease`, `created_at`, `update_at`, `status`) VALUES
(1, 'Sequi doloribus libesddsadsadfadaaasadaDad\r\nAFCDFASDFASFAFAFASDSA', '2022-11-18 17:07:43', '2022-11-18 17:09:24', 1),
(2, 'FHSFGSFS\r\nF\\FFSAFasfasfasdfsaf', '2022-11-18 17:07:43', '2022-11-18 17:09:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `moblieno` bigint(10) NOT NULL,
  `fee` float NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `availabletimedoctor` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `address`, `moblieno`, `fee`, `specialization`, `availabletimedoctor`, `created_at`, `update_at`, `status`) VALUES
(5, 'Camilla Key', 'wigyretiz@mailinator.com', 'Reiciendis neque tem', 68, 2, 'Illo harum minima qu', '{\"availabletimedoctor\":[\"02:06\",\"00:37\"],\"time\":[\"10:50\",\"04:41\"]}', '2022-11-17 14:54:50', '2022-11-18 17:10:42', 1),
(6, 'Hu Roman', 'hutiduqux@mailinator.com', 'Sint eveniet error', 23, 91, 'Ipsa sit et cum id ', '{\"availabletimedoctor\":[\"17:53\",\"09:35\"],\"time\":[\"21:55\",\"03:31\"]}', '2022-11-17 14:55:16', '2022-11-18 17:10:49', 1),
(7, 'Denton Rice', 'zuqubowo@mailinator.com', 'Excepturi qui omnis', 81, 44, 'Cupidatat facere con', '{\"availabletimedoctor\":[\"17:22\",\"22:48\"],\"time\":[\"18:15\",\"06:03\"]}', '2022-11-17 14:56:36', '2022-11-18 17:10:57', 1),
(8, 'demo', 'user@gmail.com', 'asdaDA', 5420470454, 24242, '45245324204', '{\"availabletimedoctor\":[\"\"],\"time\":[\"\"]}', '2022-11-17 15:03:52', '2022-11-18 17:11:04', 1),
(9, 'Barry Cain', 'varil@mailinator.com', 'Rem hic dicta minima', 101, 38, 'Ad dolor ipsum ut re', '{\"availabletimedoctor\":[\"19:50\",\"00:16\",\"23:05\"],\"time\":[\"07:50\",\"07:23\",\"02:12\"]}', '2022-11-17 17:25:56', '2022-11-18 17:11:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mname` varchar(200) NOT NULL,
  `mprice` float NOT NULL,
  `mstock` int(11) NOT NULL,
  `manufacturardate` date NOT NULL,
  `expdate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `mname`, `mprice`, `mstock`, `manufacturardate`, `expdate`, `created_at`, `update_at`, `status`) VALUES
(1, 'dada', 137, 57, '2003-09-17', '1989-05-02', '2022-11-17 18:38:24', '2022-11-18 11:01:19', 1),
(8, 'Kimberly Collier', 662, 57, '1974-12-26', '1994-05-26', '2022-11-18 11:28:07', '2022-11-18 11:28:07', 1),
(6, 'Norman Walter', 609, 62, '2017-10-12', '1979-04-22', '2022-11-18 11:28:02', '2022-11-18 11:28:02', 1),
(7, 'Adara Pugh', 458, 88, '2009-08-12', '2016-05-23', '2022-11-18 11:28:04', '2022-11-18 11:28:04', 1),
(9, 'Ivana Mcfadden', 30, 44, '2017-12-15', '1991-11-14', '2022-11-18 11:28:09', '2022-11-18 11:28:09', 1),
(10, 'Kalia Riley', 218, 43, '2022-04-14', '2014-10-09', '2022-11-18 11:28:11', '2022-11-18 11:28:11', 1),
(11, 'Serena Rogers', 346, 94, '1985-05-13', '1999-06-26', '2022-11-18 11:28:13', '2022-11-18 11:28:13', 1),
(12, 'Lawrence Sherman', 802, 48, '1982-10-13', '1970-02-15', '2022-11-18 11:28:15', '2022-11-18 11:28:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1-male 2female 3other',
  `phoneno` bigint(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `age`, `gender`, `phoneno`, `created_at`, `update_at`, `status`) VALUES
(1, 'Lani Hoffman', 'wiwa@mailinator.com', 65, 1, 544655644565, '2022-11-18 12:07:39', '2022-11-18 12:47:10', 1),
(2, 'Tana Clarke', 'pipacynala@mailinator.com', 9, 1, 98, '2022-11-18 17:35:28', '2022-11-18 17:35:28', 1),
(3, 'Tana Clarke', 'pipacynala@mailinator.com', 9, 1, 98, '2022-11-18 17:35:28', '2022-11-18 17:35:28', 1),
(4, 'Rhoda England', 'rolajodebi@mailinator.com', 87, 2, 97, '2022-11-18 17:35:31', '2022-11-18 17:35:31', 1),
(5, 'Clarke Wilkerson', 'rovosen@mailinator.com', 56, 3, 83, '2022-11-18 17:35:34', '2022-11-18 17:35:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL COMMENT '1-admin,2-agent,3-client',
  `is_active` tinyint(4) NOT NULL COMMENT '0-inactive, 1- active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `is_active`, `created_at`) VALUES
(1, 'vivek', 'dev.techokings@gmail.com', '326a8c055c0d04f5b06544665d8bb3ea', 1, 1, '2022-11-12 09:18:11'),
(2, 'demo', 'demo@gmail.com', 'a838eee1e069d8a7a26c84a7b7f0a320', 2, 1, '2022-11-12 09:18:13'),
(3, 'user', 'user@gmail.com', 'dcf25cfe2e93295fd802e79fb9a2172e', 3, 1, '2022-11-12 09:19:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
