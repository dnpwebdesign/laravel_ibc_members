-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2014 at 07:44 AM
-- Server version: 5.5.40-36.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indonesi_members`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `abn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `email`, `phone`, `website`, `street`, `suburb`, `state`, `postcode`, `twitter`, `facebook`, `abn`, `created_at`, `updated_at`) VALUES
(1, 'Elmtree Computers', 'Raspberry Pi, open-source, and Linux specialist. Supplying hardware, software, and systems solutions', 'business@elmtreecomputers.com.au', '98079735', 'www.elmtreecomputers.com.au', '30 Elmtree Tce', 'Chadstone', 'VIC', 3148, '', '', '1234 5678 8765', '2014-01-26 16:35:29', '2014-01-26 22:10:43'),
(4, 'Xynergy', 'This is a property investment consultant', '', '', '', '', 'South yarra', 'VIC', 3145, '', '', '', '2014-01-30 02:55:38', '2014-02-02 01:41:01'),
(24, 'DNP Web Design', 'We build websites for you.', '', '', 'http://www.dnpwebdesign.com', '', '', 'Jakarta', 0, '', '', '', '2014-01-31 03:19:01', '2014-01-31 03:19:01'),
(25, 'Kabo Lawyer', 'We migrate you', '', '', 'http://www.kabolawyer.com.au', '', 'Melbourne', 'VIC', 0, '', '', '', '2014-02-01 16:36:58', '2014-02-02 01:40:40'),
(26, 'Beyond Personal Trainer', 'Mobile PT\r\nCorporate Bootcamp\r\nSmall Group Training \r\n\r\nwww.beyondpersonaltrainer.com.au', 'yolinda@beyondpersonaltrainer.com.au', '0405755457', '', '', 'Melbourne CBD', 'Vic', 3000, 'beyondptrainer', 'Beyondpersonaltrainer', '', '2014-02-18 15:20:43', '2014-02-18 15:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `members_businesses`
--

DROP TABLE IF EXISTS `members_businesses`;
CREATE TABLE IF NOT EXISTS `members_businesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_owner` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `members_businesses`
--

INSERT INTO `members_businesses` (`id`, `business_id`, `member_id`, `is_owner`, `role`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, 'Director', '2014-01-26 16:46:09', '0000-00-00 00:00:00'),
(23, '24', '1', 0, '', '2014-02-01 16:23:16', '2014-02-01 16:23:16'),
(24, '24', '1', 0, '', '2014-02-01 16:23:35', '2014-02-01 16:23:35'),
(31, '25', '18', 1, 'Principal', '2014-02-01 16:40:17', '2014-02-01 22:18:28'),
(32, '6', '18', 0, 'Advisor', '2014-02-01 16:40:30', '2014-02-01 16:40:30'),
(50, '4', '4', 0, 'advisor', '2014-02-02 01:41:10', '2014-02-02 01:41:10'),
(51, '25', '4', 0, 'lawyer', '2014-02-02 01:42:10', '2014-02-02 01:42:10'),
(52, '4', '44', 0, 'part-time financial analyst and accountant', '2014-08-26 23:07:03', '2014-08-26 23:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_25_143054_create_types_table', 1),
('2014_01_27_014806_create_businesses_table', 2),
('2014_01_27_014806_create_members_businesses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `status` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `member_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 12, 'hehehe', '2014-02-17 10:05:57', '2014-02-17 10:05:57'),
(12, 12, 'testing di IE kantor', '2014-02-17 19:10:21', '2014-02-17 19:10:21'),
(13, 38, 'Hi everyone, im new and excited to be part of the IBC. ', '2014-06-24 06:35:28', '2014-06-24 06:35:28'),
(14, 46, 'Hi everyone ', '2014-09-11 20:17:03', '2014-09-11 20:17:03'),
(15, 17, 'Hi\r\n', '2014-11-11 00:04:03', '2014-11-11 00:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fees` double NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `fees`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'Professional', 55, 'those who work as employee of a company or professional field like doctor', '0000-00-00 00:00:00', '2014-02-11 21:28:34'),
(3, 'Entrepreneur', 55, 'Those who start or own a business can be our Entrepreneur member', '2014-01-29 03:35:49', '2014-02-11 21:28:22'),
(4, 'Student', 10, 'Learn from senior mentors, get internship, and get a job through IBC network!', '2014-02-11 21:27:55', '2014-02-11 21:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `name`, `gender`, `location`, `bio`, `photo`, `type_id`, `created_at`, `updated_at`) VALUES
(12, 'pratyadi', '$2y$10$gW811A7CMM310upbZ.Dm5OpDXL2Qnt9tgM3kEYBkw5vElbeDIw1qu', 'dipto@ibcm.org.au', '0401941294', 'Dipto Pratyaksa', '1', 'Melbourne', 'Director of Relation & Partnership', 'pratyadi.jpg', 2, '2014-01-29 03:26:32', '2014-10-25 11:27:23'),
(17, 'lydia', '$2y$10$MW7TRcAir4jmyA7ajttG5O9zdW6H54bpE3y3n0cF5jYtjQaHdHk0S', 'tanlydia12@gmail.com', '0412480552', 'lydia', '0', 'Melbourne', 'IBC President 2014-2016\r\nHolden Engineer', '', 2, '2014-01-29 04:35:34', '2014-11-10 13:07:41'),
(19, 'konfir', '$2y$10$qvPNA4SqSCK6SSWc0WWkzuY6ytAnjuPY4WZdVSEWxLFEXvzXVIC5q', 'konfir@kabo.com', '', 'Konfir', '1', '', '', 'konfir.jpg', 3, '2014-02-11 01:57:52', '2014-02-12 00:40:29'),
(21, 'admin', '$2y$10$M5Hwdp58L3lasnZpDFBKH.A1p6Yi.Laix4V5R0TXDkVXZSUioGmfW', 'admin@ibcm.org.au', '', 'Admin IBC', NULL, '', '', '', 2, '2014-02-16 04:09:08', '2014-02-16 04:09:08'),
(22, 'ybaskoro', '$2y$10$f.6KmEhUSwnCWXjHz5jIS.trD5hCck/RhCNggHrfbszelbpJdVTU.', 'yudo.baskoro@the-netwerk.com', '', 'Yudo', NULL, '', '', '', 2, '2014-02-17 10:48:59', '2014-02-17 10:48:59'),
(23, 'yolindaindrawan', '$2y$10$4Tifz0yq3GOcfu6airia3.7Mbd50gQgky2gJIEyu2Ya418xoDUeB2', 'yolinda.indrawan@gmail.com', '0405755457', 'yolinda', NULL, '', '', '', 3, '2014-02-18 15:18:10', '2014-02-18 15:18:10'),
(24, 'stefayuwiko', '$2y$10$xligC10W6KtVAzs6hiQrBu3qKYIfA/jV1qB8GMdqVp6uNAEyti1gq', 'Stefayuwiko@gmail.com', '0405064950', 'Stefa Yuwiko', NULL, '', '', '', 4, '2014-02-26 08:20:46', '2014-02-26 08:20:46'),
(25, 'canejava', '$2y$10$1GjHAvVkizMJUTsJ3y.EHuTg2.SJUozv6QLcIdx3fXb.IdkyiVEeK', 'canejava2@bigpond.com', '0406660708', 'muhammad noerdiansyah', NULL, '', '', '', 3, '2014-03-02 07:09:34', '2014-03-02 07:09:34'),
(26, 'pchristian', '$2y$10$FmjbxiyD2JcrIGOQc7sy0epdBfntd59l.rQXM7Uv.vTH.cJmc8dSe', 'patrickchristian@hotmail.com', '', 'Patrick Christian', NULL, '', '', '', 2, '2014-03-12 07:57:49', '2014-03-12 07:57:49'),
(27, 'ivansantoso', '$2y$10$3Bo9RZcpuJvT5OwhUOc9e.VM3LiNa4dkCzRgdXenQfoAnF60hihAa', 'ivan.agung@gmail.com', '0405516998', 'Ivan Santoso', NULL, '', '', '', 2, '2014-03-17 08:58:17', '2014-03-17 08:58:17'),
(28, 'mohamedelrafihi', '$2y$10$YhdwrHIHkJRuVFx748WtTesuCAf/gzXfR6KiD4bOFwYMVR6W7GFWS', 'mohamed.elrafihi@crescentwealth.com.au', '0413322063', 'Mohamed Elrafihi', NULL, '', '', '', 2, '2014-04-07 04:41:30', '2014-04-07 04:41:30'),
(29, 'dancobirawan', '$2y$10$pWf2chrCLVQYGwb4Khk10ulNlxH8FOi.Cd8dSDdpTw5yhq4/sqy1W', 'dannyirawan@live.com', '61423744584', 'Danny Irawan', NULL, '', '', '', 2, '2014-04-11 14:27:02', '2014-04-11 14:27:02'),
(30, 'carloshalim', '$2y$10$UVVTuqbkE3PzWk2/qoeTSeSKr.B4I2jkyDlJ9kNA1ASeOLRdhcS8i', 'carlos@saleaseproperty.com.au', '0430883963', 'Carlos Halim', NULL, '', '', '', 3, '2014-04-14 16:30:25', '2014-04-14 16:30:25'),
(31, 'carpinteyroldg', '$2y$10$cURHeXYQ3aDch4HELADl6O6SsGJAl6ItjnnHVnZ8Z5MsBHt6stwSa', 'ldiabdn@hotmail.com', '123456', 'carpinteyroldg', NULL, '', '', '', 3, '2014-04-27 17:24:48', '2014-04-27 17:24:48'),
(32, 'Jeagubqag', '$2y$10$RWQHlF8e.6x3eUBbzPgnSuOhsruJEpY2uvsdwOMx4lb1G8rFBM5rq', 'AntonHealysy@aol.com', '123456', 'Jeagubqag', NULL, '', '', '', 4, '2014-05-24 23:06:40', '2014-05-24 23:06:40'),
(33, 'Ftvoicfop', '$2y$10$y84bmnNAJX8GKEaJMrHtW.UzkggM1ZYJU2aMik8cwPeA1y8vlwrEO', 'JayGilchristgog@aol.com', '123456', 'Ftvoicfop', NULL, '', '', '', 3, '2014-05-25 07:24:01', '2014-05-25 07:24:01'),
(34, 'Cvckbwyvq', '$2y$10$3Yqkkbru5GCgc3E12rDxc.6ySReWxXAk9WTLZtbqnWXuHqVXyyZd.', 'SharonMobbsek@aol.com', '123456', 'Cvckbwyvq', NULL, '', '', '', 4, '2014-05-26 00:45:24', '2014-05-26 00:45:24'),
(35, 'Nybtgzicc', '$2y$10$cKMbfIq9bVK3Cd/w7nQ3Re3ev8FfTW9FEJoQmQti5gGMw2RMwzuUS', 'SamBettsvab@aol.com', '123456', 'Nybtgzicc', NULL, '', '', '', 3, '2014-05-26 03:29:04', '2014-05-26 03:29:04'),
(36, 'Pnrzvsyup', '$2y$10$q6HWiqwvvVR7eqIT8Nu6OOhsAIQbT5ABq5Gdv3ft2/.MVf5OrOvcS', 'JemaSymonsvve@aol.com', '123456', 'Pnrzvsyup', NULL, '', '', '', 3, '2014-05-26 09:30:28', '2014-05-26 09:30:28'),
(37, 'Gvvpgfvjg', '$2y$10$WsQOrgDUAB5dDC4YBPfd5e1lVPDN227G99jXGX15aPgvolizBiOsa', 'kicuaj@gmail.com', '123456', 'Gvvpgfvjg', NULL, '', '', '', 3, '2014-05-28 12:07:21', '2014-05-28 12:07:21'),
(38, 'Maya', '$2y$10$crjGBSgWqp1XVJTDfGeY4uz28nI7rzmUhxSACVmVkh8/pgFucKBVC', 'maya_sagie@yahoo.com', '', 'Maya Sukasah Bulmer', '0', 'Melbourne', 'Currently looking for employment.\r\nQualifications:\r\nMasters of International Business & Masters of Commerce specializing in International Trade and Business Marketing \r\n', '', 2, '2014-06-23 20:32:28', '2014-06-23 20:44:43'),
(39, 'carpinteyrooum', '$2y$10$prsJfxVxmVyr7lsKC..nH.abZyVLqa8YzVKbhs2B10dVDloo.QVzq', 'lin31030598@163.com', '123456', 'carpinteyrooum', NULL, '', '', '', 4, '2014-07-05 02:51:07', '2014-07-05 02:51:07'),
(40, 'Aliximpam', '$2y$10$tzAbINcwGI0O8AgV0Z5g3erd4Ccnfs0.5Pv99E2RVYdO/1d9uOzHm', 'AliximpamN@blog-1.ru', '123456', 'Aliximpam', NULL, '', '', '', 3, '2014-07-18 06:28:13', '2014-07-18 06:28:13'),
(41, 'Aliximpam', '$2y$10$oPuTxPvtwKqfND1OvAuTOuAEqQYh24TjLvg/CAJjQKFkz6jzyOg5O', 'AliximpamN@blog-1.ru', '123456', 'Aliximpam', NULL, '', '', '', 3, '2014-08-08 00:01:35', '2014-08-08 00:01:35'),
(42, 'testing', '$2y$10$kAIaPHFSTcRiOpdA3kKorO9Cu3YzlGcFnUz4r6KrCvC5IxF/0zyba', 'admin@ibcm.org.au', '0401941294', 'Testing', NULL, '', '', '', 4, '2014-08-13 11:39:14', '2014-08-13 11:39:14'),
(43, 'Robertpoem', '$2y$10$Pqp9Zd0UUngYUbBaIDzaoejzrpc6Vrg8lWoyfRKZlk7xJacjpbTFe', 'ucgmc7c9@gmail.com', '123456', 'Robertpoem', NULL, '', '', '', 4, '2014-08-25 19:08:39', '2014-08-25 19:08:39'),
(44, 'jtanean', '$2y$10$aCKsFQQtFTMh85wXPNsygeyHdfwjW7VyFIF30nwf08Zj2QGlDw.DG', 'chowen317jo@hotmail.com', '0413493781', 'Jonathan Tanean', '1', 'Melbourne CBD', 'A University of Melbourne student undertaking accounting and finance. Graduating in 2015', '', 4, '2014-08-26 23:05:29', '2014-08-26 23:40:20'),
(45, 'Aliximpam', '$2y$10$no6Y3UacHTY1bThYzRHxXeBIkQDcTPoDnK5Qljf77ywp/cN3JoqhS', 'AliximpamN@blog-1.ru', '123456', 'Aliximpam', NULL, '', '', '', 3, '2014-08-29 03:50:53', '2014-08-29 03:50:53'),
(46, 'melbournehenna', '$2y$10$fyja9YyLqEPpHOFKqoLuPeRY4Z7kVoiPL6QhhRSBjQ6eXlq73i7UO', 'melbourneheena@gmail.com', '03 94490720', 'Supreet Tuteja', NULL, '', '', '', 2, '2014-09-11 10:16:24', '2014-09-11 10:16:24'),
(47, 'Alfredosog', '$2y$10$QTN9U.A43j9NfHVThwJes.EyCtgVZcagldYY.b4HOhOBQ/gzyDkh6', 'annettarow@gmail.com', '123456', 'Alfredosog', NULL, '', '', '', 3, '2014-09-17 12:23:08', '2014-09-17 12:23:08'),
(48, 'AngelaGib', '$2y$10$yeAkPIg26uUPCPdy4Cem8uId5d9bP61Ix0kaX5umMWAxkF5Nl/nza', 'AngelaGib@host15.ru', '123456', 'AngelaGib', NULL, '', '', '', 3, '2014-09-18 21:15:31', '2014-09-18 21:15:31'),
(49, 'kevin', '$2y$10$Kc.4G/gJNu/3hcvVA0d8reFIfAI/FN7GKRD/5XQ3b9im8UFs0jB02', 'kevinedward92@yahoo.com.au', '0420567831', 'kevin', NULL, '', '', '', 4, '2014-09-24 00:10:38', '2014-09-24 00:10:38'),
(50, 'olym', '$2y$10$uBBdzBmMVp/9V7NiIvRY7.xlCRFvwqWZK9ZDCU7uXozuB8RFsRJHi', 'olympia.lrs@gmail.com', '61451532010', 'Olym', NULL, '', '', '', 4, '2014-10-02 15:12:34', '2014-10-02 15:14:11'),
(51, 'Timothyst', '$2y$10$hXDWID2R9myxubYnXCvekO8g4VovLuxQ5zpHvSMaHFQ1XibLQA0B6', 'scottlwentwort@outlook.com', '123456', 'Timothyst', NULL, '', '', '', 4, '2014-10-02 15:18:37', '2014-10-02 15:18:37'),
(52, 'StevenJingga', '$2y$10$LtuGFiRuSKRnuxhKYJhbfOfS7OBnosewzoWJ9v9JAfLsNod5jJabS', '1761048@student.swin.edu.au', '0411393769', 'Steven Jingga', NULL, '', '', '', 4, '2014-10-03 05:22:03', '2014-10-03 05:22:03'),
(53, 'Albertgymn', '$2y$10$hxOgvfyFaZ2gNchrltiQ2uqjsUMY8S6H1A2xSc8CjBhE/0rrMw/rq', 'green@playtester.biz', '123456', 'Albertgymn', NULL, '', '', '', 4, '2014-10-07 06:10:41', '2014-10-07 06:10:41'),
(54, 'Michaelsn', '$2y$10$hBPZDKhuRR.5gF.hYTI4X.7aBElsrUqumRzjOWIJAtwZKYx/CXKiq', 'Michaelsn@mail54.blog-1.ru', '123456', 'Michaelsn', NULL, '', '', '', 2, '2014-10-13 14:14:47', '2014-10-13 14:14:47'),
(55, 'DarrenLync', '$2y$10$7KYCQV8UH3TfG.wHH8TbqO0o1mHyAhM7rcqcrzMAwxRP7ZxIxgqje', 'moldyinfra@hotmail.com', '123456', 'DarrenLync', NULL, '', '', '', 4, '2014-10-24 03:18:57', '2014-10-24 03:18:57'),
(57, 'admin', '$2y$10$4/bCXK5hLAY0O4CZGAdqIONgPWmlXE5WFMeGD5i27ge88WkDDJg0a', 'webmaster@ibcm.org.au', '0401941294', 'Webmaster', NULL, '', '', '', 1, '2014-10-25 10:21:52', '2014-10-25 10:21:52'),
(58, 'esaputra', '$2y$10$iieG6mP6EtGSwSjh8Y1dq.k/JRNTiRpYBRHQaGCg/o5OgdbjkLPgi', 'edinacecilia@gmail.com', '0430101722', 'Edina Saputra', NULL, '', '', '', 2, '2014-10-26 13:01:50', '2014-10-26 13:01:50'),
(59, 'AngelaAng', '$2y$10$3RYPJCDg7I/kpwUt4nE8Lux/K3brrxGm3pr.f1zqv1vCwvZhev6fq', 'angela.ang@nab.com.au', '0410892970', 'Angela Ang', NULL, '', '', '', 2, '2014-10-26 13:03:38', '2014-10-26 13:03:38'),
(60, 'Oline', '$2y$10$PXXiiHR5K56xScy9hO8OTuNCGanMT3nScVmHYmyqa0C6uIDyjsCmy', 'Oline98@hotmail.com', '', 'Caroline', '0', '', '', '', 2, '2014-11-02 14:47:06', '2014-11-02 14:50:53'),
(61, 'brigitavin', '$2y$10$99BvLLhInSalesS62Qh88ulKTJfRwPZYAO29q7Z7dTmEhBf4uxWaW', 'brigita.dianza@gmail.com', '+61451012350', 'Brigita Dianza', NULL, '', '', '', 4, '2014-11-13 15:29:05', '2014-11-13 15:29:05'),
(62, 'Franciscib', '$2y$10$mY6cZzEQVHnkQP6Q1ABJEOCd464mwYQPhEkiSN3da5g7CiFNvcMfi', 'zyvox@playtester.biz', '123456', 'Franciscib', NULL, '', '', '', 3, '2014-11-14 12:27:25', '2014-11-14 12:27:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
