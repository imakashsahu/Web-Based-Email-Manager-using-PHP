-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 09:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_data`
--

CREATE TABLE `email_data` (
  `email_id` int(11) NOT NULL,
  `email_subject` text NOT NULL,
  `email_body` text NOT NULL,
  `email_address` varchar(500) NOT NULL,
  `email_track_code` varchar(100) NOT NULL,
  `email_status` enum('no','yes') NOT NULL,
  `email_open_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_data`
--

INSERT INTO `email_data` (`email_id`, `email_subject`, `email_body`, `email_address`, `email_track_code`, `email_status`, `email_open_datetime`) VALUES
(1, 'Test first mail', 'First ever mail to test the php and db feature entered manually', 'test@test.com', '', 'no', '2020-08-20 11:18:23'),
(7, 'test mail 2', 'dasddadasdadsda', 'akasharunsahu@gmail.com', '', 'no', '0000-00-00 00:00:00'),
(6, 'test mail', 'dadadadadada', 'akasharunsahu@gmail.com', '', 'no', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_data`
--
ALTER TABLE `email_data`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_data`
--
ALTER TABLE `email_data`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
