-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 oct. 2020 à 21:40
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportymeet`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` varchar(3) COLLATE utf8_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom`) VALUES
('1', 'AIN'),
('2', 'AISNE'),
('3', 'ALLIER'),
('5', 'HAUTES-ALPES'),
('4', 'ALPES-DE-HAUTE-PROVENCE'),
('6', 'ALPES-MARITIMES'),
('7', 'ARDECHE'),
('8', 'ARDENNES'),
('9', 'ARIEGE'),
('10', 'AUBE'),
('11', 'AUDE'),
('12', 'AVEYRON'),
('13', 'BOUCHES-DU-RHONE'),
('14', 'CALVADOS'),
('15', 'CANTAL'),
('16', 'CHARENTE'),
('17', 'CHARENTE-MARITIME'),
('18', 'CHER'),
('19', 'CORREZE'),
('2A', 'CORSE-DU-SUD'),
('2B', 'HAUTE-CORSE'),
('21', 'COTE-DOR'),
('22', 'COTES-DARMOR'),
('23', 'CREUSE'),
('24', 'DORDOGNE'),
('25', 'DOUBS'),
('26', 'DROME'),
('27', 'EURE'),
('28', 'EURE-ET-LOIR'),
('29', 'FINISTERE'),
('30', 'GARD'),
('31', 'HAUTE-GARONNE'),
('32', 'GERS'),
('33', 'GIRONDE'),
('34', 'HERAULT'),
('35', 'ILE-ET-VILAINE'),
('36', 'INDRE'),
('37', 'INDRE-ET-LOIRE'),
('38', 'ISERE'),
('39', 'JURA'),
('40', 'LANDES'),
('41', 'LOIR-ET-CHER'),
('42', 'LOIRE'),
('43', 'HAUTE-LOIRE'),
('44', 'LOIRE-ATLANTIQUE'),
('45', 'LOIRET'),
('46', 'LOT'),
('47', 'LOT-ET-GARONNE'),
('48', 'LOZERE'),
('49', 'MAINE-ET-LOIRE'),
('50', 'MANCHE'),
('51', 'MARNE'),
('52', 'HAUTE-MARNE'),
('53', 'MAYENNE'),
('54', 'MEURTHE-ET-MOSELLE'),
('55', 'MEUSE'),
('56', 'MORBIHAN'),
('57', 'MOSELLE'),
('58', 'NIEVRE'),
('59', 'NORD'),
('60', 'OISE'),
('61', 'ORNE'),
('62', 'PAS-DE-CALAIS'),
('63', 'PUY-DE-DOME'),
('64', 'PYRENEES-ATLANTIQUES'),
('65', 'HAUTES-PYRENEES'),
('66', 'PYRENEES-ORIENTALES'),
('67', 'BAS-RHIN'),
('68', 'HAUT-RHIN'),
('69', 'RHONE'),
('70', 'HAUTE-SAONE'),
('71', 'SAONE-ET-LOIRE'),
('72', 'SARTHE'),
('73', 'SAVOIE'),
('74', 'HAUTE-SAVOIE'),
('75', 'PARIS'),
('76', 'SEINE-MARITIME'),
('77', 'SEINE-ET-MARNE'),
('78', 'YVELINES'),
('79', 'DEUX-SEVRES'),
('80', 'SOMME'),
('81', 'TARN'),
('82', 'TARN-ET-GARONNE'),
('83', 'VAR'),
('84', 'VAUCLUSE'),
('85', 'VENDEE'),
('86', 'VIENNE'),
('87', 'HAUTE-VIENNE'),
('88', 'VOSGES'),
('89', 'YONNE'),
('90', 'TERRITOIRE-DE-BELFORT'),
('91', 'ESSONNE'),
('92', 'HAUTS-DE-SEINE'),
('93', 'SEINE-SAINT-DENIS'),
('94', 'VAL-DE-MARNE'),
('95', 'VAL-DOISE'),
('976', 'MAYOTTE'),
('971', 'GUADELOUPE'),
('973', 'GUYANE'),
('972', 'MARTINIQUE'),
('974', 'REUNION');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `depart` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdpHash` varchar(64) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnesmatch`
--

DROP TABLE IF EXISTS `personnesmatch`;
CREATE TABLE IF NOT EXISTS `personnesmatch` (
  `id_personne1` int(11) NOT NULL,
  `id_personne2` int(11) NOT NULL,
  `statuspersonne1` varchar(15) NOT NULL,
  `statuspersonne2` varchar(15) NOT NULL,
  PRIMARY KEY (`id_personne1`,`id_personne2`),
  KEY `personne2` (`id_personne2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

DROP TABLE IF EXISTS `pratique`;
CREATE TABLE IF NOT EXISTS `pratique` (
  `id_personne` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  KEY `personne_sport` (`id_personne`),
  KEY `sport_personne` (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id_sport` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnesmatch`
--
ALTER TABLE `personnesmatch`
  ADD CONSTRAINT `personne1` FOREIGN KEY (`id_personne1`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `personne2` FOREIGN KEY (`id_personne2`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD CONSTRAINT `personne_sport` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `sport_personne` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id_sport`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
