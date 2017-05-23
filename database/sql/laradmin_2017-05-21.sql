# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: freebook
# Generation Time: 2017-05-21 12:05:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_01_15_105324_create_roles_table',1),
	('2015_01_15_114412_create_role_user_table',1),
	('2015_01_26_115212_create_permissions_table',1),
	('2015_01_26_115523_create_permission_role_table',1),
	('2015_02_09_132439_create_permission_user_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table permission_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(6,2,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(7,3,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(8,4,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(9,5,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(10,6,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(11,7,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(12,8,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(13,9,1,'2017-05-21 19:56:29','2017-05-21 19:56:29'),
	(14,10,1,'2017-05-21 19:56:29','2017-05-21 19:56:29');

/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`)
VALUES
	(2,'后台_首页','admin.index','后台首页',NULL,'2017-05-21 19:49:20','2017-05-21 19:51:03'),
	(3,'后台_管理员设置_首页','admin.admin.index','后台_管理员设置_首页',NULL,'2017-05-21 19:52:31','2017-05-21 19:52:31'),
	(4,'后台_管理员设置_添加','admin.admin.create','后台_管理员设置_添加',NULL,'2017-05-21 19:53:00','2017-05-21 19:53:00'),
	(5,'后台_管理员设置_编辑','admin.admin.edit','后台_管理员设置_编辑',NULL,'2017-05-21 19:53:19','2017-05-21 19:53:19'),
	(6,'后台_管理员设置_删除','admin.admin.destroy','后台_管理员设置_删除',NULL,'2017-05-21 19:53:42','2017-05-21 19:53:42'),
	(7,'后台_权限设置_首页','admin.permission.index','后台_权限设置_首页',NULL,'2017-05-21 19:54:08','2017-05-21 19:54:54'),
	(8,'后台_权限设置_添加','admin.permission.create','后台_权限设置_添加',NULL,'2017-05-21 19:54:43','2017-05-21 19:54:43'),
	(9,'后台_权限设置_编辑','admin.permission.edit','后台_权限设置_编辑',NULL,'2017-05-21 19:55:15','2017-05-21 19:55:15'),
	(10,'后台_权限设置_删除','admin.permission.destroy','后台_权限设置_删除',NULL,'2017-05-21 19:55:29','2017-05-21 19:55:29');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户头像',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户邮箱',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `enable` int(11) NOT NULL DEFAULT '1' COMMENT '是否启用,默认启用',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '找回密码Token',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `password`, `enable`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'/uploads/admin-avatar/1495366482avatar.jpg','Petard','scumpetard@gmail.com','$2y$10$cG1hmXFaiddBIUoT1g56jeCZ0.P4S7BvSQJx1O93Xqd1NoQ6XmQAy',1,'ySHE0OX5XTYlPVZ3kUxuctNmkeqJlP7wQyjHhzVQRcwom3pneDWaGHLq2upG','2017-05-21 18:35:46','2017-05-21 20:01:33');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
