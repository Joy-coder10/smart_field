-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 01:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartfield`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin123', 'admin123');

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
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `suma`, `details`, `ufile`, `date`) VALUES
(2, 'Far far away, behind the word ', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Boeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 monthsBoeing&rsquo;s 737 MAX will fly again after 2 air disasters grounded them for 20 months</p>\r\n', '74332355cd02b42ca6ea2dedf59c5af36e67.jpg', '2021-08-23 22:26:49.638328'),
(3, 'Format a local date and time ', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings:Format a local date and time and return the formatted date strings: Format a local date and time and return the formatted date strings:</p>\r\n', '4478instagram-followers.png', '2021-08-23 22:44:38.814303'),
(4, 'Halloween goes virtual in Japan amid pandemic', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '<p>Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemicHalloween goes virtual in Japan amid pandemicHalloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic Halloween goes virtual in Japan amid pandemic</p>\r\n', '9669Demarcheur png1.png', '2021-08-23 22:44:44.481678');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
