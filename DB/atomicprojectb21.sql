-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2016 at 08:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atomicprojectb21`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `trash` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `birthday`, `trash`) VALUES
(1, 'sajib', '2014-05-15', NULL),
(4, 'esa', '2016-06-08', NULL),
(9, 'emran', '2016-06-09', NULL),
(12, 'jui', '2016-06-18', NULL),
(13, 'aseem', '2016-06-09', NULL),
(14, 'mahim', '2016-06-25', NULL),
(15, 'tuhin', '2016-01-21', NULL),
(16, 'jack', '2016-06-18', NULL),
(17, 'jony', '2016-06-25', NULL),
(19, 'Barak Obama', '2016-06-25', NULL),
(22, 'emran', '2016-06-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `trash` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `trash`) VALUES
(1, 'java', NULL),
(2, 'c++', NULL),
(5, 'php', NULL),
(6, 'ghjh', NULL),
(7, 'himu', NULL),
(8, 'irina', NULL),
(9, 'a', NULL),
(10, 'hjsdkuhd', NULL),
(11, 'bjhdsu', NULL),
(12, 'nbsdhkgksgd', NULL),
(13, 'kjdsjhbd', NULL),
(14, 'obvuasd', NULL),
(15, 'nm,kjljlds', NULL),
(16, 'zdzsd', NULL),
(17, 'jkdzfinudx', NULL),
(18, 'nzfsiusiz', NULL),
(19, 'nzinziffz', NULL),
(20, 'hujk', NULL),
(22, ',jd,sjf', NULL),
(23, 'kuahdsai', NULL),
(24, 'jhdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `trash` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city`, `trash`) VALUES
(1, 'sajib', 'Manikganj', NULL),
(2, 'Emran', 'Kishoreganj', NULL),
(4, 'Aseem', 'Maulvi bazar', NULL),
(5, 'Esa', 'Manikganj', NULL),
(6, 'Naeem', 'Manikganj', NULL),
(7, 'Arman', 'Chittagong', NULL),
(11, 'Sathi', 'Barisal', NULL),
(14, 'manik', 'Comilla', NULL),
(15, 'sonjoy', 'Comilla', NULL),
(18, 'jui', 'Kishoreganj', NULL),
(19, 'sajib', '', NULL),
(20, 'sajibcu', 'Rangpur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `trash` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `level`, `trash`) VALUES
(1, 'sajib', 'Honours', NULL),
(2, 'fahim', 'HSC', NULL),
(3, 'Emran', 'Honours', NULL),
(4, 'Bappy', 'JSC', NULL),
(6, 'asjfa', 'PHD', NULL),
(7, 'urmi', 'Honours', NULL),
(8, 'rahim', 'Masters', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `trash` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `trash`) VALUES
(1, '0sajib0@gmail.com', NULL),
(2, 'sajibcu55@gmail.com', NULL),
(5, 'emranictb0y@gmail.com', NULL),
(8, 'esanajnin@gmail.com', NULL),
(9, 'sajibcu.cse55@gmail.com', NULL),
(10, 'asdsafsd@yahoo.com', NULL),
(11, 'asdsfd@gmail.com', NULL),
(12, 'bjhkukvk@gmail.com', NULL),
(13, 'kndfg@AS', NULL),
(14, '0sajib0@gmail.com', NULL),
(15, '0sajib0@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hobby` varchar(50) NOT NULL,
  `trash` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `name`, `hobby`, `trash`) VALUES
(2, 'sajib', 'coding,cycling,swimming,card', NULL),
(9, 'esa', 'cycling,swimming', NULL),
(12, 'zFSDF', 'coding,card', NULL),
(13, 'kajdbdlaf', 'cycling,card', NULL),
(14, 'dfgrtteyhr', 'cycling,card', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `summary` text NOT NULL,
  `trash` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `summary`, `trash`) VALUES
(4, 'hotel Zaman', 'its the khabar hotel', NULL),
(5, 'kblbxfbiuvg', 'bk;jldgjspidugslkzj vzbsdifsdf\r\n zdyhnodfihdf xhdhfx\r\nxdnioudbniuhof\r\nnnfcg jksb yfguds ..', NULL),
(6, 'BITM', 'its a good organazatiom...', NULL),
(11, 'Chittagong ', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', NULL),
(12, 'Chittagong ', 'hj', NULL),
(13, 'Chittagong University', 'sdfksf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profilepicture`
--

CREATE TABLE `profilepicture` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `imageName` varchar(40) NOT NULL,
  `trash` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepicture`
--

INSERT INTO `profilepicture` (`id`, `name`, `imageName`, `trash`) VALUES
(7, 'sajib', '1467049739sajib.png', NULL),
(8, 'esa', '1467052588esa.png', NULL),
(9, 'baby', '1467135267cry.JPG', NULL),
(10, 'father', '1467135334father_day.JPG', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepicture`
--
ALTER TABLE `profilepicture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `profilepicture`
--
ALTER TABLE `profilepicture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
