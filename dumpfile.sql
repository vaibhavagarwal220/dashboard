-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 06:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `DESIG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `NAME`, `PASSWORD`, `DESIG`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursedata`
--

CREATE TABLE `coursedata` (
  `id` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `STID` int(11) NOT NULL,
  `ATTENDANCE` int(11) NOT NULL,
  `QUIZ1` int(11) NOT NULL,
  `QUIZ2` int(11) NOT NULL,
  `QUIZ3` int(11) NOT NULL,
  `ANNCS` varchar(140) NOT NULL,
  `TOTAL_CLASSES` int(11) NOT NULL DEFAULT '40',
  `Course Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `coursedata`
--

INSERT INTO `coursedata` (`id`, `CID`, `STID`, `ATTENDANCE`, `QUIZ1`, `QUIZ2`, `QUIZ3`, `ANNCS`, `TOTAL_CLASSES`, `Course Name`) VALUES
(5, 2, 1604, 30, 20, 12, 10, 'There is no class tomorrow. Enjoy Your holiday. Hope to see you soon', 40, 'Mech'),
(10, 8, 1601, 0, 0, 0, 0, 'No Announcements', 40, 'Computer Organization');

-- --------------------------------------------------------

--
-- Table structure for table `creview`
--

CREATE TABLE `creview` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_post`
--

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_author` varchar(30) NOT NULL,
  `post_body` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_post`
--

INSERT INTO `forum_post` (`post_id`, `post_title`, `post_author`, `post_body`, `course_id`, `forum_id`, `time`) VALUES
(18, 'COMPUTER ORGANISATION', '1601', 'Choose time slots for your lab.', 2, 2, '2017-03-01 00:03:37'),
(24, 'Continuum Mechanics', '1601', 'Surprise Quiz Tomorrow! Best of Luck!!', 4, 11, '2017-03-01 00:04:37'),
(26, 'CO', '1601', 'Good Class\r\n', 2, 2, '2017-03-04 01:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `SALARY` double NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `INFO` varchar(200) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`NAME`, `PASSWORD`, `SALARY`, `CONTACT`, `INFO`, `ADDRESS`, `TEACHER_ID`) VALUES
('Professor X', 'vaibhav', 1000000, '979889898', 'Professor', 'Xavier School for special Children', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sem_courses`
--

CREATE TABLE `sem_courses` (
  `id` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_courses`
--

INSERT INTO `sem_courses` (`id`, `NAME`, `COURSE_ID`, `DESCRIPTION`) VALUES
(1, 'Linear Algebra', 4, ''),
(2, 'Mechanics', 2, ''),
(7, 'Continuum Mechanics', 5, 'Mechanics of real life objects,tensors'),
(8, 'Computer Organization', 8, 'Computer : How do they Work');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `INFO` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `ROLLNO`, `NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`, `INFO`) VALUES
(1, 1601, 'Vaibhav Agarwal', '0000', '36526921', 'B6 IIT Mandi Kammand south campus', 'B.Tech CSE'),
(3, 1604, 'Riyansh Goyal', 'vaibhav12345', '979895655', 'B6 Hostel ', 'BTech CSE');

-- --------------------------------------------------------

--
-- Table structure for table `table_forum`
--

CREATE TABLE `table_forum` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_name` varchar(100) NOT NULL,
  `forum_description` varchar(300) NOT NULL DEFAULT 'no description provided by initiator of forum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_forum`
--

INSERT INTO `table_forum` (`forum_id`, `course_id`, `forum_name`, `forum_description`) VALUES
(2, 2, 'Sem 4', 'No Info'),
(11, 4, 'Sem 2', 'No Info');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `ROLLNO`, `dest`, `doj`) VALUES
(1, 1601, 'Chandigarh', '2017-03-22'),
(31, 1601, 'sdwf', '2017-03-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coursedata`
--
ALTER TABLE `coursedata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CID` (`CID`),
  ADD KEY `STID` (`STID`),
  ADD KEY `Course Name` (`Course Name`);

--
-- Indexes for table `creview`
--
ALTER TABLE `creview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromstudents` (`ROLLNO`),
  ADD KEY `fromcourses` (`cid`);

--
-- Indexes for table `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`TEACHER_ID`),
  ADD KEY `TEACHING_COURSEID` (`TEACHER_ID`);

--
-- Indexes for table `sem_courses`
--
ALTER TABLE `sem_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`id`),
  ADD KEY `COURSE_ID` (`COURSE_ID`),
  ADD KEY `COURSE_ID_2` (`COURSE_ID`),
  ADD KEY `COURSE_ID_3` (`COURSE_ID`),
  ADD KEY `NAME` (`NAME`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ROLLNO` (`ROLLNO`);

--
-- Indexes for table `table_forum`
--
ALTER TABLE `table_forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_students` (`ROLLNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursedata`
--
ALTER TABLE `coursedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `creview`
--
ALTER TABLE `creview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sem_courses`
--
ALTER TABLE `sem_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `table_forum`
--
ALTER TABLE `table_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursedata`
--
ALTER TABLE `coursedata`
  ADD CONSTRAINT `allotted_course` FOREIGN KEY (`CID`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `to_student` FOREIGN KEY (`STID`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `creview`
--
ALTER TABLE `creview`
  ADD CONSTRAINT `fromcourses` FOREIGN KEY (`cid`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fromstudents` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_post`
--
ALTER TABLE `forum_post`
  ADD CONSTRAINT `from post course` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `from post topics` FOREIGN KEY (`forum_id`) REFERENCES `table_forum` (`forum_id`);

--
-- Constraints for table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `teaches` FOREIGN KEY (`TEACHER_ID`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_forum`
--
ALTER TABLE `table_forum`
  ADD CONSTRAINT `belongs to course ` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `from_students` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
