-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 05 Décembre 2014 à 03:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pipe-my-fork`
--

-- --------------------------------------------------------

--
-- Structure de la table `actulieu`
--

CREATE TABLE IF NOT EXISTS `actulieu` (
  `idNew` int(11) NOT NULL,
  `lieux` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idNew`,`lieux`),
  KEY `lieux` (`lieux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `foyer`
--

CREATE TABLE IF NOT EXISTS `foyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `nbPersonne` int(11) NOT NULL,
  `lieux` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lieux` (`lieux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `lieux` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`lieux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text COLLATE utf8_bin NOT NULL,
  `info` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin,
  `dates` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `info`, `image`, `dates`) VALUES
(1, 'Ebola', 'Le virus ravage le pays...', NULL, '2014-12-03');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` text COLLATE utf8_bin NOT NULL,
  `idFoyer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFoyer` (`idFoyer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `persvacciner`
--

CREATE TABLE IF NOT EXISTS `persvacciner` (
  `idPersonne` int(11) NOT NULL,
  `RefVaccin` varchar(45) COLLATE utf8_bin NOT NULL,
  `dates` date NOT NULL,
  PRIMARY KEY (`idPersonne`,`RefVaccin`),
  KEY `RefVaccin` (`RefVaccin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `RefVaccin` varchar(45) COLLATE utf8_bin NOT NULL,
  `idFoyer` int(11) NOT NULL,
  `quantiteVaccin` int(11) NOT NULL,
  PRIMARY KEY (`RefVaccin`,`idFoyer`),
  KEY `idFoyer` (`idFoyer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `vaccination`
--

CREATE TABLE IF NOT EXISTS `vaccination` (
  `RefVaccin` varchar(45) COLLATE utf8_bin NOT NULL,
  `nomVaccin` text COLLATE utf8_bin NOT NULL,
  `version` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`RefVaccin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actulieu`
--
ALTER TABLE `actulieu`
  ADD CONSTRAINT `actulieu_ibfk_1` FOREIGN KEY (`idNew`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `actulieu_ibfk_2` FOREIGN KEY (`lieux`) REFERENCES `localisation` (`lieux`);

--
-- Contraintes pour la table `foyer`
--
ALTER TABLE `foyer`
  ADD CONSTRAINT `foyer_ibfk_1` FOREIGN KEY (`lieux`) REFERENCES `localisation` (`lieux`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idFoyer`) REFERENCES `foyer` (`id`);

--
-- Contraintes pour la table `persvacciner`
--
ALTER TABLE `persvacciner`
  ADD CONSTRAINT `persvacciner_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `persvacciner_ibfk_2` FOREIGN KEY (`RefVaccin`) REFERENCES `vaccination` (`RefVaccin`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`RefVaccin`) REFERENCES `vaccination` (`RefVaccin`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idFoyer`) REFERENCES `foyer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
