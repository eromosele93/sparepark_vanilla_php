-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 02:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `pin`) VALUES
('sparepark.admin@co.uk', 'Systemadmin2023-%', 6952);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `ownerID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `spaceaddress` varchar(255) DEFAULT NULL,
  `spacepostcode` varchar(255) DEFAULT NULL,
  `owneremail` varchar(255) DEFAULT NULL,
  `ownerphone` varchar(255) DEFAULT NULL,
  `driverID` int(11) DEFAULT NULL,
  `spaceType` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `paidOnline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `hours`, `ownerID`, `amount`, `spaceaddress`, `spacepostcode`, `owneremail`, `ownerphone`, `driverID`, `spaceType`, `date`, `time`, `customerID`, `paidOnline`) VALUES
(22, 4, 1, 8, '11 Garnham Street', 'N16 7JA', 'eromosele.okoudoh@yahoo.com', '07534728480', 3, 'Private Drive-way', '2023-05-13', '16:00:00', 1, 'No'),
(23, 2, 2, 4, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-12', '18:00:00', 1, 'No'),
(24, 1, 3, 2, '9 Garnham Street', 'N16 7JA', 'eromosele.okoudoh@gmail.com', '07061611393', 1, 'Garage', '2023-05-07', '08:50:00', 3, 'No'),
(25, 4, 2, 8, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-14', '20:00:00', 1, 'No'),
(26, 1, 2, 2, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-13', '17:40:00', 1, 'No'),
(27, 6, 2, 12, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-18', '19:43:00', 1, 'No'),
(28, 6, 2, 12, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-18', '19:43:00', 1, 'No'),
(29, 2, 2, 4, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-21', '08:00:00', 1, 'No'),
(30, 7, 2, 14, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 3, 'Private Drive-way', '2023-05-25', '09:00:00', 1, 'No'),
(79, 3, 2, 4, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 5, 'Private Drive-way', '2023-05-18', '15:50:00', 1, 'No'),
(80, 1, 8, 2, '15 White Kenneth Street', 'E1 7BS', 'mark.anthony2021@gmail.com', '07564536573', 1, 'Private Drive-way', '2023-05-16', '22:55:00', 5, 'No'),
(81, 7, 8, 14, '15 White Kenneth Street', 'E1 7BS', 'mark.anthony2021@gmail.com', '07564536573', 1, 'Private Drive-way', '2023-05-18', '08:00:00', 5, 'No'),
(82, 4, 2, 8, '110 Middlesex Street', 'E1 7HT', 'eromosele.okoudoh@yahoo.com', '07061611393', 5, 'Private Drive-way', '2023-05-20', '18:15:00', 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(25) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `cityName`, `countryID`) VALUES
(1, 'London', 1),
(2, 'Manchester', 1),
(3, 'Birminghan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryName`) VALUES
(1, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `postcodeID` int(11) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `customerID`, `postcodeID`, `address`, `phone`) VALUES
(1, 1, 1, 'Stoke Newington', '07534728480'),
(3, 3, 9, '52 Mount Pleasant ', '07061611393'),
(5, 5, 11, '37 Hornsey road. Islington', '07564536573');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `postcodeID` int(11) NOT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`postcodeID`, `postcode`, `cityID`) VALUES
(1, 'N16 7JA', 1),
(2, 'E1 7HT', 1),
(3, 'EC4N 1SA', 1),
(4, 'SE12 0AA', 1),
(5, 'NW1 0AU', 1),
(6, 'NW1 0AU', 1),
(7, 'SW6 6HH', 1),
(8, 'E11 4QL', 1),
(9, 'N17 6TN', 1),
(10, 'E1 7BS', 1),
(11, 'N17 6JE', 1),
(12, 'N12 0AA', 1),
(13, 'N5 1AB', 1),
(14, 'N5 1A7', 1),
(15, 'SE7 7AG', 1),
(16, 'SW2 1AA', 1),
(17, 'SW2 1AH', 1),
(18, 'SW2 1AG', 1),
(19, 'E4 0AQ', 1),
(21, 'E1 1FR ', 1),
(23, 'E1 9TN', 1),
(25, 'E17 0BB', 1),
(27, 'N5 1BG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spaceowner`
--

CREATE TABLE `spaceowner` (
  `ownerID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `postcode` varchar(25) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `spaceType` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spaceowner`
--

INSERT INTO `spaceowner` (`ownerID`, `customerID`, `postcode`, `address`, `email`, `phone`, `spaceType`) VALUES
(1, 1, 'N16 7JA', '11 Garnham Street', 'eromosele.okoudoh@yahoo.com', '07534728480', 'Private Drive-way'),
(2, 1, 'E1 7HT', '110 Middlesex Street', 'eromosele.okoudoh@yahoo.com', '07061611393', 'Private Drive-way'),
(3, 3, 'N16 7JA', '9 Garnham Street', 'eromosele.okoudoh@gmail.com', '07061611393', 'Garage'),
(7, 5, 'N17 6JE', '37 Hornsey road. Islington', 'mark.anthony2021@gmail.com', '07564536573', 'Garage'),
(8, 5, 'E1 7BS', '15 White Kenneth Street', 'mark.anthony2021@gmail.com', '07564536573', 'Private Drive-way');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `customerID` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `firstName` varchar(35) DEFAULT NULL,
  `lastName` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`customerID`, `email`, `password`, `firstName`, `lastName`) VALUES
(1, 'eromosele.okoudoh@yahoo.com', 'eromosele1234', 'Eromosele', 'Okoudoh'),
(3, 'eromosele.okoudoh@gmail.com', 'Fcarsenal1', 'Jude', 'James'),
(5, 'mark.anthony2021@gmail.com', 'mark1234', 'James-Mark', 'Anthony');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `ownerID` (`ownerID`),
  ADD KEY `driverID` (`driverID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `countryID` (`countryID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `postcodeID` (`postcodeID`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`postcodeID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `spaceowner`
--
ALTER TABLE `spaceowner`
  ADD PRIMARY KEY (`ownerID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`customerID`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `postcode`
--
ALTER TABLE `postcode`
  MODIFY `postcodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `spaceowner`
--
ALTER TABLE `spaceowner`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `spaceowner` (`ownerID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`driverID`) REFERENCES `driver` (`driverID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `useraccount` (`customerID`),
  ADD CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`postcodeID`) REFERENCES `postcode` (`postcodeID`);

--
-- Constraints for table `postcode`
--
ALTER TABLE `postcode`
  ADD CONSTRAINT `postcode_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`);

--
-- Constraints for table `spaceowner`
--
ALTER TABLE `spaceowner`
  ADD CONSTRAINT `spaceowner_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `useraccount` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
