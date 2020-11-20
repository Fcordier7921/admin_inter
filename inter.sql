-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_intervention` date DEFAULT NULL,
  `type_intervention` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `etage_intervention` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `intervention` (`id`, `date_intervention`, `type_intervention`, `etage_intervention`) VALUES
(1,	'2020-11-19',	'Réparer l\'ascenseur',	5),
(3,	'2021-01-29',	'gsdgsdgdsgsd gsd gds gsdg sdg',	4),
(4,	'2021-01-29',	'fdgfg dfsg dfg',	7);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password_user` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `autoa_user` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`id`, `name_user`, `password_user`, `autoa_user`) VALUES
(1,	'admin',	'admin',	1);

-- 2020-11-20 00:01:54