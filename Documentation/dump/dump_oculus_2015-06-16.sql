-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Juin 2015 à 21:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `oculus`
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
  `contenu` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Structure de la table `newslettersmails`
--

CREATE TABLE IF NOT EXISTS `newslettersmails` (
  `emailId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(75) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`emailId`),
  KEY `FK_newsLettersMails_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` char(25) DEFAULT NULL,
  `lastName` char(25) DEFAULT NULL,
  `firstName` char(25) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `sexe` char(25) DEFAULT NULL,
  `email` char(25) DEFAULT NULL,
  `hobits` varchar(25) DEFAULT NULL,
  `geekHobits` varchar(25) DEFAULT NULL,
  `passWord` varchar(100) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `nom_grade` char(25) DEFAULT NULL,
  `emailId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `FK_utilisateur_id_adresse` (`id_adresse`),
  KEY `FK_utilisateur_nom_grade` (`nom_grade`),
  KEY `FK_utilisateur_emailId` (`emailId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userID`, `pseudo`, `lastName`, `firstName`, `birthDate`, `sexe`, `email`, `hobits`, `geekHobits`, `passWord`, `id_adresse`, `nom_grade`, `emailId`) VALUES
(1, 'lili', 'Ddsf', 'LILI', '2015-06-14', 'Homme', '', 'qu aimez vous ?', 'Quels sujets tâ€™interess', 'â—â—â—â—â—â—', NULL, NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apparente`
--
ALTER TABLE `apparente`
  ADD CONSTRAINT `FK_apparente_id_categorie_categorie_articles` FOREIGN KEY (`id_categorie_categorie_articles`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_apparente_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`);

--
-- Contraintes pour la table `a_ecrit`
--
ALTER TABLE `a_ecrit`
  ADD CONSTRAINT `FK_a_ecrit_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_a_ecrit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `a_pour`
--
ALTER TABLE `a_pour`
  ADD CONSTRAINT `FK_a_pour_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_a_pour_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `FK_messagerie_id_utilisateur_1` FOREIGN KEY (`id_utilisateur_1`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `FK_messagerie_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `newslettersmails`
--
ALTER TABLE `newslettersmails`
  ADD CONSTRAINT `FK_newsLettersMails_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `suit`
--
ALTER TABLE `suit`
  ADD CONSTRAINT `FK_suit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_suit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_utilisateur_emailId` FOREIGN KEY (`emailId`) REFERENCES `newslettersmails` (`emailId`),
  ADD CONSTRAINT `FK_utilisateur_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_utilisateur_nom_grade` FOREIGN KEY (`nom_grade`) REFERENCES `statut` (`nom_grade`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
