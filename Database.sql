-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2021 at 03:04 PM
-- Server version: 5.7.35
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtwcomng_oil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vkey` varchar(250) NOT NULL,
  `trn_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `vkey`, `trn_date`) VALUES
(1, 'admin123', 'admin123', 'hillsofts@gmail.com', '', '2021-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `suma` varchar(500) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `ufile` varchar(2000) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `suma`, `details`, `ufile`, `date`) VALUES
(2, 'Far far away, behind the word ', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months</p>\r\n', '74332355cd02b42ca6ea2dedf59c5af36e67.jpg', '2021-08-23 22:26:49.638328'),
(3, 'Format a local date and time ', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings: Format a local date and time and return the formatted date strings:</p>\r\n', '4478instagram-followers.png', '2021-08-23 22:44:38.814303'),
(4, 'Halloween goes virtual in Japan amid pandemic', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemicHalloween goes virtual in Japan amid pandemicHalloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic</p>\r\n', 'png1.png', '2021-08-24 17:53:32.722615'),
(5, 'Boeing’s 737 MAX will fly again after 2 air disasters grounded', ' Boeing’s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing’s 737 MAX will fly again after 2 air disasters grounded them for 20 months  ', '<p>Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months</p>\r\n', '2208123559843_299242308212191_8366173708388834873_n.jpg', '2021-08-24 17:13:21.158773');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('hillsofts@gmail.com', '768e78024aa8fdb9b8fe87be86f647452cfd980819', '2021-08-26 13:49:36'),
('hillsofts@gmail.com', '768e78024aa8fdb9b8fe87be86f64745a8fed003c8', '2021-08-26 13:54:03'),
('hillsofts@gmail.com', '768e78024aa8fdb9b8fe87be86f6474541a9d247b9', '2021-08-26 13:56:08'),
('hillsofts@gmail.com', '768e78024aa8fdb9b8fe87be86f647456e0d0dc2b3', '2021-08-26 14:01:02'),
('hillsofts@gmail.com', '768e78024aa8fdb9b8fe87be86f647453473f2940a', '2021-08-26 14:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
