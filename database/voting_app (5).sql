-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2019 at 06:29 PM
-- Server version: 8.0.18-0ubuntu0.19.10.1
-- PHP Version: 7.3.11-0ubuntu0.19.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', 'Admin', NULL, '$2y$10$f8foBPeFsWRA.DeJKYpmXOfPNTyWcPujBrXQmpG.E6No1a9L8PNuq', NULL, '2019-11-19 07:00:23', '2019-11-19 07:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `fname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthPlace` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthCountry` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fathername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `eyesColor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` double NOT NULL,
  `mobile` double NOT NULL,
  `emergencyContact` double NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazilla_id` int(11) DEFAULT NULL,
  `union_id` int(11) DEFAULT NULL,
  `rmo_id` int(11) DEFAULT NULL,
  `rmo_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constituencies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_certificates`
--

INSERT INTO `birth_certificates` (`id`, `bid`, `fname`, `mname`, `lname`, `birthPlace`, `birthCountry`, `dateOfBirth`, `fathername`, `mothername`, `height`, `eyesColor`, `sex`, `telephone`, `mobile`, `emergencyContact`, `address`, `address2`, `created_at`, `updated_at`, `division_id`, `district_id`, `upazilla_id`, `union_id`, `rmo_id`, `rmo_type`, `constituencies_id`) VALUES
(8, 435837787, 'test', 'testm', 'testb', 'sdfsfdf', 'sfsf', '2000-12-01', 'sdfsdf', 'dfsdf', 343, 'sdfsf', 'male', 234, 34234, 342423, 'sdfd', 'sfsdfdf', '2019-12-03 09:07:39', '2019-12-03 14:44:00', 3, 1, 1, 1, 1, 'city', 1),
(9, 479992748, 'test 2', 'sdfs', 'dfsdf', 'sdf', 'sdf', '2019-12-01', 'sdfsdf', 'sdfsdf', 343, 'sdfdf', 'sdfdf', 34534, 53454, 35345, 'ddfsdf', 'sdffs', '2019-12-03 12:14:35', '2019-12-03 12:14:35', 3, 1, 1, 1, 1, 'city', 1),
(10, 144831432, 'test 3', 'sdf', 'dfgh', 'hjghj', 'ghjghj', '2019-11-12', 'xcgj', 'ghjg', 565, 'fghfh', 'fh', 456456, 456456, 6556, 'fhfgh', 'fghfgh', '2019-12-03 12:19:57', '2019-12-03 12:19:57', 3, 1, 2, 3, 4, 'polli', 2);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'candidate id',
  `election_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_detail` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `subadmin_id` int(11) NOT NULL COMMENT 'party id',
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazilla_id` int(11) NOT NULL,
  `union_id` int(11) NOT NULL,
  `rmo_id` int(11) NOT NULL,
  `constituencies_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `fullname`, `user_id`, `election_id`, `election_type`, `election_detail`, `position_id`, `position_name`, `subadmin_id`, `division_id`, `district_id`, `upazilla_id`, `union_id`, `rmo_id`, `constituencies_id`, `created_at`, `updated_at`) VALUES
