-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 05:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramsecaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_total` int(10) DEFAULT NULL,
  `price_total` decimal(10,0) DEFAULT NULL,
  `store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_status`, `created_at`, `updated_at`, `item_total`, `price_total`, `store`) VALUES
(69, 4, 'claimed', '2023-03-05 19:51:20', '2023-03-05 19:51:37', NULL, NULL, 'Kitchen Express'),
(71, 4, 'claimed', '2023-03-05 23:17:34', '2023-03-05 23:18:15', NULL, NULL, 'Kitchen Express'),
(72, 4, 'claimed', '2023-03-05 23:18:53', '2023-03-05 23:45:41', NULL, NULL, 'Kitchen Express'),
(73, 4, 'claimed', '2023-03-05 23:44:12', '2023-03-15 18:06:19', NULL, NULL, 'Kitchen Express'),
(74, 4, 'paid', '2023-03-09 10:52:54', '2023-03-09 10:53:00', NULL, NULL, 'Kitchen Express'),
(75, 4, 'paid', '2023-03-10 00:57:34', '2023-03-10 00:57:46', NULL, NULL, 'Kitchen Express'),
(76, 4, 'paid', '2023-03-15 18:04:16', '2023-03-15 18:04:44', NULL, NULL, 'Kitchen Express'),
(77, 4, 'pending', '2023-06-22 23:38:25', '2023-06-22 23:38:25', NULL, NULL, 'Kitchen Express');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment_1` varchar(255) NOT NULL,
  `comment_2` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment_1`, `comment_2`, `user_id`, `created_at`, `updated_at`, `cart_id`) VALUES
(18, 'adasdasda', 'asdadasdasda', 4, '2023-03-04 08:38:27', '2023-03-04 08:38:27', 57),
(19, 'asdasdasd', 'asdasdasda', 4, '2023-03-04 08:38:40', '2023-03-04 08:38:40', 59),
(20, '123123123', '1231231231231', 4, '2023-03-05 08:29:00', '2023-03-05 08:29:00', 58),
(21, 'ASasASa', 'asdasdasdas', 4, '2023-03-05 17:18:52', '2023-03-05 17:18:52', 66),
(22, 'Great', 'Will recommend', 4, '2023-03-05 18:00:06', '2023-03-05 18:00:06', 67),
(23, 'Nice', 'Nice', 4, '2023-03-05 19:54:11', '2023-03-05 19:54:11', 69),
(24, 'Great', 'Great', 4, '2023-03-05 20:07:19', '2023-03-05 20:07:19', 70),
(25, 'Sarap', 'Sarap', 4, '2023-03-05 23:18:27', '2023-03-05 23:18:27', 71),
(26, 'Tasty', 'Tasty', 4, '2023-03-05 23:46:07', '2023-03-05 23:46:07', 72);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_14_082846_create_product_table', 2),
(6, '2023_01_14_084703_create_cart', 3),
(7, '2023_01_14_135548_create_order_product', 4),
(8, '2023_01_16_003834_add_user', 5),
(9, '2023_01_16_055833_add_comment', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `cart_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`, `product_total`) VALUES
(141, 69, 3, 1, '2023-03-05 19:51:20', '2023-03-05 19:51:20', '100'),
(142, 69, 10, 1, '2023-03-05 19:51:22', '2023-03-05 19:51:22', '40'),
(145, 71, 9, 1, '2023-03-05 23:17:34', '2023-03-05 23:18:00', '50'),
(146, 71, 11, 1, '2023-03-05 23:17:36', '2023-03-05 23:18:02', '20'),
(147, 72, 4, 1, '2023-03-05 23:18:53', '2023-03-05 23:18:53', '100'),
(148, 72, 8, 1, '2023-03-05 23:18:56', '2023-03-05 23:18:56', '50'),
(149, 73, 4, 1, '2023-03-05 23:44:12', '2023-03-05 23:44:34', '100'),
(150, 73, 8, 1, '2023-03-05 23:44:14', '2023-03-05 23:44:14', '50'),
(151, 73, 1, 1, '2023-03-05 23:44:16', '2023-03-05 23:44:16', '100'),
(152, 74, 3, 1, '2023-03-09 10:52:54', '2023-03-09 10:52:54', '100'),
(153, 74, 10, 1, '2023-03-09 10:52:56', '2023-03-09 10:52:56', '40'),
(154, 74, 7, 1, '2023-03-09 10:52:57', '2023-03-09 10:52:57', '100'),
(155, 75, 7, 1, '2023-03-10 00:57:34', '2023-03-10 00:57:34', '100'),
(156, 75, 4, 1, '2023-03-10 00:57:37', '2023-03-10 00:57:37', '100'),
(157, 75, 10, 1, '2023-03-10 00:57:40', '2023-03-10 00:57:40', '40'),
(158, 76, 7, 1, '2023-03-15 18:04:16', '2023-03-15 18:04:28', '100'),
(159, 76, 9, 1, '2023-03-15 18:04:19', '2023-03-15 18:04:19', '50'),
(160, 76, 3, 2, '2023-03-15 18:04:20', '2023-03-15 18:04:42', '200'),
(161, 77, 3, 1, '2023-06-22 23:38:25', '2023-06-22 23:38:25', '100'),
(162, 77, 4, 1, '2023-06-22 23:38:29', '2023-06-22 23:38:29', '100');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'API TOKEN', '19f56cb7806baed3d7b118273d2fe70c8082346116b03fb58d8d2b66bd1bd496', '[\"*\"]', NULL, NULL, '2023-03-04 00:46:57', '2023-03-04 00:46:57'),
(2, 'App\\Models\\User', 6, 'API TOKEN', 'de46059997276b8452105125bc1bdd61bd741b70666d8fc8e6ab6f07e12c2632', '[\"*\"]', NULL, NULL, '2023-03-04 00:47:33', '2023-03-04 00:47:33'),
(3, 'App\\Models\\User', 4, 'API TOKEN', 'be2df2ba11337eca1b11f7eaa67a25b42fd2cde180451845f9b14de6369690b5', '[\"*\"]', NULL, NULL, '2023-03-04 00:52:28', '2023-03-04 00:52:28'),
(4, 'App\\Models\\User', 4, 'API TOKEN', 'c702238cb0944859a990e44caeb40bafcef5def78651fcadc3aed944b253e9c9', '[\"*\"]', NULL, NULL, '2023-03-04 01:00:12', '2023-03-04 01:00:12'),
(5, 'App\\Models\\User', 5, 'API TOKEN', '900dc306539ac254b3e656219842f1fc86e9b2d2632fd659d432956b0894716d', '[\"*\"]', NULL, NULL, '2023-03-04 01:02:15', '2023-03-04 01:02:15'),
(6, 'App\\Models\\User', 4, 'API TOKEN', '3ff5d4c4b6c17f36f96b9d270ce720aff5608e30bcace9334a9aedf0d95b0f2b', '[\"*\"]', NULL, NULL, '2023-03-04 01:02:33', '2023-03-04 01:02:33'),
(7, 'App\\Models\\User', 4, 'API TOKEN', '61d9e0fa8c164be958db21248e2e0a43e0fb4a57749bda662d669b75f3565176', '[\"*\"]', NULL, NULL, '2023-03-04 01:11:28', '2023-03-04 01:11:28'),
(8, 'App\\Models\\User', 5, 'API TOKEN', 'be855dac19fcba325b44edaa40d52f0af1f215f0b356c23b97c81b71ff693193', '[\"*\"]', NULL, NULL, '2023-03-04 01:21:45', '2023-03-04 01:21:45'),
(9, 'App\\Models\\User', 4, 'API TOKEN', '362698030e919968e5c6d6273f4caf322d1e622dd1788b389d7d3f66daf721f0', '[\"*\"]', NULL, NULL, '2023-03-04 01:22:45', '2023-03-04 01:22:45'),
(10, 'App\\Models\\User', 4, 'API TOKEN', 'c12d2ec89f4edd23f8b0531b5090506534c4489c8378ca35f69f4250b5fa11de', '[\"*\"]', NULL, NULL, '2023-03-04 01:27:07', '2023-03-04 01:27:07'),
(11, 'App\\Models\\User', 5, 'API TOKEN', '5ae5b0bcc9fb6aa72d73416a7750d637547dbcfd4d55538450d4ec3325942951', '[\"*\"]', NULL, NULL, '2023-03-04 02:06:26', '2023-03-04 02:06:26'),
(12, 'App\\Models\\User', 5, 'API TOKEN', '9785efeaad2cfc3459b998efae202acedcd4625bed16275282cae76aca51f72d', '[\"*\"]', NULL, NULL, '2023-03-04 02:07:14', '2023-03-04 02:07:14'),
(13, 'App\\Models\\User', 4, 'API TOKEN', 'b23d07b8df1525d33f9778ca3d72cad88f5111ed563952967d7b9de07800c2d2', '[\"*\"]', NULL, NULL, '2023-03-04 02:07:21', '2023-03-04 02:07:21'),
(14, 'App\\Models\\User', 4, 'API TOKEN', '0ad0bcb7ee9a8db6779d2ba8e680eb3b8165714ac60d0f9ca8ec3e1a585d6af4', '[\"*\"]', NULL, NULL, '2023-03-04 02:09:25', '2023-03-04 02:09:25'),
(15, 'App\\Models\\User', 5, 'API TOKEN', '294a1bb365e5c6b51cda4e9166ea5a2596f14b1dd72c8efc518a1d0909520bbd', '[\"*\"]', NULL, NULL, '2023-03-04 02:10:43', '2023-03-04 02:10:43'),
(16, 'App\\Models\\User', 5, 'API TOKEN', '255de327b4a9770bfd6d8db284cd5b4155aa1c3b022264d2604e81a66ddb9c2d', '[\"*\"]', NULL, NULL, '2023-03-04 06:38:18', '2023-03-04 06:38:18'),
(17, 'App\\Models\\User', 5, 'API TOKEN', '71452fe9fd9310c07629129ee75b73b86faf74fc21e03c8f61fec9a1ecf00af0', '[\"*\"]', NULL, NULL, '2023-03-04 06:38:50', '2023-03-04 06:38:50'),
(18, 'App\\Models\\User', 5, 'API TOKEN', '3071bbbaa21c280b75eb933dad7b7a89f8d7891f7d755f4645508d83e26e4cb8', '[\"*\"]', NULL, NULL, '2023-03-04 06:50:21', '2023-03-04 06:50:21'),
(19, 'App\\Models\\User', 5, 'API TOKEN', 'd6ce6280e01bb8bef5f84df5d601223f45e0c2393fe535e3ed564e3bcce048f4', '[\"*\"]', NULL, NULL, '2023-03-04 06:50:51', '2023-03-04 06:50:51'),
(20, 'App\\Models\\User', 4, 'API TOKEN', 'd9db615e01788196436f89f3e4d6eed9ff9f2433bf0289ff6d797041fe170c7d', '[\"*\"]', NULL, NULL, '2023-03-04 06:54:33', '2023-03-04 06:54:33'),
(21, 'App\\Models\\User', 5, 'API TOKEN', '1798f6f897dc5103a55e7190e06600716ec0d3abb8bc8a5586c6e1d3e35b90dd', '[\"*\"]', NULL, NULL, '2023-03-04 06:54:48', '2023-03-04 06:54:48'),
(22, 'App\\Models\\User', 5, 'API TOKEN', '82d2d98950fb8bc14d2d44106d81e3d3194b5c4a6586008d5e63451e2d949fe4', '[\"*\"]', NULL, NULL, '2023-03-04 06:56:59', '2023-03-04 06:56:59'),
(23, 'App\\Models\\User', 5, 'API TOKEN', 'b1d686a424e55a9c5787c737398bed1c2bd1dcd667d58c9ce316918f169374d7', '[\"*\"]', NULL, NULL, '2023-03-04 06:58:08', '2023-03-04 06:58:08'),
(24, 'App\\Models\\User', 5, 'API TOKEN', 'c4a449554871cf0da2b25c50c9c8540d868ce4207040bb11885521c4a6b92733', '[\"*\"]', NULL, NULL, '2023-03-04 06:59:35', '2023-03-04 06:59:35'),
(25, 'App\\Models\\User', 4, 'API TOKEN', '54cec0785aa3ae448bd4859fb1b1a20f869689c93971f5b89514f7d43ebcc836', '[\"*\"]', NULL, NULL, '2023-03-04 07:37:35', '2023-03-04 07:37:35'),
(26, 'App\\Models\\User', 5, 'API TOKEN', 'c3ffc340ebeff84f8111138e5204300cdeeebc4c2f44c7104e88e7357edfe7f7', '[\"*\"]', NULL, NULL, '2023-03-04 07:45:43', '2023-03-04 07:45:43'),
(27, 'App\\Models\\User', 4, 'API TOKEN', '270fc518fac817fc35b726081891f7230a87d3cc9bd8c5f80635df96acfcd07f', '[\"*\"]', NULL, NULL, '2023-03-04 07:51:29', '2023-03-04 07:51:29'),
(28, 'App\\Models\\User', 5, 'API TOKEN', 'c4544da15e7eab13250cbfe2bc3b7fcfed79591a3dc2e5764f0c28abad003c5c', '[\"*\"]', NULL, NULL, '2023-03-04 07:52:07', '2023-03-04 07:52:07'),
(29, 'App\\Models\\User', 4, 'API TOKEN', '97c440a720cbd6397b95aaa95c3b682a5abfc518799605f6501cdfee3da1152f', '[\"*\"]', NULL, NULL, '2023-03-04 07:56:25', '2023-03-04 07:56:25'),
(30, 'App\\Models\\User', 5, 'API TOKEN', '34ba231c90e132d0e41c71f4aa06933a6f0fbd7f08750bcfc9f07ec1c64b71bc', '[\"*\"]', NULL, NULL, '2023-03-04 08:39:27', '2023-03-04 08:39:27'),
(31, 'App\\Models\\User', 4, 'API TOKEN', 'a254237735f1bba9771b83fa41b2f1493ae9a61983b750a437e196e6a8f275be', '[\"*\"]', NULL, NULL, '2023-03-04 08:52:52', '2023-03-04 08:52:52'),
(32, 'App\\Models\\User', 5, 'API TOKEN', '764fee97d5d07a7f3018ea5cded066e25717fb8763c068762561419e6bec7f9a', '[\"*\"]', NULL, NULL, '2023-03-04 08:54:21', '2023-03-04 08:54:21'),
(33, 'App\\Models\\User', 4, 'API TOKEN', '9e073a05c7e9757481d1848e28fcf9ee344ec2dcd35128e122765105d2e3e329', '[\"*\"]', NULL, NULL, '2023-03-04 09:08:49', '2023-03-04 09:08:49'),
(34, 'App\\Models\\User', 5, 'API TOKEN', 'a18d3865fe9f636fdb163b9383c82e80fe990bf4992e8d07ef0e99903d3d67c3', '[\"*\"]', NULL, NULL, '2023-03-04 09:09:12', '2023-03-04 09:09:12'),
(35, 'App\\Models\\User', 4, 'API TOKEN', '7ce6b44e65f8d61b1ab40ff5a375d8340408b13a167682c265f0d4b8c05cde77', '[\"*\"]', NULL, NULL, '2023-03-04 09:20:55', '2023-03-04 09:20:55'),
(36, 'App\\Models\\User', 5, 'API TOKEN', 'e186ba67c0c2e90ce233a2891a7b47bdc2a9fe5bed8ab34d9f0cf44ca90f6d3f', '[\"*\"]', NULL, NULL, '2023-03-05 02:00:34', '2023-03-05 02:00:34'),
(37, 'App\\Models\\User', 4, 'API TOKEN', 'd93b34e6c5ada4a7abd59e257984d96b8cac0727f9c113411c4d7951e6c2eeee', '[\"*\"]', NULL, NULL, '2023-03-05 04:01:57', '2023-03-05 04:01:57'),
(38, 'App\\Models\\User', 5, 'API TOKEN', 'bc7e78ff0c4ec0aee08369094fb5f9ce64e5093c038533bfacc3ca9621cba331', '[\"*\"]', NULL, NULL, '2023-03-05 04:09:24', '2023-03-05 04:09:24'),
(39, 'App\\Models\\User', 5, 'API TOKEN', '8f2e5201a22e20d25bedde8b526a71d5fe771bd0107bfba4bcf4bbedec52657f', '[\"*\"]', NULL, NULL, '2023-03-05 04:43:08', '2023-03-05 04:43:08'),
(40, 'App\\Models\\User', 4, 'API TOKEN', '8226d001ec0b472ab97dc11b58a8939c1ba59c7c7678efb086aee0c5d915956c', '[\"*\"]', NULL, NULL, '2023-03-05 05:09:41', '2023-03-05 05:09:41'),
(41, 'App\\Models\\User', 4, 'API TOKEN', '51744c722c27747d456a5b92ccabebd6051ae8e63d01078f35b9129f2dca0d58', '[\"*\"]', NULL, NULL, '2023-03-05 05:22:18', '2023-03-05 05:22:18'),
(42, 'App\\Models\\User', 4, 'API TOKEN', 'efbaa347faf6e88d6eb1145acafbc65c4dceff3c26262350134b1ab2c72d583a', '[\"*\"]', NULL, NULL, '2023-03-05 05:23:16', '2023-03-05 05:23:16'),
(43, 'App\\Models\\User', 5, 'API TOKEN', '7db181192706279f4e396d510e5eea65dd0b60b53513f5d207b41f87de003b46', '[\"*\"]', NULL, NULL, '2023-03-05 05:28:12', '2023-03-05 05:28:12'),
(44, 'App\\Models\\User', 5, 'API TOKEN', '0e728f17e4ec2ffc312dee7fe2a0f3c15e7633f84b4c033e6c009c57af79f68b', '[\"*\"]', NULL, NULL, '2023-03-05 05:35:52', '2023-03-05 05:35:52'),
(45, 'App\\Models\\User', 4, 'API TOKEN', 'e125faba4202e3e2256bedb1533551ff85608b0a868a616b46e60542535d64cb', '[\"*\"]', NULL, NULL, '2023-03-05 06:19:44', '2023-03-05 06:19:44'),
(46, 'App\\Models\\User', 5, 'API TOKEN', 'd39425b997afb52f9000a6c7f9d1b278657572866324dda1a2b36fc3e5560a5a', '[\"*\"]', NULL, NULL, '2023-03-05 06:32:37', '2023-03-05 06:32:37'),
(47, 'App\\Models\\User', 4, 'API TOKEN', '13d2294c36c8fd06dfd82f0aaf94d92fa9dcc6ef43d87d53db87611ec08ea365', '[\"*\"]', NULL, NULL, '2023-03-05 06:54:20', '2023-03-05 06:54:20'),
(48, 'App\\Models\\User', 5, 'API TOKEN', 'c61bee3f0399f814e2dafb534b7e96d49593892f23e1275343c6b20390941a6d', '[\"*\"]', NULL, NULL, '2023-03-05 06:56:14', '2023-03-05 06:56:14'),
(49, 'App\\Models\\User', 7, 'API TOKEN', '80dc9f5b3b4fd14ffab596d41a0d70b8ec72be286a896aef4039e088a50aed55', '[\"*\"]', NULL, NULL, '2023-03-05 08:20:04', '2023-03-05 08:20:04'),
(50, 'App\\Models\\User', 7, 'API TOKEN', '34394225106e9cae3a2047788de6e5ee6400d335e89a7d7f9e5fbfe49e131833', '[\"*\"]', NULL, NULL, '2023-03-05 08:21:41', '2023-03-05 08:21:41'),
(51, 'App\\Models\\User', 5, 'API TOKEN', '71ad4764452972e9b1b93633f1a358f14b2f412fd2d06f07dd7b55fc242ef8b2', '[\"*\"]', NULL, NULL, '2023-03-05 08:28:02', '2023-03-05 08:28:02'),
(52, 'App\\Models\\User', 4, 'API TOKEN', 'ffec1481be7f29fd1effe154fad34382e2cd5b7fb1f13a0369f16993f5beb9da', '[\"*\"]', NULL, NULL, '2023-03-05 08:28:18', '2023-03-05 08:28:18'),
(53, 'App\\Models\\User', 5, 'API TOKEN', '9043e9e6420608e2a03b65d92b19b452496d115a83e1c1bdef588353f650d234', '[\"*\"]', NULL, NULL, '2023-03-05 08:29:10', '2023-03-05 08:29:10'),
(54, 'App\\Models\\User', 4, 'API TOKEN', 'd2a3c441801ab5d445a99ee3fdd2537994064efeb44c88315e0012afac32d3d3', '[\"*\"]', NULL, NULL, '2023-03-05 08:30:42', '2023-03-05 08:30:42'),
(55, 'App\\Models\\User', 5, 'API TOKEN', '2f0c5208da7c28271b7af92ecbe02c8ad35e981e4083a0d5e21277f4db93d3ef', '[\"*\"]', NULL, NULL, '2023-03-05 08:30:59', '2023-03-05 08:30:59'),
(56, 'App\\Models\\User', 5, 'API TOKEN', 'a43f12ad0e92dd0ce9f2c7d34a7e285fc21833b905e32b2624d306947cee57cf', '[\"*\"]', NULL, NULL, '2023-03-05 08:37:40', '2023-03-05 08:37:40'),
(57, 'App\\Models\\User', 6, 'API TOKEN', '115f5ca48d0c8d938583d8f672c6c4e3590d2ca411675a5e7a0d97caa5c0adf9', '[\"*\"]', NULL, NULL, '2023-03-05 08:54:58', '2023-03-05 08:54:58'),
(58, 'App\\Models\\User', 4, 'API TOKEN', 'c2ad966e1e96596d079ee9138a6364fe909b56ac7ba0b14f4380eb3924809f66', '[\"*\"]', NULL, NULL, '2023-03-05 09:02:33', '2023-03-05 09:02:33'),
(59, 'App\\Models\\User', 4, 'API TOKEN', 'f6a43247dc2dbc4050c1066b015ce70fc4f91ad3412f7ab811b98d3e66214ae5', '[\"*\"]', NULL, NULL, '2023-03-05 09:07:21', '2023-03-05 09:07:21'),
(60, 'App\\Models\\User', 4, 'API TOKEN', '627c35601763c63a9b910295671a5a6acb377699a980dd86938884b0758db5e7', '[\"*\"]', NULL, NULL, '2023-03-05 16:35:42', '2023-03-05 16:35:42'),
(61, 'App\\Models\\User', 4, 'API TOKEN', 'ddcdc36531db1a19e0d9ea9bf334fde5963273644fd93491235bc59e4bc3d882', '[\"*\"]', NULL, NULL, '2023-03-05 16:39:41', '2023-03-05 16:39:41'),
(62, 'App\\Models\\User', 4, 'API TOKEN', 'ef0fcbb9fd7cd62ea11e07453b2f8da4dd0d2b0d50fd04093aca6c550ed2de75', '[\"*\"]', NULL, NULL, '2023-03-05 16:41:38', '2023-03-05 16:41:38'),
(63, 'App\\Models\\User', 6, 'API TOKEN', '198aa0672bcc7107e293207717c2529bd01b41ebd4917a4feb8e425407e49043', '[\"*\"]', NULL, NULL, '2023-03-05 17:15:49', '2023-03-05 17:15:49'),
(64, 'App\\Models\\User', 4, 'API TOKEN', 'e41b53ba9f3596b07bf2762b613e5695820bb9b35bc305c6f963c431f2764518', '[\"*\"]', NULL, NULL, '2023-03-05 17:18:40', '2023-03-05 17:18:40'),
(65, 'App\\Models\\User', 6, 'API TOKEN', 'b45de0e30567088aa64c8b2e217cbc13202ab88082f1ca5b6c778f49dee4c5a2', '[\"*\"]', NULL, NULL, '2023-03-05 17:19:05', '2023-03-05 17:19:05'),
(66, 'App\\Models\\User', 5, 'API TOKEN', '83b2e5f66687ae7ce255736b2d4e854f4b51888d202cda2b597c62a62db06b5c', '[\"*\"]', NULL, NULL, '2023-03-05 17:36:02', '2023-03-05 17:36:02'),
(67, 'App\\Models\\User', 6, 'API TOKEN', '1889143a38068920c335b7f365c77f1d4db5dde76b70d48c966bfa691d3f9600', '[\"*\"]', NULL, NULL, '2023-03-05 17:42:07', '2023-03-05 17:42:07'),
(68, 'App\\Models\\User', 6, 'API TOKEN', '5cfcc0a8babbabad54ead5ad94b1ec5892421bd0c7250761775d4d9a6b8b526d', '[\"*\"]', NULL, NULL, '2023-03-05 17:44:05', '2023-03-05 17:44:05'),
(69, 'App\\Models\\User', 4, 'API TOKEN', 'e1eefe59d5f3ceb5457310df364d55a2fd321f45c342a90b57f2b3a894700511', '[\"*\"]', NULL, NULL, '2023-03-05 17:53:52', '2023-03-05 17:53:52'),
(70, 'App\\Models\\User', 4, 'API TOKEN', 'd0ff2885b9f2471a772c686d35a8cf829be90d7e3d93d8fc20782f2189081e29', '[\"*\"]', NULL, NULL, '2023-03-05 17:58:23', '2023-03-05 17:58:23'),
(71, 'App\\Models\\User', 5, 'API TOKEN', 'd3aa1a6dfa6173665e3242054e35f508c24ec4ad3315af17bae03818f0afaac0', '[\"*\"]', NULL, NULL, '2023-03-05 17:58:31', '2023-03-05 17:58:31'),
(72, 'App\\Models\\User', 8, 'API TOKEN', '190fd0b04934992bd50add0854f531bee47161bb09706a2b7fa7eed14354ec4c', '[\"*\"]', NULL, NULL, '2023-03-05 19:25:09', '2023-03-05 19:25:09'),
(73, 'App\\Models\\User', 8, 'API TOKEN', '1eba4d1882193c6b02871fbaa0d5192293ece26ee48b96f279989229a38ea81b', '[\"*\"]', NULL, NULL, '2023-03-05 19:26:26', '2023-03-05 19:26:26'),
(74, 'App\\Models\\User', 8, 'API TOKEN', 'd4833eb86cd515f15ddf749acf6735988228fcc34f755d2fa2d7a0a0b5e44390', '[\"*\"]', NULL, NULL, '2023-03-05 19:30:41', '2023-03-05 19:30:41'),
(75, 'App\\Models\\User', 8, 'API TOKEN', '2eedbdc3e589ecb42f7ec637125e4ca8427317128b993de54f3671fbc66e1bde', '[\"*\"]', NULL, NULL, '2023-03-05 19:35:00', '2023-03-05 19:35:00'),
(76, 'App\\Models\\User', 8, 'API TOKEN', '9761abe9d853b4929c4c8db643b299039935bff0d24ad52c163321eb7ddeed69', '[\"*\"]', NULL, NULL, '2023-03-05 19:35:11', '2023-03-05 19:35:11'),
(77, 'App\\Models\\User', 8, 'API TOKEN', 'f933cd94d713e19108592210651ed2d92a85c965967dee21c1818ce6e5fd1460', '[\"*\"]', NULL, NULL, '2023-03-05 19:35:35', '2023-03-05 19:35:35'),
(78, 'App\\Models\\User', 8, 'API TOKEN', 'c0e2507c40c9ed61a340c3a472affb6f75cc56c18ad55630627ae564fe55a784', '[\"*\"]', NULL, NULL, '2023-03-05 19:36:50', '2023-03-05 19:36:50'),
(79, 'App\\Models\\User', 8, 'API TOKEN', 'eb6d777b89079c8ebe637d4cae1966489f6b0b3e1f9eb066a39a78145967255f', '[\"*\"]', NULL, NULL, '2023-03-05 19:37:22', '2023-03-05 19:37:22'),
(80, 'App\\Models\\User', 8, 'API TOKEN', '8aecb18a6dc4ab2957e46280b2ff4a8349579ad76e238853c30f534174fc64f7', '[\"*\"]', NULL, NULL, '2023-03-05 19:38:08', '2023-03-05 19:38:08'),
(81, 'App\\Models\\User', 8, 'API TOKEN', '6102c679a3de22012c811e5d6950b9565cbe8fd57b2da65a4715f95ae19d5c2d', '[\"*\"]', NULL, NULL, '2023-03-05 19:39:17', '2023-03-05 19:39:17'),
(82, 'App\\Models\\User', 8, 'API TOKEN', '54df5261c8d16de11cda219191472c534f4446dfe48d0669050be330057c3348', '[\"*\"]', NULL, NULL, '2023-03-05 19:41:02', '2023-03-05 19:41:02'),
(83, 'App\\Models\\User', 4, 'API TOKEN', '131663035e4f75ead1fc38148f78977a441cf6edacd4ec5c80cf0af52305c7ec', '[\"*\"]', NULL, NULL, '2023-03-05 19:51:09', '2023-03-05 19:51:09'),
(84, 'App\\Models\\User', 5, 'API TOKEN', '5b4b8a2222562b28d4bc9e401e1f35f201bba66b735ae230a6487adbc5e2a646', '[\"*\"]', NULL, NULL, '2023-03-05 19:51:33', '2023-03-05 19:51:33'),
(85, 'App\\Models\\User', 8, 'API TOKEN', '631fd494b5becc97ca38a273c59ebcddc24484b31b45c886cd696131b3cb0665', '[\"*\"]', NULL, NULL, '2023-03-05 19:51:51', '2023-03-05 19:51:51'),
(86, 'App\\Models\\User', 4, 'API TOKEN', '1d5c00fa5991d25eca5651a5ad5048d479c2404f618eab66c8912a76f770e548', '[\"*\"]', NULL, NULL, '2023-03-05 19:54:01', '2023-03-05 19:54:01'),
(87, 'App\\Models\\User', 8, 'API TOKEN', 'f91d00972ab9d94e5b9cc7450bdec235705692f95ecc595d4a9d0232bff1b053', '[\"*\"]', NULL, NULL, '2023-03-05 19:54:20', '2023-03-05 19:54:20'),
(88, 'App\\Models\\User', 8, 'API TOKEN', '66053ae1bbb9c4b870bca05337ae96bf6605131c6328a3a110a7a6e9c8759a2a', '[\"*\"]', NULL, NULL, '2023-03-05 20:04:36', '2023-03-05 20:04:36'),
(89, 'App\\Models\\User', 4, 'API TOKEN', '7ceba20ac4de5c3f73cd36500871d903f653a917f417fd89bd7b3dedf945afe3', '[\"*\"]', NULL, NULL, '2023-03-05 20:06:12', '2023-03-05 20:06:12'),
(90, 'App\\Models\\User', 6, 'API TOKEN', 'fe0dc28bcd0a3ae71544fa5fc72c0e926e6e1f4b9284d6fafe9e2bb5e064593e', '[\"*\"]', NULL, NULL, '2023-03-05 20:06:49', '2023-03-05 20:06:49'),
(91, 'App\\Models\\User', 4, 'API TOKEN', '3a3919d88479deb43acd2eeb89cc39d15c032d3aebe3b150d2c748224f05cac5', '[\"*\"]', NULL, NULL, '2023-03-05 20:07:01', '2023-03-05 20:07:01'),
(92, 'App\\Models\\User', 8, 'API TOKEN', '6fcf744ac971ed0fed3eeb06add1772372560253b82969a7925cd39e21810abf', '[\"*\"]', NULL, NULL, '2023-03-05 20:07:29', '2023-03-05 20:07:29'),
(93, 'App\\Models\\User', 5, 'API TOKEN', '29937bffa67d9d13c60815bd07c52772b1a7c9ef1c900641b6987570d575fe88', '[\"*\"]', NULL, NULL, '2023-03-05 20:17:33', '2023-03-05 20:17:33'),
(94, 'App\\Models\\User', 8, 'API TOKEN', '5515c40970f583c40326fdf515485b97f02d9d2913f633b8e24f1d57c3221677', '[\"*\"]', NULL, NULL, '2023-03-05 20:20:29', '2023-03-05 20:20:29'),
(95, 'App\\Models\\User', 8, 'API TOKEN', '745657b0e0e70e1e8444c496373f0f2169a50e2fbcf1d227141777e6a5c2c764', '[\"*\"]', NULL, NULL, '2023-03-05 20:34:09', '2023-03-05 20:34:09'),
(96, 'App\\Models\\User', 4, 'API TOKEN', '9f0341394f4d433c822e4e211471993c8a133fe8864afe97478fd982343000cf', '[\"*\"]', NULL, NULL, '2023-03-05 20:41:07', '2023-03-05 20:41:07'),
(97, 'App\\Models\\User', 8, 'API TOKEN', '66cf731a1d0cd08013007066c35ac6eb8d7e49e47d9a179bf4aa93c13660503c', '[\"*\"]', NULL, NULL, '2023-03-05 20:43:09', '2023-03-05 20:43:09'),
(98, 'App\\Models\\User', 4, 'API TOKEN', '526f25b548b6cdc0b1a8e00cc1575e9c8515fc2a6920e96dfe65d05886f0099f', '[\"*\"]', NULL, NULL, '2023-03-05 21:54:11', '2023-03-05 21:54:11'),
(99, 'App\\Models\\User', 4, 'API TOKEN', '6dbb64c1874bb404f7db5f0dfbc123fb49aa1be88e5c94ca75805322e11b96c7', '[\"*\"]', NULL, NULL, '2023-03-05 23:17:19', '2023-03-05 23:17:19'),
(100, 'App\\Models\\User', 5, 'API TOKEN', 'e0eb83b05677ee6f5997db5a98bd07206f75fd09de36710aec1850170c3402f7', '[\"*\"]', NULL, NULL, '2023-03-05 23:17:50', '2023-03-05 23:17:50'),
(101, 'App\\Models\\User', 4, 'API TOKEN', '9b605c1eedfa8a8f7cee1b13b8540c04fe129ade0056a9105b43acfe4439d41e', '[\"*\"]', NULL, NULL, '2023-03-05 23:33:14', '2023-03-05 23:33:14'),
(102, 'App\\Models\\User', 4, 'API TOKEN', '3b1cbd197e0fc231a10908527474366185152da1394431ec0667d98ccd622a6a', '[\"*\"]', NULL, NULL, '2023-03-05 23:33:18', '2023-03-05 23:33:18'),
(103, 'App\\Models\\User', 4, 'API TOKEN', 'c242ed9b2597176c9d08ea25bd4c6b886abaa8eddb035cada67966afb88abde3', '[\"*\"]', NULL, NULL, '2023-03-05 23:43:57', '2023-03-05 23:43:57'),
(104, 'App\\Models\\User', 5, 'API TOKEN', '55692bf7a6a37f0d040081118dc1d176ab0d9173103338e7d0a891136f933b52', '[\"*\"]', NULL, NULL, '2023-03-05 23:45:07', '2023-03-05 23:45:07'),
(105, 'App\\Models\\User', 8, 'API TOKEN', '62c5655dd9d32167f5ddfb7fe47eb25ee026fc6374bbc836d1be4f37c1ce2c35', '[\"*\"]', NULL, NULL, '2023-03-05 23:47:26', '2023-03-05 23:47:26'),
(106, 'App\\Models\\User', 4, 'API TOKEN', '8aa8109d23fc64871d1587a7aee5afbd81219ae23fe24e79541b6796164a6a47', '[\"*\"]', NULL, NULL, '2023-03-06 00:10:20', '2023-03-06 00:10:20'),
(107, 'App\\Models\\User', 4, 'API TOKEN', '0bd5e4beafd5256a8fd11a1001b6482ec13bcac2c4ff65a8467b8be8d2ae15fa', '[\"*\"]', NULL, NULL, '2023-03-06 00:23:11', '2023-03-06 00:23:11'),
(108, 'App\\Models\\User', 4, 'API TOKEN', 'fcfcd2e813f9e2139fe7b47f8a262cb795301d6ea5e148f1684faf6bb7a1f754', '[\"*\"]', NULL, NULL, '2023-03-06 00:24:52', '2023-03-06 00:24:52'),
(109, 'App\\Models\\User', 5, 'API TOKEN', 'fb04804cd5b1d18e25c1de38b339f84e66ec2059340fb6b5547f1b8a29ea9a38', '[\"*\"]', NULL, NULL, '2023-03-08 01:00:22', '2023-03-08 01:00:22'),
(110, 'App\\Models\\User', 5, 'API TOKEN', '7268be1a35632484509437500447977a3052ea59dccccb245f0d93c14c5c2fe1', '[\"*\"]', NULL, NULL, '2023-03-08 01:07:48', '2023-03-08 01:07:48'),
(111, 'App\\Models\\User', 5, 'API TOKEN', 'cd16fc592a048d9d12636063c1f748a1783403a11ebcc5cb5700a63b518f18b2', '[\"*\"]', NULL, NULL, '2023-03-08 01:13:41', '2023-03-08 01:13:41'),
(112, 'App\\Models\\User', 5, 'API TOKEN', '4d2c3854c04418faf5b20d06983c96617bb7d8379043d8e789e78ee1438cfe6e', '[\"*\"]', NULL, NULL, '2023-03-08 01:15:28', '2023-03-08 01:15:28'),
(113, 'App\\Models\\User', 5, 'API TOKEN', '86bbd64bbef528ff715242f12f3bbbd8e03c25de479bb7f7668c7748f64277a9', '[\"*\"]', NULL, NULL, '2023-03-08 01:16:21', '2023-03-08 01:16:21'),
(114, 'App\\Models\\User', 5, 'API TOKEN', '6203463133e7f50989a1d5e129bd1ca6d4dc00c689c574edb8e00344e2c51d3e', '[\"*\"]', NULL, NULL, '2023-03-08 01:41:17', '2023-03-08 01:41:17'),
(115, 'App\\Models\\User', 4, 'API TOKEN', '920e8736751d3b56e01e707291fc131ad73d3f7ca13713e414c08fa4fc986797', '[\"*\"]', NULL, NULL, '2023-03-09 10:14:49', '2023-03-09 10:14:49'),
(116, 'App\\Models\\User', 5, 'API TOKEN', 'd87fa80417b5f4d946720ab8e4951d865541e483b02bb4138825b13bad03fc37', '[\"*\"]', NULL, NULL, '2023-03-09 10:15:08', '2023-03-09 10:15:08'),
(117, 'App\\Models\\User', 4, 'API TOKEN', '3b724f10539794586b74489449374aaa59583718a0f18fe5629365013ecda85b', '[\"*\"]', NULL, NULL, '2023-03-09 10:52:48', '2023-03-09 10:52:48'),
(118, 'App\\Models\\User', 5, 'API TOKEN', '9125254872e7216e9f250b5ef63d54b22f1ef120273938518661f2f8138cffb6', '[\"*\"]', NULL, NULL, '2023-03-09 10:53:25', '2023-03-09 10:53:25'),
(119, 'App\\Models\\User', 5, 'API TOKEN', '473727c7d675a656778e5340746031dbf1a9399c680b3a4d4b4a84ae18b4e97e', '[\"*\"]', NULL, NULL, '2023-03-09 10:54:33', '2023-03-09 10:54:33'),
(120, 'App\\Models\\User', 5, 'API TOKEN', '721c5c420a208fdc85bdd257bc1d581df12b82b701b1d03d6f8c9b0a3b2abd8e', '[\"*\"]', NULL, NULL, '2023-03-10 00:20:54', '2023-03-10 00:20:54'),
(121, 'App\\Models\\User', 5, 'API TOKEN', '2e6ef41b7144b66f6b1d7955485a8389dbf90d9f15bc4f3e644600405000ade8', '[\"*\"]', NULL, NULL, '2023-03-10 00:21:17', '2023-03-10 00:21:17'),
(122, 'App\\Models\\User', 4, 'API TOKEN', '4d330c874681b62526c6dfbf5871fe2ac3df352a508f3bb53eb42cf4b7a4f98f', '[\"*\"]', NULL, NULL, '2023-03-10 00:57:22', '2023-03-10 00:57:22'),
(123, 'App\\Models\\User', 5, 'API TOKEN', '6bc85291bf1194acb488ef86c5d8db19a814fdb71489f131c1c8995e9480dd5f', '[\"*\"]', NULL, NULL, '2023-03-10 00:57:58', '2023-03-10 00:57:58'),
(124, 'App\\Models\\User', 5, 'API TOKEN', '9f938a9db193831c78ad7feaa79b0c612e1823c55913db61a40c533dc5436b52', '[\"*\"]', NULL, NULL, '2023-03-10 07:02:16', '2023-03-10 07:02:16'),
(125, 'App\\Models\\User', 5, 'API TOKEN', '388a2836da8bbc610621965f4f55d7354f6011ef292adafa15d601ba991062cc', '[\"*\"]', NULL, NULL, '2023-03-10 07:02:58', '2023-03-10 07:02:58'),
(126, 'App\\Models\\User', 4, 'API TOKEN', 'd064de651e1c9fbf5ef0002cc61f5892434261eb3062d4e64cb364c064c7a923', '[\"*\"]', NULL, NULL, '2023-03-10 07:12:29', '2023-03-10 07:12:29'),
(127, 'App\\Models\\User', 5, 'API TOKEN', 'acdb264149eea5045bae1cf2a439c4f9ebcff29d96248d2799884165b735ac49', '[\"*\"]', NULL, NULL, '2023-03-10 07:12:45', '2023-03-10 07:12:45'),
(128, 'App\\Models\\User', 4, 'API TOKEN', 'e7e6476fa9dd6629e8c0f86f9eabc575b9b6939ee19ad14e0015769860e2e907', '[\"*\"]', NULL, NULL, '2023-03-10 07:36:21', '2023-03-10 07:36:21'),
(129, 'App\\Models\\User', 5, 'API TOKEN', '55b176d9bbe3527b2ed1f0870a29c8c1583adc8820997f5f864f33e6cd7fd072', '[\"*\"]', NULL, NULL, '2023-03-10 07:36:39', '2023-03-10 07:36:39'),
(130, 'App\\Models\\User', 4, 'API TOKEN', 'accb8c0eb6114b4f891cbb9f5d7ac3b33f5d1aa00b07368db673c3bd60317616', '[\"*\"]', NULL, NULL, '2023-03-10 07:38:17', '2023-03-10 07:38:17'),
(131, 'App\\Models\\User', 5, 'API TOKEN', '9816d261ef37c3a78b1e542e88e99bb7216ab9ea79516e6d09b8e5bb2a45196f', '[\"*\"]', NULL, NULL, '2023-03-10 07:38:36', '2023-03-10 07:38:36'),
(132, 'App\\Models\\User', 4, 'API TOKEN', '6c024adb4ccc7cd3f7b49c501b6d4ef6395352c10be9d25e0cb6c0ead0fb1431', '[\"*\"]', NULL, NULL, '2023-03-15 18:00:27', '2023-03-15 18:00:27'),
(133, 'App\\Models\\User', 5, 'API TOKEN', '435d8c71390353af8defcba19586dcd8390d8deaa26d300938c814cee4b01689', '[\"*\"]', NULL, NULL, '2023-03-15 18:00:47', '2023-03-15 18:00:47'),
(134, 'App\\Models\\User', 4, 'API TOKEN', '0b8fb0cd2d70d9889e2e5cf6e8942f5b8265cf696efccd73357d0ab5e2cd19e1', '[\"*\"]', NULL, NULL, '2023-03-15 18:04:07', '2023-03-15 18:04:07'),
(135, 'App\\Models\\User', 5, 'API TOKEN', '53b2f73fab7293f38278c5a3c16c705bdd39cf37ecb158ba515ae264fe463c45', '[\"*\"]', NULL, NULL, '2023-03-15 18:05:24', '2023-03-15 18:05:24'),
(136, 'App\\Models\\User', 4, 'API TOKEN', '1696efaef6b8826aa1563d80914d047124ea3fd3c722422b589722d875a02d3e', '[\"*\"]', NULL, NULL, '2023-03-15 18:08:38', '2023-03-15 18:08:38'),
(137, 'App\\Models\\User', 8, 'API TOKEN', '17ef4f7dfb45c5c4cc8c08a6b785481e1c12d27cedab69fe28bad23655c6c209', '[\"*\"]', NULL, NULL, '2023-03-15 18:08:54', '2023-03-15 18:08:54'),
(138, 'App\\Models\\User', 4, 'API TOKEN', '7be9720dfbc13004d83f9b6bae5f93520824349613ef1e7defdbf9128df0e87b', '[\"*\"]', NULL, NULL, '2023-04-19 17:12:22', '2023-04-19 17:12:22'),
(139, 'App\\Models\\User', 4, 'API TOKEN', 'f891b9964e2b118cd21d27bdf8b029677404c33ba9c373186800e1b3076bed88', '[\"*\"]', NULL, NULL, '2023-06-07 07:54:34', '2023-06-07 07:54:34'),
(140, 'App\\Models\\User', 4, 'API TOKEN', '6d6f5508da0482b64091e1d6fba7b26627a3f530f7e2489ec6afcee3a4596d60', '[\"*\"]', NULL, NULL, '2023-06-22 23:37:59', '2023-06-22 23:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stocks` int(10) NOT NULL,
  `isactive` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `price`, `category`, `image`, `created_at`, `updated_at`, `store_name`, `stocks`, `isactive`) VALUES
