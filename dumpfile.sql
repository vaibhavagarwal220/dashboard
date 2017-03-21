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
(2, 5, 15329, 30, 16, 16, 48, 'No Announcements', 40, 'Biotechnology'),
(12, 4, 15411, 0, 0, 0, 0, 'No Announcements', 40, 'P&DSP'),
(15, 2, 15411, 0, 0, 0, 0, 'No Announcements', 40, 'Signals and Systems'),
(16, 12, 15411, 0, 0, 0, 0, 'No Announcements', 40, 'ADP'),
(31, 2, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'Signals and Systems'),
(34, 27, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'MFOCS'),
(35, 29, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'Computer Architecture '),
(36, 18, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'Computational Fluid DynamicsII'),
(41, 4, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'P&DSP'),
(42, 8, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'Biotechnology'),
(43, 5, 15139, 0, 0, 0, 0, 'No Announcements', 40, 'Applied Chemistry');

CREATE TABLE `creview` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rating` float NOT NULL,
  `descr` varchar(140) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `creview` (`id`, `ROLLNO`, `cid`, `rating`, `descr`, `time`) VALUES
(2, 15411, 2, 4, 'Good', '2017-03-11 13:39:18'),
(7, 15411, 4, 4, 'Good Course Lot to Learn', '2017-03-11 21:16:16'),
(27, 15411, 15, 3, 'good', '2017-03-12 08:31:50'),
(29, 15411, 8, 1, 'Only Bio No technology', '2017-03-12 08:32:56'),
(31, 15411, 12, 4, 'Good one lot to learn', '2017-03-12 08:33:57'),
(36, 15139, 4, 3, 'Good Course', '2017-03-14 10:43:34'),
(37, 15139, 8, 5, 'Test', '2017-03-18 16:28:33'),
(38, 15139, 2, 3, 'Good Course', '2017-03-18 16:29:37'),
(39, 15139, 2, 3, 'Good Course', '2017-03-18 16:29:37'),
(40, 15139, 18, 4, 'A nice course', '2017-03-20 22:59:03');

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `forum_post` (`post_id`, `post_title`, `post_author`, `post_body`, `course_id`, `forum_id`, `time`) VALUES
(1, 'Computer Organization', 15139, 'Quiz Tomorrow \r\nBest of luck', 2, 23, '2017-03-12 07:34:58'),
(2, 'Weightage Quiz 1', 15139, 'Weightage will be 15%-25%-60%', 2, 24, '2017-03-14 05:22:55');

CREATE TABLE `groupdata` (
  `id` int(11) NOT NULL,
  `GID` int(11) NOT NULL,
  `STID` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `groupdata` (`id`, `GID`, `STID`, `stat`) VALUES
(4, 2, 15329, 2),
(5, 1, 15411, 2),
(31, 1, 15139, 2),
(34, 2, 15139, 2),
(35, 3, 15139, 2);

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `groups` (`id`, `cname`, `password`, `descr`, `name`) VALUES
(1, 'iitmandi.nb', 'vaibhav12345', 'A group for all the latest information about IIT Mandi', 'Noticeboard'),
(2, 'iitmandi.lnf', 'vaibhav12345', 'A group for all the things lost and found at IIT Mandi', 'Lost and Found'),
(3, 'rtronix', 'vaibhav12345', 'All the latest happenings of the now merged robotics and electronics will be posted on this group. Join if you are interested in electronics, embedded systems or robotics.', 'Robotronix Club');

CREATE TABLE `group_post` (
  `post_id` int(11) NOT NULL,
  `post_img` varchar(2000) NOT NULL DEFAULT '',
  `post_author` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `gid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `group_post` (`post_id`, `post_img`, `post_author`, `post_body`, `gid`, `time`) VALUES
(8, 'https://images-eu.ssl-images-amazon.com/images/I/41pS7kV8G2L.jpg', 15139, 'I gave my pendrive to somebody it is lost', 2, '2017-03-14 18:42:19'),
(15, 'https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-9/17264916_1610066615687794_5846979032722359584_n.jpg?oh=3d52daf371b8f0bf1e7d9a10e2150b0f&oe=596C2409', 15139, 'The folks at IIT Kanpur and team TechMeet wish you a <br> Happy Holi & a Great Dhuleti!<br>', 1, '2017-03-14 22:12:09'),
(18, 'https://blogs.glowscotland.org.uk/fa/ICTFalkirkPrimaries/files/2011/11/GoForGold.jpg', 3, 'Students who want to participate in Inter IIT Tech Meet 2017 in IIT Kanpur \r\n(25 March to 26 March) please fill this form  bit.ly/interiitselections2017 as a team or as an individual (depends on the event). Look at the events at interiit.tech/competitions. For any doubts contact me. <br>\r\nLast date to fill the form is 21 Feb, 2017 (Tue) till 11:55 PM. \r\n#ThisTimeGold', 3, '2017-03-20 14:34:36');

