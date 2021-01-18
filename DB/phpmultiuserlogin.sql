-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 01:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmultiuserlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `message`, `date`) VALUES
(1, 'My first announcement', '2020-12-07 12:48:50'),
(11, 'esok cuti gais', '2020-12-09 04:59:35'),
(12, 'ayuh makan guys', '2020-12-09 05:52:21'),
(13, 'subscribe itu gratis', '2020-12-09 12:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_sender` varchar(255) NOT NULL,
  `doc_responsibility` varchar(255) DEFAULT NULL,
  `doc_kuliyyah` varchar(255) NOT NULL,
  `doc_description` varchar(255) DEFAULT NULL,
  `doc_receive` datetime NOT NULL,
  `doc_due` datetime NOT NULL,
  `doc_location` varchar(255) NOT NULL,
  `doc_attention` varchar(255) NOT NULL,
  `doc_characteristic` varchar(255) DEFAULT NULL,
  `doc_status` varchar(255) NOT NULL,
  `doc_comment` varchar(255) DEFAULT NULL,
  `doc_file` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `role_name` varchar(255) DEFAULT NULL,
  `staff_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `role_name`, `staff_id`) VALUES
(1, 'Muhammad Shafiq bin Ahmad Razman', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1, 'Admin', '2017724867'),
(2, 'Amir bin Idham', 'user@user.com', '202cb962ac59075b964b07152d234b70', 1, 'assistant', '2017774968'),
(4, 'Anis Afiqah binti Zamri', 'anis@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'assistant', '2017749568'),
(40, 'Farhana binti Alias', 'farhana@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'assistant', '2016395872'),
(41, 'Siti Izzati binti Ahmad', 'izzati@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'other', '2015839586'),
(60, 'Syazmi', 'syazmi@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'director', 'OM200715');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
