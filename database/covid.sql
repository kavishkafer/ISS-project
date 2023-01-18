-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 09:30 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Admin', 'admin', 779091795, 'naveen.sack@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-19 18:30:00'),
(3, 'UCSC', 'UCSC', 779091795, 'test@ucsc.com', 'd32934b31349d77e70957e057b1bcd28', '2022-04-15 07:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatients`
--

CREATE TABLE `tblpatients` (
  `id` int NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `GovtIssuedId` varchar(150) DEFAULT NULL,
  `GovtIssuedIdNo` varchar(150) DEFAULT NULL,
  `FullAddress` varchar(255) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatients`
--

INSERT INTO `tblpatients` (`id`, `FullName`, `MobileNumber`, `DateOfBirth`, `GovtIssuedId`, `GovtIssuedIdNo`, `FullAddress`, `State`, `RegistrationDate`) VALUES
(8, 'Cyril Martinus Shane Prageeth', 812224081, '1997-06-17', 'NIC', '200035800020', 'No.71, Kurunegala Road, Kandy', 'Central Province', '2022-04-15 07:11:36'),
(9, 'Semal Dilmith', 702488725, '1998-10-14', 'NIC', '200035800021', '77/A/2, Temple Road, Kandy', 'Central Province', '2022-04-15 07:12:32'),
(10, 'Avishka Induwara', 779091796, '1999-12-23', 'NIC', '200035800022', '25/15 C, Pushpadana Mawatha, Kandy', 'Central Province', '2022-04-15 07:13:21'),
(11, 'Pabodi Herath', 779091797, '1999-11-11', 'NIC', '200035800023', '25/15 C, Pushpadana Mawatha, Kandy', 'Central Province', '2022-04-15 07:14:29'),
(12, 'Nipuni Rajapakshe', 779091711, '1999-12-12', 'NIC', '200035800024', '25/15 C, Pushpadana Mawatha, Kandy', 'Central Province', '2022-04-15 07:15:13'),
(13, 'Namadee Shakya', 779091555, '2000-08-08', 'NIC', '200035800555', '25/15 C, Pushpadana Mawatha, Kandy', 'Central Province', '2022-04-15 07:16:30'),
(14, 'Roy James', 779091222, '2000-11-22', 'NIC', '200035800553', '25/15 C, Pushpadana Mawatha, Kandy', 'Central Province', '2022-04-15 07:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblphlebotomist`
--

CREATE TABLE `tblphlebotomist` (
  `id` int NOT NULL,
  `EmpID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblphlebotomist`
--

INSERT INTO `tblphlebotomist` (`id`, `EmpID`, `FullName`, `MobileNumber`, `RegDate`) VALUES
(6, '0001', 'Naveen Rajan', 779091795, '2022-04-14 17:42:32'),
(9, '0002', 'Adeepa Bandara', 766266925, '2022-04-15 06:56:03'),
(10, '0003', 'Nishan Madushanka', 763044977, '2022-04-15 06:56:49'),
(11, '0004', 'Theekshani Nathalie', 771093473, '2022-04-15 06:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblreporttracking`
--

CREATE TABLE `tblreporttracking` (
  `id` int NOT NULL,
  `OrderNumber` bigint DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `PostingTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `RemarkBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreporttracking`
--

INSERT INTO `tblreporttracking` (`id`, `OrderNumber`, `Remark`, `Status`, `PostingTime`, `RemarkBy`) VALUES
(22, 676438073, 'Sample Collected', 'Sample Collected', '2022-04-15 07:18:56', 2),
(23, 941832688, 'Sent to Lab', 'Sent to Lab', '2022-04-15 07:19:17', 2),
(24, 989672335, 'Test Completed', 'On the Way for Collection', '2022-04-15 07:19:38', 2),
(25, 380523374, 'Report Attached', 'Delivered', '2022-04-15 07:20:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbltestrecord`
--

CREATE TABLE `tbltestrecord` (
  `id` int NOT NULL,
  `OrderNumber` bigint DEFAULT NULL,
  `PatientMobileNumber` bigint DEFAULT NULL,
  `TestType` varchar(100) DEFAULT NULL,
  `TestTimeSlot` varchar(120) DEFAULT NULL,
  `ReportStatus` varchar(100) DEFAULT NULL,
  `FinalReport` varchar(150) DEFAULT NULL,
  `ReportUploadTime` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AssignedtoEmpId` varchar(150) DEFAULT NULL,
  `AssigntoName` varchar(180) DEFAULT NULL,
  `AssignedTime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestrecord`
--

INSERT INTO `tbltestrecord` (`id`, `OrderNumber`, `PatientMobileNumber`, `TestType`, `TestTimeSlot`, `ReportStatus`, `FinalReport`, `ReportUploadTime`, `RegistrationDate`, `AssignedtoEmpId`, `AssigntoName`, `AssignedTime`) VALUES
(9, 676438073, 812224081, 'Pfizer', '2022-04-23T16:45', 'Sample Collected', NULL, NULL, '2022-04-15 07:11:36', '0001', 'Naveen Rajan', '15-04-2022 12:47:12 PM'),
(10, 941832688, 702488725, 'Moderna', '2022-04-16T14:44', 'Sent to Lab', NULL, NULL, '2022-04-15 07:12:32', '0002', 'Adeepa Bandara', '15-04-2022 12:47:48 PM'),
(11, 989672335, 779091796, 'Sputnik', '2022-04-16T15:46', 'On the Way for Collection', NULL, NULL, '2022-04-15 07:13:21', '0003', 'Nishan Madushanka', '15-04-2022 12:47:57 PM'),
(12, 380523374, 779091797, 'Pfizer', '2022-04-23T12:44', 'Delivered', '2039a493b1da9785e21d7dc05251934c1650007215.pdf', '15-04-2022 12:50:15 PM', '2022-04-15 07:14:29', '0004', 'Theekshani Nathalie', '15-04-2022 12:48:13 PM'),
(13, 897282389, 779091711, 'Pfizer', '2022-04-25T16:45', 'Assigned', NULL, NULL, '2022-04-15 07:15:13', '0003', 'Nishan Madushanka', '15-04-2022 12:48:25 PM'),
(14, 948279483, 779091555, 'Pfizer', '2022-04-23T16:50', NULL, NULL, NULL, '2022-04-15 07:16:30', NULL, NULL, NULL),
(15, 378426191, 779091222, 'Sputnik', '2022-04-19T17:00', NULL, NULL, NULL, '2022-04-15 07:25:50', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatients`
--
ALTER TABLE `tblpatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpatients`
--
ALTER TABLE `tblpatients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
