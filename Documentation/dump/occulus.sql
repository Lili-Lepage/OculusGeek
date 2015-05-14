-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Mai 2015 à 19:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `occulus`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `Ville` char(25) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `adresse_1` char(25) DEFAULT NULL,
  `adresse_2` char(25) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `apparente`
--

CREATE TABLE IF NOT EXISTS `apparente` (
  `id_categorie` int(11) NOT NULL,
  `id_categorie_categorie_articles` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`,`id_categorie_categorie_articles`),
  KEY `FK_apparente_id_categorie_categorie_articles` (`id_categorie_categorie_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` char(25) DEFAULT NULL,
  `date_article` date DEFAULT NULL,
  `contenu` varchar(65) DEFAULT NULL,
  `pseudo` char(25) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `nom_article`, `date_article`, `contenu`, `pseudo`) VALUES
(1, 'blabla', NULL, 'this is the new shit', ''),
(2, 'Get jinxed', NULL, 'Wana join me?\r\nComme and play!\r\nBut I might shoot you,\r\nIn your f', '');

-- --------------------------------------------------------

--
-- Structure de la table `a_ecrit`
--

CREATE TABLE IF NOT EXISTS `a_ecrit` (
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_article`),
  KEY `FK_a_ecrit_id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `a_pour`
--

CREATE TABLE IF NOT EXISTS `a_pour` (
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_article`,`id_categorie`),
  KEY `FK_a_pour_id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_articles`
--

CREATE TABLE IF NOT EXISTS `categorie_articles` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categorie_articles`
--

INSERT INTO `categorie_articles` (`id_categorie`, `nom_categorie`) VALUES
(1, 'nouvelles technologies'),
(2, 'ordinateur'),
(3, 'console'),
(4, 'mobile'),
(5, 'objets connectés'),
(6, 'jeux'),
(7, 'consoles'),
(8, 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_utilisateur` int(11) NOT NULL,
  `id_utilisateur_1` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_utilisateur_1`),
  KEY `FK_messagerie_id_utilisateur_1` (`id_utilisateur_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `nom_grade` char(25) NOT NULL,
  `niveau_droit` int(11) DEFAULT NULL,
  PRIMARY KEY (`nom_grade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

CREATE TABLE IF NOT EXISTS `suit` (
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_categorie`),
  KEY `FK_suit_id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` char(25) DEFAULT NULL,
  `nom_utilisateur` char(25) DEFAULT NULL,
  `prenom_utilisateur` char(25) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` char(25) DEFAULT NULL,
  `email` char(25) DEFAULT NULL,
  `loisirs` varchar(25) DEFAULT NULL,
  `centres_interets` varchar(25) DEFAULT NULL,
  `mot_de_passe` char(50) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `nom_grade` char(25) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `FK_utilisateur_id_adresse` (`id_adresse`),
  KEY `FK_utilisateur_nom_grade` (`nom_grade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `nom_utilisateur`, `prenom_utilisateur`, `date_naissance`, `sexe`, `email`, `loisirs`, `centres_interets`, `mot_de_passe`, `id_adresse`, `nom_grade`) VALUES
(1, 'Testeur', 'Premier', 'Test', '0000-00-00', '', 'aria@gmail.com', '', '', 'root', NULL, NULL),
(5, 'Max', 'Petit', 'Maxime', '0000-00-00', '', 'maxime@gmail.com', '', '', 'root', NULL, NULL),
(7, 'Wardov', 'Meriguet', 'Arnaud', '1994-01-14', 'Masculin', 'marnaudm@gmail.com', 'Escalade, musique, chant,', 'J''aime beaucoup la rÃ©ali', 'root', NULL, NULL),
(8, 'Dickbut', 'Dickinson', 'Marjin', '0000-00-00', '', 'sdfesf@gmail.com', '', '', 'root', NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apparente`
--
ALTER TABLE `apparente`
  ADD CONSTRAINT `FK_apparente_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_apparente_id_categorie_categorie_articles` FOREIGN KEY (`id_categorie_categorie_articles`) REFERENCES `categorie_articles` (`id_categorie`);

--
-- Contraintes pour la table `a_ecrit`
--
ALTER TABLE `a_ecrit`
  ADD CONSTRAINT `FK_a_ecrit_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_a_ecrit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `a_pour`
--
ALTER TABLE `a_pour`
  ADD CONSTRAINT `FK_a_pour_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_a_pour_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`);

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `FK_messagerie_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `FK_messagerie_id_utilisateur_1` FOREIGN KEY (`id_utilisateur_1`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `suit`
--
ALTER TABLE `suit`
  ADD CONSTRAINT `FK_suit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_suit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_utilisateur_nom_grade` FOREIGN KEY (`nom_grade`) REFERENCES `statut` (`nom_grade`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
