-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: multicompany
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_ceo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_representative` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_honorifics` int DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_cellphone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_telephone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_company`
--

LOCK TABLES `tbl_company` WRITE;
/*!40000 ALTER TABLE `tbl_company` DISABLE KEYS */;
INSERT INTO `tbl_company` VALUES (1,'No Assigned Company','N/A','N/A',0,'N/A','N/A','N/A','N/A','N/A','N/A'),(2,'Ronald McDonald','Ronald Heard','Gwenneth Garcia',0,'Sample Address, Sample Street, Sample Building #','https://www.mcdonalds.com.ph','https://www.imgur.com/','support@mcdonalds.com','09999999','09999999'),(3,'Ronald McDonald','Ronald Heard','Gwenneth Garcia',0,'Sample Address, Sample Street, Sample Building #','https://www.mcdonalds.com.ph','https://www.imgur.com/','support@mcdonalds.com','09999999','09999999'),(4,'Sample Company Name','Reginald Oliver','Huston Delikara',NULL,'Sample Company Address','','','sample@email.com','09123456789','09123456789'),(5,'Sample Company Name','Reginald Oliver','Huston Delikara',NULL,'Sample Address','','','sample@email.com','0123456789','0123456789'),(6,'Sample Company Name','Ceo name','Comapny Rep',NULL,'Company Address','','/assets/img/uploads/Sample Company Name_wallpaper-4.jpg','company@email.com','0912345','0192345');
/*!40000 ALTER TABLE `tbl_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `department_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_department`
--

