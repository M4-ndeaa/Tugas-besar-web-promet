-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 04:12 PM
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
-- Database: `db_tugas_besar`
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
(4, '2025_12_16_165020_create_produk_table', 1),
(5, '2026_01_03_102841_create_transaksis_table', 2);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambarProduk` varchar(255) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `deskripsiProduk` longtext NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggalInput` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambarProduk`, `namaProduk`, `deskripsiProduk`, `kategori`, `harga`, `stok`, `tanggalInput`, `created_at`, `updated_at`) VALUES
(1, 'baju5.jpg', 'Minty Fresh Pleated Gown', 'Midi dress dengan potongan halter neck yang elegan dalam nuansa sage green yang menenangkan. Terbuat dari bahan bertekstur premium dengan detail ruched di bagian dada dan pinggang yang elastis, memberikan siluet ramping yang modern dan sangat chic.', 'Baju', 2500000.00, 3, '2026-01-02', NULL, '2026-01-04 07:19:39'),
(2, 'baju6.jpeg', 'Aurora Pearl Fairy Dress', 'Midi dress berbahan tulle premium warna lilac dengan detail sweetheart neckline dan lengan balon yang menawan. Dihiasi aksen payet mutiara di pinggang dan bordir bunga halus, menciptakan tampilan fairy-tale yang elegan dan sangat feminin.', 'Baju', 3500000.00, 3, '2026-01-02', NULL, '2026-01-04 04:33:55'),
(3, 'tas1.jpg', 'Midnight Navy Trapezoid Satchel', 'Tas handbag dengan siluet trapezoid yang tegas dan berstruktur dalam warna midnight navy yang mewah. Terbuat dari kulit premium bertekstur, memberikan kesan profesional, elegan, dan sangat cocok untuk melengkapi tampilan kerja maupun acara formal.', 'Tas', 1800000.00, 3, '2026-01-02', NULL, NULL),
(4, 'tas3.jpg', 'Midnight Crescent Hobo Bag', 'Tas bahu berbentuk bulan sabit yang sedang tren dengan detail lipatan (pleated) yang unik. Desainnya yang chic dan modern sangat serbaguna untuk gaya kasual maupun formal, memberikan sentuhan mewah instan pada penampilan harian Anda', 'Tas', 2500000.00, 3, '2026-01-02', NULL, NULL),
(5, 'tas5.jpg', 'Noir Classy Executive Bag', 'Tas kantor klasik dengan desain minimalis namun berkelas. Material kulit hitam premium dengan finishing matte serta aksen logam emas pada handle menjadikannya aksesori abadi yang cocok untuk segala suasana, mulai dari rapat bisnis hingga acara semi-formal.', 'Tas', 2250000.00, 3, '2026-01-02', NULL, '2026-01-03 18:49:53'),
(6, 'celana1.jpeg', 'Emerald Tailored Palazzo', 'Celana panjang dengan potongan high-waist dan model wide-leg yang memberikan kesan kaki lebih jenjang dan siluet tubuh yang ramping. Hadir dalam warna olive green yang eksklusif, celana ini dirancang dengan lipatan pleats depan yang tajam untuk tampilan yang sangat rapi dan berkelas', 'Celana', 800000.00, 11, '2026-01-02', NULL, '2026-01-03 18:43:53'),
(7, 'celana2.jpeg', 'Olive Premium Tailored Trousers', 'Celana panjang high-waist dalam balutan warna olive green yang eksklusif, memberikan kesan kaki yang lebih jenjang dan siluet ramping. Terbuat dari bahan premium yang jatuh sempurna (flowy) dengan detail lipatan depan yang tajam, sangat ideal untuk tampilan kantor yang profesional maupun acara formal yang chic.', 'Celana', 800000.00, 11, '2026-01-02', NULL, '2026-01-03 19:53:13'),
(8, 'baju1.jpeg', 'Isla Sage Halter Midi Dress', 'Kesegaran warna sage green bertemu dengan desain halter neck yang menawan dalam gaun midi yang anggun ini. Potongan pinggang yang pas dan rok yang jatuh lembut memberikan kenyamanan ekstra tanpa mengabaikan estetika. Pilihan ideal untuk  momen spesial yang membutuhkan tampilan feminin yang berkelas. Produk eksklusif dengan stok terbatas hanya 1 , jadilah orang beruntung itu.', 'Baju', 5500000.00, 1, '2026-01-02', NULL, '2026-01-03 04:02:02'),
(10, '1767527537_baju1.jpeg', 'The Duchess Signature Blazer Dress', 'Pancarkan aura \"power woman\" dengan The Duchess Signature Blazer Dress. Potongan double-breasted yang klasik dipadukan dengan aksen kancing emas memberikan siluet tubuh yang tegak dan ramping. Terbuat dari material premium yang berstruktur namun tetap nyaman dipakai sepanjang hari. Pilihan tepat untuk rapat penting, acara formal, atau evening dinner.', 'Baju', 1700000.00, 3, '2026-01-04', '2026-01-04 04:47:36', '2026-01-04 04:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DeaAdmin', '2025-12-28 00:00:14', '2025-12-28 00:00:14'),
(2, 'User', '2025-12-28 00:00:14', '2025-12-28 00:00:14');

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

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `rincian_barang` text NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `nama_pembeli`, `rincian_barang`, `total_bayar`, `created_at`, `updated_at`, `alamat`) VALUES
(6, 'cantika_putri', 'Aurora Pearl Fairy Dress (1x)\n', 3500000, '2026-01-04 04:32:35', '2026-01-04 04:32:35', 'Jl kembang , no 23, cisereuh , purwakarta');

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
  `status` enum('submitted','approve','rejected') NOT NULL DEFAULT 'submitted',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DeaAdmin', 'deaadminc@gmail.com', NULL, '$2y$12$t5A29bL/1AAXZmv8bjsVQOLPPQkKqm3emsZqEQkM.24mnwAu5BSE2', 'approve', 1, NULL, '2025-12-28 00:00:14', '2025-12-28 00:00:14'),
(3, 'Jumbodut', 'jumbo@gmail.com', NULL, '$2y$12$X1te2aBHScukC0An4GtrvufmN0Nw59160qOCFATkoKjFwt7EvR3L.', 'approve', 2, NULL, '2026-01-03 05:04:20', '2026-01-03 10:52:13'),
(4, 'cantika_putri', 'cantika@gmail.com', NULL, '$2y$12$StNu4c2GO.FIBNohP.9ZReMjwp6bJz3YWy4UmsqsM.FNmD2o.PMRG', 'approve', 2, NULL, '2026-01-03 19:09:49', '2026-01-04 07:20:19');

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
