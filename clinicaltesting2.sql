-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 10:05 AM
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
(2, 'Cardiology - How it affects the elderly ', 2, 'Eligibility\r\n\r\nNo patients below the age of 18', 'Description Clinical study starts on 6/9/22', ' No ', '6'),
(3, ' This is the one', 1, '444555', 'Description', ' YES', ' NO'),
(4, ' 1111', 1, 'YES', 'What', ' YES', ' YES');

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
(0, 111, 'Nick', 'caridology', '2022-08-18 09:54:00.000000', 'yes', 1, 'Yes', 'Yes', 'tt'),
(0, 5555555, 'Nick Thanh', 'caridology', '2022-08-18 11:00:00.000000', 'Treat', 1, 'Yes', 'Yes', 'All is good'),
(0, 1212121, 'Nick whoopsie', 'caridology', '2022-08-11 14:42:00.000000', 'Hello there', 6, 'Yes', 'yes', 'Hey'),
(0, 1212121, 'Nick whoopsie', 'caridology', '2022-08-11 14:42:00.000000', 'Hello there', 6, 'Yes', 'yes', 'Hey'),
(0, 2147483647, '111111111', 'Hello', '2022-08-05 14:50:00.000000', 'hjfjdfidjfk', 1, 'Yes', 'Yes', 'Hello there\r\n'),
(0, 111232, 'Nick', 'Heartrate', '2022-08-03 10:17:00.000000', 'Usdfs', 10, 'Yes', 'NO', 'Hello thetr'),
(0, 123232323, 'Nick', 'caridology', '2022-09-30 16:59:00.000000', 'No treatment desc', 1, 'yes', 'No', 'No addtional notes'),
(0, 1212, 'Harry jameson', 'Cardiology', '2022-09-02 17:47:00.000000', '2 injections', 1, 'Yes', 'YEs', 'What is happening here Additional Observation notes'),
(0, 1233232, 'Nick', 'Cardiology', '2022-09-11 17:48:00.000000', '2 injections', 5, 'Yes', 'Yes', 'No addtional notes'),
(0, 112433, 'Nick', 'Cardiology', '2022-09-08 10:12:00.000000', 'Treated', 5, 'Yes', 'No', 'Additional notes'),
(0, 3434343, 'Nsamr', 'Clinical Study', '2022-09-07 10:24:00.000000', 'dfdfdf', 5, 'YES', 'NO', 'dfddfddf'),
(0, 12121, 'Nick', 'Cardiology ', '2022-08-30 10:51:00.000000', 'None', 4, 'YEs', 'No', 'Observation notes'),
(0, 2432, 'Nick', 'Cardiology', '2022-09-09 10:55:00.000000', 'Description', 6, 'Yes', 'No', 'Observation'),
(0, 435343, 'Nick', 'Cardiology', '2022-09-02 11:00:00.000000', 'No treatment', 6, 'Yes', 'Yes', 'No observation notes');

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
(234236, 'Scolari', 'Nicholas', '2022-09-08', '123 5 Street', ' ', ' 58kg', ' 200cm', ' No Medical History', '  No Allergies', '1', 'Cardiology'),
(234237, 'Scolari', 'Nicholas', '2022-09-02', '54 Happy Street Balmain', ' ', ' 48kg', ' 200cm', ' Medical History Extensive', '  No Allergies', '343', 'Cardiology'),
(234238, 'Scolari', 'Nicholas', '2022-09-02', '48 BEATTIE ST Balmain', 'on', '55kg', '150cm', 'No MEd history', 'No allergy list', '2342', 'Cardiology ');

-- --------------------------------------------------------

--
-- Table structure for table `trialorg`
--

CREATE TABLE `trialorg` (
  `trialorgid` int(255) NOT NULL,
  `trialorgname` varchar(255) NOT NULL,
  `trialorgdesc` varchar(255) NOT NULL,
  `cexpertise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trialorg`
--

INSERT INTO `trialorg` (`trialorgid`, `trialorgname`, `trialorgdesc`, `cexpertise`) VALUES
(111555, 'hsdf', 'YES', 'Cardiology'),
(0, '', '', ''),
(0, '', '', ''),
(111111, '', '', ''),
(1234232, 'hello', 'Yes', 'What is up'),
(23232, 'This is the trial Orgf', 'Nothing', 'Description'),
(32323, 'Nick trial org', 'No description', 'No Expertise\r\n'),
(123112, 'Nick', 'No desc', 'no expertise');

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
-- Indexes for table `patientrecords`
--
ALTER TABLE `patientrecords`
  ADD PRIMARY KEY (`patientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinicalstudies`
--
ALTER TABLE `clinicalstudies`
  MODIFY `studyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patientrecords`
--
ALTER TABLE `patientrecords`
  MODIFY `patientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
