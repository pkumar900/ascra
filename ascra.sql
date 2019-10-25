-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 06:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ascra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `string_password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=blocked',
  `isDeleted` int(11) NOT NULL COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `last_name`, `mobile`, `email`, `password`, `string_password`, `status`, `isDeleted`) VALUES
(1, 'Super', 'Admin', '999999999', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` tinyint(4) NOT NULL COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `name`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 'Php', '2019-10-24 20:25:33', '0000-00-00 00:00:00', 0),
(2, 'Java', '2019-10-24 20:25:53', '2019-10-24 20:28:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` tinyint(4) NOT NULL COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`id`, `name`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 'Oms', '2019-10-23 23:30:43', '2019-10-24 00:22:32', 0),
(2, 'DPS', '2019-10-24 19:48:59', '2019-10-24 19:56:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_mapping`
--

CREATE TABLE `tbl_school_mapping` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=school to course,2=course to schhol',
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_mapping`
--

INSERT INTO `tbl_school_mapping` (`id`, `school_id`, `course_id`, `type`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 1, 1, 1, '2019-10-25 04:54:27', '0000-00-00 00:00:00', 0),
(2, 2, 2, 1, '2019-10-25 04:59:54', '0000-00-00 00:00:00', 0),
(3, 2, 1, 1, '2019-10-25 05:05:20', '0000-00-00 00:00:00', 0),
(4, 1, 1, 2, '2019-10-25 05:35:41', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_mapping`
--
ALTER TABLE `tbl_school_mapping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_school_mapping`
--
ALTER TABLE `tbl_school_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
