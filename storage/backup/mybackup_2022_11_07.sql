-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sisdoc-agro
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acapite`
--

LOCK TABLES `acapite` WRITE;
/*!40000 ALTER TABLE `acapite` DISABLE KEYS */;
INSERT INTO `acapite` VALUES (1,'urgentes de vida o muerte',1,1,'2022-11-05 13:14:52','2022-11-05 13:14:52'),(2,'urgentes de vida o muerte',3,1,'2022-11-05 13:23:30','2022-11-05 13:23:30'),(3,'urgentes de vida o muerte',4,1,'2022-11-07 19:44:11','2022-11-07 19:44:11'),(4,'urgentes de vida o muerte',5,1,'2022-11-07 19:46:09','2022-11-07 19:46:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (1,1,'1667654092_314352488_148162797931543_2432089483046575849_n.jpg','','jpg','2022-11-05 13:14:52','2022-11-05 13:14:52'),(2,3,'1667654452_sistemab64.png','','png','2022-11-05 13:23:30','2022-11-05 13:23:30'),(3,3,'1667654455_sistemab64.png','','png','2022-11-05 13:23:30','2022-11-05 13:23:30'),(4,4,'1667850220_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(5,4,'1667850223_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(6,4,'1667850224_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(7,4,'1667850239_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(8,4,'1667850239_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(9,4,'1667850243_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(10,4,'1667850243_sistemab64.png','','png','2022-11-07 19:44:11','2022-11-07 19:44:11'),(11,5,'1667850252_sistemab64.png','','png','2022-11-07 19:46:09','2022-11-07 19:46:09'),(12,5,'1667850253_sistemab64.png','','png','2022-11-07 19:46:09','2022-11-07 19:46:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backups`
--

LOCK TABLES `backups` WRITE;
/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
INSERT INTO `backups` VALUES (1,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 02:59:23','2022-11-06 02:59:23'),(2,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 02:59:58','2022-11-06 02:59:58'),(3,'C:\\xampp\\htdocs\\agronomia\\storage/backup/mybackup_2022_11_05.sql','2022-11-05','2022-11-06 03:35:22','2022-11-06 03:35:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'tornillos','hola','alta',1,'2022-11-05 13:11:41','2022-11-05 13:11:41');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `documentos_id_unique` (`id`),
  KEY `documentos_categoria_id_foreign` (`categoria_id`),
  KEY `documentos_user_id_foreign` (`user_id`),
  CONSTRAINT `documentos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `documentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,'Creacion de platos',1,'privado','atendido',1,'2022-11-05 13:14:52','2022-11-05 18:58:37'),(3,'documento',1,'publico','atendido',1,'2022-11-05 13:23:30','2022-11-05 18:58:04'),(4,'Creacion de platos',1,'publico','atendido',1,'2022-11-07 19:44:11','2022-11-07 19:47:24'),(5,'sistema de convercion de pdf a img',1,'publico','redactado',1,'2022-11-07 19:46:09','2022-11-07 19:46:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2022_10_27_123240_create_categorias_table',1),(4,'2022_10_27_123306_create_documentos_table',1),(5,'2022_10_27_150248_create_downloads_table',1),(6,'2022_10_27_150313_create_seguimientos_table',1),(7,'2022_10_31_194919_create_tempimages_table',1),(8,'2022_11_05_222551_create_backups_table',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimientos`
--

LOCK TABLES `seguimientos` WRITE;
/*!40000 ALTER TABLE `seguimientos` DISABLE KEYS */;
INSERT INTO `seguimientos` VALUES (1,1,'secretaria','vicerectorado','2022-11-05 20:20:22','2022-11-05 20:20:22'),(2,3,'secretaria','rectorado','2022-11-05 20:21:19','2022-11-05 20:21:19'),(3,1,'vicerectorado','servicios academicos','2022-11-05 20:22:37','2022-11-05 20:22:37'),(4,4,'secretaria','rectorado','2022-11-07 19:50:21','2022-11-07 19:50:21'),(5,4,'rectorado','servicios academicos','2022-11-07 19:50:28','2022-11-07 19:50:28');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shared`
--

LOCK TABLES `shared` WRITE;
/*!40000 ALTER TABLE `shared` DISABLE KEYS */;
INSERT INTO `shared` VALUES (1,3,1,2,'2022-11-05 18:58:04','2022-11-05 18:58:04'),(2,3,1,2,'2022-11-05 18:58:04','2022-11-05 18:58:04'),(3,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(4,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(5,1,1,3,'2022-11-05 18:58:37','2022-11-05 18:58:37'),(6,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(7,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(8,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24'),(9,4,1,4,'2022-11-07 19:47:24','2022-11-07 19:47:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('admin','director','secretario','estudiante','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `estado` enum('alta','baja') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alta',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Admin','admin@material.com','2022-11-05 13:08:03','$2y$10$ceXyxu1FzbfWN6sMlFBfFu2kETbsT/zmJ1rQD7di2GkRec0EYHG5S','admin','alta',NULL,'2022-11-05 13:08:03','2022-11-05 13:08:03'),(2,'cotizador','admin2@admin.com',NULL,'$2y$10$MNtxEEoMINVM0VKCJhsVWu8XborYsra/JI1tw4u/5kQxOlnF9IVLm','secretario','alta',NULL,'2022-11-07 19:40:28','2022-11-07 19:40:28');
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

-- Dump completed on 2022-11-07 15:52:24
