-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 03:37 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agorra_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit_limit` decimal(8,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `clients_company_name_unique` (`company_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `company_name`, `company_address`, `contact_person`, `contact_number`, `email`, `credit_limit`, `balance`, `status`) VALUES
(1, 'Flashpark Inc', 'Mandaue City North Atrium', 'Hiro Takahashi', '199232323', 'flashpark@gmail.com', '100000.00', '0.00', 1);

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_26_013157_create_sessions_table', 1),
('2016_01_27_012016_create_clients_tbl', 1),
('2016_01_27_063552_create_proposal_tbl', 1),
('2016_01_27_071810_create_service_category_list', 1),
('2016_01_28_002552_create_proposalDetail_tbl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `proposal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proposal_date` date NOT NULL,
  `salesperson` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) unsigned NOT NULL,
  `file` blob NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`proposal_id`),
  KEY `proposals_salesperson_foreign` (`salesperson`),
  KEY `proposals_client_id_foreign` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`proposal_id`, `project_name`, `proposal_date`, `salesperson`, `client_id`, `total`, `file`, `status`) VALUES
(1, 'RingRob Project', '2016-01-28', 1, 1, '100000.00', 0x2f6f70742f6c616d70702f74656d702f7068707536717a646f, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proposals_detail`
--

CREATE TABLE IF NOT EXISTS `proposals_detail` (
  `proposal_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proposal_id` int(10) unsigned NOT NULL,
  `service_category_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`proposal_detail_id`),
  KEY `proposals_detail_proposal_id_foreign` (`proposal_id`),
  KEY `proposals_detail_service_category_id_foreign` (`service_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `proposals_detail`
--

INSERT INTO `proposals_detail` (`proposal_detail_id`, `proposal_id`, `service_category_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE IF NOT EXISTS `service_category` (
  `service_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`service_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_category_id`, `service_name`, `status`) VALUES
(1, 'Traffic Generation - SEO', 1),
(2, 'Traffic Generation - Social media', 1),
(3, 'Traffic Generation - PPC', 1),
(4, 'Traffic Generation - Content Marketing', 1),
(5, 'Development - Mobile', 1),
(6, 'Development - Web', 1),
(7, 'Product - Vender', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `status`) VALUES
(1, 'Filjumar Jumamoy', 'fil@gmail.com', '$2y$10$BexGpbyL5q7EohsqjUBGW.Ur1c8yFsXlKDhUU7P3QzIxEDJAvKhRO', NULL, '2016-01-27 22:20:42', '2016-01-27 22:20:42', 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `proposals_salesperson_foreign` FOREIGN KEY (`salesperson`) REFERENCES `users` (`id`);

--
-- Constraints for table `proposals_detail`
--
ALTER TABLE `proposals_detail`
  ADD CONSTRAINT `proposals_detail_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_category` (`service_category_id`),
  ADD CONSTRAINT `proposals_detail_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`proposal_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
