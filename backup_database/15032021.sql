-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: yachaywasi_db_2021
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `competencies`
--

DROP TABLE IF EXISTS `competencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `competencies_name_unique` (`name`),
  KEY `competencies_course_id_foreign` (`course_id`),
  CONSTRAINT `competencies_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competencies`
--

LOCK TABLES `competencies` WRITE;
/*!40000 ALTER TABLE `competencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `competencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abreviatura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_name_unique` (`name`),
  KEY `courses_user_id_foreign` (`user_id`),
  CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Geometría',NULL,'geom','#000000','#000000',2,'2021-03-14 10:55:19','2021-03-14 11:58:16','1615737319_geometria.png'),(2,'Algebra',NULL,'alg','#000000','#000000',2,'2021-03-14 10:57:56','2021-03-14 10:57:56','1615737476_algebra'),(3,'Comunicacion',NULL,'com','#000000','#000000',2,'2021-03-14 10:58:29','2021-03-14 10:58:29','1615737509_1595531435_comunicacion.png'),(4,'Razonamiento Verbal',NULL,'razver','#000000','#000000',2,'2021-03-14 11:30:21','2021-03-14 11:30:21','1615739421_razonamiento-verbal'),(5,'Personal Social',NULL,'per','#000000','#000000',2,'2021-03-14 11:30:43','2021-03-14 11:30:43','1615739443_1595135712_personal.png'),(6,'Matematica',NULL,'mat','#000000','#000000',2,'2021-03-14 11:31:35','2021-03-14 11:31:35','1615739495_1598721604_matematica.png'),(7,'Ciencia y Tecnología',NULL,'cyt','#000000','#000000',2,'2021-03-14 11:32:06','2021-03-14 11:32:06','1615739526_1595135787_ciencia.png'),(8,'Taekwondo',NULL,'TKD','#000000','#000000',2,'2021-03-14 11:33:17','2021-03-14 11:33:17','1615739597_1598824234_taekwondo.png'),(9,'Razonamiento Matemático',NULL,'razmat','#000000','#000000',2,'2021-03-14 11:37:10','2021-03-14 11:37:10','1615739830_razonamiento-matemático'),(10,'Ingles',NULL,'ing','#000000','#000000',2,'2021-03-14 11:38:34','2021-03-14 11:38:34','1615739914_1598822328_ingles.png'),(11,'Música',NULL,'mus','#000000','#000000',2,'2021-03-14 11:40:39','2021-03-14 11:40:39','1615740039_musica'),(12,'Religión',NULL,'rel','#000000','#000000',2,'2021-03-14 11:40:58','2021-03-14 11:40:58','1615740058_1595531689_religion');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `days` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,'Lunes',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(2,'Martes',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(3,'Miércoles',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(4,'Jueves',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(5,'Viernes',1,'2021-03-14 09:14:25','2021-03-14 09:14:25');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree_level_courses`
--

DROP TABLE IF EXISTS `degree_level_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degree_level_courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `degree_level_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `degree_level_courses_degree_level_id_foreign` (`degree_level_id`),
  KEY `degree_level_courses_course_id_foreign` (`course_id`),
  CONSTRAINT `degree_level_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `degree_level_courses_degree_level_id_foreign` FOREIGN KEY (`degree_level_id`) REFERENCES `degree_level_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_level_courses`
--

LOCK TABLES `degree_level_courses` WRITE;
/*!40000 ALTER TABLE `degree_level_courses` DISABLE KEYS */;
INSERT INTO `degree_level_courses` VALUES (1,2,6,'2021-03-14 20:41:15','2021-03-14 20:41:15'),(2,3,6,'2021-03-14 20:41:15','2021-03-14 20:41:15'),(3,4,6,'2021-03-14 20:41:15','2021-03-14 20:41:15'),(4,5,3,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(5,5,4,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(6,5,5,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(7,5,6,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(8,5,7,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(9,5,8,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(10,5,9,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(11,5,10,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(12,5,11,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(13,5,12,'2021-03-14 20:41:31','2021-03-14 20:41:31'),(14,6,3,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(15,6,4,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(16,6,5,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(17,6,6,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(18,6,7,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(19,6,8,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(20,6,9,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(21,6,10,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(22,6,11,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(23,6,12,'2021-03-14 20:41:44','2021-03-14 20:41:44'),(24,7,3,'2021-03-14 20:54:04','2021-03-14 20:54:04'),(25,7,6,'2021-03-14 20:54:04','2021-03-14 20:54:04'),(26,96,3,'2021-03-14 20:54:04','2021-03-14 20:54:04'),(27,8,7,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(28,9,5,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(29,9,7,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(30,97,3,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(31,97,5,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(32,97,7,'2021-03-14 20:56:40','2021-03-14 20:56:40'),(33,10,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(34,11,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(35,12,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(36,13,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(37,14,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(38,15,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(39,16,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(40,17,8,'2021-03-14 20:57:21','2021-03-14 20:57:21'),(41,15,3,'2021-03-14 20:57:44','2021-03-14 20:57:44'),(42,20,3,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(43,20,5,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(44,20,7,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(45,21,3,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(46,21,5,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(47,21,7,'2021-03-14 20:58:32','2021-03-14 20:58:32'),(48,23,5,'2021-03-14 21:07:44','2021-03-14 21:07:44'),(49,23,12,'2021-03-14 21:07:44','2021-03-14 21:07:44'),(50,24,6,'2021-03-14 21:07:44','2021-03-14 21:07:44'),(51,98,6,'2021-03-14 21:07:44','2021-03-14 21:07:44'),(52,26,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(53,27,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(54,28,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(55,29,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(56,30,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(57,31,10,'2021-03-14 21:08:12','2021-03-14 21:08:12'),(58,32,11,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(59,33,11,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(60,35,12,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(61,36,12,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(62,37,5,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(63,37,7,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(64,37,12,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(65,38,12,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(66,39,12,'2021-03-14 21:08:39','2021-03-14 21:08:39'),(67,34,11,'2021-03-14 21:09:37','2021-03-14 21:09:37'),(68,35,11,'2021-03-14 21:09:37','2021-03-14 21:09:37'),(69,36,11,'2021-03-14 21:09:37','2021-03-14 21:09:37'),(70,37,11,'2021-03-14 21:09:37','2021-03-14 21:09:37'),(71,38,11,'2021-03-14 21:09:37','2021-03-14 21:09:37'),(72,39,11,'2021-03-14 21:09:37','2021-03-14 21:09:37');
/*!40000 ALTER TABLE `degree_level_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree_level_users`
--

DROP TABLE IF EXISTS `degree_level_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degree_level_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint unsigned NOT NULL,
  `degree_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_degree_level_user_level_id_foreign` (`level_id`),
  KEY `course_degree_level_user_degree_id_foreign` (`degree_id`),
  KEY `course_degree_level_user_user_id_foreign` (`user_id`),
  CONSTRAINT `course_degree_level_user_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  CONSTRAINT `course_degree_level_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `course_degree_level_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_level_users`
--

