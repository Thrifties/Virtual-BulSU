-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 04:50 PM
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
  `headline` varchar(60) NOT NULL,
  `event_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_input` blob NOT NULL,
  `campus_assignment` enum('All','Malolos Campus','Bustos Campus','Sarmiento Campus','Sarmiento Capus','San Rafael Campus','Hagonoy Campus','Meneses Campus') NOT NULL DEFAULT 'All',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `author`, `headline`, `event_date`, `description`, `file_input`, `campus_assignment`, `created_at`, `updated_at`) VALUES
(11, '2020104259', 'Ako\'y may allergy', '2023-09-30', 'asdfasdf', 0x756c77646866756c37387061312e6a7067, 'All', '2023-09-21 12:46:58', '2023-09-21 12:46:58'),
(12, '2020104259', 'Hala ka', '2023-09-23', 'afaddvasv', 0x353635716d77326762696438312e6a7067, 'All', '2023-09-21 12:47:31', '2023-09-21 12:47:31');

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
(2020104258, 'super_admin', 'Shin', 'Manalili', 'Sayson', 'Malolos Campus', 'kenshinsayson@gmail.com', '09107876004', 'password', '2023-09-20 14:13:39', '2023-09-20 14:13:39'),
(2020104259, 'admin', 'Audrey', 'Santos', 'Del Rosario', 'Malolos Campus', 'audrey.jeine@gmail.com', '09107876114', 'password', '2023-09-20 15:25:30', '2023-09-20 15:25:30'),
(2020105555, 'admin', 'Kyra', 'Santos', 'Del Rosario', 'San Rafael Campus', 'kyra@abc.com', '09107876555', 'password', '2023-09-21 12:50:30', '2023-09-21 12:50:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `campus_admin`
--
ALTER TABLE `campus_admin`
  ADD PRIMARY KEY (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
