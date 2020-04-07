-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 01:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pak`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_number` varchar(15) NOT NULL,
  `org_email` varchar(30) NOT NULL,
  `org_password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`org_id`, `org_name`, `org_number`, `org_email`, `org_password`, `created_at`) VALUES
(41, 'rectoSoft', '1234', 'recto@gmail.com', '12345', '2020-04-07 06:11:18'),
(42, 'google', '4321', 'google@gmail.com', '12345', '2020-04-07 06:11:31'),
(44, '', '', '', '', '2020-04-07 06:24:22'),
(45, 'sameer', 'asdas', 'sdasd', 'sameer', '2020-04-07 06:24:32'),
(46, 'ali', '1234', 'ali@gmail.com', '456', '2020-04-07 06:40:24'),
(47, 'ali', '1234', 'ali@gmail.com', '456', '2020-04-07 10:41:30'),
(48, 'seconduser', '4356', 'second@gmail.com', '678', '2020-04-07 10:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `organization_request`
--

CREATE TABLE `organization_request` (
  `org_req_id` int(11) NOT NULL,
  `org_req_name` varchar(30) NOT NULL,
  `org_req_number` varchar(15) NOT NULL,
  `org_req_email` varchar(50) NOT NULL,
  `org_req_password` varchar(50) NOT NULL,
  `org_req_reason` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_request`
--

INSERT INTO `organization_request` (`org_req_id`, `org_req_name`, `org_req_number`, `org_req_email`, `org_req_password`, `org_req_reason`, `created_at`) VALUES
(13, 'rectoSoft', '1234', 'recto@gmail.com', '12345', 'kuch bhi', '2020-04-07 06:06:54'),
(14, 'google', '4321', 'google@gmail.com', '12345', 'kuch nahi', '2020-04-07 06:07:33'),
(15, 'asda', 'asdas', 'asdas', 'asdas', 'asda', '2020-04-07 06:20:19'),
(16, 'sameer', 'asdas', 'sdasd', 'sameer', 'asdas', '2020-04-07 06:23:34'),
(17, 'ali', '1234', 'ali@gmail.com', '456', 'dds', '2020-04-07 06:40:16'),
(18, 'jjjn', 'fdfdf', 'ssddssd', 'sdsdsd', 'sdsdsd', '2020-04-07 10:21:51'),
(19, 'asasas', 'aass', 'asasas', '1234', 'dfdf', '2020-04-07 10:36:56'),
(20, 'asasas', 'aass', 'asasas', '1234', 'dfdf', '2020-04-07 10:37:20'),
(21, 'seconduser', '4356', 'second@gmail.com', '678', 'sdsdsdsd', '2020-04-07 10:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_middle_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_date` date NOT NULL,
  `user_cnic` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `volenters`
--

CREATE TABLE `volenters` (
  `vol_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `vol_user_name` varchar(50) NOT NULL,
  `vol_password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volenters`
--

INSERT INTO `volenters` (`vol_id`, `org_id`, `vol_user_name`, `vol_password`, `created_at`) VALUES
(12, 41, 'sameer', '12345', '2020-04-07 08:31:34'),
(13, 48, 'jdg', '567', '2020-04-07 10:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `organization_request`
--
ALTER TABLE `organization_request`
  ADD PRIMARY KEY (`org_req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `volenters`
--
ALTER TABLE `volenters`
  ADD PRIMARY KEY (`vol_id`),
  ADD KEY `org_id` (`org_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `organization_request`
--
ALTER TABLE `organization_request`
  MODIFY `org_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volenters`
--
ALTER TABLE `volenters`
  MODIFY `vol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
