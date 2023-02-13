-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table wisdomup.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `phone_no`, `admin_type`, `created_at`, `updated_at`) VALUES
	(1, 'Abu Saeed Sabuj', 'admin@gmail.com', '$2a$04$d79v2HXr4h.Z7S/mOuBcSeopTtHLZtN7MpV4KA.MTQ/wM053L1JnS', NULL, NULL, 'Super Admin', '2022-11-15 12:17:51', '2022-11-15 12:17:53');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table wisdomup.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '10',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.banners: ~2 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `title`, `type`, `image`, `button_text`, `url`, `priority`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Test banner update', 'Default', '1669630975.jpg', 'hello', 'https://www.youtube.com/watch?v=vDJIc6NHJe0', 3, 1, '2022-11-28 09:00:23', '2022-11-28 10:22:55'),
	(2, 'New Banner', 'small', '1669631044.jpg', 'hello', 'https://www.youtube.com/watch?v=vDJIc6NHJe0', 1, 1, '2022-11-28 10:24:04', '2022-11-28 10:24:04');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table wisdomup.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `country` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.brands: ~1 rows (approximately)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`, `description`, `country`, `icon`, `show_homepage`, `parent_id`, `created_at`, `updated_at`) VALUES
	(1, 'Hey', 'feeerer', 'Bangladesh', '1668510277.jpg', 1, NULL, '2022-11-15 11:04:37', '2022-11-15 11:04:37'),
	(3, 'Test brand', '232323', 'efefef', '1669457819.jpg', 0, NULL, '2022-11-26 10:16:59', '2022-11-26 10:16:59');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping structure for table wisdomup.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.carts: ~13 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 13, 1, '::1', 1, 37, '2023-01-28 06:43:27', '2023-01-28 06:51:08'),
	(2, 13, 2, '::1', 2, 37, '2023-01-28 06:55:28', '2023-01-28 06:58:51'),
	(3, 13, 3, '::1', 4, 37, '2023-01-28 07:13:33', '2023-01-28 09:28:49'),
	(4, 13, 3, '::1', 2, 40, '2023-01-28 08:37:46', '2023-01-28 09:28:49'),
	(5, 13, 3, '::1', 2, 34, '2023-01-28 08:37:55', '2023-01-28 09:28:49'),
	(8, 13, 3, '::1', 2, 42, '2023-01-28 08:51:39', '2023-01-28 09:28:49'),
	(9, 13, 4, '::1', 6, 32, '2023-01-28 09:29:06', '2023-01-28 10:16:23'),
	(11, 13, NULL, '::1', 6, 38, '2023-01-28 10:34:34', '2023-02-13 18:17:26'),
	(12, NULL, NULL, '10.0.0.101', 1, 37, '2023-02-05 07:08:47', '2023-02-05 07:08:47'),
	(13, NULL, NULL, '10.0.0.100', 1, 37, '2023-02-06 09:57:58', '2023-02-06 09:57:58'),
	(14, NULL, NULL, '10.0.0.103', 1, 37, '2023-02-09 03:01:32', '2023-02-09 03:01:32'),
	(15, NULL, NULL, '10.0.0.103', 1, 31, '2023-02-09 03:01:44', '2023-02-09 03:01:44'),
	(16, NULL, NULL, '::1', 2, 32, '2023-02-11 16:30:18', '2023-02-13 18:20:58'),
	(17, NULL, NULL, '::1', 18, 31, '2023-02-13 18:19:20', '2023-02-13 18:20:44'),
	(18, NULL, NULL, '::1', 5, 34, '2023-02-13 18:21:00', '2023-02-13 18:25:03'),
	(19, NULL, NULL, '::1', 1, 34, '2023-02-13 18:21:00', '2023-02-13 18:21:00'),
	(20, NULL, NULL, '::1', 4, 36, '2023-02-13 18:21:02', '2023-02-13 18:21:04'),
	(21, NULL, NULL, '::1', 1, 36, '2023-02-13 18:21:02', '2023-02-13 18:21:02');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table wisdomup.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.categories: ~14 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `show_homepage`, `parent_id`, `created_at`, `updated_at`) VALUES
	(7, 'Stone Speakers', 'Stone Speakers', '1668861500.jpg', 0, 0, '2022-11-19 12:38:20', '2022-11-19 12:38:20'),
	(8, 'Airdops True wireless', NULL, '1668861708.jpg', 1, 0, '2022-11-19 12:41:48', '2022-11-19 12:42:43'),
	(9, 'Rockerz Neckbands', 'Rockerz Neckbands', '1668861965.jpg', 0, 0, '2022-11-19 12:46:05', '2022-11-19 12:46:05'),
	(10, 'ROCKERZ', NULL, '1668862086.jpg', 1, 0, '2022-11-19 12:48:06', '2022-11-21 06:53:42'),
	(11, 'BASSH Headphones', NULL, '1668862221.jpg', 1, 0, '2022-11-19 12:50:21', '2022-11-19 12:51:22'),
	(12, 'WIRED Headphones', 'WIRED Headphones', '1668862432.jpg', 0, 0, '2022-11-19 12:53:52', '2022-11-19 12:53:52'),
	(13, 'Trabel Range', 'Trabel Range', '1668862522.jpg', 1, 0, '2022-11-19 12:55:22', '2022-11-19 12:55:22'),
	(14, 'Limited Edition', NULL, '1668862609.jpg', 1, 0, '2022-11-19 12:56:49', '2022-11-19 12:56:49'),
	(15, 'IMMPORTAL', 'IMMPORTAL', '1668862721.jpg', 1, 0, '2022-11-19 12:58:41', '2022-11-19 12:58:41'),
	(16, 'Smart watch', NULL, '1668862847.jpg', 1, 0, '2022-11-19 13:00:47', '2022-11-30 07:31:20'),
	(17, 'hello', 'dg', '1669796525.jpg', 0, 16, '2022-11-30 07:31:37', '2022-11-30 08:22:05'),
	(18, 'ferrg', 'weeeqwe', '1669804075.jpg', 1, 17, '2022-11-30 10:27:55', '2022-11-30 10:27:55'),
	(19, 'dfdfe', 'eewe', '1669804509.jpg', 1, 14, '2022-11-30 10:35:09', '2022-11-30 10:35:09'),
	(20, 'Test category', '233', '1669807602.jpg', 1, 10, '2022-11-30 11:26:42', '2022-11-30 11:26:42'),
	(21, 'grrgtghh', 'frfff', '1669826382.webp', 1, 0, '2022-11-30 16:39:42', '2022-11-30 16:39:42');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table wisdomup.collections
CREATE TABLE IF NOT EXISTS `collections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.collections: ~4 rows (approximately)
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` (`id`, `name`, `description`, `icon`, `show_homepage`, `parent_id`, `created_at`, `updated_at`) VALUES
	(2, 'Updated Collection', 'Lorem Ipsum is simply dummy text of the printing and typesettin galley of type.', '1674371805.jpg', 1, NULL, '2023-01-22 07:16:45', '2023-01-22 07:16:45'),
	(3, 'Best seller', 'Lorem Ipsum is simply dummy text of the printing and typesettin galley of type.', '1674381488.jpg', 1, NULL, '2023-01-22 09:58:08', '2023-01-22 09:58:08'),
	(4, 'Populer', 'Lorem Ipsum is simply dummy text of the printing and typesettin galley of type.', '1674382147.jpg', 1, NULL, '2023-01-22 10:09:07', '2023-01-22 10:09:07'),
	(5, 'Top Earbuds', 'Lorem Ipsum is simply dummy text of the printing and typesettin galley of type.', '1674382177.jpg', 1, NULL, '2023-01-22 10:09:37', '2023-01-22 10:09:37');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;

-- Dumping structure for table wisdomup.colors
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colors_product_id_foreign` (`product_id`),
  CONSTRAINT `colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.colors: ~6 rows (approximately)
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` (`id`, `product_id`, `image`, `color_name`, `created_at`, `updated_at`) VALUES
	(1, 32, '16702191210.jpg', 'Green', '2022-12-05 05:45:21', '2022-12-05 05:45:21'),
	(2, 32, '16702191211.jpg', 'Red', '2022-12-05 05:45:21', '2022-12-05 05:45:21'),
	(12, 34, '16702247360.jpg', NULL, '2022-12-05 07:18:56', '2022-12-05 07:18:56'),
	(13, 34, '16702247361.jpg', NULL, '2022-12-05 07:18:56', '2022-12-05 07:18:56'),
	(14, 35, '16737780530.jpg', 'Black', '2023-01-15 10:20:53', '2023-01-15 10:20:53'),
	(15, 35, '16737780531.png', 'Pink', '2023-01-15 10:20:53', '2023-01-15 10:20:53');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;

