-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 11:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_cashier`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_profile`
--

CREATE TABLE `check_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `profile` tinyint(1) NOT NULL DEFAULT 0,
  `expertise` tinyint(1) NOT NULL DEFAULT 0,
  `education` tinyint(1) NOT NULL DEFAULT 0,
  `experience` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `lang_img` varchar(255) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `direction` enum('ltr','rtl') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `lang_img`, `name`, `direction`, `status`, `created_at`, `updated_at`) VALUES
(17, 'en', 'lang_img/39tGdnSFuEIaCvA4CZHEnybJqHxiHXmSIFMSvW9C.png', 'English', 'ltr', 'active', '2023-08-28 14:58:14', '2024-03-29 07:59:37'),
(18, 'es', 'lang_img/nuMqffsiViyTrmqy1duI81Nc8zA8E1mOo3dCtRPD.png', 'Spanish', 'ltr', 'active', '2023-08-28 14:58:14', '2024-03-29 08:02:37'),
(25, 'fr', 'lang_img/av0M2TFTYQMNh20zIKqlqfqJa1yGgiIWIQpjS5IL.png', 'French', 'ltr', 'active', '2024-03-29 08:03:20', '2024-03-29 08:03:20'),
(26, 'de', 'lang_img/TVNTAxt4KGfj4ayJIxSxBXorOTElgrRMkQRRoOuc.png', 'German', 'ltr', 'active', '2024-03-29 08:03:55', '2024-03-29 08:03:55'),
(27, 'zh', 'lang_img/Vwc6oxOgyvhJ1zPdWeTbpkcgS3dKYJWHZ4GfXpbX.png', 'Mandarin', 'ltr', 'active', '2024-03-29 08:04:26', '2024-03-29 08:04:26'),
(28, 'pt', 'lang_img/UEHT06aaEvqC3Zb1qfiL4qPqWw6T2S0MqTFLHfLg.png', 'Portuguese', 'ltr', 'active', '2024-03-29 08:04:54', '2024-03-29 08:04:54'),
(29, 'it', 'lang_img/0kENTgOwAi4h1lOUDma5RkFc6PFe8irB1ISer5hW.png', 'Italian', 'ltr', 'active', '2024-03-29 08:05:26', '2024-03-29 08:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_09_18_005404_create_users_verify_table', 1),
(9, '2023_07_01_141345_create_sessions_table', 1),
(10, '2024_03_15_164703_create_teachme_subjects_table', 2),
(11, '2024_03_15_175839_create_teachme_grades_table', 3),
(12, '2024_03_15_182221_create_teachme_curriculums_table', 4),
(13, '2014_10_12_000000_create_users_table', 5),
(15, '2024_03_18_184158_create_teachme_packages_table', 5),
(17, '2024_03_18_182959_create_teachme_reviews_table', 6),
(18, '2024_03_18_191251_create_teachme_locations_table', 6),
(19, '2024_03_29_113513_create_teachme_curriculum_relationships_table', 7),
(20, '2024_03_29_113737_create_teachme_grades_relationships_table', 7),
(21, '2024_03_29_113744_create_teachme_subject_relationships_table', 7),
(22, '2024_03_29_113752_create_teachme_languages_relationships_table', 7),
(23, '2024_03_29_114615_create_teachme_tutor_education_table', 8),
(24, '2024_03_29_120329_create_teachme_tutor_experience_table', 9),
(25, '2024_03_29_120844_create_teachme_payment_method_table', 10),
(26, '2023_08_28_194939_create_languages_table', 1),
(27, '2024_03_30_150241_create_teachme_documents_table', 11),
(29, '2024_03_30_165345_create_teachme_location_relationships_table', 12),
(30, '2023_09_14_033600_create_web_general_settings_table', 1),
(31, '2024_04_01_202927_create_contacts_table', 13),
(32, '2024_04_02_201034_create_payments_table', 14),
(33, '2019_05_03_000001_create_customer_columns', 15),
(35, '2019_05_03_000003_create_subscription_items_table', 15),
(36, '2019_05_03_000002_create_subscriptions_table', 16),
(37, '2024_04_23_085435_create_check_profile_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('adam@gmail.com', '$2y$10$PoxYLIAJmMLdnAhjHQPK0uZSncugsEWw0U4.ergBsOULvPRt23SI.', '2024-04-03 05:22:41'),
('hm.younas22@gmail.com', '$2y$10$MRLZz7ncYMCFS80f7rme.e0HewS6USRWq5v5gkEsSBjCOwLfnavD.', '2024-04-03 06:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(191) NOT NULL,
  `package_name` varchar(191) NOT NULL,
  `quantity` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `currency` varchar(191) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(191) NOT NULL,
  `customer_email` varchar(191) NOT NULL,
  `payment_status` varchar(191) NOT NULL,
  `payment_method` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NV5UhL5aovGR6UVIjUQUD2hM1HQMT1JIDly4mP6Y', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmp2bmZuZkFaQU12ZVN4eHp2THZFUjJaREZCdldjdVFkdldHOG1oWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvdGVjaG1lX2xhdGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1713949184),
('PSa0VZt4JmiMLuzZ4cq2brWCfGnCaDXy9SDUclD0', 23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXZhaEZDWmF6OFpTVFVSSkJEVUFYb21NSkJ2RXp6cEVGdVpwMkhEUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM5OiJodHRwOi8vbG9jYWxob3N0L3RlY2htZV9sYXRlc3QvcHJvZmlsZS9leUpwZGlJNklqZDNlRGxUTDFObmJtODBlVGhPY1RZeFRrNXhUbEU5UFNJc0luWmhiSFZsSWpvaWNUWkdUa3RMYVdFNFZXVlZWSGhrTjBSTWJtTllRVDA5SWl3aWJXRmpJam9pT1RZd05XVTNZelZqTjJVMk9EQTFOVGs1TVRoall6STRNemRqTjJVNE9EYzRabVkyWTJFMFpqaGlOMlJpTkRoak16WmhOVFptTW1Ka01HUmlPVEUxWXlJc0luUmhaeUk2SWlKOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIzO30=', 1713945541);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_status` varchar(191) NOT NULL,
  `stripe_price` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_product` varchar(191) NOT NULL,
  `stripe_price` varchar(191) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_curriculums`