LOCK TABLES `degree_level_users` WRITE;
/*!40000 ALTER TABLE `degree_level_users` DISABLE KEYS */;
INSERT INTO `degree_level_users` VALUES (1,2,1,3,'2021-03-14 09:14:57','2021-03-14 09:14:57'),(2,2,1,3,'2021-03-14 09:14:57','2021-03-14 09:14:57'),(3,2,1,3,'2021-03-14 09:14:57','2021-03-14 09:14:57'),(4,2,1,3,'2021-03-14 09:14:57','2021-03-14 09:14:57'),(5,1,1,4,'2021-03-14 09:15:24','2021-03-14 09:15:24'),(6,1,1,5,'2021-03-14 09:15:56','2021-03-14 09:15:56'),(7,2,1,6,'2021-03-14 09:27:01','2021-03-14 09:27:01'),(8,2,1,7,'2021-03-14 09:27:34','2021-03-14 09:27:34'),(9,2,1,7,'2021-03-14 09:27:34','2021-03-14 09:27:34'),(10,1,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(11,1,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(12,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(13,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(14,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(15,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(16,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(17,2,1,8,'2021-03-14 09:28:06','2021-03-14 09:28:06'),(18,2,1,9,'2021-03-14 09:28:43','2021-03-14 09:28:43'),(19,2,1,9,'2021-03-14 09:28:43','2021-03-14 09:28:43'),(20,2,1,9,'2021-03-14 09:28:43','2021-03-14 09:28:43'),(21,2,1,9,'2021-03-14 09:28:43','2021-03-14 09:28:43'),(23,2,1,10,'2021-03-14 09:29:14','2021-03-14 09:29:14'),(24,2,1,10,'2021-03-14 09:29:14','2021-03-14 09:29:14'),(26,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(27,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(28,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(29,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(30,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(31,2,1,11,'2021-03-14 09:30:30','2021-03-14 09:30:30'),(32,1,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(33,1,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(34,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(35,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(36,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(37,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(38,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(39,2,1,12,'2021-03-14 09:31:34','2021-03-14 09:31:34'),(40,1,1,13,'2021-03-14 09:41:25','2021-03-14 09:41:25'),(41,1,1,14,'2021-03-14 09:41:51','2021-03-14 09:41:51'),(42,1,1,15,'2021-03-14 09:42:12','2021-03-14 09:42:12'),(43,1,1,16,'2021-03-14 09:42:33','2021-03-14 09:42:33'),(44,1,1,17,'2021-03-14 09:42:52','2021-03-14 09:42:52'),(45,1,1,18,'2021-03-14 09:43:11','2021-03-14 09:43:11'),(46,1,1,19,'2021-03-14 09:43:36','2021-03-14 09:43:36'),(47,1,1,20,'2021-03-14 09:43:55','2021-03-14 09:43:55'),(48,1,1,21,'2021-03-14 09:44:18','2021-03-14 09:44:18'),(49,1,1,22,'2021-03-14 09:44:39','2021-03-14 09:44:39'),(50,1,1,23,'2021-03-14 09:45:04','2021-03-14 09:45:04'),(51,1,1,24,'2021-03-14 09:45:22','2021-03-14 09:45:22'),(52,1,1,25,'2021-03-14 09:45:55','2021-03-14 09:45:55'),(53,1,1,26,'2021-03-14 09:46:15','2021-03-14 09:46:15'),(54,1,1,27,'2021-03-14 09:46:52','2021-03-14 09:46:52'),(55,1,1,28,'2021-03-14 09:47:10','2021-03-14 09:47:10'),(56,1,1,29,'2021-03-14 09:47:27','2021-03-14 09:47:27'),(57,1,1,30,'2021-03-14 09:47:46','2021-03-14 09:47:46'),(58,1,1,31,'2021-03-14 09:48:03','2021-03-14 09:48:03'),(59,2,1,33,'2021-03-14 10:22:32','2021-03-14 10:22:32'),(60,2,1,34,'2021-03-14 10:22:56','2021-03-14 10:22:56'),(61,2,1,35,'2021-03-14 10:23:23','2021-03-14 10:23:23'),(62,2,1,36,'2021-03-14 10:23:47','2021-03-14 10:23:47'),(63,2,1,37,'2021-03-14 10:24:08','2021-03-14 10:24:08'),(64,2,1,38,'2021-03-14 10:25:46','2021-03-14 10:25:46'),(65,2,1,39,'2021-03-14 10:26:30','2021-03-14 10:26:30'),(66,2,1,40,'2021-03-14 10:27:39','2021-03-14 10:27:39'),(67,2,1,41,'2021-03-14 10:27:57','2021-03-14 10:27:57'),(68,2,1,42,'2021-03-14 10:28:22','2021-03-14 10:28:22'),(69,2,1,43,'2021-03-14 10:28:38','2021-03-14 10:28:38'),(70,2,1,44,'2021-03-14 10:32:27','2021-03-14 10:32:27'),(71,2,1,45,'2021-03-14 10:32:44','2021-03-14 10:32:44'),(72,2,1,46,'2021-03-14 10:33:04','2021-03-14 10:33:04'),(73,2,1,47,'2021-03-14 10:33:27','2021-03-14 10:33:27'),(74,2,1,48,'2021-03-14 10:33:47','2021-03-14 10:33:47'),(75,2,1,49,'2021-03-14 10:34:15','2021-03-14 10:34:15'),(76,2,1,50,'2021-03-14 10:35:06','2021-03-14 10:35:06'),(77,2,1,52,'2021-03-14 10:35:48','2021-03-14 10:35:48'),(78,2,1,53,'2021-03-14 10:36:04','2021-03-14 10:36:04'),(79,2,1,54,'2021-03-14 10:36:21','2021-03-14 10:36:21'),(80,2,1,55,'2021-03-14 10:36:51','2021-03-14 10:36:51'),(81,2,1,56,'2021-03-14 10:37:41','2021-03-14 10:37:41'),(82,2,1,57,'2021-03-14 10:38:01','2021-03-14 10:38:01'),(83,2,1,58,'2021-03-14 10:38:21','2021-03-14 10:38:21'),(84,2,1,59,'2021-03-14 10:38:36','2021-03-14 10:38:36'),(85,2,1,60,'2021-03-14 10:38:53','2021-03-14 10:38:53'),(86,2,1,61,'2021-03-14 10:39:17','2021-03-14 10:39:17'),(87,2,1,62,'2021-03-14 10:40:03','2021-03-14 10:40:03'),(88,2,1,63,'2021-03-14 10:40:22','2021-03-14 10:40:22'),(89,2,1,64,'2021-03-14 10:40:43','2021-03-14 10:40:43'),(90,2,1,65,'2021-03-14 10:41:06','2021-03-14 10:41:06'),(91,2,1,66,'2021-03-14 10:42:48','2021-03-14 10:42:48'),(92,2,1,67,'2021-03-14 10:43:06','2021-03-14 10:43:06'),(93,2,1,68,'2021-03-14 10:43:21','2021-03-14 10:43:21'),(94,2,1,69,'2021-03-14 10:43:42','2021-03-14 10:43:42'),(96,1,1,6,NULL,NULL),(97,1,1,7,NULL,NULL),(98,2,1,10,NULL,NULL),(99,2,1,70,'2021-03-15 00:27:13','2021-03-15 00:27:13'),(100,1,1,71,'2021-03-15 08:45:23','2021-03-15 08:45:23');
/*!40000 ALTER TABLE `degree_level_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degrees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `degrees_level_id_foreign` (`level_id`),
  CONSTRAINT `degrees_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degrees`
--

LOCK TABLES `degrees` WRITE;
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT INTO `degrees` VALUES (1,'4 años',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',1),(2,'5 años',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',1),(3,'1er Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2),(4,'2do Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2),(5,'3er Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2),(6,'4to Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2),(7,'5to Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2),(8,'6to Grado',1,'2021-03-14 09:14:25','2021-03-14 09:14:25',2);
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (1,'8:00 - 8:40',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(2,'8:40 - 9:20',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(3,'9:20 - 10:00',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(4,'10:00 - 10:40',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(5,'10:40 - 11:20',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(6,'11:20 - 12:00',1,'2021-03-14 09:14:25','2021-03-14 09:14:25');
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Inicial',1,'2021-03-14 09:14:25','2021-03-14 09:14:25'),(2,'Primaria',1,'2021-03-14 09:14:25','2021-03-14 09:14:25');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `messages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `docente_id` bigint unsigned NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_subject_id_foreign` (`subject_id`),
  KEY `messages_user_id_foreign` (`user_id`),
  KEY `messages_docente_id_foreign` (`docente_id`),
  CONSTRAINT `messages_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_06_27_134806_add_avatar_to_user_table',1),(5,'2020_06_28_200545_add_slug_to_users',1),(6,'2020_06_29_040253_create_roles_table',1),(7,'2020_06_29_040613_create_role_user_table',1),(8,'2020_07_01_220501_add_parent_id_to_users',1),(9,'2020_07_02_023628_create_courses_table',1),(10,'2020_07_02_235753_create_competencies_table',1),(11,'2020_07_04_011201_add_images_to_courses_table',1),(12,'2020_07_05_011929_add_status_to_users_table',1),(13,'2020_07_14_200939_add_school_to_users',1),(14,'2020_07_14_201239_add_phone_to_users',1),(15,'2020_07_15_184627_add_classroom_to_users_table',1),(16,'2020_07_17_174304_create_levels_table',1),(17,'2020_07_17_174336_create_degrees_table',1),(18,'2020_07_20_040305_add_course_id_to_competencies_table',1),(19,'2020_07_20_212351_add_level_id_to_degrees_table',1),(20,'2020_07_22_044418_create_course_degree_level_user_table',1),(21,'2020_08_23_213104_remove_course_id_from_course_degree_level_user_table',1),(22,'2020_08_23_213914_create_degree_level_courses_table',1),(23,'2020_08_23_225755_create_subjects_table',1),(24,'2020_08_25_194935_rename_course_degree_level_user_to_degree_level_users_table',1),(25,'2020_08_29_194926_add_user_id_to_subjects',1),(26,'2020_09_04_010804_add_school_id_to_subjects',1),(27,'2020_09_06_192711_create_messages_table',1),(28,'2020_09_06_200628_add_status_to_subjects_table',1),(29,'2020_09_13_130701_add_homework_to_subjects',1),(30,'2020_09_13_130744_add_url_pdf_to_subjects',1),(31,'2020_09_13_130816_add_url_drive_to_subjects',1),(32,'2020_09_13_164515_add_fecha_vencimiento_to_subjects',1),(33,'2020_09_13_180426_add_zoom_to_subjects',1),(34,'2021_03_06_205059_create_subject_views_table',1),(35,'2021_03_11_032503_create_hours_table',1),(36,'2021_03_11_032743_create_days_table',1),(37,'2021_03_11_063041_create_user_hours_assign_table',1),(38,'2021_03_14_185855_create_subject_works_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,3,NULL,NULL),(5,5,3,NULL,NULL),(6,6,3,NULL,NULL),(7,7,3,NULL,NULL),(8,8,3,NULL,NULL),(9,9,3,NULL,NULL),(10,10,3,NULL,NULL),(11,11,3,NULL,NULL),(12,12,3,NULL,NULL),(13,13,4,NULL,NULL),(14,14,4,NULL,NULL),(15,15,4,NULL,NULL),(16,16,4,NULL,NULL),(17,17,4,NULL,NULL),(18,18,4,NULL,NULL),(19,19,4,NULL,NULL),(20,20,4,NULL,NULL),(21,21,4,NULL,NULL),(22,22,4,NULL,NULL),(23,23,4,NULL,NULL),(24,24,4,NULL,NULL),(25,25,4,NULL,NULL),(26,26,4,NULL,NULL),(27,27,4,NULL,NULL),(28,28,4,NULL,NULL),(29,29,4,NULL,NULL),(30,30,4,NULL,NULL),(31,31,4,NULL,NULL),(32,33,4,NULL,NULL),(33,34,4,NULL,NULL),(34,35,4,NULL,NULL),(35,36,4,NULL,NULL),(36,37,4,NULL,NULL),(37,38,4,NULL,NULL),(38,39,4,NULL,NULL),(39,40,4,NULL,NULL),(40,41,4,NULL,NULL),(41,42,4,NULL,NULL),(42,43,4,NULL,NULL),(43,44,4,NULL,NULL),(44,45,4,NULL,NULL),(45,46,4,NULL,NULL),(46,47,4,NULL,NULL),(47,48,4,NULL,NULL),(48,49,4,NULL,NULL),(49,50,4,NULL,NULL),(50,52,4,NULL,NULL),(51,53,4,NULL,NULL),(52,54,4,NULL,NULL),(53,55,4,NULL,NULL),(54,56,4,NULL,NULL),(55,57,4,NULL,NULL),(56,58,4,NULL,NULL),(57,59,4,NULL,NULL),(58,60,4,NULL,NULL),(59,61,4,NULL,NULL),(60,62,4,NULL,NULL),(61,63,4,NULL,NULL),(62,64,4,NULL,NULL),(63,65,4,NULL,NULL),(64,66,4,NULL,NULL),(65,67,4,NULL,NULL),(66,68,4,NULL,NULL),(67,69,4,NULL,NULL),(68,70,4,NULL,NULL),(69,71,4,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'superadmin','Administrador principal de todo el sistema','2021-03-14 09:14:25','2021-03-14 09:14:25'),(2,'admin','Director Administrador del sistema del colegio','2021-03-14 09:14:25','2021-03-14 09:14:25'),(3,'editor','Docente editor de temas','2021-03-14 09:14:25','2021-03-14 09:14:25'),(4,'lector','Estudiante que puede ver los temas y mensajear con los docentes','2021-03-14 09:14:25','2021-03-14 09:14:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_views`
--

DROP TABLE IF EXISTS `subject_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_views` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `at_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_views_subject_id_foreign` (`subject_id`),
  KEY `subject_views_user_id_foreign` (`user_id`),
  CONSTRAINT `subject_views_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `subject_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_views`
--

LOCK TABLES `subject_views` WRITE;
/*!40000 ALTER TABLE `subject_views` DISABLE KEYS */;
INSERT INTO `subject_views` VALUES (1,4,62,'P',16,'2021-03-15 08:08:32','2021-03-15 08:29:48'),(2,4,64,'P',10,'2021-03-15 08:09:05','2021-03-15 11:19:15'),(3,5,68,'P',8,'2021-03-15 08:10:40','2021-03-15 11:23:30'),(4,4,65,'P',8,'2021-03-15 08:14:21','2021-03-15 08:28:00'),(5,5,66,'P',6,'2021-03-15 08:30:43','2021-03-15 11:15:49'),(6,5,67,'P',9,'2021-03-15 08:31:15','2021-03-15 11:30:23'),(7,7,69,'P',3,'2021-03-15 09:30:10','2021-03-15 11:25:47'),(8,8,36,'P',2,'2021-03-15 09:35:33','2021-03-15 10:31:05'),(9,8,37,'P',2,'2021-03-15 09:39:45','2021-03-15 10:00:35'),(10,8,41,'P',6,'2021-03-15 09:40:15','2021-03-15 11:16:21'),(11,8,39,'P',1,'2021-03-15 09:41:44','2021-03-15 09:41:44'),(12,8,38,'P',1,'2021-03-15 09:49:07','2021-03-15 09:49:07'),(13,8,33,'P',1,'2021-03-15 09:53:49','2021-03-15 09:53:49'),(14,8,35,'P',2,'2021-03-15 09:54:18','2021-03-15 10:32:20'),(15,8,40,'P',1,'2021-03-15 09:54:51','2021-03-15 09:54:51');
/*!40000 ALTER TABLE `subject_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_works`
--

DROP TABLE IF EXISTS `subject_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `subject_id` bigint unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_works_user_id_foreign` (`user_id`),
  KEY `subject_works_subject_id_foreign` (`subject_id`),
  CONSTRAINT `subject_works_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_works`
--

LOCK TABLES `subject_works` WRITE;
/*!40000 ALTER TABLE `subject_works` DISABLE KEYS */;
INSERT INTO `subject_works` VALUES (1,68,7,'El hombre sobre la tierra','Tarea de fabricio jose','',0,'2021-03-15 13:37:33','2021-03-15 13:37:33');
/*!40000 ALTER TABLE `subject_works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_course_id` bigint unsigned NOT NULL,
  `bimester` int NOT NULL,
  `unit` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `link_youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_drive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_drive_second` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `homework` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlpdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urldrive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `zoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_level_course_id_foreign` (`level_course_id`),
  CONSTRAINT `subjects_level_course_id_foreign` FOREIGN KEY (`level_course_id`) REFERENCES `degree_level_courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,14,1,1,'Cuento plan lector',1,'https://youtu.be/rb_r2XtsV3c',NULL,NULL,'2021-03-15','2021-03-14 22:23:31','2021-03-14 22:23:31',5,2,1,NULL,NULL,NULL,NULL,NULL),(2,14,1,1,'Yo me llamo',2,'https://youtu.be/FnQ0V2v0NlU',NULL,NULL,'2021-03-15','2021-03-14 22:24:23','2021-03-14 22:24:23',5,2,1,NULL,NULL,NULL,NULL,NULL),(3,23,1,1,'Padre nuestro',1,'https://youtu.be/bZ4FQZ0h_zA',NULL,NULL,'2021-03-15','2021-03-14 22:27:14','2021-03-14 22:27:14',5,2,1,NULL,NULL,NULL,NULL,NULL),(4,43,1,1,'Los Primeros Pobladores I',2,'https://www.youtube.com/watch?v=Bf173uEHt5o',NULL,NULL,'2021-03-15','2021-03-15 04:55:27','2021-03-15 04:55:27',9,2,1,NULL,NULL,NULL,NULL,NULL),(5,57,1,1,'Classroom Language',2,NULL,NULL,NULL,'2021-03-15','2021-03-15 08:04:52','2021-03-15 08:04:52',11,2,1,NULL,'https://drive.google.com/file/d/1lPjWJhPu2azKdIERxUhs9pCWx3RG03Fe/view?usp=sharing',NULL,NULL,NULL),(6,54,1,1,'Classroom Language',2,NULL,NULL,NULL,'2021-03-15','2021-03-15 08:07:16','2021-03-15 08:07:16',11,2,1,NULL,'https://drive.google.com/file/d/1-LX5QebOPFyJ-yhzuyhwaVLlXLCDJJpV/view?usp=sharing',NULL,NULL,NULL),(7,46,1,1,'¿Cómo aparece el hombre sobre la tierra?',2,'https://www.youtube.com/watch?v=iabwUnwWcbk',NULL,NULL,'2021-03-15','2021-03-15 08:09:14','2021-03-15 08:09:14',9,2,1,NULL,NULL,NULL,NULL,NULL),(8,52,1,1,'Classroom Language',2,'https://www.youtube.com/watch?v=b1Lot2v25o4',NULL,NULL,'2021-03-15','2021-03-15 09:35:10','2021-03-15 09:35:10',11,2,1,NULL,'https://drive.google.com/file/d/10Vafi1V2x7u2EkkJzwIh5CPaD9QT4KQv/view?usp=sharing',NULL,NULL,NULL),(9,13,1,1,'APRENDIENDO LA ORACION DEL PADRE NUESTRO',1,'https://www.youtube.com/watch?v=E25Y2KzikG4',NULL,NULL,'2021-03-15','2021-03-15 12:34:58','2021-03-15 12:34:58',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/5953106226?pwd=WXFocjVLNGxXWmlTaEYrSUJLcjdXUT09'),(10,6,1,1,'DERECHO A UN NOMBRE: ESCRIBO',1,'https://www.youtube.com/watch?v=PMn2XKDad2M',NULL,NULL,'2021-03-15','2021-03-15 12:38:52','2021-03-15 12:38:52',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/5953106226?pwd=WXFocjVLNGxXWmlTaEYrSUJLcjdXUT09'),(11,7,1,1,'RECORDAMOS FIGURAS Y COLORES',1,'https://www.youtube.com/watch?v=Xy7GRBldcxI',NULL,NULL,'2021-03-15','2021-03-15 12:45:18','2021-03-15 12:45:18',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/5953106226?pwd=WXFocjVLNGxXWmlTaEYrSUJLcjdXUT09');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_hours_assign`
--

DROP TABLE IF EXISTS `user_hours_assign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_hours_assign` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `level_id` bigint unsigned NOT NULL,
  `degree_id` bigint unsigned NOT NULL,
  `day_id` bigint unsigned NOT NULL,
  `hour_id` bigint unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_hours_assign_user_id_foreign` (`user_id`),
  KEY `user_hours_assign_course_id_foreign` (`course_id`),
  KEY `user_hours_assign_level_id_foreign` (`level_id`),
  KEY `user_hours_assign_degree_id_foreign` (`degree_id`),
  KEY `user_hours_assign_day_id_foreign` (`day_id`),
  KEY `user_hours_assign_hour_id_foreign` (`hour_id`),
  CONSTRAINT `user_hours_assign_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `user_hours_assign_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  CONSTRAINT `user_hours_assign_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  CONSTRAINT `user_hours_assign_hour_id_foreign` FOREIGN KEY (`hour_id`) REFERENCES `hours` (`id`),
  CONSTRAINT `user_hours_assign_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `user_hours_assign_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_hours_assign`
--

LOCK TABLES `user_hours_assign` WRITE;
/*!40000 ALTER TABLE `user_hours_assign` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_hours_assign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_zoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_zoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clave_zoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `status` int DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_slug_unique` (`slug`),
  KEY `users_parent_id_foreign` (`parent_id`),
  CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Julio Izquierdo Mejia','julio.izquierdo.mejia@gmail.com',NULL,'$2y$10$Lfs2zfs9t/hUm6ExMAIhce3CoaTcb8LUeTHtyhwq6.Zsz0DrFYmje',NULL,NULL,NULL,NULL,'2021-03-14 09:14:25','2021-03-14 09:14:25',NULL,NULL,NULL,1,NULL,NULL,NULL),(2,NULL,'Colegio Lev S. Vigotsky','colegio.iep.levsvygotsky@gmail.com',NULL,'$2y$10$y9dwGVYy0RBWgOZH4RvMBOXi7zr5/2yIxgfeGZx4zW.iAV.IrmjIW',NULL,NULL,NULL,NULL,'2021-03-14 09:14:25','2021-03-14 09:14:25',NULL,'vigotsky',1,1,'Lev S. Vigotsky','946 350 910',NULL),(3,'Miss','Camela Sánchez','Carmela.vyg@gmail.com',NULL,'$2y$10$l.bRAm8sHPdFaBIpjrcbN.t36W1Md5tdJ9DSYYm3xdTC5x8dK6FD.',NULL,NULL,NULL,NULL,'2021-03-14 09:14:57','2021-03-14 09:14:57',NULL,NULL,2,1,NULL,NULL,NULL),(4,'Miss','Alejandra Cruz','Alejandra.vyg@gmail.com',NULL,'$2y$10$YHp61CyUZPjWAxP6FtK/Ie.YGa3zuuDS2NfasM7Iaon/HZxkyIuuu',NULL,NULL,NULL,NULL,'2021-03-14 09:15:24','2021-03-14 09:15:24',NULL,NULL,2,1,NULL,NULL,NULL),(5,'Miss','Marilyn Silva','Marilyn.vyg@gmail.com',NULL,'$2y$10$eeor1yxeOajioZ5t2M7BC.gnJ94FRo1Iu8otcDIhw/lzfAjo9HO8W',NULL,NULL,NULL,NULL,'2021-03-14 09:15:56','2021-03-14 09:15:56',NULL,NULL,2,1,NULL,NULL,NULL),(6,'Miss','Ana Granda','ana.vyg@gmail.com',NULL,'$2y$10$5n0cbfLGT0yc711rRod5T.7R5gOPsa09nAVG7v3mNf6t7msotILlm',NULL,NULL,NULL,NULL,'2021-03-14 09:27:01','2021-03-14 09:27:01',NULL,NULL,2,1,NULL,NULL,NULL),(7,'Miss','Jomira Melgarejo','jomira.vyg@gmail.com',NULL,'$2y$10$FWpT2w9dcIOUO2YVrGlF2.cpRu9D5gef2h9TTZOBqczmQcTtZ6sRi',NULL,NULL,NULL,NULL,'2021-03-14 09:27:34','2021-03-14 09:27:34',NULL,NULL,2,1,NULL,NULL,NULL),(8,'Miss','Wendy Jacobi','Wendy.vyg@gmail.com',NULL,'$2y$10$QdtAxWGzLAUu28Ng/V/4zutfFen4pK5EIOxHrJfwPK2.c9IP7BIqm',NULL,NULL,NULL,NULL,'2021-03-14 09:28:06','2021-03-14 09:28:06',NULL,NULL,2,1,NULL,NULL,NULL),(9,'Miss','Romina Rivera','Romina.vyg@gmail.com',NULL,'$2y$10$7mlx33dyjDqStBP80FAXz.2.ysBaJiLXwI8DDYnD1/mlnegIYODO.',NULL,NULL,NULL,'FBphARLlCHAvU3OOWaDYmtbVsS9spXcOcGZw5B3DeGlbEJmFvZlhwfbw91O8','2021-03-14 09:28:43','2021-03-14 09:28:43',NULL,NULL,2,1,NULL,NULL,NULL),(10,'Miss','Gladis Sánchez','Gladis.vyg@gmail.com',NULL,'$2y$10$gk0oBlu/cjoeRxcBJiFsWOgpcWVuzA0ViSrUiEQ9gwaBfGpZC.c4S',NULL,NULL,NULL,NULL,'2021-03-14 09:29:14','2021-03-14 09:29:14',NULL,NULL,2,1,NULL,NULL,NULL),(11,'Miss','Abigail Chávez','Abigail.vyg@gmail.com',NULL,'$2y$10$kJEQ5C9ubVUSObxGKfMwAeb.Qb9dQWtRCL8ggcv9WPPn2KTp0uOlC',NULL,NULL,NULL,NULL,'2021-03-14 09:30:30','2021-03-14 09:30:30',NULL,NULL,2,1,NULL,NULL,NULL),(12,'Prof.','Julio Izquierdo','julio@gmail.com',NULL,'$2y$10$XxlV41g4eZjoOvyVTmvYmuol2daCaAZemuhIzasorzDOhJz1Hj1UC',NULL,NULL,NULL,NULL,'2021-03-14 09:31:34','2021-03-14 09:31:34',NULL,NULL,2,1,NULL,NULL,NULL),(13,NULL,'Garcia Matos, Romel','romelgarcia@gmail.com',NULL,'$2y$10$EBFpmVoEaAEgEbWsMz8mQO9d/mGTRsHUIEl7RCcCmBoGCxmksHH2C',NULL,NULL,NULL,NULL,'2021-03-14 09:41:25','2021-03-14 09:41:25',NULL,NULL,2,1,NULL,NULL,NULL),(14,NULL,'Francia Contreras, Patrick Oliver','contreraspalominomary@gmail.com',NULL,'$2y$10$BbVmG/JhK3OLksmaLXhO4etLNMfomZnK2v3PQIbEY0Xs5vKpyWaD6',NULL,NULL,NULL,NULL,'2021-03-14 09:41:51','2021-03-14 09:41:51',NULL,NULL,2,1,NULL,NULL,NULL),(15,NULL,'Romero Jimenez, Valentino Miguel','miguel.conta.2016@gmail.com',NULL,'$2y$10$8GrTTy1IWINrsBoa.VhQiOV2XN2/HUgeTIQbJPcCwxSnFZRQPEvrC',NULL,NULL,NULL,NULL,'2021-03-14 09:42:12','2021-03-14 09:42:12',NULL,NULL,2,1,NULL,NULL,NULL),(16,NULL,'Ruiz Mihashiro, Flavia Aleliz','lizbethzitha2017@gmail.com',NULL,'$2y$10$YM96016JHLcZHfiPAO3zJ.ZxoSRuZMyK2P6UkL9ADCvwNpkgPRSkW',NULL,NULL,NULL,NULL,'2021-03-14 09:42:33','2021-03-14 09:42:33',NULL,NULL,2,1,NULL,NULL,NULL),(17,NULL,'Velasquez Peña, Jeyko Lenin','Saulvegui@gmail.com',NULL,'$2y$10$tJxB8jBc8b9ffBNv/nGFeOoHMnNBWbcE.xPcbcWlaEPhvSTvFqvBy',NULL,NULL,NULL,NULL,'2021-03-14 09:42:52','2021-03-14 09:42:52',NULL,NULL,2,1,NULL,NULL,NULL),(18,NULL,'Hurtado Valdez, Ghaela Mayfret','ghaelahurtado@gmail.com',NULL,'$2y$10$hoGnYyPGnfe/ekfJ6skMEOfoWXso9e7crMbZ2QNfG/fWH3AplMrKK',NULL,NULL,NULL,NULL,'2021-03-14 09:43:11','2021-03-14 09:43:11',NULL,NULL,2,1,NULL,NULL,NULL),(19,NULL,'Chavez Nicho, Marian Victoria','marianchavez@gmail.com',NULL,'$2y$10$NGIAC4.h5OQ2lrcP4w2h2OVQvDfDQimQlzlqBoSxoaDoK3em.mzAO',NULL,NULL,NULL,NULL,'2021-03-14 09:43:36','2021-03-14 09:43:36',NULL,NULL,2,1,NULL,NULL,NULL),(20,NULL,'Gutierrez Estrada, Ivanna Anthuanet','ivannagutierrez@gmail.com',NULL,'$2y$10$vay2nUquMF6ZBINxQFcwkuzmNy3JPzPP2kjZYl5vXROANv9Lkqq8G',NULL,NULL,NULL,NULL,'2021-03-14 09:43:55','2021-03-14 09:43:55',NULL,NULL,2,1,NULL,NULL,NULL),(21,NULL,'Ortega Graza, Alice Katherine','evelyngraza1@gmail.com',NULL,'$2y$10$ZAYH7jIL6gd7Uz4wqpaE5.fCUY2Kewafa1lQjjB8FJ3M9R2WOImW2',NULL,NULL,NULL,NULL,'2021-03-14 09:44:18','2021-03-14 09:44:18',NULL,NULL,2,1,NULL,NULL,NULL),(22,NULL,'Ramos Torpoco, Marco Valentino','chiovalentino03@gmail.com',NULL,'$2y$10$ap5FH0a.f33r0dJdeAFLZOch3ExpF3RdxSQoLorUGm/JGFtGFTV6G',NULL,NULL,NULL,NULL,'2021-03-14 09:44:39','2021-03-14 09:44:39',NULL,NULL,2,1,NULL,NULL,NULL),(23,NULL,'Bernabé Castillo, Santiago Alessandro','sharoncastillo495@gmail.com',NULL,'$2y$10$Tr.vUuDyzlw5e56RDgAsxeSjSq.3n1KHqAwTDcDQ3Sz./v89isiOe',NULL,NULL,NULL,NULL,'2021-03-14 09:45:04','2021-03-14 09:45:04',NULL,NULL,2,1,NULL,NULL,NULL),(24,NULL,'Goicochea Nolly, Luciana Isabella','elsa.nollyr@gmail.com',NULL,'$2y$10$IgoEMbpCChrcBfMNCnqHsOgbVKuygwN1RIBzZr7ZjoPxISgLU8oXG',NULL,NULL,NULL,NULL,'2021-03-14 09:45:22','2021-03-14 09:45:22',NULL,NULL,2,1,NULL,NULL,NULL),(25,NULL,'Cantoral Ugarte Yhan Jesús','rud.3395@gmail.com',NULL,'$2y$10$hwgEtA38G5KBL0nwt9mXJOkXCtmG0LmYrFH8vnhwEBXo3efxitRAi',NULL,NULL,NULL,NULL,'2021-03-14 09:45:55','2021-03-14 09:45:55',NULL,NULL,2,1,NULL,NULL,NULL),(26,NULL,'Ypanaque Lozano, Jaír Alexander','mlozanoperez73@gmail.com',NULL,'$2y$10$dOrsLORasFyRLvvlMBj1J.w1bEn9m/xH2.rDNMOUYvBK3mmsDPN9y',NULL,NULL,NULL,NULL,'2021-03-14 09:46:15','2021-03-14 09:46:15',NULL,NULL,2,1,NULL,NULL,NULL),(27,NULL,'Fernández Petterman, Andre Marshello','Fdanny2007@gmail.com',NULL,'$2y$10$9z3z.G28a5h6P7bIEwaceOuD9K8UDcE8foKMmonHN4zO3p6WO61Je',NULL,NULL,NULL,NULL,'2021-03-14 09:46:52','2021-03-14 09:46:52',NULL,NULL,2,1,NULL,NULL,NULL),(28,NULL,'Valderrama Herrera, María Paz','liliana.emi27h@gmail.com',NULL,'$2y$10$o7lKeJzouZIPVIPHvc0fveIQLF3nqm52Krn9tv9aLb.Q0pO6qA8g6',NULL,NULL,NULL,NULL,'2021-03-14 09:47:10','2021-03-14 09:47:10',NULL,NULL,2,1,NULL,NULL,NULL),(29,NULL,'Rivas Flores, Thiago Raúl','giuliana180615@gmail.com',NULL,'$2y$10$Gzmcfn.8..dnvSTYSYR3IeojVYj7IDJuC0U8D6DP0XRmEoqvhmQhW',NULL,NULL,NULL,NULL,'2021-03-14 09:47:27','2021-03-14 09:47:27',NULL,NULL,2,1,NULL,NULL,NULL),(30,NULL,'Durand Gomez, Lía Ivanna','Ivannadurand@gmail.com',NULL,'$2y$10$q/j937YU0wMDvYIU2F3d3eiLtLusz1LZj6ui52KOgdLjAd/RDRMPS',NULL,NULL,NULL,NULL,'2021-03-14 09:47:46','2021-03-14 09:47:46',NULL,NULL,2,1,NULL,NULL,NULL),(31,NULL,'Lázaro Valdivia, Julieth Vania','Juliethlazaro@gmail.com',NULL,'$2y$10$qNRLKbfkWwEsnE8xqFKv4ep9HaQFXUwPrpKT5L/3SYRTypMM/mqiG',NULL,NULL,NULL,NULL,'2021-03-14 09:48:03','2021-03-14 09:48:03',NULL,NULL,2,1,NULL,NULL,NULL),(33,NULL,'Daleshka Picoy Antezana','Jenni.ant901@gmail.com',NULL,'$2y$10$4mWZ7KaubSwX5UiGir.7u.6151cY2sBPkA.8r79A38fjG7tXD3uV.',NULL,NULL,NULL,NULL,'2021-03-14 10:22:32','2021-03-14 10:22:32',NULL,NULL,2,1,NULL,NULL,NULL),(34,NULL,'Ore Rosales, Gael','Beatrizore.c@gmail.com',NULL,'$2y$10$divKIDxwYLvtkek3so/NJuGFc1XakqZ.RSGav6pzsaXJKvWnDBzHW',NULL,NULL,NULL,NULL,'2021-03-14 10:22:56','2021-03-14 10:22:56',NULL,NULL,2,1,NULL,NULL,NULL),(35,NULL,'Juipa Huaccha, Milan','Freddyjuipa@gmail.com',NULL,'$2y$10$Rv4QjFdSBFXgOvaoIFCnNOG8hkds3RFPsavGAiMyp9JeN03V/5lR2',NULL,NULL,NULL,NULL,'2021-03-14 10:23:23','2021-03-14 10:23:23',NULL,NULL,2,1,NULL,NULL,NULL),(36,NULL,'Perez Sierra, Allen','Anitamicaelasierrasuloaga@gmail.com',NULL,'$2y$10$GAJFuo5g7WwKs9iQmJWYK.Y21c4J6ySTmy5TEDOEibrhdsAL0xBN.',NULL,NULL,NULL,NULL,'2021-03-14 10:23:47','2021-03-14 10:23:47',NULL,NULL,2,1,NULL,NULL,NULL),(37,NULL,'Ortega Arteta, Daymi','Ingridvaldezdelgado@gmail.com',NULL,'$2y$10$3uO0mU9RjpHNnEnu6q64wO8z2kEa21yk5l7B5hljnbVRRjOfanU9i',NULL,NULL,NULL,NULL,'2021-03-14 10:24:08','2021-03-14 10:24:08',NULL,NULL,2,1,NULL,NULL,NULL),(38,NULL,'López Huacchillo, María Cristina','Mariacristina@gmail.com',NULL,'$2y$10$1SHYZqpMocbXKjG/4mHoaOF2s/E3p9t8Gaii2RFJ3YriBGmIbyIoG',NULL,NULL,NULL,NULL,'2021-03-14 10:25:46','2021-03-14 10:25:46',NULL,NULL,2,1,NULL,NULL,NULL),(39,NULL,'Huacchillo Encalada, Marcelo Santhyago','Marcelohuacchillo@gmail.com',NULL,'$2y$10$91BWXZUapfa2RdTHDPoD1O3RFNAV14SSw7O8zERwcHxUS81b/hB0K',NULL,NULL,NULL,NULL,'2021-03-14 10:26:30','2021-03-14 10:26:30',NULL,NULL,2,1,NULL,NULL,NULL),(40,NULL,'Garcia Martos, Cielo Guadalupe','Cielogarcia@gmail.com',NULL,'$2y$10$ZG4fgWTQlGYrdxSDg/pW6.wtRvB3y/4P519agMCaEG7A6D6jwtEse',NULL,NULL,NULL,NULL,'2021-03-14 10:27:39','2021-03-14 10:27:39',NULL,NULL,2,1,NULL,NULL,NULL),(41,NULL,'Herrera Matos Ezzio Gianpiero Hernán','ezzioherrera@gmail.com',NULL,'$2y$10$mIW7ulXdWh./Up/Dmrx0NOIXnCKfkZxIOhmFMXljOsdhnljLVXzSu',NULL,NULL,NULL,NULL,'2021-03-14 10:27:57','2021-03-14 10:27:57',NULL,NULL,2,1,NULL,NULL,NULL),(42,NULL,'Paredes Merino, Caleb Josué','cutipamamaniaurea@gmail.com',NULL,'$2y$10$tNimUB32g3OuyKiTwDDEnumnPSEcZO/VHo2MX0aMxRRe1ZOJCE1g.',NULL,NULL,NULL,NULL,'2021-03-14 10:28:22','2021-03-14 10:28:22',NULL,NULL,2,1,NULL,NULL,NULL),(43,NULL,'Huacchillo Olivera, Elmer Thiago','deyolijo@gmail.com',NULL,'$2y$10$GfrfISPO5.YW6f16VN32N.Yrk8VN2tADZ0GGbfDZGrwp7DrzlGSdO',NULL,NULL,NULL,NULL,'2021-03-14 10:28:38','2021-03-14 10:28:38',NULL,NULL,2,1,NULL,NULL,NULL),(44,NULL,'Antonio Mendoza, Selena Kiara','antonia.mendoza.encalada1982@gmail.com',NULL,'$2y$10$WCHnyZy8yxENVqxcA7RgeujXtGF1rHwY/QdnWZBnntIKw8aY3S2Uu',NULL,NULL,NULL,NULL,'2021-03-14 10:32:27','2021-03-14 10:32:27',NULL,NULL,2,1,NULL,NULL,NULL),(45,NULL,'Huapaya Campos, Thiago Ortorio','adiespinoza@gmail.com',NULL,'$2y$10$Dry3DwI1c5VeQD4blgi.GOs89nYIywGMUySX9/gcDbKCqVM/a7mH6',NULL,NULL,NULL,NULL,'2021-03-14 10:32:44','2021-03-14 10:32:44',NULL,NULL,2,1,NULL,NULL,NULL),(46,NULL,'Jacobi Abanto, Gabriela Brisset','abantocordovabrissette@gmail.com',NULL,'$2y$10$Ma7LtZkX3UnP.m95uiXy9uxm3ZGoKWU.FpKvY4fz7boLD13Jk9fZy',NULL,NULL,NULL,NULL,'2021-03-14 10:33:04','2021-03-14 10:33:04',NULL,NULL,2,1,NULL,NULL,NULL),(47,NULL,'Gutierrez Pareja, Gabriel','Gabrieljaredgutierrezpareja@gmail.com',NULL,'$2y$10$yJ.JHtR3U2kRaIuNwNapmujIlI5xjIF9gLT1CnjO6pFminxYDw7NK',NULL,NULL,NULL,NULL,'2021-03-14 10:33:27','2021-03-14 10:33:27',NULL,NULL,2,1,NULL,NULL,NULL),(48,NULL,'Llallhui Gongora, Thiago Josimar','katieyta27@gmail.com',NULL,'$2y$10$fRMES7RPIFEwqD.9XTP9OecPasjUkhERie3i9SeZgqla1DUNcopz2',NULL,NULL,NULL,NULL,'2021-03-14 10:33:47','2021-03-14 10:33:47',NULL,NULL,2,1,NULL,NULL,NULL),(49,NULL,'Casas Carbajal, Guianella','jackelinefv30@gmai.com',NULL,'$2y$10$RZxdFtUEdNpONQ3Bv4uRzul9S4f47K/q52UPEDQM8Y9ELAiwcFpYe',NULL,NULL,NULL,NULL,'2021-03-14 10:34:15','2021-03-14 10:34:15',NULL,NULL,2,1,NULL,NULL,NULL),(50,NULL,'Dionicio Córdova, Mishelle','mishelledionicioc@gmail.com',NULL,'$2y$10$iOELkWj04mNidLy2VSjMV.i.N4k/M.lc6xD7uQY.kXEvJ35L1mqs6',NULL,NULL,NULL,NULL,'2021-03-14 10:35:06','2021-03-14 10:35:06',NULL,NULL,2,1,NULL,NULL,NULL),(52,NULL,'Rojas Retuerto, Magdyel Vernis','retuertomagda@gmail.com',NULL,'$2y$10$il3xdPgPCn6wFz/CnLairO3g21oTEGHtrY4oREvZOIpmha/T.NMxm',NULL,NULL,NULL,NULL,'2021-03-14 10:35:48','2021-03-14 10:35:48',NULL,NULL,2,1,NULL,NULL,NULL),(53,NULL,'Ruiz Ruiz, Gamaniel Tiago','ruizannie123@gmail.com',NULL,'$2y$10$KgRj6TdqWQaF6gGxjC.6lOGPMyS3q/t2M9Z9Eg7ZRR7rqNmvufQw6',NULL,NULL,NULL,NULL,'2021-03-14 10:36:04','2021-03-14 10:36:04',NULL,NULL,2,1,NULL,NULL,NULL),(54,NULL,'López Huacchillo, Santiago David','davidsanthyagolopez@gmail.com',NULL,'$2y$10$tJ3CBwBkMq8.iG6GvRj8kePSg2EM0KFn2oYKjVKe/aoxERwWRJdB6',NULL,NULL,NULL,NULL,'2021-03-14 10:36:21','2021-03-14 10:36:21',NULL,NULL,2,1,NULL,NULL,NULL),(55,NULL,'Rengifo Bazán, Camila Stephany','yoysy1688@gmail.com',NULL,'$2y$10$O2Y6.xiG19m5654aKdSUCOHhZ1oRKtPxXfiuDjpmyYd.XOKbKnWbq',NULL,NULL,NULL,NULL,'2021-03-14 10:36:51','2021-03-14 10:36:51',NULL,NULL,2,1,NULL,NULL,NULL),(56,NULL,'Pinedo Ramirez, Joshepe','ruddy84@gmail.com',NULL,'$2y$10$oGxFs9MhPj0YoVnfop3z5.Td0VU6y9zge6/gh1qRdiXvHh9KzSsW.',NULL,NULL,NULL,NULL,'2021-03-14 10:37:41','2021-03-14 10:37:41',NULL,NULL,2,1,NULL,NULL,NULL),(57,NULL,'Yllatopa Ríos, Jesús Thiago','dannarios02@gmail.com',NULL,'$2y$10$xAnQjcHb4r/TdXD46QRuxeSqtjf1vt2.Degumxa/yEzoyPLcZJpjm',NULL,NULL,NULL,NULL,'2021-03-14 10:38:01','2021-03-14 10:38:01',NULL,NULL,2,1,NULL,NULL,NULL),(58,NULL,'Saldaña Echevarría, Junior','valeriasaldana71@gmail.com',NULL,'$2y$10$bLGnmGj47RHkTf08.t6kHua7QniDmXNzGW3.AMvqnJ0sgEc7AhVzO',NULL,NULL,NULL,NULL,'2021-03-14 10:38:21','2021-03-14 10:38:21',NULL,NULL,2,1,NULL,NULL,NULL),(59,NULL,'Paredes Salinas, Zamir','zamirparedezsalinas@gmail.com',NULL,'$2y$10$UzJN.tZItdypYdo14Pdq7.kdelYlwfE38RaIBWuBqiw2kxPbltwW2',NULL,NULL,NULL,NULL,'2021-03-14 10:38:36','2021-03-14 10:38:36',NULL,NULL,2,1,NULL,NULL,NULL),(60,NULL,'Huamán Echevarría, Luana Patricia','luanahuaman@gmail.com',NULL,'$2y$10$09INiCKyFd7xoWlGwSTEPuf0TwRd8xUrO66bJpCFio4KGUE/MmcNm',NULL,NULL,NULL,NULL,'2021-03-14 10:38:53','2021-03-14 10:38:53',NULL,NULL,2,1,NULL,NULL,NULL),(61,NULL,'Manayay Contreras, Luis Fabiano','luisfabianomanayay@gmail.com',NULL,'$2y$10$Yb9Hl1MKT4zJNe9mhe.0LeQOFq9n.smLbEtSMANgnJOMrPV0BfLxS',NULL,NULL,NULL,NULL,'2021-03-14 10:39:17','2021-03-14 10:39:17',NULL,NULL,2,1,NULL,NULL,NULL),(62,NULL,'Montalvan Céspedes, Yared','yared1327@gmail.com',NULL,'$2y$10$N1emXb4PAcMkVbX69Yv5Q.QO25u1Lq2As7MG3sphW.K/O5wLVv1.W',NULL,NULL,NULL,NULL,'2021-03-14 10:40:03','2021-03-14 10:40:03',NULL,NULL,2,1,NULL,NULL,NULL),(63,NULL,'Paredes Merino, Stefanny','stefannyparedes@gmail.com',NULL,'$2y$10$SrmSlucxPkACzIopBquVou0UNr2rVVU7T1shh4LgOOEnAT.A8lynO',NULL,NULL,NULL,NULL,'2021-03-14 10:40:22','2021-03-14 10:40:22',NULL,NULL,2,1,NULL,NULL,NULL),(64,NULL,'Paredes Merino, Fabio','Fabioparedes@gmail.com',NULL,'$2y$10$kkeWXGzhpnNf/FLzW92MV.4azpm6vzkee7Z0JXcVJKeLnLJtnTqUK',NULL,NULL,NULL,NULL,'2021-03-14 10:40:43','2021-03-14 10:40:43',NULL,NULL,2,1,NULL,NULL,NULL),(65,NULL,'Flores Cárdenas, Neyser','lcardenasesteban@gmail.com',NULL,'$2y$10$9Y5GlJuriY32N4efnaptquTbI7KZu77G1jw7B3u/RkAP2V1X1jSXW',NULL,NULL,NULL,NULL,'2021-03-14 10:41:06','2021-03-14 10:41:06',NULL,NULL,2,1,NULL,NULL,NULL),(66,NULL,'Flores De la cruz, Matías Lucas','delacruzsara@gmail.com',NULL,'$2y$10$zjBS6bGsuAhjlAS9hf2ogOqwLDcId9kW2UE1u1cr016vxzUyRgzUS',NULL,NULL,NULL,NULL,'2021-03-14 10:42:48','2021-03-14 10:42:48',NULL,NULL,2,1,NULL,NULL,NULL),(67,NULL,'Fernandez Petterman, Josué Benjamín','jpettermanrubio@gmail.com',NULL,'$2y$10$sRH74/NWBXW27nHwYR11sOabjygMUtc7vWqFzzLiN/3W3XWoNSAe2',NULL,NULL,NULL,NULL,'2021-03-14 10:43:06','2021-03-14 10:43:06',NULL,NULL,2,1,NULL,NULL,NULL),(68,NULL,'Inga Rivas, Fabricio José','Kariningarivas1991@gmail.com',NULL,'$2y$10$lKCPBVmzsK2ziHoQKedtIuHpBS8Wwf90LLLY.PmGmiC1iTYX5b.5u',NULL,NULL,NULL,NULL,'2021-03-14 10:43:21','2021-03-14 10:43:21',NULL,NULL,2,1,NULL,NULL,NULL),(69,NULL,'Ramos Odicio, Kiara Alexandra','rayjo1999@gmail.com',NULL,'$2y$10$RSiJWKbTupLYuZLsPN.1UulO1L9eR9xUMNHyqkpmjxQ0k6E8sZ0p6',NULL,NULL,NULL,NULL,'2021-03-14 10:43:42','2021-03-14 10:43:42',NULL,NULL,2,1,NULL,NULL,NULL),(70,NULL,'Amira Durán Gómez','isabelgomezh1@gmail.com',NULL,'$2y$10$tDrUXIubem6DE7SyNMZjSuFkrikrZudz85dLjjiYZDBWZVSwRnNyi',NULL,NULL,NULL,NULL,'2021-03-15 00:27:13','2021-03-15 00:27:13',NULL,NULL,2,1,NULL,NULL,NULL),(71,NULL,'Salas Escobedo, Nicolás David','nicolasalas@gmail.com',NULL,'$2y$10$1/1lnf17YHmgiXEqIJVaL.F2.7cHEVZrl5gb2upErbbwjo.gSo8fK',NULL,NULL,NULL,'4aOxQ16SmD3W9ZepQ9GndBZ1n0OyGLKpqPcAqoxmp2B7XwpqFxzQryvD9w8L','2021-03-15 08:45:23','2021-03-15 08:45:23',NULL,NULL,2,1,NULL,NULL,NULL);
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

-- Dump completed on 2021-03-15 21:27:30
