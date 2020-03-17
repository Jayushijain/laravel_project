-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2020 at 12:49 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `icon`, `slug`, `updated_at`, `created_at`) VALUES
(1, 'Television', 'fas fa-tv', 'television', '2020-03-13 06:11:46', '0000-00-00 00:00:00'),
(2, 'Outdoor Seating', 'fas fa-tree', 'outdoor-seating', '2020-03-13 06:11:46', '0000-00-00 00:00:00'),
(3, 'cycling', 'fas fa-bicycle', 'cycling', '2020-03-13 01:17:34', '2020-03-13 00:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `beauty_services`
--

DROP TABLE IF EXISTS `beauty_services`;
CREATE TABLE IF NOT EXISTS `beauty_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `service_times` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beauty_services`
--

INSERT INTO `beauty_services` (`id`, `listing_id`, `name`, `price`, `service_times`, `photo`) VALUES
(1, 2, 'Facial', 20, '10:00,08:00,2', '3672527b3419f6e8cb2fa8e19561329f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `additional_information` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listing_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `requester_id`, `listing_id`, `booking_date`, `additional_information`, `created_at`, `listing_type`, `status`) VALUES
(1, 3, 1, 1, '2020-03-05', '{\"adult_guests\":\"2\",\"child_guests\":\"0\",\"time\":\"dinner\"}', '1583346600', 'restaurant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT 0,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `icon_class`, `thumbnail`, `slug`, `updated_at`, `created_at`) VALUES
(1, 0, 'Restaurants', 'fas fa-utensils', 'aa0812f03c7ffba5b641fc516a6c4b8d.jpg', 'restaurant', '2020-03-11 04:07:04', NULL),
(2, 0, 'Shopping', 'fas fa-shopping-cart', 'shopping956.jpg', 'shopping', '2020-03-11 04:14:08', NULL),
(3, 1, 'Cafes', 'fas fa-coffee', NULL, 'cafe', '2020-03-11 23:59:30', NULL),
(4, 0, 'Salon', 'fab fa-stripe-s', '84f71337b3d8bbff42e1f48745dafe92.jpg', 'salon', NULL, NULL),
(6, 0, 'theatre', 'fas fa-film', 'th121.jpg', 'theatre', '2020-03-11 00:45:23', '2020-03-11 00:45:23'),
(8, 7, 'mobile shops', 'fas fa-mobile-alt', NULL, 'mobile-shops', '2020-03-11 00:59:04', '2020-03-11 00:59:04'),
(12, 0, '%^&', 'fab fa-500px', 'thumbnail.png', '', '2020-03-12 01:08:20', '2020-03-12 01:08:20'),
(13, 0, NULL, 'fab fa-accessible-icon', 'thumbnail.png', NULL, '2020-03-12 01:09:45', '2020-03-12 01:09:45'),
(14, 4, 'barber', 'fab fa-500px', NULL, 'gfhgk', '2020-03-12 22:40:20', '2020-03-12 22:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `slug`, `updated_at`, `created_at`) VALUES
(1, 73, 'Paris', 'paris', '2020-03-13 07:09:20', '0000-00-00 00:00:00'),
(2, 98, 'Surat', 'surat', '2020-03-13 07:09:20', '0000-00-00 00:00:00'),
(3, 98, 'mumbai', 'mumbai', '2020-03-13 05:40:44', '2020-03-13 05:40:44'),
(4, 98, 'jodhpur', 'jodhpur', '2020-03-13 05:53:01', '2020-03-13 05:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2g77i55p7idankq357t69o3g1jbi2b29', '::1', 1583381673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338313637333b),
('eudhj4n29gkkcej6ts2rkcjb7sccavgh', '::1', 1583382120, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338323132303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('rum3jrriepslcndadjmga93avad7cits', '::1', 1583382426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338323432363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('goglsodl05nbstgvophkj9d8i085rkgq', '::1', 1583382758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338323735383b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('4r7ojugks3uf2grmkqf6ramhmh8i9sv4', '::1', 1583383217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338333231373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('oldufjfnsueqcchfpm8stek6e19l2du8', '::1', 1583383624, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338333632343b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('6aa9ral8jaqlo0d6ukska5ehj778jgpm', '::1', 1583384052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338343035323b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a31303a2243697479204164646564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('2hdrgj45llcvq0jm1d4nv94lnc24mbg9', '::1', 1583384647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338343634373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('ab8ljg7na83gmo4a7l3btvtfc1ci1n7m', '::1', 1583384961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338343936313b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('dq8m0nfp73ur0dd89hl40c3m8uakdupg', '::1', 1583385262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338353236323b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('bbkr0ddjrt41ero3fn5nsrnl7g7fovs1', '::1', 1583385660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338353636303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b757365725f6c6f67696e7c733a313a2231223b),
('g0gku11m88b40heb97stk7me066a3f87', '::1', 1583386165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338363136353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('e5rf07gsgrrvdmtk6ml2d15ve9m4j90p', '::1', 1583386565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338363536353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('2i18oq7amdqd4efl2372ineatvo7ak3u', '::1', 1583386509, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338363530393b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('k9fenk2180gsd1hf294msnu6b3nrkn65', '::1', 1583387598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338373539383b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('fojippnk2oeppkspdoa089mle3lu6qmj', '::1', 1583386912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338363931323b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('ok84bhpm48gjm35b1c6ombq4n3g4h4o3', '::1', 1583387224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338373232343b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('56kr9uvpsid6qljm85k5silooeauteuo', '::1', 1583387647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338373634373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('ebq88ulevpu1ljoghs8ni3ski86njsdd', '::1', 1583389375, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338393337353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('rokj7o76fsp34cqehc2nnqaee7avtv71', '::1', 1583388407, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338383430373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('jdeq1iuovej379muq442h179rrarsq6j', '::1', 1583388764, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338383736343b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('4peh4uv4ggi02uhdpbo0heqv2migjfad', '::1', 1583389226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338393232363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('dmlgm4l3mblnsa1j7v7cm6t9vehk35b6', '::1', 1583389737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338393733373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('lmj0aofb3dnv0ec3altf64vgf1mmhlgc', '::1', 1583389894, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333338393839343b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('e5klnqh8vi6kf2t5uummdl195mk07fqr', '::1', 1583390250, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339303235303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('hvi64jv8e66jup164d2ihkr1niulceje', '::1', 1583392866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339323836363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('v9jrrg87jske2f8qc0auoje8qthvteuk', '::1', 1583390556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339303535363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a31353a224c697374696e672055706461746564223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('bcnougttp3870f677b3i1qo2gqc2kuju', '::1', 1583390916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339303931363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('4c8q7d66k7gd210n0q7qajsbrnauin01', '::1', 1583391407, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339313430373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('9ntvfjnmfpo7qk5l45nhis9m3sjngtvt', '::1', 1583392178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339323137383b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('0fl2njrp8mmh0ecglefdcinvfuubjnos', '::1', 1583392852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339323835323b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('92aqlvordf6hg2sh5uhq4jdlf8hgo9i8', '::1', 1583393363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339333336333b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('h319aad75mefq2dpdt9q8tmqf21cjt07', '::1', 1583393180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339333138303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32353a22557365722055706461746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('55ie3ms3od6scl3eu8gta33nr6l47209', '::1', 1583397785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339373738353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2232223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32353a22557365722055706461746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('8167ar9m8kn83fab1p36c687k9l8boep', '::1', 1583398390, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339383339303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('93qufog5l4cn2sn7v3qm5384lss9picf', '::1', 1583399191, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339393139313b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a22536f7572616268206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('6sqmjoecjdk46l78ocq61mhr2j55g5s8', '::1', 1583398194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339383139333b),
('j53nkbh1c76cc64l5j73r8f4399aae6a', '::1', 1583398696, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339383639363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('o0ptu1kh1ufgjah9ue3elqituj02emi4', '::1', 1583399034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339393033343b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('v9kenugslikoe0lk53asveblj5ursmcv', '::1', 1583399406, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339393430363b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('lum6cei8p81o3uu0tpp7eoqq0dtg1vcu', '::1', 1583399587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333339393538373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a22536f7572616268206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('5kq5j80mr99cla6tfflue9d197imh40i', '::1', 1583404343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430343334333b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32373a22436c61696d20417070726f766564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('h02jhtne58u5eb2rhfer8ean7a5jn4eq', '::1', 1583405033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430353033333b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2232223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a226a617975736869206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('cv90na5sfbrp0s5eb9bl49uffqhkj6nl', '::1', 1583404805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430343830353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('c72qt8bjs7u6nrcflticrmo6na00596u', '::1', 1583406409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430363430393b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('p4otrjaek2c08uhki97vhnh71csuet7k', '::1', 1583406957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430363935373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a22536f7572616268206a61696e223b757365725f6c6f67696e7c733a313a2231223b666c6173685f6d6573736167657c733a32373a225265766965772055706461746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d),
('abh2cmntsl9dbftkuqs3u8ei017oloq6', '::1', 1583406801, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430363830313b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('nvteee8recennfloaffe0u7rskab194p', '::1', 1583408831, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430383833313b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('mcs8clrr9rj9i42n22e7j52slq9fns08', '::1', 1583411690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431313639303b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2233223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31323a22536f7572616268206a61696e223b757365725f6c6f67696e7c733a313a2231223b),
('99kqjrb44dth8sk0eoi55hetc8a8g13e', '::1', 1583409271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430393237313b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('os4kpj12mgq5giitv6ijltr6bj644tk4', '::1', 1583409675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333430393637353b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('pll9ov5214ergdmnl7nq64ur223s4smc', '::1', 1583410127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431303132373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('ern22s0lbnhpdeg8a22rsq4t460n7kq3', '::1', 1583410558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431303535383b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('d6ut1akeq90k42t1buveo7l1ahmt86l7', '::1', 1583411162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431313136323b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('plgabs3oatnourvcteg4mnc6mcr0hhot', '::1', 1583411677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431313637373b69735f6c6f676765645f696e7c693a313b757365725f69647c733a313a2231223b726f6c655f69647c733a313a2231223b726f6c657c733a353a2241646d696e223b6e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b),
('ogapu7escethk5pu8bg8en651ivcndv3', '::1', 1583411677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431313637373b),
('4kek915b5dvkbsd0p25ufnl6rp2kd7er', '::1', 1583411692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431313639303b),
('ukc2ktgk6256dc8f3ffqm1sud5fnidja', '::1', 1583467372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333436373337323b),
('ooi6901hjsa6u4memgfh8ncacf2dm4k5', '::1', 1583471252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333437313235323b),
('9ing57ltfon59pqdbui5ingtor5k47b5', '::1', 1583471621, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333437313632313b),
('ik2u65kfmqs4ok2ksnig3qppnuvd2jum', '::1', 1583471621, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333437313632313b);

-- --------------------------------------------------------

--
-- Table structure for table `claimed_listings`
--

DROP TABLE IF EXISTS `claimed_listings`;
CREATE TABLE IF NOT EXISTS `claimed_listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_information` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `claimed_listings`
--

INSERT INTO `claimed_listings` (`id`, `listing_id`, `user_id`, `full_name`, `phone`, `additional_information`, `status`) VALUES
(1, 1, 3, 'sourabh jain', '123456788787', 'i am myself a big proof', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dial_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN'),
(2, 'Aland Islands', 'AX', '+358', '', '', ''),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL'),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD'),
(5, 'AmericanSamoa', 'AS', '+1684', '', '', ''),
(6, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR'),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA'),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD'),
(9, 'Antarctica', 'AQ', '+672', '', '', ''),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD'),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS'),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD'),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG'),
(14, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD'),
(15, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR'),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN'),
(17, 'Bahamas', 'BS', '+1242', '', '', ''),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD'),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT'),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD'),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR'),
(22, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR'),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD'),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF'),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD'),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN'),
(27, 'Bolivia, Plurination', 'BO', '+591', '', '', ''),
(28, 'Bosnia and Herzegovi', 'BA', '+387', '', '', ''),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP'),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL'),
(31, 'British Indian Ocean', 'IO', '+246', '', '', ''),
(32, 'Brunei Darussalam', 'BN', '+673', '', '', ''),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN'),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF'),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF'),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR'),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF'),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD'),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE'),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD'),
(41, 'Central African Repu', 'CF', '+236', '', '', ''),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF'),
(43, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP'),
(44, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY'),
(45, 'Christmas Island', 'CX', '+61', '', '', ''),
(46, 'Cocos (Keeling) Isla', 'CC', '+61', '', '', ''),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP'),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF'),
(49, 'Congo', 'CG', '+242', '', '', ''),
(50, 'Congo, The Democrati', 'CD', '+243', '', '', ''),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD'),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC'),
(53, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF'),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK'),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC'),
(56, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR'),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK'),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK'),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF'),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD'),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP'),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD'),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP'),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF'),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN'),
(67, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR'),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB'),
(69, 'Falkland Islands (Ma', 'FK', '+500', '', '', ''),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK'),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD'),
(72, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR'),
(73, 'France', 'FR', '+33', 'Euro', '€', 'EUR'),
(74, 'French Guiana', 'GF', '+594', '', '', ''),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF'),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF'),
(77, 'Gambia', 'GM', '+220', '', '', ''),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL'),
(79, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR'),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS'),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP'),
(82, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR'),
(83, 'Greenland', 'GL', '+299', '', '', ''),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD'),
(85, 'Guadeloupe', 'GP', '+590', '', '', ''),
(86, 'Guam', 'GU', '+1671', '', '', ''),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ'),
(88, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP'),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF'),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF'),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD'),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG'),
(93, 'Holy See (Vatican Ci', 'VA', '+379', '', '', ''),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL'),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD'),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF'),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK'),
(98, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR'),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR'),
(100, 'Iran, Islamic Republ', 'IR', '+98', '', '', ''),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD'),
(102, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR'),
(103, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP'),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS'),
(105, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR'),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD'),
(107, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY'),
(108, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP'),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD'),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT'),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES'),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD'),
(113, 'Korea, Democratic Pe', 'KP', '+850', '', '', ''),
(114, 'Korea, Republic of S', 'KR', '+82', '', '', ''),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD'),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS'),
(117, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK'),
(118, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR'),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP'),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL'),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD'),
(122, 'Libyan Arab Jamahiri', 'LY', '+218', '', '', ''),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF'),
(124, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR'),
(125, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR'),
(126, 'Macao', 'MO', '+853', '', '', ''),
(127, 'Macedonia', 'MK', '+389', '', '', ''),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA'),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK'),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR'),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR'),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF'),
(133, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR'),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD'),
(135, 'Martinique', 'MQ', '+596', '', '', ''),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO'),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR'),
(138, 'Mayotte', 'YT', '+262', '', '', ''),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN'),
(140, 'Micronesia, Federate', 'FM', '+691', '', '', ''),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL'),
(142, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR'),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT'),
(144, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR'),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD'),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD'),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN'),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK'),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD'),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD'),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR'),
(152, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR'),
(153, 'Netherlands Antilles', 'AN', '+599', '', '', ''),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF'),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD'),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO'),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF'),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN'),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD'),
(160, 'Norfolk Island', 'NF', '+672', '', '', ''),
(161, 'Northern Mariana Isl', 'MP', '+1670', '', '', ''),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK'),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR'),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR'),
(165, 'Palau', 'PW', '+680', 'Palauan dollar', '$', ''),
(166, 'Palestinian Territor', 'PS', '+970', '', '', ''),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB'),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK'),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG'),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN'),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP'),
(172, 'Pitcairn', 'PN', '+872', '', '', ''),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN'),
(174, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR'),
(175, 'Puerto Rico', 'PR', '+1939', '', '', ''),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR'),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON'),
(178, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB'),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF'),
(180, 'Reunion', 'RE', '+262', '', '', ''),
(181, 'Saint Barthelemy', 'BL', '+590', '', '', ''),
(182, 'Saint Helena, Ascens', 'SH', '+290', '', '', ''),
(183, 'Saint Kitts and Nevi', 'KN', '+1869', '', '', ''),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD'),
(185, 'Saint Martin', 'MF', '+590', '', '', ''),
(186, 'Saint Pierre and Miq', 'PM', '+508', '', '', ''),
(187, 'Saint Vincent and th', 'VC', '+1784', '', '', ''),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST'),
(189, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR'),
(190, 'Sao Tome and Princip', 'ST', '+239', '', '', ''),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR'),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF'),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD'),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR'),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL'),
(196, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND'),
(197, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR'),
(198, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR'),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD'),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS'),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR'),
(202, 'South Georgia and th', 'GS', '+500', '', '', ''),
(203, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR'),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR'),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG'),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD'),
(207, 'Svalbard and Jan May', 'SJ', '+47', '', '', ''),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL'),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK'),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF'),
(211, 'Syrian Arab Republic', 'SY', '+963', '', '', ''),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD'),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS'),
(214, 'Tanzania, United Rep', 'TZ', '+255', '', '', ''),
(215, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB'),
(216, 'Timor-Leste', 'TL', '+670', '', '', ''),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF'),
(218, 'Tokelau', 'TK', '+690', '', '', ''),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP'),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD'),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND'),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY'),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT'),
(224, 'Turks and Caicos Isl', 'TC', '+1649', '', '', ''),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD'),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX'),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH'),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED'),
(229, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP'),
(230, 'United States', 'US', '+1', 'United States dollar', '$', 'USD'),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU'),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS'),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV'),
(234, 'Venezuela, Bolivaria', 'VE', '+58', '', '', ''),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND'),
(236, 'Virgin Islands, Brit', 'VG', '+1284', '', '', ''),
(237, 'Virgin Islands, U.S.', 'VI', '+1340', '', '', ''),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF'),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER'),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW'),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_supported` int(11) NOT NULL DEFAULT 0,
  `stripe_supported` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', 'Rp', 1, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 0, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_menus`
--

DROP TABLE IF EXISTS `food_menus`;
CREATE TABLE IF NOT EXISTS `food_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_menus`
--

INSERT INTO `food_menus` (`id`, `listing_id`, `name`, `price`, `items`, `photo`) VALUES
(1, 1, 'Brownie', '15', 'WalnutBrownie,OreoBrownie', '91850ddbe51513650aa5e757cbb7ba2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

DROP TABLE IF EXISTS `frontend_settings`;
CREATE TABLE IF NOT EXISTS `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `type`, `description`) VALUES
(1, 'banner_title', 'Atlas Directory Listing'),
(2, 'banner_sub_title', 'Subtitle Of Atlas Directory Listing'),
(3, 'about_us', '<p><strong>About us</strong></p>\r\n'),
(4, 'terms_and_condition', '<p>﻿<strong>Terms and conditions:</strong></p>\r\n\r\n<p><strong>-Customer satisfaction</strong></p>\r\n'),
(5, 'privacy_policy', '<p><strong>Privacy Poilicy</strong></p>\r\n'),
(6, 'social_links', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"google\":\"\",\"instagram\":\"\",\"pinterest\":\"\"}'),
(7, 'slogan', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(8, 'faq', '<p><strong>Faq</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_specifications`
--

DROP TABLE IF EXISTS `hotel_room_specifications`;
CREATE TABLE IF NOT EXISTS `hotel_room_specifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_specifications`
--

INSERT INTO `hotel_room_specifications` (`id`, `listing_id`, `name`, `description`, `price`, `amenities`, `photo`) VALUES
(1, 3, 'Deluxe', 'Best of all rooms', '100', 'televison,jacuzzi', 'be9b7c24c12f633e2a05a8c6d0b706c9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
CREATE TABLE IF NOT EXISTS `listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `google_analytics_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `categories` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photos` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `website` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `social` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` decimal(65,10) DEFAULT NULL,
  `longitude` decimal(65,10) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `listing_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_tags` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_featured` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `city_id`, `country_id`, `google_analytics_id`, `code`, `name`, `description`, `categories`, `amenities`, `photos`, `video_url`, `video_provider`, `tags`, `address`, `email`, `phone`, `website`, `social`, `latitude`, `longitude`, `status`, `listing_type`, `listing_thumbnail`, `listing_cover`, `seo_meta_tags`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 73, '', '51b58e6f1253d12cfb6c6af4b20be465', 'Cafe Red', 'Wonderful cafe to spend quality time with your loved ones.', '[\"3\",\"1\"]', '[\"1\",\"2\"]', '[\"b1993e07453bac5a94bba5d55d78600f.jpg\",\"0d88c1e1d0f8c059e0bc028ab503b1fd.jpg\"]', '', 'youtube', 'cafe', 'cia lato', 'CafeRed@email.com', 1234567890, 'CafeRed.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '21.0000000000', '72.8311000000', 'active', 'restaurant', '762972b95980b09cf8071327a5777f10.jpg', '7507013ca53314fd4e50f5963320c12d.jpg', '', 1, '2020-03-06 07:18:46', '0000-00-00 00:00:00'),
(2, 1, 2, 98, '', 'a4fd1eee2c30051f3f535f6067265304', 'Jawed Habib', 'Best salon', '[\"4\"]', '[\"1\"]', '[\"a540cbdfa9d06643416e9df71ea38ef1.jpg\"]', '', 'youtube', '', 'Pipload', 'jh@gmail.com', 1234567890, 'jawed.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '21.0000000000', '72.8311000000', 'inactive', 'beauty', 'e2099c94918408b5867305b705eb537a.jpg', '2c50ceffba3e3697f3c9c08ce85d3be1.jpg', '', 1, '2020-03-09 09:33:26', '0000-00-00 00:00:00'),
(3, 1, 2, 98, '', '5606cb86ba8841b476fa93c2df851434', 'Hotel Taj', '', '[\"5\"]', '[\"1\",\"2\"]', '[\"8ca604f0c26e75e482cd781d8489fd18.jpg\"]', '', 'youtube', 'hotel,hotelsurat', 'pipload', 'taj@gmail.com', 1234567890, 'xyz.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '21.0000000000', '72.8311000000', 'active', 'hotel', 'e4a5676273f06176cb0eefd6dd721571.jpg', '829c952a22ce4212ab6e5bfce9718222.jpg', 'best hotel', 0, '2020-03-06 07:18:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_type` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `validity` int(11) NOT NULL DEFAULT 0 COMMENT 'validity should be in days',
  `number_of_listings` int(3) DEFAULT NULL,
  `ability_to_add_video` int(1) NOT NULL DEFAULT 0,
  `ability_to_add_contact_form` int(1) NOT NULL DEFAULT 0,
  `number_of_photos` int(3) NOT NULL DEFAULT 0,
  `number_of_tags` int(3) NOT NULL DEFAULT 0,
  `number_of_categories` int(3) NOT NULL DEFAULT 0,
  `featured` int(1) NOT NULL DEFAULT 0,
  `is_recommended` int(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `name`, `price`, `validity`, `number_of_listings`, `ability_to_add_video`, `ability_to_add_contact_form`, `number_of_photos`, `number_of_tags`, `number_of_categories`, `featured`, `is_recommended`, `updated_at`, `created_at`) VALUES
(1, 1, 'Basic', 50, 30, 2, 0, 0, 2, 2, 2, 1, 1, '2020-03-16 04:50:17', '0000-00-00 00:00:00'),
(2, 1, 'gold', 100, 50, 10, 0, 1, 5, 10, 10, 0, 0, '2020-03-16 04:50:33', '2020-03-14 01:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_purchased_histories`
--

DROP TABLE IF EXISTS `package_purchased_histories`;
CREATE TABLE IF NOT EXISTS `package_purchased_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `amount_paid` bigint(10) DEFAULT NULL,
  `purchase_date` timestamp NULL DEFAULT NULL,
  `expired_date` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_purchased_histories`
--

INSERT INTO `package_purchased_histories` (`id`, `user_id`, `package_id`, `amount_paid`, `purchase_date`, `expired_date`, `payment_method`, `updated_at`, `created_at`) VALUES
(4, 2, 2, 100, '2020-03-16 00:33:09', '2020-05-05 00:33:09', 'cash', '2020-03-16 00:33:09', '2020-03-16 00:33:09'),
(5, 2, 2, 100, '2020-03-16 00:33:24', '2020-05-05 00:33:24', 'cash', '2020-03-16 00:33:24', '2020-03-16 00:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` bigint(10) DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reported_listings`
--

DROP TABLE IF EXISTS `reported_listings`;
CREATE TABLE IF NOT EXISTS `reported_listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL DEFAULT 0,
  `reporter_id` int(11) NOT NULL DEFAULT 0,
  `report` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reported_listings`
--

INSERT INTO `reported_listings` (`id`, `listing_id`, `reporter_id`, `report`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'I want to report this place!!!', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `review_comment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_rating` int(1) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `listing_id`, `reviewer_id`, `review_comment`, `review_rating`, `timestamp`) VALUES
(1, 1, 3, 'must try..!!!', 4, 1583346600);

-- --------------------------------------------------------

--
-- Table structure for table `review_wise_qualities`
--

DROP TABLE IF EXISTS `review_wise_qualities`;
CREATE TABLE IF NOT EXISTS `review_wise_qualities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_from` float DEFAULT NULL,
  `rating_to` float DEFAULT NULL,
  `quality` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_wise_qualities`
--

INSERT INTO `review_wise_qualities` (`id`, `rating_from`, `rating_to`, `quality`, `updated_at`, `created_at`) VALUES
(1, 1, 1.5, 'Bad!', '2020-03-16 06:10:04', '0000-00-00 00:00:00'),
(2, 1.6, 2.8, 'Not Bad', '2020-03-16 11:40:00', '0000-00-00 00:00:00'),
(3, 2.9, 3.4, 'So So', '2020-03-16 11:40:00', '0000-00-00 00:00:00'),
(4, 3.5, 4.5, 'Good', '2020-03-16 11:40:00', '0000-00-00 00:00:00'),
(5, 4.6, 5, 'Awesome', '2020-03-16 06:10:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`) VALUES
(1, 'website_title', 'atlasDemo'),
(2, 'system_title', 'ATLAS Directory Listing CMS'),
(4, 'system_email', 'company@example.com'),
(5, 'address', 'New York'),
(6, 'phone', '1234567890'),
(7, 'vat_percentage', ''),
(8, 'country_id', '98'),
(9, 'text_align', ''),
(10, 'currency_position', 'left'),
(11, 'language', 'english'),
(12, 'purchase_code', 'your-purchase-code'),
(13, 'timezone', 'Asia/Kolkata'),
(14, 'paypal', '[{\"active\":\"0\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"1234\"}]'),
(15, 'stripe', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(16, 'recaptcha_site_key', '6LfV-p4UAAAAANQN9JwL1vDTH7D1FFEpqOkCr3HU'),
(17, 'recapthca_secret_key', '6LfV-p4UAAAAALgG78gd9FeeNoFr4i2n4km86lyc'),
(18, 'system_currency', 'USD'),
(19, 'paypal_currency', 'USD'),
(20, 'stripe_currency', 'USD'),
(21, 'youtube_api_key', ''),
(22, 'vimeo_api_key', ''),
(23, 'protocol', 'smtp'),
(24, 'smtp_host', 'ssl://smtp.googlemail.com'),
(25, 'smtp_port', '465'),
(26, 'smtp_user', ''),
(27, 'smtp_pass', ''),
(28, 'social_links', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}'),
(29, 'about', ''),
(30, 'term_and_condition', ''),
(31, 'privacy_policy', ''),
(32, 'faq', ''),
(35, 'version', '1.4');

-- --------------------------------------------------------

--
-- Table structure for table `time_configurations`
--

DROP TABLE IF EXISTS `time_configurations`;
CREATE TABLE IF NOT EXISTS `time_configurations` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `saturday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sunday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tuesday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wednesday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thursday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friday` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_configurations`
--

INSERT INTO `time_configurations` (`id`, `listing_id`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
(1, 1, '10-23', '10-23', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed'),
(2, 2, 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed'),
(3, 3, 'closed-closed', '10-0', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `social` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `wishlists` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `address`, `phone`, `website`, `social`, `about`, `password`, `wishlists`, `verification_code`, `is_verified`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 1, 'admin', 'admin@narola.email', NULL, 5678890776, '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, '$2y$10$6HO0uabi1pkVwmaWULkUxO044jP/9D1bIoNASkTOOqbT9MIwke136', '[]', '2c95cfb746ddc3403157352b41da1590', 1, NULL, '2020-03-14 04:15:36', '2020-03-09 20:33:09'),
(2, 2, 'jayushi jain', 'jjj@narola.email', 'dream palace', 1234567809, NULL, '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', '[]', '2c95cfb746ddc3403157352b41da1590', 1, NULL, '2020-03-13 12:08:51', '0000-00-00 00:00:00'),
(3, 2, 'Sourabh jain', 'sj@narola.email', 'dream palace', 1234567890, NULL, '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', '[\"1\"]', '24998c0d51cd84d2ac1c8a0e7e9225dc', 1, NULL, '2020-03-13 12:08:51', '0000-00-00 00:00:00'),
(4, 2, 'bhanuuuuu', 'jayushi@narola.email', 'dream palace', 1234567890, '', NULL, NULL, '$2y$10$6HO0uabi1pkVwmaWULkUxO044jP/9D1bIoNASkTOOqbT9MIwke136', NULL, NULL, 1, 'Vqmb7UUZb6eSqGXRl9Mcv5oK1UyS4qqXqi47DQOINsI6urRm0S4SNpL0AsDn', '2020-03-16 04:50:50', '2020-03-13 06:43:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
