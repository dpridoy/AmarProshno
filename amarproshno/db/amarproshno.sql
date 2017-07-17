-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 02:52 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amarproshno`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answers` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `u_id`, `q_id`, `answers`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 19, 10, '<p>Dhaka</p>\r\n', '2017-07-17 02:48:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 19, 8, '<p>Hypertext Preprocessor</p>\r\n', '2017-07-17 02:49:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 18, 9, '<p><em>Php is a scripting language</em></p>\r\n', '2017-07-17 02:50:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `u_id`, `fname`, `midname`, `lname`, `dob`, `gender`, `photo`, `hobby`, `interest`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 18, 'Nasirul', 'Haque', 'Ridoy', '1995-07-23', 'Male', '../../assests/img/D.jpg', 'Photography', 'PHP', '2017-04-21 10:59:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 19, 'Shahrin', 'Nasrin', 'Ana', '1994-02-01', 'Female', '../../assests/img/3053658fcb3ef7bb16.jpg', 'Want to travel', 'PHP', '2017-04-22 09:06:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `u_id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 18, 'PHP', '<p>what is php?</p>\r\n', '2017-04-21 10:58:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 19, 'Abac', '<p>What is PHP?</p>\r\n', '2017-04-22 09:04:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 18, 'Capital', '<p>What is the Capital of BD</p>\r\n', '2017-07-17 02:37:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'dpridoy@gmail.com', '123', '2017-04-21 10:57:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'anashahrin@gnail.com', '0167', '2017-04-22 09:02:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `question` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