-- Dumping structure for table wisdomup.des_images
CREATE TABLE IF NOT EXISTS `des_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `des_images_product_id_foreign` (`product_id`),
  CONSTRAINT `des_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.des_images: ~8 rows (approximately)
/*!40000 ALTER TABLE `des_images` DISABLE KEYS */;
INSERT INTO `des_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
	(1, 41, '16747440080.jpg', '2023-01-26 14:40:08', '2023-01-26 14:40:08'),
	(2, 41, '16747440081.jpg', '2023-01-26 14:40:08', '2023-01-26 14:40:08'),
	(3, 41, '16747440082.jpg', '2023-01-26 14:40:08', '2023-01-26 14:40:08'),
	(4, 42, '16747445380.jpg', '2023-01-26 14:48:58', '2023-01-26 14:48:58'),
	(5, 42, '16747445381.jpg', '2023-01-26 14:48:58', '2023-01-26 14:48:58'),
	(6, 42, '16747445382.jpg', '2023-01-26 14:48:58', '2023-01-26 14:48:58'),
	(7, 40, '16747469570.jpg', '2023-01-26 15:29:17', '2023-01-26 15:29:17'),
	(8, 40, '16747469571.jpg', '2023-01-26 15:29:17', '2023-01-26 15:29:17'),
	(9, 40, '16747469572.jpg', '2023-01-26 15:29:17', '2023-01-26 15:29:17');
/*!40000 ALTER TABLE `des_images` ENABLE KEYS */;

-- Dumping structure for table wisdomup.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table wisdomup.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.migrations: ~17 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2022_02_12_145704_create_product_images_table', 1),
	(7, '2022_02_14_131800_create_categories_table', 1),
	(8, '2022_02_16_042423_create_brands_table', 1),
	(9, '2022_02_16_113339_create_sellers_table', 1),
	(12, '2022_02_27_115025_create_admins_table', 1),
	(13, '2022_03_02_122123_create_carts_table', 1),
	(14, '2022_03_05_054129_create_payments_table', 1),
	(15, '2022_03_05_055812_create_settings_table', 1),
	(16, '2022_03_06_131052_create_orders_table', 1),
	(17, '2022_03_21_134500_create_statistics_table', 1),
	(18, '2022_04_08_104426_create_reviews_table', 1),
	(19, '2022_02_12_142922_create_products_table', 2),
	(20, '2022_02_21_051126_create_sliders_table', 3),
	(21, '2022_02_22_131911_create_banners_table', 4),
	(22, '2022_11_28_104016_create_places_table', 5),
	(23, '2022_12_05_045805_create_colors_table', 6),
	(24, '2023_01_21_165803_create_collections_table', 7),
	(25, '2023_01_26_141757_create_des_images_table', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table wisdomup.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `payment_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` int(11) NOT NULL DEFAULT '0',
  `custom_discount` int(11) NOT NULL DEFAULT '0',
  `Column 9` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `phone_no`, `name`, `shipping_address`, `shipping_charge`, `custom_discount`, `Column 9`, `email`, `message`, `transaction_id`, `is_paid`, `is_completed`, `is_seen_by_admin`, `created_at`, `updated_at`) VALUES
	(1, 13, 1, '::1', '0171012130', 'Abu Saeed', 'Dhaka', 23, 34, '', 'sabujsaeed@gmail.com', 'hello', NULL, 1, 1, 1, '2023-01-28 06:51:07', '2023-02-03 18:20:43'),
	(2, 13, 1, '::1', '0171012130', 'Abu Saeed', 'vcxvvxvxv', 0, 0, '', 'sabujsaeed@gmail.com', 'hello', NULL, 0, 0, 1, '2023-01-28 06:58:51', '2023-01-29 13:32:08');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table wisdomup.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table wisdomup.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_short_name_unique` (`short_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table wisdomup.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table wisdomup.places
CREATE TABLE IF NOT EXISTS `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_home` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.places: ~4 rows (approximately)
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` (`id`, `name`, `image`, `end_date`, `show_home`, `created_at`, `updated_at`) VALUES
	(2, 'DAILY DEALS', '1669635764.jpg', '2022-11-21', 1, '2022-11-28 11:42:44', '2022-11-29 06:24:04'),
	(3, 'BLACK FRIDAY', '1669636374.jpg', '2022-11-02', 1, '2022-11-28 11:52:54', '2022-11-29 12:02:24'),
	(4, 'Best of wisdom', '1669804892.jpg', '2022-11-22', 0, '2022-11-30 10:41:32', '2022-11-30 10:42:07'),
	(5, 'gffgfgg', '1669826642.webp', NULL, 1, '2022-11-30 16:44:02', '2022-11-30 16:44:02');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;

-- Dumping structure for table wisdomup.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `offer` tinyint(4) NOT NULL DEFAULT '0',
  `offerprice` int(11) DEFAULT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `collection_id` int(10) unsigned DEFAULT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `place_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `specification` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.products: ~18 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `longtitle`, `price`, `quantity`, `category_id`, `offer`, `offerprice`, `brand_id`, `collection_id`, `seller_id`, `place_id`, `image`, `description`, `specification`, `slug`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
	(22, 'Rockerz 333 Pro', 'boAt Rockerz 333 Pro | Wireless Earphone with Non-Stop Music Upto 60 Hours, Asap Charge, IPX5 Water Resistance', 1200, 12, 10, 1, NULL, 3, NULL, 2, '2', '1669710743.jpg', '<p>boAt Rockerz 333 Pro | Wireless Earphone with Non-Stop Music Upto 60 Hours, Asap Charge, IPX5 Water Resistance</p>', NULL, 'Rockerz 333 Pro', 0, 1, '2022-11-29 08:32:23', '2022-11-29 08:32:23'),
	(23, 'Rockerz 450 DC edition', 'boAt Rockerz 450 DC edition | Wireless Headphone with 40mm Dynamic Driver, Adaptive Ear Cups and Headband, Get ready', 1400, 23, 10, 1, NULL, 3, NULL, 2, '3', '1669711423.jpg', '<p>boAt Rockerz 450 DC edition | Wireless Headphone with 40mm Dynamic Driver, Adaptive Ear Cups and Headband, Get ready</p>', NULL, 'Rockerz 450 DC edition', 0, 1, '2022-11-29 08:43:43', '2022-11-29 08:43:43'),
	(25, 'boAt Rockerz 450', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 1300, 23, 10, 1, NULL, 3, NULL, 2, '3', '1669713765.jpg', '<p>Here are some formatting tricks to grab — and keep — shoppers’ attention for better conversion rates:</p><ul><li>Create scannable lists (like this one!) with bullet points</li><li>Use high-quality, eye-catching <a href="https://www.privy.com/blog/equipment-you-actually-need-to-take-product-photos">product photos</a></li><li>Add power words to your product titles, headings, and subheadings to break up blocks of text</li><li>Make use of short paragraphs for effective product descriptions</li><li>Increase your font size for easier reading</li><li>Include plenty of white space</li><li>Place lengthy technical details behind a cut or in a different tab</li></ul>', NULL, 'boAt Rockerz 450', 0, 1, '2022-11-29 09:22:45', '2022-12-01 04:54:49'),
	(26, 'Test Product', 'Test product  long  update', 23, 233, 16, 1, NULL, 3, NULL, 2, '3', '1669781263.jpg', NULL, NULL, 'Test Product', 0, 1, '2022-11-30 04:01:00', '2022-11-30 04:39:33'),
	(27, 'hello', 'ffgggfgfgfgfgfgfggf', 23, 34, 16, 1, NULL, 3, NULL, 2, '3', '1669783576.webp', '<p>fdsfffdf</p>', NULL, 'hello', 0, 1, '2022-11-30 04:46:16', '2022-11-30 04:46:16'),
	(28, 'Final Product update hello', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 23, 23, 17, 1, 23, 3, NULL, 2, '2', '1669801323.jpg', '<p>boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For</p>', NULL, 'Final Product update hello', 0, 1, '2022-11-30 09:42:03', '2022-11-30 11:33:10'),
	(29, 'rgrtgtgtrgtrgrtgtg', 'grggr', 23, 22, 14, 1, NULL, 3, NULL, 2, '4', '1669826540.jpg', '<p>gggrrgfgg</p>', NULL, 'rgrtgtgtrgtrgrtgtg', 0, 1, '2022-11-30 16:42:20', '2022-11-30 16:42:20'),
	(30, 'Test product', 'boAt Rockerz 450 DC edition | Wireless Headphone with 40mm Dynamic Driver, Adaptive Ear Cups and Headband, Get ready', 344, 2333, 16, 1, NULL, 3, NULL, 2, '3', '1669827516.jpg', '<p>fdgfge</p>', NULL, 'Test product', 0, 1, '2022-11-30 16:58:36', '2022-11-30 16:58:36'),
	(31, 'Helllllll', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 23, 23, 19, 0, 233, 3, NULL, 2, '5', '1670218116.jpg', '<p>Hi how are you?</p>', NULL, 'Helllllll', 0, 1, '2022-12-05 05:28:36', '2022-12-05 05:28:36'),
	(32, 'Hello i', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 122, 120, 20, 0, 12, 3, NULL, 2, '5', '1670219121.jpg', '<p>boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For</p>', NULL, 'Hello i', 0, 1, '2022-12-05 05:45:21', '2022-12-05 05:45:21'),
	(34, 'new test product update', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 123, 22, 20, 1, 122, 3, NULL, 2, '5', '1670224660.jpg', '<p>boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For</p>', NULL, 'new test product update', 0, 1, '2022-12-05 05:57:27', '2022-12-05 07:18:56'),
	(35, 'Samsung TV', 'Samsung TV 43\'', 25000, 0, 16, 0, 21000, 3, NULL, 2, '3', '1673778053.jpg', '<p>Hello samsung tv</p>', NULL, 'Samsung TV', 0, 1, '2023-01-15 10:20:53', '2023-01-15 11:24:49'),
	(36, 'Hello Test  product', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 234, 24, 20, 0, 233, 3, 4, 2, '5', '1674383512.png', '<p>hello</p>', NULL, 'Hello Test  product', 0, 1, '2023-01-22 10:31:52', '2023-01-22 10:31:52'),
	(37, 'Test product  for collection', 'Test product  for collection', 1000, 24, 20, 0, 344, 3, 5, 2, '5', '1674463301.jpg', '<p>Hello</p>', NULL, 'Test product  for collection', 0, 1, '2023-01-23 08:41:41', '2023-01-23 08:41:41'),
	(38, 'Hello new product', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 233, 23, 21, 1, 233, 3, 5, 2, '4', '1674463410.webp', '<p>Hello</p>', NULL, 'Hello new product', 0, 1, '2023-01-23 08:43:30', '2023-01-23 08:43:30'),
	(39, 'hewewqqw', 'dfsdfsfdsf', 2322, 34, 21, 1, 343, 3, 4, 2, '4', '1674574219.png', '<p><strong>Description</strong></p>', NULL, 'hewewqqw', 0, 1, '2023-01-24 15:30:19', '2023-01-24 15:30:19'),
	(40, 'Hello Sabuj', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 454, 34, 21, 0, 45, 3, 5, 2, '5', '1674574504.jpg', '<p>tytrytryry</p>', '<p>specification</p>', 'Hello Sabuj', 0, 1, '2023-01-24 15:35:04', '2023-01-26 15:29:17'),
	(41, 'hewewffw', 'boAt Rockerz 450 | Batman DC Edition | Bluetooth Wireless Headphone with 40 mm Drivers HD Immersive Audio, Power Up For', 233, 23, 20, 0, 23, 3, 4, 2, '4', '1674744008.jpg', '<p>hello</p>', '<p>hrtrt</p>', 'hewewffw', 0, 1, '2023-01-26 14:40:08', '2023-01-26 14:40:08'),
	(42, 'dgdgdhdh', 'dhfhgfhgfhgfhf', 24343, 34, 21, 0, 232, 3, 5, 2, '5', '1674744538.jpg', '<p>gdfgfdgfdgdfgfgdf</p>', '<p>ffdhgfhgfhgfhfgffgh</p>', 'dgdgdhdh', 0, 1, '2023-01-26 14:48:58', '2023-01-26 14:48:58');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table wisdomup.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.product_images: ~14 rows (approximately)
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
	(16, 25, '16697137650.jpg', '2022-11-29 09:22:45', '2022-11-29 09:22:45'),
	(17, 25, '16697137651.jpg', '2022-11-29 09:22:45', '2022-11-29 09:22:45'),
	(18, 25, '16697137652.jpg', '2022-11-29 09:22:45', '2022-11-29 09:22:45'),
	(21, 26, '16697832320.webp', '2022-11-30 04:40:32', '2022-11-30 04:40:32'),
	(25, 28, '16698064530.webp', '2022-11-30 11:07:33', '2022-11-30 11:07:33'),
	(26, 30, '16698275160.jpg', '2022-11-30 16:58:36', '2022-11-30 16:58:36'),
	(27, 30, '16698275161.jpg', '2022-11-30 16:58:36', '2022-11-30 16:58:36'),
	(28, 30, '16698275162.jpg', '2022-11-30 16:58:36', '2022-11-30 16:58:36'),
	(29, 31, '16702181160.jpg', '2022-12-05 05:28:36', '2022-12-05 05:28:36'),
	(30, 32, '16702191210.jpg', '2022-12-05 05:45:21', '2022-12-05 05:45:21'),
	(33, 34, '16702248280.jpg', '2022-12-05 07:20:28', '2022-12-05 07:20:28'),
	(34, 35, '16737780530.png', '2023-01-15 10:20:53', '2023-01-15 10:20:53'),
	(35, 35, '16737780531.jpg', '2023-01-15 10:20:53', '2023-01-15 10:20:53'),
	(36, 35, '16737780532.jpg', '2023-01-15 10:20:53', '2023-01-15 10:20:53');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

-- Dumping structure for table wisdomup.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.reviews: ~0 rows (approximately)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Dumping structure for table wisdomup.sellers
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.sellers: ~1 rows (approximately)
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` (`id`, `name`, `show_homepage`, `description`, `icon`, `country`, `address`, `created_at`, `updated_at`) VALUES
	(2, 'Seller test 1', 1, 'frefer', '1668511551.jpg', 'Bangladesh', NULL, '2022-11-15 11:25:51', '2022-11-15 11:25:51');
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;

-- Dumping structure for table wisdomup.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) unsigned NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table wisdomup.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.sliders: ~3 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `title`, `image`, `mimage`, `button_text`, `url`, `status`, `priority`, `created_at`, `updated_at`) VALUES
	(11, NULL, '1676305515.jpg', '1676305515m.jpg', NULL, NULL, 1, 1, '2023-02-13 16:25:15', '2023-02-13 16:25:15'),
	(15, NULL, '1676310823.jpg', '1676310823m.jpg', NULL, NULL, 1, 1, '2023-02-13 17:53:43', '2023-02-13 17:53:43'),
	(16, NULL, '1676310923.jpg', '1676310923m.jpg', NULL, NULL, 1, 1, '2023-02-13 17:55:23', '2023-02-13 17:55:23');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table wisdomup.statistics
CREATE TABLE IF NOT EXISTS `statistics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `totalsell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalprofit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.statistics: ~0 rows (approximately)
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;

-- Dumping structure for table wisdomup.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(10) unsigned DEFAULT NULL,
  `district_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wisdomup.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `phone_no`, `email_verified_at`, `password`, `street_address`, `division_id`, `district_id`, `status`, `shipping_address`, `ip_address`, `avater`, `remember_token`, `created_at`, `updated_at`) VALUES
	(13, 'Abu Saeed', 'Sabuj', 'sabujsaeed@gmail.com', 'Abu Saeed', NULL, NULL, '$2y$10$a1SP8La.OaqdCEZzFQX.buMD.1BpCqZzVt8MZ/I3u3SxZDhXzKksC', NULL, NULL, NULL, 1, NULL, '::1', NULL, NULL, '2022-12-02 04:58:56', '2022-12-02 04:59:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
