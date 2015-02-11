-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2015 at 06:39 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ck_solipsists`
--

-- --------------------------------------------------------

--
-- Table structure for table `wow_enchants`
--

CREATE TABLE `wow_enchants` (
  `enchantID` int(11) NOT NULL,
  `enchant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wow_enchants`
--

INSERT INTO `wow_enchants` (`enchantID`, `enchant`) VALUES
(0, ''),
(3368, 'Rune of the Fallen Crusader'),
(3370, 'Rune of Razorice'),
(4442, 'Jade Spirit'),
(5275, 'Oglethorpe''s Missile Splitter'),
(5276, 'Megawatt Filament'),
(5281, '+100 Critical Strike'),
(5284, '+30 Critical Strike'),
(5285, '+40 Critical Strike'),
(5292, '+40 Haste'),
(5293, '+40 Mastery'),
(5294, '+40 Multistrike'),
(5295, '+40 Versatility'),
(5297, '+30 Haste'),
(5298, '+100 Haste'),
(5299, '+30 Mastery'),
(5300, '+100 Mastery'),
(5301, '+30 Multistrike'),
(5302, '+100 Multistrike'),
(5303, '+30 Versatility'),
(5310, '+100 Critical Strike & +10% Speed'),
(5311, '+100 Haste & +10% Speed'),
(5312, '+100 Mastery & +10% Speed'),
(5313, '+100 Multistrike & +10% Speed'),
(5317, '+75 Critical Strike'),
(5318, '+75 Haste'),
(5319, '+75 Mastery'),
(5320, '+75 Multistrike'),
(5324, '+50 Critical Strike'),
(5325, '+50 Haste'),
(5326, '+50 Mastery'),
(5327, '+50 Multistrike'),
(5330, 'Mark of the Thunderlord'),
(5331, 'Mark of the Shattered Hand'),
(5334, 'Mark of the Frostwolf'),
(5335, 'Mark of Shadowmoon'),
(5336, 'Mark of Blackrock'),
(5337, 'Mark of Warsong'),
(5383, 'Hemet''s Heartseeker'),
(5384, 'Mark of Bleeding Hollow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wow_enchants`
--
ALTER TABLE `wow_enchants`
  ADD PRIMARY KEY (`enchantID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
