-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 10:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'dwebguru', '$2y$10$MHnfFADXN7rON5R5B1YgouKbbHUOam0NzFZPzvqlgc/GWkTwv5owa', 'Afeez', 'Babatunde', 'avatar.jpg', '2018-04-30'),
(6, 'admin', '$2y$10$CP51vfJPQarILA8gx.6ivenPWK3R5ksNrj9H4ujajlvYqPiXAZx9O', 'Kelvin', 'Ihaase', 'me.jpg85394', '2019-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `class_id`, `date`, `status`) VALUES
(13, 1, 13, '2019-04-27', 0),
(14, 1, 13, '2019-04-28', 1),
(15, 1, 14, '2019-05-04', 1),
(16, 1, 15, '2019-05-02', 1),
(17, 1, 17, '2019-05-01', 1),
(18, 1, 13, '2019-05-03', 1),
(74, 1, 14, '2019-04-30', 1),
(76, 4, 17, '2019-04-19', 1),
(77, 4, 17, '2019-04-27', 1),
(78, 4, 15, '2019-04-28', 1),
(79, 4, 15, '2019-05-01', 1),
(80, 4, 13, '2019-05-03', 1),
(81, 4, 14, '2019-05-05', 1),
(83, 4, 14, '2019-05-31', 1),
(84, 4, 17, '2019-05-18', 1),
(85, 4, 15, '2019-05-09', 1),
(86, 1, 17, '2019-06-07', 1),
(95, 1, 14, '2019-06-23', 1),
(97, 1, 15, '2019-06-23', 1),
(99, 4, 15, '2019-06-23', 0),
(100, 1, 15, '2019-06-24', 1),
(101, 1, 14, '2019-06-25', 1),
(103, 1, 17, '2019-06-25', 0),
(106, 4, 15, '2019-06-25', 1),
(107, 1, 15, '2019-06-25', 1),
(110, 1, 14, '2019-06-26', 1),
(111, 3, 14, '2019-06-26', 1),
(112, 3, 13, '2019-06-26', 1),
(118, 1, 17, '2019-06-26', 1),
(126, 1, 15, '2019-06-26', 1),
(127, 1, 14, '2019-06-27', 1),
(135, 1, 15, '2019-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `teacher_id`) VALUES
(13, 'CHM 101', 12),
(14, 'BIO 101', 9),
(15, 'INT 101', 11),
(17, 'CSC 101', 11),
(18, 'MTH 101', 9);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `school_year`) VALUES
(4, '2018-2019'),
(7, '2017-2018'),
(9, '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `firstname`, `lastname`, `email`, `address`, `birthdate`, `contact_info`, `gender`, `photo`, `created_on`) VALUES
(1, 'ABC123456789', 'Afeez', 'Babatunde', 'engrabdulbis@gmail.com', '18A, Kafayat Abdulrasak', '1996-05-25', '08156111156', 'Male', '53114666.Def.L.png', '2019-04-28'),
(3, 'DYE473869250', 'Tunde', 'Ajoke', 'Tunde@yahoo.com', 'Ikoyi, Lagos', '1992-05-02', '09123456789', 'Female', 'table.jpg', '2019-04-30'),
(4, 'JIE625973480', 'Adeleke', 'Kafayat', 'kaffy@aol.com', 'Lekki, Lagos', '1995-10-02', '09468029840', 'Female', 'attendance1.png', '2019-04-30'),
(5, 'HUA630789245', 'Kelvin', 'Mavins', 'adeleke@ymail.com', 'Lekki', '2000-01-01', '07066362541', 'Male', 'me.jpg', '2019-05-10'),
(6, 'VQW628309741', 'kelvin', 'Ihaase', 'kelvin@lakeshore.com', 'Lagos', '1999-03-15', '09066554477', 'Male', 'IMG-20170615-WA0027.jpg', '2019-06-18'),
(7, 'OBI028647913', 'Kunle', 'Akere', 'kunle@smail.com', 'Ilorin', '1989-06-21', '08044556688', 'Male', 'myp.png', '2019-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `student_class_id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`student_class_id`, `student_id`, `class_id`, `class_teacher_id`, `created_on`) VALUES
(1, 'ABC123456789', 15, 11, '2019-06-21'),
(2, 'ABC123456789', 17, 11, '2019-06-21'),
(4, 'ABC123456789', 14, 9, '2019-06-21'),
(5, 'DYE473869250', 13, 12, '2019-06-22'),
(6, 'DYE473869250', 14, 9, '2019-06-22'),
(7, 'JIE625973480', 15, 11, '2019-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `title`, `firstname`, `lastname`, `address`, `photo`, `created_on`) VALUES
(9, 'Mr', 'Samad', 'JeyJay', 'Fectac', 'me.jpg22686', '2019-04-09'),
(12, 'Mr', 'Tunde', 'Adekunle', 'Lagos', 'myp.png34507', '2019-06-19'),
(11, 'Mrs', 'Ajala', 'Tanmola', 'Ibadan', 'OurMission.png83484', '2019-06-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`student_class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `student_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
