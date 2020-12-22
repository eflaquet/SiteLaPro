-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 déc. 2020 à 23:32
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lapro`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(20) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'logiciel'),
(2, 'installation');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

DROP TABLE IF EXISTS `cycle`;
CREATE TABLE IF NOT EXISTS `cycle` (
  `id_cycle` int(11) NOT NULL AUTO_INCREMENT,
  `cycle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cycle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id_cycle`, `cycle`) VALUES
(1, 'Ecole'),
(2, 'College');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id_maintenance` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  PRIMARY KEY (`id_maintenance`),
  KEY `id_ticket` (`id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

DROP TABLE IF EXISTS `priorite`;
CREATE TABLE IF NOT EXISTS `priorite` (
  `id_priorite` int(11) NOT NULL AUTO_INCREMENT,
  `priorite` varchar(20) NOT NULL,
  PRIMARY KEY (`id_priorite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `priorite`
--

INSERT INTO `priorite` (`id_priorite`, `priorite`) VALUES
(1, 'Faible'),
(2, 'Moyen');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `id_cycle` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_priorite` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_echeance` date NOT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `id_type` (`id_type`),
  KEY `id_cycle` (`id_cycle`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_priorite` (`id_priorite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_type`, `id_cycle`, `id_categorie`, `id_user`, `id_priorite`, `commentaire`, `date_echeance`) VALUES
(1, 1, 1, 1, 1, 1, 'Problemment au niveau du logiciel words', '2020-12-22'),
(3, 4, 1, 2, 1, 2, 'Eraur d\'insatlibntion', '2020-12-23');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'Personnel administratif'),
(4, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_type` (`id_type`),
  KEY `id_type_2` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `name`, `email`, `password`, `id_type`) VALUES
(1, 'Edouard', 'Flaquet', 'eflaquet@la-providence.net', '$2y$10$QPddqU2G3hz6oL.X6ZPEwOdTgTRuyyW8Qg/tvAClvzFs3injtE2Xu', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_cycle`) REFERENCES `cycle` (`id_cycle`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`id_priorite`) REFERENCES `priorite` (`id_priorite`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
