-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 05 Avril 2017 à 12:27
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `art_management_full`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `nom_artiste` varchar(35) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(35) CHARACTER SET latin1 NOT NULL,
  `pseudo` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(70) CHARACTER SET latin1 NOT NULL,
  `telephone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `adresse` varchar(70) CHARACTER SET latin1 NOT NULL,
  `description` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `description_anglais` mediumtext CHARACTER SET latin1,
  `description_allemand` mediumtext CHARACTER SET latin1,
  `description_russe` mediumtext CHARACTER SET latin1,
  `description_chinois` mediumtext CHARACTER SET latin1,
  `activitees` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `activitees_anglais` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `activitees_allemand` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `activitees_russe` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `activitees_chinois` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `prenom`, `pseudo`, `email`, `telephone`, `adresse`, `description`, `description_anglais`, `description_allemand`, `description_russe`, `description_chinois`, `activitees`, `activitees_anglais`, `activitees_allemand`, `activitees_russe`, `activitees_chinois`) VALUES
(1, 'LE DIUZET', 'Albert', NULL, 'test@test.com', '0612121212', 'szefzefzfeefdfadad', 'zertyjuoi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ZDZIEBLO', 'Thierry', NULL, '', '', '', 'Passionné de sport, Thierry se lance dans une carrière de haut niveau. Il se spécialise dans l’ultra marathon (course à pied de très longue distance) par goût du défi et de l’aventure. En 1995, il effectue en solitaire la traversée d’une partie du Sahara occidental (Maroc et Algérie). Cet événement le marque à jamais car l’épreuve se transforme ...', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'DAVID', 'Sandra', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `exposant`
--

CREATE TABLE `exposant` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `id_exposition` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

CREATE TABLE `exposition` (
  `id_exposition` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `theme` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `exposition`
--

INSERT INTO `exposition` (`id_exposition`, `id_artiste`, `date_debut`, `date_fin`, `theme`) VALUES
(1, 2, '0000-00-00', '0000-00-00', 'Les petits oiseaux'),
(2, 1, '2015-12-25', '2016-02-14', 'la genèse');

-- --------------------------------------------------------

--
-- Structure de la table `liste_expose`
--

CREATE TABLE `liste_expose` (
  `id_expose` int(10) UNSIGNED NOT NULL,
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `id_exposition` int(10) UNSIGNED NOT NULL,
  `coordonnee_x` float NOT NULL,
  `coordonnee_y` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` int(10) UNSIGNED NOT NULL,
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `retour_artiste` date DEFAULT NULL,
  `livreur` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(10) UNSIGNED NOT NULL,
  `type_media` enum('video','photo','qrcode') DEFAULT NULL,
  `id_oeuvre` int(10) UNSIGNED DEFAULT NULL,
  `id_artiste` int(10) UNSIGNED DEFAULT NULL,
  `id_exposition` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `type_media`, `id_oeuvre`, `id_artiste`, `id_exposition`) VALUES
