/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_algoritme
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_algoritme` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_algoritme`;

/*Table structure for table `tb_sound` */

DROP TABLE IF EXISTS `tb_sound`;

CREATE TABLE `tb_sound` (
  `id_sound` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sound`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_sound_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sound` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `quotes` text,
  `job` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLDdSQL_NOTES */;




INSERT INTO tb_user VALUES(11121, 'Radhika', 'radhika.yusuf1@gmail.com', md5('qwerty123'), 'profile_radhika.jpg', 'Music everyday', 'Android Developer');
INSERT INTO tb_user VALUES(11122, 'Zedd', 'zedd@gmail.com', md5('qwe123qwe123'), 'profile_zedd.jpg', 'Music everyday', 'DJ, musician');
INSERT INTO tb_user VALUES(11123, 'Bruno Mars', 'bruno.mars@gmail.com', md5('qwe123qwe123'), 'profile_bruno.jpg', 'Love Live Music', 'musician');

INSERT INTO tb_sound VALUES(10001, 'Happy Now', 'Zedd & Elley Duhé', 'happy_now.mp3', 11122, 'happy_now.jpg');
