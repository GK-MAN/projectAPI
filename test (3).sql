-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2023 at 09:06 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `AccountId` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AdministratorId` int DEFAULT NULL,
  `CustomerId` int DEFAULT NULL,
  `OwnerId` int DEFAULT NULL,
  PRIMARY KEY (`AccountId`),
  KEY `AdministratorId` (`AdministratorId`),
  KEY `CustomerId` (`CustomerId`),
  KEY `OwnerId` (`OwnerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountId`, `Username`, `Password`, `AdministratorId`, `CustomerId`, `OwnerId`) VALUES
(1, '0606228660', 'secretformula', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `ActivityId` int NOT NULL AUTO_INCREMENT,
  `ActivityName` varchar(55) NOT NULL,
  `Description` varchar(105) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `LogName` varchar(105) NOT NULL,
  PRIMARY KEY (`ActivityId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ActivityId`, `ActivityName`, `Description`, `FileName`, `LogName`) VALUES
(1, 'Hiking', 'Hiking is an activity of moderate difficulty, which involves walking across long distances generally on t', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `AdministratorId` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(65) NOT NULL,
  `LastName` varchar(65) NOT NULL,
  `IdNumber` varchar(155) NOT NULL,
  `PictureFileName` varchar(255) NOT NULL,
  `ContactNumber` varchar(155) NOT NULL,
  `WhatsApp` varchar(155) NOT NULL,
  `IdFileName` varchar(105) NOT NULL,
  `PartnerId` int NOT NULL,
  `AdministratorTypeId` int NOT NULL,
  `Email` varchar(105) NOT NULL,
  PRIMARY KEY (`AdministratorId`),
  KEY `PartnerId` (`PartnerId`),
  KEY `administrator_ibfk_2` (`AdministratorTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdministratorId`, `FirstName`, `LastName`, `IdNumber`, `PictureFileName`, `ContactNumber`, `WhatsApp`, `IdFileName`, `PartnerId`, `AdministratorTypeId`, `Email`) VALUES
(1, 'Squidward Q', 'Tentacles ', '0102034568087', 'null', '0674285497', '0674285497', 'null', 2, 1, 'Tentacles@kustkrabs.sea'),
(2, 'Robert \"SpongeBob\" Harold', 'SquarePants ', '0102034568087', 'null', '0674285499', '0674285499', 'null', 2, 1, 'SquarePants@kustkrabs.sea');

-- --------------------------------------------------------

--
-- Table structure for table `administrator_type`
--

DROP TABLE IF EXISTS `administrator_type`;
CREATE TABLE IF NOT EXISTS `administrator_type` (
  `AdministratorTypeId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(55) NOT NULL,
  PRIMARY KEY (`AdministratorTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator_type`
--

INSERT INTO `administrator_type` (`AdministratorTypeId`, `Description`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `BankId` int NOT NULL AUTO_INCREMENT,
  `BankName` varchar(105) NOT NULL,
  `AccountNumber` varchar(155) NOT NULL,
  `AccountType` varchar(55) NOT NULL,
  `BranchCode` int DEFAULT NULL,
  `AccountHolder` varchar(105) NOT NULL,
  `PartnerId` int NOT NULL,
  PRIMARY KEY (`BankId`),
  KEY `PartnerId` (`PartnerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`BankId`, `BankName`, `AccountNumber`, `AccountType`, `BranchCode`, `AccountHolder`, `PartnerId`) VALUES
(1, 'First National Bank (FNB)', '15056958076', 'Savinggs', 10770, 'Kusty Krabs Pty (Ltd)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Techs', '2022-06-29 16:58:40'),
(2, 'Fun', '2022-06-29 16:58:40'),
(3, 'Games', '2022-06-29 16:58:40'),
(4, 'Science', '2022-06-29 16:58:40'),
(5, 'Trending', '2022-06-29 16:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `chat_box`
--

DROP TABLE IF EXISTS `chat_box`;
CREATE TABLE IF NOT EXISTS `chat_box` (
  `CustomerId` int NOT NULL,
  `PartnerId` int NOT NULL,
  `Message` int NOT NULL,
  `Datestamp` int NOT NULL,
  `Timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `CityId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(105) NOT NULL,
  `ProvinceId` int NOT NULL,
  PRIMARY KEY (`CityId`),
  KEY `ProvinceId` (`ProvinceId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `Description`, `ProvinceId`) VALUES
(1, 'Pretoria', 1),
(2, 'Johannesburg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `CountryId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(105) NOT NULL,
  PRIMARY KEY (`CountryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `Description`) VALUES
(1, 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `cpic_reg`
--

DROP TABLE IF EXISTS `cpic_reg`;
CREATE TABLE IF NOT EXISTS `cpic_reg` (
  `CPIC_Reg_Id` int NOT NULL AUTO_INCREMENT,
  `CPIC_Reg_Num` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CPIC_Reg_Name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CPIC_Reg_Status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PartnerId` int NOT NULL,
  PRIMARY KEY (`CPIC_Reg_Id`),
  KEY `PartnerId` (`PartnerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpic_reg`
--

INSERT INTO `cpic_reg` (`CPIC_Reg_Id`, `CPIC_Reg_Num`, `CPIC_Reg_Name`, `CPIC_Reg_Status`, `PartnerId`) VALUES
(1, NULL, NULL, 'Not Confirmed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerId` int NOT NULL AUTO_INCREMENT,
  `FileName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `IdNumber` int NOT NULL,
  `ContactNumber` int NOT NULL,
  `WhatsApp` int NOT NULL,
  `Email` varchar(105) NOT NULL,
  `GenderId` int NOT NULL,
  `AccountId` int NOT NULL,
  PRIMARY KEY (`CustomerId`),
  KEY `GenderId` (`GenderId`),
  KEY `AccountId` (`AccountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_location`
--

DROP TABLE IF EXISTS `file_location`;
CREATE TABLE IF NOT EXISTS `file_location` (
  `FileId` int NOT NULL AUTO_INCREMENT,
  `ServiceId` int NOT NULL,
  `FileName1` varchar(255) DEFAULT NULL,
  `FileName2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FileName3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FileName4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `FileName5` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`FileId`),
  KEY `ServiceId` (`ServiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_location`
--

INSERT INTO `file_location` (`FileId`, `ServiceId`, `FileName1`, `FileName2`, `FileName3`, `FileName4`, `FileName5`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `GenderId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(105) NOT NULL,
  PRIMARY KEY (`GenderId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GenderId`, `Description`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `OwnerId` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `IdNumber` varchar(155) NOT NULL,
  `PictureFileName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `IdFileName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ContactNumber` varchar(155) NOT NULL,
  `Email` varchar(155) NOT NULL,
  `WhatsApp` varchar(155) NOT NULL,
  `GenderId` int NOT NULL,
  PRIMARY KEY (`OwnerId`),
  KEY `GenderId` (`GenderId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`OwnerId`, `FirstName`, `LastName`, `IdNumber`, `PictureFileName`, `IdFileName`, `ContactNumber`, `Email`, `WhatsApp`, `GenderId`) VALUES
(2, 'Eugene Harold', 'Krabs', '0102031238087', 'null', 'null', '0606228660', 'krabs@kustykrabs.sea', '0606228660', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `PartnerId` int NOT NULL AUTO_INCREMENT,
  `VerfiedStatus` tinyint(1) NOT NULL,
  `CompanyName` varchar(105) NOT NULL,
  `OpenHour` varchar(55) NOT NULL,
  `ClosingHour` varchar(55) NOT NULL,
  `Description` varchar(105) NOT NULL,
  `OwnerId` int NOT NULL,
  `WhatsApp` varchar(155) NOT NULL,
  `ContactNumber` varchar(155) NOT NULL,
  `Email` varchar(155) NOT NULL,
  PRIMARY KEY (`PartnerId`),
  KEY `OwnerId` (`OwnerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`PartnerId`, `VerfiedStatus`, `CompanyName`, `OpenHour`, `ClosingHour`, `Description`, `OwnerId`, `WhatsApp`, `ContactNumber`, `Email`) VALUES
(2, 0, 'Krusty Krab', '08:00:00', '17:00:00', 'The Krusty Krab is a fictional fast food restaurant in the American animated television series SpongeBob ', 2, '0606228660', '0606228660', 'info@kustykrabs.sea');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 1, 'Meticulous align could design he him desk now was uninitiated!', 'To analyzed the by of and if has diesel first even I the an a even sign ocean. Any listen. She he left with now activity caching guest not remodelling more as to his but a been the distributors. For lobby, the fur than have occasion from is roasted client the bed flows into and of produce beacon tones. Have the all by perfectly language the of than impact best to exploration, box text caching arrange goals indeed, differentiates she as and the from eyes. In customary used solitary work past I halfdozen question and employed he that could any.', 'Derrick Reese', '2022-06-29 16:52:59'),
(2, 2, 'Can same has made looked boss Will hunt, by at experience violin.', 'Is off findings. And go she man, the of a outside noise on dragged rationale one with it that peacefully if card he would all powerful state of tone competitive to merely them waved her not the who a young will. A thousand some the trust to than so fifteen fantastic the mars to he empire which character were parents outfits in continued underground, ability if front laid each with and reported both introduced be velocity primarily municipal is as of, human pleasure does on that the be in a its hung other of last he been counter. The hitting and.', 'Maxwell Diaz', '2022-06-29 16:55:11'),
(3, 3, 'Can same has made looked boss Will hunt, by at experience violin.', 'Is off findings. And go she man, the of a outside noise on dragged rationale one with it that peacefully if card he would all powerful state of tone competitive to merely them waved her not the who a young will. A thousand some the trust to than so fifteen fantastic the mars to he empire which character were parents outfits in continued underground, ability if front laid each with and reported both introduced be velocity primarily municipal is as of, human pleasure does on that the be in a its hung other of last he been counter. The hitting and.', 'Maxwell Diaz', '2022-06-29 16:55:19'),
(4, 4, 'The over and of although any is think frequency sisters!', 'Welcoming death, that\'s of it diagrams certainly he latest how is own and presented dins that village them. First relative detailed a spirit, can discipline make he present after many with windshield project death, documents hand, in believed throughout. Should hundreds after such her away. Excuse positives rung. Be carefully!', 'Trenton Pratt', '2022-06-29 16:55:19'),
(5, 5, 'Frequency moving him but of proper duties it are sports.', 'Examples, wanted success ran than win fellow me he flatter one to animals to small it in and he wonder, had build working instead the in bad eighty percent heard a this, her a he ducks of we she of was kind that much something more one to here. Solitary be that differences understood. A among with set she the slightly small the were conduct, assets ocean. Star here. Circumstances. I the was were everyone.', 'Mitchel Gordon', '2022-06-29 16:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `ProvinceId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(105) NOT NULL,
  `CountryId` int NOT NULL,
  PRIMARY KEY (`ProvinceId`),
  KEY `CountryId` (`CountryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`ProvinceId`, `Description`, `CountryId`) VALUES
(1, 'Gauteng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quick_book`
--

DROP TABLE IF EXISTS `quick_book`;
CREATE TABLE IF NOT EXISTS `quick_book` (
  `QuickBookId` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(105) NOT NULL,
  `ContactNumber` int NOT NULL,
  `WhatsApp` int NOT NULL,
  PRIMARY KEY (`QuickBookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ServiceId` int NOT NULL AUTO_INCREMENT,
  `ActivityId` int NOT NULL,
  `PartnerId` int NOT NULL,
  `PricePerBook` int NOT NULL,
  `AddressLine1` varchar(155) NOT NULL,
  `AddressLine2` varchar(155) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `SuburbId` int NOT NULL,
  `CityId` int NOT NULL,
  `Description` varchar(105) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `AdminToContact` int DEFAULT NULL,
  PRIMARY KEY (`ServiceId`),
  KEY `PartnerId` (`PartnerId`),
  KEY `ActivityId` (`ActivityId`),
  KEY `SuburbId` (`SuburbId`),
  KEY `CityId` (`CityId`),
  KEY `AdminToContact` (`AdminToContact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceId`, `ActivityId`, `PartnerId`, `PricePerBook`, `AddressLine1`, `AddressLine2`, `SuburbId`, `CityId`, `Description`, `AdminToContact`) VALUES
(1, 1, 2, 70, 'Kusty Krabs, Bikini Bottom', 'Under the Sea', 15, 1, 'Come and grab a delicious kraby patty. After stuffing yourself with our incredible meal, take a hike to b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `SessionId` int NOT NULL AUTO_INCREMENT,
  `DateLoggedIn` varchar(55) NOT NULL,
  `IpAddress` varchar(105) NOT NULL,
  `GPS_Location` varchar(105) NOT NULL,
  `AccountId` int NOT NULL,
  `TimeLoggedIn` varchar(155) NOT NULL,
  PRIMARY KEY (`SessionId`),
  KEY `AccountId` (`AccountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suburb`
--

DROP TABLE IF EXISTS `suburb`;
CREATE TABLE IF NOT EXISTS `suburb` (
  `SuburbId` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(105) NOT NULL,
  `CityId` int NOT NULL,
  PRIMARY KEY (`SuburbId`),
  KEY `CityId` (`CityId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suburb`
--

INSERT INTO `suburb` (`SuburbId`, `Description`, `CityId`) VALUES
(1, 'Equestria', 1),
(2, 'Arcadia', 1),
(3, 'Silver Lakes', 1),
(4, 'Groenkloof', 1),
(5, 'Silverton', 1),
(6, 'Hatfield', 1),
(7, 'Menlo Park', 1),
(8, 'Sunnyside', 1),
(9, 'Brooklyn', 1),
(10, 'The Willows', 1),
(11, 'Montana', 1),
(12, 'Menlyn', 1),
(13, 'Hazelwood', 1),
(14, 'Hillcrest', 1),
(15, 'Wonderboom', 1),
(16, 'Silver Lakes', 1),
(17, 'Lynnwood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `TicketId` int NOT NULL AUTO_INCREMENT,
  `CustomerId` int DEFAULT NULL,
  `ServiceId` int NOT NULL,
  `Timestamp` varchar(105) NOT NULL,
  `Datestamp` varchar(105) NOT NULL,
  `ReceiptNumber` varchar(105) NOT NULL,
  `QuickBookId` int DEFAULT NULL,
  `Quantity` int NOT NULL,
  `PricePerBook` int NOT NULL,
  `Total` int NOT NULL,
  `VAT` int NOT NULL,
  PRIMARY KEY (`TicketId`),
  KEY `CustomerId` (`CustomerId`),
  KEY `QuickBookId` (`QuickBookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`AdministratorId`) REFERENCES `administrator` (`AdministratorId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`OwnerId`) REFERENCES `owner` (`OwnerId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`PartnerId`) REFERENCES `partner` (`PartnerId`),
  ADD CONSTRAINT `administrator_ibfk_2` FOREIGN KEY (`AdministratorTypeId`) REFERENCES `administrator_type` (`AdministratorTypeId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`PartnerId`) REFERENCES `partner` (`PartnerId`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`ProvinceId`) REFERENCES `province` (`ProvinceId`);

--
-- Constraints for table `cpic_reg`
--
ALTER TABLE `cpic_reg`
  ADD CONSTRAINT `cpic_reg_ibfk_1` FOREIGN KEY (`PartnerId`) REFERENCES `partner` (`PartnerId`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`GenderId`) REFERENCES `gender` (`GenderId`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`AccountId`) REFERENCES `account` (`AccountId`);

--
-- Constraints for table `file_location`
--
ALTER TABLE `file_location`
  ADD CONSTRAINT `file_location_ibfk_1` FOREIGN KEY (`ServiceId`) REFERENCES `service` (`ServiceId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`GenderId`) REFERENCES `gender` (`GenderId`);

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `partner_ibfk_1` FOREIGN KEY (`OwnerId`) REFERENCES `owner` (`OwnerId`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`CountryId`) REFERENCES `country` (`CountryId`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`PartnerId`) REFERENCES `partner` (`PartnerId`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`ActivityId`) REFERENCES `activity` (`ActivityId`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`SuburbId`) REFERENCES `suburb` (`SuburbId`),
  ADD CONSTRAINT `service_ibfk_4` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`),
  ADD CONSTRAINT `service_ibfk_5` FOREIGN KEY (`AdminToContact`) REFERENCES `administrator` (`AdministratorId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `account` (`AccountId`);

--
-- Constraints for table `suburb`
--
ALTER TABLE `suburb`
  ADD CONSTRAINT `suburb_ibfk_1` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerId`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`QuickBookId`) REFERENCES `quick_book` (`QuickBookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
