-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 08:24 PM
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
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `id` int(11) NOT NULL,
  `type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`id`, `type`) VALUES
(1, 'Operation Nehemie'),
(2, 'Church Loan ');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `Names` longtext NOT NULL,
  `phone` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` longtext NOT NULL,
  `transactionid` longtext NOT NULL,
  `payment_code` longtext NOT NULL,
  `agregator_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `status` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `Names`, `phone`, `amount`, `type`, `transactionid`, `payment_code`, `agregator_code`, `message`, `status`, `timestamp`) VALUES
(1, 'Bikorimana Victor', 780589970, 3000, 'Operation Nehemie', '12312323', '23453424235', '5335345', 'SUCCESS', 'SUCCESS', '2020-03-19 18:43:34'),
(2, 'aKimnana Ben', 781234567, 7000, 'Church Loan', '12312323', '23453424235', '5335345', 'SUCCESS', 'SUCCESS', '2020-03-20 18:43:34'),
(3, 'Bikorimana Victor', 780589970, 3000, 'Operation Nehemie', '12312323', '23453424235', '5335345', 'SUCCESS', 'SUCCESS', '2020-03-18 18:43:34'),
(4, 'aKimnana Ben', 781234567, 7000, 'Church Loan', '12312323', '23453424235', '5335345', 'SUCCESS', 'SUCCESS', '2020-03-20 18:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Names` longtext NOT NULL,
  `tel` int(11) NOT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Names`, `tel`, `username`, `password`) VALUES
(1, 'Salomon', 783120304, 'Salomon', 'X20q6AcLfz7qg+++dWpoMQ=='),
(2, 'Milton', 788881130, 'Milton', '2ODHPGhe7CWJZfIx1kaQ9Q==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
