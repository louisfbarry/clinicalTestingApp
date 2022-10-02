-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 01:55 AM
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
(13, ' Cardiology   ', 4, 'Patients must be 18 years old or above\r\nPatients must attend for 2 weeks mininum', 'Start date 26/9/22', ' Yes      ', '6'),
(15, ' Cardiology - How it affects the elderly', 4, 'Patients must be 18+ Paitents must not have any current sickness (E.g covid, cold/flu etc.', 'Start date: 25/9/22. Early Stages of major clinical study', ' Yes    ', ' 4    ');

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
(2, 54, 'Nick Robertson', 'Cardiology', '2022-08-18 11:00:00.000000', 'No Treatment Description', 1, 'Yes', 'Yes', 'No additional notes'),
(6, 111232, 'Angus Davies', 'Heartrate', '2022-08-03 10:17:00.000000', 'Treatment date: 5/9/22', 10, 'Yes', 'NO', 'No additional notes'),
(7, 123232323, 'Tom Wildey', 'caridology', '2022-09-30 16:59:00.000000', 'No Treatment provided. Just observation of high body temperature, sweating etc.', 1, 'yes', 'No', 'No additional notes');

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
(234240, 'James        ', 'Nicholas                      ', '2022-09-01', '23 Fly Street                  ', 'male                      ', '55kg                      ', '150cm', '    Has had influenza', '    Allergic to cats and fur    ', '13', 'Cardiology'),
(234241, 'Davidson  ', 'Luke  ', '2022-09-01', '123 Happy Street   ', 'male      ', '55kg      ', '150cm', 'Has recently broke multiple bones in their body', 'Allergic to tomatoes', 'Unassigned', 'Unassigned'),
(234242, 'Davidson    ', 'Nicholas    ', '2022-09-23', '45 Main Road   ', 'male    ', '55kg    ', '150cm', 'No broken bones or diseases. May have mental health issues though', 'No allergies', 'Unassigned', 'Unassigned'),
(234243, 'Anthony     ', 'Tupou     ', '2022-10-04', 'Level 1 Happy Street NSW     ', 'male     ', '43kg     ', '159cm', ' Is on Anitbiotics due to depression', ' Allergic to Peanut butter ', '13', 'Cardiology: How it affects the elderly'),
(234244, 'Scolari       ', 'Nicholas       ', '2022-10-06', '48 BEATTIE ST Balmain       ', 'Female       ', '55kg       ', '150cm', '     No Medical history', '    No allergies    ', '13', 'Cardiology');

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
(32323, 'Cardiology Extended Org', 'No description', 'No Expertise\r\n'),
(123112, ' Cancer Organisation', 'No desc', 'No expertise'),
(1234233, 'The Robertson Organisation', 'Description', 'Expertise');

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
  MODIFY `patientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234245;

--
-- AUTO_INCREMENT for table `trialorg`
--
ALTER TABLE `trialorg`
  MODIFY `trialOrgID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234237;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
