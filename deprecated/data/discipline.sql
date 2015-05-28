-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Úte 08. čec 2014, 14:36
-- Verze MySQL: 1.0.11
-- Verze PHP: 5.4.4-14+deb7u10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `sport_gymtri_cz`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discipline_name` text,
  `score_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of disciplines' AUTO_INCREMENT=13 ;

--
-- Vypisuji data pro tabulku `discipline`
--

INSERT INTO `discipline` (`id`, `discipline_name`, `score_type`) VALUES
(1, '60m', 1),
(2, '100m', 1),
(3, '1500m', 1),
(4, '3000m', 1),
(5, 'dálka', 1),
(6, 'výška', 1),
(7, 'míč', 1),
(8, 'granát', 1),
(9, 'šplh', 1),
(10, '25m plavání', 1),
(11, '50m plavání', 1),
(12, '100m plavání', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
