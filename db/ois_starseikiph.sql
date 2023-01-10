-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 05:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ois_starseikiph`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylogs`
--

CREATE TABLE `activitylogs` (
  `activityId` int(11) NOT NULL,
  `activityUniqueId` varchar(250) NOT NULL,
  `userUniqueId` varchar(250) NOT NULL,
  `activityDone` varchar(250) NOT NULL,
  `activityType` int(11) NOT NULL,
  `activityDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylogs`
--

INSERT INTO `activitylogs` (`activityId`, `activityUniqueId`, `userUniqueId`, `activityDone`, `activityType`, `activityDate`) VALUES
(1, '81b974430b13f0f9cf045712241b964c', 'aef2e13daf4e76de930445683ef5ecbc', 'Delete category: Quick Chuck Change', 1, '2022-12-04 19:58:04'),
(2, 'bb6754e1a01cf00b0a899fc876adb9a0', 'aef2e13daf4e76de930445683ef5ecbc', 'Delete category: Quick Chuck Change', 1, '2022-12-04 19:58:55'),
(3, 'b4faadabbc9ce4017f50528d0c29b853', 'aef2e13daf4e76de930445683ef5ecbc', 'QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE - (OA-SSI)', 1, '2022-12-04 23:23:04'),
(4, 'b3eb65f4d79581784a20ec2b41131f32', 'aef2e13daf4e76de930445683ef5ecbc', 'Update product: QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE - (OA-SSI)', 1, '2022-12-04 23:25:04'),
(5, '222e12f43aba64935e45aec80976c39a', 'aef2e13daf4e76de930445683ef5ecbc', 'Delete product: QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE - (OA-SSI)', 1, '2022-12-04 23:25:32'),
(6, '6f1f0496233cd2c645df64a9752f7a4f', 'aef2e13daf4e76de930445683ef5ecbc', 'Update product: QUICK-CHUCK ATTACHMENT MANUAL / ROBOT SIDE - (OA-SSL)', 1, '2022-12-05 00:13:30'),
(7, 'f8b2507b2cf4fcf590d3bd16617e5f2d', 'aef2e13daf4e76de930445683ef5ecbc', 'Update product: QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE - (OA-SSI)', 1, '2022-12-05 00:33:26'),
(8, 'e55bc39a8293264097fcf0fafcf6ba75', 'aef2e13daf4e76de930445683ef5ecbc', 'Update product: QUICK-CHUCK ATTACHMENT MANUAL / ROBOT SIDE - (OA-SSL)', 1, '2022-12-05 00:33:48'),
(9, '3d80634531718f169bd668b144c89710', 'aef2e13daf4e76de930445683ef5ecbc', 'Lawrence: Sign In', 1, '2022-12-05 00:49:35'),
(10, '00802fd70a4b8684e39a90c203240f0a', 'aef2e13daf4e76de930445683ef5ecbc', 'LawrenceSebelina: Sign Out', 3, '2022-12-05 00:51:44'),
(11, '3aba0bd723cc5631f3b93e5a5528cb3c', 'cea5830dfab9e267aa165ee68f0e413d', 'JuanCruz (User) : Sign In', 3, '2022-12-05 00:53:17'),
(12, '60157da3ce5b5eedf9f407429fe8bbd0', 'cea5830dfab9e267aa165ee68f0e413d', 'Juan Cruz (User) : Sign Out', 3, '2022-12-05 00:54:22'),
(13, '6700a877921b0031998b719a1da08aa1', 'cea5830dfab9e267aa165ee68f0e413d', 'Juan Cruz (User) : Sign In', 3, '2022-12-05 00:57:03'),
(14, '1d4163bb678dc6042f2fdda09fa75bf3', 'cea5830dfab9e267aa165ee68f0e413d', 'Juan Cruz (User) : Change company details', 3, '2022-12-05 00:57:10'),
(15, 'e05dd3b7ca84912e722437d1bb0f76b0', 'cea5830dfab9e267aa165ee68f0e413d', 'Juan Cruz (User) : Change profile details', 3, '2022-12-05 00:58:11'),
(16, '2a2824c901bb935b4731a698d0916408', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-05 01:13:15'),
(17, '5ca10095f95fbb6902aa436373a19b9a', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 01:13:24'),
(18, '5530e1cb9c153247245f390bb95a73ca', 'aef2e13daf4e76de930445683ef5ecbc', 'Update: Company information', 3, '2022-12-05 01:17:20'),
(19, 'af2d169a9186a080c1ba6bbad81bb62e', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 01:26:05'),
(20, '2a67aec78e3c4428bbfe461b7856f0de', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 01:26:34'),
(21, 'b3f0700dfb84dccbbc90c9e7a5b05baa', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 10:15:27'),
(22, '6ae62cf2df21d4978a0d3ff850a29bc2', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 10:15:38'),
(23, 'dc7a11a11a3ba728892d00a466af13df', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 12:03:27'),
(24, '40fa099b3c95b06b6f29292dd5a17488', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 12:03:33'),
(25, '4d5a0c86f9fe14e4f579cde0c6c286ed', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 12:05:14'),
(26, '47a13479646ad8fd62fe15d6fa59cab2', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign In', 3, '2022-12-05 12:05:22'),
(27, 'c96277ffb6854d344897c2592c4a0bb9', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-05 12:06:56'),
(28, '5c97055790f35185f6f2eb6366aeeae8', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 12:07:05'),
(29, 'fadc65955541a55e4a809db0f5923ffc', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 12:08:21'),
(30, '73fa3ba0d9ced25ec5cf85c05903e884', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 12:08:28'),
(31, '22fcc4cbd06c8153c4c8cc5edb70af11', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 12:08:35'),
(32, 'da19e0320040a8ef69b79926360bb920', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign In', 3, '2022-12-05 12:08:40'),
(33, '68f91a9074455375b09731df6230a8e9', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-05 12:40:40'),
(34, '1e60274ea227d34e0bcedbe3163a7833', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 12:40:47'),
(35, '0dcb12f202571f675ca89298f4295323', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 20:16:28'),
(36, '93165a370b518612541a9410ca83e43b', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign In', 3, '2022-12-05 20:16:33'),
(37, '43b51f8613e7e3a2f1f4e473ab594968', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-05 20:31:17'),
(38, '9ca6facf97832a6f5a7e74db0d44076b', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 20:31:40'),
(39, 'f0b7947c6618fd5e3e100276045c58c5', 'aef2e13daf4e76de930445683ef5ecbc', 'Add: Payment to order (SSPI-0000002-2022) of Juan Cruz', 4, '2022-12-05 20:43:37'),
(40, '4abcae72651b738ebeb2c433d1becd1c', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 20:45:11'),
(41, 'cb747ca3dcd8b837a0676e20bcd06ac8', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign In', 3, '2022-12-05 20:45:18'),
(42, '323b85f1a7a8a3190f8666aad16f5693', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-05 20:45:59'),
(43, '8c850cf15832395d9faf036380afd079', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-05 20:46:04'),
(44, 'c99e9eb8569638f58073f9df72dc6313', 'aef2e13daf4e76de930445683ef5ecbc', 'Approved: Order (SSPI-0000005-2022)', 4, '2022-12-05 20:52:58'),
(45, 'd3fd12bc092e91dcb82ab012d615622c', 'aef2e13daf4e76de930445683ef5ecbc', 'Set Delivery: Order (SSPI-0000005-2022)', 4, '2022-12-05 20:59:44'),
(46, '4c97b55ea4442f1731048edfb9175f4c', 'aef2e13daf4e76de930445683ef5ecbc', 'Marked: Order (SSPI-0000005-2022) as delivered', 4, '2022-12-05 21:00:00'),
(47, '3c69b049f8f50766a9a3f9dd8020a219', 'aef2e13daf4e76de930445683ef5ecbc', 'Assigned Service Installation: Order (SSPI-0000005-2022)', 5, '2022-12-05 21:23:22'),
(48, 'caa945bbe2a4b86bfda432eaab3d6597', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-05 21:38:22'),
(49, '7af90c26e2229b097070bc1d97cbdd0c', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-08 12:01:02'),
(50, '2782b4fc96bc284e749763c5ccd28b64', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-08 12:01:07'),
(51, '306133776e7d7511d91ae9042c823419', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign In', 3, '2022-12-08 12:01:15'),
(52, '5263d9d21a17594b7baed15f82b870bc', 'cea5830dfab9e267aa165ee68f0e413d', 'Sign Out', 3, '2022-12-08 12:37:54'),
(53, '2c04376e1931c21cb821249f1b4b60a3', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-08 12:38:05'),
(54, '9d6ddf032b25e484572ec539203f0c55', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-08 12:40:32'),
(55, 'b27362672154f9f3fee918d1943abf63', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-08 12:44:31'),
(56, '0b0e075cd1543b0f42ffd44bc8400a1e', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-08 13:02:34'),
(57, 'c0dab174559065b310ea11ace7dbb1f8', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-08 13:02:41'),
(58, 'c605ec9aa20ac111d68717b815564e75', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-08 15:15:24'),
(59, 'e2598f73f8c750cc848f4f795eb09822', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign In', 3, '2022-12-11 17:11:51'),
(60, 'd5e7aecdb7f072feb3657649966a24a7', 'aef2e13daf4e76de930445683ef5ecbc', 'Sign Out', 3, '2022-12-11 17:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) NOT NULL,
  `productRQty` int(11) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `checkedOut` int(11) NOT NULL,
  `cartNotificationStatus` int(11) NOT NULL,
  `cartDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `userId`, `productId`, `productQty`, `productRQty`, `total`, `checkedOut`, `cartNotificationStatus`, `cartDate`) VALUES
(1, 2, 7, 1, 97, '255.00', 1, 1, '2022-12-04 23:51:49'),
(2, 2, 1, 1, 8, '105.00', 1, 1, '2022-12-05 20:45:22'),
(3, 2, 5, 1, 90, '315.00', 1, 1, '2022-12-05 20:45:26'),
(4, 2, 7, 1, 95, '255.00', 1, 1, '2022-12-05 20:45:28'),
(5, 2, 9, 1, 100, '350.00', 0, 1, '2022-12-08 12:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryUniqueId` varchar(100) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(100) NOT NULL,
  `categoryDel` int(11) NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryUniqueId`, `categoryName`, `categoryDesc`, `categoryDel`, `categoryDate`) VALUES
(1, '738eec5508ccd97dc4149d307f6f567f', 'Quick Chuck Change', 'Quick Chuck Change\r\n', 0, '2022-09-18 12:31:24'),
(2, '46b1f449a5b3c0028d8ea70a64fc4068', 'Tool Changer', 'Tool Changer', 0, '2022-09-18 12:31:38'),
(3, '167c71533d3fb6e5d33add43937bf431', 'Automated Chuck Exchange System', 'Automated Chuck Exchange System', 0, '2022-09-18 12:31:59'),
(4, '746f51abdd6904d3aa80f87d4b83f59c', 'Cylinder / Resin Cylinder', 'Cylinder / Resin Cylinder', 0, '2022-09-18 12:32:11'),
(5, '186d47bf2155796e156cb4a33d5ac6d0', 'Accessories for Cylinder', 'Accessories for Cylinder', 0, '2022-09-18 12:32:23'),
(6, 'fdfe09a02d5ba696aa5c95ee0afca623', 'Grippers', 'Grippers', 0, '2022-09-18 12:32:35'),
(7, '6d79e3dbc15dd8c96ff59f019e4434e1', 'Suction Cups', 'Suction Cups', 0, '2022-09-18 12:32:58'),
(8, '04c423c573a5924099b572c72e3d7632', 'Suction Stem / Resin Suction Stem', 'Suction Stem / Resin Suction Stem', 0, '2022-09-18 12:33:16'),
(9, '1ae33c81712fee7df86907b8f4b5699b', 'Other Suction Parts', 'Other Suction Parts', 0, '2022-09-18 12:33:34'),
(10, '803a23e602e3254f42b32402aff13b34', 'Nippers', 'Nippers', 0, '2022-09-18 12:33:46'),
(11, '441a8cf39de2ce0a01b6399a914863a3', 'Jungle Gym', 'Jungle Gym', 0, '2022-09-18 12:33:58'),
(12, '3ea7a6eed86117afc37ece3d935c0ff8', 'Let\'s Joint', 'Let\'s Joint', 0, '2022-09-18 12:34:15'),
(13, '8482a60689cc2fbefa8089ec324c44e0', 'Other Frame Parts', 'Other Frame Parts', 0, '2022-09-18 12:34:34'),
(14, '20dc33f4e8760eed0b1c063d80f62803', 'Tubing / Sensors', 'Tubing / Sensors', 0, '2022-09-18 12:34:55'),
(15, '0815c5645b9ff38b62310c57ae320544', 'Other Products', 'Other Products', 0, '2022-09-18 12:35:18'),
(16, 'b5fc8d031c64808ed20374d8167ce409', 'Lightweight Parts', 'Lightweight Parts', 0, '2022-09-18 12:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `companyInfoId` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `companyNameAlt` varchar(100) NOT NULL,
  `companyAddress` varchar(100) NOT NULL,
  `companyTelephone` varchar(100) NOT NULL,
  `companyFax` varchar(100) NOT NULL,
  `companyEmail` varchar(100) NOT NULL,
  `companyBusiness` longtext NOT NULL,
  `companyResArea` varchar(100) NOT NULL,
  `companyFounded` varchar(100) NOT NULL,
  `companyOwner` varchar(100) NOT NULL,
  `companyFilStaff` int(11) NOT NULL,
  `companyJpnStaff` int(11) NOT NULL,
  `companyLogo` varchar(100) NOT NULL,
  `companyLogoAlt` varchar(100) NOT NULL,
  `companyInfoDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`companyInfoId`, `companyName`, `companyNameAlt`, `companyAddress`, `companyTelephone`, `companyFax`, `companyEmail`, `companyBusiness`, `companyResArea`, `companyFounded`, `companyOwner`, `companyFilStaff`, `companyJpnStaff`, `companyLogo`, `companyLogoAlt`, `companyInfoDate`) VALUES
(1, 'Star Seiki Philippines', 'STAR SEIKI PHILIPPINES INC. (PEZA REGISTERED COMPANY)', 'Innorev Bldg. Phase 6A Lot 3281-I SEZ Laguna Technopark, Binan, Laguna 4024, Philippines', '(049)544-0652', '(049)502-7953', 'jenna@star-seiki.com.ph', '⦾ Sales Robot, Parts and FA Devices, After-Service Maintenance: Call Service (Around the Clock) and Business Trip (Fare Paying), Part Supply: Main Service Parts in Stock, Local Staff: Capable of Speaking Japanese and English (Japan Resident Experience).', 'Whole land of the Philippines.', '2001', 'Mr. Seiji Maruta', 8, 1, 'assets/images/logo.png', 'assets/images/logo-2.png', '2022-09-15 22:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactusId` int(11) NOT NULL,
  `cuFirstName` varchar(100) NOT NULL,
  `cuLastName` varchar(100) NOT NULL,
  `cuEmail` varchar(100) NOT NULL,
  `cuContactNo` varchar(100) NOT NULL,
  `cuInquiry` longtext NOT NULL,
  `cuDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactusId`, `cuFirstName`, `cuLastName`, `cuEmail`, `cuContactNo`, `cuInquiry`, `cuDate`) VALUES
(1, 'sebelina', 'lawrence@email.com', '09123456789', 'wala\r\n', '', '2022-09-20 03:16:27'),
(2, 'test', 'test', 'test', 'test', '', '2022-09-20 03:17:11'),
(3, 'test', 'test', 'test', 'test', '', '2022-09-20 11:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `deliveryId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `orderNo` varchar(100) NOT NULL,
  `deliveryStatus` int(11) NOT NULL,
  `deliveryReturnDesc` varchar(250) NOT NULL,
  `deliveryEstDate` date NOT NULL DEFAULT current_timestamp(),
  `deliveryMarkedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `deliveryDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryId`, `orderId`, `orderNo`, `deliveryStatus`, `deliveryReturnDesc`, `deliveryEstDate`, `deliveryMarkedDate`, `deliveryDate`) VALUES
(1, 2, 'SSPI-0000002-2022', 2, 'no reason', '2022-12-06', '2022-12-05 20:09:15', '2022-12-05 14:59:16'),
(2, 5, 'SSPI-0000005-2022', 1, '', '2022-12-06', '2022-12-05 21:00:00', '2022-12-05 20:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faqId` int(11) NOT NULL,
  `faqQuestion` varchar(100) NOT NULL,
  `faqAnswer` longtext NOT NULL,
  `faqOrdering` int(11) NOT NULL,
  `faqDel` int(11) NOT NULL,
  `faqDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faqId`, `faqQuestion`, `faqAnswer`, `faqOrdering`, `faqDel`, `faqDate`) VALUES
(1, 'Do you offer Installation Services?', 'Yes, we offer free installation services of our products. In every transaction the customer has the privilege to request manpower for installation to the company in payment method.', 1, 0, '2022-09-30 18:26:51'),
(2, 'If you offer Installation Services, Is it installed by Lisenced Engineers?', 'Yes, we do have Lisenced Engineers that is scheduled and assigned to do the request task of the customer. ', 2, 0, '2022-09-30 18:27:24'),
(3, 'Do you ship packages internationally?', 'Yes, we ship Internationally.', 3, 0, '2022-09-30 18:27:38'),
(4, 'How do I know if my Order was already confirmed?', 'Once the customer placed their orders, they will received a notifications that has the details about the orders they made. ', 4, 0, '2022-09-30 18:28:11'),
(5, 'What payment methods do you accept?', 'We only accept payments from our costumers via bank to bank process.', 5, 0, '2022-09-30 18:28:33'),
(6, 'Is it available for installment mode of payment?', 'Yes, we offer a Installment payment method that allows the costumers to complete their payments within 30-60 days after confirming the orders.', 0, 0, '2022-09-30 18:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userUniqueId` varchar(100) NOT NULL,
  `orderId` int(11) NOT NULL,
  `paymentId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `deliveryId` int(11) NOT NULL,
  `notificationType` int(11) NOT NULL,
  `notificationStatus` int(11) NOT NULL,
  `notificationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationId`, `userId`, `userUniqueId`, `orderId`, `paymentId`, `serviceId`, `deliveryId`, `notificationType`, `notificationStatus`, `notificationDate`) VALUES
(1, 2, '', 2, 0, 0, 0, 1, 1, '2022-12-05 14:59:16'),
(2, 2, '', 2, 0, 0, 1, 8, 1, '2022-12-05 15:00:02'),
(3, 2, '', 2, 0, 0, 1, 13, 1, '2022-12-05 20:00:00'),
(4, 2, '', 2, 0, 0, 1, 13, 1, '2022-12-05 20:09:15'),
(5, 2, '', 2, 1, 0, 0, 3, 1, '2022-12-05 20:43:37'),
(6, 2, '', 5, 0, 0, 0, 1, 1, '2022-12-05 20:52:58'),
(7, 2, '', 5, 0, 0, 2, 8, 1, '2022-12-05 20:59:44'),
(8, 2, '', 5, 0, 0, 2, 9, 1, '2022-12-05 21:00:00'),
(9, 2, '', 5, 0, 1, 0, 4, 1, '2022-12-05 21:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderNo` varchar(100) NOT NULL,
  `totalNoItems` int(11) NOT NULL,
  `totalNoQuantity` int(11) NOT NULL,
  `totalAmount` decimal(18,2) NOT NULL,
  `totalBalance` decimal(18,2) NOT NULL,
  `totalDeliveryFee` decimal(18,2) NOT NULL,
  `totalServiceFee` decimal(18,2) NOT NULL,
  `paymentType` varchar(100) NOT NULL,
  `orderServiceInst` varchar(100) NOT NULL,
  `orderServiceAss` int(11) NOT NULL,
  `orderPurchased` int(11) NOT NULL,
  `orderApproved` int(11) NOT NULL,
  `orderSetDeliver` int(11) NOT NULL,
  `orderDueNotif` int(11) NOT NULL,
  `orderByWeekUId` varchar(250) NOT NULL,
  `orderByMonthUId` varchar(250) NOT NULL,
  `orderByYearUId` varchar(250) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `orderApprovedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `orderDueDate` datetime NOT NULL DEFAULT current_timestamp(),
  `orderDueDateFD` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `orderNo`, `totalNoItems`, `totalNoQuantity`, `totalAmount`, `totalBalance`, `totalDeliveryFee`, `totalServiceFee`, `paymentType`, `orderServiceInst`, `orderServiceAss`, `orderPurchased`, `orderApproved`, `orderSetDeliver`, `orderDueNotif`, `orderByWeekUId`, `orderByMonthUId`, `orderByYearUId`, `orderDate`, `orderApprovedDate`, `orderDueDate`, `orderDueDateFD`) VALUES
(2, 2, 'SSPI-0000002-2022', 1, 1, '455.00', '0.00', '200.00', '0.00', 'Full Payment', 'None', 0, 1, 1, 1, 0, '362b4bb53d9fc893092270c7dbb08e31', 'cf9496cfbe237d7260f43dd309e42bda', '3a824154b16ed7dab899bf000b80eeee', '2022-12-04 23:55:38', '2022-12-05 14:59:16', '2023-01-04 14:59:16', '2022-12-04 23:55:33'),
(3, 2, 'SSPI-0000003-2022', 1, 1, '455.00', '455.00', '200.00', '0.00', 'Full Payment', 'None', 0, 1, 0, 0, 0, '0d8c561d02886e839a7d0bc2e16c0af0', 'cf9496cfbe237d7260f43dd309e42bda', '3a824154b16ed7dab899bf000b80eeee', '2022-12-05 20:45:36', '2022-12-05 20:45:33', '2022-12-05 20:45:33', '2022-12-05 20:45:33'),
(4, 2, 'SSPI-0000004-2022', 1, 1, '515.00', '515.00', '200.00', '0.00', 'Full Payment', 'None', 0, 1, 0, 0, 0, '0d8c561d02886e839a7d0bc2e16c0af0', 'cf9496cfbe237d7260f43dd309e42bda', '3a824154b16ed7dab899bf000b80eeee', '2022-12-05 20:45:46', '2022-12-05 20:45:41', '2022-12-05 20:45:41', '2022-12-05 20:45:41'),
(5, 2, 'SSPI-0000005-2022', 1, 1, '305.00', '305.00', '200.00', '500.00', 'Full Payment', 'Robot Installation', 1, 1, 1, 1, 0, '0d8c561d02886e839a7d0bc2e16c0af0', 'cf9496cfbe237d7260f43dd309e42bda', '3a824154b16ed7dab899bf000b80eeee', '2022-12-05 20:45:56', '2022-12-05 20:52:58', '2023-01-04 20:52:58', '2022-12-05 20:45:50'),
(6, 2, 'SSPI-0000006-2022', 1, 1, '350.00', '350.00', '0.00', '0.00', '', '', 0, 0, 0, 0, 0, '', '', '', '2022-12-08 12:06:21', '2022-12-08 12:06:21', '2022-12-08 12:06:21', '2022-12-08 12:06:21'),
(7, 2, 'SSPI-0000007-2022', 1, 1, '350.00', '350.00', '0.00', '0.00', '', '', 0, 0, 0, 0, 0, '', '', '', '2022-12-08 12:07:53', '2022-12-08 12:07:53', '2022-12-08 12:07:53', '2022-12-08 12:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `orderNo` varchar(100) NOT NULL,
  `pay` decimal(18,2) NOT NULL,
  `balance` decimal(18,2) NOT NULL,
  `orderByWeekUId` varchar(100) NOT NULL,
  `orderByMonthUId` varchar(100) NOT NULL,
  `orderByYearUId` varchar(100) NOT NULL,
  `paymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `orderId`, `orderNo`, `pay`, `balance`, `orderByWeekUId`, `orderByMonthUId`, `orderByYearUId`, `paymentDate`) VALUES
(1, 2, 'SSPI-0000002-2022', '455.00', '0.00', '0d8c561d02886e839a7d0bc2e16c0af0', 'cf9496cfbe237d7260f43dd309e42bda', '3a824154b16ed7dab899bf000b80eeee', '2022-12-05 20:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productUniqueId` varchar(100) NOT NULL,
  `productDesc` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `weight` decimal(18,2) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `unitPrice` decimal(18,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantitySold` int(11) NOT NULL,
  `productDel` int(11) NOT NULL,
  `productDate` datetime NOT NULL DEFAULT current_timestamp(),
  `productImgs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productUniqueId`, `productDesc`, `category`, `model`, `description`, `weight`, `unit`, `unitPrice`, `quantity`, `quantitySold`, `productDel`, `productDate`, `productImgs`) VALUES
(1, '41487a3262b07cfd6a07a9f2daf12e3d', 'QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE', '1', 'OA-SSI', 'Sample Description', '96.00', 'Grams', '105.00', 7, 108, 0, '2022-09-18 15:09:22', 'productImages/OA-SSI.jfif'),
(2, '909d93bc9bec03163eb40f032c5283d0', 'QUICK-CHUCK ATTACHMENT MANUAL / ROBOT SIDE', '1', 'OA-SSL', 'Sample Description 2', '165.00', 'Grams', '360.00', 85, 15, 0, '2022-09-18 15:11:29', 'productImages/OA-SSL.jfif'),
(3, '396bdaa323fe5d160342e2ac2fb49c26', 'QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE', '1', 'OA-SSI(SUS)', '', '265.00', 'Grams', '220.00', 89, 11, 0, '2022-09-18 15:14:50', 'productImages/OA-SSI(SUS).jfif'),
(4, 'e9a726f91ea0e129778c745683711447', 'QUICK-CHUCK ATTACHMENT(ROBOT SIDE)', '1', 'OA-SSL(SUS)', '', '370.00', 'Grams', '230.00', 94, 6, 0, '2022-09-18 15:16:18', 'productImages/OA-SSL(SUS).jfif'),
(5, '84d24a3736717471f3e57881cd4ef766', 'QUICK-CHUCK ATTACHMENT MANUAL / ROBOT SIDE', '1', 'OA1-SA', '', '190.00', 'Grams', '315.00', 89, 11, 0, '2022-09-18 15:17:41', 'productImages/OA1-SA.jfif'),
(6, 'b0a2e625e7f4f6473113c4aaeaf3a7eb', 'QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE', '1', 'OA1-SAI', '', '229.00', 'Grams', '210.00', 89, 11, 0, '2022-09-18 15:18:44', 'productImages/OA1-SAI.jfif'),
(7, 'dfac259e9c58f891ae943b5660576181', 'QUICK-CHUCK ATTACHMENT MANUAL / ROBOT SIDE', '1', 'OA2-LA', '', '553.00', 'Grams', '255.00', 93, 7, 0, '2022-09-18 15:19:41', 'productImages/OA2-LA.jfif'),
(8, '64d40a0bc5826463697533ef66e8b3f9', 'QUICK-CHUCK ATTACHMENT MANUAL / TOOL SIDE', '1', 'OA-LAI', '', '471.00', 'Grams', '165.00', 99, 1, 0, '2022-09-18 15:21:31', 'productImages/OA-LAI.jfif'),
(9, '646dc97f49ea3ea56624832289b38f4b', 'QUICK-CHUCK ATTACHMENT (ROBOT SIDE)', '1', 'OC-LA', '', '1283.00', 'Grams', '350.00', 100, 0, 0, '2022-09-18 15:22:23', 'productImages/OC-LA.jfif'),
(10, '11e63d739c6df3e693d669d1582eb574', 'CHUCK SPACER FOR EOAT', '1', 'ECP-031', '', '35.00', 'Grams', '115.00', 100, 0, 0, '2022-09-18 15:23:43', 'productImages/ECP-031.jfif'),
(11, 'c1fdc015660ecf8137b44d9e1a3125e9', 'SUCTION CAP', '7', 'VAPH-SC', '', '2.00', 'Grams', '150.00', 96, 4, 0, '2022-09-18 15:25:32', 'productImages/VAPH-SC.jfif'),
(12, 'a8d68370dd3fcc9276bd64db6253ed20', 'SUCTION CAP', '7', 'VAPH-SSC', '', '1.00', 'Grams', '155.00', 99, 1, 0, '2022-09-18 15:25:58', 'productImages/VAPH-SSC.jfif'),
(13, 'b56786dd7830bc8598417a1fe74e9737', 'STATIC ELIMINATION SHEET', '7', '12C-SD', '', '1.00', 'Grams', '110.00', 99, 1, 0, '2022-09-18 15:29:30', 'productImages/12C-SD.jfif'),
(14, '18625ef62437ca7c5ee61b759883a954', 'STATIC ELIMINATION SHEET', '7', '15C-SD', '', '1.00', 'Grams', '110.00', 100, 0, 0, '2022-09-18 15:30:32', 'productImages/15C-SD.jfif'),
(15, '5ecd2218671f52b334bfebe217f71e09', 'STATIC ELIMINATION SHEET', '7', '20C-SD', '', '1.00', 'Grams', '110.00', 100, 0, 0, '2022-09-18 16:22:02', 'productImages/20C-SD.jfif'),
(16, '299e3bbb8a5085b403054f648a1e928a', 'STATIC ELIMINATION SHEET', '7', '30C-SD', '', '1.00', 'Grams', '115.00', 100, 0, 0, '2022-09-18 16:25:59', 'productImages/30C-SD.jfif'),
(17, 'f37efedd8bf335f4aecd4fc566ba6f62', 'STATIC ELIMINATION SHEET', '7', '40C-SD', '', '1.00', 'Grams', '115.00', 99, 1, 0, '2022-09-18 16:27:07', 'productImages/40C-SD.jfif'),
(18, '08f3352c847ab716981d2b0772608a14', 'EP SPONGE', '7', '14C-EPSP', '', '0.10', 'Grams', '265.00', 100, 0, 0, '2022-09-18 16:30:38', 'productImages/14C-EPSP.jfif'),
(19, 'bd1f857680ca04e66b92ffeda42a7ced', 'EP SPONGE', '7', '20C-EPSP', '', '0.20', 'Grams', '315.00', 100, 0, 0, '2022-09-18 16:32:27', 'productImages/20C-EPSP.jfif'),
(20, '7bc130bee6dda57ce0e7f8dc8b7c2a4f', 'EP SPONGE', '7', '30C-EPSP', '', '0.40', 'Grams', '310.00', 100, 0, 0, '2022-09-18 16:33:31', 'productImages/30C-EPSP.jfif'),
(21, '4f54220fb499c6ae73b9b61645a5d15f', 'EP SPONGE', '7', '40C-EPSP', '', '0.70', 'Grams', '355.00', 98, 2, 0, '2022-09-18 17:00:20', 'productImages/40C-EPSP.jfif'),
(22, 'c50d5acd06e3104b925ba969a7540354', 'EP SPONGE', '7', '50C-EPSP', '', '0.50', 'Grams', '300.00', 100, 0, 0, '2022-09-18 17:01:18', 'productImages/50C-EPSP.jfif'),
(23, 'c9a797bb7f28a21284dab288d3dc2128', 'EP SPONGE', '7', '60C-EPSP', '', '1.20', 'Grams', '315.00', 100, 0, 0, '2022-09-18 17:02:05', 'productImages/60C-EPSP.jfif'),
(24, 'db117aaeabe6e8c49c3ca2a239d4f273', 'SPONGE SEAL 76*22 W/O VALVE', '7', 'SFMSEAL76/22SW10BW/OV', '', '0.00', 'Grams', '318.00', 99, 1, 0, '2022-09-18 17:02:59', 'productImages/SFMSEAL7622SW10BWOV.jfif'),
(25, 'ae4da13aa930bb2fb358b715a247470b', 'Mini Cylinder', '16', 'MCDR-10', '', '97.00', 'Grams', '2650.00', 3, 9, 0, '2022-09-20 22:42:50', 'productImages/MCDR-10.jfif'),
(26, 'c2b0f85e794c5f4a8c09aa8eab408167', 'Mini Cylinder', '16', 'MCDR-20', '', '40.00', 'Grams', '3000.00', 1, 9, 0, '2022-09-20 22:44:30', 'productImages/MCDR-20.jfif'),
(27, 'cb4ca16848f76be339d765ae22b04917', 'Suction Stem', '16', 'VFILP-S5', '', '16.00', 'Grams', '300.00', 30, 0, 0, '2022-09-20 22:45:57', 'productImages/VFILP-S5.jfif'),
(28, '883d87e55d7eac7da5648ea54c3bed40', 'Suction Stem', '16', 'VFILP-S-5-P12', '', '7.00', 'Grams', '450.00', 28, 2, 0, '2022-09-20 22:48:30', 'productImages/VFILP-S-5-P12.jfif'),
(29, '64acd429fa89e66b08edc1f133416245', 'Suction Stem', '1', 'VFILP-S10', '', '16.00', 'Grams', '450.00', 6, 4, 0, '2022-09-20 22:49:30', 'productImages/VFILP-S10.jfif'),
(30, 'ed3e350476030b8c2b32e04ee87597be', 'Suction Stem', '16', 'VFILP-S-10-P12', '', '7.00', 'Grams', '350.00', 19, 1, 0, '2022-09-20 22:50:22', 'productImages/VFILP-S-10-P12.jfif'),
(31, '0f0336901a03931ad5952e25b033f488', 'Suction Stem', '16', 'VFILP-S20', '', '8.00', 'Grams', '350.00', 20, 0, 0, '2022-09-20 22:51:36', 'productImages/VFILP-S20.jfif'),
(32, 'ebec3ca36a94fcb4ee51b5f12bca4f4d', 'Suction Stem', '16', ' VFILP-S-30-P12', '', '9.00', 'Grams', '350.00', 20, 0, 0, '2022-09-20 22:52:39', 'productImages/VFILP-S-20-P12.jfif'),
(33, '5cb48ee89ca9f1278c0d48b4e37c3fb5', 'Suction Stem', '16', 'VFILP-S30', '', '18.00', 'Grams', '350.00', 28, 2, 0, '2022-09-20 22:56:14', 'productImages/VFILP-S30.jfif'),
(34, '388376f75b419c8d530cd3902f1ef569', 'Suction Stem', '16', 'VFILP-S10', '', '16.00', 'Grams', '350.00', 30, 0, 0, '2022-09-20 23:07:38', 'productImages/VFILP-S10.jfif'),
(35, '98ac6d4c39b990d88c79da58388e323b', 'Suction Stem', '16', 'VFILP-S-20-P12', '', '8.00', 'Grams', '350.00', 20, 0, 0, '2022-09-20 23:09:37', 'productImages/VFILP-S-20-P12.jfif'),
(36, '43d5b6519bb7dec383de50cf88937689', 'JUNGLE GYM SUS PIPE PHI.8', '11', '8*0.6*500', '', '56.00', 'Grams', '500.00', 15, 0, 0, '2022-09-20 23:16:14', 'productImages/8-0.6-500.jfif'),
(37, '28d4478b38c3efadd6abffafa0f995b5', 'JUNGLE GYM SUS PIPE PHI.8', '11', '8*0.6*1000', '', '121.00', 'Grams', '500.00', 15, 0, 0, '2022-09-20 23:17:14', 'productImages/120.61000.jfif'),
(38, '57382f2ca43c6e8501b242db5ea9eb36', 'JUNGLE GYM SUS PIPE PHI.8', '11', ' 8*0.6*1500', '', '121.00', 'Grams', '550.00', 20, 0, 0, '2022-09-20 23:18:30', 'productImages/8-0.6-1500.jfif'),
(39, 'eda14f5c49d46a127beb087db046bf8a', 'JUNGLE GYM SUS PIPE PHI.12', '11', '12*0.6*500', '', '88.00', 'Grams', '500.00', 20, 0, 0, '2022-09-20 23:19:50', 'productImages/200.8500.jfif'),
(40, 'bc669fa76ce8d5813a722a745f65c92f', 'JUNGLE GYM SUS PIPE PHI.12', '11', ' 12*0.6*1500', '', '250.00', 'Grams', '550.00', 20, 0, 0, '2022-09-20 23:23:58', 'productImages/120.6500.jfif'),
(41, '4bfc2d55b8d82b7b9af2c81cb3ca1b5d', 'JUNGLE GYM SUS PIPE PHI.20', '11', '20*0.8*1500', '', '543.00', 'Grams', '550.00', 20, 0, 0, '2022-09-20 23:24:48', 'productImages/200.81500.jfif'),
(42, 'bb3729e4da5aa8bf564f1d1c4867388d', 'JUNGLE GYM SUS PIPE PHI.20', '11', '20*0.8*500', '', '172.00', 'Grams', '450.00', 15, 0, 0, '2022-09-20 23:27:37', 'productImages/200.8500.jfif'),
(43, '0f0f4dabbfe742a415c863730e958679', 'JUNGLE GYM SUS PIPE PHI.12', '11', '12*0.6*1000', '', '169.00', 'Grams', '450.00', 15, 0, 0, '2022-09-20 23:30:40', 'productImages/120.61000.jfif'),
(44, '7e19a4086eee3d16f7e7ad2372cbeb01', 'SUCTION MODULE FOR LET\'S JOINT', '11', 'LSM-003', '', '50.00', 'Grams', '300.00', 15, 0, 0, '2022-09-20 23:32:31', 'productImages/LSM-003.jfif'),
(45, '0cbb02b1bdf9074ee7dd920ff49b1c95', 'SUCTION MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JSM-008', '', '102.00', 'Grams', '350.00', 15, 0, 0, '2022-09-20 23:33:16', 'productImages/JSM-008.jfif'),
(46, 'ce13aa6d60e7c73b2e24bdddd5002c24', 'SUCTION MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JSM-005', '', '69.00', 'Grams', '350.00', 15, 0, 0, '2022-09-20 23:33:56', 'productImages/JSM-005.jfif'),
(47, '964bc3995ac6dacd8171215f9f7b7bfa', 'SUCTION MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JSM-004', '', '39.00', 'Grams', '350.00', 20, 0, 0, '2022-09-20 23:34:50', 'productImages/JSM-004.jfif'),
(48, 'c492ca2b22f1224d3f3673bde3b14506', 'SUCTION MODULE FOR JUNGLE GYM(PHI.8)', '11', 'JSM-002', '', '57.00', 'Grams', '350.00', 15, 0, 0, '2022-09-20 23:35:32', 'productImages/JSM-002.jfif'),
(49, 'be9da44aec1dbd46866dda804102f879', 'SUCTION MODULE FOR JUNGLE GYM(PHI.8)', '11', 'JSM-001', '', '21.00', 'Grams', '350.00', 50, 0, 0, '2022-09-20 23:36:23', 'productImages/JSM-001.jfif'),
(50, '532a690c3244be97cf31c32e2142c7f9', 'GRIPPER MODULE FOR JUNGLE GYM(PHI.12)', '11', ' JGM-011', '', '77.00', 'Grams', '300.00', 23, 0, 0, '2022-09-20 23:39:03', 'productImages/JGM-011.jfif'),
(51, '431017f17c4a822065cd458c9216ae0c', 'GRIPPER MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JGM-009', '', '41.00', 'Grams', '350.00', 30, 0, 0, '2022-09-20 23:39:57', 'productImages/JGM-009.jfif'),
(52, 'a42bd2cfb27d0eea6f6d4e45bf87ff39', 'GRIPPER MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JGM-006', '', '59.00', 'Grams', '350.00', 20, 0, 0, '2022-09-20 23:40:28', 'productImages/JGM-006.jfif'),
(53, 'e62a5c6bd5d4c752e7d0e38de5831f92', 'GRIPPER MODULE FOR JUNGLE GYM(PHI.12)', '11', ' JGM-004', '', '44.00', 'Grams', '300.00', 30, 0, 0, '2022-09-20 23:41:09', 'productImages/JGM-004.jfif'),
(54, '2d30ec44bc269d7f2e46c135e90f722b', 'GRIPPER MODULE FOR JUNGLE GYM(PHI.12)', '11', 'JGM-003', '', '42.00', 'Grams', '350.00', 18, 2, 0, '2022-09-20 23:41:42', 'productImages/JGM-003.jfif'),
(55, 'c85ccb0b372af9fc7765f875ed270859', 'BASE FRAME FOR JUNGLE GYM', '11', 'EFCK-2501', '', '457.00', 'Grams', '450.00', 20, 0, 0, '2022-09-20 23:42:19', 'productImages/EFCK-2501.jfif'),
(56, '06cbc407d884de571aee4e9f1ea4692b', 'SUS PIPE CUTTER BLADE', '11', 'K-203-1', '', '3.00', 'Grams', '255.00', 50, 0, 0, '2022-09-20 23:43:24', 'productImages/K-203-1.jfif'),
(57, '5d216849c9665c412233b5004eacdb17', 'CROSS CONNECTOR PHI.12-8', '11', 'N01861-201', '', '16.80', 'Grams', '400.00', 20, 0, 0, '2022-09-20 23:44:30', 'productImages/N01861-201.jfif'),
(58, 'dc1395a9d9579f5ec537112e0701ee80', 'CROSS CONNECTOR PHI.12-12', '11', 'N01861-202', '', '20.50', 'Grams', '400.00', 50, 0, 0, '2022-09-20 23:45:05', 'productImages/N01861-202.jfif'),
(59, '424e0bcd551be0b76f467944079d83e6', 'CROSS CONNECTOR PHI.20-12', '11', 'N01861-204', '', '72.00', 'Grams', '450.00', 20, 0, 0, '2022-09-20 23:45:43', 'productImages/N01861-204.jfif'),
(60, '1ef6a7e6a2cbccf3f141404057d31316', 'CROSS CONNECTOR PHI.20-20', '11', ' N01861-206', '', '50.30', 'Grams', '400.00', 50, 0, 0, '2022-09-20 23:47:15', 'productImages/N01861-206.jfif'),
(61, 'e20ed0790c66bcd6367136e4a1a28824', 'CROSS CONNECTOR PHI.8-8', '11', 'N01861-207', '', '9.00', 'Grams', '350.00', 50, 0, 0, '2022-09-20 23:53:00', 'productImages/N01861-207.jfif'),
(62, '49c0a695d3232eea74fd258cae508933', 'CLIP FOR TMA PHI.8*8', '11', 'TMA-CL(8*8)', '', '55.00', 'Grams', '250.00', 50, 0, 0, '2022-09-20 23:54:55', 'productImages/TMA-CL(8-8).jfif'),
(63, '866efb4f358bd933f88b4f706a674881', 'CLIP FOR TMA PHI.12*8', '11', 'TMA-CL(12*8)', '', '85.00', 'Grams', '250.00', 60, 0, 0, '2022-09-20 23:55:36', 'productImages/TMA-CL(12-8).jfif'),
(64, 'e84fdb03a63d6c547712da9515bd3641', 'CLIP FOR TMA PHI.12*10', '11', 'TMA-CL(12*10)', '', '62.00', 'Grams', '350.00', 30, 0, 0, '2022-09-20 23:56:30', 'productImages/TMA-CL(12-10).jfif'),
(65, 'c52e572e5e3044d910aa86d0dacd502e', 'CLIP FOR TMA PHI.12*12', '11', ' TMA-CL(12*12)', '', '75.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:00:24', 'productImages/TMA-CL(12-12).jfif'),
(66, 'a3678e63eff1cab22b127f1b58334a4a', 'CLIP FOR TMA PHI.20*12', '11', 'TMA-CL(20*12)', '', '160.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:01:22', 'productImages/TMA-CL(20-12).jfif'),
(67, '4006cd790e55a25df09f41f6f6f268ea', 'CLIP FOR TMA PHI.20*20', '11', 'TMA-CL(20*20)', '', '270.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:01:56', 'productImages/TMA-CL(20-20).jfif'),
(68, '113bb6c9a5e7ebffc1293565bbcb3ae9', 'CABLE TIE(1000 PCS/PACK)', '11', 'AB100-W', '', '293.00', 'Grams', '250.00', 30, 0, 0, '2022-09-21 00:03:15', 'productImages/AB100-W.jfif'),
(69, 'c37bc283bfbf93422a42f48b9e0be1a9', 'CABLE TIE(100 PCS/PACK)', '11', 'AB150-W', '', '73.00', 'Grams', '250.00', 50, 0, 0, '2022-09-21 00:03:52', 'productImages/AB150-W.jfif'),
(70, 'c3c4f19686ab2bd2b025367e963333eb', 'CABLE TIE(100 PCS/PACK)', '11', 'AB200-W', '', '150.00', 'Grams', '250.00', 50, 0, 0, '2022-09-21 00:04:35', 'productImages/AB200-W.jfif'),
(71, '43df8e7b6c3fa889813b9ecdb352ce7c', 'CABLE TIE(100 PCS/ PACK)', '11', 'AB300-W', '', '235.00', 'Grams', '200.00', 50, 0, 0, '2022-09-21 00:08:11', 'productImages/AB300-W.jfif'),
(72, 'daf7c5331789202a3216ddb8dfe8855e', 'CABLE TIE(50 PCS./PER BAG)', '11', 'AB350-W', '', '300.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:10:02', 'productImages/AB350-W.jfif'),
(73, '354ffc5ce7ccbf74341e440ea18fc918', 'FIXTURE PHI.12(FOR CABLE TIE)', '11', 'RCA12', '', '5.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:10:42', 'productImages/RCA12.jfif'),
(74, 'af57bdd83611e72efef506936a2dc268', 'FIXTURE PHI.20(FOR CABLE TIE)', '11', 'RCA20', '', '7.00', 'Grams', '250.00', 15, 0, 0, '2022-09-21 00:11:19', 'productImages/RCA20.jfif'),
(75, 'd731e687c11dcf09e304fe864edb3807', 'FIXTURE PHI.12(FOR M4)', '11', 'RCB12', '', '6.00', 'Grams', '250.00', 50, 0, 0, '2022-09-21 00:11:56', 'productImages/RCB12.jfif'),
(76, '1f17253638867a210d41110d863865e0', 'FIXTURE PHI.20(FOR CABLE TIE)', '11', 'RCB20', '', '7.00', 'Grams', '250.00', 20, 0, 0, '2022-09-21 00:12:34', 'productImages/RCB20.jfif'),
(77, '02fb9366b3f8f255e6a9ea39b90c5c1f', 'CONTAINER CYLINDER W/GUIDE(DOUBLE)', '4', 'GCYL20*50', '', '746.00', 'Grams', '350.00', 30, 0, 0, '2022-09-21 00:14:06', 'productImages/GCYL20-50.jfif'),
(78, '8a4363bd8abd8c9de0eb6e20617bd21a', 'CONTAINER CYLINDER W/GUIDE(DOUBLE)', '4', 'GCYL20*75', '', '1000.00', 'Grams', '350.00', 30, 0, 0, '2022-09-21 00:14:42', 'productImages/GCYL20-75.jfif'),
(79, '31f88d188348fc665c4620a8565e1175', 'CONTAINER CYLINDER(DOUBLE)', '4', 'NCON-20W', '', '340.00', 'Grams', '350.00', 30, 0, 0, '2022-09-21 00:15:20', 'productImages/NCON-20W.jfif'),
(80, 'e94698293c8aca80da9bdc9621e3f973', 'CONTAINER CYLINDER(DOUBLE)', '4', 'NCON-40W', '', '415.00', 'Grams', '350.00', 40, 0, 0, '2022-09-21 00:15:54', 'productImages/NCON-40W.jfif'),
(81, 'a43d2dd5553ad5ab0da2c38b4a082246', 'CONTAINER CYLINDER REINFORCED(DOUBLE)', '4', 'NCON-40WK', '', '688.00', 'Grams', '350.00', 30, 0, 0, '2022-09-21 00:16:40', 'productImages/NCON-40WK.jfif'),
(82, '70c16340dfabefe7528f27628d44577d', 'CONTAINER CYLINDER(DOUBLE)', '4', 'NCON-80W', '', '557.00', 'Grams', '350.00', 20, 0, 0, '2022-09-21 00:17:20', 'productImages/NCON-80W.jfif'),
(83, '9a6eb76c16f77f75f8035e7772e34203', 'PIPE CYLINDER', '4', 'MCP1-1210', '', '12.00', 'Grams', '450.00', 50, 0, 0, '2022-09-21 00:21:05', 'productImages/MCP1-1210.jfif'),
(84, '6fd45435d9e766157be341b073478076', 'PIPE CYLINDER', '4', 'MCP1-1220', '', '46.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:21:36', 'productImages/MCP1-1220.jfif'),
(85, 'ccdb24778309b211f1fdf91ebfa2b8a2', 'PIPE CYLINDER', '4', 'MCP1-2010', '', '40.00', 'Grams', '350.00', 50, 0, 0, '2022-09-21 00:22:18', 'productImages/MCP1-2010.jfif'),
(86, '1d6b67088722ee5e8edeefcdbb29c8d3', 'PIPE CYLINDER', '4', 'MCP1-2020', '', '46.00', 'Grams', '300.00', 50, 0, 0, '2022-09-21 00:22:58', 'productImages/MCP1-2020.jfif'),
(87, '29175d46ae15fb51fe28e3d0b35fd3a0', 'PIPE CYLINDER', '4', 'MCP1-2030', '', '50.00', 'Grams', '300.00', 50, 0, 0, '2022-09-21 00:23:32', 'productImages/MCP1-2030.jfif'),
(88, 'eab440db198a15768c302e948d994790', 'MICRO MINI CYLINDER', '4', 'UMCD-5', '', '16.00', 'Grams', '250.00', 50, 0, 0, '2022-09-21 00:24:31', 'productImages/UMCD-5.jfif'),
(89, '71f796d199200eef8f664aba9e26dc4c', 'MICRO MINI CYLINDER', '4', 'UMCD-5P', '', '14.00', 'Grams', '200.00', 20, 0, 0, '2022-09-21 00:25:24', 'productImages/UMCD-5P.jfif'),
(90, 'e3f02bb14dd7f68e4c2051b7abcd22e6', 'MICRO MINI CYLINDER', '4', 'UMCD-10P', '', '20.00', 'Grams', '200.00', 50, 0, 0, '2022-09-21 00:25:59', 'productImages/UMCD-10P.jfif'),
(91, '47410cf64c656bf4d798d9750090c201', 'MINI CONTAINER CYLINDER(SINGLE)', '4', 'NCON-M10S', '', '135.00', 'Grams', '500.00', 30, 0, 0, '2022-09-21 00:27:06', 'productImages/NCON-M10S.jfif'),
(92, '4ddc8a8a27a3ba8fb34a6dbe82915e56', 'MINI CONTAINER CYLINDER(SINGLE)', '4', 'NCON-M10W', '', '145.00', 'Grams', '400.00', 20, 0, 0, '2022-09-21 00:27:40', 'productImages/NCON-M10W.jfif'),
(93, '26b2ea23e16f08a651c41d8960b92596', 'NCON-M15S', '4', 'NCON-M15S', '', '145.00', 'Grams', '300.00', 30, 0, 0, '2022-09-21 00:29:29', 'productImages/NCON-M15S.jfif'),
(94, '4dac850bdccf98930e0a2a365977b0ac', 'MINI CONTAINER CYLINDER(DOUBLE)', '4', 'NCON-M15W', '', '145.00', 'Grams', '365.00', 30, 0, 0, '2022-09-21 00:30:46', 'productImages/NCON-M15W.jfif'),
(95, '031d6d5facd40e4322b89b0593ca1fcd', 'MINI CONTAINER CYLINDER(SINGLE)', '4', 'NCON-M20S', '', '155.00', 'Grams', '450.00', 50, 0, 0, '2022-09-21 00:31:25', 'productImages/NCON-M20S.jfif'),
(96, '995d11abb6945f295a33f1f8dc5b17c1', 'MINI CONTAINER CYLINDER(DOUBLE)', '4', 'NCON-M20W', '', '155.00', 'Grams', '315.00', 50, 0, 0, '2022-09-21 00:32:03', 'productImages/NCON-M20W.jfif'),
(97, 'c0693246e8e328a7a7029d47255f7404', 'MINI CYLINDER', '4', 'MCD1-10', '', '65.00', 'Grams', '460.00', 50, 0, 0, '2022-09-21 00:35:08', 'productImages/MCD1-10.jfif'),
(98, '372f2c94b490d71e0bac40c9cf3fb323', 'MINI CYLINDER', '4', 'MCD1-20', '', '80.00', 'Grams', '320.00', 30, 0, 0, '2022-09-21 00:35:55', 'productImages/MCD1-20.jfif'),
(99, 'd64f32fa54e5ab76cf83d6b8b858279f', 'MINI CYLINDER(MCE10ST/PUSH)', '4', 'MCE-10S', '', '58.00', 'Grams', '300.00', 50, 0, 0, '2022-09-21 00:36:32', 'productImages/MCE-10S.jfif'),
(100, 'bf676e48a996bd14603646c79c2a8bef', 'MINI CYLINDER(MCE10ST/PULL)', '4', 'MCE-10T', '', '58.00', 'Grams', '250.00', 50, 0, 0, '2022-09-21 00:37:12', 'productImages/MCE-10T.jfif'),
(101, '678d768722c4b23be77c5d22306acb81', 'MINI CYLINDER(MCE20ST/PUSH)', '4', 'MCE-20S', '', '69.00', 'Grams', '265.00', 50, 0, 0, '2022-09-21 00:37:48', 'productImages/MCE-20S.jfif'),
(102, '9df833501b3d4d1e55fb9f239e53b452', 'Mini Cylinder', '4', 'MCDR-10', '', '40.00', 'Grams', '395.00', 30, 0, 0, '2022-09-21 00:39:27', 'productImages/MCDR-10.jfif'),
(103, '53b7f38c525eb3caccf125edbe178667', 'Mini Cylinder', '4', 'MCDR-20', '', '48.00', 'Grams', '380.00', 50, 0, 0, '2022-09-21 00:40:03', 'productImages/MCDR-20.jfif'),
(105, '203af7bcdff9b6b791b867d11121a2ed', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-5501', '', '253.00', 'Grams', '600.00', 20, 0, 0, '2022-09-21 00:43:18', 'productImages/EFCK-5501.jfif'),
(106, '8720ac024d3688584f9e226aaccd4e23', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-5500', '', '924.00', 'Grams', '550.00', 20, 0, 0, '2022-09-21 00:44:11', 'productImages/EFCK-5600.jfif'),
(107, '824f4a6bb1a6980671aaf815a2e2d95a', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-5600', '', '775.00', 'Grams', '600.00', 20, 0, 0, '2022-09-21 00:46:47', 'productImages/EFCK-5600.jfif'),
(108, '2680d1a2d288c3f2ba28016698fa5b45', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-5601', '', '180.00', 'Grams', '505.00', 50, 0, 0, '2022-09-21 00:47:56', 'productImages/EFCK-5601.jfif'),
(109, '819cac6b3a2f04991b0702d2a8b88833', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-5602', '', '130.00', 'Grams', '300.00', 50, 0, 0, '2022-09-21 00:48:44', 'productImages/EFCK-5602.jfif'),
(110, '86b21a2a465848e8f0431a4fe7f75356', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-7000', '', '3114.00', 'Grams', '1550.00', 15, 0, 0, '2022-09-21 00:49:34', 'productImages/EFCK-7000.jfif'),
(111, 'a87a715973d5c392d05ac87449723f55', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-7002', '', '961.00', 'Grams', '990.00', 30, 0, 0, '2022-09-21 00:50:05', 'productImages/EFCK-7002.jfif'),
(112, '4b7d07cad7213d79591114494fc8419e', 'BASE FRAME FOR LET\'S JOINT', '12', 'EFCK-7500', '', '3476.00', 'Grams', '1405.00', 10, 0, 0, '2022-09-21 00:50:48', 'productImages/EFCK-7500.jfif'),
(113, '6a49901a6fc18d585f1f41861141b3bf', 'AIR EJECTOR', '9', 'ECV-10HS', '', '78.00', 'Grams', '460.00', 50, 0, 0, '2022-09-21 00:52:44', 'productImages/ECV-10HS.jfif'),
(114, 'e86e0fa607966aee21a7eb4b81295f98', 'LET\'S JOINT PROFILE', '12', '25*50*1500', '', '960.00', 'Grams', '358.00', 50, 0, 0, '2022-09-21 22:48:18', 'productImages/25x50x1000.jfif'),
(115, '2f80cf40246de1b9b663e94e62843975', 'LET\'S JOINT PROFILE', '12', '25*50*1000', '', '1225.00', 'Grams', '345.00', 50, 0, 0, '2022-09-21 22:48:58', 'productImages/25x50x500.jfif'),
(116, 'eb3e67cdaa86a07cbc958368aff9ebb8', 'LET\'S JOINT PROFILE', '12', '25*50*500', '', '603.00', 'Grams', '465.00', 50, 0, 0, '2022-09-21 22:49:37', 'productImages/25x25x1500.jfif'),
(117, '7f2b9e5ee406bfc3512d3353248533a5', 'LET\'S JOINT PROFILE', '12', '25*25*1500', '', '979.00', 'Grams', '436.00', 50, 0, 0, '2022-09-21 22:50:19', 'productImages/25x25x500.jfif'),
(118, 'b0c0b1fb83ff893d456c51cf2ff4d1aa', 'CONNECTOR 25 SET A', '12', 'N01911-101-102 SET', '', '130.60', 'Grams', '605.00', 50, 0, 0, '2022-09-21 22:51:50', 'productImages/N01911-101-102 SET.jfif'),
(119, '3669f16597fb9a52fba4f5233b75a714', 'CROSS CONNECTOR 25', '12', 'N01911-103', '', '164.20', 'Grams', '360.00', 100, 0, 0, '2022-09-21 22:52:35', 'productImages/N01911-103.jfif'),
(120, '6ff7414c515d9322e606bcbcc743376b', 'CONNECTOR 20 SET A', '12', 'N01911-201-202 SET', '', '94.40', 'Grams', '615.00', 50, 0, 0, '2022-09-21 22:53:25', 'productImages/N01911-201-202 SET.jfif'),
(121, '842cbb7699631b49fddbe15c6e1d3ef2', 'CONNECTOR 20 SET B', '12', 'N01911-201-203 SET', '', '108.80', 'Grams', '405.00', 50, 0, 0, '2022-09-21 22:54:15', 'productImages/N01911-201-203 SET.jfif'),
(122, '1a94726166320b6b78ecc0a4d4af19cc', 'PROFILE END CAP 10-20', '12', 'N01902-004', '', '0.50', 'Grams', '165.00', 100, 0, 0, '2022-09-21 22:58:09', 'productImages/N01902-004.jfif'),
(123, '70744bc9c4fb5dcd9e39b74af5a5cfec', 'PROFILE END CAP 25-25', '12', 'N01902-005', '', '1.00', 'Grams', '165.00', 100, 0, 0, '2022-09-21 22:58:49', 'productImages/N01902-005.jfif'),
(124, 'b4c93d61ce47468e67b4463bda1e9a40', 'PROFILE END CAP 25-50', '12', 'N01902-006', '', '2.00', 'Grams', '150.00', 100, 0, 0, '2022-09-21 22:59:22', 'productImages/N01902-006.jfif'),
(125, 'e8776414f94b5376780e82f8bda0c405', 'SUS SQUARE PIPE', '12', 'S10*20*1500', '', '535.00', 'Grams', '556.00', 25, 0, 0, '2022-09-21 23:00:43', 'productImages/S10x20x1500.jfif'),
(126, '6d7a7397c3bac6894311d82aee096839', 'SUS SQUARE PIPE', '12', 'S25*25*1500', '', '895.00', 'Grams', '560.00', 30, 0, 0, '2022-09-21 23:01:28', 'productImages/S25x25x1500.jfif'),
(127, '36d74996d0a16495c2e30bcb4206e48a', 'PISTON PACKING', '10', 'FOR NW1-10.10R', '', '0.30', 'Grams', '215.00', 100, 0, 0, '2022-09-21 23:04:04', 'productImages/FOR NW1-10.10R.jfif'),
(128, '0e8dc5d25e7c8e096d03bf93572e229b', 'SPRING FOR BLADE', '10', 'FOR NW2-20.35', '', '0.20', 'Grams', '160.00', 100, 0, 0, '2022-09-21 23:04:44', 'productImages/FOR NW2-20.35.jfif'),
(129, '95e745db920b24bc4d793386f0ccd2b0', 'SPRING FOR BLADE', '10', 'FOR NW-10', '', '0.10', 'Grams', '150.00', 100, 0, 0, '2022-09-21 23:05:20', 'productImages/FOR NW-10.jfif'),
(130, '90441d35840595094686b5c5350a4152', 'PISTON', '10', 'FOR NWNC-20.20R', '', '9.00', 'Grams', '230.00', 50, 0, 0, '2022-09-21 23:06:00', 'productImages/FOR NWNC-20.20R.jfif'),
(131, 'c27e4112a155053994ab15ecfba58036', 'PISTON', '10', 'FOR NWNC-35.35R', '', '11.00', 'Grams', '210.00', 50, 0, 0, '2022-09-21 23:06:38', 'productImages/FOR NWNC-35.35R.jfif'),
(132, '6f95a874ed34a8a8419b6d227c5625be', 'PISTON PACKING', '10', 'NW2-20.20R (LX0145-003-0)', '', '0.50', 'Grams', '160.00', 50, 0, 0, '2022-09-21 23:07:13', 'productImages/NW2-20.20R (LX0145-003-0).jfif'),
(133, 'd996e3a30b556c86c88503134a282731', 'NIPPER HOLDER FOR GT-NR10L', '10', 'CP-035', '', '68.00', 'Grams', '365.00', 30, 0, 0, '2022-09-21 23:09:36', 'productImages/CP-035.jfif'),
(134, '8d03a81d537658232426c6704e1d35c0', 'NIPPER HOLDER FOR GT-NR20', '10', 'CP-036', '', '87.00', 'Grams', '230.00', 50, 0, 0, '2022-09-21 23:10:12', 'productImages/CP-036.jfif'),
(135, '25df5e6636a201f9e4cd19226fd707d4', 'NIPPER HOLDER FOR GT-NR30', '10', 'CP-037', '', '105.00', 'Grams', '235.00', 50, 0, 0, '2022-09-21 23:10:45', 'productImages/CP-037.jfif'),
(136, '7741cc9ae962248ba0ce21618f65368a', 'NIPPER BRACKET FOR GT-NR', '10', 'LX0090-100', '', '128.00', 'Grams', '360.00', 50, 0, 0, '2022-09-21 23:11:23', 'productImages/LX0090-100.jfif'),
(137, 'a10c9eaf079702840eb745d2b6c5ddd0', 'ALUMINUM ANGLE', '13', '3T-30-30-2M', '', '1500.00', 'Grams', '605.00', 30, 0, 0, '2022-09-21 23:15:29', 'productImages/3T-30-30-2M.jfif'),
(138, 'd2ff16827b4be98940b4fd7f9a3d3e31', 'ALUMINUM ANGLE', '13', '4T*40*40*2M', '', '1670.00', 'Grams', '540.00', 20, 0, 0, '2022-09-21 23:16:21', 'productImages/4T-40-40-2M.jfif'),
(139, '956c74df665e10272ea7a678999c0ea2', 'ALUMINUM ANGLE', '13', '3T*30*30*2M', '', '900.00', 'Grams', '456.00', 50, 0, 0, '2022-09-21 23:17:10', 'productImages/5T-30-30-2M.jfif'),
(140, '50ea071c02f358186c6eb604b2bec09b', 'ALUMINUM ANGLE', '13', '5T*50*50*2M', '', '2440.00', 'Grams', '750.00', 20, 0, 0, '2022-09-21 23:18:12', 'productImages/5T-50-50-2M.jfif'),
(141, 'e2e5f626ddbbd01a95c8d1a205942f69', 'ALUMINUM PLATE', '13', '5T*400*400', '', '2180.00', 'Grams', '740.00', 30, 0, 0, '2022-09-21 23:18:56', 'productImages/5T-400-400.jfif'),
(142, 'ed62b0aa59ab1bd7f3e232071e08df76', 'ALUMINUM PLATE', '13', '3T*400*1200', '', '3920.00', 'Grams', '605.00', 50, 0, 0, '2022-09-21 23:26:55', 'productImages/5T-400-1200.jfif'),
(143, '5e8d38a25e717fbd106709b1744043a5', 'SLIDING CHUCK(GATE-SHAPED)', '13', 'FCK1-0000', '', '1150.00', 'Grams', '1560.00', 26, 4, 0, '2022-09-21 23:27:45', 'productImages/FCK1-0000.jfif'),
(144, '21ce5fa13db2475ec01d7e21dfe03853', 'CHUCK MOUNTING BASE', '13', 'FCK1-0001', '', '393.00', 'Grams', '456.00', 30, 0, 0, '2022-09-21 23:31:13', 'productImages/FCK1-0001.jfif'),
(145, '9c08fc6d72ad0475f7ada7c432b795e4', 'SLIDE HOLDER', '13', 'FCK1-0002S', '', '41.00', 'Grams', '260.00', 20, 0, 0, '2022-09-21 23:31:46', 'productImages/FCK1-0002S.jfif'),
(146, 'f79831d2740911136b62349f52f506f1', 'SLIDING CHUCK VERTICAL BAR (L)', '13', 'FCK1-0003L', '', '139.00', 'Grams', '480.00', 50, 0, 0, '2022-09-21 23:33:17', 'productImages/FCK1-0003L.jfif'),
(147, '292eb1b37b26bec9993b2115bdfab13a', 'CLAMPING BOLT FOR SLIDING CHUCK', '13', 'FCK1-0005', '', '16.00', 'Grams', '136.00', 100, 0, 0, '2022-09-21 23:33:48', 'productImages/FCK1-0005.jfif'),
(148, '4d35e148553f8e822ae2b8814f2f3e04', 'SLIDING CHUCK(MINI)', '13', 'FCK1-1000', '', '616.00', 'Grams', '606.00', 20, 0, 0, '2022-09-21 23:34:37', 'productImages/FCK1-1000.jfif'),
(149, '4b6119000740c186f9c9c285de283168', 'CHUCK MOUNT BASE(MINI)', '13', 'FCK-1001', '', '313.00', 'Grams', '559.00', 25, 0, 0, '2022-09-21 23:35:16', 'productImages/FCK-1001.jfif'),
(150, 'c92cb0c88ac8d6cb52acb46e5ce4ea95', 'CLAMPING SCREW(MINI)', '13', 'FCK-1005', '', '8.00', 'Grams', '110.00', 100, 0, 0, '2022-09-21 23:38:48', 'productImages/FCK-1005.jfif'),
(151, 'a99d6ddb994b6c5f6ceae537a8018754', 'AIR EJECTOR W/SWITCH', '9', 'ECV-10HSCK', '', '120.00', 'Grams', '300.00', 20, 0, 0, '2022-09-21 23:40:28', 'productImages/ECV-10HSCK.jfif'),
(152, '916fbb3d37b4d489c570ca4204aac4ec', 'PLASTIC EJECTOR CLIP MOUNT BASE', '9', 'SBEF-PL-110*45', '', '17.00', 'Grams', '350.00', 30, 0, 0, '2022-09-21 23:41:11', 'productImages/PLASTIC EJECTOR CLIP MOUNT BASE.jfif'),
(153, '733b41a8de748e28146a082a68a8fa84', 'PLASTIC EJECTOR NOZZLE 1.5', '9', 'SSBP-10-S2-SDA', '', '22.00', 'Grams', '460.00', 40, 0, 0, '2022-09-21 23:41:50', 'productImages/SSBP-10-S2-SDA.jfif'),
(154, '8d0de39bc6201e7d18aec295dab6545a', 'PLASTIC EJECTOR NOZZLE 2.0', '9', 'SSBP-20-S3-SDA', '', '50.00', 'Grams', '430.00', 50, 0, 0, '2022-09-21 23:43:00', 'productImages/SSBP-20-S3-SDA.jfif'),
(155, 'f64ff9aacfc0b83ffc05d6001611f87d', 'PLASTIC EJECTOR NOZZLE 1.5', '9', 'SSBP-15-S2-SDA', '', '22.00', 'Grams', '315.00', 50, 0, 0, '2022-09-21 23:44:15', 'productImages/SSBP-10-S2-SDA.jfif'),
(156, '601e18bc5c8a18fcd2e2a7670316a24c', 'SUCTION STEM ANGLE BRACKET/SMALL UPPER', '9', 'CP-019', '', '48.00', 'Grams', '466.00', 50, 0, 0, '2022-09-21 23:45:00', 'productImages/CP-019.jfif'),
(157, 'a3e6b81fdeed5ce5ae812eba2ed25cd9', 'SUCTION STEM ANGLE BRACKET/SMALL L-LOWER', '9', 'CP-019L', '', '54.00', 'Grams', '366.00', 50, 0, 0, '2022-09-21 23:45:38', 'productImages/CP-019L.jfif'),
(158, 'c66774a4f4b9bd544ffcd7bf3dee3bf9', 'SUCTION STEM ANGLE BRACKET/SMALL R-LOWER', '9', 'CP-019R', '', '54.00', 'Grams', '300.00', 50, 0, 0, '2022-09-21 23:46:11', 'productImages/CP-019R.jfif'),
(159, '375750207225220b9d64945c9731aa85', 'SMALL CHECK VALVE FOR SUCTION CUP', '9', 'SSVK-G1-8', '', '11.00', 'Grams', '265.00', 50, 0, 0, '2022-09-21 23:46:58', 'productImages/SSVK-G1-8.jfif'),
(160, 'c7331ed847cd092219b0775d4e8aa543', 'SMALL CHECK VALVE FOR SUCTION CUP', '9', 'SSVK-M5', '', '11.00', 'Grams', '210.00', 50, 0, 0, '2022-09-21 23:47:33', 'productImages/SSVK-M5.jfif'),
(161, 'a5a3ecba19b77745d66db9ffa55ffa79', 'SMALL AIR FILTER', '9', 'STFC-4', '', '20.00', 'Grams', '254.00', 50, 0, 0, '2022-09-21 23:48:24', 'productImages/STFC-4.jfif'),
(162, '1050b53194cef7e0bef8330d32c8d9f5', 'SMALL AIR FILTER', '9', 'STFC-6', '', '20.00', 'Grams', '246.00', 50, 0, 0, '2022-09-21 23:48:53', 'productImages/STFC-6.jfif'),
(163, 'b200d5929904d8a2147a9f52c5dcbcaf', 'SILENCER', '9', '32.16.009', '', '13.00', 'Grams', '456.00', 50, 0, 0, '2022-09-21 23:50:55', 'productImages/32.16.009.jfif'),
(164, 'aba180b240101b9d8b2bb3a2c0edabf8', 'CONTROLLER UNIT FOR MICROSCOPIC', '9', 'B-CONT-UNIT', '', '145.00', 'Grams', '560.00', 50, 0, 0, '2022-09-21 23:51:29', 'productImages/B-CONT-UNIT.jfif'),
(165, '58911e3421e9512d8b7706ad27f7a603', 'SENSOR HARNESS FOR MICROSCOPIC', '9', 'B-SENS-H', '', '150.00', 'Grams', '463.00', 60, 0, 0, '2022-09-21 23:52:04', 'productImages/B-SENS-H.jfif'),
(166, '4ad6439d16969aa1bd18a71cc4687c13', 'DETECTION SENSOR UNIT FOR MICROSCOPIC', '9', 'B-SENS-UNIT', '', '1.00', 'Grams', '160.00', 50, 0, 0, '2022-09-21 23:52:38', 'productImages/B-SENS-UNIT.jfif'),
(167, 'd95e8cbfc7239f9b53fa3ae1801b193d', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-03A', '', '125.00', 'Grams', '860.00', 30, 0, 0, '2022-09-21 23:55:09', 'productImages/OX-03A.jfif'),
(168, '7465c42b23ca8193b54df3eec066d97d', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-03AI', '', '45.00', 'Grams', '469.00', 50, 0, 0, '2022-09-21 23:55:43', 'productImages/OX-03AI.jfif'),
(169, 'ca17a8d8a8f8567d589cc2b38b6c6b24', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-20B', '', '507.00', 'Grams', '490.00', 50, 0, 0, '2022-09-21 23:57:58', 'productImages/OX-20B.jfif'),
(170, 'eb6e1619faee7c32559bcb60965cfc78', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-20BI', '', '256.00', 'Grams', '465.00', 20, 0, 0, '2022-09-21 23:58:34', 'productImages/OX-20BI.jfif'),
(171, 'e332aaeea17daef46da7b82022dc0b0e', 'TOOL CHANGER(MULTI-JOINT)(ROBOT SIDE)', '2', 'OX-005A', '', '38.00', 'Grams', '460.00', 30, 0, 0, '2022-09-21 23:59:20', 'productImages/OX-005A.jfif'),
(172, 'a0d7a725e3745cb8dd8f5e4255bfe624', 'TOOL CHANGER(MULTI-JOINT)(TOOL SIDE)', '2', 'OX-005AI', '', '17.00', 'Grams', '369.00', 30, 0, 0, '2022-09-21 23:59:59', 'productImages/OX-005AI.jfif'),
(173, 'ef04d2322079d91ceb654098e9e43d23', 'D-SUB CABLE FOR OX', '2', 'OX-DS09-H', '', '40.00', 'Grams', '260.00', 50, 0, 0, '2022-09-22 00:01:57', 'productImages/OX-DS09-H.jfif'),
(174, 'b55f5a53e4f7238f510b6baffeada040', 'D-SUB CABLE FOR OX', '2', 'OX-DS09-I-H', '', '40.00', 'Grams', '261.00', 30, 0, 0, '2022-09-22 00:02:37', 'productImages/OX-DS09-I-H.jfif'),
(175, 'ea822fd0d082ff7018093ae062478b44', 'D-SUB CABLE FOR OX', '2', 'OX-DS09P-I-H', '', '60.00', 'Grams', '216.00', 50, 0, 0, '2022-09-22 00:03:18', 'productImages/OX-DS09P-I-H.jfif'),
(176, 'bf5ec144565f380879027e9f9a2ab672', 'D-SUB CABLE FOR OX', '2', 'OX-DS09S-H(1.5M)', '', '138.00', 'Grams', '315.00', 50, 0, 0, '2022-09-22 00:03:48', 'productImages/OX-DS09S-H(1.5M).jfif'),
(177, '3eec90aca7dda3cd22a17e129a48a402', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-SSB', '', '330.00', 'Grams', '462.00', 60, 0, 0, '2022-09-22 00:04:54', 'productImages/OX-SSB.jfif'),
(178, '73afaef9e0f130f87064e4cd1f0eb633', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-SSBI', '', '318.00', 'Grams', '315.00', 100, 0, 0, '2022-09-22 00:05:29', 'productImages/OX-SSBI.jfif'),
(179, '5785d47267d9408611cc345d3a0f1c80', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-SSBN', '', '120.00', 'Grams', '261.00', 50, 0, 0, '2022-09-22 00:06:01', 'productImages/OX-SSBN.jfif'),
(180, '735d72b774dcf7e097c2ec448d91f326', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-SBH', '', '475.00', 'Grams', '349.00', 50, 0, 0, '2022-09-22 00:07:35', 'productImages/OX-SBH.jfif'),
(181, 'f5258d9cd2f5b0918cc61c4f42f339e4', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-SBI', '', '235.00', 'Grams', '359.00', 60, 0, 0, '2022-09-22 00:08:09', 'productImages/OX-SBI.jfif'),
(182, '6d0cb017f66afb01b7f7b3d288432324', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-SBN', '', '431.00', 'Grams', '435.00', 50, 0, 0, '2022-09-22 00:09:07', 'productImages/OX-SBN.jfif'),
(183, '5d70bbc5a5ef742451c4c0a4052247d3', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-SBNI', '', '197.00', 'Grams', '560.00', 50, 0, 0, '2022-09-22 00:09:43', 'productImages/OX-SBNI.jfif'),
(184, 'b18d1abd70540bcbdbdca4fbceaf2ed6', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-SBYI', '', '195.00', 'Grams', '395.00', 50, 0, 0, '2022-09-22 00:10:22', 'productImages/OX-SBYI.jfif'),
(185, 'c1a6768e84e78fcf1bb76b63e20c85be', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-WSA', '', '674.00', 'Grams', '1055.00', 50, 0, 0, '2022-09-22 00:11:31', 'productImages/OX-WSA.jfif'),
(186, '47a83091cef2b29f3fd4f52a48a8b0c8', 'TOOL CHANGER(ROBOT SIDE)', '2', 'OX-SBN-30', '', '470.00', 'Grams', '450.00', 30, 0, 0, '2022-09-22 00:12:08', 'productImages/OX-SBN-30.jfif'),
(187, '896e8782b712bfea0b53d6bf2f1e0dab', 'TOOL CHANGER(TOOL SIDE)', '2', 'OX-WSBNI', '', '320.00', 'Grams', '698.00', 50, 0, 0, '2022-09-22 00:12:49', 'productImages/OX-WSBNI.jfif'),
(188, '2a8eb75fd47ac3dbe44ff6e9c5263594', 'AUTO QUICK CHUCK CHANGE HANGER', '3', 'HLAL', '', '2800.00', 'Grams', '356.00', 50, 0, 0, '2022-09-22 00:14:46', 'productImages/HLAL.jfif'),
(189, '8146508b927c560236c347f7e5a0b6b0', 'AUTO QUICK CHUCK CHANGE HANGER', '3', 'HSAL', '', '1300.00', 'Grams', '690.00', 30, 0, 0, '2022-09-22 00:15:19', 'productImages/HSAL.jfif'),
(190, 'e7106482bb2780bdd98030e5a533fca8', 'AUTO QUICK CHUCK CHANGE HANGER', '3', 'HSL', '', '182.00', 'Grams', '466.00', 30, 0, 0, '2022-09-22 00:15:56', 'productImages/HSL.jfif'),
(191, '85eacc1be1a9c083fe6338e40b49b50b', 'HANGER TOOL', '3', 'TLA1', '', '356.00', 'Grams', '346.00', 49, 1, 0, '2022-09-22 00:16:28', 'productImages/TLA1.jfif'),
(192, 'd504cb8bfaf503df643b670cc661fc88', 'HANGER TOOL', '3', 'TS', '', '43.00', 'Grams', '264.00', 50, 0, 0, '2022-09-22 00:17:02', 'productImages/TS.jfif'),
(193, 'ba3cceffe6cec9f7033663b93ce5ba48', 'HANGER TOOL', '3', 'TSA', '', '99.00', 'Grams', '316.00', 50, 0, 0, '2022-09-22 00:17:38', 'productImages/TSA.jfif'),
(194, '90cc0d12c74f3d1c70a7be6bae25ab2a', 'NEO CHUCK HANGER(FIXED SIDE)', '3', 'HNE-48', '', '540.00', 'Grams', '560.00', 50, 0, 0, '2022-09-22 00:18:33', 'productImages/HNE-48.jfif'),
(195, 'c871f71092ebbc06332f9e3128c2de79', 'NEO CHUCK HANGER(FIXED SIDE)', '3', 'HNE-S', '', '680.00', 'Grams', '705.00', 30, 0, 0, '2022-09-22 00:19:26', 'productImages/HNE-S.jfif'),
(196, '9ef26eadc027fa9d212250f1730f325e', 'NEO CHUCK HANGER(FIXED SIDE)', '3', 'HNE-SL', '', '632.00', 'Grams', '469.00', 50, 0, 0, '2022-09-22 00:20:11', 'productImages/HNE-SL.jfif'),
(197, '8322e7f780dc70a66db9440247a10c41', 'NEO CHUCK HANGER(TOOL SIDE)', '3', 'TNE-48I', '', '70.00', 'Grams', '345.00', 50, 0, 0, '2022-09-22 00:20:52', 'productImages/TNE-48I.jfif'),
(198, '2fa141f975d0a403e378dcf7a5326dfd', 'NEO CHUCK HANGER(TOOL SIDE)', '3', 'TNE-SI', '', '140.00', 'Grams', '315.00', 50, 0, 0, '2022-09-22 00:21:30', 'productImages/TNE-SI.jfif'),
(199, '4f034940da3c38f51d4b44dbaae831a0', 'NEO CHUCK HANGER(TOOL SIDE)', '3', 'TNE-SLI', '', '115.00', 'Grams', '415.00', 49, 1, 0, '2022-09-22 00:22:01', 'productImages/TNE-SLI.jfif'),
(200, '4b25d7726c25125cc8b45f090051b43f', 'CAP FOR PLASTIC MANIFOLD', '14', ' BF5-CAP', '', '1.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:25:32', 'productImages/BF5-CAP.jfif'),
(201, 'c1d42ca7b2c3b483615e9526943331d9', 'CAP FOR PLASTIC MANIFOLD', '14', 'BF6-CAP', '', '1.00', 'Grams', '200.00', 50, 0, 0, '2022-09-22 00:26:19', 'productImages/BF6-CAP.jfif'),
(202, 'b892acf834e45b8b2e49caa6d3e8be0f', 'POLYURETHANE TUBE(BLACK)', '14', 'TU0425B-20', '', '190.00', 'Grams', '455.00', 50, 0, 0, '2022-09-22 00:27:57', 'productImages/TU0425B-20.jfif'),
(203, '5a6a072550eca6fd8cd14f6b16b1e050', 'REPLACEMENT RUBBER FOR SSW-15(5 PCS/SET)', '14', '14103301(SSW-15)', '', '2.50', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:30:04', 'productImages/14103301(SSW-15).jfif'),
(204, '7aa602d0ce82a346b8f0d3f7e4f53978', 'SPEED CONTROLLER', '14', 'AS1002F-04', '', '5.10', 'Grams', '261.00', 50, 0, 0, '2022-09-22 00:32:08', 'productImages/AS1002F-04.jfif'),
(205, '26c63c3bf44d9ec4e5c369692ccf912b', 'SPEED CONTROLLER', '14', 'AS1002F-06', '', '6.50', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:32:48', 'productImages/AS1002F-06.jfif'),
(206, '450eb9626aea27dbf8f46451149935f2', 'SPEED CONTROLLER', '14', 'AS1201F-M5-04A', '', '5.10', 'Grams', '365.00', 50, 0, 0, '2022-09-22 00:33:18', 'productImages/AS1201F-M5-04A.jfif'),
(207, '59e031516e949b6a1c7cb60a34feb794', 'POLYURETHANE TUBE(BLUE)', '14', 'TU0425BU-20', '', '150.00', 'Grams', '450.00', 50, 0, 0, '2022-09-22 00:35:08', 'productImages/TU0425BU-20.jfif'),
(208, '84b9092c06cb721b45733fa682d66433', 'FITTING', '14', 'BF-3', '', '0.70', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:36:35', 'productImages/BF-3.jfif'),
(209, 'ec3c4351bf1dfa71c8355d4ef4aa3a38', 'FITTING', '14', 'BF-5', '', '1.40', 'Grams', '256.00', 50, 0, 0, '2022-09-22 00:37:10', 'productImages/BF-5.jfif'),
(210, '5e604a1b1b9b7e985214d857ee0ac618', 'FITTING', '14', 'BF-5-M3', '', '1.20', 'Grams', '265.00', 50, 0, 0, '2022-09-22 00:38:08', 'productImages/BF-5-M3.jfif'),
(211, '8a2f2f115f22b77a3996b298428a1253', 'FITTING', '14', 'BF-5-M4', '', '0.20', 'Grams', '315.00', 50, 0, 0, '2022-09-22 00:38:48', 'productImages/BF-5-M4.jfif'),
(212, 'e69a132194082b49a95f137f4bf691b7', 'FITTING', '14', 'BF-6', '', '1.50', 'Grams', '315.00', 50, 0, 0, '2022-09-22 00:39:29', 'productImages/BF-6.jfif'),
(213, 'cc37942e2f7c463a54204a3f8aafd4e7', 'FITTING', '14', 'BF-6-M4', '', '0.20', 'Grams', '300.00', 50, 0, 0, '2022-09-22 00:40:15', 'productImages/BF-6-M4.jfif'),
(214, 'e497ce638a014752e368f1f90fe6f5d5', 'MANIFOLD MINI', '14', 'MM-6P', '', '10.00', 'Grams', '200.00', 50, 0, 0, '2022-09-22 00:41:41', 'productImages/MM-6P.jfif'),
(215, '04cee53ec8d4ae92ec60d7efe0ffd1e3', 'MANIFOLD MINI', '14', 'MM-8P', '', '14.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:42:17', 'productImages/MM-8P.jfif'),
(216, '87cf0da25307c87153af296ecaa95d2a', 'MANIFOLD MINI', '14', 'MM-10P', '', '17.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 00:42:54', 'productImages/MM-10P.jfif'),
(217, '603bcede9f7f15dec8fd4d136d51fb90', 'MANIFOLD MINI', '14', 'MS-6P18', '', '25.00', 'Grams', '315.00', 50, 0, 0, '2022-09-22 00:43:32', 'productImages/MS-6P18.jfif'),
(218, '716511fa3282700682ad9dd2d433d2d1', 'MANIFOLD SMALL', '14', 'MM-14P', '', '50.00', 'Grams', '250.00', 50, 0, 0, '2022-09-22 00:44:13', 'productImages/MM-14P.jfif'),
(219, '90c6b73814220286cbbe69dd298a8cc2', 'PAD FOR MINI CONTAINER CYLINDER', '5', 'NCON-CP-01', '', '34.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 01:35:25', 'productImages/NCON-CP-01.jfif'),
(220, 'f29cde313ed0feff282a539ccded466d', 'PAD FOR MINI CONTAINER CYLINDER', '5', 'NCON-CP-02', '', '38.00', 'Grams', '159.00', 50, 0, 0, '2022-09-22 01:35:58', 'productImages/NCON-CP-02.jfif'),
(221, 'fa2dd003c34ad20183aea8bf3526f56a', 'PAD FOR MINI CONTAINER CYLINDER', '5', 'NCON-CP-03', '', '38.00', 'Grams', '150.00', 50, 0, 0, '2022-09-22 01:36:32', 'productImages/NCON-CP-03.jfif'),
(222, 'a09f1d05b57cdb92860abd7a285f186c', 'PAD FOR MINI CONTAINER CYLINDER', '5', 'NCON-CP-04', '', '71.00', 'Grams', '255.00', 50, 0, 0, '2022-09-22 01:37:06', 'productImages/NCON-CP-04.jfif'),
(223, 'ede715e231b202784178812b407f79d0', 'PAD FOR MINI CONTAINER CYLINDER', '5', 'NCON-CP-05', '', '71.00', 'Grams', '250.00', 50, 0, 0, '2022-09-22 01:37:38', 'productImages/NCON-CP-05.jfif'),
(224, '345a189129a9ac6c6bce7e725730f696', 'CHUCK SPACER FOR MICRO MINI CYLINDER', '5', 'CPUM-01(SR)', '', '1.70', 'Grams', '155.00', 50, 0, 0, '2022-09-22 01:38:26', 'productImages/CPUM-01(SR).jfif'),
(225, '4d215f7a0787023b2a53092de700f705', 'RECTANGLE PAD FOR MICRO MINI CYLINDER', '5', 'CPUM-01', '', '5.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 01:38:59', 'productImages/CPUM-01.jfif'),
(226, '1663ae4973663702fe04b93e5d986734', 'L-SHAPED CLAW FOR MICRO MINI CYLINDER', '5', 'CPUM-02', '', '3.60', 'Grams', '140.00', 50, 0, 0, '2022-09-22 01:39:47', 'productImages/CPUM-02.jfif'),
(227, 'd2b89be096fce51fe5ac97a936450c5c', 'NUT PLATE FOR MICRO MINI CYLINDER', '5', 'CPUM-05', '', '5.00', 'Grams', '115.00', 50, 0, 0, '2022-09-22 01:40:45', 'productImages/CPUM-05.jfif'),
(228, 'd9915153350dd6f1640b5f7414fa1fec', 'RECTANGLE PAD FOR MICRO MINI CYLINDER', '5', 'ECPUM-03', '', '5.00', 'Grams', '210.00', 50, 0, 0, '2022-09-22 01:41:18', 'productImages/ECPUM-03.jfif'),
(229, 'a4730163206c83ba097c11780ede329a', 'RECTANGLE PAD W/SW FOR MINI CYLINDER', '5', 'KRCW1-5000', '', '59.00', 'Grams', '315.00', 50, 0, 0, '2022-09-22 01:41:48', 'productImages/KRCW1-5000.jfif'),
(230, '678574020e39a7f788735eaaae1ad139', 'RECTANGLE PAD W/SW FOR MICRO MINI CYL', '5', 'L1131-100-0', '', '23.00', 'Grams', '310.00', 50, 0, 0, '2022-09-22 01:42:23', 'productImages/L1131-100-0.jfif'),
(231, '32ff6ed25396650ede8050383a61a356', 'RECTANGLE PAD W/SW FOR MICRO MINI CYL', '5', 'L1131-200-0', '', '23.00', 'Grams', '300.00', 50, 0, 0, '2022-09-22 01:42:58', 'productImages/L1131-200-0.jfif'),
(232, '1d5a2eeba559aa4f40353d95fe736521', 'MINI CYLINDER PILLOW BLOCK', '5', 'CP-007(10MM)', '', '20.00', 'Grams', '110.00', 50, 0, 0, '2022-09-22 01:43:52', 'productImages/CP-007(10MM).jfif'),
(233, 'a9f4202e2fd0940575c8a55d1331fc49', 'MINI CYLINDER PILLOW BLOCK', '5', 'CP-008(20MM)', '', '40.00', 'Grams', '115.00', 50, 0, 0, '2022-09-22 01:44:25', 'productImages/CP-008(20MM).jfif'),
(234, '94ce3533ec651523ff5191a30879f99b', 'MINI CYLINDER SLIDE PLATE', '5', 'CP-030(10H)', '', '53.00', 'Grams', '115.00', 50, 0, 0, '2022-09-22 01:44:58', 'productImages/CP-030(10H).jfif'),
(235, '5f31e4f3133ccd420ae390de0af7652f', 'MINI CYLINDER SLIDE PLATE', '5', 'CP-030(15H)', '', '64.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 01:46:01', 'productImages/CP-030(15H).jfif'),
(236, '8f8c77449e541805f486cf6ddd7093e2', 'MINI CYLINDER EXTENSION SHAFT', '5', 'CP-033(30MM)', '', '11.00', 'Grams', '159.00', 50, 0, 0, '2022-09-22 01:46:34', 'productImages/CP-033(30MM).jfif'),
(237, '1234c528833de4bc582ea3346cff7134', 'MINI CYLINDER EXTENSION SHAFT', '5', 'CP-034(45MM)', '', '16.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 01:47:11', 'productImages/CP-034(45MM).jfif'),
(238, 'c6e5db4e12183c41603432df74eea2ba', 'SPACER ALUMINUM 50H', '5', 'XL0002-050', '', '73.00', 'Grams', '285.00', 50, 0, 0, '2022-09-22 01:47:46', 'productImages/XL0002-050.jfif'),
(239, '1d815921accb21f09d5bccbe5699b719', 'RUNNER CHUCK EL W/O SENSOR', '6', 'CHK-EL1-12', '', '143.00', 'Grams', '410.00', 50, 0, 0, '2022-09-22 01:50:42', 'productImages/CHK-EL1-12.jfif'),
(240, '9f715c7820405c877cee8f1154007bcd', 'RUNNER CHUCK EL W/SENSOR', '6', 'CHK-EL1-12-C', '', '155.00', 'Grams', '450.00', 50, 0, 0, '2022-09-22 01:51:25', 'productImages/CHK-EL1-12-C.jfif'),
(241, '6d6efa06d4f2d3d921bbbabbef534f8b', 'RUNNER CHUCK EL W/LIMIT SWITCH', '6', 'CHK-EL1-12-C1', '', '145.00', 'Grams', '415.00', 50, 0, 0, '2022-09-22 01:52:11', 'productImages/CHK-EL1-12-C1.jfif'),
(242, '75f45cbf536b18879bb0e6e3900941ce', 'RUNNER CHUCK EL W/O SENSOR', '6', 'CHK-EL-12', '', '143.00', 'Grams', '415.00', 50, 0, 0, '2022-09-22 01:53:35', 'productImages/CHK-EL-12.jfif'),
(243, '8ae8a5b36a13dcd8ac7db82cb80b1705', 'RUNNER CHUCK EL W/SENSOR', '6', 'CHK-EL-12-C', '', '155.00', 'Grams', '415.00', 50, 0, 0, '2022-09-22 01:54:13', 'productImages/CHK-EL-12-C.jfif'),
(244, '708a92a4f2a731ee696b299e460f2449', 'RUNNER CHUCK EM (W/O SENSOR)', '6', 'CHK-EM1-12', '', '67.00', 'Grams', '400.00', 50, 0, 0, '2022-09-22 01:54:58', 'productImages/CHK-EM1-12.jfif'),
(245, 'c906c01856e023ea33fc275f899748fd', 'RUNNER CHUCK EM (W/SENSOR)', '6', 'CHK-EM1-12-C', '', '79.00', 'Grams', '390.00', 50, 0, 0, '2022-09-22 01:55:40', 'productImages/CHK-EM1-12-C.jfif'),
(246, '6fdeb642bba3636c48b2b916c5e54f07', 'RUNNER CHUCK EM (W/LIMIT SWITCH)', '6', 'CHK-EM1-12-C1', '', '73.00', 'Grams', '400.00', 50, 0, 0, '2022-09-22 01:56:16', 'productImages/CHK-EM1-12-C1.jfif'),
(247, '645596f5dda0820127b9202d5d664918', 'RUNNER CHUCK EM (W/O SENSORS)', '6', 'CHK-EM-12', '', '46.00', 'Grams', '410.00', 50, 0, 0, '2022-09-22 01:57:11', 'productImages/CHK-EM-12.jfif'),
(248, '3669533741833820615098a7d5760f67', 'RUNNER CHUCK ES W/SENSOR', '6', 'CHK-ES1-08-C', '', '78.00', 'Grams', '400.00', 50, 0, 0, '2022-09-22 01:58:39', 'productImages/CHK-EM-12-C.jfif'),
(249, '1802bda58844e9da459a58a9bcaa2969', 'RUNNER CHUCK EN W/O SENSOR', '6', 'CHK-EN1-06', '', '89.00', 'Grams', '430.00', 50, 0, 0, '2022-09-22 01:59:19', 'productImages/CHK-EN1-06.jfif'),
(250, '7b5108d59d9a6a01d5a33613ef97e520', 'RUNNER CHUCK ES W/O SENSOR', '6', 'CHK-ES1-08', '', '150.00', 'Grams', '350.00', 50, 0, 0, '2022-09-22 01:59:52', 'productImages/CHK-ES1-08.jfif'),
(251, '53d765001f41fe112e7b7557c27fe7b4', 'RUNNER CHUCK ES W/SENSOR', '6', 'CHK-ES-08-C', '', '158.00', 'Grams', '350.00', 50, 0, 0, '2022-09-22 02:00:24', 'productImages/CHK-ES-08-C.jfif'),
(252, '38b3f07db7b08c042721d552418b40ce', 'RUNNER CHUCK ES W/LIMIT SWITCH', '6', 'CHK-EX-20', '', '152.00', 'Grams', '400.00', 50, 0, 0, '2022-09-22 02:01:04', 'productImages/CHK-EX-20.jfif'),
(253, 'afe707654596c0136ae1f7f53bd7e1d2', 'RUNNER CHUCK EX W/SENSOR', '6', 'CHK-EX-20-C', '', '144.00', 'Grams', '350.00', 50, 0, 0, '2022-09-22 02:01:43', 'productImages/CHK-EX-20-C.jfif'),
(254, '4a763de560021632ddfde1b42e255b20', 'SUCTION STEM ATTCHMENT HEAD MICRO', '8', 'N01891-201', '', '15.00', 'Grams', '150.00', 50, 0, 0, '2022-09-22 02:04:38', 'productImages/N01891-201.jfif'),
(255, 'c494321b6089d56358147063ba6fe57b', 'SUCTION STEM/MICRO', '8', 'VFILB-M', '', '23.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 02:05:09', 'productImages/VFILB-M.jfif'),
(256, '94d90c84d90c7961902109fc32680449', 'SUCTION STEM/MICRO', '8', 'VFILB-M-P8', '', '15.00', 'Grams', '200.00', 50, 0, 0, '2022-09-22 02:05:37', 'productImages/VFILB-M-P8.jfif'),
(257, 'f4fcebecf354d8c63c42e2df4b00d7dc', 'TAPER WASHER FOR VFIL-SS/MINI', '8', 'PHI.10', '', '10.00', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:06:26', 'productImages/PHI.10.jfif'),
(258, '5310311a547578c0a4cb37fbae1b7c51', 'SUCTION STEM/MINI', '8', 'VFIL1-SS-5', '', '15.00', 'Grams', '115.00', 50, 0, 0, '2022-09-22 02:07:06', 'productImages/VFIL1-SS-5.jfif'),
(259, '645e07497488faabeb399d49e4691737', 'SUCTION STEM/MINI', '8', 'VFIL1-SS-10', '', '15.00', 'Grams', '115.00', 50, 0, 0, '2022-09-22 02:07:37', 'productImages/VFIL1-SS-10.jfif'),
(260, '3d0beaccceea8ddb4606cc1e980150ae', 'SUCTION STEM/MINI', '8', 'VFIL1-SS-20', '', '20.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 02:08:54', 'productImages/VFIL1-SS-20.jfif'),
(261, 'a9488ad0ddaffce85ab5a0512d3b9642', 'SUCTION STEM/MINI', '8', 'VFIL1-SS-30', '', '20.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 02:09:28', 'productImages/VFIL1-SS-30.jfif'),
(262, 'c4d77ba82e0c638c8e5de2c8f0aab2cd', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-5-P8', '', '32.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 02:10:36', 'productImages/VFIL2-SS-5-P8.jfif'),
(263, 'ef787fd3df0d714f1552e5a5c5f3f93a', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-5-P12', '', '30.00', 'Grams', '215.00', 50, 0, 0, '2022-09-22 02:11:14', 'productImages/VFIL2-SS-5-P12.jfif'),
(264, '4da4ea5a14e5facd1a3d1128f5841492', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-10-P8', '', '35.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 02:11:49', 'productImages/VFIL2-SS-10-P8.jfif'),
(265, '848365dbd391acbbee104e82f69f52ef', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-10-P12', '', '35.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 02:12:32', 'productImages/VFIL2-SS-10-P12.jfif'),
(266, 'efe49c9fb14b2441e269171a9c2e108a', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-20-P8', '', '34.00', 'Grams', '200.00', 50, 0, 0, '2022-09-22 02:13:53', 'productImages/VFIL2-SS-20-P8.jfif'),
(267, '80542233cef0f27bab8af74b1cce2513', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-20-P12', '', '30.00', 'Grams', '155.00', 50, 0, 0, '2022-09-22 02:14:40', 'productImages/VFIL2-SS-20-P12.jfif'),
(268, '8560595832687dad855c3e19ba86473d', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-30-P8', '', '30.00', 'Grams', '210.00', 50, 0, 0, '2022-09-22 02:15:30', 'productImages/VFIL2-SS-30-P8.jfif'),
(269, 'eb927860c36339db275b9d3c398f93f1', 'SUCTION STEM/MINI', '8', 'VFIL2-SS-30-P12', '', '28.00', 'Grams', '210.00', 50, 0, 0, '2022-09-22 02:16:04', 'productImages/VFIL2-SS-30-P12.jfif'),
(270, '2dcd37e05bd50f8c6f6ba8ef8319b4f0', 'SUCTION STEM FIXED/MINI', '8', 'VFILK-SS-M10', '', '12.00', 'Grams', '110.00', 50, 0, 0, '2022-09-22 02:16:41', 'productImages/VFILK-SS-M10.jfif'),
(271, '702935c3ab2556b2bbe7367318001b08', 'SUCTION STEM/SMALL', '8', 'VFIL1-S-5-P12', '', '54.00', 'Grams', '216.00', 50, 0, 0, '2022-09-22 02:17:48', 'productImages/VFIL1-S-5-P12.jfif');
INSERT INTO `products` (`productId`, `productUniqueId`, `productDesc`, `category`, `model`, `description`, `weight`, `unit`, `unitPrice`, `quantity`, `quantitySold`, `productDel`, `productDate`, `productImgs`) VALUES
(272, '9af50694a7335e488455ed9cf9a5fc31', 'SUCTION STEM/SMALL(M5)', '8', ' VFIL-S-10A', '', '34.00', 'Grams', '210.00', 50, 0, 0, '2022-09-22 02:18:40', 'productImages/VFIL1-S-10-P12.jfif'),
(273, 'f8f7041dc492b55a660a582eac0e3ccc', 'SUCTION STEM/SMALL', '8', 'VFIL1-S-10-P20', '', '40.00', 'Grams', '200.00', 50, 0, 0, '2022-09-22 02:19:18', 'productImages/VFIL1-S-10-P20.jfif'),
(274, 'fe4f0d39b1f38ce8326fa9699b83e837', 'SUCTION STEM/SMALL(M5)', '8', 'VFIL-S-5A', '', '37.00', 'Grams', '220.00', 50, 0, 0, '2022-09-22 02:20:13', 'productImages/VFIL-S-5A.jfif'),
(275, 'e5f2fd430e61a64717757b8a2c7aab2b', 'SUCTION STEM/SMALL(M5)', '8', 'VFIL-S-10A', '', '45.00', 'Grams', '220.00', 50, 0, 0, '2022-09-22 02:20:43', 'productImages/VFIL-S-10A.jfif'),
(276, '184e9f8286b7957dad0bdedc74325cbf', 'POWER AND COMMUNICATION I/O UNIT(16)', '15', 'E-PCIO-UNIT 16', '', '155.00', 'Grams', '345.00', 50, 0, 0, '2022-09-22 02:21:59', 'productImages/E-PCIO-UNIT 16.jfif'),
(277, 'f73ceaec9f764ecda7f9ff9bc0ddd907', 'POWER AND COMMUNICATION I/O UNIT(32)', '15', 'E-PCIO-UNIT 32', '', '215.00', 'Grams', '315.00', 50, 0, 0, '2022-09-22 02:22:32', 'productImages/E-PCIO-UNIT 32.jfif'),
(278, '9581dbbba1d96311d1efa6f7b15ab7be', 'PCIO MARK TUBE', '15', 'E-PCIO-MKT SET', '', '15.00', 'Grams', '245.00', 50, 0, 0, '2022-09-22 02:23:33', 'productImages/E-PCIO-MKT SET.jfif'),
(279, '935361ed54235e9bdd1fa9687483b8c3', 'POWER AND COMMUNICATION I/O HARNESS(03)', '15', 'E-PCIO-HNS03', '', '23.00', 'Grams', '250.00', 50, 0, 0, '2022-09-22 02:24:12', 'productImages/E-PCIO-HNS03.jfif'),
(280, '5a6f6a91ead59493c29b13d7ce6abbd5', 'CROSS-RECESSED PAN HEAD SCREW(TRIVALENT)', '15', 'BKJ 3-6(M3-6)', '', '0.50', 'Grams', '52.00', 100, 0, 0, '2022-09-22 02:25:00', 'productImages/BKJ 3-6(M3-6).jfif'),
(281, '072080aa4374d3c37e2c485e9f8f0223', 'CROSS-RECESSED PAN HEAD SCREW(TRIVALENT)', '15', 'BKJ 3-6(M3-10)', '', '0.50', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:25:38', 'productImages/BKJ 3-6(M3-10).jfif'),
(282, 'd6a3f1486afd16fb127f9f22e57e2d3b', 'HEXAGON NUT(TYPE1, WHITE ELEMENT)', '15', 'M3', '', '0.30', 'Grams', '50.00', 100, 0, 0, '2022-09-22 02:26:30', 'productImages/M3.jfif'),
(283, '9f96fbf5fbc982b202bd27f349772f16', 'CROSS-RECESSED PAN HEAD SCREW(TRIVALENT)', '15', 'M3*16', '', '0.50', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:27:05', 'productImages/M3-16.jfif'),
(284, '4901060c4053b5cba8a6262b78d9e4fe', 'M4-8', '15', 'M4*8', '', '0.40', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:27:57', 'productImages/M4-8.jfif'),
(285, 'a30ef54884b8e1155788e370d97b126a', 'HEXAGON SOCKET CAP SCREW(W/SW,FW TRIVAL)', '15', 'M4-12(E)', '', '0.55', 'Grams', '65.00', 100, 0, 0, '2022-09-22 02:28:50', 'productImages/M4-12(E).jfif'),
(286, '65c48644e6868a5a0051d608be7ac774', 'HEXAGON NUT(TRIVALENT)', '15', 'M6', '', '3.00', 'Grams', '70.00', 100, 0, 0, '2022-09-22 02:29:39', 'productImages/M6.jfif'),
(287, 'ea7fbf454c992a31fdf265c532f26558', 'HEXAGON SOCKET FLAT HEAD SCREW(TRIVALENT', '15', 'M6*10', '', '3.00', 'Grams', '60.00', 100, 0, 0, '2022-09-22 02:30:55', 'productImages/M6-10.jfif'),
(288, '8e900074781eb7623e83e1412ff8f7e0', 'HEXAGON SOCKET CAP SCREW(W/SW,FW TRIVAL)', '15', 'M6*15(E)', '', '5.00', 'Grams', '60.00', 100, 0, 0, '2022-09-22 02:32:18', 'productImages/M6-15(E).jfif'),
(289, '3af8605f4649de8d9b011200294b21cd', 'HEXAGON SOCKET CAP SCREW(W/SW,FW TRIVAL)', '15', 'M6*20(E)', '', '6.00', 'Grams', '70.00', 100, 0, 0, '2022-09-22 02:33:00', 'productImages/M6-20(E).jfif'),
(290, '49e0e503ee019cde5346d50cd2699607', 'HEXAGON NUT(TRIVALENT)', '15', 'M8', '', '5.00', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:34:15', 'productImages/M8.jfif'),
(291, '3039dfdd62d931a5e24f0924c2d0b8ca', 'SPRING WASHER(TRIVALENT)', '15', 'M64*2', '', '3.00', 'Grams', '45.00', 100, 0, 0, '2022-09-22 02:35:03', 'productImages/M62.jfif'),
(292, 'c251a340e183258b951795e60fc4aa80', 'FLAT WASHER(TRIVALENT)', '15', 'M6*3', '', '4.00', 'Grams', '45.00', 100, 0, 0, '2022-09-22 02:35:41', 'productImages/M63.jfif'),
(293, 'edcc95b0c24b3c3bfb92ceffafcef512', 'SPRING WASHER(TRIVALENT)', '15', 'M8*2', '', '4.00', 'Grams', '45.00', 100, 0, 0, '2022-09-22 02:36:30', 'productImages/M82.jfif'),
(294, '48b992fbec7c8ce28254d8864733b8fb', 'FLAT WASHER(TRIVALENT)', '15', 'M8*3', '', '5.00', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:37:08', 'productImages/M83.jfif'),
(295, 'ff9a0508c9b45812123aaf1ee317ba76', 'CROSS-RECESSED PAN HEAD SCREW(TRIVALENT)', '15', 'NKJ 2.6-5(M2.6*5)', '', '5.00', 'Grams', '55.00', 100, 0, 0, '2022-09-22 02:37:56', 'productImages/NKJ 2.6-5(M2.6-5).jfif');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `salesDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesId`, `orderId`, `cartId`, `salesDate`) VALUES
(1, 1, 1, '2022-12-04 23:52:02'),
(2, 2, 1, '2022-12-04 23:53:16'),
(3, 3, 1, '2022-12-04 23:53:28'),
(4, 1, 1, '2022-12-04 23:53:57'),
(5, 2, 1, '2022-12-04 23:55:33'),
(6, 3, 4, '2022-12-05 20:45:33'),
(7, 4, 3, '2022-12-05 20:45:41'),
(8, 5, 2, '2022-12-05 20:45:50'),
(9, 6, 5, '2022-12-08 12:06:21'),
(10, 7, 5, '2022-12-08 12:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `orderNo` varchar(100) NOT NULL,
  `serviceInstFname` varchar(100) NOT NULL,
  `serviceInstLname` varchar(100) NOT NULL,
  `serviceInstPos` varchar(100) NOT NULL,
  `serviceInstDesc` varchar(100) NOT NULL,
  `serviceInstReason` longtext NOT NULL,
  `serviceInstStatus` int(11) NOT NULL,
  `serviceAssignDate` datetime NOT NULL DEFAULT current_timestamp(),
  `serviceMarkedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `serviceDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `orderId`, `orderNo`, `serviceInstFname`, `serviceInstLname`, `serviceInstPos`, `serviceInstDesc`, `serviceInstReason`, `serviceInstStatus`, `serviceAssignDate`, `serviceMarkedDate`, `serviceDate`) VALUES
(1, 5, 'SSPI-0000005-2022', 'Lawrence', 'Sebelina', 'Test', 'Robot Installation', '', 0, '2022-12-07 21:24:00', '2022-12-05 21:23:22', '2022-12-05 21:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userUniqueId` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(100) NOT NULL,
  `contactNo` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userCName` varchar(100) NOT NULL,
  `userCAddress` varchar(100) NOT NULL,
  `userCPosition` varchar(100) NOT NULL,
  `userCNo` varchar(100) NOT NULL,
  `userCEmail` varchar(100) NOT NULL,
  `userDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userProfileImg` varchar(100) NOT NULL,
  `userCId` varchar(100) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `userVerify` int(11) NOT NULL,
  `userDel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userUniqueId`, `firstName`, `lastName`, `userType`, `age`, `birthday`, `address`, `contactNo`, `gender`, `username`, `password`, `cpassword`, `email`, `userCName`, `userCAddress`, `userCPosition`, `userCNo`, `userCEmail`, `userDate`, `userProfileImg`, `userCId`, `userStatus`, `userVerify`, `userDel`) VALUES
(1, 'aef2e13daf4e76de930445683ef5ecbc', 'Lawrence', 'Sebelina', 'Head Admin', 22, '1999-12-13', 'Block 3 Lot 12', '09123456789', 'Male', 'jeric', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'jericcreer.durante.fg@gmail.com', 'Test', 'Test', 'Test', '09123456789', 'test@email.com', '2022-12-03 23:17:53', 'uploads/user-default-img.jpg', 'uploads/admin-default-img-removebg-preview.png', 0, 1, 0),
(2, 'cea5830dfab9e267aa165ee68f0e413d', 'Juan', 'Cruz', 'User', 23, '1999-12-13', 'Block 3 Lot 12', '09123456789', 'Male', 'juan', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'lawrencesebelina1st@gmail.com', 'Test1', 'Test', 'Test', '09123456789', 'test2@email.com', '2022-12-04 10:20:51', 'uploads/user-default-img.jpg', 'uploads/Lambo2.jpg', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylogs`
--
ALTER TABLE `activitylogs`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`companyInfoId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactusId`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`deliveryId`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faqId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylogs`
--
ALTER TABLE `activitylogs`
  MODIFY `activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `companyInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `deliveryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
