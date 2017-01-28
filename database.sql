DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `ipaddress` varchar(10) DEFAULT NULL,
  `rstring` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `questionaire`;
CREATE TABLE `questionaire` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question1` varchar(2) DEFAULT NULL,
  `question2` varchar(2) DEFAULT NULL,
  `question3` varchar(2) DEFAULT NULL,
  `question4` varchar(2) DEFAULT NULL,
  `rstring` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;