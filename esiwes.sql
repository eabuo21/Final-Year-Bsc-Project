-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 10:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esiwes`
--
CREATE DATABASE IF NOT EXISTS `esiwes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `esiwes`;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryid` int(6) UNSIGNED NOT NULL,
  `countryname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryid`, `countryname`) VALUES
(1, 'Nigeria'),
(2, 'Ghana');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `logbookId` int(6) UNSIGNED NOT NULL,
  `logbookMat` varchar(100) NOT NULL,
  `logbookDesc` text NOT NULL,
  `logbookAttach` varchar(100) NOT NULL,
  `logbookComment` text NOT NULL,
  `logDeleteReason` varchar(100) NOT NULL,
  `logbookDelete` varchar(100) DEFAULT NULL,
  `logbookDate` date DEFAULT current_timestamp(),
  `logbookTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logbookId`, `logbookMat`, `logbookDesc`, `logbookAttach`, `logbookComment`, `logDeleteReason`, `logbookDelete`, `logbookDate`, `logbookTime`) VALUES
(1, '2011224238', '<p>Week 1 work</p>', '2011224238 2021_03_09 22_39_20 ZIMA PROPOSAL .docx', '', 'mistake', 'deleted', '2021-03-09', '2021-03-09 21:30:18'),
(2, '2011224238', '<p>week 1 work</p>', '2011224238 2021_03_09 22_40_31 DAIKON_PROPOSAL.doc', '', '', '0', '2021-03-09', '2021-03-09 21:29:06'),
(5, '2011224238', '<p>Week two work</p>', '2011224238 2021_03_09 22_15_17 Week 2 work.docx', '', '', '0', '2021-03-09', '2021-03-09 21:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `reglist`
--

CREATE TABLE `reglist` (
  `matno` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `studentshipStatus` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reglist`
--

INSERT INTO `reglist` (`matno`, `fname`, `sname`, `mname`, `sex`, `college`, `dept`, `program`, `level`, `studentshipStatus`, `password`) VALUES
(2011224237, 'Amaka', 'Adewale', 'fr', 'Male', 'ETAB SCH', 'Computer Science', 'fooda', '4', 'Active', '2011224237'),
(2011224238, 'Chidubem', 'Uzochukwu', 'Christopher', 'Male', 'Anambra State University', 'Computer Science', 'B.Sc Computer Science', 'Four', 'Active', '2011224238');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(6) UNSIGNED NOT NULL,
  `roleName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Administrator'),
(2, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `siwespost`
--

CREATE TABLE `siwespost` (
  `siwesPostId` int(6) UNSIGNED NOT NULL,
  `siwesOfficer` varchar(100) DEFAULT NULL,
  `siwesMat` varchar(100) DEFAULT NULL,
  `siwesCompName` varchar(100) DEFAULT NULL,
  `siwesCompAdd` text DEFAULT NULL,
  `siwesCompCountry` varchar(100) DEFAULT NULL,
  `siwesCompState` varchar(100) DEFAULT NULL,
  `siwesCompDate` varchar(100) DEFAULT NULL,
  `siwesCompLetter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siwespost`
--

INSERT INTO `siwespost` (`siwesPostId`, `siwesOfficer`, `siwesMat`, `siwesCompName`, `siwesCompAdd`, `siwesCompCountry`, `siwesCompState`, `siwesCompDate`, `siwesCompLetter`) VALUES
(1, '2011', '2011224238', 'Certified Computer Institutes', 'Ihiala, Anambra State', 'Nigeria', 'Anambra', '2021-03-10', '2011224238 2021_03_09 22_37_43 Acceptance.docx'),
(3, '2011', '2011224237', 'eCuzzy Computer World', 'Iroma, Awka', 'Nigeria', 'Lagos State', '2021-3-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `stafflist`
--

CREATE TABLE `stafflist` (
  `staffId` int(6) UNSIGNED NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `staffno` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stafflist`
--

INSERT INTO `stafflist` (`staffId`, `fname`, `sname`, `mname`, `sex`, `college`, `dept`, `staffno`, `role`) VALUES
(1, 'Amaka', 'Oyedepo', 'Christiana', 'Female', 'Anambra State University', 'Computer Science', 'admin', '1'),
(2, 'Ujunwa', 'Ogechi', 'C', 'Female', 'Anambra State University', 'Bio Chemistry', '2011', '2'),
(3, 'LOGARTS', '', 'fr', 'Male', 'ETAB SCH', 'Civil Engineering', '1111', '2');

-- --------------------------------------------------------

--
-- Table structure for table `staffrole`
--

CREATE TABLE `staffrole` (
  `staffRoleId` int(6) UNSIGNED NOT NULL,
  `staffNum` varchar(100) DEFAULT NULL,
  `staffRoleNo` int(11) DEFAULT NULL,
  `loginTime` datetime DEFAULT NULL,
  `staffDelete` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffrole`
--

INSERT INTO `staffrole` (`staffRoleId`, `staffNum`, `staffRoleNo`, `loginTime`, `staffDelete`) VALUES
(1, 'admin', 1, '2021-03-09 22:26:56', '0'),
(2, '2011', 2, '2021-03-09 22:10:37', '0'),
(7, '1111', 2, '2021-03-09 22:32:43', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateid` int(6) UNSIGNED NOT NULL,
  `statename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateid`, `statename`) VALUES
(1, 'Abia'),
(2, 'Anambra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbookId`);

--
-- Indexes for table `reglist`
--
ALTER TABLE `reglist`
  ADD PRIMARY KEY (`matno`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `siwespost`
--
ALTER TABLE `siwespost`
  ADD PRIMARY KEY (`siwesPostId`);

--
-- Indexes for table `stafflist`
--
ALTER TABLE `stafflist`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `staffrole`
--
ALTER TABLE `staffrole`
  ADD PRIMARY KEY (`staffRoleId`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countryid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `logbookId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siwespost`
--
ALTER TABLE `siwespost`
  MODIFY `siwesPostId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stafflist`
--
ALTER TABLE `stafflist`
  MODIFY `staffId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffrole`
--
ALTER TABLE `staffrole`
  MODIFY `staffRoleId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `stateid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
