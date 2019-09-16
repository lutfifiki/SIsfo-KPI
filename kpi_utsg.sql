-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Sep 2019 pada 15.26
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpi_utsg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `user_id`, `nama_depan`, `nama`, `jenis_kelamin`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(13, 10, 'Daud', 'Daud Ibrahim', 'L', 'Tuban', NULL, '2019-09-02 00:05:34', '2019-09-02 00:05:34'),
(14, 11, 'Wahyu', 'M. Wahyu Tamimi', 'L', 'Tuban', NULL, '2019-09-03 00:23:07', '2019-09-03 00:23:07'),
(15, 12, 'Rica', 'Octaviana Rica', 'P', 'Tuban', NULL, '2019-09-03 00:23:37', '2019-09-03 00:23:37'),
(16, 13, 'Lutfi', 'Lutfi Maulana', 'L', 'Tuban', NULL, '2019-09-04 19:03:47', '2019-09-04 19:03:47'),
(18, 15, 'Tuban', 'Tuban Nesia', 'L', 'tuban', NULL, '2019-09-04 19:37:32', '2019-09-04 19:37:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_kpi`
--

CREATE TABLE `karyawan_kpi` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `kpi_id` int(11) NOT NULL,
  `pencapaian` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_kpi`
--

INSERT INTO `karyawan_kpi` (`id`, `karyawan_id`, `kpi_id`, `pencapaian`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 52, '2019-09-03 06:44:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kpi`
--

CREATE TABLE `kpi` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `devisi` varchar(45) NOT NULL,
  `standart` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kpi`
--

INSERT INTO `kpi` (`id`, `kode`, `devisi`, `standart`, `created_at`, `updated_at`) VALUES
(1, 'H-1', 'Akutansi', 70, '2019-09-03 06:41:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'Fiki', 'Fiki@gmail.com', NULL, '$2y$10$kKF2ewJneDvBdOYT7QHboelYqY7qghl9ygJInLPtmu4SPCmc.DJuO', '7koAwQOTHeozc1G0JyRrFRr1HGr4ctk7Ifem2V8rgNL0wW1VkBVGGwv93wi9', '2019-09-01 19:10:15', '2019-09-01 19:10:15'),
(10, 'karyawan', 'Daud', 'daudibrahim@gmail.com', NULL, '$2y$10$GiRa7HHswfZJhG6TrvvYFubYO2kIUrTAjRJBgKC2j.ahHkdXVe46m', '3WGbDnhUMFVUh9bC6d0UrRV89KhKcTIYs2UNkxWSTAGc1nU4c8QA888BVy3p', '2019-09-02 00:05:34', '2019-09-02 00:05:34'),
(11, 'karyawan', 'Wahyu', 'wahyutamimi@gmail.com', NULL, '$2y$10$kj0PSLak52.yR8UgDJXDReJgm15geLvPtjLdj3a4j7gpGks4wog2S', 'wJjseEgmez7skQVWYJYJlZGIGpPRgqqiHEaWuknMziexEjBGN3U90uP7DGXm', '2019-09-03 00:23:07', '2019-09-03 00:23:07'),
(12, 'karyawan', 'Rica', 'octavianrica@gmail.com', NULL, '$2y$10$I3jKHTveoj5IK6KSvDzF4ecU6AziMlPstrQeRGB/k8du/PBPWE/iS', 'TSU2R1Erk3AAfrvmt2ZlEIipLw1d1eAtKTyfMPuy75PjdWEJXfeIUY1z841k', '2019-09-03 00:23:37', '2019-09-03 00:23:37'),
(13, 'karyawan', 'Lutfi', 'Lutfifiki@gmail.com', NULL, '$2y$10$i0GNL4eYbeKkWPlzKhsGw.lP/GbcJI6qXH1Zk5RfgHsGYCKtThmdC', '4Z2UHh7cv5covy2kz5W80w0BJPnO4dIvR4EA5Rc2Uh0OVjNUTscdNtEDZSce', '2019-09-04 19:03:47', '2019-09-04 19:03:47'),
(15, 'karyawan', 'Tuban', 'tuban@gmail.com', NULL, '$2y$10$EfowteWwIwsYg/XrYEHIk.f/RdtsDD4IfQYfs5yx1WTjU2EY.6WvS', 'kENcAWytJSPJh3nRLKsgCpNzyB2x8HPIxFE5ZGACVrqnmkN2jTYNPLfxR3lC', '2019-09-04 19:37:32', '2019-09-04 19:37:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_kpi`
--
ALTER TABLE `karyawan_kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `karyawan_kpi`
--
ALTER TABLE `karyawan_kpi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
