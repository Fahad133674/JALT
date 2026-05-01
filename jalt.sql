-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 01:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `size`, `color`, `created_at`, `updated_at`) VALUES
(14, 2, 4, 1, 'M, L', 'Black, Blue', '2026-04-30 11:46:17', '2026-04-30 11:46:17'),
(15, 2, 5, 1, 'L, XL', 'Blue, Orange', '2026-04-30 11:46:25', '2026-04-30 11:46:25');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_04_16_025612_create_jalt_users_table', 1),
(4, '2026_04_16_025615_create_carts_table', 1),
(5, '2026_04_16_025615_create_orders_table', 1),
(6, '2026_04_16_025615_create_products_table', 1),
(7, '2026_04_16_110629_add_columns_to_orders_table', 1),
(8, '2026_04_16_111740_create_sessions_table', 2),
(9, '2026_04_16_143122_add_options_to_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `product_details` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address`, `product_details`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Breaking Bad (Size: M, L, Color: Black, Navy Blue) | ', 560.00, 'confirmed', '2026-04-16 05:19:06', '2026-04-16 08:15:21'),
(2, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Breaking Bad (Size: M, L, Color: Black) | ', 560.00, 'confirmed', '2026-04-16 08:15:00', '2026-04-16 08:15:19'),
(3, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Breaking Bad (Size: S, L, XL, Color: Black, White) | ', 560.00, 'pending', '2026-04-16 09:27:08', '2026-04-16 09:27:08'),
(4, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Breaking Bad T-shirt (Size: M, Color: Black, Blue) | Product: Breaking Bad T-shirt (Size: L, Color: Black, Blue, White) | ', 1060.00, 'pending', '2026-04-17 22:16:23', '2026-04-17 22:16:23'),
(5, 5, 'Ferdous Alam', '01XXXXXXXXX', 'Uttara', 'Product: Breaking Bad T-shirt (Size: L, Color: Blue) | ', 560.00, 'pending', '2026-04-17 22:38:50', '2026-04-17 22:38:50'),
(6, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Game of Thrones (Size: S, M, Color: Black, Blue) | ', 660.00, 'pending', '2026-04-21 00:48:23', '2026-04-21 00:48:23'),
(7, 2, 'Md Fahad', '01XXXXXXXXX', 'Hasimpur,Raipura', 'Product: Game of Thrones (Size: L, Color: Black) | ', 660.00, 'pending', '2026-04-21 02:15:11', '2026-04-21 02:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sizes` text DEFAULT NULL,
  `colors` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`, `created_at`, `updated_at`, `sizes`, `colors`) VALUES
(4, 'Breaking Bad T-shirt', 'drop-shoulder', 500.00, 'For Breaking Bad Fans', '1776485527.jpeg', '2026-04-17 22:12:07', '2026-04-17 22:12:07', 'M, L, XL', 'Black, Blue, White'),
(5, 'Game of Thrones', 'drop-shoulder', 600.00, 'For Game of Thrones Fan', '1776486553.jpeg', '2026-04-17 22:29:13', '2026-04-17 22:29:13', 'S, M, L, XL', 'Black, Blue, Orange, White'),
(6, 'Starry Night', 'regular', 550.00, 'For Van Gogh Fans', '1776486654.jpeg', '2026-04-17 22:30:54', '2026-04-17 22:30:54', 'S, M, L, XL', 'Black, White'),
(7, 'Get Out', 'drop-shoulder', 700.00, 'For Get out Fans', '1776486713.jpeg', '2026-04-17 22:31:53', '2026-04-17 22:31:53', 'S, M, L, XL', 'Black, White'),
(8, 'Titanic', 'drop-shoulder', 600.00, 'For Titanic Fans', '1776487098.jpeg', '2026-04-17 22:38:18', '2026-04-17 22:38:18', 'S, M, L, XL', 'Black, Blue, White, Maroon'),
(9, 'The Hobbit', 'drop-shoulder', 650.00, 'For The Hobbit Fans', '1776487731.jpeg', '2026-04-17 22:48:51', '2026-04-17 22:48:51', 'S, M, L, XL', 'Black, White'),
(10, 'Hoodie Acid Wash', 'hoodie', 1200.00, 'For acid wash fans', '1776487856.jpeg', '2026-04-17 22:50:56', '2026-04-17 22:50:56', 'S, M, L, XL', 'Black'),
(11, 'Hoodie Acid Wash ( Zipper)', 'hoodie', 1500.00, 'For acid Wash Fans', '1776487959.jpeg', '2026-04-17 22:52:39', '2026-04-17 22:52:39', 'S, M, L, XL', 'Black'),
(12, 'Full Sleeve SweatShirt', 'full-sleeve', 800.00, 'For full sleeve Fans', '1776488094.jpeg', '2026-04-17 22:54:54', '2026-04-17 22:54:54', 'M, L, XL', 'Black, White,Sky-Blue'),
(13, 'Full Sleeve SweatShirt Solid', 'full-sleeve', 800.00, 'For solid Fans', '1776488193.jpeg', '2026-04-17 22:56:33', '2026-04-17 22:56:33', 'S, M, L, XL', 'Black, Navy Blue, White');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pHgCOBC3d3SC7Zmvazoa5cV2IMnugNfSqiL4RoNR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJaUnhzZG1LdlM5dm5xN0ZiTTRPNjZweTJRc1Q3elVrZVV0NnFZQ0F5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jYXJ0Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1777571185),
('VoQs5w09owSkYQxuPxVvBOHUjpUjhz71q23HltUg', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMOTEzT25KbnVybUZ3UUNCRjBXQVdTbnFNc01mTVYybmprRmlEVVhLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1777619434);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Md Fahad', 'fahad@gmail.com', '$2y$12$MeL5IPB9eyqjW82PbLIAv.FR6R/.u.2pOYHcaRSyBind.cev6K9cW', 'Hasimpur,Raipura', 'admin', '2026-04-16 05:18:19', '2026-04-16 05:18:19'),
(2, 'Md Fahad', 'hasanimam0967@gmail.com', '$2y$12$uLwTZDyafKoj3qXmNNZ4eufnMcQOy7/of7LR0MAIxwUF7ZsCujsEG', 'Hasimpur,Raipura', 'customer', '2026-04-16 05:19:00', '2026-04-16 05:19:00'),
(3, 'Mihad Habib', 'mihad@gmail.com', '$2y$12$kmio5pHNpJZmX2daUba5eeKz6sXv82e1978FB0A.utM5Y5p2O2xaW', 'Abdullahpur, Dhaka', 'admin', '2026-04-17 22:34:59', '2026-04-17 22:34:59'),
(4, 'Ziaul Hasan', 'zia@gmail.com', '$2y$12$zM92Rr5.YjhgV0jldmYQH.EtETwW9cnI7OfHkkqiRvfVqAEUD//Yy', 'Mirpur-14, Dhaka', 'admin', '2026-04-17 22:35:43', '2026-04-17 22:35:43'),
(5, 'Ferdous Alam', 'ferdous@gmail.com', '$2y$12$KxwOfyCDQpxyvoEZJh9EDO/Ab6Z3XYLe9PF/Yl0y12a6k7oDwZpjq', 'Uttara', 'customer', '2026-04-17 22:38:19', '2026-04-17 22:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
