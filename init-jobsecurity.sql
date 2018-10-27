DROP DATABASE IF EXISTS `jobsecurity`;

CREATE DATABASE IF NOT EXISTS `jobsecurity`;

CREATE USER IF NOT EXISTS 'jobsecurity'@'localhost' IDENTIFIED BY 'password';

GRANT USAGE ON * . * TO 'jobsecurity'@'localhost' IDENTIFIED BY 'password' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT SELECT , INSERT , UPDATE , DELETE , CREATE , DROP , INDEX , ALTER , CREATE TEMPORARY TABLES , CREATE VIEW , SHOW VIEW , CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON `jobsecurity` . * TO 'jobsecurity'@'localhost';

USE `jobsecurity`;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `_id` int(11) NOT NULL auto_increment,
  `job_title` varchar(45) NOT NULL,
  `job_description` varchar(45) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `company_logo` blob,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jobs` WRITE;
INSERT INTO `jobs` VALUES (1,'Photographer','Job Description for Photographer', 'Photoidea Company', ''),
(2,'Nursing Assistant','Job Description for Nursing Assistant', 'Saving Lives Hospital', ''),
(3,'Legislative Assistant','Job Description for Legislative Assistant', 'Lawyer & Company', ''),
(4,'Test Job Title','Test Job Description', 'Test Company', '');
UNLOCK TABLES;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `_id` int(11) NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;