(1, 'photo', 12, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `nom` varchar(35) CHARACTER SET latin1 NOT NULL,
  `img_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type_oeuvre` varchar(35) CHARACTER SET latin1 NOT NULL,
  `dimensions` varchar(35) CHARACTER SET latin1 NOT NULL,
  `poids` smallint(5) UNSIGNED DEFAULT NULL,
  `description_oeuvre` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci,
  `date_creation` date DEFAULT NULL,
  `livraison` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id_oeuvre`, `id_artiste`, `nom`, `img_name`, `type_oeuvre`, `dimensions`, `poids`, `description_oeuvre`, `date_creation`, `livraison`) VALUES
(1, 1, 'Compo marine 13', 'compo-marine-13.jpg', 'tableau', '', 0, 'Lorem Ipsum est un g', '2017-03-08', 0),
(12, 1, 'Mirage Gris', 'mirage-gris.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(15, 2, 'black', 'black.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(16, 1, 'Compo marine bleu 42', 'compo-marine-bleu-42.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(17, 1, '3 Eléments marines', '3-elements-marines.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(29, 2, 'Rouge', 'rouge.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(30, 2, 'Explosion', 'explosion.jpg', '', '50 x 50 cm', 0, 'L\'oeuvre unique et originale Sans titre 16-09-14 a Ã©tÃ© rÃ©alisÃ©e par l\'artiste Thierry Zdzieblo, qui peint des oeuvres abstraites trÃ¨s colorÃ©es avec une application d\'huile au couteau, ce qui donne un effet trÃ¨s profond magnifique.', '2016-09-14', 0),
(31, 1, 'Pêcheurs au soleil couchant', 'pecheurs-soleil-couchant.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(32, 1, 'Marine Urba', 'marine-urba-39.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(42, 2, 'Grey', 'grey.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(45, 2, 'Orangée', 'orange.jpg', 'tableau', '', 0, '', '0000-00-00', 0),
(49, 3, 'white man', 'white_man.jpg', 'sculplture', '', NULL, NULL, NULL, 0),
(50, 3, 'blue man', 'blue_man.jpg', 'sculpture', '', NULL, NULL, NULL, 0),
(51, 3, 'Red man', 'red_man.jpg', 'sculpture', '', NULL, NULL, NULL, 0),
(52, 3, 'Black man', 'black_man.jpg', 'sculpture', '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statisque`
--

CREATE TABLE `statisque` (
  `id_stats` int(10) UNSIGNED NOT NULL,
  `date_stats` date NOT NULL,
  `nb_visite_oeuvre` mediumint(8) UNSIGNED DEFAULT NULL,
  `nb_visite_exposition` mediumint(8) UNSIGNED DEFAULT NULL,
  `id_oeuvre` int(10) UNSIGNED DEFAULT NULL,
  `id_exposition` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traduction_oeuvre`
--

CREATE TABLE `traduction_oeuvre` (
  `id_traduction` int(10) UNSIGNED NOT NULL,
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `type_oeuvre` varchar(35) DEFAULT NULL,
  `description_oeuvre` mediumtext,
  `langue` enum('anglais','allemand','russe','chinois') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` char(60) DEFAULT NULL,
  `permission` enum('admin','utilisateur','inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `permission`) VALUES
(1, 'Fioret', 'Claudinette', 'm.fioret@fion.net', '$2y$10$FnOulbbWh8f8rKukr5xuDeYvbUoqZ.RsZ8FyeKE./5NhQm7.tl6vu', 'admin'),
(3, 'WebAdmin', 'MisterPanda', 'misterpandasta@gmail.com', '$2y$10$AJMfkV/kwIe1iEZSafxUUujtFWhqN.RC2nkmnwO7POQMKK4ple3wW', 'admin'),
(4, 'Webtest', 'test', 'test@test.net', '$2y$10$zApA5Nbg/jiAaoe49lH8Eug8tuBHxs7sMuTu6D8EKXM1Xxzg2bfjK', 'utilisateur'),
(5, '', '', 'greg@free.fr', '$2y$10$ZMvTkW3Bat7YXxbMXNjS7OBMs8QTvob0pdpdfWlnOR2SEBxArL3HO', 'admin'),
(6, 'sdsdsdsd', '', '', '$2y$10$9BVZ8mHAU9Ece4IQQKC88O1v3eVNyQ4CDyl72z7TWiBMpIkcSTBTK', ''),
(7, 'sdsdsd', '', '', '$2y$10$OthdO9goW26nxE/fKPPXNuIp8xQTMyhvI1B5H9SIoFf5T9ZLYNg5q', ''),
(8, 'sdsdsd', '', '', '$2y$10$6hQfDdAbbUffvT1gtL2cwO/bDJwlGDI1KRnu2tmB84PmzXdSrlRDy', ''),
(9, 'sdsdsd', '', '', '$2y$10$UF.lyoSG5RSVOMKMIE4lQOJ6YMhL33VW2.Q3XuxNQPB0tf6OOZx3O', ''),
(10, 'sdsdsdsd', '', '', '$2y$10$6aQ8B7vXesL5V1tH9A3IeO8yTcAsSfyi7oDzEGXRZbpLbwRJaya/a', ''),
(11, 'eeee', '', '', '$2y$10$EbJjZJCWk8IgRiRcXL3xJeudsoYF4HFzJlvUmzHwwIDDhAJ6KZfEm', ''),
(12, 'azeazeaze', '', '', '$2y$10$LPVnvgF7wQj3Q0Vy1tbR4e0NwTZvIDMhQFg0EOUxMQnxKSSC6WHPu', ''),
(13, 'qsdqsd', '', '', '$2y$10$JGnPhH3sU247qQEEm7FLs.fu4AYr3mzBY6ZASsn9XCELykRJJjExC', ''),
(14, 'zeeezz', '', '', '$2y$10$E.la0xLNZVU/6QvX9DoIIuoKnglBzqchGALBzKB7XdPKcokJjp7eK', ''),
(15, 'Les Coquelicots', '', '', '$2y$10$0w3mPff8AMmGrLbWmQATAuYVp1a2kEVtiitkhGh6HMzRGZq5nS6Wu', ''),
(16, '654654', '', '', '$2y$10$5QpQ/cb3ZiB0jiY8dIbWFu2oSEMJLjGmXM7La97l3yXexbwEvHpXe', ''),
(17, 'sdfsdfsdf', '', '', '$2y$10$xCcKedBgM.3l9a7M.5CvVuoK3LW04gFDhd6NO1LnczZMGn7LN/pTe', ''),
(18, 'sdfsdf', '', '', '$2y$10$dXQ2f0fLwP2q.XrmcYCPQ.BR6b3v9Cf3xfJkMfdlxIbiosewiVlte', ''),
(19, 'Les clodos', '', '', '$2y$10$Tok97QRRhU.HrJ4lF/zORe3GjFUwjh6kPuC1.vJ2c3.8oeLx3ILA.', ''),
(20, 'les 3 petits cochons', '', '', '$2y$10$gsHv.JnvxlDI4paWuh.H3utTYjeQYEbWFlY/GU/Dx51c1iaasR8fW', ''),
(21, 'zezeze', '', '', '$2y$10$voyKDflJCWN8FCH.QDoOkOBrVey/cPGERWc.nB3LESxNcA26oqUUK', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id_artiste`);

--
-- Index pour la table `exposant`
--
ALTER TABLE `exposant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artiste` (`id_artiste`),
  ADD KEY `id_exposition` (`id_exposition`),
  ADD KEY `id_artiste_2` (`id_artiste`),
  ADD KEY `id_exposition_2` (`id_exposition`);

--
-- Index pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD PRIMARY KEY (`id_exposition`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `liste_expose`
--
ALTER TABLE `liste_expose`
  ADD PRIMARY KEY (`id_expose`),
  ADD KEY `id_oeuvre` (`id_oeuvre`),
  ADD KEY `id_exposition` (`id_exposition`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `id_oeuvre` (`id_oeuvre`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`),
  ADD KEY `id_oeuvre` (`id_oeuvre`),
  ADD KEY `id_artiste` (`id_artiste`),
  ADD KEY `id_exposition` (`id_exposition`);

--
-- Index pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`id_oeuvre`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `statisque`
--
ALTER TABLE `statisque`
  ADD PRIMARY KEY (`id_stats`),
  ADD KEY `id_oeuvre` (`id_oeuvre`),
  ADD KEY `id_exposition` (`id_exposition`);

--
-- Index pour la table `traduction_oeuvre`
--
ALTER TABLE `traduction_oeuvre`
  ADD PRIMARY KEY (`id_traduction`),
  ADD KEY `id_oeuvre` (`id_oeuvre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id_artiste` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `exposant`
--
ALTER TABLE `exposant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id_exposition` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `id_oeuvre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `statisque`
--
ALTER TABLE `statisque`
  MODIFY `id_stats` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `traduction_oeuvre`
--
ALTER TABLE `traduction_oeuvre`
  MODIFY `id_traduction` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD CONSTRAINT `exposition_ibfk_1` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `liste_expose`
--
ALTER TABLE `liste_expose`
  ADD CONSTRAINT `liste_expose_ibfk_1` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre` (`id_oeuvre`),
  ADD CONSTRAINT `liste_expose_ibfk_2` FOREIGN KEY (`id_exposition`) REFERENCES `exposition` (`id_exposition`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre` (`id_oeuvre`),
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre` (`id_oeuvre`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`id_exposition`) REFERENCES `exposition` (`id_exposition`);

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `oeuvre_ibfk_1` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `statisque`
--
ALTER TABLE `statisque`
  ADD CONSTRAINT `dgvf` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre` (`id_oeuvre`),
  ADD CONSTRAINT `statisque_ibfk_1` FOREIGN KEY (`id_exposition`) REFERENCES `exposition` (`id_exposition`);

--
-- Contraintes pour la table `traduction_oeuvre`
--
ALTER TABLE `traduction_oeuvre`
  ADD CONSTRAINT `traduction_oeuvre_ibfk_1` FOREIGN KEY (`id_oeuvre`) REFERENCES `oeuvre` (`id_oeuvre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
