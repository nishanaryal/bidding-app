-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:11 AM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortdescription` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `exhibitorid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isFeatured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `name`, `price`, `photo`, `slug`, `shortdescription`, `description`, `exhibitorid`, `categoryid`, `isActive`, `isFeatured`) VALUES
(1, 'Commonwealth Bank Fixed Rate', '', '', 'commonwealth-bank-fixed-rate', 'The Commonwealth Bank is now offering their lowest ever 4 year fixed rate home loan (owner occupied)', 'Commonwealth Bank now offering their lowest ever 4 year fixed rate home loan (owner occupied) with their wealth package.\r\n\r\nFor more information on this offer, contact Powerfinance today.', 1, 6, 1, 0),
(2, 'St George Refinance Offer', '', '', 'commonwealth-bank-fixed-rate', 'We partner with St George Bank who are offering $4k cashback when you refinance your loan. \r\n\r\nHere ', 'We partner with St George Bank who are offering $4k cashback when you refinance your loan. \r\n\r\nHere at Powerfinance, we can help you take advantage of this offer. Apply by 31 Jan 2021. \r\n\r\nFor more information and Terms and Conditions, contact us today.', 1, 6, 1, 1),
(3, 'Home Loans', '', '', 'home-loans', 'Whether it\'s a Home Loan, Investment Loan or Construction Loan, PowerFinance can take all the stress', '<p>Whether it\'s a Home Loan, Investment Loan or Construction Loan, PowerFinance can take all the stress away and ensure that you are getting the best offer that is suitable for you needs.</p>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-', 1, 6, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `exhibitorid` (`exhibitorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`exhibitorid`) REFERENCES `exhibitor_profile` (`exhibitorid`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
