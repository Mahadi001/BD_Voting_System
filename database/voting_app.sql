-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 07:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', 'SubAdmin', NULL, '$2y$10$f8foBPeFsWRA.DeJKYpmXOfPNTyWcPujBrXQmpG.E6No1a9L8PNuq', NULL, '2019-11-19 07:00:23', '2019-11-19 07:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthPlace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthCountry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fathername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `eyesColor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` double NOT NULL,
  `mobile` double NOT NULL,
  `emergencyContact` double NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_certificates`
--

INSERT INTO `birth_certificates` (`id`, `bid`, `fname`, `mname`, `lname`, `birthPlace`, `birthCountry`, `dateOfBirth`, `fathername`, `mothername`, `height`, `eyesColor`, `sex`, `telephone`, `mobile`, `emergencyContact`, `address`, `address2`, `country`, `state`, `zip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1234567891, 'ftest', 'mtest', 'ltest', 'dhaka', 'bangladesh', '1992-01-01', 'testfather', 'testmother', 192.2, 'blue', 'other', 101010101, 202020202, 303030303, '112/A dhaka', '112/A ctg', 'bd', 'dhaka', '1219', NULL, '2019-11-23 05:03:59', '2019-11-23 05:03:59'),
(4, 1234567892, 'user2first', 'user2middle', 'user2last', 'Dhaka', 'Bangladesh', '2019-11-12', 'user2father', 'user2mother', 1.22, 'blue', 'others', 11111111111, 222222222222, 3333333333333, 'random bajar', 'random places', 'B', 'D', '1210', NULL, '2019-11-23 12:25:07', '2019-11-23 12:25:07'),
(5, 1234567893, 'user3first', 'user3middle', 'user3last', 'Dhaka', 'Bangladesh', '2019-11-16', 'user3father', 'user3mother', 1.1313, 'red', 'others', 11111111111, 222222222222, 3333333333333, 'random bajar', 'random places', 'B', 'D', '1210', NULL, '2019-11-25 05:20:01', '2019-11-25 05:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corrections`
--

CREATE TABLE `corrections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthPlace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthCountry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fathername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `eyesColor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` double NOT NULL,
  `mobile` double NOT NULL,
  `emergencyContact` double NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corrections`
--

INSERT INTO `corrections` (`id`, `bid`, `fname`, `mname`, `lname`, `birthPlace`, `birthCountry`, `dateOfBirth`, `fathername`, `mothername`, `height`, `eyesColor`, `sex`, `telephone`, `mobile`, `emergencyContact`, `address`, `address2`, `country`, `state`, `zip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1234567891, 'mtest', 'ftest', 'ltest', 'dhaka', 'bangladesh', '1992-01-01', 'testfather', 'testmother', 192.2, 'blue', 'other', 101010101, 202020202, 303030303, '112/A dhaka', '112/A ctg', 'bd', 'dhaka', '1219', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `did` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `did`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka District	', NULL, NULL, NULL),
(2, 3, 'Faridpur District', NULL, NULL, NULL),
(3, 3, 'Gazipur District', NULL, NULL, NULL),
(4, 3, 'Gopalganj District', NULL, NULL, NULL),
(5, 3, 'Kishoreganj District', NULL, NULL, NULL),
(6, 3, 'Madaripur District', NULL, NULL, NULL),
(7, 3, 'Manikganj District', NULL, NULL, NULL),
(8, 3, 'Munshiganj District', NULL, NULL, NULL),
(9, 3, 'Narayanganj District', NULL, NULL, NULL),
(10, 3, 'Narsingdi District', NULL, NULL, NULL),
(11, 3, 'Rajbari District', NULL, NULL, NULL),
(12, 3, 'Shariatpur District', NULL, NULL, NULL),
(13, 3, 'Tangail District', NULL, NULL, NULL),
(14, 4, 'Bagerhat District', NULL, NULL, NULL),
(15, 4, 'Chuadanga District', NULL, NULL, NULL),
(16, 4, 'Jessore District', NULL, NULL, NULL),
(17, 4, 'Jhenaidah District', NULL, NULL, NULL),
(18, 4, 'Khulna District', NULL, NULL, NULL),
(19, 4, 'Kushtia District', NULL, NULL, NULL),
(20, 4, 'Magura District', NULL, NULL, NULL),
(21, 4, 'Meherpur District', NULL, NULL, NULL),
(22, 4, 'Narail District', NULL, NULL, NULL),
(23, 4, 'Satkhira District', NULL, NULL, NULL),
(26, 3, 'Tangail District', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Barisal Division', NULL, NULL, NULL),
(2, 'Chittagong Division', NULL, NULL, NULL),
(3, 'Dhaka Division', NULL, NULL, NULL),
(4, 'Khulna Division', NULL, NULL, NULL),
(5, 'Mymensingh Division', NULL, NULL, NULL),
(6, 'Rajshahi Division', NULL, NULL, NULL),
(7, 'Rangpur Division', NULL, NULL, NULL),
(8, 'Sylhet Division', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `election_types`
--

CREATE TABLE `election_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12, '2019_11_25_142135_create_candidates_table', 7),
(13, '2019_11_26_144727_create_divisions_table', 7),
(14, '2019_11_26_145254_create_districts_table', 8),
(15, '2019_11_26_151723_create_election_types_table', 9),
(16, '2019_11_26_153055_create_positions_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `political__parties`
--

CREATE TABLE `political__parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `political__parties`
--

INSERT INTO `political__parties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Awami League', NULL, NULL),
(2, 'BNP', NULL, NULL),
(3, 'Jatiya Party', NULL, NULL),
(4, 'Gono Forum', NULL, NULL),
(5, 'Independent', NULL, NULL),
(6, 'Others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Member of Parliament(MP)', NULL, NULL),
(2, 'Mayor', NULL, NULL),
(3, 'Chairman', NULL, NULL),
(4, 'Commissioner ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(14) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `bid`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1234567891, 'test', 'test@mail.com', NULL, '$2y$10$2eMdnYwxelOSFHLYbFiFhOQMvgCSBNWR6Tr14vXp1zDXilvfsZkfa', NULL, '2019-11-19 05:46:41', '2019-11-19 05:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` datetime NOT NULL,
  `ending_date` datetime NOT NULL,
  `starting_time` time DEFAULT NULL,
  `ending_time` time DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corrections`
--
ALTER TABLE `corrections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
