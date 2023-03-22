/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - personality_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`personality_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `personality_test`;

/*Table structure for table `core_values` */

DROP TABLE IF EXISTS `core_values`;

CREATE TABLE `core_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `core_values` */

insert  into `core_values`(`id`,`core_value`) values 
(1,'Honesty'),
(2,'Ownership'),
(3,'Teamwork'),
(4,'Customer Experience'),
(5,'Learn and apply');

/*Table structure for table `final_result` */

DROP TABLE IF EXISTS `final_result`;

CREATE TABLE `final_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `honesty` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `teamwork` varchar(255) NOT NULL,
  `customer_experience` varchar(255) NOT NULL,
  `learn_and_apply` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `final_result` */

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `options` */

insert  into `options`(`id`,`option`,`point`) values 
(1,'agree','+1'),
(2,'strongly_agree','+2'),
(3,'neither','0'),
(4,'disagree','-1'),
(5,'strongly_disagree','-2');

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

/*Data for the table `questions` */

insert  into `questions`(`id`,`question`) values 
(1,'Fail to notice beauty until others comment on it.'),
(2,'Know that some others accept my shortcomings.'),
(3,'Don\'t miss group meetings or team practices.'),
(4,'Support my teammates or fellow group members.'),
(5,'Am not good at working with a group.'),
(6,'Don\'t talk badly to outsiders about my own group.'),
(7,'Lose respect for leaders if I disagree with them.'),
(8,'Admit when I am wrong.'),
(9,'Am a good listener.'),
(10,'Give everyone a chance.'),
(11,'Take advantage of others.'),
(12,'Believe that it is best to forgive and forget.'),
(13,'Try to respond with understanding when someone treats me badly.'),
(14,'Hold grudges.'),
(15,'Am unwilling to accept apologies.'),
(16,'Have a great sense of humor.'),
(17,'Finish things despite obstacles in the way.'),
(18,'Give up easily.'),
(19,'Keep my promises.'),
(20,'Believe that honesty is the basis for trust.'),
(21,'Weigh the pro\'s and the con\'s.'),
(22,'Am valued by my friends for my good judgment.'),
(23,'Call my friends when they are sick.'),
(24,'Get impatient when others talk to me about their problems.'),
(25,'Try not to do favors for others.'),
(26,'Am only kind to others if they have been kind to me.'),
(27,'Try to make my group members happy.'),
(28,'Look forward to the opportunity to learn and grow.'),
(29,'Am a true life-long learner.'),
(30,'Read all the time.'),
(31,'Consult the library or the Internet immediately if I want to know something.'),
(32,'Don\'t like to learn new things.'),
(33,'Don\'t act is if I\'m a special person.'),
(34,'Like to stand out in a crowd.'),
(35,'Am able to come up with new and different ideas.'),
(36,'Like to think of new ways to do things.'),
(37,'Have a broad outlook on what is going on.'),
(38,'Am not good at figuring out what really matters.'),
(39,'Cannot imagine lying or cheating.'),
(40,'Believe it is always better to be safe than sorry.'),
(41,'Keep straight right from wrong.'),
(42,'Make careful choices.'),
(43,'Behave in unusual and strange ways.'),
(44,'Act before thinking through the consequences.'),
(45,'Do my tasks only just before they need to be done.'),
(46,'Don\'t hesitate to express an unpopular opinion.'),
(47,'Call for action while others talk.'),
(48,'Do not stand up for my beliefs.'),
(49,'Don\'t approach things halfheartedly.'),
(50,'Dread getting up in the morning.');

/*Table structure for table `questions_core_values` */

DROP TABLE IF EXISTS `questions_core_values`;

CREATE TABLE `questions_core_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `core_value_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

/*Data for the table `questions_core_values` */

insert  into `questions_core_values`(`id`,`question_id`,`core_value_id`,`value`) values 
(1,1,4,'n'),
(2,2,3,'p'),
(3,3,2,'p'),
(4,3,3,'p'),
(5,3,5,'p'),
(6,4,3,'p'),
(7,5,3,'n'),
(8,6,2,'p'),
(9,7,3,'n'),
(10,7,5,'n'),
(11,8,2,'p'),
(12,9,3,'p'),
(13,9,4,'p'),
(14,10,3,'p'),
(15,11,3,'n'),
(16,12,3,'p'),
(17,13,1,'p'),
(18,13,3,'p'),
(19,14,3,'n'),
(20,15,3,'n'),
(21,16,3,'p'),
(22,16,4,'p'),
(23,17,2,'p'),
(24,18,2,'n'),
(25,19,2,'p'),
(26,19,4,'p'),
(27,20,1,'p'),
(28,20,2,'p'),
(29,20,3,'p'),
(30,21,2,'p'),
(31,22,1,'p'),
(32,22,2,'p'),
(33,23,3,'p'),
(34,24,3,'n'),
(35,25,3,'n'),
(36,26,3,'n'),
(37,27,3,'p'),
(38,27,4,'p'),
(39,28,5,'p'),
(40,29,5,'p'),
(41,30,5,'p'),
(42,31,5,'p'),
(43,32,5,'n'),
(44,33,3,'p'),
(45,34,3,'n'),
(46,35,2,'p'),
(47,35,5,'p'),
(48,36,2,'p'),
(49,36,5,'p'),
(50,37,2,'p'),
(51,37,4,'p'),
(52,38,4,'n'),
(53,39,1,'p'),
(54,39,4,'p'),
(55,40,2,'p'),
(56,40,3,'p'),
(57,41,1,'p'),
(58,41,4,'p'),
(59,42,2,'p'),
(60,43,4,'n'),
(61,44,2,'n'),
(62,45,2,'n'),
(63,45,3,'n'),
(64,46,1,'p'),
(65,47,2,'p'),
(66,48,1,'n'),
(67,49,2,'p'),
(68,50,2,'n');

/*Table structure for table `questions_options` */

DROP TABLE IF EXISTS `questions_options`;

CREATE TABLE `questions_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `questions_options` */

/*Table structure for table `try` */

DROP TABLE IF EXISTS `try`;

CREATE TABLE `try` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `try` */

insert  into `try`(`id`,`question`) values 
(1,'Fail to notice beauty until others comment on it.'),
(2,'Know that some others accept my shortcomings.'),
(3,'Am not good at working with a group.'),
(4,'Admit when I am wrong.');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
