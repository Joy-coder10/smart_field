-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 05:26 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--
CREATE DATABASE IF NOT EXISTS `srms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `srms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'milestonetech96@gmail.com', '123456', '2021-09-08 10:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `resets`
--

CREATE TABLE `resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(15) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(12, 'CRECHE', 1, 'LITTLE ANGELS', '2021-10-15 21:51:29', NULL),
(13, 'PLAY GROUP', 1, 'HOLLY HOCK', '2021-10-15 21:52:19', NULL),
(14, 'PLAY GROUP', 2, 'BALSAM', '2021-10-15 21:52:57', NULL),
(15, 'PRESCHOOL ONE', 1, 'SAGE', '2021-10-15 21:53:19', NULL),
(16, 'PRESCHOOL ONE', 1, 'ORCHID', '2021-10-15 21:54:03', NULL),
(17, 'PRESCHOOL TWO', 2, 'BLUE BELL', '2021-10-15 21:54:39', NULL),
(18, 'PRESCHOOL TWO', 2, 'PURPLE TULIP', '2021-10-15 21:55:07', NULL),
(19, 'PRESCHOOL THREE', 3, 'OLIVE', '2021-10-15 21:55:30', NULL),
(20, 'PRESCHOOL THREE', 3, 'ROSEBUD', '2021-10-15 21:55:53', NULL),
(21, 'GRADE ONE', 1, 'ASTER', '2021-10-15 21:57:03', NULL),
(22, 'GRADE ONE', 1, 'GALAXY', '2021-10-15 21:57:21', NULL),
(23, 'GRADE TWO', 2, 'LAVENDER', '2021-10-15 21:57:44', NULL),
(24, 'GRADE THREE', 3, 'DAISY', '2021-10-15 21:58:04', NULL),
(25, 'GRADE FOUR', 4, 'DAFFODIL', '2021-10-15 21:58:31', NULL),
(26, 'GRADE FIVE', 5, 'PRIME ROSE', '2021-10-15 21:58:56', NULL),
(27, 'GRADE SIX', 6, 'TULIP', '2021-10-15 21:59:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `SessionId`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(25, 0, 8, 10, 10, 90, '2019-02-21 12:39:15', NULL),
(26, 0, 8, 10, 9, 90, '2019-02-21 12:39:15', NULL),
(27, 0, 8, 10, 8, 100, '2019-02-21 12:39:15', NULL),
(30, 0, 11, 9, 9, 45, '2021-09-05 15:05:47', NULL),
(31, 0, 11, 9, 8, 33, '2021-09-05 15:05:47', NULL),
(38, 0, 17, 9, 9, 76, '2021-09-05 15:18:50', NULL),
(39, 0, 17, 9, 8, 45, '2021-09-05 15:18:50', NULL),
(40, 0, 15, 9, 9, 66, '2021-09-05 15:21:26', NULL),
(41, 0, 15, 9, 8, 22, '2021-09-05 15:21:26', NULL),
(42, 0, 16, 9, 9, 80, '2021-09-05 15:27:36', NULL),
(43, 0, 16, 9, 9, 80, '2021-09-05 15:27:36', NULL),
(44, 0, 16, 9, 8, 48, '2021-09-05 15:27:36', NULL),
(45, 0, 16, 9, 8, 48, '2021-09-05 15:27:36', NULL),
(46, 0, 19, 9, 9, 36, '2021-09-05 15:30:47', NULL),
(50, 0, 21, 9, 9, 56, '2021-09-05 15:43:17', NULL),
(51, 0, 22, 10, 9, 88, '2021-09-05 15:50:04', NULL),
(52, 0, 22, 10, 8, 36, '2021-09-05 15:50:04', NULL),
(53, 0, 24, 9, 9, 47, '2021-09-05 15:52:17', NULL),
(54, 0, 24, 9, 8, 22, '2021-09-05 15:52:17', NULL),
(55, 0, 20, 9, 9, 87, '2021-09-05 15:53:43', NULL),
(56, 0, 20, 9, 8, 35, '2021-09-05 15:53:43', NULL),
(57, 0, 25, 10, 9, 77, '2021-09-05 15:59:17', NULL),
(58, 0, 25, 10, 8, 55, '2021-09-05 15:59:17', NULL),
(65, 2, 13, 9, 9, 55, '2021-09-10 14:40:26', NULL),
(66, 2, 13, 9, 8, 65, '2021-09-10 14:40:27', NULL),
(69, 2, 7, 9, 9, 56, '2021-10-06 08:07:07', NULL),
(70, 2, 7, 9, 8, 29, '2021-10-06 08:07:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsessions`
--

CREATE TABLE `tblsessions` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsessions`
--

INSERT INTO `tblsessions` (`id`, `name`, `date_created`, `date_updated`) VALUES
(2, '2020/2021', '2021-09-08 08:11:12', '2021-09-08 08:27:14'),
(4, '2021/2022', '2021-09-08 09:53:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remark` text,
  `paid` enum('paid','owing') NOT NULL DEFAULT 'owing',
  `installment` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `remark`, `paid`, `installment`, `status`, `image`, `position`) VALUES
