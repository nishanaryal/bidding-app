-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expotv-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `displayTitle` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortDescription` varchar(255) NOT NULL,
  `icon_image` varchar(255) NOT NULL,
  `featuredImage` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isFeatured` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `name`, `displayTitle`, `slug`, `shortDescription`, `icon_image`, `featuredImage`, `isActive`, `isFeatured`) VALUES
(1, 'Kitchen', 'Kitchen', 'kitchen', '', 'kitchen.png', 'kitchen.jpg', 1, 1),
(2, 'Home Appliances', 'Home Appliances', 'home-appliances', '', 'home-appliances.png', 'home-appliances.jpg', 1, 1),
(3, 'Flooring', 'Flooring', 'flooring', '', 'flooring.png', 'flooring.jpg', 1, 1),
(4, 'Window & Doors', 'Window & Doors', 'window-and-doors', '', 'windows-doors.png', 'window-and-doors.jpg', 1, 1),
(5, 'Bedroom', 'Bedroom', 'bedroom', '', 'bedroom.png', 'bedroom.jpg', 1, 1),
(6, 'Finance and Legal Services', 'Finance and Legal Services', 'finance-legal-services', '', 'finance-legal-services.png', 'financial-and-legal-services.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
