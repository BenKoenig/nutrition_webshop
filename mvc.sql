-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 18. Nov 2021 um 20:18
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
-- Datenbank: `mvc`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `time_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `foreign_table` varchar(255) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Bars', 1, '2021-11-11 08:44:09', '2021-11-18 10:46:53', NULL, '[\"\\/uploads\\/1637232413_category-bars.png\"]'),
(2, 'Oats', 1, '2021-11-11 12:41:17', '2021-11-18 16:47:27', NULL, '[\"\\/uploads\\/1637231922_Unbenannt-dasdsadad1.png\"]'),
(3, 'Protein', 1, '2021-11-11 12:48:45', '2021-11-11 15:06:53', NULL, '[]'),
(4, 'Drinks', 1, '2021-11-11 12:49:08', '2021-11-18 11:20:54', NULL, '[\"\\/uploads\\/1637234454_category-shakes.png\"]'),
(5, 'Vegan', 0, '2021-11-11 15:10:13', '2021-11-11 15:10:13', NULL, '[]'),
(85, 'Test', 1, '2021-11-16 07:16:33', '2021-11-16 07:16:45', '2021-11-16 07:16:45', '[]'),
(86, 'newtest', 1, '2021-11-16 07:27:08', '2021-11-16 07:27:22', '2021-11-16 07:27:22', '[]'),
(87, 'Protein Shakes', 0, '2021-11-16 07:47:13', '2021-11-16 07:47:13', NULL, '[]'),
(88, 'dasdasd', 1, '2021-11-17 07:09:15', '2021-11-17 07:09:15', NULL, '[]'),
(89, 'fsdfsdfsd', 1, '2021-11-17 07:16:15', '2021-11-17 07:16:15', NULL, '[]'),
(90, 'newtest', 1, '2021-11-17 07:16:23', '2021-11-18 12:27:15', NULL, '[\"\\/uploads\\/1637238435_Bildschirmfoto 2021-11-18 um 08.54.39.png\"]'),
(91, 'test', 0, '2021-11-17 07:17:55', '2021-11-17 07:17:55', NULL, '[]'),
(92, 'dasdas', 0, '2021-11-17 07:26:45', '2021-11-18 10:57:31', '2021-11-18 10:57:31', '[]'),
(93, 'test', 0, '2021-11-17 12:45:08', '2021-11-18 10:57:28', '2021-11-18 10:57:28', '[]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `units` int(11) NOT NULL DEFAULT 1,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `description`, `units`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shure SM58', NULL, 10, 1, '2021-10-25 14:21:40', '2021-10-25 14:21:40', NULL),
(2, 'XLR Kabel 10m', NULL, 20, 2, '2021-10-25 14:21:40', '2021-10-25 14:21:40', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flavors`
--

