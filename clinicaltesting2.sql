-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 08:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicaltesting2`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinicalstudies`
--

CREATE TABLE `clinicalstudies` (
  `studyID` int(255) NOT NULL,
  `studyExpertise` varchar(255) NOT NULL,
  `studyPhase` int(255) NOT NULL,
  `eligibility` text NOT NULL,
  `clinicalStudyDescription` text NOT NULL,
  `onStudy` varchar(255) NOT NULL,
  `patientsEnrolledNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinicalstudies`
--

INSERT INTO `clinicalstudies` (`studyID`, `studyExpertise`, `studyPhase`, `eligibility`, `clinicalStudyDescription`, `onStudy`, `patientsEnrolledNumber`) VALUES
(4, ' 1111  ', 1, 'YES', 'What', ' YES  ', '5 '),
(13, ' Cardiology', 5, 'paitents must be 18 years Old or above', 'Description', ' Yes', ' 5'),
(15, ' Cardiology4', 4, 'Paitients must be 18+', 'Description', ' Yes', ' 4');

-- --------------------------------------------------------

--
-- Table structure for table `patientobservationandtreatment`
--

CREATE TABLE `patientobservationandtreatment` (
  `observationandTreatmentID` int(11) NOT NULL,
  `patientID` int(255) NOT NULL,
  `patientName` varchar(255) NOT NULL,
  `clinicalStudyName` varchar(255) NOT NULL,
  `observationDateandTime` datetime(6) NOT NULL,
  `treatmentDescription` mediumtext NOT NULL,
  `painScore` int(255) NOT NULL,
  `tempQuestion` varchar(255) NOT NULL,
  `heartRateQuestion` varchar(255) NOT NULL,
  `additionalObservationNotes` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientobservationandtreatment`
--

INSERT INTO `patientobservationandtreatment` (`observationandTreatmentID`, `patientID`, `patientName`, `clinicalStudyName`, `observationDateandTime`, `treatmentDescription`, `painScore`, `tempQuestion`, `heartRateQuestion`, `additionalObservationNotes`) VALUES
(2, 5555555, 'Nick Thanh', 'caridology', '2022-08-18 11:00:00.000000', 'Treat', 1, 'Yes', 'Yes', 'All is good'),
(3, 1212121, 'Nick whoopsie', 'caridology', '2022-08-11 14:42:00.000000', 'Hello there', 6, 'Yes', 'yes', 'Hey'),
(4, 1212121, 'Nick whoopsie', 'caridology', '2022-08-11 14:42:00.000000', 'Hello there', 6, 'Yes', 'yes', 'Hey'),
(5, 2147483647, '111111111', 'Hello', '2022-08-05 14:50:00.000000', 'hjfjdfidjfk', 1, 'Yes', 'Yes', 'Hello there\r\n'),
(6, 111232, 'Nick', 'Heartrate', '2022-08-03 10:17:00.000000', 'Usdfs', 10, 'Yes', 'NO', 'Hello thetr'),
(7, 123232323, 'Nick', 'caridology', '2022-09-30 16:59:00.000000', 'No treatment desc', 1, 'yes', 'No', 'No addtional notes');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecords`
--

CREATE TABLE `patientrecords` (
  `patientID` int(255) NOT NULL,
  `familyName` varchar(255) NOT NULL,
  `givenName` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `medicalHistory` text NOT NULL,
  `allergies` text NOT NULL,
  `clinicalStudyID` varchar(255) NOT NULL,
  `clinicalStudyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientrecords`
--

INSERT INTO `patientrecords` (`patientID`, `familyName`, `givenName`, `dob`, `address`, `sex`, `weight`, `height`, `medicalHistory`, `allergies`, `clinicalStudyID`, `clinicalStudyName`) VALUES
(234240, 'Scolari', 'Nicholas', '2022-09-01', '232323 Fly Street', 'male', '55kg', '150cm', 'Medical History Altered', 'Allergies altered', '3434345', 'Clinical Study Name11'),
(234241, 'Scolari  ', 'Nicholas  ', '2022-09-01', '48 BEATTIE ST Balmain  ', 'male  ', '55kg  ', '150cm', 'Medical History', 'Allergies', 'Unassigned', 'Unassigned'),
(234242, 'Davidson', 'Nicholas', '2022-09-23', '48 BEATTIE ST Balmain', 'male', '55kg', '150cm', 'Medical History', 'Allergies', 'Unassigned', 'Unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `trialorg`
--

CREATE TABLE `trialorg` (
  `trialOrgID` int(255) NOT NULL,
  `trialOrgName` varchar(255) NOT NULL,
  `trialOrgDesc` varchar(255) NOT NULL,
  `cExpertise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trialorg`
--

INSERT INTO `trialorg` (`trialOrgID`, `trialOrgName`, `trialOrgDesc`, `cExpertise`) VALUES
(32323, 'Nick trial org', 'No description', 'No Expertise\r\n'),
(111555, 'hsdf', 'YES', 'Cardiology'),
(123112, 'Nick', 'No desc', 'no expertise'),
(1234232, 'hello', 'Yes', 'What is up'),
(1234233, 'Nick', 'Description', 'Expertise'),
(1234234, 'Nick', 'Description', 'Expertise!'),
(1234235, 'Trial Organisation', 'Description', 'Expertise'),
(1234236, 'Nick', 'No Description', 'No Expertise');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinicalstudies`
--
ALTER TABLE `clinicalstudies`
  ADD PRIMARY KEY (`studyID`),
  ADD UNIQUE KEY `studyExpertise` (`studyExpertise`);

--
-- Indexes for table `patientobservationandtreatment`
--
ALTER TABLE `patientobservationandtreatment`
  ADD PRIMARY KEY (`observationandTreatmentID`);

--
-- Indexes for table `patientrecords`
--
ALTER TABLE `patientrecords`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `trialorg`
--
ALTER TABLE `trialorg`
  ADD PRIMARY KEY (`trialOrgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinicalstudies`
--
ALTER TABLE `clinicalstudies`
  MODIFY `studyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patientobservationandtreatment`
--
ALTER TABLE `patientobservationandtreatment`
  MODIFY `observationandTreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patientrecords`
--
ALTER TABLE `patientrecords`
  MODIFY `patientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234243;

--
-- AUTO_INCREMENT for table `trialorg`
--
ALTER TABLE `trialorg`
  MODIFY `trialOrgID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234237;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
