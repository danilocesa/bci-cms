-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 01:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `remember_token`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'dan@mixminds.com', '$2y$10$dsNMSDKAutQa227TYfXxbuBpzGOwBdVhsbYPlFP.VqQ.Qlk5zPNWK', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'eTM8Fk7SdJ91ycfxOW6HmnUpKVe09eMdWdz2AwkaVlOzltH1WxX01MYgf49O', 'Dan', 'Cesa', '2016-07-22 19:07:28', '2016-08-05 23:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `owner_type`, `owner_id`, `old_value`, `new_value`, `type`, `route`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\AdminsTB', 1, '{"remember_token":null}', '{"remember_token":"eTM8Fk7SdJ91ycfxOW6HmnUpKVe09eMdWdz2AwkaVlOzltH1WxX01MYgf49O"}', 'updated', 'http://localhost/bci-admin/public/web-admin/logout', '::1', '2016-08-05 23:18:29', '2016-08-05 23:18:29'),
(2, 1, 'App\\Permission', 1, 'null', '{"name":"view-logs","display_name":"View logs"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:17:46', '2016-08-10 07:17:46'),
(3, 1, 'App\\Permission', 3, 'null', '{"name":"view-user","display_name":"View users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:19:02', '2016-08-10 07:19:02'),
(4, 1, 'App\\Permission', 4, 'null', '{"name":"add-user","display_name":"Add users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:19:26', '2016-08-10 07:19:26'),
(5, 1, 'App\\Permission', 5, 'null', '{"name":"delete-user","display_name":"Delete user"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:19:57', '2016-08-10 07:19:57'),
(6, 1, 'App\\Permission', 6, 'null', '{"name":"edit-user","display_name":"Edit user"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:20:59', '2016-08-10 07:20:59'),
(7, 1, 'App\\Permission', 7, 'null', '{"name":"view-roles","display_name":"View roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:21:35', '2016-08-10 07:21:35'),
(8, 1, 'App\\Permission', 8, 'null', '{"name":"add-roles","display_name":"Add roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:21:59', '2016-08-10 07:21:59'),
(9, 1, 'App\\Permission', 9, 'null', '{"name":"delete-roles","display_name":"Delete roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:22:22', '2016-08-10 07:22:22'),
(10, 1, 'App\\Permission', 10, 'null', '{"name":"edit-roles","display_name":"Edit roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:22:49', '2016-08-10 07:22:49'),
(11, 1, 'App\\Permission', 11, 'null', '{"name":"view-page","display_name":"Edit roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:23:53', '2016-08-10 07:23:53'),
(12, 1, 'App\\Permission', 12, 'null', '{"name":"about-page","display_name":"Edit roles"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:24:21', '2016-08-10 07:24:21'),
(13, 1, 'App\\Permission', 14, 'null', '{"name":"clients-page","display_name":"Edit clients page"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:25:35', '2016-08-10 07:25:35'),
(14, 1, 'App\\Permission', 15, 'null', '{"name":"portfolio-page","display_name":"Edit portfolio page"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:26:12', '2016-08-10 07:26:12'),
(15, 1, 'App\\Permission', 16, 'null', '{"name":"contact-page","display_name":"View contact"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/add-permission', '::1', '2016-08-10 07:26:33', '2016-08-10 07:26:33'),
(16, 1, 'App\\Role', 30, 'null', '{"name":"sdfdsf","display_name":"Sdfdsf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:36:06', '2016-08-11 07:36:06'),
(17, 1, 'App\\Role', 31, 'null', '{"name":"sdfdsf23424","display_name":"Sdfdsf23424"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:36:09', '2016-08-11 07:36:09'),
(18, 1, 'App\\Role', 32, 'null', '{"name":"sdfdsf2342436y36436","display_name":"Sdfdsf2342436y36436"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:36:13', '2016-08-11 07:36:13'),
(19, 1, 'App\\Role', 33, 'null', '{"name":"sdfdsf23424sdfds36y36436","display_name":"Sdfdsf23424sdfds36y36436"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:36:25', '2016-08-11 07:36:25'),
(20, 1, 'App\\Role', 34, 'null', '{"name":"sdf-sdf232235423523t6265675","display_name":"Sdf Sdf232235423523t6265675"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:38:59', '2016-08-11 07:38:59'),
(21, 1, 'App\\Role', 35, 'null', '{"name":"sfsdf34r324-234-2345r5235","display_name":" Sfsdf34r324 234 2345r5235"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:52:18', '2016-08-11 07:52:18'),
(22, 1, 'App\\Role', 36, 'null', '{"name":"sdfsdf-sdf-sdfsd-sdf-sdfsdf","display_name":" Sdfsdf Sdf Sdfsd Sdf Sdfsdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 07:59:14', '2016-08-11 07:59:14'),
(23, 1, 'App\\Role', 37, 'null', '{"name":"sdf-sdf-sdf234523532-25235","display_name":" Sdf Sdf Sdf234523532 25235"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-11 08:01:01', '2016-08-11 08:01:01'),
(24, 1, 'App\\Role', 38, 'null', '{"name":"sfsd-4324-n5657","display_name":"Sfsd 4324 N5657"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:12:39', '2016-08-11 08:12:39'),
(25, 1, 'App\\Role', 40, 'null', '{"name":"f2354235fgrgf","display_name":"F2354235fgrgf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:13:55', '2016-08-11 08:13:55'),
(26, 1, 'App\\Role', 41, 'null', '{"name":"uio8ky","display_name":"Uio8ky"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:15:46', '2016-08-11 08:15:46'),
(27, 1, 'App\\Role', 42, 'null', '{"name":"u678injhm","display_name":"U678injhm"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:17:01', '2016-08-11 08:17:01'),
(28, 1, 'App\\Permission', 18, 'null', '{"name":"edit-usersss","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:17:01', '2016-08-11 08:17:01'),
(29, 1, 'App\\Role', 43, 'null', '{"name":"gfbn5u5","display_name":"Gfbn5u5"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:18:26', '2016-08-11 08:18:26'),
(30, 1, 'App\\Role', 45, 'null', '{"name":"tyj456456","display_name":"Tyj456456"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:18:54', '2016-08-11 08:18:54'),
(31, 1, 'App\\Permission', 20, 'null', '{"name":"edit-user2343sss","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-11 08:18:54', '2016-08-11 08:18:54'),
(32, 1, 'App\\Role', 46, 'null', '{"name":"swer3wr3-3r3","display_name":" Swer3wr3 3r3"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 05:45:26', '2016-08-13 05:45:26'),
(33, 1, 'App\\Role', 48, 'null', '{"name":"f-dsf32423","display_name":"F Dsf32423"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 05:46:26', '2016-08-13 05:46:26'),
(34, 1, 'App\\Role', 49, 'null', '{"name":"21312-132132","display_name":"21312 132132"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 05:46:42', '2016-08-13 05:46:42'),
(35, 1, 'App\\Role', 51, 'null', '{"name":"23y5tg34g-3-32424","display_name":"23y5tg34g 3 32424"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 05:47:07', '2016-08-13 05:47:07'),
(36, 1, 'App\\Permission', 24, 'null', '{"name":"edit-user2342342342342341dasd3756sss","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 05:47:07', '2016-08-13 05:47:07'),
(37, 1, 'App\\Role', 52, 'null', '{"name":"sadas-asdas","display_name":"Sadas Asdas"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:00:11', '2016-08-13 06:00:11'),
(38, 1, 'App\\Permission', 25, 'null', '{"name":"edit-user2342342342342341dasd3756sss","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:00:11', '2016-08-13 06:00:11'),
(39, 1, 'App\\Role', 53, 'null', '{"name":"f-sdf2343","display_name":"F Sdf2343"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:00:34', '2016-08-13 06:00:34'),
(40, 1, 'App\\Role', 54, 'null', '{"name":"sfd-sdf32","display_name":"Sfd Sdf32"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:00:51', '2016-08-13 06:00:51'),
(41, 1, 'App\\Permission', 27, 'null', '{"name":"editdsadsad","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:00:51', '2016-08-13 06:00:51'),
(42, 1, 'App\\Role', 55, 'null', '{"name":"sdf-sd","display_name":"Sdf Sd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:02:21', '2016-08-13 06:02:21'),
(43, 1, 'App\\Permission', 28, 'null', '{"name":"345","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:02:21', '2016-08-13 06:02:21'),
(44, 1, 'App\\Role', 56, 'null', '{"name":"sdfs-d","display_name":"Sdfs D"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:03:14', '2016-08-13 06:03:14'),
(45, 1, 'App\\Permission', 29, 'null', '{"name":"31asdasd232","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:03:14', '2016-08-13 06:03:14'),
(46, 1, 'App\\Role', 57, 'null', '{"name":"dsfdsf","display_name":" Dsfdsf "}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:04:34', '2016-08-13 06:04:34'),
(47, 1, 'App\\Permission', 30, 'null', '{"name":"31asdasd412232","display_name":"Edit Users","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:04:34', '2016-08-13 06:04:34'),
(48, 1, 'App\\Role', 58, 'null', '{"name":"sfdf","display_name":"Sfdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:05:46', '2016-08-13 06:05:46'),
(49, 1, 'App\\Permission', 31, 'null', '{"name":"31asdasd12412232","display_name":"Edit Us1ers","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:05:46', '2016-08-13 06:05:46'),
(50, 1, 'App\\Role', 59, 'null', '{"name":"asdsad","display_name":"Asdsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:06:14', '2016-08-13 06:06:14'),
(51, 1, 'App\\Permission', 32, 'null', '{"name":"31asdaaasd12412232","display_name":"Edit Us1ers","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:06:14', '2016-08-13 06:06:14'),
(52, 1, 'App\\Role', 60, 'null', '{"name":"saddad","display_name":"Saddad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:06:46', '2016-08-13 06:06:46'),
(53, 1, 'App\\Permission', 33, 'null', '{"name":"31asdaaas32423d12412232","display_name":"Edit Us1ers","description":"edit existing users"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission/attach-permission', '::1', '2016-08-13 06:06:46', '2016-08-13 06:06:46'),
(54, 1, 'App\\Role', 61, 'null', '{"name":"asdasd","display_name":"Asdasd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 06:18:13', '2016-08-13 06:18:13'),
(55, 1, 'App\\Role', 62, 'null', '{"name":"dsfdsf-sadsa","display_name":"Dsfdsf Sadsa"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 06:27:09', '2016-08-13 06:27:09'),
(56, 1, 'App\\Role', 63, 'null', '{"name":"sdasd","display_name":"Sdasd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:06:34', '2016-08-13 07:06:34'),
(57, 1, 'App\\Role', 64, 'null', '{"name":"sadasd","display_name":"Sadasd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:08:23', '2016-08-13 07:08:23'),
(58, 1, 'App\\Role', 65, 'null', '{"name":"sadsdsadasd","display_name":"Sadsdsadasd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:08:42', '2016-08-13 07:08:42'),
(59, 1, 'App\\Role', 66, 'null', '{"name":"dsadsad","display_name":"Dsadsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:10:29', '2016-08-13 07:10:29'),
(60, 1, 'App\\Role', 67, 'null', '{"name":"sdfsdfsad","display_name":"Sdfsdfsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:14:11', '2016-08-13 07:14:11'),
(61, 1, 'App\\Role', 68, 'null', '{"name":"d-fsdf-sdf-sd","display_name":"D Fsdf Sdf Sd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:14:51', '2016-08-13 07:14:51'),
(62, 1, 'App\\Role', 69, 'null', '{"name":"fsd-sdf","display_name":"Fsd Sdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:15:19', '2016-08-13 07:15:19'),
(63, 1, 'App\\Role', 70, 'null', '{"name":"asd-as","display_name":"Asd As"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:22:35', '2016-08-13 07:22:35'),
(64, 1, 'App\\Role', 71, 'null', '{"name":"sdasd-sa","display_name":"Sdasd Sa"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:27:00', '2016-08-13 07:27:00'),
(65, 1, 'App\\Role', 72, 'null', '{"name":"sdasd-sad-as","display_name":"Sdasd Sad As"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:33:29', '2016-08-13 07:33:29'),
(66, 1, 'App\\Role', 73, 'null', '{"name":"adsa-sad","display_name":"Adsa Sad "}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:39:10', '2016-08-13 07:39:10'),
(67, 1, 'App\\Role', 74, 'null', '{"name":"asdasd-dsfsdf","display_name":" Asdasd Dsfsdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 07:41:13', '2016-08-13 07:41:13'),
(68, 1, 'App\\Role', 75, 'null', '{"name":"dasdas","display_name":"Dasdas"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:00:56', '2016-08-13 08:00:56'),
(69, 1, 'App\\Role', 76, 'null', '{"name":"dasdasd","display_name":"Dasdasd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:01:44', '2016-08-13 08:01:44'),
(70, 1, 'App\\Role', 77, 'null', '{"name":"d-asdasdas","display_name":"D Asdasdas"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:08:34', '2016-08-13 08:08:34'),
(71, 1, 'App\\Role', 78, 'null', '{"name":"dsad","display_name":"Dsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:13:54', '2016-08-13 08:13:54'),
(72, 1, 'App\\Role', 79, 'null', '{"name":"ds-ds-fd","display_name":"Ds Ds Fd"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:17:37', '2016-08-13 08:17:37'),
(73, 1, 'App\\Role', 80, 'null', '{"name":"dasdasf-sdf","display_name":"Dasdasf Sdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:18:49', '2016-08-13 08:18:49'),
(74, 1, 'App\\Role', 81, 'null', '{"name":"sadas-asdas-d","display_name":"Sadas Asdas D"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:28:59', '2016-08-13 08:28:59'),
(75, 1, 'App\\Role', 82, 'null', '{"name":"das-asdas","display_name":"Das Asdas"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:30:31', '2016-08-13 08:30:31'),
(76, 1, 'App\\Role', 83, 'null', '{"name":"a-ds-sad","display_name":"A Ds Sad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:41:23', '2016-08-13 08:41:23'),
(77, 1, 'App\\Role', 84, 'null', '{"name":"asd-asd-asdas","display_name":"Asd Asd Asdas"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:53:52', '2016-08-13 08:53:52'),
(78, 1, 'App\\Role', 85, 'null', '{"name":"fsdfdsf","display_name":"Fsdfdsf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:58:35', '2016-08-13 08:58:35'),
(79, 1, 'App\\Role', 86, 'null', '{"name":"sdasdsad","display_name":"Sdasdsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:59:09', '2016-08-13 08:59:09'),
(80, 1, 'App\\Role', 87, 'null', '{"name":"asd241eds","display_name":"Asd241eds"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 08:59:33', '2016-08-13 08:59:33'),
(81, 1, 'App\\Role', 88, 'null', '{"name":"sd-fdfsdf","display_name":"Sd Fdfsdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:01:55', '2016-08-13 09:01:55'),
(82, 1, 'App\\Role', 89, 'null', '{"name":"sdfssssdf","display_name":"Sdfssssdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:07:01', '2016-08-13 09:07:01'),
(83, 1, 'App\\Role', 90, 'null', '{"name":"sdf-sdf","display_name":"Sdf Sdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:08:01', '2016-08-13 09:08:01'),
(84, 1, 'App\\Role', 91, 'null', '{"name":"fs-dfd-fdsf","display_name":"Fs Dfd Fdsf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:08:41', '2016-08-13 09:08:41'),
(85, 1, 'App\\Role', 92, 'null', '{"name":"sdfsssdf","display_name":"Sdfsssdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:08:58', '2016-08-13 09:08:58'),
(86, 1, 'App\\Role', 93, 'null', '{"name":"sf-sdf","display_name":"Sf Sdf"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:19:58', '2016-08-13 09:19:58'),
(87, 1, 'App\\Role', 94, 'null', '{"name":"df-sdfds","display_name":"Df Sdfds"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:20:28', '2016-08-13 09:20:28'),
(88, 1, 'App\\Role', 95, 'null', '{"name":"sdf-sdf-d","display_name":"Sdf Sdf D"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:21:23', '2016-08-13 09:21:23'),
(89, 1, 'App\\Role', 96, 'null', '{"name":"dsadsa","display_name":"Dsadsa"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-13 09:21:35', '2016-08-13 09:21:35'),
(90, 1, 'App\\Role', 97, 'null', '{"name":"asdsad","display_name":"Asdsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-15 06:22:09', '2016-08-15 06:22:09'),
(91, 1, 'App\\Role', 98, 'null', '{"name":"asdasdsadsadsad","display_name":"Asdasdsadsadsad"}', 'created', 'http://localhost/bci-admin/public/web-admin/role-and-permission', '::1', '2016-08-15 06:22:21', '2016-08-15 06:22:21'),
(92, 1, 'App\\Role', 99, 'null', '{"name":"fgdfg","display_name":"Fgdfg"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:01:23', '2016-08-15 07:01:23'),
(93, 1, 'App\\Role', 100, 'null', '{"name":"fgdfgbfdgdf","display_name":"Fgdfgbfdgdf "}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:01:33', '2016-08-15 07:01:33'),
(94, 1, 'App\\Role', 101, 'null', '{"name":"sdfds-sf","display_name":"Sdfds Sf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:02:09', '2016-08-15 07:02:09'),
(95, 1, 'App\\Role', 102, 'null', '{"name":"sfsdf","display_name":"Sfsdf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:02:18', '2016-08-15 07:02:18'),
(96, 1, 'App\\Role', 103, 'null', '{"name":"dsf-sdfsd","display_name":"Dsf Sdfsd"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:04:23', '2016-08-15 07:04:23'),
(97, 1, 'App\\Role', 104, 'null', '{"name":"sdf-sdfsdf","display_name":"Sdf Sdfsdf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:04:30', '2016-08-15 07:04:30'),
(98, 1, 'App\\Role', 105, 'null', '{"name":"fds-fdsf","display_name":"Fds Fdsf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:04:38', '2016-08-15 07:04:38'),
(99, 1, 'App\\Role', 106, 'null', '{"name":"sdfsd-sdf-d","display_name":"Sdfsd Sdf D"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:05:01', '2016-08-15 07:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_admins_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_01_104512_create_log_table', 2),
('2016_05_22_190217_add_fields_to_log_table', 3),
('2016_08_06_053104_PageCategory', 3),
('2016_08_06_053350_PageContent', 3),
('2016_08_08_142115_entrust_setup_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE `page_category` (
  `page_category_id` int(10) UNSIGNED NOT NULL,
  `page_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_category`
--

INSERT INTO `page_category` (`page_category_id`, `page_category_name`, `page_description`, `meta_description`, `meta_keywords`, `image`) VALUES
(1, 'about-us', '', NULL, NULL, NULL),
(2, 'clients', '', NULL, NULL, NULL),
(3, 'portfolio', '', NULL, NULL, NULL),
(4, 'contact-us', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `page_content_id` int(10) UNSIGNED NOT NULL,
  `page_category_id` int(11) NOT NULL,
  `director_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolio_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolio_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_content_id`, `page_category_id`, `director_name`, `director_position`, `director_desc`, `client_image`, `portfolio_text`, `portfolio_image`, `url`, `fb_link`, `linkedin`) VALUES
(1, 1, 'gemma g. alcantara', 'managing director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(2, 1, 'joey server', 'chief creative director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(3, 1, 'rey tolentino', 'creative director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(4, 1, 'lita marte', 'finance director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(5, 1, 'tiger jimenez', 'senior art director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(6, 1, 'igine jose', 'technical director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(7, 1, 'paul salapantan', 'strategic planning director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(8, 1, 'vanessa julian', 'account director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', ''),
(9, 1, 'jessica salas', 'event director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view-logs', 'View logs', NULL, '2016-08-10 07:17:46', '2016-08-10 07:17:46'),
(3, 'view-user', 'View users', NULL, '2016-08-10 07:19:02', '2016-08-10 07:19:02'),
(4, 'add-user', 'Add user', NULL, '2016-08-10 07:19:26', '2016-08-10 07:19:26'),
(5, 'delete-user', 'Delete user', NULL, '2016-08-10 07:19:56', '2016-08-10 07:19:56'),
(6, 'edit-user', 'Edit user', NULL, '2016-08-10 07:20:58', '2016-08-10 07:20:58'),
(7, 'view-roles', 'View roles', NULL, '2016-08-10 07:21:35', '2016-08-10 07:21:35'),
(8, 'add-roles', 'Add roles', NULL, '2016-08-10 07:21:59', '2016-08-10 07:21:59'),
(9, 'delete-roles', 'Delete roles', NULL, '2016-08-10 07:22:22', '2016-08-10 07:22:22'),
(10, 'edit-roles', 'Edit roles', NULL, '2016-08-10 07:22:49', '2016-08-10 07:22:49'),
(11, 'view-page', 'View pages', NULL, '2016-08-10 07:23:52', '2016-08-10 07:23:52'),
(12, 'about-page', 'Edit about us page', NULL, '2016-08-10 07:24:21', '2016-08-10 07:24:21'),
(14, 'clients-page', 'Edit clients page', NULL, '2016-08-10 07:25:35', '2016-08-10 07:25:35'),
(15, 'portfolio-page', 'Edit portfolio page', NULL, '2016-08-10 07:26:12', '2016-08-10 07:26:12'),
(16, 'contact-page', 'View contact us page', NULL, '2016-08-10 07:26:33', '2016-08-10 07:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(7, 97),
(8, 95),
(9, 95),
(14, 101),
(15, 101),
(16, 101);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(10, 'test', 'Test', NULL, '2016-08-09 07:16:23', '2016-08-09 07:16:23'),
(11, 'www', 'Www', NULL, '2016-08-09 07:21:07', '2016-08-09 07:21:07'),
(12, 'sssss', 'Sssss', NULL, '2016-08-09 07:21:29', '2016-08-09 07:21:29'),
(13, 'fsdfd', 'Fsdfd', NULL, '2016-08-09 07:41:37', '2016-08-09 07:41:37'),
(14, 'sssfsd', 'Sssfsd', NULL, '2016-08-09 07:45:18', '2016-08-09 07:45:18'),
(15, 'sdfsdf', 'Sdfsdf', NULL, '2016-08-10 05:15:40', '2016-08-10 05:15:40'),
(16, 'ssssfdf', 'Ssssfdf', NULL, '2016-08-10 05:41:10', '2016-08-10 05:41:10'),
(17, 'sdf', 'Sdf', NULL, '2016-08-10 05:41:26', '2016-08-10 05:41:26'),
(18, 'sdfdsf3rf3', 'Sdfdsf3rf3', NULL, '2016-08-10 05:42:04', '2016-08-10 05:42:04'),
(89, 'sdfssssdf', 'Sdfssssdf', NULL, '2016-08-13 09:07:00', '2016-08-13 09:07:00'),
(90, 'sdf-sdf', 'Sdf Sdf', NULL, '2016-08-13 09:08:01', '2016-08-13 09:08:01'),
(91, 'fs-dfd-fdsf', 'Fs Dfd Fdsf', NULL, '2016-08-13 09:08:41', '2016-08-13 09:08:41'),
(92, 'sdfsssdf', 'Sdfsssdf', NULL, '2016-08-13 09:08:58', '2016-08-13 09:08:58'),
(93, 'sf-sdf', 'Sf Sdf', NULL, '2016-08-13 09:19:58', '2016-08-13 09:19:58'),
(94, 'df-sdfds', 'Df Sdfds', NULL, '2016-08-13 09:20:28', '2016-08-13 09:20:28'),
(95, 'sdf-sdf-d', 'Sdf Sdf D', NULL, '2016-08-13 09:21:23', '2016-08-13 09:21:23'),
(96, 'dsadsa', 'Dsadsa', NULL, '2016-08-13 09:21:35', '2016-08-13 09:21:35'),
(97, 'asdsad', 'Asdsad', NULL, '2016-08-15 06:22:09', '2016-08-15 06:22:09'),
(98, 'asdasdsadsadsad', 'Asdasdsadsadsad', NULL, '2016-08-15 06:22:21', '2016-08-15 06:22:21'),
(99, 'fgdfg', 'Fgdfg', NULL, '2016-08-15 07:01:23', '2016-08-15 07:01:23'),
(100, 'fgdfgbfdgdf', 'Fgdfgbfdgdf ', NULL, '2016-08-15 07:01:33', '2016-08-15 07:01:33'),
(101, 'sdfds-sf', 'Sdfds Sf', NULL, '2016-08-15 07:02:09', '2016-08-15 07:02:09'),
(102, 'sfsdf', 'Sfsdf', NULL, '2016-08-15 07:02:18', '2016-08-15 07:02:18'),
(103, 'dsf-sdfsd', 'Dsf Sdfsd', NULL, '2016-08-15 07:04:23', '2016-08-15 07:04:23'),
(104, 'sdf-sdfsdf', 'Sdf Sdfsdf', NULL, '2016-08-15 07:04:30', '2016-08-15 07:04:30'),
(105, 'fds-fdsf', 'Fds Fdsf', NULL, '2016-08-15 07:04:38', '2016-08-15 07:04:38'),
(106, 'sdfsd-sdf-d', 'Sdfsd Sdf D', NULL, '2016-08-15 07:05:01', '2016-08-15 07:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_category`
--
ALTER TABLE `page_category`
  ADD PRIMARY KEY (`page_category_id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`page_content_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `page_category`
--
ALTER TABLE `page_category`
  MODIFY `page_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `page_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
