/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 5.7.22-0ubuntu18.04.1 : Database - job_portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`job_portal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `job_portal`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`user_id`,`name`,`industry`,`address`,`summary`,`created_at`,`updated_at`) values 
(1,3,'Blizzard Entertainment','Game Studio','Irvine, California','Lorem Ipsum Dolor sit amet',NULL,NULL),
(2,4,'SIE Santa Monica Studio','Game Studio','Santa Monica, California','Lorem Ipsum Dolor sit amet',NULL,NULL);

/*Table structure for table `freelancers` */

DROP TABLE IF EXISTS `freelancers`;

CREATE TABLE `freelancers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` tinyint(4) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `freelancers` */

insert  into `freelancers`(`id`,`user_id`,`position`,`experience`,`rank`,`summary`,`created_at`,`updated_at`) values 
(1,1,'Backend Progammer',7,1,'Lorem Ipsum Dolor sit amet',NULL,NULL),
(2,2,'Frontend Progammer',5,2,'Lorem Ipsum Dolor sit amet',NULL,NULL);

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jobs` */

insert  into `jobs`(`id`,`company_id`,`title`,`description`,`status`,`created_at`,`updated_at`) values 
(1,1,'Lead Software Engineer yBlECrwKpG','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(2,1,'Senior Software Engineer p6PIDAu5dZ','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(3,2,'Tools Engineer r8qO1DsJVQ','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(4,1,'Lead Software Engineer JJzo5rsRAx','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(5,1,'Senior Software Engineer 0XRDcJxunX','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(6,2,'Tools Engineer UJ1mMdQNCg','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(7,1,'Lead Software Engineer es0KoOdrTk','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(8,1,'Senior Software Engineer VQng6pzNWR','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(9,2,'Tools Engineer Lt4JplK7Jr','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(10,1,'Lead Software Engineer s6SM2LJgXg','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(11,1,'Senior Software Engineer 4R8rJIWHB0','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(12,2,'Tools Engineer gLP5X7wWQA','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(13,1,'Lead Software Engineer x9PLAxiVwd','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(14,1,'Senior Software Engineer K0BrPSsAbs','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(15,2,'Tools Engineer pzXzIbwu5U','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(16,1,'Lead Software Engineer YMwRhkj74h','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(17,1,'Senior Software Engineer RpvV9bHL5P','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(18,2,'Tools Engineer xRt9s8x54G','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(19,1,'Lead Software Engineer u1BMnXeLlb','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(20,1,'Senior Software Engineer h2bC6Qk9BK','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(21,2,'Tools Engineer BqTDCWBpPG','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(22,1,'Lead Software Engineer FehGy0cPoY','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(23,1,'Senior Software Engineer 9LStLgnIVM','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(24,2,'Tools Engineer Z0CUlf4CXU','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(25,1,'Lead Software Engineer oPNMrF9wMi','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(26,1,'Senior Software Engineer CUuoEeonsG','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(27,2,'Tools Engineer pGUgrsNHhG','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(28,1,'Lead Software Engineer i2Q4bJrtU1','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(29,1,'Senior Software Engineer NsoJHdgfyN','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(30,2,'Tools Engineer SwkAy4zhXs','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(31,1,'Lead Software Engineer N4vg7gj8OA','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(32,1,'Senior Software Engineer C5wygOCeeJ','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(33,2,'Tools Engineer WTsJ8UlRxX','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(34,1,'Lead Software Engineer 0DEw1RfoYL','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(35,1,'Senior Software Engineer XxoodZAIia','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(36,2,'Tools Engineer F0kTUJmii6','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(37,1,'Lead Software Engineer NTHEXsSqxE','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(38,1,'Senior Software Engineer vdKZTAQtz1','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(39,2,'Tools Engineer 6e0euvdiNW','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(40,1,'Lead Software Engineer axziDn4Jb7','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(41,1,'Senior Software Engineer BqE3kEpFYH','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(42,2,'Tools Engineer wfBKUyIy3S','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(43,1,'Lead Software Engineer wX7VbdpXG4','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(44,1,'Senior Software Engineer oYhk2GYpkk','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(45,2,'Tools Engineer sbEy9lxv0G','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(46,1,'Lead Software Engineer v0oHVuqm19','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(47,1,'Senior Software Engineer 4186FKh7GL','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(48,2,'Tools Engineer 7IHME3HaRg','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(49,1,'Lead Software Engineer gENXGjDvYj','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(50,1,'Senior Software Engineer oEaZJjepaH','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(51,2,'Tools Engineer o8jWas17Zp','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(52,1,'Lead Software Engineer ukFkhg1QiF','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(53,1,'Senior Software Engineer yddDD2hw6f','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(54,2,'Tools Engineer DCcpSSmgOp','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(55,1,'Lead Software Engineer jRh5j2ZGKg','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(56,1,'Senior Software Engineer lBUWLS7gr8','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(57,2,'Tools Engineer RUSRyC6SC2','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL),
(58,1,'Lead Software Engineer UZ0HpSi5JA','You must be an excellent engineer, collaborating closely with the technical director and other engineering leads to build a technically excellent engine across multiple platforms',1,NULL,NULL),
(59,1,'Senior Software Engineer 7iTo0cNMZn','Maintain comprehensive documentation of our build systems',0,NULL,NULL),
(60,2,'Tools Engineer FrPn4l8Vlz','Simplify, improve, and create tools to maximize team efficiency while minimizing downtime',1,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(82,'2018_07_10_073533_create_users_table',1),
(83,'2018_07_10_074202_create_proposals_table',1),
(84,'2018_07_10_074304_create_jobs_table',1),
(85,'2018_07_10_075004_create_freelancers_table',1),
(86,'2018_07_10_075143_create_companies_table',1);

/*Table structure for table `proposals` */

DROP TABLE IF EXISTS `proposals`;

CREATE TABLE `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `estimation_date` int(11) NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_proposal` (`freelancer_id`,`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `proposals` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`type`,`fullname`,`created_at`,`updated_at`) values 
(1,'john_doe','john_doe@gmail.com','$2y$10$q.qUAEf9UU6TgS/yc04nU.6ZE/HhL1gE3..G64h7LshyZfguW7r7.',1,'John Doe',NULL,NULL),
(2,'jane_doe','jane_doe@gmail.com','$2y$10$jgDsLv1JcWdT2Doy6LfwJuTe269NPUQQ1aILi.rZu6/z.USwZKaFe',1,'Jane Doe',NULL,NULL),
(3,'ben_brode','ben_brode@gmail.com','$2y$10$kdN/qU/xG92NnzjYR4498ej/TtzA1oGFfVct/00qilO702RlRexke',2,'Ben Brode',NULL,NULL),
(4,'cory_barlog','cory_barlog@gmail.com','$2y$10$J6eFXRENna9bYaVGwtRCpO/VLlNXIp9o.dbP8AS4hV0PZtOVPkjoa',2,'Cory Barlog',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
