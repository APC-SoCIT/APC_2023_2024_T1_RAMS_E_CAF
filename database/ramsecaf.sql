-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 06:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `cart_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_total` int(10) DEFAULT NULL,
  `price_total` decimal(10,0) DEFAULT NULL,
  `store` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_status`, `created_at`, `updated_at`, `item_total`, `price_total`, `store`) VALUES
(107, 4, 'claimed', '2023-09-18 07:18:08', '2023-09-18 07:33:01', NULL, NULL, 'Kitchen Express'),
(108, 4, 'paid', '2023-09-18 07:19:01', '2023-09-18 07:19:18', NULL, NULL, 'Kitchen Express'),
(109, 4, 'paid', '2023-09-18 07:20:26', '2023-09-18 07:22:49', NULL, NULL, 'Kitchen Express'),
(110, 12, 'paid', '2023-09-18 07:22:16', '2023-09-18 07:23:14', NULL, NULL, 'La Mudras Corner');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment_1` varchar(255) NOT NULL,
  `comment_2` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(10) NOT NULL,
  `sentiment_1` varchar(255) DEFAULT NULL,
  `sentiment_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment_1`, `comment_2`, `user_id`, `created_at`, `updated_at`, `cart_id`, `sentiment_1`, `sentiment_2`) VALUES