CREATE TABLE `flavors` (
  `id` int(11) NOT NULL,
  `flavor` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `flavors`
--

INSERT INTO `flavors` (`id`, `flavor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'strawberry', '2021-11-12 08:27:07', '2021-11-12 08:27:07', NULL),
(2, 'chocolate', '2021-11-12 08:27:16', '2021-11-12 08:27:16', NULL),
(3, 'vanilla', '2021-11-12 08:27:23', '2021-11-12 08:27:23', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `img_path` varchar(450) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `goals`
--

INSERT INTO `goals` (`id`, `name`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Muscle Gain', 'https://i.ibb.co/YNw55nb/anastase-maragos-7k-Ep-UPB8v-Nk-unsplash.png', '2021-11-11 15:35:35', '2021-11-11 15:35:35', NULL),
(2, 'Health', 'https://i.ibb.co/31kXzp2/jared-rice-NTy-Bbu66-SI-unsplash.png', '2021-11-11 15:55:02', '2021-11-11 15:55:02', NULL),
(3, 'Weight Loss', 'https://i.ibb.co/121Hr1w/andrew-tanglao-3-I2vzcm-Ep-LU-unsplash.png', '2021-11-11 15:55:44', '2021-11-11 15:55:44', NULL),
(4, 'Mass Build', 'https://i.ibb.co/M2f5hDj/pexels-cesar-galea-o-3253501.png', '2021-11-11 15:56:41', '2021-11-11 15:56:41', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Reflex Nutritions', '2021-11-12 08:31:32', '2021-11-12 08:31:32', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newtests`
--

CREATE TABLE `newtests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]' CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `newtests`
--

INSERT INTO `newtests` (`id`, `name`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', '[]', '2021-11-17 20:36:50', '2021-11-17 20:36:50', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `flavor_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(450) NOT NULL,
  `img_path` varchar(300) NOT NULL,
  `serving` float NOT NULL,
  `ingredients` varchar(450) NOT NULL,
  `weight` float NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `is_bestseller` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `category_id`, `goal_id`, `rating_id`, `merchant_id`, `flavor_id`, `name`, `price`, `description`, `img_path`, `serving`, `ingredients`, `weight`, `is_featured`, `is_bestseller`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 1, 1, 2, 'Instant Whey Pro', 29.99, 'Our flagship powder is the perfect balance of high protein and low fat. Its the ideal choice for those who want to tone and sculpt.', 'https://i.ibb.co/QmsxDvM/Product-MW-2270-e3a39323-b0ac-448f-ba23-b5fcc9ba2094.webp', 30, 'Rice protein concentrate, soy protein, pumpkin seed protein, coconut milk powder, flaxseed protein, natural flavor, pea potein, sunflower seed protein, chia seed protein, amaranth protein, fiber: guar gum, coconut rasp, bromelain (enzyme from pineapple), sweetener: stevia (steviol glycosides)', 2.2, 1, 1, '2021-11-12 08:38:58', '2021-11-12 09:13:34', NULL),
(2, 1, 1, 1, 1, 1, 'OneStop Xtreme', 19.99, 'Reach for this muscle-building shake when you want a hit of protein, creatine, BCAAs plus other beneficial nutrients.', 'https://bit.ly/3wIjYnN', 20, 'Bread', 1.2, 1, 1, '2021-11-13 09:17:43', '2021-11-13 09:17:43', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 5, 'Very good!', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2021-11-12 08:30:33', '2021-11-12 08:30:33', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text DEFAULT NULL,
  `room_nr` varchar(10) NOT NULL,
  `images` longtext DEFAULT '[]',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `location`, `room_nr`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VR Lounge', '2. Stock, rechts', 'vr-lounge', '[]', '2021-10-25 14:18:49', '2021-10-27 17:50:13', NULL),
(2, 'Ottakringewewe', '1. Stock, links im Eck', 'HSG-8', '[\"\\/uploads\\/1637136212_anastase-maragos-7kEpUPB8vNk-unsplash.png\",\"\\/uploads\\/1637136577_map-railway-network-croatia.jpg\"]', '2021-10-25 14:18:49', '2021-11-17 08:09:37', NULL),
(3, 'Simmering', '1. Stock links', 'HSG-2', '[\"\\/uploads\\/1637136233_th.jpg\"]', '2021-11-08 15:26:54', '2021-11-17 08:03:53', NULL),
(4, 'Projektraum Schlosspark', '2. Stock, Bibliothek', '14', '[\"\\/uploads\\/1637164283_jared-rice-NTyBbu66_SI-unsplash.png\"]', '2021-11-08 15:28:44', '2021-11-17 15:51:23', NULL),
(5, 'rtrt', NULL, '56456546', '[\"\\/uploads\\/1637154312_chocolate-whey-protein-powder-with-a-filled-scoop-royalty-free-image-1626898564.jpg\"]', '2021-11-15 06:04:37', '2021-11-17 13:05:12', NULL),
(6, 'sdffds', 'fsdfsdfsd', '4234324', '[\"\\/uploads\\/1637183198_instagram(1).svg\"]', '2021-11-15 06:04:48', '2021-11-17 21:06:38', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms_room_features_mm`
--

CREATE TABLE `rooms_room_features_mm` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms_room_features_mm`
--

INSERT INTO `rooms_room_features_mm` (`id`, `room_id`, `room_feature_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room_features`
--

CREATE TABLE `room_features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `room_features`
--

INSERT INTO `room_features` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Beamer', 'dasd', '2021-10-25 14:19:49', '2021-11-11 12:11:05', NULL),
(2, 'Flipchart', NULL, '2021-10-25 14:19:49', '2021-10-25 14:19:49', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text DEFAULT NULL,
  `room_nr` varchar(10) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]' CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mikrofone', '2021-10-25 14:21:12', '2021-10-25 14:21:12', NULL),
(2, 'Kabel', '2021-10-25 14:21:12', '2021-10-25 14:21:12', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Password Hash!',
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'adent', 'arthur.dent@galaxy.com', '$2a$12$Iok3WcgII9wqge7tzKDnbeRBQdbunJOooGflz0VixsFf0d/6lmyL2', 1, '2021-10-25 14:22:24', '2021-10-25 14:23:17', NULL),
(2, 'ben', 'ben@gmail.com', '$2a$12$I9gJS68LjCQO.JDTayzEIu7c2gW/T.r2q/YkgSYLjTN5lf3eG1loa', 1, '2021-11-10 09:06:41', '2021-11-10 10:43:10', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipments_ibfk_1` (`type_id`);

--
-- Indizes für die Tabelle `flavors`
--
ALTER TABLE `flavors`
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
-- Indizes für die Tabelle `newtests`
--
ALTER TABLE `newtests`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_room_nr_uindex` (`room_nr`),
  ADD KEY `rooms_location_index` (`location`(768));

--
-- Indizes für die Tabelle `rooms_room_features_mm`
--
ALTER TABLE `rooms_room_features_mm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_room_features_mm_ibfk_1` (`room_feature_id`),
  ADD KEY `rooms_room_features_mm_ibfk_2` (`room_id`);

--
-- Indizes für die Tabelle `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT für Tabelle `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT für Tabelle `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `flavors`
--
ALTER TABLE `flavors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `newtests`
--
ALTER TABLE `newtests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `rooms_room_features_mm`
--
ALTER TABLE `rooms_room_features_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `room_features`
--
ALTER TABLE `room_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints der Tabelle `rooms_room_features_mm`
--
ALTER TABLE `rooms_room_features_mm`
  ADD CONSTRAINT `rooms_room_features_mm_ibfk_1` FOREIGN KEY (`room_feature_id`) REFERENCES `room_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_features_mm_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
