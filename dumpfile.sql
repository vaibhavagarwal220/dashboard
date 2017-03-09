SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `DESIG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`ID`, `NAME`, `PASSWORD`, `DESIG`) VALUES
(1, 'admin', 'admin', 1);

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

INSERT INTO `coursedata` (`id`, `CID`, `STID`, `ATTENDANCE`, `QUIZ1`, `QUIZ2`, `QUIZ3`, `ANNCS`, `TOTAL_CLASSES`, `Course Name`) VALUES
(31, 8, 1601, 28, 15, 17, 45, 'No Announcements', 40, 'Biotechnology'),
(33, 5, 1601, 27, 12, 14, 38, 'No Announcements', 40, 'Applied Chemistry'),
(34, 2, 1601, 34, 14, 16, 42, 'No Announcements', 40, 'Signals and Systems'),
(35, 5, 1602, 38, 19, 18, 47, 'No Announcements', 40, 'Applied Chemistry'),
(36, 5, 1603, 25, 14, 18, 43, 'No Announcements', 40, 'Applied Chemistry'),
(37, 8, 1604, 30, 16, 16, 48, 'No Announcements', 40, 'Biotechnology'),
(38, 2, 1602, 31, 15, 17, 40, 'No Announcements', 40, 'Signals and Systems'),
(39, 2, 1602, 39, 15, 14, 43, 'No Announcements', 40, 'Signals and Systems'),
(40, 8, 1602, 37, 16, 18, 48, 'No Announcements', 40, 'Biotechnology'),
(41, 12, 1601, 0, 0, 0, 0, 'No Announcements', 40, 'ADP');

CREATE TABLE `creview` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_author` varchar(30) NOT NULL,
  `post_body` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `forum_post` (`post_id`, `post_title`, `post_author`, `post_body`, `course_id`, `forum_id`, `time`) VALUES
(18, 'COMPUTER ORGANISATION', '1601', 'Choose time slots for your lab.', 2, 2, '2017-02-28 18:33:37'),
(24, 'Continuum Mechanics', '1604', 'Surprise Quiz Tomorrow! Best of Luck!!', 4, 11, '2017-03-05 18:34:37'),
(26, 'CO', '1601', 'Good Class\r\n', 2, 2, '2017-03-03 19:43:09');

CREATE TABLE `prof` (
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `SALARY` double NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `INFO` varchar(200) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prof` (`NAME`, `PASSWORD`, `SALARY`, `CONTACT`, `INFO`, `ADDRESS`, `TEACHER_ID`) VALUES
('Professor X', 'vaibhav', 1000000, '979889898', 'Professor', 'Xavier School for special Children', 2);

CREATE TABLE `sem_courses` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT 'ICXXX',
  `NAME` varchar(30) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `slot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sem_courses` (`id`, `code`, `NAME`, `COURSE_ID`, `slot`) VALUES
(1, 'IC250', 'P&DSP', 4, 'I3'),
(2, 'IC260', 'Signals and Systems', 2, 'G3'),
(7, 'IC130', 'Applied Chemistry', 5, 'F3'),
(8, 'IC136', 'Biotechnology', 8, 'C3'),
(11, 'CS101', 'ADP', 12, 'L3');

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `INFO` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `students` (`id`, `ROLLNO`, `NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`, `INFO`) VALUES
(1, 1601, 'Vaibhav Agarwal', '0000', '36526921', 'B6 IIT Mandi Kamand', 'B.Tech CSE'),
(3, 1604, 'Riyansh Goyal', 'vaibhav12345', '979895655', 'B6 Hostel ', 'BTech CSE'),
(4, 1602, 'Gaurav', '0000', '36526921', 'B6 IIT Mandi Kamand', 'B.Tech CE'),
(5, 1603, 'Adnaan', '0000', '36526921', 'B6 IIT Mandi Kamand', 'B.Tech CSE');

CREATE TABLE `table_forum` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_name` varchar(100) NOT NULL,
  `forum_description` varchar(300) NOT NULL DEFAULT 'no description provided by initiator of forum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `table_forum` (`forum_id`, `course_id`, `forum_name`, `forum_description`) VALUES
(2, 2, 'Sem 4', 'No Info'),
(11, 4, 'Sem 2', 'No Info'),
(12, 8, '', '');

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `trips` (`id`, `ROLLNO`, `dest`, `doj`) VALUES
(1, 1601, 'Chandigarh', '2017-03-22'),
(32, 1601, 'Chandigarh', '2017-03-14'),
(33, 1601, 'Solan', '2017-03-09');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `coursedata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CID` (`CID`),
  ADD KEY `STID` (`STID`);

ALTER TABLE `creview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromstudents` (`ROLLNO`),
  ADD KEY `fromcourses` (`cid`);

ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `forum_id` (`forum_id`);

ALTER TABLE `prof`
  ADD PRIMARY KEY (`TEACHER_ID`),
  ADD KEY `TEACHING_COURSEID` (`TEACHER_ID`);

ALTER TABLE `sem_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`id`),
  ADD KEY `COURSE_ID` (`COURSE_ID`),
  ADD KEY `COURSE_ID_2` (`COURSE_ID`),
  ADD KEY `COURSE_ID_3` (`COURSE_ID`),
  ADD KEY `NAME` (`NAME`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ROLLNO` (`ROLLNO`);

ALTER TABLE `table_forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `course_id` (`course_id`);

ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_students` (`ROLLNO`);


ALTER TABLE `coursedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
ALTER TABLE `creview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
ALTER TABLE `sem_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `table_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `coursedata`
  ADD CONSTRAINT `allotted_course` FOREIGN KEY (`CID`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `to_student` FOREIGN KEY (`STID`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `creview`
  ADD CONSTRAINT `fromcourses` FOREIGN KEY (`cid`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fromstudents` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `forum_post`
  ADD CONSTRAINT `from post course` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `from post topics` FOREIGN KEY (`forum_id`) REFERENCES `table_forum` (`forum_id`);

ALTER TABLE `prof`
  ADD CONSTRAINT `teaches` FOREIGN KEY (`TEACHER_ID`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `table_forum`
  ADD CONSTRAINT `belongs to course ` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `trips`
  ADD CONSTRAINT `from_students` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
