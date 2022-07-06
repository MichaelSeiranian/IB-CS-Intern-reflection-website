-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 06:41 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `dateandtime1` varchar(50) NOT NULL,
  `reflectionID1` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `feedback`, `dateandtime1`, `reflectionID1`, `userid`) VALUES
(1, 'Ensure to talk about what HR does in Microsoft that\'s unique. ', '2020-01-30 17:30:56', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reflections`
--

CREATE TABLE `reflections` (
  `reflectionID` int(11) NOT NULL,
  `reflection` text NOT NULL,
  `dateandtime` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reflections`
--

INSERT INTO `reflections` (`reflectionID`, `reflection`, `dateandtime`, `userid`) VALUES
(1, 'During this week\'s Coach and Connect session we learned about the role of HR.', '2020-01-30 17:29:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `password`) VALUES
(1, 'alexander.klaiss@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'jorge.wells@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'dolores.mcgee@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'arfa.hills@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'grant.larsen@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'isabell.madden@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'liliana.noel@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'florence.thomson@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'yara.willis@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'harleen.cotton@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(11, 'iram.gibbons@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12, 'ivo.zimmermann@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(13, 'katy.hays@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'kairo.cantu@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(15, 'jaejoon.lee@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(16, 'jagoda.searle@pbis.cz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `reflectionID` (`reflectionID1`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `reflections`
--
ALTER TABLE `reflections`
  ADD PRIMARY KEY (`reflectionID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `reflections`
--
ALTER TABLE `reflections`
  MODIFY `reflectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`reflectionID1`) REFERENCES `reflections` (`reflectionID`) ON UPDATE CASCADE;

--
-- Constraints for table `reflections`
--
ALTER TABLE `reflections`
  ADD CONSTRAINT `reflections_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
