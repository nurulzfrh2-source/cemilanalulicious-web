-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 09:20 AM
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
-- Database: `laravel_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Serba Cemilan Alulicious', 'Menu favorit pelanggan', '2026-01-17 05:45:33', '2026-01-17 05:45:33'),
(2, 'Kebabs dan Lulfried Fries', 'Menu favorit pelanggan', '2026-01-17 05:45:33', '2026-01-17 05:45:33'),
(3, 'Kebab Alulicious', 'Menu favorit pelanggan', '2026-01-17 05:45:33', '2026-01-17 05:45:33'),
(4, 'Dimsum Per/Porsi', 'Menu favorit pelanggan', '2026-01-17 05:45:33', '2026-01-17 05:45:33'),
(5, 'Burger Alulicious', 'Menu favorit pelanggan', '2026-01-17 05:45:33', '2026-01-17 05:45:33');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_17_065329_create_kategoris_table', 1),
(5, '2026_01_17_080414_create_produks_table', 1),
(6, '2026_01_17_080415_create_pesanans_table', 1);

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
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nomor_wa` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `produk_dipesan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `nama_pemesan`, `nomor_wa`, `alamat`, `produk_dipesan`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fira', '080002030405', 'Jl.Medan', 'Kentang Goreng Original', 20000, 'Dibatalkan', '2026-01-17 06:12:44', '2026-01-17 06:14:13'),
(2, 'Ikhsan', '080090908080', 'Jl.Medan', 'Sosis Solo', 25000, 'Selesai', '2026-01-17 06:13:04', '2026-01-17 06:14:11'),
(3, 'Tia', '087656574648', 'Jl.Medan', 'Kebab Daging Alulicious', 22000, 'Diproses', '2026-01-17 06:13:26', '2026-01-17 06:14:08'),
(4, 'Dina', '087545352525', 'Jl.Medan', 'Burger Smoked Beef', 24000, 'Diproses', '2026-01-17 06:13:52', '2026-01-18 00:34:48'),
(5, 'Badri', '087654321234', 'Jl.Medan', 'Dimsum Rumput Laut', 32000, 'Menunggu Konfirmasi', '2026-01-18 00:33:09', '2026-01-18 00:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `kategori`, `harga`, `stok`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Kentang Goreng Original', 'Serba Cemilan Alulicious', 20000, 15, 'Kentang goreng renyah saus tomat.', '1768654530_Untitled.jpg', '2026-01-17 05:45:33', '2026-01-17 05:55:30'),
(3, 'Corndog Full Mozarella', 'Serba Cemilan Alulicious', 24000, 20, 'Corndog keju mozarella lumer.', '1768654597_Untitled 2.jpg', '2026-01-17 05:45:33', '2026-01-17 05:56:37'),
(4, 'Churros Coklat', 'Serba Cemilan Alulicious', 25000, 12, 'Churros manis saus coklat.', '1768654645_Untitled3.jpg', '2026-01-17 05:45:33', '2026-01-17 05:57:25'),
(5, 'Sosis Solo', 'Serba Cemilan Alulicious', 25000, 25, 'Camilan khas Solo isi daging.', '1768654689_Untitled 4.jpg', '2026-01-17 05:45:33', '2026-01-17 05:58:09'),
(9, 'Kebab dan Lulfried Fries', 'Kebabs dan Lulfried Fries', 32000, 15, 'Paket Kebab + Kentang Goreng.', '1768654837_Untitled 6.jpg', '2026-01-17 05:45:33', '2026-01-17 06:00:37'),
(10, 'Kebab Daging Alulicious', 'Kebab Alulicious', 22000, 30, 'Kebab daging sapi homemade.', '1768655126_Untitled 8.jpg', '2026-01-17 05:45:33', '2026-01-17 06:05:26'),
(11, 'Kebab Ayam Alulicious', 'Kebab Alulicious', 21000, 30, 'Kebab daging ayam panggang.', '1768655115_Untitled 7.jpg', '2026-01-17 05:45:33', '2026-01-17 06:05:15'),
(13, 'Kebab Alula Special', 'Kebab Alulicious', 28500, 25, 'Smoke beef, telur, keju.', '1768655075_Untitled 9.jpg', '2026-01-17 05:45:33', '2026-01-17 06:04:35'),
(14, 'Dimsum Mix', 'Dimsum Per/Porsi', 32000, 50, 'Isi 4 (ayam, kepiting, udang).', '1768655176_Untitled 10.jpg', '2026-01-17 05:45:33', '2026-01-17 06:06:16'),
(15, 'Dimsum Rumput Laut', 'Dimsum Per/Porsi', 32000, 50, 'Dimsum balut nori.', '1768655208_Untitled 11.jpg', '2026-01-17 05:45:33', '2026-01-17 06:06:48'),
(16, 'Lenghongkien', 'Dimsum Per/Porsi', 27000, 50, 'Udang mayonaise khas Medan.', '1768655266_Untitled 12.jpg', '2026-01-17 05:45:33', '2026-01-17 06:07:46'),
(17, 'Lumpia Kulit Tahu', 'Dimsum Per/Porsi', 27000, 50, 'Lumpia goreng kulit tahu.', '1768655304_Untitled 13.jpg', '2026-01-17 05:45:33', '2026-01-17 06:08:24'),
(18, 'Dimsum Udang', 'Dimsum Per/Porsi', 28000, 50, 'Full udang segar.', '1768655340_Untitled 14.jpg', '2026-01-17 05:45:33', '2026-01-17 06:09:00'),
(21, 'Burger Smoked Beef', 'Burger Alulicious', 24000, 20, 'Burger daging asap.', '1768655383_Untitled 15.jpg', '2026-01-17 05:45:33', '2026-01-17 06:09:43'),
(22, 'Burger Chicken Crispy', 'Burger Alulicious', 22000, 20, 'Burger ayam krispi.', '1768655421_Untitled 16.jpg', '2026-01-17 05:45:33', '2026-01-17 06:10:21'),
(23, 'Burger Daging', 'Burger Alulicious', 23000, 20, 'Burger daging sapi original.', '1768655460_Untitled 17.jpg', '2026-01-17 05:45:33', '2026-01-17 06:11:00');

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
('CSPf1bFXRazRvI4KuBZuzw1QRAqt6KIjkXpAXM40', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOEFCOXBPR1dzc1dLdnhsQ3FpZ29GRXo2WldDMlFoVTZvQVA0TnFlSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZXNhbmFuIjtzOjU6InJvdXRlIjtzOjEzOiJwZXNhbmFuLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Njg3MjE2Njc7fX0=', 1768721688);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Alulicious', 'admin@gmail.com', NULL, '$2y$12$J4gjHrTO9cIXDHjIpjbXNO/SoAyHFmre8avizVCqlGWMw6.5xVysC', NULL, '2026-01-17 05:45:33', '2026-01-17 05:45:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
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
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