CREATE TABLE `prof` (
  `id` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prof` (`id`, `NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`, `TEACHER_ID`) VALUES
(5, 'TAG', 'rimoth', '979889898', 'Xavier School', 16),
(6, 'Gaurav Sharma', 'gauravsh', '979889898', 'IIT MANDI', 17),
(7, 'Gaurav Bhutani', 'gauravsh2', '979889898', 'IIT MANDI', 18),
(8, 'Hitesh Srimali', 'srimaluF', '979889898', 'IIT MANDI', 19),
(9, 'Hitesh Goyal', 'afjkldg', '979889898', 'IIT MANDI', 20),
(10, 'Ramesh Oruganti', 'rALKDJL', '979889898', 'IIT MANDI', 21),
(11, 'Ramesh Gupta', 'dsajklfj', '979889898', 'IIT MANDI', 26),
(12, 'Subohjit', 'roychaud', '979889899', 'IIT MANDI', 27),
(13, 'Aditya Nigam', 'adiygag;', '979889899', 'IIT MANDI', 29),
(14, 'Aditya Nahar', 'asfdjkahar', '979889898', 'IIT MANDI', 30);

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
(11, 'CS101', 'ADP', 12, 'L3'),
(12, 'IC201', 'DP', 15, 'L3'),
(13, 'IC123', 'Digital System Design ', 16, 'A3'),
(14, 'IC205', 'Computational Fluid Dynamics', 17, 'B4'),
(15, 'IC206', 'Computational Fluid DynamicsII', 18, 'B3'),
(16, 'IC207', 'Control theory', 19, 'B4'),
(17, 'IC308', 'Control Networks', 20, 'B3'),
(18, 'IC309', 'Computer Networks', 21, 'B4'),
(19, 'IC205', 'Machine Drawing ', 26, 'G4'),
(20, 'IC206', 'MFOCS', 27, 'H4'),
(21, 'IC411', 'Computer Architecture ', 29, 'F4'),
(22, 'IC409', 'Pattern Recognition ', 30, 'G4'),
(23, 'IC402', 'Digital Networks', 31, 'H3');

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `students` (`id`, `ROLLNO`, `NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`) VALUES
(3, 15329, 'Riyansh Goyal', 'vaibhav12345', '979895655', 'B6 Hostel '),
(4, 15411, 'Gaurav', 'mnUSM3zVQ3', '36526921', 'B6 IIT Mandi Kamand'),
(5, 15139, 'Vaibhav', '0000', '36526921', 'B6 IIT Mandi Kamand'),
(6, 15311, 'Adnaan Nazir', 'vaibhav12345', '986569656', 'IIT Mandi'),
(7, 11111, 'Test', 'vaibhav12345', '88998985', 'IIT Mandi'),
(8, 11112, 'Ankita', 'ankita ', '88998985', 'IIT Mandi'),
(9, 11113, 'Ramesh', 'ramesh12345', '88998985', 'IIT Mandi'),
(10, 11114, 'Sahil', 'sahildfj', '88998985', 'IIT Mandi'),
(12, 11115, 'Megheal', 'meghaelp', '88998985', 'IIT Mandi'),
(13, 11116, 'Divyanshu', 'divham', '88998985', 'IIT Mandi'),
(14, 11117, 'Harshit ', 'harshitdfja', '88998985', 'IIT Mandi'),
(15, 11118, 'Neha', 'neha24', '88998985', 'IIT Mandi'),
(16, 11119, 'Gaurav', 'gaurav412', '88998985', 'IIT Mandi'),
(18, 11120, 'Shahrukh', 'sharukh', '88998985', 'IIT Mandi');

CREATE TABLE `table_forum` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_name` varchar(100) NOT NULL,
  `forum_description` varchar(300) NOT NULL DEFAULT 'no description provided by initiator of forum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `table_forum` (`forum_id`, `course_id`, `forum_name`, `forum_description`) VALUES
(23, 2, 'CS201', 'A forum for students of computer organization'),
(24, 2, 'Quiz 1', 'Weightage of Quiz 1'),
(25, 5, 'Chemistry', 'djdswjd'),
(26, 8, 'Biotech', 'Problems of paper');

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `trips` (`id`, `ROLLNO`, `dest`, `doj`) VALUES
(1, 15139, 'Chandigarh', '2017-03-16'),
(2, 15139, 'Chandigarh', '2017-03-24'),
(3, 15139, 'Goa', '2017-03-30');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `coursedata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allotted_course` (`CID`),
  ADD KEY `to_student` (`STID`);

ALTER TABLE `creview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromstudents` (`ROLLNO`),
  ADD KEY `fromcourses` (`cid`);

ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `from post course` (`course_id`),
  ADD KEY `from post topics` (`forum_id`);

ALTER TABLE `groupdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studen` (`STID`),
  ADD KEY `allot` (`GID`);

ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`cname`);

ALTER TABLE `group_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fromgrp` (`gid`);

ALTER TABLE `prof`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TEACHER_ID` (`TEACHER_ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
ALTER TABLE `creview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `groupdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `group_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
ALTER TABLE `sem_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `table_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `coursedata`
  ADD CONSTRAINT `allotted_course` FOREIGN KEY (`CID`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_student` FOREIGN KEY (`STID`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `creview`
  ADD CONSTRAINT `fromcourses` FOREIGN KEY (`cid`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fromstudents` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `forum_post`
  ADD CONSTRAINT `from post course` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `from post topics` FOREIGN KEY (`forum_id`) REFERENCES `table_forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `groupdata`
  ADD CONSTRAINT `allot` FOREIGN KEY (`GID`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studen` FOREIGN KEY (`STID`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `group_post`
  ADD CONSTRAINT `fromgrp` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `prof`
  ADD CONSTRAINT `teacher` FOREIGN KEY (`TEACHER_ID`) REFERENCES `sem_courses` (`COURSE_ID`);

ALTER TABLE `table_forum`
  ADD CONSTRAINT `belongs to course ` FOREIGN KEY (`course_id`) REFERENCES `sem_courses` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `trips`
  ADD CONSTRAINT `from_students` FOREIGN KEY (`ROLLNO`) REFERENCES `students` (`ROLLNO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
