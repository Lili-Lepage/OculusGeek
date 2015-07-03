-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juillet 2015 à 10:31
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
  `visible` int(1) DEFAULT '0',
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `nom_article`, `date_article`, `contenu`, `visible`) VALUES
(1, 'Article 1', '2015-07-03', 'Doit Ãªtre validÃ©', 0),
(2, 'Article 2', '2015-07-03', 'Doit Ãªtre supprimÃ©', 0),
(3, 'Article 2', '2015-07-03', 'Doit avoir le boolÃ©en en', 0),
(4, 'Article 4', '2015-07-03', 'Doit avoir le boolÃ©en en', 1);

-- --------------------------------------------------------

--
-- Structure de la table `a_ecrit`
--

CREATE TABLE IF NOT EXISTS `a_ecrit` (
  `userID` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`id_article`),
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
  `userID` int(11) NOT NULL,
  `userID_users` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`userID_users`),
  KEY `FK_messagerie_userID_users` (`userID_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `newslettersmails`
--

CREATE TABLE IF NOT EXISTS `newslettersmails` (
  `emailId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(75) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`emailId`),
  KEY `FK_newsLettersMails_userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

CREATE TABLE IF NOT EXISTS `suit` (
  `userID` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`id_categorie`),
  KEY `FK_suit_id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` char(60) DEFAULT NULL,
  `lastName` char(25) DEFAULT NULL,
  `firstName` char(25) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `sexe` char(25) DEFAULT NULL,
  `email` char(25) DEFAULT NULL,
  `hobits` varchar(25) DEFAULT NULL,
  `geekHobits` varchar(25) DEFAULT NULL,
  `passWord` char(50) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `emailId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `FK_users_emailId` (`emailId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userID`, `pseudo`, `lastName`, `firstName`, `birthDate`, `sexe`, `email`, `hobits`, `geekHobits`, `passWord`, `grade`, `emailId`) VALUES
(1, 'arnaud', 'M', 'Arnaud', '1994-01-14', 'Homme', 'arnaud@gmail.com', 'Musiques, films et jeux v', 'Youtube, l''Ã©volution des', 'arnaud', 3, NULL);

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
  ADD CONSTRAINT `FK_a_ecrit_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

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
  ADD CONSTRAINT `FK_messagerie_userID_users` FOREIGN KEY (`userID_users`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `FK_messagerie_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `newslettersmails`
--
ALTER TABLE `newslettersmails`
  ADD CONSTRAINT `FK_newsLettersMails_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `suit`
--
ALTER TABLE `suit`
  ADD CONSTRAINT `FK_suit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_articles` (`id_categorie`),
  ADD CONSTRAINT `FK_suit_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_emailId` FOREIGN KEY (`emailId`) REFERENCES `newslettersmails` (`emailId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
