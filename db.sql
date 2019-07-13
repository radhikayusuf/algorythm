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




INSERT INTO tb_user VALUES(11121, 'Radhika', 'radhika.yusuf1@gmail.com', md5('qwerty123'), 'images/profile_radhika.jpg', 'Music everyday', 'Android Developer');
INSERT INTO tb_user VALUES(11122, 'Zedd', 'zedd@gmail.com', md5('qwe123qwe123'), 'images/profile_zedd.jpg', 'Music everyday', 'DJ, musician');
INSERT INTO tb_user VALUES(11123, 'Bruno Mars', 'bruno.mars@gmail.com', md5('sayangmamah1985'), 'images/profile_bruno.jpg', 'Love Live Music', 'musician');
INSERT INTO tb_user VALUES(11124, 'Yongki Agustin', 'yongkiagustin92@gmail.com', md5('atolisthebest'), 'images/profile_yongki.jpg', 'Live like Music', 'musician');
INSERT INTO tb_user VALUES(11125, 'Yusi Ridwan', 'yusiridwan12@gmail.com', md5('akuganteng1827'), 'images/ganteng.jpg', 'Tidak pernah tidur', 'gamer');
INSERT INTO tb_user VALUES(11126, 'Giat Sunarjo', 'mylifeistrue2191@gmail.com', md5('bandungtempodulu21'), 'images/giat_profil.jpg', 'MLM itu haram', 'penulis');
INSERT INTO tb_user VALUES(11127, 'Agus Yayang', 'sagalagala214@gmail.com', md5('serigalahitam412'), 'images/agus_profil.jpg', 'Selalu ada untukmu', 'pengarang');
INSERT INTO tb_user VALUES(11128, 'Steven supriatno', 'risingme123@gmail.com', md5('persibnuaing1933'), 'images/steven_profil.jpg', 'Cinta takkan berbohong', 'pelukis');
INSERT INTO tb_user VALUES(11129, 'Subarjo', 'subarjo1012@gmail.com', md5('19subarjo87'), 'images/subarjo_profil.jpg', 'talk less do more', 'supir truk');
INSERT INTO tb_user VALUES(11130, 'Beni Setiawan', 'setiawanbeni11@gmail.com', md5('bentenitukeren1928'), 'images/beni_profil.jpg', 'loe gaakan ngerti', 'freelance');
INSERT INTO tb_user VALUES(11131, 'fanny Lutfiana', 'fannylutfiana989@gmail.com', md5('anakmamahbanget2918'), 'fimages/anny_profil.jpg', 'nothing', 'security');

INSERT INTO tb_sound VALUES(10000, 'Happy Now', 'Zedd & Elley Duhé', 'sounds/happy_now.mp3', 11122, 'images/happy_now.jpg');
INSERT INTO tb_sound VALUES(10001, 'Car Radio', 'twenty one pilots', 'sounds/twenty one pilots Car Radio.mp3', '11123', 'images/top.jpg');
INSERT INTO tb_sound VALUES(10002, 'Fairly Local', 'twenty one pilots', 'sounds/twenty one pilots Car Radio.mp3', '11123', 'images/Fairly Local.jpg');
INSERT INTO tb_sound VALUES(10003, 'Tear In My Heart', 'twenty one pilots', 'sounds/twenty one pilots Tear In My Heart.mp3', '11123', 'images/Heathens.jpg');
INSERT INTO tb_sound VALUES(10004, ' Heathens', 'twenty one pilots', 'sounds/twenty one pilots  Heathens.mp3', '11124', 'images/Heathens.jpg');
INSERT INTO tb_sound VALUES(10005, 'Heavy dirty soul', 'twenty one pilots', 'sounds/twenty one pilots Heavy dirty soul.mp3', '11124', 'images/hds.jpg');
INSERT INTO tb_sound VALUES(10006, 'Holding On To You', 'twenty one pilots', 'sounds/twenty one pilots Holding On To You.mp3', '11125', 'images/hoty.jpg');
INSERT INTO tb_sound VALUES(10007, 'Lane Boy', 'twenty one pilots', 'sounds/twenty one pilots Lane Boy.mp3', '11126', 'images/Top_Lane_Boy.jpg');
INSERT INTO tb_sound VALUES(10008, 'Ride', 'twenty one pilots', 'sounds/twenty one pilots Ride.mp3', '11127', 'images/top-1.jpg');
INSERT INTO tb_sound VALUES(10009, 'Stressed Out', 'twenty one pilots', 'sounds/twenty one pilots Stressed Out.mp3', '11129', 'images/TOP_Stressed_Out.jpg');
INSERT INTO tb_sound VALUES(10010, 'We Dont Believe Whats On TV', 'twenty one pilots', 'sounds/twenty one pilots We Dont Believe Whats On TV.mp3', '11128', 'images/tv.jpg');
