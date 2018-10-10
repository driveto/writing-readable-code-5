-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mpg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cars` (`id`, `name`, `mpg`) VALUES
(1,	'Octavia I',	48),
(2,	'Volkswagen Passat',	41),
(3,	'Toyota Carina 3',	43),
(4,	'Hummer H1',	12),
(5,	'Mazda RX-8',	25);

-- 2018-10-10 08:29:14
