-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2014 at 02:12 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_ibc_members`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `email`, `phone`, `website`, `street`, `suburb`, `state`, `postcode`, `twitter`, `facebook`, `abn`, `created_at`, `updated_at`) VALUES
(1, 'Elmtree Computers', 'Raspberry Pi, open-source, and Linux specialist. Supplying hardware, software, and systems solutions', 'business@elmtreecomputers.com.au', '98079735', 'www.elmtreecomputers.com.au', '30 Elmtree Tce', 'Chadstone', 'VIC', 3148, '', '', '1234 5678 8765', '2014-01-26 16:35:29', '2014-01-26 22:10:43'),
(4, 'Xynergy', 'This is a property investment consultant', '', '', '', '', 'South yarra', 'VIC', 3145, '', '', '', '2014-01-30 02:55:38', '2014-02-02 01:41:01'),
(23, 'warkop', 'dki', '', '', '', '', '', 'DKI Jakarta', 12560, '', '', '', '2014-01-30 05:57:38', '2014-02-01 21:24:30'),
(24, 'DNP Web Design', 'We build websites for you.', '', '', 'http://www.dnpwebdesign.com', '', '', 'Jakarta', 0, '', '', '', '2014-01-31 03:19:01', '2014-01-31 03:19:01'),
(25, 'Kabo Lawyer', 'We migrate you', '', '', 'http://www.kabolawyer.com.au', '', 'Melbourne', 'VIC', 0, '', '', '', '2014-02-01 16:36:58', '2014-02-02 01:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `members_businesses`
--

CREATE TABLE IF NOT EXISTS `members_businesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_owner` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `members_businesses`
--

INSERT INTO `members_businesses` (`id`, `business_id`, `member_id`, `is_owner`, `role`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, 'Director', '2014-01-26 16:46:09', '0000-00-00 00:00:00'),
(23, '24', '1', 0, '', '2014-02-01 16:23:16', '2014-02-01 16:23:16'),
(24, '24', '1', 0, '', '2014-02-01 16:23:35', '2014-02-01 16:23:35'),
(32, '6', '18', 0, 'Advisor', '2014-02-01 16:40:30', '2014-02-01 16:40:30'),
(50, '4', '4', 0, 'advisor', '2014-02-02 01:41:10', '2014-02-02 01:41:10'),
(51, '25', '4', 0, 'lawyer', '2014-02-02 01:42:10', '2014-02-02 01:42:10'),
(55, '24', '18', 0, '', '2014-02-09 04:34:49', '2014-02-09 04:34:49'),
(56, '25', '18', 0, '', '2014-02-09 04:34:52', '2014-02-09 04:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

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
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fees` double NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `fees`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'professional', 55, 'those who work as employee of a company or professional field like doctor', '0000-00-00 00:00:00', '2014-02-01 21:04:18'),
(3, 'Entrepreneur', 55, 'Pengusaha', '2014-01-29 03:35:49', '2014-01-29 03:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `name`, `gender`, `location`, `bio`, `photo`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'johndoe', '$2y$10$wjkgYxjQGzrYVbHTRFOCeO/1qtyuPdoJvg5YlFPSmaKBGROqJcNyG', 'johndoe@gmail.com', '123456', 'John Doe', '0', '', '', '', 1, '2013-06-06 22:13:28', '2014-01-30 01:25:50'),
(2, 'amyga', '$2y$10$jD6loTwsFa0OyN6o70QxSeH83eCYWzgNBJzI8INbioKqAsOpgj2lu', 'amy@outlook.com', '1234567', 'amy deg', '', '', 'I am a keen student, looking for work', '', 1, '2013-06-06 22:14:49', '2014-01-30 00:57:21'),
(5, 'dono', '$2y$10$Zp2/vynQjVhAVv1CCgo3FOCrP1L0QeIfi3gnyA0YB.I.A1VfR9MWq', 'dono@warkop.com', '', 'dono kasino', '1', '', '', '', 2, '2014-01-25 01:20:12', '2014-02-01 22:56:17'),
(6, 'kasino', 'kasino', 'kasino@warkop.com', '12345', 'kasino', '0', '', '', '', 1, '2014-01-25 01:20:33', '2014-01-29 00:09:42'),
(8, 'loreal', '', 'loreal@ibcm.org.au', '1234', 'loreal', '0', '', '', '', 0, '2014-01-25 01:35:43', '2014-01-25 01:35:43'),
(10, 'rama', '', 'rama@ramayana.com', '1234', 'Rama', '0', '', '', '', 1, '2014-01-25 15:58:00', '2014-01-25 15:58:00'),
(12, 'pratyadi', 'monash32', 'dipto@ibcm.org.au', '0401941294', 'Dipto Pratyaksa', '0', '', '', '', 1, '2014-01-29 03:26:32', '2014-01-29 03:26:32'),
(13, 'pratyadi', '$2y$10$GB7ExbZOb0wNMTjGFQlAgOIGkuZ901iQvC8bsOA9lVcMbGjMeTSpW', 'dipto2@ibcm.org.au', '0401941294', 'Dipto Pratyaksa', '0', '', '', 'pratyadi.jpg', 2, '2014-01-29 03:27:26', '2014-02-11 02:02:25'),
(15, 'dino', '', 'dino@dino.com', '0401941294', 'dino', '1', '', '', '', 3, '2014-01-29 04:26:46', '2014-01-29 04:26:46'),
(16, 'pratyadi', '4859dp', 'pratyadi@yahoo.com', '', 'pratyadi', '0', '', '', '', 1, '2014-01-29 04:33:25', '2014-01-29 04:33:25'),
(17, 'lydia', '123456', 'lydiawati@gmail.com', '', 'lydia', '0', '', '', '', 1, '2014-01-29 04:35:34', '2014-01-29 04:35:34'),
(19, 'konfir', '$2y$10$qvPNA4SqSCK6SSWc0WWkzuY6ytAnjuPY4WZdVSEWxLFEXvzXVIC5q', 'konfir@kabo.com', '', 'Konfir', '1', '', '', 'konfir.jpg', 3, '2014-02-11 01:57:52', '2014-02-12 00:40:29'),
(20, 'mayshaau', '$2y$10$kTUoQk8pdVuTARQEpKRPveDhe9uOXIeyq9r4EtCt9bcljmH6RQ8fO', 'mayshaau@gmail.com', '0449911044', 'maysha', NULL, '', '', '', 2, '2014-02-12 22:06:16', '2014-02-12 22:06:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
