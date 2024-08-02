-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2024 at 10:44 AM
-- Server version: 10.6.18-MariaDB-cll-lve-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `younkmdi_eblogdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `title`, `status`, `data_types_id`, `created_at`, `updated_at`) VALUES
(26, 'Teacher', 'active', 1, '2024-08-01 02:44:23', '2024-08-01 02:44:23'),
(27, 'Principal', 'active', 1, '2024-08-01 02:44:36', '2024-08-01 02:44:36'),
(28, 'Vice Principal', 'active', 1, '2024-08-01 02:45:15', '2024-08-01 02:45:15'),
(29, 'Co-Ordinator', 'active', 1, '2024-08-01 02:45:26', '2024-08-01 02:45:26'),
(30, 'Senior Lecturer', 'active', 2, '2024-08-01 02:45:40', '2024-08-01 02:45:40'),
(31, 'Junior Lecturer', 'active', 2, '2024-08-01 02:46:06', '2024-08-01 02:46:06'),
(32, 'Principal', 'active', 2, '2024-08-01 02:46:21', '2024-08-01 02:46:21'),
(33, 'Vice Principal', 'active', 2, '2024-08-01 02:46:40', '2024-08-01 02:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_name` varchar(191) DEFAULT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `martial_status` varchar(191) DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `qualification` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `working_exp` varchar(191) DEFAULT NULL,
  `experience_years` varchar(191) DEFAULT NULL,
  `salary_expected` varchar(191) DEFAULT NULL,
  `salary_drawn` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `number` varchar(191) DEFAULT NULL,
  `democlass` varchar(191) DEFAULT NULL,
  `referredBy` enum('newspaper','socialmedia','friends','others') DEFAULT NULL,
  `profile_img` varchar(191) DEFAULT NULL,
  `cv` varchar(191) DEFAULT NULL,
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `academic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `non_academic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expertise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `applicant_name`, `father_name`, `date`, `caste`, `martial_status`, `language`, `qualification`, `address`, `working_exp`, `experience_years`, `salary_expected`, `salary_drawn`, `email`, `number`, `democlass`, `referredBy`, `profile_img`, `cv`, `data_types_id`, `academic_id`, `non_academic_id`, `speciality_id`, `expertise_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(18, 'sushma', 'test', '2024-08-06', 'test', 'Married', 'test', 'test', 'dvg', 'test', '10', '50000', '20000', 'demoadmin@gmail.com', '9188888888', NULL, 'newspaper', 'profile_images/G2MfJvNFNcJuaXkDYgn9mTucuOE4Jvecd9Hj7cMs.jpg', 'cv_files/bwv7WQfFu9EUeNCVK7JpfjzgPA6s0UFGQQqFd81G.docx', 2, 30, NULL, 30, 26, 31, '2024-08-01 15:14:25', '2024-08-01 15:14:25'),
(19, 'gopi', 'test', '0121-12-12', 'test', 'Unmarried', 'test', 'test', 'fgsvs', 'test', '10', '50000', '20000', 'demoadmin@gmail.com', '9122222222', NULL, 'newspaper', 'profile_images/uFbTpQivDWMLP8Bd7xvJxTKrInt91Ys2J4RsYm9K.jpg', 'cv_files/HFMhqPxoXNIZxD6swqFhZAP9glSzYfEWGcECVweL.pdf', 1, 26, NULL, 27, 22, 41, '2024-08-01 15:18:55', '2024-08-01 15:18:55'),
(20, 'Geeta', 'test', '0012-12-12', 'test', 'Married', 'test', 'test', 'vsfvfs', 'test', '10', '50000', '20000', 'demoadmin@gmail.com', '9133333333', NULL, 'newspaper', 'profile_images/Ob8SLaPsV7QMZFvLBxKKqK4H0EsI1lQnQt4sG39P.jpg', 'cv_files/uBAcGQDH5xzVwPZENcaIBcWmzyowuaFctaAZsmDg.jpg', 1, 26, NULL, 27, 22, 40, '2024-08-01 15:23:03', '2024-08-01 15:23:03'),
(21, 'Mohan', 'test', '0012-12-12', 'test', 'Married', 'test', 'test', 'sgfs', 'test', '10', '50000', '20000', 'demoadmin@gmail.com', '9144444444', NULL, 'others', 'profile_images/4RrBP72VU1ejBAMd1kKqYq2CP0QfP3muDy4lphrS.jpg', 'cv_files/eTU0DQEuZ6VU9U9vnW4fESR5FIwZxtCdo1YkIkjf.jpg', 2, NULL, 27, NULL, 25, NULL, '2024-08-01 15:28:21', '2024-08-01 15:28:21'),
(22, 'Chetan', 'test', '0012-12-12', 'test', 'Married', 'test', 'test', 'sfgfw', 'test', '10', '50000', '20000', 'demoadmin@gmail.com', '9166666666', NULL, 'newspaper', 'profile_images/6islAimLZAdz6RCnIld12EmKt7iG9e2bVFqVHbB6.jpg', 'cv_files/177FxtP75vTx0dqR3orFVPKqhc5sRzezVD8rSSOF.jpg', 1, NULL, 24, NULL, 22, NULL, '2024-08-01 15:30:53', '2024-08-01 15:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `title`, `status`, `data_types_id`, `created_at`, `updated_at`) VALUES
(1, 'school', 'active', NULL, NULL, NULL),
(2, 'college', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `title`, `status`, `data_types_id`, `created_at`, `updated_at`) VALUES
(22, 'CBSE', 'active', 1, '2024-08-01 02:51:42', '2024-08-01 02:51:42'),
(23, 'ICSE', 'active', 1, '2024-08-01 02:51:52', '2024-08-01 02:51:52'),
(24, 'STATE', 'active', 1, '2024-08-01 02:52:02', '2024-08-01 02:52:02'),
(25, 'NEET', 'active', 2, '2024-08-01 02:52:16', '2024-08-01 02:52:16'),
(26, 'JEE', 'active', 2, '2024-08-01 02:52:31', '2024-08-01 02:52:31'),
(27, 'KCET', 'active', 2, '2024-08-01 02:52:43', '2024-08-01 02:52:43');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_01_141345_create_sessions_table', 1),
(6, '2023_09_18_005404_create_users_verify_table', 1),
(7, '2024_03_15_164703_create_data_types_table', 1),
(8, '2024_03_15_164703_create_specialities_table', 1),
(9, '2024_03_15_175839_create_academic_table', 1),
(10, '2024_03_15_175839_create_expertise_table', 1),
(11, '2024_03_15_175839_create_non_academic_table', 1),
(13, '2024_07_27_170246_create_applications_table', 1),
(14, '2024_03_15_175839_create_subjects_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `non_academic`
--

CREATE TABLE `non_academic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `non_academic`
--

