-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 10:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignclassteacher`
--

CREATE TABLE `assignclassteacher` (
  `id` int(11) NOT NULL,
  `Class_id` int(11) DEFAULT NULL,
  `Teacher_id` int(11) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `Created_by` int(11) DEFAULT NULL,
  `Created_at` datetime DEFAULT NULL,
  `Updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignclassteacher`
--

INSERT INTO `assignclassteacher` (`id`, `Class_id`, `Teacher_id`, `Status`, `is_delete`, `Created_by`, `Created_at`, `Updated_at`) VALUES
(2, 2, NULL, NULL, 0, 1, '2023-05-01 08:50:16', '2023-05-01 10:59:29'),
(5, 2, 4, 0, 0, 1, '2023-05-01 10:30:27', '2023-05-01 11:10:45'),
(6, 1, NULL, 0, 0, 1, '2023-05-01 10:37:18', '2023-05-01 10:57:33'),
(9, 3, 10, 0, 0, 1, '2023-05-02 08:22:46', '2023-05-02 08:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `is_Delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not, 1:Yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `Name`, `created_by`, `status`, `is_Delete`, `created_at`, `updated_at`) VALUES
(1, 'jss3', 1, 0, 0, '2023-04-18 12:50:03', '2023-04-21 11:22:04'),
(2, 'SS3', 1, 0, 0, '2023-04-18 12:50:18', '2023-04-21 11:21:49'),
(3, 'ss1', 1, 0, 0, '2023-04-18 12:51:25', '2023-04-21 11:21:24'),
(4, 'Jss2', 1, 1, 0, '2023-04-18 13:16:58', '2023-04-21 11:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `classsubjects`
--

CREATE TABLE `classsubjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classsubjects`
--

INSERT INTO `classsubjects` (`id`, `class_id`, `subject_id`, `created_by`, `isDelete`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 1, 0, 0, '2023-04-21 11:31:40', '2023-04-21 11:31:40'),
(10, 2, 2, 1, 0, 0, '2023-04-21 11:31:59', '2023-04-21 12:22:24'),
(11, 2, 1, 1, 0, 0, '2023-05-01 12:27:56', '2023-05-01 12:27:56'),
(12, 1, 11, 1, 0, 0, '2023-05-02 08:21:38', '2023-05-02 08:21:38'),
(13, 1, 6, 1, 0, 0, '2023-05-02 08:21:38', '2023-05-02 08:21:38'),
(14, 1, 15, 1, 0, 0, '2023-05-02 08:21:38', '2023-05-02 08:21:38'),
(15, 3, 10, 1, 0, 0, '2023-05-02 08:21:54', '2023-05-02 08:21:54'),
(16, 3, 9, 1, 0, 0, '2023-05-02 08:21:55', '2023-05-02 08:21:55'),
(17, 3, 8, 1, 0, 0, '2023-05-02 08:21:55', '2023-05-02 08:21:55'),
(18, 3, 1, 1, 0, 0, '2023-05-02 08:21:55', '2023-05-02 08:21:55'),
(19, 3, 12, 1, 0, 0, '2023-05-02 08:21:55', '2023-05-02 08:21:55'),
(20, 3, 4, 1, 0, 0, '2023-05-02 08:21:55', '2023-05-02 08:21:55'),
(21, 2, 7, 1, 0, 0, '2023-05-02 08:22:15', '2023-05-02 08:22:15'),
(22, 2, 5, 1, 0, 0, '2023-05-02 08:22:15', '2023-05-02 08:22:15'),
(23, 2, 3, 1, 0, 0, '2023-05-02 08:22:15', '2023-05-02 08:22:15'),
(24, 2, 14, 1, 0, 0, '2023-05-02 08:22:15', '2023-05-02 08:22:15'),
(25, 2, 13, 1, 0, 0, '2023-05-02 08:22:16', '2023-05-02 08:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `class_time_table`
--

CREATE TABLE `class_time_table` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_time_table`
--

INSERT INTO `class_time_table` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1, '14:08', '15:08', 'Class A', '2023-05-02 08:18:21', '2023-05-02 08:18:21'),
(7, 1, 1, 2, '15:15', '17:15', 'Room B', '2023-05-02 08:18:21', '2023-05-02 08:18:21'),
(8, 1, 1, 5, '04:18', '05:18', 'Hall', '2023-05-02 08:18:21', '2023-05-02 08:18:21'),
(9, 2, 2, 2, '16:06', '17:06', 'Room B', '2023-05-02 08:18:48', '2023-05-02 08:18:48'),
(10, 2, 2, 4, '06:18', '07:18', 'Hall 2', '2023-05-02 08:18:49', '2023-05-02 08:18:49'),
(14, 1, 15, 1, '03:24', '04:24', 'Class A', '2023-05-02 08:24:54', '2023-05-02 08:24:54'),
(15, 1, 15, 3, '04:24', '05:24', 'Room C', '2023-05-02 08:24:54', '2023-05-02 08:24:54'),
(16, 1, 15, 5, '05:24', '07:24', 'Hall j', '2023-05-02 08:24:54', '2023-05-02 08:24:54'),
(17, 3, 15, 2, '02:25', '04:25', 'class b', '2023-05-02 08:25:15', '2023-05-02 08:25:15'),
(18, 3, 4, 3, '05:25', '06:25', 'Room p', '2023-05-02 08:25:35', '2023-05-02 08:25:35'),
(20, 2, 4, 1, '07:25', '11:25', 'room p', '2023-05-02 08:26:25', '2023-05-02 08:26:25'),
(21, 2, 4, 2, '08:34', '09:30', 'hall 9', '2023-05-02 08:26:25', '2023-05-02 08:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `note`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', 'Note 1', 0, 1, '2023-05-02 12:00:53', '2023-05-02 12:00:53'),
(2, 'Testing Updated', 'Note Updated', 1, 1, '2023-05-02 12:01:07', '2023-05-02 12:18:46'),
(3, 'First Term', 'First Term Notice', 0, 1, '2023-05-02 20:49:15', '2023-05-02 20:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_start_time` varchar(255) DEFAULT NULL,
  `exam_end_time` varchar(255) DEFAULT NULL,
  `exam_rum_num` varchar(255) DEFAULT NULL,
  `exam_full_mark` varchar(255) DEFAULT NULL,
  `exam_pass_mark` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `exam_start_time`, `exam_end_time`, `exam_rum_num`, `exam_full_mark`, `exam_pass_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, '2023-05-07', '06:49', '07:49', 'room S', '200', '120', 1, '2023-05-02 14:11:33', '2023-05-02 14:11:33'),
(2, 1, 3, 12, '2023-05-07', '08:49', '09:49', 'Room T', '250', '180', 1, '2023-05-02 14:11:33', '2023-05-02 14:11:33'),
(3, 1, 3, 1, '2023-05-14', '10:49', '11:49', 'Hall Y', '200', '100', 1, '2023-05-02 14:11:34', '2023-05-02 14:11:34'),
(4, 1, 3, 8, '2023-05-11', '00:49', '01:49', 'Hall J', '200', '100', 1, '2023-05-02 14:11:34', '2023-05-02 14:11:34'),
(5, 1, 3, 9, '2023-05-21', '02:50', '03:50', 'Hall A', '220', '110', 1, '2023-05-02 14:11:34', '2023-05-02 14:11:34'),
(6, 1, 3, 10, '2023-05-24', '04:50', '05:50', 'Hall R', '200', '110', 1, '2023-05-02 14:11:34', '2023-05-02 14:11:34'),
(7, 1, 2, 13, '2023-05-09', '11:33', '01:33', 'Hall K', '150', '75', 1, '2023-05-02 14:34:05', '2023-05-02 14:34:05'),
(8, 1, 2, 14, '2023-05-08', '08:33', '10:33', 'Hall 7', '200', '100', 1, '2023-05-02 14:34:05', '2023-05-02 14:34:05'),
(9, 3, 1, 6, '2023-05-14', '14:49', '15:49', 'Hall 7', '250', '180', 1, '2023-05-02 20:50:20', '2023-05-02 20:50:20'),
(10, 3, 1, 11, '2023-05-22', '17:49', '19:50', 'Hall Y', '200', '100', 1, '2023-05-02 20:50:21', '2023-05-02 20:50:21'),
(11, 3, 2, 5, '2023-05-08', '15:50', '14:50', 'Hall J', '200', '100', 1, '2023-05-02 20:51:02', '2023-05-02 20:51:02'),
(12, 3, 2, 2, '2023-05-15', '17:50', '18:50', 'Hall B', '200', '100', 1, '2023-05-02 20:51:02', '2023-05-02 20:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:active, 1:inactive',
  `isDelete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not, 1:yes',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `status`, `isDelete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Geography', 'Practical', 0, 0, 1, '2023-04-18 14:34:59', '2023-04-18 14:49:39'),
(2, 'Mass Communication', 'Theory', 0, 0, 1, '2023-04-18 14:55:53', '2023-04-18 14:55:53'),
(3, 'Economics', 'Theory', 0, 0, 1, '2023-05-01 13:08:21', '2023-05-01 13:08:21'),
(4, 'Physics', 'Theory', 0, 0, 1, '2023-05-01 13:08:33', '2023-05-01 13:08:33'),
(5, 'Computer Science', 'Theory', 0, 0, 1, '2023-05-01 13:08:44', '2023-05-01 13:08:44'),
(6, 'Further-Mathematics', 'Theory', 0, 0, 1, '2023-05-01 13:08:55', '2023-05-01 13:08:55'),
(7, 'Chemistry-Practical', 'Practical', 0, 0, 1, '2023-05-01 13:09:15', '2023-05-01 13:09:15'),
(8, 'Chemistry', 'Theory', 0, 0, 1, '2023-05-01 13:09:37', '2023-05-01 13:09:37'),
(9, 'Biology Practical', 'Practical', 0, 0, 1, '2023-05-01 13:10:03', '2023-05-01 13:10:03'),
(10, 'Biology', 'Theory', 0, 0, 1, '2023-05-01 13:10:20', '2023-05-01 13:10:20'),
(11, 'English Language', 'Theory', 0, 0, 1, '2023-05-01 13:10:40', '2023-05-01 13:10:40'),
(12, 'Oral English', 'Practical', 0, 0, 1, '2023-05-01 13:10:55', '2023-05-01 13:10:55'),
(13, 'History', 'Theory', 0, 0, 1, '2023-05-01 13:13:43', '2023-05-01 13:13:43'),
(14, 'Government', 'Theory', 0, 0, 1, '2023-05-01 13:13:57', '2023-05-01 13:13:57'),
(15, 'Psychology', 'Theory', 0, 0, 1, '2023-05-01 13:14:10', '2023-05-01 13:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:teacher, 3:student, 4:Parent',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted 1:deleted',
  `Status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `Admission_Number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ref_num` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `Class_id` int(11) DEFAULT NULL,
  `Gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Marital_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_joined` date DEFAULT NULL,
  `Note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Work_Experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Permanent_Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Class` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Caste` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Admission_date` date DEFAULT NULL,
  `profile_pic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Blood_Grp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Height` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Last_Name`, `email`, `email_verified_at`, `password`, `remember_token`, `User_type`, `is_delete`, `Status`, `Admission_Number`, `Ref_num`, `parent_id`, `Class_id`, `Gender`, `Occupation`, `Marital_Status`, `Date_joined`, `Note`, `Work_Experience`, `Permanent_Address`, `Address`, `Date_Of_Birth`, `Class`, `Caste`, `Religion`, `Phone`, `Admission_date`, `profile_pic`, `Blood_Grp`, `Height`, `Weight`, `created_at`, `updated_at`, `Qualification`) VALUES
(1, 'Admin', NULL, 'Admin@gmail.com', NULL, '$2y$10$01XjOfycqiaAUpVw59Xaw./Qw/2Qhro842JkohAzE9ZV1R/SNBo0a', 'XsHtgJO4QnUV4wWYEJbEbepWXznORDTUsAK6TyJgAwYVwe5PVaUsCr7kZoMg', 1, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-12 21:01:00', '2023-04-24 17:02:57', NULL),
(2, 'School', NULL, 'student@gmail.com', NULL, '$2y$10$vIOy5/9TvlZNwBIx19.PyOV3H2a8O3MwRsd0WbzCO9AxUOF1zNC.e', NULL, 3, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-12 21:01:00', '2023-04-12 21:01:00', NULL),
(3, 'Parent', NULL, 'Parent@gmail.com', NULL, '$2y$10$vIOy5/9TvlZNwBIx19.PyOV3H2a8O3MwRsd0WbzCO9AxUOF1zNC.e', NULL, 4, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-12 21:01:00', '2023-04-12 21:01:00', NULL),
(4, 'Teacher', NULL, 'Teacher@gmail.com', NULL, '$2y$10$BNxtL8ZDy2kLn43X1VpJXuKd.I3WRptr8jVXMNsX0mFrZuLo8Hbn6', NULL, 2, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-12 21:01:00', '2023-04-24 17:07:24', NULL),
(5, 'admin1', NULL, 'Admin1@gmail.com', NULL, '$2y$10$oiiQO2ctgq5SoCya.VzQcuixzRMCfSE7/bHvzO6w/GnjnhzSPFCIi', NULL, 1, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-18 04:55:04', '2023-04-18 04:55:04', NULL),
(6, 'admin2', NULL, 'Admin2@gmail.com', NULL, '$2y$10$1vhMfyqE4E0MQSlNZT7Bi.28QFut26YqouwWRFMJsKzkmPrOkynuW', NULL, 1, 0, 0, '0', '0', NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', NULL, '0', '0', '0000-00-00', '0', NULL, '0', '0', '2023-04-18 04:55:35', '2023-04-18 05:17:17', NULL),
(8, 'kelvin', 'OsasKid', 'kelvinstudent@gmail.com', NULL, '$2y$10$GReVJAm/NFZj/pioFZHrlOa71McHeqs1lgFS7aXMNCMkgBptgCHXW', NULL, 3, 0, 0, 'dnbf4r94ur', 'ghfdfye745645', 9, 2, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-24', 'kelvin', 'hjfrg6464bhgfhy', 'Christain', '08162942636', '2023-04-24', 'ir1mmovuqwr3rub45yth-jpg', 'A+', '77', '100kg', '2023-04-24 20:21:19', '2023-04-26 19:53:07', NULL),
(9, 'kelvin2', 'Sas_Tech', 'kelvin@gmail.com', NULL, '$2y$10$0GYnml/qca3BaJkltRk4g.JWhYwou2.QU1b9dPWnhlaeOG9hSo7fS', NULL, 4, 0, 0, NULL, NULL, NULL, NULL, 'Male', 'Software Engineer', NULL, NULL, NULL, NULL, NULL, 'Zurich', NULL, NULL, NULL, '', '08162942636', NULL, 'gll6krmpeoqqwfjluxvx-jpg', NULL, NULL, NULL, '2023-04-25 15:58:07', '2023-05-02 16:16:00', NULL),
(10, 'lvin1', 'Sas', 'lvin1@gmail.com', NULL, '$2y$10$zqB8CbIe6ubvh528gnPkmOX2NjX1LztDavFVXZC9J9/u0HSCcFTiy', NULL, 2, 0, 0, NULL, NULL, NULL, NULL, 'Female', NULL, 'Single', '2023-04-25', 'Frontend And Backend Courses', 'Sweet and Nice', '', '', '2023-04-25', NULL, NULL, NULL, '08162942636', NULL, '2dukcbazbpmsetd8ijlh-jpg', NULL, NULL, NULL, '2023-04-25 21:18:30', '2023-05-02 14:36:38', 'Bsc'),
(11, 'fjnjj', 'bjbdj', 'student3@gmail.com', NULL, '$2y$10$JWs3YyPbWn1yZVmmqPjvqeybiL0juYxzi8or4h5U7U6K3FSC3iE8e', NULL, 3, 0, 0, 'hbjhbvhkkb8', 'b b d', NULL, 1, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-03', 'fjnjj', 'hbfrt', 'Christain', '+515818162942636', '2023-05-05', 'yhbigzxz8iozjaifdwly-jpg', 'A+', '44', '33', '2023-05-01 19:37:45', '2023-05-01 19:40:32', NULL),
(12, 'kjfbjkb', 'ugurbyh', 'student4@gmail.com', NULL, '$2y$10$aQ/S0q7VUTRWahQpLmYH2.SS8YrEMUTPApBKX4/scfm01tUN6Azu.', NULL, 3, 0, 0, 'ggyrgvy', 'yuyirvy', NULL, 2, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04', 'kjfbjkb', 'hjfrg6464bhgfhy', 'Christain', '+5892475621365', '2023-06-07', 'zcdplgufdq9sxcs8mln5-jpg', 'A+', '77', '33', '2023-05-01 19:40:04', '2023-05-02 21:39:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_calendar_day` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `full_calendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, '2023-05-01 15:34:11', '2023-05-01 15:34:11'),
(2, 'Tuesday', 2, '2023-05-01 15:34:11', '2023-05-01 15:34:11'),
(3, 'Wednessday', 3, '2023-05-01 15:34:11', '2023-05-01 15:34:11'),
(4, 'Thursday', 4, '2023-05-01 15:34:11', '2023-05-01 15:34:11'),
(5, 'Friday', 5, '2023-05-01 15:34:11', '2023-05-01 15:34:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignclassteacher`
--
ALTER TABLE `assignclassteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classsubjects`
--
ALTER TABLE `classsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time_table`
--
ALTER TABLE `class_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignclassteacher`
--
ALTER TABLE `assignclassteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classsubjects`
--
ALTER TABLE `classsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `class_time_table`
--
ALTER TABLE `class_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