--

CREATE TABLE `teachme_curriculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `curriculum_image` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachme_curriculums`
--

INSERT INTO `teachme_curriculums` (`id`, `title`, `curriculum_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'American', 'curriculum_image/kNSGSDmSuVy0hzwEUpHcWxP9WNBRHHlFn7u2Bxcc.png', 'active', '2024-03-15 13:36:40', '2024-03-29 07:14:42'),
(3, 'British', 'curriculum_image/KGtmYaosNgSz641tQm1IBWURB3iFIM94NAzrJ9ZN.png', 'active', '2024-03-21 06:30:48', '2024-03-29 07:15:06'),
(4, 'Canadian', 'curriculum_image/Jch1shvokXUGM7fniQdszWI7hwJiKa0MMOHhQPFi.png', 'active', '2024-03-29 07:15:31', '2024-03-29 07:15:31'),
(5, 'IB', 'curriculum_image/uJfKp40zva8jtPe5C9Jwht4v7lneNgTTAuPRed3A.png', 'active', '2024-03-29 07:15:49', '2024-03-29 07:15:49'),
(6, 'Sabis', 'curriculum_image/o9N5yOFeHzjqMZce3kFRY5pJ4UQVBtxFrE5TuyLu.png', 'active', '2024-03-29 07:16:27', '2024-03-29 07:16:27'),
(7, 'International', 'curriculum_image/CIsYakdefKwADKnEtiyauIgmlbR0stFfcI3VP3Lx.png', 'active', '2024-03-29 07:16:40', '2024-03-29 07:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `teachme_curriculum_relationships`
--

CREATE TABLE `teachme_curriculum_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curriculum_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_documents`
--

CREATE TABLE `teachme_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `document` varchar(191) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `email_status` int(1) DEFAULT 0,
  `expiry_status` int(1) NOT NULL DEFAULT 0,
  `reject_doc` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_grades`
--

CREATE TABLE `teachme_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `grade_image` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachme_grades`
--

INSERT INTO `teachme_grades` (`id`, `title`, `grade_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Early Years/KG', 'grade_image/znGozO6UWxCFAS6dBNCwG7vrgjJ7qbwTDq1bCe7h.png', 'active', '2024-03-15 13:17:30', '2024-03-29 08:12:39'),
(2, 'Primary/Elementary', 'grade_image/vJxe2QrxexxhCuJmNAt8gRwHOC4yYhmJ2kPqIiu4.png', 'active', '2024-03-21 06:37:44', '2024-03-29 08:13:01'),
(3, 'Middle School', 'grade_image/4Ki8PP0jgnxRvkxauBPGnrAxxogk2sz5uiKNUSQf.png', 'active', '2024-03-29 08:13:19', '2024-03-29 08:13:19'),
(4, 'Secondary/GSCE', 'grade_image/w7OY2gDqAzQj3Cr4RS8nvCBbX6Xu386KmRFytO9W.png', 'active', '2024-03-29 08:13:30', '2024-03-29 08:13:30'),
(5, 'Sixth Form/A Levels', 'grade_image/GIT1dvuuLBs4mi17eEpK7dp1ExGzW1sfsm4qoqfu.png', 'active', '2024-03-29 08:13:42', '2024-03-29 08:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `teachme_grades_relationships`
--

CREATE TABLE `teachme_grades_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_languages_relationships`
--

CREATE TABLE `teachme_languages_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_locations`
--

CREATE TABLE `teachme_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `location_image` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachme_locations`
--

INSERT INTO `teachme_locations` (`id`, `name`, `slug`, `location_image`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(13, 'United Arab Emirates', 'united-arab-emirates', NULL, 'active', NULL, '2024-03-22 10:22:48', '2024-03-30 15:10:08'),
(14, 'Abu Dhabi', 'abu-dhabi', NULL, 'active', 13, '2024-03-22 10:23:02', '2024-03-30 15:11:47'),
(15, 'Dubai', 'dubai', NULL, 'active', 13, '2024-03-22 10:23:13', '2024-03-30 15:10:52'),
(16, 'Ajman', 'ajman', NULL, 'active', 13, '2024-03-22 10:23:29', '2024-03-30 15:11:28'),
(17, 'Umm Al-Quwain', 'umm-al-quwain', NULL, 'active', 13, '2024-03-22 10:23:39', '2024-03-30 15:12:04'),
(18, 'Sharjah', 'sharjah', NULL, 'active', 13, '2024-03-22 10:35:58', '2024-03-30 15:11:05'),
(19, 'Fujairah', 'fujairah', NULL, 'inactive', 13, '2024-03-30 15:12:15', '2024-04-07 10:33:03'),
(20, 'Ras Al Khaimah', 'ras-al-khaimah', NULL, 'inactive', 18, '2024-03-30 15:12:25', '2024-04-15 11:58:20'),
(21, 'lahore', 'lahore', NULL, 'inactive', 14, '2024-04-15 12:33:30', '2024-04-15 12:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `teachme_location_relationships`
--

CREATE TABLE `teachme_location_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `sub_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_packages`
--

CREATE TABLE `teachme_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `stripe_plan` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `ptype` enum('student','tutor') NOT NULL DEFAULT 'student',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachme_packages`
--

INSERT INTO `teachme_packages` (`id`, `title`, `details`, `stripe_plan`, `price`, `ptype`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Student Premium', 'For Students', 'price_1P8IPoKPzCMWKbXWibARzg4E', '100', 'student', 'active', '2024-03-20 08:02:57', '2024-04-08 04:04:04'),
(2, 'Tutor Premium', 'For Tutors', 'price_1P8IQTKPzCMWKbXWxXN8cLRR', '100', 'tutor', 'active', '2024-03-21 05:58:43', '2024-04-08 04:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `teachme_reviews`
--

CREATE TABLE `teachme_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `stars` decimal(2,1) DEFAULT 0.0,
  `review_text` text NOT NULL,
  `status` enum('approve','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_subjects`
--

CREATE TABLE `teachme_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `subject_image` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachme_subjects`
--

INSERT INTO `teachme_subjects` (`id`, `title`, `subject_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ENGLISH', 'subject_image/I1KCCCElW03DnydI2n3cqZw7x3rGzNMGlfkdvfsM.png', 'active', '2024-03-15 12:01:25', '2024-03-29 08:10:17'),
(2, 'CHEMISTRY', 'subject_image/vtPn2hrrbmsznDA15M9hyiObwpBXmJZ4JpzXEYlr.png', 'active', '2024-03-21 07:13:52', '2024-03-29 08:10:09'),
(3, 'PHYSICS', 'subject_image/JMSB8uCXQWmdNY7XXMTnHbxqTJuo5o5uUdVfMajS.png', 'active', '2024-03-29 08:10:35', '2024-03-29 08:10:35'),
(4, 'MATHEMATICS', 'subject_image/TFR9lDFKMqEHNjrWJl0Luczykre2q4Pc4YsCdBbp.png', 'active', '2024-03-29 08:11:23', '2024-03-29 08:11:23'),
(5, 'BIOLOGY', 'subject_image/KSAJvElJqYZuOyWJgMPvC93iPNeN40Spsvss8HgC.png', 'active', '2024-03-29 08:11:35', '2024-03-29 08:11:35'),
(6, 'HISTORY', 'subject_image/9osSM2JRKFJSLmSmDPPZEzHzDYD3BfEyg00H4eWS.png', 'active', '2024-03-15 12:01:25', '2024-04-01 13:40:30'),
(7, 'PSYCHOLOGY', 'subject_image/OovJVf6mv8ot0sIgM35SB48CjsBpsqDQvceB0d2t.png', 'active', '2024-03-21 07:13:52', '2024-04-01 13:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `teachme_subject_relationships`
--

CREATE TABLE `teachme_subject_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_tutor_education`
--

CREATE TABLE `teachme_tutor_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(191) NOT NULL,
  `institution` varchar(191) NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `currently_studying` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachme_tutor_experience`
--

CREATE TABLE `teachme_tutor_experience` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `currently_working` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(191) DEFAULT NULL,
  `blur_profile_pic` varchar(255) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `facebook_id` varchar(191) DEFAULT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `askforapproval` enum('ask','asked','done') NOT NULL DEFAULT 'ask',
  `zip_code` varchar(255) DEFAULT NULL,
  `role` enum('student','tutor','admin','demo') NOT NULL DEFAULT 'student',
  `lang` varchar(255) NOT NULL DEFAULT 'English',
  `mode_of_instruction` enum('virtual','in_person') NOT NULL DEFAULT 'virtual',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `lock_status` int(1) NOT NULL DEFAULT 1,
  `approval_status` int(1) NOT NULL DEFAULT 0,
  `verification_status` int(1) NOT NULL DEFAULT 0,
  `reject_status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `pm_type` varchar(191) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `student_school` varchar(255) DEFAULT NULL,
  `student_curriculum` int(11) DEFAULT NULL,
  `student_grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `profile_pic`, `blur_profile_pic`, `email`, `phone`, `facebook_id`, `google_id`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `description`, `video_url`, `type`, `askforapproval`, `zip_code`, `role`, `lang`, `mode_of_instruction`, `status`, `lock_status`, `approval_status`, `verification_status`, `reject_status`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `student_school`, `student_curriculum`, `student_grade`) VALUES
(1, 'Mudassar', 'Nazir', NULL, NULL, 'demoadmin@gmail.com', '9898989898', NULL, NULL, '2024-04-24 10:52:32', '$2y$10$KMPby7b5WyjEz5XaPbSV/O5NMfNe/2XNQkjIwqWjvYVRPMJ8F8Hcy', NULL, NULL, NULL, NULL, '', 'admin', 'ask', NULL, 'admin', 'English', 'virtual', 'active', 1, 0, 0, 0, NULL, '2024-04-15 10:01:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(16, 'V8ohCPD6qKqgfUQkd8tmkMj489CAws4td5jlzLWBLp9oOrBOP0OZ2t5B0iPC3pFU', '2024-04-07 05:39:26', '2024-04-07 05:39:26'),
(17, 'Yia83fzPh9n9QtMRo7sG76dxcRiA2zXXB4lM0IJYt0xiCVEt33ibB2ZD5guMKXXh', '2024-04-07 05:41:11', '2024-04-07 05:41:11'),
(18, 'EKmgfB7SXoGhe9eNmEH8eC7nUe5djXmwgJdaevu88jWWCt4ObgSIm0Gxi6FS3GOF', '2024-04-07 05:43:13', '2024-04-07 05:43:13'),
(19, 'ALZC3l6ylV3fVZQn7PvG3ZRiVX6S0Evj8N1m7auYnD5Ja6szyet9fJEvxJ3KTFvp', '2024-04-07 10:26:12', '2024-04-07 10:26:12'),
(20, 'dCoOWMZsCyVbjFpJAG3D8suYQXi6XByTxX7OF3ne6BKXGl1t6FQC18Hd474V0fJg', '2024-04-15 10:48:32', '2024-04-15 10:48:32'),
(21, 'fM0WQXuRXtGIn0NgueDjWnNs03krRKXlMtZXMArbvFA3OudEPesmXRJqqQUpmSPi', '2024-04-16 07:33:20', '2024-04-16 07:33:20'),
(22, 'QVX5rS06aw1EJ19qVpfoU6vxZONYinGkJkjIx3NARiMBp2RzDZGkzdGsdbKyOD7I', '2024-04-18 10:29:58', '2024-04-18 10:29:58'),
(23, '2WkVcaEy0indAzVvAaXMPzUAqYnSEHxjr0TY141BBErV2BmhRfi8KZKIP0Q89Pmf', '2024-04-22 03:48:24', '2024-04-22 03:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `web_general_settings`
--

CREATE TABLE `web_general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(191) NOT NULL,
  `website_url` varchar(191) NOT NULL,
  `website_title` varchar(191) NOT NULL,
  `contact_email` varchar(191) NOT NULL,
  `contact_phone` varchar(191) NOT NULL,
  `default_language` varchar(191) NOT NULL DEFAULT 'English',
  `logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `snapchat` text DEFAULT NULL,
  `visit_address` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `offline_payment_status` int(11) NOT NULL DEFAULT 1,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_general_settings`
--

INSERT INTO `web_general_settings` (`id`, `website_name`, `website_url`, `website_title`, `contact_email`, `contact_phone`, `default_language`, `logo`, `favicon`, `facebook`, `instagram`, `twitter`, `snapchat`, `visit_address`, `linkedin`, `youtube`, `offline_payment_status`, `meta_title`, `meta_description`, `meta_keywords`, `meta_image`, `created_at`, `updated_at`) VALUES
(1, 'TeachMe', 'http://localhost/techme_latest', 'TeachMe', 'hello@teachme.com', '03460820722', 'English', 'profile_pics/S8jZWtJ294hoaAz3hsK8vnMb1tTpKhFUB8wPoJKp.png', 'profile_pics/bBr8JoKeG6sqHdMYOdtUSRVf7kMpsk5r5J9adnrK.png', '@TeachMe', '@TeachMe', '@TeachMe', '@TeachMe', '132 Dartmouth Street Boston,<br>Massachusetts 02156 Abu Dhabi', 'Linkedin', 'Youtube', 1, 'TeachMe', 'TeachMe', 'TeachMe', 'meta_image/ZWvb75xg1sZHmJeIRp3WrDbL12ACsbEUncBu7nVm.png', NULL, '2024-04-23 09:09:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_profile`
--
ALTER TABLE `check_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_profile_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`);

--
-- Indexes for table `teachme_curriculums`
--
ALTER TABLE `teachme_curriculums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachme_curriculum_relationships`
--
ALTER TABLE `teachme_curriculum_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_curriculum_relationships_curriculum_id_foreign` (`curriculum_id`),
  ADD KEY `teachme_curriculum_relationships_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_documents`
--
ALTER TABLE `teachme_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_documents_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_grades`
--
ALTER TABLE `teachme_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachme_grades_relationships`
--
ALTER TABLE `teachme_grades_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_grades_relationships_grade_id_foreign` (`grade_id`),
  ADD KEY `teachme_grades_relationships_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_languages_relationships`
--
ALTER TABLE `teachme_languages_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_languages_relationships_language_id_foreign` (`language_id`),
  ADD KEY `teachme_languages_relationships_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_locations`
--
ALTER TABLE `teachme_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_locations_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `teachme_location_relationships`
--
ALTER TABLE `teachme_location_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_location_relationships_location_id_foreign` (`location_id`),
  ADD KEY `teachme_location_relationships_sub_location_id_foreign` (`sub_location_id`),
  ADD KEY `teachme_location_relationships_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_packages`
--
ALTER TABLE `teachme_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachme_reviews`
--
ALTER TABLE `teachme_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_reviews_student_id_foreign` (`student_id`),
  ADD KEY `teachme_reviews_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_subjects`
--
ALTER TABLE `teachme_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachme_subject_relationships`
--
ALTER TABLE `teachme_subject_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_subject_relationships_subject_id_foreign` (`subject_id`),
  ADD KEY `teachme_subject_relationships_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_tutor_education`
--
ALTER TABLE `teachme_tutor_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_tutor_education_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `teachme_tutor_experience`
--
ALTER TABLE `teachme_tutor_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachme_tutor_experience_tutor_id_foreign` (`tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `web_general_settings`
--
ALTER TABLE `web_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_profile`
--
ALTER TABLE `check_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_curriculums`
--
ALTER TABLE `teachme_curriculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachme_curriculum_relationships`
--
ALTER TABLE `teachme_curriculum_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_documents`
--
ALTER TABLE `teachme_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_grades`
--
ALTER TABLE `teachme_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachme_grades_relationships`
--
ALTER TABLE `teachme_grades_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_languages_relationships`
--
ALTER TABLE `teachme_languages_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_locations`
--
ALTER TABLE `teachme_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachme_location_relationships`
--
ALTER TABLE `teachme_location_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_packages`
--
ALTER TABLE `teachme_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachme_reviews`
--
ALTER TABLE `teachme_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_subjects`
--
ALTER TABLE `teachme_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachme_subject_relationships`
--
ALTER TABLE `teachme_subject_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_tutor_education`
--
ALTER TABLE `teachme_tutor_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachme_tutor_experience`
--
ALTER TABLE `teachme_tutor_experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `web_general_settings`
--
ALTER TABLE `web_general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_profile`
--
ALTER TABLE `check_profile`
  ADD CONSTRAINT `check_profile_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_curriculum_relationships`
--
ALTER TABLE `teachme_curriculum_relationships`
  ADD CONSTRAINT `teachme_curriculum_relationships_curriculum_id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `teachme_curriculums` (`id`),
  ADD CONSTRAINT `teachme_curriculum_relationships_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_documents`
--
ALTER TABLE `teachme_documents`
  ADD CONSTRAINT `teachme_documents_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_grades_relationships`
--
ALTER TABLE `teachme_grades_relationships`
  ADD CONSTRAINT `teachme_grades_relationships_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `teachme_grades` (`id`),
  ADD CONSTRAINT `teachme_grades_relationships_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_languages_relationships`
--
ALTER TABLE `teachme_languages_relationships`
  ADD CONSTRAINT `teachme_languages_relationships_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `teachme_languages_relationships_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_locations`
--
ALTER TABLE `teachme_locations`
  ADD CONSTRAINT `teachme_locations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `teachme_locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachme_location_relationships`
--
ALTER TABLE `teachme_location_relationships`
  ADD CONSTRAINT `teachme_location_relationships_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `teachme_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachme_location_relationships_sub_location_id_foreign` FOREIGN KEY (`sub_location_id`) REFERENCES `teachme_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachme_location_relationships_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachme_reviews`
--
ALTER TABLE `teachme_reviews`
  ADD CONSTRAINT `teachme_reviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachme_reviews_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachme_subject_relationships`
--
ALTER TABLE `teachme_subject_relationships`
  ADD CONSTRAINT `teachme_subject_relationships_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `teachme_subjects` (`id`),
  ADD CONSTRAINT `teachme_subject_relationships_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_tutor_education`
--
ALTER TABLE `teachme_tutor_education`
  ADD CONSTRAINT `teachme_tutor_education_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachme_tutor_experience`
--
ALTER TABLE `teachme_tutor_experience`
  ADD CONSTRAINT `teachme_tutor_experience_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
