/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.3.16-MariaDB : Database - crud
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crud` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crud`;

/*Table structure for table `komunal` */

DROP TABLE IF EXISTS `komunal`;

CREATE TABLE `komunal` (
  `id` char(6) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `idprev` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `komunal` */

insert  into `komunal`(`id`,`nama`,`idprev`) values 
('X1Z76E','Silver',NULL),
('X2P78J','Copper','X1Z76E'),
('X3H097','Iron','X2P78J'),
('Y1UH56','Gold',NULL),
('Y2CRT3','Bronze','Y1UH56');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
