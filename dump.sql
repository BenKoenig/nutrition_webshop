-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Dez 2021 um 20:35
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `is_popular` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `imgs` longtext DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_popular`, `created_at`, `updated_at`, `deleted_at`, `imgs`) VALUES
(1, 'Bars', 1, '2021-11-11 08:44:09', '2021-11-25 16:49:37', NULL, '[\"\\/uploads\\/1637232413_category-bars.png\"]'),
(2, 'Oats', 1, '2021-11-11 12:41:17', '2021-11-23 06:08:19', NULL, '[\"\\/uploads\\/1637647699_category-oats.png\"]'),
(3, 'Protein', 1, '2021-11-11 12:48:45', '2021-11-23 06:08:49', NULL, '[\"\\/uploads\\/1637647729_category-protein.png\"]'),
(4, 'Drinks', 1, '2021-11-11 12:49:08', '2021-11-18 11:20:54', NULL, '[\"\\/uploads\\/1637234454_category-shakes.png\"]'),
(5, 'Vegan', 0, '2021-11-11 15:10:13', '2021-12-05 19:07:19', NULL, '[\"\\/uploads\\/1638731224_pexels-a-j-926361.png\"]'),
(85, 'Test', 1, '2021-11-16 07:16:33', '2021-11-16 07:16:45', '2021-11-16 07:16:45', '[]'),
(86, 'newtest', 1, '2021-11-16 07:27:08', '2021-11-16 07:27:22', '2021-11-16 07:27:22', '[]'),
(87, 'Protein Shakes', -1, '2021-11-16 07:47:13', '2021-12-05 19:10:19', NULL, '[\"\\/uploads\\/1638731419_ctrl-a-meal-replacement-03e4RajfFAE-unsplash.png\"]'),
(88, 'dasdasd', 1, '2021-11-17 07:09:15', '2021-11-23 06:07:35', '2021-11-23 06:07:35', '[]'),
(89, 'fsdfsdfsd', 1, '2021-11-17 07:16:15', '2021-11-23 06:07:38', '2021-11-23 06:07:38', '[]'),
(90, 'newtest', 1, '2021-11-17 07:16:23', '2021-11-23 06:07:40', '2021-11-23 06:07:40', '[\"\\/uploads\\/1637238435_Bildschirmfoto 2021-11-18 um 08.54.39.png\"]'),
(91, 'test', 0, '2021-11-17 07:17:55', '2021-11-19 14:25:15', '2021-11-19 14:25:15', '[]'),
(92, 'dasdas', 0, '2021-11-17 07:26:45', '2021-11-18 10:57:31', '2021-11-18 10:57:31', '[]'),
(93, 'test', 0, '2021-11-17 12:45:08', '2021-11-18 10:57:28', '2021-11-18 10:57:28', '[]'),
(94, 'test23123123', 0, '2021-11-19 13:02:47', '2021-11-19 14:25:11', '2021-11-19 14:25:11', '[]'),
(95, 'redasdasdasd', 1, '2021-11-19 13:02:55', '2021-11-19 14:25:08', '2021-11-19 14:25:08', '[]'),
(96, 'Test', 0, '2021-11-22 13:04:07', '2021-11-23 11:32:19', '2021-11-23 11:32:19', '[]'),
(97, 'Test', 0, '2021-11-23 11:32:08', '2021-11-23 11:32:13', '2021-11-23 11:32:13', '[]'),
(98, 'Pre-Workout', -1, '2021-11-24 10:11:02', '2021-12-05 19:10:27', NULL, '[\"\\/uploads\\/1638731427_howtogym-S9NchuPb79I-unsplash(3).png\"]'),
(99, 'tst', 0, '2021-11-24 10:55:22', '2021-11-24 11:00:05', '2021-11-24 11:00:05', '[]'),
(100, 'tst', 0, '2021-11-24 11:00:08', '2021-11-24 11:02:58', '2021-11-24 11:02:58', '[]'),
(101, 'Vitamins', -1, '2021-11-24 11:05:49', '2021-12-05 19:33:13', NULL, '[\"\\/uploads\\/1638731435_amanda-jones-r8loDv_Ap2g-unsplash.png\"]'),
(102, 'ig7gigigiigizg7', 1, '2021-11-28 08:30:33', '2021-11-28 09:17:54', '2021-11-28 09:17:54', '[\"\\/uploads\\/1638090766_category-bars.png\"]'),
(103, '43243243', 0, '2021-11-28 09:16:30', '2021-11-28 09:16:32', '2021-11-28 09:16:32', '[]'),
(104, 'dsfwer', 1, '2021-11-28 09:17:37', '2021-11-28 09:17:52', '2021-11-28 09:17:52', '[\"\\/uploads\\/1638091057_category-protein.png\"]'),
(105, 'test', 1, '2021-12-02 08:42:46', '2021-12-02 13:06:14', '2021-12-02 13:06:14', '[\"\\/uploads\\/1638434566_map-railway-network-croatia.jpg\"]'),
(106, 'newtest', 0, '2021-12-04 16:15:40', '2021-12-05 19:04:38', '2021-12-05 19:04:38', '[]'),
(107, 'test', 1, '2021-12-05 17:48:40', '2021-12-05 19:04:36', '2021-12-05 19:04:36', '[]'),
(108, 'test2', 1, '2021-12-05 17:48:46', '2021-12-05 19:04:34', '2021-12-05 19:04:34', '[]'),
(109, 'dasda', 1, '2021-12-05 17:50:18', '2021-12-05 19:04:32', '2021-12-05 19:04:32', '[]'),
(110, 'rteasdsa', 1, '2021-12-05 18:03:22', '2021-12-05 19:04:31', '2021-12-05 19:04:31', '[]'),
(111, 'dasdasd', -1, '2021-12-05 18:04:55', '2021-12-05 19:04:28', '2021-12-05 19:04:28', '[]'),
(112, 'dasdasasdasdad', 1, '2021-12-05 18:44:47', '2021-12-05 18:47:45', '2021-12-05 18:47:45', '[]'),
(113, 'dasd', -1, '2021-12-05 18:54:42', '2021-12-05 19:04:27', '2021-12-05 19:04:27', '[]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `imgs` longtext NOT NULL DEFAULT '[]',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `goals`
--

INSERT INTO `goals` (`id`, `name`, `imgs`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Muscle Gain', '[\"\\/uploads\\/1637667446_anastase-maragos-7kEpUPB8vNk-unsplash.png\"]', '2021-11-11 15:35:35', '2021-11-28 14:27:39', NULL),
(2, 'Health', '[\"\\/uploads\\/1637667784_jared-rice-NTyBbu66_SI-unsplash.png\"]', '2021-11-11 15:55:02', '2021-11-23 11:43:04', NULL),
(3, 'Weight Loss', '[\"\\/uploads\\/1637667831_andrew-tanglao-3I2vzcmEpLU-unsplash.png\"]', '2021-11-11 15:55:44', '2021-11-23 11:43:51', NULL),
(4, 'Mass Build', '[\"\\/uploads\\/1637667844_pexels-cesar-galea\\u0303o-3253501.png\"]', '2021-11-11 15:56:41', '2021-12-05 19:33:58', NULL),
(5, 'test', '[]', '2021-11-25 08:53:34', '2021-11-25 08:56:30', '2021-11-25 08:56:30'),
(6, 'test', '[\"\\/uploads\\/1637830603_category-protein.png\"]', '2021-11-25 08:56:43', '2021-11-25 08:57:01', '2021-11-25 08:57:01'),
(7, '2312321', '[]', '2021-11-28 09:13:02', '2021-11-28 14:27:33', '2021-11-28 14:27:33'),
(8, '534534', '[]', '2021-12-04 09:15:18', '2021-12-04 09:15:28', '2021-12-04 09:15:28'),
(9, '######', '[]', '2021-12-04 09:15:22', '2021-12-04 09:15:26', '2021-12-04 09:15:26'),
(10, '34234grh.l.gfsyfsdf', '[]', '2021-12-04 09:15:33', '2021-12-04 09:16:44', '2021-12-04 09:16:44'),
(11, '343232', '[]', '2021-12-04 09:16:06', '2021-12-04 09:16:09', '2021-12-04 09:16:09'),
(12, 'dasdasd', '[]', '2021-12-04 09:16:40', '2021-12-04 09:16:42', '2021-12-04 09:16:42'),
(13, 'test', '[]', '2021-12-04 16:12:05', '2021-12-05 16:35:28', '2021-12-05 16:35:28');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `website` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test2', 'test3', '2021-11-12 08:31:32', '2021-11-19 15:08:10', '2021-11-19 15:08:10'),
(2, 'dasdasda2321321', 'dasdasd', '2021-11-19 14:00:20', '2021-12-02 13:22:17', '2021-12-02 13:22:17'),
(3, 'www.dasdasd.com', 'www.dasdasd.com', '2021-11-19 14:00:29', '2021-11-21 10:10:34', '2021-11-21 10:10:34'),
(4, '', '', '2021-11-20 06:38:28', '2021-11-21 10:10:32', '2021-11-21 10:10:32'),
(5, 'dasdasd', '', '2021-11-23 11:32:36', '2021-11-23 11:32:38', '2021-11-23 11:32:38'),
(6, 'Reflect Nutrtition', 'https://reflexnutrition.com/', '2021-11-24 10:23:15', '2021-11-24 10:23:15', NULL),
(7, '3123123123', '', '2021-11-28 09:13:15', '2021-12-02 13:22:14', '2021-12-02 13:22:14'),
(8, 'yFood', 'https://yfood.eu', '2021-12-02 13:22:28', '2021-12-02 13:22:28', NULL),
(9, 'Alphafoods', 'https://alphafoods.de', '2021-12-03 07:01:08', '2021-12-03 07:01:08', NULL),
(10, 'test', 'test', '2021-12-04 15:07:56', '2021-12-05 19:33:38', '2021-12-05 19:33:38'),
(11, 'new', 'new', '2021-12-04 15:10:14', '2021-12-05 19:33:36', '2021-12-05 19:33:36');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 2, 21, '2021-12-01 07:50:28', '2021-12-01 07:50:28', NULL),
(24, 2, 21, '2021-12-01 07:50:28', '2021-12-01 07:50:28', NULL),
(25, 2, 17, '2021-12-01 07:50:28', '2021-12-01 07:50:28', NULL),
(26, 2, 22, '2021-12-01 12:18:35', '2021-12-01 12:18:35', NULL),
(28, 2, 17, '2021-12-04 12:06:31', '2021-12-04 12:06:31', NULL),
(29, 2, 17, '2021-12-04 12:06:31', '2021-12-04 12:06:31', NULL),
(30, 2, 17, '2021-12-04 12:06:31', '2021-12-04 12:06:31', NULL),
(31, 2, 41, '2021-12-04 12:06:31', '2021-12-04 12:06:31', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(450) NOT NULL,
  `price` float NOT NULL,
  `serving` float NOT NULL,
  `ingredients` varchar(450) NOT NULL,
  `weight` float NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_bestseller` tinyint(1) DEFAULT 0,
  `is_sale` tinyint(1) DEFAULT 0,
  `imgs` longtext DEFAULT '[]',
  `units` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `category_id`, `goal_id`, `merchant_id`, `name`, `description`, `price`, `serving`, `ingredients`, `weight`, `is_featured`, `is_bestseller`, `is_sale`, `imgs`, `units`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 101, 4, 9, 'OneStop Xtreme', 'Reach for this muscle-building shake when you want a hit of protein, creatine, BCAAs plus other beneficial nutrients.', 35, 20, 'Bread', 1, -1, -1, 1, '[\"\\/uploads\\/1637747972_Product_IP2-1_4000_CRR_716f18d3-8444-4d9e-8ac3-1511848042d8.jpg\"]', 11, '2021-11-24 09:59:32', '2021-12-05 17:34:00', NULL),
