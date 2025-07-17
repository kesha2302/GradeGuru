-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 12:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradeguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description1` varchar(1000) DEFAULT NULL,
  `description2` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`about_id`, `title`, `description1`, `description2`, `created_at`, `updated_at`) VALUES
(1, 'This is GradeGuru', 'Lorem  dolor sit amet, consectetur adipiscing elit.\r\nSed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nSed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2025-06-24 04:18:39', '2025-06-24 04:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `adminregister`
--

CREATE TABLE `adminregister` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminregister`
--

INSERT INTO `adminregister` (`admin_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', '$2y$12$B5.BzMVWdiZI/BY5jkzEbOrdnbBYvlk8wVOOYjcb1SZslUCpTPOWy', '2025-06-25 05:29:48', '2025-06-25 05:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banner1', 'final testing data', '1750410447.jpg', '2025-06-20 03:37:27', '2025-06-20 03:37:27', NULL),
(2, 'New Approach to Education', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.', '1752122199.jpg', NULL, NULL, NULL),
(3, 'Best Tests for Students', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.', '1752122275.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cp_id` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `totalprice` bigint(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `cp_id`, `fullname`, `email`, `totalprice`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1,2', 'Kesha Patel', 'keshapatel6542@gmail.com', 350, 'pay_QoYZdSWgOSofXF', '2025-07-03 04:40:28', '2025-07-03 04:40:28'),
(2, 1, '5', 'Kesha Patel', 'keshapatel6542@gmail.com', 300, 'pay_QoYyQ9dviEuthO', '2025-07-03 05:03:56', '2025-07-03 05:03:56'),
(3, 1, '5', 'Kesha Patel', 'keshapatel6542@gmail.com', 300, 'pay_QoYzvSdM7lfbBU', '2025-07-03 05:05:22', '2025-07-03 05:05:22'),
(4, 2, '2,1', 'Ami Patel', 'keshapatel6542@gmail.com', 350, 'pay_Qu4GhYGwQc0ylO', '2025-07-17 02:55:46', '2025-07-17 02:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_names`
--

CREATE TABLE `class_names` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `standard` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1800) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_names`
--

INSERT INTO `class_names` (`class_id`, `standard`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Class 5', 'CTA Class 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '2025-06-19 05:28:49', '2025-06-19 05:29:57', NULL),
(2, 'Class 6', 'CTA Class 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '2025-06-19 05:30:24', '2025-06-19 05:30:24', NULL),
(4, 'Class 7', 'This is final test message', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '2025-07-17 03:40:44', '2025-07-17 03:48:26', '2025-07-17 03:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `class_prices`
--

CREATE TABLE `class_prices` (
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature` varchar(1800) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_prices`
--

INSERT INTO `class_prices` (`cp_id`, `class_id`, `title`, `feature`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'This is Class 5 Test. 20+ Test', 'This test is designed to assess the understanding of key concepts taught in Class 5.  It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 200, '2025-06-20 05:00:45', '2025-07-02 03:03:04', NULL),
(2, 2, 'This is test for Class6. 12+ Test', 'This test is designed to assess the understanding of key concepts taught in Standard 5. It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 150, '2025-06-20 05:03:21', '2025-07-02 03:05:40', NULL),
(4, 1, 'This is class 5. 35+ Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 600, '2025-07-01 05:15:56', '2025-07-02 03:05:56', NULL),
(5, 1, 'Thisis class 5. 30+ Test', 'This test is designed to assess the understanding of key concepts taught in Standard 5. It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 300, '2025-07-01 05:16:15', '2025-07-02 03:06:08', NULL),
(6, 2, 'This is class 6. 20+ Test', 'This test is designed to assess the understanding of key concepts taught in Standard 5. It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 200, '2025-07-01 05:16:30', '2025-07-02 03:06:20', NULL),
(7, 1, 'This is class 5. 25+ Test', 'This test is designed to assess the understanding of key concepts taught in Standard 5. It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 450, '2025-07-01 05:16:52', '2025-07-02 03:06:37', NULL),
(8, 2, 'This is final testing message', 'This test is designed to assess the understanding of key concepts taught in Class 6.  It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 200, '2025-07-17 03:52:10', '2025-07-17 03:52:10', NULL),
(9, 2, 'This is final testing message', 'This test is designed to assess the understanding of key concepts taught in Class 6.  It includes multiple-choice, short answer, and application-based questions to evaluate critical thinking and problem-solving skills. Students are encouraged to read each question carefully and manage their time effectively throughout the test.', 250, '2025-07-17 03:52:13', '2025-07-17 03:53:14', '2025-07-17 03:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `demo_questions`
--

CREATE TABLE `demo_questions` (
  `demoque_id` bigint(20) UNSIGNED NOT NULL,
  `demo_id` bigint(20) UNSIGNED NOT NULL,
  `question_no` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demo_questions`
--

INSERT INTO `demo_questions` (`demoque_id`, `demo_id`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'When is World Health Day observed?', 'Feb 23', 'April 7', 'Jan 28', 'April 24', 'April 7', '2025-07-14 03:50:19', '2025-07-14 03:50:19'),
(2, 1, '2', 'Where is the Raimona Reserve forest situated?', 'Assam', 'Gujarat', 'Manipur', 'Maharastra', 'Assam', '2025-07-14 03:55:09', '2025-07-14 03:55:09'),
(3, 1, '3', 'When did the First World War take place?', '1983', '1941', '1914', '1945', '1914', '2025-07-14 03:56:06', '2025-07-14 03:56:06'),
(4, 2, '1', 'In which country did cannabis originate?', 'China', 'India', 'Sri Lanka', 'Nepal', 'China', '2025-07-14 03:56:53', '2025-07-14 03:56:53'),
(5, 1, '4', 'Which is the longest river in India?', 'Yamuna', 'Tapi', 'Narmada', 'Ganga', 'Ganga', '2025-07-14 03:57:38', '2025-07-14 03:57:38'),
(6, 1, '5', 'How many primary colors are there?', '2', '4', '3', '5', '3', '2025-07-14 03:58:32', '2025-07-14 03:58:32'),
(7, 1, '6', 'What is the capital city of Australia?', 'Sydney', 'Melbourne', 'Canberra', 'Perth', 'Canberra', '2025-07-14 03:59:47', '2025-07-14 03:59:47'),
(8, 1, '7', 'In which state are Zawar mines located?', 'Rajasthan', 'Tamil Nadu', 'Karnataka', 'Kerala', 'Rajasthan', '2025-07-14 04:00:55', '2025-07-14 04:00:55'),
(9, 1, '8', 'How many days are there in a leap year?', '365', '366', '364', '333', '366', '2025-07-14 04:02:08', '2025-07-14 04:02:08'),
(10, 3, '1', 'How many continents are there in the world?', '5', '6', '7', '4', '7', '2025-07-14 04:03:26', '2025-07-14 04:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `demo_results`
--

CREATE TABLE `demo_results` (
  `demoresult_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `demo_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) NOT NULL,
  `correct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demo_results`
--

INSERT INTO `demo_results` (`demoresult_id`, `user_id`, `demo_id`, `result`, `correct`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fail', 0, '2025-07-16 04:38:49', '2025-07-16 04:38:49'),
(2, 1, 1, 'Fail', 0, '2025-07-16 04:39:14', '2025-07-16 04:39:14'),
(3, 1, 1, 'Fail', 0, '2025-07-16 04:40:03', '2025-07-16 04:40:03'),
(4, 1, 1, 'Fail', 0, '2025-07-16 04:40:21', '2025-07-16 04:40:21'),
(5, 1, 1, 'Fail', 0, '2025-07-16 04:44:33', '2025-07-16 04:44:33'),
(6, 1, 1, 'Fail', 0, '2025-07-16 04:46:01', '2025-07-16 04:46:01'),
(7, 1, 1, 'Fail', 0, '2025-07-16 04:47:24', '2025-07-16 04:47:24'),
(8, 1, 1, 'Fail', 0, '2025-07-16 04:47:42', '2025-07-16 04:47:42'),
(9, 1, 1, 'Pass', 2, '2025-07-16 04:50:40', '2025-07-16 04:50:40'),
(10, 1, 1, 'Pass', 5, '2025-07-16 04:56:19', '2025-07-16 04:56:19'),
(11, 1, 1, 'Pass', 2, '2025-07-16 22:27:55', '2025-07-16 22:27:55'),
(12, 2, 3, 'Fail', 0, '2025-07-17 02:57:06', '2025-07-17 02:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `demo_tests`
--

CREATE TABLE `demo_tests` (
  `demo_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `pass_marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demo_tests`
--

INSERT INTO `demo_tests` (`demo_id`, `class_id`, `title`, `time`, `pass_marks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test 1', 2, 2, '2025-07-14 03:04:42', '2025-07-14 03:08:12'),
(2, 1, 'Test 2', 2, 4, '2025-07-14 03:06:00', '2025-07-14 03:06:00'),
(3, 2, 'Test 1', 2, 3, '2025-07-14 03:06:11', '2025-07-14 03:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Kinjal Shah', 'kinjal@gmail.com', 'Testing message', '2025-07-11 05:09:26', '2025-07-11 05:09:26'),
(2, 'Umang', 'umang@gmail.com', 'Hii, this is umang', '2025-07-14 00:12:14', '2025-07-14 00:12:14'),
(3, 'Kedar', 'kedar@gmail.com', 'Hii, this is inquiry message from kedar', '2025-07-17 02:24:50', '2025-07-17 02:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_19_055249_create_banners_table', 2),
(5, '2025_06_19_055306_create_aboutus_table', 2),
(6, '2025_06_19_055356_create_class_names_table', 2),
(7, '2025_06_19_055418_create_class_prices_table', 2),
(10, '2025_06_19_055431_create_superquestions_table', 3),
(11, '2025_06_19_055445_create_regularquestions_table', 3),
(12, '2025_06_19_055528_create_results_table', 4),
(13, '2025_06_19_055538_create_bookings_table', 4),
(14, '2025_06_24_085450_add_que_type_to_class_prices_table', 5),
(15, '2025_06_25_082654_create_adminregister_table', 6),
(16, '2025_06_26_083724_create_test_table', 7),
(17, '2025_06_26_084024_add_test_id_to_regularquestions_table', 7),
(18, '2025_06_26_084523_add_test_id_to_regularquestions_table', 8),
(19, '2025_06_26_084856_add_test_id_to_regularquestions_table', 9),
(20, '2025_06_26_091254_add_test_to_superquestions_table', 10),
(21, '2025_06_26_092250_add_test_to_regularquestions_table', 11),
(22, '2025_07_03_062825_add_new_columns_to_booking_table', 12),
(23, '2025_07_09_082835_add_new_column_to_test_table', 13),
(24, '2025_07_10_040509_add_test_id_to_results_table', 14),
(25, '2025_07_11_083451_add_new_column_to_test_table', 15),
(26, '2025_07_11_093724_create_inquiries_table', 16),
(27, '2025_07_14_035534_create_demo_tests_table', 17),
(28, '2025_07_14_035642_create_demo_questions_table', 17),
(29, '2025_07_14_040025_create_demo_results_table', 17),
(30, '2025_07_15_043606_create_sessions_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('keshapatel6542@gmail.com', 'hV5vmWKUeId9dwKKSmy8', '2025-07-17 02:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `regularquestions`
--

CREATE TABLE `regularquestions` (
  `rq_id` bigint(20) UNSIGNED NOT NULL,
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regularquestions`
--

INSERT INTO `regularquestions` (`rq_id`, `cp_id`, `test_id`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'What is the color of apple?', 'Green', 'Orange', 'Red', 'Purple', 'Red', '2025-06-24 04:14:59', '2025-06-24 04:14:59'),
(2, 1, 1, 2, 'Delhi is situated on the bank of which river?', 'Yamuna', 'Narmada', 'Godavari', 'Tapi', 'Yamuna', '2025-07-04 00:46:11', '2025-07-04 00:46:11'),
(3, 1, 1, 3, 'Number of Union Territories there in India?', '3', '5', '8', '9', '8', '2025-07-04 00:46:42', '2025-07-04 00:46:42'),
(4, 1, 1, 4, 'Victoria Memorial is located in which city?', 'Ahmedabad', 'Jaipur', 'Mumbai', 'Kolkata', 'Kolkata', '2025-07-04 00:47:45', '2025-07-04 00:47:45'),
(5, 1, 1, 5, 'Name the brightest planet in the Solar system.', 'Mercury', 'Venus', 'Jupitor', 'Earth', 'Venus', '2025-07-04 00:48:28', '2025-07-04 00:48:28'),
(6, 1, 3, 1, 'Name one heavy metal?', 'Gold', 'Silver', 'Copper', 'Brass', 'Gold', '2025-07-04 01:14:17', '2025-07-04 01:14:17'),
(7, 1, 1, 6, 'Number of players in a Volleyball team is?', '5', '7', '6', '8', '6', '2025-07-04 01:16:12', '2025-07-04 01:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) NOT NULL,
  `correct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `user_id`, `cp_id`, `test_id`, `result`, `correct`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Pass', 7, '2025-07-10 00:41:45', '2025-07-10 00:41:45'),
(2, 1, 1, 1, 'Fail', 1, '2025-07-10 04:10:35', '2025-07-10 04:10:35'),
(3, 1, 1, 2, 'Pass', 9, '2025-07-10 04:11:35', '2025-07-10 04:11:35'),
(4, 1, 1, 1, 'Pass', 3, '2025-07-11 03:39:38', '2025-07-11 03:39:38'),
(5, 2, 1, 1, 'Fail', 0, '2025-07-17 02:59:52', '2025-07-17 02:59:52'),
(6, 2, 1, 1, 'Fail', 0, '2025-07-17 03:02:41', '2025-07-17 03:02:41'),
(7, 2, 1, 1, 'Pass', 5, '2025-07-17 03:03:59', '2025-07-17 03:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
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
('O6BFodc4WEZQTum3zXyLatPbWA4VslmE75gV6YyO', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToxMjp7czo2OiJfdG9rZW4iO3M6NDA6Im5JeFU1ME1OWXR6M0FwTVpFb1NhazdMME14S1FhSUlWTHJwdUJzTmgiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvQWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJ0ZXN0X3N0YXJ0X3RpbWVfMSI7aToxNzUyNzI1NDAxO3M6MTU6InRlc3RfZHVyYXRpb25fMSI7aToxMjA7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjExOiJ0b3RhbEFtb3VudCI7aTowO3M6NDoiY2FydCI7YTowOnt9czoxMzoidGVzdF9kdXJhdGlvbiI7aToxMjA7czoxNToidGVzdF9zdGFydF90aW1lIjtpOjE3NTI3NDEyMDU7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6ODoiYWRtaW5faWQiO2k6MTt9', 1752746516);

-- --------------------------------------------------------

--
-- Table structure for table `superquestions`
--

CREATE TABLE `superquestions` (
  `sq_id` bigint(20) UNSIGNED NOT NULL,
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superquestions`
--

INSERT INTO `superquestions` (`sq_id`, `cp_id`, `test_id`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'What is the color of grapes?', 'Green', 'Orange', 'Red', 'Purple', 'Green', '2025-06-23 05:12:08', '2025-06-23 05:53:19'),
(2, 2, 5, 1, 'What is the color of apple?', 'Green', 'Orange', 'Red', 'Purple', 'Red', '2025-06-26 05:34:24', '2025-06-26 05:34:24'),
(3, 1, 2, 2, 'Where is the tower of silence situated?', 'Bangladesh', 'India', 'Sri Lanka', 'Nepal', 'India', '2025-07-04 01:12:48', '2025-07-04 01:12:48'),
(4, 1, 2, 3, 'Which article of the Indian Constitution guarantees the Right to Equality?', 'Artical 12', 'Artical 14', 'Artical 15', 'Artiacl 20', 'Artical 14', '2025-07-08 22:23:47', '2025-07-08 22:23:47'),
(5, 1, 2, 4, 'What is the name of India\'s first satellite?', 'Aryabhata', 'Gandhi', 'Mangal', 'Sardar', 'Aryabhata', '2025-07-08 22:25:04', '2025-07-08 22:25:04'),
(6, 1, 2, 5, 'Which festival is known as the \"Festival of Lights\"?', 'Rakshabandhan', 'Uttrayan', 'Diwali', 'Navratri', 'Diwali', '2025-07-08 22:26:17', '2025-07-08 22:26:17'),
(7, 1, 2, 6, 'Which is the largest state in India by area?', 'Maharastra', 'Rajasthan', 'Gujarat', 'Punjab', 'Rajasthan', '2025-07-08 22:28:03', '2025-07-08 22:28:03'),
(8, 1, 2, 7, 'What is the national flower of India?', 'Rose', 'Tulip', 'Jasmin', 'Lotus', 'Lotus', '2025-07-08 22:29:06', '2025-07-08 22:29:06'),
(9, 1, 2, 8, 'Which Indian state is known as the \"Spice Garden of India\"', 'Kerala', 'Gujarat', 'TamilNadu', 'Punjab', 'Kerala', '2025-07-08 22:30:09', '2025-07-08 22:30:09'),
(10, 1, 2, 9, 'Which sport is known as the \"King of Sports\" in India?', 'Badminton', 'Football', 'Hockey', 'Cricket', 'Cricket', '2025-07-08 22:31:21', '2025-07-08 22:31:21'),
(11, 1, 2, 10, 'In which year did India win its first Cricket World Cup?', '1995', '1983', '1990', '1980', '1983', '2025-07-08 22:32:38', '2025-07-08 22:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `que_type` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `pass_marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `cp_id`, `title`, `que_type`, `time`, `pass_marks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test 1', 'Regular', '2', 3, '2025-06-26 04:59:27', '2025-07-11 03:29:59'),
(2, 1, 'Test 1', 'Super', '5', 3, '2025-06-26 05:04:27', '2025-07-11 03:30:07'),
(3, 1, 'Test 2', 'Regular', '2', 3, '2025-06-26 05:04:38', '2025-07-11 03:30:18'),
(4, 1, 'Test 2', 'Super', '5', NULL, '2025-06-26 05:04:51', '2025-07-09 03:15:50'),
(5, 2, 'Test 1', 'Super', NULL, NULL, '2025-06-26 05:05:03', '2025-06-26 05:05:03'),
(7, 1, 'Test 3', 'Super', NULL, NULL, '2025-06-26 05:05:57', '2025-07-04 00:49:53'),
(8, 2, 'Test 2', 'Regular', NULL, NULL, '2025-06-26 05:07:27', '2025-06-26 05:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kesha Patel', 'keshapatel6542@gmail.com', 234567, NULL, '$2y$12$/pcZmuOXSgPlPDDU3z9UPO1gh0vvRM5d0HUJVQqtFnxchUjf0M1UK', NULL, '2025-06-23 03:14:26', '2025-07-17 02:52:46'),
(2, 'Ami Patel', 'ami@gmail.com', 1234512345, NULL, '$2y$12$2pCv96v7AVbPtLkMkqFGvO8pxxbPOgn5v1i2TqMrMGuikCw1BrrN2', NULL, '2025-07-17 02:26:33', '2025-07-17 02:57:29'),
(3, 'Abhi Bhalodia', 'abhi@gmail.com', 1234567890, NULL, '$2y$12$ZU/i/LkAB41j9NaUZEEg3.UMgPpnMo.PyjFqTaa.OLqCyKb2XmlxK', NULL, '2025-07-17 02:45:46', '2025-07-17 02:45:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `adminregister`
--
ALTER TABLE `adminregister`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `class_names`
--
ALTER TABLE `class_names`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_prices`
--
ALTER TABLE `class_prices`
  ADD PRIMARY KEY (`cp_id`),
  ADD KEY `class_prices_class_id_foreign` (`class_id`);

--
-- Indexes for table `demo_questions`
--
ALTER TABLE `demo_questions`
  ADD PRIMARY KEY (`demoque_id`),
  ADD KEY `demo_questions_demo_id_foreign` (`demo_id`);

--
-- Indexes for table `demo_results`
--
ALTER TABLE `demo_results`
  ADD PRIMARY KEY (`demoresult_id`),
  ADD KEY `demo_results_user_id_foreign` (`user_id`),
  ADD KEY `demo_results_demo_id_foreign` (`demo_id`);

--
-- Indexes for table `demo_tests`
--
ALTER TABLE `demo_tests`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `demo_tests_class_id_foreign` (`class_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `regularquestions`
--
ALTER TABLE `regularquestions`
  ADD PRIMARY KEY (`rq_id`),
  ADD KEY `regularquestions_cp_id_foreign` (`cp_id`),
  ADD KEY `regularquestions_test_id_foreign` (`test_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_cp_id_foreign` (`cp_id`),
  ADD KEY `results_test_id_foreign` (`test_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `superquestions`
--
ALTER TABLE `superquestions`
  ADD PRIMARY KEY (`sq_id`),
  ADD KEY `superquestions_cp_id_foreign` (`cp_id`),
  ADD KEY `superquestions_test_id_foreign` (`test_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `test_cp_id_foreign` (`cp_id`);

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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `about_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminregister`
--
ALTER TABLE `adminregister`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_names`
--
ALTER TABLE `class_names`
  MODIFY `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_prices`
--
ALTER TABLE `class_prices`
  MODIFY `cp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `demo_questions`
--
ALTER TABLE `demo_questions`
  MODIFY `demoque_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `demo_results`
--
ALTER TABLE `demo_results`
  MODIFY `demoresult_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `demo_tests`
--
ALTER TABLE `demo_tests`
  MODIFY `demo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `regularquestions`
--
ALTER TABLE `regularquestions`
  MODIFY `rq_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `superquestions`
--
ALTER TABLE `superquestions`
  MODIFY `sq_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `class_prices`
--
ALTER TABLE `class_prices`
  ADD CONSTRAINT `class_prices_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_names` (`class_id`);

--
-- Constraints for table `demo_questions`
--
ALTER TABLE `demo_questions`
  ADD CONSTRAINT `demo_questions_demo_id_foreign` FOREIGN KEY (`demo_id`) REFERENCES `demo_tests` (`demo_id`);

--
-- Constraints for table `demo_results`
--
ALTER TABLE `demo_results`
  ADD CONSTRAINT `demo_results_demo_id_foreign` FOREIGN KEY (`demo_id`) REFERENCES `demo_tests` (`demo_id`),
  ADD CONSTRAINT `demo_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `demo_tests`
--
ALTER TABLE `demo_tests`
  ADD CONSTRAINT `demo_tests_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_names` (`class_id`);

--
-- Constraints for table `regularquestions`
--
ALTER TABLE `regularquestions`
  ADD CONSTRAINT `regularquestions_cp_id_foreign` FOREIGN KEY (`cp_id`) REFERENCES `class_prices` (`cp_id`),
  ADD CONSTRAINT `regularquestions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_cp_id_foreign` FOREIGN KEY (`cp_id`) REFERENCES `class_prices` (`cp_id`),
  ADD CONSTRAINT `results_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `superquestions`
--
ALTER TABLE `superquestions`
  ADD CONSTRAINT `superquestions_cp_id_foreign` FOREIGN KEY (`cp_id`) REFERENCES `class_prices` (`cp_id`),
  ADD CONSTRAINT `superquestions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_cp_id_foreign` FOREIGN KEY (`cp_id`) REFERENCES `class_prices` (`cp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
