-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2015 at 03:20 PM
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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `realm` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `role` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `class` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `ilvl` int(11) NOT NULL,
  `ring_max` int(11) NOT NULL,
  `heroics` int(11) NOT NULL,
  `head` int(11) NOT NULL,
  `neck` int(11) NOT NULL,
  `shoulder` int(11) NOT NULL,
  `back` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `wrist` int(11) NOT NULL,
  `hands` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `legs` int(11) NOT NULL,
  `feet` int(11) NOT NULL,
  `ring1` int(11) NOT NULL,
  `ring2` int(11) NOT NULL,
  `trinket1` int(11) NOT NULL,
  `trinket2` int(11) NOT NULL,
  `mainhand` int(11) NOT NULL,
  `offhand` int(11) NOT NULL,
  `enchant_weapon` int(11) NOT NULL,
  `enchant_neck` int(11) NOT NULL,
  `enchant_cloak` int(11) NOT NULL,
  `enchant_ring1` int(11) NOT NULL,
  `enchant_ring2` int(11) NOT NULL,
  `highmaul_kills_normal` int(11) NOT NULL,
  `highmaul_kills_heroic` int(11) NOT NULL,
  `highmaul_kills_mythic` int(11) NOT NULL,
  `blackrock_kills_normal` int(11) NOT NULL,
  `blackrock_kills_heroic` int(11) NOT NULL,
  `blackrock_kills_mythic` int(11) NOT NULL,
  `IsCurrent` tinyint(4) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `thumbnail` varchar(256) NOT NULL,
  `postContent` text NOT NULL,
  `postDate` datetime NOT NULL,
  `postUser` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wow_classes`
--

CREATE TABLE `wow_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `colour` varchar(7) NOT NULL,
  `css_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`name`,`realm`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `wow_classes`
--
ALTER TABLE `wow_classes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
