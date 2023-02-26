-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 09:15 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniforme`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

DROP TABLE IF EXISTS `artikal`;
CREATE TABLE IF NOT EXISTS `artikal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sifra` int(11) NOT NULL,
  `naziv` varchar(150) NOT NULL,
  `cena` int(11) NOT NULL,
  `velicine_id` int(11) NOT NULL,
  `vrsta_id` int(11) NOT NULL,
  `pol_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_artikal_velicine1_idx` (`velicine_id`),
  KEY `fk_artikal_vrsta1_idx` (`vrsta_id`),
  KEY `fk_artikal_pol1_idx` (`pol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikal`
--



-- --------------------------------------------------------

--
-- Table structure for table `kupac`
--

DROP TABLE IF EXISTS `kupac`;
CREATE TABLE IF NOT EXISTS `kupac` (
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `grad` varchar(45) NOT NULL,
  `postanski broj` int(11) NOT NULL,
  `ulica` varchar(255) NOT NULL,
  `broj` varchar(15) NOT NULL,
  `sprat` int(11) DEFAULT NULL,
  `broj_stana` int(11) DEFAULT NULL,
  `interfon` int(11) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

DROP TABLE IF EXISTS `kupovina`;
CREATE TABLE IF NOT EXISTS `kupovina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikal_id` int(11) NOT NULL,
  `kupac_email` varchar(70) NOT NULL,
  `datum` date NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_artikal_has_kupac_kupac1_idx` (`kupac_email`),
  KEY `fk_artikal_has_kupac_artikal_idx` (`artikal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

DROP TABLE IF EXISTS `pol`;
CREATE TABLE IF NOT EXISTS `pol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pol`
--



-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

DROP TABLE IF EXISTS `slika`;
CREATE TABLE IF NOT EXISTS `slika` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikal_id` int(11) NOT NULL,
  `put` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`artikal_id`),
  KEY `artikal_id` (`artikal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slika`
--



-- --------------------------------------------------------

--
-- Table structure for table `velicine`
--

DROP TABLE IF EXISTS `velicine`;
CREATE TABLE IF NOT EXISTS `velicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `velicina` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `velicine`
--



-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

DROP TABLE IF EXISTS `vrsta`;
CREATE TABLE IF NOT EXISTS `vrsta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikal`
--
ALTER TABLE `artikal`
  ADD CONSTRAINT `fk_artikal_pol1` FOREIGN KEY (`pol_id`) REFERENCES `pol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_artikal_velicine1` FOREIGN KEY (`velicine_id`) REFERENCES `velicine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_artikal_vrsta1` FOREIGN KEY (`vrsta_id`) REFERENCES `vrsta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `fk_artikal_has_kupac_artikal` FOREIGN KEY (`artikal_id`) REFERENCES `artikal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_artikal_has_kupac_kupac1` FOREIGN KEY (`kupac_email`) REFERENCES `kupac` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
