-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 01:22 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwitnezdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(10) NOT NULL,
  `campus` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `campus`) VALUES
(2, 'Gidan Kwano'),
(5, 'Bosso');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(10) NOT NULL,
  `districts` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `districts`) VALUES
(3, 'School of Engineering and Engineering Technology'),
(4, 'School of Information and Communication Technology'),
(5, 'School of Agriculture and Agricultural Technology'),
(6, 'School of Environmental Technology'),
(7, 'School of Entrepreneurship and Management Technology'),
(8, 'School of Physical Science'),
(9, 'Senate Building'),
(10, 'Applied science');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(5) NOT NULL,
  `By` text NOT NULL,
  `event` text NOT NULL,
  `dateandtime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `By`, `event`, `dateandtime`) VALUES
(330, 'Dept Of works', 'logged in', 'Sun Oct 2018 - 12:56'),
(331, 'cherokee', 'logged in', 'Sun Oct 2018 - 12:59'),
(332, 'cherokee', 'logged in', 'Sun Oct 2018 - 13:05'),
(333, 'Dept Of works', 'logged in', 'Sun Oct 2018 - 13:06'),
(334, 'cherokee', 'logged in', 'Sun Oct 2018 - 13:09'),
(335, 'dani', 'logged in', 'Sun Oct 2018 - 13:15'),
(336, 'Dept Of works', 'logged in', 'Sun Oct 2018 - 13:17'),
(337, 'Dept Of works', 'logged in', 'Sun Oct 2018 - 13:20');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(5) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lastname`, `userid`, `password`) VALUES
(27, 'Enuma', 'Cherokee', 'cherokee', '$2y$10$IIpLxvzZ1/aaDzKvZMeNyOWMEdB0r3/FDyjQeNRtEa7.oJpJmkKp6'),
(28, 'olowo', 'daniel', 'dan', '$2y$10$OIpNZ3B3Es3RQEqp7iyPIOhDvwcK16AdNly/gsfw5kEplzIXH.Gee'),
(29, 'Daniel', 'Olowo', 'dani', '$2y$10$Tlp57BLeQsCFkKKKM0OFauUmfXK3RfQT9trrnd9Qf368AayCmbBHy');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(10) NOT NULL,
  `recipient` int(5) NOT NULL,
  `campus` varchar(40) NOT NULL,
  `district` int(3) NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL,
  `nature_of_problem` text NOT NULL,
  `fileloc` text NOT NULL,
  `sent_by` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `signature` text NOT NULL,
  `workstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `recipient`, `campus`, `district`, `message`, `date`, `nature_of_problem`, `fileloc`, `sent_by`, `status`, `signature`, `workstatus`) VALUES
(97, 18, '7, Ungwan Rukuba, Jos', 0, 'Man hit by a car', '07 Oct 2018 - 13:16', '', '6985262VID-20180616-WA0005.mp4', 'Daniel', 1, 'dani', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `id` int(5) NOT NULL,
  `Recipients` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`id`, `Recipients`) VALUES
(18, 'i-Witnez Admin');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(10) NOT NULL,
  `rep` int(5) NOT NULL,
  `senderid` bigint(10) NOT NULL,
  `fileloc` text NOT NULL,
  `complaint` text NOT NULL,
  `date` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(9) NOT NULL,
  `mat_no` varchar(15) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `othername` varchar(60) NOT NULL,
  `session_joined` year(4) NOT NULL,
  `dept_id` varchar(6) NOT NULL,
  `foreign_student` tinyint(1) NOT NULL,
  `transfer` tinyint(1) NOT NULL,
  `session_finished` year(4) NOT NULL,
  `current_level` int(3) NOT NULL,
  `email` varchar(60) NOT NULL,
  `birth_place` varchar(70) NOT NULL,
  `state` varchar(15) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `counter` int(9) NOT NULL,
  `approve_it` tinyint(1) NOT NULL,
  `clearance_begin` tinyint(1) NOT NULL,
  `clearance_finished` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `User_id` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mat_no` (`mat_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`lname`(10)),
  ADD UNIQUE KEY `user_email` (`User_id`(50));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
