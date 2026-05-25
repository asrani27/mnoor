-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mnoor
CREATE DATABASE IF NOT EXISTS `mnoor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mnoor`;

-- Dumping structure for table mnoor.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.cache: ~0 rows (approximately)

-- Dumping structure for table mnoor.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.cache_locks: ~0 rows (approximately)

-- Dumping structure for table mnoor.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table mnoor.jawabans
CREATE TABLE IF NOT EXISTS `jawabans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` bigint unsigned NOT NULL,
  `responden_id` bigint unsigned NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jawabans_pertanyaan_id_foreign` (`pertanyaan_id`),
  KEY `jawabans_responden_id_foreign` (`responden_id`),
  CONSTRAINT `jawabans_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jawabans_responden_id_foreign` FOREIGN KEY (`responden_id`) REFERENCES `respondens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.jawabans: ~24 rows (approximately)
INSERT INTO `jawabans` (`id`, `pertanyaan_id`, `responden_id`, `jawaban`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'asdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(2, 2, 1, 'sdfasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(3, 3, 1, 'sdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(4, 4, 1, 'sdfasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(5, 5, 1, 'sdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(6, 6, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(7, 7, 1, 'asd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(8, 8, 1, 'sdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(9, 9, 1, 'asdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(10, 10, 1, 'fdsf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(11, 11, 1, 'asd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(12, 12, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(13, 13, 1, 'asd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(14, 14, 1, 'sdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(15, 15, 1, 'asdasdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(16, 16, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(17, 17, 1, 'asd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(18, 18, 1, 'asdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(19, 19, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(20, 20, 1, 'asdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(21, 21, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(22, 22, 1, 'asdasd', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(23, 23, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56'),
	(24, 24, 1, 'sdfsdf', '2026-04-19 06:21:56', '2026-04-19 06:21:56');

-- Dumping structure for table mnoor.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.jobs: ~0 rows (approximately)

-- Dumping structure for table mnoor.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.job_batches: ~0 rows (approximately)

-- Dumping structure for table mnoor.kritiks
CREATE TABLE IF NOT EXISTS `kritiks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `layanan_id` bigint unsigned NOT NULL,
  `responden_id` bigint unsigned NOT NULL,
  `isi_kritik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindak_lanjut` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kritiks_layanan_id_foreign` (`layanan_id`),
  KEY `kritiks_responden_id_foreign` (`responden_id`),
  CONSTRAINT `kritiks_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kritiks_responden_id_foreign` FOREIGN KEY (`responden_id`) REFERENCES `respondens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.kritiks: ~2 rows (approximately)
INSERT INTO `kritiks` (`id`, `layanan_id`, `responden_id`, `isi_kritik`, `tindak_lanjut`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'lmbat', 'ok', '2026-04-19 06:25:47', '2026-04-19 06:26:26'),
	(2, 2, 1, 'lambat', NULL, '2026-04-19 06:26:41', '2026-04-19 06:26:41');

-- Dumping structure for table mnoor.layanans
CREATE TABLE IF NOT EXISTS `layanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `layanans_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.layanans: ~8 rows (approximately)
INSERT INTO `layanans` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'LYN001', 'Pelayanan Administrasi', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(2, 'LYN002', 'Pelayanan Kesehatan', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(3, 'LYN003', 'Pelayanan Pendidikan', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(4, 'LYN004', 'Pelayanan Transportasi', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(5, 'LYN005', 'Pelayanan Perizinan', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(6, 'LYN006', 'Pelayanan Informasi', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(7, 'LYN007', 'Pelayanan Sosial', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(8, 'LYN008', 'Pelayanan Ekonomi', '2026-04-19 06:17:14', '2026-04-19 06:17:14');

-- Dumping structure for table mnoor.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_01_01_000001_add_username_role_to_users_table', 1),
	(5, '2024_01_02_000001_create_layanans_table', 1),
	(6, '2024_01_02_000002_create_wilayahs_table', 1),
	(7, '2024_01_02_000003_create_respondens_table', 1),
	(8, '2024_01_02_000004_create_pertanyaans_table', 1),
	(9, '2024_01_02_000005_create_kritiks_table', 1),
	(10, '2024_01_02_000006_create_jawabans_table', 1),
	(11, '2024_01_02_000007_add_user_id_to_respondens_table', 1),
	(12, '2024_01_02_000008_create_ratings_table', 1),
	(13, '2024_01_19_000001_modify_respondens_nullable_fields', 2),
	(14, '2024_01_19_000002_add_layanan_id_to_pertanyaans_table', 3);

-- Dumping structure for table mnoor.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table mnoor.pertanyaans
CREATE TABLE IF NOT EXISTS `pertanyaans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `layanan_id` bigint unsigned DEFAULT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.pertanyaans: ~24 rows (approximately)
INSERT INTO `pertanyaans` (`id`, `layanan_id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Bagaimana pelayanan sikap dan perilaku petugas dalam memberikan pelayanan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(2, 1, 'Bagaimana pemahaman petugas terhadap prosedur pelayanan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(3, 1, 'Bagaimana ketersediaan informasi tentang prosedur pelayanan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(4, 2, 'Bagaimana kualitas pelayanan kesehatan yang diberikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(5, 2, 'Bagaimana kecepatan waktu pelayanan di fasilitas kesehatan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(6, 2, 'Bagaimana kemudahan akses ke fasilitas kesehatan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(7, 3, 'Bagaimana kualitas pengajaran di institusi pendidikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(8, 3, 'Bagaimana ketersediaan sarana dan prasarana pendidikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(9, 3, 'Bagaimana keterbukaan informasi tentang biaya pendidikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(10, 4, 'Bagaimana kenyamanan menggunakan transportasi umum?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(11, 4, 'Bagaimana ketepatan waktu keberangkatan transportasi?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(12, 4, 'Bagaimana keamanan selama menggunakan transportasi?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(13, 5, 'Bagaimana kemudahan proses pengurusan izin?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(14, 5, 'Bagaimana kejelasan persyaratan pengurusan izin?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(15, 5, 'Bagaimana kecepatan proses penerbitan izin?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(16, 6, 'Bagaimana kualitas informasi yang diberikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(17, 6, 'Bagaimana kemudahan mendapatkan informasi yang dibutuhkan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(18, 6, 'Bagaimana ketepatan informasi yang diberikan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(19, 7, 'Bagaimana kemudahan akses ke layanan sosial?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(20, 7, 'Bagaimana responsiveness petugas terhadap keluhan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(21, 7, 'Bagaimana keadilan dalam pemberian bantuan sosial?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(22, 8, 'Bagaimana kemudahan akses ke peluang ekonomi?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(23, 8, 'Bagaimana dukungan pemerintah terhadap pelaku ekonomi?', '2026-04-19 06:19:26', '2026-04-19 06:19:26'),
	(24, 8, 'Bagaimana kemudahan akses permodalan?', '2026-04-19 06:19:26', '2026-04-19 06:19:26');

-- Dumping structure for table mnoor.ratings
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `responden_id` bigint unsigned NOT NULL,
  `layanan_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_responden_id_foreign` (`responden_id`),
  KEY `ratings_layanan_id_foreign` (`layanan_id`),
  CONSTRAINT `ratings_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ratings_responden_id_foreign` FOREIGN KEY (`responden_id`) REFERENCES `respondens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.ratings: ~2 rows (approximately)
INSERT INTO `ratings` (`id`, `responden_id`, `layanan_id`, `rating`, `komentar`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 4, NULL, '2026-04-19 06:22:03', '2026-04-19 06:22:11'),
	(2, 1, 2, 3, NULL, '2026-04-19 06:22:15', '2026-04-19 06:22:15'),
	(3, 1, 3, 3, NULL, '2026-04-19 06:22:20', '2026-04-19 06:22:20');

-- Dumping structure for table mnoor.respondens
CREATE TABLE IF NOT EXISTS `respondens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `wilayah_id` bigint unsigned DEFAULT NULL,
  `layanan_id` bigint unsigned DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respondens_wilayah_id_foreign` (`wilayah_id`),
  KEY `respondens_layanan_id_foreign` (`layanan_id`),
  KEY `respondens_user_id_foreign` (`user_id`),
  CONSTRAINT `respondens_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respondens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respondens_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.respondens: ~0 rows (approximately)
INSERT INTO `respondens` (`id`, `user_id`, `wilayah_id`, `layanan_id`, `nama`, `jkel`, `pekerjaan`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
	(1, 4, NULL, NULL, 'Asrani no last name', 'L', '-', 'jl ..', '087715996555', '2026-04-19 06:14:21', '2026-04-19 06:14:21');

-- Dumping structure for table mnoor.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.sessions: ~0 rows (approximately)

-- Dumping structure for table mnoor.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `username`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'mnoor', 'admin', 'Admin', 'admin@mnoor.com', NULL, '$2y$12$MZltXkL5SFdnSD3MLs4zy.9MyY/avmInUR0MCXoTHtjPzD0diZXrC', NULL, '2026-04-19 06:07:55', '2026-04-19 06:07:55'),
	(2, 'user', 'user', 'User', 'user@mnoor.com', NULL, '$2y$12$Tvt6VYgFK3MZ0sHCqYqpoeP9Pq0PzJBPUD4SzP8tIkn.bsdA2QZEK', NULL, '2026-04-19 06:07:56', '2026-04-19 06:07:56'),
	(4, 'andi', 'user', 'Asrani no last name', 'andi@gmail.com', NULL, '$2y$12$JWNbwi6Z0VGqfPY4jX2.3uQibMcTtWB4bIUO7O/i4NqUGUhKDgE1K', NULL, '2026-04-19 06:14:21', '2026-04-19 06:14:21');

-- Dumping structure for table mnoor.wilayahs
CREATE TABLE IF NOT EXISTS `wilayahs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wilayahs_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mnoor.wilayahs: ~8 rows (approximately)
INSERT INTO `wilayahs` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'WLY001', 'Kota Surabaya', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(2, 'WLY002', 'Kota Malang', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(3, 'WLY003', 'Kota Sidoarjo', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(4, 'WLY004', 'Kota Gresik', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(5, 'WLY005', 'Kabupaten Pasuruan', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(6, 'WLY006', 'Kabupaten Mojokerto', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(7, 'WLY007', 'Kota Batu', '2026-04-19 06:17:14', '2026-04-19 06:17:14'),
	(8, 'WLY008', 'Kabupaten Jombang', '2026-04-19 06:17:14', '2026-04-19 06:17:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
