-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ivas_test_migrate
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_provider_id_foreign` (`provider_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categories_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'asas',NULL,'2021-06-22 09:35:14','2021-06-22 09:35:14',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_types`
--

DROP TABLE IF EXISTS `content_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_types`
--

LOCK TABLES `content_types` WRITE;
/*!40000 ALTER TABLE `content_types` DISABLE KEYS */;
INSERT INTO `content_types` VALUES (1,'Advanced Text','2019-02-14 11:05:42','2019-02-14 11:05:42'),(2,'Normal Text','2019-02-14 11:06:12','2019-02-14 11:06:12'),(3,'Image','2019-02-14 11:06:27','2019-02-14 11:06:27'),(4,'Audio','2019-02-14 11:06:34','2019-02-14 11:06:34'),(5,'Video','2019-02-14 11:06:38','2019-02-14 11:06:38'),(6,'external video link','2019-03-06 06:02:01','2019-03-06 06:02:01');
/*!40000 ALTER TABLE `content_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_preview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_type_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `patch_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_content_type_id_foreign` (`content_type_id`),
  KEY `contents_category_id_foreign` (`category_id`),
  CONSTRAINT `contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contents_content_type_id_foreign` FOREIGN KEY (`content_type_id`) REFERENCES `content_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (6,'adsasd sdsd','uploads/content/image/2021/06/23/1624447392.png','uploads/content/image_preview/2021/06/23/1624445869.png',3,1,NULL,'2021-06-23 08:31:21','2021-06-23 09:23:12'),(7,'sdfsdf','<p>sdsdsooood</p>',NULL,2,1,NULL,'2021-06-23 08:57:59','2021-06-23 09:11:39'),(8,'testomar','<p>sdsd</p>',NULL,1,1,NULL,'2021-06-23 09:05:53','2021-06-23 09:23:05');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delete_all_flags`
--

DROP TABLE IF EXISTS `delete_all_flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delete_all_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delete_all_flags_route_id_foreign` (`route_id`),
  CONSTRAINT `delete_all_flags_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delete_all_flags`
--

