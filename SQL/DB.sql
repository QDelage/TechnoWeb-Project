-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 28 sep. 2020 à 13:40
-- Version du serveur :  8.0.18
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rencontresportive`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `depart` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdpHash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables déchargées
--

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `personnesmatch`
--
ALTER TABLE `personnesmatch`
  ADD PRIMARY KEY (`id_personne1`,`id_personne2`),
  ADD KEY `personne2` (`id_personne2`);

--
-- Index pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD KEY `personne_sport` (`id_personne`),
  ADD KEY `sport_personne` (`id_sport`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnesmatch`
--
ALTER TABLE `personnesmatch`
  ADD CONSTRAINT `personne1` FOREIGN KEY (`id_personne1`) REFERENCES `personne` (`id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `personne2` FOREIGN KEY (`id_personne2`) REFERENCES `personne` (`id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD CONSTRAINT `personne_sport` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sport_personne` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id_sport`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