(27, 'Bad', 'nice', 4, '2023-09-13 23:53:21', '2023-09-13 23:53:21', 80, 'Negative', 'Positive'),
(28, 'Good', 'slow', 4, '2023-09-14 06:19:09', '2023-09-14 06:19:09', 81, 'Positive', 'Negative'),
(29, 'okay', 'good', 4, '2023-09-17 08:37:27', '2023-09-17 08:37:27', 99, 'Positive', 'Positive'),
(30, 'bad', 'good', 12, '2023-09-18 04:38:37', '2023-09-18 04:38:37', 104, 'Negative', 'Positive'),
(31, 'bad', 'bad', 4, '2023-09-18 04:40:27', '2023-09-18 04:40:27', 100, 'Negative', 'Negative');

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
(239, 107, 2, 1, '2023-09-18 07:18:08', '2023-09-18 07:18:08', 100),
(240, 107, 6, 1, '2023-09-18 07:18:10', '2023-09-18 07:18:10', 100),
(241, 108, 2, 1, '2023-09-18 07:19:01', '2023-09-18 07:19:01', 100),
(242, 108, 11, 1, '2023-09-18 07:19:03', '2023-09-18 07:19:03', 20),
(243, 109, 1, 1, '2023-09-18 07:20:26', '2023-09-18 07:20:26', 100),
(244, 109, 2, 1, '2023-09-18 07:20:28', '2023-09-18 07:20:28', 100),
(245, 110, 14, 1, '2023-09-18 07:22:16', '2023-09-18 07:22:16', 75),
(246, 110, 17, 1, '2023-09-18 07:22:18', '2023-09-18 07:22:18', 75);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
(140, 'App\\Models\\User', 4, 'API TOKEN', '6d6f5508da0482b64091e1d6fba7b26627a3f530f7e2489ec6afcee3a4596d60', '[\"*\"]', NULL, NULL, '2023-06-22 23:37:59', '2023-06-22 23:37:59'),
(141, 'App\\Models\\User', 4, 'API TOKEN', '8128aaae4db8d0137124b9e4f88aa47259131763d1d2dd25d29d8cf567cc9089', '[\"*\"]', NULL, NULL, '2023-09-02 08:09:28', '2023-09-02 08:09:28'),
(142, 'App\\Models\\User', 4, 'API TOKEN', '181a70b1cddf6a7aa377cfa0ede4fe1c87730dd3423fcf78619bcc21478897cf', '[\"*\"]', NULL, NULL, '2023-09-09 04:21:46', '2023-09-09 04:21:46'),
(143, 'App\\Models\\User', 4, 'API TOKEN', 'c5e6c76473ffdac32ae4b17b684a5ac8a28fc27e96d8ba67257f12f5f4b3ec1a', '[\"*\"]', NULL, NULL, '2023-09-11 02:40:35', '2023-09-11 02:40:35'),
(144, 'App\\Models\\User', 4, 'API TOKEN', '5cc58a447140b4d333b174f572a632d356a8f23e46a3e4741e01f4702219ed28', '[\"*\"]', NULL, NULL, '2023-09-11 02:49:06', '2023-09-11 02:49:06'),
(145, 'App\\Models\\User', 6, 'API TOKEN', 'f055a6bfca9d7c17628a35e6074591a7978d47074c0e55ce501a3329e4df64ee', '[\"*\"]', NULL, NULL, '2023-09-11 03:44:16', '2023-09-11 03:44:16'),
(146, 'App\\Models\\User', 4, 'API TOKEN', '061d33dd93683bfd70dd7ecf7feb4ba11eed1cfe0300a18112f2115f5c9815aa', '[\"*\"]', NULL, NULL, '2023-09-11 03:56:26', '2023-09-11 03:56:26'),
(147, 'App\\Models\\User', 4, 'API TOKEN', 'c588718c1b8932645f889a5e1dd0e983943a9d2454545017c0029760d1c44cff', '[\"*\"]', NULL, NULL, '2023-09-11 17:57:46', '2023-09-11 17:57:46'),
(148, 'App\\Models\\User', 4, 'API TOKEN', '3534df4165aa794cb6cfb75460992a7b5da03fc272e469589f0d39767cd8e164', '[\"*\"]', NULL, NULL, '2023-09-11 18:05:16', '2023-09-11 18:05:16'),
(149, 'App\\Models\\User', 4, 'API TOKEN', '27f170b143df58d326aa75db1915eb9e54e441ca10e2d97040f02382428f105d', '[\"*\"]', NULL, NULL, '2023-09-11 18:05:42', '2023-09-11 18:05:42'),
(150, 'App\\Models\\User', 4, 'API TOKEN', '3d563ff633717e335acb7997ddae479a1f0ca0367f527ad3297f4d2121f40c58', '[\"*\"]', NULL, NULL, '2023-09-11 18:06:31', '2023-09-11 18:06:31'),
(151, 'App\\Models\\User', 4, 'API TOKEN', '8c5b87559dda2605174966fd822f56762cf36fb11b516003e761a8c0ca049496', '[\"*\"]', NULL, NULL, '2023-09-11 18:37:14', '2023-09-11 18:37:14'),
(152, 'App\\Models\\User', 4, 'API TOKEN', '7a6e27eaac0629f8786362efeea2a24f568c75cb719fbc2a7cbac70be02555b4', '[\"*\"]', NULL, NULL, '2023-09-12 16:18:07', '2023-09-12 16:18:07'),
(153, 'App\\Models\\User', 4, 'API TOKEN', 'a85c9f0ef81522cd8790b940ae6f9b405f406bbb75814ecdb5ca24c670e2f43e', '[\"*\"]', NULL, NULL, '2023-09-12 23:16:32', '2023-09-12 23:16:32'),
(154, 'App\\Models\\User', 4, 'API TOKEN', 'd8aefbdefd22ca3e0a4e7c8a20606eb1e6ef9e182fb8c29c6792819e060d7a09', '[\"*\"]', NULL, NULL, '2023-09-12 23:20:46', '2023-09-12 23:20:46'),
(155, 'App\\Models\\User', 4, 'API TOKEN', '5ac72932144defb9aa53bda8a038573f3334c18c04cbdf27c4af76aded7a2c7a', '[\"*\"]', NULL, NULL, '2023-09-12 23:28:48', '2023-09-12 23:28:48'),
(156, 'App\\Models\\User', 5, 'API TOKEN', '79251598ae8da3a7cdc404262612288b58efdf54038d03949c42346a1d511ee1', '[\"*\"]', NULL, NULL, '2023-09-13 00:05:18', '2023-09-13 00:05:18'),
(157, 'App\\Models\\User', 4, 'API TOKEN', 'a21381fe405d3d086bdc9c904a1f8018ac49299fe481dfa6b580853d30447085', '[\"*\"]', NULL, NULL, '2023-09-13 00:10:25', '2023-09-13 00:10:25'),
(158, 'App\\Models\\User', 8, 'API TOKEN', '834bcbd40add39b5d9baeac9e7ec843bebd39505377abd3474d375b05966d7fc', '[\"*\"]', NULL, NULL, '2023-09-13 00:26:02', '2023-09-13 00:26:02'),
(159, 'App\\Models\\User', 4, 'API TOKEN', '2cee5332b216461aedb9a3ba4eff94f1163fc1e4bb0e9a0a188760f1386dd543', '[\"*\"]', NULL, NULL, '2023-09-13 00:42:54', '2023-09-13 00:42:54'),
(160, 'App\\Models\\User', 4, 'API TOKEN', '9f6177ff0c9556176d3a7319e921d14b0162a118543f80d7de20cdf7b2282dc8', '[\"*\"]', NULL, NULL, '2023-09-13 00:52:33', '2023-09-13 00:52:33'),
(161, 'App\\Models\\User', 4, 'API TOKEN', '70c8d30b809c8174de717c559407c5b1132292207e9b2e215eb377f0288ba297', '[\"*\"]', NULL, NULL, '2023-09-13 00:53:05', '2023-09-13 00:53:05'),
(162, 'App\\Models\\User', 4, 'API TOKEN', '597a6f42eda9e36f351a142d15606c221e5a585fe3f90fbbf0693e71813a0cd9', '[\"*\"]', NULL, NULL, '2023-09-13 00:56:52', '2023-09-13 00:56:52'),
(163, 'App\\Models\\User', 8, 'API TOKEN', '51576c0a95d088a3c388d0d6c83ebc716d63cd5a5675f1640fd5636884582065', '[\"*\"]', NULL, NULL, '2023-09-13 01:02:28', '2023-09-13 01:02:28'),
(164, 'App\\Models\\User', 4, 'API TOKEN', '591ae9b1ceeeeb586fed2558d44f9434400be8dceb2d5bfdc61756a43b840c08', '[\"*\"]', NULL, NULL, '2023-09-13 22:54:38', '2023-09-13 22:54:38'),
(165, 'App\\Models\\User', 5, 'API TOKEN', '76b72fd84c9e832d2bfa9c8601c207ec3973d3c686241befebd1794a4ec5b8ff', '[\"*\"]', NULL, NULL, '2023-09-13 23:04:15', '2023-09-13 23:04:15'),
(166, 'App\\Models\\User', 4, 'API TOKEN', 'bd115c8e1fb85569d5c2ab8c2bffb95f0c89abec9e7de936e11933f314c5ff65', '[\"*\"]', NULL, NULL, '2023-09-13 23:06:23', '2023-09-13 23:06:23'),
(167, 'App\\Models\\User', 5, 'API TOKEN', 'b892485165ac0c4c3827d9efc0f3afe26e72776954b3e77d7b1a14b259c67591', '[\"*\"]', NULL, NULL, '2023-09-13 23:06:35', '2023-09-13 23:06:35'),
(168, 'App\\Models\\User', 4, 'API TOKEN', '1ae85af2e5311080e9ace53440c03d56a49faa78b4842c1bf5f6e1ef89129c7c', '[\"*\"]', NULL, NULL, '2023-09-13 23:42:26', '2023-09-13 23:42:26'),
(169, 'App\\Models\\User', 4, 'API TOKEN', '212a9cfb695321585d6726f161146ac3b5fe07a96369aaf63f5b964b41f476fc', '[\"*\"]', NULL, NULL, '2023-09-13 23:45:49', '2023-09-13 23:45:49'),
(170, 'App\\Models\\User', 8, 'API TOKEN', '1a86901efc54bab03fc4c7c7f73229f84ac86d1d49c39ae4302db10a6781b5ba', '[\"*\"]', NULL, NULL, '2023-09-13 23:59:15', '2023-09-13 23:59:15'),
(171, 'App\\Models\\User', 5, 'API TOKEN', 'c106ce69c2fce35555bac9d3f3531a4b47b8dda1760cba8e409735bbd21bd71c', '[\"*\"]', NULL, NULL, '2023-09-14 00:00:01', '2023-09-14 00:00:01'),
(172, 'App\\Models\\User', 4, 'API TOKEN', '8c3622b8adcb35b4d137723145a8561aeec841d3dfadefe1f31f83461cdc96ca', '[\"*\"]', NULL, NULL, '2023-09-14 01:25:38', '2023-09-14 01:25:38'),
(173, 'App\\Models\\User', 8, 'API TOKEN', 'fb58dfd0d10391876d6ee8f8faed1d29c72ba9ee7ba50b8ac589b1bbb52f5300', '[\"*\"]', NULL, NULL, '2023-09-14 02:11:39', '2023-09-14 02:11:39'),
(174, 'App\\Models\\User', 6, 'API TOKEN', 'fd94dfba9b3d3becc1ebf41452ac7f9938373fe1d4763d635a3cac90069fd5da', '[\"*\"]', NULL, NULL, '2023-09-14 02:22:30', '2023-09-14 02:22:30'),
(175, 'App\\Models\\User', 5, 'API TOKEN', 'd174d8dd11afc830e37b93fa4450ddd171b75a6510cfa9545e8befff70997363', '[\"*\"]', NULL, NULL, '2023-09-14 02:48:18', '2023-09-14 02:48:18'),
(176, 'App\\Models\\User', 6, 'API TOKEN', '19dccb1c4146539371cb77290f358a851116761afba80705cea64cc38c50a77c', '[\"*\"]', NULL, NULL, '2023-09-14 05:31:08', '2023-09-14 05:31:08'),
(177, 'App\\Models\\User', 5, 'API TOKEN', '08c53f4b97d52e17fd6169469ae28f0fc1911e4851f5d1e3f4d21131d5053438', '[\"*\"]', NULL, NULL, '2023-09-14 05:35:29', '2023-09-14 05:35:29'),
(178, 'App\\Models\\User', 4, 'API TOKEN', '015bec24667981298276cd763bd0b5a4bb4b109bf7d30b651b39f25fba626e25', '[\"*\"]', NULL, NULL, '2023-09-14 19:39:14', '2023-09-14 19:39:14'),
(179, 'App\\Models\\User', 4, 'API TOKEN', '295fcb2616552ec38c5bc7e6eaffd8d1f64d0a8d918449234632469dadfddabe', '[\"*\"]', NULL, NULL, '2023-09-14 19:39:51', '2023-09-14 19:39:51'),
(180, 'App\\Models\\User', 5, 'API TOKEN', '0c4a93742d87881ba3e0568216d91fd212589ef8627649db9836de34db402a2f', '[\"*\"]', NULL, NULL, '2023-09-14 19:42:59', '2023-09-14 19:42:59'),
(181, 'App\\Models\\User', 4, 'API TOKEN', 'ac7370588e0b0c3bb112b6409b205deda790531c31f2edcee597937b3f2d2741', '[\"*\"]', NULL, NULL, '2023-09-14 19:43:26', '2023-09-14 19:43:26'),
(182, 'App\\Models\\User', 4, 'API TOKEN', 'bc36dcfbae538b8735f87502e74456d6486aa71a6640aa9b5a3af25d25807929', '[\"*\"]', NULL, NULL, '2023-09-14 19:47:41', '2023-09-14 19:47:41'),
(183, 'App\\Models\\User', 5, 'API TOKEN', '1917ed44d2c1cc4880a111f7dfcce66198d39286cf6dd138d7e065df2fcbb296', '[\"*\"]', NULL, NULL, '2023-09-14 19:48:14', '2023-09-14 19:48:14'),
(184, 'App\\Models\\User', 4, 'API TOKEN', '7f00974cec75d9e8baac0f5abceb9cbf3c1a92026fca20fb0790c88b4f70babb', '[\"*\"]', NULL, NULL, '2023-09-15 16:23:19', '2023-09-15 16:23:19'),
(185, 'App\\Models\\User', 5, 'API TOKEN', 'ebec91eae639c9ee8ab0d0c7264bc483e47c1d571cf9c4dadf07791e7f185632', '[\"*\"]', NULL, NULL, '2023-09-15 16:26:37', '2023-09-15 16:26:37'),
(186, 'App\\Models\\User', 4, 'API TOKEN', '323d697015b70899dbdeae966f584d27d86b5f5296c04292f573603a8060807c', '[\"*\"]', NULL, NULL, '2023-09-15 16:59:32', '2023-09-15 16:59:32'),
(187, 'App\\Models\\User', 4, 'API TOKEN', '1996d6eebb80d4107c342d3d8e39d73603dfb03ce4c7ddcd57213a677e278e88', '[\"*\"]', NULL, NULL, '2023-09-15 18:14:20', '2023-09-15 18:14:20'),
(188, 'App\\Models\\User', 5, 'API TOKEN', '49da55ba5e05170a38692729ed1ff38363231f1cd5d57b5353486fde9f5e1742', '[\"*\"]', NULL, NULL, '2023-09-15 18:14:38', '2023-09-15 18:14:38'),
(189, 'App\\Models\\User', 5, 'API TOKEN', '4ebb3a45a9bad946501ed0850d04f1a37385c1e853a5d2b6807ee29809a0aac5', '[\"*\"]', NULL, NULL, '2023-09-15 18:35:17', '2023-09-15 18:35:17'),
(190, 'App\\Models\\User', 4, 'API TOKEN', '99606920318f0c5dc051517a4c8f9823600cd182c9f9e14c60fcb739c4a2a0a9', '[\"*\"]', NULL, NULL, '2023-09-15 18:36:05', '2023-09-15 18:36:05'),
(191, 'App\\Models\\User', 5, 'API TOKEN', 'ba3c4e532ffc71ad8f779e6ba82f78e51da7a6e0e329366f0fa6e9db3f042285', '[\"*\"]', NULL, NULL, '2023-09-15 19:02:21', '2023-09-15 19:02:21'),
(192, 'App\\Models\\User', 4, 'API TOKEN', '5408c9f9257e3cfe439c9b0a59bc8689aa3c09936300a37f77837817c1be8ea4', '[\"*\"]', NULL, NULL, '2023-09-16 03:11:02', '2023-09-16 03:11:02'),
(193, 'App\\Models\\User', 5, 'API TOKEN', 'b2830ee90a1407a1db84f42a05e1851ac3717e0dbd5d4cb1e76927d10d078f62', '[\"*\"]', NULL, NULL, '2023-09-16 03:11:59', '2023-09-16 03:11:59'),
(194, 'App\\Models\\User', 4, 'API TOKEN', 'e8d512cc782539800a0e7f90d5c4642944109f80e04765aab560ed99bab48c5a', '[\"*\"]', NULL, NULL, '2023-09-16 03:16:49', '2023-09-16 03:16:49'),
(195, 'App\\Models\\User', 5, 'API TOKEN', '72d5e482ec3cdf0051aa05003b6ef1f404de0e4bc421b1d99f54ff4f9b753502', '[\"*\"]', NULL, NULL, '2023-09-16 03:35:57', '2023-09-16 03:35:57'),
(196, 'App\\Models\\User', 5, 'API TOKEN', 'b64e076f3c4ea4e2c0501a9174d19b53929ec61818c82492abe52b4ee5a7248f', '[\"*\"]', NULL, NULL, '2023-09-16 03:37:16', '2023-09-16 03:37:16'),
(197, 'App\\Models\\User', 4, 'API TOKEN', '1225f6e9c1d07b30657417cb8c562c1ff04fd28d8ec6166786cb49c3fc8748a1', '[\"*\"]', NULL, NULL, '2023-09-16 03:38:37', '2023-09-16 03:38:37'),
(198, 'App\\Models\\User', 4, 'API TOKEN', '9903681bd4bad15f20dfb822d37dd3e268dc626cb2aa08b171e62dd0ade50624', '[\"*\"]', NULL, NULL, '2023-09-16 22:57:04', '2023-09-16 22:57:04'),
(199, 'App\\Models\\User', 5, 'API TOKEN', 'd5d1b00e7963d18a0f6b7be72e5ba66213e41bfc4c4abbf90e35a443f68c3c20', '[\"*\"]', NULL, NULL, '2023-09-16 23:03:31', '2023-09-16 23:03:31'),
(200, 'App\\Models\\User', 6, 'API TOKEN', '3cdf2cfeecdaa6b4a23ae518a752f9dc0b826237015f8c54e52360db12f2ceab', '[\"*\"]', NULL, NULL, '2023-09-17 00:38:55', '2023-09-17 00:38:55'),
(201, 'App\\Models\\User', 5, 'API TOKEN', '4bbe2f76d94db93f5513df94a0c1d613ff86bdd351b73515213542967f96d876', '[\"*\"]', NULL, NULL, '2023-09-17 00:53:01', '2023-09-17 00:53:01'),
(202, 'App\\Models\\User', 4, 'API TOKEN', '4d3c2efc186d6ff534cbc94dafed1e3d750dcb04fd36771c0c08363a624aa699', '[\"*\"]', NULL, NULL, '2023-09-17 06:03:46', '2023-09-17 06:03:46'),
(203, 'App\\Models\\User', 5, 'API TOKEN', 'bce820b7af48ff7a265999da984e7718191fe35b9ba6ee90a6973c5f799d68f1', '[\"*\"]', NULL, NULL, '2023-09-17 06:09:13', '2023-09-17 06:09:13'),
(204, 'App\\Models\\User', 8, 'API TOKEN', '1c045a4c2e4de4ebe6bbbb1921c1bf8e75b25f190c46a849f648afea09a856f7', '[\"*\"]', NULL, NULL, '2023-09-17 06:30:22', '2023-09-17 06:30:22'),
(205, 'App\\Models\\User', 8, 'API TOKEN', 'e4d8110f80a1b10d91a13f8a9d696fce96293bc5e5a5be99e662f6fcfbabe486', '[\"*\"]', NULL, NULL, '2023-09-17 06:32:33', '2023-09-17 06:32:33'),
(206, 'App\\Models\\User', 8, 'API TOKEN', 'dfde1ea8fbb36404ad2c1cc96f9e8eb407218e060338023332ae8779990cad4f', '[\"*\"]', NULL, NULL, '2023-09-17 06:33:59', '2023-09-17 06:33:59'),
(207, 'App\\Models\\User', 8, 'API TOKEN', '283e89451faf4433676fa02ff2db417eaf641a18ce42a6b1542c6673a0362c9f', '[\"*\"]', NULL, NULL, '2023-09-17 06:35:05', '2023-09-17 06:35:05'),
(208, 'App\\Models\\User', 8, 'API TOKEN', '270a18e30113f391fd28abd8fafcd587d3fc8f607b910f6f41839eba592a461d', '[\"*\"]', NULL, NULL, '2023-09-17 06:36:01', '2023-09-17 06:36:01'),
(209, 'App\\Models\\User', 8, 'API TOKEN', 'b936143ad7b3d2a43c00ea32677a46da88a25090db438b1ed0040c8b1eca46dd', '[\"*\"]', NULL, NULL, '2023-09-17 06:38:04', '2023-09-17 06:38:04'),
(210, 'App\\Models\\User', 8, 'API TOKEN', 'a98860e71a765be2a6eb1ccb5ece11f947b4177496f732fb240b949a128e0173', '[\"*\"]', NULL, NULL, '2023-09-17 06:44:48', '2023-09-17 06:44:48'),
(211, 'App\\Models\\User', 8, 'API TOKEN', 'e8ddcbcaecb96720dafe84bfdc714ed5a6b743103d348c16f5e17d946d599b66', '[\"*\"]', NULL, NULL, '2023-09-17 06:46:04', '2023-09-17 06:46:04'),
(212, 'App\\Models\\User', 7, 'API TOKEN', '5c00b2a1a1aef42c89ed21ac0eaca2cfe8f68a1c2620d5ef9c157c96991152e3', '[\"*\"]', NULL, NULL, '2023-09-17 07:00:33', '2023-09-17 07:00:33'),
(213, 'App\\Models\\User', 8, 'API TOKEN', 'ed4d3a776acf26874200e194c83b8bd834c87ae4cc868e9caa092a122a7790d6', '[\"*\"]', NULL, NULL, '2023-09-17 07:18:13', '2023-09-17 07:18:13'),
(214, 'App\\Models\\User', 8, 'API TOKEN', 'efb5efe9cb67dd8d66fe7c0c5e70b3527c3366124c8729d139f7f0926a34027e', '[\"*\"]', NULL, NULL, '2023-09-17 07:19:34', '2023-09-17 07:19:34'),
(215, 'App\\Models\\User', 8, 'API TOKEN', '6ae114d11cc3469c69bd2fd392f7364cd14d6eaa624d065fd6889e53edbcd701', '[\"*\"]', NULL, NULL, '2023-09-17 07:19:53', '2023-09-17 07:19:53'),
(216, 'App\\Models\\User', 5, 'API TOKEN', '7a21bf2e00dde7479bebaee0d2c722badea2b3aca125a9423a8c86b77241f07b', '[\"*\"]', NULL, NULL, '2023-09-17 07:20:49', '2023-09-17 07:20:49'),
(217, 'App\\Models\\User', 8, 'API TOKEN', '0ff22e463926e47b6777545ae86e05fdb9080c518c752ffc13bc52db0e45c27a', '[\"*\"]', NULL, NULL, '2023-09-17 07:32:09', '2023-09-17 07:32:09'),
(218, 'App\\Models\\User', 5, 'API TOKEN', 'e2dced974b1267952f20a0ed47712bfe74b48e5546361e92168d1987062aa601', '[\"*\"]', NULL, NULL, '2023-09-17 07:32:34', '2023-09-17 07:32:34'),
(219, 'App\\Models\\User', 8, 'API TOKEN', '08b6dc61d32ab901b1f0ca3f4889703b383d1ed84e54a122da89dd3358e6861d', '[\"*\"]', NULL, NULL, '2023-09-17 07:47:13', '2023-09-17 07:47:13'),
(220, 'App\\Models\\User', 5, 'API TOKEN', '0d214cff32667ea177a0d38d96e564ce3480f1c2df2e769d15502ebb0b3dfd04', '[\"*\"]', NULL, NULL, '2023-09-17 07:59:00', '2023-09-17 07:59:00'),
(221, 'App\\Models\\User', 5, 'API TOKEN', '785b6d3ac96124eac41a841241372f7b3a565b398eb09d7c2adcf483936b8b2d', '[\"*\"]', NULL, NULL, '2023-09-17 08:18:29', '2023-09-17 08:18:29'),
(222, 'App\\Models\\User', 5, 'API TOKEN', '8e9a25dcbc9240be9ace376405d1faaf49b6d45f3f030f62e7e3e34517b4c0c5', '[\"*\"]', NULL, NULL, '2023-09-17 08:18:53', '2023-09-17 08:18:53'),
(223, 'App\\Models\\User', 4, 'API TOKEN', '6cde2b5e67aef5da3e62aae479642945bd974d06cc86035845b679b4116609dc', '[\"*\"]', NULL, NULL, '2023-09-17 08:35:25', '2023-09-17 08:35:25'),
(224, 'App\\Models\\User', 5, 'API TOKEN', 'fd0f722a67dec8a2256594316c4fcf40c773640c0993ecc3824e48abef011242', '[\"*\"]', NULL, NULL, '2023-09-17 08:37:50', '2023-09-17 08:37:50'),
(225, 'App\\Models\\User', 5, 'API TOKEN', '935af87be7f86c00e7be682094dc44aa18c9df2c60486a4e8c8cdbad9f1ee864', '[\"*\"]', NULL, NULL, '2023-09-17 19:51:39', '2023-09-17 19:51:39'),
(226, 'App\\Models\\User', 4, 'API TOKEN', '0dcef592211b8cc871fbc3f2c002dc0f864e9ab908224435d79a99174e5e1d30', '[\"*\"]', NULL, NULL, '2023-09-17 19:53:35', '2023-09-17 19:53:35'),
(227, 'App\\Models\\User', 12, 'API TOKEN', '1bad37fa0d1a35bea542d297956419f3d3ab37a8d013e920191a93ab1b86c76f', '[\"*\"]', NULL, NULL, '2023-09-17 20:59:05', '2023-09-17 20:59:05'),
(228, 'App\\Models\\User', 4, 'API TOKEN', '593bf9d1f719e2581dae85c4e8b37255970518b91c3111833f48cee6a3bbba10', '[\"*\"]', NULL, NULL, '2023-09-17 21:02:37', '2023-09-17 21:02:37'),
(229, 'App\\Models\\User', 4, 'API TOKEN', 'fb18f67caa147317c2397e7d7b6b2b67126d23cfe44920338df4437d1681e451', '[\"*\"]', NULL, NULL, '2023-09-17 21:02:49', '2023-09-17 21:02:49'),
(230, 'App\\Models\\User', 12, 'API TOKEN', 'cd0e402c1ca365cfef741a636d1c490e1e37f97d1dd53130bd85c8c8f5dd46a4', '[\"*\"]', NULL, NULL, '2023-09-17 21:04:52', '2023-09-17 21:04:52'),
(231, 'App\\Models\\User', 12, 'API TOKEN', '3891b40bed1d1403ab36d482e61e416fea7223c14f9285aa72f86c5e05387b01', '[\"*\"]', NULL, NULL, '2023-09-17 21:07:39', '2023-09-17 21:07:39'),
(232, 'App\\Models\\User', 4, 'API TOKEN', '4f8901d5fb7bda0454f05ff32bab944ebb8460751fcf3652cbe4ccd04829f995', '[\"*\"]', NULL, NULL, '2023-09-17 21:07:55', '2023-09-17 21:07:55'),
(233, 'App\\Models\\User', 4, 'API TOKEN', '18779282d646d85cdba69ef84262e11b08adf65de73d446b14f6f35cf48a2cc2', '[\"*\"]', NULL, NULL, '2023-09-18 04:33:26', '2023-09-18 04:33:26'),
(234, 'App\\Models\\User', 5, 'API TOKEN', '8eb790d4b8a8685821195e143901ed7c625442caecd5768aad58a0d7e4a96406', '[\"*\"]', NULL, NULL, '2023-09-18 04:34:37', '2023-09-18 04:34:37'),
(235, 'App\\Models\\User', 12, 'API TOKEN', '85efea8cb2fc231eabc24ecd9429369a48d41d0589a73c2ff83633e480cdca61', '[\"*\"]', NULL, NULL, '2023-09-18 04:36:03', '2023-09-18 04:36:03'),
(236, 'App\\Models\\User', 4, 'API TOKEN', '39cdb8c9d3f012e994ddb18e3f342f2e9fcbb7bd2eac2c0964deb9cb95c01dc8', '[\"*\"]', NULL, NULL, '2023-09-18 04:39:16', '2023-09-18 04:39:16'),
(237, 'App\\Models\\User', 7, 'API TOKEN', '6081b24b87494966806c8758f96997d811b48c1904c8b657182da8437b76bad6', '[\"*\"]', NULL, NULL, '2023-09-18 04:39:48', '2023-09-18 04:39:48'),
(238, 'App\\Models\\User', 5, 'API TOKEN', 'b3b282cd61f9fcb5ecfbedb442bf79467439504ac4f4c1b0749e23df89e36377', '[\"*\"]', NULL, NULL, '2023-09-18 04:40:15', '2023-09-18 04:40:15'),
(239, 'App\\Models\\User', 5, 'API TOKEN', '57c2ed6461bc0ae3d1fc76009fb8b6e604ed89cf45fba879d0ec97f29ae0a16f', '[\"*\"]', NULL, NULL, '2023-09-18 06:33:27', '2023-09-18 06:33:27'),
(240, 'App\\Models\\User', 7, 'API TOKEN', 'c4583a0f809827f1ae5466acd2427a361583e759075a4290a58729ae35f8c67f', '[\"*\"]', NULL, NULL, '2023-09-18 06:35:31', '2023-09-18 06:35:31'),
(241, 'App\\Models\\User', 5, 'API TOKEN', 'b40975ed80ea1e5afadcec550c68fdc367ce5ee9f465be5e6fa518e72da951bb', '[\"*\"]', NULL, NULL, '2023-09-18 06:50:45', '2023-09-18 06:50:45'),
(242, 'App\\Models\\User', 5, 'API TOKEN', 'f856064fbf6b6e64b187c08a0a7d5dacf7663e6438b1cbc7dc810ccc149d9c1c', '[\"*\"]', NULL, NULL, '2023-09-18 06:54:13', '2023-09-18 06:54:13'),
(243, 'App\\Models\\User', 5, 'API TOKEN', '19ffdfb6b5c9c7f39b5409cb91e26b3ae82577762d3cca78925cddeab4d675ae', '[\"*\"]', NULL, NULL, '2023-09-18 06:54:24', '2023-09-18 06:54:24'),
(244, 'App\\Models\\User', 7, 'API TOKEN', '4bf181f12d4d90d69ad746ac6007a35f2e035a46f268ff1eb043eeff9231ff29', '[\"*\"]', NULL, NULL, '2023-09-18 06:59:13', '2023-09-18 06:59:13'),
(245, 'App\\Models\\User', 5, 'API TOKEN', '515d9320da49d15397107c7cc370a3d7013a62d97cea80666ddcc4f21385d016', '[\"*\"]', NULL, NULL, '2023-09-18 07:01:31', '2023-09-18 07:01:31'),
(246, 'App\\Models\\User', 4, 'API TOKEN', '1c194a648242f61b4b92c329f7a50b5b0ae18ef4ef2e1a10f5eac38ae0e2f90a', '[\"*\"]', NULL, NULL, '2023-09-18 07:15:56', '2023-09-18 07:15:56'),
(247, 'App\\Models\\User', 12, 'API TOKEN', 'cb10e82f986470a342d68cd4f8e9db86081d90628ad1191f7401efb09a0144d7', '[\"*\"]', NULL, NULL, '2023-09-18 07:20:38', '2023-09-18 07:20:38'),
(248, 'App\\Models\\User', 8, 'API TOKEN', '3352ee8c5389b58b1b4bbc47f9da4bf3cb2ccb59dddb055070b31ce829c4d3c6', '[\"*\"]', NULL, NULL, '2023-09-18 07:40:26', '2023-09-18 07:40:26'),
(249, 'App\\Models\\User', 4, 'API TOKEN', 'a65ba7ca72ef8685aaf2895f85181c31d91cad941509f873f3d12394e0adf99b', '[\"*\"]', NULL, NULL, '2023-09-18 07:53:50', '2023-09-18 07:53:50'),
(250, 'App\\Models\\User', 8, 'API TOKEN', '956a888a9c362fa8d17b8611cdf4810c357cb7b85f07084786a81274c2504b3f', '[\"*\"]', NULL, NULL, '2023-09-18 08:03:13', '2023-09-18 08:03:13'),
(251, 'App\\Models\\User', 4, 'API TOKEN', '21e6332bf55f805ff8b18063d4f0dcd0675729e2b261c2b9bf42b9a1eea8a138', '[\"*\"]', NULL, NULL, '2023-09-18 08:05:39', '2023-09-18 08:05:39'),
(252, 'App\\Models\\User', 5, 'API TOKEN', 'd3d2b87f6a6b4f8506879a5b05df3a04b998b638cf3043184db54e2f6094e678', '[\"*\"]', NULL, NULL, '2023-09-18 08:06:09', '2023-09-18 08:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_name` varchar(255) NOT NULL,
  `stocks` int(10) NOT NULL,
  `isactive` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `price`, `category`, `image`, `created_at`, `updated_at`, `store_name`, `stocks`, `isactive`) VALUES
