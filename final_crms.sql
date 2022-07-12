-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 06:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accused`
--

CREATE TABLE `accused` (
  `id` int(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` int(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(50) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `crime` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `accuser`
--

CREATE TABLE `accuser` (
  `id` int(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` int(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(15) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `crime` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_role`
--

CREATE TABLE `auth_role` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `role_id` int(15) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `id` int(15) NOT NULL,
  `accuser_id` int(15) NOT NULL,
  `accused_id` int(15) NOT NULL,
  `witness_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `ctype` varchar(100) NOT NULL,
  `clevel` varchar(100) NOT NULL,
  `rdatetime` datetime NOT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kebele`
--

CREATE TABLE `kebele` (
  `id` int(15) NOT NULL,
  `woreda_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nomination`
--

CREATE TABLE `nomination` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `ntype` varchar(100) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `village` varchar(100) NOT NULL,
  `ndatetime` datetime NOT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `notice` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` int(15) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `place_history`
--

CREATE TABLE `place_history` (
  `id` int(15) NOT NULL,
  `up_id` int(15) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress_case`
--

CREATE TABLE `progress_case` (
  `id` int(15) NOT NULL,
  `crime_id` int(15) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `appo_date` datetime NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `datetime`, `description`) VALUES
(1, 'Dtective Police', '2021-01-07 22:38:52', NULL),
(2, 'Traffic Police Officer', '2021-01-07 22:39:32', NULL),
(3, 'Preventive Police', '2021-01-07 22:39:58', NULL),
(4, 'Traffic Police', '2021-01-07 22:40:33', NULL),
(5, 'Customer', '2021-01-07 22:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `job` int(15) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_place`
--

CREATE TABLE `user_place` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `place_id` int(15) NOT NULL,
  `stime` datetime NOT NULL,
  `ftime` datetime NOT NULL,
  `rtime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE `witness` (
  `id` int(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `age` int(15) NOT NULL,
  `mobile` int(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `region` int(15) NOT NULL,
  `zone` int(15) NOT NULL,
  `woreda` int(15) NOT NULL,
  `kebele` int(15) NOT NULL,
  `elevel` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `woreda`
--

CREATE TABLE `woreda` (
  `id` int(15) NOT NULL,
  `zone_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(15) NOT NULL,
  `region_id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accused`
--
ALTER TABLE `accused`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `accused_zone` (`zone`),
  ADD KEY `accused_woreda` (`woreda`),
  ADD KEY `accused_kebele` (`kebele`),
  ADD KEY `accused_region` (`region`);

--
-- Indexes for table `accuser`
--
ALTER TABLE `accuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `accuser_zone` (`zone`),
  ADD KEY `accuser_woreda` (`woreda`),
  ADD KEY `accuser_region` (`region`),
  ADD KEY `accuser_kebele` (`kebele`);

--
-- Indexes for table `auth_role`
--
ALTER TABLE `auth_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_role_role` (`role_id`),
  ADD KEY `auth_role_users` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_users` (`user_id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crime_accused` (`accused_id`),
  ADD KEY `crime_accuser` (`accuser_id`),
  ADD KEY `crime_users` (`user_id`),
  ADD KEY `crime_witness` (`witness_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebele`
--
ALTER TABLE `kebele`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `woreda_id` (`woreda_id`);

--
-- Indexes for table `nomination`
--
ALTER TABLE `nomination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomination_users` (`user_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_history`
--
ALTER TABLE `place_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_history_up` (`up_id`);

--
-- Indexes for table `progress_case`
--
ALTER TABLE `progress_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `users_job` (`job`);

--
-- Indexes for table `user_place`
--
ALTER TABLE `user_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_place_placement` (`place_id`),
  ADD KEY `user_place_users` (`user_id`);

--
-- Indexes for table `witness`
--
ALTER TABLE `witness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `witness_kebele` (`kebele`),
  ADD KEY `witness_zone` (`zone`),
  ADD KEY `witness_woreda` (`woreda`),
  ADD KEY `witness_region` (`region`);

--
-- Indexes for table `woreda`
--
ALTER TABLE `woreda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accused`
--
ALTER TABLE `accused`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accuser`
--
ALTER TABLE `accuser`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_role`
--
ALTER TABLE `auth_role`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kebele`
--
ALTER TABLE `kebele`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nomination`
--
ALTER TABLE `nomination`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place_history`
--
ALTER TABLE `place_history`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_case`
--
ALTER TABLE `progress_case`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_place`
--
ALTER TABLE `user_place`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `witness`
--
ALTER TABLE `witness`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `woreda`
--
ALTER TABLE `woreda`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accused`
--
ALTER TABLE `accused`
  ADD CONSTRAINT `accused_kebele` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_woreda` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accused_zone` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `accuser`
--
ALTER TABLE `accuser`
  ADD CONSTRAINT `accuser_kebele` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_woreda` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_zone` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `auth_role`
--
ALTER TABLE `auth_role`
  ADD CONSTRAINT `auth_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_role_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_accused` FOREIGN KEY (`accused_id`) REFERENCES `accused` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_accuser` FOREIGN KEY (`accuser_id`) REFERENCES `accuser` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crime_witness` FOREIGN KEY (`witness_id`) REFERENCES `witness` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kebele`
--
ALTER TABLE `kebele`
  ADD CONSTRAINT `kebele_ibfk_1` FOREIGN KEY (`woreda_id`) REFERENCES `woreda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nomination`
--
ALTER TABLE `nomination`
  ADD CONSTRAINT `nomination_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `place_history`
--
ALTER TABLE `place_history`
  ADD CONSTRAINT `place_history_up` FOREIGN KEY (`up_id`) REFERENCES `user_place` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `progress_case`
--
ALTER TABLE `progress_case`
  ADD CONSTRAINT `progress_case_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_job` FOREIGN KEY (`job`) REFERENCES `job` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_place`
--
ALTER TABLE `user_place`
  ADD CONSTRAINT `user_place_placement` FOREIGN KEY (`place_id`) REFERENCES `placement` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_place_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `witness_kebele` FOREIGN KEY (`kebele`) REFERENCES `kebele` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_woreda` FOREIGN KEY (`woreda`) REFERENCES `woreda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `witness_zone` FOREIGN KEY (`zone`) REFERENCES `zone` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `woreda`
--
ALTER TABLE `woreda`
  ADD CONSTRAINT `woreda_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
