-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 29, 2019 at 01:01 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `atlas_1.2_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `icon`, `name`, `slug`) VALUES
(1, 'fas fa-child', 'Good for kids', 'good-for-kids'),
(2, 'fas fa-tree', 'Outdoor seating', 'outdoor-seating'),
(3, 'fas fa-tv', 'Television', 'television'),
(4, 'fas fa-wheelchair', 'Wheelchair accessible', 'wheelchair-accessible'),
(5, 'fas fa-wifi', 'Free WiFi', 'free-wifi'),
(6, 'fas fa-car', 'Parking', 'parking'),
(7, 'fas fa-paw', 'Pet allowed', 'pet-allowed'),
(8, 'far fa-gem', 'Spa and fitness center', 'spa-and-fitness-center'),
(9, 'fas fa-bath', 'Swimming pool', 'swimming-pool'),
(10, 'fas fa-utensils', 'BBQ facilities', 'bbq-facilities'),
(11, 'fas fa-fire', 'Smoke allowed', 'smoke-allowed'),
(12, 'fas fa-money-bill-alt', 'Currency exchange', 'currency-exchange'),
(14, 'fas fa-shipping-fast', 'Home delivery', 'home-delivery'),
(15, 'fas fa-glass-martini', 'Bar', 'bar'),
(16, 'fas fa-music', 'Music', 'music');

-- --------------------------------------------------------

--
-- Table structure for table `beauty_service`
--

DROP TABLE IF EXISTS `beauty_service`;
CREATE TABLE `beauty_service` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_times` longtext COLLATE utf8_unicode_ci,
  `photo` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beauty_service`
--

INSERT INTO `beauty_service` (`id`, `listing_id`, `name`, `price`, `service_times`, `photo`) VALUES
(1, 31, 'Manicure', '60', '11:30,17:00,40', '0f6cd503f4c8231e3af6f146c1327901.jpg'),
(2, 31, 'Makeup', '120', '10:00,16:00,50', '3830a87d80e4c1b9bc3f84096383a765.jpg'),
(3, 32, 'Bridal Makeup', '80', '10:00,18:30,60', '3a8e0257763f6a8b2b0c20ee05b3aa32.jpg'),
(4, 34, 'Hair Cut', '31', '10:00,16:00,30', '3650380bc3c7153ac0a70ec9e53cbfb3.jpg'),
(5, 34, 'Shave', '20', '00:30,17:30,20', '72d6ad15ec460cafb03ff864e242c798.jpg'),
(6, 34, 'Children Cut', '45', '11:30,16:00,50', '6885406b593c1407c342134725bb3fac.jpg'),
(7, 35, 'Razor Fade', '50', '11:30,19:00,40', '0ed02be82047b7323a6813a4cbbb432a.jpg'),
(8, 35, 'Children Cut', '50', '12:30,17:00,50', '458635a0dabeecef4d71c4d3426e829d.jpg'),
(9, 35, 'Facial and Massage', '56', '11:00,19:00,60', '7749a38dd2f32fd9a78dff7b7f63a3c9.jpg'),
(10, 31, 'Foot care', '70', '11:00,16:30,40', 'dfb712421220e6ed80eb9cdbf729748b.jpg'),
(11, 31, 'Hair Style', '40', '10:00,19:00,30', '60ba2e18c519d8dca584bbedfc323c54.jpg'),
(12, 32, 'Body Spa', '60', '11:00,17:00,50', '15c382c3b621706c5a9d305e2c08fb27.jpg'),
(13, 32, 'Laser Facial', '150', '12:30,19:30,60', '647897b3e6386318c116586426762cda.jpg'),
(14, 33, 'Straight Gloss Therapy ', '140', '10:00,17:00,60', '451711aa3f1c2815dbb7aa7b12ebb079.jpg'),
(15, 33, 'Illuminate Nail Art ', '80', '11:00,15:00,30', '4b808f2ab5c18a34f22cd20542e46ab8.jpg'),
(16, 33, 'Lip Care ', '200', '10:00,16:00,50', '2dd43ede63631f0ca9e88e350b4d9aca.jpg'),
(17, 33, 'Hair Style', '70', '10:00,18:00,30', 'c9a80388b8ca4465316c6e7a1b2ef499.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `booking_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional_information` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listing_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `requester_id`, `listing_id`, `booking_date`, `additional_information`, `created_at`, `listing_type`, `status`) VALUES
(1, 1, 2, 33, '1566950400', '{\"time\":1567000800,\"service\":\"16\",\"note\":\"i need a service\"}', '1566950400', 'beauty', 1),
(2, 1, 2, 33, '1567555200', '{\"time\":1566996300,\"service\":\"15\",\"note\":\"\"}', '1566950400', 'beauty', 0),
(3, 2, 1, 35, '1571184000', '{\"time\":1567004400,\"service\":\"8\",\"note\":\"\"}', '1566950400', 'beauty', 1),
(4, 1, 2, 28, '1568851200', '{\"adult_guests\":\"3\",\"child_guests\":\"0\",\"time\":\"dinner\"}', '1566950400', 'restaurant', 0),
(5, 1, 2, 12, '1570708327 - 1571140327', '{\"adult_guests\":\"2\",\"child_guests\":\"0\",\"room_type\":\"Deluxe King Size\"}', '1566950400', 'hotel', 1),
(6, 1, 2, 6, '1570709176 - 1571141176', '{\"adult_guests\":\"2\",\"child_guests\":\"2\",\"room_type\":\"Standard room\"}', '1566950400', 'hotel', 0),
(7, 2, 1, 19, '1572955831 - 1573301431', '{\"adult_guests\":\"4\",\"child_guests\":\"2\",\"room_type\":\"Deluxe Suite\"}', '1566950400', 'hotel', 1),
(8, 2, 1, 20, '1571875200', '{\"adult_guests\":\"4\",\"child_guests\":\"3\",\"time\":\"lunch\"}', '1566950400', 'restaurant', 0),
(9, 2, 1, 10, '1571184000', '{\"adult_guests\":\"3\",\"child_guests\":\"0\",\"time\":\"dinner\"}', '1566950400', 'restaurant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT '0',
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `slug` longtext COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent`, `icon_class`, `name`, `slug`, `thumbnail`) VALUES
(1, 0, 'fas fa-utensils', 'Restaurant', 'restaurant', 'b7a02ba759334421a68877b77d53cddd.jpg'),
(2, 1, 'fas fa-child', 'Family style', 'family-style', NULL),
(3, 1, 'fas fa-utensil-spoon', 'Fine dining', 'fine-dining', NULL),
(4, 1, 'fas fa-coffee', 'Cafe bistro', 'cafe-bistro', NULL),
(5, 1, 'fas fa-birthday-cake', 'Fast food', 'fast-food', NULL),
(6, 1, 'fab fa-nutritionix', 'Restaurant buffet', 'restaurant-buffet', NULL),
(7, 1, 'fas fa-glass-martini', 'Barbecue', 'barbecue', NULL),
(8, 1, 'fas fa-dot-circle', 'Doughnut shops', 'doughnut-shops', NULL),
(9, 1, 'fas fa-beer', 'Juice bars', 'juice-bars', NULL),
(10, 0, 'fas fa-h-square', 'Hotel', 'hotel', '24ce544a504521b45555ed0ee710656e.jpg'),
(11, 10, 'far fa-building', 'Apartment hotel', 'apartment-hotel', NULL),
(12, 10, 'fas fa-bed', 'Bed and breakfast', 'bed-and-breakfast', NULL),
(13, 10, 'fas fa-chess-king', 'Casino hotel', 'casino-hotel', NULL),
(14, 10, 'fas fa-building', 'Condo hotel', 'condo-hotel', NULL),
(15, 10, 'fab fa-fort-awesome', 'Guesthouse', 'guesthouse', NULL),
(16, 10, 'fas fa-industry', 'Inn', 'inn', NULL),
(17, 10, 'fab fa-houzz', 'Motel', 'motel', NULL),
(18, 0, 'fas fa-shopping-cart', 'Shopping', 'shopping', '47a13b9539d7e09f160efa7271b901f9.jpg'),
(19, 18, 'fab fa-black-tie', 'Fashion', 'fashion', NULL),
(20, 18, 'fas fa-mobile-alt', 'Mobile', 'mobile', NULL),
(21, 18, 'fas fa-laptop', 'Computer', 'computer', NULL),
(22, 18, 'fab fa-empire', 'Jewelry', 'jewelry', NULL),
(23, 18, 'fas fa-home', 'Home and garden', 'home-and-garden', NULL),
(24, 18, 'fas fa-shopping-bag', 'Bags', 'bags', NULL),
(25, 18, 'fas fa-dolly', 'Shoes', 'shoes', NULL),
(26, 18, 'fas fa-car', 'Automobile', 'automobile', NULL),
(27, 0, 'fas fa-gem', 'Fitness', 'fitness', '11b4f846fa3513cf17d9802fda0041c6.jpg'),
(28, 27, 'fab fa-odnoklassniki', 'Acrobatics', 'acrobatics', NULL),
(29, 27, 'fab fa-fly', 'Lycra', 'lycra', NULL),
(30, 27, 'fab fa-strava', 'Yoga', 'yoga', NULL),
(31, 27, 'fas fa-weight', 'Boxing', 'boxing', NULL),
(32, 27, 'fab fa-tencent-weibo', 'Hammock', 'hammock', NULL),
(33, 27, 'fas fa-bowling-ball', 'Kettlebell', 'kettlebell', NULL),
(34, 27, 'fas fa-bicycle', 'Cycling', 'cycling', NULL),
(35, 27, 'fab fa-react', 'Pilates', 'pilates', NULL),
(37, 0, 'fas fa-cut', 'Beauty', 'beauty', 'b66115b8d735db7d6d2fa0dda5a3280d.jpg'),
(38, 37, 'fas fa-cut', 'Hair salon', 'hair-salon', NULL),
(39, 37, 'fab fa-modx', 'Hair removal', 'hair-removal', NULL),
(40, 37, 'fab fa-ethereum', 'Nail care', 'nail-care', NULL),
(41, 37, 'far fa-smile', 'Facial', 'facial', NULL),
(42, 37, 'fas fa-paint-brush', 'Makeup', 'makeup', NULL),
(43, 37, 'fas fa-eye', 'Eye color', 'eye-color', NULL),
(44, 37, 'fab fa-pagelines', 'Med spa', 'med-spa', NULL),
(45, 37, 'fab fa-staylinked', 'Tattoo', 'tattoo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `slug`, `country_id`) VALUES
(1, 'Paris', 'paris', 73),
(2, 'Lyon', 'lyon', 73),
(3, 'Nice', 'nice', 73),
(4, 'Marseille', 'marseille', 73),
(5, 'Bordeaux', 'bordeaux', 73),
(6, 'Toulouse', 'toulouse', 73),
(7, 'Strasbourg', 'strasbourg', 73),
(8, 'Dijon', 'dijon', 73),
(9, 'Nantes', 'nantes', 73),
(10, 'Lille', 'lille', 73);

-- --------------------------------------------------------

--
-- Table structure for table `claimed_listing`
--

DROP TABLE IF EXISTS `claimed_listing`;
CREATE TABLE `claimed_listing` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_information` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `claimed_listing`
--

INSERT INTO `claimed_listing` (`id`, `listing_id`, `user_id`, `full_name`, `phone`, `additional_information`, `status`) VALUES
(1, 4, 2, 'Jane Doe', '+33 3333443443', 'This is my real proof.', 0),
(2, 10, 2, 'Jane Doe', '+1 (336) 676-3025', 'This is my real proof.', 1),
(3, 31, 2, 'Jane Doe', '+1 (283) 282-1469687', 'This is my real proof.', 1),
(4, 20, 2, 'Jane Doe', '+33 3333443443', 'This is my real proof.', 1),
(5, 19, 2, 'Jane Doe', '+1 (336) 676-3025', 'This is my real proof.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dial_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
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
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_supported` int(11) NOT NULL DEFAULT '0',
  `stripe_supported` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
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
-- Table structure for table `food_menu`
--

DROP TABLE IF EXISTS `food_menu`;
CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8_unicode_ci,
  `photo` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `listing_id`, `name`, `price`, `items`, `photo`) VALUES
