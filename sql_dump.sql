-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: vfio_compatibility
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `base_information`
--

DROP TABLE IF EXISTS `base_information`;
/*!50001 DROP VIEW IF EXISTS `base_information`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `base_information` (
  `id` tinyint NOT NULL,
  `mobo_id` tinyint NOT NULL,
  `mobo` tinyint NOT NULL,
  `cpu_id` tinyint NOT NULL,
  `cpu` tinyint NOT NULL,
  `host_gpu_id` tinyint NOT NULL,
  `host_gpu` tinyint NOT NULL,
  `gpu_b` tinyint NOT NULL,
  `distro_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `distro_version` tinyint NOT NULL,
  `kernel` tinyint NOT NULL,
  `qemu_version` tinyint NOT NULL,
  `patches` tinyint NOT NULL,
  `notes` tinyint NOT NULL,
  `working` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `component` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_fk` int(11) NOT NULL DEFAULT '0',
  `vendor_fk` int(11) NOT NULL DEFAULT '0',
  `easy_name` varchar(50) DEFAULT '0',
  `model` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type_fk` (`type_fk`),
  KEY `vendor_fk` (`vendor_fk`),
  CONSTRAINT `type_fk` FOREIGN KEY (`type_fk`) REFERENCES `component_types` (`id`),
  CONSTRAINT `vendor_fk` FOREIGN KEY (`vendor_fk`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component`
--

LOCK TABLES `component` WRITE;
/*!40000 ALTER TABLE `component` DISABLE KEYS */;
INSERT INTO `component` VALUES (1,1,1,'GTX 970','04G-P4-2974-KR'),(2,4,2,'Taichi','X370'),(3,2,4,'Ryzen 1700X','YD170XBCAEWOF'),(5,2,3,'Core i7 9750X','AYY-LMAO-01'),(6,1,9,'GTX 970','ASSUS-970XP'),(7,1,1,'GTX 1080 Ti','Ayy-lmao-rich-boi'),(8,4,2,'X99 Pro4','X99-PRO4-INTEL');
/*!40000 ALTER TABLE `component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `component_full`
--

DROP TABLE IF EXISTS `component_full`;
/*!50001 DROP VIEW IF EXISTS `component_full`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `component_full` (
  `id` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `type_fk` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `vendor_fk` tinyint NOT NULL,
  `easy_name` tinyint NOT NULL,
  `model` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `component_types`
--

DROP TABLE IF EXISTS `component_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `component_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component_types`
--

LOCK TABLES `component_types` WRITE;
/*!40000 ALTER TABLE `component_types` DISABLE KEYS */;
INSERT INTO `component_types` VALUES (1,'GPU'),(2,'CPU'),(3,'RAM'),(4,'Motherboard');
/*!40000 ALTER TABLE `component_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distros`
--

DROP TABLE IF EXISTS `distros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distros`
--

LOCK TABLES `distros` WRITE;
/*!40000 ALTER TABLE `distros` DISABLE KEYS */;
INSERT INTO `distros` VALUES (1,'Fedora'),(2,'Ubuntu'),(3,'Arch'),(4,'Debian'),(5,'Mint');
/*!40000 ALTER TABLE `distros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `known_configurations`
--

DROP TABLE IF EXISTS `known_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `known_configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobo_id` int(11) NOT NULL DEFAULT '0',
  `ram_id` int(11) DEFAULT NULL,
  `cpu_id` int(11) NOT NULL DEFAULT '0',
  `host_gpu_id` int(11) NOT NULL DEFAULT '0',
  `pass_gpu_1_id` int(11) DEFAULT NULL,
  `pass_gpu_2_id` int(11) DEFAULT NULL,
  `pass_gpu_3_id` int(11) DEFAULT NULL,
  `distro_id` int(11) NOT NULL DEFAULT '0',
  `distro_version` varchar(50) NOT NULL DEFAULT '0',
  `kernel` varchar(50) NOT NULL DEFAULT '0',
  `hypervisor` varchar(24) NOT NULL DEFAULT 'KVM',
  `hypervisor_version` varchar(24) DEFAULT NULL,
  `qemu_version` varchar(50) NOT NULL DEFAULT '0',
  `patches` varchar(1024) DEFAULT NULL,
  `notes` varchar(1024) DEFAULT NULL,
  `working` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mobo_id` (`mobo_id`),
  KEY `cpu_id` (`cpu_id`),
  KEY `host_gpu_id` (`host_gpu_id`),
  KEY `distro_id` (`distro_id`),
  KEY `pass_gpu_1_id` (`pass_gpu_1_id`),
  KEY `pass_gpu_2_id` (`pass_gpu_2_id`),
  KEY `pass_gpu_3_id` (`pass_gpu_3_id`),
  KEY `ram_id` (`ram_id`),
  CONSTRAINT `cpu_id` FOREIGN KEY (`cpu_id`) REFERENCES `component` (`id`),
  CONSTRAINT `distro_id` FOREIGN KEY (`distro_id`) REFERENCES `distros` (`id`),
  CONSTRAINT `host_gpu_id` FOREIGN KEY (`host_gpu_id`) REFERENCES `component` (`id`),
  CONSTRAINT `mobo_id` FOREIGN KEY (`mobo_id`) REFERENCES `component` (`id`),
  CONSTRAINT `pass_gpu_1_id` FOREIGN KEY (`pass_gpu_1_id`) REFERENCES `component` (`id`),
  CONSTRAINT `pass_gpu_2_id` FOREIGN KEY (`pass_gpu_2_id`) REFERENCES `component` (`id`),
  CONSTRAINT `pass_gpu_3_id` FOREIGN KEY (`pass_gpu_3_id`) REFERENCES `component` (`id`),
  CONSTRAINT `ram_id` FOREIGN KEY (`ram_id`) REFERENCES `component` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `known_configurations`
--

LOCK TABLES `known_configurations` WRITE;
/*!40000 ALTER TABLE `known_configurations` DISABLE KEYS */;
/*!40000 ALTER TABLE `known_configurations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'2017-09-25 19:55:49','Site','Hello! If you have stumbled upon this site, chances are you are looking for more information on VFIO hardware compatibility. This site aims to make things a little more centralized if someone would like to build a computer around GPU passthrough.'),(2,'2017-09-25 19:56:10','Update','Another testing entry');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (1,'EVGA'),(2,'ASRock'),(3,'Intel'),(4,'AMD'),(5,'Nvidia'),(6,'G.Skill'),(7,'Corsair'),(8,'MSI'),(9,'ASUS'),(10,'Biostar'),(11,'Gigabyte');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `base_information`
--

/*!50001 DROP TABLE IF EXISTS `base_information`*/;
/*!50001 DROP VIEW IF EXISTS `base_information`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `base_information` AS select `m`.`id` AS `id`,`mobo`.`id` AS `mobo_id`,`mobo`.`easy_name` AS `mobo`,`cpu`.`id` AS `cpu_id`,`cpu`.`easy_name` AS `cpu`,`host_gpu`.`id` AS `host_gpu_id`,`host_gpu`.`easy_name` AS `host_gpu`,`gpu_b`.`easy_name` AS `gpu_b`,`d`.`id` AS `distro_id`,`d`.`name` AS `name`,`m`.`distro_version` AS `distro_version`,`m`.`kernel` AS `kernel`,`m`.`qemu_version` AS `qemu_version`,`m`.`patches` AS `patches`,`m`.`notes` AS `notes`,`m`.`working` AS `working` from (((((`known_configurations` `m` join `component` `mobo` on((`mobo`.`id` = `m`.`mobo_id`))) join `component` `cpu` on((`cpu`.`id` = `m`.`cpu_id`))) join `component` `host_gpu` on((`host_gpu`.`id` = `m`.`host_gpu_id`))) left join `component` `gpu_b` on((`gpu_b`.`id` = `m`.`pass_gpu_1_id`))) join `distros` `d` on((`d`.`id` = `m`.`distro_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `component_full`
--

/*!50001 DROP TABLE IF EXISTS `component_full`*/;
/*!50001 DROP VIEW IF EXISTS `component_full`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `component_full` AS select `c`.`id` AS `id`,`ct`.`type` AS `type`,`c`.`type_fk` AS `type_fk`,`v`.`name` AS `name`,`c`.`vendor_fk` AS `vendor_fk`,`c`.`easy_name` AS `easy_name`,`c`.`model` AS `model` from ((`component` `c` left join `component_types` `ct` on((`ct`.`id` = `c`.`type_fk`))) left join `vendor` `v` on((`v`.`id` = `c`.`vendor_fk`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-26 21:40:42