(3, 'test testm testb', '15', '7', 'City', 5, 2, 'Mayor', 1, 3, 1, 1, 1, 1, 1, '2019-12-03 18:23:01', '2019-12-03 18:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_requests`
--

CREATE TABLE `candidate_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'candidate id',
  `election_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_detail` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `subadmin_id` int(11) NOT NULL COMMENT 'party id',
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazilla_id` int(11) NOT NULL,
  `union_id` int(11) NOT NULL,
  `rmo_id` int(11) NOT NULL,
  `constituencies_id` int(11) NOT NULL,
  `approved_by_party` int(11) NOT NULL DEFAULT '0',
  `approved_by_ec` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_requests`
--

INSERT INTO `candidate_requests` (`id`, `fullname`, `user_id`, `election_id`, `election_type`, `election_detail`, `position_id`, `position_name`, `subadmin_id`, `division_id`, `district_id`, `upazilla_id`, `union_id`, `rmo_id`, `constituencies_id`, `approved_by_party`, `approved_by_ec`, `created_at`, `updated_at`) VALUES
(5, 'test testm testb', '15', '7', 'City', 5, 2, 'Mayor', 1, 3, 1, 1, 1, 1, 1, 1, 1, '2019-12-03 17:56:31', '2019-12-03 18:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `division_id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Dhaka 1', NULL, NULL),
(2, 3, 1, 'Dhaka 2', NULL, NULL),
(3, 3, 9, 'Narayanganj 1', NULL, NULL),
(4, 3, 9, 'Narayanganj 2', NULL, NULL),
(5, 4, 12, 'Bagerhat 1', NULL, NULL),
(6, 4, 13, 'Satkhira 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corrections`
--

CREATE TABLE `corrections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `fname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthPlace` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthCountry` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fathername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `eyesColor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` double NOT NULL,
  `mobile` double NOT NULL,
  `emergencyContact` double NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazilla_id` int(11) DEFAULT NULL,
  `union_id` int(11) DEFAULT NULL,
  `rmo_id` int(11) DEFAULT NULL,
  `rmo_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constituencies_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `did` bigint(20) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `did`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka', NULL, NULL),
(9, 3, 'Narayanganj ', NULL, NULL),
(12, 4, 'Bagerhat', NULL, NULL),
(13, 4, 'Satkhira', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Dhaka Division', NULL, NULL),
(4, 'Khulna Division', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`, `election_type`, `date`, `start`, `end`, `created_at`, `updated_at`) VALUES
(5, 'Perlament Election 2019', 'Perlament', '2019-12-04', '12:00:00', '13:00:00', '2019-12-01 23:34:56', '2019-12-01 23:34:56'),
(7, 'City Eleciton 2019', 'City', '2019-12-04', '00:00:00', '02:00:00', '2019-12-01 23:45:43', '2019-12-01 23:45:43'),
(8, 'Union Election 2019', 'Union', '2019-12-06', '01:00:00', '02:00:00', '2019-12-02 20:44:39', '2019-12-02 20:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `election_details`
--

CREATE TABLE `election_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zone_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_details`
--

INSERT INTO `election_details` (`id`, `election_id`, `position`, `position_name`, `zone_type`, `zone`, `created_at`, `updated_at`) VALUES
(4, 5, 1, 'Member of Parliament(MP)', 'constituencies', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', '2019-12-01 23:34:56', '2019-12-01 23:34:56'),
(5, 7, 2, 'Mayor', 'rmo', 'a:1:{i:0;s:1:\"1\";}', '2019-12-01 23:45:43', '2019-12-01 23:45:43'),
(6, 7, 3, 'Commissioner ', 'ward', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2019-12-01 23:45:43', '2019-12-01 23:45:43'),
(7, 8, 4, 'Chairman', 'union', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}', '2019-12-02 20:44:39', '2019-12-02 20:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `election_types`
--

CREATE TABLE `election_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_types`
--

INSERT INTO `election_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'National', NULL, NULL),
(2, 'City', NULL, NULL),
(3, 'Upazilla', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_18_041942_create_admins_table', 2),
(5, '2019_11_19_071336_create_admins_table', 3),
(6, '2019_11_23_053553_create_birth_certificates_table', 4),
(8, '2019_11_24_154409_create_corrections_table', 5),
(9, '2019_11_25_124345_create_votes_table', 6),
(10, '2019_11_25_125624_create_parliaments_table', 6),
(11, '2019_11_25_131100_create_political__parties_table', 6),
(13, '2019_11_26_144727_create_divisions_table', 7),
(14, '2019_11_26_145254_create_districts_table', 8),
(15, '2019_11_26_151723_create_election_types_table', 9),
(16, '2019_11_26_153055_create_positions_table', 10),
(17, '2019_11_26_190134_create_subadmins_table', 11),
(19, '2019_11_27_021838_create_sub_admins_table', 12),
(20, '2019_11_27_050050_create_upazillas_table', 12),
(21, '2019_11_27_050546_create_thana__upazillas_table', 13),
(22, '2019_11_27_052849_create_wards_table', 14),
(23, '2019_11_27_052908_create_unions_table', 14),
(24, '2019_11_27_052947_create_parliamentary__constituencies_table', 14),
(25, '2019_11_27_060223_create_contituencies_details_table', 14),
(28, '2019_11_27_161931_create_pendings_table', 15),
(29, '2019_11_30_043502_create_rmos_table', 16),
(30, '2019_11_30_145735_create_rmo_areas_table', 17),
(31, '2019_11_30_160652_create_constituencies_table', 18),
(32, '2019_12_01_172824_create_elections_table', 19),
(33, '2019_12_02_050356_create_election_details_table', 19),
(34, '2019_11_25_142135_create_candidates_table', 20),
(35, '2019_12_02_183116_create_candidate_requests_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendings`
--

CREATE TABLE `pendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birthCertificate_id` bigint(20) DEFAULT NULL,
  `fname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthPlace` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthCountry` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fathername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `eyesColor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` double NOT NULL,
  `mobile` double NOT NULL,
  `emergencyContact` double NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `political__parties`
--

CREATE TABLE `political__parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `election_type`, `range`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Perlament', 'constituencies', 'Member of Parliament(MP)', NULL, NULL),
(2, 'City', 'rmo', 'Mayor', NULL, NULL),
(3, 'City', 'ward', 'Commissioner ', NULL, NULL),
(4, 'Union', 'union', 'Chairman', NULL, NULL),
(5, 'Union', 'union', 'Member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmos`
--

CREATE TABLE `rmos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rmos`
--

INSERT INTO `rmos` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka North City Corporation', 'city', NULL, NULL),
(2, 'Dhaka South City Corporation', 'city', NULL, NULL),
(3, 'Narayangonj City Corporation', 'city', NULL, NULL),
(4, 'Polli', 'polli', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `job_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `name`, `email`, `email_verified_at`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Awami League', 'awamileague@mail.com', NULL, 'Political Party', '$2y$10$2eMdnYwxelOSFHLYbFiFhOQMvgCSBNWR6Tr14vXp1zDXilvfsZkfa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazilla_id` int(11) NOT NULL,
  `rmo_id` int(11) DEFAULT NULL,
  `rmo_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `constituencies_id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `division_id`, `district_id`, `upazilla_id`, `rmo_id`, `rmo_type`, `constituencies_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 'city', 1, 'ward 1', NULL, NULL),
(2, 3, 1, 1, 1, 'city', 1, 'ward 2', NULL, NULL),
(3, 3, 1, 2, 4, 'polli', 2, 'Ashulia', NULL, NULL),
(4, 3, 1, 2, 4, 'polli', 2, 'Kaundia', NULL, NULL),
(5, 3, 1, 3, 4, 'polli', 1, 'Zinjira', NULL, NULL),
(6, 3, 1, 3, 4, 'polli', 1, 'Taranagar', NULL, NULL),
(7, 3, 1, 4, 2, 'city', 2, 'ward 1', NULL, NULL),
(8, 3, 1, 4, 2, 'city', 2, 'ward 2', NULL, NULL),
(9, 3, 9, 5, 3, 'city', 3, 'ward 1', NULL, NULL),
(10, 3, 9, 5, 3, 'city', 3, 'ward 2', NULL, NULL),
(11, 3, 9, 6, 3, 'city', 4, 'ward 3', NULL, NULL),
(12, 3, 9, 6, 3, 'city', 4, 'ward 4', NULL, NULL),
(13, 3, 9, 7, 4, 'polli', 4, 'Rupganj', NULL, NULL),
(14, 4, 12, 8, 4, 'polli', 5, 'Chitalmar', NULL, NULL),
(15, 4, 13, 9, 4, 'polli', 6, 'Assasuni', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `rmo_id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `division_id`, `district_id`, `rmo_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 'Khilgaon', NULL, NULL),
(2, 3, 1, 4, 'Savar', NULL, NULL),
(3, 3, 1, 4, 'Keraniganj', NULL, NULL),
(4, 3, 1, 1, 'Jatrabari', NULL, NULL),
(5, 3, 9, 3, 'Shiddhirganj', NULL, NULL),
(6, 3, 9, 3, 'Narayanganj Sadar', NULL, NULL),
(7, 3, 9, 4, 'Rupganj', NULL, NULL),
(8, 4, 12, 4, 'Chitalmar', NULL, NULL),
(9, 4, 13, 4, 'Assasuni', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `nid` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `division_id` int(10) NOT NULL DEFAULT '0',
  `district_id` int(10) NOT NULL DEFAULT '0',
  `upazilla_id` int(10) NOT NULL DEFAULT '0',
  `union_id` int(10) NOT NULL DEFAULT '0',
  `rmo_id` int(10) NOT NULL DEFAULT '0',
  `constituencies_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `bid`, `nid`, `name`, `telephone`, `password`, `remember_token`, `created_at`, `updated_at`, `division_id`, `district_id`, `upazilla_id`, `union_id`, `rmo_id`, `constituencies_id`) VALUES
(15, 435837787, '3873391582', 'sdfsdf', '34534543', '$2y$10$nf31qRqIA3t8ShbXh7rWuuAW4vdUYbbRwYWc3Ew3Bd8CNbuR0N3k.', NULL, '2019-12-03 13:19:59', '2019-12-03 14:44:00', 3, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'voter id',
  `candidate_id` int(11) NOT NULL DEFAULT '0' COMMENT 'candidate table id',
  `election_id` int(11) NOT NULL DEFAULT '0',
  `election_detail_id` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL DEFAULT '0',
  `subadmin_id` int(11) DEFAULT NULL COMMENT 'party id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_requests`
--
ALTER TABLE `candidate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corrections`
--
ALTER TABLE `corrections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_details`
--
ALTER TABLE `election_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_types`
--
ALTER TABLE `election_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendings`
--
ALTER TABLE `pendings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendings_birthcertificate_id_unique` (`birthCertificate_id`);

--
-- Indexes for table `political__parties`
--
ALTER TABLE `political__parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmos`
--
ALTER TABLE `rmos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_admins_email_unique` (`email`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_requests`
--
ALTER TABLE `candidate_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `corrections`
--
ALTER TABLE `corrections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `election_details`
--
ALTER TABLE `election_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `election_types`
--
ALTER TABLE `election_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pendings`
--
ALTER TABLE `pendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `political__parties`
--
ALTER TABLE `political__parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rmos`
--
ALTER TABLE `rmos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;