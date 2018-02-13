-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 07:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_gujjumobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) DEFAULT NULL,
  `auth_key` varchar(225) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_on`, `created_by`, `update_on`, `update_by`, `created_at`, `updated_at`) VALUES
(4, 'siteadmin', 'aAONd2OSltEigD-iKoA5ICtBUF4keYIY', '$2y$13$Lvbzf2CW4HVbv46XT9A3w.jnJczSkZvQanhyyoS2kUHqlaYrhuque', NULL, 'siteadmin@gmail.com', 10, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adpost`
--

CREATE TABLE IF NOT EXISTS `adpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adpost_id` varchar(11) NOT NULL COMMENT 'generate unqiue adpost id ',
  `adtitle` varchar(255) NOT NULL,
  `adpost_user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `model` varchar(30) DEFAULT NULL,
  `ad_desc` text NOT NULL,
  `ad_tag` varchar(255) NOT NULL,
  `adpost_username` varchar(255) NOT NULL,
  `adpost_user_mobile` varchar(20) NOT NULL,
  `city` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = unsold, 0 = sole',
  `is_archived` tinyint(1) NOT NULL DEFAULT '0',
  `is_sold` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `adpost`
--

INSERT INTO `adpost` (`id`, `adpost_id`, `adtitle`, `adpost_user_id`, `category`, `price`, `model`, `ad_desc`, `ad_tag`, `adpost_username`, `adpost_user_mobile`, `city`, `location`, `zipcode`, `created_on`, `status`, `is_archived`, `is_sold`, `is_deleted`, `updated_on`) VALUES
(1, 'ad1', 'Mi Note 4 Fresh Cover Smart Phone', 1, 1, 12000, '4', 'asdadas asdda', '', 'Jigar Prajapati', '9898399276', 1, 3, 3424234, '2018-01-23 02:16:51', 1, 0, 0, 0, NULL),
(2, 'ad2', 'Mi Note 4 Fresh Cover Smart Phone FOOBAR', 1, 1, 1800, '5', 'asdadas asdda', '', 'Jigar Prajapati Kumar', '9898399276', 1, 2, 382520, '2018-01-23 02:18:21', 0, 1, 0, 0, '2018-02-01 19:05:17'),
(3, 'ad3', 'foo bar', 1, 3, 18000, '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'Naeem Mansuri', '9632587710', 4, 2, 382520, '2018-01-23 02:24:37', 1, 0, 0, 0, '2018-02-13 19:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `ad_wishlist`
--

CREATE TABLE IF NOT EXISTS `ad_wishlist` (
  `id` int(11) NOT NULL DEFAULT '0',
  `adpost_id` int(11) NOT NULL,
  `ad_user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adpost_id` (`adpost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(225) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zipcode` int(8) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`, `city_id`, `zipcode`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, 'Virat nagar', 4, 382520, 1, '2018-01-17 19:10:08', 1, '2018-01-18 16:58:48', 1),
(3, 'FOO bar', 1, 3424234, 1, '2018-01-18 16:48:20', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `status`, `created_by`, `created_on`, `update_by`, `updated_on`) VALUES
(1, 'Ahmedabad', 1, NULL, NULL, 1, '2018-01-16 19:17:42'),
(3, 'Surat', 0, 1, '2018-01-16 19:20:48', NULL, NULL),
(4, 'Rakot', 1, 1, '2018-01-16 19:20:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `save_name` varchar(255) NOT NULL COMMENT 'store thumb image',
  `adpost_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `document_name`, `type`, `save_name`, `adpost_id`, `created_on`, `created_by`) VALUES
(1, 'Chrysanthemum.jpg', 'adpost', 'Chrysanthemum.jpg', 3, '2018-01-23 02:24:37', 1),
(2, 'Desert.jpg', 'adpost', 'Desert.jpg', 3, '2018-01-23 02:24:37', 1),
(4, 'bahubali_143918710010.jpg', 'adpost', 'bahubali_143918710010.jpg', 3, '2018-01-28 08:01:40', 1),
(5, 'bahubali_143918710020.jpg', 'adpost', 'bahubali_143918710020.jpg', 3, '2018-01-28 08:01:40', 1),
(6, 'bahubali_143918710030.jpg', 'adpost', 'bahubali_143918710030.jpg', 3, '2018-01-28 08:01:40', 1),
(7, 'bahubali_143918710020.jpg', 'adpost', 'bahubali_143918710020.jpg', 2, '2018-01-28 18:50:43', 1),
(8, 'bahubali_143918710030.jpg', 'adpost', 'bahubali_143918710030.jpg', 2, '2018-01-28 18:50:43', 1),
(9, '-wallpaper_14774846373.jpg', 'adpost', '-wallpaper_14774846373.jpg', 2, '2018-01-28 18:50:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513293753),
('m130524_201442_init', 1513293757),
('m171211_172629_mobile_model', 1513293758),
('m171214_232853_admin_table', 1513294208),
('m171216_092516_city_table', 1513416482),
('m180109_180831_area_table', 1515522141),
('m180109_182255_mobile_model_table', 1515522403),
('m180109_182402_mobile_category', 1515522403);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_category`
--

CREATE TABLE IF NOT EXISTS `mobile_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mobile_category`
--

INSERT INTO `mobile_category` (`id`, `name`, `status`, `created_by`, `created_on`, `updated_on`, `update_by`) VALUES
(1, 'MI', 1, 1, '2018-01-18 17:05:28', NULL, NULL),
(2, 'Apple', 1, 1, '2018-01-18 17:05:49', '2018-01-18 17:18:50', 1),
(3, 'Microsoft', 1, 1, '2018-01-18 17:06:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_model`
--

CREATE TABLE IF NOT EXISTS `mobile_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mobile_model`
--

INSERT INTO `mobile_model` (`id`, `category_id`, `name`, `status`, `created_by`, `created_on`, `updated_on`, `update_by`) VALUES
(1, 3, 'AS3', 1, NULL, NULL, '2018-01-18 18:35:51', 1),
(2, 1, 'note 4', 1, 1, '2018-01-18 18:39:40', NULL, NULL),
(3, 2, 'XSF', 0, 1, '2018-01-18 18:39:53', NULL, NULL),
(4, 1, 'Redmine note 3', 1, 1, '2018-01-20 02:51:46', NULL, NULL),
(5, 1, 'RedmE', 1, 1, '2018-01-20 02:52:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `photo`, `contact_number`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jigar ', 'Koala.jpg', '9898399276', 'jigar496', 't6DGxvsUi-cIuCRgNbSP-DCLaRPqzYq1', '$2y$13$nD9WKMj2iEtLpdmJxuT6eejHTRX0w/8O/EeO1QaZlE5ZsVQ46gnKy', NULL, 'jigarprajapati496@gmail.com', 10, 1513357791, 1515426235),
(2, 'Naeem', '', '9876543210', 'naeem101', 'L9abGQa-EExwytQo6prEuN11xgm8sd7Z', '$2y$13$F4AoDOTbaZ6VkYPF72CVGe3X7ebO84wOTnFPsqQk.E1X2qDhr4O82', NULL, 'mansurinaeem101@gmail.com', 10, 1514566800, 1514566800),
(3, 'JIgar Kumar', 'default.png', '9635274856', 'jigscool004', 't6DGxvsUi-cIuCRgNbSP-DCLaRPqzYq1', '$2y$13$nD9WKMj2iEtLpdmJxuT6eejHTRX0w/8O/EeO1QaZlE5ZsVQ46gnKy', NULL, 'jigscool004@gmail.com', 10, 1517249766, 1517249766);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
