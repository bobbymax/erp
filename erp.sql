-- MySQL dump 10.13  Distrib 8.0.16, for osx10.14 (x86_64)
--
-- Host: localhost    Database: erp
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assigned_tickets`
--

DROP TABLE IF EXISTS `assigned_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `assigned_tickets` (
  `user_id` bigint(20) unsigned NOT NULL,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ticket_id`),
  KEY `assigned_tickets_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `assigned_tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assigned_tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_tickets`
--

LOCK TABLES `assigned_tickets` WRITE;
/*!40000 ALTER TABLE `assigned_tickets` DISABLE KEYS */;
INSERT INTO `assigned_tickets` VALUES (1,3,'2019-04-30 14:49:04','2019-04-30 14:49:04'),(3,1,'2019-04-30 10:11:00','2019-04-30 10:11:00'),(3,2,'2019-04-30 10:33:37','2019-04-30 10:33:37'),(3,6,'2019-07-04 20:20:37','2019-07-04 20:20:37'),(6,5,'2019-05-05 22:12:57','2019-05-05 22:12:57'),(8,4,'2019-05-02 12:11:16','2019-05-02 12:11:16');
/*!40000 ALTER TABLE `assigned_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_label_unique` (`label`),
  KEY `categories_module_id_foreign` (`module_id`),
  CONSTRAINT `categories_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,'Network','network','ti-panel',0,'2019-04-26 09:43:32','2019-04-26 09:43:32'),(2,1,'ICT Work Tools','ict-work-tools','ti-printer',0,'2019-04-26 09:44:11','2019-04-26 09:44:11'),(3,1,'Communication','communication','ti-mobile',0,'2019-04-26 09:44:53','2019-04-26 09:44:53'),(4,1,'Board Applications','board-applications','ti-layers-alt',0,'2019-04-26 09:45:48','2019-04-26 09:45:48'),(5,2,'Management','management','ti-management',0,'2019-05-02 00:09:04','2019-05-02 00:09:04'),(6,2,'Conference','conference','ti-conference',0,'2019-05-02 00:09:21','2019-05-02 00:09:21'),(7,2,'Workshop','workshop','ti-workshop',0,'2019-05-02 00:09:36','2019-05-02 00:09:36'),(8,2,'Leadership','leadership','ti-leadership',0,'2019-05-02 00:09:55','2019-05-02 00:09:55'),(9,2,'Skill Acquisition','skill-acquisition','ti-skill',0,'2019-05-02 00:10:13','2019-05-02 00:10:13');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_permission`
--

DROP TABLE IF EXISTS `group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `group_permission` (
  `group_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `group_permission_permission_id_foreign` (`permission_id`),
  CONSTRAINT `group_permission_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_permission`
--

LOCK TABLES `group_permission` WRITE;
/*!40000 ALTER TABLE `group_permission` DISABLE KEYS */;
INSERT INTO `group_permission` VALUES (1,1),(1,2),(1,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,16),(2,17),(2,18),(2,19),(2,20),(2,21),(4,21),(5,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(4,30),(5,30),(11,30),(4,31),(5,31),(11,31),(5,32),(4,33),(5,33),(2,34),(2,35),(11,35),(9,36),(11,36),(4,37),(5,37),(11,37),(5,38),(8,38),(11,38),(2,42),(8,42),(9,42),(11,42),(5,43),(5,44),(5,45),(5,46),(2,47),(2,48),(2,49),(2,50),(6,51),(7,51),(8,51),(9,51),(10,51),(11,52),(2,53),(2,54),(2,55),(2,56),(2,57);
/*!40000 ALTER TABLE `group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `relative` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrators','administrators','ADM',0,0,0,'2019-04-24 12:27:13','2019-04-24 12:27:13'),(2,'Enterprise Administrators','enterprise-administrators','EADM',1,0,0,'2019-04-24 12:30:36','2019-04-24 12:30:36'),(3,'Global Administrators','global-administrators','GADM',1,0,0,'2019-04-24 12:33:59','2019-04-24 12:33:59'),(4,'Users','users','USR',0,0,0,'2019-04-24 12:35:57','2019-04-24 12:35:57'),(5,'Staff','staff','SUSR',4,0,0,'2019-04-24 12:50:37','2019-04-24 12:50:37'),(6,'Executive Secretary Office','executive-secretary-office','ESO',0,0,0,'2019-05-02 11:24:13','2019-05-02 11:24:13'),(7,'Information & Communication Technology','information-communication-technology','ICT',6,0,0,'2019-05-02 11:24:30','2019-05-02 11:24:30'),(8,'Manager','manager','MICT',6,7,0,'2019-05-02 11:25:50','2019-05-02 11:25:50'),(9,'Supervisor','supervisor','SUP',6,7,0,'2019-05-02 12:33:47','2019-05-02 12:33:47'),(10,'Members','members','MEMT',6,7,0,'2019-05-02 12:34:11','2019-05-02 12:34:11'),(11,'Helpdesk Supervisor','helpdesk-supervisor','HLPS',0,7,0,'2019-07-07 18:37:18','2019-07-07 18:37:18');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `issues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requests` text COLLATE utf8mb4_unicode_ci,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `issues_label_unique` (`label`),
  KEY `issues_category_id_foreign` (`category_id`),
  CONSTRAINT `issues_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (1,1,'Connection Problems','connection-problems','\"No Internet Connection, No Cable to connect to port, Connection port is damaged, WiFi hotspot not visible on my computer, I cannot access some websites, Computer not connected to printer\"',0,'2019-04-26 12:55:23','2019-04-26 12:55:23'),(2,1,'User Management','user-management','\"Request for password reset, Update user information\"',0,'2019-04-26 12:59:37','2019-04-26 12:59:37'),(3,2,'Workstation','workstation','\"Laptop\\/Desktop not powering on, Laptop charging port or charger is no longer working, System taking to long to sign in, Keypad not working, System infected by virus, System has crashed, Upgrade system memory, System is too slow\"',0,'2019-04-26 13:03:20','2019-04-26 13:03:20'),(4,2,'Printer Problems','printer-problems','\"Printer not working, Request for replacement of toner\\/ink\"',0,'2019-04-26 13:04:30','2019-04-26 13:04:30'),(5,3,'Email Problems','email-problems','\"Request for password reset, Update user information, Create account for staff, Request to suspend or remove a user, Configure email on my device, My mails are not dropping, Resolve my email signature\"',0,'2019-04-26 13:06:39','2019-04-26 13:06:39'),(6,3,'IP Phone','ip-phone','\"I cannot hear the person on the other side, The phone is not connected, I cannot make\\/receive calls\"',0,'2019-04-26 13:08:20','2019-04-26 13:08:20'),(7,4,'Budget Portal','budget-portal','\"The server is unreachable\\/unavailable, Request for password reset, Request to create\\/remove user, Request for batch reversal, Product activation error message, An error page is displayed\"',0,'2019-04-26 13:10:40','2019-04-26 13:10:40'),(8,4,'Sun Systems (FAD)','sun-systems-fad','\"Request for password reset, Request to create\\/remove user, Request to add privileges for user, The server is unreachable\\/unavailable, I cannot remote into the server, Slow response time to login, Other\"',0,'2019-04-26 13:12:30','2019-04-26 13:12:30'),(9,4,'Staff Services','staff-services','\"Request for password reset\"',0,'2019-04-26 13:12:55','2019-04-26 13:12:55');
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_label_unique` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Opolo','opolo',0,'2019-04-25 13:32:58','2019-04-25 13:32:58'),(2,'Onopa','onopa',0,'2019-04-25 13:33:28','2019-04-25 13:33:36'),(3,'Abuja','abuja',0,'2019-04-25 13:34:03','2019-04-25 13:34:11'),(4,'Lagos','lagos',0,'2019-04-25 13:34:32','2019-04-25 13:34:37');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_label_unique` (`label`),
  KEY `menus_module_id_foreign` (`module_id`),
  CONSTRAINT `menus_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,1,'Support Categories','support-categories','ti-category','manage-categories','categories.index',0,'2019-04-26 09:48:40','2019-04-26 09:48:40'),(2,1,'Frequent Issues','frequent-issues','ti-issues','manage-issues','issues.index',0,'2019-04-26 13:16:47','2019-04-26 13:16:47'),(3,1,'Support Tickets','support-tickets','ti-ticket','browse-tickets','tickets.index',0,'2019-04-27 15:36:27','2019-04-27 15:36:53'),(4,1,'Assign Tickets','assign-tickets','ti-many','assign-tickets','unresolved.tickets',0,'2019-04-28 15:19:34','2019-04-28 15:19:34'),(5,1,'Tasks','tasks','ti-tasks','manage-tasks','tasks.index',0,'2019-04-28 21:25:45','2019-04-28 21:25:45'),(6,1,'Approve Tickets','approve-tickets','ti-modle','approve-tickets','approve.tickets',0,'2019-04-30 14:35:25','2019-04-30 14:35:25'),(7,2,'Trainings','trainings','ti-trainings','browse-trainings','trainings.index',0,'2019-05-01 22:35:23','2019-05-01 22:35:23'),(8,2,'Manage Trainings','manage-trainings','ti-staff','manage-trainings','manage.trainings',0,'2019-05-01 23:39:52','2019-05-01 23:39:52'),(9,2,'Archived Trainings','archived-trainings','ti-archived','manage-trainings','archived.trainings',0,'2019-05-02 00:29:55','2019-05-02 00:29:55'),(10,2,'Propose Training','propose-training','ti-proposed','browse-proposed-trainings','propose.trainings',0,'2019-05-02 07:13:11','2019-05-02 07:13:11'),(11,1,'Adhoc Support Ticket','adhoc-support-ticket','ti-support','create-support-ticket-for-staff','adhoc.support',0,'2019-07-07 18:35:32','2019-07-07 18:35:32'),(12,3,'Menus','menus','ti-menu','manage-menus','menus.index',0,'2019-07-08 06:59:36','2019-07-08 06:59:36'),(13,3,'Permissions','permissions','ti-permissions','manage-permissions','permissions.index',0,'2019-07-08 07:01:54','2019-07-08 07:01:54'),(14,3,'Groups','groups','ti-groups','manage-groups','groups.index',0,'2019-07-08 07:02:26','2019-07-08 07:02:26'),(15,3,'User Management','user-management','ti-users','manage-users','users.index',0,'2019-07-08 07:02:57','2019-07-08 07:02:57');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_04_24_031840_create_groups_table',2),(4,'2019_04_24_032441_create_permissions_table',3),(10,'2019_04_25_004500_create_group_permission_table',4),(11,'2019_04_25_024924_create_user_group_table',4),(12,'2019_04_25_132416_add_room_number_and_location_to_users_table',5),(13,'2019_04_25_132944_create_locations_table',6),(14,'2019_04_25_214157_create_modules_table',7),(15,'2019_04_26_081828_create_menus_table',8),(16,'2019_04_26_082034_add_icon_column_to_modules_table',8),(17,'2019_04_26_093943_create_categories_table',9),(18,'2019_04_26_111704_create_issues_table',10),(20,'2019_04_26_221342_create_tickets_table',11),(43,'2019_04_28_203045_create_assigned_tickets_table',12),(44,'2019_04_29_084450_create_ticket_reports_table',12),(47,'2019_05_01_190829_create_trainings_table',13),(48,'2019_05_02_082914_add_approved_column_to_trainings_table',14),(49,'2019_05_05_152753_add_assigned_by_to_tickets_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_label_unique` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Helpdesk','helpdesk','ti-desktop','manage-helpdesk','helpdesk.index',0,'2019-04-26 06:49:00','2019-04-26 07:39:56'),(2,'Staff Services','staff-services','ti-folder','manage-staff-services','staff.services',0,'2019-05-01 16:53:11','2019-05-01 16:53:11'),(3,'ERP Structure','erp-structure','ti-settings','manage-erp-structure','users.dashboard',0,'2019-07-08 06:58:01','2019-07-08 06:58:43');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_label_unique` (`label`),
  UNIQUE KEY `permissions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Manage Users','manage-users','MUSR',0,'2019-04-24 23:34:22','2019-04-24 23:34:22'),(2,'Create Users','create-users','CUSR',0,'2019-04-24 23:34:38','2019-04-24 23:35:45'),(3,'Edit Users','edit-users','EUSR',0,'2019-04-24 23:34:57','2019-04-24 23:35:51'),(4,'Delete Users','delete-users','DUSR',0,'2019-04-24 23:35:11','2019-04-24 23:35:11'),(5,'Manage Modules','manage-modules','MMDU',0,'2019-04-24 23:36:36','2019-04-24 23:36:36'),(6,'Create Modules','create-modules','CMDU',0,'2019-04-24 23:36:55','2019-04-24 23:37:15'),(7,'Edit Modules','edit-modules','EMDU',0,'2019-04-24 23:37:08','2019-04-24 23:37:08'),(8,'Delete Modules','delete-modules','DMDU',0,'2019-04-24 23:37:36','2019-04-24 23:37:36'),(9,'Manage Groups','manage-groups','MGRP',0,'2019-04-24 23:38:22','2019-04-24 23:38:22'),(10,'Create Groups','create-groups','CGRP',0,'2019-04-24 23:38:41','2019-04-24 23:38:41'),(11,'Edit Groups','edit-groups','EGRP',0,'2019-04-24 23:39:07','2019-04-24 23:39:07'),(12,'Delete Groups','delete-groups','DGRP',0,'2019-04-24 23:39:20','2019-04-24 23:39:20'),(13,'Manage Permissions','manage-permissions','MPRM',0,'2019-04-24 23:39:44','2019-04-24 23:39:44'),(14,'Create Permissions','create-permissions','CPRM',0,'2019-04-24 23:39:57','2019-04-24 23:39:57'),(15,'Edit Permissions','edit-permissions','EPRM',0,'2019-04-24 23:40:11','2019-04-24 23:40:11'),(16,'Delete Permissions','delete-permissions','DPRM',0,'2019-04-24 23:40:24','2019-04-24 23:40:24'),(17,'Manage Locations','manage-locations','MLOC',0,'2019-04-25 18:34:47','2019-04-25 18:34:47'),(18,'Create Locations','create-locations','CLOC',0,'2019-04-25 18:35:05','2019-04-25 18:35:05'),(19,'Edit Locations','edit-locations','ELOC',0,'2019-04-25 18:35:31','2019-04-25 18:35:31'),(20,'Delete Locations','delete-locations','DLOC',0,'2019-04-25 18:36:07','2019-04-25 18:36:07'),(21,'Manage Helpdesk','manage-helpdesk','MHD',0,'2019-04-26 06:51:48','2019-04-26 06:51:48'),(22,'Manage Categories','manage-categories','MCAT',0,'2019-04-26 09:32:46','2019-04-26 09:32:46'),(23,'Create Categories','create-categories','CCAT',0,'2019-04-26 09:33:00','2019-04-26 09:33:00'),(24,'Edit Categories','edit-categories','ECAT',0,'2019-04-26 09:33:18','2019-04-26 09:33:18'),(25,'Delete Categories','delete-categories','DCAT',0,'2019-04-26 09:33:30','2019-04-26 09:33:30'),(26,'Manage Issues','manage-issues','MISS',0,'2019-04-26 12:44:17','2019-04-26 12:44:17'),(27,'Create Issues','create-issues','CISS',0,'2019-04-26 12:44:29','2019-04-26 12:44:29'),(28,'Edit Issues','edit-issues','EISS',0,'2019-04-26 12:44:41','2019-04-26 12:44:41'),(29,'Delete Issues','delete-issues','DISS',0,'2019-04-26 12:44:53','2019-04-26 12:44:53'),(30,'Browse Tickets','browse-tickets','BTIC',0,'2019-04-27 15:26:06','2019-04-27 15:26:06'),(31,'Read Tickets','read-tickets','RTIC',0,'2019-04-27 15:26:23','2019-04-27 15:26:23'),(32,'Edit Tickets','edit-tickets','ETIC',0,'2019-04-27 15:26:41','2019-04-27 15:26:41'),(33,'Create Tickets','create-tickets','CTIC',0,'2019-04-27 15:26:57','2019-04-27 15:26:57'),(34,'Delete Tickets','delete-tickets','DTIC',0,'2019-04-27 15:27:26','2019-04-27 15:27:26'),(35,'Manage Tickets','manage-tickets','MTIC',0,'2019-04-27 15:27:42','2019-04-27 15:27:42'),(36,'Assign Tickets','assign-tickets','ATIC',0,'2019-04-27 15:30:11','2019-04-27 15:30:11'),(37,'Open Tickets','open-tickets','OTIC',0,'2019-04-27 15:30:38','2019-04-27 15:30:38'),(38,'Close Tickets','close-tickets','CTIK',0,'2019-04-27 15:31:02','2019-04-27 15:31:02'),(39,'Manage Tasks','manage-tasks','MTAK',0,'2019-04-28 21:24:58','2019-04-28 21:24:58'),(40,'Transfer Tickets','transfer-tickets','TTIC',0,'2019-04-28 21:39:39','2019-04-28 21:39:39'),(41,'Generate Ticket Report','generate-ticket-report','GTIR',0,'2019-04-28 21:44:39','2019-04-28 21:44:39'),(42,'Approve Tickets','approve-tickets','ATIK',0,'2019-04-30 11:54:10','2019-04-30 11:54:10'),(43,'Manage Staff Services','manage-staff-services','MSS',0,'2019-05-01 16:53:37','2019-05-01 16:53:37'),(44,'Browse Trainings','browse-trainings','BTR',0,'2019-05-01 22:35:47','2019-05-01 22:35:47'),(45,'Create Trainings','create-trainings','CTR',0,'2019-05-01 22:36:01','2019-05-01 22:36:01'),(46,'Read Trainings','read-trainings','RTR',0,'2019-05-01 22:36:19','2019-05-01 22:36:19'),(47,'Edit Trainings','edit-trainings','ETR',0,'2019-05-01 22:36:33','2019-05-01 22:36:33'),(48,'Delete Trainings','delete-trainings','DTR',0,'2019-05-01 22:36:44','2019-05-01 22:36:44'),(49,'Manage Trainings','manage-trainings','MTR',0,'2019-05-01 22:36:55','2019-05-01 22:36:55'),(50,'Browse Proposed Trainings','browse-proposed-trainings','BPTR',0,'2019-05-02 07:13:33','2019-05-02 07:13:33'),(51,'Manage ICT','manage-ict','MAIT',0,'2019-05-02 11:26:40','2019-05-02 11:26:40'),(52,'Create Support Ticket For Staff','create-support-ticket-for-staff','CSTS',0,'2019-07-07 18:36:16','2019-07-07 18:36:16'),(53,'Manage ERP Structure','manage-erp-structure','MERP',0,'2019-07-08 06:53:19','2019-07-08 06:53:19'),(54,'Manage Menus','manage-menus','MME',0,'2019-07-08 07:00:26','2019-07-08 07:00:26'),(55,'Create Menus','create-menus','CME',0,'2019-07-08 07:00:37','2019-07-08 07:00:37'),(56,'Edit Menus','edit-menus','EMEN',0,'2019-07-08 07:00:48','2019-07-08 07:00:48'),(57,'Delete Menus','delete-menus','DMEN',0,'2019-07-08 07:00:58','2019-07-08 07:00:58');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_reports`
--

DROP TABLE IF EXISTS `ticket_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ticket_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `details` json NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_reports_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `ticket_reports_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_reports`
--

LOCK TABLES `ticket_reports` WRITE;
/*!40000 ALTER TABLE `ticket_reports` DISABLE KEYS */;
INSERT INTO `ticket_reports` VALUES (1,1,'[[1, \"3\", \"escalated\", \"Please just handle this\", \"2019-04-30T11:11:00.566065Z\"], [3, \"3\", \"resolved\", \"Time to finish this\", \"2019-04-30T11:11:27.170860Z\"]]',0,'2019-04-30 10:11:00','2019-04-30 10:11:27'),(2,3,'[[4, \"1\", \"escalated\", \"Bobby please treat this i am not on sit\", \"2019-04-30T15:49:04.002389Z\"], [1, \"1\", \"resolved\", \"It has been resolved\", \"2019-04-30T15:49:41.778780Z\"]]',0,'2019-04-30 14:49:04','2019-04-30 14:49:41'),(3,4,'[[10, \"6\", \"escalated\", \"After changing the power cable the printer still did not start up, I suspect that the power from the mains may not be working, please assisit\", \"2019-05-02T13:06:35.161956Z\"], [6, \"8\", \"escalated\", \"Andy please treat this, I think it is an electrical issue\", \"2019-05-02T13:11:16.440297Z\"], [8, \"8\", \"resolved\", \"I called a representative from FLD, who identified the problem from the socket and fixed it\", \"2019-05-02T13:20:32.081102Z\"]]',0,'2019-05-02 12:06:35','2019-05-02 12:20:32'),(4,5,'[[1, 8, \"assigned\", \"This ticket was assigned by to 8 by Bobby Ekaro\", \"2019-05-05T23:08:31.088859Z\"], [8, \"3\", \"escalated\", \"I underestimated this issue, please can you come over and handle it, I have tried everything I can, take this as a lesson\", \"2019-05-05T23:11:16.947994Z\"], [3, \"6\", \"escalated\", \"I understand that this cannot be handled but please help a brother here na, abbeg just go check this thing\", \"2019-05-05T23:12:57.194220Z\"], [6, \"6\", \"resolved\", \"I finally solved the issue, all thanks to me you get it right?\", \"2019-05-05T23:13:48.692351Z\"]]',0,'2019-05-05 22:08:31','2019-05-05 22:13:48'),(5,6,'[[1, 8, \"assigned\", \"This ticket has been assigned\", \"2019-07-04T21:17:45.050076Z\"], [8, \"7\", \"escalated\", \"Because I cannot fix this issue\", \"2019-07-04T21:19:06.648891Z\"], [7, \"6\", \"escalated\", \"Please Femi attend to this while you can\", \"2019-07-04T21:19:56.295525Z\"], [6, \"3\", \"escalated\", \"Person no fit do this thing . na just do am\", \"2019-07-04T21:20:37.766878Z\"], [3, \"3\", \"resolved\", \"Something has been done to this ticket\", \"2019-07-04T21:23:07.572024Z\"]]',0,'2019-07-04 20:17:45','2019-07-04 20:23:07'),(6,2,'[[3, \"3\", \"unresolved\", \"I could not solve the issue.\", \"2019-07-04T21:40:30.700117Z\"]]',0,'2019-07-04 20:40:30','2019-07-04 20:40:30');
/*!40000 ALTER TABLE `ticket_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `issue_id` bigint(20) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` text COLLATE utf8mb4_unicode_ci,
  `assigned` tinyint(1) NOT NULL DEFAULT '0',
  `transferred` int(11) NOT NULL DEFAULT '0',
  `report_generated` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unresolved',
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assigned_by` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_code_unique` (`code`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_category_id_foreign` (`category_id`),
  KEY `tickets_issue_id_foreign` (`issue_id`),
  CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_issue_id_foreign` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,1,3,5,'03704238','Update user information','Please come now',1,1,1,'resolved',NULL,'high',1,'2019-04-28 11:23:58','2019-04-30 12:04:22',0),(2,1,4,7,'32707328','Request to create/remove user','The username is Bobby and designation is Systems Admin',1,0,1,'resolved',NULL,'high',0,'2019-04-28 12:15:28','2019-07-04 20:40:30',0),(3,3,4,9,'04188892','Request for password reset','Please come now',1,1,1,'resolved',NULL,'high',1,'2019-04-30 14:41:32','2019-04-30 14:51:20',0),(4,5,2,4,'97959396','Request for replacement of toner/ink',NULL,1,2,1,'resolved',NULL,'high',1,'2019-05-02 11:16:36','2019-05-02 12:30:53',0),(5,5,2,4,'59580992','Printer not working','The printer is not coming up and the power seems to be off, we have tried everything and it is still not working. please come',1,2,1,'resolved',NULL,'high',0,'2019-05-02 11:43:12','2019-05-05 22:13:48',1),(6,1,4,7,'22415001','The server is unreachable/unavailable','Please come and fix this issue',1,3,1,'resolved',NULL,'high',1,'2019-07-04 20:16:41','2019-07-05 01:29:09',1),(7,7,1,1,'42207176','No Internet Connection','Something has to be here',0,0,0,'unresolved',NULL,'high',0,'2019-07-07 18:19:36','2019-07-07 18:19:36',0);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `trainings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_during_training` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `review` int(11) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trainings_user_id_foreign` (`user_id`),
  CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
INSERT INTO `trainings` VALUES (1,1,9,'.NET MVC training','net-mvc-training','Jet Links','jet-links','Lagos','2018-11-19 00:00:00','2018-11-23 00:00:00',NULL,'NCDMB',1,0,1,1,'2019-05-01 23:31:15','2019-05-02 00:22:41'),(2,1,0,'Java Software Development','java-software-development','Jet Links','jet-links','Lagos','2019-06-25 00:00:00','2019-06-28 00:00:00',NULL,NULL,0,0,0,0,'2019-05-02 07:26:03','2019-05-02 07:26:03');
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_group` (
  `user_id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `user_group_group_id_foreign` (`group_id`),
  CONSTRAINT `user_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,1,'2019-04-25 17:39:25','2019-04-25 17:39:25'),(1,2,'2019-04-25 17:39:24','2019-04-25 17:39:24'),(1,5,'2019-04-27 15:32:39','2019-04-27 15:32:39'),(1,6,'2019-05-02 11:33:13','2019-05-02 11:33:13'),(1,7,'2019-05-02 11:33:13','2019-05-02 11:33:13'),(1,10,'2019-05-02 12:36:08','2019-05-02 12:36:08'),(1,11,'2019-07-07 18:39:14','2019-07-07 18:39:14'),(3,1,'2019-04-28 16:38:58','2019-04-28 16:38:58'),(3,4,'2019-04-25 18:07:32','2019-04-25 18:07:32'),(3,5,'2019-04-25 18:08:06','2019-04-25 18:08:06'),(3,6,'2019-05-02 11:33:01','2019-05-02 11:33:01'),(3,7,'2019-05-02 11:33:01','2019-05-02 11:33:01'),(3,10,'2019-05-02 12:36:04','2019-05-02 12:36:04'),(4,1,'2019-04-30 14:40:35','2019-04-30 14:40:35'),(4,4,'2019-04-30 14:40:15','2019-04-30 14:40:15'),(4,5,'2019-04-30 14:40:35','2019-04-30 14:40:35'),(4,6,'2019-05-02 11:33:21','2019-05-02 11:33:21'),(4,7,'2019-05-02 11:33:21','2019-05-02 11:33:21'),(4,9,'2019-05-02 12:35:46','2019-05-02 12:35:46'),(5,4,'2019-05-02 11:03:40','2019-05-02 11:03:40'),(6,1,'2019-07-08 07:45:45','2019-07-08 07:45:45'),(6,4,'2019-05-02 11:20:30','2019-05-02 11:20:30'),(6,5,'2019-05-02 11:21:03','2019-05-02 11:21:03'),(6,6,'2019-05-02 11:33:29','2019-05-02 11:33:29'),(6,7,'2019-05-02 11:33:29','2019-05-02 11:33:29'),(6,10,'2019-05-02 12:35:58','2019-05-02 12:35:58'),(7,1,'2019-05-02 11:21:53','2019-05-02 11:21:53'),(7,4,'2019-05-02 11:21:44','2019-05-02 11:21:44'),(7,5,'2019-05-02 11:21:53','2019-05-02 11:21:53'),(7,6,'2019-05-02 11:33:37','2019-05-02 11:33:37'),(7,7,'2019-05-02 11:33:37','2019-05-02 11:33:37'),(7,10,'2019-05-02 12:35:52','2019-05-02 12:35:52'),(8,1,'2019-05-02 11:33:48','2019-05-02 11:33:48'),(8,4,'2019-05-02 11:22:20','2019-05-02 11:22:20'),(8,5,'2019-05-02 11:33:48','2019-05-02 11:33:48'),(8,6,'2019-05-02 11:33:48','2019-05-02 11:33:48'),(8,7,'2019-05-02 11:33:48','2019-05-02 11:33:48'),(8,9,'2019-05-02 12:35:37','2019-05-02 12:35:37'),(9,1,'2019-05-02 11:23:39','2019-05-02 11:23:39'),(9,4,'2019-05-02 11:23:20','2019-05-02 11:23:20'),(9,5,'2019-05-02 11:23:39','2019-05-02 11:23:39'),(9,6,'2019-05-02 11:27:33','2019-05-02 11:27:33'),(9,7,'2019-05-02 11:27:33','2019-05-02 11:27:33'),(9,8,'2019-05-02 11:27:33','2019-05-02 11:27:33'),(10,1,'2019-05-02 11:32:53','2019-05-02 11:32:53'),(10,4,'2019-05-02 11:32:42','2019-05-02 11:32:42'),(10,5,'2019-05-02 11:32:53','2019-05-02 11:32:53'),(10,6,'2019-05-02 11:32:53','2019-05-02 11:32:53'),(10,7,'2019-05-02 11:32:53','2019-05-02 11:32:53'),(10,10,'2019-05-02 12:35:27','2019-05-02 12:35:27');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_no` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_no` int(11) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bobby Ekaro','bobby.ekaro@ncdmb.gov.ng',18290,NULL,'$2y$10$VeAznGI0.Is74uI/X9u/EuJAfhmqS8yOzSdPJHZD4tWbi9MOAJ8T.',NULL,305,2,NULL,'2019-04-24 03:12:55','2019-04-24 03:12:55'),(3,'Porbeni Oyinke','oyinke.porbeni@ncdmb.gov.ng',11054,NULL,'$2y$10$bMOA9IH6Tiwy3LnOD.p5b.SOLVDNgrAhJE69vRqrPD2Q3D921.OnO',NULL,305,2,NULL,'2019-04-25 18:07:32','2019-04-25 18:07:32'),(4,'Jerry Atabong','jerry.atabong@ncdmb.gov.ng',10041,NULL,'$2y$10$gKAbwter1cIghNZWjiNqTuaa1YjaS5rKrKNEyKBwQhjNY3oIa983S',NULL,104,1,NULL,'2019-04-30 14:40:15','2019-04-30 14:40:15'),(5,'Peter Amida','peter.amida@ncdmb.gov.ng',11111,NULL,'$2y$10$/axE1Zos/JKmR.pO8Kzld.SxLC4F3vuiwwQ1H0I6inhMFXZQ196fK',NULL,104,1,NULL,'2019-05-02 11:03:40','2019-05-02 11:03:40'),(6,'Oluwafemi Ajayi','oluwafemi.ajayi@ncdmb.gov.ng',11073,NULL,'$2y$10$BtXOUsRtR.NdL9NTL6M1YuQOQ05h/GEqMVcqn3ya7OXS2cSn0j5HO',NULL,104,1,NULL,'2019-05-02 11:20:30','2019-05-02 11:20:30'),(7,'Bright Amatoru','bright.amatoru@ncdmb.gov.ng',12090,NULL,'$2y$10$FeKo4HvIhJ4Yr3sdCQzNwubGq9wO3dlAuO1iqfHcxbFWAoxCN0czm',NULL,104,1,NULL,'2019-05-02 11:21:44','2019-05-02 11:21:44'),(8,'Andy Jisu','andy.jisu@ncdmb.gov.ng',18294,NULL,'$2y$10$RQFbO58LJKYfQe6Db/dl2O6GMUpZS6/4vcQaiMG3JJDDp7Su.PVEu',NULL,104,1,NULL,'2019-05-02 11:22:20','2019-05-02 11:22:20'),(9,'Chris Obinna Osuji','chris.osuji@ncdmb.gov.ng',11050,NULL,'$2y$10$b1x2aUhR9AlbbRH232ache0/goOQLLSjcscVIPcLalMP76Ehh24PG',NULL,103,1,NULL,'2019-05-02 11:23:20','2019-05-02 11:23:20'),(10,'Uche Levi Onyekaonwu','levi.onyekaonwu@ncdmb.gov.ng',11222,NULL,'$2y$10$bhbdttiO/3VosW2HO5v/6uiP76laJlXehAhDqQ/jyaUCC8gJIo0he',NULL,104,1,NULL,'2019-05-02 11:32:42','2019-05-02 11:32:42');
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

-- Dump completed on 2019-07-08 10:17:35
