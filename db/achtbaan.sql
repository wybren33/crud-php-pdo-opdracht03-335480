-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 09 feb 2023 om 14:04
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
-- Database: `Php-pdo-crud-opdracht03`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `achtbaan`
--

DROP TABLE IF EXISTS `achtbaan`;
CREATE TABLE IF NOT EXISTS `achtbaan` (
  `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `achtbaan` varchar(40) NOT NULL,
  `pretpark` varchar(40) NOT NULL,
  `land` varchar(40) NOT NULL,
  `snelheid` int(20) NOT NULL,
  `hoogte` int(20) NOT NULL,
  `datum` date NOT NULL,
  `cijfer` int(2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `achtbaan`
--

INSERT INTO `achtbaan` (`Id`, `achtbaan`, `pretpark`, `land`, `snelheid`, `hoogte`, `datum`, `cijfer`) VALUES
(4, 'dddrgdrf', 'gdrg', 'dfdhdf', 6, 3, '2023-02-09', 10),
(5, 'fhdfhft', 'shhsrtghtdf', 'hftdhr', 6, 4, '2023-02-09', 6),
(6, 'naaam', 'goedemorgen', 'avond', 8, 14, '2023-02-08', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
