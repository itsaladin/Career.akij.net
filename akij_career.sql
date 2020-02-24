-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 09:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akij_career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Approved, 0=Not Approved',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `is_approved`, `username`, `phone_no`, `website`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nuray Alam Parash', 'nuray.dti@akij.net', 1, 'parash', NULL, NULL, NULL, '$2y$10$FkNT8/9h9lGijEMcexIj/.LSJhMsHgRz/3jRomF7p0w8JJ6Etwpsa', '2019-06-30 03:49:23', '2019-06-30 03:49:23'),
(3, 'Admin', 'admin@example.com', 1, 'admin', NULL, NULL, NULL, '$2y$10$FkNT8/9h9lGijEMcexIj/.LSJhMsHgRz/3jRomF7p0w8JJ6Etwpsa', '2019-06-30 03:49:23', '2019-06-30 03:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Benefit Type',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `benefit_type_id`, `created_at`, `updated_at`) VALUES
(1, 'T/A', 1, '2019-08-17 06:21:06', '2019-08-17 06:21:06'),
(2, 'Mobile Bill', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(3, 'Pension Policy', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(4, 'Tour Allowance', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(5, 'Credit Card', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(6, 'Medical Allowance', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(7, 'Performance Bonus', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(8, 'Profit Share', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(9, 'Providant Fund', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(10, 'Weekly 2 holidays', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(11, 'Insurance', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(12, 'Gratuity', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(13, 'Over Time Allowance', 1, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(14, 'Partially Subsidize', 2, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(15, 'Full Subsidize', 2, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(16, 'Half Yearly', 3, '2019-08-17 06:21:22', '2019-08-17 06:21:22'),
(17, 'Yearly', 3, '2019-08-17 06:21:22', '2019-08-17 06:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_types`
--

CREATE TABLE `benefit_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_types`
--

INSERT INTO `benefit_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Common Facilities', '2019-08-17 06:19:57', '2019-08-17 06:19:57'),
(2, 'Lunch Facilities', '2019-08-17 06:20:46', '2019-08-17 06:20:46'),
(3, 'Salary Review', '2019-08-17 06:20:47', '2019-08-17 06:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'If Null then It is a parent category',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>featured, 0=>not featured',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `name`, `slug`, `image`, `icon`, `description`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Others', 'others', NULL, NULL, NULL, 1, 1, '2019-07-01 10:52:38', '2019-07-01 10:52:38'),
(2, NULL, 'Business', 'business', NULL, NULL, NULL, 1, 1, '2019-07-01 10:52:38', '2019-07-01 10:52:38'),
(3, NULL, 'Industry', 'industry', NULL, NULL, NULL, 1, 1, '2019-07-01 10:52:38', '2019-07-01 10:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `is_primary_contact` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Primary, 0=Not Primary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `designation`, `employer_id`, `is_primary_contact`, `created_at`, `updated_at`) VALUES
(13, 'Maniruzzaman', '01951233084', 'manirujjamanakash@gmail.com', 'CEO', 14, 1, '2019-07-10 23:22:43', '2019-07-10 23:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `phone_code`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'BD', '+880', '2019-07-01 10:49:30', '2019-07-01 10:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `known_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_level_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'If A degree is inside a degree level',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `degree_level_id`, `created_at`, `updated_at`) VALUES
(1, 'Primary Examination - PSC', 1, '2019-08-19 08:35:03', '2019-08-19 08:35:03'),
(2, 'Primary Examination - Ebtedayi', 1, '2019-08-19 08:35:03', '2019-08-19 08:35:03'),
(3, 'Junior School Certificate', 2, '2019-08-19 08:35:47', '2019-08-19 08:35:47'),
(4, 'Junior Dakhil School Certificate', 2, '2019-08-19 08:35:47', '2019-08-19 08:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `degree_levels`
--

CREATE TABLE `degree_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degree_levels`
--

INSERT INTO `degree_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PSC/5 Pass', '2019-08-19 07:58:24', '2019-08-19 07:58:24'),
(2, 'JSC/JDC/8 Pass', '2019-08-19 07:58:24', '2019-08-19 07:58:24'),
(3, 'Secondary', '2019-08-19 07:59:05', '2019-08-19 07:59:05'),
(4, 'Higher Secondary', '2019-08-19 07:59:05', '2019-08-19 07:59:05'),
(5, 'Diploma', '2019-08-19 07:59:05', '2019-08-19 07:59:05'),
(6, 'Bachelor/Honors', '2019-08-19 07:59:05', '2019-08-19 07:59:05'),
(7, 'Masters', '2019-08-19 07:59:05', '2019-08-19 07:59:05'),
(8, 'PHD (Doctor of Phylosophy)', '2019-08-19 07:59:05', '2019-08-19 07:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', NULL, '2019-07-01 10:50:06', '2019-07-01 10:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, '2019-07-01 10:49:48', '2019-07-01 10:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazilla_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_trade_licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_rl_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `name_bn`, `country_id`, `division_id`, `district_id`, `upazilla_id`, `category_id`, `email`, `api_token`, `business_description`, `business_trade_licence`, `business_rl_no`, `address`, `address_bn`, `email_verified_at`, `password`, `website`, `logo`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'Akij Food and Beverage Ltd', 'আকিজ ফুড এন্ড বেভারেজ', 1, 1, 1, 1, 2, 'manirujjamanakash@gmail.com', '3fa4c541510fbe23ef2b1475990997220deab5dcf8addab837bf63f8f8dd695ee135701a78fb11ce', 'আকিজ হাউজ, শহীদ তাজউদ্দীন সরণী', NULL, NULL, 'আকিজ হাউজ, শহীদ তাজউদ্দীন সরণী', 'আকিজ হাউজ, শহীদ তাজউদ্দীন সরণী', NULL, '$2y$10$HhMhMepOCIi2rmcUhcRINu9zr5HVKwUpo.lWo9M8ZBazuUT5DyxEu', NULL, '1562822563.png', NULL, '2019-07-10 23:22:43', '2019-07-17 23:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `employer_billing_addresses`
--

CREATE TABLE `employer_billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_types`
--

CREATE TABLE `employer_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_types`
--

INSERT INTO `employer_types` (`id`, `employer_id`, `type_id`, `created_at`, `updated_at`) VALUES
(13, 14, 2, '2019-07-17 23:42:39', '2019-07-17 23:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka University', 'Dhaka University', NULL, 1, '2019-08-19 09:08:38', '2019-08-19 09:08:38'),
(2, 'BUET', NULL, NULL, 1, '2019-08-19 09:08:38', '2019-08-19 09:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `deadline` date DEFAULT NULL,
  `resume_receiving_option_online` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is resume can be received via online !!',
  `resume_receiving_option` tinyint(1) DEFAULT NULL COMMENT '1=>Email, 2=>Hardcopy,3=>Walk in interview',
  `resume_receiving_option_description` tinyint(1) DEFAULT NULL,
  `no_vacancy` tinyint(3) UNSIGNED DEFAULT '1',
  `is_photograph_enclose` tinyint(1) NOT NULL DEFAULT '0',
  `special_instruction` text COLLATE utf8mb4_unicode_ci,
  `job_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `job_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `job_context` text COLLATE utf8mb4_unicode_ci,
  `job_responsibility` text COLLATE utf8mb4_unicode_ci,
  `job_location` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>inside Bangladesh, 0=>outside Bangladesh',
  `job_location_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_salary_negotiable` tinyint(1) NOT NULL DEFAULT '0',
  `min_salary` double(8,2) NOT NULL DEFAULT '0.00',
  `max_salary` double(8,2) NOT NULL DEFAULT '0.00',
  `salary_type` tinyint(191) DEFAULT '3' COMMENT '1=>Hourly, 2=>Daily, 3=>Monthly, 4=>Yearly',
  `additional_salary_info` text COLLATE utf8mb4_unicode_ci,
  `has_benefits` tinyint(1) NOT NULL DEFAULT '0',
  `festival_bonus` tinyint(2) DEFAULT NULL,
  `other_bonus` text COLLATE utf8mb4_unicode_ci,
  `other_educational_qualification` text COLLATE utf8mb4_unicode_ci,
  `course_info` text COLLATE utf8mb4_unicode_ci,
  `professional_certificates` text COLLATE utf8mb4_unicode_ci,
  `experience_required` tinyint(1) NOT NULL DEFAULT '0',
  `experience_min_year` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `experience_max_year` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_fresher_encourage` tinyint(1) NOT NULL DEFAULT '0',
  `area_experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_business` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_skills` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_age` tinyint(3) UNSIGNED NOT NULL DEFAULT '18',
  `max_age` tinyint(3) UNSIGNED NOT NULL DEFAULT '60',
  `gender` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Male, 0=>Female, 2=>Others',
  `is_retired_army_officer` tinyint(1) NOT NULL DEFAULT '0',
  `company_name_show` tinyint(1) NOT NULL DEFAULT '1',
  `company_address_show` tinyint(1) NOT NULL DEFAULT '1',
  `company_business_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `total_view` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `total_search` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=>Draft, 1=>Active, 2=>Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `slug`, `category_id`, `employer_id`, `deadline`, `resume_receiving_option_online`, `resume_receiving_option`, `resume_receiving_option_description`, `no_vacancy`, `is_photograph_enclose`, `special_instruction`, `job_type_id`, `job_level_id`, `job_context`, `job_responsibility`, `job_location`, `job_location_details`, `is_salary_negotiable`, `min_salary`, `max_salary`, `salary_type`, `additional_salary_info`, `has_benefits`, `festival_bonus`, `other_bonus`, `other_educational_qualification`, `course_info`, `professional_certificates`, `experience_required`, `experience_min_year`, `experience_max_year`, `is_fresher_encourage`, `area_experience`, `area_business`, `additional_skills`, `min_age`, `max_age`, `gender`, `is_retired_army_officer`, `company_name_show`, `company_address_show`, `company_business_show`, `is_featured`, `is_confirmed`, `total_view`, `total_search`, `status`, `created_at`, `updated_at`) VALUES
(3, 'CEO Of Akij Food', 'ceo-of-akij-food', 1, 14, '2019-08-15', 1, NULL, NULL, 12, 0, '3232323', NULL, 3, 'Job Context', 'Job Responsibilities', 1, 'Dhaka', 0, 2000.00, 3000.00, 3, 'As per company policy', 1, 3, 'Another More Bonus', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, 18, 60, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, '2019-08-16 23:21:58', '2019-08-19 02:03:07'),
(4, 'Test Product', 'test-product', 2, 14, '2019-08-21', 1, NULL, NULL, 12, 0, '121212', NULL, NULL, NULL, NULL, 1, NULL, 0, 0.00, 0.00, 3, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, 18, 60, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, '2019-08-19 03:16:56', '2019-08-19 03:16:56'),
(5, 'Test Product', 'test-product-1', 2, 14, '2019-08-30', 1, NULL, NULL, 12, 0, 'ssdsdsd', NULL, 3, 'wewewewewe', 'ersdwewewe', 1, 'Patuakhali', 0, 0.00, 0.00, 3, '2323', 0, 2, '2323', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, 18, 60, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, '2019-08-19 03:17:43', '2019-08-19 04:23:13'),
(6, 'Test Product', 'test-product-2', 2, 14, '2019-08-31', 1, NULL, NULL, NULL, 0, '2323', NULL, NULL, NULL, NULL, 1, NULL, 0, 0.00, 0.00, 3, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, 18, 60, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, '2019-08-27 23:45:25', '2019-08-27 23:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_activities`
--

CREATE TABLE `job_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `expected_salary` double(8,2) NOT NULL DEFAULT '0.00',
  `is_salary_negotiable` tinyint(1) NOT NULL DEFAULT '0',
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `use_profile_cv` tinyint(1) NOT NULL DEFAULT '0',
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'File Link',
  `is_short_listed` tinyint(1) NOT NULL DEFAULT '0',
  `is_final_listed` tinyint(1) NOT NULL DEFAULT '0',
  `is_interviewed` tinyint(1) NOT NULL DEFAULT '0',
  `is_emailed` tinyint(1) NOT NULL DEFAULT '0',
  `is_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `is_starred` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_benefits`
--

CREATE TABLE `job_benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `benefit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_benefits`
--

INSERT INTO `job_benefits` (`id`, `job_id`, `benefit_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, NULL),
(2, 3, 12, NULL, NULL),
(3, 3, 5, '2019-08-18 21:36:48', '2019-08-18 21:36:48'),
(4, 3, 12, '2019-08-18 21:36:48', '2019-08-18 21:36:48'),
(5, 3, 3, '2019-08-18 21:38:54', '2019-08-18 21:38:54'),
(6, 3, 4, '2019-08-18 21:38:54', '2019-08-18 21:38:54'),
(7, 3, 5, '2019-08-18 21:38:54', '2019-08-18 21:38:54'),
(8, 3, 12, '2019-08-18 21:38:54', '2019-08-18 21:38:54'),
(9, 3, 3, '2019-08-18 21:39:11', '2019-08-18 21:39:11'),
(10, 3, 4, '2019-08-18 21:39:11', '2019-08-18 21:39:11'),
(11, 3, 5, '2019-08-18 21:39:11', '2019-08-18 21:39:11'),
(12, 3, 12, '2019-08-18 21:39:11', '2019-08-18 21:39:11'),
(13, 3, 3, '2019-08-18 21:43:19', '2019-08-18 21:43:19'),
(14, 3, 4, '2019-08-18 21:43:19', '2019-08-18 21:43:19'),
(15, 3, 5, '2019-08-18 21:43:19', '2019-08-18 21:43:19'),
(16, 3, 12, '2019-08-18 21:43:19', '2019-08-18 21:43:19'),
(17, 3, 17, '2019-08-18 21:43:19', '2019-08-18 21:43:19'),
(18, 3, 3, '2019-08-18 21:43:27', '2019-08-18 21:43:27'),
(19, 3, 4, '2019-08-18 21:43:27', '2019-08-18 21:43:27'),
(20, 3, 5, '2019-08-18 21:43:27', '2019-08-18 21:43:27'),
(21, 3, 12, '2019-08-18 21:43:27', '2019-08-18 21:43:27'),
(22, 3, 17, '2019-08-18 21:43:27', '2019-08-18 21:43:27'),
(23, 3, 3, '2019-08-18 21:43:48', '2019-08-18 21:43:48'),
(24, 3, 4, '2019-08-18 21:43:48', '2019-08-18 21:43:48'),
(25, 3, 5, '2019-08-18 21:43:48', '2019-08-18 21:43:48'),
(26, 3, 12, '2019-08-18 21:43:48', '2019-08-18 21:43:48'),
(27, 3, 17, '2019-08-18 21:43:48', '2019-08-18 21:43:48'),
(28, 3, 3, '2019-08-18 21:46:01', '2019-08-18 21:46:01'),
(29, 3, 4, '2019-08-18 21:46:01', '2019-08-18 21:46:01'),
(30, 3, 5, '2019-08-18 21:46:01', '2019-08-18 21:46:01'),
(31, 3, 12, '2019-08-18 21:46:01', '2019-08-18 21:46:01'),
(32, 3, 17, '2019-08-18 21:46:01', '2019-08-18 21:46:01'),
(33, 3, 3, '2019-08-18 21:46:44', '2019-08-18 21:46:44'),
(34, 3, 4, '2019-08-18 21:46:44', '2019-08-18 21:46:44'),
(35, 3, 5, '2019-08-18 21:46:44', '2019-08-18 21:46:44'),
(36, 3, 12, '2019-08-18 21:46:44', '2019-08-18 21:46:44'),
(37, 3, 17, '2019-08-18 21:46:44', '2019-08-18 21:46:44'),
(38, 3, 3, '2019-08-18 21:51:16', '2019-08-18 21:51:16'),
(39, 3, 4, '2019-08-18 21:51:16', '2019-08-18 21:51:16'),
(40, 3, 5, '2019-08-18 21:51:16', '2019-08-18 21:51:16'),
(41, 3, 12, '2019-08-18 21:51:16', '2019-08-18 21:51:16'),
(42, 3, 17, '2019-08-18 21:51:16', '2019-08-18 21:51:16'),
(43, 3, 3, '2019-08-18 21:51:23', '2019-08-18 21:51:23'),
(44, 3, 4, '2019-08-18 21:51:23', '2019-08-18 21:51:23'),
(45, 3, 5, '2019-08-18 21:51:23', '2019-08-18 21:51:23'),
(46, 3, 12, '2019-08-18 21:51:23', '2019-08-18 21:51:23'),
(47, 3, 17, '2019-08-18 21:51:23', '2019-08-18 21:51:23'),
(48, 3, 3, '2019-08-18 22:35:50', '2019-08-18 22:35:50'),
(49, 3, 4, '2019-08-18 22:35:50', '2019-08-18 22:35:50'),
(50, 3, 5, '2019-08-18 22:35:50', '2019-08-18 22:35:50'),
(51, 3, 12, '2019-08-18 22:35:50', '2019-08-18 22:35:50'),
(52, 3, 17, '2019-08-18 22:35:50', '2019-08-18 22:35:50'),
(53, 3, 3, '2019-08-18 22:36:12', '2019-08-18 22:36:12'),
(54, 3, 4, '2019-08-18 22:36:12', '2019-08-18 22:36:12'),
(55, 3, 5, '2019-08-18 22:36:12', '2019-08-18 22:36:12'),
(56, 3, 12, '2019-08-18 22:36:12', '2019-08-18 22:36:12'),
(57, 3, 17, '2019-08-18 22:36:12', '2019-08-18 22:36:12'),
(58, 3, 3, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(59, 3, 4, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(60, 3, 5, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(61, 3, 6, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(62, 3, 12, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(63, 3, 17, '2019-08-18 22:36:28', '2019-08-18 22:36:28'),
(64, 3, 3, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(65, 3, 4, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(66, 3, 5, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(67, 3, 6, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(68, 3, 12, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(69, 3, 17, '2019-08-18 22:36:37', '2019-08-18 22:36:37'),
(70, 3, 3, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(71, 3, 4, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(72, 3, 5, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(73, 3, 6, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(74, 3, 12, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(75, 3, 17, '2019-08-18 22:37:12', '2019-08-18 22:37:12'),
(76, 3, 3, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(77, 3, 4, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(78, 3, 5, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(79, 3, 6, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(80, 3, 12, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(81, 3, 17, '2019-08-19 01:45:06', '2019-08-19 01:45:06'),
(82, 3, 3, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(83, 3, 4, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(84, 3, 5, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(85, 3, 6, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(86, 3, 11, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(87, 3, 12, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(88, 3, 17, '2019-08-19 02:03:07', '2019-08-19 02:03:07'),
(89, 3, 3, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(90, 3, 4, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(91, 3, 5, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(92, 3, 6, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(93, 3, 11, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(94, 3, 12, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(95, 3, 17, '2019-08-19 02:08:14', '2019-08-19 02:08:14'),
(96, 3, 3, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(97, 3, 4, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(98, 3, 5, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(99, 3, 6, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(100, 3, 11, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(101, 3, 12, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(102, 3, 17, '2019-08-19 02:08:30', '2019-08-19 02:08:30'),
(103, 5, 2, '2019-08-19 03:19:45', '2019-08-19 03:19:45'),
(104, 5, 6, '2019-08-19 03:19:45', '2019-08-19 03:19:45'),
(105, 5, 7, '2019-08-19 03:19:45', '2019-08-19 03:19:45'),
(106, 5, 10, '2019-08-19 03:19:45', '2019-08-19 03:19:45'),
(107, 5, 14, '2019-08-19 03:19:45', '2019-08-19 03:19:45'),
(108, 5, 2, '2019-08-19 04:21:38', '2019-08-19 04:21:38'),
(109, 5, 6, '2019-08-19 04:21:38', '2019-08-19 04:21:38'),
(110, 5, 7, '2019-08-19 04:21:38', '2019-08-19 04:21:38'),
(111, 5, 10, '2019-08-19 04:21:38', '2019-08-19 04:21:38'),
(112, 5, 14, '2019-08-19 04:21:38', '2019-08-19 04:21:38'),
(113, 5, 2, '2019-08-19 04:21:55', '2019-08-19 04:21:55'),
(114, 5, 6, '2019-08-19 04:21:55', '2019-08-19 04:21:55'),
(115, 5, 7, '2019-08-19 04:21:55', '2019-08-19 04:21:55'),
(116, 5, 10, '2019-08-19 04:21:55', '2019-08-19 04:21:55'),
(117, 5, 14, '2019-08-19 04:21:55', '2019-08-19 04:21:55'),
(118, 5, 2, '2019-08-19 04:22:17', '2019-08-19 04:22:17'),
(119, 5, 6, '2019-08-19 04:22:17', '2019-08-19 04:22:17'),
(120, 5, 7, '2019-08-19 04:22:17', '2019-08-19 04:22:17'),
(121, 5, 10, '2019-08-19 04:22:17', '2019-08-19 04:22:17'),
(122, 5, 14, '2019-08-19 04:22:17', '2019-08-19 04:22:17'),
(123, 5, 2, '2019-08-19 04:22:24', '2019-08-19 04:22:24'),
(124, 5, 6, '2019-08-19 04:22:24', '2019-08-19 04:22:24'),
(125, 5, 7, '2019-08-19 04:22:24', '2019-08-19 04:22:24'),
(126, 5, 10, '2019-08-19 04:22:24', '2019-08-19 04:22:24'),
(127, 5, 14, '2019-08-19 04:22:24', '2019-08-19 04:22:24'),
(128, 5, 2, '2019-08-19 04:22:32', '2019-08-19 04:22:32'),
(129, 5, 6, '2019-08-19 04:22:32', '2019-08-19 04:22:32'),
(130, 5, 7, '2019-08-19 04:22:32', '2019-08-19 04:22:32'),
(131, 5, 10, '2019-08-19 04:22:32', '2019-08-19 04:22:32'),
(132, 5, 14, '2019-08-19 04:22:32', '2019-08-19 04:22:32'),
(133, 5, 2, '2019-08-19 04:22:43', '2019-08-19 04:22:43'),
(134, 5, 6, '2019-08-19 04:22:43', '2019-08-19 04:22:43'),
(135, 5, 7, '2019-08-19 04:22:43', '2019-08-19 04:22:43'),
(136, 5, 10, '2019-08-19 04:22:43', '2019-08-19 04:22:43'),
(137, 5, 14, '2019-08-19 04:22:43', '2019-08-19 04:22:43'),
(138, 5, 2, '2019-08-19 04:23:13', '2019-08-19 04:23:13'),
(139, 5, 6, '2019-08-19 04:23:13', '2019-08-19 04:23:13'),
(140, 5, 7, '2019-08-19 04:23:13', '2019-08-19 04:23:13'),
(141, 5, 10, '2019-08-19 04:23:13', '2019-08-19 04:23:13'),
(142, 5, 14, '2019-08-19 04:23:13', '2019-08-19 04:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `job_employment_statuses`
--

CREATE TABLE `job_employment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `job_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_favorites`
--

CREATE TABLE `job_favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_institutions`
--

CREATE TABLE `job_institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_levels`
--

CREATE TABLE `job_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_levels`
--

INSERT INTO `job_levels` (`id`, `name`, `color`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Entry', NULL, NULL, 1, '2019-08-17 05:39:25', '2019-08-17 05:39:25'),
(2, 'Mid', NULL, NULL, 1, '2019-08-17 05:39:25', '2019-08-17 05:39:25'),
(3, 'Top', NULL, NULL, 1, '2019-08-17 05:39:34', '2019-08-17 05:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_qualifications`
--

CREATE TABLE `job_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `degree_level_id` bigint(20) UNSIGNED NOT NULL,
  `degree_id` bigint(20) UNSIGNED NOT NULL,
  `major_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_statuses`
--

CREATE TABLE `job_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_statuses`
--

INSERT INTO `job_statuses` (`id`, `job_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2019-08-16 23:21:58', '2019-08-16 23:21:58'),
(2, 4, 1, '2019-08-19 03:16:56', '2019-08-19 03:16:56'),
(3, 5, 1, '2019-08-19 03:17:43', '2019-08-19 03:17:43'),
(4, 6, 1, '2019-08-27 23:45:25', '2019-08-27 23:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inside_bangladesh` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_06_27_042050_create_settings_table', 1),
(39, '2019_06_27_042102_create_currencies_table', 1),
(40, '2019_06_27_042332_create_countries_table', 1),
(41, '2019_06_27_042340_create_divisions_table', 1),
(42, '2019_06_27_042350_create_districts_table', 1),
(43, '2019_06_27_042360_create_upazillas_table', 1),
(44, '2019_06_27_043329_create_categories_table', 1),
(45, '2019_06_27_043340_create_skills_table', 1),
(46, '2019_06_27_043358_create_job_types_table', 1),
(47, '2019_06_27_043614_create_job_levels_table', 1),
(48, '2019_06_27_043813_create_institutions_table', 1),
(49, '2019_06_27_045218_create_degree_levels_table', 1),
(50, '2019_06_27_050452_create_degrees_table', 1),
(51, '2019_06_27_054902_create_benefit_types_table', 1),
(52, '2019_06_27_054932_create_benefits_table', 1),
(53, '2019_06_27_054950_create_locations_table', 1),
(54, '2019_06_27_054955_create_types_table', 1),
(55, '2019_06_27_055700_create_users_table', 1),
(56, '2019_06_27_055710_create_employers_table', 1),
(57, '2019_06_27_055715_create_employer_types_table', 1),
(58, '2019_06_27_055720_create_employer_billing_addresses_table', 1),
(59, '2019_06_27_055740_create_jobs_table', 1),
(60, '2019_06_27_055760_create_contacts_table', 1),
(61, '2019_06_27_063507_create_job_locations_table', 1),
(62, '2019_06_27_080733_create_job_favorites_table', 1),
(63, '2019_06_27_080904_create_job_skills_table', 1),
(64, '2019_06_27_081317_create_job_activities_table', 1),
(65, '2019_06_27_081320_create_job_qualifications_table', 1),
(66, '2019_06_27_082143_create_subscribers_table', 1),
(67, '2019_06_27_084753_create_user_experiences_table', 1),
(68, '2019_06_27_084922_create_user_qualifications_table', 1),
(69, '2019_06_27_085206_create_user_skills_table', 1),
(70, '2019_06_27_085712_create_user_portfolios_table', 1),
(71, '2019_06_27_085846_create_user_awards_table', 1),
(72, '2019_06_27_095141_create_pages_table', 1),
(73, '2019_06_30_045150_create_permission_tables', 2),
(75, '2019_06_30_045500_create_admins_table', 3),
(79, '2019_06_27_081330_create_job_employment_statuses_table', 4),
(80, '2019_06_27_055725_create_statuses_table', 5),
(81, '2019_06_27_081325_create_job_statuses_table', 6),
(82, '2019_08_17_060828_create_job_benefits_table', 7),
(83, '2019_08_19_090944_create_job_institutions_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\Admin', 1),
(7, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('manirujjamanakash@gmail.com', '$2y$10$W4w4kV0jP56xaQPaP8S41uZELLP2HR411ym0mU2MJk8JNqwN.P6A.', '2019-07-26 10:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin_dashboard.view', 'admin', '2019-06-30 05:59:14', '2019-06-30 05:59:14'),
(2, 'employers.view', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(3, 'employers.edit', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(4, 'employers.delete', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(5, 'employers.create', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(6, 'jobs.create', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(7, 'jobs.view', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(8, 'jobs.delete', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57'),
(9, 'jobs.edit', 'admin', '2019-07-01 02:16:57', '2019-07-01 02:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2019-06-30 10:53:43', '2019-06-30 10:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toll_free` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webmail_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '2019-08-17 05:19:59', '2019-08-17 05:19:59'),
(2, 'Part Time', '2019-08-17 05:20:35', '2019-08-17 05:20:35'),
(3, 'Contractual', '2019-08-17 05:20:35', '2019-08-17 05:20:35'),
(4, 'Internship', '2019-08-17 05:20:35', '2019-08-17 05:20:35'),
(5, 'Freelance', '2019-08-17 05:20:35', '2019-08-17 05:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active to receive notification, 0=> Not active to receive notification',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Business', '2019-07-08 05:59:23', '2019-07-08 05:59:23'),
(2, 'Industry', '2019-07-08 05:59:23', '2019-07-08 05:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `district_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', NULL, '2019-07-01 10:50:27', '2019-07-01 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `job_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Job Seeker CV file',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_awards`
--

CREATE TABLE `user_awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `award_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_current_job` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolios`
--

CREATE TABLE `user_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_qualifications`
--

CREATE TABLE `user_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `degree_level_id` bigint(20) UNSIGNED NOT NULL,
  `degree_id` bigint(20) UNSIGNED NOT NULL,
  `major_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `institute_university_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` tinyint(3) UNSIGNED DEFAULT NULL,
  `get_cgpa` double(8,2) DEFAULT NULL,
  `on_cgpa` double(8,2) DEFAULT NULL COMMENT 'The CGPA count in what ? or (out of ?)',
  `is_current_qualification` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(10) UNSIGNED NOT NULL DEFAULT '50',
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
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benefits_benefit_type_id_foreign` (`benefit_type_id`);

--
-- Indexes for table `benefit_types`
--
ALTER TABLE `benefit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degrees_degree_level_id_foreign` (`degree_level_id`);

--
-- Indexes for table `degree_levels`
--
ALTER TABLE `degree_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_email_unique` (`email`),
  ADD UNIQUE KEY `employers_api_token_unique` (`api_token`),
  ADD KEY `employers_category_id_foreign` (`category_id`),
  ADD KEY `employers_country_id_foreign` (`country_id`),
  ADD KEY `employers_division_id_foreign` (`division_id`),
  ADD KEY `employers_district_id_foreign` (`district_id`),
  ADD KEY `employers_upazilla_id_foreign` (`upazilla_id`);

--
-- Indexes for table `employer_billing_addresses`
--
ALTER TABLE `employer_billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_billing_addresses_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `employer_types`
--
ALTER TABLE `employer_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_types_employer_id_foreign` (`employer_id`),
  ADD KEY `employer_types_type_id_foreign` (`type_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_slug_unique` (`slug`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_employer_id_foreign` (`employer_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_job_level_id_foreign` (`job_level_id`);

--
-- Indexes for table `job_activities`
--
ALTER TABLE `job_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_activities_job_id_foreign` (`job_id`),
  ADD KEY `job_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_benefits`
--
ALTER TABLE `job_benefits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_benefits_job_id_foreign` (`job_id`),
  ADD KEY `job_benefits_benefit_id_foreign` (`benefit_id`);

--
-- Indexes for table `job_employment_statuses`
--
ALTER TABLE `job_employment_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_employment_statuses_job_id_foreign` (`job_id`),
  ADD KEY `job_employment_statuses_job_status_id_foreign` (`job_status_id`);

--
-- Indexes for table `job_favorites`
--
ALTER TABLE `job_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_favorites_job_id_foreign` (`job_id`),
  ADD KEY `job_favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_institutions`
--
ALTER TABLE `job_institutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_institutions_job_id_foreign` (`job_id`),
  ADD KEY `job_institutions_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `job_levels`
--
ALTER TABLE `job_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_locations_job_id_foreign` (`job_id`),
  ADD KEY `job_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `job_qualifications`
--
ALTER TABLE `job_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_qualifications_degree_level_id_foreign` (`degree_level_id`),
  ADD KEY `job_qualifications_degree_id_foreign` (`degree_id`),
  ADD KEY `job_qualifications_job_id_foreign` (`job_id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_skills_job_id_foreign` (`job_id`),
  ADD KEY `job_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `job_statuses`
--
ALTER TABLE `job_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_statuses_job_id_foreign` (`job_id`),
  ADD KEY `job_statuses_status_id_foreign` (`status_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_slug_unique` (`slug`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazillas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD KEY `users_job_level_id_foreign` (`job_level_id`),
  ADD KEY `users_category_id_foreign` (`category_id`);

--
-- Indexes for table `user_awards`
--
ALTER TABLE `user_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_experiences_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_portfolios`
--
ALTER TABLE `user_portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_portfolios_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_qualifications_degree_level_id_foreign` (`degree_level_id`),
  ADD KEY `user_qualifications_degree_id_foreign` (`degree_id`),
  ADD KEY `user_qualifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `benefit_types`
--
ALTER TABLE `benefit_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degree_levels`
--
ALTER TABLE `degree_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employer_billing_addresses`
--
ALTER TABLE `employer_billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_types`
--
ALTER TABLE `employer_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_activities`
--
ALTER TABLE `job_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_benefits`
--
ALTER TABLE `job_benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `job_employment_statuses`
--
ALTER TABLE `job_employment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_favorites`
--
ALTER TABLE `job_favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_institutions`
--
ALTER TABLE `job_institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_levels`
--
ALTER TABLE `job_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_qualifications`
--
ALTER TABLE `job_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_statuses`
--
ALTER TABLE `job_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_awards`
--
ALTER TABLE `user_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_portfolios`
--
ALTER TABLE `user_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_benefit_type_id_foreign` FOREIGN KEY (`benefit_type_id`) REFERENCES `benefit_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_degree_level_id_foreign` FOREIGN KEY (`degree_level_id`) REFERENCES `degree_levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employers_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employers_upazilla_id_foreign` FOREIGN KEY (`upazilla_id`) REFERENCES `upazillas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employer_billing_addresses`
--
ALTER TABLE `employer_billing_addresses`
  ADD CONSTRAINT `employer_billing_addresses_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employer_types`
--
ALTER TABLE `employer_types`
  ADD CONSTRAINT `employer_types_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employer_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_level_id_foreign` FOREIGN KEY (`job_level_id`) REFERENCES `job_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_activities`
--
ALTER TABLE `job_activities`
  ADD CONSTRAINT `job_activities_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_benefits`
--
ALTER TABLE `job_benefits`
  ADD CONSTRAINT `job_benefits_benefit_id_foreign` FOREIGN KEY (`benefit_id`) REFERENCES `benefits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_benefits_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_employment_statuses`
--
ALTER TABLE `job_employment_statuses`
  ADD CONSTRAINT `job_employment_statuses_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_employment_statuses_job_status_id_foreign` FOREIGN KEY (`job_status_id`) REFERENCES `job_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_favorites`
--
ALTER TABLE `job_favorites`
  ADD CONSTRAINT `job_favorites_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_institutions`
--
ALTER TABLE `job_institutions`
  ADD CONSTRAINT `job_institutions_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_institutions_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD CONSTRAINT `job_locations_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_qualifications`
--
ALTER TABLE `job_qualifications`
  ADD CONSTRAINT `job_qualifications_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_qualifications_degree_level_id_foreign` FOREIGN KEY (`degree_level_id`) REFERENCES `degree_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_qualifications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD CONSTRAINT `job_skills_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_statuses`
--
ALTER TABLE `job_statuses`
  ADD CONSTRAINT `job_statuses_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_statuses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD CONSTRAINT `upazillas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_job_level_id_foreign` FOREIGN KEY (`job_level_id`) REFERENCES `job_levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_awards`
--
ALTER TABLE `user_awards`
  ADD CONSTRAINT `user_awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD CONSTRAINT `user_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_portfolios`
--
ALTER TABLE `user_portfolios`
  ADD CONSTRAINT `user_portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD CONSTRAINT `user_qualifications_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_qualifications_degree_level_id_foreign` FOREIGN KEY (`degree_level_id`) REFERENCES `degree_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