(1, 1, 'WILD ATLANTIC SCALLOPS', '20', ' lobster prosecco sauce,peas,crispy pancetta,straw fries', 'c0491aee869f45e625cbc1a63957e008.jpg'),
(2, 1, 'Grilled Sea Bass', '15', 'samphire mash potato,roasted Mediterranean-style vegetables,green beans', '4983c370090a41db32d84604f4dd987a.jpg'),
(3, 5, ' BUTTERMILK CHICKEN JIBARITOS', '12', 'Caribbean twist,buttermilk fried chicken', '998cd9adea252e386067ad1c894d5fe7.jpg'),
(4, 5, 'BUTTERMILK CHICKEN', '9.99', 'crispy chicken,spicy corn, smoked cheese fritter,grilled asparagus ', 'eab4b3ac7941e1b4ed28578947626bd0.jpg'),
(5, 9, 'STEAK HOUSE BURGER', '12', 'slow cooked beef,smoked beef bacon,smoked Cheddar cheese,beef dripping sauce', 'c83ededca1b0e87f6d1dbb15271b30fd.jpg'),
(6, 9, 'BAKED CHEDDAR MUSHROOMS', '12.47', 'Button mushrooms,creamy Cheddar,spinach sauce', '7819aedfe6f87ef4431e0de7e3c0c571.jpg'),
(7, 10, 'RUM RUNNER, ISLAMORADA DETAILS', '8.49', ' ISLAMORADA DETAILS Bacardi Silver,Bacardi Black Rums, banana liqueur,blackberry brandy', '8f4663c41a15f12530c7c2e8fb8e73cb.jpg'),
(8, 10, 'GOOMBAY SMASH, BAHAMAS DETAILS', '7.99', 'Cruzan Coconut,Spiced and Bacardi Black Rums', '86bb6ffc75d8faa26f3207d3ae6872de.jpg'),
(9, 17, 'WILD ATLANTIC SCALLOPS', '10', 'lobster prosecco sauce, peas, crispy pancetta,straw fries', 'e841328b166fc759334acfce232910d1.jpg'),
(10, 17, 'OVEN ROASTED STUFFED AUBERGINE', '12', 'rich tomato sauce, black olives, peppers', '344197aed0d48493e4e9fd1791227c43.jpg'),
(11, 20, 'ZOMBIE, CALIFORNIA', '8.49', 'Bacardi Black,Barbancourt Rums,Peach Schnapps ', 'ee765b00421ab189cbaa64ac2435a0ef.jpg'),
(12, 20, 'JERK CHICKEN SANDWICH', '12', 'jerk chicken,Buttermilk fried chicken breast, cabbage-jicama slaw', '09012e028831806a3fdd32b3276aa8dd.jpg'),
(13, 22, 'CLASSIC CRÈME BRÛLÉE', '11', 'Madagascan vanilla glazed brûlée,home baked vanilla biscuit,fresh berries', 'c6b5c3562fb1989af46893f1632ce96a.jpg'),
(14, 22, 'GRILLED CHICKEN BREAST SANDWICH DETAILS', '20', 'toasted brioche bun,lettuce, sliced onions', 'f3b6e32e86ef262ce2109bfba5608689.jpg'),
(15, 23, ' CUBAN SANDWICH', '12.49', 'Ham, roasted pork, Swiss cheese, pickles', 'a2795d497918780daa459d4914363484.jpg'),
(16, 23, 'JERK CHICKEN SANDWICH', '15', 'Cuban bread,jerk chicken', '5671ce4522a312360a136faa5540b0a2.jpg'),
(17, 28, 'BEEF EMPANADAS', '11', 'Handmade pastries,savory beef', '57de5e92b33f5d39780a89a6006fc3c3.jpg'),
(18, 28, 'TOSTONES WITH CHICKEN', '9', ' sweet pepper,Twice-fried plantains topped with chicken', '47b47c9f6683a1ba1ff0990506e33467.jpg'),
(19, 30, 'SPINACH DIP & CHIPS', '10', 'Spinach and artichokes in a creamy cheese dip,tortilla chips', '8c288c292dfe7c211a9e6d0396ee9de0.jpg'),
(20, 30, 'CHICKEN QUESADILLA', '12', 'Sliced chicken with onions, sweet peppers, spinach', '1d4575d777df3af5fd9c5dcb358db385.jpg'),
(21, 30, 'ISLAND HOPPER COMBO', '20', 'Jamaican chicken wings, crispy coconut shrimp, onion rings', 'ebe2159a6bff6404695f58e70251b442.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

DROP TABLE IF EXISTS `frontend_settings`;
CREATE TABLE `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `type`, `description`) VALUES
(1, 'banner_title', 'Atlas Business Directory Listing'),
(2, 'banner_sub_title', 'Subtitle Of Atlas Directory Listing'),
(3, 'about_us', 'About us'),
(4, 'terms_and_condition', 'Terms and conditions'),
(5, 'privacy_policy', 'Privacy Poilicy'),
(6, 'social_links', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"google\":\"\",\"instagram\":\"\",\"pinterest\":\"\"}'),
(7, 'slogan', 'Find your local places, you love most to roam around.'),
(8, 'faq', 'Faq');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_specification`
--

DROP TABLE IF EXISTS `hotel_room_specification`;
CREATE TABLE `hotel_room_specification` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_unicode_ci,
  `photo` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_specification`
--

INSERT INTO `hotel_room_specification` (`id`, `listing_id`, `name`, `description`, `price`, `amenities`, `photo`) VALUES
(1, 2, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding. ', '1200', 'TV,Pool,Free WiFi,Pet Friendly', 'fc89f280a4de73b2fc6c97de0ed959b6.jpg'),
(2, 2, 'The Hughes Suite', 'The Hughes Suite is a 2-bedroom suite that offers a master bedroom with a queen-size bed. ', '1100', 'Hairdryer,Refrigerator,Microwave', '7e05c3e7097b51d2ed088f383c8499aa.jpg'),
(3, 6, 'Executive Room', 'They all have big floor-to-ceiling windows to give you an amazing view of either the city of Copenhagen, Combine’s Garden or Islands Brygge.', '900', 'Restaurant,Air Conditioning,bar', 'ca79c3f27e26aa3d727ba906a4e21d64.jpg'),
(4, 6, 'Standard room', 'Our Standard rooms are all of comfortable and functional décor to meet the basic needs for you during your stay.', '1000', 'Breakfast Buffet,Wellness Spa,Parking', '4b9470725c5e5d2c50f8b18cda139531.jpg'),
(5, 11, 'Executive Room', 'They all have big floor-to-ceiling windows to give you an amazing view of either the city of Copenhagen, Combine’s Garden or Islands Brygge.', '2000', 'Breakfast Buffet,Swimming Pool,TV,Hair Dryer', 'd651e1f4952f0e0646e061ac4e2a3457.jpg'),
(6, 11, 'Grand Deluxe Room', 'Grand Deluxe uniquely designed 2 storey luxury accommodation with contemporary architecture room structures.', '2200', 'Pet Friendly,Air Conditioning,Swimming Pool', '52b9d77f6d856a4d51f2ea68ecba4fd8.jpg'),
(7, 12, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding.', '1200', 'Room Service,Desk,Wellness Spa,Laundry Facilities', 'aad06cacf28df4ab85079352ec5209df.jpg'),
(8, 12, 'The Hughes Suite', 'The Hughes Suite is a 2-bedroom suite that offers a master bedroom with a queen-size bed. The smaller bedroom offers a full-size bed.', '1500', 'Pet Friendly,Air Conditioning,Desk', '2f3f18bf43dbd8d8d4e2afe954e3406d.jpg'),
(9, 13, 'Grand Deluxe Room', 'Grand Deluxe uniquely designed 2 storey luxury accommodation with contemporary architecture room structures.', '1650', 'Television,Free WiFi,Pet allowed', '25bd1ccc1aae7e55a3474fce11f61a1c.jpg'),
(10, 13, 'Deluxe Suite', 'Designed to maximize the sense of spaciousness, the Deluxe Suites are tastefully adorned in colors and with artefacts that are paired with a comprehensive set of indulgent services.', '1400', 'Swimming Pool,Hair Dryer,Kitchen Facilities', '8c47867e785ce385865ee1aa261e9077.jpg'),
(11, 14, 'Executive Room', 'They all have big floor-to-ceiling windows to give you an amazing view of either the city of Copenhagen, Combine’s Garden or Islands Brygge.', '1900', 'Desk,Wellness Spa,Laundry Facilities', '4bfaafa7dc2ccfe04d42c4e0093837ea.jpg'),
(12, 14, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding.', '1400', 'Parking,Air Conditioning,Fitness Center', '36cd3f08a56711a6382342faff492fcc.jpg'),
(13, 15, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding.', '1350', 'Air Conditioning,Hair Dryer,Desk', '7f205dd57a3744a34ed04d6fdad28178.jpg'),
(14, 15, 'Deluxe Suite', 'Designed to maximize the sense of spaciousness, the Deluxe Suites are tastefully adorned in colors and with artefacts that are paired with a comprehensive set of indulgent services.', '1900', 'Bar,Free WiFi,Fitness Center,Room Service', '1d7f1d24468d8c9eb62ff7a73c884815.jpg'),
(15, 16, 'Grand Deluxe Room', 'Grand Deluxe uniquely designed 2 storey luxury accommodation with contemporary architecture room structures.', '2000', 'Breakfast Buffet,Bar,Air Conditioning,TV', 'c78070fcbad799ad83716deaf547d56e.jpg'),
(16, 16, 'The Hughes Suite', 'The Hughes Suite is a 2-bedroom suite that offers a master bedroom with a queen-size bed. The smaller bedroom offers a full-size bed.', '2200', 'Swimming Pool,Kitchen Facilities,Hair Dryer', '0fc8a20609f8d7631622826924df8009.jpg'),
(17, 18, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding.', '1800', 'Swimming Pool,Bar,Room Service,Desk', '5f689927d1804896cfb90d04c52cb4be.jpg'),
(18, 18, 'Executive Room', 'They all have big floor-to-ceiling windows to give you an amazing view of either the city of Copenhagen, Combine’s Garden or Islands Brygge.', '1340', 'Fitness Center,Kitchen Facilities,Bar,Pet Friendly', 'ed80fbbbd669e453f2e3da0558a4e854.jpg'),
(19, 19, 'Deluxe Suite', 'Designed to maximize the sense of spaciousness, the Deluxe Suites are tastefully adorned in colors and with artefacts that are paired with a comprehensive set of indulgent services.', '1780', 'Hair Dryer,Pet Friendly,Restaurant,Breakfast Buffet', 'b70f69c72222c6dbd47f1d1ae4ca608d.jpg'),
(20, 19, 'Deluxe King Size', 'Our Deluxe king size room has a seating area, ample storage, digital safe, minibar and luxurious duck down bedding.', '1900', 'Wellness Spa,Room Service,Desk,Kitchen Facilities', '2c4f809463bf36e5f3aee195cec9f18d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

DROP TABLE IF EXISTS `listing`;
CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci,
  `name` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `categories` longtext COLLATE utf8_unicode_ci,
  `amenities` longtext COLLATE utf8_unicode_ci,
  `photos` longtext COLLATE utf8_unicode_ci,
  `video_url` longtext COLLATE utf8_unicode_ci,
  `video_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `social` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `listing_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_tags` longtext COLLATE utf8_unicode_ci,
  `date_added` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `google_analytics_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `code`, `name`, `description`, `categories`, `amenities`, `photos`, `video_url`, `video_provider`, `tags`, `address`, `email`, `phone`, `website`, `social`, `user_id`, `latitude`, `longitude`, `country_id`, `city_id`, `status`, `listing_type`, `listing_thumbnail`, `listing_cover`, `seo_meta_tags`, `date_added`, `date_modified`, `is_featured`, `google_analytics_id`) VALUES
(1, '89b387c90e74ec65fca9fbf404ed4f64', 'Ristorante Del Arte', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"5\",\"2\"]', '[\"2\",\"5\",\"10\",\"16\"]', '[\"d67b95942a2b6e1c7db8c628c2c31b77.jpg\",\"3295ee0a008aff0224fb3addb48ea20f.jpg\",\"b16f50f37fb7e0f89be8f5200d1cf721.jpg\",\"aef23fd6dd797d653e8366c049ebc24f.jpg\",\"4625c0228cf7232127bedadf688f24e9.jpg\",\"f928b590e7e26ce33a7959b4298fd096.jpg\"]', 'https://vimeo.com/183648707', 'vimeo', 'seafood,carryout,family meals', 'Alençon, France', '', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.433844', '0.065869', 73, 1, 'pending', 'restaurant', '0d28ef819e4f63b9ecc4a71ec0edbe8a.jpg', 'c9ff6666a00e4ba34c124f3efe339900.jpg', 'buffet,bistro,asian', '1557619200', 1557878400, 0, NULL),
(2, '3f55048ca2b79b7787bc247d89256d05', 'La Cour Berbisey', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"11\",\"16\"]', '[\"5\",\"6\",\"10\",\"11\",\"15\"]', '[\"265fa4326dada754ca9139ea804de30d.jpg\",\"e9d292e3598becefd2e8d21c4c9a618c.jpg\",\"9828f4d7c838cdf247ee5d8898c07cca.jpg\",\"d2686c0c133d7e4f47ee13b59999c33c.jpg\",\"30b474614df35970b90020d982db967f.jpg\",\"f40a1dcae4c9c45bbf72e3e502b021de.jpg\"]', 'https://vimeo.com/214125425', 'vimeo', '5 star hotel,beach resort', 'Dijon, France', 'yourbusiness@example.com', '+48929485960', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '47.318454', '5.036589', 73, 8, 'active', 'hotel', '7bd5f999459adb7a12c585de2aecf7cc.jpg', '1960a183c7adb42c6982f8d6831b519a.jpg', 'luxury hotels,motel,family room', '1557705600', 1557878400, 0, NULL),
(3, '556e6631600be55855b61c863c618ffd', 'Depot vente luxe Mademoiselle', 'Our store principal business is carried out by retail trade. Here people get delivery of goods or other product services. It differs from a convenience store or corner shop in that it will be the main shop for the community rather than a convenient supplement.', '[\"18\",\"21\",\"23\"]', '[\"1\",\"6\",\"7\",\"16\"]', '[\"87d60693a8f35d35162d3d4110bc5514.jpg\",\"47604a3e6d23f38ea1f3545cda958e1e.jpg\",\"f52aaf82af73dd3725d5711ef842eb9b.jpg\",\"42e9c1a19329ac2462be4d21bf47c7fd.jpg\",\"c92bd5e901ff47d7d29d970ed2a0f92c.jpg\",\"6b27e7bad3d2c615670c88ca684e6114.jpg\",\"86538dd26e48aa30e99920f255ef3373.jpg\"]', 'https://vimeo.com/95929658', 'vimeo', 'online shopping mall,shop cinema', 'Nice, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.696033', '7.261461', 73, 3, 'active', 'shop', 'f3b6e32e86ef262ce2109bfba5608689.jpg', 'c8d0e12dafd1481aaa5c44a196e254e8.jpg', 'shoppers guide,shops', '1557792000', 1557878400, 0, NULL),
(4, 'b71fac22258c2037106ee5e87a2e919f', 'Crossfit ELAFI', 'It is a unique lifestyle program designed to achieve every individual member’s respective health and fitness goals. Whether our members are beginners or enthusiasts, every program, product, and experience we offer begins and ends with creating a premier and comfortable atmosphere tailored for their individual and overall success and safety.', '[\"27\",\"28\",\"33\",\"30\"]', '[\"5\",\"6\",\"7\",\"9\",\"16\"]', '[\"ac9884c61b126e282138bcaccd9b0f1e.jpg\",\"82268c98f3307df94980931841c99eab.jpg\",\"08536a4842954b40c98d20b03ccb9bd0.jpg\",\"98a4056f3ae2b4df7dfd6a6f30f7cbe9.jpg\",\"356ac8052df8a68ede987e1c91285b64.jpg\",\"163c01776ad7bf16bc6f7e3081848169.jpg\",\"cc268cd350292b094a790d627fa66fd0.jpg\"]', 'https://vimeo.com/302154751', 'vimeo', 'local fitness gyms,gym center,gym specials', 'Lyon, France', 'yourbusiness@example.com', '', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '45.743210', '4.849847', 73, 2, 'active', 'general', '06cdd46cb8abdc55338c773642777dfa.jpg', '0cfb306a0810b77e04b0e22150a7cefb.jpg', 'health club membership,affordable gym membership,gym facilities', '1557878400', 1561939200, 0, NULL),
(5, 'b67ba71907190937a26dd3f4121b8fef', 'La Maison d Horbe', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"8\",\"7\"]', '[\"2\",\"6\",\"10\",\"11\",\"16\"]', '[\"b91e5e340aed973e32144d75d53c4bb0.jpg\",\"e3b407554f23689bb033a8e4c18e8239.jpg\",\"8c0b1e256be81f39ca6ca75471da5413.jpg\",\"9611ed5221072c1847e837f415729863.jpg\",\"4294c23051f61bf74dee442181531321.jpg\",\"7ed5c361d9d304b70f3cab5105bf2622.jpg\"]', 'https://vimeo.com/183648707', 'vimeo', 'family,best brunch', 'La Perrière, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.401004', '0.440857', 73, 6, 'active', 'restaurant', '2eeae1148e1e7f691cb9521a9c41fff6.jpg', 'bb2bc9902b6d238c103c944c300f7cb5.jpg', 'large groups,cafe america,catering services', '1557619200', 1557619200, 0, NULL),
(6, '9eb131c8e0f5e5e3796606e6246b76e0', 'Clarance Hotel', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"12\",\"16\",\"17\"]', '[\"5\",\"6\",\"7\",\"8\",\"9\",\"15\"]', '[\"2179747a781559ef75f2a2b7eb4f4dac.jpg\",\"368643249380d4ad6e01c15adba67b16.jpg\",\"0e4451533ff60b9a99b317c9eb56c63d.jpg\",\"9b72f97d7c3b54ed8bcfdf1dd515825c.jpg\",\"a624135bd3f738a648d5be5a82e888cf.jpg\",\"adcc3f941c2df75c85b6f056c8598f7f.jpg\"]', 'https://vimeo.com/214125425', 'vimeo', 'best hotel rooms,top luxury hotels', 'Lille, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '50.638833', '3.056990', 73, 10, 'active', 'hotel', '98008ded21258aa9c869d4f64a6ba7b6.jpg', 'dbedaa03c04d1686bc675edd3e15f6e9.jpg', 'cheap rooms,exclusive hotels,meeting hotel', '1557705600', 1557705600, 1, NULL),
(7, '0c6b47734c10b735b78fc8f1180b8905', 'Galerie Vivienne', 'Our store principal business is carried out by retail trade. Here people get delivery of goods or other product services. It differs from a convenience store or corner shop in that it will be the main shop for the community rather than a convenient supplement.', '[\"18\",\"20\",\"23\",\"24\"]', '[\"6\",\"11\",\"12\"]', '[\"7df6a62898c8a10f75031b198ae001ba.jpg\",\"b9873ef878d83f620957891b1df8c5e4.jpg\",\"59a78eec7782876c1ad85b2dceb0c8af.jpg\",\"a2420fbfaca3717daa106d06eb0046ee.jpg\",\"c2ba30e5cda176527335d0c3264ea6ec.jpg\",\"647f5c9731cf14303350dc528ff9ad3c.jpg\"]', 'https://vimeo.com/37398997', 'vimeo', 'home shopping,shopping outlets', 'Paris, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.867055', '2.339490', 73, 1, 'active', 'shop', '40206eb4f7de800c5fa595c7c7f2df1d.jpg', 'e237e4044d1bde3b93e22e171d422873.jpg', 'shopping,online shopping,shopping mall', '1557792000', 1566259200, 0, ''),
(8, 'd897afbf6d6057ee807ca798b1ef5919', 'Fit Factory CrossFit Massilia', 'It is a unique lifestyle program designed to achieve every individual member’s respective health and fitness goals. Whether our members are beginners or enthusiasts, every program, product, and experience we offer begins and ends with creating a premier and comfortable atmosphere tailored for their individual and overall success and safety.', '[\"27\",\"32\",\"31\",\"30\"]', '[\"5\",\"6\",\"9\",\"16\"]', '[\"282ed47897460e901f53f0ff3eace9fb.jpg\",\"b64a3c3775d0ac469339c66a1b922ea6.jpg\",\"6030dd9e4fe497adc7c4aba4d1b4c4a2.jpg\",\"780b6cefbc1178a1e6e9f37c31226ae0.jpg\",\"f6a1f87b68aca29a9c52104c910446f7.jpg\",\"02589add6cce9ef423187a2b35358fe3.jpg\",\"838e5a753a6dc5791dd4f1946dccc2aa.jpg\"]', 'https://vimeo.com/34313969', 'vimeo', 'gym class,health & fitness', 'Marseille, France', '', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.243198', '5.397923', 73, 4, 'active', 'general', 'efe439e788a46a2b00f553dac1d18e4a.jpg', '76906f19b06f4b15a5b16b9c66e6b44b.jpg', 'womens gym,fitness facility,fit studio', '1557878400', NULL, 0, NULL),
(9, '57a1510023062dc470e72fe19ee75674', 'Pizzeria Rosa-Maria', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"5\"]', '[\"2\",\"4\",\"7\"]', '[\"4573e653c8d3e1fa20a9e44285d29261.jpg\",\"96e4dd6a50f6e64c5542fc01753bbf4c.jpg\",\"5ddfbf230df85091912c969847cc8315.jpg\",\"fed060ca844c93f17d019fb832227573.jpg\",\"93875ea67d7d6f381ebaccecc727abdb.jpg\",\"09be3a77d03715ef942c1d15fa524a30.jpg\"]', 'https://vimeo.com/183648707', 'vimeo', 'steak,restaurants local,buffet', 'Mauron, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.083271', '-2.286561', 73, 10, 'active', 'restaurant', 'cbf89b5c3a16902a893b252c2d2dac84.jpg', '564ec65147a44e86d42d2babf2c22829.jpg', 'sur paris,italian menu', '1557619200', NULL, 0, NULL),
(10, '44d09c5280055d8aade379d19520101e', 'Restaurant Zest', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"3\",\"9\",\"8\"]', '[\"1\",\"2\",\"14\",\"16\"]', '[\"24238e99a0c840c2f8bf745d579e74d3.jpg\",\"bbae030643830b600d79aa38b4c7f409.jpg\",\"d3185080c97fbef258257b20baf486f9.jpg\",\"78a84230f69c392a5d3fad7491b5f5e7.jpg\",\"477f444796e12e7c4f00911bc74e0e26.jpg\",\"7fd932704ee3758326d3e390639883ce.jpg\"]', 'https://vimeo.com/5486880', 'vimeo', 'avis,cafe', 'Cesson-Sévigné, France', 'yourbusiness@example.com', '', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '48.116340', '1.606972', 73, 8, 'active', 'restaurant', 'bad767a3506c4960d2ea984a3459634f.jpg', '5b18e01695fb5f18fb252a8876286193.jpg', 'resto a paris,tapas,bar', '1557619200', NULL, 0, NULL),
(11, 'd5965dfac99bcfbf85b5d391a5942ed9', 'Le Bristol Paris', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"11\",\"13\"]', '[\"3\",\"6\",\"8\",\"9\",\"15\"]', '[\"71e9d3913e7312b83c714d211c5730a4.jpg\",\"f0176907be8b0bbb35403144fa22c202.jpg\",\"abbbb026f5ab290750ffb41efefe8e18.jpg\",\"9d3bd61e7746b12ffd36f40ff7b5c4e3.jpg\",\"83fd5a4f4827e1a9c77791f14ca348b2.jpg\"]', 'https://vimeo.com/214125425', 'vimeo', 'cheap hotels,best hotel prices', 'Paris, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.872439', '2.314749', 73, 1, 'active', 'hotel', '2e11ad3d8048c3268f935b7e7fc5e8ff.jpg', '72ac56d12b547ba6b61555f2ba623dd3.jpg', 'motel,local ,hotel packages', '1557705600', 1557705600, 0, NULL),
(12, '757e184124dc9bc15f327672018e2ae0', 'Hotel Ritz Paris', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"13\",\"16\",\"14\"]', '[\"4\",\"5\",\"11\",\"12\"]', '[\"324bdb5922142678a13f7ea5dbc73997.jpg\",\"daa22956be800047a020487b09cf0809.jpg\",\"70c837809bedfa7eb0f7ea4855532606.jpg\",\"3d130d828d133133977510af657479bc.jpg\",\"eb67911f5733fd5fe6043cf0514d0c9e.jpg\"]', 'https://vimeo.com/18966531', 'vimeo', 'low price,airport hotel,com hotel', 'paris, France', 'yourbusiness@example.com', '', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.868387', '2.329019', 73, 1, 'active', 'hotel', 'dc497400417f81c25cb2fac7da4d4e07.jpg', '73d2653316f20d6386a74e5111fccf65.jpg', 'cheap luxury hotels,discount lodging', '1557705600', 1557705600, 0, NULL),
(13, '2a290a15018fbf793857159639d7693f', 'Hotel Cap-Estel', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"14\",\"17\",\"12\"]', '[\"5\",\"6\",\"7\",\"9\",\"10\"]', '[\"952f1db1edd67a355727a7423aa4a1a7.jpg\",\"b08d232a7921aba35af5dc19a30ce22d.jpg\",\"9e5a2830841b5f0ce9aecf1091a08d98.jpg\",\"ae418cd6f0a6b844bfd30d5661266605.jpg\",\"06373f6c63fbf5e254422bb9dd287492.jpg\",\"a90184d050413d2de7c74994bc663618.jpg\"]', 'https://vimeo.com/214125425', 'vimeo', 'booking hotel,five star hotel', 'Eze, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.720305', '7.373927', 73, 3, 'active', 'hotel', 'ad8540e9cad71f895a01b57b72eadce5.jpg', '43312b8cf76048f1de8b8931aa4f7cfd.jpg', 'accommodation sites,motel discounts', '1557705600', 1557705600, 0, NULL),
(14, 'eb3151e6177fdddc72f5065b8d04f595', 'Villa Florentine', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"17\",\"15\"]', '[\"4\",\"5\",\"6\",\"12\"]', '[\"a73878671faa0fb9c99f6423bfa1b95a.jpg\",\"58ac50e1742bea39c51ad110744cedb7.jpg\",\"0b8c7a45fa8ea8795b960599bf27d60e.jpg\",\"c56676afe5e146fbc98bd2b14efdd7d4.jpg\",\"03a8677113e13703bdb1d5e81fa7117d.jpg\"]', 'https://vimeo.com/188840379', 'vimeo', 'hotel inn,cheap lodges', 'Lyon, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '45.763209', '4.825801', 73, 2, 'active', 'hotel', '5e6338412a983c825fe4eccd28597345.jpg', '7d6d3637c72e4cf7fbb6a5accedd7f45.jpg', 'hotel suite,five star hotel,cheap luxury hotels', '1557705600', 1557705600, 0, NULL),
(15, '4f96a4ad1dcbc9c846f601eeabe43425', 'Le Petit Nice Passedat', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"11\",\"14\",\"15\"]', '[\"3\",\"9\",\"10\",\"11\"]', '[\"f968b8962dec22085692c77c957a8c6f.jpg\",\"7399e97735ded6f562fee86f94f854bf.jpg\",\"fa37610bd506195df49b5455a2cae9cf.jpg\",\"3ee21c4723f9d05afe864d6df5e6d12c.jpg\",\"91333c74ddb1d59c2a9dd75f6276e8e8.jpg\",\"793715dc65e89612c65288cae430d3f2.jpg\"]', 'https://vimeo.com/18966531', 'vimeo', 'cheap airport hotels,park hotel', 'Marseille, France', 'yourbusiness@example.com', '', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.280494', '5.352184', 73, 4, 'active', 'hotel', '4a8c24c96f7c1bd77a0ce2f34c2656a5.jpg', 'f2b363af463a24f219e8e9613b1eb6dc.jpg', 'discount lodging,find hotel specials,accommodations', '1557705600', NULL, 0, NULL),
(16, '271d9a5b2f118bcd60adc12e9ac709eb', 'Intercontinental Bordeaux Le Grand Hotel', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"16\",\"15\",\"13\"]', '[\"1\",\"3\",\"5\",\"6\",\"7\"]', '[\"85c577b3e8196e8066d453599a227d90.jpg\",\"82a42056739892bcfeb849345122dc5c.jpg\",\"f1002906e23683381af4931b4c808e1a.jpg\",\"057883a482980a5a0e72bfc32939a8df.jpg\",\"9bb94102c72d909e1fa773ee79ff649e.jpg\"]', 'https://vimeo.com/188840379', 'vimeo', 'check hotel prices,accomodation', 'Bordeaux, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '44.842442', '-0.574885', 73, 5, 'active', 'hotel', '758b728bc1f27b2bf62064ac077e8d6d.jpg', '0da45f8089e9e2d011aba121f3874bb3.jpg', 'grand hotel,motel booking sites,local hotels', '1557705600', 1557705600, 0, NULL),
(17, 'ac06fedf0b25619965a62740b646cd85', 'Restaurant Le Grand Gousier', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"2\",\"6\"]', '[\"1\",\"4\",\"5\",\"6\",\"10\"]', '[\"8c76cbdc438cddfb9838cbacfa0636b3.jpg\",\"6a48ae8bcc2cbe545cec616c85bb1b68.jpg\",\"449b9644f102264a8edd922e1533203d.jpg\",\"80e7d0f9f82cc0673136e296d596d3ad.jpg\",\"6e835741bc1f2d1ae212557b07560168.jpg\",\"ad9c2130f3fd100f331b9e5c5dafa8b7.jpg\"]', 'https://vimeo.com/183648707', 'vimeo', 'food,pizza,coffee', 'Domfront, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"http:\\/\\/facebook.com\\/yourcompany\",\"twitter\":\"http:\\/\\/twitter.com\\/yourcompany\",\"linkedin\":\"http:\\/\\/linkedin.com\\/yourcompany\"}', 1, '48.614694', '-0.646657', 73, 5, 'active', 'restaurant', '939f93fce676624e6a32882c3d2234db.jpg', 'b54d04ea5245038abda3b1f0a530e92d.jpg', 'mexican,steakhouse', '1557619200', 1557878400, 0, NULL),
(18, '114f6f314314838bfe0b96b397170999', 'Hotel Sofitel Strasbourg Grande Ile', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"11\",\"14\",\"15\"]', '[\"4\",\"5\",\"6\",\"7\",\"12\"]', '[\"3995aefefc250193b06a39fb3cf74d92.jpg\",\"c8f2dd4c7b91b573ffe581bc9c95ddca.jpg\",\"2150c5beda9a9928c8b60a8fcf8c4bc7.jpg\",\"4bee37c2f584d384fa671c7f2182efaf.jpg\",\"3eb37ed33c73ccac865fa2b8cbbc004b.jpg\",\"61efac3a7b539521dc65bac407fd828d.jpg\"]', 'https://vimeo.com/214125425', 'vimeo', 'business hotel,snow hotel,quality hotel', 'Strasbourg, France', 'yourbusiness@example.com', '+48929485960', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.585353', '7.745935', 73, 7, 'active', 'hotel', '6c5e3f755a3b921c757e111827764697.jpg', 'a3d24ddb19260da8952e68109c7f9a8b.jpg', 'economy hotel,resort hotel', '1557705600', NULL, 0, NULL),
(19, 'bba1e84710e3cbb2bbd717c33b4a8493', 'Hotel Oceania Hotel de France', 'This hotel sits in central Nice, just 1,150 feet from the ferry port and a 20-minute walk from the Promenade des Anglais. Its rooms are air-conditioned with free Wi-Fi access. The guest rooms are equipped with flat-screen TVs with satellite channels and a private bathroom. Each is serviced by a lift. It has a 24-hour reception, which is hosted by a multilingual team. The hotel serves a buffet breakfast every morning.', '[\"10\",\"11\",\"12\",\"15\"]', '[\"6\",\"7\",\"9\",\"10\",\"12\"]', '[\"29449827ff6f03a85a16cfddf8cdae0b.jpg\",\"e83c794a68dade32b4121af5b411ebc5.jpg\",\"1f04b889b1387b8f7be100352d638ba0.jpg\",\"1897a3df73d7ce651c34f36f77d095ed.jpg\",\"2cdfe9891c3e354f3ffbcde111a3e130.jpg\",\"aad7cd2d7561ee07b574938bec807de3.jpg\"]', 'https://vimeo.com/188840379', 'vimeo', 'city hotel,lakeside hotel,hotel and resort', 'Nantes, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '47.213471', '-1.561656', 73, 9, 'active', 'hotel', '36be7c2e49cf9572ca373c329ee435fe.jpg', '0dab81ac05ab2cb9238ac57955408613.jpg', 'holiday hotel,village hotel', '1557705600', NULL, 0, NULL),
(20, '3c4505c777335d88cc1d424a87fd0e45', 'Le Bistrot des Ecuries', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"8\",\"4\",\"7\"]', '[\"1\",\"10\",\"14\"]', '[\"23bd2117992d8cde2019398530c8cf63.jpg\",\"fbbd28ff0a74acf94f6d1e2e5ef8f7b1.jpg\",\"cbf37cb1fd45a51e4eb1171a1e1e4458.jpg\",\"cc88be833333abe6c66dcb6b905017b5.jpg\",\"0d56a840a8c5735e0692648f3c740349.jpg\",\"b3e93919f9a0d19809c99ddd312a3ef5.jpg\",\"6bc3f7bfebf90510f7e95d8911d4ca2d.jpg\"]', 'https://vimeo.com/23851992', 'vimeo', 'cheap meals,outdoor', 'Maugis, France', 'yourbusiness@example.com', '+48929485960', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '48.448760', '0.744210', 73, 7, 'active', 'restaurant', '50762555c9494e8bcb1c12dd36a54832.jpg', '5cecaf1d6c1313cc6264cde17c7b6b27.jpg', 'casual dining,cafe,best steak', '1557619200', 1557619200, 0, NULL),
(21, 'b7566c75172e2478c333f51bc3504ad1', 'Bring Home France', 'Our store principal business is carried out by retail trade. Here people get delivery of goods or other product services. It differs from a convenience store or corner shop in that it will be the main shop for the community rather than a convenient supplement.', '[\"18\",\"19\",\"22\",\"25\"]', '[\"4\",\"6\",\"12\",\"14\"]', '[\"872995414daeadb3a7a68d0cfeb3e2e8.jpg\",\"319d4671dd01681beb5c8c77965c889f.jpg\",\"5ca053f5067792780f25929817edd6c3.jpg\",\"a162222ef223a5951511e9ce17fc2616.jpg\",\"4bf5417c0c89fe7ccbce6d8852826e6f.jpg\",\"8458af2305958f01080a41c17e20ee85.jpg\"]', 'https://vimeo.com/112570931', 'vimeo', 'local shopping,web shopping', 'Paris, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.853999', '2.364864', 73, 1, 'active', 'shop', '6691bc3b52e8012205465b40e5ce1df6.jpg', '856b85644dd9558eaa427550eb30af28.jpg', 'best shopping,international shopping', '1557792000', 1557792000, 0, NULL),
(22, '4aba38ce323f9dce072901260e2670b5', 'Au Normandy SARL', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"7\",\"4\"]', '[\"4\",\"5\",\"6\",\"7\"]', '[\"b08d7e0f314822becc29c1e520e08c9f.jpg\",\"2fd319394c350dd0d53c240b36a44cdf.jpg\",\"1af0b23c94a43d74ac4b85c0e2ee75ca.jpg\",\"82482aa9e103b8b12438eab9d43ac2bb.jpg\",\"dd21002a2009e874385d86079e05e9c5.jpg\"]', 'https://vimeo.com/46441876', 'vimeo', 'bar food,fancy', 'Sées, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.617811', '0.175409', 73, 6, 'active', 'restaurant', '9d650320fe0bb163bc53750b45af5314.jpg', 'c62c17468757c94d301c36ad04e6560d.jpg', 'sushi menu,steak house,food guide', '1557619200', NULL, 1, NULL),
(23, '728fbaf5daf79c5383dcc3952d2dd6ca', 'Rive Droite', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"3\",\"4\"]', '[\"2\",\"6\",\"11\",\"16\"]', '[\"2c08369ef9c4376b05fa4bd9d0cc0449.jpg\",\"f8010e8f2b93568acae811b4997fff86.jpg\",\"bea9cb5d8ff81a16df786bffef1c5228.jpg\",\"17de46cff0ed921139299e58c593ae16.jpg\",\"dfe1cb7f6696999cd1f49bf02c517536.jpg\",\"6e81617d543a3fa7a779a82d8fad5f88.jpg\"]', 'https://vimeo.com/5486880', 'vimeo', 'bar food,kids restaurants', 'Alençon, France', '', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.428727', '0.088896', 73, 2, 'active', 'restaurant', '8b2921a5e2839724649f7566472ae27e.jpg', '7874f95c887f7ba7b8152e836f719824.jpg', 'sushi menu,outdoor,lunch', '1557619200', 1557705600, 0, NULL),
(24, 'fecfe2a17dba2cbae72cccb050a061dd', 'La Boutique de la Truffe', 'Our store principal business is carried out by retail trade. Here people get delivery of goods or other product services. It differs from a convenience store or corner shop in that it will be the main shop for the community rather than a convenient supplement.', '[\"18\",\"20\",\"25\",\"26\"]', '[\"6\",\"12\",\"14\",\"16\"]', '[\"a03124d8c05f1bed068dbd032627b803.jpg\",\"2828dabbc19b28cdaf7223b72e5b813c.jpg\",\"8293009ff9946fc3e231b79218314b69.jpg\",\"ec30a74133a87719038e23339360b775.jpg\",\"8c4c38d0e328ec4d2de254de4cf58223.jpg\",\"72fe69a3d846f008a568b51613a50bde.jpg\"]', 'https://vimeo.com/37398997', 'vimeo', 'shopping internet,local shopping', 'Dijon, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '47.323097', '5.043547', 73, 8, 'active', 'shop', '1bca9f7f867a5f6ec3b67d0f3fc657c7.jpg', '7d3e41381d662ebadb1e4309ffe042d6.jpg', 'shopping mall,shopping centre,cineshop', '1557792000', NULL, 0, NULL),
(25, '714f4d4fd6ceda7d8837537d2ccde0e8', 'Le Printemps de Marnie', 'Our store principal business is carried out by retail trade. Here people get delivery of goods or other product services. It differs from a convenience store or corner shop in that it will be the main shop for the community rather than a convenient supplement.', '[\"18\",\"22\",\"21\",\"23\"]', '[\"1\",\"6\",\"11\",\"12\",\"16\"]', '[\"fd708e1ecfc422c5b8411150ddfc9c24.jpg\",\"25b69d0acc08ec348f8993e019cc65cd.jpg\",\"7e0fbe2025b33b94cce5660ad502d327.jpg\",\"59d0d3bef283eb833ca13b8771c6f35e.jpg\",\"698208a119804374429dcea235f219fa.jpg\",\"b97bd4d66bd2479868229dc1c920fc0e.jpg\"]', 'https://vimeo.com/188840379', 'vimeo', 'international shopping,web shopping', 'Nantes, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '47.214805', '-1.554298', 73, 9, 'active', 'shop', '32d56d76f7a9def59cc488ab34d4cc6e.jpg', 'fac9fbd3da90f352062f97a851328a87.jpg', 'shopping internet,online shopping stores,shopping list', '1557792000', NULL, 1, NULL),
(26, '4d0f4c9d48f91c5b3f94cce5287e742e', 'BODYHIT CLUB NANTES', 'It is a unique lifestyle program designed to achieve every individual member’s respective health and fitness goals. Whether our members are beginners or enthusiasts, every program, product, and experience we offer begins and ends with creating a premier and comfortable atmosphere tailored for their individual and overall success and safety.', '[\"27\",\"35\",\"33\",\"30\"]', '[\"5\",\"6\",\"9\",\"16\"]', '[\"79f3c64201c305e417cccef9388748c7.jpg\",\"088a94f5b37f7e4057992d362ef62c41.jpg\",\"b35c33a9823c7fcd11a70b24d7fa1ff4.jpg\",\"3110a6f80a83e78fc2a69715e4fb39f2.jpg\",\"9840f70df9fba8ac1bb60718609d9c3d.jpg\",\"7f2ce914460df764c3c79ddad51fb983.jpg\"]', 'https://vimeo.com/257366224', 'vimeo', 'gym,local gyms', 'Nantes, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '47.217870', '-1.555153', 73, 9, 'active', 'general', '490659db2cfa1dff865d6f7adbca2437.jpg', '0548984f3f63140be258b61af62e0eea.jpg', 'gym membership,fitness club,gym fitness', '1557878400', NULL, 0, NULL),
(27, '9a73f60883399b1c4fd6ffac30f0be27', 'Affordable Yoga & Fitness', 'It is a unique lifestyle program designed to achieve every individual member’s respective health and fitness goals. Whether our members are beginners or enthusiasts, every program, product, and experience we offer begins and ends with creating a premier and comfortable atmosphere tailored for their individual and overall success and safety.', '[\"27\",\"29\",\"28\",\"33\"]', '[\"5\",\"6\",\"7\",\"16\"]', '[\"6d3cf1dd813c08bbc11f75f1c14a2a99.jpg\",\"c12cd448df731269efca0ddcdfef8892.jpg\",\"bb0ca29faa303d459aa8e663aa95292b.jpg\",\"0af28f79d83fdfb2d5e6d99c1abd494d.jpg\",\"18a13c257165925631fa71d1b3237146.jpg\",\"9e446c40143e691d5f97f90b78f479f8.jpg\"]', 'https://vimeo.com/164921647', 'vimeo', 'gym exercise,gym membership cost', 'Paris, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.824265', '2.326032', 73, 1, 'active', 'general', 'b2385d7d47be86131f821eda7d30de38.jpg', '74488b78edda84ad09f384217ae493e6.jpg', 'health clubs,gym website,family fitness center', '1557878400', NULL, 0, NULL),
(28, 'c57b0f8ba9084cb7cdd3d507cf7336e2', 'Au Vrai Normand', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"1\",\"7\",\"2\"]', '[\"4\",\"11\",\"15\"]', '[\"3d74c4768b911cc17f8220f9301107e7.jpg\",\"50126c8509a9a0842b293dda0af0d509.jpg\",\"c8e474c2e1617f95b8c28ea1d8006010.jpg\",\"3085db6f40276bcab77f6a03008944e9.jpg\",\"99da4b64695a83f3a6f03eed3fc4bfc9.jpg\",\"c1d572d51267ef92da7888f667967e9a.jpg\"]', 'https://vimeo.com/178439907', 'vimeo', 'brunch buffet,breakfast menu', 'Villers-Bocage, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '49.110621', '-0.660500', 73, 9, 'active', 'restaurant', '83b6cf27f6484e3e6dafacefa5eef7e9.jpg', '7830294b89bb53718a9c2e2c0eab5b64.jpg', 'resto ,bar cuisine,formal dining', '1557619200', 1557619200, 0, NULL),
(29, 'c20ff1f0374d862b19bcbc10abc586f5', 'Beverly Hills Studios Riviera', 'It is a unique lifestyle program designed to achieve every individual member’s respective health and fitness goals. Whether our members are beginners or enthusiasts, every program, product, and experience we offer begins and ends with creating a premier and comfortable atmosphere tailored for their individual and overall success and safety.', '[\"27\",\"34\",\"31\",\"35\"]', '[\"6\",\"9\",\"16\"]', '[\"c78aa4caae13ab203be7d189150ea535.jpg\",\"7880b908d754d39d46205701d685cd19.jpg\",\"67d3651984f06645c2939ff3ffabd07b.jpg\",\"2b181724b414d7e2155e4e16e5a2a689.jpg\",\"4b5935dc96b6d35159b83746c784150e.jpg\",\"5fef242b113a7a4e1b4f01a758e625e7.jpg\",\"42ae576aece17f17a72f806d2f377c5b.jpg\"]', 'https://vimeo.com/177130731', 'vimeo', 'club gym,fitness step,fitness trainers', 'Nice, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.700286', '7.270635', 73, 3, 'active', 'general', 'c4c8a7a043df81915ee674580e4cbb5a.jpg', '7a746ff17320e67c55855341f0b15300.jpg', 'athletic center,local fitness centers,the fitness club', '1557878400', 1566259200, 0, ''),
(30, '33cff7ebe32ee90fd2e2d32977ea8592', 'Le Celtic', 'We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. Our Matunuck Oysters are grown in Potter Pond right off our waterfront patio and many of our herbs and vegetables are grown in our vegetable farm on the north end of the pond.', '[\"9\",\"5\",\"1\"]', '[\"7\",\"14\",\"15\"]', '[\"aa45f4387e3e44caaabd12b3de4d9faa.jpg\",\"d3f7ff5db36159ca3e8a2d7ec09c670f.jpg\",\"4e138bec5f0320ebe8b231734d0c5b55.jpg\",\"1c9b8fab15df27d5d70be2bb5cc64568.jpg\",\"e6884190fb371141dd4c6659372cfac4.jpg\"]', 'https://vimeo.com/178439907', 'vimeo', 'romantic dinner,american cuisine', 'Alençon, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.430913', '0.083520', 73, 4, 'active', 'restaurant', '7dd0022ddbf38852db21fb3cfc3e85a0.jpg', '2ad3c7cc184f2c70265ab0ede99a6d34.jpg', 'bar menu,fine dining,romantic meal ideas', '1557619200', 1557619200, 0, NULL),
(31, '778d2c424c74a89c2d95f14cde52830c', 'The Beauty Shop', 'The Beauty Shop was created on October 2, 2011 by Gaëlle. The concept is simple, as indicated by its slogan &quot;Esthetics and tasteful music&quot;.\r\n\r\nIt is a beauty salon where we find all the classic services, but in a totally different atmosphere. Here we are pampered, we talk, we get acquainted by listening to good music, mainly rock&#039;n&#039;roll and all this in a frame straight out of the 50s! Why? Because Gaëlle likes it and wants to share it with her clients! She will relax, take care of your body, your hands, your feet, your face and comfort you with your heartaches! Joana accompanies him in this beautiful adventure! ', '[\"37\",\"42\",\"43\",\"44\",\"38\"]', '[\"3\",\"4\",\"5\",\"6\",\"8\",\"16\"]', '[\"1d371722fcbf9626d9e38beca3f4335c.jpg\",\"5a8d69eff0fb05de82e4865db6a3119a.jpg\",\"7c2e376f157a770b4ce6a73dad07ad5e.jpg\",\"cfa4fdfde6c56577cfbbe63028b946fb.jpg\",\"0a05afcd81e8d503a90a65c6041885b8.jpg\",\"653713c1fb995c7d8edd3fdd791f3512.jpg\"]', 'https://vimeo.com/32195486', 'vimeo', 'Beauty salon,Spa,Massage,Nail treatment ', 'Lyon, France', 'yourbusiness@example.com', '+48929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '45.773751', '4.856175', 73, 2, 'active', 'beauty', '0ffcd6e989a5d5a5192545fb3b91eedb.jpg', '429b189aa589e7118caf5794389eb92b.jpg', 'Beauty salon,Beauty parlour,Make up,Spa,Nail treatment ', '1566259200', 1566950400, 1, ''),
(32, 'd04cdfbd8c45d2f7627c6d88db52c779', 'Beauty Clarene Marseille', 'We believe in beauty with a conscience. We have created a shop that offers the highest quality beauty services in a setting that is healthier for the environment, our guests and our staff. It is our goal to exceed your expectations. Come experience a family atmosphere where you come as guests and leave as friends. Our staff is highly trained with diversity in all aspects of Hair, Waxing, and Massage.', '[\"37\",\"43\",\"39\",\"38\",\"41\",\"42\"]', '[\"1\",\"3\",\"6\",\"7\",\"12\",\"16\"]', '[\"2f8701f5d8ce92183db089f4587837be.jpg\",\"0b889d0dd9d31be6d1300b95eb4e550c.jpg\",\"0125cac5caad7118fde0734716dfc507.jpg\",\"511125b432e845a7cd4ee79460f620cf.jpg\",\"a4c65acd902e00fce1795a78e5c0d8ae.jpg\",\"631ea11496bb2bcad5994dc72647002a.jpg\",\"9aa64f141e61d0abf50e7b02694bdda0.jpg\"]', 'https://vimeo.com/220346904', 'vimeo', 'beauty,salon,spa,hair salon', 'Marseille, France', 'yourbusiness@example.com', '+4892948560', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '43.287986', '5.365483', 73, 4, 'active', 'beauty', 'dfe0d5caea1fa7711864881191cb9f5f.jpg', '1ee6206e78fcf65ac56aa78530fcaebf.jpg', 'Beauty salon,Skin treatments,spa,Make up', '1566259200', 1566950400, 0, ''),
(33, '812f5ddc0ca1de97634afc162f255f33', 'Mix Beauty Paris', 'We believe in beauty with a conscience. We have created a shop that offers the highest quality beauty services in a setting that is healthier for the environment, our guests and our staff. It is our goal to exceed your expectations. Come experience a family atmosphere where you come as guests and leave as friends. Our staff is highly trained with diversity in all aspects of Hair, Waxing, and Massage.', '[\"37\",\"38\",\"45\",\"44\",\"40\",\"41\"]', '[\"3\",\"4\",\"5\",\"6\",\"8\",\"16\"]', '[\"a275d50cd3e823e24bbe80b6b5acbc22.jpg\",\"2d206d79098cd3b7dc0938e66fe73f4e.jpg\",\"24a220bfce620bcebe0454a7bef0bdc4.jpg\",\"e0bf63d9e04e09452f5ed39877d1856f.jpg\",\"5c3c303bfec7b3c0a0391fce21e9fb7d.jpg\",\"310e2a76852a709995cde744c8cb6677.jpg\",\"b1b837d6ddd64dc8e9f8aee58982e0af.jpg\"]', 'https://vimeo.com/132032546', 'vimeo', 'salon,spa,manicure,hair', 'Paris, France', 'yourbusiness@example.com', '+4929485960', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '48.859530', '2.345712', 73, 1, 'active', 'beauty', '7beea46563eec08f16fa1d56b7ac1026.jpg', 'c243e0c6dc04383d8e214d1889a4ea8d.jpg', 'Hair styling ,Barber,Manicure,Spa treatments', '1566259200', 1566950400, 1, ''),
(34, '1295fd64d32d7f39683fa9a0e476a72e', 'Sorong Coiffure barber man', 'We believe in beauty with a conscience. We have created a shop that offers the highest quality beauty services in a setting that is healthier for the environment, our guests and our staff. It is our goal to exceed your expectations. Come experience a family atmosphere where you come as guests and leave as friends. Our staff is highly trained with diversity in all aspects of Hair, Waxing, and Massage.', '[\"37\",\"38\",\"39\",\"41\",\"45\"]', '[\"5\",\"6\",\"7\",\"11\",\"16\"]', '[\"5cafffeddd9f42f18ed3f16e77a27345.jpg\",\"33629b0f95e13abcca41e97cefabab97.jpg\",\"686806e37608ab1ce831fa7bca0c3e66.jpg\",\"e8e4773fb55e26dca56b87f32a0f022a.jpg\",\"7d9e94751eb400ab5c13ce77490169a5.jpg\",\"a1f600cb9729f8bf8554e40fbab156e1.jpg\",\"37ee43fbb88cca2a95c2ff7cb6ebec36.jpg\"]', 'https://vimeo.com/163180524', 'vimeo', 'Hair styling,Barber ,salon', 'Nantes, France', 'yourbusiness@example.com', '+35456467897', 'http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 1, '47.216451', '-1.551938', 73, 9, 'active', 'beauty', '25f4f72faad60a952eec218b2cd34ea2.jpg', '1c81a9abb4ca5fffcf287f5700864c3b.jpg', 'Hair styling ,Hair cut ,Barber,Hair salon', '1566259200', 1566950400, 0, ''),
(35, '4f9c55236733549020f46ee96da28386', 'Le local_barbershop', 'We believe in beauty with a conscience. We have created a shop that offers the highest quality beauty services in a setting that is healthier for the environment, our guests and our staff. It is our goal to exceed your expectations. Come experience a family atmosphere where you come as guests and leave as friends. Our staff is highly trained with diversity in all aspects of Hair, Waxing, and Massage.', '[\"37\",\"45\",\"38\",\"44\"]', '[\"3\",\"5\",\"6\",\"7\",\"11\",\"16\"]', '[\"f27378a95a7a4a909240e93f1886948c.jpg\",\"45e61c1dfcf8484e5e9ee98d875df917.jpg\",\"efb23e5fe468032faafa6ba4d18d6adc.jpg\",\"29344fa848a8b2863f66eddfd1c4ea02.jpg\",\"05f4b11784e950a6366953a7a0af8baa.jpg\",\"e563d8c12f4b35d8d41e759a24929f35.jpg\"]', 'https://vimeo.com/181714626', 'vimeo', 'salon,hair style,Spa salon', 'Nice, France', 'yourbusiness@example.com', '+48929485960', ' http://yourcompany.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 2, '43.702070', '7.272992', 73, 3, 'active', 'beauty', '1b77a2761f84fd274a2f17c234710b5b.jpg', 'c6a0d2b67354d7eddd325d980c62a9f2.jpg', 'Barbershop,Beauty salon,Hair salon,Hairdresser ', '1566432000', 1566950400, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `validity` int(11) NOT NULL DEFAULT '0' COMMENT 'validity should be in days',
  `ability_to_add_video` int(11) NOT NULL DEFAULT '0',
  `ability_to_add_contact_form` int(11) NOT NULL DEFAULT '0',
  `number_of_photos` int(11) NOT NULL DEFAULT '0',
  `number_of_tags` int(11) NOT NULL DEFAULT '0',
  `number_of_categories` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `package_type` int(11) NOT NULL DEFAULT '0',
  `number_of_listings` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `price`, `validity`, `ability_to_add_video`, `ability_to_add_contact_form`, `number_of_photos`, `number_of_tags`, `number_of_categories`, `is_recommended`, `package_type`, `number_of_listings`, `featured`) VALUES
(1, 'Free', 0, 10, 0, 0, 4, 4, 1, 0, 0, 1, 0),
(2, 'Premium', 65, 60, 1, 1, 8, 10, 5, 1, 1, 5, 1),
(3, 'Ultimate', 95, 90, 1, 1, 12, 20, 10, 0, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_purchased_history`
--

DROP TABLE IF EXISTS `package_purchased_history`;
CREATE TABLE `package_purchased_history` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` int(11) DEFAULT NULL,
  `amount_paid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_date` int(11) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_purchased_history`
--

INSERT INTO `package_purchased_history` (`id`, `package_id`, `user_id`, `expired_date`, `amount_paid`, `purchase_date`, `payment_method`) VALUES
(1, 3, 2, 1560470400, '95', 1557878400, 'stripe'),
(2, 1, 2, 1562803200, '0', 1561939200, 'free'),
(3, 1, 2, 1562803200, '0', 1561939200, 'free'),
(4, 2, 2, 1567123200, '65', 1561939200, 'paypal'),
(5, 3, 2, 1574726400, '95', 1566950400, 'stripe');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant` longtext COLLATE utf8_unicode_ci,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `listing_id`, `name`, `variant`, `price`, `photo`) VALUES
(1, 3, 'Smart Watch', 'Fashion Sports Band,CF18,Black', '59', 'ff33a601dd6baf2677e400772b75a12a.jpg'),
(3, 3, 'ECCO Men\'s St1 Sneaker', 'Medium,White Perforated,Black/Black Perforated', '99', '6a4a247596548be41af20e101b222e84.jpg'),
(4, 7, 'Erigaray Classic Fedora Straw Hat', 'Medium,Large,Brown,Black,Red', '55', '4b4cfa1095d6c6763479368bc3f9be38.jpg'),
(5, 7, 'Women High Heel Sandals', 'Black,Gold,Large', '100', '7996afc5bccf75c129c79efb8e11db9c.jpg'),
(6, 21, 'Waterproof Quartz Analog Watch', 'Black Red,Blue Black,Gold Black', '79', 'aedac2e3dfcefc48658f0e28d8bf533a.jpg'),
(7, 21, 'Party Solid Color Shoes', 'Hot Pink,Gold,Silver', '89', '91f13737f14cc747d5ada666d1002c08.jpg'),
(8, 24, 'DC Men\'s Court Graffik Skate Shoe', 'Black/Lime,Navy White,Dark Blue,Medium', '69', '8cba2b7107eb6c5342b65dbd713f4669.jpg'),
(9, 24, 'Headshion Skull Cap', 'Black & Gray,Unisex,Multipurpose Headwear', '50', 'e2fbb6150378084692a342894e7b49d4.jpg'),
(10, 25, 'Sam Edelman Women\'s Ariella Heeled Sandal', 'Tangelo Patent,Bright White Leather,Candy Red,Medium,Small', '150', '106d8fc952b474928191c163275c9588.jpg'),
(11, 25, 'Fitness Tracker Watch', 'Rosegold,Steelblack,Steelblue,Water Resistant:', '89', 'bf03287bef8a3016daae9ffeb01f1a9d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reported_listing`
--

DROP TABLE IF EXISTS `reported_listing`;
CREATE TABLE `reported_listing` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL DEFAULT '0',
  `reporter_id` int(11) NOT NULL DEFAULT '0',
  `report` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `review_comment` longtext COLLATE utf8_unicode_ci,
  `review_rating` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `listing_id`, `reviewer_id`, `review_comment`, `review_rating`, `timestamp`) VALUES