INSERT INTO `non_academic` (`id`, `title`, `status`, `data_types_id`, `created_at`, `updated_at`) VALUES
(23, 'Academic Counselor-Marketing', 'active', 1, '2024-08-01 02:48:40', '2024-08-01 02:48:40'),
(24, 'PRO', 'active', 1, '2024-08-01 02:48:54', '2024-08-01 02:48:54'),
(25, 'HR', 'active', 1, '2024-08-01 02:49:06', '2024-08-01 02:49:06'),
(26, 'Receptionist', 'active', 1, '2024-08-01 02:49:20', '2024-08-01 02:49:20'),
(27, 'Academic Counselor-Marketing', 'active', 2, '2024-08-01 02:49:36', '2024-08-01 02:49:36'),
(28, 'PRO', 'active', 2, '2024-08-01 02:49:46', '2024-08-01 02:49:46'),
(29, 'HR', 'active', 2, '2024-08-01 02:49:57', '2024-08-01 02:49:57'),
(30, 'Receptionist', 'active', 2, '2024-08-01 02:50:12', '2024-08-01 02:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `token` varchar(64) NOT NULL,
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
('0qFJKUN0sZrbxTMiRwNLDLOurgkQ5hVUzKANwiIo', NULL, '223.123.23.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibk12cnk4Qzd4RkdZRHdyNFptcGg1dGF1RXI3R2dUMzV6a1FMZXVITSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbS9hcHBsaWNhdGlvbi1kZXRhaWxzLzIyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722523062),
('ihe1XlW2AMaHRtSIItj9k0hGSsGosKjuTO71U085', 1, '103.171.117.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQzJtOUpSY1ZhRnZMSlVvSGxqOU1UWnRLdHdWeXI0dzloU2s0NnA0WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1722521257),
('PgQgVetABsreNpisM5IkhqKqAM7yV3YPHKcJzgXN', NULL, '2001:4490:4c15:6cfe:5889:f2a6:5ccd:bcc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejU0RjZacmNXTHFoM042djVYQ0FxcmFlc09RTzFSWENReEdaWDhrMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbS9hcHBsaWNhdGlvbi1kZXRhaWxzLzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722522217),
('Sxy9Rv2aIDWBJjU14CMYAwr6fGN7MU8vxbpnptX9', 1, '2001:4490:4c15:6cfe:5889:f2a6:5ccd:bcc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR0dFNkkwZ2E5TlhXNXhJdlg2aUJjNVozNVBpelBYQWNuQW90UDF4ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbS9hcHBsaWNhdGlvbi1kZXRhaWxzLzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1722523173),
('tg2CJICDscfigZyNrcSjDaFjC5Z9uKXmDD0kKRs7', NULL, '52.11.171.106', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEU2QnY4RXplWWFWcFl4emNOb3ZkUjE1eDBEZGJheUoxaVNIQ3pGNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1722515652),
('YXKvWGNoNo9lVTCv19vt0IbdSuRmCWM1oc43VBkb', 1, '223.123.23.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmpqOTdZemhNc294TGRmWGlORTlHMzZGTXYwUUJBYkJzY3ppZDZHeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vam9iZWUueW91bmFzZGV2LmNvbS9hcHBsaWNhdGlvbi1kZXRhaWxzLzIyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1722522994);

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `title`, `status`, `data_types_id`, `created_at`, `updated_at`) VALUES
(25, 'Preschool', 'active', 1, '2024-08-01 03:40:51', '2024-08-01 03:40:51'),
(26, 'Primary', 'active', 1, '2024-08-01 03:41:10', '2024-08-01 03:41:10'),
(27, 'Middle School', 'active', 1, '2024-08-01 03:41:22', '2024-08-01 03:41:22'),
(28, 'High School', 'active', 1, '2024-08-01 03:41:33', '2024-08-01 03:41:33'),
(29, 'PU Teaching', 'active', 2, '2024-08-01 03:41:57', '2024-08-01 03:42:22'),
(30, 'Long-term Teaching', 'active', 2, '2024-08-01 03:42:12', '2024-08-01 03:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `data_types_id` bigint(20) UNSIGNED DEFAULT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `status`, `data_types_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(20, 'English', 'active', 1, 26, '2024-08-01 03:44:58', '2024-08-01 03:44:58'),
(21, 'Zoology', 'active', 2, 29, '2024-08-01 03:45:20', '2024-08-01 03:45:20'),
(22, 'Botany', 'active', 2, 29, '2024-08-01 14:40:32', '2024-08-01 14:40:32'),
(23, 'Chemistry', 'active', 2, 29, '2024-08-01 14:40:45', '2024-08-01 14:40:45'),
(24, 'Physics', 'active', 2, 29, '2024-08-01 14:41:01', '2024-08-01 14:41:01'),
(25, 'Computer Science', 'active', 2, 29, '2024-08-01 14:41:20', '2024-08-01 14:41:20'),
(26, 'English', 'active', 2, 29, '2024-08-01 14:41:37', '2024-08-01 14:41:37'),
(27, 'Kannada', 'active', 2, 29, '2024-08-01 14:41:50', '2024-08-01 14:41:50'),
(28, 'Hindi', 'active', 2, 29, '2024-08-01 14:42:02', '2024-08-01 14:42:02'),
(29, 'Samskrith', 'active', 2, 29, '2024-08-01 14:42:18', '2024-08-01 14:42:18'),
(30, 'Physics', 'active', 2, 30, '2024-08-01 14:44:58', '2024-08-01 14:44:58'),
(31, 'Chemistry', 'active', 2, 30, '2024-08-01 14:45:14', '2024-08-01 14:45:14'),
(32, 'Zoology', 'active', 2, 30, '2024-08-01 14:45:33', '2024-08-01 14:45:33'),
(33, 'Botany', 'active', 2, 30, '2024-08-01 14:45:46', '2024-08-01 14:45:46'),
(34, 'English', 'active', 1, 28, '2024-08-01 14:51:27', '2024-08-01 14:51:27'),
(35, 'Science', 'active', 1, 28, '2024-08-01 14:51:57', '2024-08-01 14:51:57'),
(36, 'Social Science', 'active', 1, 28, '2024-08-01 14:52:15', '2024-08-01 14:52:15'),
(37, 'Mathematics', 'active', 1, 28, '2024-08-01 14:52:51', '2024-08-01 14:52:51'),
(38, 'Hindi', 'active', 1, 28, '2024-08-01 14:53:45', '2024-08-01 14:53:45'),
(39, 'Kannada', 'active', 1, 28, '2024-08-01 14:54:13', '2024-08-01 14:54:13'),
(40, 'Science', 'active', 1, 27, '2024-08-01 15:09:38', '2024-08-01 15:09:38'),
(41, 'Mathematics', 'active', 1, 27, '2024-08-01 15:09:53', '2024-08-01 15:09:53'),
(42, 'Social Science', 'active', 1, 27, '2024-08-01 15:10:13', '2024-08-01 15:10:13'),
(43, 'English', 'active', 1, 27, '2024-08-01 15:10:41', '2024-08-01 15:10:41'),
(44, 'Hindi', 'active', 1, 27, '2024-08-01 15:10:57', '2024-08-01 15:10:57'),
(45, 'Kannada', 'active', 1, 27, '2024-08-01 15:11:12', '2024-08-01 15:11:12'),
(46, 'Kannada', 'active', 1, 26, '2024-08-01 23:05:21', '2024-08-01 23:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `lname` varchar(191) DEFAULT NULL,
  `profile_pic` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `facebook_id` varchar(191) DEFAULT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'admin',
  `role` enum('admin','demo') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `profile_pic`, `email`, `phone`, `facebook_id`, `google_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `type`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Demo1', 'Admin1', 'user_profile/LGaSsMobbrtkOriYzswycVlLThHR8jPsfe40xIKj.jpg', 'demoadmin@gmail.com', '8098080881', NULL, NULL, '2024-07-19 13:00:15', '$2y$10$XzEzkVcvhj3dQgSASOyC/uRT.qp6nNEEGD6umGqsXjf1529w/4IzO', NULL, NULL, NULL, NULL, 'admin', 'admin', NULL, '2024-07-24 11:56:59');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_data_types_id_foreign` (`data_types_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_data_types_id_foreign` (`data_types_id`),
  ADD KEY `applications_academic_id_foreign` (`academic_id`),
  ADD KEY `applications_non_academic_id_foreign` (`non_academic_id`),
  ADD KEY `applications_speciality_id_foreign` (`speciality_id`),
  ADD KEY `applications_expertise_id_foreign` (`expertise_id`),
  ADD KEY `applications_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_types_data_types_id_foreign` (`data_types_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expertise_data_types_id_foreign` (`data_types_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_academic`
--
ALTER TABLE `non_academic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_academic_data_types_id_foreign` (`data_types_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialities_data_types_id_foreign` (`data_types_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_data_types_id_foreign` (`data_types_id`),
  ADD KEY `subjects_speciality_id_foreign` (`speciality_id`);

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
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `non_academic`
--
ALTER TABLE `non_academic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academic` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applications_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applications_expertise_id_foreign` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applications_non_academic_id_foreign` FOREIGN KEY (`non_academic_id`) REFERENCES `non_academic` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applications_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applications_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `data_types`
--
ALTER TABLE `data_types`
  ADD CONSTRAINT `data_types_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `expertise`
--
ALTER TABLE `expertise`
  ADD CONSTRAINT `expertise_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `non_academic`
--
ALTER TABLE `non_academic`
  ADD CONSTRAINT `non_academic_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `specialities_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_data_types_id_foreign` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subjects_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
