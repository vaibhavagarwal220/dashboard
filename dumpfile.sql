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
(12, 4, 15411, 11, 11, 9, 41, 'No Announcements', 40, 'P&DSP'),
(15, 2, 15411, 11, 11, 9, 41, 'No Announcements', 40, 'Signals and Systems'),
(16, 12, 15411, 11, 11, 9, 41, 'No Announcements', 40, 'ADP'),
(31, 2, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Signals and Systems'),
(35, 29, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Computer Architecture '),
(36, 18, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Computational Fluid DynamicsII'),
(44, 16, 11113, 18, 13, 7, 43, 'You failed', 40, 'Digital System Design'),
(45, 4, 11113, 18, 13, 7, 43, 'No Announcements', 40, 'P&DSP'),
(46, 17, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Computational Fluid Dynamics'),
(47, 12, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'ADP'),
(48, 16, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Digital System Design '),
(50, 31, 15139, 19, 19, 1, 49, 'No Announcements', 40, 'Digital Networks'),
(51, 2, 15329, 34, 9, 11, 39, 'No Announcements', 40, 'Signals and Systems'),
(54, 2, 11112, 17, 12, 8, 42, 'No Announcements', 40, 'Signals and Systems'),
(55, 2, 11113, 18, 13, 7, 43, 'No Announcements', 40, 'Signals and Systems'),
(57, 2, 11115, 20, 15, 5, 45, 'No Announcements', 40, 'Signals and Systems'),
(58, 2, 11111, 25, 0, 20, 30, 'No Announcements', 40, 'Signals and Systems'),
(59, 2, 11119, 24, 19, 1, 49, 'No Announcements', 40, 'Signals and Systems'),
(60, 2, 11118, 23, 18, 2, 48, 'No Announcements', 40, 'Signals and Systems'),
(61, 2, 11117, 22, 17, 3, 47, 'No Announcements', 40, 'Signals and Systems'),
(62, 16, 11117, 22, 17, 3, 47, 'No Announcements', 40, 'Digital System Design '),
(63, 2, 11116, 21, 16, 4, 46, 'No Announcements', 40, 'Signals and Systems'),
(64, 2, 11114, 19, 14, 6, 44, 'No Announcements', 40, 'Signals and Systems'),
(65, 2, 15311, 0, 0, 0, 0, 'No Announcements', 40, 'Signals and Systems'),
(66, 16, 15311, 0, 0, 0, 0, 'No Announcements', 40, 'Digital System Design ');

CREATE TABLE `creview` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rating` float NOT NULL,
  `descr` varchar(140) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `creview` (`id`, `ROLLNO`, `cid`, `rating`, `descr`, `time`) VALUES
(2, 15411, 16, 4, 'Good', '2017-03-11 13:39:18'),
(7, 15411, 4, 4, 'Good Course Lot to Learn', '2017-03-11 21:16:16'),
(27, 15411, 15, 3, 'good', '2017-03-12 08:31:50'),
(29, 15411, 8, 1, 'Only Bio No technology', '2017-03-12 08:32:56'),
(31, 15411, 12, 4, 'Good one lot to learn', '2017-03-12 08:33:57'),
(36, 15139, 4, 3, 'Good Course', '2017-03-14 10:43:34'),
(37, 15139, 8, 5, 'Test', '2017-03-18 16:28:33'),
(38, 15139, 16, 3, 'Good Course', '2017-03-18 16:29:37'),
(39, 15139, 16, 3, 'Good Course', '2017-03-18 16:29:37'),
(40, 15139, 18, 4, 'A nice course', '2017-03-20 22:59:03'),
(41, 11118, 16, 4, 'Good course', '2017-03-21 12:31:24'),
(43, 15139, 12, 4, 'Nice Course', '2017-03-22 13:53:56'),
(44, 15139, 16, 3, 'Nice Course', '2017-03-22 14:00:47'),
(45, 15329, 16, 4, 'Very helpful course', '2017-03-22 14:05:04'),
(46, 15311, 16, 1, 'Boring Course', '2017-03-22 14:07:11'),
(47, 11112, 16, 5, 'A lot to learn', '2017-03-22 14:16:10'),
(48, 11113, 16, 4, 'Good Course', '2017-03-22 14:17:29'),
(49, 11114, 16, 4, 'Nice Course', '2017-03-22 14:19:29'),
(50, 11115, 16, 2, 'Not upto expectations', '2017-03-22 14:21:47'),
(51, 11111, 16, 5, 'Brilliant Course', '2017-03-22 14:29:52'),
(52, 11118, 16, 5, 'Excellent Course', '2017-03-22 14:34:15'),
(53, 11117, 16, 2, 'Average Course', '2017-03-22 14:36:33'),
(54, 11116, 16, 4, 'Useful Course', '2017-03-22 14:42:08');

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `forum_post` (`post_id`, `post_author`, `post_body`, `course_id`, `forum_id`, `time`) VALUES
(1, 15139, 'Quiz Tomorrow \r\nBest of luck', 2, 23, '2017-03-12 07:34:58'),
(2, 15139, 'Weightage will be 15%-25%-60%', 2, 24, '2017-03-14 05:22:55'),
(4, 16, 'There is an extra class from 5 to 6 pm.', 16, 29, '2017-03-22 13:26:18'),
(5, 16, 'All students are advised to submit their assignments by tomorrow.', 16, 30, '2017-03-22 13:28:22'),
(6, 16, 'A new assignment covering chapter 5 has been uploaded. Students are expected to have a look at it before coming to class.', 16, 31, '2017-03-22 13:31:18'),
(7, 16, 'There is no class on following Wednesday.', 16, 33, '2017-03-22 13:39:11'),
(8, 17, 'There is no class on following Thursday.', 17, 34, '2017-03-22 13:43:02'),
(9, 17, 'The syllabus for quiz is Chapter 3 and 4.', 17, 36, '2017-03-22 13:46:04'),
(10, 17, 'Quiz is scheduled for 1 April 2017.', 17, 35, '2017-03-22 13:46:33'),
(11, 17, 'Assignment 2 has been uploaded.', 17, 37, '2017-03-22 13:47:20'),
(12, 11111, 'What is the syllabus for quiz 2???', 2, 38, '2017-03-22 14:11:32'),
(16, 11117, 'Do we have to bring our Laptops to class.', 16, 39, '2017-03-22 14:38:07');

CREATE TABLE `frei_banned_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `frei_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` double(15,4) NOT NULL,
  `GMT_time` bigint(20) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `frei_chat` (`id`, `from`, `from_name`, `to`, `to_name`, `message`, `sent`, `recd`, `time`, `GMT_time`, `message_type`, `room_id`) VALUES
(1, 1490427878, 'Guest-1oq', 1490685060, 'Guest-a50', 'hi', '2017-03-23 00:48:09', 1, 14902300890.7651, 1490210289663, 0, -1),
(2, 1490685060, 'Guest-a50', 1490427878, 'Guest-1oq', 'hi', '2017-03-23 00:49:26', 1, 14902301660.6851, 1490210366653, 0, -1),
(3, 1490685060, 'Guest-a50', 1490427878, 'Guest-1oq', 'hi', '2017-03-23 00:54:49', 1, 14902304890.3448, 1490210689334, 0, -1),
(4, 1490685060, 'Guest-a50', 1490427878, 'Guest-1oq', 'hi', '2017-03-23 00:54:53', 1, 14902304930.3265, 1490210693287, 0, -1),
(5, 1490685060, 'Guest-a50', 1490427878, 'Guest-1oq', 'hi', '2017-03-23 00:54:55', 1, 14902304950.8622, 1490210695848, 0, -1),
(6, 1490427878, 'Guest-1oq', 1490685060, 'Guest-a50', 'hi', '2017-03-23 00:55:02', 1, 14902305020.1539, 1490210702119, 0, -1),
(7, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 00:58:12', 1, 14902306920.5516, 1490210892513, 0, -1),
(8, 15411, 'Gaurav', 15139, 'Vaibhav', 'hi', '2017-03-23 00:58:24', 1, 14902307040.2647, 1490210904234, 0, -1),
(9, 15411, 'Gaurav', 15139, 'Vaibhav', 'hi', '2017-03-23 01:00:32', 1, 14902308320.0246, 1490211031993, 0, -1),
(10, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 01:01:01', 1, 14902308610.6009, 1490211061565, 0, -1),
(11, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 01:01:57', 1, 14902309170.0500, 1490211117018, 0, -1),
(12, 15411, 'Gaurav', 15139, 'Vaibhav', '<img id=\"smile__15139\" src=\"http://localhost/projects/freichat/client/themes/smileys/smile54593.gif\" alt=\"smile\" />', '2017-03-23 01:02:12', 1, 14902309320.9423, 1490211132932, 0, -1),
(13, 15411, 'Gaurav', 15139, 'Vaibhav', '<img id=\"smile__15139\" src=\"http://localhost/projects/freichat/client/themes/smileys/sad54749.gif\" alt=\"smile\" />', '2017-03-23 01:02:15', 1, 14902309350.4410, 1490211135419, 0, -1),
(14, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 01:03:31', 1, 14902310110.4442, 1490211211378, 0, -1),
(15, 15411, 'Gaurav', 15139, 'Vaibhav', 'hi', '2017-03-23 01:03:43', 1, 14902310230.3085, 1490211223270, 0, -1),
(16, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 01:12:07', 1, 14902315270.0588, 1490211727043, 0, -1),
(17, 15139, 'Vaibhav', 15411, 'Gaurav', 'hi', '2017-03-23 01:12:48', 0, 14902315680.4591, 1490211768424, 0, -1),
(18, 15311, 'Adnaan', 15139, 'Vaibhav', 'hihih', '2017-03-23 01:14:39', 1, 14902316790.6677, 1490211879626, 0, -1),
(19, 15311, 'Adnaan', 15139, 'Vaibhav', 'hihihih', '2017-03-23 01:14:41', 1, 14902316810.6777, 1490211881636, 0, -1),
(20, 15139, 'Vaibhav', 15311, 'Adnaan', '<img id=\"smile__15311\" src=\"http://localhost/projects/dash/students/freichat/client/themes/smileys/smile54593.gif\" alt=\"smile\" />', '2017-03-23 01:14:54', 1, 14902316940.3091, 1490211894275, 0, -1),
(21, 15139, 'Vaibhav', 15311, 'Adnaan', '<img id=\"smile__15311\" src=\"http://localhost/projects/dash/students/freichat/client/themes/smileys/smile54593.gif\" alt=\"smile\" />', '2017-03-23 01:14:56', 1, 14902316960.8570, 1490211896820, 0, -1),
(22, 15139, 'Vaibhav', 15311, 'Adnaan', 'File uploaded: <a target=\\\'_blank\\\' href=http://localhost/projects/dash/students/freichat/client/plugins/upload/download.php?filename=1490231748245.zip>B15139_Assignment_3.zip</a>', '2017-03-23 01:15:48', 1, 14902317480.4224, 1490231748, 0, -1),
(23, 15139, 'Vaibhav', 15311, 'Adnaan', '<img id=\"smile__15311\" src=\"http://localhost/projects/dash/students/freichat/client/themes/smileys/sleepy55036.gif\" alt=\"smile\" />', '2017-03-23 01:16:09', 1, 14902317690.8524, 1490211969801, 0, -1),
(24, 11111, 'Shahrukh', 15139, 'Vaibhav', 'hi', '2017-03-23 01:37:57', 1, 14902330770.3648, 1490213277339, 0, -1),
(25, 15139, 'Vaibhav', 11111, 'Shahrukh', 'hi', '2017-03-23 01:38:04', 1, 14902330840.9550, 1490213284920, 0, -1),
(26, 15311, 'Adnaan', 11111, 'Shahrukh', 'hi', '2017-03-23 01:38:27', 1, 14902331070.5651, 1490213307528, 0, -1),
(27, 15311, 'Adnaan', 15139, 'Vaibhav', 'hi', '2017-03-23 01:38:32', 1, 14902331120.3288, 1490213312297, 0, -1);

CREATE TABLE `frei_config` (
  `id` int(11) NOT NULL,
  `key` varchar(30) DEFAULT 'NULL',
  `cat` varchar(20) DEFAULT 'NULL',
  `subcat` varchar(20) DEFAULT 'NULL',
  `val` varchar(500) DEFAULT 'NULL'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `frei_config` (`id`, `key`, `cat`, `subcat`, `val`) VALUES
(1, 'PATH', 'NULL', 'NULL', 'freichat/'),
(2, 'show_name', 'NULL', 'NULL', 'guest'),
(3, 'displayname', 'NULL', 'NULL', 'username'),
(4, 'chatspeed', 'NULL', 'NULL', '5000'),
(5, 'fxval', 'NULL', 'NULL', 'true'),
(6, 'draggable', 'NULL', 'NULL', 'enable'),
(7, 'conflict', 'NULL', 'NULL', ''),
(8, 'msgSendSpeed', 'NULL', 'NULL', '1000'),
(9, 'show_avatar', 'NULL', 'NULL', 'block'),
(10, 'debug', 'NULL', 'NULL', 'false'),
(11, 'freichat_theme', 'NULL', 'NULL', 'basic'),
(12, 'lang', 'NULL', 'NULL', 'english'),
(13, 'load', 'NULL', 'NULL', 'show'),
(14, 'time', 'NULL', 'NULL', '7'),
(15, 'JSdebug', 'NULL', 'NULL', 'false'),
(16, 'busy_timeOut', 'NULL', 'NULL', '500'),
(17, 'offline_timeOut', 'NULL', 'NULL', '1000'),
(18, 'cache', 'NULL', 'NULL', 'enabled'),
(19, 'GZIP_handler', 'NULL', 'NULL', 'ON'),
(20, 'plugins', 'file_sender', 'show', 'true'),
(21, 'plugins', 'file_sender', 'file_size', '2000'),
(22, 'plugins', 'file_sender', 'expiry', '300'),
(23, 'plugins', 'file_sender', 'valid_exts', 'jpeg,jpg,png,gif,zip'),
(24, 'plugins', 'send_conv', 'show', 'true'),
(25, 'plugins', 'send_conv', 'mailtype', 'smtp'),
(26, 'plugins', 'send_conv', 'smtp_server', 'smtp.gmail.com'),
(27, 'plugins', 'send_conv', 'smtp_port', '465'),
(28, 'plugins', 'send_conv', 'smtp_protocol', 'ssl'),
(29, 'plugins', 'send_conv', 'from_address', 'you@domain.com'),
(30, 'plugins', 'send_conv', 'from_name', 'FreiChat'),
(31, 'playsound', 'NULL', 'NULL', 'true'),
(32, 'ACL', 'filesend', 'user', 'allow'),
(33, 'ACL', 'filesend', 'guest', 'noallow'),
(34, 'ACL', 'chatroom', 'user', 'allow'),
(35, 'ACL', 'chatroom', 'guest', 'allow'),
(36, 'ACL', 'mail', 'user', 'allow'),
(37, 'ACL', 'mail', 'guest', 'allow'),
(38, 'ACL', 'save', 'user', 'allow'),
(39, 'ACL', 'save', 'guest', 'allow'),
(40, 'ACL', 'smiley', 'user', 'allow'),
(41, 'ACL', 'smiley', 'guest', 'allow'),
(42, 'polling', 'NULL', 'NULL', 'disabled'),
(43, 'polling_time', 'NULL', 'NULL', '30'),
(44, 'link_profile', 'NULL', 'NULL', 'disabled'),
(46, 'sef_link_profile', 'NULL', 'NULL', 'disabled'),
(47, 'plugins', 'chatroom', 'location', 'left'),
(48, 'plugins', 'chatroom', 'autoclose', 'true'),
(49, 'content_height', 'NULL', 'NULL', '200px'),
(50, 'chatbox_status', 'NULL', 'NULL', 'false'),
(51, 'BOOT', 'NULL', 'NULL', 'yes'),
(52, 'exit_for_guests', 'NULL', 'NULL', 'yes'),
(53, 'plugins', 'chatroom', 'offset', '50px'),
(54, 'plugins', 'chatroom', 'label_offset', '0.8%'),
(55, 'addedoptions_visibility', 'NULL', 'NULL', 'HIDDEN'),
(56, 'ug_ids', 'NULL', 'NULL', ''),
(57, 'ACL', 'chat', 'user', 'allow'),
(58, 'ACL', 'chat', 'guest', 'allow'),
(59, 'plugins', 'chatroom', 'override_positions', 'yes'),
(60, 'ACL', 'video', 'user', 'allow'),
(61, 'ACL', 'video', 'guest', 'allow'),
(62, 'ACL', 'chatroom_crt', 'user', 'allow'),
(63, 'ACL', 'chatroom_crt', 'guest', 'noallow'),
(64, 'plugins', 'chatroom', 'chatroom_expiry', '3600'),
(65, 'chat_time_shown_always', 'NULL', 'NULL', 'no'),
(66, 'allow_guest_name_change', 'NULL', 'NULL', 'yes'),
(67, 'ACL', 'groupchat', 'user', 'allow'),
(68, 'ACL', 'groupchat', 'guest', 'noallow');

CREATE TABLE `frei_groupchat` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `group_author` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `group_created` int(11) NOT NULL,
  `group_participants` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `frei_rooms` (
  `id` int(11) NOT NULL,
  `room_author` varchar(100) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` tinyint(4) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `room_created` int(11) NOT NULL,
  `room_last_active` int(11) NOT NULL,
  `room_order` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `frei_rooms` (`id`, `room_author`, `room_name`, `room_type`, `room_password`, `room_created`, `room_last_active`, `room_order`) VALUES
(1, 'admin', 'Fun Talk', 0, '', 1373557250, 1373557250, 1),
(2, 'admin', 'Crazy chat', 0, '', 1373557260, 1373557260, 5),
(3, 'admin', 'Think out loud', 0, '', 1373557872, 1373557872, 2),
(4, 'admin', 'Talk to me ', 0, '', 1373558017, 1373558017, 3),
(5, 'admin', 'Talk innovative', 0, '', 1373558039, 1373799404, 4);

CREATE TABLE `frei_session` (
  `id` int(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `frei_session` (`id`, `username`, `time`, `session_id`, `permanent_id`, `status`, `status_mesg`, `guest`, `in_room`) VALUES
(1, 'Vaibhav', 1490233321, '15139', 1490685060, 1, 'I am available', 0, -1),
(2, 'Gaurav', 1490231544, '15411', 1490427878, 1, 'I am available', 0, 1),
(3, 'Adnaan', 1490233327, '15311', 1490720841, 1, 'I am available', 0, -1),
(4, 'Shahrukh', 1490233127, '11111', 1490482642, 1, 'I am available', 0, -1);

CREATE TABLE `frei_smileys` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `frei_smileys` (`id`, `symbol`, `image_name`) VALUES
(1, ':S', 'worried55231.gif'),
(2, '(wasntme)', 'itwasntme55198.gif'),
(3, 'x(', 'angry55174.gif'),
(4, '(doh)', 'doh55146.gif'),
(5, '|-()', 'yawn55117.gif'),
(6, ']:)', 'evilgrin55088.gif'),
(7, '|(', 'dull55062.gif'),
(8, '|-)', 'sleepy55036.gif'),
(9, '(blush)', 'blush54981.gif'),
(10, ':P', 'tongueout54953.gif'),
(11, '(:|', 'sweat54888.gif'),
(12, ';(', 'crying54854.gif'),
(13, ':)', 'smile54593.gif'),
(14, ':(', 'sad54749.gif'),
(15, ':D', 'bigsmile54781.gif'),
(16, '8)', 'cool54801.gif'),
(17, ':o', 'wink54827.gif'),
(18, '(mm)', 'mmm55255.gif'),
(19, ':x', 'lipssealed55304.gif');

CREATE TABLE `frei_video_session` (
  `id` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL COMMENT 'unique room id',
  `from_id` int(11) NOT NULL,
  `msg_type` varchar(10) NOT NULL,
  `msg_label` int(2) NOT NULL,
  `msg_data` varchar(3000) NOT NULL,
  `msg_time` decimal(15,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `frei_webrtc` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(36, 3, 11113, 2);

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
(18, 'https://blogs.glowscotland.org.uk/fa/ICTFalkirkPrimaries/files/2011/11/GoForGold.jpg', 1, 'Students who want to participate in Inter IIT Tech Meet 2017 in IIT Kanpur \r\n(25 March to 26 March) please fill this form  bit.ly/interiitselections2017 as a team or as an individual (depends on the event). Look at the events at interiit.tech/competitions. For any doubts contact me. <br>\r\nLast date to fill the form is 21 Feb, 2017 (Tue) till 11:55 PM. \r\n#ThisTimeGold', 1, '2017-03-20 14:34:36');

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
(6, 'Gaurav', 'gauravsh', '979889898', 'IIT MANDI', 17),
(7, 'Saurav', 'gauravsh2', '979889898', 'IIT MANDI', 18),
(8, 'Hitesh', 'srimal', '979889898', 'IIT MANDI', 19),
(9, 'Nitesh', 'afjkldg', '979889898', 'IIT MANDI', 20),
(10, 'Ramesh', 'rALKDJL', '979889898', 'IIT MANDI', 21),
(11, 'Jitesh', 'dsajklfj', '979889898', 'IIT MANDI', 26),
(13, 'Aditya', 'adiygag', '979889899', 'IIT MANDI', 29),
(14, 'Prosenjit', 'asfdjkahar', '979889898', 'IIT MANDI', 30),
(16, 'Arnav', '0000', '9987652301', 'IIT Mandi', 2);

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
(8, 'IC136', 'Biotechnology', 8, 'C3'),
(11, 'CS101', 'ADP', 12, 'L3'),
(12, 'IC201', 'DP', 15, 'L3'),
(13, 'IC123', 'Digital System Design ', 16, 'A3'),
(14, 'IC205', 'Computational Fluid Dynamics', 17, 'B4'),
(15, 'IC206', 'Computational Fluid DynamicsII', 18, 'C3'),
(16, 'IC207', 'Control theory', 19, 'B4'),
(17, 'IC308', 'Control Networks', 20, 'B3'),
(18, 'IC309', 'Computer Networks', 21, 'B4'),
(19, 'IC205', 'Machine Drawing ', 26, 'G4'),
(21, 'IC411', 'Computer Architecture ', 29, 'F4'),
(22, 'IC409', 'Pattern Recognition ', 30, 'G4'),
(23, 'IC402', 'Digital Networks', 31, 'D3');

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `CONTACT` varchar(13) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `userimg` varchar(100) NOT NULL DEFAULT 'assets/userimg/mui.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `students` (`id`, `ROLLNO`, `NAME`, `PASSWORD`, `CONTACT`, `ADDRESS`, `userimg`) VALUES
(3, 15329, 'Riyansh', '0000', '979895655', 'B6 Hostel ', 'assets/userimg/mui.png'),
(4, 15411, 'Gaurav', '0000', '36526921', 'B6 IIT Mandi Kamand', 'assets/userimg/mui.png'),
(5, 15139, 'Vaibhav', '0000', '36526921', 'B6 IIT Mandi Kamand', 'assets/userimg/mui.png'),
(6, 15311, 'Adnaan', '0000', '986569656', 'IIT Mandi', 'assets/userimg/mui.png'),
(8, 11112, 'Ankita', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(9, 11113, 'Ramesh', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(10, 11114, 'Sahil', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(12, 11115, 'Megheal', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(13, 11116, 'Divyansh', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(14, 11117, 'Harshit ', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(15, 11118, 'Neha', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(16, 11119, 'Gaurav', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png'),
(18, 11111, 'Shahrukh', '0000', '88998985', 'IIT Mandi', 'assets/userimg/mui.png');

CREATE TABLE `table_forum` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `forum_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `table_forum` (`forum_id`, `course_id`, `forum_name`) VALUES
(23, 2, 'CS201'),
(24, 2, 'Quiz 1'),
(26, 8, 'Biotech'),
(28, 16, 'Quiz Tomorrow'),
(29, 16, 'Extra Class 22-03-2016'),
(30, 16, 'Assignment Submission'),
(31, 16, 'Assignment 2 uploaded'),
(32, 16, 'No Class'),
(33, 16, 'No Class on Wednesday'),
(34, 17, 'No Class'),
(35, 17, 'Quiz'),
(36, 17, 'Syllabus'),
(37, 17, 'Assignment uploaded'),
(38, 2, 'Quiz 2'),
(39, 16, 'Extra Class');

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `ROLLNO` int(11) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `trips` (`id`, `ROLLNO`, `dest`, `doj`) VALUES
(1, 15139, 'Chandigarh', '2017-03-16'),
(2, 15139, 'Chandigarh', '2017-03-24'),
(3, 15139, 'Goa', '2017-03-30'),
(4, 15139, 'Delhi', '2017-03-25'),
(5, 15411, 'Goa', '2017-03-25'),
(6, 15311, 'Kerala', '2017-03-30');


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

ALTER TABLE `frei_banned_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `frei_chat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `frei_config`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `frei_groupchat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `frei_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`);

ALTER TABLE `frei_session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permanent_id` (`permanent_id`);

ALTER TABLE `frei_smileys`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `frei_video_session`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `frei_webrtc`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
ALTER TABLE `creview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `frei_banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `frei_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
ALTER TABLE `frei_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
ALTER TABLE `frei_groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
ALTER TABLE `frei_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `frei_session`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `frei_smileys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
ALTER TABLE `frei_video_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `frei_webrtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `groupdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `group_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `sem_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `table_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
