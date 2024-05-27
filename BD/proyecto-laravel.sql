-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla clod.doc_documento
CREATE TABLE IF NOT EXISTS `doc_documento` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doc_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_codigo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_contenido` text COLLATE utf8mb4_unicode_ci,
  `doc_id_tipo` int DEFAULT NULL,
  `doc_id_proceso` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.doc_documento: ~5 rows (aproximadamente)
REPLACE INTO `doc_documento` (`id`, `doc_nombre`, `doc_codigo`, `doc_contenido`, `doc_id_tipo`, `doc_id_proceso`, `created_at`, `updated_at`) VALUES
	(4, 'pruevba', 'CC-ADM-000', NULL, 1, 2, '2024-05-23 15:30:45', '2024-05-23 15:30:45'),
	(5, 'aaa', 'CC-ADM-001', NULL, 1, 2, '2024-05-23 15:37:33', '2024-05-23 15:37:33'),
	(6, 'aaaa', 'PASAPORTE-ING-002', NULL, 4, 4, '2024-05-23 15:38:25', '2024-05-23 15:38:25'),
	(7, 'prueba', 'INS-ING-003', 'aaaaaaaaa', 5, 4, '2024-05-23 17:38:32', '2024-05-23 17:38:32'),
	(8, 'aaa', 'CE-ADM-004', 'aaaa', 2, 2, '2024-05-26 16:05:55', '2024-05-26 16:05:55');

-- Volcando estructura para tabla clod.failed_jobs
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

-- Volcando datos para la tabla clod.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla clod.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.migrations: ~0 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_05_22_140828_pro_proceso', 1),
	(7, '2024_05_22_141321_tip_tipo_doc', 1),
	(8, '2024_05_22_141604_doc_documento', 1),
	(9, '2024_05_22_151812_roles', 1);

-- Volcando estructura para tabla clod.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla clod.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla clod.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla clod.pro_proceso
CREATE TABLE IF NOT EXISTS `pro_proceso` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pro_prefijo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.pro_proceso: ~2 rows (aproximadamente)
REPLACE INTO `pro_proceso` (`id`, `pro_prefijo`, `pro_nombre`, `created_at`, `updated_at`) VALUES
	(2, 'ADM', 'administracion', '2024-05-22 21:23:19', '2024-05-22 21:23:19'),
	(4, 'ING', 'ingenieria', '2024-05-23 15:38:11', '2024-05-23 15:38:11');

-- Volcando estructura para tabla clod.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rol` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.roles: ~1 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', '2024-05-22 15:23:30', '2024-05-22 15:23:31');

-- Volcando estructura para tabla clod.tip_tipo_doc
CREATE TABLE IF NOT EXISTS `tip_tipo_doc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tip_prefijo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.tip_tipo_doc: ~4 rows (aproximadamente)
REPLACE INTO `tip_tipo_doc` (`id`, `tip_nombre`, `tip_prefijo`, `created_at`, `updated_at`) VALUES
	(1, 'Cedula de Ciudadania', 'CC', '2024-05-23 01:12:17', '2024-05-23 01:12:17'),
	(2, 'Extrangeria', 'CE', '2024-05-22 20:15:09', '2024-05-22 20:35:05'),
	(4, 'pasaporte', 'PASAPORTE', '2024-05-22 20:47:57', '2024-05-22 20:47:57'),
	(5, 'instrutivo', 'INS', '2024-05-23 14:43:51', '2024-05-23 14:43:51');

-- Volcando estructura para tabla clod.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clod.users: ~2 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `rol`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'sebastian', 'admin@mail.com', '$2y$12$BzeaSMKS3yrN7xPEs9vWReMAHC.JhX6eHSTs5deQHogv21FmG/K9G', 'Admon', NULL, NULL, '2024-05-22 20:22:22', '2024-05-27 01:33:00'),
	(2, 'prueba1', 'prueba@mail.com', '$2y$12$l0AF02nvKngR2zZkb.n7P.W5N7ad13VTWVzg.4C3n65W4pAnJDp6.', 'Admon', NULL, NULL, '2024-05-26 18:56:00', '2024-05-27 01:33:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