(19, 3, 1, 6, 'Instant Whey Pro', 'Our flagship powder is the perfect balance of high protein and low fat. It\'s the ideal choice for those who want to tone and sculpt.', 49.99, 30, 'Pea protein, oats (ground), coconut blossom sugar, spinach juice powder, MCT oil powder from coconuts (contains medium chain triglycerides), quinoa (ground), spirulina, natural vanilla flavor, flaxseed (ground), fiber: Psyllium husk (ground) and guar gum, alfalfa juice powder, maca root powder', 2.3, 1, 1, 1, '[\"\\/uploads\\/1637748212_Product_MW_2270_e3a39323-b0ac-448f-ba23-b5fcc9ba2094.png\"]', 12, '2021-11-24 10:03:32', '2021-12-05 08:38:48', NULL),
(21, 98, 4, 6, 'Muscle Bomb', 'This isn\'t just your regular pre-workout, it\'s got an extra caffeine kick for when you need to maximise time in the gym.', 14.99, 10, 'Pea protein, oats (ground), coconut blossom sugar, spinach juice powder, MCT oil powder from coconuts (contains medium chain triglycerides), quinoa (ground), spirulina, natural vanilla flavor, flaxseed (ground), fiber: Psyllium husk (ground) and guar gum, alfalfa juice powder, maca root powder', 1.5, -1, 1, 1, '[\"\\/uploads\\/1637748884_Product_MBWC_0600_5b1ca581-46d8-4c4f-9f5c-0bea419ec6b3.jpg\"]', 9, '2021-11-24 10:14:44', '2021-12-05 17:33:31', NULL),
(22, 101, 4, 6, 'EAA', 'Essential Amino Acids with a remarkable 16g of EAAs per serving. Want to promote muscle growth? This is your product. Plus we\'ve added Vitamin B6, Piperine (Black Pepper Extract) and Magnesium (electrolyte) to further support your gym goals.', 28.95, 30, 'Rice protein, Vitamin B6, Magnesium,', 1.6, -1, 1, -1, '[\"\\/uploads\\/1637752002_Product_EAA_PINEAPPLE_0500_1.jpg\"]', 28, '2021-11-24 11:06:42', '2021-12-05 17:34:09', NULL),
(23, 2, 1, 6, 'test', 'dasdas', 2312, 2231, 'saSA', 121, 0, 0, 1, '[\"\\/uploads\\/1637848219_category-shakes.png\"]', 1, '2021-11-25 13:50:19', '2021-11-25 13:54:13', '2021-11-25 13:54:13'),
(24, 3, 2, 2, 't', 'dasda', 2323, 324, 'dasdas', 2432, 1, 1, 0, '[]', 1, '2021-11-25 13:59:19', '2021-11-26 07:45:15', '2021-11-26 07:45:15'),
(25, 5, 3, 7, 'Carter Cooley', 'Laudantium quae qui', 911, 232, 'Facilis minus natus', 13231, 0, 0, 1, '[]', 1, '2021-11-28 09:15:42', '2021-11-28 09:16:17', '2021-11-28 09:16:17'),
(26, 1, 2, 2, 'Fitzgerald Richards', 'Aperiam itaque a est', 856, 3123, 'Vel excepteur ipsum', 312321, 1, 1, 0, '[\"\\/uploads\\/1638090964_category-protein.png\"]', 1, '2021-11-28 09:16:04', '2021-11-28 09:16:14', '2021-11-28 09:16:14'),
(27, 101, 4, 7, 'Jeanette Jacobson2', 'Labore dolore incidi', 21, 20, 'Qui sed velit enim v', 1200, 1, 0, 0, '[\"\\/uploads\\/1638261740_category-bars.png\"]', 18, '2021-11-30 08:42:20', '2021-12-05 17:26:23', '2021-12-02 13:06:04'),
(28, 1, 2, 7, 'Kitra Newton', 'Alias delectus impe', 957, 232, 'Rem minima eum aliqu', 124123, 0, 0, 0, '[]', 3123, '2021-11-30 08:55:06', '2021-11-30 09:20:29', '2021-11-30 09:20:29'),
(29, 101, 4, 7, 'Brynn Dorsey2', 'Quo qui ex et ut odi', 360, 123, 'Ducimus excepturi d', 21321, 1, 0, 1, '[\"\\/uploads\\/1638263775_category-shakes.png\"]', 213432, '2021-11-30 09:16:15', '2021-11-30 09:20:05', '2021-11-30 09:20:05'),
(30, 101, 4, 7, 'Mufutau Graham', 'Non quis placeat ra', 330, 432423, 'Ea exercitationem ci', 432, 1, 1, 1, '[]', 234234, '2021-11-30 12:21:32', '2021-12-02 13:06:02', '2021-12-02 13:06:02'),
(31, 101, 2, 6, 'Vitamin D3', 'Top up your Vitamin D intake and you will feel the benefits every day, even during winter.', 19.99, 20, 'Vitamin D3, Calcium', 0.3, -1, -1, -1, '[\"\\/uploads\\/1638450328_Product_VD3_0100_3a6723bc-d9c1-49f5-955e-8d3021d589f7.png\"]', 20, '2021-12-02 13:05:28', '2021-12-05 17:34:26', NULL),
(32, 101, 2, 6, 'Vitamin C', 'Supplementing with Vitamin C has numerous health benefits, including immunity support and the reduction of tiredness and fatigue.', 6.99, 20, 'Vitamin C', 0.34, -1, 1, 1, '[\"\\/uploads\\/1638450667_Product_VC_0100.png\"]', 99, '2021-12-02 13:11:07', '2021-12-05 17:35:02', NULL),
(33, 101, 2, 6, 'Nexgen Pro', 'An advanced daily multivitamin, loaded with high-quality minerals and vitamins, to support those who lead an active lifestyle to be at their best every day.', 24.99, 4, 'Lorem Ipsum Dolar', 0.6, 1, 1, 1, '[\"\\/uploads\\/1638450767_Product_NP90_0090.png\"]', 60, '2021-12-02 13:12:47', '2021-12-05 08:40:30', NULL),
(34, 101, 2, 6, 'Zinc Matrix', 'An excellent source of magnesium, zinc and copper, as well as boron which contributes to a reduction of tiredness and fatigue, a normal energy-yielding metabolism, normal functioning of the nervous system and normal muscle functioning', 27.55, 20, 'Zinc, Lorem, Ipsum, Dolar', 0.25, 1, 1, 1, '[\"\\/uploads\\/1638451139_Product_ZM_0100.png\"]', 1, '2021-12-02 13:18:59', '2021-12-05 08:40:55', NULL),
(35, 101, 2, 6, 'Ferrochel Iron Bisglycinate', 'Increasing your iron intake has many benefits, including the reduction of tiredness and fatigue.', 7.99, 10, 'Lorem, Ipsum, Dolar', 0.42, -1, -1, -1, '[\"\\/uploads\\/1638451207_Product_FIB_0120.png\"]', 32, '2021-12-02 13:20:07', '2021-12-05 17:33:19', NULL),
(36, 1, 1, 8, 'Coconut Bar', 'For in between. And every taste. Classic bars in three varieties provide your body with essential nutrients such as protein, fiber, and 25 vitamins and minerals. In short: a practical, healthy and delicious snack for in between.', 34.55, 200, 'Lorem, Ipsum, Dolar', 1, -1, -1, -1, '[\"\\/uploads\\/1638451438_yfood-bar-coconut-whitechocolate-60g-DE-FK-2500px-srgb-ws_1.png\"]', 1, '2021-12-02 13:23:58', '2021-12-05 17:33:13', NULL),
(37, 1, 1, 8, 'Hazelnut Bar', 'For in between. And every taste. Classic bars in three varieties provide your body with essential nutrients such as protein, fiber, and 25 vitamins and minerals. In short: a practical, healthy and delicious snack for in between.', 42.25, 24, 'Lorem, Ipsum, Dolar', 1.25, -1, -1, 1, '[\"\\/uploads\\/1638451591_yfood-bar-hazelnut-chocolate-60g-DE-FK-2500px-srgb-ws_1.png\"]', 32, '2021-12-02 13:26:31', '2021-12-05 17:33:05', NULL),
(38, 1, 4, 9, 'Chocolate Bar', 'For in between. And every taste. Classic bars in three varieties provide your body with essential nutrients such as protein, fiber, and 25 vitamins and minerals. In short: a practical, healthy and delicious snack for in between.', 39.99, 23, 'Lorem, Ipsum, Dolar', 1, -1, -1, -1, '[\"\\/uploads\\/1638451664_yfood-bar-saltedcaramel-chocolate-60g-DE-FK-2500px-srgb-ws_1.png\"]', 43, '2021-12-02 13:27:44', '2021-12-05 19:13:52', NULL),
(39, 4, 3, 8, 'yFood Drinks', 'Sip, sip, sip, sip, in a stock pack and ready to drink right away. Classic Drinks provide your body with essential nutrients such as protein, fiber, vegetable oils and 26 vitamins and minerals. In short: a convenient, healthy and delicious meal.', 32, 20, 'Lorem, Ipsum, Dolar', 1500, 1, -1, 1, '[\"\\/uploads\\/1638513474_yfood-website-product-rtd-500ml-PG-Combo-Bulk-DE-2500px-srgb-ws.png\"]', 43, '2021-12-03 06:37:54', '2021-12-05 17:34:44', NULL),
(40, 3, 3, 8, 'Coconut Pulver', 'Shake yourself full! Classic Powder provides your body with essential nutrients such as proteins, fiber, vegetable oils and 26 vitamins and minerals. In short, a convenient, healthy drinkable meal that is very quick to prepare.', 21.95, 20, 'Lorem, Ipsum, Dolar', 2.2, -1, -1, 1, '[\"\\/uploads\\/1638513666_yfood-powder-crazy-coconut-1-5kg-INT-PG-2500px-srgb-ws.webp\"]', 33, '2021-12-03 06:41:06', '2021-12-05 17:32:44', NULL),
(41, 5, 2, 8, 'Vegan Drink', 'Yes, ve gan! Ready to Drink. Vegan Drinks provide your body with essential nutrients such as protein, fiber, vegetable oils, and 26 vitamins and minerals. In short, a convenient, healthy and delicious meal.', 22.95, 23, 'Lorem, Ipsum, Dolar', 0.5, -1, -1, 1, '[\"\\/uploads\\/1638514608_yfood-drink-vegan-vanilla-500ml-DE-PG-2500px-srgb-ws.png\"]', 31, '2021-12-03 06:56:48', '2021-12-05 17:32:37', NULL),
(42, 5, 4, 9, 'Vegan Muscle', 'Whether strength training or endurance sports, Vegan Muscle delivers noticeable and visible sporting added value.', 25.42, 19.5, 'Lorem, Ipsum, Doar', 2.2, -1, -1, 1, '[\"\\/uploads\\/1638514836_Products_VMProteinChoco_600x@2xasdasdasdas.png\",\"\\/uploads\\/1638710040_glass_11.static_500x@2x.png\"]', 6, '2021-12-03 07:00:36', '2021-12-05 19:33:28', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Password Hash!',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `adress_1` varchar(100) NOT NULL,
  `adress_2` varchar(100) NOT NULL,
  `postal_code` int(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `adress_1`, `adress_2`, `postal_code`, `city`, `country`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adent', 'arthur.dent@galaxy.com', '$2a$12$Iok3WcgII9wqge7tzKDnbeRBQdbunJOooGflz0VixsFf0d/6lmyL2', '', '', '', '', 0, '', '', 1, '2021-10-25 14:22:24', '2021-10-25 14:23:17', NULL),
(2, 'sae', 'sae@gmail.com', '$2a$12$I9gJS68LjCQO.JDTayzEIu7c2gW/T.r2q/YkgSYLjTN5lf3eG1loa', 'Benjamin', 'König', 'Hohenstaufengasse 6', '', 1020, 'Wien', 'Österreich', 1, '2021-11-10 09:06:41', '2021-12-04 12:05:07', NULL),
(2, 'user', 'sae@gmail.com', '$2a$12$I9gJS68LjCQO.JDTayzEIu7c2gW/T.r2q/YkgSYLjTN5lf3eG1loa', 'Benjamin', 'König', 'Hohenstaufengasse 6', '', 1020, 'Wien', 'Österreich', 0, '2021-11-10 09:06:41', '2021-12-04 12:05:07', NULL),
(3, 'gepirymit', 'putuguraj@mailinator.com', '$2y$10$vQ45zaVFUjol5hd5hPTvBOZ2Vc5iP3bZIVuIF.Nw7y4xTUecBaZA2', '', '', '', '', 0, '', '', 0, '2021-11-25 15:04:13', '2021-11-25 15:04:13', NULL),
(6, 'hodace', 'nyhemeno@mailinator.com', '$2y$10$h3vyhpkgVJCPCnSffvAC3eE1MNehJ2i/jvUk31FNyX8NxAMxz0m.e', 'Adele', 'Walton', 'Quis ut dignissimos', 'Dignissimos asperior', 12, 'Quia iste lorem aliq', 'Et ex adipisci dolor', 0, '2021-11-25 15:23:27', '2021-11-25 15:23:27', NULL),
(7, 'bentest', 'dasdasd@gmail.com', '$2y$10$HqGKhpo6hcPR0d0hrBY5/OMjuqaLfDuDPo.NToIM7KV2zCOXK5njK', 'ben', 'sadasdasd', 'dasdasstr. 12', '', 4234, 'dsd', 'dsd', 0, '2021-12-04 11:34:51', '2021-12-04 11:34:51', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT für Tabelle `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
