-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Mars 2017 à 22:16
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `art_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `pseudo` varchar(70) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(70) NOT NULL,
  `description` mediumtext NOT NULL,
  `description_anglais` mediumtext,
  `description_allemand` mediumtext,
  `description_russe` mediumtext,
  `description_chinois` mediumtext,
  `activitees` varchar(70) DEFAULT NULL,
  `activitees_anglais` varchar(70) DEFAULT NULL,
  `activitees_allemand` varchar(70) DEFAULT NULL,
  `activitees_russe` varchar(70) DEFAULT NULL,
  `activitees_chinois` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom`, `prenom`, `pseudo`, `email`, `telephone`, `adresse`, `description`, `description_anglais`, `description_allemand`, `description_russe`, `description_chinois`, `activitees`, `activitees_anglais`, `activitees_allemand`, `activitees_russe`, `activitees_chinois`) VALUES
(1, 'test', 'test', NULL, 'test@test.com', '0612121212', 'szefzefzfeefdfadad', 'zertyjuoi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `id_exposition` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `id_oeuvre` int(10) UNSIGNED NOT NULL,
  `id_artiste` int(10) UNSIGNED NOT NULL,
  `nom` varchar(35) NOT NULL,
  `type_oeuvre` varchar(35) NOT NULL,
  `dimensions` varchar(35) NOT NULL,
  `poids` smallint(5) UNSIGNED DEFAULT NULL,
  `description_oeuvre` mediumtext,
  `date_creation` date DEFAULT NULL,
  `livraison` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id_oeuvre`, `id_artiste`, `nom`, `type_oeuvre`, `dimensions`, `poids`, `description_oeuvre`, `date_creation`, `livraison`) VALUES
(1, 1, 'qzd', 'qzd', '', 0, '', '2017-03-08', 0);

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
(4, 'Webtest', 'test', 'test@test.net', '$2y$10$zApA5Nbg/jiAaoe49lH8Eug8tuBHxs7sMuTu6D8EKXM1Xxzg2bfjK', 'utilisateur');

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
  MODIFY `id_artiste` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `exposant`
--
ALTER TABLE `exposant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id_exposition` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `id_oeuvre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_utilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
