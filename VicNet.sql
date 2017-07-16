-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 05:22 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VicNet`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `Id` bigint(20) NOT NULL,
  `FromId` varchar(255) NOT NULL,
  `ToId` varchar(255) NOT NULL,
  `Chat` longtext NOT NULL,
  `FromisRead` bigint(20) NOT NULL,
  `ToisRead` bigint(20) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Id` bigint(20) NOT NULL,
  `Comment` longtext NOT NULL,
  `UserId` bigint(20) NOT NULL,
  `StatusId` bigint(20) NOT NULL,
  `HasPhoto` bigint(20) NOT NULL,
  `PhotoLink` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Active` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `Id` bigint(20) NOT NULL,
  `FromId` varchar(255) NOT NULL,
  `ToId` varchar(255) NOT NULL,
  `FromNickName` varchar(255) NOT NULL,
  `ToNickName` varchar(255) NOT NULL,
  `FromIdAccepted` bigint(20) NOT NULL,
  `ToIdAccepted` bigint(20) NOT NULL,
  `IsFriend` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempt`
--

CREATE TABLE `loginattempt` (
  `Id` bigint(20) NOT NULL,
  `CompassId` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Ip` varchar(255) NOT NULL,
  `WebRTCIP` varchar(255) NOT NULL,
  `UserAgent` varchar(255) NOT NULL,
  `Fingerprint` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Language` varchar(255) NOT NULL,
  `TimeZone` varchar(255) NOT NULL,
  `Touch` varchar(255) NOT NULL,
  `CpuCore` varchar(255) NOT NULL,
  `DB` varchar(255) NOT NULL,
  `CpuClass` varchar(255) NOT NULL,
  `Lie` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` bigint(20) NOT NULL,
  `FromId` varchar(255) NOT NULL,
  `ToId` varchar(255) NOT NULL,
  `TypeId` bigint(20) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `IsRead` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registerattempt`
--

CREATE TABLE `registerattempt` (
  `Id` bigint(20) NOT NULL,
  `CompassId` varchar(255) NOT NULL,
  `NickName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Ip` varchar(255) NOT NULL,
  `WebRTCIP` varchar(255) NOT NULL,
  `UserAgent` varchar(255) NOT NULL,
  `Fingerprint` varchar(255) NOT NULL,
  `Display` varchar(255) NOT NULL,
  `Language` varchar(255) NOT NULL,
  `TimeZone` varchar(255) NOT NULL,
  `Touch` varchar(255) NOT NULL,
  `CpuCore` varchar(255) NOT NULL,
  `DB` varchar(255) NOT NULL,
  `CpuClass` varchar(255) NOT NULL,
  `Lie` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Id` bigint(20) NOT NULL,
  `Status` longtext NOT NULL,
  `FromId` bigint(20) NOT NULL,
  `ToId` bigint(20) NOT NULL,
  `IsSelf` bigint(20) NOT NULL,
  `HasPhoto` bigint(20) NOT NULL,
  `PhotoLink` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Active` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statuslike`
--

CREATE TABLE `statuslike` (
  `Id` bigint(20) NOT NULL,
  `StatusId` bigint(20) NOT NULL,
  `LikerId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `NickName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `websocketclient`
--

CREATE TABLE `websocketclient` (
  `Id` bigint(20) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `Ip` varchar(255) NOT NULL,
  `ClientId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loginattempt`
--
ALTER TABLE `loginattempt`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `registerattempt`
--
ALTER TABLE `registerattempt`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `statuslike`
--
ALTER TABLE `statuslike`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `websocketclient`
--
ALTER TABLE `websocketclient`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loginattempt`
--
ALTER TABLE `loginattempt`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registerattempt`
--
ALTER TABLE `registerattempt`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statuslike`
--
ALTER TABLE `statuslike`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `websocketclient`
--
ALTER TABLE `websocketclient`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
