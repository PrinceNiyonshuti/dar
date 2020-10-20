-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 06:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `full_name` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `detail` longtext DEFAULT NULL,
  `gen_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `full_name`, `email`, `detail`, `gen_date`) VALUES
(4, 'Niyonshuti Prince', '', 'ygkjn', '2020-10-20 15:48:58'),
(5, 'Niyonshuti Prince', '', 'ygkjn', '2020-10-20 15:48:59'),
(6, 'Niyonshuti Prince', 'npprince47@gmail.com', 'dgskjz', '2020-10-20 15:55:56'),
(7, 'Niyonshuti Prince', 'npprince47@gmail.com', 'dgskjzdgcsjdgiu', '2020-10-20 15:56:00'),
(8, 'Niyonshuti Prince', 'npprince7@gmail.com', 'dgskjzdgcsjdgiu zxchoisjcs', '2020-10-20 15:56:09'),
(9, 'Niyonshuti Prince', 'npprnce47@gmail.com', 'dvksjd', '2020-10-20 16:16:17'),
(10, 'Niyonshuti Prince', 'gnpprince47@gmail.com', 'gcthg', '2020-10-20 16:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `tittle` longtext DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `tittle`, `details`, `date`) VALUES
(2, 'why us ?', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '2020-10-20 12:43:30'),
(3, 'Explore our facilities', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '2020-10-20 12:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `partner_id` int(11) NOT NULL,
  `p_name` longtext DEFAULT NULL,
  `logo` longtext DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `p_name`, `logo`, `date`) VALUES
(4, 'Partner 1', 'Partner 1.jpg', '2020-10-20 10:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(11) NOT NULL,
  `full_name` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `addres` longtext DEFAULT NULL,
  `detail` longtext NOT NULL,
  `gen_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_id`, `full_name`, `email`, `addres`, `detail`, `gen_date`) VALUES
(24, '', '', '', '', '2020-10-20 16:12:25'),
(25, '', '', '', '', '2020-10-20 16:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `tittle` longtext DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `gen_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `tittle`, `details`, `photo`, `gen_date`) VALUES
(4, 'Car Transportation', 'vhjhjnkm\r\n', NULL, '2020-10-20 16:29:18'),
(5, 'Cargo data', ' kkcasx', NULL, '2020-10-20 16:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `detail_id` int(11) NOT NULL,
  `site_description` longtext DEFAULT NULL,
  `phone` longtext DEFAULT NULL,
  `mobile` longtext DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`detail_id`, `site_description`, `phone`, `mobile`, `address`, `email`, `about`) VALUES
(1, 'Site details need to be updated', '250780900900', '447766450718', '                                                                                                                                                                                                                                KN 7 RD, KIGALI - RWANDA                                                                                                                                                                                                                ', 'info@dartransport.com', '                                                                                                                                                                                                                                25 years of experience in Logistics services\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua                                                                                                                                                                                                                ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_login`
--

CREATE TABLE `tbl_users_login` (
  `login_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_login`
--

INSERT INTO `tbl_users_login` (`login_id`, `f_name`, `l_name`, `username`, `password`, `role_id`, `profile_id`, `telephone`, `date`, `status_login`) VALUES
(1, 'Site', 'Admin', 'admin', '3cd2c7e2f10e5b234c6d465da1720a11', 4, 1, '0780900900', '2020-10-18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tbl_users_login`
--
ALTER TABLE `tbl_users_login`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users_login`
--
ALTER TABLE `tbl_users_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
