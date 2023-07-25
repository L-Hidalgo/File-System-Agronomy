-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sistema
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `acapite`
--

DROP TABLE IF EXISTS `acapite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acapite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acapite_id_unique` (`id`),
  KEY `acapite_documento_id_foreign` (`documento_id`),
  KEY `acapite_user_id_foreign` (`user_id`),
  CONSTRAINT `acapite_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`),
  CONSTRAINT `acapite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acapite`
--

LOCK TABLES `acapite` WRITE;
/*!40000 ALTER TABLE `acapite` DISABLE KEYS */;
INSERT INTO `acapite` VALUES (1,'urgentes de vida o muerte',1,1,'2022-11-05 13:14:52','2022-11-05 13:14:52'),(2,'urgentes de vida o muerte',3,1,'2022-11-05 13:23:30','2022-11-05 13:23:30'),(3,'urgentes de vida o muerte',4,1,'2022-11-07 19:44:11','2022-11-07 19:44:11'),(4,'urgentes de vida o muerte',5,1,'2022-11-07 19:46:09','2022-11-07 19:46:09'),(5,'asdasdas',9,1,'2022-11-14 01:46:51','2022-11-14 01:46:51'),(6,'urgentes de vida o muerte',10,1,'2022-11-14 20:25:03','2022-11-14 20:25:03'),(7,'wqeqweqweqw',11,1,'2022-11-14 20:25:38','2022-11-14 20:25:38'),(8,'urgentes de vida o muerte',12,1,'2022-11-14 21:16:05','2022-11-14 21:16:05'),(9,'urgentes de vida o muerte',13,1,'2022-11-14 21:16:17','2022-11-14 21:16:17'),(10,'urgentes de vida o muerte',14,1,'2022-11-14 21:16:32','2022-11-14 21:16:32'),(11,'urgentes de vida o muerte',15,1,'2022-11-14 21:18:34','2022-11-14 21:18:34'),(12,'urgentes de vida o muerte',16,1,'2022-11-14 21:18:58','2022-11-14 21:18:58'),(13,'urgentes de vida o muerte',17,1,'2022-11-14 21:19:25','2022-11-14 21:19:25'),(14,'urgentes de vida o muerte',18,14,'2022-11-21 22:22:01','2022-11-21 22:22:01'),(15,'asdasd',19,14,'2022-12-01 19:42:51','2022-12-01 19:42:51'),(16,'asdasdasd',20,14,'2022-12-01 19:43:27','2022-12-01 19:43:27'),(17,'asdsadsad',21,14,'2022-12-01 19:44:52','2022-12-01 19:44:52'),(18,'qwewqe',22,14,'2022-12-01 19:45:21','2022-12-01 19:45:21'),(19,'qweqwewq',23,14,'2022-12-01 19:45:43','2022-12-01 19:45:43'),(20,'asdasd',25,14,'2022-12-01 20:06:21','2022-12-01 20:06:21'),(21,'urgente',29,1,'2022-12-03 22:42:12','2022-12-03 22:42:12'),(22,'asdasd',30,1,'2022-12-03 22:42:59','2022-12-03 22:42:59'),(23,'asdasdsadsad',31,1,'2022-12-03 23:11:18','2022-12-03 23:11:18'),(24,'por favor urgente',33,14,'2022-12-04 00:01:00','2022-12-04 00:01:00');
/*!40000 ALTER TABLE `acapite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento_id` int(10) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b64` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `archivos_id_unique` (`id`),
  KEY `archivos_documento_id_foreign` (`documento_id`),
  CONSTRAINT `archivos_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (1,1,'1667654092_314352488_148162797931543_2432089483046575849_n.jpg','','jpg','2022-11-05 13:14:52','2022-11-05 13:14:52'),(2,3,'1667654452_sistemab64.png','','png','2022-11-05 13:23:30','2022-11-05 13:23:30'),(3,3,'1667654455_sistemab64.png','','png','2022-11-05 13:23:30','2022-11-05 13:23:30'),(4,4,'1667850220_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(5,4,'1667850223_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(6,4,'1667850224_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(7,4,'1667850239_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(8,4,'1667850239_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(9,4,'1667850243_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(10,4,'1667850243_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(11,5,'1667850252_sistemab64.png','','png','2022-11-07 19:46:09','2022-11-07 19:46:09'),(12,5,'1667850253_sistemab64.png','','png','2022-11-07 19:46:09','2022-11-07 19:46:09'),(13,9,'1668390411_hostal-tukos-la-casa.jpg','','jpg','2022-11-14 01:46:51','2022-11-14 01:46:51'),(14,9,'1668390411_documento de sergio.pdf','','pdf','2022-11-14 01:46:51','2022-11-14 01:46:51'),(15,10,'1668457503_tolerancia y feriado 10 nov.pdf','','pdf','2022-11-14 20:25:03','2022-11-14 20:25:03'),(16,10,'1668457503_tukos.png','','png','2022-11-14 20:25:03','2022-11-14 20:25:03'),(17,11,'1668457538_tolerancia y feriado 10 nov.pdf','','pdf','2022-11-14 20:25:38','2022-11-14 20:25:38'),(18,12,'1668460565_tolerancia y feriado 10 nov.pdf','','pdf','2022-11-14 21:16:05','2022-11-14 21:16:05'),(19,13,'1668460577_El gran libro de HTML5, CSS3 y JavaScript by Juan Diego Gauchat (z-lib.org).pdf','','pdf','2022-11-14 21:16:17','2022-11-14 21:16:17'),(20,14,'1668460592_tolerancia y feriado 10 nov.pdf','','pdf','2022-11-14 21:16:32','2022-11-14 21:16:32'),(21,15,'1668460714_tukos.pdf','','pdf','2022-11-14 21:18:34','2022-11-14 21:18:34'),(22,16,'1668460738_tukos.pdf','','pdf','2022-11-14 21:18:58','2022-11-14 21:18:58'),(23,17,'1668460765_tukos.pdf','','pdf','2022-11-14 21:19:25','2022-11-14 21:19:25'),(24,17,'1668460765_tukos.png','','png','2022-11-14 21:19:25','2022-11-14 21:19:25'),(25,18,'1669069321_DECLARACION_PREINSCRIPCIÓN-2022_20221115120516.pdf','','pdf','2022-11-21 22:22:01','2022-11-21 22:22:01'),(26,19,'1669923771_rest (1).pdf','','pdf','2022-12-01 19:42:51','2022-12-01 19:42:51'),(27,20,'1669923807_rest (1).pdf','','pdf','2022-12-01 19:43:27','2022-12-01 19:43:27'),(28,21,'1669923892_rest (1).pdf','','pdf','2022-12-01 19:44:52','2022-12-01 19:44:52'),(29,22,'1669923921_rest (1).pdf','','pdf','2022-12-01 19:45:21','2022-12-01 19:45:21'),(30,23,'1669923943_rest (1).pdf','','pdf','2022-12-01 19:45:43','2022-12-01 19:45:43'),(31,25,'1669925181_rest (1).pdf','','pdf','2022-12-01 20:06:21','2022-12-01 20:06:21'),(32,26,'1670107281_Cotizacion UATF.pdf','','pdf','2022-12-03 22:41:21','2022-12-03 22:41:21'),(33,27,'1670107293_Cotizacion UATF.pdf','','pdf','2022-12-03 22:41:33','2022-12-03 22:41:33'),(34,28,'1670107297_Cotizacion UATF.pdf','','pdf','2022-12-03 22:41:37','2022-12-03 22:41:37'),(35,29,'1670107332_Cotizacion UATF.pdf','','pdf','2022-12-03 22:42:12','2022-12-03 22:42:12'),(36,30,'1670107379_Cotizacion UATF.pdf','','pdf','2022-12-03 22:42:59','2022-12-03 22:42:59'),(37,31,'1670108311_sistemab64.png','','png','2022-12-03 23:11:18','2022-12-03 23:11:18'),(38,31,'1670108314_sistemab64.png','','png','2022-12-03 23:11:18','2022-12-03 23:11:18'),(39,32,'1670112049_Cotizacion UATF.pdf','','pdf','2022-12-04 00:00:49','2022-12-04 00:00:49'),(40,33,'1670112060_Cotizacion UATF.pdf','','pdf','2022-12-04 00:01:00','2022-12-04 00:01:00');
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backups`
--

DROP TABLE IF EXISTS `backups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backups`
--

LOCK TABLES `backups` WRITE;
/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
INSERT INTO `backups` VALUES (1,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 02:59:23','2022-11-06 02:59:23'),(2,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 02:59:58','2022-11-06 02:59:58'),(3,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 03:35:22','2022-11-06 03:35:22'),(4,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_07.sql','2022-11-07','2022-11-07 19:52:24','2022-11-07 19:52:24'),(5,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_09.sql','2022-11-09','2022-11-10 00:11:53','2022-11-10 00:11:53'),(6,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_09.sql','2022-11-09','2022-11-10 01:50:33','2022-11-10 01:50:33'),(7,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_11.sql','2022-11-11','2022-11-12 00:11:53','2022-11-12 00:11:53'),(8,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_12.sql','2022-11-12','2022-11-13 00:11:53','2022-11-13 00:11:53'),(9,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_15.sql','2022-11-15','2022-11-16 00:11:55','2022-11-16 00:11:55'),(10,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_19.sql','2022-11-19','2022-11-20 00:11:54','2022-11-20 00:11:54'),(11,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_21.sql','2022-11-21','2022-11-22 00:11:52','2022-11-22 00:11:52'),(12,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_26.sql','2022-11-26','2022-11-27 00:11:59','2022-11-27 00:11:59'),(13,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_29.sql','2022-11-29','2022-11-30 00:03:11','2022-11-30 00:03:11'),(14,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_29.sql','2022-11-29','2022-11-30 00:11:53','2022-11-30 00:11:53'),(15,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_01.sql','2022-12-01','2022-12-02 00:11:55','2022-12-02 00:11:55'),(16,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_03.sql','2022-12-03','2022-12-04 00:04:09','2022-12-04 00:04:09'),(17,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_04.sql','2022-12-04','2022-12-05 01:39:28','2022-12-05 01:39:28'),(18,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_06.sql','2022-12-06','2022-12-07 00:12:00','2022-12-07 00:12:00'),(19,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_13.sql','2022-12-13','2022-12-14 00:12:00','2022-12-14 00:12:00'),(20,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_14.sql','2022-12-14','2022-12-15 00:12:00','2022-12-15 00:12:00'),(21,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_16.sql','2022-12-16','2022-12-17 00:12:01','2022-12-17 00:12:01'),(22,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_20.sql','2022-12-20','2022-12-21 00:12:00','2022-12-21 00:12:00'),(23,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_28.sql','2022-12-28','2022-12-29 00:11:59','2022-12-29 00:11:59'),(24,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_29.sql','2022-12-29','2022-12-30 00:12:00','2022-12-30 00:12:00'),(25,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_12_30.sql','2022-12-30','2022-12-31 00:11:56','2022-12-31 00:11:56'),(26,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2023_01_04.sql','2023-01-04','2023-01-05 00:12:01','2023-01-05 00:12:01'),(27,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2023_01_05.sql','2023-01-05','2023-01-06 00:12:01','2023-01-06 00:12:01');
/*!40000 ALTER TABLE `backups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('alta','baja') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alta',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_user_id_foreign` (`user_id`),
  CONSTRAINT `categorias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'tornillos','para ti asas','alta',1,'2022-11-05 13:11:41','2022-11-12 19:52:58'),(2,'regalias','holaz','alta',1,'2022-11-10 15:30:06','2022-11-19 13:31:29'),(3,'cotizador','hola','alta',1,'2022-11-19 13:31:36','2022-11-19 13:31:36'),(4,'cotizador','desarrolladora','alta',1,'2022-11-19 13:33:05','2022-11-19 13:33:05'),(5,'sprint 1','mandado de datos rest','alta',1,'2022-11-19 13:34:07','2022-11-19 13:34:07'),(6,'sprint 1','mandado de datos rest','alta',1,'2022-11-19 13:34:21','2022-11-19 13:34:21'),(7,'yuasa','hola','alta',1,'2022-11-19 13:35:59','2022-11-19 13:35:59'),(8,'cotizador','mandado de datos rest','alta',1,'2022-11-19 13:36:25','2022-11-19 13:36:25'),(9,'dicobap','ss','alta',1,'2022-11-19 13:37:27','2022-11-19 13:37:27'),(10,'asdsad','asdasd','alta',1,'2022-11-19 13:38:19','2022-11-19 13:38:19'),(11,'sprint 1','asdasd','alta',1,'2022-11-19 13:39:35','2022-11-19 13:39:35'),(12,'adasdasd','assdsadsadsdsadsa','alta',1,'2022-11-19 13:40:14','2022-11-19 13:40:14'),(13,'asdsa','asdasd','alta',1,'2022-11-19 13:42:21','2022-11-19 13:42:21'),(14,'convocatoria beca auxiliatura de docencia 2022','mandado de datos rest','alta',1,'2022-11-19 13:42:31','2022-11-19 13:42:31'),(15,'documentos importantes','documentos decanatura','alta',1,'2022-11-21 23:00:36','2022-11-21 23:00:36');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correos`
--

DROP TABLE IF EXISTS `correos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correos_id_unique` (`id`),
  UNIQUE KEY `correos_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correos`
--

LOCK TABLES `correos` WRITE;
/*!40000 ALTER TABLE `correos` DISABLE KEYS */;
INSERT INTO `correos` VALUES (1,'send','admin@admin.com','2022-11-05 18:57:38','2022-11-05 18:57:38'),(2,'send','argus@admin.com','2022-11-05 18:57:38','2022-11-05 18:57:38'),(3,'send','kirito@admin.com','2022-11-05 18:58:37','2022-11-05 18:58:37'),(4,'send','admindata@gmail.com','2022-11-07 19:47:24','2022-11-07 19:47:24');
/*!40000 ALTER TABLE `correos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `estado` enum('privado','publico') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publico',
  `seguimiento` enum('redactado','atendido','enviado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'redactado',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subido_por` int(10) unsigned DEFAULT NULL,
  `estudiante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dirigido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documentos_id_unique` (`id`),
  KEY `documentos_categoria_id_foreign` (`categoria_id`),
  KEY `documentos_user_id_foreign` (`user_id`),
  CONSTRAINT `documentos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `documentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,'Creacion de platos',1,'privado','atendido',1,'2022-11-05 13:14:52','2022-11-05 18:58:37',NULL,NULL,NULL),(3,'documento',1,'publico','atendido',1,'2022-11-05 13:23:30','2022-11-05 18:58:04',NULL,NULL,NULL),(4,'Creacion de platos',1,'publico','atendido',1,'2022-11-07 19:44:11','2022-11-07 19:47:24',NULL,NULL,NULL),(5,'sistema de convercion de pdf a img',1,'publico','redactado',1,'2022-11-07 19:46:09','2022-11-07 19:46:09',NULL,NULL,NULL),(6,'Creacion de platos',2,'publico','redactado',1,'2022-11-12 20:14:10','2022-11-12 20:14:10',NULL,NULL,NULL),(7,'hola',1,'privado','redactado',1,'2022-11-12 20:15:25','2022-11-12 20:15:25',NULL,NULL,NULL),(8,'hola',1,'privado','redactado',1,'2022-11-12 20:16:10','2022-11-12 20:16:10',NULL,NULL,NULL),(9,'zxasad',2,'privado','redactado',1,'2022-11-14 01:46:51','2022-11-14 01:46:51',NULL,NULL,NULL),(10,'sistema de convercion de pdf a img',2,'publico','atendido',1,'2022-11-14 20:25:03','2022-11-24 20:57:37',NULL,NULL,NULL),(11,'kirito',2,'publico','redactado',1,'2022-11-14 20:25:38','2022-11-14 20:25:38',NULL,NULL,NULL),(12,'prueba oficial 1',2,'publico','redactado',1,'2022-11-14 21:16:05','2022-11-14 21:16:05',NULL,NULL,NULL),(13,'prueba oficial 1',2,'publico','redactado',1,'2022-11-14 21:16:17','2022-11-14 21:16:17',NULL,NULL,NULL),(14,'prueba oficial 1',2,'publico','redactado',1,'2022-11-14 21:16:32','2022-11-14 21:16:32',NULL,NULL,NULL),(15,'prueba 2',2,'publico','redactado',1,'2022-11-14 21:18:34','2022-11-14 21:18:34',NULL,NULL,NULL),(16,'prueba 2',2,'publico','redactado',1,'2022-11-14 21:18:58','2022-11-14 21:18:58',NULL,NULL,NULL),(17,'prueva 3',2,'publico','redactado',1,'2022-11-14 21:19:25','2022-11-14 21:19:25',NULL,NULL,NULL),(18,'reunion uno',14,'privado','atendido',14,'2022-11-21 22:22:01','2022-11-21 22:28:50',NULL,NULL,NULL),(19,'saasdasdsad',3,'publico','redactado',14,'2022-12-01 19:42:51','2022-12-01 19:42:51',NULL,NULL,NULL),(20,'saasdasdsad',1,'publico','redactado',14,'2022-12-01 19:43:27','2022-12-01 19:43:27',NULL,NULL,NULL),(21,'asdsad',2,'publico','redactado',14,'2022-12-01 19:44:52','2022-12-01 19:44:52',NULL,NULL,NULL),(22,'saasdasdsad',1,'privado','redactado',14,'2022-12-01 19:45:21','2022-12-01 19:45:21',NULL,NULL,NULL),(23,'qweqwe',1,'publico','redactado',14,'2022-12-01 19:45:43','2022-12-01 19:45:43',NULL,NULL,NULL),(24,'qweqwe',1,'publico','redactado',14,'2022-12-01 19:48:39','2022-12-01 19:48:39',NULL,NULL,NULL),(25,'carta aatencion',2,'publico','redactado',14,'2022-12-01 20:06:21','2022-12-01 20:06:21',NULL,NULL,NULL),(26,'saasdasdsad',2,'privado','redactado',1,'2022-12-03 22:41:21','2022-12-03 22:41:21',1,'Admin Admin rojas  cruz','direcotr  de la carrera'),(27,'saasdasdsad',2,'privado','redactado',1,'2022-12-03 22:41:33','2022-12-03 22:41:33',1,'Admin Admin rojas  cruz','direcotr  de la carrera'),(28,'saasdasdsad',2,'privado','redactado',1,'2022-12-03 22:41:37','2022-12-03 22:41:37',1,'Admin Admin rojas  cruz','direcotr  de la carrera'),(29,'saasdasdsad',2,'privado','redactado',1,'2022-12-03 22:42:12','2022-12-03 22:42:12',1,'Admin Admin rojas  cruz','direcotr  de la carrera'),(30,'saasdasdsad',3,'privado','redactado',1,'2022-12-03 22:42:59','2022-12-03 22:42:59',1,'Admin Admin rojas  cruz','redactado por el estudiante'),(31,'sadasdsa',1,'publico','redactado',1,'2022-12-03 23:11:18','2022-12-03 23:11:18',1,'Admin Admin rojas  cruz','decano de la carrera'),(32,'carta de solicitud',15,'publico','redactado',14,'2022-12-04 00:00:49','2022-12-04 00:00:49',1,'krito kirigaya kazuto killer','dirigidoa l director  de carrera'),(33,'carta de solicitud',15,'publico','redactado',14,'2022-12-04 00:01:00','2022-12-04 00:01:00',1,'krito kirigaya kazuto killer','dirigidoa l director  de carrera');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `descargas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `downloads_documento_id_foreign` (`documento_id`),
  KEY `downloads_user_id_foreign` (`user_id`),
  CONSTRAINT `downloads_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`),
  CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2022_10_27_123240_create_categorias_table',1),(4,'2022_10_27_123306_create_documentos_table',1),(5,'2022_10_27_150248_create_downloads_table',1),(6,'2022_10_27_150313_create_seguimientos_table',1),(7,'2022_10_31_194919_create_tempimages_table',1),(8,'2022_11_05_222551_create_backups_table',2),(9,'2022_12_03_160942_create_modifis_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `seguimientos`
--

DROP TABLE IF EXISTS `seguimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento_id` int(10) unsigned NOT NULL,
  `de_donde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_donde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seguimientos_documento_id_foreign` (`documento_id`),
  CONSTRAINT `seguimientos_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimientos`
--

LOCK TABLES `seguimientos` WRITE;
/*!40000 ALTER TABLE `seguimientos` DISABLE KEYS */;
INSERT INTO `seguimientos` VALUES (1,1,'secretaria','vicerectorado','2022-11-05 20:20:22','2022-11-05 20:20:22'),(2,3,'secretaria','rectorado','2022-11-05 20:21:19','2022-11-05 20:21:19'),(3,1,'vicerectorado','servicios academicos','2022-11-05 20:22:37','2022-11-05 20:22:37'),(4,4,'secretaria','rectorado','2022-11-07 19:50:21','2022-11-07 19:50:21'),(5,4,'rectorado','servicios academicos','2022-11-07 19:50:28','2022-11-07 19:50:28'),(6,17,'secretaria','rectorado','2022-11-21 22:17:15','2022-11-21 22:17:15'),(7,18,'secretaria','virectorado','2022-11-21 22:23:31','2022-11-21 22:23:31'),(8,18,'virectorado','secretaria','2022-11-21 22:25:50','2022-11-21 22:25:50'),(9,18,'secretaria','virectorado','2022-11-21 22:28:50','2022-11-21 22:28:50');
/*!40000 ALTER TABLE `seguimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shared`
--

DROP TABLE IF EXISTS `shared`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shared` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `correo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shared_documento_id_foreign` (`documento_id`),
  KEY `shared_user_id_foreign` (`user_id`),
  KEY `shared_correo_id_foreign` (`correo_id`),
  CONSTRAINT `shared_correo_id_foreign` FOREIGN KEY (`correo_id`) REFERENCES `correos` (`id`),
  CONSTRAINT `shared_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`),
  CONSTRAINT `shared_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shared`
--

LOCK TABLES `shared` WRITE;
/*!40000 ALTER TABLE `shared` DISABLE KEYS */;
INSERT INTO `shared` VALUES (1,3,1,2,'2022-11-05 18:58:04','2022-11-05 18:58:04'),(2,3,1,2,'2022-11-05 18:58:04','2022-11-05 18:58:04'),(3,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(4,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(5,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(6,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(7,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(8,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(9,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(10,10,1,1,'2022-11-24 20:57:37','2022-11-24 20:57:37'),(11,10,1,1,'2022-11-24 20:57:37','2022-11-24 20:57:37');
/*!40000 ALTER TABLE `shared` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempimages`
--

DROP TABLE IF EXISTS `tempimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempimages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `archivo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempimages`
--

LOCK TABLES `tempimages` WRITE;
/*!40000 ALTER TABLE `tempimages` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('admin','director','secretario','estudiante','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `estado` enum('alta','baja') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alta',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Admin','admin@material.com','2022-11-05 13:08:03','$2y$10$DpoEImffqvYZLwd1EUX8a.psyEbfNV9383m27qeRTfaBRAMs4eSmy','director','alta',NULL,'2022-11-05 13:08:03','2022-12-04 00:03:40','rojas ','cruz','8552721'),(2,'cotizador','admin2@admin.com',NULL,'$2y$10$MNtxEEoMINVM0VKCJhsVWu8XborYsra/JI1tw4u/5kQxOlnF9IVLm','secretario','alta',NULL,'2022-11-07 19:40:28','2022-11-12 00:01:52',NULL,'',''),(3,'kirito','adminkirito@gmail.com',NULL,'$2y$10$1tnFicaKLizp5Fk68xkyNeGj5XXvphe21qDXlswSkMXlUkj.R4d4m','secretario','baja',NULL,'2022-11-10 17:07:52','2022-11-12 00:01:50','ROJAS','Cruzz','85527214'),(4,'maria','normajancko7@gmial.com',NULL,'$2y$10$naKhQ2eU8eLqXVNhzViedOkh5ApnFRTHRhE/zYWSnHfQMtAECCcjq','director','baja',NULL,'2022-11-12 20:39:06','2022-11-20 13:21:04','sacaca','jancko','8654181'),(7,'RICARDO','admin22@admin.com',NULL,'$2y$10$vvPBvKYfYqWKMf2h.PCcmuhi3YM6r0miSXFLJb0hA8C.3Eyjt1BTe','director','alta',NULL,'2022-11-19 13:44:41','2022-11-19 13:44:41','aaaas','CRUZ','85272145'),(8,'RICARDO','admin9@admin.com',NULL,'$2y$10$1bZo3a7cPA5L5RLIuId6YumAMwx32IFvZTBUMDCh73at/uz1E6rMG','director','alta',NULL,'2022-11-19 22:14:28','2022-11-19 22:14:28','ROJAS CRUZ','CRUZ','669'),(13,'CHRIS JHOEL','adminkiritoSS@gmail.com',NULL,'$2y$10$ZCrDbuQXUK4xr5vQuFtEkeg4wSEmBAaWG01Lu9gqE9c5KcQ0RIFl2','director','alta',NULL,'2022-11-20 13:00:22','2022-11-20 13:00:32','CRUZ','VARGAS','12345678'),(14,'krito kirigaya','adminkirito1@gmail.com',NULL,'$2y$10$6VeKqqqa.fsWvrhwg.U2deXmw4PGhn6AS0OvQyw7eERSrQ0v1jNTO','estudiante','alta',NULL,'2022-11-21 22:19:54','2022-11-21 22:19:54','kazuto','killer','8552721456'),(16,'alvaro','alvaro@gmail.com',NULL,'$2y$10$0ZCwXjyBLQ6zgusJJQDv.eBoVvQ5O7CdM2Cc.0Nh4VTLQsefNk6Ri','secretario','alta',NULL,'2022-11-29 22:39:34','2022-11-29 22:39:34',NULL,NULL,'8645214'),(17,NULL,'ki@gmial.com',NULL,'$2y$10$8B.NjQIDd3SCsVVD8tOteukY5gJPr.wMn5a/KRTZhDlOk7iokXMJO','secretario','alta',NULL,'2022-11-29 22:41:53','2022-11-29 22:41:53',NULL,NULL,'874574512'),(18,NULL,'ku@admin.com',NULL,'$2y$10$JMve6HL34BV6VcFAlchOFeHw53bqRZF82aXJMzEaCWhH.7k46k8Ve','director','alta',NULL,'2022-11-29 22:42:40','2022-11-29 22:42:40',NULL,NULL,'856756412'),(19,NULL,'ki@amin.com',NULL,'$2y$10$UYwadr4ML8fDwCiuX0BYNuSiYBl2QQrN2.ZcXuZdzS5cpwRxv4i.6','admin','alta',NULL,'2022-11-29 22:44:11','2022-11-29 22:44:11',NULL,NULL,'12344784541');
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

-- Dump completed on 2023-01-07 20:12:01