(7, 'Eyob Shiferaw', '0192', 'eyoba21@gmail.com', 'Male', '2007-01-01', 9, '2019-02-21 12:36:37', '2021-10-15 21:29:09', 'plop', 'owing', '11,000', 0, '', '5th'),
(12, 'Nam porro minus culp', '23', 'doqet@mailinator.com', 'Other', '', 9, '2021-09-06 20:21:17', '2021-10-15 21:30:21', '', 'owing', '11000', 0, 'startup-1993900_1920.png', NULL),
(13, 'Omnis rerum rerum ', 'Nesci', 'newezoly@mailinator.com', 'Male', '', 9, '2021-09-08 06:17:55', '2021-10-12 08:14:25', 'lorome ifhbf', 'owing', NULL, 1, NULL, '4th'),
(14, 'Numquam eaque qui el', 'Aut a', 'ryroz@mailinator.com', 'Other', '', 9, '2021-09-10 08:10:12', '2021-10-05 15:56:53', '', 'owing', NULL, 1, NULL, NULL),
(16, 'Corrupti nulla corp', 'Fugia', 'vasejos@mailinator.com', 'Male', '2010-02-15', 10, '2021-10-12 08:18:12', '2021-10-14 12:01:44', '', 'paid', '6000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(28, 9, 8, 1, '2019-02-21 12:38:21', '2019-02-21 12:38:21'),
(29, 9, 9, 1, '2019-02-21 12:38:26', '2019-02-21 12:38:26'),
(30, 9, 10, 1, '2019-02-21 12:38:31', '2019-02-21 12:38:31'),
(31, 10, 8, 1, '2019-02-21 12:38:35', '2019-02-21 12:38:35'),
(32, 10, 9, 1, '2019-02-21 12:38:38', '2019-02-21 12:38:38'),
(33, 10, 10, 1, '2019-02-21 12:38:42', '2019-02-21 12:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(10, 'Mathematics', 'Maths', '2021-10-15 22:05:54', '0000-00-00 00:00:00'),
(11, 'English', 'Eng', '2021-10-15 22:07:12', '0000-00-00 00:00:00'),
(12, 'Basic Science and Techonology', 'BSc & Tech', '2021-10-15 22:08:06', '0000-00-00 00:00:00'),
(13, 'Igbo', 'Igbo', '2021-10-18 22:00:56', '0000-00-00 00:00:00'),
(14, 'Health Education', 'H Edu', '2021-10-18 22:01:13', '2021-10-18 22:11:21'),
(15, 'Religious and National Value 1 and 2', 'RNV 1 & 2', '2021-10-18 22:02:02', '0000-00-00 00:00:00'),
(16, 'Pre-vocational studies', 'P.stu', '2021-10-18 22:02:33', '0000-00-00 00:00:00'),
(17, 'Information and Communication Technology', 'ICT', '2021-10-18 22:02:59', '0000-00-00 00:00:00'),
(18, 'Security Education', 'Sec Edu', '2021-10-18 22:03:41', '0000-00-00 00:00:00'),
(19, 'British Diction', 'Brit Dic', '2021-10-18 22:04:03', '0000-00-00 00:00:00'),
(20, 'Home Economics and Management', 'HE & M', '2021-10-18 22:05:20', '0000-00-00 00:00:00'),
(21, 'Quantitative ', 'Qun', '2021-10-18 22:05:48', '0000-00-00 00:00:00'),
(22, 'Culture and Creative Art', 'C & CA', '2021-10-18 22:06:12', '0000-00-00 00:00:00'),
(23, 'General Knowledge', 'G.Knol', '2021-10-18 22:06:42', '0000-00-00 00:00:00'),
(24, 'French', 'Frc', '2021-10-18 22:07:01', '0000-00-00 00:00:00'),
(25, 'Numeracy', 'Num', '2021-10-18 22:07:19', '0000-00-00 00:00:00'),
(26, 'Literacy', 'Lcy', '2021-10-18 22:07:41', '0000-00-00 00:00:00'),
(27, 'Sensorial Education', 'Sen Edu', '2021-10-18 22:08:06', '0000-00-00 00:00:00'),
(28, 'Rhyme/Diction', 'R/Dic', '2021-10-18 22:08:26', '0000-00-00 00:00:00'),
(29, 'Elementary Science', 'Elem. Sci', '2021-10-18 22:08:47', '0000-00-00 00:00:00'),
(30, 'Practical life', 'Pract. L', '2021-10-18 22:09:10', '0000-00-00 00:00:00'),
(31, 'Civic Education', 'Civ Edu', '2021-10-18 22:09:26', '0000-00-00 00:00:00'),
(32, 'Geography', 'Geo', '2021-10-18 22:09:54', '0000-00-00 00:00:00'),
(33, 'Igbo', 'Igbo', '2021-10-18 22:10:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `name`, `email`, `class`, `gender`, `date_created`, `date_updated`, `image`) VALUES
(1, 'Quas enim aliqua La', 'vedabixek@mailinator.com', '9', 'Female', '2016-01-06', '2021-09-09 23:00:00', 'WhatsApp Image 2021-05-16 at 4.23.10 PM.jpeg'),
(2, 'Aperiam numquam ea i', 'kicaj@mailinator.com', '9', 'Male', '1984-12-03', '2021-09-09 23:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resets`
--
ALTER TABLE `resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsessions`
--
ALTER TABLE `tblsessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resets`
--
ALTER TABLE `resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tblsessions`
--
ALTER TABLE `tblsessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