LOCK TABLES `delete_all_flags` WRITE;
/*!40000 ALTER TABLE `delete_all_flags` DISABLE KEYS */;
/*!40000 ALTER TABLE `delete_all_flags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'Arabic','2019-02-11 11:12:04','2019-02-11 11:12:04','ar',1),(2,'English','2019-02-11 11:12:04','2019-02-11 11:12:04','en',0);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_08_01_141233_create_permission_tables',1),(2,'2019_04_22_161443_create_categories_table',1),(3,'2019_04_22_161443_create_content_types_table',1),(4,'2019_04_22_161443_create_contents_table',1),(5,'2019_04_22_161443_create_countries_table',1),(6,'2019_04_22_161443_create_delete_all_flags_table',1),(7,'2019_04_22_161443_create_languages_table',1),(8,'2019_04_22_161443_create_operators_table',1),(9,'2019_04_22_161443_create_password_resets_table',1),(10,'2019_04_22_161443_create_permissions_table',1),(11,'2019_04_22_161443_create_posts_table',1),(12,'2019_04_22_161443_create_rbt_codes_table',1),(13,'2019_04_22_161443_create_relations_table',1),(14,'2019_04_22_161443_create_role_has_permissions_table',1),(15,'2019_04_22_161443_create_role_route_table',1),(16,'2019_04_22_161443_create_roles_table',1),(17,'2019_04_22_161443_create_routes_table',1),(18,'2019_04_22_161443_create_scaffoldinterfaces_table',1),(19,'2019_04_22_161443_create_settings_table',1),(20,'2019_04_22_161443_create_static_bodies_table',1),(21,'2019_04_22_161443_create_static_translations_table',1),(22,'2019_04_22_161443_create_tans_bodies_table',1),(23,'2019_04_22_161443_create_translatables_table',1),(24,'2019_04_22_161443_create_types_table',1),(25,'2019_04_22_161443_create_user_has_permissions_table',1),(26,'2019_04_22_161443_create_user_has_roles_table',1),(27,'2019_04_22_161443_create_users_table',1),(28,'2019_04_22_161445_add_foreign_keys_to_categories_table',1),(29,'2019_04_22_161445_add_foreign_keys_to_contents_table',1),(30,'2019_04_22_161445_add_foreign_keys_to_delete_all_flags_table',1),(31,'2019_04_22_161445_add_foreign_keys_to_operators_table',1),(32,'2019_04_22_161445_add_foreign_keys_to_posts_table',1),(33,'2019_04_22_161445_add_foreign_keys_to_rbt_codes_table',1),(34,'2019_04_22_161445_add_foreign_keys_to_relations_table',1),(35,'2019_04_22_161445_add_foreign_keys_to_role_has_permissions_table',1),(36,'2019_04_22_161445_add_foreign_keys_to_role_route_table',1),(37,'2019_04_22_161445_add_foreign_keys_to_settings_table',1),(38,'2019_04_22_161445_add_foreign_keys_to_static_bodies_table',1),(39,'2019_04_22_161445_add_foreign_keys_to_tans_bodies_table',1),(40,'2019_04_22_161445_add_foreign_keys_to_user_has_permissions_table',1),(41,'2019_04_22_161445_add_foreign_keys_to_user_has_roles_table',1),(42,'2019_12_30_091104_create_providers_table',1),(43,'2019_12_30_161445_add_foreign_keys_to_categoriesproviders_table',1),(44,'2020_01_01_082734_add_provider_id_Rbtcodes_table',1),(45,'2020_01_22_091056_rename_routes_route',1),(46,'2021_06_23_133039_create_categories_table',0),(47,'2021_06_23_133040_add_foreign_keys_to_categories_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_sms_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rbt_ussd_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operators_country_id_foreign` (`country_id`),
  CONSTRAINT `operators_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `published_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `operator_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_content_id_foreign` (`content_id`),
  KEY `posts_operator_id_foreign` (`operator_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (3,'testomar fffffffff','1624370893277.png','2021-06-22 11:57:18','2021-06-22 12:08:13');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rbt_codes`
--

DROP TABLE IF EXISTS `rbt_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rbt_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rbt_code` int(11) NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `operator_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rbt_codes_content_id_foreign` (`content_id`),
  KEY `rbt_codes_operator_id_foreign` (`operator_id`),
  KEY `rbt_codes_provider_id_foreign` (`provider_id`),
  CONSTRAINT `rbt_codes_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rbt_codes_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rbt_codes_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rbt_codes`
--

LOCK TABLES `rbt_codes` WRITE;
/*!40000 ALTER TABLE `rbt_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbt_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scaffoldinterface_id` int(10) unsigned NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `having` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relations_scaffoldinterface_id_foreign` (`scaffoldinterface_id`),
  CONSTRAINT `relations_scaffoldinterface_id_foreign` FOREIGN KEY (`scaffoldinterface_id`) REFERENCES `scaffoldinterfaces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_route`
--

DROP TABLE IF EXISTS `role_route`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_2` (`role_id`),
  KEY `route_id_2` (`route_id`),
  CONSTRAINT `role_route_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_route_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_route`
--

LOCK TABLES `role_route` WRITE;
/*!40000 ALTER TABLE `role_route` DISABLE KEYS */;
INSERT INTO `role_route` VALUES (5,1,122,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(6,6,122,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(7,1,123,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(8,6,123,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(9,1,124,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(10,6,124,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(11,1,125,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(12,6,125,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(13,1,126,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(14,6,126,'2019-02-14 11:01:13','2019-02-14 11:01:13'),(15,1,127,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(16,6,127,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(17,1,128,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(18,6,128,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(19,1,129,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(20,6,129,'2019-02-14 11:02:21','2019-02-14 11:02:21'),(21,1,130,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(22,6,130,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(23,1,131,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(24,6,131,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(25,1,132,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(26,6,132,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(27,1,133,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(28,6,133,'2019-02-14 11:02:22','2019-02-14 11:02:22'),(31,1,135,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(32,6,135,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(33,1,136,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(34,6,136,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(35,1,137,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(36,6,137,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(37,1,138,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(38,6,138,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(39,1,139,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(40,6,139,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(41,1,140,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(42,6,140,'2019-02-14 11:03:26','2019-02-14 11:03:26'),(43,1,141,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(44,6,141,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(45,1,142,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(46,6,142,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(47,1,143,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(48,6,143,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(49,1,144,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(50,6,144,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(51,1,145,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(52,6,145,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(53,1,146,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(54,6,146,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(55,1,147,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(56,6,147,'2019-02-14 11:04:09','2019-02-14 11:04:09'),(57,1,148,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(58,6,148,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(59,1,149,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(60,6,149,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(61,1,150,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(62,6,150,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(63,1,151,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(64,6,151,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(65,1,152,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(66,6,152,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(67,1,153,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(68,6,153,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(69,1,154,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(70,6,154,'2019-03-06 07:00:28','2019-03-06 07:00:28'),(71,1,155,'2019-03-14 06:51:14','2019-03-14 06:51:14'),(72,6,155,'2019-03-14 06:51:14','2019-03-14 06:51:14'),(73,1,156,'2019-03-14 06:51:14','2019-03-14 06:51:14'),(74,6,156,'2019-03-14 06:51:14','2019-03-14 06:51:14'),(75,1,157,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(76,6,157,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(77,1,158,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(78,6,158,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(79,1,159,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(80,6,159,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(81,1,160,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(82,6,160,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(83,1,161,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(84,6,161,'2019-03-14 06:51:15','2019-03-14 06:51:15'),(90,1,120,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(91,6,120,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(92,1,176,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(93,6,176,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(94,1,121,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(95,6,121,'2021-06-21 09:57:42','2021-06-21 09:57:42'),(96,1,134,'2021-06-21 09:57:52','2021-06-21 09:57:52'),(97,6,134,'2021-06-21 09:57:53','2021-06-21 09:57:53'),(98,6,175,'2021-06-21 09:57:53','2021-06-21 09:57:53');
/*!40000 ALTER TABLE `role_route` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin',1,'2017-11-09 04:13:14','2021-06-22 07:24:17'),(6,'admin',2,'2018-01-08 12:40:19','2018-01-08 12:40:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `function_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (2,'get','setting/new','SettingController','2018-02-05 11:39:21','2018-02-05 11:39:21','create'),(3,'post','setting','SettingController','2018-02-05 11:39:21','2018-02-05 11:39:21','store'),(4,'get','dashboard','DashboardController','2018-02-05 11:39:21','2018-07-24 11:47:45','index'),(5,'get','/','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','index'),(6,'get','user_profile','UserController','2018-02-05 11:39:21','2018-02-05 11:39:21','profile'),(7,'post','user_profile/updatepassword','UserController','2018-02-05 11:39:21','2017-11-14 10:29:01','UpdatePassword'),(8,'post','user_profile/updateprofilepic','UserController','2018-02-05 11:39:21','2017-11-14 10:29:08','UpdateProfilePicture'),(9,'post','user_profile/updateuserdata','UserController','2018-02-05 11:39:21','2017-11-14 10:29:19','UpdateNameAndEmail'),(10,'get','setting/{id}/delete','SettingController','2018-02-05 11:39:21','2018-02-05 11:39:22','destroy'),(11,'get','setting/{id}/edit','SettingController','2018-02-05 11:39:21','2018-02-05 11:39:21','edit'),(12,'post','setting/{id}','SettingController','2018-02-05 11:39:21','2018-02-05 11:56:27','update'),(14,'get','static_translation','StaticTranslationController','2018-02-05 11:39:21','2017-11-14 10:29:57','index'),(21,'get','file_manager','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','file_manager'),(22,'get','upload_items','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','multi_upload'),(23,'post','save_items','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','save_uploaded'),(24,'get','upload_resize','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','upload_resize'),(25,'post','save_image','DashboardController','2018-02-05 11:39:21','2018-02-05 11:39:21','save_image'),(26,'post','static_translation/{id}/update','StaticTranslationController','2018-02-05 11:39:21','2017-11-12 10:19:46','update'),(27,'get','static_translation/{id}/delete','StaticTranslationController','2018-02-05 11:39:21','2018-02-05 11:39:21','destroy'),(28,'get','language/{id}/delete','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','destroy'),(29,'post','language/{id}/update','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','update'),(30,'get','roles','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','index'),(31,'get','roles/new','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','create'),(32,'post','roles','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','store'),(33,'get','roles/{id}/delete','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','destroy'),(34,'get','roles/{id}/edit','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','edit'),(35,'post','roles/{id}/update','RoleController','2018-02-05 11:39:21','2018-02-05 11:39:21','update'),(36,'get','language','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','index'),(37,'get','language/create','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','create'),(38,'post','language','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','store'),(39,'get','language/{id}/edit','LanguageController','2018-02-05 11:39:21','2018-02-05 11:39:21','edit'),(40,'get','all_routes','RouteController','2018-02-05 11:39:21','2019-10-13 09:51:33','index'),(41,'post','routes','RouteController','2018-02-05 11:39:21','2018-02-05 11:39:21','store'),(42,'get','routes/{id}/edit','RouteController','2018-02-05 11:39:21','2018-02-05 11:39:21','edit'),(43,'post','routes/{id}/update','RouteController','2018-02-05 11:39:21','2018-01-28 07:25:29','update'),(44,'get','routes/{id}/delete','RouteController','2018-02-05 11:39:21','2018-02-05 11:39:21','destroy'),(45,'get','routes/create','RouteController','2018-02-05 11:39:21','2018-02-05 11:39:21','create'),(57,'get','routes/index_v2','RouteController','2017-11-12 11:45:15','2017-11-12 12:04:53','index_v2'),(58,'get','roles/{id}/view_access','RoleController','2017-11-14 08:56:14','2017-11-15 06:14:14','view_access'),(59,'get','types/index','TypeController','2018-01-28 06:25:37','2018-01-28 06:25:37','index'),(60,'get','types/create','TypeController','2018-01-28 06:25:37','2018-01-28 06:25:37','create'),(61,'post','types','TypeController','2018-01-28 06:25:38','2018-01-28 06:25:38','store'),(62,'get','types/{id}/edit','TypeController','2018-01-28 06:25:38','2018-01-28 06:25:38','edit'),(63,'patch','types/{id}','TypeController','2018-01-28 06:25:38','2018-01-28 06:25:38','update'),(64,'get','types/{id}/delete','TypeController','2018-01-28 06:25:38','2018-01-28 06:25:38','destroy'),(65,'post','sortabledatatable','SettingController','2018-01-28 07:22:00','2018-01-28 07:22:00','updateOrder'),(66,'get','buildroutes','RouteController','2018-01-28 07:23:55','2018-01-28 07:23:55','buildroutes'),(69,'get','delete_all','DashboardController','2018-02-04 10:01:23','2018-02-04 10:01:23','delete_all_index'),(70,'post','delete_all','DashboardController','2018-02-04 10:01:23','2018-02-04 10:01:23','delete_all_store'),(71,'get','upload_resize_v2','DashboardController','2018-02-04 11:02:56','2018-02-04 11:02:56','upload_resize_v2'),(72,'post','sortabledatatable','UserController','2018-02-05 11:39:22','2018-02-05 11:39:22','updateOrder'),(79,'get','setting','SettingController','2018-02-05 12:10:10','2018-02-05 12:10:10','index'),(80,'get','users','UserController','2018-05-31 07:42:21','2018-05-31 07:42:21','index'),(81,'get','users/new','UserController','2018-05-31 07:42:21','2018-05-31 07:42:21','create'),(82,'post','users','UserController','2018-05-31 07:42:21','2018-05-31 07:42:21','store'),(83,'get','users/{id}/edit','UserController','2018-05-31 07:42:21','2018-05-31 07:42:21','edit'),(84,'post','users/{id}/update','UserController','2018-05-31 07:42:21','2018-05-31 07:42:21','update'),(106,'get','country','CountryController','2019-02-10 06:09:36','2019-02-10 06:09:36','index'),(107,'get','country/create','CountryController','2019-02-10 06:09:36','2019-02-10 06:09:36','create'),(108,'post','country','CountryController','2019-02-10 06:09:36','2019-02-10 06:09:36','store'),(109,'get','country/{id}','CountryController','2019-02-10 06:09:36','2019-02-10 06:09:36','show'),(110,'get','country/{id}/edit','CountryController','2019-02-10 06:09:37','2019-02-10 06:09:37','edit'),(111,'patch','country/{id}','CountryController','2019-02-10 06:09:37','2019-02-10 06:10:42','update'),(112,'get','country/{id}/delete','CountryController','2019-02-10 06:09:37','2019-02-10 06:09:37','delete'),(113,'get','operator','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','index'),(114,'get','operator/create','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','create'),(115,'post','operator','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','store'),(116,'get','operator/{id}','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','show'),(117,'get','operator/{id}/edit','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','edit'),(118,'patch','operator/{id}','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','update'),(119,'get','operator/{id}/delete','OperatorController','2019-02-10 06:10:27','2019-02-10 06:10:27','destroy'),(120,'get','category','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','index'),(121,'get','category/create','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','create'),(122,'post','category','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','store'),(123,'get','category/{id}','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','show'),(124,'get','category/{id}/edit','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','edit'),(125,'patch','category/{id}','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','update'),(126,'get','category/{id}/delete','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','destroy'),(127,'get','content_type','ContentTypeController','2019-02-14 11:02:21','2019-02-14 11:02:21','index'),(128,'get','content_type/create','ContentTypeController','2019-02-14 11:02:21','2019-02-14 11:02:21','create'),(129,'post','content_type','ContentTypeController','2019-02-14 11:02:21','2019-02-14 11:02:21','store'),(130,'get','content_type/{id}','ContentTypeController','2019-02-14 11:02:21','2019-02-14 11:02:21','show'),(131,'get','content_type/{id}/edit','ContentTypeController','2019-02-14 11:02:22','2019-02-14 11:02:22','edit'),(132,'patch','content_type/{id}','ContentTypeController','2019-02-14 11:02:22','2019-02-14 11:02:22','update'),(133,'get','content_type/{id}/delete','ContentTypeController','2019-02-14 11:02:22','2019-02-14 11:02:22','destroy'),(134,'get','content','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','index'),(135,'get','content/create','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','create'),(136,'post','content','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','store'),(137,'get','content/{id}','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','show'),(138,'get','content/{id}/edit','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','edit'),(139,'patch','content/{id}','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','update'),(140,'get','content/{id}/delete','ContentController','2019-02-14 11:03:26','2019-02-14 11:03:26','destroy'),(141,'get','post','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','index'),(142,'get','post/create','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','create'),(143,'post','post','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','store'),(144,'get','post/{id}','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','show'),(145,'get','post/{id}/edit','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','edit'),(146,'patch','post/{id}','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','update'),(147,'get','post/{id}/delete','PostController','2019-02-14 11:04:09','2019-02-14 11:04:09','destroy'),(148,'get','sub_category','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','index'),(149,'get','sub_category/create','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','create'),(150,'post','sub_category','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','store'),(151,'get','sub_category/{id}','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','show'),(152,'get','sub_category/{id}/edit','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','edit'),(153,'patch','sub_category/{id}','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','update'),(154,'get','sub_category/{id}/delete','SubCategoryController','2019-03-06 07:00:28','2019-03-06 07:00:28','destroy'),(155,'get','rbt','RbtController','2019-03-14 06:51:14','2019-03-14 06:51:14','index'),(156,'get','rbt/create','RbtController','2019-03-14 06:51:14','2019-03-14 06:51:14','create'),(157,'post','rbt','RbtController','2019-03-14 06:51:15','2019-03-14 06:51:15','store'),(158,'get','rbt/{id}','RbtController','2019-03-14 06:51:15','2019-03-14 06:51:15','show'),(159,'get','rbt/{id}/edit','RbtController','2019-03-14 06:51:15','2019-03-14 06:51:15','edit'),(160,'patch','rbt/{id}','RbtController','2019-03-14 06:51:15','2019-03-14 06:51:15','update'),(161,'get','rbt/{id}/delete','RbtController','2019-03-14 06:51:15','2019-03-14 06:51:15','destroy'),(162,'get','users/{id}/delete','UserController','2019-10-13 09:51:03','2019-10-13 09:51:03','destroy'),(163,'get','migrate_tables','DashboardController','2019-10-13 10:09:15','2019-10-13 11:02:42','migrate_tables'),(164,'get','provider','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','index'),(165,'get','provider/create','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','create'),(166,'post','provider','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','store'),(167,'get','provider/{id}','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','show'),(168,'get','provider/{id}/edit','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','edit'),(169,'patch','provider/{id}','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','update'),(170,'get','provider/{id}/delete','ProviderController','2019-02-14 11:01:13','2019-02-14 11:01:13','destroy'),(172,'get','all_routes/{id}/edit','RouteController','2019-02-14 11:01:13','2019-02-14 11:01:13','edit'),(173,'get','all_routes/{id}/delete','RouteController','2019-02-14 11:01:13','2019-02-14 11:01:13','destroy'),(174,'post','all_routes/{id}/update','RouteController','2019-02-14 11:01:13','2019-02-14 11:01:13','update'),(175,'get','content/allData','ContentController','2019-02-14 11:01:13','2019-02-14 11:01:13','allData'),(176,'get','category/allData','CategoryController','2019-02-14 11:01:13','2019-02-14 11:01:13','allData'),(177,'get','post/allData','PostController','2019-02-14 11:01:13','2019-02-14 11:01:13','allData'),(178,'get','rbt/allData','RbtController','2019-02-14 11:01:13','2019-02-14 11:01:13','allData');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scaffoldinterfaces`
--

DROP TABLE IF EXISTS `scaffoldinterfaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tablename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scaffoldinterfaces`
--

LOCK TABLES `scaffoldinterfaces` WRITE;
/*!40000 ALTER TABLE `scaffoldinterfaces` DISABLE KEYS */;
/*!40000 ALTER TABLE `scaffoldinterfaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_type_id_foreign` (`type_id`),
  CONSTRAINT `settings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (25,'uploadAllow','video','2018-02-04 10:04:09','2019-02-11 13:09:42',6,0),(27,'enable_testing','0','2019-02-11 13:14:30','2019-02-11 13:15:45',7,0),(28,'content_type_flag','0','2019-03-07 08:50:04','2019-03-14 06:54:06',7,0);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_bodies`
--

DROP TABLE IF EXISTS `static_bodies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_bodies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `static_translation_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `static_bodies_language_id_foreign` (`language_id`),
  KEY `static_bodies_static_translation_id_foreign` (`static_translation_id`),
  CONSTRAINT `static_bodies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `static_bodies_static_translation_id_foreign` FOREIGN KEY (`static_translation_id`) REFERENCES `static_translations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_bodies`
--

LOCK TABLES `static_bodies` WRITE;
/*!40000 ALTER TABLE `static_bodies` DISABLE KEYS */;
/*!40000 ALTER TABLE `static_bodies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_translations`
--

DROP TABLE IF EXISTS `static_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_translations`
--

LOCK TABLES `static_translations` WRITE;
/*!40000 ALTER TABLE `static_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `static_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tans_bodies`
--

DROP TABLE IF EXISTS `tans_bodies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tans_bodies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `translatable_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tans_bodies_language_id_foreign` (`language_id`),
  KEY `tans_bodies_translatable_id_foreign` (`translatable_id`),
  CONSTRAINT `tans_bodies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tans_bodies_translatable_id_foreign` FOREIGN KEY (`translatable_id`) REFERENCES `translatables` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tans_bodies`
--

LOCK TABLES `tans_bodies` WRITE;
/*!40000 ALTER TABLE `tans_bodies` DISABLE KEYS */;
INSERT INTO `tans_bodies` VALUES (1,1,1,'asas','2021-06-21 09:53:43','2021-06-22 09:35:14'),(5,1,5,'دراما sdff','2021-06-22 11:57:18','2021-06-22 12:00:02'),(15,1,15,'sdsd sdsd','2021-06-23 06:30:09','2021-06-23 08:43:18'),(16,1,16,'dsdf','2021-06-23 06:30:45','2021-06-23 08:57:59'),(17,1,17,'دراما','2021-06-23 06:31:18','2021-06-23 09:05:53'),(22,1,22,'<p>omar</p>','2021-06-23 07:50:16','2021-06-23 09:22:24'),(24,1,24,'<p>asdasd</p>','2021-06-23 08:31:21','2021-06-23 08:31:21'),(25,1,25,'<p>sdfsdf</p>','2021-06-23 08:57:59','2021-06-23 08:57:59');
/*!40000 ALTER TABLE `tans_bodies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translatables`
--

DROP TABLE IF EXISTS `translatables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translatables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translatables`
--

LOCK TABLES `translatables` WRITE;
/*!40000 ALTER TABLE `translatables` DISABLE KEYS */;
INSERT INTO `translatables` VALUES (1,'categories','1','title','2021-06-21 09:53:42','2021-06-21 09:53:42'),(5,'providers','3','title','2021-06-22 11:57:18','2021-06-22 11:57:18'),(15,'contents','6','title','2021-06-23 06:30:09','2021-06-23 06:30:09'),(16,'contents','7','title','2021-06-23 06:30:45','2021-06-23 06:30:45'),(17,'contents','8','title','2021-06-23 06:31:18','2021-06-23 06:31:18'),(22,'contents','8','path','2021-06-23 07:50:16','2021-06-23 07:50:16'),(24,'contents','6','path','2021-06-23 08:31:21','2021-06-23 08:31:21'),(25,'contents','7','path','2021-06-23 08:57:59','2021-06-23 08:57:59');
/*!40000 ALTER TABLE `translatables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Advanced Editor','2018-01-28 06:30:05','2018-01-28 06:30:05'),(2,'Normal Editor','2018-01-28 06:30:14','2018-01-28 06:30:14'),(3,'Image','2018-01-28 06:30:29','2018-01-28 06:30:29'),(4,'Video','2018-01-28 06:30:39','2018-01-28 06:30:39'),(5,'Audio','2018-01-28 06:30:47','2018-01-28 06:30:47'),(6,'File Manager Uploads Extensions','2018-01-28 06:30:57','2018-01-28 06:30:57'),(7,'selector','2019-02-11 11:18:52','2019-02-11 11:18:52');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_permissions`
--

DROP TABLE IF EXISTS `user_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_permissions`
--

LOCK TABLES `user_has_permissions` WRITE;
/*!40000 ALTER TABLE `user_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_roles`
--

DROP TABLE IF EXISTS `user_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_roles`
--

LOCK TABLES `user_has_roles` WRITE;
/*!40000 ALTER TABLE `user_has_roles` DISABLE KEYS */;
INSERT INTO `user_has_roles` VALUES (1,1),(1,3);
/*!40000 ALTER TABLE `user_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super admin','super_admin@ivas.com','$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2','','01234567890','rZuEmD6bPlK8lMdaoIC1jRvzlLs17XOy5r6MTsGWA1ggFfMGCVaw7bYG3hBQ','2017-11-09 04:13:14','2018-11-26 06:11:50'),(3,'Omar Tarekfg','omarfgt8703@gmail.com','$2y$10$UofcXjMdOKRcDZjEAzpP7Oj5P6xEZglCSt0lKzZJYi42ria4Y3Trm',NULL,NULL,NULL,'2021-06-22 06:05:41','2021-06-22 06:05:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-23 17:10:30
