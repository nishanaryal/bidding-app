-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 02:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auctionbid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `AdminName`, `AdminPassword`, `AdminEmail`) VALUES
(1, 'admin1', 'Nepal@123', 'admin1@gmail.com'),
(2, 'admin2', 'Nepal@123', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `bid_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isWin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`bid_id`, `product_id`, `user_id`, `amount`, `bid_time`, `isWin`) VALUES
(1, 2, 1, 18200, '2022-03-24 19:04:04', 0),
(2, 2, 2, 18400, '2022-03-24 19:56:34', 0),
(3, 2, 2, 18600, '2022-03-24 19:56:42', 0),
(4, 2, 2, 18800, '2022-03-24 19:56:49', 0),
(5, 2, 2, 19000, '2022-03-24 19:56:54', 0),
(6, 2, 2, 19200, '2022-03-24 19:57:05', 0),
(7, 2, 2, 19400, '2022-03-24 19:57:08', 0),
(8, 2, 2, 19600, '2022-03-24 20:00:07', 0),
(9, 2, 1, 19800, '2022-03-24 20:00:21', 0),
(10, 1, 1, 8000010, '2022-03-24 20:22:07', 0),
(11, 1, 1, 8100600, '2022-03-24 20:22:49', 0),
(12, 1, 1, 8106000, '2022-03-24 20:25:52', 0),
(13, 1, 1, 8110000, '2022-03-24 20:25:54', 0),
(14, 0, 1, 0, '2022-03-24 22:08:21', 0);

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
(1, 'Car', 'Car', 'car', '', 'car.png', 'kitchen.jpg', 1, 1),
(2, 'Sports Bike', 'Sports Bike', 'sports-bike', '', 'sports-bike.png', 'sports.jpg', 1, 1),
(3, 'Mountain Bike', 'Mountain Bike', 'Mountain Bike', '', 'mountain-bike.png', 'mountain-bike.jpg', 1, 1),
(4, 'SUV', 'SUV', 'suv', '', 'suv.png', 'suv.jpg', 1, 1),
(5, 'Pick Up Truck', 'Pick Up Truck', 'pick-up-truck', '', 'pick-up-truck.png', 'pick-up-truck.jpg', 1, 1),
(6, 'Van', 'Van', 'van', '', 'van.png', 'van.jpg', 1, 1),
(7, 'Hatchback', 'Hatchback', 'hatchback', '', 'hatchback.png', 'hatchback.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_profile`
--

CREATE TABLE `exhibitor_profile` (
  `exhibitorid` int(11) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `listingType` varchar(255) NOT NULL,
  `businessCategory` enum('Showroom','Recondition House','Authorized Seller','Distributor','Sales Person') NOT NULL,
  `slug` varchar(200) NOT NULL,
  `shortdescription` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `focalperson` varchar(255) NOT NULL,
  `orgemail` varchar(255) NOT NULL,
  `orgphone` varchar(255) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `yourposition` varchar(255) NOT NULL,
  `fulladdress` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `googleMapIframe` varchar(500) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isFeatured` tinyint(1) NOT NULL DEFAULT '1',
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `establisheddate` date NOT NULL,
  `profile_coverImg` varchar(255) NOT NULL,
  `profile_logo` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibitor_profile`
--

INSERT INTO `exhibitor_profile` (`exhibitorid`, `orgname`, `listingType`, `businessCategory`, `slug`, `shortdescription`, `description`, `focalperson`, `orgemail`, `orgphone`, `quote`, `yourposition`, `fulladdress`, `postalcode`, `website`, `facebook`, `twitter`, `youtube`, `instagram`, `linkedin`, `googleMapIframe`, `userid`, `categoryid`, `isActive`, `isFeatured`, `isVerified`, `establisheddate`, `profile_coverImg`, `profile_logo`, `profile_photo`) VALUES
(1, 'Suzuki Nepal', 'Individual', 'Showroom', 'suzuki-nepal', '-', 'aaa', 'Rameshwor Chaudhary', 'rameshchaudhary@suzukinepal.com.np', '0411 369 958\r\n\r\n', 'The Right Loan Makes All The Difference', 'Marketing Manager', 'New South Wales, Sydney, 2196,', '2120', 'www.powerfinance.com', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54875.24055089478!2d76.7508579533216!3d30.726761932228868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fedb2d3da9405%3A0xaecad931f1a39595!2sICICI%20Bank%20Sector%2034%2C%20Chandigarh%20-%20Branch%20%26%20ATM!5e0!3m2!1sen!2sin!4v1611821871299!5m2!1sen!2sin\" width=\"100%\" height=\"400\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 2, 6, 1, 1, 1, '2021-01-01', '1628316822.jpg', '1628316674.jpg', '1631528770.jpg'),
(2, 'Kathmandu Auto Mobile Center', 'Organization', 'Recondition House', 'kathmandu-automobile-centre', 'At Marsden Park Home, we’re responding to the changing environment and at this time we will be open 10am to 5pm daily. Some stores are operating alternate hours while others have temporarily closed.', 'At Marsden Park Home, we’re responding to the changing environment and at this time we will be open 10am to 5pm daily. Some stores are operating alternate hours while others have temporarily closed.\r\n\r\nPlease check here for details by retailer.\r\n\r\n The safety of our customers, retail partners, and team are our first priority and we want you to know that our retailers are practicing safe social distancing measures within their stores.\r\n\r\n We remain committed to keeping you informed through our website as further changes affect our Centre community.\r\n\r\nIf you’re looking for information about stores that remain open for walk-in trade, please click here. \r\n\r\nIf you’re looking for information about stores that are trading via online direct delivery, click and collect, by appointment, or by phone order with either contactless pick-up or delivery, please click here. \r\n\r\nIn compliance with Government and Health Authority advice on social distancing, and in response to customer needs at this time – many services have changed. This includes the closure of gathering spaces like playgrounds, rest areas, and eating areas, and reducing access to public amenities during certain times.', 'Kathrine Claire', 'contact@marsdenparkhome.com.au', '+61 2 9634 1116', 'Continuing To Provide Products and Services For our Local Community', 'Sales Manager', '9 Hollinsworth Rd, Marsden Park NSW 2765, Australia', '2120', 'http://marsdenparkhome.com.au', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3318.5763682747756!2d150.83822361481992!3d-33.71990921877712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129bf23010b129%3A0x29b6970911a7653c!2sMarsden%20Park%20Home!5e0!3m2!1sen!2snp!4v1628303339753!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 3, 1, 1, 1, '2021-01-01', '1628314107.jpg', '1631523535.jpg', '1631527623.jpg'),
(3, 'Mortgage Choice Sydney', 'Organization', 'Authorized Seller', 'mortgage-choice-sydney', 'Gerry Grant and Sally Tian are your local Sydney CBD mortgage brokers that can help you find the best home, car or personal loan for you needs.', 'We are known for our extensive lending and financial knowledge, our commitment to our clients, and our ability to find our clients the best loan for their needs.\r\n\r\nWhat makes our service different is that we focus on you, our client. We meet you at a time and place that is convenient to you, we do all we can to help make applying for your home loan easy.\r\n\r\nOur team of home loan experts take the time to listen to your situation and needs, getting to know you and your family, and learning about your future financial goals. We then offer you various solutions that suit your needs, that will support and help you reach your long-term financial plan.', 'Gerry', 'info@mortgagechoice.com.au', '0416 078 089', 'Your trusted home loan experts and mortgage brokers based in the heart of Sydney CBD', 'Sales Manager', 'QUEEN VICTORIA BUILDING, NSW 2000', '2120', 'http://mortgagechoice.com.au', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.879940294674!2d151.20661901442136!3d-33.866984880656716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae4038bcf939%3A0x12d56d4183165a08!2sMortgage%20Choice%20Sydney!5e0!3m2!1sen!2snp!4v1628322048176!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 6, 1, 1, 0, '2021-01-01', '1628326623.jpg', '1628326456.jpg', '1628313331.jpg'),
(4, 'Accent Blinds', 'Organization', 'Distributor', 'ascent-blinds', 'Accent Blinds are specialist in Plantation Shutters, Roller Blinds, Roman Blinds, Vertical Blinds, Panel Glides, Timber and Aluminium Venetians, Curtains and Awnings.', 'Accent Blinds are specialist in Plantation Shutters, Roller Blinds, Roman Blinds, Vertical Blinds, Panel Glides, Timber and Aluminium Venetians, Curtains and Awnings. We offer a free in-home measure and quote, contact us today at info@www.accentblinds.com.au and we’ll bring our showroom to you. We service all of Sydney, Hunter Valley and Newcastle.', 'Gerry', 'info@accentblinds.com.au', '+61 8 9301 2919', 'ADD SOME ACCENT VALUE TO YOUR HOME', 'Managing Director', ' New South Wales, Seven Hills, 2147, 163 Prospect Hwy\r\n\r\n', '2120', 'http://accentblinds.com.au', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.879940294674!2d151.20661901442136!3d-33.866984880656716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae4038bcf939%3A0x12d56d4183165a08!2sMortgage%20Choice%20Sydney!5e0!3m2!1sen!2snp!4v1628322048176!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 4, 1, 1, 1, '2021-01-01', '1628326263.jpg', '1628326214.jpg', '1628313331.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Price` int(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ProductStatus` varchar(255) DEFAULT NULL,
  `Quantity` varchar(255) DEFAULT NULL,
  `StartDate` varchar(255) DEFAULT NULL,
  `EndDate` varchar(255) DEFAULT NULL,
  `Buyer` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CategoryName`, `UserName`, `Price`, `Description`, `ProductStatus`, `Quantity`, `StartDate`, `EndDate`, `Buyer`, `Image`) VALUES
(1, 'Santro B', 'Car', 'user1', 1280300, ' This is a Santro B Model Car, This is for purchase', 'Yes', '10', '2022-03-21', '2022-03-24', '', 'ProductPhoto/kanchenjunga-glacier-trekking-makalu-adventure.jpg'),
(2, 'Full Option Single Owner 2016 Renault Duster RxZ 4WD (w/Full Service History)', 'Car', 'user1', 3650000, ' This is a Santro B Model Car, This is for purchase', 'Yes', '1', '2022-03-21', '2022-03-24', '', 'ProductPhoto/kanchenjunga-glacier-trekking-makalu-adventure.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortdescription` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `additional_info` text NOT NULL,
  `exhibitorid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `auction_start` datetime NOT NULL,
  `auction_end` datetime NOT NULL,
  `base_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `name`, `photo`, `slug`, `shortdescription`, `description`, `features`, `additional_info`, `exhibitorid`, `categoryid`, `isActive`, `isFeatured`, `auction_start`, `auction_end`, `base_price`) VALUES
(1, 'Mint condition, 2018 Hyundai Tucson Diesel AWD in Automatic Transmission', 'mint-condition-2018-hyundai-tucson-diesel-AWD-in-automatic-transmission.jpg', 'mint-condition-2018-hyundai-tucson-diesel-AWD-in-automatic-transmission', 'Only been driven for 28,000 kms, with Full Company Service History.', 'Mint condition, 2018 Hyundai Tucson Diesel AWD in Automatic Transmission. Only been driven for 28,000 kms, with Full Company Service History.\nThis vehicles comes with Dual Airbags, Push Button Start', '', '', 2, 6, 1, 1, '2022-03-25 08:20:00', '2022-03-28 08:20:00', 8000000),
(2, 'Low Run 2018 Hyundai Tucson CRDi AT (w/Full Service History)', 'low-run-2018-hyundai-tucson-crdi-at-wfull-service-history.jpg', 'low-run-2018-hyundai-tucson-crdi-at-wfull-service-history', 'We partner with St George Bank who are offering $4k cashback when you refinance your loan. \r\n\r\nHere ', 'Brand: Hyundai\r\n\r\nModel: Tucson\r\n\r\nColor: White\r\n\r\nFuel Type: Diesel\r\n\r\nWheel Drive: 4 Wheel Drive\r\n\r\nManufactured Year: 2018\r\n\r\nEngine: 2000\r\n\r\nVehicle Type: SUV (5 Seater)\r\n\r\nTransmission: Automatic\r\n\r\nCondition: Used\r\n\r\nDoors: 5\r\n\r\nSeats: 5', '<ul>\r\n<li>Front Air Bag(s)</li>\r\n<li>Audio Player</li>\r\n<li>Power Steering</li>\r\n<li>Power Window(s)</li>\r\n<li>Air Conditioner</li>\r\n<li>Powered Side Mirrors (ORVMs)</li>\r\n<li>Alloy Wheels</li>\r\n<li>Rear Defogger</li>\r\n<li>Audio Controls in Steering Wheel</li>\r\n<li>Push Button Start</li>\r\n<li>Bluetooth Connectivity</li>\r\n<li>Daytime Running Lights (DRLs)</li>\r\n<li>Rear Parking Sensors</li>\r\n<li>Leather Seats</li>\r\n<li>Electrically Powered Driver Seat</li>\r\n<li>Rear Parking Camera</li>\r\n<li>AC Vents for Rear Passengers</li>\r\n</ul>', '', 1, 6, 1, 1, '2022-03-23 08:20:00', '2022-03-28 20:00:00', 18000),
(3, 'Single Owner 2017 Renault Duster RXS Diesel', 'single-owner-2017-renault-duster-rxs-diesel.jpg', 'single-owner-2017-renault-duster-rxs-diesel', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3465000),
(5, 'Product 1', 'mint-condition-2018-hyundai-tucson-diesel-AWD-in-automatic-transmission.jpg', '-sdfgh', 'Short Description', 'Product Description', 'Features', 'Additional Info', 1, 4, 1, 1, '2022-03-25 05:15:00', '2022-03-25 05:15:00', 25000),
(6, 'Product 134', 'mint-condition-2018-hyundai-tucson-diesel-AWD-in-automatic-transmission.jpg', '-sdfghdafafafafa', 'Short Description', 'Product Description', 'Features', 'Additional Info', 2, 5, 1, 1, '2022-03-25 06:25:00', '2022-03-25 06:25:00', 75000),
(7, 'Product 134dafafa', 'mint-condition-2018-hyundai-tucson-diesel-AWD-in-automatic-transmission.jpg', '-sdfghdafafafafafdadfaf', '              adada                                      This is Product 1\r\n                        ', '                                                    This is Product 1\r\n                                  adfafa              ', '                                                    Features\r\n                                          dfaa      ', '                                                    Additional Info\r\n                                        afdafa        ', 2, 3, 1, 1, '2022-03-25 06:27:00', '2022-03-25 08:24:00', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `user_type` enum('Seller','Buyer') NOT NULL,
  `user_role` enum('general','moderator','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `email`, `phone`, `gender`, `dob`, `address`, `image`, `user_type`, `user_role`) VALUES
(1, 'Anu Lungeli', 'silverlun', 'Nepal@123', 'silverlun.03@gmail.com', '9849845061', 'Female', '2046-09-09', 'Sanepa Kathmandu', 'anulungeli.jpg', 'Seller', 'admin'),
(2, 'User 2', 'user2', 'Nepal@123', 'user2@gmail.com', '9849845061', 'Female', '2046-09-09', 'Sanepa Kathmandu', 'anulungeli.jpg', 'Seller', 'general'),
(3, 'User 3', 'user3', 'Nepal@123', 'user3@gmail.com', '9849845061', 'Female', '2046-09-09', 'Sanepa Kathmandu', 'anulungeli.jpg', 'Seller', 'general'),
(4, 'User 4', 'user4', 'Nepal@123', 'user4@gmail.com', '9849845061', 'Female', '2046-09-09', 'Sanepa Kathmandu', 'anulungeli.jpg', 'Seller', 'general');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidders`
--
ALTER TABLE `bidders`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `exhibitor_profile`
--
ALTER TABLE `exhibitor_profile`
  ADD PRIMARY KEY (`exhibitorid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `exhibitorid` (`exhibitorid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `exhibitor_profile`
--
ALTER TABLE `exhibitor_profile`
  MODIFY `exhibitorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
