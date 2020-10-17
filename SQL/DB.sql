-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 17 oct. 2020 à 10:50
-- Version du serveur :  10.5.6-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SportyMeet`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` varchar(3) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom`) VALUES
('1', 'AIN'),
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
('2', 'AISNE'),
('21', 'COTE-DOR'),
('22', 'COTES-DARMOR'),
('23', 'CREUSE'),
('24', 'DORDOGNE'),
('25', 'DOUBS'),
('26', 'DROME'),
('27', 'EURE'),
('28', 'EURE-ET-LOIR'),
('29', 'FINISTERE'),
('2A', 'CORSE-DU-SUD'),
('2B', 'HAUTE-CORSE'),
('3', 'ALLIER'),
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
('4', 'ALPES-DE-HAUTE-PROVENCE'),
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
('5', 'HAUTES-ALPES'),
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
('6', 'ALPES-MARITIMES'),
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
('7', 'ARDECHE'),
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
('8', 'ARDENNES'),
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
('9', 'ARIEGE'),
('90', 'TERRITOIRE-DE-BELFORT'),
('91', 'ESSONNE'),
('92', 'HAUTS-DE-SEINE'),
('93', 'SEINE-SAINT-DENIS'),
('94', 'VAL-DE-MARNE'),
('95', 'VAL-DOISE'),
('971', 'GUADELOUPE'),
('972', 'MARTINIQUE'),
('973', 'GUYANE'),
('974', 'REUNION'),
('976', 'MAYOTTE');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id_departement` varchar(3) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdpHash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `id_departement`, `mail`, `mdpHash`) VALUES
(2, 'Smith', 'John', '1', 'john.smith@yopmail.com', ''),
(3, 'Jane', 'Doe', '1', 'jane.doe@yopmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `personnesmatch`
--

CREATE TABLE `personnesmatch` (
  `id_personne1` int(11) NOT NULL,
  `id_personne2` int(11) NOT NULL,
  `statuspersonne1` varchar(15) NOT NULL,
  `statuspersonne2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE `pratique` (
  `id_personne` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `niveau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id_sport` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id_sport`, `nom`) VALUES
(1, 'Football'),
(2, 'Basket'),
(3, 'Tennis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`),
  ADD KEY `personne_departement` (`id_departement`);

--
-- Index pour la table `personnesmatch`
--
ALTER TABLE `personnesmatch`
  ADD PRIMARY KEY (`id_personne1`,`id_personne2`),
  ADD KEY `personne2` (`id_personne2`),
  ADD KEY `personne1` (`id_personne1`) USING BTREE;

--
-- Index pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD PRIMARY KEY (`id_personne`,`id_sport`),
  ADD KEY `personne_sport` (`id_personne`) USING BTREE,
  ADD KEY `sport_personne` (`id_sport`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_departement` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`);

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
