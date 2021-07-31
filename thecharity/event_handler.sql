-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 05:17 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_hub_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_handler`
--

CREATE TABLE IF NOT EXISTS `event_handler` (
  `eh_id` int(10) NOT NULL,
  `up_id` int(10) NOT NULL,
  `volunteer_id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `handler_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_handler`
--
ALTER TABLE `event_handler`
  ADD PRIMARY KEY (`eh_id`),
  ADD KEY `up_id` (`up_id`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_handler`
--
ALTER TABLE `event_handler`
  MODIFY `eh_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_handler`
--
ALTER TABLE `event_handler`
  ADD CONSTRAINT `event_handler_ibfk_1` FOREIGN KEY (`up_id`) REFERENCES `upcoming_event` (`up_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_handler_ibfk_2` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer_register` (`volunteer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer_register` (`volunteer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`up_id`) REFERENCES `upcoming_event` (`up_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
