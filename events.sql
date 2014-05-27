-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 06:59 AM
-- Server version: 5.6.16
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `events`
--
CREATE DATABASE IF NOT EXISTS `events` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `events`;

-- --------------------------------------------------------

--
-- Table structure for table `competition_type`
--

CREATE TABLE IF NOT EXISTS `competition_type` (
  `event_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `rounds` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition_type`
--

INSERT INTO `competition_type` (`event_id`, `type`, `rounds`) VALUES
(1, 'group', 5),
(2, 'group', 4),
(3, 'group', 8),
(31, 'group', 3),
(33, 'group', 5),
(34, 'group', 5);

-- --------------------------------------------------------

--
-- Table structure for table `endorsements`
--

CREATE TABLE IF NOT EXISTS `endorsements` (
  `event_id` int(11) NOT NULL,
  `sponsor_id` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`event_id`,`sponsor_id`),
  KEY `sponsor_id` (`sponsor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endorsements`
--

INSERT INTO `endorsements` (`event_id`, `sponsor_id`) VALUES
(1, '1'),
(3, '1'),
(1, '2'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `events_details`
--

CREATE TABLE IF NOT EXISTS `events_details` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) DEFAULT NULL,
  `event_disc` text,
  `type_id` varchar(50) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `date` date NOT NULL,
  `managed_by` varchar(50) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `events_details`
--

INSERT INTO `events_details` (`event_id`, `event_name`, `event_disc`, `type_id`, `start_time`, `duration`, `location`, `date`, `managed_by`) VALUES
(1, 'Haute Couture', 'Fashion Show', 'competition', '00:00:50', '50', 'Cricket Ground', '2014-02-15', 'marketing'),
(2, 'High Heels', 'Dance Show', 'competition', '00:08:20', '12', 'Auditorium', '2014-02-15', 'PR'),
(3, '5 on 5 Football', 'GGMU', 'competition', '20:20:20', '120', 'SAC', '2014-02-15', 'PR'),
(4, 'Blind Date', 'Date Blindly', 'competition', '12:12:13', '48', 'Road', '2014-02-15', 'marketing'),
(5, 'Saaz', 'Cultural Night', 'show', '08:00:00', '120', 'MCH', '2014-02-15', 'marketing'),
(10, 'Juggernaut', 'Live show on stage', 'show', '05:06:07', '444', 'KV Gate', '2014-02-14', 'PR'),
(31, 'Crescendo', 'Live show by singers', 'competition', '05:06:08', '45', 'LH4', '2014-05-09', 'PR'),
(32, 'Fuckers', 'ajkshflkashf', 'competition', '05:06:08', '45', 'kajsdf', '2014-04-10', 'red'),
(33, 'asdfasdfas', 'dfasdfsdfasdf', 'competition', '05:23:45', 'asdfdsf', 'asdfasdf', '2014-04-11', 'asdfasdf'),
(34, 'fsafds', 'fdsfafsdaf', 'competition', '12:02:00', '5', 'fsdf', '2014-04-17', 'fsdfsadf');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user1` varchar(50) NOT NULL,
  `user2` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user1`,`user2`),
  KEY `user2` (`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user1`, `user2`, `status`) VALUES
('kohli', 'admin', 2),
('kohli', 'sonia.gandhi', 1),
('kohli', 'w.rooney', 2),
('riyazmd.pechu', 'kohli', 2),
('sonia.gandhi', 'w.rooney', 2),
('ss', 'kohli', 2),
('w.rooney', 'm.riyaz', 2),
('w.rooney', 'riyazmd.pechu', 1),
('yuvi', 'kohli', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `leader` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `leader` (`leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `leader`, `Name`) VALUES
(1, 'kohli', 'RCB'),
(2, 'sonia.gandhi', 'congress_lol');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE IF NOT EXISTS `group_members` (
  `group_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`group_id`, `username`) VALUES
(1, 'kohli'),
(2, 'sonia.gandhi'),
(1, 'yuvi');

-- --------------------------------------------------------

--
-- Table structure for table `group_participation`
--

CREATE TABLE IF NOT EXISTS `group_participation` (
  `event_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `round` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_participation`
--

INSERT INTO `group_participation` (`event_id`, `group_id`, `round`) VALUES
(1, 1, 1),
(2, 1, 1),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_user` varchar(50) DEFAULT NULL,
  `recv_user` varchar(50) DEFAULT NULL,
  `body` text,
  `del_from` int(11) DEFAULT '0',
  `del_to` int(11) DEFAULT '0',
  `msg_date` date DEFAULT NULL,
  `msg_time` time DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `sent_user` (`sent_user`),
  KEY `recv_user` (`recv_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `sent_user`, `recv_user`, `body`, `del_from`, `del_to`, `msg_date`, `msg_time`) VALUES
(1, 'kohli', 'm.riyaz', 'hi man how are you', 0, 0, '2014-04-02', '02:02:02'),
(2, 'm.riyaz', 'kohli', 'i am fine how are you', 0, 0, '2014-04-02', '02:02:03'),
(3, 'm.riyaz', 'kohli', 'i am too fine.. wat dng?', 0, 0, '2014-04-02', '02:02:08'),
(4, 'kohli', 'm.riyaz', ' mcbc', 0, 0, '2014-04-02', '02:02:10'),
(5, 'kohli', 'riyazmd.pechu', 'jaffa', 0, 0, '2014-04-21', '09:33:22'),
(6, 'kohli', 'riyazmd.pechu', 'jaffa', 0, 0, '2014-04-21', '09:33:23'),
(7, 'kohli', 'riyazmd.pechu', 'jaffa fdfad', 0, 0, '2014-04-21', '09:33:47'),
(8, 'kohli', 'riyazmd.pechu', '', 0, 0, '2014-04-21', '09:48:03'),
(9, 'kohli', 'riyazmd.pechu', '', 0, 0, '2014-04-21', '09:48:07'),
(10, 'kohli', 'm.riyaz', 'asdfasdf', 0, 0, '2014-04-21', '10:14:48'),
(11, 'kohli', 'm.riyaz', 'when is this event?', 0, 0, '2014-04-21', '10:16:02'),
(12, 'kohli', 'm.riyaz', 'asdfasdf', 0, 0, '2014-04-21', '10:16:21'),
(13, 'kohli', 'm.riyaz', 'fuck you bitch', 0, 0, '2014-04-21', '10:18:42'),
(14, 'kohli', 'm.riyaz', 'fasdfadf', 0, 0, '2014-04-21', '10:20:04'),
(15, 'kohli', 'm.riyaz', '', 0, 0, '2014-04-21', '10:20:09'),
(16, 'kohli', 'm.riyaz', 'asfasdfffffffafgasdfvadsfvsdf gsfdg sdfv dfghdghbdfghvsfgvdghb sdfhgbdfghvsdgvgfdsvsdfgvlifjglskfdjghvlkfvnvokhdsg vlkasjdfjc lshdfg vdsfgn', 0, 0, '2014-04-21', '10:23:23'),
(17, 'kohli', 'm.riyaz', 'asdfadfasdfasdfasdf', 0, 0, '2014-04-21', '10:24:36'),
(18, 'w.rooney', 'sonia.gandhi', ',kjfuyf', 0, 0, '2014-04-21', '11:47:12'),
(19, 'kohli', 'riyazmd.pechu', '<?', 0, 0, '2014-04-21', '22:19:07'),
(20, 'kohli', 'riyazmd.pechu', '<?', 0, 0, '2014-04-21', '22:19:21'),
(21, 'kohli', 'riyazmd.pechu', '<?', 0, 0, '2014-04-21', '22:19:21'),
(22, 'kohli', 'riyazmd.pechu', '<?', 0, 0, '2014-04-21', '22:19:28'),
(24, 'w.rooney', 'kohli', 'hi man', 0, 0, '2014-04-21', '22:44:46'),
(25, 'kohli', 'w.rooney', 'i am fine', 0, 0, '2014-04-21', '22:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post`, `username`, `post_date`, `post_time`) VALUES
(6, 'this event has been changed to this time that tijme', 'admin', '0000-00-00', '00:00:00'),
(7, 'The event Blind Date has been cancelled.', 'admin', '2014-04-21', '18:49:43'),
(8, 'Hi man, I am the organizer of ''Saaz''. my no. is 1524863578', 'w.rooney', '2014-04-21', '19:38:29'),
(9, 'the lab has postpened', 'w.rooney', '2014-04-21', '22:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `event_id` int(11) NOT NULL,
  `guest_id` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`event_id`,`guest_id`),
  KEY `guest_id` (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`event_id`, `guest_id`) VALUES
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `solo_participation`
--

CREATE TABLE IF NOT EXISTS `solo_participation` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `event_id` int(11) NOT NULL,
  `round` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`,`event_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solo_participation`
--

INSERT INTO `solo_participation` (`username`, `event_id`, `round`) VALUES
('kohli', 4, 1),
('sonia.gandhi', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` varchar(50) NOT NULL DEFAULT '',
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_details` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`, `sponsor_details`) VALUES
('1', 'Adidas', 'USA'),
('2', 'Louis Vuitton', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE IF NOT EXISTS `team_members` (
  `tmembers_id` varchar(50) NOT NULL DEFAULT '',
  `team` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tmembers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`tmembers_id`, `team`) VALUES
('riyazmd.pechu', 'marketing'),
('w.rooney', 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `usertype` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `usertype`) VALUES
('admin', 'admin', 'admin'),
('akash', '123', 'others'),
('kohli', 'mcbc', 'others'),
('m.riyaz', 'killerdrama', 'admin'),
('riyazmd.pechu', 'killerdrama', 'team'),
('sonia.gandhi', 'congress', 'others'),
('ss', 'sa', 'others'),
('w.rooney', 'GGMU', 'team'),
('yuvi', '666666', 'others');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `Name` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `Name`, `Age`, `Gender`, `Address`, `Email`, `phone`) VALUES
('admin', 'Potato Khan', 25, 2, 'Potato Nagar, Potatobad', 'potato_eater@yahoo.com', ''),
('akash', 'akash', 21, 1, 'barak', 'fafdlajl@gmail.com', '135645833'),
('kohli', 'Virat Kohli', 25, 1, 'Bangalore', 'mcbc@yahoo.com', ''),
('m.riyaz', 'Mohammed Riyaz', 20, 1, 'Dihing IITG', 'm.riyaz@iitg.ernet.in', ''),
('riyazmd.pechu', 'Riyaz', 20, 1, 'CSE IITG', 'riyazmd.pechu@gmail.com', ''),
('sonia.gandhi', 'Sonia Ji', 16, 2, 'Bangalore', 'upa@yahoo.com', ''),
('ss', 'ddvblhyv', 45, 1, 'uk bu ', 'uyukhbjuly', '6317367136'),
('w.rooney', 'Wayne Rooney', 25, 1, 'Old Trafford', 'w.rooney@yahoo.com', ''),
('yuvi', 'Yuvraj', 25, 1, 'RCB', '666666@yahoo.com', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_type`
--
ALTER TABLE `competition_type`
  ADD CONSTRAINT `competition_type_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events_details` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `endorsements`
--
ALTER TABLE `endorsements`
  ADD CONSTRAINT `endorsements_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`sponsor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `endorsements_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events_details` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `user` (`username`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`leader`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_members_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_participation`
--
ALTER TABLE `group_participation`
  ADD CONSTRAINT `group_participation_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events_details` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_participation_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sent_user`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recv_user`) REFERENCES `user` (`username`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shows_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events_details` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solo_participation`
--
ALTER TABLE `solo_participation`
  ADD CONSTRAINT `solo_participation_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solo_participation_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events_details` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`tmembers_id`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
