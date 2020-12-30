-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2020 at 05:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-skills-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `school_id`) VALUES
(1, 'Imani Balistreri', 'chesley11@example.net', '734.851.9033', 'Jarenton', '2020-04-17 14:35:44', '2020-04-17 14:35:44', 2),
(2, 'Prof. Ambrose Block', 'bboyle@example.net', '+1 (308) 756-7816', 'East Alfonzo', '2020-04-17 14:36:01', '2020-04-17 14:36:01', 2),
(3, 'Mr. Alec Bogisich', 'klocko.lafayette@example.com', '728.586.5501', 'East Priscillaborough', '2020-04-17 14:36:05', '2020-04-17 14:36:05', 2),
(4, 'Riley Goodwin MD', 'joanie49@example.com', '(625) 434-7975', 'New Carmellaville', '2020-04-17 14:36:08', '2020-04-17 14:36:08', 2),
(5, 'Ms. Amelia Jaskolski', 'windler.olaf@example.org', '1-850-950-9479 x4713', 'Crawfordchester', '2020-04-17 14:36:11', '2020-04-17 14:36:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `campuse_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `price`, `created_at`, `updated_at`, `campuse_id`) VALUES
(1, 'Eric Upton III', 290.00, '2020-04-17 14:36:14', '2020-04-17 14:36:14', 4),
(2, 'Madonna Kassulke', 315.00, '2020-04-17 14:36:14', '2020-04-17 14:36:14', 1),
(3, 'Georgianna Connelly', 363.00, '2020-04-17 14:36:14', '2020-04-17 14:36:14', 3),
(4, 'Brianne Walter', 96.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 3),
(5, 'Gloria Harris', 45.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(6, 'Casandra Powlowski', 232.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 3),
(7, 'Liana Larkin', 196.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 3),
(8, 'Lavonne Cummerata', 332.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(9, 'Burnice Boyer', 111.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 2),
(10, 'Ms. Margie Johnson DVM', 96.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 1),
(11, 'Lucy Reynolds', 411.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 5),
(12, 'Reggie Simonis', 205.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 5),
(13, 'Willis Ortiz', 168.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(14, 'Delmer Fay', 114.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(15, 'Elvera Lynch Jr.', 96.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(16, 'Ms. Erna Haley', 158.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 1),
(17, 'Dimitri Oberbrunner', 426.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 3),
(18, 'Rasheed Rogahn', 7.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(19, 'Kellie Upton PhD', 20.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 1),
(20, 'Ian Parisian', 459.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 4),
(21, 'Stefan O\'Kon IV', 279.00, '2020-04-17 14:36:15', '2020-04-17 14:36:15', 1),
(22, 'Maye Stiedemann', 334.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 5),
(23, 'Kyla Turcotte', 353.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 5),
(24, 'Declan Brakus', 377.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 5),
(25, 'Ulices Kilback', 189.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 5),
(26, 'Magnus Kunde', 93.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 3),
(27, 'Prof. Claude Frami', 60.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 3),
(28, 'Miss Rosalyn Waters Sr.', 31.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 3),
(29, 'Lue Strosin', 321.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 1),
(30, 'Alana Douglas', 359.00, '2020-04-17 14:36:16', '2020-04-17 14:36:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `course_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 17, 2, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(2, 11, 5, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(3, 7, 5, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(4, 6, 4, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(5, 17, 4, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(6, 22, 4, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(7, 15, 1, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(8, 8, 3, '2020-04-17 14:36:16', '2020-04-17 14:36:16'),
(9, 10, 3, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(10, 5, 1, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(11, 12, 1, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(12, 30, 2, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(13, 23, 3, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(14, 4, 3, '2020-04-17 14:36:17', '2020-04-17 14:36:17'),
(15, 28, 4, '2020-04-17 14:36:17', '2020-04-17 14:36:17');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_16_175531_create_schools_table', 1),
(4, '2020_04_16_175628_create_campuses_table', 1),
(5, '2020_04_16_175825_create_types_table', 1),
(6, '2020_04_16_175842_create_courses_table', 1),
(7, '2020_04_16_183052_create_course_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `email`, `logo`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Destinee Collins', 'nschulist@example.com', '523ef8ad573e73b2ce7ee778fc33f571.jpg', 'olson.com', '2020-04-17 14:35:43', '2020-04-17 14:35:43'),
(2, 'Arlene Vandervort', 'else.legros@example.net', 'c957c7c7cab9f7a697c4b7d0b3a1dbc5.jpg', 'muller.com', '2020-04-17 14:35:44', '2020-04-17 14:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gerda Spencer', '2020-04-17 14:36:14', '2020-04-17 14:36:14'),
(2, 'Gilbert Mueller MD', '2020-04-17 14:36:14', '2020-04-17 14:36:14'),
(3, 'Ms. Vena Rodriguez', '2020-04-17 14:36:14', '2020-04-17 14:36:14'),
(4, 'Adolph Russel', '2020-04-17 14:36:14', '2020-04-17 14:36:14'),
(5, 'Tamia Leffler DVM', '2020-04-17 14:36:14', '2020-04-17 14:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campuses_school_id_foreign` (`school_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_campuse_id_foreign` (`campuse_id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_types_course_id_foreign` (`course_id`),
  ADD KEY `course_types_type_id_foreign` (`type_id`);

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
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campuses`
--
ALTER TABLE `campuses`
  ADD CONSTRAINT `campuses_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_campuse_id_foreign` FOREIGN KEY (`campuse_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_types`
--
ALTER TABLE `course_types`
  ADD CONSTRAINT `course_types_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
