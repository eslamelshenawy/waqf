-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 07:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waqf_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_banks`
--

CREATE TABLE `accounting_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounting_banks`
--

INSERT INTO `accounting_banks` (`id`, `account_id`, `name`, `group_id`, `created_at`, `updated_at`, `number_account`, `balance`, `is_active`) VALUES
(1, 24, 'الاهلى', 1, '2020-07-04 13:00:06', '2020-07-05 08:33:54', '023654178958787', '4800.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sorting` bigint(20) UNSIGNED DEFAULT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('رئيسى1','رئيسى2','رئيسى3','فرعى','رئيسى') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'رئيسى1',
  `debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `debitFrist` decimal(15,2) DEFAULT NULL,
  `creditFirst` decimal(15,2) DEFAULT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `typeAccountMenu` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeMenu` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `parent_id`, `sorting`, `code`, `name`, `type`, `debit`, `credit`, `debitFrist`, `creditFirst`, `balance`, `typeAccountMenu`, `typeMenu`, `group_id`, `created_at`, `updated_at`) VALUES
(17, 44, NULL, 11, 'الاصول الثابته', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:21:17', '2020-07-02 09:21:17'),
(18, 44, NULL, 12, 'الاصول المتداوله', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:23:27', '2020-07-02 09:23:27'),
(19, 18, NULL, 121, 'نقديه بالبنوك والخزينه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:28:38', '2020-08-04 17:20:41'),
(20, 19, NULL, 1211, 'النقديه بالخزينه', 'رئيسى3', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:29:47', '2020-07-02 09:29:47'),
(21, 20, NULL, 12111, 'خزينه 1', 'فرعى', '25000.00', '5000.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:33:41', '2020-08-18 17:30:06'),
(22, 20, NULL, 12112, 'خزينه 2', 'فرعى', '1000.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:34:03', '2020-08-24 21:11:21'),
(23, 20, NULL, 12113, 'خزينه شيكات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:34:21', '2020-07-02 09:34:21'),
(24, 19, NULL, 1212, 'النقديه بالبنوك', 'رئيسى3', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:37:13', '2020-07-02 09:37:13'),
(25, 24, NULL, 12121, 'بنك1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:39:10', '2020-07-02 09:39:10'),
(26, 24, NULL, 12122, 'بنك2', 'فرعى', '544545.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:39:37', '2020-08-18 18:50:49'),
(27, 17, NULL, 111, 'الأراضى', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:40:36', '2020-07-02 09:40:36'),
(28, 17, NULL, 112, 'المبانى', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:41:00', '2020-07-02 09:41:00'),
(29, 17, NULL, 113, 'الات ومعدات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:41:20', '2020-08-04 17:06:08'),
(30, 17, NULL, 114, 'الأثاث', 'فرعى', '0.00', '1000.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:43:47', '2020-08-24 21:32:16'),
(31, 44, NULL, 13, 'المدينون', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:48:42', '2020-08-02 08:04:29'),
(32, 31, NULL, 131, 'العملاء', 'فرعى', '51000.00', '25000.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 09:52:13', '2020-08-24 21:32:16'),
(33, 31, NULL, 132, 'عهد وسلف عاملين', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:21:42', '2020-07-02 10:21:42'),
(34, 33, NULL, 1321, 'عهد1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:24:42', '2020-07-02 10:24:42'),
(35, 33, NULL, 1322, 'سلفه1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:25:44', '2020-08-04 21:09:38'),
(36, 31, NULL, 133, 'تامينات لدى الغير', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:26:51', '2020-07-02 10:26:51'),
(37, 36, NULL, 1331, 'تامينات لدى 1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', '', 1, '2020-07-02 10:28:31', '2020-07-02 10:28:31'),
(38, 44, NULL, 14, 'ارصده مدينه اخرى', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', 'نوع الترحيل للقوائم', 'مدين', 1, '2020-07-02 10:29:37', '2020-07-05 14:34:14'),
(39, 38, NULL, 141, 'شيكات تحت الحصيل', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:30:51', '2020-07-02 10:30:51'),
(40, 38, NULL, 142, 'ايرادات مستحقه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:32:58', '2020-07-02 10:32:58'),
(41, 40, NULL, 1421, 'ايرادات مستحقه من 1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:34:20', '2020-07-02 10:34:20'),
(42, 38, NULL, 143, 'مصروفات مقدمه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:35:40', '2020-07-02 10:35:40'),
(43, 42, NULL, 1431, 'مصروفات مقدمه ل1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:36:38', '2020-07-02 10:36:38'),
(44, NULL, NULL, 1, 'الأصول', 'رئيسى', '0.00', '543545.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 10:42:43', '2020-08-18 18:50:49'),
(45, NULL, NULL, 2, 'الخصوم', 'رئيسى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 10:43:54', '2020-07-02 10:43:54'),
(47, 45, NULL, 21, 'حقوق الملاك', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:19:01', '2020-07-02 11:19:01'),
(48, 47, NULL, 211, 'راسمال الوقف', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:25:45', '2020-08-04 21:02:54'),
(49, 47, NULL, 212, 'احتياطيات ومخصات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', 'مدين', 'دائنه', 1, '2020-07-02 11:26:44', '2020-07-05 13:54:46'),
(50, 2, NULL, 213, 'الفائض القابل للتوزيع', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:27:57', '2020-07-02 11:27:57'),
(51, 50, NULL, 2131, 'المستفيد 1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:29:38', '2020-07-16 16:26:23'),
(52, 50, NULL, 2132, 'المستفيد 2', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:30:55', '2020-07-02 11:30:55'),
(54, 45, NULL, 22, 'الإلتزامات المتداوله', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:34:54', '2020-07-02 11:34:54'),
(55, 54, NULL, 221, 'مصروفات مستحقه', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:36:19', '2020-07-02 11:36:19'),
(56, 54, NULL, 222, 'دائنون متنوعون', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 11:39:01', '2020-07-07 13:53:49'),
(57, 45, NULL, 23, 'مجمع اهلاك الاصول الثابته', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 12:04:19', '2020-07-02 12:04:19'),
(58, 57, NULL, 231, 'مجمع المبانى', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 12:30:52', '2020-07-02 12:30:52'),
(59, 57, NULL, 232, 'مجمع الات ومعدات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 12:34:51', '2020-07-02 12:34:51'),
(61, 57, NULL, 233, 'مجمع الاجهزه', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 12:35:34', '2020-07-02 12:35:34'),
(62, 57, NULL, 234, 'مجمع الاثاث', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 12:36:00', '2020-07-02 12:36:00'),
(63, NULL, NULL, 3, 'المصروفات', 'رئيسى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:06:55', '2020-07-02 13:06:55'),
(64, 63, NULL, 31, 'مصروفات الوقف', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:07:58', '2020-07-02 13:07:58'),
(65, 64, NULL, 311, 'مصروفات الصيانه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:10:20', '2020-07-02 13:10:20'),
(66, 64, NULL, 312, 'رسوم حكوميه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:10:48', '2020-07-02 13:10:48'),
(67, 64, NULL, 321, 'مصروفات اداريه وعموميه', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:11:40', '2020-07-02 13:11:40'),
(68, 64, NULL, 322, 'مصروفات اهلاك الاصول', 'رئيسى2', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:12:39', '2020-07-02 13:12:39'),
(69, 65, NULL, 3111, 'الصيانه1', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:13:57', '2020-07-19 09:10:58'),
(70, 65, NULL, 3112, 'الصيانه2', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:14:23', '2020-07-02 13:14:23'),
(71, 65, NULL, 3121, 'رسوم .....', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:15:16', '2020-07-02 13:15:16'),
(73, 67, NULL, 3211, 'اجور ومرتبات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:16:24', '2020-08-04 21:31:54'),
(74, 67, NULL, 3212, 'ادوات مكتبيه ومطبوعات', 'فرعى', '5000.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:17:00', '2020-08-18 17:30:06'),
(75, 67, NULL, 3213, 'مصروفات اتصالات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:17:38', '2020-07-02 13:17:38'),
(76, 67, NULL, 3214, 'مصروفات انتقالات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:18:00', '2020-07-02 13:18:00'),
(77, 68, NULL, 3221, 'مصروفات اهلاك مبانى', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:18:58', '2020-07-02 13:18:58'),
(78, 68, NULL, 3222, 'مصروفات اهلاك الات ومعدات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:19:30', '2020-07-02 13:19:30'),
(79, 68, NULL, 3223, 'مصروفات اهلاك الاجهزه', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:19:58', '2020-07-02 13:19:58'),
(80, 68, NULL, 3224, 'مصروفات اهلاك الاثاث', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'مدين', 1, '2020-07-02 13:20:26', '2020-07-02 13:20:26'),
(81, NULL, NULL, 4, 'ايرادات', 'رئيسى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 13:24:25', '2020-07-02 13:24:25'),
(82, 81, NULL, 41, 'ايرادات الوقف', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 13:26:32', '2020-07-02 13:26:32'),
(83, 81, NULL, 42, 'ايرادات اخرى', 'رئيسى1', '0.00', '0.00', NULL, NULL, '0.00', '', '', 1, '2020-07-02 13:26:47', '2020-07-02 13:26:47'),
(84, 82, NULL, 411, 'ايرادات الشقق', 'فرعى', '0.00', '50000.00', NULL, NULL, '0.00', 'نوع الترحيل للقوائم', 'دائنه', 1, '2020-07-02 13:28:09', '2020-08-18 17:18:20'),
(85, 82, NULL, 412, 'ايرادات المحلات', 'فرعى', '0.00', '0.00', NULL, NULL, '0.00', '', 'دائنه', 1, '2020-07-02 13:28:24', '2020-07-02 13:28:24'),
(86, 82, NULL, 413, 'ايردات المبانى', 'فرعى', '0.00', '0.00', '0.00', '0.00', '0.00', 'دائن', 'قائمة دخل', 1, '2020-07-18 18:58:35', '2020-08-10 19:18:44'),
(87, 82, NULL, 414, 'ايرادات الاراضى', 'فرعى', '0.00', '0.00', '0.00', '0.00', '0.00', 'دائن', 'قائمة دخل', 1, '2020-07-18 18:59:33', '2020-07-18 18:59:33'),
(88, 31, NULL, 1323, 'سلف المستفيدين', 'رئيسى2', '0.00', '0.00', '0.00', '0.00', '0.00', 'نوع الترحيل للقوائم', 'الترحيل الى', 1, '2020-07-18 20:23:28', '2020-07-18 20:23:28'),
(89, 88, NULL, 13231, 'سلفة المستفيد11', 'فرعى', '0.00', '0.00', '0.00', '0.00', '0.00', 'مدين', 'ميزانيه', 1, '2020-07-18 20:24:29', '2020-08-11 00:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `email`, `password`, `is_active`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'super_admin@email.com', '$2y$10$X2oPKANTMgqZoNFUJJphQ.IjJ.3GaC2lwGuY0DTdZaOTHyvJcV2Fa', 1, NULL, NULL, NULL, '2020-08-05 18:12:26'),
(2, 'Administrator', 'admin@email.com', '$2y$10$BDsXo1iJ9gTZflrgMELllejCNshwBbG.v0RF6zhnUTevXbR7A4jUK', 1, NULL, NULL, NULL, '2020-08-19 21:39:44'),
(6, 'trtert', 'r@gmail.com', '$2y$10$6AoDgPwxPRUadGFFT3XR9e/UiMKQ8p.PZTEiXSM4t79vybqzP7CRG', 0, NULL, NULL, '2020-08-05 18:15:38', '2020-08-19 21:34:53'),
(8, 'asd', 'm.fci2014@gmail.com', '$2y$10$oB22bRoMp/oikuemyi.Xp.TOvY13Cko6dmv5/aOxGmM1t9R2eOPYS', 1, NULL, NULL, '2020-08-19 20:35:22', '2020-08-19 20:48:10'),
(9, 'يييييييييي', 'm.fci2014@xxxx.com', '$2y$10$jvu4cNdWLPoccVOz3aYw.eWSRSMl8.qW9EwgL6Ak5svMBHYQqMsy2', 1, NULL, NULL, '2020-08-20 18:21:09', '2020-08-20 18:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `advance`
--

CREATE TABLE `advance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `date_pay` date DEFAULT NULL,
  `date_done` date DEFAULT NULL,
  `reason_advance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_advance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_commit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance`
--

INSERT INTO `advance` (`id`, `beneficiary_id`, `amount`, `is_accepted`, `is_done`, `date_pay`, `date_done`, `reason_advance`, `number_advance`, `admin_commit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2000.00', 1, 1, '2020-08-11', '2020-08-19', 'سداد بعض المصروفات', '1', NULL, '2020-08-10 22:22:32', '2020-08-10 22:38:50', NULL),
(2, 6, '2000.00', 1, 1, '2020-08-31', '2020-08-31', 'i need money', '1', NULL, '2020-08-20 15:42:52', '2020-08-20 16:22:27', NULL),
(3, 6, '300.00', 2, 0, '2020-08-31', NULL, 'i need money', '2', 'isssue reijected edit', '2020-08-20 16:25:33', '2020-08-20 16:27:12', NULL),
(4, 6, '30.00', 1, 1, '2020-09-26', '2020-08-20', 'money', '3', NULL, '2020-08-20 16:27:58', '2020-08-20 16:29:27', NULL),
(5, 16, '2000.00', 1, 0, '2020-08-21', NULL, 'gdfgdfgdfgdfgdf', '1', NULL, '2020-08-20 18:14:49', '2020-08-20 18:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('person','agency') COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('pending','confirmed','suspended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_type` enum('مورد','خدمات') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'مورد',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_token` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_authenticated` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` mediumint(8) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` set('electric','plumber','carpenter','painter','paving','transfer_furniture','uploading_and_downloading','cleaning','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `unique_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `marital_status` enum('single','married','widower','divorcee') COLLATE utf8mb4_unicode_ci DEFAULT 'single'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `email`, `type`, `identity_number`, `mobile`, `avatar`, `is_active`, `status`, `user_type`, `email_verified_at`, `password`, `session_token`, `is_authenticated`, `city_id`, `address`, `services`, `service_other`, `is_available`, `is_verified`, `unique_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `marital_status`) VALUES
(1, 'Marwan0', 'angelo.jakubowski@yahoo.com', 'agency', '3424234324', '0380287037', NULL, 1, 'confirmed', 'مورد', NULL, '$2y$10$BIWa/sdz9wbmu71ZffNp/OytSGpOMzcUg4jAnOZ8DJ5I1eFSSdTN.', '5706', 1, 5, 'ALEX-EGYPT', 'electric,plumber,paving', NULL, 0, 0, '5238ca32-4341-4621-8352-ea6d85c2c256', '2020-08-25 17:59:10', NULL, '2020-08-10 18:14:21', '2020-08-25 17:59:10', 'single'),
(2, 'esalm elshenawy', 'te512@gmail.com', 'person', '4444444433', '6777755465', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$AmBg2MLVEsrvMtJCvZ4ZJOlWfVwHxC1x.1dSjiyv0.x8PObFsimny', NULL, 0, 4, 'test ets ets te ste', 'uploading_and_downloading', NULL, 0, 0, '3979c0bc-077b-4790-a46b-fae3c946fd7d', '2020-08-20 18:45:51', NULL, '2020-08-10 22:13:17', '2020-08-20 18:45:51', 'single'),
(3, 'Marwan1', 'dirk.kling@hotmail.com', 'agency', '924', '0167000531', NULL, 1, 'pending', 'مورد', NULL, '$2y$10$pL226pKt3/5HpDBTXQwU9ucS7eUdNzfGoOT5YxDlwZZ7GVOyCY1tW', NULL, 0, 5, 'ALEX-EGYPT', 'plumber', NULL, 0, 0, '162fe45d-ac55-41f0-ba62-d90a0f831a6e', NULL, NULL, '2020-08-20 00:08:32', '2020-08-25 04:24:09', 'single'),
(4, 'Marwan2', 'joellen.sawayn@hotmail.com', 'person', '5555', '0394145832', NULL, 1, 'confirmed', 'مورد', NULL, '$2y$10$6RoP793mLpZZBdI2dHwEBuZIq3vgQv3q57FuLyFMPYrVmHogEfhKi', '1501', 1, 5, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '08ecde2e-dc66-4d47-a1f8-f7697babde9c', NULL, NULL, '2020-08-20 00:10:08', '2020-08-25 04:24:16', 'single'),
(5, 'Marwan3', 'barrett.krajcik@gmail.com', 'person', '225', '0050433257', NULL, 1, 'confirmed', 'مورد', NULL, '$2y$10$xDGxsYUbc8NpWREc1fq56uJScGAjEMyCwngSGHmvIRhzRtNMd2p.u', '1588', 1, 5, 'ALEX-EGYPT', 'uploading_and_downloading', NULL, 0, 0, '24b5e07c-585f-4d6d-8a25-212c30974ffd', NULL, NULL, '2020-08-20 00:15:44', '2020-08-25 04:24:23', 'single'),
(6, 'Marwan4', 'leonia.ohara@gmail.com', 'agency', '11111', '0792137877', NULL, 1, 'pending', 'مورد', NULL, '$2y$10$XgBrJ00JfSsh5FdrnfRlLOnrg29.TIz.582i.rolpv7TUW28zQiUK', NULL, 0, 5, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '4501a261-7d1c-48f1-97f1-c19f99ca3327', NULL, NULL, '2020-08-23 15:44:46', '2020-08-25 04:24:30', 'single'),
(7, 'Mohamed Marwan edit', 'email@email.com', 'agency', '222', '0100889802', NULL, 1, 'pending', 'مورد', NULL, '$2y$10$RqtVE36YG723/6QjQ.pEduRK7radg69MDAlOk1qlMHGHNoVNL5Z8a', NULL, 0, 2, 'ALEX-EGYPT edit', 'plumber,other', NULL, 0, 0, 'd2b94342-2700-403b-8582-f4725583a24d', '2020-08-25 18:00:28', NULL, '2020-08-23 16:00:32', '2020-08-25 18:00:28', 'single'),
(8, 'Mohamed Marwan', 'elvira.satterfield@gmail.com', 'person', '11117530', '0521834061', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$AJEp2xgLpoyO2k3ovKnsZOwJdHDhsZUxxBn1ymGCZPsnQx3nofmmu', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, 'dc412479-7b0a-4641-bc64-9354d6b53d1d', '2020-08-25 18:03:50', NULL, '2020-08-23 16:34:50', '2020-08-25 18:03:50', 'single'),
(9, 'Mohamed Marwan', 'janine.berge@hotmail.com', 'agency', '11187514', '0770594102', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$tj6XjcV7i/5MgTSUfZuBmuyZ6NvK85G6Px.udkbzGn.fQpmmC/Rzq', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '5939adb9-21ae-4a5d-ba82-9031b42d4851', NULL, NULL, '2020-08-23 16:35:00', '2020-08-23 16:35:00', 'single'),
(10, 'Mohamed Marwan', 'kendrick.weissnat@hotmail.com', 'person', '11110717', '0211628748', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$nON1158IKlBd87yGYSh6O.1p6v3xK130yuE74eUH8Lppb7K3HdEKy', NULL, 0, 2, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '95730c1e-0ae4-4116-9114-c2545b168519', NULL, NULL, '2020-08-23 16:35:10', '2020-08-23 16:35:10', 'single'),
(11, 'Mohamed Marwan', 'rosalva.kirlin@hotmail.com', 'person', '11136724', '0618092845', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$WX5yfDaiDRz.lEKulItHLOdx8foT1b7qlFsSehRq2MxKCYikEyTpS', NULL, 0, 4, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '6617c0ea-b768-480c-a1c4-4ef0a87a0eaf', '2020-08-25 18:04:39', NULL, '2020-08-23 16:35:20', '2020-08-25 18:04:39', 'single'),
(12, 'Mohamed Marwan', 'grover.lockman@yahoo.com', 'agency', '11171152', '0795091181', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$GUe/Td18l2WrdO0QCfl6/eudceazwCiI3BtM4j3N13LN.BnvILC2u', NULL, 0, 5, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '37e3bee6-0761-4411-889d-40c161e6543c', '2020-08-25 18:06:23', NULL, '2020-08-23 16:35:30', '2020-08-25 18:06:23', 'single'),
(13, 'Mohamed Marwan', NULL, 'agency', '11144506', '0011781249', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$eHTuts9Hs7XDaPk5xXPUNekhhxueEK8wp9UupAmssRKMsoB1HA0KS', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '3c2090a3-fa6b-47ea-bf9a-9511c0c55e0f', '2020-08-25 18:04:45', NULL, '2020-08-23 16:35:40', '2020-08-25 18:04:45', 'single'),
(14, 'Mohamed Marwan', 'lance.lind@hotmail.com', 'agency', '11141826', '0537489335', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$jAY5qYYIawBD55gNyO014OU8WTb2RbghkoOlXjt5JM8I7mjgh72PW', NULL, 0, 5, 'ALEX-EGYPT', 'plumber', NULL, 0, 0, 'c1a800ce-c2f8-44b2-a990-d180edf43f06', '2020-08-25 18:13:05', NULL, '2020-08-23 16:35:50', '2020-08-25 18:13:05', 'single'),
(15, 'Mohamed Marwan', 'desmond.stamm@gmail.com', 'agency', '11111181', '0473672040', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$ipTeOAJbEAj8ZcmVhip3v.jI/8xYM1q8QXsIOY4O7sZvruQVYsJAO', NULL, 0, 5, 'ALEX-EGYPT', 'carpenter', NULL, 0, 0, '16ec862b-f48c-4c37-b836-7fbcfea94142', '2020-08-25 18:04:51', NULL, '2020-08-23 16:36:00', '2020-08-25 18:04:51', 'single'),
(16, 'Mohamed Marwan', 'nickolas.gaylord@yahoo.com', 'agency', '11125201', '0010636486', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$yqtBbHrESAVNWDuRonzhQ.O4q66rHzDY5M/6QT29z1/QxvFh4VH4q', NULL, 0, 5, 'ALEX-EGYPT', 'painter', NULL, 0, 0, '05025746-218e-47a3-ba27-359ebd2b35a2', '2020-08-25 18:06:29', NULL, '2020-08-23 16:36:09', '2020-08-25 18:06:29', 'single'),
(17, 'Mohamed Marwan', 'evette.quigley@gmail.com', 'agency', '11138317', '0341288459', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$Jhqnz7zue8Zid4WDarj.3.w7Pg4no4CAE927AFpbH33LtsVv3xo3m', NULL, 0, 5, 'ALEX-EGYPT', 'paving', NULL, 0, 0, '8545969e-e531-4310-ab61-a19a19f7027f', '2020-08-25 18:04:56', NULL, '2020-08-23 16:36:19', '2020-08-25 18:04:56', 'single'),
(18, 'Mohamed Marwan', 'micheal.ondricka@yahoo.com', 'agency', '11165036', '0818576045', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$EUhi208u38Ojs8fYbjXiTeN/vLiw25OPS.SA21FeaU1hHo8Cr49Nq', NULL, 0, 5, 'ALEX-EGYPT', 'transfer_furniture', NULL, 0, 0, '35e73105-5447-4bd1-aa6a-5abee58900a5', NULL, NULL, '2020-08-23 16:36:29', '2020-08-23 16:36:29', 'single'),
(19, 'Mohamed Marwan', 'lyman.thiel@hotmail.com', 'agency', '11114525', '0100254085', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$FcvTqFqvMxqQWYL.5wk1ZelnsqdLgvWOcpGSy.Xbq9CS/iVFq3VkO', NULL, 0, 5, 'ALEX-EGYPT', 'uploading_and_downloading', NULL, 0, 0, 'bafb0dbe-d375-4ecc-b59b-330deba215fd', '2020-08-25 18:06:35', NULL, '2020-08-23 16:36:41', '2020-08-25 18:06:35', 'single'),
(20, 'Mohamed Marwan', 'bernita.bins@gmail.com', 'agency', '11108873', '0670273771', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$Y1bPc9XzM42DY1Zdzlnh4eeaofPMS9WmAne9a0j5wL0n2jDYIBoR.', NULL, 0, 5, 'ALEX-EGYPT', 'cleaning', NULL, 0, 0, 'f4184c84-062d-41d8-8420-c8c8e48b0dbe', '2020-08-25 18:13:11', NULL, '2020-08-23 16:36:51', '2020-08-25 18:13:11', 'single'),
(21, 'Mohamed Marwan', 'magaret.hegmann@hotmail.com', 'agency', '11187362', '0719787773', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$YUS9mbsfk6oGc4/2S03MKenCdr9R1o.ndUuKosnnkFh320eCnPu0i', NULL, 0, 5, 'ALEX-EGYPT', 'other', 'gfg', 0, 0, 'f8368afa-fd23-4e2a-92d2-d5d6313bd483', '2020-08-25 18:06:41', NULL, '2020-08-23 16:53:34', '2020-08-25 18:06:41', 'single'),
(22, 'Mohamed Marwan', 'janean.rogahn@hotmail.com', 'person', '11113427', '0379471073', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$N.1j.lsiUQgQHMX8PhnFKef9.qirpHL4rS./3sYD8lQmTyYmmR59G', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '441045c5-2e64-476e-aee0-eb7a27618b22', '2020-08-25 18:10:03', NULL, '2020-08-23 17:01:49', '2020-08-25 18:10:03', 'single'),
(23, 'Mohamed Marwan', 'kristopher.kunze@yahoo.com', 'agency', '11153956', '0767273120', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$RMijV4R668XMEjRRKC5R5O3PBk56R97M0TPGCtqUsHKGKKdklLUQe', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '15820a39-6ab2-46a4-9cb0-8a54d8d03218', '2020-08-25 18:10:11', NULL, '2020-08-23 17:01:59', '2020-08-25 18:10:11', 'single'),
(24, 'Mohamed Marwan', 'marvin.turcotte@hotmail.com', 'person', '11140327', '0488165536', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$9oVeehzkZUjl0Zoi4SOGLOiyLrt0ekOd9jge7U66dvA/MXduJo/na', NULL, 0, 2, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '9d30b944-94fe-4c5e-a655-6f22833ff241', '2020-08-25 18:10:20', NULL, '2020-08-23 17:02:09', '2020-08-25 18:10:20', 'single'),
(25, 'Mohamed Marwan', 'lesia.gusikowski@hotmail.com', 'person', '11165101', '0028097638', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$btumDriNhVT971kBpcgGfOnOPFLejEdREdZxBz5/zlNkXag8qbFrO', NULL, 0, 4, 'ALEX-EGYPT', 'electric', NULL, 0, 0, 'db7ef740-6d0c-4fdb-8479-abd98dfe6e5c', '2020-08-25 18:10:28', NULL, '2020-08-23 17:02:18', '2020-08-25 18:10:28', 'single'),
(26, 'Mohamed Marwan', 'denisse.little@yahoo.com', 'agency', '11167420', '0046158387', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$T71vX3aoE2uYpPIpEim7/.BuxoGSwUTqUSjhtxPo2FdqWKNwwZwrq', NULL, 0, 5, 'ALEX-EGYPT', 'electric', NULL, 0, 0, 'f7cc1f75-2040-4432-a1ea-6e38abc5c6cc', '2020-08-25 18:10:37', NULL, '2020-08-23 17:02:28', '2020-08-25 18:10:37', 'single'),
(27, 'Mohamed Marwan', NULL, 'agency', '11150273', '0111416448', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$3eXkiyhKdHUYD1bQQSP2k.VBM9h1QEs4dmFL7s9LFaiaRylOiz3l.', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, '09ac1355-52a6-4132-9df5-c9d31c47550d', '2020-08-25 18:10:48', NULL, '2020-08-23 17:02:37', '2020-08-25 18:10:48', 'single'),
(28, 'Mohamed Marwan', 'jacqualine.hane@yahoo.com', 'agency', '11106674', '0853692995', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$TD.kT.udlM66RyxQZ4GNJe5pVao0sLxT.WzitV3QK79aU/0J6JQ8a', NULL, 0, 5, 'ALEX-EGYPT', 'plumber', NULL, 0, 0, '395f22e5-2df3-4d4d-8aff-efd807862f9e', '2020-08-25 18:10:57', NULL, '2020-08-23 17:02:47', '2020-08-25 18:10:57', 'single'),
(29, 'Mohamed Marwan', 'doreatha.mclaughlin@gmail.com', 'agency', '11111761', '0463205032', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$H2PI5nm.eFdxFzuVHKAP..RONy5r1IA/L8UmBJkZHCmZNRIn3gj02', NULL, 0, 5, 'ALEX-EGYPT', 'carpenter', NULL, 0, 0, '9a414d51-913c-459b-bb36-e24f84053167', '2020-08-25 18:11:15', NULL, '2020-08-23 17:02:57', '2020-08-25 18:11:15', 'single'),
(30, 'Mohamed Marwan', 'elroy.torphy@gmail.com', 'agency', '11167727', '0090278010', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$LmRXLbxnoo2rnB6Cd6FP4umeeif29XXGmrpfudkxnwBaggu9fNesS', NULL, 0, 5, 'ALEX-EGYPT', 'painter', NULL, 0, 0, '71026ebd-14d4-411b-a25f-74f6aec658b0', '2020-08-25 18:12:09', NULL, '2020-08-23 17:03:06', '2020-08-25 18:12:09', 'single'),
(31, 'Mohamed Marwan', 'doug.heidenreich@yahoo.com', 'agency', '11121361', '0825988751', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$qJtWW3cIYhgXRkfFOxnpK.B7AF.tUcB3jM.YaV0e59Hf4rU.3F8Um', NULL, 0, 5, 'ALEX-EGYPT', 'paving', NULL, 0, 0, 'b62a1655-d561-40f5-b01c-6f3b4d4c82b1', '2020-08-25 18:12:18', NULL, '2020-08-23 17:03:16', '2020-08-25 18:12:18', 'single'),
(32, 'Mohamed Marwan', 'mira.legros@gmail.com', 'agency', '11166563', '0243696466', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$ldp4DuuGVEutlnHOSPopX.NCSYtuTU86OVE/Gs6.RxYXHF1ykWiN6', NULL, 0, 5, 'ALEX-EGYPT', 'transfer_furniture', NULL, 0, 0, 'a52b3932-7913-43cc-b790-b30cb91ad842', '2020-08-25 18:13:50', NULL, '2020-08-23 17:03:26', '2020-08-25 18:13:50', 'single'),
(33, 'Mohamed Marwan', 'jasper.oconner@yahoo.com', 'agency', '11193558', '0462034314', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$FxcWO6eT2PzBAxxuY3fBGOUO76zqeWuTQ02KfpL/UnPdFd38ngNxq', NULL, 0, 5, 'ALEX-EGYPT', 'uploading_and_downloading', NULL, 0, 0, '4f309349-4eb8-499f-9e3c-61b8f0f34f44', '2020-08-25 18:13:17', NULL, '2020-08-23 17:03:37', '2020-08-25 18:13:17', 'single'),
(34, 'Mohamed Marwan', 'trevor.steuber@gmail.com', 'person', '11115780', '0753007694', NULL, 1, 'pending', 'مورد', NULL, '$2y$10$jMDTXCfFK/4HPorm2H1pzOBkkz67DDXUpd7QngmkTCsbIazn9Mzaa', NULL, 0, 5, 'ALEX-EGYPT', 'electric,other', 'gfdgdfgdfgdfgdfgdfg', 0, 0, '6d13ae8b-69b7-4f8c-a7c7-f2b28776bc56', '2020-08-25 18:13:43', NULL, '2020-08-23 17:03:47', '2020-08-25 18:13:43', 'single'),
(35, 'Mohamed Marwan', 'yasmine.bergstrom@hotmail.com', 'agency', '11182739', '0063887934', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$3xofKFR13.PTFOy3PToHNulCK0qSLsoI5b.kh3fG5z7ptbGGA2UfO', NULL, 0, 5, 'ALEX-EGYPT', 'other', 'OTher Services', 0, 0, 'e9da4f32-89a2-4671-8735-c434b4ebe98a', '2020-08-25 18:13:23', NULL, '2020-08-23 17:03:57', '2020-08-25 18:13:23', 'single'),
(36, 'agency00', 'son.spencer@yahoo.com', 'person', '11185149', '0057282889', NULL, 0, 'pending', 'مورد', NULL, '$2y$10$fMnQBP.PK9HxS8h7QhO85.RvAnjj5.9e3NFNskEaj30DE3WFAL.2i', NULL, 0, 1, 'ALEX-EGYPT', 'electric', NULL, 0, 0, 'd034975a-4386-49ee-82b8-4ed77ad5ca14', NULL, NULL, '2020-08-25 18:16:40', '2020-08-25 18:16:40', 'single'),
(37, 'agency00', 'kory.williamson@hotmail.com', 'person', '11132738', '0019218582', NULL, 1, 'pending', 'مورد', NULL, '$2y$10$MIp2wWc2xQ7.eRyPQ/JC/eoWUwZOWscUQ9Zf30YQGSoBbnFVboQTK', NULL, 0, 1, 'ALEX-EGYPT', 'electric,plumber', NULL, 0, 0, '3e888ddb-9497-4b7c-8dc2-f1bd978bb257', NULL, NULL, '2020-08-25 18:19:17', '2020-08-25 18:41:50', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `agencies_balances`
--

CREATE TABLE `agencies_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `moveId` int(11) DEFAULT NULL,
  `debit` decimal(11,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(11,2) NOT NULL DEFAULT 0.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`) VALUES
(1, 'First Bank'),
(2, 'Second Bank'),
(3, 'Third Bank'),
(4, 'Fourth Bank');

-- --------------------------------------------------------

--
-- Table structure for table `bank_balances`
--

CREATE TABLE `bank_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `debit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_balances`
--

INSERT INTO `bank_balances` (`id`, `bank_id`, `debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '200.00', '4800.00', NULL, '2020-07-04 13:00:06', '2020-07-05 08:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('pending','confirmed','suspended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_token` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_authenticated` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` mediumint(8) UNSIGNED NOT NULL,
  `birth_of_date_at` date NOT NULL,
  `release_at` date NOT NULL,
  `end_at` date NOT NULL,
  `job` enum('government_employee','private_sector_employee','businessman','free_business','retired','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` tinyint(3) UNSIGNED NOT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_iban_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` enum('single','married','widower','divorcee') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_has_kids` tinyint(1) NOT NULL,
  `unique_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_agree` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `name`, `email`, `identity_number`, `mobile`, `avatar`, `is_active`, `status`, `email_verified_at`, `password`, `session_token`, `is_authenticated`, `city_id`, `birth_of_date_at`, `release_at`, `end_at`, `job`, `job_title`, `job_title_other`, `company_name`, `bank_id`, `bank_account_number`, `bank_iban_number`, `marital_status`, `is_has_kids`, `unique_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `check_agree`) VALUES
(3, 'Marwan0', 'antwan.connelly@hotmail.com', '4234234324', '0344111438', NULL, 0, 'confirmed', NULL, '$2y$10$3MXINWN.Zzo/PteaDjj.PuhN9a2zod9ycqNaWJvEIkHVUzpufrJHW', '6029', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'other', 'Tester retired02', 'Eslam Elshenawy', 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'married', 1, '4376bba6-39b5-4b16-b891-de7622cd5197', NULL, NULL, '2020-08-10 22:08:33', '2020-08-25 19:35:11', 0),
(6, 'Marwan1', 'thu.medhurst@yahoo.com', '0100889802', '0141618327', NULL, 0, 'pending', NULL, '$2y$10$dMeK4rtuQ3ywbVaSXFn92.I0ZglpNrBhzjCfn0XRQiTdFsAVR/tc.', '1244', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester retired02', NULL, 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, 'fa5502fa-2102-41fb-9f97-3fb51459156b', NULL, NULL, '2020-08-19 21:07:45', '2020-08-25 00:43:12', 0),
(7, 'Gabriel Chan', 'kadatyma@mailinator.com', '275', '0100889801', NULL, 1, 'pending', NULL, '$2y$10$XiLzDrZnLuHAfqxKl6lSs.QWPw8.rt9kUR6pa6ZJyZbk.2DEIhN/m', NULL, 0, 3, '1999-03-25', '1993-03-15', '2020-12-13', 'government_employee', NULL, NULL, 'Beasley and Cross LLC', 1, '63', '10', 'single', 0, '4893580a-fa1b-4b5d-911d-1a8e5846c8d3', '2020-08-24 16:38:13', NULL, '2020-08-19 21:18:23', '2020-08-24 16:38:13', 0),
(8, 'Steven Maddox', 'divabizul@mailinator.com', '469', '0100889807', NULL, 0, 'pending', NULL, '$2y$10$/uNd.W9mAZt0AykUYNpecuASO7UcsKh48rI27kHC5.m6Shtx3Dg8K', NULL, 0, 3, '1996-05-14', '2012-02-04', '2023-11-02', 'government_employee', NULL, NULL, 'Sims and Dixon Traders', 1, '98', '961', 'divorcee', 1, '01ba2055-039d-4d96-acff-0511ef7921a2', '2020-08-24 15:26:39', NULL, '2020-08-19 21:21:26', '2020-08-24 15:26:39', 0),
(9, 'Felix Barber', 'reniq@mailinator.com', '3333333333', '3333333333', NULL, 1, 'confirmed', NULL, '$2y$10$5k7X9vTTi7yHSGWmTNIRa.wd9clz.TJZ4HWloNmSELhTsFnvszqKC', NULL, 0, 2, '2013-03-03', '2014-05-10', '2025-06-10', 'government_employee', NULL, NULL, 'Nunez Ryan LLC', 1, '344', '604', 'married', 1, '4a39ee94-724d-4646-b117-c164a1dfa51a', '2020-08-24 15:28:44', NULL, '2020-08-19 21:25:39', '2020-08-24 15:28:44', 0),
(10, 'Otto Donovan', 'suky@mailinator.com', '589', '5555555555', NULL, 0, 'pending', NULL, '$2y$10$my0mEFmDuTNgeyPK0ByskOsIVGMsVRTtKDZWv0lYwbdAwzyueZ/Oq', NULL, 0, 1, '1979-05-07', '1978-05-03', '2020-04-21', 'government_employee', NULL, NULL, 'Winters Logan Associates', 1, '977', '942', 'widower', 0, '3fd98bfc-2c48-4bea-8269-65eb3c01644a', '2020-08-24 15:33:12', NULL, '2020-08-19 21:28:01', '2020-08-24 15:33:12', 0),
(11, 'edit', 'mimu@mailinator.com', '7777777777', '7777777777', NULL, 1, 'suspended', NULL, '$2y$10$DK6jF9c5dPFFqjKDg1UcnOuF69iUxkSnLI2RKn11B0aZh2xyCA9LS', NULL, 0, 2, '1988-02-20', '2020-02-20', '2025-02-20', 'government_employee', NULL, NULL, 'edit', 1, 'edit bank', 'edit iban', 'single', 0, 'efb7d847-d78d-45f5-abcb-ee272961316b', '2020-08-19 21:56:45', NULL, '2020-08-19 21:33:28', '2020-08-19 21:56:45', 0),
(12, 'Gillian Patel', 'xyxefukuho@mailinator.com', '2323232323', '2323232323', NULL, 1, 'pending', NULL, '$2y$10$WZtV5oA12wEweARziaEKmuZoXy6wlhc5XVeUSiBhOHIr6E/puduqa', NULL, 0, 2, '2002-09-30', '1986-10-14', '2020-11-12', 'government_employee', NULL, NULL, 'Salazar Hester LLC', 1, '479', '882', 'married', 1, '786e6bf2-8bef-4a3d-a5a2-9da30e1b5cf7', '2020-08-24 15:33:55', NULL, '2020-08-19 21:42:22', '2020-08-24 15:33:55', 0),
(13, 'Illiana Mann', 'likozad@mailinator.com', '666666667', '666666667', NULL, 1, 'confirmed', NULL, '$2y$10$.9QztPGbRu.K2jAzP5uZ7eAJ9GJNq.yO7fou1V7zfNYhkJKLyuhhq', NULL, 0, 1, '2013-02-16', '1989-01-22', '2020-02-28', 'government_employee', NULL, NULL, 'Gill and Christian Traders', 1, '486', '510', 'married', 1, '44e3bb1a-ecc9-483c-924e-4ca781c0fbf1', '2020-08-24 15:35:02', NULL, '2020-08-19 21:44:45', '2020-08-24 15:35:02', 0),
(14, 'esalm elshenawy', 'ggtrr@gmail.com', '6666666444', '8786867777', NULL, 0, 'pending', NULL, '$2y$10$sMNOkCobP5F9CL/x3WIQSeUIyXX3lpp3koPHqhizzPo07haCM387u', NULL, 0, 1, '1983-08-12', '2014-08-19', '2024-08-25', 'government_employee', NULL, NULL, 'gdfgdfgdfgdfg', 1, '435345345345345', '32424', 'single', 0, 'ae1f1052-d471-4abc-9ad5-4c6b252ec2b0', '2020-08-24 15:36:00', NULL, '2020-08-19 22:35:53', '2020-08-24 15:36:00', 0),
(15, 'بلبلبلDiana Langley', 'neza@mailinator.com', '223', '1111111113', NULL, 1, 'pending', NULL, '$2y$10$BGRw4DQ2yPZlF3d3hk5Eveb/ykEXOLwTQrpID.DUw6QpO2ec9np/u', NULL, 0, 2, '1978-11-03', '2002-07-01', '2020-07-26', 'government_employee', NULL, NULL, 'Beach and Martinez Plc', 1, '787', '504', 'single', 0, '175f1919-8632-4437-b87b-6f616f008017', '2020-08-23 00:44:27', NULL, '2020-08-19 22:36:28', '2020-08-23 00:44:27', 0),
(16, 'Marwan2', 'elza.balistreri@hotmail.com', '7676767888', '0913445175', NULL, 1, 'pending', NULL, '$2y$10$Oq7.uTHSr4r3xc48Ay0yS.XhCC0VuYNChzOOvKTFsXbHbHIi9ILt2', '2223', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'other', 'Tester retired02', 'للل', 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, 'd89134d3-fb65-4957-9956-c9b113189eaf', NULL, NULL, '2020-08-20 18:11:23', '2020-08-24 20:36:02', 1),
(18, 'Marah Spencer', 'dokod@mailinator.com', '123', '45454545', NULL, 0, 'pending', NULL, '$2y$10$/W1r5ubve1/rP1Xy7V/x7eMooPrAGGy2R57O/QLy6sFyzUQyztz3W', NULL, 0, 3, '1989-02-25', '2009-05-06', '2012-01-06', 'government_employee', NULL, NULL, 'Nelson Owens LLC', 1, '299', '202', 'single', 0, '8dc5207b-4356-479f-b9b7-8cf1cc392580', '2020-08-23 00:44:16', NULL, '2020-08-20 18:52:52', '2020-08-23 00:44:16', 0),
(20, 'Kennan Pace', 'taneriv@mailinator.com', '439', '111122', NULL, 0, 'pending', NULL, '$2y$10$/fJyycuufE0BoLEZUZEHaO8W/87pJYZH2366aytEZKdhsfg2a78R6', NULL, 0, 3, '1975-03-23', '0001-01-01', '2020-01-01', 'government_employee', NULL, NULL, '@@@@@@', 1, '605', '@@@', 'single', 0, '6ef4eb9c-f09f-4d04-91ee-6338181b20c9', '2020-08-23 00:44:02', NULL, '2020-08-20 19:15:51', '2020-08-23 00:44:02', 0),
(21, 'Berk Dorsey', 'norareto@mailinator.com', '1', '333222', NULL, 0, 'pending', NULL, '$2y$10$bPCoo.HGI6R0VkjCv2Ooce8galvps6Tqmafemas2w.eSG2kC8ao7C', NULL, 0, 3, '1988-01-12', '1972-01-20', '2070-01-13', 'government_employee', NULL, NULL, 'Rivas Burks Plc', 1, '3', '2', 'single', 0, '98df8498-e447-43a9-ac4d-38d0ed8fa011', '2020-08-23 00:43:52', NULL, '2020-08-20 19:16:37', '2020-08-23 00:43:52', 0),
(22, 'Mohaned', 'email4@email.com', '112222111', '0508454004', NULL, 0, 'pending', NULL, '$2y$10$ykDOYAeScw4ERW5dJTWbfeq.YShNH/6dd2lC6FVcZFnt3qoP1NCYe', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '6dd4b937-d65e-4ee2-b92c-a9384d707323', '2020-08-23 00:43:43', NULL, '2020-08-21 15:31:21', '2020-08-23 00:43:43', 0),
(23, 'Mohaned', 'email5@email.com', '27572', '0508454001', NULL, 0, 'pending', NULL, '$2y$10$F.u7tpV/OWUbBNB2ll9PNeFbqh1XH1/njtUKA8Twyqo0LKG4krQK2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '4563cfea-164a-4b5e-89b7-09ecf269c5db', '2020-08-23 00:43:33', NULL, '2020-08-22 19:15:46', '2020-08-23 00:43:33', 0),
(24, 'Mohaned', 'mose.abshire@gmail.com', '02227', '0305920023', NULL, 0, 'pending', NULL, '$2y$10$Kuoy0AW.vKWlQ80ac0VkO.zVFV4uZGnBEErWx5XtlZ1gJByO9EPOO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '21592940-7e19-4fd3-9063-ff0e1cb6353d', '2020-08-23 00:43:23', NULL, '2020-08-23 00:23:41', '2020-08-23 00:43:23', 0),
(25, 'Mohaned', 'taylor.sawayn@hotmail.com', '40666', '0236301501', NULL, 0, 'pending', NULL, '$2y$10$0xyk/Ft.mm8L8TIjnAVhZ.aP4DrC/TvhQVxquB4YQoErr8Td66pm.', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'ac0f6702-5a73-47ea-a3e1-d822870cc675', '2020-08-23 00:43:13', NULL, '2020-08-23 00:23:53', '2020-08-23 00:43:13', 0),
(26, 'Mohaned', 'earle.wisoky@gmail.com', '83171', '0751204615', NULL, 0, 'pending', NULL, '$2y$10$0QWvV6bu8.Hm6UeGRNsuhe0qOAwKRZWsmb7jniGlJdoavs6gkgTKa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, 'e79f9fd1-a53a-4a0f-96f5-5799b172c707', '2020-08-23 00:43:04', NULL, '2020-08-23 00:24:05', '2020-08-23 00:43:04', 0),
(27, 'Mohaned', 'irene.auer@yahoo.com', '46603', '0857184818', NULL, 0, 'pending', NULL, '$2y$10$WI8ZWjuah4N5TgqR0EdOXuW2fB0kKzYhBaqEVj47RuNWVr7StPvWq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '0c4a9a24-e0e3-4831-880b-e362c0488fb6', '2020-08-23 00:42:53', NULL, '2020-08-23 00:24:33', '2020-08-23 00:42:53', 0),
(28, 'Mohaned', 'jenee.morissette@yahoo.com', '74676', '0028483785', NULL, 0, 'pending', NULL, '$2y$10$cVl9dbRyvOWGIO62xE2eLu/3NXC2C6G8bWf8QVXG9H93ZHbEs7VAW', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '52722179-475d-45ec-af5f-605064429ee4', '2020-08-23 00:42:28', NULL, '2020-08-23 00:24:47', '2020-08-23 00:42:28', 0),
(29, 'Mohaned', 'kennith.bauch@yahoo.com', '30785', '0775738510', NULL, 0, 'pending', NULL, '$2y$10$H8otMGS/yw4Rk5HsUR5Oru6X52CNphYTzZDqI8PtlAjJ6N7xs6BxC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '00fb06ab-8075-4ca4-ab4b-d34910c0e4cf', '2020-08-23 00:42:18', NULL, '2020-08-23 00:24:58', '2020-08-23 00:42:18', 0),
(30, 'Mohaned', 'evelin.renner@hotmail.com', '56889', '0768961033', NULL, 0, 'pending', NULL, '$2y$10$WlhwzVfocrLcicnEWcChxOHux7xcjPA9W.whoAyK9lUggR5W3fx5a', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, 'ef0e8407-ce99-4e8d-961b-1911e5591938', '2020-08-23 00:42:09', NULL, '2020-08-23 00:25:08', '2020-08-23 00:42:09', 0),
(31, 'Mohaned', 'keisha.turner@gmail.com', '46340', '0552496443', NULL, 1, 'pending', NULL, '$2y$10$gSn2atcHYaYPaQGidl5Oye2hmWaV/Dz8CqCDP1PLl20a6zwM15JK2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'businessman', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, 'db6d387c-7141-429d-aa45-db2de507d543', '2020-08-23 00:41:58', NULL, '2020-08-23 00:25:23', '2020-08-23 00:41:58', 0),
(32, 'Marwan', 'as@email.com', '63126', '0760485210', NULL, 0, 'pending', NULL, '$2y$10$yjW5F.qtNZGh9/ZcRheI.upuERO8LOCAeNQXRTwJ4RT7/hl1z/Twq', NULL, 0, 5, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'single', 0, 'cdd368ef-ce8d-44e7-b09f-fe49f5bdf84e', '2020-08-23 00:36:49', NULL, '2020-08-23 00:33:53', '2020-08-23 00:36:49', 0),
(33, 'Mohaned', 'joaquin.koepp@gmail.com', '30694', '0202499227', NULL, 0, 'pending', NULL, '$2y$10$fpMHBjRcXfCrEGjfEmfAouRIFaw6s/HSt8mo/DPeI3QX1nqU9.Xe6', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '40475ec5-8b58-456c-83be-20d2ad25d4fa', '2020-08-24 15:39:15', NULL, '2020-08-23 00:45:19', '2020-08-24 15:39:15', 0),
(34, 'Mohaned', 'ronald.dickens@gmail.com', '03334', '0440820380', NULL, 0, 'pending', NULL, '$2y$10$XM8U3ghgsvkrsapPTfPgR.qgXEfl0.KnB7mtIc3Bte.tpZOMBP4.e', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '5ce4efc0-fa0a-4776-8f0d-2d0d625d33eb', '2020-08-24 16:38:19', NULL, '2020-08-23 00:45:30', '2020-08-24 16:38:19', 0),
(35, 'Mohaned', 'stacey.braun@gmail.com', '16854', '0781320268', NULL, 0, 'pending', NULL, '$2y$10$VjTQqvS6b4hTlo2Uur/7ReUgUSubeit0DOFzTiNB.s4B3ykq/kgme', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '0a60641f-48d7-4308-9225-be6303a025e4', '2020-08-24 15:39:21', NULL, '2020-08-23 00:45:41', '2020-08-24 15:39:21', 0),
(36, 'Mohaned', 'daren.abbott@hotmail.com', '18195', '0363248810', NULL, 0, 'pending', NULL, '$2y$10$SteOdDiLIS1m30SbvOw5BOIhcDVK1dmRWMyCp9UiKLbMLiN5zWYtC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '661b85c1-ad5d-431c-a399-f08137ebd281', '2020-08-24 15:34:10', NULL, '2020-08-23 00:46:08', '2020-08-24 15:34:10', 0),
(37, 'Mohaned', 'cary.hamill@hotmail.com', '04723', '0201282127', NULL, 0, 'pending', NULL, '$2y$10$yVycsEXaDwPeWsDwPau19erKHJrfgF8OzHNfEUp2bEKRCW9UaGIl2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, 'c5331f2c-0dc5-4b62-b1ad-d4799073517f', '2020-08-24 15:41:48', NULL, '2020-08-23 00:46:19', '2020-08-24 15:41:48', 0),
(38, 'Mohaned', 'kiara.ernser@gmail.com', '10835', '0573300063', NULL, 0, 'pending', NULL, '$2y$10$rZhkZ.Ud/awkH42VzeDGLO2Zmi1vQ5c8MQ4RYgLLNnKSLq4HVYOBe', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'f27e6c8d-c8c0-49ed-86e0-1a0997e70e69', '2020-08-24 15:39:26', NULL, '2020-08-23 00:46:30', '2020-08-24 15:39:26', 0),
(39, 'Mohaned', 'fran.goldner@yahoo.com', '47339', '0658370362', NULL, 0, 'pending', NULL, '$2y$10$P6TAV6gkZstqsQ65N/95Ye7pTioHbZIGzX9bDmlo/YaPqXQAYsyva', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '4b8ac86b-9074-4d17-889c-a1f0cc1c50fb', '2020-08-24 15:43:30', NULL, '2020-08-23 00:46:41', '2020-08-24 15:43:30', 0),
(40, 'Mohaned', 'loren.satterfield@hotmail.com', '84341', '0120865274', NULL, 0, 'pending', NULL, '$2y$10$oct1STOtOIEESg33MUYRqedLZ27XVcMuYqVc9VKKG7vSgf2V5juRC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '399e17d7-997c-41b2-8477-338d2e8705c9', '2020-08-24 15:54:01', NULL, '2020-08-23 00:46:52', '2020-08-24 15:54:01', 0),
(41, 'Mohaned', 'walter.smith@gmail.com', '86351', '0022022857', NULL, 0, 'pending', NULL, '$2y$10$xRPxevTzIXcKx6kBhaLbzecuGPSysq/0abruzKEsgHwDCbj7Fc2Wa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, 'e585c170-cf14-4c77-bd94-6386dd2fa8b5', '2020-08-24 15:43:36', NULL, '2020-08-23 14:42:09', '2020-08-24 15:43:36', 0),
(42, 'Mohaned', 'rochelle.schneider@yahoo.com', '51885', '0500714960', NULL, 0, 'pending', NULL, '$2y$10$zc1dj2lY1Y3yIfvEXHgG7eKJeGnKv9WuDHAHSuqDFLIHhwDvKAYKK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '299278d6-8136-4013-8d91-846ce2b1e882', '2020-08-24 15:59:18', NULL, '2020-08-23 14:42:20', '2020-08-24 15:59:18', 0),
(43, 'Mohaned', 'halley.gusikowski@gmail.com', '91517', '0538907851', NULL, 0, 'pending', NULL, '$2y$10$L7roGRdCE83j0fd4ZHjhTeyFycDbmYZ78yrVsN4Zv1lmllvUvWZfK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, 'd034589d-2d54-42af-8193-3b6d8c032a1d', '2020-08-24 15:43:41', NULL, '2020-08-23 14:42:31', '2020-08-24 15:43:41', 0),
(44, 'Mohaned', 'deedee.feest@gmail.com', '25581', '0741408184', NULL, 0, 'pending', NULL, '$2y$10$1nrQ41PfLi7QqXLTP9AlMewe1G7Zz1XKU/J9Q7ELnK2NBWJimu1.a', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '42c15880-fde3-40f1-aa11-c213eb72b3ab', '2020-08-24 15:57:26', NULL, '2020-08-23 14:43:00', '2020-08-24 15:57:26', 0),
(45, 'Mohaned', 'julia.mueller@hotmail.com', '55361', '0887030563', NULL, 0, 'pending', NULL, '$2y$10$peVMULwgMar1xIKE.9OlDOgteqvIfeNu/8mTwiA1.OYfrlGxj7Soa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '97ec4a59-2e2e-411c-9c11-65c05ee6f239', '2020-08-24 15:56:38', NULL, '2020-08-23 14:43:11', '2020-08-24 15:56:38', 0),
(46, 'Mohaned', 'junior.swaniawski@hotmail.com', '75520', '0950453072', NULL, 0, 'pending', NULL, '$2y$10$ypGAVLmPenCBgoNSs2bTouwfzws0L0wqM45bmQCfQ80ypMTihUbwe', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '27dbbf6e-4d4e-42de-8fc7-af24ee91e180', '2020-08-24 15:52:26', NULL, '2020-08-23 14:43:22', '2020-08-24 15:52:26', 0),
(47, 'Mohaned', 'yon.lang@gmail.com', '28075', '0531086746', NULL, 0, 'pending', NULL, '$2y$10$OBZJlejGKLyzFPAHacGJMOf0C5sjqZnf388p8pDJsWkvzhDQssEJq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '8abd235b-a912-4630-a03e-663396cf067b', '2020-08-24 16:03:50', NULL, '2020-08-23 14:43:33', '2020-08-24 16:03:50', 0),
(48, 'Mohaned', 'sharyl.kulas@yahoo.com', '73311', '0061482164', NULL, 0, 'pending', NULL, '$2y$10$dhZjdCoogf4zLCLF1QAsHu1.ZQ3RNSmaEcVTIL428yD.Judjn2LwK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '91a5e7fe-66f3-4731-83ff-0251d2ee517f', '2020-08-24 16:07:48', NULL, '2020-08-23 14:43:44', '2020-08-24 16:07:48', 0),
(49, 'Mohaned', 'mckinley.oconner@gmail.com', '22643', '0759712170', NULL, 0, 'pending', NULL, '$2y$10$IWXTK6s0nPoe2OHv1p5PNuEqVQWJXN5APDmJv0OzX3ANuT8m9a5J.', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '44d4b065-c55c-473d-9e56-971866c7dd93', '2020-08-24 15:56:48', NULL, '2020-08-23 14:53:07', '2020-08-24 15:56:48', 0),
(50, 'Mohaned', 'dominick.nitzsche@gmail.com', '30037', '0885318448', NULL, 0, 'pending', NULL, '$2y$10$a9y5XbhqVEz/stwZ9chOAuDk2G5FjNkhT0xsCXK4fJWGFCr9bMsPW', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '93b3ff2e-4537-47fa-96d3-e9c7277027dc', '2020-08-24 16:03:55', NULL, '2020-08-23 14:53:19', '2020-08-24 16:03:55', 0),
(51, 'Mohaned', 'myrtice.bogisich@hotmail.com', '65550', '0840267471', NULL, 0, 'pending', NULL, '$2y$10$otsoOUbMTSBAfDQTeFVL.uLy1bV0nuCwTFFPThXkzMx4LoBnQdiUS', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '6a1e0b6a-93c3-4235-9c6b-bd4711fccfe2', '2020-08-24 16:09:42', NULL, '2020-08-23 14:53:29', '2020-08-24 16:09:42', 0),
(52, 'Mohaned', 'brunilda.altenwerth@yahoo.com', '98742', '0225054587', NULL, 0, 'pending', NULL, '$2y$10$j9kx/xua5hYy.GVYt7BnFu7T3rs/zmacHi8e.FhL8vFmMhTToJc4m', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '7ddfa3a8-d1ea-4c67-bb88-ab16ac2f7db7', '2020-08-24 16:04:01', NULL, '2020-08-23 14:53:57', '2020-08-24 16:04:01', 0),
(53, 'Mohaned', 'paul.wyman@yahoo.com', '29262', '0072352422', NULL, 0, 'pending', NULL, '$2y$10$cBaYmyIo.YxLXtfDbvqAfOb6WRm6qHMHYaM4M/0SD2I.8jHHLSjBG', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '4fd20db9-2169-4fd0-b2a7-2f2f38c7a741', '2020-08-24 16:07:54', NULL, '2020-08-23 14:54:08', '2020-08-24 16:07:54', 0),
(54, 'Mohaned', 'gilbert.stoltenberg@yahoo.com', '35868', '0846743572', NULL, 0, 'pending', NULL, '$2y$10$q9iOELpDTE9beaja1GEW8Orubgh5i//R8wLTftakE.V.nCulydMei', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'b216d367-c232-4b14-b095-4218bcc2aadf', '2020-08-24 16:16:22', NULL, '2020-08-23 14:54:18', '2020-08-24 16:16:22', 0),
(55, 'Mohaned', 'kimberely.willms@gmail.com', '52304', '0924847234', NULL, 0, 'pending', NULL, '$2y$10$t.3hFhTm0/kqXf9I.syyyO85G7m6cL0udPFRQufJgNRoYv9L4avQa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, 'a9744707-3f8e-4cbc-8f1a-c1a1838332f0', '2020-08-24 16:09:48', NULL, '2020-08-23 14:54:29', '2020-08-24 16:09:48', 0),
(56, 'Mohaned', 'tisha.ortiz@hotmail.com', '34023', '0477286342', NULL, 0, 'pending', NULL, '$2y$10$0kz4N.37lKl3ARC0u.ywYueeBCsBMn2BUWDVD/qE8NGfB8Ycv59lC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '6ac4cc49-50c0-49cb-88ea-63f03560dbae', '2020-08-24 16:25:18', NULL, '2020-08-23 14:54:40', '2020-08-24 16:25:18', 0),
(57, 'esalm elshenawy', NULL, '08867098', '6576589089', NULL, 0, 'pending', NULL, '$2y$10$/e.wPlfTbgWa5rgSW/Iay.umezyMhk0yLuzkJbCESFcG028jQH9Au', NULL, 0, 1, '1952-08-10', '2016-08-12', '2027-08-26', 'government_employee', NULL, NULL, 'elshenawy', 1, '98708909089089', '0879079808078987008888888', 'single', 0, '2becdfd4-f4ba-4447-9073-15bc7064f86b', '2020-08-24 16:16:27', NULL, '2020-08-23 16:26:55', '2020-08-24 16:16:27', 0),
(58, 'Marwan3', 'andres.carroll@gmail.com', '3210456464', '0545652355', NULL, 1, 'pending', NULL, '$2y$10$.odSwsSQhHNCNQSNQYgO2.fFZdxTN4suz8vzbq6KORL5.B.Si8JkC', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester retired02', NULL, 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, '33bf8c09-a248-417f-ac6c-d53c7943eb67', '2020-08-25 14:21:22', NULL, '2020-08-23 16:43:59', '2020-08-25 14:21:22', 0),
(59, 'Marwan', 'wesley.buckridge@yahoo.com', '17883', '0741247357', NULL, 0, 'pending', NULL, '$2y$10$QtjWlGoNxIJvahEOyMKgSehTI.E5GW1pcsImL2.6TgCCDH8JNhux.', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, 'af751e58-1eae-4023-b40b-a42e5258cf2d', '2020-08-24 16:16:33', NULL, '2020-08-24 14:06:43', '2020-08-24 16:16:33', 0),
(60, 'Marwan', 'kris.waelchi@yahoo.com', '13282', '0760934462', NULL, 0, 'pending', NULL, '$2y$10$0XFm4VCeiZtgKD.W8p.2mOOHW9cSm6hzkf5SGQGa/3LBYqkQBGAhK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'c4da984b-3343-4728-9739-0bc8e5b1b2a8', '2020-08-24 16:25:23', NULL, '2020-08-24 14:08:05', '2020-08-24 16:25:23', 0),
(61, 'Marwan', 'gaston.grant@yahoo.com', '80345', '0361499956', NULL, 0, 'pending', NULL, '$2y$10$ZIHT0WU2YPxq2mSrhkSq7uRhhCcJkULUuEy/ICPKI0GT54WhJ91HK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '93ed320c-402b-4881-aabe-2198edea632e', '2020-08-24 16:16:39', NULL, '2020-08-24 14:08:17', '2020-08-24 16:16:39', 0),
(62, 'Marwan', 'odell.hartmann@yahoo.com', '68442', '0666944876', NULL, 0, 'pending', NULL, '$2y$10$4ytip9MYdSgFziALmx4GR.geqXdWtwRXG0a91Y2JKnQXlJoH27PVO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '52b68ffd-e6b2-42fc-b539-ac7ed10cab79', '2020-08-24 16:38:25', NULL, '2020-08-24 14:08:49', '2020-08-24 16:38:25', 0),
(63, 'Marwan', 'granville.fritsch@hotmail.com', '15154', '0510575583', NULL, 0, 'pending', NULL, '$2y$10$KF//MhawV.IZJ1LI6xFVZ.qJxoFMMcE0zy4ga2962WYs7CfiyysBS', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '74e1ab42-c559-4051-9eef-a518fd2e79d4', '2020-08-24 16:16:54', NULL, '2020-08-24 14:09:00', '2020-08-24 16:16:54', 0),
(64, 'Marwan', 'gary.leuschke@gmail.com', '04170', '0229517944', NULL, 0, 'pending', NULL, '$2y$10$so2IAQVgINNJonYeopAUwuZvbJ/MTFkjXnbZu9pWSxrsTSNUs0RLO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'c888e6f7-cca5-4022-97c9-6254a4ccc1d5', '2020-08-24 16:18:18', NULL, '2020-08-24 14:09:11', '2020-08-24 16:18:18', 0),
(65, 'Marwan', 'jame.kling@yahoo.com', '24442', '0592801316', NULL, 0, 'pending', NULL, '$2y$10$/ovTB6gbjmHaLd3uEYbtg.XSrZ5ejSIIT1s1KUniSI9cGU/VSOxV2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '0b763a88-380b-43a3-b70b-eea4c3476600', '2020-08-24 16:25:29', NULL, '2020-08-24 14:09:22', '2020-08-24 16:25:29', 0),
(66, 'Marwan', 'christiane.howe@gmail.com', '46486', '0840048363', NULL, 0, 'pending', NULL, '$2y$10$gIv6EgM1zuTZG48wu0373.Yxa6Ba4aDtxagASVaoPjbIeJz90KLN2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '4cef031d-f3ef-48d7-b245-62bbb42a013a', '2020-08-24 16:42:46', NULL, '2020-08-24 14:09:33', '2020-08-24 16:42:46', 0),
(67, '0Marwan', NULL, '14067', '0220484246', NULL, 1, 'pending', NULL, '$2y$10$yrvar/h63lxwlgmc8mRbAe0m2PbtRRd/ubsMD6Z/FANBXI.kw8ZtG', NULL, 0, 5, '1988-01-17', '2020-01-17', '2030-01-17', 'businessman', NULL, NULL, 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'single', 0, '8396a10f-80a7-4316-9b2c-48dea5bfd68e', '2020-08-24 16:25:35', NULL, '2020-08-24 14:19:50', '2020-08-24 16:25:35', 0),
(68, 'Marwan', 'herman.strosin@yahoo.com', '64061', '0482286210', NULL, 0, 'pending', NULL, '$2y$10$Wn7viHroH.OzdyljojpWCeBvxSfbAqSZbInL4jBf8cQC.sOhl7oLO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '1e184aa4-190a-4eb0-8149-dbb2cf0148f0', '2020-08-24 16:53:12', NULL, '2020-08-24 16:47:55', '2020-08-24 16:53:12', 0),
(69, 'Marwan', 'juana.hermann@gmail.com', '51358', '0017241629', NULL, 0, 'pending', NULL, '$2y$10$mAE6Pk.SjoVdr1RC42tEcOZfzvrjpHNUmMjvvRiI/jEC1SEVCJOMi', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'b30fdbeb-0d7d-4f1d-bfba-8bc916919cf8', '2020-08-24 17:01:10', NULL, '2020-08-24 16:48:11', '2020-08-24 17:01:10', 0),
(70, 'Marwan', 'tamala.tremblay@hotmail.com', '31421', '0470232255', NULL, 0, 'pending', NULL, '$2y$10$hk1EJZQmomEJ1Qj.E71a6ujrxE7YJoi3Svn04rtt1YiqSuKLb7/QK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '68d5b6e3-8526-4cb1-96ce-efa637cf1706', '2020-08-24 16:53:18', NULL, '2020-08-24 16:48:24', '2020-08-24 16:53:18', 0),
(71, 'Marwan', 'margarito.prohaska@yahoo.com', '34333', '0353123028', NULL, 0, 'pending', NULL, '$2y$10$w84ZVzBe6/r2Pl2yCxXRWeb/2hgEKNeeVTh2x8USuNONJHSnhwt/y', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, 'd70750d7-73d6-469b-9c24-b8fc24d09992', '2020-08-24 17:01:01', NULL, '2020-08-24 16:48:54', '2020-08-24 17:01:01', 0),
(72, 'Marwan', 'geraldine.douglas@yahoo.com', '15593', '0410864525', NULL, 0, 'pending', NULL, '$2y$10$CIHUmO.bsi9dTTtda3hune6TVr627oet5/R.ydQJj11b9Z8/GmVbu', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '717b7dd6-895c-42ab-85da-15b967763771', '2020-08-24 16:53:24', NULL, '2020-08-24 16:49:06', '2020-08-24 16:53:24', 0),
(73, 'Marwan', 'coralie.goodwin@gmail.com', '22878', '0727424000', NULL, 0, 'pending', NULL, '$2y$10$YZDxti0ZIjEIqJ7foLf4SuiQUAG2Oof81QWrbAVwLtlE3eR2ayU/2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '5ed87699-f5d4-4686-be03-26bf53d1957c', '2020-08-24 17:01:40', NULL, '2020-08-24 16:49:18', '2020-08-24 17:01:40', 0),
(74, 'Marwan', 'tamie.langosh@gmail.com', '87334', '0485921824', NULL, 0, 'pending', NULL, '$2y$10$ePR0.VzlPVVhkMzDt7Ps0.mFGAJFHbbXzktkvlRhVvGyEXPMpyMM6', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '52c8a685-3975-40d4-a709-e1d9ddc69098', '2020-08-24 16:53:30', NULL, '2020-08-24 16:49:29', '2020-08-24 16:53:30', 0),
(75, 'Marwan', 'deann.runte@yahoo.com', '85280', '0069182303', NULL, 0, 'pending', NULL, '$2y$10$sXwYKTA.vDZKVdUdwh0/Z.e9z3HvDygMDcBJffrPUJa/JLEBD.GGy', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, 'b4ef5d0d-f7b8-4aa7-9c2c-e9fc72719e43', '2020-08-24 17:01:19', NULL, '2020-08-24 16:49:42', '2020-08-24 17:01:19', 0),
(76, 'Marwan', 'bernardina.herzog@hotmail.com', '26310', '0541534171', NULL, 0, 'pending', NULL, '$2y$10$rwp.vn6/SxTS7RpezXN88esLAUpZCFY/HJaaQOb9V6nfYYKG4EVhW', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '1a95087f-16c3-4265-ab66-355918acbc1a', '2020-08-24 17:08:02', NULL, '2020-08-24 17:02:31', '2020-08-24 17:08:02', 0),
(77, 'Marwan', 'irene.walsh@gmail.com', '21224', '0181127111', NULL, 0, 'pending', NULL, '$2y$10$p609B41hn49Csup852BRIO.wBVUhEg5vqXNnZ0YQYYLrDXIKhr7eO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, 'ac8e0de2-ef06-4f75-8b6a-3914bc1d6724', '2020-08-24 17:12:11', NULL, '2020-08-24 17:02:44', '2020-08-24 17:12:11', 0),
(78, 'Marwan', 'clifford.spencer@hotmail.com', '53491', '0735132315', NULL, 0, 'pending', NULL, '$2y$10$KrkIq5PUkBSG3MBScC9mYeYpHXJEy5AcACPclQTz20jXCxmwpiSQa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '86f911d1-6a38-43ac-ba50-86a0183d96a3', '2020-08-24 17:08:08', NULL, '2020-08-24 17:02:56', '2020-08-24 17:08:08', 0),
(79, 'Marwan', 'harry.lehner@yahoo.com', '73184', '0255560149', NULL, 0, 'pending', NULL, '$2y$10$nOfKq0RQ1bHryC3UgRBy/.JZRT6YDC.wb0w2v4Od0riaEP.8QedVK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, 'f7c7cd73-b57f-4b08-910f-da2c4c7a25bb', '2020-08-24 17:12:31', NULL, '2020-08-24 17:03:25', '2020-08-24 17:12:31', 0),
(80, 'Marwan', 'shonna.blanda@gmail.com', '94416', '0380681728', NULL, 0, 'pending', NULL, '$2y$10$qT8H95aAlADWG9NlPCY9GuOMIFF0dOHkNH9S.ENyVWM89OYkLEryu', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '51c58157-3f1b-4a7d-9359-c5b37abefd15', '2020-08-24 17:08:13', NULL, '2020-08-24 17:03:37', '2020-08-24 17:08:13', 0),
(81, 'Marwan', 'caleb.daniel@yahoo.com', '18816', '0756850598', NULL, 0, 'pending', NULL, '$2y$10$cXUlySxPmPoCl2JsYa/OrOTqww6WuUaOgYDFvcDhr8Zfqh62KbPZK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '8b0835fc-b4c5-436a-8b2a-6ed919f5a499', '2020-08-24 17:12:22', NULL, '2020-08-24 17:03:49', '2020-08-24 17:12:22', 0),
(82, 'Marwan', 'chadwick.leannon@hotmail.com', '76474', '0202043449', NULL, 0, 'pending', NULL, '$2y$10$2MfJlgnVBAPMw.3hhMMCWeIKRiSckC.60U1z7ekZAVCmkjvn9YF5O', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, 'bc482855-5962-41ab-96cb-6a1592795e07', '2020-08-24 17:08:19', NULL, '2020-08-24 17:04:00', '2020-08-24 17:08:19', 0),
(83, 'Marwan', 'ana.hilll@hotmail.com', '61257', '0006260044', NULL, 0, 'pending', NULL, '$2y$10$B4b9lLdmTtvmDsqCHTZQi.DpqW7nNY0mRzaBeaEshtm.grWh0i3BS', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '14df0bdd-b22c-476c-88f0-40c344d369be', '2020-08-24 17:11:57', NULL, '2020-08-24 17:04:14', '2020-08-24 17:11:57', 0),
(84, 'esalm elshenawy', 'g2g@gmail.com', '9022152522', '5521412554', NULL, 0, 'pending', NULL, '$2y$10$lMMy34ncfb4pPLTbL3/32.LtTqAIOJoSM4LyOYnG/bYrw//jZYIV.', NULL, 0, 1, '1975-09-29', '2011-08-07', '2042-08-26', 'government_employee', NULL, NULL, 'gdfgdfgdfgdfg', 1, '33322525555566', '9999999992222541111', 'single', 0, '9a095bce-6c8d-4934-9b6c-efd29eb17a65', '2020-08-24 17:08:25', NULL, '2020-08-24 17:05:41', '2020-08-24 17:08:25', 0),
(85, 'Marwan0', 'susanna.schuster@gmail.com', '52522', '0642471008', NULL, 0, 'pending', NULL, '$2y$10$8DULqcUqD.t3J6PUQtEHMuePVAxXhSmTXTYoYzuNI1Mg8JXJ1mASq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '38961b05-413b-444a-95cd-c49201cdabe6', '2020-08-24 17:17:03', NULL, '2020-08-24 17:13:31', '2020-08-24 17:17:03', 0),
(86, 'Marwan1', 'makeda.abshire@yahoo.com', '26237', '0631448524', NULL, 0, 'pending', NULL, '$2y$10$GPThj8MTbj8EFmcQ6/YV9edjaOm./Bj1d3D/ps8qoJDNtMUj4aZ1m', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '9f5c8a10-a6ff-4e95-9a34-d8ee84e08447', '2020-08-24 17:26:33', NULL, '2020-08-24 17:13:43', '2020-08-24 17:26:33', 0),
(87, 'Marwan2', 'gail.langosh@gmail.com', '40745', '0105752940', NULL, 0, 'pending', NULL, '$2y$10$NkyYuvnz6cadbsvjpZ9xPut.9i5HHVC5h3lPLpGhfl.kzEpuqaotq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '3b1e94ac-de0a-436b-94e1-e13cad64af7d', '2020-08-24 17:17:09', NULL, '2020-08-24 17:13:55', '2020-08-24 17:17:09', 0),
(88, 'Marwan3', 'sandra.mohr@yahoo.com', '17108', '0215811186', NULL, 0, 'pending', NULL, '$2y$10$XGbFCWRAl3RruCMO6qiz5eooHLStcjSKLJhyhE17BmQZWnjTuYBBG', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 1, '8df5c7dd-529b-44e3-aa14-5bcc9c37acbd', '2020-08-24 17:25:44', NULL, '2020-08-24 17:14:23', '2020-08-24 17:25:44', 0),
(89, 'Marwan4', 'stuart.halvorson@gmail.com', '63030', '0037198905', NULL, 0, 'pending', NULL, '$2y$10$.AQJ7KFsBr2wgj4ncLck3ORAZaQlVDWufMkMoY0U.lqRJo3NtvhVy', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, 'a8f04397-94cd-4974-90c9-6386bcf0f0a3', '2020-08-24 17:17:14', NULL, '2020-08-24 17:14:35', '2020-08-24 17:17:14', 0),
(90, 'Marwan5', 'carolyne.hand@gmail.com', '43831', '0692527317', NULL, 0, 'pending', NULL, '$2y$10$jdOL.r7WQOVdKvItgp9pUOXVw6E6b2FjiNfLaaYynnoMAS2W15TDi', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'married', 0, '02632c67-92f9-4432-9989-505b98779728', '2020-08-24 17:25:24', NULL, '2020-08-24 17:14:46', '2020-08-24 17:25:24', 0),
(91, 'Marwan6', 'juliana.tillman@gmail.com', '00667', '0655585278', NULL, 0, 'pending', NULL, '$2y$10$eu/OXLZF2ymtBcKpt2ttleOeSQnh3spYPJhE.x6SeXIV1zOS64yty', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '2c1d5b89-a11f-4a88-adfa-d94f5ed757f0', '2020-08-24 17:17:20', NULL, '2020-08-24 17:14:58', '2020-08-24 17:17:20', 0),
(92, 'Marwan7', 'shona.hoppe@gmail.com', '36713', '0916852805', NULL, 0, 'pending', NULL, '$2y$10$0PJMmyC8odZdRseEZOTeluDGs22SZbNnMabVCO0T4nuUxaPp/guP.', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', NULL, NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '0c72716d-e0c0-46c9-aa66-8593e05af26e', '2020-08-24 17:25:11', NULL, '2020-08-24 17:15:10', '2020-08-24 17:25:11', 0),
(93, 'Marwan4', 'daisey.keebler@yahoo.com', '2566500002', '0446418335', NULL, 1, 'pending', NULL, '$2y$10$MCJQrxjkmccZCwTwxaHBzujBFTigWr/YZ/Y9/cjNXfFuA9O.eQ7lW', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester retired02', NULL, 'Icons Digital', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, '5b09f9a9-8d52-48b7-86a5-479b00b19668', '2020-08-25 14:21:13', NULL, '2020-08-24 18:23:56', '2020-08-25 14:21:13', 0),
(94, 'Test', NULL, '407', '0100', NULL, 1, 'pending', NULL, '$2y$10$kF2BbE1KuBSt6DlULPxYbeB31UXExz7Z2YVTSdmx7HFoFkSV62HQ.', NULL, 0, 1, '1988-01-12', '2000-05-01', '2030-01-21', 'other', 'Tester', NULL, 'company', 1, '010008885555', 'Egypt0100088898020', 'married', 1, '7f9e57c2-b322-40c8-a235-dd1183e59463', NULL, NULL, '2020-08-25 14:46:20', '2020-08-25 16:17:59', 0),
(95, 'Marwan4', 'chance.oberbrunner@hotmail.com', '61776', '0798823207', NULL, 1, 'pending', NULL, '$2y$10$kgmWv9VITqYjG53F1484ieNo2EyMcVw5KiAzpillYlsog8X9UIlay', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 1, '1b5c297f-bee7-460c-8b00-f34d3edae833', NULL, NULL, '2020-08-25 15:30:07', '2020-08-25 17:09:46', 0),
(96, 'Marwan5', 'quinton.ankunding@hotmail.com', '75710', '0862936888', NULL, 1, 'confirmed', NULL, '$2y$10$U05nu4xviSXTm/qHHwYhnuJkdsrXfWECGzIvCy4nDoQbHFqgrohba', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, '91122433-4142-48e1-9a82-fa8593d710e5', NULL, NULL, '2020-08-25 15:30:19', '2020-08-25 17:09:53', 0),
(97, 'Marwan6', 'johnnie.gleichner@hotmail.com', '22320', '0340159755', NULL, 0, 'pending', NULL, '$2y$10$YxAAZipmuAZ4/ZnBQlL3UeNj3txeYsiimWGcFTJJX8GQ1haPJ5E9a', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, 'fe4db995-3fc9-4624-acea-d22c78ad257a', NULL, NULL, '2020-08-25 15:30:31', '2020-08-25 17:09:59', 0),
(98, 'Marwan7', 'ruthanne.ortiz@yahoo.com', '63930', '0732535082', NULL, 0, 'pending', NULL, '$2y$10$F2Lstmxv2pt/uZaYZFqWN.7SMzQDV6IWZwXBnK6P.0OBk2p9adPkW', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 1, '666cd916-c2a3-4bd0-87d1-355065ab3758', NULL, NULL, '2020-08-25 15:30:59', '2020-08-25 17:10:07', 0),
(99, 'Marwan8', 'jermaine.carroll@hotmail.com', '18746', '0116489123', NULL, 0, 'pending', NULL, '$2y$10$JyeT2Gh43lq9pbbWEQnSbOxH8epWmsgt.Ymc52iTJVyxRNdHzaMVy', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, 'abc3e56d-94df-4058-96bc-856722d0789f', NULL, NULL, '2020-08-25 15:31:09', '2020-08-25 17:10:15', 0),
(100, 'Marwan9', 'janise.greenfelder@gmail.com', '06847', '0401777321', NULL, 0, 'pending', NULL, '$2y$10$9gMSCLONx775m/ioDBJD3OKx78..shcecksD0U7a9KpO3JBNYAW2G', NULL, 0, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', 'Tester Updated', NULL, 'Icons Digital Updated', 1, '01000555333020', 'EGYPT0100005555200', 'married', 0, '68067221-80dd-491a-b626-6464b7ea2799', NULL, NULL, '2020-08-25 15:31:21', '2020-08-25 17:10:22', 0),
(101, 'beneficial6', 'shea.kutch@gmail.com', '48149', '0545626642', NULL, 0, 'pending', NULL, '$2y$10$tByp2LJWRf21Eiw.uyY6XeFw359O9nH0mEtZw/EX/biu.DY3zJCfa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'free_business', 'Tester free_business', NULL, 'Icon', 1, '232323232323', '232323232323', 'widower', 0, '2f67e5d3-ddbc-4d80-a9f0-289d884e291c', NULL, NULL, '2020-08-25 15:31:33', '2020-08-25 15:31:33', 0),
(102, 'beneficial7', 'theodore.leuschke@hotmail.com', '43754', '0037838516', NULL, 0, 'pending', NULL, '$2y$10$/OgFSecNDe4G49/YYAVZjeg.H3JWvUUziu/XVfxtoEFij7UVvCItS', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'retired', 'Tester retired', NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, '95d3e163-eb64-4f81-84b8-cadf443b20c6', NULL, NULL, '2020-08-25 15:31:45', '2020-08-25 15:31:45', 0),
(103, 'beneficial8', 'garrett.ryan@gmail.com', '72378', '0838107610', NULL, 0, 'pending', NULL, '$2y$10$5g2gunsWi7i8yGStSN9wBeLKrgcTvHVjz9otvKStO6HlX.VyhTCpK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'other', 'other_job', NULL, 'Icon', 1, '232323232323', '232323232323', 'divorcee', 0, 'b2cdde5a-159d-462c-96aa-2c52535e6fef', NULL, NULL, '2020-08-25 15:31:56', '2020-08-25 15:31:56', 0),
(104, 'beneficial9', 'georgina.ferry@gmail.com', '39772', '0190244763', NULL, 0, 'pending', NULL, '$2y$10$WzN4Y6pf8NUhzyTvX9flKubwJPowPYgrMV7xlpLqsLiU5QD6XiPfi', NULL, 0, 1, '1988-01-17', '2020-01-17', '2030-01-17', 'other', 'other_job', NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '4f602c68-ba6c-4094-be40-4c9b56c23aae', NULL, NULL, '2020-08-25 15:32:07', '2020-08-25 15:32:07', 0),
(105, 'beneficial10.', 'connie.ratke@yahoo.com', '98249', '0741113430', NULL, 0, 'pending', NULL, '$2y$10$9nhlbWBn5UAIWq65knM6PuHQPl9y/z1eo7GK7POgjw./fsMuFtu66', NULL, 0, 2, '1988-01-17', '2020-01-17', '2030-01-17', 'other', 'other_job', NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, 'a2fecea5-f51e-49ea-9acf-62322614dee4', NULL, NULL, '2020-08-25 15:32:20', '2020-08-25 15:32:20', 0),
(106, 'beneficial11', 'shayne.mcdermott@hotmail.com', '17863', '0077253012', NULL, 0, 'pending', NULL, '$2y$10$NVg5XurdtQiMu97upy7c4eGFtQJHnc/nUq8q3sOLRX282dBxdWWNO', NULL, 0, 4, '1988-01-17', '2020-01-17', '2030-01-17', 'other', 'other_job', NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '706d66a6-98f9-4818-8fd3-4b89e1322f60', NULL, NULL, '2020-08-25 15:32:32', '2020-08-25 15:32:32', 0),
(107, 'beneficial12', 'milton.quigley@hotmail.com', '88016', '0097790830', NULL, 0, 'pending', NULL, '$2y$10$R3rqFFhtPRhmaQpdku3zTuruKGmELBjhyYc/BgblRtqz3Dwlrv9Mi', NULL, 0, 5, '1988-01-17', '2020-01-17', '2030-01-17', 'other', 'other_job', NULL, 'Icon', 1, '232323232323', '232323232323', 'single', 0, '1ffeb7d6-805d-4013-a723-0f092ee747d0', NULL, NULL, '2020-08-25 15:32:47', '2020-08-25 15:32:47', 0),
(108, 'Josiah Kramer', NULL, '193', '1032326', NULL, 0, 'pending', NULL, '$2y$10$V9C.MGY215ZnNsw42ZmOR.Ua29BOn/A2aHf5rf2adv4V1gNJd8cZa', NULL, 0, 4, '1971-09-14', '1980-04-09', '2019-07-22', 'other', 'Autem sit accusanti', NULL, 'Mckee Garrett Plc', 1, '205', '749', 'single', 0, '4705627e-0f5c-4e4f-9fc3-a12003b4d177', NULL, NULL, '2020-08-25 15:53:37', '2020-08-25 15:58:09', 0),
(109, 'Gannon Salas', 'samahano@mailinator.com', '76', '023333', NULL, 0, 'pending', NULL, '$2y$10$gu54nD02M9LgqN8tP6QdAu3a8JLuTqK5vEv7LS.IHMbzOJk2h9Mfm', NULL, 0, 1, '2008-09-02', '1996-11-18', '2030-10-23', 'other', 'المسمى الوظيفى', NULL, 'Morrow Heath Trading', 1, '833', '809', 'single', 0, '0e51e0da-e786-4308-9a79-a810d167debc', NULL, NULL, '2020-08-25 17:13:00', '2020-08-25 17:13:00', 0),
(110, 'Ronan Dillard', 'davekuj@mailinator.com', '173', '032326', NULL, 0, 'pending', NULL, '$2y$10$kJN3TZwcR67XhH.SffkoAeSgeQKqcRYtVJqRxAddP4Z3qSGc1FsUm', NULL, 0, 3, '1988-10-09', '1978-04-26', '2030-12-02', 'other', 'المسمى الوظيفى 1111', NULL, 'Benton Mcfarland LLC', 1, '63', '104', 'single', 0, '4ec7c8e4-4467-4de7-8220-6e46d0e8ed19', NULL, NULL, '2020-08-25 17:13:47', '2020-08-25 17:14:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_balances`
--

CREATE TABLE `beneficiary_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `moveId` int(11) DEFAULT NULL,
  `debit` decimal(11,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(11,2) NOT NULL DEFAULT 0.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiary_balances`
--

INSERT INTO `beneficiary_balances` (`id`, `beneficiary_id`, `moveId`, `debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '1000.00', '0.00', NULL, '2020-08-11 00:06:38', '2020-08-11 00:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE `cheques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `attributable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`) VALUES
(1, 'jeddah', 'جدة'),
(2, 'riyadh', 'الرياض'),
(3, 'dammam', 'الدمام'),
(4, 'madina', 'المدينة'),
(5, 'makkha', 'مكة');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `title`, `email`, `message`, `created_at`, `updated_at`) VALUES
(76, 'e3landsadsadsadsa', 'about@Waqf.com', 'dasdasdasdas', '2020-08-24 13:51:32', '2020-08-24 13:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buckle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space` decimal(13,2) DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_rooms` int(10) UNSIGNED DEFAULT NULL,
  `number_of_toilets` int(10) UNSIGNED DEFAULT NULL,
  `number_of_kitchens` int(10) UNSIGNED DEFAULT NULL,
  `number_of_air_conditioner` int(10) UNSIGNED DEFAULT NULL,
  `number_of_apartments` int(10) UNSIGNED DEFAULT NULL,
  `number_of_floors` int(10) UNSIGNED DEFAULT NULL,
  `number_of_shops` int(10) UNSIGNED DEFAULT NULL,
  `is_on_street_front` tinyint(1) DEFAULT NULL,
  `is_has_decoration` tinyint(1) DEFAULT NULL,
  `is_kitchen_ready` tinyint(1) DEFAULT NULL,
  `is_has_air_conditioner` tinyint(1) DEFAULT NULL,
  `is_has_parking` tinyint(1) DEFAULT NULL,
  `is_has_warehouse` tinyint(1) DEFAULT NULL,
  `is_has_license` tinyint(1) DEFAULT NULL,
  `air_conditioner_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estate_type` enum('building','apartment','shop','land') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_type` enum('monthly','quarterly','midterm','yearly') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_type` set('residential','commercial') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_activities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrument_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrument_date_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `construction_license_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `construction_license_date_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decoration_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_space` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `unique_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `searchmab` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `parent_id`, `city_id`, `name`, `slug`, `number`, `floor_number`, `parking_number`, `price`, `status`, `space`, `district`, `street`, `number_of_rooms`, `number_of_toilets`, `number_of_kitchens`, `number_of_air_conditioner`, `number_of_apartments`, `number_of_floors`, `number_of_shops`, `is_on_street_front`, `is_has_decoration`, `is_kitchen_ready`, `is_has_air_conditioner`, `is_has_parking`, `is_has_warehouse`, `is_has_license`, `air_conditioner_brand`, `estate_type`, `rent_type`, `usage_type`, `commercial_activities`, `instrument_number`, `instrument_date_at`, `court`, `construction_license_number`, `construction_license_date_at`, `extra_details`, `license_notes`, `decoration_details`, `kitchen_details`, `warehouse_space`, `is_active`, `is_available`, `unique_id`, `deleted_at`, `created_at`, `updated_at`, `location`, `searchmab`, `lat`, `lng`) VALUES
(9, NULL, 1, 'الشناوى2000', 'estate-building-4333333333', '111', NULL, NULL, '333.00', 'pending', '22.00', '00', '22 شارع ابو بكر', NULL, NULL, NULL, NULL, 44, 55, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'quarterly', 'residential,commercial', NULL, '77', '2019-08-12', '88', '99', '2020-08-19', '100', NULL, NULL, NULL, NULL, 1, 0, '5e8a078f-106c-4dcf-8968-dddff167a5b0', NULL, '2020-08-10 18:08:48', '2020-08-26 01:33:44', NULL, NULL, NULL, NULL),
(10, 9, 3, NULL, 'estate-apartment-4555555555', '4555555555', '4555555555', NULL, '455555555.00', NULL, '4555555555.00', NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'quarterly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'يبليبليبليبليبليبليبليبليب', NULL, NULL, NULL, NULL, 1, 0, '0cd49550-5d1b-4c2a-91d6-0bbc07578e22', NULL, '2020-08-11 19:07:04', '2020-08-11 19:07:04', NULL, NULL, NULL, NULL),
(11, NULL, 1, NULL, 'estate-land-3453453455', '3453453455', NULL, NULL, '544444444.00', NULL, '344444444.00', 'dfgdfg', 'dsdsdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'land', NULL, 'residential,commercial', NULL, '1231232321', '2019-08-18', 'dsfdsfdsfdsfsd', NULL, NULL, 'XCVXCVCXVCXV', NULL, NULL, NULL, NULL, 1, 0, '8086059f-a88f-452d-aa89-6bfe700575b4', NULL, '2020-08-19 19:31:13', '2020-08-20 21:12:06', 'gfdgdfgdfgdfgdfnhjghjghj', NULL, NULL, NULL),
(12, NULL, 1, 'مروان', 'estate-building-1', '1', NULL, NULL, '333.00', NULL, '222.00', 'رمسيس', 'القاهره - رمسيس', NULL, NULL, NULL, NULL, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'monthly', 'residential', NULL, '3', '1988-02-19', 'القاهره', '2005', '2000-02-02', NULL, NULL, NULL, NULL, NULL, 0, 0, 'c1bf8be7-bfab-4a3c-b261-5a632f3bb265', '2020-08-20 18:29:06', '2020-08-20 01:38:56', '2020-08-20 18:29:06', NULL, NULL, NULL, NULL),
(13, NULL, 1, 'edit name', 'estate-building-401', '566', NULL, NULL, '2000.99', NULL, '66.74', 'تعديل الحى', 'تم تعديل الشارع', NULL, NULL, NULL, NULL, 3, 33, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'yearly', 'residential,commercial', NULL, '45454545', '2025-02-20', 'غغغعغعغ', 'للبلب', '2030-02-20', NULL, NULL, NULL, NULL, NULL, 0, 0, 'caf01e19-21c8-491c-9f24-f96168bdab00', '2020-08-20 02:13:35', '2020-08-20 01:45:03', '2020-08-20 02:13:35', NULL, NULL, NULL, NULL),
(14, 9, 5, NULL, 'estate-apartment-79', '79', '608', NULL, '766.00', NULL, '3000.00', NULL, NULL, 403, 924, 257, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'apartment', 'yearly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Corrupti eiusmod am', NULL, NULL, 'Rerum maiores nemo a', NULL, 1, 0, '26934b54-dc80-465c-86ec-0cc9d895c37c', '2020-08-26 03:50:43', '2020-08-20 02:20:17', '2020-08-26 03:50:43', NULL, NULL, NULL, NULL),
(15, 9, 2, NULL, 'estate-apartment-209', '111', '838', '18', '683.00', NULL, '56565.00', NULL, NULL, 942, 296, 355, 322, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'yearly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fugit rerum incidun', NULL, NULL, 'تفاصيل المطبخ\r\nتفاصيل المطبخ', NULL, 0, 0, 'f5981fc5-1668-424d-8e97-51283f27a8fa', '2020-08-26 03:50:35', '2020-08-20 02:23:12', '2020-08-26 03:50:35', NULL, NULL, NULL, NULL),
(16, 9, 2, NULL, 'estate-apartment-607', '607', '370', 'ghghg', '172.00', 'pending', '33.00', NULL, NULL, 734, 339, 990, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'quarterly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In بببببببassumenda maxime', NULL, NULL, 'Magna id id numquam', NULL, 0, 0, '3cfcc0ef-3ca8-497f-81ae-adcd63ceb4e0', '2020-08-20 02:32:34', '2020-08-20 02:25:53', '2020-08-20 02:32:34', NULL, NULL, NULL, NULL),
(17, NULL, 2, NULL, 'estate-land-619', '456', NULL, NULL, '885.00', NULL, '3000.00', 'الحي', 'الشارع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'land', NULL, 'residential,commercial', NULL, '123', '2010-11-20', 'اسم المحكمه', NULL, NULL, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', NULL, NULL, NULL, NULL, 0, 0, 'd349adf8-4c11-47d8-be43-7ab1b863ad55', '2020-08-20 02:48:03', '2020-08-20 02:42:18', '2020-08-20 02:48:03', 'العنوان', NULL, NULL, NULL),
(18, 9, 2, NULL, 'estate-shop-454543', '454543', NULL, NULL, '545454545.00', NULL, '5454544444.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'quarterly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'ليبليبليبليبليبلا رلايبليبليبليبليبليبليبليبليبلبيليبليبلبيليبليبليبليبلبي                            فقفقفثقفثقف', NULL, NULL, NULL, NULL, 1, 0, '4d0015a3-2ce9-4208-b7c8-6b505e53b2e1', NULL, '2020-08-20 17:44:29', '2020-08-20 17:44:29', NULL, NULL, NULL, NULL),
(19, 9, 3, NULL, 'estate-shop-760', '760', NULL, NULL, '56.00', NULL, '76.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'midterm', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'fghgfhgfhfghfghgfhgf', NULL, NULL, NULL, NULL, 1, 0, 'f93a3c8a-4f91-439b-9aab-f145eec9ea31', '2020-08-22 15:43:11', '2020-08-22 15:42:20', '2020-08-22 15:43:11', NULL, NULL, NULL, NULL),
(20, 9, 2, NULL, 'estate-shop-111', '67866', NULL, NULL, '70.00', NULL, '877.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'quarterly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'hgfhfghgfhfghgfhgf', NULL, NULL, NULL, NULL, 1, 0, '29cb1fd5-505f-46b5-8da1-dc98093fa249', '2020-08-22 15:48:28', '2020-08-22 15:47:49', '2020-08-22 15:48:28', NULL, NULL, NULL, NULL),
(21, NULL, 1, 'Marwan Buliding', 'estate-building-11', '11', NULL, NULL, '2500.00', NULL, '3600.00', 'district_Cairo', 'Ramses Street', NULL, NULL, NULL, NULL, 1, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'monthly', 'residential', NULL, '11111111', '1999-01-01', 'Alex', '11111111', '2050-01-01', 'Extra Details', NULL, NULL, NULL, NULL, 0, 0, 'e546e2ab-4668-46af-b17f-c57f38e0e0ef', '2020-08-25 20:47:21', '2020-08-25 20:33:46', '2020-08-25 20:47:21', NULL, NULL, NULL, NULL),
(22, NULL, 2, 'Marwan Buliding', 'estate-building-8768568608', '8768568608', NULL, NULL, '987987978.00', NULL, '8908906787.00', 'تلتلاتلاتلتالاتلاتلات', 'يبليبليبليبليبليبليبليبليبلبيلبيل', NULL, NULL, NULL, NULL, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'quarterly', 'residential', NULL, '888070785666', '2020-08-18', 'االبالبالبالبا', '089080890890890', '2020-08-24', 'ليبليبليبليبليبليبليبليبليبلي', NULL, NULL, NULL, NULL, 1, 0, '97c44c32-8050-492f-b3cc-9f710059725c', '2020-08-25 21:24:55', '2020-08-25 21:11:28', '2020-08-25 21:24:55', NULL, NULL, NULL, NULL),
(23, NULL, 2, 'Marwan Buliding', 'estate-building-0890896709', '0890896709', NULL, NULL, '231.00', NULL, '1320.00', 'kjljkljklvxcv', 'bvcvbcvbcvbcvbcvbcvb', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'monthly', 'residential,commercial', NULL, '215452012', '2020-08-20', '54545gdfgfgdfgd', '978865546546546', '2019-06-05', 'bvcbcnbmniouoiuoeerewdsdadada', NULL, NULL, NULL, NULL, 0, 0, 'daac06d9-29e7-4aab-9b94-e2eb82696b70', '2020-08-25 21:34:21', '2020-08-25 21:26:51', '2020-08-25 21:34:21', NULL, NULL, NULL, NULL),
(24, NULL, 1, 'esalm elshenawy', 'estate-building-869', '869', NULL, NULL, '45.00', NULL, '68543.00', 'gfhfgh', 'testhgfhfghfgh', NULL, NULL, NULL, NULL, 6, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'quarterly', 'commercial', NULL, '5654654', '2020-08-12', 'ytrytrytr', '7890', '2020-08-13', NULL, NULL, NULL, NULL, NULL, 1, 0, 'e9c1f0f2-03b1-4206-ae99-5b4011c80fd1', '2020-08-25 22:23:49', '2020-08-25 21:38:16', '2020-08-25 22:23:49', NULL, NULL, NULL, NULL),
(25, NULL, 1, 'xxxxxxxxxxx', 'estate-building-22', '22', NULL, NULL, '2500.00', NULL, '3600.00', 'Cairo District', 'Ramses Street', NULL, NULL, NULL, NULL, 1, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'monthly', 'residential', NULL, '44576', '1999-01-01', 'Alex', '28293', '2000-01-18', 'Extra DetailsExpedita itaque sed ut magni. Dolores quis tempore et eum ipsa aliquam voluptatum. Libero quibusdam dolore omnis eos eum quae qui. Et ducimus et earum perspiciatis quas sint.', NULL, NULL, NULL, NULL, 0, 0, '21e02580-127b-419e-b299-5c6611500926', '2020-08-26 01:02:14', '2020-08-26 01:01:45', '2020-08-26 01:02:14', NULL, NULL, NULL, NULL),
(26, NULL, 2, 'fdsfdsfdsf', 'estate-building-543', '543', NULL, NULL, '5453.00', NULL, '34534.00', 'gdfgfdgdf', 'test', NULL, NULL, NULL, NULL, 4, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'midterm', 'residential', NULL, '4089', '2019-09-04', 'bdfgdfgdfgdfgdfgdf', '76867', '2019-08-20', NULL, NULL, NULL, NULL, NULL, 0, 0, '6a54c86e-bb55-41d6-847c-9c24b7d6a705', '2020-08-26 02:20:29', '2020-08-26 02:13:22', '2020-08-26 02:20:29', NULL, NULL, NULL, NULL),
(27, NULL, 3, 'fgfgfdgdfgdf', 'estate-building-8790', '8790', NULL, NULL, '768.00', NULL, '90887.00', 'gfdgdfgdfgdf', 'gfdgdfgdfgdf', NULL, NULL, NULL, NULL, 87, 9, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'building', 'quarterly', 'residential', NULL, '678609879', '2020-08-06', 'jghjhgjghjhg', 'gfhgfhgfh', '2020-08-06', NULL, NULL, NULL, NULL, NULL, 1, 0, 'e1d3e721-96ab-4b57-afe2-edce7ebc447e', NULL, '2020-08-26 02:17:43', '2020-08-26 02:19:04', NULL, NULL, NULL, NULL),
(28, 9, 2, NULL, 'estate-shop-87987909', '87987909', NULL, NULL, '89089.00', NULL, '89089.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'monthly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'vcxvcxvcx', NULL, NULL, NULL, NULL, 1, 0, '760d3726-5ca4-4f53-a175-64356ea8bab2', NULL, '2020-08-26 02:34:02', '2020-08-26 02:34:02', NULL, NULL, NULL, NULL),
(29, 9, 2, NULL, 'estate-apartment-76868', '76868', '67', NULL, '876.00', NULL, '678678.00', NULL, NULL, 7, 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'لبالب', NULL, NULL, NULL, NULL, 1, 0, '92ab5f34-89e0-487f-b8bc-8b591eaab793', '2020-08-26 03:50:27', '2020-08-26 02:43:38', '2020-08-26 03:50:27', NULL, NULL, NULL, NULL),
(30, 9, 1, NULL, 'estate-shop-4555', '4555', NULL, NULL, '2500.00', NULL, '3600.00', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, 1, NULL, 1, 1, '\"1\"', 'shop', 'monthly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'Extra DetailsMaiores temporibus ex aliquid ut. Quo non voluptas placeat autem iste tempore tempore. Et eius impedit quis debitis fugiat. Non eveniet et veniam. Incidunt placeat iusto sequi quo possimus voluptatem.', '1', '111', NULL, 1, 0, 0, 'ba1cd7c0-ffb9-43e5-9c0d-3fc96020ae45', NULL, '2020-08-26 02:53:01', '2020-08-26 02:54:10', NULL, NULL, NULL, NULL),
(31, 9, 1, NULL, 'estate-shop-11', '11', NULL, NULL, '2500.00', NULL, '3600.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'monthly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'Extra DetailsModi sint non quia repellendus omnis officia numquam. Sit quisquam autem sint deleniti. Sapiente non quo eos qui itaque velit aut. Impedit consectetur consectetur sed qui. Et dicta dolorem.', NULL, NULL, NULL, NULL, 0, 0, '641bd604-51bf-4174-a87f-f314feda0ff3', NULL, '2020-08-26 02:56:09', '2020-08-26 02:56:09', NULL, NULL, NULL, NULL),
(33, 9, 2, NULL, 'estate-shop-111', '111', NULL, NULL, '33.00', NULL, '323.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'quarterly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'ؤءرؤءرؤءرؤءرءؤر', NULL, NULL, NULL, NULL, 0, 0, '6b85d1bb-4a09-49c4-8082-1c96a62ec48b', NULL, '2020-08-26 03:01:57', '2020-08-26 03:01:57', NULL, NULL, NULL, NULL),
(36, 9, 2, NULL, 'estate-shop-111', '111', NULL, NULL, '432.00', NULL, '332.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 0, 0, 'null', 'shop', 'quarterly', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, 'يشسيشسيشسيشسيشسي', NULL, NULL, NULL, NULL, 0, 0, '5cb85135-a3e9-4258-88a5-dbffc34702e1', NULL, '2020-08-26 03:21:14', '2020-08-26 03:21:14', NULL, NULL, NULL, NULL),
(37, NULL, 3, NULL, 'estate-land-11', '11', NULL, NULL, '2000.00', NULL, '33.00', 'الحي', 'cairo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'land', NULL, 'residential,commercial', NULL, '487', '1988-02-02', 'اسم المحكمه', NULL, NULL, '222', NULL, NULL, NULL, NULL, 0, 0, 'a0068b17-5190-4495-9b13-78050c3f5e14', NULL, '2020-08-26 03:21:23', '2020-08-26 03:21:23', 'العنوان', NULL, NULL, NULL),
(38, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEt reprehenderit voluptates distinctio vero asperiores aut. Saepe earum aut. Dolore suscipit nihil cum reprehenderit minus eaque. Et nulla dicta quas maiores suscipit et vel. Est quos molestias.', NULL, NULL, NULL, NULL, 0, 0, 'cb69e6eb-7881-4e66-895d-d203ded99339', '2020-08-26 04:08:53', '2020-08-26 03:50:54', '2020-08-26 04:08:53', NULL, NULL, NULL, NULL),
(39, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsVeniam natus est ut voluptas eligendi. Dolorum fugit omnis cumque optio voluptatem. Harum harum ut illum cum sint eaque autem.', NULL, NULL, NULL, NULL, 0, 0, '2836260f-f3ad-4d10-a1cf-abc17f7ed173', '2020-08-26 04:08:44', '2020-08-26 03:51:41', '2020-08-26 04:08:44', NULL, NULL, NULL, NULL),
(40, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '24131f9c-82e8-4ef1-b811-664eb6a1f01c', '2020-08-26 04:08:35', '2020-08-26 03:51:56', '2020-08-26 04:08:35', NULL, NULL, NULL, NULL),
(41, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsSunt impedit unde esse. Ipsum iste itaque adipisci ullam ullam. Aut sit veniam maiores ratione. Architecto et aut sed natus aut et voluptates. Laborum suscipit incidunt ut ut est.', NULL, NULL, NULL, NULL, 0, 0, '779a2a7f-001a-48ea-97d8-5240b2ca74f8', '2020-08-26 04:08:27', '2020-08-26 03:52:20', '2020-08-26 04:08:27', NULL, NULL, NULL, NULL),
(42, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsPorro deserunt assumenda ipsam repellendus sapiente. Quis et totam nemo omnis nostrum. Recusandae molestiae dolorem qui.', NULL, NULL, NULL, NULL, 0, 0, '4f5eb9ed-acbc-4380-b2c7-d1941df6decc', '2020-08-26 04:08:19', '2020-08-26 03:52:28', '2020-08-26 04:08:19', NULL, NULL, NULL, NULL),
(43, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsExcepturi ut dolor est neque cupiditate repellendus. Explicabo enim ea qui est maiores id. Commodi laborum non.', NULL, NULL, NULL, NULL, 0, 0, '55fbc25e-f400-494e-8534-8a6dbb8f74f2', '2020-08-26 04:08:11', '2020-08-26 03:52:36', '2020-08-26 04:08:11', NULL, NULL, NULL, NULL),
(44, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsOdit est voluptas. Consequatur provident cupiditate optio deserunt earum et. Consequuntur enim tempore.', NULL, NULL, NULL, NULL, 0, 0, 'c64662fd-286c-4de1-97cd-76feab5e3e53', '2020-08-26 04:08:03', '2020-08-26 03:52:43', '2020-08-26 04:08:03', NULL, NULL, NULL, NULL),
(45, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsQuia dignissimos veritatis voluptatem est. Perspiciatis repellendus laboriosam. Veniam dolorem fugiat. Est sit fugiat necessitatibus. Modi eius consectetur assumenda.', NULL, NULL, NULL, NULL, 0, 0, '13bc7c7c-c6df-4070-a211-fd746d4f989a', '2020-08-26 04:07:55', '2020-08-26 03:52:51', '2020-08-26 04:07:55', NULL, NULL, NULL, NULL),
(46, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsIusto ad nisi nobis. Sit labore vero distinctio aut. Maiores doloribus quaerat sit nobis non. Tempora dolore aliquam pariatur.', NULL, NULL, NULL, NULL, 0, 0, 'e79f5c68-fa4d-4e0d-b77c-964ebd430aac', '2020-08-26 04:07:12', '2020-08-26 03:52:59', '2020-08-26 04:07:12', NULL, NULL, NULL, NULL),
(47, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsConsequatur cumque rem nisi et nesciunt. Ipsam non minus harum. Aut voluptatem et veniam repellat.', NULL, NULL, NULL, NULL, 0, 0, 'b1ca1be2-f315-46bd-b1f0-0eef789a2041', '2020-08-26 04:07:19', '2020-08-26 03:53:06', '2020-08-26 04:07:19', NULL, NULL, NULL, NULL),
(48, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsDucimus dignissimos placeat. Sunt rerum ut iure fugit nulla. Eos doloribus consequatur veniam numquam. Aut repellendus architecto blanditiis id minima esse. Autem sed unde qui accusamus nesciunt.', NULL, NULL, NULL, NULL, 0, 0, '3b48d8a6-7989-4c07-8dc4-8dc86f25eee7', '2020-08-26 04:07:28', '2020-08-26 03:53:14', '2020-08-26 04:07:28', NULL, NULL, NULL, NULL),
(49, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEt facere commodi suscipit error provident. Unde eius voluptatem qui maxime itaque sed. Quam deserunt molestias repellendus assumenda voluptatem accusantium. Et enim et sint ratione quia qui.', NULL, NULL, NULL, NULL, 0, 0, '0c80457e-3f6c-4c90-b3cd-35ac85454bb6', '2020-08-26 04:07:37', '2020-08-26 03:53:22', '2020-08-26 04:07:37', NULL, NULL, NULL, NULL),
(50, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsVoluptas voluptate magni non. Eius velit occaecati. Incidunt ducimus reprehenderit. Expedita aut nisi quo ratione.', NULL, NULL, NULL, NULL, 0, 0, '6976b6cb-611e-4254-9f8f-e5cb140454d4', '2020-08-26 04:07:04', '2020-08-26 03:53:30', '2020-08-26 04:07:04', NULL, NULL, NULL, NULL),
(51, 9, 1, NULL, 'estate-apartment-11', '11', '11', NULL, '11.00', NULL, '11.00', NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'quarterly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asas', NULL, NULL, NULL, NULL, 0, 0, '4438c64f-dee7-46f5-b305-40a1b5092648', '2020-08-26 04:07:46', '2020-08-26 03:56:24', '2020-08-26 04:07:46', NULL, NULL, NULL, NULL),
(52, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsCorporis quia cum est error reiciendis soluta. Totam sed illo sit. Voluptatem autem voluptates ut fugiat ipsam et.', NULL, NULL, NULL, NULL, 0, 0, 'c34de4bb-f8ef-4391-b267-b3194de20fcd', NULL, '2020-08-26 04:10:41', '2020-08-26 04:10:41', NULL, NULL, NULL, NULL),
(53, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsExcepturi quaerat quae nam adipisci porro. Vel quis dolorum harum. Fugiat deleniti quas. Provident tenetur aut sint iusto.', NULL, NULL, NULL, NULL, 0, 0, 'ef0319b0-e4ad-4161-a6f3-4fb7ca35c4d6', NULL, '2020-08-26 04:11:27', '2020-08-26 04:11:27', NULL, NULL, NULL, NULL),
(54, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '7cbb1ca3-974c-4191-8365-ff0d9204a189', NULL, '2020-08-26 04:11:42', '2020-08-26 04:11:42', NULL, NULL, NULL, NULL),
(55, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsVoluptate rerum consequuntur voluptatem et harum. Quisquam autem saepe. Incidunt et quasi ea sed pariatur. Occaecati et ea quo nisi ratione eligendi. Et nesciunt quidem et reiciendis temporibus explicabo dignissimos.', NULL, NULL, NULL, NULL, 0, 0, 'c953421d-2f3c-4cbe-badb-896ce6d3d2c0', NULL, '2020-08-26 04:12:05', '2020-08-26 04:12:05', NULL, NULL, NULL, NULL),
(56, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsQui vel ad. Quis nam aut eos odit ratione sint eaque. Officiis aliquid voluptatem ratione quaerat. Magni similique architecto omnis temporibus odio.', NULL, NULL, NULL, NULL, 0, 0, 'b726b3ec-f74d-471b-928f-7460a5c49d26', NULL, '2020-08-26 04:12:13', '2020-08-26 04:12:13', NULL, NULL, NULL, NULL),
(57, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEos quia laboriosam voluptate dolorem quia. Consequatur maiores molestiae distinctio sit veniam magnam. Rerum omnis voluptatem alias. Qui at distinctio non ut fuga nulla. Voluptas esse consequatur.', NULL, NULL, NULL, NULL, 0, 0, 'e0962b44-531f-420d-b005-05677f8b5207', NULL, '2020-08-26 04:12:21', '2020-08-26 04:12:21', NULL, NULL, NULL, NULL),
(58, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsNulla magni eos magni maxime dolorem dolor. Quia facilis maxime minima molestiae. Est molestiae laudantium numquam. Non aut at earum accusantium accusamus animi doloremque. Blanditiis minima sed aliquam qui magni.', NULL, NULL, NULL, NULL, 0, 0, '612d1291-fc94-43ad-b59c-1badfbc496b7', NULL, '2020-08-26 04:12:29', '2020-08-26 04:12:29', NULL, NULL, NULL, NULL),
(59, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEa blanditiis architecto. Amet sit provident nesciunt odit. Non voluptates molestiae. Totam nostrum voluptatem eum corrupti nulla.', NULL, NULL, NULL, NULL, 0, 0, '3370666e-7550-4ff6-8c96-7b8a46800559', NULL, '2020-08-26 04:12:37', '2020-08-26 04:12:37', NULL, NULL, NULL, NULL),
(60, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsSunt dicta dolorum fugiat. Sed reprehenderit sapiente vero. Sed omnis illo reiciendis ea id eos.', NULL, NULL, NULL, NULL, 0, 0, 'f7d7a8c9-1701-4aa3-8381-b84e9f7ee847', NULL, '2020-08-26 04:12:45', '2020-08-26 04:12:45', NULL, NULL, NULL, NULL),
(61, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsReprehenderit ducimus ut alias est perferendis. Dolor velit adipisci. Excepturi voluptatum qui et ad dolores quia.', NULL, NULL, NULL, NULL, 0, 0, 'b168823b-220c-4598-a1d7-40e1b7632897', NULL, '2020-08-26 04:12:54', '2020-08-26 04:12:54', NULL, NULL, NULL, NULL),
(62, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsTemporibus aut iusto eos velit. Qui est ut pariatur. Aperiam nemo qui velit. Maxime aut earum tempore consequatur quasi. Non laudantium odit in exercitationem est.', NULL, NULL, NULL, NULL, 0, 0, '1ed1b451-3722-412c-90ff-76150d176d13', NULL, '2020-08-26 04:13:01', '2020-08-26 04:13:01', NULL, NULL, NULL, NULL),
(63, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEx voluptate harum at. Repudiandae doloribus beatae nesciunt quia velit sed qui. Dolorem possimus culpa voluptatem. Quod qui aspernatur ducimus.', NULL, NULL, NULL, NULL, 0, 0, '4152eb13-cb29-4af0-ba11-c864fd0179f3', NULL, '2020-08-26 04:13:09', '2020-08-26 04:13:09', NULL, NULL, NULL, NULL),
(64, 9, 1, NULL, 'estate-apartment-11', '11', '23', NULL, '2500.00', NULL, '3600.00', NULL, NULL, 5, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 'apartment', 'monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra DetailsEveniet voluptate ipsam vitae. Tempore voluptatem expedita aut nemo ducimus maxime earum. Sunt aspernatur provident rerum. Qui aliquid omnis. Alias ducimus ut molestiae voluptatem qui similique.', NULL, NULL, NULL, NULL, 0, 0, '07f7540c-f2c3-46f6-99e6-c90868576d31', NULL, '2020-08-26 04:13:17', '2020-08-26 04:13:17', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estate_orders`
--

CREATE TABLE `estate_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estate_id` bigint(20) UNSIGNED NOT NULL,
  `order_type` enum('rent','owning') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rent',
  `order_number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(11,2) UNSIGNED NOT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `is_ended` tinyint(1) NOT NULL DEFAULT 0,
  `rent_period` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rented_at` date NOT NULL,
  `ended_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estate_orders`
--

INSERT INTO `estate_orders` (`id`, `estate_id`, `order_type`, `order_number`, `tenant_id`, `amount`, `is_accepted`, `is_ended`, `rent_period`, `description`, `rented_at`, `ended_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 11, 'rent', '1', 1, '544444444.00', 1, 0, NULL, 'fdgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg', '2020-08-01', '2020-08-01', '2020-08-26 09:25:56', '2020-08-26 09:26:17', NULL);

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
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `account_id`, `name`, `group_id`, `created_at`, `updated_at`, `balance`, `is_active`) VALUES
(1, 82, 'المساعده', 1, '2020-07-04 12:57:02', '2020-07-05 17:11:02', '12000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fund_balances`
--

CREATE TABLE `fund_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fund_id` bigint(20) UNSIGNED NOT NULL,
  `debit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_balances`
--

INSERT INTO `fund_balances` (`id`, `fund_id`, `debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '0.00', '12000.00', NULL, '2020-07-04 12:57:02', '2020-07-05 17:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `generallsetting`
--

CREATE TABLE `generallsetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_mobile` int(11) DEFAULT NULL,
  `site_phone` int(11) DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_whatup` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_aboutus_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_addresse_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playStoreLink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aplleStoreLink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logoImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generallsetting`
--

INSERT INTO `generallsetting` (`id`, `site_title_ar`, `email`, `site_mobile`, `site_phone`, `facebook_url`, `twitter_url`, `instagram`, `site_whatup`, `site_aboutus_ar`, `site_addresse_ar`, `playStoreLink`, `aplleStoreLink`, `logoImage`, `created_at`, `updated_at`) VALUES
(1, 'Waqf', 'about@Waqf.com', 123654789, 1236045987, 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', NULL, 'الوقف لغةً: يطلق على الحبس والكفّ، ويُجمع على أوقاف ووقوف.[١] الوقف في الاصطلاح الشرعي: هو حبس عين المال وتسبيل منفعته؛ طلباً للأجر من الله تعالى،[٢] ويُقصد بالعين الشيء الذي يُمكن الانتفاع به مع بقاء أصله، مثل البيوت والأراضي وغيرها، ويقصد بتسبيل المنفعة أي تخصيصها لوجه الله تعالى، أما المنفعة فهي ما ينتج عن الأصل الأجرة والربح وغيرها من المنافع.[٣][٤] الوقف عند المذاهب الفقهية: اختلف الفقهاء في تعريف الوقف بسبب اختلاف مذاهبهم في حقيقته، وبيان تعريف الوقف في المذاهب الأربعة فيما يأتي:[٥]', '15 شارع عبدالله بن مسعود النسيم الغربي الرياض ', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_primary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_secondary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_financial_date_at` date DEFAULT NULL,
  `end_financial_date_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `manager_primary`, `manager_secondary`, `start_financial_date_at`, `end_financial_date_at`, `created_at`, `updated_at`) VALUES
(1, 'Waqf Company', 'These waqf company', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `more` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageable_type`, `imageable_id`, `name`, `more`, `deleted_at`, `created_at`, `updated_at`, `id`) VALUES
('App\\Building', '1', '0d2o91GC.jpg', 'instrument-image', '2020-08-04 04:00:25', '2020-07-04 14:13:08', '2020-08-04 04:00:25', 1),
('App\\Building', '1', 'r0szO2RU.jpg', 'license-image', '2020-08-04 04:00:25', '2020-07-04 14:13:08', '2020-08-04 04:00:25', 2),
('App\\Building', '1', 'fNmlqKW7.jpg', NULL, NULL, '2020-07-04 14:13:08', '2020-07-04 14:13:08', 3),
('App\\MaintenanceOrder', '0', 'fHPTjl1j.jpg', 'MaintenanceOrder-image', NULL, '2020-07-14 16:25:05', '2020-07-14 16:25:05', 4),
('App\\MaintenanceOrder', '0', 'U0HoY7mJ.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:42:25', '2020-07-15 10:42:25', 5),
('App\\MaintenanceOrder', '0', 'jCkIrCVm.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:42:53', '2020-07-15 10:42:53', 6),
('App\\MaintenanceOrder', '0', '5gAF34ND.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:43:42', '2020-07-15 10:43:42', 7),
('App\\MaintenanceOrder', '0', 'AQSWiqIV.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:44:45', '2020-07-15 10:44:45', 8),
('App\\MaintenanceOrder', '0', 'zT22P5gP.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:45:55', '2020-07-15 10:45:55', 9),
('App\\MaintenanceOrder', '0', 'hW9DvteI.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:46:55', '2020-07-15 10:46:55', 10),
('App\\MaintenanceOrder', '0', '0C88nlJ1.jpg', 'MaintenanceOrder-image', NULL, '2020-07-15 10:48:28', '2020-07-15 10:48:28', 11),
('App\\Apartment', '2', '06ztlEGL.jpg', NULL, NULL, '2020-07-28 19:16:38', '2020-07-28 19:16:38', 12),
('App\\Apartment', '2', 'rPFFtwaG.jpg', NULL, NULL, '2020-07-28 19:16:39', '2020-07-28 19:16:39', 13),
('App\\Apartment', '2', 'byzWI48r.jpg', NULL, NULL, '2020-07-28 19:16:39', '2020-07-28 19:16:39', 14),
('App\\Apartment', '2', 'Fe4PMKFk.jpg', NULL, NULL, '2020-07-28 19:16:40', '2020-07-28 19:16:40', 15),
('App\\Apartment', '2', 'fAEDcHmC.jpg', NULL, NULL, '2020-07-28 19:16:40', '2020-07-28 19:16:40', 16),
('App\\Apartment', '2', 'egmXHg5U.jpg', NULL, NULL, '2020-07-28 19:16:40', '2020-07-28 19:16:40', 17),
('App\\Apartment', '2', 'p3JygpWc.jpg', NULL, NULL, '2020-07-28 19:16:40', '2020-07-28 19:16:40', 18),
('App\\Apartment', '2', 'ITaWROta.jpg', NULL, NULL, '2020-07-28 19:16:41', '2020-07-28 19:16:41', 19),
('App\\Apartment', '2', 'nOHdrNBj.jpg', NULL, NULL, '2020-07-28 19:16:41', '2020-07-28 19:16:41', 20),
('App\\Apartment', '2', '2B8z9tWa.jpg', NULL, NULL, '2020-07-28 19:16:41', '2020-07-28 19:16:41', 21),
('App\\MaintenanceOrder', '0', '4rTCcuFG.jpg', 'MaintenanceOrder-image', NULL, '2020-07-29 07:33:33', '2020-07-29 07:33:33', 22),
('App\\MaintenanceOrder', '0', 'JjGeIksH.jpg', 'MaintenanceOrder-image', NULL, '2020-08-03 17:30:19', '2020-08-03 17:30:19', 23),
('App\\Building', '3', 'p0kcyAPy.jpg', 'instrument-image', '2020-08-04 03:43:58', '2020-08-04 03:43:14', '2020-08-04 03:43:58', 24),
('App\\Building', '3', 'wiROFf3s.jpg', 'license-image', '2020-08-04 03:43:58', '2020-08-04 03:43:14', '2020-08-04 03:43:58', 25),
('App\\Building', '3', '6j013yEq.jpg', NULL, NULL, '2020-08-04 03:43:14', '2020-08-04 03:43:14', 26),
('App\\Building', '3', 's3IsUsSN', 'instrument-image', '2020-08-04 03:58:37', '2020-08-04 03:43:58', '2020-08-04 03:58:37', 27),
('App\\Building', '3', 'xXRHxlfw', 'license-image', '2020-08-04 03:58:37', '2020-08-04 03:43:58', '2020-08-04 03:58:37', 28),
('App\\Building', '3', 'ZTPw3Bpn', NULL, NULL, '2020-08-04 03:43:58', '2020-08-04 03:43:58', 29),
('App\\Building', '3', 'lkcSeac6', 'instrument-image', NULL, '2020-08-04 03:58:37', '2020-08-04 03:58:37', 33),
('App\\Building', '3', 'gzg6oQgg', 'license-image', NULL, '2020-08-04 03:58:37', '2020-08-04 03:58:37', 34),
('App\\Building', '3', '4KLSowh4', NULL, NULL, '2020-08-04 03:58:37', '2020-08-04 03:58:37', 35),
('App\\Building', '1', 'dxaRM2Y8', 'instrument-image', '2020-08-04 05:08:06', '2020-08-04 04:00:25', '2020-08-04 05:08:06', 36),
('App\\Building', '1', 'VDLnwZqw', 'license-image', '2020-08-04 05:08:06', '2020-08-04 04:00:25', '2020-08-04 05:08:06', 37),
('App\\Building', '1', '3q5KxZAq', NULL, NULL, '2020-08-04 04:00:25', '2020-08-04 04:00:25', 38),
('App\\Apartment', '4', 'wPTYGyBn.jpg', NULL, '2020-08-04 04:59:56', '2020-08-04 04:15:22', '2020-08-04 04:59:56', 39),
('App\\Apartment', '4', '1wcuy3vq.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 40),
('App\\Apartment', '4', 'CkEnzfcn.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 41),
('App\\Apartment', '4', 'Z3a3AAq9.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 42),
('App\\Apartment', '4', 'V8tgBqDI.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 43),
('App\\Apartment', '4', 'psAC3r0G.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 44),
('App\\Apartment', '4', 'dg2PZfVy.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 45),
('App\\Apartment', '4', 'x3UfgU01.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 46),
('App\\Apartment', '4', 'Pc74yHhQ.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 47),
('App\\Apartment', '4', '0YVpr4Kj.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 48),
('App\\Apartment', '4', 'HPR93g3J.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 49),
('App\\Apartment', '4', 'lhrulB3m.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 50),
('App\\Apartment', '4', 'rpypoSZk.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 51),
('App\\Apartment', '4', '0fl1Js8I.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 52),
('App\\Apartment', '4', 'iKQ481Fn.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 53),
('App\\Apartment', '4', 'MRtd2L0e.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 54),
('App\\Apartment', '4', 'WizvyVe8.jpg', NULL, NULL, '2020-08-04 04:59:56', '2020-08-04 04:59:56', 55),
('App\\Building', '1', 'gAaGQbeX', 'instrument-image', NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 56),
('App\\Building', '1', 'qhUqQwvp', 'license-image', NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 57),
('App\\Building', '1', 'GrPHwlS3.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 58),
('App\\Building', '1', 'KUPcb0tv.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 59),
('App\\Building', '1', 'WZ1u1Rjg.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 60),
('App\\Building', '1', '32ZFB4lo.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 61),
('App\\Building', '1', 'mcuneaAf.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 62),
('App\\Building', '1', 'jWqqdo0Z.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 63),
('App\\Building', '1', 't7csjmG5.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 64),
('App\\Building', '1', 'Yvk7jqmS.jpg', NULL, NULL, '2020-08-04 05:08:06', '2020-08-04 05:08:06', 65),
('App\\Shop', '5', '18xwdZjg.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 66),
('App\\Shop', '5', 'G3sJFiH7.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 67),
('App\\Shop', '5', 'Hx0cUG9I.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 68),
('App\\Shop', '5', 'xmFPBGks.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 69),
('App\\Shop', '5', '64mVYIod.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 70),
('App\\Shop', '5', 'dsTWOFuD.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 71),
('App\\Shop', '5', 'vSzCxHj4.jpg', NULL, '2020-08-04 09:43:59', '2020-08-04 05:17:28', '2020-08-04 09:43:59', 72),
('App\\Shop', '5', 'sCC7YmQ3.jpg', NULL, NULL, '2020-08-04 09:43:59', '2020-08-04 09:43:59', 73),
('App\\Shop', '5', 'rL1AEoAS.jpg', NULL, NULL, '2020-08-04 09:43:59', '2020-08-04 09:43:59', 74),
('App\\Shop', '5', 'gpInDm8B.jpg', NULL, NULL, '2020-08-04 09:43:59', '2020-08-04 09:43:59', 75),
('App\\Shop', '5', 'oyH0sFT9.jpg', NULL, NULL, '2020-08-04 09:43:59', '2020-08-04 09:43:59', 76),
('App\\Land', '6', '1V7HYDjP.jpg', NULL, '2020-08-04 09:59:31', '2020-08-04 09:58:55', '2020-08-04 09:59:31', 77),
('App\\Land', '6', '6rGQyF63', NULL, '2020-08-04 10:00:17', '2020-08-04 09:59:31', '2020-08-04 10:00:17', 78),
('App\\Land', '6', '2pkPY7XI.jpg', NULL, '2020-08-04 10:01:22', '2020-08-04 10:00:17', '2020-08-04 10:01:22', 79),
('App\\Land', '6', 'F2M1QKR4.jpg', NULL, '2020-08-04 10:01:22', '2020-08-04 10:00:17', '2020-08-04 10:01:22', 80),
('App\\Land', '6', 'qcm0bMux.jpg', NULL, '2020-08-04 10:01:22', '2020-08-04 10:00:17', '2020-08-04 10:01:22', 81),
('App\\Land', '6', 'wlrWkQpC.jpg', NULL, '2020-08-04 10:01:22', '2020-08-04 10:00:17', '2020-08-04 10:01:22', 82),
('App\\Land', '6', 'kzDkckOG', NULL, '2020-08-04 10:05:18', '2020-08-04 10:01:22', '2020-08-04 10:05:18', 83),
('App\\Land', '6', 'wE4NfWfu.jpg', NULL, NULL, '2020-08-04 10:05:18', '2020-08-04 10:05:18', 84),
('App\\Land', '6', 'mZs19FkH.jpg', NULL, NULL, '2020-08-04 10:05:18', '2020-08-04 10:05:18', 85),
('App\\Land', '6', '5rmKV1NJ.jpg', NULL, NULL, '2020-08-04 10:05:18', '2020-08-04 10:05:18', 86),
('App\\Land', '6', 'Lwbdr7EN.jpg', NULL, NULL, '2020-08-04 10:05:18', '2020-08-04 10:05:18', 87),
('App\\Land', '7', 'nRHBnfO7.jpg', NULL, NULL, '2020-08-04 10:10:56', '2020-08-04 10:10:56', 88),
('App\\MaintenanceOrder', '0', 'AXraruZb.pdf', 'MaintenanceOrder-image', NULL, '2020-08-06 15:12:50', '2020-08-06 15:12:50', 89),
('App\\Apartment', '8', 'CQsAxgqr.jpg', NULL, NULL, '2020-08-09 18:56:59', '2020-08-09 18:56:59', 90),
('App\\Apartment', '8', '0o8OYd9W.jpg', NULL, NULL, '2020-08-09 18:56:59', '2020-08-09 18:56:59', 91),
('App\\Apartment', '8', 'U6Fzs9P4.jpg', NULL, NULL, '2020-08-09 18:56:59', '2020-08-09 18:56:59', 92),
('App\\Apartment', '8', 'WNkS3we7.jpg', NULL, NULL, '2020-08-09 18:56:59', '2020-08-09 18:56:59', 93),
('App\\MaintenanceOrder', '0', 'CVnfrpSm.jpg', 'MaintenanceOrder-image', NULL, '2020-08-09 19:03:39', '2020-08-09 19:03:39', 94),
('App\\Building', '9', 'R7YIGmTw.jpg', 'instrument-image', '2020-08-26 01:10:03', '2020-08-10 18:08:48', '2020-08-26 01:10:03', 95),
('App\\Building', '9', 'eNs394nW.jpg', 'license-image', '2020-08-26 01:10:03', '2020-08-10 18:08:48', '2020-08-26 01:10:03', 96),
('App\\Building', '9', '8iYPbu0k.jpg', NULL, NULL, '2020-08-10 18:08:48', '2020-08-10 18:08:48', 97),
('App\\Building', '9', 'aCC5eN6Y.jpg', NULL, NULL, '2020-08-10 18:08:48', '2020-08-10 18:08:48', 98),
('App\\MaintenanceOrder', '0', 'aHTRd6D2.jpg', 'MaintenanceOrder-image', NULL, '2020-08-10 19:03:10', '2020-08-10 19:03:10', 99),
('App\\Apartment', '10', 'E876kt3m.jpg', NULL, NULL, '2020-08-11 19:07:04', '2020-08-11 19:07:04', 100),
('App\\Apartment', '10', 'mYufUIJM.jpg', NULL, NULL, '2020-08-11 19:07:04', '2020-08-11 19:07:04', 101),
('App\\Apartment', '10', 'cPGg0OEG.jpg', NULL, NULL, '2020-08-11 19:07:04', '2020-08-11 19:07:04', 102),
('App\\Apartment', '10', '6uCFXGPg.jpg', NULL, NULL, '2020-08-11 19:07:04', '2020-08-11 19:07:04', 103),
('App\\MaintenanceOrder', '0', '5P9PV4C5.jpg', 'MaintenanceOrder-image', NULL, '2020-08-16 20:47:05', '2020-08-16 20:47:05', 104),
('App\\Land', '11', '9ST84AI2.jpg', NULL, NULL, '2020-08-19 19:31:13', '2020-08-19 19:31:13', 105),
('App\\Building', '12', 'mCsaUHvo.jpg', 'instrument-image', NULL, '2020-08-20 01:38:56', '2020-08-20 01:38:56', 106),
('App\\Building', '12', 'gHWNOFxw.jpg', 'license-image', NULL, '2020-08-20 01:38:56', '2020-08-20 01:38:56', 107),
('App\\Building', '12', 'yHzztgIK', NULL, NULL, '2020-08-20 01:38:56', '2020-08-20 01:38:56', 108),
('App\\Building', '13', 'QyGg3sZc.png', 'instrument-image', '2020-08-20 01:46:48', '2020-08-20 01:45:03', '2020-08-20 01:46:48', 109),
('App\\Building', '13', 'ExpaOvK8.png', 'license-image', '2020-08-20 01:46:48', '2020-08-20 01:45:03', '2020-08-20 01:46:48', 110),
('App\\Building', '13', 'VARWJT9T', NULL, NULL, '2020-08-20 01:45:03', '2020-08-20 01:45:03', 111),
('App\\Building', '13', 'lKu1iP68', 'instrument-image', '2020-08-20 01:58:48', '2020-08-20 01:46:48', '2020-08-20 01:58:48', 112),
('App\\Building', '13', 'mxB87fn8', 'license-image', '2020-08-20 01:58:48', '2020-08-20 01:46:48', '2020-08-20 01:58:48', 113),
('App\\Building', '13', 'EWd4uuoW', NULL, NULL, '2020-08-20 01:46:48', '2020-08-20 01:46:48', 114),
('App\\Building', '13', 'joQvLAZw', 'instrument-image', '2020-08-20 02:02:02', '2020-08-20 01:58:48', '2020-08-20 02:02:02', 115),
('App\\Building', '13', 'fKERxTdr', 'license-image', '2020-08-20 02:02:02', '2020-08-20 01:58:48', '2020-08-20 02:02:02', 116),
('App\\Building', '13', 'Ob5hAaeE.png', NULL, NULL, '2020-08-20 01:58:48', '2020-08-20 01:58:48', 117),
('App\\Building', '13', 'doqmbarF', 'instrument-image', '2020-08-20 02:02:18', '2020-08-20 02:02:02', '2020-08-20 02:02:18', 118),
('App\\Building', '13', 'Zk1a2sc3', 'license-image', '2020-08-20 02:02:18', '2020-08-20 02:02:02', '2020-08-20 02:02:18', 119),
('App\\Building', '13', 'RoRvNVzJ', NULL, NULL, '2020-08-20 02:02:02', '2020-08-20 02:02:02', 120),
('App\\Building', '13', 'gkxcUfUH', 'instrument-image', '2020-08-20 02:04:15', '2020-08-20 02:02:18', '2020-08-20 02:04:15', 121),
('App\\Building', '13', 'gHFYET6I', 'license-image', '2020-08-20 02:04:15', '2020-08-20 02:02:18', '2020-08-20 02:04:15', 122),
('App\\Building', '13', '50597R4o', NULL, NULL, '2020-08-20 02:02:18', '2020-08-20 02:02:18', 123),
('App\\Building', '13', 'mMgAkQ2V', 'instrument-image', '2020-08-20 02:04:39', '2020-08-20 02:04:15', '2020-08-20 02:04:39', 124),
('App\\Building', '13', 'z3gDAg2R', 'license-image', '2020-08-20 02:04:39', '2020-08-20 02:04:15', '2020-08-20 02:04:39', 125),
('App\\Building', '13', 'OmKluqfp', NULL, NULL, '2020-08-20 02:04:15', '2020-08-20 02:04:15', 126),
('App\\Building', '13', 'JXHLlBSz', 'instrument-image', '2020-08-20 02:06:12', '2020-08-20 02:04:39', '2020-08-20 02:06:12', 127),
('App\\Building', '13', 'L3GQ9KUC', 'license-image', '2020-08-20 02:06:12', '2020-08-20 02:04:39', '2020-08-20 02:06:12', 128),
('App\\Building', '13', 'cTd47sX9', NULL, NULL, '2020-08-20 02:04:39', '2020-08-20 02:04:39', 129),
('App\\Building', '13', 'ysMftqjX', 'instrument-image', '2020-08-20 02:07:03', '2020-08-20 02:06:12', '2020-08-20 02:07:03', 130),
('App\\Building', '13', 'w3xErxNw', 'license-image', '2020-08-20 02:07:03', '2020-08-20 02:06:12', '2020-08-20 02:07:03', 131),
('App\\Building', '13', 'x6hd7Omj', NULL, NULL, '2020-08-20 02:06:12', '2020-08-20 02:06:12', 132),
('App\\Building', '13', 'AOxrTaDv', 'instrument-image', '2020-08-20 02:07:25', '2020-08-20 02:07:03', '2020-08-20 02:07:25', 133),
('App\\Building', '13', 'N2QymR2U', 'license-image', '2020-08-20 02:07:25', '2020-08-20 02:07:03', '2020-08-20 02:07:25', 134),
('App\\Building', '13', 'cpR45jHs', NULL, NULL, '2020-08-20 02:07:03', '2020-08-20 02:07:03', 135),
('App\\Building', '13', 'w74f1tAX', 'instrument-image', '2020-08-20 02:07:54', '2020-08-20 02:07:25', '2020-08-20 02:07:54', 136),
('App\\Building', '13', 'uQQk2PLW', 'license-image', '2020-08-20 02:07:54', '2020-08-20 02:07:25', '2020-08-20 02:07:54', 137),
('App\\Building', '13', 'UgSsRTJL', NULL, NULL, '2020-08-20 02:07:25', '2020-08-20 02:07:25', 138),
('App\\Building', '13', 'XDLnF5Vl', 'instrument-image', '2020-08-20 02:08:28', '2020-08-20 02:07:54', '2020-08-20 02:08:28', 139),
('App\\Building', '13', 'ghH5RhUY', 'license-image', '2020-08-20 02:08:28', '2020-08-20 02:07:54', '2020-08-20 02:08:28', 140),
('App\\Building', '13', 'XQlDpraY', NULL, NULL, '2020-08-20 02:07:54', '2020-08-20 02:07:54', 141),
('App\\Building', '13', '988K9CEt', 'instrument-image', '2020-08-20 02:09:10', '2020-08-20 02:08:28', '2020-08-20 02:09:10', 142),
('App\\Building', '13', 'ApU5mKPp', 'license-image', '2020-08-20 02:09:10', '2020-08-20 02:08:28', '2020-08-20 02:09:10', 143),
('App\\Building', '13', '90vSnUqR', NULL, NULL, '2020-08-20 02:08:28', '2020-08-20 02:08:28', 144),
('App\\Building', '13', 'dhi83qqy', 'instrument-image', '2020-08-20 02:09:27', '2020-08-20 02:09:10', '2020-08-20 02:09:27', 145),
('App\\Building', '13', 'RBvpzX6Z', 'license-image', '2020-08-20 02:09:27', '2020-08-20 02:09:10', '2020-08-20 02:09:27', 146),
('App\\Building', '13', 'g7WQi3Hw', NULL, NULL, '2020-08-20 02:09:10', '2020-08-20 02:09:10', 147),
('App\\Building', '13', 'sCEjWssY', 'instrument-image', '2020-08-20 02:12:37', '2020-08-20 02:09:27', '2020-08-20 02:12:37', 148),
('App\\Building', '13', 'uhAMftcn', 'license-image', '2020-08-20 02:12:37', '2020-08-20 02:09:27', '2020-08-20 02:12:37', 149),
('App\\Building', '13', 'sIEmLEV9', NULL, NULL, '2020-08-20 02:09:27', '2020-08-20 02:09:27', 150),
('App\\Building', '13', 'QtB9TwUM', 'instrument-image', '2020-08-20 02:13:05', '2020-08-20 02:12:37', '2020-08-20 02:13:05', 160),
('App\\Building', '13', '3bmyRuXA', 'license-image', '2020-08-20 02:13:05', '2020-08-20 02:12:37', '2020-08-20 02:13:05', 161),
('App\\Building', '13', 'LKXFnKB8', NULL, NULL, '2020-08-20 02:12:37', '2020-08-20 02:12:37', 162),
('App\\Building', '13', 'H2cjWelg', 'instrument-image', '2020-08-20 02:13:21', '2020-08-20 02:13:05', '2020-08-20 02:13:21', 163),
('App\\Building', '13', 'xvBnXfjt', 'license-image', '2020-08-20 02:13:21', '2020-08-20 02:13:05', '2020-08-20 02:13:21', 164),
('App\\Building', '13', 'naFNEXWZ', NULL, NULL, '2020-08-20 02:13:05', '2020-08-20 02:13:05', 165),
('App\\Building', '13', 'xxPzYkTo', 'instrument-image', NULL, '2020-08-20 02:13:21', '2020-08-20 02:13:21', 166),
('App\\Building', '13', 'kgagCVxQ', 'license-image', NULL, '2020-08-20 02:13:21', '2020-08-20 02:13:21', 167),
('App\\Building', '13', 'GcStaCue', NULL, NULL, '2020-08-20 02:13:21', '2020-08-20 02:13:21', 168),
('App\\Apartment', '14', 'Xtz5rn4s', NULL, '2020-08-20 17:21:44', '2020-08-20 02:20:17', '2020-08-20 17:21:44', 169),
('App\\Apartment', '15', 'zV6xJtZo', NULL, '2020-08-20 02:23:39', '2020-08-20 02:23:12', '2020-08-20 02:23:39', 170),
('App\\Apartment', '15', 'tjABOTje.png', NULL, '2020-08-20 02:24:04', '2020-08-20 02:23:39', '2020-08-20 02:24:04', 171),
('App\\Apartment', '15', '3INljAE2.png', NULL, '2020-08-20 02:24:41', '2020-08-20 02:24:04', '2020-08-20 02:24:41', 172),
('App\\Apartment', '15', 'AEJCubJU.png', NULL, NULL, '2020-08-20 02:24:41', '2020-08-20 02:24:41', 173),
('App\\Apartment', '15', '5Jx5NaV6.png', NULL, NULL, '2020-08-20 02:24:41', '2020-08-20 02:24:41', 174),
('App\\Apartment', '15', '0JbwM2Nn.png', NULL, NULL, '2020-08-20 02:24:41', '2020-08-20 02:24:41', 175),
('App\\Apartment', '16', 'I9wLf4ut', NULL, NULL, '2020-08-20 02:25:53', '2020-08-20 02:25:53', 176),
('App\\Land', '17', 'eZ40rA8x', NULL, '2020-08-20 02:46:03', '2020-08-20 02:42:18', '2020-08-20 02:46:03', 177),
('App\\Land', '17', 'lNcvZtSx.png', NULL, NULL, '2020-08-20 02:46:03', '2020-08-20 02:46:03', 178),
('App\\Land', '17', 'aRmnVeRY.png', NULL, NULL, '2020-08-20 02:46:03', '2020-08-20 02:46:03', 179),
('App\\Land', '17', 'RNA2t773.png', NULL, NULL, '2020-08-20 02:46:03', '2020-08-20 02:46:03', 180),
('App\\Apartment', '14', 'pdTwl55q.jpg', NULL, NULL, '2020-08-20 17:21:44', '2020-08-20 17:21:44', 181),
('App\\Shop', '18', 'hBg3F6D6.jpg', NULL, NULL, '2020-08-20 17:44:29', '2020-08-20 17:44:29', 182),
('App\\Shop', '19', 'cFSPtklL', NULL, '2020-08-22 15:43:11', '2020-08-22 15:42:20', '2020-08-22 15:43:11', 183),
('App\\Shop', '20', '0WP336GD.jpg', NULL, '2020-08-22 15:48:28', '2020-08-22 15:47:49', '2020-08-22 15:48:28', 184),
('App\\MaintenanceOrder', '0', 'mCWSHmvN', 'MaintenanceOrder-image', NULL, '2020-08-23 18:03:43', '2020-08-23 18:03:43', 185),
('App\\MaintenanceOrder', '0', 'JzItJ37H', 'MaintenanceOrder-image', NULL, '2020-08-23 18:27:09', '2020-08-23 18:27:09', 186),
('App\\MaintenanceOrder', '0', 'SxXnaqhI', 'MaintenanceOrder-image', NULL, '2020-08-23 19:14:37', '2020-08-23 19:14:37', 187),
('App\\MaintenanceOrder', '0', 'IWkIfSzd.png', 'MaintenanceOrder-image', NULL, '2020-08-23 19:14:45', '2020-08-23 19:14:45', 188),
('App\\MaintenanceOrder', '0', 'iOUEWgXN.png', 'MaintenanceOrder-image', NULL, '2020-08-23 19:20:02', '2020-08-23 19:20:02', 189),
('App\\Building', '21', 'RrVI9cPE.jpg', 'instrument-image', '2020-08-25 20:34:16', '2020-08-25 20:33:46', '2020-08-25 20:34:16', 190),
('App\\Building', '21', 'a43bKA75.jpg', 'license-image', '2020-08-25 20:34:16', '2020-08-25 20:33:46', '2020-08-25 20:34:16', 191),
('App\\Building', '21', 'i3pGnrA2', NULL, NULL, '2020-08-25 20:33:46', '2020-08-25 20:33:46', 192),
('App\\Building', '21', '70cg4mTh.jpg', 'instrument-image', '2020-08-25 20:43:06', '2020-08-25 20:34:16', '2020-08-25 20:43:06', 193),
('App\\Building', '21', 'z2QAYs3H', 'license-image', '2020-08-25 20:43:06', '2020-08-25 20:34:16', '2020-08-25 20:43:06', 194),
('App\\Building', '21', 'NaZMnKV5', NULL, NULL, '2020-08-25 20:34:16', '2020-08-25 20:34:16', 195),
('App\\Building', '21', 'NQQFKPTP', 'instrument-image', NULL, '2020-08-25 20:43:06', '2020-08-25 20:43:06', 196),
('App\\Building', '21', 'Q7mdIDDk', 'license-image', NULL, '2020-08-25 20:43:06', '2020-08-25 20:43:06', 197),
('App\\Building', '21', 'd8xkciRI.jpg', NULL, NULL, '2020-08-25 20:43:06', '2020-08-25 20:43:06', 198),
('App\\Building', '21', 'uD4ow2St.jpg', NULL, NULL, '2020-08-25 20:43:06', '2020-08-25 20:43:06', 199),
('App\\Building', '21', '1RR6kPlk.jpg', NULL, NULL, '2020-08-25 20:43:06', '2020-08-25 20:43:06', 200),
('App\\Building', '22', 'RLtqbkwy.jpg', 'instrument-image', NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 201),
('App\\Building', '22', 'TnATARyu.jpg', 'license-image', NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 202),
('App\\Building', '22', 'GmgJv9Xr.jpg', NULL, NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 203),
('App\\Building', '22', 'ppo3HQKg.jpg', NULL, NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 204),
('App\\Building', '22', 'YDbE9Rch.jpg', NULL, NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 205),
('App\\Building', '22', '3mfZ2Mev.jpg', NULL, NULL, '2020-08-25 21:11:28', '2020-08-25 21:11:28', 206),
('App\\Building', '23', 'Lra9J6bX.jpg', 'instrument-image', '2020-08-25 21:31:57', '2020-08-25 21:26:51', '2020-08-25 21:31:57', 207),
('App\\Building', '23', 'qbminCfs.jpg', 'license-image', '2020-08-25 21:31:57', '2020-08-25 21:26:51', '2020-08-25 21:31:57', 208),
('App\\Building', '23', 'kA79AdpH', NULL, NULL, '2020-08-25 21:26:51', '2020-08-25 21:26:51', 209),
('App\\Building', '23', '07CMvJ0P', 'instrument-image', NULL, '2020-08-25 21:31:57', '2020-08-25 21:31:57', 210),
('App\\Building', '23', 'ytQHVC64', 'license-image', NULL, '2020-08-25 21:31:57', '2020-08-25 21:31:57', 211),
('App\\Building', '24', '3o6maHCB.jpg', 'instrument-image', NULL, '2020-08-25 21:38:16', '2020-08-25 21:38:16', 212),
('App\\Building', '24', '1DPxazCm.jpg', 'license-image', NULL, '2020-08-25 21:38:16', '2020-08-25 21:38:16', 213),
('App\\Building', '25', 'FSBorX5y.png', 'instrument-image', '2020-08-26 01:02:05', '2020-08-26 01:01:45', '2020-08-26 01:02:05', 214),
('App\\Building', '25', 'Wr3YTFU5.png', 'license-image', '2020-08-26 01:02:05', '2020-08-26 01:01:45', '2020-08-26 01:02:05', 215),
('App\\Building', '25', 'LFh4yKxH', 'instrument-image', NULL, '2020-08-26 01:02:05', '2020-08-26 01:02:05', 216),
('App\\Building', '25', 'DQ9hXvSk', 'license-image', NULL, '2020-08-26 01:02:05', '2020-08-26 01:02:05', 217),
('App\\Building', '9', 'Nt1wsFpU', 'instrument-image', '2020-08-26 01:32:28', '2020-08-26 01:10:03', '2020-08-26 01:32:28', 218),
('App\\Building', '9', 'PJqAfMlI', 'license-image', '2020-08-26 01:32:28', '2020-08-26 01:10:03', '2020-08-26 01:32:28', 219),
('App\\Building', '9', 'u7W3bFrx', 'instrument-image', '2020-08-26 01:32:52', '2020-08-26 01:32:28', '2020-08-26 01:32:52', 220),
('App\\Building', '9', 'yi1BC6FM', 'license-image', '2020-08-26 01:32:52', '2020-08-26 01:32:28', '2020-08-26 01:32:52', 221),
('App\\Building', '9', 'muwLkR1w', 'instrument-image', '2020-08-26 01:33:04', '2020-08-26 01:32:52', '2020-08-26 01:33:04', 222),
('App\\Building', '9', '8YjYVmc5', 'license-image', '2020-08-26 01:33:04', '2020-08-26 01:32:52', '2020-08-26 01:33:04', 223),
('App\\Building', '9', '91OnEQ7g', 'instrument-image', '2020-08-26 01:33:44', '2020-08-26 01:33:04', '2020-08-26 01:33:44', 224),
('App\\Building', '9', 'AIfUhCMy', 'license-image', '2020-08-26 01:33:44', '2020-08-26 01:33:04', '2020-08-26 01:33:44', 225),
('App\\Building', '9', '0EGyX2aR', 'instrument-image', NULL, '2020-08-26 01:33:44', '2020-08-26 01:33:44', 226),
('App\\Building', '9', 'g6Kz6zW3', 'license-image', NULL, '2020-08-26 01:33:44', '2020-08-26 01:33:44', 227),
('App\\Building', '26', 'jsbPfGfu.jpg', 'instrument-image', NULL, '2020-08-26 02:13:22', '2020-08-26 02:13:22', 228),
('App\\Building', '26', '0NOxgQ2Z.jpg', 'license-image', NULL, '2020-08-26 02:13:22', '2020-08-26 02:13:22', 229),
('App\\Building', '27', '7hr65Lhc.jpg', 'instrument-image', '2020-08-26 02:19:04', '2020-08-26 02:17:43', '2020-08-26 02:19:04', 230),
('App\\Building', '27', 'bRntX1yS.jpg', 'license-image', '2020-08-26 02:19:04', '2020-08-26 02:17:43', '2020-08-26 02:19:04', 231),
('App\\Building', '27', 'FI6mIka5.jpg', NULL, NULL, '2020-08-26 02:17:43', '2020-08-26 02:17:43', 232),
('App\\Building', '27', 'w1hBTpBF', 'instrument-image', NULL, '2020-08-26 02:19:04', '2020-08-26 02:19:04', 233),
('App\\Building', '27', '3yreRCeC', 'license-image', NULL, '2020-08-26 02:19:04', '2020-08-26 02:19:04', 234),
('App\\Shop', '28', 'ri75yHcy.jpg', NULL, NULL, '2020-08-26 02:34:02', '2020-08-26 02:34:02', 235),
('App\\Apartment', '29', 'JQxuDpQL.jpg', NULL, NULL, '2020-08-26 02:43:38', '2020-08-26 02:43:38', 236),
('App\\Shop', '30', 'VO4DTgmb.png', NULL, NULL, '2020-08-26 02:53:01', '2020-08-26 02:53:01', 237),
('App\\Shop', '31', 'zlZphAju.jpg', NULL, NULL, '2020-08-26 02:56:09', '2020-08-26 02:56:09', 238),
('App\\Shop', '33', 'YK1e29eQ.jpg', NULL, NULL, '2020-08-26 03:01:57', '2020-08-26 03:01:57', 239),
('App\\Shop', '36', 'vqBlJHOY.jpg', NULL, NULL, '2020-08-26 03:21:14', '2020-08-26 03:21:14', 240),
('App\\Land', '37', 'BTLk0LVk.png', NULL, NULL, '2020-08-26 03:21:23', '2020-08-26 03:21:23', 241),
('App\\Apartment', '38', 'PB2vy8I8.jpg', NULL, NULL, '2020-08-26 03:50:54', '2020-08-26 03:50:54', 242),
('App\\Apartment', '39', 'Kk3ocvsf.jpg', NULL, NULL, '2020-08-26 03:51:41', '2020-08-26 03:51:41', 243),
('App\\Apartment', '40', 'EycvFY2g.jpg', NULL, NULL, '2020-08-26 03:51:56', '2020-08-26 03:51:56', 244),
('App\\Apartment', '41', 'smQBp5Dh.jpg', NULL, NULL, '2020-08-26 03:52:20', '2020-08-26 03:52:20', 245),
('App\\Apartment', '42', 'lRWDXKTh.jpg', NULL, NULL, '2020-08-26 03:52:28', '2020-08-26 03:52:28', 246),
('App\\Apartment', '43', 'RnrUDpfz.jpg', NULL, NULL, '2020-08-26 03:52:36', '2020-08-26 03:52:36', 247),
('App\\Apartment', '44', '5LPyyOct.jpg', NULL, NULL, '2020-08-26 03:52:43', '2020-08-26 03:52:43', 248),
('App\\Apartment', '45', 'pleU6bPZ.jpg', NULL, NULL, '2020-08-26 03:52:51', '2020-08-26 03:52:51', 249),
('App\\Apartment', '46', 'LeFEDUBH.jpg', NULL, NULL, '2020-08-26 03:52:59', '2020-08-26 03:52:59', 250),
('App\\Apartment', '47', 'JIqwsxhJ.jpg', NULL, NULL, '2020-08-26 03:53:06', '2020-08-26 03:53:06', 251),
('App\\Apartment', '48', 'aY0OAGYl.jpg', NULL, NULL, '2020-08-26 03:53:14', '2020-08-26 03:53:14', 252),
('App\\Apartment', '49', 'eUpJk0PN.jpg', NULL, NULL, '2020-08-26 03:53:22', '2020-08-26 03:53:22', 253),
('App\\Apartment', '50', 'XlZGoaMT.jpg', NULL, NULL, '2020-08-26 03:53:30', '2020-08-26 03:53:30', 254),
('App\\Apartment', '51', 'T7HiDlXY.png', NULL, NULL, '2020-08-26 03:56:24', '2020-08-26 03:56:24', 255),
('App\\Apartment', '52', '7Vvvc1Kl.jpg', NULL, NULL, '2020-08-26 04:10:41', '2020-08-26 04:10:41', 256),
('App\\Apartment', '53', 'AL1duqiQ.jpg', NULL, NULL, '2020-08-26 04:11:27', '2020-08-26 04:11:27', 257),
('App\\Apartment', '54', '4pyTM7cR.jpg', NULL, NULL, '2020-08-26 04:11:42', '2020-08-26 04:11:42', 258),
('App\\Apartment', '55', 'xGOUouwd.jpg', NULL, NULL, '2020-08-26 04:12:05', '2020-08-26 04:12:05', 259),
('App\\Apartment', '56', 'NZIHPjD9.jpg', NULL, NULL, '2020-08-26 04:12:13', '2020-08-26 04:12:13', 260),
('App\\Apartment', '57', 'UlvTFznv.jpg', NULL, NULL, '2020-08-26 04:12:21', '2020-08-26 04:12:21', 261),
('App\\Apartment', '58', 'a5wp5Blc.jpg', NULL, NULL, '2020-08-26 04:12:29', '2020-08-26 04:12:29', 262),
('App\\Apartment', '59', 'HyM45PX4.jpg', NULL, NULL, '2020-08-26 04:12:37', '2020-08-26 04:12:37', 263),
('App\\Apartment', '60', 'WiqDAXLB.jpg', NULL, NULL, '2020-08-26 04:12:45', '2020-08-26 04:12:45', 264),
('App\\Apartment', '61', 'nQSd10Py.jpg', NULL, NULL, '2020-08-26 04:12:54', '2020-08-26 04:12:54', 265),
('App\\Apartment', '62', 'Lg5tP8O8.jpg', NULL, NULL, '2020-08-26 04:13:01', '2020-08-26 04:13:01', 266),
('App\\Apartment', '63', 'VCIfdCgD.jpg', NULL, NULL, '2020-08-26 04:13:09', '2020-08-26 04:13:09', 267),
('App\\Apartment', '64', 'StT35Mvh.jpg', NULL, NULL, '2020-08-26 04:13:17', '2020-08-26 04:13:17', 268);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_replay` tinyint(1) NOT NULL DEFAULT 0,
  `commit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `mobile`, `name`, `inquiry`, `status_replay`, `commit`, `created_at`, `updated_at`) VALUES
(1, '0100973949', 'esalm elshenawy', 'السلام عليكم ورحمة الله وبركاته', 0, NULL, '2020-08-10 18:20:09', '2020-08-10 18:20:09'),
(2, '+1 (466) 457-1895', 'Bruce Briggs', 'Rerum qui sint eveni', 0, NULL, '2020-08-20 14:59:24', '2020-08-20 14:59:24'),
(3, '+1 (177) 736-7842', 'Calista Wilcox', 'Tempor non quisquam', 0, NULL, '2020-08-20 16:36:11', '2020-08-20 16:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `paymentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type` enum('cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit',
  `payment_mode` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remaining_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `order_at` datetime DEFAULT NULL,
  `paid_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `account_id`, `tenant_id`, `paymentable_type`, `paymentable_id`, `order_number`, `invoice_code`, `notes`, `document_type`, `payment_mode`, `amount`, `paid_amount`, `remaining_amount`, `group_id`, `order_at`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, 84, 1, NULL, 32, '1', NULL, 'fghjuiolkjhgbjhjf', 'credit', NULL, '50000.00', '0.00', '0.00', 1, '2020-08-18 00:00:00', NULL, '2020-08-18 17:18:20', '2020-08-18 17:18:20'),
(2, 22, 12, NULL, 32, '2', NULL, 'يبسيبيسبسيبيس', 'credit', NULL, '1000.00', '0.00', '0.00', 1, '2020-08-25 00:00:00', NULL, '2020-08-24 21:11:21', '2020-08-24 21:41:05'),
(3, 30, 14, NULL, 32, '3', NULL, NULL, 'credit', NULL, '1000.00', '0.00', '0.00', 1, '2020-08-25 00:00:00', NULL, '2020-08-24 21:32:16', '2020-08-24 21:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_price` decimal(15,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `service_name`, `service_price`, `description`, `group_id`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'jhkhdfgfghbtgffv', '1000.00', '', 1, '2020-08-18 17:18:20', '2020-08-24 21:36:54'),
(NULL, 2, 'بيسبيسبس', '1000.00', '', 1, '2020-08-24 21:11:21', '2020-08-24 21:36:54'),
(NULL, 3, 'vcxvcxvcxvcx', '1000.00', '', 1, '2020-08-24 21:32:16', '2020-08-24 21:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journalable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journalable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_idAttributable` int(11) DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_at` date DEFAULT NULL,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `journalable_type`, `journalable_id`, `account_idAttributable`, `number`, `debit`, `credit`, `details`, `date_at`, `group_id`, `created_at`, `updated_at`) VALUES
(9, 'Modules\\Accounting\\Entities\\Journal', 32, NULL, '1', '50000.00', '0.00', 'ytgjhgf', '2020-08-18', 1, '2020-08-18 17:18:20', '2020-08-18 17:18:20'),
(13, 'Modules\\Accounting\\Entities\\Journal', 74, NULL, '1', '5000.00', '0.00', '1', '2020-08-18', 1, '2020-08-18 17:30:06', '2020-08-18 17:30:06'),
(14, 'Modules\\Accounting\\Entities\\Journal', 21, NULL, '1', '0.00', '5000.00', '1', '2020-08-18', 1, '2020-08-18 17:30:06', '2020-08-18 17:30:06'),
(15, 'Modules\\Accounting\\Entities\\Journal', 44, NULL, '7', '0.00', '0.00', 'POPIUY', '2020-08-18', 1, '2020-08-18 17:36:27', '2020-08-18 17:36:27'),
(16, 'Modules\\Accounting\\Entities\\Journal', 43, NULL, '8', '1000.00', '0.00', 'HGFDFG', '2020-08-18', 1, '2020-08-18 17:41:51', '2020-08-18 17:41:51'),
(17, 'Modules\\Accounting\\Entities\\Journal', 55, NULL, '9', '0.00', '1000.00', 'HGFDFG', '2020-08-18', 1, '2020-08-18 17:41:51', '2020-08-18 17:41:51'),
(18, 'Modules\\Accounting\\Entities\\Journal', 44, NULL, '10', '0.00', '0.00', 'ليبليبليبلي', '2020-08-19', 1, '2020-08-18 18:03:26', '2020-08-18 18:03:26'),
(27, 'Modules\\Accounting\\Entities\\Journal', 26, NULL, '4', '544545.00', '0.00', 'bcvbcvbcvb', '2020-08-19', 1, '2020-08-18 18:50:49', '2020-08-18 18:50:49'),
(28, 'Modules\\Accounting\\Entities\\Journal', 44, NULL, '4', '0.00', '544545.00', 'bcvbcvbcvb', '2020-08-19', 1, '2020-08-18 18:50:49', '2020-08-18 18:50:49'),
(29, 'Modules\\Accounting\\Entities\\Journal', 32, NULL, '12', '0.00', '0.00', 'بيسبيسبيسبيسب', '2020-08-25', 1, '2020-08-24 21:11:21', '2020-08-24 21:11:21'),
(30, 'Modules\\Accounting\\Entities\\Journal', 22, NULL, '13', '0.00', '0.00', 'بيسبيسبيسبيسب', '2020-08-25', 1, '2020-08-24 21:11:21', '2020-08-24 21:11:21'),
(31, 'Modules\\Accounting\\Entities\\Journal', 32, NULL, '14', '1000.00', '0.00', NULL, '2020-08-25', 1, '2020-08-24 21:32:16', '2020-08-24 21:32:16'),
(32, 'Modules\\Accounting\\Entities\\Journal', 30, NULL, '15', '0.00', '1000.00', NULL, '2020-08-25', 1, '2020-08-24 21:32:16', '2020-08-24 21:32:16'),
(33, 'Modules\\Accounting\\Entities\\Journal', 32, NULL, '16', '1000.00', '0.00', NULL, '2020-08-25', 1, '2020-08-24 21:36:54', '2020-08-24 21:36:54'),
(34, 'Modules\\Accounting\\Entities\\Journal', 22, NULL, '17', '0.00', '1000.00', NULL, '2020-08-25', 1, '2020-08-24 21:36:54', '2020-08-24 21:36:54'),
(35, 'Modules\\Accounting\\Entities\\Journal', 32, NULL, '16', '1000.00', '0.00', NULL, '2020-08-25', 1, '2020-08-24 21:41:04', '2020-08-24 21:41:04'),
(36, 'Modules\\Accounting\\Entities\\Journal', 22, NULL, '17', '0.00', '1000.00', NULL, '2020-08-25', 1, '2020-08-24 21:41:04', '2020-08-24 21:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `journal_details`
--

CREATE TABLE `journal_details` (
  `journal_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `debit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `kidable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kidable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_of_date_at` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`kidable_type`, `kidable_id`, `name`, `identity_number`, `birth_of_date_at`, `gender`) VALUES
('App\\Beneficiary', '4', 'ىىلبالبالبالبالبابلاب', '8987675656', '2013-08-19', 'male'),
('App\\Beneficiary', '8', 'Quyn Buckner', '381', '1995-08-02', 'female'),
('App\\Beneficiary', '9', 'Richard Rodgers', '350', '1988-12-03', 'female'),
('App\\Beneficiary', '13', 'Riley Holden', '284', '2015-07-12', 'female'),
('App\\Beneficiary', '13', 'ضضضض', '32323', '2020-02-20', 'male'),
('App\\Beneficiary', '12', 'Belle Eaton', '919', '1983-12-01', 'male'),
('App\\Beneficiary', '12', 'asd', '233343', '2025-12-20', 'female'),
('App\\Beneficiary', '23', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '23', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '27', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '36', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '44', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '52', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '62', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '71', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '79', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '88', '29Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', 'm', '11233', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '1Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '2Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '3Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '4Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '5Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '6Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '7Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '8Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '9Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '10Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '11Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '12Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '13Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '14Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '15Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '16Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '17Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '18Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '19Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '20Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '21Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '22Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '23Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '24Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '25Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '26Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '27Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '28Ali', '232323232', '2020-01-17', 'male'),
('App\\Beneficiary', '98', '29Ali', '232323232', '2020-01-17', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `accepted` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_orders`
--

CREATE TABLE `maintenance_orders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartmentId` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_at` datetime DEFAULT NULL,
  `ended_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_orders`
--

INSERT INTO `maintenance_orders` (`id`, `order_number`, `apartmentId`, `agency_id`, `tenant_id`, `estate_id`, `city_id`, `amount`, `is_accepted`, `is_done`, `description`, `available_at`, `ended_at`, `created_at`, `updated_at`) VALUES
('3b910819-6966-47c8-968e-12906d813c60', 'z8wgRCUH', 'كهرباء', 4, 3, 9, 5, '0.00', 0, 0, 'كهربائ بايظه خالص جدا', '2020-08-28 15:14:00', NULL, '2020-08-23 19:14:45', '2020-08-23 19:16:59'),
('3c3cf3a2-6e65-49f9-94c6-35e5e1219245', 'mnPyIxif', 'كهرباء', 4, 3, 18, 4, '0.00', 0, 0, 'fematexug@mailinator.comfematexug@mailinator.comfematexug@mailinator.com', '2020-09-10 21:19:00', NULL, '2020-08-23 19:20:02', '2020-08-23 19:20:27'),
('450532a0-eab5-487e-a459-8d64ca5d3171', 'H3oRDE9l', 'كهرباء', 4, 3, 9, 5, '0.00', 0, 0, 'كهربائ بايظه خالص جدا', '2020-08-28 15:14:00', '2020-09-10 00:00:00', '2020-08-23 19:14:37', '2020-08-23 19:17:09'),
('5d8c57c7-ad41-474b-a674-b696ff609921', 'ASy3UzKy', 'كهرباء سباكة اعمال الرصف', 1, 1, 9, 1, '0.00', 1, 0, 'حنفيه مكسوره', '2020-08-18 15:02:00', '2020-09-01 00:00:00', '2020-08-10 19:03:10', '2020-08-23 23:29:13'),
('9c7a5853-a14d-4d07-bdfb-4a546373ab6c', 'na6AAQfx', 'كهرباء', 4, 3, 18, 3, '0.00', 0, 0, 'كهربا عطلانه', '2020-08-23 20:26:00', '2020-09-10 00:00:00', '2020-08-23 18:27:09', '2020-08-23 19:11:08'),
('b8068b9a-e904-48d2-ad10-97670825afd5', 'T9FVue31', 'اعمال التحميل والتنزيل', 2, 2, 10, 1, '0.00', 0, 0, 'ghjghjghjgh', '2020-08-16 16:46:00', NULL, '2020-08-16 20:47:05', '2020-08-16 20:47:05'),
('f23ee06e-5876-466b-9aef-b5b0899c9d20', '38SIdbDR', 'سباكة', 3, 3, 9, 1, '0.00', 0, 0, 'test', '1988-08-23 14:06:00', NULL, '2020-08-23 18:03:43', '2020-08-23 18:03:43');

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
(1, '2014_10_11_000000_create_cities_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_13_000000_create_beneficiaries_table', 1),
(5, '2014_10_15_000000_create_agencies_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_01_15_161332_administrators', 1),
(8, '2020_01_16_085217_create_permission_tables', 1),
(9, '2020_02_12_181637_create_banks_table', 1),
(10, '2020_02_12_183331_create_images_table', 1),
(11, '2020_02_15_071232_create_kids_table', 1),
(12, '2020_03_02_104358_create_documents_table', 1),
(13, '2020_03_02_213056_create_settings_table', 1),
(14, '2020_03_17_203150_create_groups_table', 1),
(15, '2020_03_17_203151_create_accounts_table', 1),
(16, '2020_03_17_203152_create_journals_table', 1),
(17, '2020_03_17_203153_create_journal_details_table', 1),
(18, '2020_03_17_210010_create_funds_table', 1),
(19, '2020_03_17_210637_create_accounting_banks_table', 1),
(20, '2020_03_18_103315_create_cheques_table', 1),
(21, '2020_03_18_103316_create_vouchers_table', 1),
(22, '2020_03_18_134833_create_invoices_table', 1),
(23, '2020_03_18_134834_create_invoice_details_table', 1),
(24, '2020_03_18_134834_create_transactions_table', 1),
(25, '2020_03_22_063920_create_tenant_balances_table', 1),
(26, '2020_03_22_063955_create_beneficiary_balances_table', 1),
(27, '2020_03_22_065830_create_fund_balances_table', 1),
(28, '2020_03_22_070112_create_bank_balances_table', 1),
(29, '2020_03_31_193229_create_rents_table', 1),
(30, '2020_03_31_200213_create_assets_table', 1),
(31, '2020_03_31_200403_create_loans_table', 1),
(32, '2020_04_02_113744_create_subscribers_table', 1),
(33, '2020_04_05_060848_create_estates_table', 1),
(34, '2020_04_05_060849_create_estate_orders_table', 1),
(35, '2020_04_05_060850_create_maintenance_orders_table', 1),
(36, '2020_04_08_180046_create_trashes_table', 1),
(37, '2020_04_13_184040_create_queries_table', 1),
(38, '2020_04_13_195307_create_templates_table', 1),
(39, '2020_04_13_210222_create_pages_table', 1),
(40, '2020_05_11_104332_create_alterbeneficiaries_table', 1),
(41, '2020_05_14_091607_create_AlertEstates_table', 1),
(42, '2020_05_18_110637_create_AlterImagesPages_table', 1),
(43, '2020_05_19_152345_create_GenerallSetting_table', 1),
(44, '2020_05_20_113851_create_ContactUs_table', 1),
(45, '2020_06_09_180649_create_AlertAccounting_table', 1),
(46, '2020_06_10_141019_create_Inquiry_table', 1),
(47, '2020_06_10_174236_create_AlerEstates_table', 1),
(48, '2020_06_16_114035_create_VocherOutUsers_table', 1),
(49, '2020_06_18_141641_create_Advance_table', 1),
(50, '2020_06_25_140847_create_agencies_balances_table', 1),
(51, '2020_06_29_121916_create_tenant_rents_table', 1),
(54, '2020_07_03_115156_create_orderBalance_table', 2),
(55, '2020_07_03_115745_create_orderInformation_table', 2),
(56, '2020_07_13_150212_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Modules\\Admin\\Entities\\Administrator', 1),
(1, 'Modules\\Admin\\Entities\\Administrator', 2),
(1, 'Modules\\Admin\\Entities\\Administrator', 8),
(1, 'Modules\\Admin\\Entities\\Administrator', 9),
(2, 'Modules\\Admin\\Entities\\Administrator', 4),
(2, 'Modules\\Admin\\Entities\\Administrator', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('05cdde2d-5a41-4edd-8238-5c555551c80d', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 87, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:13:55', '2020-08-24 17:13:55'),
('086efbaf-c3de-401c-b9c2-79c50c3a7818', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 95, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:30:07', '2020-08-25 15:30:07'),
('0c42250a-9a1f-4ea1-8afd-bcff5acf7bc1', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 104, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:32:07', '2020-08-25 15:32:07'),
('0f8478ca-9aa0-4892-9dc2-5e04720f7d82', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 63, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:09:00', '2020-08-24 14:09:00'),
('1019ebb1-d442-46b4-a562-1e67b3b45f96', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 92, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:15:10', '2020-08-24 17:15:10'),
('1115fd82-9b49-4917-8076-b2b7530d95e9', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 68, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:47:55', '2020-08-24 16:47:55'),
('1314d8a6-c703-48c4-bef7-fe40343955cc', 'App\\Notifications\\AdminNotification', 'App\\User', 27, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:48:16', '2020-08-25 17:48:16'),
('1637e161-6d85-4740-a51c-75c280f2274e', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 83, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:04:14', '2020-08-24 17:04:14'),
('184d5973-6247-4a33-86b9-6ddc36834882', 'App\\Notifications\\AdminNotification', 'App\\User', 29, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:48:37', '2020-08-25 17:48:37'),
('1a6c9d92-a962-479f-ad71-516a31d10d8a', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 88, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:14:23', '2020-08-24 17:14:23'),
('1ce5f0f8-0ec0-47f3-a151-b423f1c7fa80', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 65, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:09:22', '2020-08-24 14:09:22'),
('1d0e7346-d75b-4bf0-820f-184466700a23', 'App\\Notifications\\AdminNotification', 'App\\Agency', 36, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0648\\u0643\\u064a\\u0644 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 18:16:40', '2020-08-25 18:16:40'),
('27f39589-7134-4cdc-a6c6-05caddb26402', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 98, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:30:59', '2020-08-25 15:30:59'),
('29bbfb3a-76b5-4708-9077-0a8c13b2f104', 'App\\Notifications\\TenantNotification', 'App\\User', 1, '{\"message\":\"\\u062a\\u0645\\u062a \\u0627\\u0644\\u0645\\u0648\\u0627\\u0641\\u0642\\u0647 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0642\\u062f\\u0645 \\u0644\\u0644\\u0627\\u062f\\u0627\\u0631\\u0647 \\u0644\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0639\\u0642\\u0627\\u0631  \"}', NULL, '2020-08-26 09:26:17', '2020-08-26 09:26:17'),
('2a9c33fd-cfbe-4671-8bb5-ee1f14992142', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 89, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:14:35', '2020-08-24 17:14:35'),
('2ccdb974-09b6-44cf-a4bf-a88b46e2c7a6', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 90, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:14:46', '2020-08-24 17:14:46'),
('2ea60660-dadc-4190-96d5-1fc88a24751b', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 103, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:31:56', '2020-08-25 15:31:56'),
('317c4c7e-ce99-4a74-8a8e-3a4b8254392e', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 105, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:32:20', '2020-08-25 15:32:20'),
('33803483-f131-4a2e-950b-03d5acc93542', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 108, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:53:37', '2020-08-25 15:53:37'),
('33b34182-b90b-4998-82dc-caafa0b8e110', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 109, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:13:00', '2020-08-25 17:13:00'),
('39c1abaf-30fc-476c-be07-2b2dba834608', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 59, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:06:43', '2020-08-24 14:06:43'),
('3b3c2ba6-1401-40bc-bc3b-e47b8b8309f0', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 81, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:03:49', '2020-08-24 17:03:49'),
('4021719c-9b23-43ef-aa62-0d050def3e9d', 'App\\Notifications\\AdminNotification', 'App\\User', 30, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:48:47', '2020-08-25 17:48:47'),
('4075f5a4-3f3e-4de5-a951-b106cf0b4885', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 73, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:49:18', '2020-08-24 16:49:18'),
('415d1f5f-d1f6-47f3-a85b-8821bffd0eb4', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 75, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:49:42', '2020-08-24 16:49:42'),
('49010730-a378-4c58-987c-b1c89ef644b2', 'App\\Notifications\\AdminNotification', 'App\\User', 31, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:48:56', '2020-08-25 17:48:56'),
('4ee45746-21c1-446c-870f-10d1a5793181', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 110, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:13:47', '2020-08-25 17:13:47'),
('4f4d4fd5-b164-4852-b95f-460afc316fce', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 64, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:09:11', '2020-08-24 14:09:11'),
('52c0bf0c-1a64-4efa-bc50-e3293c93b854', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 85, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:13:31', '2020-08-24 17:13:31'),
('59268544-2083-4a3f-ba56-97305e6b39c9', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 101, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:31:33', '2020-08-25 15:31:33'),
('6fb13121-6261-4f4a-838d-981adb6ccf8e', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 94, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 14:46:20', '2020-08-25 14:46:20'),
('703722db-6f86-4149-bcfc-2e5ecbf9dfdf', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 71, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:48:54', '2020-08-24 16:48:54'),
('746cbe47-3c82-4903-8092-7fd6c5f35525', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 77, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:02:44', '2020-08-24 17:02:44'),
('76ac3e87-fbd5-4328-91ad-16f9e9eadf56', 'App\\Notifications\\AdminNotification', 'App\\User', 33, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:49:15', '2020-08-25 17:49:15'),
('7ec1bbdb-1224-4fc8-8343-1226925a6820', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 102, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:31:45', '2020-08-25 15:31:45'),
('80940018-927c-4cd3-b7d8-3dc655644f3f', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 61, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:08:17', '2020-08-24 14:08:17'),
('83c94c24-6be0-47d0-870c-f0fc458af958', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 60, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:08:05', '2020-08-24 14:08:05'),
('84f453e5-43e2-4f90-894f-f063874bf93f', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 99, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:31:09', '2020-08-25 15:31:09'),
('86758b2c-c284-4337-8c0a-580a1d13a034', 'App\\Notifications\\AdminNotification', 'App\\User', 34, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:49:25', '2020-08-25 17:49:25'),
('8acd62f1-4cff-4617-9dee-d7e4c9f8a63c', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 70, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:48:24', '2020-08-24 16:48:24'),
('8cf9e2e6-9fd6-4a16-b596-7198c2888920', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 72, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:49:06', '2020-08-24 16:49:06'),
('8d9d75d2-26d5-4d00-a70e-eb174f3064a3', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 80, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:03:37', '2020-08-24 17:03:37'),
('8e3a13b6-d582-4164-9041-27d87a774bc1', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 100, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:31:21', '2020-08-25 15:31:21'),
('95cb21e2-504d-4347-ba8e-13c8ab73c335', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 69, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:48:11', '2020-08-24 16:48:11'),
('963616ed-bf39-40b7-a6a4-dd5f3754c95f', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 86, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:13:43', '2020-08-24 17:13:43'),
('97b61dc5-497f-4f18-9b50-b6137385afb1', 'App\\Notifications\\AdminNotification', 'App\\Agency', 37, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0648\\u0643\\u064a\\u0644 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 18:19:17', '2020-08-25 18:19:17'),
('991b7cd8-b64a-4c17-8422-40874b55e36f', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 67, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:19:50', '2020-08-24 14:19:50'),
('9e881eaa-a98d-4620-8713-6c7ca4e42cb8', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 97, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:30:31', '2020-08-25 15:30:31'),
('a43e0ab4-99e1-4a67-9258-ec12160c622d', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 82, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:04:00', '2020-08-24 17:04:00'),
('aa9c4d1e-da10-4d14-afce-84749b5d36d7', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 96, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:30:19', '2020-08-25 15:30:19'),
('ab10447f-875c-4d4b-b482-e6781716b50a', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 76, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:02:31', '2020-08-24 17:02:31'),
('ab66a2dd-a5d7-4c80-b59f-c07efb4660ce', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 91, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:14:58', '2020-08-24 17:14:58'),
('adb92191-708c-4a81-9a50-37bf26e51afe', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 78, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:02:56', '2020-08-24 17:02:56'),
('af19b4f9-840f-4b70-abef-aded8249db05', 'App\\Notifications\\TenantNotification', 'App\\User', 1, '{\"message\":\"esalm elshenawy  \\u062a\\u0645\\u062a \\u0627\\u0644\\u0645\\u0648\\u0627\\u0641\\u0642\\u0647 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0642\\u062f\\u0645 \\u0644\\u0648\\u0643\\u064a\\u0644 \\u0627\\u0644\\u0635\\u064a\\u0627\\u0646\\u0629  \"}', NULL, '2020-08-23 23:29:04', '2020-08-23 23:29:04'),
('afe9c8ff-6f9c-4dbd-bd93-6437a269842e', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 66, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:09:33', '2020-08-24 14:09:33'),
('b5be874a-ccd6-4ad5-b9d2-acd8069c0ed3', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 79, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:03:25', '2020-08-24 17:03:25'),
('bb31a16b-53bc-48d1-b9e2-68af17f3eea3', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 74, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 16:49:29', '2020-08-24 16:49:29'),
('bc2efc0a-39df-44a6-82cb-92a8d0cfe740', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 107, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:32:47', '2020-08-25 15:32:47'),
('d734eec8-e77e-4d3f-b7bd-e04a2716ffd0', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 62, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 14:08:49', '2020-08-24 14:08:49'),
('d8395f44-bde3-470a-98a6-b14aa72cfb59', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 106, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 15:32:32', '2020-08-25 15:32:32'),
('e04f999d-9a64-490a-aac5-100085941e1f', 'App\\Notifications\\AdminNotification', 'App\\User', 32, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:49:05', '2020-08-25 17:49:05'),
('f20a27ab-cbf8-4740-81ec-f0bce370fdb4', 'App\\Notifications\\AdminNotification', 'App\\User', 28, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0627\\u062c\\u0631 \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-25 17:48:27', '2020-08-25 17:48:27'),
('fb3c62c1-3be7-4fa5-9930-85b4122aa2d2', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 93, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 18:23:56', '2020-08-24 18:23:56'),
('fcc992da-b792-4c39-9cce-6c413f89e648', 'App\\Notifications\\AdminNotification', 'App\\Beneficiary', 84, '{\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0645\\u0633\\u062a\\u0641\\u064a\\u062f \\u062c\\u062f\\u064a\\u062f \"}', NULL, '2020-08-24 17:05:41', '2020-08-24 17:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `orderbalance`
--

CREATE TABLE `orderbalance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `admin_commit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderbalance`
--

INSERT INTO `orderbalance` (`id`, `beneficiary_id`, `reason`, `is_accepted`, `admin_commit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'طلب الميزانيه', 1, NULL, '2020-08-20 15:43:49', '2020-08-20 15:45:58', NULL),
(2, 6, 'طلب الميزانيه', 0, NULL, '2020-08-20 15:43:50', '2020-08-20 15:43:50', NULL),
(3, 16, 'تنتنتنتانتانتانتانتانتانتانتانتانتانتانتانتانتلاتبلايليلي', 0, NULL, '2020-08-20 18:48:03', '2020-08-20 18:48:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderinformation`
--

CREATE TABLE `orderinformation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_commit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderinformation`
--

INSERT INTO `orderinformation` (`id`, `beneficiary_id`, `is_accepted`, `reason`, `admin_commit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 16, 0, 'gfhgfhgfhfhgfhhgf', NULL, '2020-08-20 18:29:07', '2020-08-20 18:29:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'about', 'about', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:56:07'),
(2, 'privacy', 'privacy', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:35:25'),
(3, 'Slider1', 'Slider1', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:35:25'),
(4, 'Slider2', 'Slider2', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:35:25'),
(5, 'Slider3', 'Slider3', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:35:25'),
(6, 'Slider4', 'Slider4', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 20:15:39'),
(7, 'terms', 'terms', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:35:25'),
(8, 'سيرة الشيخ محمد محمود الفاضل رحمة الله', 'سيرة الشيخ محمد محمود الفاضل رحمة الله', 'الشيخ / محمد محمود بن سيدي الأمين الفاضل الحاجي الشنقيطي .. رحمه الله . علم من أعلام المدينة النبوية ، بذل جاهه وماله في خدمة الناس ، عرف بالكرم وحسن الخلق وكثرة الصدقات', NULL, '2020-08-11 18:59:00'),
(9, 'الصور', 'الصور', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:56:07'),
(10, 'register', 'register', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:56:07'),
(11, 'login', 'login', 'الوقف هو مصطلح إسلامي، لغويا يعني الحبس أو المنع، واصطلاحاً هو \"حبس العين عن تمليكها لأحد من العباد والتصدق بالمنفعة على مصرف مباح\". ويشمل الوقف الأصول الثابتة كالعقارات والمزارع وغيرها، ويشمل الأصول المنقولة التي تبقى عينها بعد الاستفادة منها كالآلات الصناعية والأسلحة أما التي تذهب عينها بالاستفادة منها فتعتبر صدقة كالنقود والطعام وغيرها. ويختلف الوقف عن الصدقة في أن الصدقة ينتهي عطاؤها بانفاقها، أما الوقف فيستمر العين المحبوس في الانفاق في أوجه الخير حتى بعد الوفاة.\r\n\r\n', NULL, '2020-08-11 18:56:07');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create accounts', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(2, 'read accounts', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(3, 'update accounts', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(4, 'delete accounts', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(5, 'create accountings', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(6, 'read accountings', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(7, 'update accountings', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(8, 'delete accountings', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(9, 'create advances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(10, 'read advances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(11, 'update advances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(12, 'delete advances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(13, 'create agenciesbalances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(14, 'read agenciesbalances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(15, 'update agenciesbalances', 'admin', '2020-07-12 17:07:24', '2020-07-12 17:07:24'),
(16, 'delete agenciesbalances', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(17, 'create agencies', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(18, 'read agencies', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(19, 'update agencies', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(20, 'delete agencies', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(21, 'create apartments', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(22, 'read apartments', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(23, 'update apartments', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(24, 'delete apartments', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(25, 'create bankbalances', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(26, 'read bankbalances', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(27, 'update bankbalances', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(28, 'delete bankbalances', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(29, 'create beneficiaries', 'admin', '2020-07-12 17:07:25', '2020-07-12 17:07:25'),
(30, 'read beneficiaries', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(31, 'update beneficiaries', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(32, 'delete beneficiaries', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(33, 'create buildings', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(34, 'read buildings', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(35, 'update buildings', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(36, 'delete buildings', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(37, 'create cheques', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(38, 'read cheques', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(39, 'update cheques', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(40, 'delete cheques', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(41, 'create contactuss', 'admin', '2020-07-12 17:07:26', '2020-07-12 17:07:26'),
(42, 'read contactuss', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(43, 'update contactuss', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(44, 'delete contactuss', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(45, 'create customers', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(46, 'read customers', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(47, 'update customers', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(48, 'delete customers', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(49, 'create employees', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(50, 'read employees', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(51, 'update employees', 'admin', '2020-07-12 17:07:27', '2020-07-12 17:07:27'),
(52, 'delete employees', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(53, 'create estateorders', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(54, 'read estateorders', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(55, 'update estateorders', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(56, 'delete estateorders', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(57, 'create funds', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(58, 'read funds', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(59, 'update funds', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(60, 'delete funds', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(61, 'create fundbalances', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(62, 'read fundbalances', 'admin', '2020-07-12 17:07:28', '2020-07-12 17:07:28'),
(63, 'update fundbalances', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(64, 'delete fundbalances', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(65, 'create generallsettings', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(66, 'read generallsettings', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(67, 'update generallsettings', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(68, 'delete generallsettings', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(69, 'create groups', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(70, 'read groups', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(71, 'update groups', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(72, 'delete groups', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(73, 'create inquiries', 'admin', '2020-07-12 17:07:29', '2020-07-12 17:07:29'),
(74, 'read inquiries', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(75, 'update inquiries', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(76, 'delete inquiries', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(77, 'create invoices', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(78, 'read invoices', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(79, 'update invoices', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(80, 'delete invoices', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(81, 'create invoicedetails', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(82, 'read invoicedetails', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(83, 'update invoicedetails', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(84, 'delete invoicedetails', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(85, 'create journals', 'admin', '2020-07-12 17:07:30', '2020-07-12 17:07:30'),
(86, 'read journals', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(87, 'update journals', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(88, 'delete journals', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(89, 'create journaldetails', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(90, 'read journaldetails', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(91, 'update journaldetails', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(92, 'delete journaldetails', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(93, 'create lands', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(94, 'read lands', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(95, 'update lands', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(96, 'delete lands', 'admin', '2020-07-12 17:07:31', '2020-07-12 17:07:31'),
(97, 'create loans', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(98, 'read loans', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(99, 'update loans', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(100, 'delete loans', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(101, 'create maintenanceorders', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(102, 'read maintenanceorders', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(103, 'update maintenanceorders', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(104, 'delete maintenanceorders', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(105, 'create orderbalances', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(106, 'read orderbalances', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(107, 'update orderbalances', 'admin', '2020-07-12 17:07:32', '2020-07-12 17:07:32'),
(108, 'delete orderbalances', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(109, 'create orderinformations', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(110, 'read orderinformations', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(111, 'update orderinformations', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(112, 'delete orderinformations', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(113, 'create pages', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(114, 'read pages', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(115, 'update pages', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(116, 'delete pages', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(117, 'create queries', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(118, 'read queries', 'admin', '2020-07-12 17:07:33', '2020-07-12 17:07:33'),
(119, 'update queries', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(120, 'delete queries', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(121, 'create receivables', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(122, 'read receivables', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(123, 'update receivables', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(124, 'delete receivables', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(125, 'create rents', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(126, 'read rents', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(127, 'update rents', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(128, 'delete rents', 'admin', '2020-07-12 17:07:34', '2020-07-12 17:07:34'),
(129, 'create reports', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(130, 'read reports', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(131, 'update reports', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(132, 'delete reports', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(133, 'create settings', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(134, 'read settings', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(135, 'update settings', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(136, 'delete settings', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(137, 'create shops', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(138, 'read shops', 'admin', '2020-07-12 17:07:35', '2020-07-12 17:07:35'),
(139, 'update shops', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(140, 'delete shops', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(141, 'create suppliers', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(142, 'read suppliers', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(143, 'update suppliers', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(144, 'delete suppliers', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(145, 'create templates', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(146, 'read templates', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(147, 'update templates', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(148, 'delete templates', 'admin', '2020-07-12 17:07:36', '2020-07-12 17:07:36'),
(149, 'create tenants', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(150, 'read tenants', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(151, 'update tenants', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(152, 'delete tenants', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(153, 'create tenantrents', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(154, 'read tenantrents', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(155, 'update tenantrents', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(156, 'delete tenantrents', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(157, 'create transactions', 'admin', '2020-07-12 17:07:37', '2020-07-12 17:07:37'),
(158, 'read transactions', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(159, 'update transactions', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(160, 'delete transactions', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(161, 'create trashs', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(162, 'read trashs', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(163, 'update trashs', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(164, 'delete trashs', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(165, 'create users', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(166, 'read users', 'admin', '2020-07-12 17:07:38', '2020-07-12 17:07:38'),
(167, 'update users', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(168, 'delete users', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(169, 'create vocheroutuserss', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(170, 'read vocheroutuserss', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(171, 'update vocheroutuserss', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(172, 'delete vocheroutuserss', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(173, 'create vouchers', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(174, 'read vouchers', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(175, 'update vouchers', 'admin', '2020-07-12 17:07:39', '2020-07-12 17:07:39'),
(176, 'delete vouchers', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(177, 'create administrators', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(178, 'read administrators', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(179, 'update administrators', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(180, 'delete administrators', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(181, 'create subscribers', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(182, 'read subscribers', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(183, 'update subscribers', 'admin', '2020-07-12 17:07:40', '2020-07-12 17:07:40'),
(184, 'delete subscribers', 'admin', '2020-07-12 17:07:41', '2020-07-12 17:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estate_id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `estateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estateable_id` bigint(20) UNSIGNED NOT NULL,
  `rented_at` date NOT NULL,
  `ended_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'admin', '2020-07-12 17:01:47', '2020-07-12 17:01:47'),
(2, 'tester', 'admin', '2020-07-12 17:13:30', '2020-07-12 17:15:04'),
(3, 'ss', 'admin', '2020-08-20 19:12:24', '2020-08-20 19:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(13, 2),
(14, 2),
(17, 2),
(18, 2),
(45, 2),
(46, 2),
(121, 2),
(122, 2),
(129, 2),
(130, 2),
(173, 2),
(174, 2),
(177, 2),
(178, 2),
(181, 2),
(182, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('text','checkbox','radio','select') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(8, 'qycepyto@mailinator.com', '2020-08-20 18:39:56', '2020-08-20 18:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_balances`
--

CREATE TABLE `tenant_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `moveId` int(11) DEFAULT NULL,
  `invoiceNum` int(11) DEFAULT NULL,
  `debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_balances`
--

INSERT INTO `tenant_balances` (`id`, `tenant_id`, `moveId`, `invoiceNum`, `debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '50000.00', '25000.00', 'ytgjhgf', '2020-08-18 17:18:20', '2020-08-18 17:21:01'),
(2, 12, NULL, 2, '2000.00', '0.00', NULL, '2020-08-24 21:11:21', '2020-08-24 21:41:05'),
(3, 14, NULL, 3, '1000.00', '0.00', NULL, '2020-08-24 21:32:16', '2020-08-24 21:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_rents`
--

CREATE TABLE `tenant_rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_rents`
--

INSERT INTO `tenant_rents` (`id`, `tenant_id`, `estate_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2020-08-10 19:15:46', '2020-08-10 19:15:46'),
(2, 2, 10, '2020-08-16 20:54:21', '2020-08-16 20:54:21'),
(3, 1, 11, '2020-08-26 09:26:17', '2020-08-26 09:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `transactionable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attributable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `debit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trashes`
--

CREATE TABLE `trashes` (
  `trashable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trashable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trashes`
--

INSERT INTO `trashes` (`trashable_type`, `trashable_id`, `created_at`, `updated_at`) VALUES
('App\\Tenant', '3cc43eaf-7bb4-492e-ba0a-987790155314', '2020-08-03 20:19:40', '2020-08-03 20:19:40'),
('App\\Tenant', 'e2de4697-fc1d-4f4b-931a-6817103703d4', '2020-08-03 20:43:03', '2020-08-03 20:43:03'),
('App\\Beneficiary', 'b22e6237-a4a9-4c69-9499-3383273fbd1f', '2020-08-04 00:42:01', '2020-08-04 00:42:01'),
('App\\Beneficiary', 'f8a655cb-8bbc-4458-abec-1ba364e8f7a7', '2020-08-04 00:42:36', '2020-08-04 00:42:36'),
('App\\Beneficiary', 'e027f269-b20f-4004-b58a-fae45259724c', '2020-08-04 00:44:03', '2020-08-04 00:44:03'),
('App\\Beneficiary', '19324f40-d48a-48e2-a025-5e62bbbe83c2', '2020-08-04 00:44:16', '2020-08-04 00:44:16'),
('App\\Tenant', '3aad156c-88fc-4187-9e6b-88aba89667cb', '2020-08-05 23:35:41', '2020-08-05 23:35:41'),
('App\\Tenant', 'd8656c8f-ea23-4586-8d9d-5a2290723a59', '2020-08-05 23:35:53', '2020-08-05 23:35:53'),
('App\\Tenant', 'a793c25f-3947-4f37-907a-d6e801e4d9fb', '2020-08-05 23:36:05', '2020-08-05 23:36:05'),
('App\\Tenant', '24cc9e96-2e2b-4411-b942-9c2e5e9fa090', '2020-08-05 23:36:18', '2020-08-05 23:36:18'),
('App\\Tenant', 'c636edd6-c5ab-48d7-80e9-f3d1559b2e6a', '2020-08-05 23:36:31', '2020-08-05 23:36:31'),
('App\\Beneficiary', '69a719c3-e69a-4a41-ac89-67ec6a7682ed', '2020-08-05 23:50:53', '2020-08-05 23:50:53'),
('App\\Beneficiary', '1f33d8ed-d1a7-45b6-849d-158969af21a0', '2020-08-05 23:51:09', '2020-08-05 23:51:09'),
('App\\Beneficiary', '2c235269-8946-402b-a666-972b4a7c0198', '2020-08-05 23:51:28', '2020-08-05 23:51:28'),
('App\\Building', '3', '2020-08-08 15:14:03', '2020-08-08 15:14:03'),
('App\\Building', '1', '2020-08-08 15:14:14', '2020-08-08 15:14:14'),
('App\\Tenant', '854a808e-71cf-4af0-bf30-bf09a054e403', '2020-08-08 15:17:54', '2020-08-08 15:17:54'),
('App\\Agency', 'c27cbdc5-3176-41a2-86d3-42d27737bdbd', '2020-08-08 15:33:40', '2020-08-08 15:33:40'),
('App\\Tenant', '3aad156c-88fc-4187-9e6b-88aba89667cb', '2020-08-08 15:55:55', '2020-08-08 15:55:55'),
('App\\Tenant', 'd8656c8f-ea23-4586-8d9d-5a2290723a59', '2020-08-08 16:02:34', '2020-08-08 16:02:34'),
('App\\Tenant', 'c636edd6-c5ab-48d7-80e9-f3d1559b2e6a', '2020-08-08 16:02:48', '2020-08-08 16:02:48'),
('App\\Tenant', 'a793c25f-3947-4f37-907a-d6e801e4d9fb', '2020-08-08 16:46:57', '2020-08-08 16:46:57'),
('App\\Tenant', '3cc43eaf-7bb4-492e-ba0a-987790155314', '2020-08-08 16:52:46', '2020-08-08 16:52:46'),
('App\\Tenant', 'e2de4697-fc1d-4f4b-931a-6817103703d4', '2020-08-08 16:55:34', '2020-08-08 16:55:34'),
('App\\Tenant', '24cc9e96-2e2b-4411-b942-9c2e5e9fa090', '2020-08-08 17:38:51', '2020-08-08 17:38:51'),
('App\\Building', '3', '2020-08-08 17:55:16', '2020-08-08 17:55:16'),
('App\\Beneficiary', 'b22e6237-a4a9-4c69-9499-3383273fbd1f', '2020-08-08 18:18:08', '2020-08-08 18:18:08'),
('App\\Tenant', '3d1214b2-5cb0-41d0-adcc-f0cc19ef6445', '2020-08-09 18:40:23', '2020-08-09 18:40:23'),
('App\\Building', '1', '2020-08-10 17:11:54', '2020-08-10 17:11:54'),
('App\\Beneficiary', 'efb7d847-d78d-45f5-abcb-ee272961316b', '2020-08-19 21:56:45', '2020-08-19 21:56:45'),
('App\\Building', '13', '2020-08-20 02:13:35', '2020-08-20 02:13:35'),
('App\\Building', '12', '2020-08-20 18:29:06', '2020-08-20 18:29:06'),
('App\\Beneficiary', 'cdd368ef-ce8d-44e7-b09f-fe49f5bdf84e', '2020-08-23 00:36:49', '2020-08-23 00:36:49'),
('App\\Beneficiary', 'db6d387c-7141-429d-aa45-db2de507d543', '2020-08-23 00:41:58', '2020-08-23 00:41:58'),
('App\\Beneficiary', 'ef0e8407-ce99-4e8d-961b-1911e5591938', '2020-08-23 00:42:09', '2020-08-23 00:42:09'),
('App\\Beneficiary', '00fb06ab-8075-4ca4-ab4b-d34910c0e4cf', '2020-08-23 00:42:18', '2020-08-23 00:42:18'),
('App\\Beneficiary', '52722179-475d-45ec-af5f-605064429ee4', '2020-08-23 00:42:28', '2020-08-23 00:42:28'),
('App\\Beneficiary', '0c4a9a24-e0e3-4831-880b-e362c0488fb6', '2020-08-23 00:42:53', '2020-08-23 00:42:53'),
('App\\Beneficiary', 'e79f9fd1-a53a-4a0f-96f5-5799b172c707', '2020-08-23 00:43:04', '2020-08-23 00:43:04'),
('App\\Beneficiary', 'ac0f6702-5a73-47ea-a3e1-d822870cc675', '2020-08-23 00:43:13', '2020-08-23 00:43:13'),
('App\\Beneficiary', '21592940-7e19-4fd3-9063-ff0e1cb6353d', '2020-08-23 00:43:23', '2020-08-23 00:43:23'),
('App\\Beneficiary', '4563cfea-164a-4b5e-89b7-09ecf269c5db', '2020-08-23 00:43:33', '2020-08-23 00:43:33'),
('App\\Beneficiary', '6dd4b937-d65e-4ee2-b92c-a9384d707323', '2020-08-23 00:43:43', '2020-08-23 00:43:43'),
('App\\Beneficiary', '98df8498-e447-43a9-ac4d-38d0ed8fa011', '2020-08-23 00:43:52', '2020-08-23 00:43:52'),
('App\\Beneficiary', '6ef4eb9c-f09f-4d04-91ee-6338181b20c9', '2020-08-23 00:44:02', '2020-08-23 00:44:02'),
('App\\Beneficiary', '8dc5207b-4356-479f-b9b7-8cf1cc392580', '2020-08-23 00:44:16', '2020-08-23 00:44:16'),
('App\\Beneficiary', '175f1919-8632-4437-b87b-6f616f008017', '2020-08-23 00:44:27', '2020-08-23 00:44:27'),
('App\\Beneficiary', '01ba2055-039d-4d96-acff-0511ef7921a2', '2020-08-24 15:26:39', '2020-08-24 15:26:39'),
('App\\Beneficiary', '4a39ee94-724d-4646-b117-c164a1dfa51a', '2020-08-24 15:28:44', '2020-08-24 15:28:44'),
('App\\Beneficiary', '3fd98bfc-2c48-4bea-8269-65eb3c01644a', '2020-08-24 15:33:12', '2020-08-24 15:33:12'),
('App\\Beneficiary', '786e6bf2-8bef-4a3d-a5a2-9da30e1b5cf7', '2020-08-24 15:33:55', '2020-08-24 15:33:55'),
('App\\Beneficiary', '661b85c1-ad5d-431c-a399-f08137ebd281', '2020-08-24 15:34:10', '2020-08-24 15:34:10'),
('App\\Beneficiary', '44e3bb1a-ecc9-483c-924e-4ca781c0fbf1', '2020-08-24 15:35:02', '2020-08-24 15:35:02'),
('App\\Beneficiary', 'ae1f1052-d471-4abc-9ad5-4c6b252ec2b0', '2020-08-24 15:36:00', '2020-08-24 15:36:00'),
('App\\Beneficiary', '40475ec5-8b58-456c-83be-20d2ad25d4fa', '2020-08-24 15:39:15', '2020-08-24 15:39:15'),
('App\\Beneficiary', '0a60641f-48d7-4308-9225-be6303a025e4', '2020-08-24 15:39:21', '2020-08-24 15:39:21'),
('App\\Beneficiary', 'f27e6c8d-c8c0-49ed-86e0-1a0997e70e69', '2020-08-24 15:39:26', '2020-08-24 15:39:26'),
('App\\Beneficiary', 'c5331f2c-0dc5-4b62-b1ad-d4799073517f', '2020-08-24 15:41:48', '2020-08-24 15:41:48'),
('App\\Beneficiary', '4b8ac86b-9074-4d17-889c-a1f0cc1c50fb', '2020-08-24 15:43:30', '2020-08-24 15:43:30'),
('App\\Beneficiary', 'e585c170-cf14-4c77-bd94-6386dd2fa8b5', '2020-08-24 15:43:36', '2020-08-24 15:43:36'),
('App\\Beneficiary', 'd034589d-2d54-42af-8193-3b6d8c032a1d', '2020-08-24 15:43:41', '2020-08-24 15:43:41'),
('App\\Beneficiary', '27dbbf6e-4d4e-42de-8fc7-af24ee91e180', '2020-08-24 15:52:26', '2020-08-24 15:52:26'),
('App\\Beneficiary', '399e17d7-997c-41b2-8477-338d2e8705c9', '2020-08-24 15:54:01', '2020-08-24 15:54:01'),
('App\\Beneficiary', '97ec4a59-2e2e-411c-9c11-65c05ee6f239', '2020-08-24 15:56:38', '2020-08-24 15:56:38'),
('App\\Beneficiary', '44d4b065-c55c-473d-9e56-971866c7dd93', '2020-08-24 15:56:48', '2020-08-24 15:56:48'),
('App\\Beneficiary', '42c15880-fde3-40f1-aa11-c213eb72b3ab', '2020-08-24 15:57:26', '2020-08-24 15:57:26'),
('App\\Beneficiary', '299278d6-8136-4013-8d91-846ce2b1e882', '2020-08-24 15:59:18', '2020-08-24 15:59:18'),
('App\\Beneficiary', '8abd235b-a912-4630-a03e-663396cf067b', '2020-08-24 16:03:50', '2020-08-24 16:03:50'),
('App\\Beneficiary', '93b3ff2e-4537-47fa-96d3-e9c7277027dc', '2020-08-24 16:03:55', '2020-08-24 16:03:55'),
('App\\Beneficiary', '7ddfa3a8-d1ea-4c67-bb88-ab16ac2f7db7', '2020-08-24 16:04:01', '2020-08-24 16:04:01'),
('App\\Beneficiary', '91a5e7fe-66f3-4731-83ff-0251d2ee517f', '2020-08-24 16:07:48', '2020-08-24 16:07:48'),
('App\\Beneficiary', '4fd20db9-2169-4fd0-b2a7-2f2f38c7a741', '2020-08-24 16:07:54', '2020-08-24 16:07:54'),
('App\\Beneficiary', '6a1e0b6a-93c3-4235-9c6b-bd4711fccfe2', '2020-08-24 16:09:42', '2020-08-24 16:09:42'),
('App\\Beneficiary', 'a9744707-3f8e-4cbc-8f1a-c1a1838332f0', '2020-08-24 16:09:48', '2020-08-24 16:09:48'),
('App\\Beneficiary', 'b216d367-c232-4b14-b095-4218bcc2aadf', '2020-08-24 16:16:22', '2020-08-24 16:16:22'),
('App\\Beneficiary', '2becdfd4-f4ba-4447-9073-15bc7064f86b', '2020-08-24 16:16:27', '2020-08-24 16:16:27'),
('App\\Beneficiary', 'af751e58-1eae-4023-b40b-a42e5258cf2d', '2020-08-24 16:16:33', '2020-08-24 16:16:33'),
('App\\Beneficiary', '93ed320c-402b-4881-aabe-2198edea632e', '2020-08-24 16:16:39', '2020-08-24 16:16:39'),
('App\\Beneficiary', '74e1ab42-c559-4051-9eef-a518fd2e79d4', '2020-08-24 16:16:54', '2020-08-24 16:16:54'),
('App\\Beneficiary', 'c888e6f7-cca5-4022-97c9-6254a4ccc1d5', '2020-08-24 16:18:18', '2020-08-24 16:18:18'),
('App\\Beneficiary', '6ac4cc49-50c0-49cb-88ea-63f03560dbae', '2020-08-24 16:25:18', '2020-08-24 16:25:18'),
('App\\Beneficiary', 'c4da984b-3343-4728-9739-0bc8e5b1b2a8', '2020-08-24 16:25:23', '2020-08-24 16:25:23'),
('App\\Beneficiary', '0b763a88-380b-43a3-b70b-eea4c3476600', '2020-08-24 16:25:29', '2020-08-24 16:25:29'),
('App\\Beneficiary', '8396a10f-80a7-4316-9b2c-48dea5bfd68e', '2020-08-24 16:25:35', '2020-08-24 16:25:35'),
('App\\Beneficiary', '4893580a-fa1b-4b5d-911d-1a8e5846c8d3', '2020-08-24 16:38:13', '2020-08-24 16:38:13'),
('App\\Beneficiary', '5ce4efc0-fa0a-4776-8f0d-2d0d625d33eb', '2020-08-24 16:38:19', '2020-08-24 16:38:19'),
('App\\Beneficiary', '52b68ffd-e6b2-42fc-b539-ac7ed10cab79', '2020-08-24 16:38:25', '2020-08-24 16:38:25'),
('App\\Beneficiary', '4cef031d-f3ef-48d7-b245-62bbb42a013a', '2020-08-24 16:42:46', '2020-08-24 16:42:46'),
('App\\Beneficiary', '1e184aa4-190a-4eb0-8149-dbb2cf0148f0', '2020-08-24 16:53:12', '2020-08-24 16:53:12'),
('App\\Beneficiary', '68d5b6e3-8526-4cb1-96ce-efa637cf1706', '2020-08-24 16:53:18', '2020-08-24 16:53:18'),
('App\\Beneficiary', '717b7dd6-895c-42ab-85da-15b967763771', '2020-08-24 16:53:24', '2020-08-24 16:53:24'),
('App\\Beneficiary', '52c8a685-3975-40d4-a709-e1d9ddc69098', '2020-08-24 16:53:30', '2020-08-24 16:53:30'),
('App\\Beneficiary', 'd70750d7-73d6-469b-9c24-b8fc24d09992', '2020-08-24 17:01:01', '2020-08-24 17:01:01'),
('App\\Beneficiary', 'b30fdbeb-0d7d-4f1d-bfba-8bc916919cf8', '2020-08-24 17:01:10', '2020-08-24 17:01:10'),
('App\\Beneficiary', 'b4ef5d0d-f7b8-4aa7-9c2c-e9fc72719e43', '2020-08-24 17:01:19', '2020-08-24 17:01:19'),
('App\\Beneficiary', '5ed87699-f5d4-4686-be03-26bf53d1957c', '2020-08-24 17:01:40', '2020-08-24 17:01:40'),
('App\\Beneficiary', '1a95087f-16c3-4265-ab66-355918acbc1a', '2020-08-24 17:08:02', '2020-08-24 17:08:02'),
('App\\Beneficiary', '86f911d1-6a38-43ac-ba50-86a0183d96a3', '2020-08-24 17:08:08', '2020-08-24 17:08:08'),
('App\\Beneficiary', '51c58157-3f1b-4a7d-9359-c5b37abefd15', '2020-08-24 17:08:13', '2020-08-24 17:08:13'),
('App\\Beneficiary', 'bc482855-5962-41ab-96cb-6a1592795e07', '2020-08-24 17:08:19', '2020-08-24 17:08:19'),
('App\\Beneficiary', '9a095bce-6c8d-4934-9b6c-efd29eb17a65', '2020-08-24 17:08:25', '2020-08-24 17:08:25'),
('App\\Beneficiary', '14df0bdd-b22c-476c-88f0-40c344d369be', '2020-08-24 17:11:57', '2020-08-24 17:11:57'),
('App\\Beneficiary', 'ac8e0de2-ef06-4f75-8b6a-3914bc1d6724', '2020-08-24 17:12:11', '2020-08-24 17:12:11'),
('App\\Beneficiary', '8b0835fc-b4c5-436a-8b2a-6ed919f5a499', '2020-08-24 17:12:22', '2020-08-24 17:12:22'),
('App\\Beneficiary', 'f7c7cd73-b57f-4b08-910f-da2c4c7a25bb', '2020-08-24 17:12:31', '2020-08-24 17:12:31'),
('App\\Beneficiary', '38961b05-413b-444a-95cd-c49201cdabe6', '2020-08-24 17:17:03', '2020-08-24 17:17:03'),
('App\\Beneficiary', '3b1e94ac-de0a-436b-94e1-e13cad64af7d', '2020-08-24 17:17:09', '2020-08-24 17:17:09'),
('App\\Beneficiary', 'a8f04397-94cd-4974-90c9-6386bcf0f0a3', '2020-08-24 17:17:14', '2020-08-24 17:17:14'),
('App\\Beneficiary', '2c1d5b89-a11f-4a88-adfa-d94f5ed757f0', '2020-08-24 17:17:20', '2020-08-24 17:17:20'),
('App\\Beneficiary', '0c72716d-e0c0-46c9-aa66-8593e05af26e', '2020-08-24 17:25:11', '2020-08-24 17:25:11'),
('App\\Beneficiary', '02632c67-92f9-4432-9989-505b98779728', '2020-08-24 17:25:24', '2020-08-24 17:25:24'),
('App\\Beneficiary', '8df5c7dd-529b-44e3-aa14-5bcc9c37acbd', '2020-08-24 17:25:44', '2020-08-24 17:25:44'),
('App\\Beneficiary', '9f5c8a10-a6ff-4e95-9a34-d8ee84e08447', '2020-08-24 17:26:33', '2020-08-24 17:26:33'),
('App\\Beneficiary', '5b09f9a9-8d52-48b7-86a5-479b00b19668', '2020-08-25 14:21:13', '2020-08-25 14:21:13'),
('App\\Beneficiary', '33bf8c09-a248-417f-ac6c-d53c7943eb67', '2020-08-25 14:21:22', '2020-08-25 14:21:22'),
('App\\Tenant', 'abb71184-9bf8-46d9-b57f-a0a985fff78d', '2020-08-25 17:29:42', '2020-08-25 17:29:42'),
('App\\Tenant', '588627f7-3012-442a-90d7-c90540bda2a0', '2020-08-25 17:29:48', '2020-08-25 17:29:48'),
('App\\Tenant', '3d7a7cf1-fa40-4b2c-a0da-3818eab05f2e', '2020-08-25 17:29:54', '2020-08-25 17:29:54'),
('App\\Tenant', '35cc909e-3dff-4bcb-9191-57b399e962a9', '2020-08-25 17:30:00', '2020-08-25 17:30:00'),
('App\\Tenant', 'a812f39c-e90d-4da6-90a4-05579ebda627', '2020-08-25 17:30:05', '2020-08-25 17:30:05'),
('App\\Tenant', '899bb2f9-51d3-465b-9727-0f2671fd052a', '2020-08-25 17:30:11', '2020-08-25 17:30:11'),
('App\\Tenant', 'd9b97625-1754-4f34-8a96-e1ca2eef9471', '2020-08-25 17:42:13', '2020-08-25 17:42:13'),
('App\\Tenant', '7ca52362-3075-48a7-9595-6cae1cdf75b8', '2020-08-25 17:42:19', '2020-08-25 17:42:19'),
('App\\Tenant', '61908e42-8b92-4323-a2de-c22ad4e11c62', '2020-08-25 17:42:24', '2020-08-25 17:42:24'),
('App\\Tenant', '2d69b19b-5666-43e8-bfed-eef126005f43', '2020-08-25 17:42:30', '2020-08-25 17:42:30'),
('App\\Tenant', 'cab178b7-5248-4d8d-974d-270f61819710', '2020-08-25 17:42:36', '2020-08-25 17:42:36'),
('App\\Tenant', '2d10e2a0-733d-4054-8828-5d50f2670c10', '2020-08-25 17:42:42', '2020-08-25 17:42:42'),
('App\\Tenant', '125772ef-77b2-4871-a1f4-2a5d5d34e683', '2020-08-25 17:44:53', '2020-08-25 17:44:53'),
('App\\Tenant', '2d995b7b-0eb6-435d-88b6-d2caa33c32f3', '2020-08-25 17:44:59', '2020-08-25 17:44:59'),
('App\\Tenant', '3a96e2d3-cb14-4b98-bae3-f90a81f847aa', '2020-08-25 17:45:04', '2020-08-25 17:45:04'),
('App\\Tenant', '4eb00296-41f5-41ab-b841-e95c4cc5060e', '2020-08-25 17:45:10', '2020-08-25 17:45:10'),
('App\\Tenant', 'c23ef8ec-64f3-41a1-a179-8b19e30092d6', '2020-08-25 17:45:16', '2020-08-25 17:45:16'),
('App\\Tenant', 'dec8486c-e8b8-4e4e-9045-d3b1aa5c7cb5', '2020-08-25 17:45:22', '2020-08-25 17:45:22'),
('App\\Tenant', '7b865320-ad8f-4f27-b7f7-b6ce57b5c468', '2020-08-25 17:46:30', '2020-08-25 17:46:30'),
('App\\Tenant', '44957381-9234-43c4-a1f4-69546d7c9204', '2020-08-25 17:46:36', '2020-08-25 17:46:36'),
('App\\Tenant', '00993fc3-432f-4e5b-9cca-dd69becfa294', '2020-08-25 17:46:42', '2020-08-25 17:46:42'),
('App\\Tenant', '49e881a8-3f4d-419f-9460-a60c5e8fb1b2', '2020-08-25 17:46:58', '2020-08-25 17:46:58'),
('App\\Tenant', 'ee4ee522-e65a-40cb-b872-043089a44d3f', '2020-08-25 17:47:07', '2020-08-25 17:47:07'),
('App\\Tenant', 'cc6d9dee-5b3a-48da-8f99-5452428c12c0', '2020-08-25 18:34:35', '2020-08-25 18:34:35'),
('App\\Building', '21', '2020-08-25 20:47:21', '2020-08-25 20:47:21'),
('App\\Building', '22', '2020-08-25 21:24:55', '2020-08-25 21:24:55'),
('App\\Building', '23', '2020-08-25 21:34:21', '2020-08-25 21:34:21'),
('App\\Building', '24', '2020-08-25 22:23:49', '2020-08-25 22:23:49'),
('App\\Building', '25', '2020-08-26 01:02:14', '2020-08-26 01:02:14'),
('App\\Building', '26', '2020-08-26 02:20:29', '2020-08-26 02:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('pending','confirmed','suspended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_token` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_authenticated` tinyint(1) NOT NULL DEFAULT 0,
  `city_id` mediumint(8) UNSIGNED NOT NULL,
  `birth_of_date_at` date NOT NULL,
  `release_at` date NOT NULL,
  `end_at` date NOT NULL,
  `job` enum('government_employee','private_sector_employee','businessman','free_business','retired','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(8,2) NOT NULL DEFAULT 0.00,
  `job_title_other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` enum('single','married','widower','divorcee') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_has_kids` tinyint(1) NOT NULL DEFAULT 0,
  `unique_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_has_order` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `mobile`, `avatar`, `is_active`, `status`, `email_verified_at`, `password`, `session_token`, `is_authenticated`, `city_id`, `birth_of_date_at`, `release_at`, `end_at`, `job`, `debit`, `credit`, `job_title_other`, `marital_status`, `is_has_kids`, `unique_id`, `is_has_order`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marwan0', 'oren.schumm@hotmail.com', '6666666666', '0416453124', NULL, 1, 'confirmed', NULL, '$2y$10$8W/mjYnlzgEs/bSkwxACq.cBDwAP/CRAtiS3VXfpkC3cWTBwmTPqS', '4324', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', '0.00', '0.00', NULL, 'married', 0, 'c14635aa-13d2-4624-86a7-dfd006b604c3', 0, NULL, NULL, '2020-08-10 17:04:43', '2020-08-26 09:09:03'),
(2, 'Marwan1', 'meaghan.armstrong@gmail.com', '4353567766', '0108773627', NULL, 1, 'confirmed', NULL, '$2y$10$tgZTF.igjlWvCFU89B5BDe9QZvbR1MQ6BVQUON9RZdZMNON4/6iNe', '5633', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', '0.00', '0.00', NULL, 'married', 0, '7f56144e-55d0-42d5-9a1a-69c600dfcd7f', 0, NULL, NULL, '2020-08-16 20:23:05', '2020-08-24 21:39:42'),
(3, 'Marwan2', 'frances.mcclure@gmail.com', '67676767', '0902610052', NULL, 1, 'pending', NULL, '$2y$10$CRBPeWuxNJpcGWB04mQH9.r9g8JWraY1o6iAOd03BiOUkqIBjofmO', '8799', 1, 5, '1990-01-01', '2020-01-01', '2050-01-01', 'retired', '0.00', '0.00', NULL, 'married', 0, 'b0f3ece7-4b88-4996-ad3e-f791014f4acf', 0, NULL, NULL, '2020-08-19 23:29:46', '2020-08-25 00:30:51'),
(4, 'Mohaned', 'amada.crist@hotmail.com', '50780', '0465271217', NULL, 1, 'pending', NULL, '$2y$10$sV2h.rvp3xGLHXObWyJAvu28.Xdm2EkqH26JzqrNCAs24tFyGq1Su', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 0, '125772ef-77b2-4871-a1f4-2a5d5d34e683', 0, '2020-08-25 17:44:53', NULL, '2020-08-23 02:45:06', '2020-08-25 17:44:53'),
(5, 'Marwan', 'norris.harber@gmail.com', '71390', '0188961740', NULL, 1, 'pending', NULL, '$2y$10$qlNAEvXCgAlcrRscvf9WauHYzSquRe5T1H9oNi2I/Io/vlubkFfsa', NULL, 0, 2, '1988-01-01', '2020-01-01', '2030-01-01', 'retired', '0.00', '0.00', NULL, 'single', 0, 'abb71184-9bf8-46d9-b57f-a0a985fff78d', 0, '2020-08-25 17:29:42', NULL, '2020-08-23 02:45:18', '2020-08-25 17:29:42'),
(6, 'Mohaned', 'qiana.walter@yahoo.com', '62735', '0739157346', NULL, 0, 'pending', NULL, '$2y$10$alewv96RmCw7v6EijByUz.Nuu9DFdTVjZJfFS3mLnRUthgFotRjHu', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'd9b97625-1754-4f34-8a96-e1ca2eef9471', 0, '2020-08-25 17:42:13', NULL, '2020-08-23 02:45:28', '2020-08-25 17:42:13'),
(7, 'Mohaned', 'neville.wolff@gmail.com', '25189', '0488592325', NULL, 0, 'pending', NULL, '$2y$10$B6oPsSF6v5DwAglri4LWAO15AP802kgfmJUVoMXYj2LPM5kTS0dzK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', '0.00', '0.00', NULL, 'single', 1, '588627f7-3012-442a-90d7-c90540bda2a0', 0, '2020-08-25 17:29:48', NULL, '2020-08-23 02:45:58', '2020-08-25 17:29:48'),
(8, 'Mohaned', 'franklyn.witting@yahoo.com', '71630', '0744240568', NULL, 0, 'pending', NULL, '$2y$10$.FPub4lbKhQ0HHdox5t52.q4ohxvETyoAXinPcrPwAQGo1frVtpDy', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'businessman', '0.00', '0.00', NULL, 'single', 1, '7b865320-ad8f-4f27-b7f7-b6ce57b5c468', 0, '2020-08-25 17:46:30', NULL, '2020-08-23 02:46:08', '2020-08-25 17:46:30'),
(9, 'Mohaned', 'florence.lind@yahoo.com', '16319', '0267884053', NULL, 0, 'pending', NULL, '$2y$10$/s78QnXWbnsdyMlP0EkDQeBVyVi4t7NNiaamERl0TAqZL1XhLYR8u', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'free_business', '0.00', '0.00', NULL, 'single', 1, '3d7a7cf1-fa40-4b2c-a0da-3818eab05f2e', 0, '2020-08-25 17:29:54', NULL, '2020-08-23 02:46:18', '2020-08-25 17:29:54'),
(10, 'Mohaned', 'glenn.mckenzie@yahoo.com', '38504', '0887537634', NULL, 0, 'pending', NULL, '$2y$10$oHPoMM/8hQmgpCFNGxYfzeoZzjGV1GgrSXPaIdIeOZIfs3etxgami', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'retired', '0.00', '0.00', NULL, 'single', 1, '7ca52362-3075-48a7-9595-6cae1cdf75b8', 0, '2020-08-25 17:42:18', NULL, '2020-08-23 02:46:29', '2020-08-25 17:42:18'),
(11, 'Marwan', NULL, '56346', '0188961741', NULL, 0, 'pending', NULL, '$2y$10$WrGxCbDf/WdYkflwLcQMBOulsqWkxVwsCTH814fowl5NbAl7nu0hW', NULL, 0, 5, '2020-08-21', '2020-08-02', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '35cc909e-3dff-4bcb-9191-57b399e962a9', 0, '2020-08-25 17:30:00', NULL, '2020-08-23 03:21:51', '2020-08-25 17:30:00'),
(12, 'Mohaned', 'darrel.nader@yahoo.com', '84179', '0003863820', NULL, 0, 'pending', NULL, '$2y$10$yfjefUBMU53jR8yI/FFbV.OiqjD2StTLpx7R7bGt8ycnyjvGRSE/q', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '2d995b7b-0eb6-435d-88b6-d2caa33c32f3', 0, '2020-08-25 17:44:59', NULL, '2020-08-23 14:21:33', '2020-08-25 17:44:59'),
(13, 'Mohaned', 'jamila.leuschke@gmail.com', '37051', '0942312182', NULL, 0, 'pending', NULL, '$2y$10$PcmnAacSA65.Iu.84uMWC.hPypOEJZs7jX.rMUcv6MWkuk5.78Ite', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'a812f39c-e90d-4da6-90a4-05579ebda627', 0, '2020-08-25 17:30:05', NULL, '2020-08-23 14:21:43', '2020-08-25 17:30:05'),
(14, 'Mohaned', 'darron.swift@yahoo.com', '22922', '0750040986', NULL, 0, 'pending', NULL, '$2y$10$kM7UV.7wRk4BO61PnImOPexO397Ueab8Xfd2Mr7FsiZMVKS//bVzO', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '61908e42-8b92-4323-a2de-c22ad4e11c62', 0, '2020-08-25 17:42:24', NULL, '2020-08-23 14:21:54', '2020-08-25 17:42:24'),
(15, 'Mohaned', 'dante.bartoletti@hotmail.com', '05181', '0315210776', NULL, 0, 'pending', NULL, '$2y$10$JUMi13acRNHvt7.23rwGzOjjxyo6oNwi6rHe7tM.ySch3RjqRsv7O', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '899bb2f9-51d3-465b-9727-0f2671fd052a', 0, '2020-08-25 17:30:11', NULL, '2020-08-23 14:22:04', '2020-08-25 17:30:11'),
(16, 'Mohaned', 'bud.mraz@yahoo.com', '71376', '0872064362', NULL, 0, 'pending', NULL, '$2y$10$YNZaKoYPLiR2dSEp7FagMOl6gKq7UNT/avJmqmzLpN7E2CxDPCW8S', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', '0.00', '0.00', NULL, 'single', 1, '49e881a8-3f4d-419f-9460-a60c5e8fb1b2', 0, '2020-08-25 17:46:58', NULL, '2020-08-23 14:22:14', '2020-08-25 17:46:58'),
(17, 'Mohaned', 'tesha.klein@yahoo.com', '67068', '0388527104', NULL, 0, 'pending', NULL, '$2y$10$/K2wb95GE3.CgOsM/bqCCeGK62YhneaLlg9T7ON/Yt.SQed4u9eyW', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'businessman', '0.00', '0.00', NULL, 'single', 1, '2d69b19b-5666-43e8-bfed-eef126005f43', 0, '2020-08-25 17:42:30', NULL, '2020-08-23 14:22:26', '2020-08-25 17:42:30'),
(18, 'Mohaned', 'nelda.daugherty@yahoo.com', '74412', '0112100653', NULL, 0, 'pending', NULL, '$2y$10$SwaMeENnvj31.2JBFQr.5u912KUzCHhYsneOWgszlo6t98djh8ZHy', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'free_business', '0.00', '0.00', NULL, 'single', 1, '3a96e2d3-cb14-4b98-bae3-f90a81f847aa', 0, '2020-08-25 17:45:04', NULL, '2020-08-23 14:22:36', '2020-08-25 17:45:04'),
(19, 'Mohaned', 'lynne.streich@yahoo.com', '09584', '0743740950', NULL, 0, 'pending', NULL, '$2y$10$J1C5hM5zyDCqIuluiBSH8O/ZJq10VoIJn04t46FMbQJTy1HFu8EM2', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'retired', '0.00', '0.00', NULL, 'single', 1, 'cab178b7-5248-4d8d-974d-270f61819710', 0, '2020-08-25 17:42:36', NULL, '2020-08-23 14:22:46', '2020-08-25 17:42:36'),
(20, 'Mohaned', 'anita.kub@gmail.com', '14457', '0045773610', NULL, 0, 'pending', NULL, '$2y$10$4hiFhBPgNrsbHHNc53/dNuEgiYC.lU1NMmEoh7hNXJPwZimWYkBWC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '44957381-9234-43c4-a1f4-69546d7c9204', 0, '2020-08-25 17:46:36', NULL, '2020-08-23 14:27:54', '2020-08-25 17:46:36'),
(21, 'Mohaned', 'cristopher.parisian@gmail.com', '60552', '0621477344', NULL, 0, 'pending', NULL, '$2y$10$VhX/MryQyR6fKkqm40KXZ.Kc.ipmDhtXTLQSuxqvyAaWiVIWxFmWq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '2d10e2a0-733d-4054-8828-5d50f2670c10', 0, '2020-08-25 17:42:42', NULL, '2020-08-23 14:28:05', '2020-08-25 17:42:42'),
(22, 'Mohaned', 'neal.king@yahoo.com', '35941', '0130848478', NULL, 0, 'pending', NULL, '$2y$10$vvzJ4TOGgiu.wFjugXh2h.4O43Fv/VVUr6sIBE/OLfnZKaCuKU.wK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '4eb00296-41f5-41ab-b841-e95c4cc5060e', 0, '2020-08-25 17:45:10', NULL, '2020-08-23 14:28:17', '2020-08-25 17:45:10'),
(23, 'Mohaned', 'orval.bailey@hotmail.com', '77455', '0614286446', NULL, 0, 'pending', NULL, '$2y$10$meZfwYdgsdMU3nBH3.V0ruyX5IYzK702Vq3Ky87lDV/RFLm4seBLa', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'ee4ee522-e65a-40cb-b872-043089a44d3f', 0, '2020-08-25 17:47:07', NULL, '2020-08-23 14:32:45', '2020-08-25 17:47:07'),
(24, 'Mohaned', 'adriane.nitzsche@yahoo.com', '38259', '0232020331', NULL, 0, 'pending', NULL, '$2y$10$BpTxBsQ2x0mB.8UlFX/Pq.oquw6Y7fOE0uE/xV.G.nFst4ojBSjuq', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'c23ef8ec-64f3-41a1-a179-8b19e30092d6', 0, '2020-08-25 17:45:16', NULL, '2020-08-23 14:34:07', '2020-08-25 17:45:16'),
(25, 'Mohaned', 'billy.bashirian@yahoo.com', '41061', '0702448185', NULL, 0, 'pending', NULL, '$2y$10$.PGNuIhl4czxHYUWeYzwvuIlC2oK/Ph8Ghhpe7pT63M.jUKmyLIlC', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, '00993fc3-432f-4e5b-9cca-dd69becfa294', 0, '2020-08-25 17:46:42', NULL, '2020-08-23 14:35:40', '2020-08-25 17:46:42'),
(26, 'Mohaned', 'daryl.roberts@hotmail.com', '66856', '0288044491', NULL, 0, 'pending', NULL, '$2y$10$wBTat1Mes/fTgUSOV38ObOxjB46ThpoS6pPq8Ph/fniYHN0keYgMK', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'dec8486c-e8b8-4e4e-9045-d3b1aa5c7cb5', 0, '2020-08-25 17:45:22', NULL, '2020-08-23 14:35:51', '2020-08-25 17:45:22'),
(27, 'Mohaned', 'kimberli.sporer@yahoo.com', '25073', '0114072888', NULL, 0, 'pending', NULL, '$2y$10$WVQMi.KJkK.5Oc9XVa/ZDOK68o5oS9kow7td1P/BZSQfUFSsqFJ8m', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'single', 1, 'cc6d9dee-5b3a-48da-8f99-5452428c12c0', 0, '2020-08-25 18:34:35', NULL, '2020-08-25 17:48:16', '2020-08-25 18:34:35'),
(28, '02Mohaned', 'erich.trantow@gmail.com', '12702', '0813810248', NULL, 1, 'confirmed', NULL, '$2y$10$/HoIlSmKattQmFg7ReaoTuCQ.WTr9OWu7FwenCl3ebGqVdQR5PdI.', NULL, 0, 2, '1995-01-17', '1999-01-17', '2050-01-17', 'other', '0.00', '0.00', 'لالالالالالالالالالالالالا', 'widower', 0, '58606e2e-0fe7-4128-b203-22317d076c03', 0, NULL, NULL, '2020-08-25 17:48:27', '2020-08-25 18:40:38'),
(29, 'Mohaned', 'coy.lang@yahoo.com', '60286', '0883534317', NULL, 0, 'pending', NULL, '$2y$10$civQ.IdADyji25Un78cTKOubLtKeb/mZ0G6qplsO8/XJoRYLsF5Em', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'widower', 1, '64a38b97-9797-431c-bd3b-4f7980e50b23', 0, NULL, NULL, '2020-08-25 17:48:37', '2020-08-25 17:48:37'),
(30, 'Mohaned', 'felton.ryan@hotmail.com', '13248', '0114033189', NULL, 0, 'pending', NULL, '$2y$10$QrNw8QBtHF8EPT8UbF4Ma..Wipv5bnkDgym5ifyU78LolN5wuAbdS', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'private_sector_employee', '0.00', '0.00', NULL, 'divorcee', 1, 'd11dfa7d-9ed0-47d4-893a-c1ca251655c7', 0, NULL, NULL, '2020-08-25 17:48:47', '2020-08-25 17:48:47'),
(31, 'Mohaned', 'santo.gottlieb@gmail.com', '48528', '0428642564', NULL, 0, 'pending', NULL, '$2y$10$g8CtsNzlXoRlQZWQSL8X7ezDJJNTWyapkkOgzbKgYc188ceyluOim', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'government_employee', '0.00', '0.00', NULL, 'single', 1, 'd6ed5cdc-2ee8-489f-ab13-397b55a302db', 0, NULL, NULL, '2020-08-25 17:48:56', '2020-08-25 17:48:56'),
(32, 'Mohaned', 'nicky.dibbert@yahoo.com', '08970', '0817210590', NULL, 0, 'pending', NULL, '$2y$10$VCfsFWJC7.Hgwjh7RlvdJ.Qiw/4xHyUuh026lx2HU/7mN8WayGcU.', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'businessman', '0.00', '0.00', NULL, 'married', 1, 'da4c8155-5d6f-4170-be0f-3ae77eb71bda', 0, NULL, NULL, '2020-08-25 17:49:05', '2020-08-25 17:49:05'),
(33, 'Mohaned', 'seymour.balistreri@hotmail.com', '47538', '0961031824', NULL, 0, 'pending', NULL, '$2y$10$ARZwafiA94Hhq7CFL7r99OEsnwxmjpjeEc.grEU9.kHxsz0YPc/TG', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'free_business', '0.00', '0.00', NULL, 'widower', 1, '85ee0f06-1387-49b3-b72d-db713f57eb78', 0, NULL, NULL, '2020-08-25 17:49:15', '2020-08-25 17:49:15'),
(34, 'Mohaned', 'ruthe.murray@yahoo.com', '39058', '0540253806', NULL, 0, 'pending', NULL, '$2y$10$MJ1YVegqOgstPlzUHDTCneCwPLrMeJXIMLg9L6.1yHi4687GvGK1y', NULL, 0, 3, '1988-01-17', '2020-01-17', '2030-01-17', 'retired', '0.00', '0.00', NULL, 'divorcee', 1, '3a4ef4a4-7cde-4e0c-9975-cef9c81b933e', 0, NULL, NULL, '2020-08-25 17:49:25', '2020-08-25 17:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `vocheroutusers`
--

CREATE TABLE `vocheroutusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('مورد','خدمات') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'مورد',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucherable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucherable_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type` enum('Payment','Receipt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `liable_id` int(11) DEFAULT NULL,
  `paymentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentable_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `attributable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` decimal(8,2) DEFAULT NULL,
  `date_check` date DEFAULT NULL,
  `check_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `group_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_idAttributable` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucherable_type`, `voucherable_id`, `document_type`, `liable_id`, `paymentable_type`, `paymentable_id`, `account_id`, `attributable_type`, `attributable_id`, `date`, `number`, `paid_amount`, `date_check`, `check_num`, `description`, `amount`, `group_id`, `created_at`, `updated_at`, `account_idAttributable`) VALUES
(3, 'سند خارجى', NULL, 'Receipt', 1, 'Fund', 21, 21, NULL, 1, '2020-08-18', '2', '25000.00', NULL, NULL, 'utytrea', '0.00', 1, '2020-08-18 17:21:01', '2020-08-18 17:21:01', 32),
(4, 'سند داخلى', NULL, 'Payment', 1, 'Fund', 21, 21, NULL, 3, '2020-08-18', '1', '5000.00', NULL, NULL, 'kjhgfdsa', '25000.00', 1, '2020-08-18 17:30:06', '2020-08-18 17:30:06', 74),
(5, 'سند داخلى', NULL, 'Receipt', 1, 'Fund', 22, 22, NULL, 3, '2020-08-19', '2', '1000.00', NULL, NULL, 'dfsfdsfdsfdsfs', '0.00', 1, '2020-08-18 18:40:42', '2020-08-18 18:40:42', 44),
(6, 'سند خارجى', NULL, 'Receipt', 1, 'Bank', 26, 26, NULL, 1, '2020-08-18', '4', '544545.00', '2020-08-19', '546546546546', 'bcvbcvbcvb', '0.00', 1, '2020-08-18 18:50:49', '2020-08-18 18:50:49', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_banks`
--
ALTER TABLE `accounting_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounting_banks_account_id_index` (`account_id`),
  ADD KEY `accounting_banks_group_id_index` (`group_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_code_unique` (`code`),
  ADD UNIQUE KEY `accounts_sorting_unique` (`sorting`),
  ADD KEY `accounts_group_id_index` (`group_id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrators_email_unique` (`email`);

--
-- Indexes for table `advance`
--
ALTER TABLE `advance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advance_beneficiary_id_index` (`beneficiary_id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agencies_identity_number_unique` (`identity_number`),
  ADD UNIQUE KEY `agencies_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `agencies_email_unique` (`email`),
  ADD KEY `agencies_city_id_index` (`city_id`);

--
-- Indexes for table `agencies_balances`
--
ALTER TABLE `agencies_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencies_balances_agencies_id_index` (`agencies_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_balances`
--
ALTER TABLE `bank_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_balances_bank_id_index` (`bank_id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beneficiaries_identity_number_unique` (`identity_number`),
  ADD UNIQUE KEY `beneficiaries_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `beneficiaries_email_unique` (`email`),
  ADD KEY `beneficiaries_city_id_index` (`city_id`),
  ADD KEY `beneficiaries_bank_id_index` (`bank_id`);

--
-- Indexes for table `beneficiary_balances`
--
ALTER TABLE `beneficiary_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_balances_beneficiary_id_index` (`beneficiary_id`);

--
-- Indexes for table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheques_attributable_type_attributable_id_index` (`attributable_type`,`attributable_id`),
  ADD KEY `cheques_account_id_index` (`account_id`),
  ADD KEY `cheques_bank_id_index` (`bank_id`),
  ADD KEY `cheques_group_id_index` (`group_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD KEY `documents_documentable_type_documentable_id_index` (`documentable_type`,`documentable_id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estates_parent_id_foreign` (`parent_id`),
  ADD KEY `estates_city_id_index` (`city_id`);

--
-- Indexes for table `estate_orders`
--
ALTER TABLE `estate_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estate_orders_estate_id_index` (`estate_id`),
  ADD KEY `estate_orders_tenant_id_index` (`tenant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funds_account_id_index` (`account_id`),
  ADD KEY `funds_group_id_index` (`group_id`);

--
-- Indexes for table `fund_balances`
--
ALTER TABLE `fund_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_balances_fund_id_index` (`fund_id`);

--
-- Indexes for table `generallsetting`
--
ALTER TABLE `generallsetting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generallsetting_email_unique` (`email`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_paymentable_type_paymentable_id_index` (`paymentable_type`,`paymentable_id`),
  ADD KEY `invoices_account_id_index` (`account_id`),
  ADD KEY `invoices_tenant_id_index` (`tenant_id`),
  ADD KEY `invoices_group_id_index` (`group_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoice_details_group_id_index` (`group_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journals_journalable_type_journalable_id_index` (`journalable_type`,`journalable_id`),
  ADD KEY `journals_group_id_index` (`group_id`);

--
-- Indexes for table `journal_details`
--
ALTER TABLE `journal_details`
  ADD KEY `journal_details_journal_id_index` (`journal_id`),
  ADD KEY `journal_details_account_id_index` (`account_id`),
  ADD KEY `journal_details_group_id_index` (`group_id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD KEY `kids_kidable_type_kidable_id_index` (`kidable_type`,`kidable_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `maintenance_orders`
--
ALTER TABLE `maintenance_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_orders_estate_id_foreign` (`estate_id`),
  ADD KEY `maintenance_orders_agency_id_index` (`agency_id`),
  ADD KEY `maintenance_orders_tenant_id_index` (`tenant_id`),
  ADD KEY `maintenance_orders_city_id_index` (`city_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orderbalance`
--
ALTER TABLE `orderbalance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderbalance_beneficiary_id_index` (`beneficiary_id`);

--
-- Indexes for table `orderinformation`
--
ALTER TABLE `orderinformation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderinformation_beneficiary_id_index` (`beneficiary_id`);

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
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `queries_code_unique` (`code`),
  ADD KEY `queries_estate_id_foreign` (`estate_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_tenant_id_foreign` (`tenant_id`),
  ADD KEY `rents_estateable_type_estateable_id_index` (`estateable_type`,`estateable_id`);

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
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_balances`
--
ALTER TABLE `tenant_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_balances_tenant_id_index` (`tenant_id`);

--
-- Indexes for table `tenant_rents`
--
ALTER TABLE `tenant_rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_rents_estate_id_foreign` (`estate_id`),
  ADD KEY `tenant_rents_tenant_id_index` (`tenant_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD KEY `transactions_transactionable_type_transactionable_id_index` (`transactionable_type`,`transactionable_id`),
  ADD KEY `transactions_attributable_type_attributable_id_index` (`attributable_type`,`attributable_id`),
  ADD KEY `transactions_group_id_index` (`group_id`);

--
-- Indexes for table `trashes`
--
ALTER TABLE `trashes`
  ADD KEY `trashes_trashable_type_trashable_id_index` (`trashable_type`,`trashable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_identity_number_unique` (`identity_number`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_city_id_index` (`city_id`);

--
-- Indexes for table `vocheroutusers`
--
ALTER TABLE `vocheroutusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vocheroutusers_email_unique` (`email`),
  ADD UNIQUE KEY `vocheroutusers_mobile_unique` (`mobile`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_voucherable_type_voucherable_id_index` (`voucherable_type`,`voucherable_id`),
  ADD KEY `vouchers_paymentable_type_paymentable_id_index` (`paymentable_type`,`paymentable_id`),
  ADD KEY `vouchers_attributable_type_attributable_id_index` (`attributable_type`,`attributable_id`),
  ADD KEY `vouchers_account_id_index` (`account_id`),
  ADD KEY `vouchers_group_id_index` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_banks`
--
ALTER TABLE `accounting_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `advance`
--
ALTER TABLE `advance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `agencies_balances`
--
ALTER TABLE `agencies_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_balances`
--
ALTER TABLE `bank_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `beneficiary_balances`
--
ALTER TABLE `beneficiary_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `estate_orders`
--
ALTER TABLE `estate_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fund_balances`
--
ALTER TABLE `fund_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generallsetting`
--
ALTER TABLE `generallsetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orderbalance`
--
ALTER TABLE `orderbalance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderinformation`
--
ALTER TABLE `orderinformation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_balances`
--
ALTER TABLE `tenant_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant_rents`
--
ALTER TABLE `tenant_rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vocheroutusers`
--
ALTER TABLE `vocheroutusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting_banks`
--
ALTER TABLE `accounting_banks`
  ADD CONSTRAINT `accounting_banks_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `accounting_banks_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `advance`
--
ALTER TABLE `advance`
  ADD CONSTRAINT `advance_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `agencies_balances`
--
ALTER TABLE `agencies_balances`
  ADD CONSTRAINT `agencies_balances_agencies_id_foreign` FOREIGN KEY (`agencies_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_balances`
--
ALTER TABLE `bank_balances`
  ADD CONSTRAINT `bank_balances_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `accounting_banks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD CONSTRAINT `beneficiaries_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `beneficiary_balances`
--
ALTER TABLE `beneficiary_balances`
  ADD CONSTRAINT `beneficiary_balances_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `cheques_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `accounting_banks` (`id`),
  ADD CONSTRAINT `cheques_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `estates`
--
ALTER TABLE `estates`
  ADD CONSTRAINT `estates_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `estates_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `estates` (`id`);

--
-- Constraints for table `estate_orders`
--
ALTER TABLE `estate_orders`
  ADD CONSTRAINT `estate_orders_estate_id_foreign` FOREIGN KEY (`estate_id`) REFERENCES `estates` (`id`),
  ADD CONSTRAINT `estate_orders_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `funds_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `funds_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `fund_balances`
--
ALTER TABLE `fund_balances`
  ADD CONSTRAINT `fund_balances_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `invoices_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `invoices_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `journal_details`
--
ALTER TABLE `journal_details`
  ADD CONSTRAINT `journal_details_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `journal_details_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `journal_details_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `maintenance_orders`
--
ALTER TABLE `maintenance_orders`
  ADD CONSTRAINT `maintenance_orders_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`),
  ADD CONSTRAINT `maintenance_orders_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `maintenance_orders_estate_id_foreign` FOREIGN KEY (`estate_id`) REFERENCES `estates` (`id`),
  ADD CONSTRAINT `maintenance_orders_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `orderbalance`
--
ALTER TABLE `orderbalance`
  ADD CONSTRAINT `orderbalance_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `orderinformation`
--
ALTER TABLE `orderinformation`
  ADD CONSTRAINT `orderinformation_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_estate_id_foreign` FOREIGN KEY (`estate_id`) REFERENCES `estates` (`id`);

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenant_balances`
--
ALTER TABLE `tenant_balances`
  ADD CONSTRAINT `tenant_balances_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenant_rents`
--
ALTER TABLE `tenant_rents`
  ADD CONSTRAINT `tenant_rents_estate_id_foreign` FOREIGN KEY (`estate_id`) REFERENCES `estates` (`id`),
  ADD CONSTRAINT `tenant_rents_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `vouchers_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