(1, 'Katsudon', 100.00, 'ricemeals', 'Katsudon_2023-03-05-16-31-30.png', NULL, '2023-03-15 18:08:28', 'Kitchen Express', 50, 1),
(2, 'Chicken Curry', 100.00, 'ricemeals', 'Chicken Curry_2023-03-05-15-23-23.png', NULL, '2023-03-05 18:07:23', 'Kitchen Express', 47, 0),
(3, 'Lechon Paksiw', 100.00, 'ricemeals', 'Lechon Paksiw_2023-03-05-15-23-37.png', NULL, '2023-03-15 18:04:44', 'Kitchen Express', 39, 1),
(4, '2pc Barbeque', 100.00, 'ricemeals', '2pc%20BBQ.png', NULL, '2023-03-10 00:57:46', 'Kitchen Express', 43, 1),
(5, 'Salisbury Steak', 100.00, 'ricemeals', 'Salisbury%20Steak.png', NULL, '2023-03-04 01:59:42', 'Kitchen Express', 49, 1),
(6, 'Pork Tapa', 100.00, 'ricemeals', 'Pork%20Tapa.png', NULL, '2023-03-05 18:07:22', 'Kitchen Express', 49, 0),
(7, 'Cheesy Spaghetti', 100.00, 'pasta', 'Cheesy%20Spaghetti.png', NULL, '2023-03-15 18:04:44', 'Kitchen Express', 42, 1),
(8, 'Brewed Calamansi', 50.00, 'beverages', 'Brewed%20Calamansi%20Drink.png', NULL, '2023-03-05 23:44:37', 'Kitchen Express', 48, 1),
(9, 'Calamansi Drink', 50.00, 'beverages', 'Calamansi%20Drink.png', NULL, '2023-03-15 18:04:44', 'Kitchen Express', 48, 1),
(10, 'C2', 40.00, 'beverages', 'C2.png', NULL, '2023-03-10 00:57:46', 'Kitchen Express', 46, 1),
(11, 'Water', 20.00, 'beverages', 'Water.png', NULL, '2023-03-05 23:18:03', 'Kitchen Express', 45, 1),
(14, 'Burgersilog', 75.00, 'ricemeals', 'Burgersilog_2023-03-05-17-00-05.png', '2023-03-05 09:00:05', '2023-03-05 20:06:34', 'Red Brew', 47, 1),
(15, 'Hotsilog', 75.00, 'ricemeals', 'Hotsilog_2023-03-05-17-00-29.png', '2023-03-05 09:00:29', '2023-03-05 17:15:26', 'Red Brew', 49, 1),
(16, 'Pork Teriyaki', 75.00, 'ricemeals', 'Pork Teriyaki_2023-03-05-17-00-56.png', '2023-03-05 09:00:56', '2023-03-05 20:06:34', 'Red Brew', 48, 1),
(17, 'Sisig', 75.00, 'ricemeals', 'Sisig_2023-03-05-17-01-57.png', '2023-03-05 09:01:57', '2023-03-05 16:57:32', 'Red Brew', 48, 1);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` int(10) NOT NULL DEFAULT 1,
  `isactive` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `vendor`, `isactive`) VALUES
(4, 'Jamir Sia', 'jzsia@student.apc.edu.ph', NULL, '$2y$10$JpWjlGUWMN7pC66qS331SeF1cS2rbVajDYLaXs4oyFz1fwR03pNaS', NULL, '2023-03-04 00:34:37', '2023-03-04 00:34:37', 'customer', 0, 1),
(5, 'Kitchen Express', 'kexpress@gmail.com', NULL, '$2y$10$ok3uad1XZhGoxk98JpT1EO/qb2XnJ9SMf2ajdOrj4H.tG0k.8IqKa', NULL, '2023-03-04 00:34:38', '2023-03-05 20:35:54', 'vendor-ke', 1, 1),
(6, 'Red Brew', 'rbrew@gmail.com', NULL, '$2y$10$PDgn3HNTJI0IpALiR6HNfejX6OvIGd7QcwOaiMYIqig1YvAf8hqva', NULL, '2023-03-04 00:34:38', '2023-03-05 20:43:14', 'vendor-rb', 1, 1),
(7, 'La Mudras Corner', 'lmudras@gmail.com', NULL, '$2y$10$DwnzXJ2ADl.WbQR4IP13fuI.GH8GqE5TtbuVihp57k.Ma0BWWrQyC', NULL, '2023-03-04 00:34:38', '2023-03-04 00:34:38', 'vendor-lm', 1, 1),
(8, 'Admin', 'admin@apc.edu.ph', NULL, '$2y$10$hXP.7.umEI4bh8QFPycth.bhLWmRti1yCMRGBJA7ZODqPL8bSNRTm', NULL, '2023-03-04 00:34:38', '2023-03-04 00:34:38', 'admin', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
