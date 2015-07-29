-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2013 at 09:41 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connect+`
--
CREATE DATABASE IF NOT EXISTS `connect+` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `connect+`;

-- --------------------------------------------------------

--
-- Table structure for table `friend list`
--

DROP TABLE IF EXISTS `friend list`;
CREATE TABLE IF NOT EXISTS `friend list` (
  `UID` int(11) NOT NULL,
  `FR_ID` int(11) NOT NULL,
  KEY `frnd.UID` (`UID`),
  KEY `frnd.frid` (`FR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend list`
--

INSERT INTO `friend list` (`UID`, `FR_ID`) VALUES
(24, 23),
(24, 22);

--
-- Triggers `friend list`
--
DROP TRIGGER IF EXISTS `frnd count`;
DELIMITER //
CREATE TRIGGER `frnd count` AFTER INSERT ON `friend list`
 FOR EACH ROW UPDATE user SET frcnt = frcnt + 1 where ID = NEW.UID or ID = NEW.FR_ID
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `friend_req`
--

DROP TABLE IF EXISTS `friend_req`;
CREATE TABLE IF NOT EXISTS `friend_req` (
  `SID` int(11) NOT NULL,
  `RID` int(11) NOT NULL,
  KEY `frereq.rid` (`RID`),
  KEY `frreq.sid` (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `Name` (`Name`),
  KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Name`, `password`, `email`, `id`) VALUES
('shreyas g', '08fa0a7e19b1eaaa7655d54fabf8ec61', 'shreyas@gmail.com', 22),
('sayan paul', '3c074715f9c6f379f61a91f534347e31', 'sayan@gmail.com', 23),
('shyam gopal', '5a4cd850fc787d454416aa3a47580468', 'shyam@gmail.com', 24);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `MID` int(12) NOT NULL AUTO_INCREMENT,
  `SID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `R/U` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MID`),
  KEY `m.sid` (`SID`),
  KEY `m.did` (`DID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MID`, `SID`, `DID`, `msg`, `Timestamp`, `R/U`) VALUES
(1, 24, 22, ':) :) yay!!!', '2013-11-20 20:35:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` enum('Business','Food','Places','Education','Movies','Books','Hobbies','Sports') NOT NULL,
  `PPID` int(11) NOT NULL,
  `About` text NOT NULL,
  PRIMARY KEY (`PID`),
  UNIQUE KEY `page.pic` (`PPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`PID`, `Admin`, `Name`, `Type`, `PPID`, `About`) VALUES
(5, 22, 'NITK', 'Education', 42, 'ITS our college');

-- --------------------------------------------------------

--
-- Table structure for table `page_likes`
--

DROP TABLE IF EXISTS `page_likes`;
CREATE TABLE IF NOT EXISTS `page_likes` (
  `PID` int(11) NOT NULL,
  `LK_ID` int(11) NOT NULL,
  KEY `pgl.pid` (`PID`),
  KEY `pgl.lk` (`LK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_likes`
--

INSERT INTO `page_likes` (`PID`, `LK_ID`) VALUES
(5, 22);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pglks`
--
DROP VIEW IF EXISTS `pglks`;
CREATE TABLE IF NOT EXISTS `pglks` (
`PID` int(11)
,`likes` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `SID` int(12) NOT NULL,
  `DID` int(12) NOT NULL,
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(1000) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `P/U` set('page','user') NOT NULL,
  `Likes` int(11) NOT NULL,
  PRIMARY KEY (`PID`),
  KEY `Likes` (`Likes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE IF NOT EXISTS `post_likes` (
  `PID` int(11) NOT NULL,
  `LK_ID` int(11) NOT NULL,
  KEY `POSTLIKES.PID` (`PID`),
  KEY `POST.LKID` (`LK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `post_likes`
--
DROP TRIGGER IF EXISTS `one more`;
DELIMITER //
CREATE TRIGGER `one more` AFTER INSERT ON `post_likes`
 FOR EACH ROW UPDATE post SET likes = likes + 1 WHERE PID = NEW.PID
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prpic`
--

DROP TABLE IF EXISTS `prpic`;
CREATE TABLE IF NOT EXISTS `prpic` (
  `PPID` int(11) NOT NULL AUTO_INCREMENT,
  `Image_URL` varchar(200) NOT NULL,
  PRIMARY KEY (`PPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `prpic`
--

INSERT INTO `prpic` (`PPID`, `Image_URL`) VALUES
(39, 'user_pics/shreyasg.jpg'),
(40, 'user_pics/sayanpaul.jpg'),
(41, 'user_pics/shyamgopal.jpg'),
(42, 'user_pics/NITK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `First` varchar(15) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Last` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` text NOT NULL,
  `About_me` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `r_status` text NOT NULL,
  `Location` varchar(25) NOT NULL,
  `PPID` int(11) NOT NULL,
  `frcnt` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `emailid` (`email`),
  UNIQUE KEY `user.ppid` (`PPID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First`, `Contact`, `Last`, `DOB`, `Sex`, `About_me`, `email`, `r_status`, `Location`, `PPID`, `frcnt`) VALUES
(22, 'shreyas', '9535662515', 'g', '1993-12-08', 'male', 'HI !!!!', 'shreyas@gmail.com', 'It''s complicated', 'BANGALORE,India', 39, 1),
(23, 'sayan', '9480389723', 'paul', '1980-01-01', 'male', ':) :)', 'sayan@gmail.com', 'Single', 'surathkal,India', 40, 1),
(24, 'shyam', '9980123123', 'gopal', '1997-01-01', 'male', 'Here!!!', 'shyam@gmail.com', 'Single', 'mangalore,Afghanistan', 41, 2);

-- --------------------------------------------------------

--
-- Structure for view `pglks`
--
DROP TABLE IF EXISTS `pglks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pglks` AS select `page`.`PID` AS `PID`,count(`page_likes`.`LK_ID`) AS `likes` from (`page` join `page_likes`) where (`page`.`PID` = `page_likes`.`PID`) group by `page`.`PID`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend list`
--
ALTER TABLE `friend list`
  ADD CONSTRAINT `friend list_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend list_ibfk_2` FOREIGN KEY (`FR_ID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_req`
--
ALTER TABLE `friend_req`
  ADD CONSTRAINT `friend_req_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_req_ibfk_2` FOREIGN KEY (`RID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`PPID`) REFERENCES `prpic` (`PPID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `page_likes`
--
ALTER TABLE `page_likes`
  ADD CONSTRAINT `page_likes_ibfk_2` FOREIGN KEY (`LK_ID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_likes_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `page` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`LK_ID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`PPID`) REFERENCES `prpic` (`PPID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
