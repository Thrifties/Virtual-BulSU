-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 10:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_bulsu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(10) NOT NULL,
  `author` varchar(255) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `headline` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `file_input` blob NOT NULL,
  `campus_assignment` enum('Malolos Campus','Bustos Campus','Sarmiento Campus','Sarmiento Capus','San Rafael Campus','Hagonoy Campus','Meneses Campus') NOT NULL,
  `college_assignment` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_admin`
--

CREATE TABLE `archive_admin` (
  `archive_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_num` varchar(20) DEFAULT NULL,
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_announcement`
--

CREATE TABLE `archive_announcement` (
  `archive_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `headline` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `file_input` blob NOT NULL,
  `campus_assignment` enum('Malolos Campus','Bustos Campus','Sarmiento Campus','Sarmiento Capus','San Rafael Campus','Hagonoy Campus','Meneses Campus') NOT NULL,
  `college_assignment` varchar(50) NOT NULL,
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campus_admin`
--

CREATE TABLE `campus_admin` (
  `faculty_id` int(10) NOT NULL,
  `admin_level` enum('super_admin','admin') NOT NULL DEFAULT 'admin',
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `campus` enum('Malolos Campus','Bustos Campus','Sarmiento Campus','Sarmiento Capus','San Rafael Campus','Hagonoy Campus','Meneses Campus') NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus_admin`
--

INSERT INTO `campus_admin` (`faculty_id`, `admin_level`, `first_name`, `middle_name`, `last_name`, `campus`, `email`, `contact_num`, `password`, `created_at`, `update_at`) VALUES
(2020104258, 'super_admin', 'Kenshin', 'Manalili', 'Sayson', 'Malolos Campus', 'kenshinsayson@gmail.com', '09107876001', 'password', '2023-09-20 14:13:39', '2023-09-20 14:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `college_admin`
--

CREATE TABLE `college_admin` (
  `faculty_id` int(10) NOT NULL,
  `admin_level` enum('college_admin') NOT NULL DEFAULT 'college_admin',
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `campus` enum('Malolos Campus','Bustos Campus','Sarmiento Campus','Sarmiento Capus','San Rafael Campus','Hagonoy Campus','Meneses Campus') NOT NULL,
  `college` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `archive_admin`
--
ALTER TABLE `archive_admin`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `archive_announcement`
--
ALTER TABLE `archive_announcement`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `campus_admin`
--
ALTER TABLE `campus_admin`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `college_admin`
--
ALTER TABLE `college_admin`
  ADD PRIMARY KEY (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `archive_admin`
--
ALTER TABLE `archive_admin`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `archive_announcement`
--
ALTER TABLE `archive_announcement`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
