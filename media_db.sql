-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2018 at 02:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `media_tbl`
--

CREATE TABLE `media_tbl` (
  `MEDIA_ID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `MEDIA_NAME` varchar(250) NOT NULL,
  `FILE_SIZE` int(11) NOT NULL,
  `LENGHT` smallint(6) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT '1',
  `TYPE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_tbl`
--

INSERT INTO `media_tbl` (`MEDIA_ID`, `client_id`, `MEDIA_NAME`, `FILE_SIZE`, `LENGHT`, `STATUS`, `TYPE`) VALUES
(1, 0, 'stream-live', 0, 0, '', 'LIVE'),
(1140, 4, '2The_Faith_that_Overcomes.mp4', 307595045, NULL, '1', 'VOD'),
(1141, 4, 'MTV_The_Love_of_God_SD_rev.mp4', 36450018, NULL, '1', 'VOD'),
(1142, 4, 'Over_the_Counter.mp4', 8702867, NULL, '1', 'VOD'),
(1143, 4, 'ads_money2013.mp4', 9285014, NULL, '1', 'VOD'),
(1144, 4, 'PaulFlint-Savage[NCSRelease].mp4', 33057407, NULL, '1', 'VOD'),
(1145, 4, 'stationid.mp4', 1297497, NULL, '1', 'VOD'),
(1206, 5, 'samplevid.mp4', 11661372, NULL, '1', 'VOD'),
(1207, 5, 'K-391 - Earth [NCS Release].mp4', 10490452, NULL, '1', 'VOD'),
(1208, 5, 'Kasger - Out Here [NCS Release].mp4', 13680316, NULL, '1', 'VOD'),
(1209, 6, 'LEGENDARY.mp4', 9583474, NULL, '1', 'VOD'),
(1223, 1, 'Upbeat & Happy Background Music For Videos.mp4', 13767741, NULL, '1', 'VOD'),
(1241, 7, 'LCMP Station Bumper.mp4', 44316488, NULL, '1', 'VOD'),
(1245, 7, 'advisory-GMOs.mp4', 504833912, NULL, '1', 'VOD'),
(1248, 7, 'DAGYAW.mp4', 309292431, NULL, '1', 'VOD'),
(1252, 7, 'EXPORT_DOCPAO.mp4', 436482048, NULL, '1', 'VOD'),
(1256, 7, 'Forza Underground HL.mp4', 217909752, NULL, '1', 'VOD'),
(1257, 7, 'FORZA_Ali Blas vs Ali Castro_2.mp4', 46482080, NULL, '1', 'VOD'),
(1258, 7, 'FORZA Kevin G vs Khaim A.m4v', 27680634, NULL, '1', 'VOD'),
(1259, 7, 'Balitang Kalikasan w_Gina Lopez.m4v', 26791790, NULL, '1', 'VOD'),
(1260, 7, 'Balitang Kalikasan w_Marlon Mendoza.m4v', 53862030, NULL, '1', 'VOD'),
(1261, 7, 'Kkk Rizaltao June 14 Edit 3-1.m4v', 45219362, NULL, '1', 'VOD'),
(1262, 7, 'Balitang Kalikasan w_Angelina Galang.m4v', 46182836, NULL, '1', 'VOD'),
(1265, 7, 'ConsumersDesk_Full_02_21_18_360_1.mp4', 587640479, NULL, '1', 'VOD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media_tbl`
--
ALTER TABLE `media_tbl`
  ADD PRIMARY KEY (`MEDIA_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media_tbl`
--
ALTER TABLE `media_tbl`
  MODIFY `MEDIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1266;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
