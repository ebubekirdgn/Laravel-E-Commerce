# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2019-02-10 12:51:40
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "kategoriler"
#

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ust_id` int(11) DEFAULT NULL,
  `adi` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `durum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "kategoriler"
#

INSERT INTO `kategoriler` VALUES (1,0,'Çocuk','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:03','Hayır'),(3,0,'Hukuk','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:04','Hayır'),(4,0,'Bilim','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:04','Hayır'),(5,0,'Mühendislik','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:05','Evet'),(6,2,'Yazılım','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:05','Evet'),(7,2,'Donanım','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:06','Evet'),(8,6,'Php','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:08','Evet'),(9,6,'C#','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 00:58:07','Evet'),(10,7,'Mikro İşlemciler','deneme.jpg','a1','d1','2019-02-08 00:47:15','2019-02-10 01:20:07','Evet'),(11,NULL,'Ebubekir','15497944312.PNG','Ebubekir','Ebubekir','2019-02-10 12:27:11',NULL,'Evet');

#
# Structure for table "kitaplars"
#

DROP TABLE IF EXISTS `kitaplars`;
CREATE TABLE `kitaplars` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `turu_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `yazar` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `alisFiyati` float DEFAULT NULL,
  `satisFiyati` float DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `aciklama` text,
  `durum` varchar(255) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "kitaplars"
#

INSERT INTO `kitaplars` VALUES (3,'Mühendislik','a3','d3',2,4,'Ebubekir Dogan',12,20,22,'deneme.jpg',NULL,'Evet','2019-02-08 00:47:15',NULL),(5,'Hukuk','a5','d5',4,4,'Ebubekir Dogan',12,20,22,'deneme.jpg',NULL,'Hayır','2019-02-08 00:47:32',NULL),(6,'Deneme','a6','Deneme',4,2,'Deneme',20,20,32,'deneme.jpg','<p>asdf</p>','Evet','2019-02-08 01:03:47',NULL);

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "turler"
#

DROP TABLE IF EXISTS `turler`;
CREATE TABLE `turler` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "turler"
#

INSERT INTO `turler` VALUES (1,'Roman'),(2,'Hikaye'),(3,'Sanat'),(4,'Eğitim'),(5,'Bilim'),(6,'Tez');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

