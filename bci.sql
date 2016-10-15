-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 04:52 PM
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
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `activated`, `activation_code`, `activated_at`, `last_login`, `reset_password_code`, `remember_token`, `permissions`, `first_name`, `last_name`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'dan@mixminds.com', '$2y$10$661RfUHjRhZdR.8cbjceB.tDAtwNdZWpqFRLaAfJJdQzZXaG/gET2', 1, NULL, NULL, NULL, NULL, 'tiAjdNgHHR7dSNZDBokNpOamwHHKUwVObHZufcQnHL2DPYO5VzHxX46J14uv', 134, 'Dan', 'Cesa', 'm', '2016-07-22 19:07:28', '2016-10-01 05:09:50'),
(8, 'logyou@you.com', '$2y$10$uoDQZ6jbKdGXXl324Tx.w.q7mirfG84ftTcNEfu/pjVNFRxygnDyW', 1, NULL, NULL, NULL, NULL, 'CTZJBGTMJu1gAPhGowmFBT8AT6hRtzqKV8oUdMD5MjuWF2EnEZZdBnVZaSRB', 135, 'logger', 'logme', 'm', '2016-08-29 00:23:18', '2016-08-29 05:50:59'),
(9, 'divinacandelaria@mixminds.com', '$2y$10$Z8P1149/wBnIwUN6QT4sE.QXq9xjB6Y8s7pDJ6aKQEiquRXULgR0W', 1, NULL, NULL, NULL, NULL, NULL, 135, 'Divina', 'Candelaria', '', '2016-10-01 03:16:56', '2016-10-01 04:22:11');

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
(99, 1, 'App\\Role', 106, 'null', '{"name":"sdfsd-sdf-d","display_name":"Sdfsd Sdf D"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-15 07:05:01', '2016-08-15 07:05:01'),
(100, 1, 'App\\Role', 107, 'null', '{"name":"4234-24","display_name":"4234 24"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:15:41', '2016-08-16 15:15:41'),
(101, 1, 'App\\Role', 108, 'null', '{"name":"3123123","display_name":"3123123"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:15:50', '2016-08-16 15:15:50'),
(102, 1, 'App\\Role', 109, 'null', '{"name":"31231232","display_name":"31231232"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:15:57', '2016-08-16 15:15:57'),
(103, 1, 'App\\Role', 110, 'null', '{"name":"123-1312312312","display_name":"123 1312312312"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:16:05', '2016-08-16 15:16:05'),
(104, 1, 'App\\Role', 111, 'null', '{"name":"dsadsad","display_name":"Dsadsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:16:55', '2016-08-16 15:16:55'),
(105, 1, 'App\\Role', 112, 'null', '{"name":"dsad-sad-asdsa","display_name":"Dsad Sad Asdsa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:17:57', '2016-08-16 15:17:57'),
(106, 1, 'App\\Role', 113, 'null', '{"name":"fdsfsd-dsfsd","display_name":"Fdsfsd Dsfsd"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:19:09', '2016-08-16 15:19:09'),
(107, 1, 'App\\Role', 114, 'null', '{"name":"ds-sdfdf","display_name":"Ds Sdfdf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:19:22', '2016-08-16 15:19:22'),
(108, 1, 'App\\Role', 115, 'null', '{"name":"sd-asdasdasa","display_name":"Sd Asdasdasa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:20:55', '2016-08-16 15:20:55'),
(109, 1, 'App\\Role', 116, 'null', '{"name":"sd-dsfdsf","display_name":"Sd Dsfdsf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:21:17', '2016-08-16 15:21:17'),
(110, 1, 'App\\Role', 117, 'null', '{"name":"sdf-sdff","display_name":"Sdf Sdff"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:21:42', '2016-08-16 15:21:42'),
(111, 1, 'App\\Role', 118, 'null', '{"name":"sdfd-fdsf","display_name":"Sdfd Fdsf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:22:20', '2016-08-16 15:22:20'),
(112, 1, 'App\\Role', 119, 'null', '{"name":"dsad-sad","display_name":"Dsad Sad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:23:44', '2016-08-16 15:23:44'),
(113, 1, 'App\\Role', 120, 'null', '{"name":"sadsadsad","display_name":"Sadsadsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:23:59', '2016-08-16 15:23:59'),
(114, 1, 'App\\Role', 121, 'null', '{"name":"asd-asdsad","display_name":"Asd Asdsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:24:30', '2016-08-16 15:24:30'),
(115, 1, 'App\\Role', 122, 'null', '{"name":"asdsadsa","display_name":"Asdsadsa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:24:37', '2016-08-16 15:24:37'),
(116, 1, 'App\\Role', 123, 'null', '{"name":"sad-sadsad","display_name":"Sad Sadsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:25:01', '2016-08-16 15:25:01'),
(117, 1, 'App\\Role', 124, 'null', '{"name":"sdsadasdsadsa21-21312","display_name":"Sdsadasdsadsa21 21312"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:25:10', '2016-08-16 15:25:10'),
(118, 1, 'App\\Role', 125, 'null', '{"name":"124y-g34r231-t5r324","display_name":"124y G34r231 T5r324"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:25:22', '2016-08-16 15:25:22'),
(119, 1, 'App\\Role', 126, 'null', '{"name":"sdfsdfsdf","display_name":" Sdfsdfsdf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:32:02', '2016-08-16 15:32:02'),
(120, 1, 'App\\Role', 127, 'null', '{"name":"dsa-asdsa","display_name":"Dsa Asdsa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-16 15:32:16', '2016-08-16 15:32:16'),
(121, 1, 'App\\Role', 128, 'null', '{"name":"dasdsad","display_name":"Dasdsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:09:01', '2016-08-19 06:09:01'),
(122, 1, 'App\\Role', 129, 'null', '{"name":"ddsadsa","display_name":"Ddsadsa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:12:19', '2016-08-19 06:12:19'),
(123, 1, 'App\\Role', 130, 'null', '{"name":"dsads","display_name":"Dsads"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:12:29', '2016-08-19 06:12:29'),
(124, 1, 'App\\Role', 131, 'null', '{"name":"sdsad","display_name":"Sdsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:12:49', '2016-08-19 06:12:49'),
(125, 1, 'App\\Role', 132, 'null', '{"name":"sad-asd","display_name":"Sad Asd"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:13:12', '2016-08-19 06:13:12'),
(126, 1, 'App\\Role', 133, 'null', '{"name":"sadsads","display_name":"Sadsads"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 06:13:23', '2016-08-19 06:13:23'),
(127, 1, 'App\\Role', 134, 'null', '{"name":"dsadsad","display_name":"Dsadsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 07:01:35', '2016-08-19 07:01:35'),
(128, 1, 'App\\Role', 135, 'null', '{"name":"1111111","display_name":"1111111"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 07:09:46', '2016-08-19 07:09:46'),
(129, 1, 'App\\Role', 136, 'null', '{"name":"sdfdsfdsf","display_name":"Sdfdsfdsf"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-19 07:51:06', '2016-08-19 07:51:06'),
(130, 1, 'App\\Role', 132, 'null', '{"name":"sadsad","display_name":"Sadsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-20 03:55:51', '2016-08-20 03:55:51'),
(131, 1, 'App\\Role', 133, 'null', '{"name":"sdsad22","display_name":"Sdsad22"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-20 03:56:00', '2016-08-20 03:56:00'),
(132, 1, 'App\\Role', 134, 'null', '{"name":"super-administrator","display_name":"Super Administrator"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-20 07:05:29', '2016-08-20 07:05:29'),
(133, 1, 'App\\AdminsTB', 1, '{"remember_token":"eTM8Fk7SdJ91ycfxOW6HmnUpKVe09eMdWdz2AwkaVlOzltH1WxX01MYgf49O"}', '{"remember_token":"Z37o5QGlDR3dRH95YdNieAGE2riWRQs2VzfEHgpAyR5SrLfuFkDpiIZ9sBXz"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-20 07:21:07', '2016-08-20 07:21:07'),
(134, 1, 'App\\Role', 135, 'null', '{"name":"lll","display_name":"Lll"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-24 06:06:20', '2016-08-24 06:06:20'),
(135, 1, 'App\\AdminsTB', 2, 'null', '{"email":"asdsad@sdfdsf.com","first_name":"dsa","last_name":"asdsad","gender":"m","password":"$2y$10$FtfmP05xuo8PSi8mQ0uoE.QbGzWg.sMqEuVTiZAh.Iis.nFuCIfIu"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 18:44:39', '2016-08-28 18:44:39'),
(136, 1, 'App\\AdminsTB', 3, 'null', '{"email":"asdsad@sdfdsf.com","first_name":"dsa","last_name":"asdsad","gender":"m","password":"$2y$10$NBJN7LuNXjjWMDmIDNuluujU3Vwp4tYiItaZB33zn1qwpRmVqDqzq"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 18:44:55', '2016-08-28 18:44:55'),
(137, 1, 'App\\AdminsTB', 4, 'null', '{"email":"test@test.com","first_name":"test","last_name":"test","gender":"f","password":"$2y$10$XPIQ.NmWFahxU23znUfNfui9Ug.ITvoLrhjC4..oHbqM421YRN1MK"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 18:48:56', '2016-08-28 18:48:56'),
(138, 1, 'App\\AdminsTB', 5, 'null', '{"email":"asdas@sdfdsfd.com","first_name":"test","last_name":"test","gender":"m","password":"$2y$10$qv3OzjCi.Y1KgL\\/guPpz9e0lSwxIpoZb5bpNKfZ4a9preahtDb242","activated":1}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 18:53:22', '2016-08-28 18:53:22'),
(139, 1, 'App\\AdminsTB', 6, 'null', '{"email":"dsfsdf@fsdfsdf.com","first_name":"sdfdsf","last_name":"dsfsdfsdf","gender":"m","password":"$2y$10$SA3O6517ZuWNEbECfY5MXeAXseuCRt25cM.RoxxeEzs6FyzH\\/65fG","activated":1}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 18:59:57', '2016-08-28 18:59:57'),
(140, 1, 'App\\AdminsTB', 7, 'null', '{"email":"fsdfsdf@asdasd.com","first_name":"sdfdsf","last_name":"sdfsdfsd","gender":"f","password":"$2y$10$iFUSNhkQoYPwr1FmQPMkge\\/2k5ZV0WxySRJ6ZaO23KT0sQ6rUKET.","activated":"0","permissions":"134"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-28 22:46:00', '2016-08-28 22:46:00'),
(141, 1, 'App\\AdminsTB', 7, '{"password":"$2y$10$iFUSNhkQoYPwr1FmQPMkge\\/2k5ZV0WxySRJ6ZaO23KT0sQ6rUKET.","gender":"f"}', '{"password":"$2y$10$7YUaXZZ4Z.RYwhQ05oRzEOrgqSx.afcGyc6aijJ0QilPif9vigmqy","gender":"m"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/7', '::1', '2016-08-29 00:19:56', '2016-08-29 00:19:56'),
(142, 1, 'App\\AdminsTB', 7, '{"password":"$2y$10$7YUaXZZ4Z.RYwhQ05oRzEOrgqSx.afcGyc6aijJ0QilPif9vigmqy","last_name":"sdfsdfsd"}', '{"password":"$2y$10$blYoXPSJI7cYHpw650V8\\/O2wWV3gygZ4u6H95Gz09HD252vDu9RES","last_name":"sdfsdfsdqq"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/7', '::1', '2016-08-29 00:20:56', '2016-08-29 00:20:56'),
(143, 1, 'App\\AdminsTB', 7, '{"password":"$2y$10$blYoXPSJI7cYHpw650V8\\/O2wWV3gygZ4u6H95Gz09HD252vDu9RES"}', '{"password":"$2y$10$kUBlOtdE7EsQ2loY90Avt.b8Tq9mdB4Em7jGKV3nUGV3bO3J\\/at6y"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/7', '::1', '2016-08-29 00:21:08', '2016-08-29 00:21:08'),
(144, 1, 'App\\AdminsTB', 7, '{"password":"$2y$10$kUBlOtdE7EsQ2loY90Avt.b8Tq9mdB4Em7jGKV3nUGV3bO3J\\/at6y","first_name":"sdfdsf","last_name":"sdfsdfsdqq"}', '{"password":"$2y$10$ivJaqqBDb421D6xMhCqneudpXSGPdUFRmKdDQk47e48fSp1Cjm7pi","first_name":"qq","last_name":"qq"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/7', '::1', '2016-08-29 00:21:32', '2016-08-29 00:21:32'),
(145, 1, 'App\\AdminsTB', 7, '{"password":"$2y$10$ivJaqqBDb421D6xMhCqneudpXSGPdUFRmKdDQk47e48fSp1Cjm7pi"}', '{"password":"$2y$10$oPUCE2HWJn9npBLIPUkRSOW\\/WXLXjtJSaThvXH5kpWiG5BVBj6Zk."}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/7', '::1', '2016-08-29 00:21:47', '2016-08-29 00:21:47'),
(146, 1, 'App\\Role', 135, 'null', '{"name":"logger","display_name":"Logger"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-08-29 00:22:27', '2016-08-29 00:22:27'),
(147, 1, 'App\\AdminsTB', 1, '{"password":"$2y$10$dsNMSDKAutQa227TYfXxbuBpzGOwBdVhsbYPlFP.VqQ.Qlk5zPNWK","permissions":0,"gender":"f"}', '{"password":"$2y$10$wN3htzTmjrHYF\\/qQR5r.nO.EIjjY6.07IvgILcNzlHjVPMpERGgwK","permissions":"134","gender":"m"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/1', '::1', '2016-08-29 00:22:52', '2016-08-29 00:22:52'),
(148, 1, 'App\\AdminsTB', 8, 'null', '{"email":"logyou@you.com","first_name":"logger","last_name":"logme","gender":"m","password":"$2y$10$uoDQZ6jbKdGXXl324Tx.w.q7mirfG84ftTcNEfu\\/pjVNFRxygnDyW","activated":"1","permissions":"135"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-08-29 00:23:18', '2016-08-29 00:23:18'),
(149, 1, 'App\\AdminsTB', 1, '{"password":"$2y$10$wN3htzTmjrHYF\\/qQR5r.nO.EIjjY6.07IvgILcNzlHjVPMpERGgwK","activated":0}', '{"password":"$2y$10$.aIDDSF.2bB33Y\\/1WcDnPe\\/6fsJIUJW9\\/v9Zdxzhs8WIgYyUGf5F2","activated":"1"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/1', '::1', '2016-08-29 05:25:26', '2016-08-29 05:25:26'),
(150, 1, 'App\\AdminsTB', 1, '{"remember_token":"Z37o5QGlDR3dRH95YdNieAGE2riWRQs2VzfEHgpAyR5SrLfuFkDpiIZ9sBXz"}', '{"remember_token":"WWTAdUEyuMYFYc3Ad65Lww7u2lxuQiXLXLLndND1qqWu7D0v5JOfp2Be7GLX"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:41:55', '2016-08-29 05:41:55'),
(151, 1, 'App\\AdminsTB', 1, '{"remember_token":"WWTAdUEyuMYFYc3Ad65Lww7u2lxuQiXLXLLndND1qqWu7D0v5JOfp2Be7GLX"}', '{"remember_token":"E3tYxICOA2HiZl0QWEH1vIWQJGoEtAoBAYkjKu0aBEJsCPK74SFcxpZL5M7F"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:42:33', '2016-08-29 05:42:33'),
(152, 8, 'App\\AdminsTB', 8, '{"remember_token":null}', '{"remember_token":"OMuwFZOxaXF6GClFg9PYszolvXbxIhPSY8Wi47D3ssaI20c0TNdsRBOntF4G"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:43:06', '2016-08-29 05:43:06'),
(153, 1, 'App\\AdminsTB', 1, '{"remember_token":"E3tYxICOA2HiZl0QWEH1vIWQJGoEtAoBAYkjKu0aBEJsCPK74SFcxpZL5M7F"}', '{"remember_token":"5zjJnIwsuFckqkQC0CiBeKbyyH8MIC5J4jHPF1Cz4SnG5UXWOscJ2Qn4KLFA"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:43:26', '2016-08-29 05:43:26'),
(154, 8, 'App\\AdminsTB', 8, '{"remember_token":"OMuwFZOxaXF6GClFg9PYszolvXbxIhPSY8Wi47D3ssaI20c0TNdsRBOntF4G"}', '{"remember_token":"0ezNwQCw8qUWbLbxYeYCjggRnvPQr5lL3F7fYMeV8LvLqnWYdSE0HzdB5XJC"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:43:37', '2016-08-29 05:43:37'),
(155, 1, 'App\\AdminsTB', 1, '{"password":"$2y$10$.aIDDSF.2bB33Y\\/1WcDnPe\\/6fsJIUJW9\\/v9Zdxzhs8WIgYyUGf5F2"}', '{"password":"$2y$10$661RfUHjRhZdR.8cbjceB.tDAtwNdZWpqFRLaAfJJdQzZXaG\\/gET2"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/1', '::1', '2016-08-29 05:44:55', '2016-08-29 05:44:55'),
(156, 1, 'App\\AdminsTB', 1, '{"remember_token":"5zjJnIwsuFckqkQC0CiBeKbyyH8MIC5J4jHPF1Cz4SnG5UXWOscJ2Qn4KLFA"}', '{"remember_token":"5Tf5ln5JiJuyX6uwmf9nvLCsRzfvSoZAUqCjTfMI8Ygz8PiunqrWrLy5Jmr0"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:45:39', '2016-08-29 05:45:39'),
(157, 1, 'App\\AdminsTB', 1, '{"remember_token":"5Tf5ln5JiJuyX6uwmf9nvLCsRzfvSoZAUqCjTfMI8Ygz8PiunqrWrLy5Jmr0"}', '{"remember_token":"ENxjDo5YtAAYSkJybwjOw4NOmyHxwsnsMVEadZ8ShEFOuC86uo3Lo96MxATi"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:47:18', '2016-08-29 05:47:18'),
(158, 8, 'App\\AdminsTB', 8, '{"remember_token":"0ezNwQCw8qUWbLbxYeYCjggRnvPQr5lL3F7fYMeV8LvLqnWYdSE0HzdB5XJC"}', '{"remember_token":"CTZJBGTMJu1gAPhGowmFBT8AT6hRtzqKV8oUdMD5MjuWF2EnEZZdBnVZaSRB"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-08-29 05:50:59', '2016-08-29 05:50:59'),
(159, 1, 'App\\AdminsTB', 1, '{"remember_token":"ENxjDo5YtAAYSkJybwjOw4NOmyHxwsnsMVEadZ8ShEFOuC86uo3Lo96MxATi"}', '{"remember_token":"iu71tbTcxY0bEWxjPxTysjOyhcYM0vpt4K1bhmf0Lv8Q8Pu7iNXDM6uZv2HK"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 00:57:57', '2016-10-01 00:57:57'),
(160, 1, 'App\\AdminsTB', 1, '{"remember_token":"iu71tbTcxY0bEWxjPxTysjOyhcYM0vpt4K1bhmf0Lv8Q8Pu7iNXDM6uZv2HK"}', '{"remember_token":"NhhHs3nJ95jL0bLd8ptFQwSHibZc8LWmtm0tVkZdT2DaSbJ77iIcbb1Hm5P8"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 00:58:38', '2016-10-01 00:58:38'),
(161, 1, 'App\\AdminsTB', 1, '{"remember_token":"NhhHs3nJ95jL0bLd8ptFQwSHibZc8LWmtm0tVkZdT2DaSbJ77iIcbb1Hm5P8"}', '{"remember_token":"GUAeTJqRzomK8hGdZccR4R1aFc623r3s2cudsWjchVWeFb4h6mbLFmJFDgbn"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 00:58:57', '2016-10-01 00:58:57'),
(162, 1, 'App\\AdminsTB', 1, '{"remember_token":"GUAeTJqRzomK8hGdZccR4R1aFc623r3s2cudsWjchVWeFb4h6mbLFmJFDgbn"}', '{"remember_token":"bHF9RDWZ01cSQ27JbDG54EN7eysVx3tgbsKHCj3RGUjBFliX5HEpaduJxy3P"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 01:24:10', '2016-10-01 01:24:10'),
(163, 1, 'App\\AdminsTB', 1, '{"remember_token":"bHF9RDWZ01cSQ27JbDG54EN7eysVx3tgbsKHCj3RGUjBFliX5HEpaduJxy3P"}', '{"remember_token":"SoAZkLubCkBcS9AfjFAuLvxazmlvh5zLavpHgRVjg6A17jpKvEnCB4tt7x8Z"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 01:26:27', '2016-10-01 01:26:27'),
(164, 1, 'App\\AdminsTB', 9, 'null', '{"email":"divinacandelaria@mixminds.com","first_name":"Divina","last_name":"Candelaria","password":"$2y$10$9Kxjraqeg\\/ll5AnWa.j8VunzWkkfyljmx.9XbU7wFpjT3Dc6Z3Ap6","activated":"1","permissions":"134"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-10-01 03:16:56', '2016-10-01 03:16:56'),
(165, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$9Kxjraqeg\\/ll5AnWa.j8VunzWkkfyljmx.9XbU7wFpjT3Dc6Z3Ap6"}', '{"password":"$2y$10$qd\\/aGFIEQg\\/.K5K6.zIAzOIeLQrtS8lHZgYEdF3PeChcOjInT27Sm"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 03:40:37', '2016-10-01 03:40:37'),
(166, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$qd\\/aGFIEQg\\/.K5K6.zIAzOIeLQrtS8lHZgYEdF3PeChcOjInT27Sm"}', '{"password":"$2y$10$kf1q5EA5vMAayKcyyZ6y9eGR.9lw0jliaPcj7vsQsxpBcqsaJC\\/BO"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 03:40:44', '2016-10-01 03:40:44'),
(167, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$kf1q5EA5vMAayKcyyZ6y9eGR.9lw0jliaPcj7vsQsxpBcqsaJC\\/BO"}', '{"password":"$2y$10$yBGf6uH9YF09RE\\/EusuCm.ncyr.dnfmnfbPK3Jj4XFsr5QvX4fJOG"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 04:20:18', '2016-10-01 04:20:18'),
(168, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$yBGf6uH9YF09RE\\/EusuCm.ncyr.dnfmnfbPK3Jj4XFsr5QvX4fJOG"}', '{"password":"$2y$10$MZR8AKsUiGF60WlcK07Yiu9ZzxG5apeNehgZqQE1v2ot3ntGhJuAe"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 04:20:30', '2016-10-01 04:20:30'),
(169, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$MZR8AKsUiGF60WlcK07Yiu9ZzxG5apeNehgZqQE1v2ot3ntGhJuAe"}', '{"password":"$2y$10$ypZb8.pLUYIlrqy2lCsAoupBlNhpm6Wj99iqt0ZsrQ16Yf353nMJa"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 04:20:47', '2016-10-01 04:20:47'),
(170, 1, 'App\\AdminsTB', 9, '{"password":"$2y$10$ypZb8.pLUYIlrqy2lCsAoupBlNhpm6Wj99iqt0ZsrQ16Yf353nMJa","permissions":134}', '{"password":"$2y$10$Z8P1149\\/wBnIwUN6QT4sE.QXq9xjB6Y8s7pDJ6aKQEiquRXULgR0W","permissions":"135"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/user-management/9', '::1', '2016-10-01 04:22:11', '2016-10-01 04:22:11'),
(171, 1, 'App\\AdminsTB', 10, 'null', '{"email":"sdfsd@fsdfd.com","first_name":"sdfs","last_name":"ssdfd","password":"$2y$10$rC5v3UsQj8VeNApeJo1TvODMru2DQNR2B2moavdRxLOm5928OjBqO","activated":"0","permissions":"135"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-10-01 04:24:58', '2016-10-01 04:24:58'),
(172, 1, 'App\\AdminsTB', 11, 'null', '{"email":"sadasdas@sdfdsf.com","first_name":"asdsad","last_name":"sa","password":"$2y$10$owXY\\/J6iQbJkuRfpkL0Ny.TJ1zOyte6ED\\/2KdhnpRhrKjOEUEC3Zm","activated":"0","permissions":"135"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/user-management', '::1', '2016-10-01 04:25:47', '2016-10-01 04:25:47'),
(173, 1, 'App\\Role', 136, 'null', '{"name":"asdsad","display_name":"Asdsad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-10-01 04:39:33', '2016-10-01 04:39:33'),
(174, 1, 'App\\Role', 137, 'null', '{"name":"asdsadssss","display_name":"Asdsadssss"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-10-01 04:40:57', '2016-10-01 04:40:57'),
(175, 1, 'App\\Role', 138, 'null', '{"name":"asdsa","display_name":"Asdsa"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/role-and-permission', '::1', '2016-10-01 04:41:46', '2016-10-01 04:41:46'),
(176, 1, 'App\\AdminsTB', 1, '{"remember_token":"SoAZkLubCkBcS9AfjFAuLvxazmlvh5zLavpHgRVjg6A17jpKvEnCB4tt7x8Z"}', '{"remember_token":"tiAjdNgHHR7dSNZDBokNpOamwHHKUwVObHZufcQnHL2DPYO5VzHxX46J14uv"}', 'updated', 'http://localhost/admin/admin-bci/public/web-admin/logout', '::1', '2016-10-01 05:09:50', '2016-10-01 05:09:50'),
(177, 1, 'App\\PageVideos', 1, 'null', '{"page_content_id":"11","video_link":"ad  asdasdasd asd asd sad"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-08 06:08:05', '2016-10-08 06:08:05'),
(178, 1, 'App\\PageVideos', 2, 'null', '{"page_content_id":"11","video_link":"https:\\/\\/www.youtube.com\\/watch?v=Tqx04n2_UHk"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-08 06:10:36', '2016-10-08 06:10:36'),
(179, 1, 'App\\PageVideos', 3, 'null', '{"page_content_id":"11","video_link":"https:\\/\\/www.youtube.com\\/watch?v=DP3wEjE1ng4"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-08 06:17:31', '2016-10-08 06:17:31'),
(180, 1, 'App\\PageVideos', 4, 'null', '{"page_content_id":"11","video_link":"https:\\/\\/www.youtube.com\\/watch?v=hUO-sRLotOI"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-08 07:12:16', '2016-10-08 07:12:16'),
(181, 1, 'App\\PageVideos', 5, 'null', '{"page_content_id":"12","video_link":"https:\\/\\/www.youtube.com\\/watch?v=EnzA6mHQrog"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-08 07:14:17', '2016-10-08 07:14:17'),
(182, 1, 'App\\PageVideos', 6, 'null', '{"page_content_id":"11","page_category_id":3,"video_link":"https:\\/\\/www.youtube.com\\/watch?v=bvC_0foemLY&index=92&list=PLx0sYbCqOb8QTF1DCJVfQrtWknZFzuoAE"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-management/save-video', '::1', '2016-10-12 07:25:50', '2016-10-12 07:25:50'),
(183, 1, 'App\\PrintAd', 1, 'null', '{"print_image":"20161015081110-1st ram.PNG"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-uploads', '::1', '2016-10-15 00:11:10', '2016-10-15 00:11:10'),
(184, 1, 'App\\PrintAd', 2, 'null', '{"print_image":"20161015081227-Capture.PNG"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-uploads', '::1', '2016-10-15 00:12:27', '2016-10-15 00:12:27'),
(185, 1, 'App\\PrintAd', 3, 'null', '{"print_image":"20161015081822-speed.PNG"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-uploads', '::1', '2016-10-15 00:18:22', '2016-10-15 00:18:22'),
(186, 1, 'App\\PrintAd', 4, 'null', '{"print_image":"20161015082255-1st ram.PNG"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-uploads', '::1', '2016-10-15 00:22:55', '2016-10-15 00:22:55'),
(187, 1, 'App\\PrintAd', 5, 'null', '{"print_image":"20161015082258-Capture.PNG"}', 'created', 'http://localhost/admin/admin-bci/public/web-admin/page-uploads', '::1', '2016-10-15 00:22:58', '2016-10-15 00:22:58'),
(188, 1, 'App\\SubClients', 1, 'null', '{"subclient_image":"20161015131406-gallery_img_1.png"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 05:14:08', '2016-10-15 05:14:08'),
(189, 1, 'App\\SubClients', 2, 'null', '{"subclient_image":"20161015132638-2.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 05:26:38', '2016-10-15 05:26:38'),
(190, 1, 'App\\SubClients', 3, 'null', '{"subclient_image":"20161015142434-7.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:24:34', '2016-10-15 06:24:34'),
(191, 1, 'App\\SubClients', 4, 'null', '{"subclient_image":"20161015142458-4.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:24:59', '2016-10-15 06:24:59'),
(192, 1, 'App\\SubClients', 5, 'null', '{"subclient_image":"20161015142519-6.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:25:19', '2016-10-15 06:25:19'),
(193, 1, 'App\\SubClients', 6, 'null', '{"subclient_image":"20161015142531-5.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:25:31', '2016-10-15 06:25:31'),
(194, 1, 'App\\SubClients', 7, 'null', '{"subclient_image":"20161015142545-9.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:25:45', '2016-10-15 06:25:45'),
(195, 1, 'App\\SubClients', 8, 'null', '{"subclient_image":"20161015142601-3.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:26:01', '2016-10-15 06:26:01'),
(196, 1, 'App\\SubClients', 9, 'null', '{"subclient_image":"20161015142611-8.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:26:11', '2016-10-15 06:26:11'),
(197, 1, 'App\\SubClients', 10, 'null', '{"subclient_image":"20161015142619-10.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:26:20', '2016-10-15 06:26:20'),
(198, 1, 'App\\SubClients', 11, 'null', '{"subclient_image":"20161015142632-11.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:26:33', '2016-10-15 06:26:33');
INSERT INTO `logs` (`id`, `user_id`, `owner_type`, `owner_id`, `old_value`, `new_value`, `type`, `route`, `ip`, `created_at`, `updated_at`) VALUES
(199, 1, 'App\\SubClients', 12, 'null', '{"subclient_image":"20161015143215-1.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:32:15', '2016-10-15 06:32:15'),
(200, 1, 'App\\SubClients', 13, 'null', '{"subclient_image":"20161015143504-1.png","page_content_id":"25"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:35:04', '2016-10-15 06:35:04'),
(201, 1, 'App\\SubClients', 14, 'null', '{"subclient_image":"20161015144512-panasonic.png","page_content_id":"18"}', 'created', 'http://localhost/bci-admin/public/web-admin/page-uploads', '::1', '2016-10-15 06:45:12', '2016-10-15 06:45:12');

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
('2016_08_08_142115_entrust_setup_tables', 4),
('2016_10_01_090137_create_ui-log_table', 5),
('2016_10_08_104606_create_page_videos', 6),
('2016_10_15_080200_create_print_ad', 7),
('2016_10_15_125834_create_subclient', 8);

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
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_category`
--

INSERT INTO `page_category` (`page_category_id`, `page_category_name`, `page_description`, `meta_description`, `meta_keywords`, `image`, `created_at`, `updated_at`) VALUES
(1, 'about-us', '2222', 'this is a teasdasdas dasdsa dasd sad asd asdasd asdasd asd adasd asd asd asdsa asd asd asd asd sad sad asd asd asd asd as sa as dst', 'test me, wew, ', 'about-us.PNG', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(2, 'clients', 'test', 'asdas', 'dsad,sfdsf sdfs, sdfsdfdsf', NULL, '2016-10-01 12:53:51', '2016-10-01 04:53:51'),
(3, 'portfolio', 'test', 'df sdf', 'dsf', NULL, '2016-10-01 12:52:50', '2016-10-01 04:52:50'),
(4, 'contact-us', 'test', 'asdas', 'dsad,sfdsf sdfs, sdfsdfdsf', NULL, '2016-10-01 12:54:33', '2016-10-01 04:54:33');

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
  `client_text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `client_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolio_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolio_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `career_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inquiry_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_content_id`, `page_category_id`, `director_name`, `director_position`, `director_desc`, `client_text`, `client_image`, `portfolio_text`, `portfolio_image`, `url`, `fb_link`, `linkedin`, `career_email`, `inquiry_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'gemma g. alcantara', 'chairman & managing director', 'asd                                ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(2, 1, 'ernest fritz server jr.', 'chief creative director', 'asd                                   ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(3, 1, 'reynaldo tolentino', 'creative director', 'Evolve or dissolve, life is just changing too fast.                                                     ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(4, 1, 'carmelita marte', 'finance & admin manager', 'Take any challenge as a creative opportunity. (Alexandra Watkins)                                        ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(5, 1, 'lysander antonio jimenez', 'senior art director', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.                                                    ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(6, 1, 'luigina mari jose', 'senior manager technical department head', '“Technical Director, Aspiring Painter, (Still) Frustrated Singer and a (Former) Frustrated Filmmaker and Scriptwriter”                                                 ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(7, 1, 'paul robert salapantan', 'strategic business consultant', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.                                                    ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(8, 1, 'vanessa vera julian', 'group account director', 'We will perish without passion. “Working hard for something we don’t care about is called stress; working hard for something we love is called passion” – Simon Sinek.                                                  ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(9, 1, 'jessica ana salas', 'senior manager, production mgt.head', 'Lorem ipsum. Lorem ipsum. Lorem ipsum.                                                    ', '', '', '', '', '', '', '', '', '', '2016-10-01 12:48:37', '2016-10-01 04:48:37'),
(10, 4, '', '', '', '', '', '', '', '', 'https://www.facebook.com/bci-enav', 'https://www.linkedin.com/company/bci-enav', 'career@bci-enav.com', 'inquiry@bci-enav.com', '2016-10-01 12:54:33', '2016-10-01 04:54:33'),
(11, 3, '', '', '', '', '', 'tv', '20161015065509-tv.png', '', '', '', '', '', '2016-10-15 06:55:09', '2016-10-14 22:55:09'),
(12, 3, '', '', '', '', '', 'print', 'print.png', '', '', '', '', '', '2016-10-01 12:52:49', '2016-10-01 04:52:49'),
(13, 3, '', '', '', '', '', 'activation', 'activations.png', '', '', '', '', '', '2016-10-01 12:52:49', '2016-10-01 04:52:49'),
(14, 3, '', '', '', '', '', 'event', 'events.png', '', '', '', '', '', '2016-10-01 12:52:49', '2016-10-01 04:52:49'),
(15, 3, '', '', '', '', '', 'shopper marketing', 'shopper.png', '', '', '', '', '', '2016-10-01 12:52:49', '2016-10-01 04:52:49'),
(16, 3, '', '', '', '', '', 'ooh', 'ooh.png', '', '', '', '', '', '2016-10-01 12:52:49', '2016-10-01 04:52:49'),
(17, 3, '', '', '', '', '', 'digital', 'digital.png', '', '', '', '', '', '2016-10-01 12:52:50', '2016-10-01 04:52:50'),
(18, 2, '', '', '', 'panasonic', '20161015065300-panasonic.png', '', '', '', '', '', '', '', '2016-10-15 06:53:00', '2016-10-14 22:53:00'),
(19, 2, '', '', '', 'forex', 'forex.png', '', '', '', '', '', '', '', '2016-09-27 15:01:07', '0000-00-00 00:00:00'),
(20, 2, '', '', '', 'ucpb', 'ucpb.png', '', '', '', '', '', '', '', '2016-09-27 15:01:12', '0000-00-00 00:00:00'),
(21, 2, '', '', '', 'microsoft', 'microsoft.png', '', '', '', '', '', '', '', '2016-09-27 15:01:24', '0000-00-00 00:00:00'),
(22, 2, '', '', '', 'accenture', 'accenture.png', '', '', '', '', '', '', '', '2016-09-27 15:01:21', '0000-00-00 00:00:00'),
(23, 2, '', '', '', 'dbp', 'dbp.png', '', '', '', '', '', '', '', '2016-09-27 15:01:29', '0000-00-00 00:00:00'),
(24, 2, '', '', '', 'scent shop', 'scentshop.png', '', '', '', '', '', '', '', '2016-09-27 15:01:37', '0000-00-00 00:00:00'),
(25, 2, '', '', '', 'mitsubishi', 'Mitsubishi.png', '', '', '', '', '', '', '', '2016-09-27 15:01:48', '0000-00-00 00:00:00'),
(26, 2, '', '', '', 'blue', 'blue.png', '', '', '', '', '', '', '', '2016-09-27 15:01:59', '0000-00-00 00:00:00'),
(27, 2, '', '', '', 'bpi', 'bpi.png', '', '', '', '', '', '', '', '2016-09-27 15:02:02', '0000-00-00 00:00:00'),
(28, 2, '', '', '', 'metrobank', 'metrobank.png', '', '', '', '', '', '', '', '2016-09-27 15:02:09', '0000-00-00 00:00:00'),
(29, 2, '', '', '', 'ritemed', 'ritemed.png', '', '', '', '', '', '', '', '2016-09-27 15:02:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page_videos`
--

CREATE TABLE `page_videos` (
  `page_video_id` int(10) UNSIGNED NOT NULL,
  `page_content_id` int(11) NOT NULL,
  `page_category_id` int(11) NOT NULL,
  `video_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_videos`
--

INSERT INTO `page_videos` (`page_video_id`, `page_content_id`, `page_category_id`, `video_link`, `created_at`, `updated_at`) VALUES
(2, 11, 3, 'https://www.youtube.com/watch?v=Tqx04n2_UHk', '2016-10-08 06:10:36', '2016-10-08 06:10:36'),
(4, 11, 3, 'https://www.youtube.com/watch?v=hUO-sRLotOI', '2016-10-08 07:12:16', '2016-10-08 07:12:16'),
(6, 11, 3, 'https://www.youtube.com/watch?v=bvC_0foemLY&index=92&list=PLx0sYbCqOb8QTF1DCJVfQrtWknZFzuoAE', '2016-10-12 07:25:50', '2016-10-12 07:25:50');

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
(1, 134),
(1, 135),
(1, 138),
(3, 134),
(3, 138),
(4, 134),
(5, 134),
(6, 134),
(7, 134),
(8, 134),
(9, 134),
(10, 134),
(11, 134),
(12, 134),
(14, 134),
(15, 134),
(16, 134);

-- --------------------------------------------------------

--
-- Table structure for table `print_ad`
--

CREATE TABLE `print_ad` (
  `print_ad_id` int(10) UNSIGNED NOT NULL,
  `print_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `print_ad`
--

INSERT INTO `print_ad` (`print_ad_id`, `print_image`, `created_at`, `updated_at`) VALUES
(4, '20161015082255-1st ram.PNG', '2016-10-15 00:22:55', '2016-10-15 00:22:55'),
(5, '20161015082258-Capture.PNG', '2016-10-15 00:22:58', '2016-10-15 00:22:58');

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
(134, 'super-administrator', 'Super Administrator', NULL, '2016-08-20 07:05:29', '2016-08-20 07:05:29'),
(135, 'logger', 'Logger', NULL, '2016-08-29 00:22:27', '2016-08-29 00:22:27'),
(138, 'asdsa', 'Asdsa', NULL, '2016-10-01 04:41:46', '2016-10-01 04:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 134),
(8, 135),
(9, 135);

-- --------------------------------------------------------

--
-- Table structure for table `sub_clients`
--

CREATE TABLE `sub_clients` (
  `sub_clients_id` int(10) UNSIGNED NOT NULL,
  `page_content_id` int(11) NOT NULL,
  `subclient_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_clients`
--

INSERT INTO `sub_clients` (`sub_clients_id`, `page_content_id`, `subclient_image`, `created_at`, `updated_at`) VALUES
(2, 25, '20161015132638-2.png', '2016-10-15 05:26:38', '2016-10-15 05:26:38'),
(3, 25, '20161015142434-7.png', '2016-10-15 06:24:34', '2016-10-15 06:24:34'),
(4, 25, '20161015142458-4.png', '2016-10-15 06:24:59', '2016-10-15 06:24:59'),
(5, 25, '20161015142519-6.png', '2016-10-15 06:25:19', '2016-10-15 06:25:19'),
(6, 25, '20161015142531-5.png', '2016-10-15 06:25:31', '2016-10-15 06:25:31'),
(7, 25, '20161015142545-9.png', '2016-10-15 06:25:45', '2016-10-15 06:25:45'),
(8, 25, '20161015142601-3.png', '2016-10-15 06:26:01', '2016-10-15 06:26:01'),
(9, 25, '20161015142611-8.png', '2016-10-15 06:26:11', '2016-10-15 06:26:11'),
(10, 25, '20161015142619-10.png', '2016-10-15 06:26:19', '2016-10-15 06:26:19'),
(11, 25, '20161015142632-11.png', '2016-10-15 06:26:32', '2016-10-15 06:26:32'),
(13, 25, '20161015143504-1.png', '2016-10-15 06:35:04', '2016-10-15 06:35:04'),
(14, 18, '20161015144512-panasonic.png', '2016-10-15 06:45:12', '2016-10-15 06:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `ui_logs`
--

CREATE TABLE `ui_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ui_logs`
--

INSERT INTO `ui_logs` (`id`, `user_id`, `name`, `type`, `type_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dan Cesa', 'Login', 'Successfully Logged', '2016-10-01 01:25:39', '2016-10-01 01:25:39'),
(2, 1, 'Dan Cesa', 'Login', 'Successfully Logged', '2016-10-01 01:26:56', '2016-10-01 01:26:56'),
(3, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:08:59', '2016-10-01 03:08:59'),
(4, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:09:01', '2016-10-01 03:09:01'),
(5, 1, 'Dan Cesa', 'User Management', 'Viewed User Page', '2016-10-01 03:12:13', '2016-10-01 03:12:13'),
(6, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:12:15', '2016-10-01 03:12:15'),
(7, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:12:20', '2016-10-01 03:12:20'),
(8, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:12:25', '2016-10-01 03:12:25'),
(9, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:12:39', '2016-10-01 03:12:39'),
(10, 1, 'Dan Cesa', 'User Management', 'Viewed User Page', '2016-10-01 03:12:57', '2016-10-01 03:12:57'),
(11, 1, 'Dan Cesa', 'Audit Trail', 'Viewed Audit Trail', '2016-10-01 03:13:00', '2016-10-01 03:13:00'),
(12, 1, 'Dan Cesa', 'User Management', 'Successfully created user: Divina Candelaria', '2016-10-01 03:16:56', '2016-10-01 03:16:56'),
(13, 1, 'Dan Cesa', 'User Management', 'Viewed User Page', '2016-10-01 03:16:58', '2016-10-01 03:16:58'),
(14, 1, 'Dan Cesa', 'Audit Trail', 'Viewed audit trail', '2016-10-01 03:17:00', '2016-10-01 03:17:00'),
(15, 1, 'Dan Cesa', 'Audit Trail', 'Viewed audit trail', '2016-10-01 03:34:29', '2016-10-01 03:34:29'),
(16, 1, 'Dan Cesa', 'Audit Trail', 'Viewed audit trail', '2016-10-01 03:39:37', '2016-10-01 03:39:37'),
(17, 1, 'Dan Cesa', 'Audit Trail', 'Viewed audit trail', '2016-10-01 03:39:41', '2016-10-01 03:39:41'),
(18, 1, 'Dan Cesa', 'User Management', 'Viewed user page', '2016-10-01 04:20:24', '2016-10-01 04:20:24'),
(19, 1, 'Dan Cesa', 'User Management', 'Viewed user page', '2016-10-01 04:20:40', '2016-10-01 04:20:40'),
(20, 1, 'Dan Cesa', 'User Management', 'Successfully update user: Divina Candelaria', '2016-10-01 04:20:47', '2016-10-01 04:20:47'),
(21, 1, 'Dan Cesa', 'User Management', 'Viewed user page', '2016-10-01 04:20:48', '2016-10-01 04:20:48'),
(22, 1, 'Dan Cesa', 'Audit Trail', 'Viewed audit trail', '2016-10-01 04:21:03', '2016-10-01 04:21:03'),
(23, 1, 'Dan Cesa', 'User Management', 'Successfully update user: Divina Candelaria', '2016-10-01 04:22:11', '2016-10-01 04:22:11'),
(24, 1, 'Dan Cesa', 'User Management', 'Successfully created user: sdfs ssdfd', '2016-10-01 04:24:58', '2016-10-01 04:24:58'),
(25, 1, 'Dan Cesa', 'User Management', 'Successfully deleted user:  ', '2016-10-01 04:25:03', '2016-10-01 04:25:03'),
(26, 1, 'Dan Cesa', 'User Management', 'Successfully created user: asdsad sa', '2016-10-01 04:25:47', '2016-10-01 04:25:47'),
(27, 1, 'Dan Cesa', 'User Management', 'Successfully deleted user: asdsad sa', '2016-10-01 04:29:50', '2016-10-01 04:29:50'),
(28, 1, 'Dan Cesa', 'Role & Permission', 'Successfully added role: asdsa', '2016-10-01 04:41:46', '2016-10-01 04:41:46'),
(29, 1, 'Dan Cesa', 'Page Management', 'Successfully updated page: About Us', '2016-10-01 04:48:37', '2016-10-01 04:48:37'),
(30, 1, 'Dan Cesa', 'page Management', 'Successfully updated page: Clients', '2016-10-01 04:52:35', '2016-10-01 04:52:35'),
(31, 1, 'Dan Cesa', 'page Management', 'Successfully updated page: Portfolio', '2016-10-01 04:52:50', '2016-10-01 04:52:50'),
(32, 1, 'Dan Cesa', 'Page Management', 'Successfully updated page: Clients', '2016-10-01 04:53:07', '2016-10-01 04:53:07'),
(33, 1, 'Dan Cesa', 'Page Management', 'Successfully updated page: Clients', '2016-10-01 04:53:51', '2016-10-01 04:53:51'),
(34, 1, 'Dan Cesa', 'Page Management', 'Successfully updated page: Contact Us', '2016-10-01 04:54:33', '2016-10-01 04:54:33'),
(35, 1, 'Dan Cesa', 'Login', 'Successfully logged', '2016-10-08 00:04:41', '2016-10-08 00:04:41'),
(36, 1, 'Dan Cesa', 'Login', 'Successfully logged', '2016-10-08 00:04:41', '2016-10-08 00:04:41'),
(37, 1, 'Dan Cesa', 'Login', 'Successfully logged', '2016-10-08 06:05:37', '2016-10-08 06:05:37'),
(38, 1, 'Dan Cesa', 'Login', 'Successfully logged', '2016-10-12 06:57:24', '2016-10-12 06:57:24'),
(39, 1, 'Dan Cesa', 'Login', 'Successfully logged', '2016-10-14 22:21:06', '2016-10-14 22:21:06'),
(40, 1, 'Dan Cesa', 'Page Management', 'Successfully deleted sub-clients', '2016-10-15 05:24:59', '2016-10-15 05:24:59'),
(41, 1, 'Dan Cesa', 'Page Management', 'Successfully deleted sub-clients', '2016-10-15 06:34:58', '2016-10-15 06:34:58');

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
-- Indexes for table `page_videos`
--
ALTER TABLE `page_videos`
  ADD PRIMARY KEY (`page_video_id`);

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
-- Indexes for table `print_ad`
--
ALTER TABLE `print_ad`
  ADD PRIMARY KEY (`print_ad_id`);

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
-- Indexes for table `sub_clients`
--
ALTER TABLE `sub_clients`
  ADD PRIMARY KEY (`sub_clients_id`);

--
-- Indexes for table `ui_logs`
--
ALTER TABLE `ui_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `page_category`
--
ALTER TABLE `page_category`
  MODIFY `page_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `page_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `page_videos`
--
ALTER TABLE `page_videos`
  MODIFY `page_video_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `print_ad`
--
ALTER TABLE `print_ad`
  MODIFY `print_ad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `sub_clients`
--
ALTER TABLE `sub_clients`
  MODIFY `sub_clients_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ui_logs`
--
ALTER TABLE `ui_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
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
