-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Nov 2019 pada 01.38
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
-- Struktur dari tabel `adminuk`
--

CREATE TABLE `adminuk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `plan` int(11) NOT NULL,
  `pencapaian` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspekpenilaian`
--

CREATE TABLE `aspekpenilaian` (
  `id` int(11) NOT NULL,
  `unitkerja_id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `pencapaian` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspekpenilaian`
--

INSERT INTO `aspekpenilaian` (`id`, `unitkerja_id`, `nama`, `nilai`, `pencapaian`, `created_at`, `updated_at`) VALUES
(1, 9, 'Kedisiplinan', 75, 85, '2019-10-15 17:58:14', '2019-11-04 01:09:08'),
(2, 9, 'Ketepatan dalam pekerjaan', 75, 80, '2019-10-15 18:57:56', '2019-11-04 01:04:20'),
(3, 12, 'Hubungan terhadap pegawai lain', 75, 90, '2019-10-15 18:58:32', '2019-11-04 01:04:43'),
(4, 12, 'Pencapaian target', 75, 93, '2019-10-15 18:58:56', '2019-11-04 01:04:57'),
(5, 12, 'Team Work', 75, 96, '2019-10-20 23:14:51', '2019-11-04 01:05:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspekpenilaian_unitkerja`
--

CREATE TABLE `aspekpenilaian_unitkerja` (
  `id` int(11) NOT NULL,
  `unitkerja_id` int(11) NOT NULL,
  `aspekpenilaian_id` int(11) NOT NULL,
  `nilaiku` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspekpenilaian_unitkerja`
--

INSERT INTO `aspekpenilaian_unitkerja` (`id`, `unitkerja_id`, `aspekpenilaian_id`, `nilaiku`, `created_at`, `updated_at`) VALUES
(5, 6, 4, NULL, '2019-10-18 04:55:48', '2019-10-18 11:55:48'),
(6, 11, 5, NULL, '2019-10-28 19:08:37', '2019-10-29 02:08:37'),
(8, 11, 2, NULL, '2019-10-29 19:16:25', '2019-10-30 02:16:25'),
(9, 11, 4, NULL, '2019-10-29 19:16:36', '2019-10-30 02:16:36'),
(10, 11, 3, NULL, '2019-10-29 19:16:50', '2019-10-30 02:16:50'),
(11, 6, 1, NULL, '2019-10-29 19:17:10', '2019-10-30 02:17:10'),
(12, 6, 2, NULL, '2019-10-29 19:17:25', '2019-10-30 02:17:25'),
(13, 6, 3, NULL, '2019-10-29 19:17:38', '2019-10-30 02:17:38'),
(14, 6, 5, NULL, '2019-10-29 19:17:55', '2019-10-30 02:17:55'),
(15, 9, 1, NULL, '2019-10-29 19:19:10', '2019-10-30 02:19:10'),
(16, 9, 2, NULL, '2019-10-29 19:19:18', '2019-10-30 02:19:18'),
(17, 9, 3, NULL, '2019-10-29 19:19:30', '2019-10-30 02:19:30'),
(18, 9, 4, NULL, '2019-10-29 19:19:39', '2019-10-30 02:19:39'),
(19, 9, 5, NULL, '2019-10-29 19:19:49', '2019-10-30 02:19:49'),
(20, 10, 1, NULL, '2019-10-29 19:20:14', '2019-10-30 02:20:14'),
(21, 10, 2, NULL, '2019-10-29 19:20:28', '2019-10-30 02:20:28'),
(22, 10, 3, NULL, '2019-10-29 19:20:39', '2019-10-30 02:20:39'),
(23, 10, 4, NULL, '2019-10-29 19:20:52', '2019-10-30 02:20:52'),
(24, 10, 5, NULL, '2019-10-29 19:34:25', '2019-10-30 02:34:25'),
(25, 7, 1, NULL, '2019-10-29 19:34:48', '2019-10-30 02:34:48'),
(26, 7, 2, NULL, '2019-10-29 19:34:55', '2019-10-30 02:34:55'),
(27, 7, 3, NULL, '2019-10-29 19:35:05', '2019-10-30 02:35:05'),
(28, 7, 4, NULL, '2019-10-29 19:35:14', '2019-10-30 02:35:14'),
(29, 7, 5, NULL, '2019-10-29 19:35:27', '2019-10-30 02:35:27');

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
(14, 11, 'WahyuT', 'M. Wahyu Tamimi', 'L', 'Tuban', NULL, '2019-09-03 00:23:07', '2019-10-13 20:15:23'),
(15, 12, 'Rica', 'Octaviana Rica', 'P', 'Tuban', NULL, '2019-09-03 00:23:37', '2019-09-03 00:23:37'),
(16, 13, 'Lutfi', 'Lutfi Maulana', 'L', 'Tuban', NULL, '2019-09-04 19:03:47', '2019-09-04 19:03:47'),
(18, 15, 'Tuban', 'Tuban Nesia', 'L', 'tuban', NULL, '2019-09-04 19:37:32', '2019-09-04 19:37:32'),
(19, 16, 'Najwa', 'Najwa Shihab', 'P', 'Jl. Kemayoran Menteng Jakpus', NULL, '2019-10-04 17:00:14', '2019-10-04 17:00:14');

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
-- Struktur dari tabel `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unitkerja`
--

INSERT INTO `unitkerja` (`id`, `user_id`, `nama`, `kode`, `jumlah`, `created_at`, `updated_at`) VALUES
(6, 0, 'Akuntansi', 'AK-1', 15, '2019-10-13 20:07:04', '2019-10-14 03:11:56'),
(7, 0, 'Kepegawaian', 'KPG-3', 9, '2019-10-16 18:29:07', '2019-10-17 01:29:07'),
(9, 18, 'PPC', 'SHE-2', 7, '2019-10-27 18:31:40', '2019-10-28 01:31:40'),
(10, 19, 'Training Center', 'SHE-2', 5, '2019-10-27 19:10:27', '2019-10-28 02:10:27'),
(12, 24, 'SDM', 'KPG-3', 2, '2019-11-03 18:08:01', '2019-11-04 01:08:01'),
(13, 25, 'Logistik', 'KPG-3', 5, '2019-11-05 05:52:18', '2019-11-05 12:52:18');

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
(7, 'admin', 'Admin', 'admin@utsg.co.id', NULL, '$2y$10$kKF2ewJneDvBdOYT7QHboelYqY7qghl9ygJInLPtmu4SPCmc.DJuO', 'WFbB7BZGuOrXvXljICYtO8YhGjq4YarRZBiUXlUbQrjbL28Pf4ZGGBxIRxnt', '2019-09-01 19:10:15', '2019-09-01 19:10:15'),
(13, 'karyawan', 'Lutfi', 'Lutfifiki@gmail.com', NULL, '$2y$10$i0GNL4eYbeKkWPlzKhsGw.lP/GbcJI6qXH1Zk5RfgHsGYCKtThmdC', '4Z2UHh7cv5covy2kz5W80w0BJPnO4dIvR4EA5Rc2Uh0OVjNUTscdNtEDZSce', '2019-09-04 19:03:47', '2019-09-04 19:03:47'),
(18, 'AdminUK', 'PPC', 'ppc@gmail.com', NULL, '$2y$10$bUWhrYOuviTGNEAlByimu.TNHuYehtcZpYPiKKZ32ugjtl4rK4Zr6', 'evdvcXwDqVQFufd1TpJ6ClWNk2pVHAP1WXHVBwSaSmBdDN2chRZ0E6ihQCd3', '2019-10-27 18:31:40', '2019-10-27 18:31:40'),
(19, 'unitkerja', 'Training Center', 'tc@gmail.com', NULL, '$2y$10$vMIpew6IYkfV4Fn/b5TPEeyD6vh6o7fd66uyajkTfJ9E2ZhrXJaE6', 'NxYS2NF8DMYyolEMYS18OKNFGNHeb56FVKZGnr8xT1CzCpgWPewUWvubcYVk', '2019-10-27 19:10:27', '2019-10-27 19:10:27'),
(20, 'unitkerja', 'GA', 'ga@gmail.com', NULL, '$2y$10$BPIG9EFJU6gViIKK9VidmelU3FvDSK.m4/4vxlj4dONi1Y0G2jZPa', 'zR7nP5VbZgDw446N2Kr5NDjNve2GgLBicD8YMrCorxKgEitY5fS3LHSRDtFX', '2019-10-27 19:11:48', '2019-10-27 19:11:48'),
(24, 'AdminUK', 'SDM', 'sdm@utsg.co.id', NULL, '$2y$10$JvZUMFpHUCmUptdGGsaDZuDI5wFJyTL/ITyB5ANCa2I6No3IUyJZq', 'GnK7rOfY6su9hELiDGV8VXwKik8SKcDAeMbi3GCzaz1L9UbwShSmsJgXsmuJ', '2019-11-03 18:08:01', '2019-11-03 18:08:01'),
(25, 'AdminUK', 'Logistik', 'logistik@utsg.co.id', NULL, '$2y$10$foRI3WTj1rF4nI0DVAMYq.jBP9.Nn9LhkFqxA0RWzGgL1o7.VpWe2', 'X2t2wORorf2e93pAkTkIEPkFLnXyl2oSSWGi316NzaqVDSlj3IA4zljQKmQg', '2019-11-05 05:52:18', '2019-11-05 05:52:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuk`
--
ALTER TABLE `adminuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspekpenilaian`
--
ALTER TABLE `aspekpenilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspekpenilaian_unitkerja`
--
ALTER TABLE `aspekpenilaian_unitkerja`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
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
-- AUTO_INCREMENT for table `adminuk`
--
ALTER TABLE `adminuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aspekpenilaian`
--
ALTER TABLE `aspekpenilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aspekpenilaian_unitkerja`
--
ALTER TABLE `aspekpenilaian_unitkerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
