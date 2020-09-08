-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 07:48 AM
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
-- Database: `mediadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inaccuracy`
--

CREATE TABLE `tbl_inaccuracy` (
  `issue_id` int(11) NOT NULL,
  `issue_for` varchar(255) DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `issue_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reported_by` varchar(255) DEFAULT NULL,
  `reported_user_email` varchar(255) DEFAULT NULL,
  `report_to` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inaccuracy`
--

INSERT INTO `tbl_inaccuracy` (`issue_id`, `issue_for`, `reporter_id`, `outlet_id`, `issue_title`, `description`, `date_created`, `date_updated`, `updated_by`, `status`, `reported_by`, `reported_user_email`, `report_to`) VALUES
(1, 'Reporters', 1058323, 0, 'Re: Inaccuracy reported for reporter Monica Alba ID:1058323', 'You\'re welcome!\r\n\r\n\r\n\r\nThanks & Regards\r\n\r\nAKASH SAHU\r\n\r\nComputer Engineer | Mumbai, India\r\n\r\n \r\n \r\n \r\n\r\n------------------------------\r\n\r\n www.akash', '2020-08-25', '2020-08-26 02:27:47', NULL, 'Reported', 'Akash Sahu', 'Email_address@gmail.com', 'Akash Sahu'),
(2, 'Reporters', 1058323, 0, 'Inaccuracy reported for reporter Monica Alba ID:1058323', 'Her topics should be “Politics” not “Group”\r\n\r\nJob Title should be “Reporter\"\r\n\r\n\r\n\r\nThanks & Regards\r\n\r\nAKASH', '2020-08-25', '2020-08-26 02:27:48', NULL, 'Reported', 'Akash Sahu', 'Email_address@gmail.com', 'No-Reply xyz company'),
(3, 'Outlets', 0, 49250, 'Inaccuracy reported for outlet Good Day L.A.-KTTV-TV ID:49250', 'Hello, Steve Edwards no longer works here.\r\n\r\n\r\n\r\nThanks & Regards\r\n\r\nAKASH SAHU\r\n\r\nComputer Engineer | Mumbai, India\r\n\r\n \r\n \r\n \r\n\r\n------------------', '2020-08-25', '2020-08-26 02:27:49', NULL, 'Reported', 'Akash Sahu', 'Email_address@gmail.com', 'No-Reply xyz company'),
(4, 'Reporters', 602430, 0, 'Inaccuracy reported for reporter Aaron Ellis ID:602430', 'Thanks & Regards\r\n\r\nAKASH SAHU\r\n\r\nComputer Engineer | Mumbai, India\r\n\r\n \r\n \r\n \r\n\r\n------------------------------\r\n\r\n www.akashsahu.com', '2020-08-25', '2020-08-26 02:27:49', NULL, 'Reported', 'Akash Sahu', 'Email_address@gmail.com', 'No-Reply xyz company');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inaccuracy_reply`
--

CREATE TABLE `tbl_inaccuracy_reply` (
  `reply_id` int(4) NOT NULL,
  `issue_id` int(4) NOT NULL,
  `issue_title` text NOT NULL,
  `description` text NOT NULL,
  `reported_user_email` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inaccuracy_reply`
--

INSERT INTO `tbl_inaccuracy_reply` (`reply_id`, `issue_id`, `issue_title`, `description`, `reported_user_email`, `date_created`) VALUES
(0, 3, 'Re: Inaccuracy reported for outlet Good Day L.A.-KTTV-TV ID:49250', 'dsadsadad', 'Email_address@gmail.com', '2020-08-26 12:57:25'),
(0, 2, 'Re: Inaccuracy reported for reporter Monica Alba ID:1058323', 'test 2', 'Email_address@gmail.com', '2020-08-26 13:58:35'),
(0, 1, 'Re: Re: Inaccuracy reported for reporter Monica Alba ID:1058323', 'dasdsadada', 'Email_address@gmail.com', '2020-08-26 13:58:47'),
(0, 3, 'Re: Inaccuracy reported for outlet Good Day L.A.-KTTV-TV ID:49250', 'dasddadadas', 'Email_address@gmail.com', '2020-08-26 13:59:43'),
(0, 2, 'Re: Inaccuracy reported for reporter Monica Alba ID:1058323', 'dsdadadasd', 'Email_address@gmail.com', '2020-08-26 15:06:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inaccuracy`
--
ALTER TABLE `tbl_inaccuracy`
  ADD PRIMARY KEY (`issue_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
