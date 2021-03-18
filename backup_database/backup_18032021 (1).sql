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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Comunicación',NULL,'com','#ff85c6','#000000',2,'2021-03-15 22:24:53','2021-03-15 22:24:53','1615865093_1595531435_comunicacion.png'),(2,'Personal Social',NULL,'per','#000000','#000000',2,'2021-03-15 22:26:17','2021-03-15 22:26:17','1615865177_1595135712_personal.png'),(3,'Matemática',NULL,'mat','#6190ff','#000000',2,'2021-03-15 22:27:17','2021-03-15 22:27:17','1615865237_1598726817_matematica.png'),(4,'Ciencia y Tecnología',NULL,'cyt','#ffa742','#000000',2,'2021-03-15 22:27:46','2021-03-15 22:27:46','1615865266_1595135787_ciencia.png'),(5,'Taekwondo',NULL,'TKD','#000000','#000000',2,'2021-03-15 22:28:17','2021-03-15 22:28:17','1615865297_1595531910_taekwondo.png'),(6,'Ingles',NULL,'ing','#000000','#000000',2,'2021-03-15 22:28:51','2021-03-15 22:28:51','1615865331_1598729603_ingles.png'),(7,'Música',NULL,'mus','#000000','#000000',2,'2021-03-15 22:30:17','2021-03-15 22:30:17','1615865417_musica.png'),(8,'Religión',NULL,'rel','#c2c2c2','#000000',2,'2021-03-15 22:30:48','2021-03-15 22:30:48','1615865448_1598824119_religion.png');
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
INSERT INTO `days` VALUES (1,'Lunes',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(2,'Martes',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(3,'Miércoles',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(4,'Jueves',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(5,'Viernes',1,'2021-03-15 22:14:38','2021-03-15 22:14:38');
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
  CONSTRAINT `degree_level_courses_degree_level_id_foreign` FOREIGN KEY (`degree_level_id`) REFERENCES `degree_level_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_level_courses`
--

LOCK TABLES `degree_level_courses` WRITE;
/*!40000 ALTER TABLE `degree_level_courses` DISABLE KEYS */;
INSERT INTO `degree_level_courses` VALUES (1,1,3,'2021-03-15 22:31:11','2021-03-15 22:31:11'),(2,2,3,'2021-03-15 22:31:11','2021-03-15 22:31:11'),(3,3,3,'2021-03-15 22:31:11','2021-03-15 22:31:11'),(4,4,1,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(5,4,2,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(6,4,3,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(7,4,4,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(9,4,6,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(11,4,8,'2021-03-15 22:31:22','2021-03-15 22:31:22'),(12,5,1,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(13,5,2,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(14,5,3,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(15,5,4,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(17,5,6,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(19,5,8,'2021-03-15 22:31:33','2021-03-15 22:31:33'),(20,6,1,'2021-03-15 22:31:46','2021-03-15 22:31:46'),(21,6,3,'2021-03-15 22:31:46','2021-03-15 22:31:46'),(22,7,1,'2021-03-15 22:31:46','2021-03-15 22:31:46'),(23,8,4,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(24,9,2,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(25,9,4,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(26,10,1,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(27,10,2,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(28,10,4,'2021-03-15 22:32:15','2021-03-15 22:32:15'),(29,11,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(30,12,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(31,13,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(32,14,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(33,15,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(34,16,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(35,17,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(36,18,5,'2021-03-15 22:33:18','2021-03-15 22:33:18'),(37,19,1,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(38,19,2,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(39,19,4,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(40,20,1,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(41,20,2,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(42,20,4,'2021-03-15 22:33:55','2021-03-15 22:33:55'),(43,21,2,'2021-03-15 22:34:33','2021-03-15 22:34:33'),(44,21,8,'2021-03-15 22:34:33','2021-03-15 22:34:33'),(45,22,3,'2021-03-15 22:34:33','2021-03-15 22:34:33'),(46,23,3,'2021-03-15 22:34:33','2021-03-15 22:34:33'),(47,24,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(48,25,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(49,26,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(50,27,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(51,28,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(52,29,6,'2021-03-15 22:35:45','2021-03-15 22:35:45'),(53,30,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(54,31,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(55,32,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(56,33,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(57,33,8,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(58,34,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(59,34,8,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(60,35,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(61,35,8,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(62,36,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(63,36,8,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(64,37,7,'2021-03-15 22:36:18','2021-03-15 22:36:18'),(65,37,8,'2021-03-15 22:36:18','2021-03-15 22:36:18');
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
  CONSTRAINT `course_degree_level_user_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_degree_level_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_degree_level_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_level_users`
--

LOCK TABLES `degree_level_users` WRITE;
/*!40000 ALTER TABLE `degree_level_users` DISABLE KEYS */;
INSERT INTO `degree_level_users` VALUES (1,2,6,3,'2021-03-15 22:16:43','2021-03-15 22:16:43'),(2,2,7,3,'2021-03-15 22:16:43','2021-03-15 22:16:43'),(3,2,8,3,'2021-03-15 22:16:43','2021-03-15 22:16:43'),(4,1,2,4,'2021-03-15 22:17:41','2021-03-15 22:17:41'),(5,1,1,5,'2021-03-15 22:18:25','2021-03-15 22:18:25'),(6,2,3,6,'2021-03-15 22:18:52','2021-03-15 22:18:52'),(7,2,4,6,'2021-03-15 22:18:52','2021-03-15 22:18:52'),(8,2,3,7,'2021-03-15 22:19:32','2021-03-15 22:19:32'),(9,2,4,7,'2021-03-15 22:19:32','2021-03-15 22:19:32'),(10,2,5,7,'2021-03-15 22:19:32','2021-03-15 22:19:32'),(11,1,1,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(12,1,2,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(13,2,3,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(14,2,4,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(15,2,5,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(16,2,6,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(17,2,7,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(18,2,8,8,'2021-03-15 22:20:12','2021-03-15 22:20:12'),(19,2,7,9,'2021-03-15 22:20:45','2021-03-15 22:20:45'),(20,2,8,9,'2021-03-15 22:20:45','2021-03-15 22:20:45'),(21,2,3,10,'2021-03-15 22:21:12','2021-03-15 22:21:12'),(22,2,4,10,'2021-03-15 22:21:12','2021-03-15 22:21:12'),(23,2,5,10,'2021-03-15 22:21:12','2021-03-15 22:21:12'),(24,2,3,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(25,2,4,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(26,2,5,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(27,2,6,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(28,2,7,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(29,2,8,11,'2021-03-15 22:21:42','2021-03-15 22:21:42'),(30,1,1,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(31,1,2,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(32,2,3,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(33,2,4,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(34,2,5,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(35,2,6,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(36,2,7,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(37,2,8,12,'2021-03-15 22:22:08','2021-03-15 22:22:08'),(38,1,1,13,'2021-03-15 22:42:25','2021-03-15 22:42:25'),(39,1,1,14,'2021-03-15 22:42:49','2021-03-15 22:42:49'),(40,1,1,15,'2021-03-15 22:43:36','2021-03-15 22:43:36'),(41,1,1,16,'2021-03-15 22:45:35','2021-03-15 22:45:35'),(42,1,1,17,'2021-03-15 22:46:20','2021-03-15 22:46:20'),(43,1,1,18,'2021-03-15 22:46:38','2021-03-15 22:46:38'),(44,1,1,19,'2021-03-15 22:47:02','2021-03-15 22:47:02'),(45,1,1,20,'2021-03-15 22:47:17','2021-03-15 22:47:17'),(46,1,1,21,'2021-03-15 22:47:34','2021-03-15 22:47:34'),(47,1,2,22,'2021-03-15 22:48:01','2021-03-15 22:48:01'),(48,1,2,23,'2021-03-15 22:48:18','2021-03-15 22:48:18'),(49,1,2,24,'2021-03-15 22:48:45','2021-03-15 22:48:45'),(50,1,2,25,'2021-03-15 22:49:06','2021-03-15 22:49:06'),(51,1,2,26,'2021-03-15 22:50:05','2021-03-15 22:50:05'),(52,1,2,27,'2021-03-15 22:51:51','2021-03-15 22:51:51'),(53,1,2,28,'2021-03-15 22:52:07','2021-03-15 22:52:07'),(54,1,2,29,'2021-03-15 22:52:30','2021-03-15 22:52:30'),(55,1,2,30,'2021-03-15 22:52:55','2021-03-15 22:52:55'),(56,1,2,31,'2021-03-15 22:53:21','2021-03-15 22:53:21'),(57,1,2,32,'2021-03-15 22:53:38','2021-03-15 22:53:38'),(58,2,3,34,'2021-03-15 23:04:44','2021-03-15 23:04:44'),(59,2,3,35,'2021-03-15 23:05:04','2021-03-15 23:05:04'),(60,2,3,36,'2021-03-15 23:06:27','2021-03-15 23:06:27'),(61,2,3,37,'2021-03-15 23:10:08','2021-03-15 23:10:08'),(62,2,3,38,'2021-03-15 23:10:22','2021-03-15 23:10:22'),(63,2,3,39,'2021-03-15 23:10:51','2021-03-15 23:10:51'),(64,2,3,40,'2021-03-15 23:11:07','2021-03-15 23:11:07'),(65,2,3,41,'2021-03-15 23:11:24','2021-03-15 23:11:24'),(66,2,3,42,'2021-03-15 23:11:40','2021-03-15 23:11:40'),(67,2,4,43,'2021-03-15 23:12:33','2021-03-15 23:12:33'),(68,2,4,44,'2021-03-15 23:12:48','2021-03-15 23:12:48'),(69,2,4,45,'2021-03-15 23:13:08','2021-03-15 23:13:08'),(70,2,4,46,'2021-03-15 23:13:38','2021-03-15 23:13:38'),(71,2,4,47,'2021-03-15 23:14:03','2021-03-15 23:14:03'),(72,2,4,48,'2021-03-15 23:14:19','2021-03-15 23:14:19'),(73,2,4,49,'2021-03-15 23:14:36','2021-03-15 23:14:36'),(74,2,4,50,'2021-03-15 23:14:53','2021-03-15 23:14:53'),(75,2,4,51,'2021-03-15 23:15:09','2021-03-15 23:15:09'),(76,2,5,52,'2021-03-15 23:16:06','2021-03-15 23:16:06'),(77,2,5,53,'2021-03-15 23:16:22','2021-03-15 23:16:22'),(78,2,5,54,'2021-03-15 23:16:43','2021-03-15 23:16:43'),(79,2,5,55,'2021-03-15 23:17:03','2021-03-15 23:17:03'),(80,2,5,56,'2021-03-15 23:17:25','2021-03-15 23:17:25'),(81,2,6,57,'2021-03-15 23:17:46','2021-03-15 23:17:46'),(82,2,6,58,'2021-03-15 23:18:07','2021-03-15 23:18:07'),(83,2,6,59,'2021-03-15 23:18:34','2021-03-15 23:18:34'),(84,2,6,60,'2021-03-15 23:18:49','2021-03-15 23:18:49'),(85,2,6,61,'2021-03-15 23:19:05','2021-03-15 23:19:05'),(86,2,7,62,'2021-03-15 23:19:28','2021-03-15 23:19:28'),(87,2,7,63,'2021-03-15 23:19:48','2021-03-15 23:19:48'),(88,2,7,64,'2021-03-15 23:20:03','2021-03-15 23:20:03'),(89,2,7,65,'2021-03-15 23:20:20','2021-03-15 23:20:20'),(90,2,7,66,'2021-03-15 23:20:39','2021-03-15 23:20:39'),(91,2,8,67,'2021-03-15 23:21:04','2021-03-15 23:21:04'),(92,2,8,68,'2021-03-15 23:21:18','2021-03-15 23:21:18'),(93,2,8,69,'2021-03-15 23:21:34','2021-03-15 23:21:34'),(94,2,8,70,'2021-03-15 23:21:51','2021-03-15 23:21:51'),(96,1,1,72,'2021-03-15 23:35:07','2021-03-15 23:35:07'),(97,2,7,73,'2021-03-15 23:40:10','2021-03-15 23:40:10'),(98,2,4,71,'2021-03-16 08:28:05','2021-03-16 08:28:05');
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
INSERT INTO `degrees` VALUES (1,'4 años',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',1),(2,'5 años',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',1),(3,'1er Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2),(4,'2do Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2),(5,'3er Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2),(6,'4to Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2),(7,'5to Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2),(8,'6to Grado',1,'2021-03-15 22:14:38','2021-03-15 22:14:38',2);
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
INSERT INTO `hours` VALUES (1,'8:00 - 8:40',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(2,'8:40 - 9:20',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(3,'9:20 - 10:00',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(4,'10:00 - 10:40',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(5,'10:40 - 11:20',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(6,'11:20 - 12:00',1,'2021-03-15 22:14:38','2021-03-15 22:14:38');
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
INSERT INTO `levels` VALUES (1,'Inicial',1,'2021-03-15 22:14:38','2021-03-15 22:14:38'),(2,'Primaria',1,'2021-03-15 22:14:38','2021-03-15 22:14:38');
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
  CONSTRAINT `messages_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'HOLA',14,57,11,1,'2021-03-16 10:02:29','2021-03-16 10:02:29'),(2,'miss romina ya le envie',10,68,9,1,'2021-03-16 13:38:39','2021-03-16 13:38:39'),(3,'solo entregaron en la fecha.\r\n\r\nElmer y Gabriel',18,6,6,1,'2021-03-16 22:24:10','2021-03-16 22:24:10'),(4,'deben respetar el horario de entrega de cada curso',18,6,6,1,'2021-03-16 22:24:38','2021-03-16 22:24:38'),(5,'no ingresaron a ver el vídeo en plataforma Amira y Juan Luis',18,6,6,1,'2021-03-16 22:25:24','2021-03-16 22:25:24'),(6,'Kiara y Gabriel no ingesaron a clase zoom.',18,6,6,1,'2021-03-16 22:26:03','2021-03-16 22:26:03'),(7,'Es importante ingresar a clase zoom .',18,6,6,1,'2021-03-16 22:26:42','2021-03-16 22:26:42'),(8,'Sigamos avanzando mis Exploradores Exitosos',18,6,6,1,'2021-03-16 22:27:40','2021-03-16 22:27:40'),(9,'CHICOS NO SE OLVIDEN DE ENVIAR SUS EVIDENCIAS',4,7,7,1,'2021-03-17 08:25:11','2021-03-17 08:25:11'),(10,'ATT. MISS JOMIRA',4,7,7,1,'2021-03-17 08:25:55','2021-03-17 08:25:55'),(11,'Miss no se olvide revisar mi trabajo',30,54,7,1,'2021-03-17 09:51:52','2021-03-17 09:51:52'),(12,'Hola',31,55,7,1,'2021-03-17 09:58:50','2021-03-17 09:58:50'),(13,'holaaaaaaa',33,56,7,1,'2021-03-17 10:00:15','2021-03-17 10:00:15'),(14,'Miss le envié la tarea y sube 1 por 1 las fotos',26,44,7,1,'2021-03-17 12:28:16','2021-03-17 12:28:16'),(15,'Miss buenas tardes mandare al dia martes porque no figura clase del dia miercoles',16,53,11,1,'2021-03-17 15:41:47','2021-03-17 15:41:47'),(16,'NIÑOS Y NIÑAS ES  LA PAGINA 2,3Y 4 DEL AREA DE MATEMATICA POR FAVOR',46,5,5,1,'2021-03-17 23:47:13','2021-03-17 23:47:13');
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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_06_27_134806_add_avatar_to_user_table',1),(5,'2020_06_28_200545_add_slug_to_users',1),(6,'2020_06_29_040253_create_roles_table',1),(7,'2020_06_29_040613_create_role_user_table',1),(8,'2020_07_01_220501_add_parent_id_to_users',1),(9,'2020_07_02_023628_create_courses_table',1),(10,'2020_07_02_235753_create_competencies_table',1),(11,'2020_07_04_011201_add_images_to_courses_table',1),(12,'2020_07_05_011929_add_status_to_users_table',1),(13,'2020_07_14_200939_add_school_to_users',1),(14,'2020_07_14_201239_add_phone_to_users',1),(15,'2020_07_15_184627_add_classroom_to_users_table',1),(16,'2020_07_17_174304_create_levels_table',1),(17,'2020_07_17_174336_create_degrees_table',1),(18,'2020_07_20_040305_add_course_id_to_competencies_table',1),(19,'2020_07_20_212351_add_level_id_to_degrees_table',1),(20,'2020_07_22_044418_create_course_degree_level_user_table',1),(21,'2020_08_23_213104_remove_course_id_from_course_degree_level_user_table',1),(22,'2020_08_23_213914_create_degree_level_courses_table',1),(23,'2020_08_23_225755_create_subjects_table',1),(24,'2020_08_25_194935_rename_course_degree_level_user_to_degree_level_users_table',1),(25,'2020_08_29_194926_add_user_id_to_subjects',1),(26,'2020_09_04_010804_add_school_id_to_subjects',1),(27,'2020_09_06_192711_create_messages_table',1),(28,'2020_09_06_200628_add_status_to_subjects_table',1),(29,'2020_09_13_130701_add_homework_to_subjects',1),(30,'2020_09_13_130744_add_url_pdf_to_subjects',1),(31,'2020_09_13_130816_add_url_drive_to_subjects',1),(32,'2020_09_13_164515_add_fecha_vencimiento_to_subjects',1),(33,'2020_09_13_180426_add_zoom_to_subjects',1),(34,'2021_03_06_205059_create_subject_views_table',1),(35,'2021_03_11_032503_create_hours_table',1),(36,'2021_03_11_032743_create_days_table',1),(37,'2021_03_11_063041_create_user_hours_assign_table',1),(38,'2021_03_14_185855_create_subject_works_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,3,NULL,NULL),(5,5,3,NULL,NULL),(6,6,3,NULL,NULL),(7,7,3,NULL,NULL),(8,8,3,NULL,NULL),(9,9,3,NULL,NULL),(10,10,3,NULL,NULL),(11,11,3,NULL,NULL),(12,12,3,NULL,NULL),(13,13,4,NULL,NULL),(14,14,4,NULL,NULL),(15,15,4,NULL,NULL),(16,16,4,NULL,NULL),(17,17,4,NULL,NULL),(18,18,4,NULL,NULL),(19,19,4,NULL,NULL),(20,20,4,NULL,NULL),(21,21,4,NULL,NULL),(22,22,4,NULL,NULL),(23,23,4,NULL,NULL),(24,24,4,NULL,NULL),(25,25,4,NULL,NULL),(26,26,4,NULL,NULL),(27,27,4,NULL,NULL),(28,28,4,NULL,NULL),(29,29,4,NULL,NULL),(30,30,4,NULL,NULL),(31,31,4,NULL,NULL),(32,32,4,NULL,NULL),(33,34,4,NULL,NULL),(34,35,4,NULL,NULL),(35,36,4,NULL,NULL),(36,37,4,NULL,NULL),(37,38,4,NULL,NULL),(38,39,4,NULL,NULL),(39,40,4,NULL,NULL),(40,41,4,NULL,NULL),(41,42,4,NULL,NULL),(42,43,4,NULL,NULL),(43,44,4,NULL,NULL),(44,45,4,NULL,NULL),(45,46,4,NULL,NULL),(46,47,4,NULL,NULL),(47,48,4,NULL,NULL),(48,49,4,NULL,NULL),(49,50,4,NULL,NULL),(50,51,4,NULL,NULL),(51,52,4,NULL,NULL),(52,53,4,NULL,NULL),(53,54,4,NULL,NULL),(54,55,4,NULL,NULL),(55,56,4,NULL,NULL),(56,57,4,NULL,NULL),(57,58,4,NULL,NULL),(58,59,4,NULL,NULL),(59,60,4,NULL,NULL),(60,61,4,NULL,NULL),(61,62,4,NULL,NULL),(62,63,4,NULL,NULL),(63,64,4,NULL,NULL),(64,65,4,NULL,NULL),(65,66,4,NULL,NULL),(66,67,4,NULL,NULL),(67,68,4,NULL,NULL),(68,69,4,NULL,NULL),(69,70,4,NULL,NULL),(70,71,4,NULL,NULL),(71,72,4,NULL,NULL),(72,73,4,NULL,NULL);
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
INSERT INTO `roles` VALUES (1,'superadmin','Administrador principal de todo el sistema','2021-03-15 22:14:38','2021-03-15 22:14:38'),(2,'admin','Director Administrador del sistema del colegio','2021-03-15 22:14:38','2021-03-15 22:14:38'),(3,'editor','Docente editor de temas','2021-03-15 22:14:38','2021-03-15 22:14:38'),(4,'lector','Estudiante que puede ver los temas y mensajear con los docentes','2021-03-15 22:14:38','2021-03-15 22:14:38');
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
  CONSTRAINT `subject_views_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_views`
--

LOCK TABLES `subject_views` WRITE;
/*!40000 ALTER TABLE `subject_views` DISABLE KEYS */;
INSERT INTO `subject_views` VALUES (1,4,52,'F',14,'2021-03-16 00:18:06','2021-03-17 11:36:42'),(2,3,34,'F',77,'2021-03-16 06:22:18','2021-03-17 18:35:28'),(3,10,68,'P',12,'2021-03-16 07:33:45','2021-03-17 14:10:49'),(4,3,37,'F',20,'2021-03-16 07:37:18','2021-03-17 10:07:13'),(5,17,32,'P',6,'2021-03-16 07:45:25','2021-03-17 11:10:27'),(6,17,28,'P',9,'2021-03-16 07:50:00','2021-03-17 17:26:04'),(7,17,24,'P',1,'2021-03-16 07:51:44','2021-03-16 07:51:44'),(8,17,26,'P',2,'2021-03-16 07:51:45','2021-03-17 11:30:03'),(9,17,22,'P',5,'2021-03-16 07:52:43','2021-03-18 01:49:57'),(10,18,49,'P',44,'2021-03-16 08:00:08','2021-03-17 14:55:45'),(11,18,48,'P',56,'2021-03-16 08:01:20','2021-03-17 12:10:01'),(12,10,69,'P',33,'2021-03-16 08:01:26','2021-03-17 16:18:39'),(13,2,67,'F',26,'2021-03-16 08:02:01','2021-03-17 16:30:31'),(14,18,45,'P',25,'2021-03-16 08:03:10','2021-03-17 20:37:00'),(15,17,25,'P',2,'2021-03-16 08:03:42','2021-03-16 08:05:32'),(16,10,70,'P',6,'2021-03-16 08:05:03','2021-03-16 17:20:27'),(17,17,27,'P',1,'2021-03-16 08:06:08','2021-03-16 08:06:08'),(18,3,38,'F',33,'2021-03-16 08:07:26','2021-03-17 10:20:44'),(19,17,29,'P',1,'2021-03-16 08:07:50','2021-03-16 08:07:50'),(20,18,47,'P',12,'2021-03-16 08:20:04','2021-03-17 12:48:32'),(21,18,46,'P',26,'2021-03-16 08:44:57','2021-03-17 23:09:36'),(22,18,44,'P',24,'2021-03-16 09:09:05','2021-03-17 13:01:02'),(23,18,43,'P',30,'2021-03-16 09:13:40','2021-03-17 13:45:13'),(24,15,59,'P',2,'2021-03-16 09:15:07','2021-03-16 09:15:28'),(25,13,55,'F',6,'2021-03-16 09:24:03','2021-03-17 11:09:33'),(26,15,60,'P',1,'2021-03-16 09:27:34','2021-03-16 09:27:34'),(27,19,66,'P',13,'2021-03-16 09:34:13','2021-03-17 22:49:23'),(28,19,62,'P',13,'2021-03-16 09:34:19','2021-03-16 18:33:36'),(29,19,65,'P',10,'2021-03-16 09:34:28','2021-03-16 15:37:36'),(30,19,63,'P',17,'2021-03-16 09:34:53','2021-03-17 11:08:34'),(31,14,57,'P',7,'2021-03-16 09:36:30','2021-03-16 11:10:45'),(32,19,73,'P',8,'2021-03-16 09:57:17','2021-03-16 17:30:56'),(33,14,58,'P',8,'2021-03-16 10:08:06','2021-03-16 10:48:04'),(34,15,61,'P',4,'2021-03-16 10:08:47','2021-03-16 11:11:42'),(35,9,13,'P',6,'2021-03-16 10:22:28','2021-03-16 23:51:12'),(36,8,15,'P',21,'2021-03-16 10:40:26','2021-03-17 12:12:48'),(37,8,16,'P',44,'2021-03-16 10:42:38','2021-03-17 19:07:39'),(38,9,20,'P',20,'2021-03-16 10:42:59','2021-03-17 12:44:46'),(39,8,14,'P',20,'2021-03-16 10:43:20','2021-03-17 11:54:39'),(40,8,19,'P',21,'2021-03-16 10:44:37','2021-03-16 12:04:12'),(41,8,17,'P',21,'2021-03-16 10:46:34','2021-03-17 12:03:35'),(42,8,21,'P',25,'2021-03-16 11:08:50','2021-03-17 11:37:42'),(43,8,18,'P',16,'2021-03-16 11:17:05','2021-03-17 11:59:42'),(44,18,50,'P',14,'2021-03-16 11:39:53','2021-03-17 15:12:01'),(45,11,41,'',15,'2021-03-16 12:44:58','2021-03-17 09:58:50'),(46,11,42,'',19,'2021-03-16 12:46:37','2021-03-17 10:25:02'),(47,25,36,'',21,'2021-03-16 12:54:38','2021-03-17 15:17:45'),(48,19,64,'',9,'2021-03-16 15:10:04','2021-03-16 15:39:07'),(49,31,53,'',10,'2021-03-16 18:10:21','2021-03-17 15:45:34'),(50,25,35,'',17,'2021-03-16 22:18:16','2021-03-17 21:43:32'),(51,42,39,'',16,'2021-03-17 09:02:16','2021-03-17 10:12:12'),(52,41,40,'',34,'2021-03-17 09:02:29','2021-03-17 21:45:11'),(53,30,54,'',3,'2021-03-17 09:51:03','2021-03-17 10:33:25'),(54,33,56,'',2,'2021-03-17 09:59:51','2021-03-17 10:00:40'),(55,37,31,'',1,'2021-03-17 14:05:18','2021-03-17 14:05:18'),(56,18,51,'',36,'2021-03-17 17:32:21','2021-03-17 19:32:09'),(57,54,48,'',1,'2021-03-18 07:51:20','2021-03-18 07:51:20'),(58,43,35,'',1,'2021-03-18 07:53:16','2021-03-18 07:53:16'),(59,17,35,'',1,'2021-03-18 07:54:11','2021-03-18 07:54:11'),(60,5,35,'',1,'2021-03-18 07:55:03','2021-03-18 07:55:03'),(61,41,64,'',2,'2021-03-18 08:05:45','2021-03-18 08:05:54'),(62,53,42,'',1,'2021-03-18 08:44:09','2021-03-18 08:44:09'),(63,53,37,'',1,'2021-03-18 08:44:25','2021-03-18 08:44:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=452 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_works`
--

LOCK TABLES `subject_works` WRITE;
/*!40000 ALTER TABLE `subject_works` DISABLE KEYS */;
INSERT INTO `subject_works` VALUES (42,67,2,'Como aparece el hombre sobre la tierra','Tarea de investigación','1615910128_16159101079486810282741054991878.jpg',0,'2021-03-16 10:55:28','2021-03-16 10:55:28'),(48,69,2,'El hombre sobre la tierra','Tarea de investigación','1615910155_IMG_20210315_145534.jpg',0,'2021-03-16 10:55:55','2021-03-16 10:55:55'),(82,67,2,'Como aparece el hombre sobre la tierra','Tarea de investigación','1615910319_16159101079486810282741054991878.jpg',0,'2021-03-16 10:58:39','2021-03-16 10:58:39'),(84,69,2,'El hombre sobre la tierra','Tarea de investigación','1615910501_IMG_20210315_132829.jpg',0,'2021-03-16 11:01:41','2021-03-16 11:01:41'),(85,69,2,'El hombre sobre la tierra','Tarea de investigación','1615910598_IMG_20210315_132841.jpg',0,'2021-03-16 11:03:18','2021-03-16 11:03:18'),(86,69,2,'El hombre sobre la tierra','Tarea investigación','1615910683_IMG_20210315_132850.jpg',0,'2021-03-16 11:04:43','2021-03-16 11:04:43'),(87,69,2,'El hombre sobre la tierra','Tarea investigación','1615910752_IMG_20210315_133241.jpg',0,'2021-03-16 11:05:52','2021-03-16 11:05:52'),(88,48,18,'Diccionario','Uso diccionario','1615910907_161591086910562998692895539429.jpg',0,'2021-03-16 11:08:27','2021-03-16 11:08:27'),(89,48,18,'Diccionario','Uso','1615911038_1615911001978246988900892360572.jpg',0,'2021-03-16 11:10:38','2021-03-16 11:10:38'),(90,48,18,'Diccionario','Uso','1615911131_16159111009482219601107078857407.jpg',0,'2021-03-16 11:12:11','2021-03-16 11:12:11'),(91,48,18,'Diccionario','Uso','1615911161_16159111396506678021149278138374.jpg',0,'2021-03-16 11:12:41','2021-03-16 11:12:41'),(95,48,18,'Diccionario','Uso','1615911233_16159112151366452974683166373963.jpg',0,'2021-03-16 11:13:53','2021-03-16 11:13:53'),(97,17,8,'Matematica','Corazon rojo','1615911505_16159114629888340444678327036775.jpg',0,'2021-03-16 11:18:25','2021-03-16 11:18:25'),(98,48,18,'Diccionari','Uso','1615911673_16159116426113707847008487757587.jpg',0,'2021-03-16 11:21:13','2021-03-16 11:21:13'),(107,20,9,'Trazos verticales','Tarea cumplida','1615911738_20210316_110246_mfnr.jpg',0,'2021-03-16 11:22:18','2021-03-16 11:22:18'),(108,15,8,'tareas de hoy 16 03 2021','aprendimos color rojo\r\ntrabajamos delineado ,rasgado','1615911743_IMG-20210316-WA0053[1].jpeg',0,'2021-03-16 11:22:23','2021-03-16 11:22:23'),(109,20,9,'Trazos','Actividades en clase','1615911835_20210316_110417_mfnr.jpg',0,'2021-03-16 11:23:55','2021-03-16 11:23:55'),(110,20,9,'Trazos','Actividades en clase','1615911877_20210316_110331_mfnr.jpg',0,'2021-03-16 11:24:37','2021-03-16 11:24:37'),(111,20,9,'Trazos','Actividades en clases','1615911916_20210316_110338_mfnr.jpg',0,'2021-03-16 11:25:16','2021-03-16 11:25:16'),(113,17,8,'Trazos','Comunicacion','1615912130_16159120853065689129988125711219.jpg',0,'2021-03-16 11:28:50','2021-03-16 11:28:50'),(114,17,8,'Trazos','Comunicacion','1615912132_16159120853065689129988125711219.jpg',0,'2021-03-16 11:28:52','2021-03-16 11:28:52'),(115,17,8,'Comunicacion','Trazos','1615912257_16159122029935017712540019655062.jpg',0,'2021-03-16 11:30:57','2021-03-16 11:30:57'),(117,15,9,'trazos','tarea cumplida','1615912862_IMG-20210316-WA0059[1].jpeg',0,'2021-03-16 11:41:02','2021-03-16 11:41:02'),(118,15,9,'trazos','tarea cumplida','1615912905_IMG-20210316-WA0061[1].jpeg',0,'2021-03-16 11:41:45','2021-03-16 11:41:45'),(119,15,9,'trazos','tarea cumplida','1615912945_IMG-20210316-WA0063[1].jpeg',0,'2021-03-16 11:42:25','2021-03-16 11:42:25'),(121,19,9,'TRAZOS VERTICALES','TAREA CUMPLIDA PAGINA 4','1615913259_b00e4425-6066-4f0f-b824-effd9402c264.jpg',0,'2021-03-16 11:47:39','2021-03-16 11:47:39'),(122,19,9,'TRAZOS VERTICALES','TAREA CUMPLIDA PAGINA 4','1615913299_b42a93aa-02db-46b1-a219-eaec9808400d.jpg',0,'2021-03-16 11:48:19','2021-03-16 11:48:19'),(123,19,9,'TRAZOS VERTICALES','TAREA CUMPLIDA PAGINA 4','1615913372_d559fe3c-c65a-4c89-9717-1f75ab0c1118.jpg',0,'2021-03-16 11:49:32','2021-03-16 11:49:32'),(124,19,8,'COLOR ROJO','TAREA CUMPLIDA PAGINA 1','1615913462_2a8148a3-a34a-433c-8e30-868a1a0937ed.jpg',0,'2021-03-16 11:51:02','2021-03-16 11:51:02'),(125,19,8,'COLOR ROJO','TAREA CUMPLIDA PAGINA 1','1615913508_3b6050d4-02f1-4db4-ae29-d68ae987989f.jpg',0,'2021-03-16 11:51:48','2021-03-16 11:51:48'),(126,19,8,'COLOR ROJO','TAREA CUMPLIDA PAGINA 1','1615913621_235b180b-3fb5-4db7-84a5-b1a16603ef56.jpg',0,'2021-03-16 11:53:41','2021-03-16 11:53:41'),(127,21,8,'COLOR ROJO','TAREA CUMPLIDA','1615913747_9c38ed1e-435a-4fe5-bb0f-b88384e359c0.jpg',0,'2021-03-16 11:55:47','2021-03-16 11:55:47'),(128,21,8,'COLOR ROJO','TAREA CUMPLIDA','1615913770_8385a29a-f210-41c1-98dc-d8cf19f8ce6b.jpg',0,'2021-03-16 11:56:10','2021-03-16 11:56:10'),(129,21,9,'LINEA RECTA','TAREA CUMPLIDA','1615913833_7c916db8-573f-4a3b-94ad-010b54c269e2.jpg',0,'2021-03-16 11:57:13','2021-03-16 11:57:13'),(130,21,9,'LINEA RECTA','TAREA CUMPLIDA','1615913844_6e335e89-1912-4f55-8aec-bee5b51a11c8.jpg',0,'2021-03-16 11:57:24','2021-03-16 11:57:24'),(131,19,6,'YO ME LLAMO','TAREA CUMPLIDA 15 DE MARZO','1615914041_fe570641-64d1-445b-aaec-b02482f72770.jpg',0,'2021-03-16 12:00:41','2021-03-16 12:00:41'),(133,14,8,'Color rojo','Tarea cumplida','1615914101_IMG_20210316_114437_390.jpg',0,'2021-03-16 12:01:41','2021-03-16 12:01:41'),(135,20,8,'Color rojo','Tarea cumplida','1615914135_20210316_120031_mfnr.jpg',0,'2021-03-16 12:02:15','2021-03-16 12:02:15'),(136,19,5,'PLAN LECTOR','TAREA CUMPLIDA\r\nMARIAN DIBUJO EL ESTANTE DE JUGUETES Y ADEMÁS EN LA CAJA DONDE ESTABA E DINOSAURIO','1615914146_88934ab4-d423-4d03-909b-dc445af540ad.jpg',0,'2021-03-16 12:02:26','2021-03-16 12:02:26'),(137,20,8,'Color rojo','Actividad en clase','1615914192_20210316_120251_mfnr.jpg',0,'2021-03-16 12:03:12','2021-03-16 12:03:12'),(138,19,7,'LA CRUZ','TAREA CUMPLIDA','1615914206_ea692fe4-a682-4280-b80f-141d36dd4f8e.jpg',0,'2021-03-16 12:03:26','2021-03-16 12:03:26'),(139,14,8,'Color rojo','Tarea cumplida','1615914227_IMG_20210316_114429_028.jpg',0,'2021-03-16 12:03:47','2021-03-16 12:03:47'),(140,19,7,'LA CRUZ','TAREA CUMPLIDA','1615914230_546f76ee-01e5-4964-a2ca-9af890ee413a.jpg',0,'2021-03-16 12:03:50','2021-03-16 12:03:50'),(141,19,7,'LA CRUZ','TAREA CUMPLIDA','1615914252_f85b3aed-695f-4dbd-94a5-ae8f55935c87.jpg',0,'2021-03-16 12:04:12','2021-03-16 12:04:12'),(142,14,9,'Línea recta','Tarea cumplida','1615914377_IMG_20210316_114345_135.jpg',0,'2021-03-16 12:06:17','2021-03-16 12:06:17'),(143,14,9,'Línea recta','Tarea cumplida','1615914412_IMG_20210316_114337_745.jpg',0,'2021-03-16 12:06:52','2021-03-16 12:06:52'),(144,14,9,'Línea recta','Tarea cumplida','1615914442_IMG_20210316_114332_337.jpg',0,'2021-03-16 12:07:22','2021-03-16 12:07:22'),(145,14,9,'Línea recta','Tarea cumplida','1615914493_IMG_20210316_114304_146.jpg',0,'2021-03-16 12:08:13','2021-03-16 12:08:13'),(146,43,18,'Uso del diccionario','Orden alfabetico','1615915017_16159149800037531052626431969135.jpg',0,'2021-03-16 12:16:57','2021-03-16 12:16:57'),(147,15,9,'vertical','tarea cumplida','1615915062_IMG-20210316-WA0083[1].jpg',0,'2021-03-16 12:17:42','2021-03-16 12:17:42'),(149,38,3,'Los sentidos','Dibuja y señala los sentidos del cuerpo','1615915147_1615915101256319455051950103802.jpg',0,'2021-03-16 12:19:07','2021-03-16 12:19:07'),(152,38,3,'De donde venimos','Trabajo en clase','1615915388_1615915357996961389616488713118.jpg',0,'2021-03-16 12:23:08','2021-03-16 12:23:08'),(154,43,18,'Uso del diccionario','Tarea de caleb','1615915458_16159154142074078104166025079284.jpg',0,'2021-03-16 12:24:18','2021-03-16 12:24:18'),(155,38,3,'Así nos desarrollamos','Etapas de la vida','1615915541_16159155181506932399335601137543.jpg',0,'2021-03-16 12:25:41','2021-03-16 12:25:41'),(158,36,11,'Activity','MILAN JUIPA HUACCHA','1615917520_WhatsApp Image 2021-03-15 at 11.13.31 AM.jpeg',0,'2021-03-16 12:58:40','2021-03-16 12:58:40'),(159,42,11,'Boys and girls','Boys and girls','1615917591_20210316_125113.jpg',0,'2021-03-16 12:59:51','2021-03-16 12:59:51'),(160,41,11,'Boys and girls','Boys and girls - Guía','1615917780_IMG_20210316_114332.jpg',0,'2021-03-16 13:03:00','2021-03-16 13:03:00'),(161,44,18,'El diccionario','Tarea','1615919032_16159189970234906451680252343402.jpg',0,'2021-03-16 13:23:52','2021-03-16 13:23:52'),(162,44,18,'El diccionario','Tarea cuaderno','1615919197_16159191684936272957931813111281.jpg',0,'2021-03-16 13:26:37','2021-03-16 13:26:37'),(163,44,18,'El diccionario','Tarea cuaderno','1615919251_16159192224585928597548661941544.jpg',0,'2021-03-16 13:27:32','2021-03-16 13:27:32'),(164,68,10,'tarea de comunicacion','tarea de pagina 32 y 33','1615919894_aa947041-9b91-4b86-b996-823e3e75d6a9.jpg',0,'2021-03-16 13:38:14','2021-03-16 13:38:14'),(167,64,19,'El poema','De syefanny','1615925454_16159254275182818278509895716405.jpg',0,'2021-03-16 15:10:54','2021-03-16 15:10:54'),(168,64,19,'El poema','De stefanny','1615925546_16159255044073777535181793707804.jpg',0,'2021-03-16 15:12:26','2021-03-16 15:12:26'),(169,64,19,'El poema','De stfanny','1615925586_16159255664037761060441640739055.jpg',0,'2021-03-16 15:13:06','2021-03-16 15:13:06'),(171,65,19,'El poema','De fabio','1615925739_16159257222492980500897993151658.jpg',0,'2021-03-16 15:15:39','2021-03-16 15:15:39'),(172,65,19,'El poema','De fabio','1615925762_16159257481754131328974793995525.jpg',0,'2021-03-16 15:16:02','2021-03-16 15:16:02'),(173,65,19,'El poema','De fabio','1615926229_16159262113825333391421907755990.jpg',0,'2021-03-16 15:23:49','2021-03-16 15:23:49'),(174,65,1,'Los primeros pobladores','De fabio','1615926826_1615926807802497867977989813931.jpg',0,'2021-03-16 15:33:46','2021-03-16 15:33:46'),(175,65,1,'Los primeros pobladores','De fabio','1615927055_16159270409519185939151072864626.jpg',0,'2021-03-16 15:37:35','2021-03-16 15:37:35'),(176,64,1,'Los primeros pobladores','De stefanny','1615927115_16159270999561204394875232738693.jpg',0,'2021-03-16 15:38:35','2021-03-16 15:38:35'),(177,64,1,'Los primeros pobladores','De stefanny','1615927146_16159271266857271956747073073996.jpg',0,'2021-03-16 15:39:06','2021-03-16 15:39:06'),(178,63,19,'Tarea','Poemas','1615931830_IMG_20210316_165111.jpg',0,'2021-03-16 16:57:10','2021-03-16 16:57:10'),(179,63,19,'Poemas','Parte 1','1615932205_IMG_20210316_164953_1.jpg',0,'2021-03-16 17:03:25','2021-03-16 17:03:25'),(180,63,19,'Poemas','Parte 2','1615932236_IMG_20210316_165003.jpg',0,'2021-03-16 17:03:56','2021-03-16 17:03:56'),(181,63,19,'Poemas','Parte 3','1615932261_IMG_20210316_165107.jpg',0,'2021-03-16 17:04:21','2021-03-16 17:04:21'),(182,63,19,'Poemas','Parte 4','1615932317_IMG_20210316_165111.jpg',0,'2021-03-16 17:05:17','2021-03-16 17:05:17'),(183,63,1,'Tarea de Personal','Foto 1','1615932453_IMG_20210316_165337.jpg',0,'2021-03-16 17:07:33','2021-03-16 17:07:33'),(184,63,1,'Tarea de Personal','Foto 2','1615932478_IMG_20210316_165351.jpg',0,'2021-03-16 17:07:58','2021-03-16 17:07:58'),(185,63,1,'Tarea de Personal','Foto 3','1615932505_IMG_20210316_165401.jpg',0,'2021-03-16 17:08:25','2021-03-16 17:08:25'),(186,70,10,'tarea de comunicación','aqui esta la primera hoja de la tarea miss','1615933161_1.jpeg',0,'2021-03-16 17:19:21','2021-03-16 17:19:21'),(187,70,10,'tarea de comunicación','la segunda parte','1615933196_2.jpeg',0,'2021-03-16 17:19:56','2021-03-16 17:19:56'),(188,70,10,'tarea de comunicación','tercera parte y ultima','1615933227_3.jpeg',0,'2021-03-16 17:20:27','2021-03-16 17:20:27'),(190,62,1,'LOS PRIMEROS POBLADORES','Los primeros peruanos','1615934570_IMG_20210316_173806_956.jpg',0,'2021-03-16 17:42:50','2021-03-16 17:42:50'),(191,62,1,'LOS PRIMEROS POBLADORES','Los primeros peruanos','1615934652_IMG_20210316_173739_858.jpg',0,'2021-03-16 17:44:12','2021-03-16 17:44:12'),(192,62,1,'LOS PRIMEROS POBLADORES','Los primeros peruanos','1615934698_IMG_20210316_173735_509.jpg',0,'2021-03-16 17:44:58','2021-03-16 17:44:58'),(193,62,1,'MODO DE VIDA DE LOS ANTGUOS PERUANOS','Tarea','1615934879_IMG_20210316_173822_348.jpg',0,'2021-03-16 17:47:59','2021-03-16 17:47:59'),(194,62,1,'MODO DE VIDA DE LOS ANTGUOS PERUANOS','Tarea','1615934920_IMG_20210316_173830_234.jpg',0,'2021-03-16 17:48:40','2021-03-16 17:48:40'),(195,62,1,'MODO DE VIDA DE LOS ANTGUOS PERUANOS','Tarea','1615934953_IMG_20210316_173839_463.jpg',0,'2021-03-16 17:49:13','2021-03-16 17:49:13'),(196,62,19,'El poema','Tarea','1615936058_IMG_20210316_180444_553.jpg',0,'2021-03-16 18:07:38','2021-03-16 18:07:38'),(197,62,19,'Poema','Tarea','1615936091_IMG_20210316_180634_873.jpg',0,'2021-03-16 18:08:11','2021-03-16 18:08:11'),(198,62,19,'Poema','Tarea','1615936461_IMG_20210316_181209_950.jpg',0,'2021-03-16 18:14:21','2021-03-16 18:14:21'),(199,63,1,'Tarea de los Primeros Pobladores','Tarea','1615937039_Tared de Personal social 15 de 2021.docx',0,'2021-03-16 18:23:59','2021-03-16 18:23:59'),(200,62,19,'Poema','Tarea','1615937615_IMG_20210316_183250_465.jpg',0,'2021-03-16 18:33:35','2021-03-16 18:33:35'),(201,17,8,'Rasgado','Comunicacion','1615938295_20210316_111153.jpg',0,'2021-03-16 18:44:55','2021-03-16 18:44:55'),(202,16,8,'COLOR ROJO','TAREA CUMPLIDA MISS','1615946159_WhatsApp Image 2021-03-16 at 11.54.26 AM.jpeg',0,'2021-03-16 20:55:59','2021-03-16 20:55:59'),(203,16,8,'COLOR ROJO','TAREA CUMPLIDA','1615946267_WhatsApp Image 2021-03-16 at 11.58.56 AM.jpeg',0,'2021-03-16 20:57:47','2021-03-16 20:57:47'),(204,16,8,'COLOR ROJO','TAREA CUMPLIDA','1615946268_WhatsApp Image 2021-03-16 at 11.58.56 AM.jpeg',0,'2021-03-16 20:57:48','2021-03-16 20:57:48'),(205,16,9,'TRAZOS','TAREA CUMPLIDA MISS','1615946597_WhatsApp Image 2021-03-16 at 11.35.02 AM (1).jpeg',0,'2021-03-16 21:03:17','2021-03-16 21:03:17'),(206,16,9,'TRAZOS','TAREA CUMPLIDA MISS','1615946620_WhatsApp Image 2021-03-16 at 11.55.29 AM.jpeg',0,'2021-03-16 21:03:40','2021-03-16 21:03:40'),(207,16,9,'TRAZOS','TAREA CUMPLIDA MISS','1615947648_WhatsApp Image 2021-03-16 at 12.01.41 PM.jpeg',0,'2021-03-16 21:20:48','2021-03-16 21:20:48'),(208,16,9,'TRAZOS','TAREA CUMPLIDA MISS','1615947684_WhatsApp Image 2021-03-16 at 12.01.02 PM.jpeg',0,'2021-03-16 21:21:24','2021-03-16 21:21:24'),(209,16,9,'TRAZOS','TAREA CUMPLIDA MISS','1615947707_WhatsApp Image 2021-03-16 at 12.00.14 PM.jpeg',0,'2021-03-16 21:21:47','2021-03-16 21:21:47'),(210,39,42,'Grande , mediano y pequeño','Tarea de María  Cristina López','1615990067_IMG-20210317-WA0009.jpeg',0,'2021-03-17 09:07:47','2021-03-17 09:07:47'),(212,38,41,'Primero- último/   pequeño - grande - mediano','Me pareció fácil','1615990591_16159905671488422957571766461334.jpg',0,'2021-03-17 09:16:31','2021-03-17 09:16:31'),(213,38,41,'Practicamos lo aprendido','Me pareció divertido dibujar','1615990659_16159906256492480681464467168719.jpg',0,'2021-03-17 09:17:39','2021-03-17 09:17:39'),(214,42,41,'Noción espacial','Increíble','1615990801_20210317_090855.jpg',0,'2021-03-17 09:20:01','2021-03-17 09:20:01'),(215,38,42,'Noción - espacial','Me gustó la clase','1615990900_16159908744216243545894386683173.jpg',0,'2021-03-17 09:21:40','2021-03-17 09:21:40'),(216,42,41,'Primero -  Último','Bueno','1615990902_20210317_091801.jpg',0,'2021-03-17 09:21:42','2021-03-17 09:21:42'),(217,42,41,'Primero -  Último','Muy Bueno','1615990916_20210317_091801.jpg',0,'2021-03-17 09:21:56','2021-03-17 09:21:56'),(220,40,41,'Primero- último / mediano -pequeño- grande','Comprendió muy bien la explicación del tema. Página 14','1615990978_16159908954646123626162907665357.jpg',0,'2021-03-17 09:22:58','2021-03-17 09:22:58'),(227,42,41,'Practicamos lo aprendido','Muy bueno','1615991000_20210317_091808.jpg',0,'2021-03-17 09:23:20','2021-03-17 09:23:20'),(239,37,41,'Ficha 1','pagina 13','1615991129_1.jpg',0,'2021-03-17 09:25:29','2021-03-17 09:25:29'),(240,40,41,'Primero- último / mediano -pequeño- grande','Practicando lo aprendido página 14','1615991131_16159911083858441892393467195565.jpg',0,'2021-03-17 09:25:31','2021-03-17 09:25:31'),(241,37,41,'Ficha 2','Pagina 14','1615991155_2.jpg',0,'2021-03-17 09:25:55','2021-03-17 09:25:55'),(242,37,41,'Cuaderno','cuaderno','1615991188_3.jpg',0,'2021-03-17 09:26:28','2021-03-17 09:26:28'),(243,40,41,'Primero- último / mediano -pequeño- grande','Tarea del cuaderno .. clase entendía. Gracias','1615991197_16159911592707196342497684366487.jpg',0,'2021-03-17 09:26:37','2021-03-17 09:26:37'),(244,39,41,'Grande , mediano y pequeño','Maria Cristina López','1615992048_IMG-20210317-WA0009.jpeg',0,'2021-03-17 09:40:48','2021-03-17 09:40:48'),(245,39,41,'Primero y ultimo','María Cristina López','1615992110_16159920719588213793925299866857.jpg',0,'2021-03-17 09:41:50','2021-03-17 09:41:50'),(246,41,41,'Nocion - espacial','Aprendimos donde la ubicación','1615992161_IMG_20210317_080412.jpg',0,'2021-03-17 09:42:41','2021-03-17 09:42:41'),(247,41,41,'Nocion - espacial','Aprendimos donde estamos y la ubicación','1615992242_IMG_20210317_080412.jpg',0,'2021-03-17 09:44:02','2021-03-17 09:44:02'),(248,41,41,'Nocion - espacial','Aprendimos donde estamos y la ubicación','1615992285_IMG_20210317_080412.jpg',0,'2021-03-17 09:44:45','2021-03-17 09:44:45'),(249,39,41,'Primero y ultimo','Maria Cristina López','1615992295_20210317_094235.jpg',0,'2021-03-17 09:44:55','2021-03-17 09:44:55'),(250,41,42,'Primero _ultimo','Aprendimos identificar el orden','1615992701_IMG_20210317_082652.jpg',0,'2021-03-17 09:51:41','2021-03-17 09:51:41'),(251,37,35,'Página 21','Página 21 de la ficha','1615993513_IMG_20210317_100325133.jpg',0,'2021-03-17 10:05:13','2021-03-17 10:05:13'),(252,37,35,'Página 22','Página 22 de la ficha','1615993541_IMG_20210317_100333021.jpg',0,'2021-03-17 10:05:41','2021-03-17 10:05:41'),(253,37,35,'Página 23','Página 23 de la ficha','1615993573_IMG_20210317_100345525.jpg',0,'2021-03-17 10:06:13','2021-03-17 10:06:13'),(254,37,35,'Página 24','Página 24 de la ficha','1615993603_IMG_20210317_100355729.jpg',0,'2021-03-17 10:06:43','2021-03-17 10:06:43'),(255,37,35,'Página 25','Página 25 de la ficha','1615993633_IMG_20210317_100401998.jpg',0,'2021-03-17 10:07:13','2021-03-17 10:07:13'),(256,39,35,'Formamos palabras','María Cristina López','1615993932_20210317_101106.jpg',0,'2021-03-17 10:12:12','2021-03-17 10:12:12'),(257,38,35,'La letra M','Aprendí','1615994171_16159941364977477772039984073412.jpg',0,'2021-03-17 10:16:11','2021-03-17 10:16:11'),(258,38,35,'Letra M','Me pareció muy interesante','1615994221_16159942005166204194740344304030.jpg',0,'2021-03-17 10:17:01','2021-03-17 10:17:01'),(259,38,35,'Letra M','Me pareció muy interesante','1615994268_16159942451181136318377564468481.jpg',0,'2021-03-17 10:17:48','2021-03-17 10:17:48'),(260,38,35,'Letra M','Me pareció muy bonito el tema','1615994305_16159942848507651623744643486936.jpg',0,'2021-03-17 10:18:25','2021-03-17 10:18:25'),(261,38,35,'Unión de sílaba','Me pareció muy bonito el tema','1615994367_16159943445678636005704246146154.jpg',0,'2021-03-17 10:19:27','2021-03-17 10:19:27'),(262,38,35,'Unión de sílaba','Me pareció bonito el tema','1615994444_16159944220252680139198766423531.jpg',0,'2021-03-17 10:20:44','2021-03-17 10:20:44'),(263,40,35,'La letra M','Desarrollamos las páginas del 20 hasta el 25... Tema aprendido .Gracias','1615994511_20210317_101724.heic',0,'2021-03-17 10:21:51','2021-03-17 10:21:51'),(264,42,35,'Actividad 1','Leo con mucha dificultad.','1615994579_20210317_100741.jpg',0,'2021-03-17 10:22:59','2021-03-17 10:22:59'),(265,42,35,'Actividad 2','Leo con mucha dificultad.','1615994633_20210317_100748.jpg',0,'2021-03-17 10:23:53','2021-03-17 10:23:53'),(266,40,35,'La letra M','Página 24','1615994640_16159946086513543666676234034355.jpg',0,'2021-03-17 10:24:00','2021-03-17 10:24:00'),(267,40,35,'La letra M','Página 24','1615994651_16159946086513543666676234034355.jpg',0,'2021-03-17 10:24:11','2021-03-17 10:24:11'),(268,42,35,'Actividad 3','Leo con mucha dificultad.','1615994666_20210317_101326.jpg',0,'2021-03-17 10:24:26','2021-03-17 10:24:26'),(269,42,35,'Actividad 4','Leo con mucha dificultad.','1615994701_20210317_101346.jpg',0,'2021-03-17 10:25:01','2021-03-17 10:25:01'),(270,40,35,'La letra M','Página 24 . Tema aprendido..¡ gracias !','1615994769_16159947428683412862033208106125.jpg',0,'2021-03-17 10:26:09','2021-03-17 10:26:09'),(271,21,36,'vocal i','TAREA CUMPLIDA','1615998321_40f02c4e-ab32-489f-a84d-816fcb14556c.jpg',0,'2021-03-17 11:25:21','2021-03-17 11:25:21'),(272,21,36,'VOCAL I','TAREA CUMPLIDA','1615998378_b68bf537-fd50-4c30-ba5e-2801740163cf.jpg',0,'2021-03-17 11:26:18','2021-03-17 11:26:18'),(273,21,36,'VOCAL I','TAREA CUMPLIDA','1615998402_9629e3a4-ac46-45d3-afab-1d8a9f7649dd.jpg',0,'2021-03-17 11:26:42','2021-03-17 11:26:42'),(274,18,36,'La vocal i','Tarea cumplida!! Miss Marilyn','1615999366_20210317_113638_mfnr.jpg',0,'2021-03-17 11:42:46','2021-03-17 11:42:46'),(275,14,36,'Vocal i','Tarea cumplida','1615999639_IMG_20210317_114330_578.jpg',0,'2021-03-17 11:47:19','2021-03-17 11:47:19'),(276,18,36,'La vocal i','Tarea cumplida!! Miss Marilyn','1615999699_20210317_113655_mfnr.jpg',0,'2021-03-17 11:48:19','2021-03-17 11:48:19'),(277,14,36,'Vocal i','Tarea cumplida','1615999729_IMG_20210317_114242_397.jpg',0,'2021-03-17 11:48:49','2021-03-17 11:48:49'),(278,15,36,'letra I','tarea cumplida','1615999774_20210317_114039[1].jpg',0,'2021-03-17 11:49:34','2021-03-17 11:49:34'),(279,14,36,'Vocal i','Tarea cumplida','1615999815_IMG_20210317_114223_969.jpg',0,'2021-03-17 11:50:15','2021-03-17 11:50:15'),(280,14,36,'Vocal i','Tarea cumplida','1615999860_IMG_20210317_114401_323.jpg',0,'2021-03-17 11:51:00','2021-03-17 11:51:00'),(281,14,36,'Vocal i','Tarea cumplida','1615999915_IMG_20210317_114349_237.jpg',0,'2021-03-17 11:51:55','2021-03-17 11:51:55'),(282,18,36,'La vocal i','Tarea cumplida!!!','1615999939_20210317_113712_mfnr.jpg',0,'2021-03-17 11:52:19','2021-03-17 11:52:19'),(283,14,36,'Vocal i','Tarea cumplida','1616000004_IMG_20210317_114413_452.jpg',0,'2021-03-17 11:53:24','2021-03-17 11:53:24'),(284,18,36,'La vocal i','Tarea cumplida!!!','1616000009_20210317_113731_mfnr.jpg',0,'2021-03-17 11:53:29','2021-03-17 11:53:29'),(285,18,36,'La vocal i','Tarea cumplida!!!','1616000055_20210317_113755_mfnr.jpg',0,'2021-03-17 11:54:15','2021-03-17 11:54:15'),(286,18,36,'La vocal i','Tarea cumplida!!! 🥳','1616000147_20210317_113823_mfnr.jpg',0,'2021-03-17 11:55:47','2021-03-17 11:55:47'),(287,18,36,'La vocal i','Tarea cumplida!!!','1616000248_20210317_113755_mfnr.jpg',0,'2021-03-17 11:57:28','2021-03-17 11:57:28'),(288,48,27,'3 r','Tarea','1616000334_20210317_115816.jpg',0,'2021-03-17 11:58:54','2021-03-17 11:58:54'),(289,18,36,'La vocal i','Tarea cumplida!! Miss Marilyn','1616000381_20210317_113837_mfnr.jpg',0,'2021-03-17 11:59:41','2021-03-17 11:59:41'),(290,17,36,'Comunicacion','Vocal i','1616000394_20210317_115721.jpg',0,'2021-03-17 11:59:54','2021-03-17 11:59:54'),(291,17,36,'Comunicacion','Vocal i','1616000416_20210317_115656.jpg',0,'2021-03-17 12:00:16','2021-03-17 12:00:16'),(292,17,36,'Comunicacion','Vocal i','1616000440_20210317_115637.jpg',0,'2021-03-17 12:00:40','2021-03-17 12:00:40'),(293,15,36,'letra I','tarea cumplida','1616000441_IMG-20210317-WA0016[1].jpg',0,'2021-03-17 12:00:41','2021-03-17 12:00:41'),(294,48,28,'Cuerpo humano','Tarea','1616000462_20210317_115553.jpg',0,'2021-03-17 12:01:02','2021-03-17 12:01:02'),(295,17,36,'Comunicacion','Vocal i','1616000464_20210317_115545.jpg',0,'2021-03-17 12:01:04','2021-03-17 12:01:04'),(296,17,36,'Comunicacion','Vocal i','1616000492_20210317_115241.jpg',0,'2021-03-17 12:01:32','2021-03-17 12:01:32'),(297,17,36,'Comunicacion','Vocal i','1616000519_20210317_115004.jpg',0,'2021-03-17 12:01:59','2021-03-17 12:01:59'),(298,48,28,'Cuerpo humano','Tarea','1616000521_20210317_115613.jpg',0,'2021-03-17 12:02:01','2021-03-17 12:02:01'),(299,48,28,'Cuerpo humano','Tarea','1616000546_20210317_115620.jpg',0,'2021-03-17 12:02:26','2021-03-17 12:02:26'),(300,48,28,'Cuerpo humano','Tarea','1616000596_20210317_115627.jpg',0,'2021-03-17 12:03:16','2021-03-17 12:03:16'),(301,17,36,'Ciencia y ambiente','Habitos de aseo','1616000615_20210317_115158.jpg',0,'2021-03-17 12:03:35','2021-03-17 12:03:35'),(302,15,36,'letra I','tarea cumplida','1616000625_IMG-20210317-WA0011[1].jpg',0,'2021-03-17 12:03:45','2021-03-17 12:03:45'),(303,48,28,'Cuerpo humano','Tarea','1616000681_20210317_115634.jpg',0,'2021-03-17 12:04:41','2021-03-17 12:04:41'),(304,48,29,'Etapas','Tarea','1616000726_20210317_115639.jpg',0,'2021-03-17 12:05:26','2021-03-17 12:05:26'),(305,48,29,'Etapas','Tarea','1616000756_20210317_115650.jpg',0,'2021-03-17 12:05:56','2021-03-17 12:05:56'),(306,15,36,'letra I','tarea cumplida','1616000891_IMG-20210317-WA0014[1].jpg',0,'2021-03-17 12:08:11','2021-03-17 12:08:11'),(307,48,26,'Normas','Tarea','1616000912_20210317_120701.jpg',0,'2021-03-17 12:08:32','2021-03-17 12:08:32'),(308,48,26,'Normas','Tarea','1616000939_20210317_120714.jpg',0,'2021-03-17 12:08:59','2021-03-17 12:08:59'),(309,16,36,'vocal i','tarea cumplida','1616000949_WhatsApp Image 2021-03-17 at 11.51.49 AM.jpeg',0,'2021-03-17 12:09:09','2021-03-17 12:09:09'),(310,48,26,'Etapas','Tarea','1616000964_20210317_120735.jpg',0,'2021-03-17 12:09:24','2021-03-17 12:09:24'),(311,16,36,'vocal i','tarea cumplida','1616000973_WhatsApp Image 2021-03-17 at 11.51.49 AM (1).jpeg',0,'2021-03-17 12:09:33','2021-03-17 12:09:33'),(312,16,36,'vocal i','tarea cumplida','1616000999_WhatsApp Image 2021-03-17 at 11.51.50 AM (1).jpeg',0,'2021-03-17 12:09:59','2021-03-17 12:09:59'),(313,15,36,'letra I','tarea cumplida','1616000999_IMG-20210317-WA0012[1].jpg',0,'2021-03-17 12:09:59','2021-03-17 12:09:59'),(314,48,26,'Normas','Tarea','1616001001_20210317_120744.jpg',0,'2021-03-17 12:10:01','2021-03-17 12:10:01'),(315,16,36,'vocal i','tarea cumplida','1616001090_WhatsApp Image 2021-03-17 at 11.51.50 AM (2).jpeg',0,'2021-03-17 12:11:30','2021-03-17 12:11:30'),(316,16,36,'vocal i','tarea cumplida','1616001149_WhatsApp Image 2021-03-17 at 11.51.50 AM (3).jpeg',0,'2021-03-17 12:12:29','2021-03-17 12:12:29'),(317,15,36,'letra I','tarea cumplida','1616001168_IMG-20210317-WA0013[1].jpg',0,'2021-03-17 12:12:48','2021-03-17 12:12:48'),(318,16,36,'vocal i','tarea cumplida','1616001184_WhatsApp Image 2021-03-17 at 11.51.51 AM.jpeg',0,'2021-03-17 12:13:04','2021-03-17 12:13:04'),(319,44,26,'Normas de convivencia en el aula virtual','Tarea','1616002018_IMG_20210317_122522.jpg',0,'2021-03-17 12:26:58','2021-03-17 12:26:58'),(320,44,26,'Normas de convivencia en el aula virtual','Tarea','1616002057_IMG_20210317_122600.jpg',0,'2021-03-17 12:27:37','2021-03-17 12:27:37'),(321,44,29,'Etapas del desarrollo','Tarea del libro','1616003153_16160031274634157317458751701487.jpg',0,'2021-03-17 12:45:53','2021-03-17 12:45:53'),(322,44,29,'Etapas del desarrollo','Tarea del libro','1616003199_16160031747463668221301074725592.jpg',0,'2021-03-17 12:46:39','2021-03-17 12:46:39'),(323,47,18,'Diccionario','Tarea gabriela','1616003245_IMG-20210317-WA0012.jpg',0,'2021-03-17 12:47:25','2021-03-17 12:47:25'),(324,47,18,'Diccionario','Gabriela','1616003269_IMG-20210317-WA0016.jpg',0,'2021-03-17 12:47:49','2021-03-17 12:47:49'),(325,47,18,'Diccionario','Gabriela','1616003291_IMG-20210317-WA0015.jpg',0,'2021-03-17 12:48:11','2021-03-17 12:48:11'),(326,47,18,'Diccionario','Gabriela','1616003312_IMG-20210317-WA0014.jpg',0,'2021-03-17 12:48:32','2021-03-17 12:48:32'),(327,44,28,'El maravilloso cuerpo humano','Tarea cuaderno','1616003357_IMG_20210316_113021.jpg',0,'2021-03-17 12:49:17','2021-03-17 12:49:17'),(328,43,28,'El maravilloso cuerpo humano','Tarea de caleb','1616003903_16160038630439150834106792897684.jpg',0,'2021-03-17 12:58:23','2021-03-17 12:58:23'),(329,43,28,'El maravilloso cuerpo humano','Tarea de caleb','1616003952_16160039272193717989465234309105.jpg',0,'2021-03-17 12:59:12','2021-03-17 12:59:12'),(330,43,28,'El maravilloso cuerpo humano','Tarea de caleb','1616003986_16160039685578986301012044036263.jpg',0,'2021-03-17 12:59:46','2021-03-17 12:59:46'),(331,43,28,'El maravilloso cuerpo humano','Tarea de caleb','1616004291_16160042735822079648410119596314.jpg',0,'2021-03-17 13:04:51','2021-03-17 13:04:51'),(332,68,10,'tarea pa 36 y 37','josue','1616008215_175f2981-7480-45d6-a16b-2b10a1b8b3aa.jpg',0,'2021-03-17 14:10:15','2021-03-17 14:10:15'),(333,49,18,'El diccionario','Tarea','1616009724_IMG_20210316_104430303.jpg',0,'2021-03-17 14:35:24','2021-03-17 14:35:24'),(334,49,18,'El diccionario','Tarea','1616009907_IMG_20210316_104438733.jpg',0,'2021-03-17 14:38:27','2021-03-17 14:38:27'),(335,49,18,'El diccionario','Tarea','1616009953_IMG_20210316_104444241.jpg',0,'2021-03-17 14:39:13','2021-03-17 14:39:13'),(336,49,18,'El diccionario','Tarea','1616009985_IMG_20210316_104450601.jpg',0,'2021-03-17 14:39:45','2021-03-17 14:39:45'),(337,49,18,'El diccionario','Tarea','1616010016_IMG_20210316_104516460.jpg',0,'2021-03-17 14:40:16','2021-03-17 14:40:16'),(338,49,18,'El diccionario','Tarea','1616010044_IMG_20210316_104524829.jpg',0,'2021-03-17 14:40:44','2021-03-17 14:40:44'),(339,49,18,'El diccionario','Tarea','1616010072_IMG_20210316_104532254.jpg',0,'2021-03-17 14:41:12','2021-03-17 14:41:12'),(340,49,18,'El abecedario','Tarea','1616010735_IMG_20210315_105727663.jpg',0,'2021-03-17 14:52:15','2021-03-17 14:52:15'),(341,49,18,'El abecedario','Tarea','1616010765_IMG_20210315_105734272.jpg',0,'2021-03-17 14:52:45','2021-03-17 14:52:45'),(342,49,18,'El abecedario','Tarea','1616010785_IMG_20210315_111057656.jpg',0,'2021-03-17 14:53:05','2021-03-17 14:53:05'),(343,49,18,'Mi biografía','Tarea','1616010887_IMG_20210311_130102516.jpg',0,'2021-03-17 14:54:47','2021-03-17 14:54:47'),(344,49,18,'Mi biografía','Tarea','1616010920_IMG_20210311_130125779.jpg',0,'2021-03-17 14:55:20','2021-03-17 14:55:20'),(345,49,18,'Mi biografía','Tarea','1616010945_IMG_20210311_130122300.jpg',0,'2021-03-17 14:55:45','2021-03-17 14:55:45'),(346,36,35,'Libro pag 20','Milan Juipa','1616011782_WhatsApp Image 2021-03-17 at 3.07.31 PM.jpeg',0,'2021-03-17 15:09:42','2021-03-17 15:09:42'),(347,36,35,'Libro pag 21','Milan Juipa','1616011807_WhatsApp Image 2021-03-17 at 3.07.32 PM.jpeg',0,'2021-03-17 15:10:07','2021-03-17 15:10:07'),(348,36,35,'Libro pag 22','Milan Juipa','1616011823_WhatsApp Image 2021-03-17 at 3.07.32 PM (1).jpeg',0,'2021-03-17 15:10:23','2021-03-17 15:10:23'),(349,36,35,'Libro pag 23','Milan Juipa','1616011849_WhatsApp Image 2021-03-17 at 3.07.33 PM.jpeg',0,'2021-03-17 15:10:49','2021-03-17 15:10:49'),(350,36,35,'Libro pag 24','Milan Juipa','1616011864_WhatsApp Image 2021-03-17 at 3.07.33 PM (1).jpeg',0,'2021-03-17 15:11:04','2021-03-17 15:11:04'),(351,36,35,'Libro pag 25','Milan Juipa','1616011879_WhatsApp Image 2021-03-17 at 3.07.34 PM.jpeg',0,'2021-03-17 15:11:19','2021-03-17 15:11:19'),(352,36,41,'Noción espacial','Milan Juipa','1616012012_WhatsApp Image 2021-03-17 at 3.12.21 PM.jpeg',0,'2021-03-17 15:13:32','2021-03-17 15:13:32'),(353,36,41,'Grande/Mediano/Pequeño','Milan Juipa','1616012049_WhatsApp Image 2021-03-17 at 3.12.22 PM.jpeg',0,'2021-03-17 15:14:09','2021-03-17 15:14:09'),(354,36,41,'Guía pag 14','Milan Juipa','1616012243_WhatsApp Image 2021-03-17 at 3.15.10 PM.jpeg',0,'2021-03-17 15:17:23','2021-03-17 15:17:23'),(355,36,41,'Guía pag 20','Milan Juipa','1616012265_WhatsApp Image 2021-03-17 at 3.15.27 PM.jpeg',0,'2021-03-17 15:17:45','2021-03-17 15:17:45'),(356,69,10,'Elementos de la comunicacion','Invesrigacion','1616013258_IMG_20210317_152854.jpg',0,'2021-03-17 15:34:18','2021-03-17 15:34:18'),(357,69,10,'Elementos de la comunicacion','Investigación','1616013389_IMG_20210317_153229.jpg',0,'2021-03-17 15:36:29','2021-03-17 15:36:29'),(358,69,10,'Elementos de la comunicacion','Investigación','1616013468_IMG_20210317_153202.jpg',0,'2021-03-17 15:37:48','2021-03-17 15:37:48'),(359,69,10,'Elementos de la comunicacion','Investigación','1616013600_IMG_20210317_153243.jpg',0,'2021-03-17 15:40:00','2021-03-17 15:40:00'),(360,53,16,'Tarea de inglés','Miercoles 17 de marzo','1616013933_16160138584624338286396119615829.jpg',0,'2021-03-17 15:45:33','2021-03-17 15:45:33'),(361,67,10,'Elementos de la comunicación','Tarea','1616016339_16160162986427751568487263544121.jpg',0,'2021-03-17 16:25:39','2021-03-17 16:25:39'),(362,67,10,'Elementos de la comunicación','Tarea','1616016400_16160163744616822457064302999908.jpg',0,'2021-03-17 16:26:40','2021-03-17 16:26:40'),(363,67,10,'Elementos de la comunicación','Tarea pendiente','1616016469_16160164438988421631971820105016.jpg',0,'2021-03-17 16:27:49','2021-03-17 16:27:49'),(364,67,10,'Elementos de la comunicación','Tarea pendiente','1616016514_16160164963912342786445126287071.jpg',0,'2021-03-17 16:28:34','2021-03-17 16:28:34'),(365,67,10,'Elementos de la comunicación','Tarea .dibujos tipos de comunicación','1616016631_16160165869639049756482264368361.jpg',0,'2021-03-17 16:30:31','2021-03-17 16:30:31'),(366,34,41,'Primero-ultimo','Le gustó mucho los vídeos','1616020258_16160202375455745695461988600068.jpg',0,'2021-03-17 17:30:58','2021-03-17 17:30:58'),(367,34,41,'Primero-ultimo','Le gustó el tema','1616020305_20210317_172708.jpg',0,'2021-03-17 17:31:45','2021-03-17 17:31:45'),(368,34,41,'Primero-ultimo','Le gusto mucho','1616020337_20210317_172648.jpg',0,'2021-03-17 17:32:17','2021-03-17 17:32:17'),(369,34,42,'Nos ubicamos en el espacio','...','1616021354_16160213266858151701587291606795.jpg',0,'2021-03-17 17:49:14','2021-03-17 17:49:14'),(370,34,42,'Nos ubicamos en el espacio','...','1616021446_16160214012455698286221642208855.jpg',0,'2021-03-17 17:50:46','2021-03-17 17:50:46'),(371,34,42,'Derecha izquierda','...','1616021553_16160215362318264084737935410311.jpg',0,'2021-03-17 17:52:33','2021-03-17 17:52:33'),(372,34,42,'Derecha izquierda','...','1616021592_16160215735846564134511589705863.jpg',0,'2021-03-17 17:53:12','2021-03-17 17:53:12'),(373,34,42,'Derecha izquierda ...','...','1616021622_16160216058896499588274327750402.jpg',0,'2021-03-17 17:53:42','2021-03-17 17:53:42'),(374,45,45,'days of the week','entendi el tema','1616021926_WhatsApp Image 2021-03-17 at 5.53.12 PM.jpeg',0,'2021-03-17 17:58:46','2021-03-17 17:58:46'),(375,45,45,'days of the week','comprendi todo .','1616021979_WhatsApp Image 2021-03-17 at 5.53.12 PM (1).jpeg',0,'2021-03-17 17:59:39','2021-03-17 17:59:39'),(376,45,45,'days of the week','entendi todo','1616022009_WhatsApp Image 2021-03-17 at 5.53.12 PM (2).jpeg',0,'2021-03-17 18:00:09','2021-03-17 18:00:09'),(377,45,45,'days of the week','se entendio todo','1616022067_WhatsApp Image 2021-03-17 at 5.53.13 PM (1).jpeg',0,'2021-03-17 18:01:07','2021-03-17 18:01:07'),(378,45,45,'days of the week','comprendi todo','1616022162_WhatsApp Image 2021-03-17 at 5.53.13 PM.jpeg',0,'2021-03-17 18:02:42','2021-03-17 18:02:42'),(379,34,42,'Encima  de _ debajo de','...','1616022350_16160223326638236670457658625.jpg',0,'2021-03-17 18:05:50','2021-03-17 18:05:50'),(380,34,42,'Dentro _fuera','...','1616022402_16160223754173271374924003191658.jpg',0,'2021-03-17 18:06:42','2021-03-17 18:06:42'),(381,34,42,'Delante _ detras','...','1616022504_16160224819396682556608721318322.jpg',0,'2021-03-17 18:08:24','2021-03-17 18:08:24'),(382,34,42,'Adelante _ atrás','...','1616022552_16160225351073279308828746529061.jpg',0,'2021-03-17 18:09:12','2021-03-17 18:09:12'),(383,34,42,'Arriba _ abajo','..','1616022591_1616022567095820036907424485142.jpg',0,'2021-03-17 18:09:51','2021-03-17 18:09:51'),(384,34,42,'Arriba _ abajo','..','1616022624_16160226048796706961916269973398.jpg',0,'2021-03-17 18:10:24','2021-03-17 18:10:24'),(385,34,42,'Cerca _ lejos','N.','1616022660_1616022639862457436983115898054.jpg',0,'2021-03-17 18:11:00','2021-03-17 18:11:00'),(386,34,42,'Lateralidad','😀','1616022720_16160226881063879575853527777161.jpg',0,'2021-03-17 18:12:00','2021-03-17 18:12:00'),(387,34,42,'Lateralidad','Bonito tema','1616022754_1616022734997109071427203593928.jpg',0,'2021-03-17 18:12:34','2021-03-17 18:12:34'),(388,34,42,'Arriba abajo','..','1616022797_16160227713522343986315369125582.jpg',0,'2021-03-17 18:13:17','2021-03-17 18:13:17'),(389,51,18,'EL DICCIONARIO','Significado del diccionario, desarrollo pág, 28 y 31.','1616022822_comu,2.jpeg',0,'2021-03-17 18:13:42','2021-03-17 18:13:42'),(390,34,42,'Resolviendo','..','1616022869_16160228485655458776665404106949.jpg',0,'2021-03-17 18:14:29','2021-03-17 18:14:29'),(391,34,42,'Nociones espaciales','...','1616022904_16160228845486555773392288231004.jpg',0,'2021-03-17 18:15:04','2021-03-17 18:15:04'),(392,51,18,'EL DICCIONARIO','tarea pág, 28 y 31','1616022944_comu.3.jpeg',0,'2021-03-17 18:15:44','2021-03-17 18:15:44'),(393,51,18,'EL DICCIONARIO','tarea pág, 28 y 31.','1616022980_comu.4.jpeg',0,'2021-03-17 18:16:20','2021-03-17 18:16:20'),(394,34,11,'I AM','Girl','1616023075_16160230368427391867577001967652.jpg',0,'2021-03-17 18:17:55','2021-03-17 18:17:55'),(395,34,11,'Names','Daleshka','1616023213_16160231840552882675196805725122.jpg',0,'2021-03-17 18:20:13','2021-03-17 18:20:13'),(396,34,11,'Activity','..','1616023276_16160232419061676063052716862456.jpg',0,'2021-03-17 18:21:16','2021-03-17 18:21:16'),(397,45,28,'El maravilloso cuerpo humano','comprendi todo .','1616023351_WhatsApp Image 2021-03-17 at 6.19.12 PM.jpeg',0,'2021-03-17 18:22:31','2021-03-17 18:22:31'),(398,34,3,'Nuestro cuerpo','Bonito tema','1616023392_16160233626855657783112135818085.jpg',0,'2021-03-17 18:23:12','2021-03-17 18:23:12'),(399,34,25,'De dónde venimos','..','1616023494_16160234665906116234926825289020.jpg',0,'2021-03-17 18:24:54','2021-03-17 18:24:54'),(400,34,25,'Así nos desarrollamos','Niñez .n','1616023541_16160235200785595421490381084539.jpg',0,'2021-03-17 18:25:41','2021-03-17 18:25:41'),(401,34,25,'Desarrollo del ser humano','La etapassss','1616023587_16160235655102119594054920587080.jpg',0,'2021-03-17 18:26:27','2021-03-17 18:26:27'),(402,34,35,'Identifico  relaciono y dibujo','...','1616023762_1616023734389662037833606924554.jpg',0,'2021-03-17 18:29:22','2021-03-17 18:29:22'),(403,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616023780_POEMA - 1.jpg',0,'2021-03-17 18:29:40','2021-03-17 18:29:40'),(404,34,35,'Identifico  relaciono y dibujo','Lindo tema miss','1616023814_16160237755807684894508121790514.jpg',0,'2021-03-17 18:30:14','2021-03-17 18:30:14'),(405,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616023824_INGLES 2.jpg',0,'2021-03-17 18:30:24','2021-03-17 18:30:24'),(406,45,29,'Etapas del desarrollo humano','comprendi todo','1616023837_WhatsApp Image 2021-03-17 at 6.28.07 PM.jpeg',0,'2021-03-17 18:30:37','2021-03-17 18:30:37'),(407,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616023859_POEMA 3.jpg',0,'2021-03-17 18:30:59','2021-03-17 18:30:59'),(408,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616023873_POEMA 4.jpg',0,'2021-03-17 18:31:13','2021-03-17 18:31:13'),(409,34,35,'Fomena M m','M m','1616023903_16160238739347259421079466996499.jpg',0,'2021-03-17 18:31:43','2021-03-17 18:31:43'),(410,34,35,'Dictado','Me gusta el dictado','1616023987_16160239361305475751736910548930.jpg',0,'2021-03-17 18:33:07','2021-03-17 18:33:07'),(411,34,35,'La letra M','..','1616024023_16160240046711381943607325855550.jpg',0,'2021-03-17 18:33:43','2021-03-17 18:33:43'),(412,34,35,'Actividad','..','1616024084_16160240485975019502413528551718.jpg',0,'2021-03-17 18:34:44','2021-03-17 18:34:44'),(413,34,35,'Actividad','..','1616024128_16160241014992955843663374998800.jpg',0,'2021-03-17 18:35:28','2021-03-17 18:35:28'),(414,51,29,'ETAPAS DEL DESARROLLO HUMANO','Etapa prenatal, la infancia, la niñez, la adolescencia, la juventud y la adultez.','1616025264_c y t..1.jpeg',0,'2021-03-17 18:54:24','2021-03-17 18:54:24'),(415,51,29,'ETAPAS DEL DESARROLLO HUMANO','Etapa prenatal, la infancia, la niñez, la adolescencia, la juventud y la adultez.','1616025282_c y t 2.jpeg',0,'2021-03-17 18:54:42','2021-03-17 18:54:42'),(416,51,29,'ETAPAS DEL DESARROLLO HUMANO','Etapa prenatal, la infancia, la niñez, la adolescencia, la juventud y la adultez.','1616025300_c y t 3.jpeg',0,'2021-03-17 18:55:00','2021-03-17 18:55:00'),(417,51,28,'EL maravillosos cuerpo humano','ciclo de vida y tarea del libro','1616026748_cuerpo humano.jpeg',0,'2021-03-17 19:19:08','2021-03-17 19:19:08'),(418,51,28,'EL CUERPO HUMANO','Tarea del libro pág.. 29 y 30','1616026803_c y t. libro 1.jpeg',0,'2021-03-17 19:20:03','2021-03-17 19:20:03'),(419,51,28,'EL CUERPO HUMANO','Tarea del libro pág.. 29 y 30','1616026818_c y t, libro 2.jpeg',0,'2021-03-17 19:20:18','2021-03-17 19:20:18'),(420,51,45,'Days of the week','Monday, tuesday, wednesday, thursday, friday sartuday sunday.','1616027480_ingles1.jpeg',0,'2021-03-17 19:31:20','2021-03-17 19:31:20'),(421,51,45,'Days of the week','Monday, tuesday, wednesday, thursday, friday sartuday sunday.','1616027497_ingles2.jpeg',0,'2021-03-17 19:31:37','2021-03-17 19:31:37'),(422,51,45,'Days of the week','Monday, tuesday, wednesday, thursday, friday sartuday sunday.','1616027513_ingles3.jpeg',0,'2021-03-17 19:31:53','2021-03-17 19:31:53'),(423,51,45,'Days of the week','Monday, tuesday, wednesday, thursday, friday sartuday sunday.','1616027529_ingles4.jpeg',0,'2021-03-17 19:32:09','2021-03-17 19:32:09'),(424,45,26,'Normas de convivencia','entendi todo','1616031358_WhatsApp Image 2021-03-17 at 8.32.51 PM.jpeg',0,'2021-03-17 20:35:58','2021-03-17 20:35:58'),(425,45,26,'Normas de convivencia','comprendi todo.','1616031395_WhatsApp Image 2021-03-17 at 8.32.51 PM (2).jpeg',0,'2021-03-17 20:36:35','2021-03-17 20:36:35'),(426,45,26,'Normas de convivencia','entendi todo','1616031420_WhatsApp Image 2021-03-17 at 8.32.51 PM (1).jpeg',0,'2021-03-17 20:37:00','2021-03-17 20:37:00'),(427,35,25,'DESARROLLO HUMANO','GAEL ROSALES','1616033924_DESARROLLO HUMANO.jpeg',0,'2021-03-17 21:18:44','2021-03-17 21:18:44'),(428,35,25,'DE DONDE VINIMOS','GAEL ROSALES','1616033969_DE DONDE VINIMOS .jpeg',0,'2021-03-17 21:19:29','2021-03-17 21:19:29'),(429,35,25,'ASI NOS DESARROLLAMOS','GAEL ROSALES','1616034001_ASI NOS DESARROLLAMOS.jpeg',0,'2021-03-17 21:20:01','2021-03-17 21:20:01'),(430,35,25,'NUESTRO CUERPO','GAEL ROSALES','1616034040_NUESTRO CUERPO.jpeg',0,'2021-03-17 21:20:40','2021-03-17 21:20:40'),(431,35,25,'ORDENAR SECUENCIA','GAEL ROSALES','1616034065_ORDENAR SECUENCIA .jpeg',0,'2021-03-17 21:21:05','2021-03-17 21:21:05'),(432,40,41,'Primero-  último/ grande mediano y pequeño','Tarea de la página  13 ... tarea entendida y comprendida.','1616034556_16160344762443592604533771540375.jpg',0,'2021-03-17 21:29:16','2021-03-17 21:29:16'),(433,40,41,'Primero-  último/ grande mediano y pequeño','Tarea de la página  14... tarea entendida y comprendida.','1616034622_16160345929908456496201798585.jpg',0,'2021-03-17 21:30:22','2021-03-17 21:30:22'),(434,40,41,'Primero-  último/ grande mediano y pequeño','Tarea del cuaderno... Noción  espacial \r\nTarea comprendida se podria  mandar unos ejercicios más... gracias','1616034755_16160346990328334398856658660388.jpg',0,'2021-03-17 21:32:35','2021-03-17 21:32:35'),(435,40,35,'Unión de  sílabas','Tarea aprendida y comprendida .... podrianreforzar más lectura sobre este tema. \r\nPágina 20','1616035134_16160350996076799410015864127806.jpg',0,'2021-03-17 21:38:54','2021-03-17 21:38:54'),(436,40,35,'Unión de  sílabas','Actividad 1 ... entendí  el tema y lo comprendí.','1616035251_16160352284566641020431792441223.jpg',0,'2021-03-17 21:40:51','2021-03-17 21:40:51'),(437,40,35,'Unión de  sílabas','Actividad  2','1616035309_16160352768715576631391226162151.jpg',0,'2021-03-17 21:41:49','2021-03-17 21:41:49'),(438,40,35,'Unión de  sílabas','Actividad 3','1616035346_16160353239215126543439880700564.jpg',0,'2021-03-17 21:42:26','2021-03-17 21:42:26'),(439,40,35,'Unión de  sílabas','Actividad 4','1616035454_16160354234586161946541767196336.jpg',0,'2021-03-17 21:44:14','2021-03-17 21:44:14'),(440,40,35,'Unión de  sílabas','Actividad 5 gracias','1616035511_16160354733308737348718272798741.jpg',0,'2021-03-17 21:45:11','2021-03-17 21:45:11'),(441,46,29,'Etapas del cuerpo humano','TAREA','1616038114_1. etp.jpeg',0,'2021-03-17 22:28:34','2021-03-17 22:28:34'),(442,46,29,'Etapas del cuerpo humano','Tarea de guia','1616038149_2. eta.jpeg',0,'2021-03-17 22:29:09','2021-03-17 22:29:09'),(443,46,29,'Etapas del cuerpo humano','Tarea de guia','1616038175_3.et.jpeg',0,'2021-03-17 22:29:35','2021-03-17 22:29:35'),(444,46,29,'Etapas del cuerpo humano','Tarea','1616038408_4.et.jpeg',0,'2021-03-17 22:33:28','2021-03-17 22:33:28'),(445,46,28,'el cuerpo maravillo','Tarea.','1616038756_5.et.jpeg',0,'2021-03-17 22:39:16','2021-03-17 22:39:16'),(446,46,27,'Reciclaje','Reciclaje','1616039064_6.et.jpeg',0,'2021-03-17 22:44:24','2021-03-17 22:44:24'),(447,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616039341_POEMA 2.jpg',0,'2021-03-17 22:49:01','2021-03-17 22:49:01'),(448,66,19,'EL POEMA','TRABAJO DE LA GUIA PAG. 18 Y 19','1616039363_POEMA 3.jpg',0,'2021-03-17 22:49:23','2021-03-17 22:49:23'),(449,46,45,'days','tarea','1616040484_ingles 1.jpeg',0,'2021-03-17 23:08:04','2021-03-17 23:08:04'),(450,46,45,'days','tarea 2','1616040512_ingles 2.jpeg',0,'2021-03-17 23:08:32','2021-03-17 23:08:32'),(451,46,45,'days','tarea','1616040533_ingles 3.jpeg',0,'2021-03-17 23:08:53','2021-03-17 23:08:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,38,1,1,'Los Primeros Pobladores I',2,'https://www.youtube.com/watch?v=Bf173uEHt5o',NULL,NULL,'2021-03-15','2021-03-15 22:51:02','2021-03-15 22:51:02',9,2,1,NULL,NULL,NULL,NULL,NULL),(2,41,1,1,'¿Cómo aparece el hombre sobre la tierra?',2,'https://www.youtube.com/watch?v=iabwUnwWcbk',NULL,NULL,'2021-03-15','2021-03-15 22:52:23','2021-03-15 22:52:23',9,2,1,NULL,NULL,NULL,NULL,NULL),(3,23,1,1,'Nuestro cuerpo es maravilloso',2,'https://www.youtube.com/watch?v=71hiB8Z-03k',NULL,NULL,'2021-03-11','2021-03-16 00:01:26','2021-03-16 00:01:26',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1BRZQ6rtvvjuYja_d6WpI1rt7zPPt2iU-_GG8GaCYGis/edit?usp=sharing',NULL,NULL),(4,28,1,1,'Proyecto de las 3R',1,NULL,NULL,NULL,'2021-03-09','2021-03-16 00:15:40','2021-03-16 11:55:59',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1u47gL81_KsJ_hGy12MWkf9himqh5M0bcQSxyBYBiUVQ/edit?usp=sharing',NULL,NULL),(5,12,1,1,'Plan lector',1,'https://youtu.be/rb_r2XtsV3c',NULL,NULL,'2021-03-16','2021-03-16 01:06:58','2021-03-16 01:06:58',5,2,1,NULL,NULL,NULL,NULL,NULL),(6,12,1,1,'Yo me llamo',2,'https://youtu.be/FnQ0V2v0NlU',NULL,NULL,'2021-03-16','2021-03-16 01:07:39','2021-03-16 01:07:39',5,2,1,NULL,NULL,NULL,NULL,NULL),(7,19,1,1,'Padre nuestro',1,'https://youtu.be/bZ4FQZ0h_zA',NULL,NULL,'2021-03-16','2021-03-16 01:09:57','2021-03-16 01:09:57',5,2,1,NULL,NULL,NULL,NULL,NULL),(8,14,1,1,'Color rojo',1,'https://youtu.be/cMUEQCT44fo',NULL,NULL,'2021-03-16','2021-03-16 01:11:19','2021-03-16 01:11:19',5,2,1,NULL,NULL,NULL,NULL,NULL),(9,12,1,1,'Trazos',3,'https://youtu.be/FtcFhMQejIo',NULL,NULL,'2021-03-16','2021-03-16 01:12:25','2021-03-16 01:12:25',5,2,1,NULL,NULL,NULL,NULL,NULL),(10,40,1,1,'Los Elementos de la Comunicación',2,'https://www.youtube.com/watch?v=sQ5WGHYfymE',NULL,NULL,'2021-03-16','2021-03-16 06:06:52','2021-03-16 16:20:44',9,2,1,'https://forms.gle/ip5LQnPg4bMC1jnc8',NULL,NULL,'2021-03-16',NULL),(11,47,1,1,'Classroom Language',0,'https://www.youtube.com/watch?v=b1Lot2v25o4',NULL,NULL,'2021-03-15','2021-03-16 06:43:15','2021-03-16 06:43:15',11,2,1,NULL,'https://drive.google.com/file/d/10Vafi1V2x7u2EkkJzwIh5CPaD9QT4KQv/view?usp=sharing',NULL,NULL,NULL),(12,52,1,1,'Classroom Language',0,NULL,NULL,NULL,'2021-03-15','2021-03-16 06:53:54','2021-03-16 06:53:54',11,2,1,NULL,'https://drive.google.com/file/d/1lPjWJhPu2azKdIERxUhs9pCWx3RG03Fe/view?usp=sharing',NULL,NULL,NULL),(13,49,1,1,'Classroom Language',0,NULL,NULL,NULL,'2021-03-15','2021-03-16 06:55:11','2021-03-16 06:55:11',11,2,1,NULL,'https://drive.google.com/file/d/1-LX5QebOPFyJ-yhzuyhwaVLlXLCDJJpV/view?usp=sharing',NULL,NULL,NULL),(14,50,1,1,'Classroom Language',0,'https://www.youtube.com/watch?v=D_sllO1gBhE',NULL,NULL,'2021-03-16','2021-03-16 07:14:27','2021-03-16 07:14:27',11,2,1,NULL,'https://drive.google.com/file/d/1sfxBOnu3XRrZtWpezKZUXoGWiMSGZ0fz/view?usp=sharing',NULL,NULL,NULL),(15,50,1,1,'Classroom Language -Dictation',1,'https://www.youtube.com/watch?v=VhLrKZhIPzo',NULL,NULL,'2021-03-16','2021-03-16 07:17:40','2021-03-16 07:17:40',11,2,1,NULL,NULL,NULL,NULL,NULL),(16,49,1,1,'Classroom Language',1,'https://www.youtube.com/watch?v=VhLrKZhIPzo',NULL,NULL,'2021-03-16','2021-03-16 07:19:51','2021-03-16 07:19:51',11,2,1,NULL,'https://drive.google.com/file/d/1CM9UrQMf01bvGsPi9mE1J-s5lH5lSiC4/view?usp=sharing',NULL,NULL,NULL),(17,4,1,1,'VOCAL A',1,'https://www.youtube.com/watch?v=cM93X4NegtI',NULL,NULL,'2021-03-16','2021-03-16 07:42:21','2021-03-16 07:42:21',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(18,22,1,1,'El Diccionario - Uso',3,'https://youtu.be/AbrYH3Ckpps',NULL,NULL,'2021-03-16','2021-03-16 07:45:19','2021-03-16 07:45:19',6,2,1,NULL,NULL,NULL,NULL,NULL),(19,37,1,1,'El Poema',2,'https://youtu.be/1EfalTHMZt0',NULL,NULL,'2021-03-16','2021-03-16 07:47:25','2021-03-17 00:52:19',9,2,1,NULL,NULL,NULL,'2021-03-16',NULL),(20,4,1,1,'CLASIFICANDO OBJETOS CON LA VOCAL A',2,'https://www.youtube.com/watch?v=iq8RohHRemg',NULL,NULL,'2021-03-16','2021-03-16 09:23:37','2021-03-16 09:23:37',4,2,1,NULL,NULL,NULL,NULL,NULL),(21,11,1,1,'APRENDIENDO EL PADRE NUESTRO',1,'https://www.youtube.com/watch?v=E25Y2KzikG4',NULL,NULL,'2020-03-15','2021-03-16 09:38:21','2021-03-16 09:38:21',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(22,5,1,1,'DERECHO A UN NOMBRE',1,'https://www.youtube.com/watch?v=PMn2XKDad2M',NULL,NULL,'2021-03-15','2021-03-16 09:40:24','2021-03-16 09:40:24',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(23,6,1,1,'RESOLVIENDO, RECORDANDO FORMAS Y COLORES',1,'https://www.youtube.com/watch?v=Xy7GRBldcxI',NULL,NULL,'2021-03-15','2021-03-16 09:45:22','2021-03-16 09:45:22',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(24,23,1,1,'Proyecto de las 3R',1,NULL,NULL,NULL,'2021-03-11','2021-03-16 12:18:16','2021-03-16 16:42:35',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1u47gL81_KsJ_hGy12MWkf9himqh5M0bcQSxyBYBiUVQ/edit?usp=sharing',NULL,NULL),(25,23,1,1,'El desarrollo humano',3,'https://www.youtube.com/watch?v=T1tOPRSezZk',NULL,NULL,'2021-03-16','2021-03-16 12:49:08','2021-03-16 12:49:08',7,2,1,NULL,'https://docs.google.com/document/d/1mVvU9luECMwtaDb4iumwj6OON7x93o932cFlYQ6Z9z8/edit?usp=sharing','https://docs.google.com/presentation/d/1_jihcLSB8o-9K8lUslafwmO7xDhdJJqvzGLPaGEbcJE/edit?usp=sharing',NULL,NULL),(26,24,1,1,'Somos únicos e importantes',1,'https://www.youtube.com/watch?v=mcWXvFC45hc&t=7s',NULL,NULL,'2021-03-15','2021-03-16 13:20:34','2021-03-16 13:20:34',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1KaOnn7est5Yxm21xZp7mzpfy8MNyy89SzdrCvqU-oiA/edit?usp=sharing',NULL,NULL),(27,25,1,1,'Proyecto de las 3R',1,NULL,NULL,NULL,'2021-03-15','2021-03-16 15:31:12','2021-03-16 15:31:12',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1u47gL81_KsJ_hGy12MWkf9himqh5M0bcQSxyBYBiUVQ/edit?usp=sharing',NULL,NULL),(28,25,1,1,'El maravilloso cuerpo humano',2,'https://www.youtube.com/watch?v=zsXT1eXsoEI&t=334s',NULL,NULL,'2021-03-15','2021-03-16 15:35:13','2021-03-16 15:35:13',7,2,1,NULL,'https://docs.google.com/document/d/1fwYYDNeq3R-SBOQdg24ZAi9e5IcqXTpVEMMit5F2tRY/edit?usp=sharing','https://docs.google.com/presentation/d/10U9VD115YRHBV8lbo7ltMoCbUGrpMaIlG2gsfuFNV6g/edit?usp=sharing',NULL,NULL),(29,25,1,1,'Etapas del desarrollo humano',3,'https://www.youtube.com/watch?v=EuYQKJfY56s',NULL,NULL,'2021-03-16','2021-03-16 15:53:35','2021-03-16 15:53:35',7,2,1,NULL,NULL,'https://docs.google.com/document/d/1zOK3hStLO6ddg1NT-hPTsnZculDbOrE5oTTsQmzH3CQ/edit?usp=sharing',NULL,NULL),(30,26,1,1,'Nos encontramos con entusiasmo',1,'https://www.youtube.com/watch?v=I06TFmZiIJ0',NULL,NULL,'2021-03-11','2021-03-16 16:24:46','2021-03-16 16:37:03',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1l1LhtESfsqoRnMSPZDyZkVUEM8u11-rvGdPqL2qDIIU/edit?usp=sharing',NULL,NULL),(31,26,1,1,'La comunicación verbal y no verbal',2,'https://www.youtube.com/watch?v=XCFEKXKDz6E&t=47s',NULL,NULL,'2021-03-15','2021-03-16 16:36:03','2021-03-16 16:36:03',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1Qvq2rU1LGMbCuffR4EbOzaFqX8xxkUBDkRVkM8HAlvE/edit?usp=sharing',NULL,NULL),(32,27,1,1,'El valor de la democracia',1,'https://www.youtube.com/watch?v=wU2PXit6ixQ&t=39s',NULL,NULL,'2021-03-10','2021-03-16 17:16:23','2021-03-16 17:16:23',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1URARyRF-oFQ-OiQ3C_WCa0adxr3ktPS4YwpsowNxDGM/edit?usp=sharing',NULL,NULL),(33,27,1,1,'Valores en la democracia',2,'https://www.youtube.com/watch?v=xhgWC5vgqyI',NULL,NULL,'2021-03-12','2021-03-16 17:18:22','2021-03-16 17:18:22',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/19eK5RdObpzXBp0YXwE9_i_ZLOb9d3EmaBsvvXZFEIW8/edit?usp=sharing',NULL,NULL),(34,28,1,1,'Soy un niño saludable, amo mi cuerpo',2,NULL,NULL,NULL,'2021-03-12','2021-03-16 17:25:41','2021-03-16 17:26:06',7,2,1,NULL,NULL,'https://docs.google.com/presentation/d/1qh2vq0wCwcir8k6hAt9xrfXy6BOv-0nV-3mkdkec6rM/edit?usp=sharing',NULL,NULL),(35,20,1,1,'Unión de sílabas / Formamos palabras',3,'https://youtu.be/e8rbJgVmX_8',NULL,NULL,'2021-03-17','2021-03-16 22:31:04','2021-03-17 09:14:09',6,2,1,NULL,NULL,NULL,'2021-03-17',NULL),(36,12,1,1,'vocal i',4,'https://youtu.be/9lNzWUhVoKA',NULL,NULL,'2021-03-17','2021-03-16 23:56:14','2021-03-16 23:56:14',5,2,1,NULL,NULL,NULL,NULL,NULL),(37,4,1,1,'CANCION TIC TUC',3,'https://www.youtube.com/watch?v=Cf8H-tZNmRA',NULL,NULL,'2021-03-17','2021-03-17 00:35:54','2021-03-17 00:35:54',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(38,6,1,1,'COLORES PRIMARIOS Y SECUNDARIOS',2,'https://www.youtube.com/watch?v=wC2NkKGSffc',NULL,NULL,'2021-03-17','2021-03-17 00:38:20','2021-03-17 00:38:20',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(39,6,1,1,'CLASIFICANDO COLORES',3,'https://www.youtube.com/watch?v=3ep0ZzFa-8I',NULL,NULL,'2021-03-17','2021-03-17 00:40:08','2021-03-17 00:40:08',4,2,1,NULL,NULL,NULL,NULL,NULL),(40,9,1,1,'HELLO - GOOD BYE',1,'https://www.youtube.com/watch?v=sU8SpN4VuCA',NULL,NULL,'2021-03-17','2021-03-17 00:43:24','2021-03-17 00:43:24',4,2,1,NULL,NULL,NULL,NULL,'https://us04web.zoom.us/j/78619318034?pwd=RFpXc0lJMERocTFDTVBPK2tVRjA1Zz09'),(41,21,1,1,'Primero -Ultimo / Grande Mediano Pequeño',1,'https://youtu.be/TWLBqgXC-XE',NULL,NULL,'2021-03-17','2021-03-17 08:54:50','2021-03-17 08:56:27',6,2,1,NULL,NULL,NULL,'2021-03-19',NULL),(42,21,1,1,'',1,NULL,NULL,NULL,'2021-03-17','2021-03-17 08:54:55','2021-03-18 07:42:05',6,2,1,NULL,NULL,NULL,'2021-03-19',NULL),(43,26,1,2,'¿Qué hiciste en las vacaciones?',3,NULL,NULL,NULL,'2021-03-17','2021-03-17 11:18:30','2021-03-17 11:18:30',7,2,1,NULL,NULL,'https://drive.google.com/drive/folders/1AwFvJP3aXbRiguupg2aF9HJ7tMNMX0Rv?usp=sharing','2021-03-19',NULL),(44,27,1,1,'La historia',3,NULL,NULL,NULL,'2021-03-17','2021-03-17 11:24:09','2021-03-17 11:24:09',7,2,1,NULL,NULL,'https://drive.google.com/drive/folders/1Bbv0UKd7qeiGqEtSs6hP0g9WsxSJAbCc?usp=sharing','2021-03-19',NULL),(45,48,1,1,'Days of the week',1,'https://www.youtube.com/watch?v=TTYo8T2QItc',NULL,NULL,'2021-03-17','2021-03-17 13:38:44','2021-03-17 13:39:16',11,2,1,NULL,NULL,NULL,'2021-03-17',NULL),(46,14,1,1,'EL CIRCULO',2,'https://youtu.be/SWROMPU9Shg',NULL,NULL,'2021-03-18','2021-03-17 23:41:37','2021-03-17 23:41:37',5,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(47,13,0,0,'',0,NULL,NULL,NULL,'2021-03-17','2021-03-17 23:49:32','2021-03-18 00:04:16',5,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(48,13,1,1,'NORMAS DE CONVIVENCIA',1,'https://youtu.be/BNUGeV1vqxs',NULL,NULL,'2021-03-18','2021-03-17 23:49:58','2021-03-17 23:49:58',5,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(49,17,1,1,'COLOR RED',1,'https://youtu.be/-H_aG6Gh-do',NULL,NULL,'2021-03-18','2021-03-18 00:00:59','2021-03-18 00:00:59',5,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(50,37,1,1,'Los Elementos de la Comunicación',3,'https://www.youtube.com/watch?v=LapuENk_g38',NULL,NULL,'2021-03-17','2021-03-18 06:54:02','2021-03-18 06:54:02',9,2,1,NULL,NULL,NULL,'2021-03-19',NULL),(51,39,1,1,'La Célula y sus funciones',2,'https://www.youtube.com/watch?v=rmjCWgZ0nOA',NULL,NULL,'2021-03-18','2021-03-18 06:56:35','2021-03-18 06:56:35',9,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(52,42,1,1,'Los Tipos de Célula',3,'https://www.youtube.com/watch?v=qFmhp6_1Kwg',NULL,NULL,'2021-03-18','2021-03-18 06:58:13','2021-03-18 06:58:13',9,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(53,20,1,1,'Sílaba Inversa \"M\" - Formación de Oraciones',4,NULL,NULL,NULL,'2021-03-18','2021-03-18 07:44:00','2021-03-18 07:44:00',6,2,1,NULL,NULL,NULL,'2021-03-20',NULL),(54,22,1,1,'Letra Inicial',4,NULL,NULL,NULL,'2021-03-18','2021-03-18 07:45:07','2021-03-18 07:45:07',6,2,1,NULL,NULL,NULL,'2021-03-20',NULL);
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
  CONSTRAINT `user_hours_assign_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_hours_assign_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_hours_assign_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_hours_assign_hour_id_foreign` FOREIGN KEY (`hour_id`) REFERENCES `hours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_hours_assign_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Julio Izquierdo Mejia','julio.izquierdo.mejia@gmail.com',NULL,'$2y$10$OXtjwWBCoGwk6mKqBp2xyewtfVdebx/sYuop8ZTHmtHNrpL.z3Oi2',NULL,NULL,NULL,NULL,'2021-03-15 22:14:38','2021-03-15 22:14:38',NULL,NULL,NULL,1,NULL,NULL,NULL),(2,NULL,'Colegio Lev S. Vigotsky','colegio.iep.levsvygotsky@gmail.com',NULL,'$2y$10$/GWPRn3wUJ0prOwWrG4DY.vTsKh1Ie7PGvMUo4olr534s5S2haOsi',NULL,NULL,NULL,NULL,'2021-03-15 22:14:38','2021-03-15 22:14:38',NULL,'vigotsky',1,1,'Lev S. Vigotsky','946 350 910',NULL),(3,'Miss','Camela Sánchez','carmela.vyg@gmail.com',NULL,'$2y$10$UFkvu7Bl1jBAdlvawhR1a.W5TBldPDjeCMYmGQQ9bee8j61kVzvTO',NULL,NULL,NULL,NULL,'2021-03-15 22:16:43','2021-03-15 22:16:43',NULL,NULL,2,1,NULL,NULL,NULL),(4,'Miss','Alejandra Cruz','alejandra.vyg@gmail.com',NULL,'$2y$10$4zITVEEgQ9PgrT5HOe4iGeFpvydnL7CkJ20PsABA7UemcSOs9w57O',NULL,NULL,NULL,NULL,'2021-03-15 22:17:41','2021-03-15 22:17:41',NULL,NULL,2,1,NULL,NULL,NULL),(5,'Miss','Marilyn Silva','marilyn.vyg@gmail.com',NULL,'$2y$10$xJXMx7GSxOEho2S7zq40Q.zEjQqq1uXCz2pLQe7D3ytus/vJ8Pk62',NULL,NULL,NULL,NULL,'2021-03-15 22:18:25','2021-03-15 22:18:25',NULL,NULL,2,1,NULL,NULL,NULL),(6,'Miss','Ana Granda','ana.vyg@gmail.com',NULL,'$2y$10$ZfTNsJEW5SQpF0m3pF3LZOfc3y1KUE2zQWgHUrcWJ5YQOhklzscNO',NULL,NULL,NULL,NULL,'2021-03-15 22:18:52','2021-03-15 22:18:52',NULL,NULL,2,1,NULL,NULL,NULL),(7,'Miss','Jomira Melgarejo','jomira.vyg@gmail.com',NULL,'$2y$10$2aV4kB3tHh18BX5aRPFj6OPC3haPQ9jQgn9fSWSw25cM2GUeA4Ckq',NULL,NULL,NULL,NULL,'2021-03-15 22:19:32','2021-03-15 22:19:32',NULL,NULL,2,1,NULL,NULL,NULL),(8,'Miss','Wendy Jacobi','wendy.vyg@gmail.com',NULL,'$2y$10$t7Wa5goWhLk4ufqZkm1f0.5v6LK7NuIHofRGIl8CfYPDFRrG3pp7K',NULL,NULL,NULL,NULL,'2021-03-15 22:20:12','2021-03-15 22:20:12',NULL,NULL,2,1,NULL,NULL,NULL),(9,'Miss','Romina Rivera','romina.vyg@gmail.com',NULL,'$2y$10$EFPG.Jm0JZlam00e4Csuye9oxKDfZLxuxUKNDeJzlJ5BxqJDFuIAq',NULL,NULL,NULL,NULL,'2021-03-15 22:20:45','2021-03-15 22:20:45',NULL,NULL,2,1,NULL,NULL,NULL),(10,'Miss','Gladis Sánchez','gladis.vyg@gmail.com',NULL,'$2y$10$YEibf06NA.C56qpSSngcyejK5A3M1km02JUaxKVpuccYHB5tce.66',NULL,NULL,NULL,NULL,'2021-03-15 22:21:12','2021-03-15 22:21:12',NULL,NULL,2,1,NULL,NULL,NULL),(11,'Miss','Abigail Chávez','abigail.vyg@gmail.com',NULL,'$2y$10$/b7YEOTRD8W54R6tSzvNOOFPDyhKsXC5Ovc0WktZsEFCS8Yv0Q7gq',NULL,NULL,NULL,NULL,'2021-03-15 22:21:42','2021-03-15 22:21:42',NULL,NULL,2,1,NULL,NULL,NULL),(12,'Prof.','Julio Izquierdo Mejia','julio@gmail.com',NULL,'$2y$10$IEq57Dcja4e5YuRjRF5R9O4PP2zwfnDZT3Lb3njtLof6CRWG4Ad9W',NULL,NULL,NULL,NULL,'2021-03-15 22:22:08','2021-03-15 22:22:08',NULL,NULL,2,1,NULL,NULL,NULL),(13,NULL,'Garcia Matos, Romel','romelgarcia@gmail.com',NULL,'$2y$10$62oaRPrKrcgVqI3cTtYS3OpJWpIyY9XB9aX4JoPvLWJ.HWNcQcSUO',NULL,NULL,NULL,NULL,'2021-03-15 22:42:25','2021-03-15 22:42:25',NULL,NULL,2,1,NULL,NULL,NULL),(14,NULL,'Francia Contreras, Patrick Oliver','contreraspalominomary@gmail.com',NULL,'$2y$10$zIDE79pKbPLO0sOPqc8rh.T.g2b4hRIuPffehkluPLr9TFamDzPBq',NULL,NULL,NULL,NULL,'2021-03-15 22:42:49','2021-03-15 22:42:49',NULL,NULL,2,1,NULL,NULL,NULL),(15,NULL,'Romero Jimenez, Valentino Miguel','miguel.conta.2016@gmail.com',NULL,'$2y$10$f6U5/k09q641cNAV4O2bBOBurfze3Qgbw5lhSe2N9aLc7hYaqOuEC',NULL,NULL,NULL,NULL,'2021-03-15 22:43:36','2021-03-15 22:43:36',NULL,NULL,2,1,NULL,NULL,NULL),(16,NULL,'Ruiz Mihashiro, Flavia Aleliz','lizbethzitha2017@gmail.com',NULL,'$2y$10$sXrUqDyZ1BLFmG21gsjy5eV5aY8tdoy3zA2OnEvDnKQhwLY90QXTi',NULL,NULL,NULL,NULL,'2021-03-15 22:45:35','2021-03-15 22:45:35',NULL,NULL,2,1,NULL,NULL,NULL),(17,NULL,'Velasquez Peña, Jeyko Lenin','Saulvegui@gmail.com',NULL,'$2y$10$pMNHJVML5GL9TZJIFWO9kOvDOr.FbrcnBFsHqa/Pq3k7TtoNZnfeK',NULL,NULL,NULL,NULL,'2021-03-15 22:46:20','2021-03-15 22:46:20',NULL,NULL,2,1,NULL,NULL,NULL),(18,NULL,'Hurtado Valdez, Ghaela Mayfret','ghaelahurtado@gmail.com',NULL,'$2y$10$SmKz5dyoGEOTT8VBhDS2tuRvX112IL8LbcWM2Yhng3Tf8GzXIPuTW',NULL,NULL,NULL,NULL,'2021-03-15 22:46:38','2021-03-15 22:46:38',NULL,NULL,2,1,NULL,NULL,NULL),(19,NULL,'Chavez Nicho, Marian Victoria','marianchavez@gmail.com',NULL,'$2y$10$OEPwBRm.d/LP.n9pPZA6t.JfYnoEz817vEdrGPShslvbIo1ADJnXS',NULL,NULL,NULL,NULL,'2021-03-15 22:47:02','2021-03-15 22:47:02',NULL,NULL,2,1,NULL,NULL,NULL),(20,NULL,'Gutierrez Estrada, Ivanna Anthuanet','ivannagutierrez@gmail.com',NULL,'$2y$10$4UOt/7COFG1NmMafoWrDu.kaFJkVsmB5MTF22vZLtsUgtDrWwNYa.',NULL,NULL,NULL,NULL,'2021-03-15 22:47:17','2021-03-15 22:47:17',NULL,NULL,2,1,NULL,NULL,NULL),(21,NULL,'Salas Escobedo, Nicolás David','nicolasalas@gmail.com',NULL,'$2y$10$kFfXCi0tofQpjCSH8bgrPehLfX.7zu8bDH6NzgJUnyW/R3NxwtfnG',NULL,NULL,NULL,NULL,'2021-03-15 22:47:34','2021-03-15 22:47:34',NULL,NULL,2,1,NULL,NULL,NULL),(22,NULL,'Ortega Graza, Alice Katherine','evelyngraza1@gmail.com',NULL,'$2y$10$eCkOdvWlELk5FwcioPlv9OQelldtUxZ6jab/XifDSorZXmhn37O7K',NULL,NULL,NULL,NULL,'2021-03-15 22:48:01','2021-03-15 22:48:01',NULL,NULL,2,1,NULL,NULL,NULL),(23,NULL,'Ramos Torpoco, Marco Valentino','chiovalentino03@gmail.com',NULL,'$2y$10$azwOk2dk3bLkfVxGRJiI6O6KOernhy7fpD.IjnYvg3jUXIvvhQ5Mi',NULL,NULL,NULL,NULL,'2021-03-15 22:48:18','2021-03-15 22:48:18',NULL,NULL,2,1,NULL,NULL,NULL),(24,NULL,'Bernabé Castillo, Santiago Alessandro','sharoncastillo495@gmail.com',NULL,'$2y$10$SMDyAGFLvtWlZ7nSCm8kTeBzdSgK5EarY1UBYxYtgRuwCTwGW/yVe',NULL,NULL,NULL,NULL,'2021-03-15 22:48:45','2021-03-15 22:48:45',NULL,NULL,2,1,NULL,NULL,NULL),(25,NULL,'Goicochea Nolly, Luciana Isabella','elsa.nollyr@gmail.com',NULL,'$2y$10$rBbOFXu8zGbbLkTaSIRhjuGBrCoG/T0g/2lXGIK1VH7bcdBmSEfny',NULL,NULL,NULL,NULL,'2021-03-15 22:49:06','2021-03-15 22:49:06',NULL,NULL,2,1,NULL,NULL,NULL),(26,NULL,'Cantoral Ugarte Yhan Jesús','rud.3395@gmail.com',NULL,'$2y$10$yta5Cpmq3yuroVigvWx97eiu8xsaRCDvKCtV8alNGSts7hfdl0KcS',NULL,NULL,NULL,NULL,'2021-03-15 22:50:05','2021-03-15 22:50:05',NULL,NULL,2,1,NULL,NULL,NULL),(27,NULL,'Ypanaque Lozano, Jaír Alexander','mlozanoperez73@gmail.com',NULL,'$2y$10$SiVKnpvUGzUP7gqOoPTSNOlaZBlcto7TCGcyL7yAkiM1wjbsCl.pG',NULL,NULL,NULL,NULL,'2021-03-15 22:51:51','2021-03-15 22:51:51',NULL,NULL,2,1,NULL,NULL,NULL),(28,NULL,'Fernández Petterman, Andre Marshello','Fdanny2007@gmail.com',NULL,'$2y$10$fgzbD15VWlBb5BG9LCY1L.yiiK2RNwD3il/INp/58VbJIe1o8KAg6',NULL,NULL,NULL,NULL,'2021-03-15 22:52:07','2021-03-15 22:52:07',NULL,NULL,2,1,NULL,NULL,NULL),(29,NULL,'Valderrama Herrera, María Paz','liliana.emi27h@gmail.com',NULL,'$2y$10$BmJfvuw.3nt0QrC9nH903uG3VnwOagW4Ulk8T7FW03rvMOMa6n/5m',NULL,NULL,NULL,NULL,'2021-03-15 22:52:30','2021-03-15 22:52:30',NULL,NULL,2,1,NULL,NULL,NULL),(30,NULL,'Rivas Flores, Thiago Raúl','giuliana180615@gmail.com',NULL,'$2y$10$/A.DWQzVcdRN7TDnF.zdvOxfe2yAuY0/bx51n.jTAVachw0MVhPn.',NULL,NULL,NULL,NULL,'2021-03-15 22:52:55','2021-03-15 22:52:55',NULL,NULL,2,1,NULL,NULL,NULL),(31,NULL,'Durand Gomez, Lía Ivanna','Ivannadurand@gmail.com',NULL,'$2y$10$QCXD.QkPOgae/4PFGIEv/OczFaHpkWOqrzO28EnzVBTaScSOi0.Lu',NULL,NULL,NULL,NULL,'2021-03-15 22:53:21','2021-03-15 22:53:21',NULL,NULL,2,1,NULL,NULL,NULL),(32,NULL,'Lázaro Valdivia, Julieth Vania','Juliethlazaro@gmail.com',NULL,'$2y$10$L5yz009O0.KqFaEKxSKslOu31cBx6EbW8t824MfmbwnPIIcu.MP1C',NULL,NULL,NULL,NULL,'2021-03-15 22:53:38','2021-03-15 22:53:38',NULL,NULL,2,1,NULL,NULL,NULL),(34,NULL,'Daleshka Picoy Antezana','Jenni.ant901@gmail.com',NULL,'$2y$10$EsEAfGPVr/fq95JV3LBikuGUgTjtzjUavIdrkncymbvlHt0bDDEXa',NULL,NULL,NULL,NULL,'2021-03-15 23:04:44','2021-03-15 23:04:44',NULL,NULL,2,1,NULL,NULL,NULL),(35,NULL,'Ore Rosales, Gael','Beatrizore.c@gmail.com',NULL,'$2y$10$OhMW799krB2MpESK2Z89puAxvpr/Mc6DbClPZx0W/ak/LTRPLanF6',NULL,NULL,NULL,NULL,'2021-03-15 23:05:04','2021-03-15 23:05:04',NULL,NULL,2,1,NULL,NULL,NULL),(36,NULL,'Juipa Huaccha, Milan','Freddyjuipa@gmail.com',NULL,'$2y$10$Dt/Xn06C98Udnr8vOe7J..xwbA1phN/.V8w.hs6C98PO82WKHI4DW',NULL,NULL,NULL,'PLF5T9x56NmutV5YUYLpjHQntBEnoTspBjeZs0TG8kKT96J74UQR43Ca44PN','2021-03-15 23:06:27','2021-03-15 23:06:27',NULL,NULL,2,1,NULL,NULL,NULL),(37,NULL,'Perez Sierra, Allen','Anitamicaelasierrasuloaga@gmail.com',NULL,'$2y$10$OflXf0koFa3lKu2xitpIU.3JqrstFkbKt90bTCCjTU0MKRvrZQlgW',NULL,NULL,NULL,NULL,'2021-03-15 23:10:08','2021-03-15 23:10:08',NULL,NULL,2,1,NULL,NULL,NULL),(38,NULL,'Ortega Arteta, Daymi','Ingridvaldezdelgado@gmail.com',NULL,'$2y$10$/IhywPdWs.FCqSubP87SSeHemY83dARt45bkXCabKMcgrN2bZYgGG',NULL,NULL,NULL,NULL,'2021-03-15 23:10:22','2021-03-15 23:10:22',NULL,NULL,2,1,NULL,NULL,NULL),(39,NULL,'López Huacchillo, María Cristina','Mariacristina@gmail.com',NULL,'$2y$10$vZp/XbgoxCrTBqgjI.X7p.4W4vI6J.YwE5VxBHLflLSJN7uLc693G',NULL,NULL,NULL,NULL,'2021-03-15 23:10:51','2021-03-15 23:10:51',NULL,NULL,2,1,NULL,NULL,NULL),(40,NULL,'Huacchillo Encalada, Marcelo Santhyago','Marcelohuacchillo@gmail.com',NULL,'$2y$10$eGMma8m5uuK19f2kuwmLJeAbc3kJh0FeWUrbA1LLGbFoUWYyY6vim',NULL,NULL,NULL,NULL,'2021-03-15 23:11:06','2021-03-15 23:11:06',NULL,NULL,2,1,NULL,NULL,NULL),(41,NULL,'Garcia Martos, Cielo Guadalupe','Cielogarcia@gmail.com',NULL,'$2y$10$H6U.9WsNPUAy8KLsd3xcl.bY4NvcGhbz79G/aAgaJs0foRyz7fksG',NULL,NULL,NULL,NULL,'2021-03-15 23:11:24','2021-03-15 23:11:24',NULL,NULL,2,1,NULL,NULL,NULL),(42,NULL,'Herrera Matos Ezzio Gianpiero Hernán','ezzioherrera@gmail.com',NULL,'$2y$10$.0m04mSB4/cZ9tv.rOdUUuIZoEB6D3hT.iLn6MFLBRL7VfZE3w456',NULL,NULL,NULL,NULL,'2021-03-15 23:11:40','2021-03-15 23:11:40',NULL,NULL,2,1,NULL,NULL,NULL),(43,NULL,'Paredes Merino, Caleb Josué','cutipamamaniaurea@gmail.com',NULL,'$2y$10$Ztro.Jk7qmSd7CZ5axzx1ep5Ezzr4peFEmeBGyj.e90zrES1eJRb6',NULL,NULL,NULL,NULL,'2021-03-15 23:12:33','2021-03-15 23:12:33',NULL,NULL,2,1,NULL,NULL,NULL),(44,NULL,'Huacchillo Olivera, Elmer Thiago','deyolijo@gmail.com',NULL,'$2y$10$7GtrMus19OEt3kym055llejCnNQJ0IkrAZ6t6RSIk2Prnz.ZeQW5W',NULL,NULL,NULL,NULL,'2021-03-15 23:12:48','2021-03-15 23:12:48',NULL,NULL,2,1,NULL,NULL,NULL),(45,NULL,'Antonio Mendoza, Selena Kiara','antonia.mendoza.encalada1982@gmail.com',NULL,'$2y$10$r1IRNVYL9QnKair15Nxn2ebJymRV66If3uzDAQ/5dtnNjliH.mY52',NULL,NULL,NULL,NULL,'2021-03-15 23:13:08','2021-03-15 23:13:08',NULL,NULL,2,1,NULL,NULL,NULL),(46,NULL,'Huapaya Campos, Thiago Ortorio','adiespinoza@gmail.com',NULL,'$2y$10$84FLYTEvIJ5OGvzZyFl98.Nf3cjbybZvp58ZtkhgQwrEfeeadLhLy',NULL,NULL,NULL,NULL,'2021-03-15 23:13:38','2021-03-15 23:13:38',NULL,NULL,2,1,NULL,NULL,NULL),(47,NULL,'Jacobi Abanto, Gabriela Brisset','abantocordovabrissette@gmail.com',NULL,'$2y$10$fn1xNSS7TysCT5gUZq.hJOx8WlzlDZ7AY7c0Ay/dDoCzzgqeDXAPq',NULL,NULL,NULL,NULL,'2021-03-15 23:14:03','2021-03-15 23:14:03',NULL,NULL,2,1,NULL,NULL,NULL),(48,NULL,'Gutierrez Pareja, Gabriel','Gabrieljaredgutierrezpareja@gmail.com',NULL,'$2y$10$UiPjodw56IxPNQZkylZZMeI/PJ7qYMTi5liE7.XE9DqOFAWxaCGWm',NULL,NULL,NULL,NULL,'2021-03-15 23:14:19','2021-03-15 23:14:19',NULL,NULL,2,1,NULL,NULL,NULL),(49,NULL,'Llallhui Gongora, Thiago Josimar','katieyta27@gmail.com',NULL,'$2y$10$Y5/kreBSoYZED1e90j4RX.gqYrSMTTQBSsAu2M7u.B2sOfICPkr4m',NULL,NULL,NULL,NULL,'2021-03-15 23:14:36','2021-03-15 23:14:36',NULL,NULL,2,1,NULL,NULL,NULL),(50,NULL,'Casas Carbajal, Guianella','jackelinefv30@gmai.com',NULL,'$2y$10$/qnpYeAmfI8MxBn224BMROQuJObBWJ5I512qmwBqcLPE2S8zBzos.',NULL,NULL,NULL,NULL,'2021-03-15 23:14:53','2021-03-15 23:14:53',NULL,NULL,2,1,NULL,NULL,NULL),(51,NULL,'Amira Duran Gomez','isabelgomezh1@gmail.com',NULL,'$2y$10$.DDkN99H8wdqlcPCYRufsuoTVipdZ2MN54z6/y7evkQy19XMxMdZ.',NULL,NULL,NULL,NULL,'2021-03-15 23:15:09','2021-03-15 23:15:09',NULL,NULL,2,1,NULL,NULL,NULL),(52,NULL,'Dionicio Córdova, Mishelle','mishelledionicioc@gmail.com',NULL,'$2y$10$9PpRiLUsQhGD/hkDJ9GpFeCtbtHUNh0fwFcRsIic2Zz4q6eGiwR7W',NULL,NULL,NULL,NULL,'2021-03-15 23:16:06','2021-03-15 23:16:06',NULL,NULL,2,1,NULL,NULL,NULL),(53,NULL,'Rojas Retuerto, Magdyel Vernis','retuertomagda@gmail.com',NULL,'$2y$10$RegUZqV21dy69VUMF2rxvuVQigDjD9PBC0SilV8Mxcp3Nj0IEZQRO',NULL,NULL,NULL,NULL,'2021-03-15 23:16:22','2021-03-15 23:16:22',NULL,NULL,2,1,NULL,NULL,NULL),(54,NULL,'Ruiz Ruiz, Gamaniel Tiago','ruizannie123@gmail.com',NULL,'$2y$10$p/3zuSzih02UmMCYkTyRee4Kkfl4drJ0IgC5Y4.Js6tk4opI9E1/6',NULL,NULL,NULL,NULL,'2021-03-15 23:16:43','2021-03-15 23:16:43',NULL,NULL,2,1,NULL,NULL,NULL),(55,NULL,'López Huacchillo, Santiago David','davidsanthyagolopez@gmail.com',NULL,'$2y$10$XmNNiPkmJZ8F3XEq15dHLeiL591hW.daTruVxfy8M5dgFk5IMSRKm',NULL,NULL,NULL,NULL,'2021-03-15 23:17:03','2021-03-15 23:17:03',NULL,NULL,2,1,NULL,NULL,NULL),(56,NULL,'Rengifo Bazán, Camila Stephany','yoysy1688@gmail.com',NULL,'$2y$10$.mk7/anZrGTmjRNYrwrmrOzSPJMuQlPfCPxkwGwmH2aWoVrKj5r3a',NULL,NULL,NULL,NULL,'2021-03-15 23:17:25','2021-03-15 23:17:25',NULL,NULL,2,1,NULL,NULL,NULL),(57,NULL,'Pinedo Ramirez, Joshepe','ruddy84@gmail.com',NULL,'$2y$10$QThV.2LOPIGHYasd43KXL.KUieqpvJcTMQPgK44I8t8HbQ2fHr0Km',NULL,NULL,NULL,NULL,'2021-03-15 23:17:46','2021-03-15 23:17:46',NULL,NULL,2,1,NULL,NULL,NULL),(58,NULL,'Yllatopa Ríos, Jesús Thiago','dannarios02@gmail.com',NULL,'$2y$10$ouHRUROqn0Yk8DuC1.gMfOTrCa6/fNJjCmoh63wedwMDPyXbt0aUW',NULL,NULL,NULL,'THQvlUXi42ElQFJcohpwQvJgXDr9Aib79KpwsEBXLpskDLtLZ9oS298OO6fK','2021-03-15 23:18:07','2021-03-15 23:18:07',NULL,NULL,2,1,NULL,NULL,NULL),(59,NULL,'Saldaña Echevarría, Junior','valeriasaldana71@gmail.com',NULL,'$2y$10$cLqwTiLtL94LBegUDboOk.drpt/bDlkq/GRc6.s4p1nb.ASKkT3/2',NULL,NULL,NULL,NULL,'2021-03-15 23:18:34','2021-03-15 23:18:34',NULL,NULL,2,1,NULL,NULL,NULL),(60,NULL,'Paredes Salinas, Zamir','zamirparedezsalinas@gmail.com',NULL,'$2y$10$aRHFu6WlESrWJNrikCViOOYKEaYye2DUgRt.SiE98n7vtn806ltDK',NULL,NULL,NULL,NULL,'2021-03-15 23:18:49','2021-03-15 23:18:49',NULL,NULL,2,1,NULL,NULL,NULL),(61,NULL,'Huamán Echevarría, Luana Patricia','luanahuaman@gmail.com',NULL,'$2y$10$rHIFZBDla1gyLSQgUhDIx.ttewMMki1Sx34IOlDYyfOVGpY3XoEom',NULL,NULL,NULL,NULL,'2021-03-15 23:19:05','2021-03-15 23:19:05',NULL,NULL,2,1,NULL,NULL,NULL),(62,NULL,'Manayay Contreras, Luis Fabiano','luisfabianomanayay@gmail.com',NULL,'$2y$10$YdTACWzOELDqramCNi1dDOD9ZsunuRBFyA8qc4GF4V9IAX1UHwLVW',NULL,NULL,NULL,NULL,'2021-03-15 23:19:28','2021-03-15 23:19:28',NULL,NULL,2,1,NULL,NULL,NULL),(63,NULL,'Montalvan Céspedes, Yared','yared1327@gmail.com',NULL,'$2y$10$t1RVSzbjM54I9QdzqGs1L.u.FdWvtRJpdNn1s3A1vFBiRJysqWT7S',NULL,NULL,NULL,NULL,'2021-03-15 23:19:48','2021-03-15 23:19:48',NULL,NULL,2,1,NULL,NULL,NULL),(64,NULL,'Paredes Merino, Stefanny','stefannyparedes@gmail.com',NULL,'$2y$10$SQkDFHxAkJGURCGLBl1DXeBzIb/DPRt2GYMfMma9f1V7cIh1ZSw4S',NULL,NULL,NULL,NULL,'2021-03-15 23:20:03','2021-03-15 23:20:03',NULL,NULL,2,1,NULL,NULL,NULL),(65,NULL,'Paredes Merino, Fabio','Fabioparedes@gmail.com',NULL,'$2y$10$XiaCardPLqDtOdWWzR/O9OFLh5BJ04.RCDNr4PF71.gSbDnsBGczK',NULL,NULL,NULL,NULL,'2021-03-15 23:20:20','2021-03-15 23:20:20',NULL,NULL,2,1,NULL,NULL,NULL),(66,NULL,'Flores Cárdenas, Neyser','lcardenasesteban@gmail.com',NULL,'$2y$10$xkhz4LIza3A0bo642dIQdeScf8cremoZIIGw0uIAW7oqr6hFedpKm',NULL,NULL,NULL,NULL,'2021-03-15 23:20:39','2021-03-15 23:20:39',NULL,NULL,2,1,NULL,NULL,NULL),(67,NULL,'Flores De la cruz, Matías Lucas','delacruzsara@gmail.com',NULL,'$2y$10$ucWBHlvOeOXrmsMmTLAR6ehUbZdMzHoCAqbVc1r/rV9aNOorZ5QT.',NULL,NULL,NULL,NULL,'2021-03-15 23:21:04','2021-03-15 23:21:04',NULL,NULL,2,1,NULL,NULL,NULL),(68,NULL,'Fernandez Petterman, Josué Benjamín','jpettermanrubio@gmail.com',NULL,'$2y$10$5Tow4N892STf6VnaLc5Sx.rOP12wMm3mUDCXDJCJ651xDCD6yEGQW',NULL,NULL,NULL,NULL,'2021-03-15 23:21:18','2021-03-15 23:21:18',NULL,NULL,2,1,NULL,NULL,NULL),(69,NULL,'Inga Rivas, Fabricio José','Kariningarivas1991@gmail.com',NULL,'$2y$10$rNSwft20Td/mFDag9hRyOuYXiyYjMO5WMtN7TnkZGkB1izNlh6hhu',NULL,NULL,NULL,NULL,'2021-03-15 23:21:34','2021-03-15 23:21:34',NULL,NULL,2,1,NULL,NULL,NULL),(70,NULL,'Ramos Odicio, Kiara Alexandra','rayjo1999@gmail.com',NULL,'$2y$10$gCPOtmRAkDxlshLkbTojKeVd9PKGepXwO.Jm9iyLvxmOOa5q9hMNq',NULL,NULL,NULL,NULL,'2021-03-15 23:21:51','2021-03-15 23:21:51',NULL,NULL,2,1,NULL,NULL,NULL),(71,NULL,'Juanluis Llacuachaqui Medina','yakelinmedina3434@gmail.com',NULL,'$2y$10$.2KxxeJf0UOzo0dD1F8vMOmbWRvAUK8kj/Up6C20gT/iUPUGN4xwK',NULL,NULL,NULL,NULL,'2021-03-15 23:33:16','2021-03-15 23:33:16',NULL,NULL,2,1,NULL,NULL,NULL),(72,NULL,'Ortiz Delgado Michael Dylan','michael.ortiz@gmail.com',NULL,'$2y$10$KQBQKL9KftAwuZFXpp8bK.k06t60f.VRuJW/XXdHsAo8dgDUZLsy2',NULL,NULL,NULL,NULL,'2021-03-15 23:35:07','2021-03-15 23:35:07',NULL,NULL,2,1,NULL,NULL,NULL),(73,NULL,'Ortiz Delgado Sayuri','sayuri.ortiz@gmail.com',NULL,'$2y$10$2.FL/npr/9U2wvBD.fGJXOzHSSUMtC7sgSC50rqdooiX5CcVFtHhK',NULL,NULL,NULL,NULL,'2021-03-15 23:40:10','2021-03-15 23:40:10',NULL,NULL,2,1,NULL,NULL,NULL);
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

-- Dump completed on 2021-03-18 13:44:31
