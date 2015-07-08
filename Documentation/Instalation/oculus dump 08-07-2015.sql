-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Juillet 2015 à 13:18
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
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` char(25) DEFAULT NULL,
  `date_article` date DEFAULT NULL,
  `contenu` varchar(25) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `theme` char(25) DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_article`, `nom_article`, `date_article`, `contenu`, `visible`, `theme`) VALUES
(1, 'Article avec photo', '2015-07-08', 'doit Ãªtre dans tech', 1, 'tech'),
(2, 'Article 2', '2015-07-08', 'Doit Ãªtre dans gaming', 1, 'game'),
(3, 'Article 3', '2015-07-08', 'Doit Ãªtre dans tech', 0, 'tech'),
(4, 'Article 4', '2015-07-08', 'Doit Ãªtre dans gaming + ', 0, 'game'),
(5, 'Article 5', '2015-07-08', 'Doit Ãªtre dans tech et v', 0, 'tech'),
(6, 'Article 6', '2015-07-08', 'dans tech + visible=0', 0, 'tech'),
(7, 'Article 7', '2015-07-08', 'game et visible=0', 0, 'game');

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
-- Structure de la table `contient`
--

CREATE TABLE IF NOT EXISTS `contient` (
  `imageID` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`imageID`,`id_article`),
  KEY `FK_contient_id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `imageID` int(11) NOT NULL AUTO_INCREMENT,
  `imageNom` varchar(100) DEFAULT NULL,
  `imageURL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`imageID`, `imageNom`, `imageURL`) VALUES
(1, '34398.jpg', 'photosArticle/34398.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `newslettersmails`
--

INSERT INTO `newslettersmails` (`emailId`, `email`, `userID`) VALUES
(1, 'arnaud@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `imageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`imageID`,`userID`),
  KEY `FK_upload_userID` (`userID`)
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
  `passWord` char(50) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `emailId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `FK_users_emailId` (`emailId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userID`, `pseudo`, `lastName`, `firstName`, `birthDate`, `sexe`, `email`, `hobits`, `geekHobits`, `passWord`, `grade`, `emailId`) VALUES
(1, 'Admin', 'Admin', 'Admin', '0000-00-00', 'Homme', 'Admin@gmail.com', 'Admin', 'Admin', 'Admin', 3, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `a_ecrit`
--
ALTER TABLE `a_ecrit`
  ADD CONSTRAINT `FK_a_ecrit_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_a_ecrit_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `FK_contient_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_contient_imageID` FOREIGN KEY (`imageID`) REFERENCES `image` (`imageID`);

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `FK_messagerie_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `FK_messagerie_userID_users` FOREIGN KEY (`userID_users`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `newslettersmails`
--
ALTER TABLE `newslettersmails`
  ADD CONSTRAINT `FK_newsLettersMails_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `FK_upload_imageID` FOREIGN KEY (`imageID`) REFERENCES `image` (`imageID`),
  ADD CONSTRAINT `FK_upload_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_emailId` FOREIGN KEY (`emailId`) REFERENCES `newslettersmails` (`emailId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
