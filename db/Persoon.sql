-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 jan 2023 om 14:04
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Php-pdo-crud-2209b`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Persoon`
--

DROP TABLE IF EXISTS `Persoon`;
CREATE TABLE IF NOT EXISTS `Persoon` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(20) DEFAULT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `telefoonnummer` int(10) DEFAULT NULL,
  `straatnaam` varchar(50) NOT NULL,
  `huisnummer` int(5) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `landnaam` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Persoon`
--

INSERT INTO `Persoon` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `telefoonnummer`, `straatnaam`, `huisnummer`, `woonplaats`, `postcode`, `landnaam`) VALUES
(1, 'Wybren', NULL, 'Puister', NULL, '', 0, '', '', ''),
(4, 'Wybren', 'dik', 'df', NULL, '', 0, '', '', ''),
(6, '', '', '', NULL, '', 0, '', '', ''),
(7, 'test1', '', 'test1', 0, '', 0, '', '', ''),
(8, 'hoi', '', '', 1, '', 1, '', '', ''),
(9, 'hoi', '', '', 0, '', 0, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
