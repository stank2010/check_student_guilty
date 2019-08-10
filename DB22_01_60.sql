-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2017 at 03:22 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ref` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `date`, `time`, `num`, `point`, `type`, `ref`) VALUES
(1, '22/01/2017', '08:58:18 pm', 1, 5, 'A01', '');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `name` varchar(50) NOT NULL,
  `num` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`name`, `num`, `q1`, `q2`, `q3`, `q4`) VALUES
(' student1 ', 1, 2, 0, 0, 0),
(' student2 ', 2, 2, 0, 0, 0),
(' student3 ', 3, 2, 0, 0, 0),
(' student4 ', 4, 2, 0, 0, 0),
(' student5 ', 5, 2, 0, 0, 0),
('student1', 1, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `late` int(11) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `class`, `point`, `num`, `late`, `pic`) VALUES
('student1', 'A', 65, 1, 0, 0x30),
('student2', 'A', 70, 2, 0, 0x30),
('student3', 'A', 70, 3, 0, 0x30),
('student4', 'A', 70, 4, 0, 0x30),
('student5', 'A', 70, 5, 0, 0x30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `who` varchar(30) NOT NULL,
  `rank` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pw`, `who`, `rank`) VALUES
('user', 'user', 'me', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
