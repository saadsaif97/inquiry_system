-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 03:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `inquiry_id` int(11) NOT NULL,
  `cmnt_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`inquiry_id`, `cmnt_id`, `comment`, `date`) VALUES
(12, 19, 'nawan comment', '2020-10-21'),
(14, 20, 'pehla comment', '2020-10-21'),
(14, 21, 'doosrasadad asdasdfafasfasf', '2020-10-21'),
(12, 22, 'lo gi ek hour comment', '2020-10-21'),
(13, 23, 'aikdin baad', '2020-10-21'),
(13, 24, '30 min tk call karyn', '2020-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course`) VALUES
(10, 'java2321232', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `crs_looking` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `crs_sugg` varchar(255) NOT NULL,
  `last_inst` varchar(255) DEFAULT NULL,
  `knew_from` varchar(255) NOT NULL,
  `knew_other` varchar(255) NOT NULL,
  `cnslr_name` varchar(255) NOT NULL,
  `cmnt` varchar(255) DEFAULT NULL,
  `admission` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `mob`, `email`, `rating`, `area`, `qual`, `crs_looking`, `date`, `crs_sugg`, `last_inst`, `knew_from`, `knew_other`, `cnslr_name`, `cmnt`, `admission`) VALUES
(12, 'saad', '03314002075', 'saadgfx97@gmail.com', 5, 'skp', 'matric', 'graphics design', '2020-10-08', 'graphics design', '', 'web', '', 'Sir Hamza', '', 0),
(13, 'saad', '03314002075', 'sufyanbinsaif313@gmail.com', 5, 'skp', 'intermediate', 'web development', '2020-10-13', 'graphics design', 'null', 'web', '', 'Sir Hamza', '', 0),
(14, 'sa', '03314002075', 'saad97@gmail.com', 4, 'skp', 'matric', 'dosra course', '2020-10-13', 'pehla course', '', 'web', '', 'Sir Hamza', '', 1),
(15, 'asdasd', '056546', 'test@test.com', 5, 'skp', 'intermediate', 'web development', '2020-10-30', 'dosra course', 'no', 'web', '', 'Sir Hamza', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