(1, 1, 2, 'This is an extremely beautiful place to enjoy with family and friends', 5, 1557705600),
(2, 1, 2, ' The staff is welcoming and very jovial! The dishes are very good. Good value for money!', 5, 1557878400),
(3, 1, 2, 'Staff really very welcoming, meal and service well done even at times when the restaurant is crowded. Very good management.', 5, 1557878400),
(4, 6, 2, 'Beautiful room, comfortable bed, excellent location, great breakfast, the owner is the perfect host, parking provided for the car, soft towels, good quality sheets, complimentary water, charming hotel.', 5, 1557878400),
(5, 6, 2, 'Beautiful, elegant rooms. Fabulous wooden beams. Very comfortable, clean and spacious. High ceilings. Great bathroom. Gated off-street parking. Perfectly positioned to wander into the old town centre on foot. Everything you want to see within easy walking distance. Expensive but worth the price.', 5, 1557878400),
(6, 7, 2, 'Every time I visit Paris, I go to Galerie Vivienne. The wine shop, the Bistro, and the bookstore are amazing, and the Consignment clothing stores are fantastic. The architecture is beautiful!', 5, 1557878400);

-- --------------------------------------------------------

--
-- Table structure for table `review_wise_quality`
--

DROP TABLE IF EXISTS `review_wise_quality`;
CREATE TABLE `review_wise_quality` (
  `id` int(11) NOT NULL,
  `rating_from` float DEFAULT NULL,
  `rating_to` float DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_wise_quality`
--

INSERT INTO `review_wise_quality` (`id`, `rating_from`, `rating_to`, `quality`) VALUES
(1, 1, 1.5, 'Bad!!'),
(2, 1.6, 2.8, 'Not Bad'),
(3, 2.9, 3.4, 'So So'),
(4, 3.5, 4.5, 'Good'),
(5, 4.6, 5, 'Awesome');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`) VALUES
(1, 'website_title', 'My listing'),
(2, 'system_title', 'ATLAS Directory Listing CMS'),
(4, 'system_email', 'company@example.com'),
(5, 'address', 'New York'),
(6, 'phone', '1234567890'),
(7, 'vat_percentage', ''),
(8, 'country_id', '5'),
(9, 'text_align', ''),
(10, 'currency_position', 'left'),
(11, 'language', 'english'),
(12, 'purchase_code', 'your-purchase-code'),
(13, 'timezone', 'Africa/Abidjan'),
(14, 'paypal', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"1234\"}]'),
(15, 'stripe', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(16, 'recaptcha_site_key', '6LfV-p4UAAAAANQN9JwL1vDTH7D1FFEpqOkCr3HU'),
(17, 'recapthca_secret_key', '6LfV-p4UAAAAALgG78gd9FeeNoFr4i2n4km86lyc'),
(18, 'system_currency', 'USD'),
(19, 'paypal_currency', 'USD'),
(20, 'stripe_currency', 'USD'),
(21, 'youtube_api_key', ''),
(22, 'vimeo_api_key', ''),
(23, 'protocol', 'sendmail'),
(24, 'smtp_host', 'ssl://smtp.googlemail.com'),
(25, 'smtp_port', '465'),
(26, 'smtp_user', ''),
(27, 'smtp_pass', ''),
(28, 'social_links', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}'),
(29, 'about', ''),
(30, 'term_and_condition', ''),
(31, 'privacy_policy', ''),
(32, 'faq', ''),
(35, 'version', '1.2');

-- --------------------------------------------------------

--
-- Table structure for table `time_configuration`
--

DROP TABLE IF EXISTS `time_configuration`;
CREATE TABLE `time_configuration` (
  `id` int(11) UNSIGNED NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `saturday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sunday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tuesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wednesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thursday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_configuration`
--

INSERT INTO `time_configuration` (`id`, `listing_id`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
(1, 1, '5-22', '2-17', '11-15', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed'),
(2, 2, '14-22', 'closed-closed', '14-22', '15-22', '15-22', '15-22', '15-22'),
(3, 3, 'closed-closed', '11-21', '11-21', '15-21', '15-21', '17-20', '17-20'),
(4, 4, '9-19', '8-19', '8-20', '10-20', '10-20', '10-20', '10-20'),
(5, 5, '9-20', 'closed-closed', '9-20', '11-9', '11-21', '11-21', '11-21'),
(6, 6, '14-22', '14-21', '16-21', '16-22', '16-22', '14-23', '18-23'),
(7, 7, '10-23', '10-22', '19-22', '19-21', '15-21', '15-23', '15-23'),
(8, 8, '14-21', '18-23', '15-21', '15-20', '15-23', '16-22', '17-22'),
(9, 9, 'closed-closed', '11-17', '10-18', '8-18', '9-20', '8-20', '9-20'),
(10, 10, '8-22', '12-20', '12-20', '11-22', '8-21', '9-20', '9-22'),
(11, 11, 'closed-closed', '7-23', '8-23', '8-22', '7-22', '7-23', '7-23'),
(12, 12, '6-23', '6-0', '8-23', '7-22', '7-22', '8-22', '7-22'),
(13, 13, '7-21', '7-22', '8-23', '8-23', '7-23', '7-23', '8-23'),
(14, 14, '7-23', '7-23', '8-23', '8-23', '7-23', '7-22', '8-22'),
(15, 15, '7-23', '7-23', '9-22', '8-22', '8-22', '9-22', 'closed-closed'),
(16, 16, '8-23', '8-22', '7-23', '7-22', '8-23', '8-21', '8-23'),
(17, 17, '7-22', '7-22', '8-23', '8-23', 'closed-closed', '9-22', '8-22'),
(18, 18, '7-21', '7-22', '8-0', '8-21', '8-21', 'closed-closed', '9-22'),
(19, 19, '7-23', '8-22', '8-22', 'closed-closed', '9-22', '9-22', '9-22'),
(20, 20, '7-21', '7-23', '8-22', '8-22', '8-23', '8-22', '9-23'),
(21, 21, 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed'),
(22, 21, 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed', 'closed-closed'),
(23, 22, '8-23', 'closed-closed', '8-21', '8-22', '8-23', '9-20', '9-22'),
(24, 23, '8-22', '9-22', '9-21', 'closed-closed', '11-23', '11-22', '10-23'),
(25, 24, '9-22', '9-23', '8-21', '8-22', '9-22', '9-22', '9-23'),
(26, 25, '9-20', '9-22', '11-20', '9-20', 'closed-closed', '11-21', '11-23'),
(27, 26, '12-21', 'closed-closed', '11-22', '12-20', '11-21', '11-22', '10-21'),
(28, 27, '13-21', '12-21', '11-22', '14-22', '9-23', '11-22', '12-23'),
(29, 28, '11-21', '10-21', '10-21', '12-21', '11-21', '10-22', '12-23'),
(30, 29, '14-22', '15-23', '12-22', '12-21', '15-22', '14-23', '14-23'),
(31, 30, '10-22', '14-21', '12-21', '12-20', '12-20', '14-23', '14-22'),
(32, 31, '9-19', '9-closed', '9-21', '9-21', '9-21', '9-21', '9-21'),
(33, 32, '9-19', 'closed-closed', '9-20', '9-20', '9-20', '9-20', '9-20'),
(34, 33, 'closed-closed', '10-21', '10-21', '10-21', '10-21', '9-21', '9-20'),
(35, 34, '9-20', '9-20', '9-20', '9-20', '9-20', '9-20', '9-20'),
(36, 35, '8-21', 'closed-closed', '9-21', '9-19', '9-19', '9-19', '9-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `address` longtext COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `social` longtext COLLATE utf8_unicode_ci,
  `about` longtext COLLATE utf8_unicode_ci,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `role_id` int(11) DEFAULT NULL,
  `wishlists` longtext COLLATE utf8_unicode_ci,
  `verification_code` longtext COLLATE utf8_unicode_ci,
  `is_verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `phone`, `website`, `social`, `about`, `password`, `role_id`, `wishlists`, `verification_code`, `is_verified`) VALUES
(1, 'John Doe', 'admin@example.com', NULL, '', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '[]', NULL, 1),
(2, 'Jane Doe', 'user@example.com', 'Sydney, Australia', '+284782745', NULL, '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '[\"4\",\"24\",\"21\",\"25\",\"26\",\"30\",\"12\",\"15\"]', '3dff0ecad9c0adb0f30d51773eff4a7f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beauty_service`
--
ALTER TABLE `beauty_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claimed_listing`
--
ALTER TABLE `claimed_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_room_specification`
--
ALTER TABLE `hotel_room_specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_purchased_history`
--
ALTER TABLE `package_purchased_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_listing`
--
ALTER TABLE `reported_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_wise_quality`
--
ALTER TABLE `review_wise_quality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_configuration`
--
ALTER TABLE `time_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `beauty_service`
--
ALTER TABLE `beauty_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `claimed_listing`
--
ALTER TABLE `claimed_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotel_room_specification`
--
ALTER TABLE `hotel_room_specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_purchased_history`
--
ALTER TABLE `package_purchased_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reported_listing`
--
ALTER TABLE `reported_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_wise_quality`
--
ALTER TABLE `review_wise_quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `time_configuration`
--
ALTER TABLE `time_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
