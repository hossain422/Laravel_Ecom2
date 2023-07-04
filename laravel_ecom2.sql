-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 04, 2023 at 11:34 AM
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
-- Database: `laravel_ecom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(44, 14, 6, 2, '2023-07-04 03:24:31', '2023-07-04 03:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '1', '2023-06-18 00:21:01', '2023-06-18 00:21:01'),
(2, 'Mobile', '1', '2023-06-18 00:21:15', '2023-06-18 00:21:15'),
(3, 'Tablet', '1', '2023-06-18 00:21:37', '2023-06-18 00:21:37'),
(4, 'Watch', '1', '2023-06-18 00:21:57', '2023-06-18 00:21:57'),
(5, 'Monitor', '1', '2023-06-18 00:22:07', '2023-06-18 00:22:07'),
(6, 'TV', '1', '2023-06-25 10:51:27', '2023-06-25 10:51:27');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_13_165731_create_categories_table', 1),
(6, '2023_06_14_152327_create_products_table', 1),
(7, '2023_06_18_050915_create_carts_table', 1),
(8, '2023_06_19_063923_create_orders_table', 2),
(9, '2023_06_19_063945_create_order_items_table', 2),
(10, '2023_06_19_082806_create_shippings_table', 3),
(11, '2023_06_22_022346_create_reviews_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `product_id`, `total`, `sub_total`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1892599395_Ecom2', '2', NULL, '24100', '23900', 'paypal', '1', '2023-06-19 03:02:51', '2023-06-19 08:30:33'),
(2, '1087550744_Ecom2', '2', NULL, '18800', '18600', 'paypal', '2', '2023-06-19 03:07:04', '2023-06-19 08:28:05'),
(3, '52190354_Ecom2', '2', NULL, '20300', '20100', 'paypal', '1', '2023-06-19 03:09:46', '2023-06-19 08:24:59'),
(6, '576922320_Ecom2', '2', NULL, '20300', '20100', 'visa', '1', '2023-06-19 03:13:59', '2023-06-19 03:13:59'),
(7, '750741895_Ecom2', '2', NULL, '20300', '20100', 'visa', '1', '2023-06-19 03:17:41', '2023-06-19 08:30:38'),
(8, '119939338_Ecom2', '2', NULL, '15800', '15600', 'Bkash', '2', '2023-06-19 03:18:27', '2023-06-19 08:30:46'),
(10, '957104671_Ecom2', '2', NULL, '23500', '23300', 'Bkash', '1', '2023-06-19 18:50:32', '2023-06-19 18:50:32'),
(11, '11495311_Ecom2', '2', NULL, '46700', '46500', 'paypal', '1', '2023-06-19 19:06:31', '2023-06-19 19:06:31'),
(12, '603402579_Ecom2', '2', NULL, '22300', '22100', 'Bkash', '1', '2023-06-19 19:09:37', '2023-06-19 19:09:37'),
(14, '263487344_Ecom2', '2', NULL, '29900', '29700', 'Nagad', '1', '2023-06-20 07:50:42', '2023-06-20 07:50:42'),
(15, '371923642_Ecom2', '1', NULL, '12800', '12600', 'Bkash', '1', '2023-06-21 22:04:05', '2023-06-21 22:04:05'),
(16, '929404422_Ecom2', '1', NULL, '20000', '19800', 'paypal', '1', '2023-06-21 22:15:11', '2023-06-21 22:15:11'),
(17, '816629317_Ecom2', '1', NULL, '27600', '27400', 'paypal', '1', '2023-06-25 08:05:26', '2023-06-25 08:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '274889058Ecom2', '6', '1', '6300', '2023-06-19 02:55:35', '2023-06-19 02:55:35'),
(2, '274889058Ecom2', '4', '2', '3000', '2023-06-19 02:55:35', '2023-06-19 02:55:35'),
(3, '274889058Ecom2', '1', '1', '5300', '2023-06-19 02:55:36', '2023-06-19 02:55:36'),
(4, '1892599395_Ecom2', '6', '2', '6300', '2023-06-19 03:02:51', '2023-06-19 03:02:51'),
(5, '1892599395_Ecom2', '4', '2', '3000', '2023-06-19 03:02:52', '2023-06-19 03:02:52'),
(6, '1892599395_Ecom2', '1', '1', '5300', '2023-06-19 03:02:52', '2023-06-19 03:02:52'),
(7, '1087550744_Ecom2', '6', '2', '6300', '2023-06-19 03:07:04', '2023-06-19 03:07:04'),
(8, '1087550744_Ecom2', '4', '2', '3000', '2023-06-19 03:07:05', '2023-06-19 03:07:05'),
(9, '52190354_Ecom2', '6', '2', '6300', '2023-06-19 03:09:47', '2023-06-19 03:09:47'),
(10, '52190354_Ecom2', '2', '1', '7500', '2023-06-19 03:09:47', '2023-06-19 03:09:47'),
(11, '482953060_Ecom2', '6', '2', '6300', '2023-06-19 03:12:21', '2023-06-19 03:12:21'),
(12, '482953060_Ecom2', '2', '1', '7500', '2023-06-19 03:12:21', '2023-06-19 03:12:21'),
(13, '151360714_Ecom2', '6', '2', '6300', '2023-06-19 03:12:44', '2023-06-19 03:12:44'),
(14, '151360714_Ecom2', '2', '1', '7500', '2023-06-19 03:12:44', '2023-06-19 03:12:44'),
(15, '576922320_Ecom2', '6', '2', '6300', '2023-06-19 03:14:00', '2023-06-19 03:14:00'),
(16, '576922320_Ecom2', '2', '1', '7500', '2023-06-19 03:14:00', '2023-06-19 03:14:00'),
(17, '750741895_Ecom2', '6', '2', '6300', '2023-06-19 03:17:42', '2023-06-19 03:17:42'),
(18, '750741895_Ecom2', '2', '1', '7500', '2023-06-19 03:17:43', '2023-06-19 03:17:43'),
(19, '119939338_Ecom2', '5', '1', '9300', '2023-06-19 03:18:27', '2023-06-19 03:18:27'),
(20, '119939338_Ecom2', '6', '1', '6300', '2023-06-19 03:18:27', '2023-06-19 03:18:27'),
(21, '84467842_Ecom2', '1', '2', '5300', '2023-06-19 03:19:30', '2023-06-19 03:19:30'),
(22, '84467842_Ecom2', '3', '1', '3500', '2023-06-19 03:19:31', '2023-06-19 03:19:31'),
(23, '957104671_Ecom2', '4', '2', '3000', '2023-06-19 18:50:35', '2023-06-19 18:50:35'),
(24, '957104671_Ecom2', '6', '1', '6300', '2023-06-19 18:50:37', '2023-06-19 18:50:37'),
(25, '957104671_Ecom2', '3', '1', '3500', '2023-06-19 18:50:37', '2023-06-19 18:50:37'),
(26, '957104671_Ecom2', '2', '1', '7500', '2023-06-19 18:50:37', '2023-06-19 18:50:37'),
(27, '11495311_Ecom2', '5', '5', '9300', '2023-06-19 19:06:32', '2023-06-19 19:06:32'),
(28, '603402579_Ecom2', '1', '1', '5300', '2023-06-19 19:09:38', '2023-06-19 19:09:38'),
(29, '603402579_Ecom2', '2', '1', '7500', '2023-06-19 19:09:39', '2023-06-19 19:09:39'),
(30, '603402579_Ecom2', '5', '1', '9300', '2023-06-19 19:09:39', '2023-06-19 19:09:39'),
(31, '2086303662_Ecom2', '1', '1', '5300', '2023-06-19 19:34:22', '2023-06-19 19:34:22'),
(32, '2086303662_Ecom2', '2', '3', '7500', '2023-06-19 19:34:23', '2023-06-19 19:34:23'),
(33, '263487344_Ecom2', '5', '1', '9300', '2023-06-20 07:50:44', '2023-06-20 07:50:44'),
(34, '263487344_Ecom2', '6', '1', '6300', '2023-06-20 07:50:45', '2023-06-20 07:50:45'),
(35, '263487344_Ecom2', '1', '2', '5300', '2023-06-20 07:50:45', '2023-06-20 07:50:45'),
(36, '263487344_Ecom2', '3', '1', '3500', '2023-06-20 07:50:45', '2023-06-20 07:50:45'),
(37, '371923642_Ecom2', '6', '2', '6300', '2023-06-21 22:04:05', '2023-06-21 22:04:05'),
(38, '929404422_Ecom2', '2', '1', '7500', '2023-06-21 22:15:11', '2023-06-21 22:15:11'),
(39, '929404422_Ecom2', '3', '2', '3500', '2023-06-21 22:15:12', '2023-06-21 22:15:12'),
(40, '929404422_Ecom2', '1', '1', '5300', '2023-06-21 22:15:12', '2023-06-21 22:15:12'),
(41, '816629317_Ecom2', '5', '1', '9300', '2023-06-25 08:05:27', '2023-06-25 08:05:27'),
(42, '816629317_Ecom2', '1', '2', '5300', '2023-06-25 08:05:28', '2023-06-25 08:05:28'),
(43, '816629317_Ecom2', '2', '1', '7500', '2023-06-25 08:05:30', '2023-06-25 08:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `category_id`, `price`, `short_desc`, `description`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dell 530', '1687080685_Ecom2.jpg', '5', '5300', 'Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop', 'Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop  Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop', '53', '1', '2023-06-18 00:24:26', '2023-06-25 08:05:28'),
(2, 'Itel A60', '1687080654_Ecom2.jpg', '2', '7500', 'Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop', 'Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop Dell Laptop is a very usefull laptop', '6', '1', '2023-06-18 00:33:56', '2023-06-25 08:05:30'),
(3, 'Samnung 630', '1687081256_Ecom2.jpg', '2', '3500', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.\r\nIdentify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', '67', '1', '2023-06-18 03:40:56', '2023-06-21 22:15:12'),
(4, 'Beautiful Watch', '1687081319_Ecom2.jpg', '4', '3000', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method. Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', '15', '1', '2023-06-18 03:41:59', '2023-06-18 03:41:59'),
(5, 'Apply Laptop', '1687081402_Ecom2.jpg', '1', '9300', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.\r\nIdentify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', '18', '1', '2023-06-18 03:43:22', '2023-06-25 08:05:27'),
(6, 'HP 360 Monitor', '1687081551_Ecom2.jpg', '5', '6300', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', 'Identify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.\r\nIdentify the image file you want to delete. If you are updating an existing model with an associated image, you need to retrieve the current image path or filename.\r\n\r\nUse the Storage facade to delete the image file. Laravel provides a convenient way to manage files using storage drivers. Assuming you\'re using the default public disk, you can use the Storage::delete() method.', '52', '1', '2023-06-18 03:45:51', '2023-06-21 22:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '6', '3', 'Good product', '1', '2023-06-21 21:07:02', '2023-06-21 21:07:02'),
(2, '1', '6', '4', 'Helpful product', '1', '2023-06-21 22:07:30', '2023-06-21 22:07:30'),
(3, '1', '2', '5', 'Nice Product', '1', '2023-06-21 22:17:57', '2023-06-21 22:17:57'),
(4, '1', '2', '5', 'useful Product', '1', '2023-06-21 22:18:35', '2023-06-21 22:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `email`, `phone`, `address`, `country`, `zip`, `city`, `created_at`, `updated_at`) VALUES
(1, '274889058Ecom2', 'Nazmul', 'benglish085@gmail.com', '01790265643', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 02:55:35', '2023-06-19 02:55:35'),
(2, '1892599395_Ecom2', 'Nazmul', 'benglish085@gmail.com', '01790265643', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:02:51', '2023-06-19 03:02:51'),
(3, '1087550744_Ecom2', 'Raful', 'rafiqul9189@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:07:04', '2023-06-19 03:07:04'),
(4, '52190354_Ecom2', 'Nazmul', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:09:47', '2023-06-19 03:09:47'),
(5, '482953060_Ecom2', 'Nazmul', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:12:21', '2023-06-19 03:12:21'),
(6, '151360714_Ecom2', 'Nazmul', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:12:44', '2023-06-19 03:12:44'),
(7, '576922320_Ecom2', 'Hossain', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:13:59', '2023-06-19 03:13:59'),
(8, '750741895_Ecom2', 'Hossain', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:17:42', '2023-06-19 03:17:42'),
(9, '119939338_Ecom2', 'Hossain', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:18:27', '2023-06-19 03:18:27'),
(10, '84467842_Ecom2', 'Raful', 'rafiqul9189@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 03:19:30', '2023-06-19 03:19:30'),
(11, '957104671_Ecom2', 'Nazmul', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 18:50:32', '2023-06-19 18:50:32'),
(12, '11495311_Ecom2', 'Hossain', 'nazmulhossain9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 19:06:32', '2023-06-19 19:06:32'),
(13, '603402579_Ecom2', 'Raful', 'rafiqul9189@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-19 19:09:37', '2023-06-19 19:09:37'),
(14, '2086303662_Ecom2', 'admin', 'nazmulhossain9996@gmail.com', '01790265643', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Dhaka', '2023-06-19 19:34:22', '2023-06-19 19:34:22'),
(15, '263487344_Ecom2', 'Raful', 'rafiqul9189@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-20 07:50:43', '2023-06-20 07:50:43'),
(16, '371923642_Ecom2', 'Raful', 'rafiqul9189@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-21 22:04:05', '2023-06-21 22:04:05'),
(17, '929404422_Ecom2', 'Nazmul', 'nazmul9996@gmail.com', '01609169640', 'Bishai Shawrail, Kalukhali, Rajbari', 'Bangladesh', '7722', 'Rajbari', '2023-06-21 22:15:11', '2023-06-21 22:15:11'),
(18, '816629317_Ecom2', 'Nazmul', 'benglish085@gmail.com', '01790265643', 'Bishai Shawrail', 'Bangladesh', '7722', 'Bishai Shawrail', '2023-06-25 08:05:27', '2023-06-25 08:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `provider` varchar(500) DEFAULT NULL,
  `provider_id` varchar(500) DEFAULT NULL,
  `provider_token` varchar(500) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `zip` varchar(55) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `provider`, `provider_id`, `provider_token`, `creator`, `phone`, `address`, `country`, `zip`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$bRJdAVnW1p56htag2KmBF.xH6b/9kBhnkv5Y5nIotPzVTs3j.x.s2', 2, NULL, NULL, NULL, NULL, '', '', '0', '0', '0', NULL, '2023-06-18 00:17:28', '2023-06-18 00:17:28'),
(2, 'user1', 'user1@gmail.com', NULL, '$2y$10$d/I4PbQCaSHVwgsK12yADehQpcHXmSZneTszH0jkSYg91gSJjKSVC', 1, NULL, NULL, NULL, NULL, '', '', '0', '0', '0', NULL, '2023-06-18 00:17:59', '2023-06-18 00:17:59'),
(3, 'user2', 'user2@gmail.com', NULL, '$2y$10$aZP8U1zSpivnBK9OxyVn..9L0zkpkXrzvDVFyf.zNslH/NmSPMbk2', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-27 20:49:57', '2023-06-27 20:49:57'),
(4, 'user3', 'user3@gmail.com', NULL, '$2y$10$DS.b24j1mG/6u6VZbYynsOk3cVWe3sOAX1XjBGlvOk5dSi1iy1iZS', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-28 02:57:32', '2023-06-28 02:57:32'),
(5, 'user4', 'user4@gmail.com', NULL, '$2y$10$V3VproTnfHjRWMf6dmX8u.T2CacIPOWqRdA9PwOZ7oCD7yEUkw6AW', 1, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-28 02:59:07', '2023-06-28 02:59:07'),
(6, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$pLuJaJ9OVZWwQ6GMSAyk8ujuWjKSRkA64A98kvqs.QYHWJ35xdyn.', 2, NULL, NULL, NULL, 1, '01596324585', NULL, 'India', '7785', 'Kolkata', NULL, '2023-06-28 03:06:57', '2023-06-28 06:45:22'),
(7, 'admin3', 'admin3@gmail.com', NULL, '$2y$10$XI.VyR/7QpGdWuirtxQQVe/.cSVoETK6lAhvmfw6MS.FcvRnY7OUC', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-28 03:13:02', '2023-06-28 03:13:02'),
(14, 'Nazmul Hossain', 'azmul422@gmail.com', NULL, NULL, 1, 'facebook', '1316000642655938', 'EAADXu9jHnMYBAKZCZBQrBvdcU0BdkgK198MYCsta063hVRxZBWedk2VeoOHygwsoxeP0hGoLLsPPAwHyZBfrIV6c9o0jyp5wYb3DjyvBOp09869E14JZCihHpnvR2d0Vp9IFZCjGkhs1bN7OQxLJPGrXtwbpwYiNtdLoOGMlpnvq7Lvi2gZBYPGi94V6xrW0ZBg3u7195zT4OJiPvdxpeoa4zix6ejk8vbtQnPNkhqoZARwZDZD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-04 00:03:05', '2023-07-04 00:03:05'),
(15, 'Nazmul Hossain', 'benglish085@gmail.com', NULL, NULL, 1, 'github', '95046096', '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', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-04 00:03:46', '2023-07-04 00:03:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