(1, 'Katsudon', 100.00, 'ricemeals', 'Katsudon_2023-03-05-16-31-30.png', NULL, '2023-09-18 07:22:49', 'Kitchen Express', 39, 1),
(2, 'Chicken Curry', 100.00, 'ricemeals', 'Chicken Curry_2023-03-05-15-23-23.png', NULL, '2023-09-18 07:22:49', 'Kitchen Express', 37, 1),
(3, 'Lechon Paksiw', 100.00, 'ricemeals', 'Lechon Paksiw_2023-03-05-15-23-37.png', NULL, '2023-09-17 07:03:18', 'Kitchen Express', 32, 1),
(4, '2pc Barbeque', 100.00, 'ricemeals', '2pc%20BBQ.png', NULL, '2023-09-17 06:21:15', 'Kitchen Express', 35, 1),
(5, 'Salisbury Steak', 100.00, 'ricemeals', 'Salisbury%20Steak.png', NULL, '2023-09-14 19:51:04', 'Kitchen Express', 45, 1),
(6, 'Pork Tapa', 100.00, 'ricemeals', 'Pork%20Tapa.png', NULL, '2023-09-18 07:18:54', 'Kitchen Express', 45, 1),
(7, 'Cheesy Spaghetti', 100.00, 'pasta', 'Cheesy%20Spaghetti.png', NULL, '2023-09-14 00:14:49', 'Kitchen Express', 41, 1),
(8, 'Brewed Calamansi', 50.00, 'beverages', 'Brewed%20Calamansi%20Drink.png', NULL, '2023-09-17 07:03:18', 'Kitchen Express', 44, 1),
(9, 'Calamansi Drink', 50.00, 'beverages', 'Calamansi%20Drink.png', NULL, '2023-09-11 18:41:15', 'Kitchen Express', 47, 1),
(10, 'C2', 40.00, 'beverages', 'C2.png', NULL, '2023-09-17 06:21:15', 'Kitchen Express', 42, 1),
(11, 'Water', 20.00, 'beverages', 'Water.png', NULL, '2023-09-18 07:19:18', 'Kitchen Express', 41, 1),
(14, 'Burgersilog', 75.00, 'ricemeals', 'Burgersilog_2023-03-05-17-00-05.png', '2023-03-05 09:00:05', '2023-09-18 07:23:21', 'La Mudras Corner', 43, 1),
(15, 'Hotsilog', 75.00, 'ricemeals', 'Hotsilog_2023-03-05-17-00-29.png', '2023-03-05 09:00:29', '2023-09-18 06:50:03', 'La Mudras Corner', 45, 1),
(16, 'Pork Teriyaki', 75.00, 'ricemeals', 'Pork Teriyaki_2023-03-05-17-00-56.png', '2023-03-05 09:00:56', '2023-09-17 07:03:47', 'La Mudras Corner', 47, 1),
(17, 'Sisig', 75.00, 'ricemeals', 'Sisig_2023-03-05-17-01-57.png', '2023-03-05 09:01:57', '2023-09-18 07:23:21', 'La Mudras Corner', 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
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
(8, 'Admin', 'admin@apc.edu.ph', NULL, '$2y$10$hXP.7.umEI4bh8QFPycth.bhLWmRti1yCMRGBJA7ZODqPL8bSNRTm', NULL, '2023-03-04 00:34:38', '2023-03-04 00:34:38', 'admin', 0, 1),
(12, 'Corneliani Jon Melo', 'cgmelo@student.apc.edu.ph', NULL, '$2y$10$qio81Y5dDGcdN8qm8ckF5.mWdE2SAS96/0.eco6STzBqfgGiGUV7i', NULL, '2023-09-17 20:58:29', '2023-09-17 20:58:29', 'customer', 0, 1),
(13, 'Kurt Jordan Cadenas', 'kvcadenas@student.apc.edu.ph', NULL, '$2y$10$yHElPb6eTr97E9bHE8eOmej.7I93v344vxhC0SuqkGk0JiDfajllC', NULL, '2023-09-17 21:10:47', '2023-09-17 21:10:47', 'customer', 0, 1),
(14, 'Nathan Allen Sinaguinan', 'nbsinaguinan@student.apc.edu.ph', NULL, '$2y$10$3awar6t5g/2N1sZ2Vz77H.fR3yxaUVKkHJqT7O3TEdq7bYn/dgLiW', NULL, '2023-09-17 21:10:47', '2023-09-17 21:10:47', 'customer', 0, 1),
(15, 'Isaiah Jade Tutor', 'imtutor@student.apc.edu.ph', NULL, '$2y$10$FbMGAwTQnidOSYN/nqn57.eWtgGRxKtmk29dr.mhfgMhYMmiiCfhC', NULL, '2023-09-17 21:10:47', '2023-09-17 21:10:47', 'customer', 0, 1),
(16, 'Stephano Franco Binay', 'ssjbinay@student.apc.edu.ph', NULL, '$2y$10$ZwKRA9O49wT00iWVGXa/f.gMGvbs3BPIjMtfBvWVj7wyHPGLvXT6G', NULL, '2023-09-17 21:10:47', '2023-09-17 21:10:47', 'customer', 0, 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