LOCK TABLES `tbl_department` WRITE;
/*!40000 ALTER TABLE `tbl_department` DISABLE KEYS */;
INSERT INTO `tbl_department` VALUES (1,1,'No Assigned Department'),(2,2,'IT Department - Mcdonalds'),(3,2,'ECE Department - Mcdonalds'),(4,1,'ECE Department - NAD'),(5,1,'IT Department - NAD'),(6,1,'IT Department');
/*!40000 ALTER TABLE `tbl_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_event`
--

DROP TABLE IF EXISTS `tbl_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `event_title` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_sdate` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_edate` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_event`
--

LOCK TABLES `tbl_event` WRITE;
/*!40000 ALTER TABLE `tbl_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_filerepository`
--

DROP TABLE IF EXISTS `tbl_filerepository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_filerepository` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_directory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filerepository`
--

LOCK TABLES `tbl_filerepository` WRITE;
/*!40000 ALTER TABLE `tbl_filerepository` DISABLE KEYS */;
INSERT INTO `tbl_filerepository` VALUES (1,3,6,'Billing Task #1','Updated billing task #1','RC-Plans.txt','/assets/img/uploads/task3_file_RC-Plans.txt'),(2,3,6,'Billing Task #1','Updated billing task #1','school.txt','/assets/img/uploads/task3_file_school.txt'),(3,3,6,'Billing Task #1','Updated billing task #1','tempalte.txt','/assets/img/uploads/task3_file_tempalte.txt'),(4,3,6,'Billing Task #2','Updated receipt','tempalte.txt','/assets/img/uploads/task3_file_tempalte.txt');
/*!40000 ALTER TABLE `tbl_filerepository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notification`
--

DROP TABLE IF EXISTS `tbl_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `notif_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notif_description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notif_date` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notification`
--

LOCK TABLES `tbl_notification` WRITE;
/*!40000 ALTER TABLE `tbl_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profile`
--

DROP TABLE IF EXISTS `tbl_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `profile_fname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_mname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_lname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_birthday` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_gender` int DEFAULT NULL,
  `profile_fulladdress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_house` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_street` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_barangay` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_country` int DEFAULT NULL,
  `profile_zipcode` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_telephone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_cellphone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profile`
--

LOCK TABLES `tbl_profile` WRITE;
/*!40000 ALTER TABLE `tbl_profile` DISABLE KEYS */;
INSERT INTO `tbl_profile` VALUES (1,1,'Jane','World','Doe','6/25/2022',1,'#567 Street Mellow Ave Brgy. Helio  City 1873 0','567','Mellow Ave','Helio','',0,'1873','JaneDoe2@melfare.com','','09987654321'),(2,2,'Hubert','Ace','Romero',NULL,1,'Sample Email Address','','','','',NULL,'','companyemail@melfare.com','','09999999'),(3,3,'Zeus','Andres','Ernacio',NULL,0,'Sample Home address #3 Detour Street','','','','',NULL,'','companyemail@melfare.com','','099999999'),(4,4,'Jonathan','Sergio','Albante',NULL,0,'Sample home address, # house street barangay','','','','',NULL,'','companyemail@melfare.com','','099999999'),(5,5,'Gordon','M.','Perez',NULL,1,'#115 Street Hasenbühlstrasse Brgy. Boppelsen  City 99110 0','115','Hasenbühlstrasse','Boppelsen','',0,'99110','GordonMPerez@teleworm.us','','0442593095');
/*!40000 ALTER TABLE `tbl_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_project`
--

DROP TABLE IF EXISTS `tbl_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `department_id` int NOT NULL,
  `team_id` int DEFAULT NULL,
  `project_title` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` int DEFAULT NULL,
  `project_sdate` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_edate` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_progress` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_project`
--

LOCK TABLES `tbl_project` WRITE;
/*!40000 ALTER TABLE `tbl_project` DISABLE KEYS */;
INSERT INTO `tbl_project` VALUES (1,1,2,1,'Android Project','Fix major bugs found in the Melfare Android Application',1,'2022-06-22','2022-07-09',0),(2,1,2,2,'Website Development','Create a simple webpage for Mcdonalds',1,'2022-06-22','2022-07-09',0),(3,2,2,2,'Sample Project','Sample Project Description',1,'2022-06-28','06/29/2022',0),(4,2,3,1,'Sample Project #2','Sample Project Description',2,'2022-06-28','2022-06-30',0),(5,2,3,4,'Payaman Project','Sample Payaman Project',1,'2022-06-30','2022-07-09',0),(6,2,2,3,'Billing Project','Sample Billing Project',1,'2022-06-30','2022-07-09',0);
/*!40000 ALTER TABLE `tbl_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_task`
--

DROP TABLE IF EXISTS `tbl_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team_id` int NOT NULL,
  `project_id` int NOT NULL,
  `task_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_task`
--

LOCK TABLES `tbl_task` WRITE;
/*!40000 ALTER TABLE `tbl_task` DISABLE KEYS */;
INSERT INTO `tbl_task` VALUES (1,4,5,'Albante Task Group','Sample Task Group','1'),(2,3,6,'Billing Task #1','Sample Billing Task Description','2'),(3,3,6,'Billing Task #2','Sample Billing Task #2 Description','1');
/*!40000 ALTER TABLE `tbl_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team`
--

DROP TABLE IF EXISTS `tbl_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `team_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_currentsize` int DEFAULT NULL,
  `team_maxsize` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team`
--

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;
INSERT INTO `tbl_team` VALUES (1,1,1,1,'No Assigned Team',0,100),(2,2,1,2,'Tech Support',1,25),(3,2,1,3,'Billing Support',1,25),(4,2,1,4,'Payaman',0,25);
/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `user_username` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_datejoined` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_usertype` int DEFAULT NULL,
  `is_firstlogin` int DEFAULT NULL,
  `is_banned` int DEFAULT NULL,
  `is_leader` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,2,1,1,'CodexApple','$2y$10$WIEO6hZSii4PFKc4kJLw6ObrehJtSlD0cfvwsoprWeQjtpV7UNJdO','/assets/img/uploads/CodexApple_wallpaper-3.jpg','',1,1,1,0),(2,2,2,2,'','','','',1,1,1,0),(3,2,3,3,'','','','',3,1,1,0),(4,2,3,4,'','','','',2,1,1,0),(5,2,1,3,'Gordon99','$2y$10$tHEYWjubz05K6.QihA7o8eDGWUiLHHF6zm.DojK3.HMwCxi6JDQ9y','','',3,1,1,1);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-14 19:17:30
