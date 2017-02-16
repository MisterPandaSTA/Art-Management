-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Février 2017 à 14:56
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
  `email` varchar(70) NOT NULL,
  `telephone` tinyint(3) UNSIGNED NOT NULL,
  `adresse` varchar(70) NOT NULL,
  `description` mediumtext NOT NULL,
  `description_anglais` mediumtext,
  `description_allemand` mediumtext,
  `description_russe` mediumtext,
  `description_chinois` mediumtext,
  `activitees` varchar(70) NOT NULL,
  `activitees_anglais` varchar(70) DEFAULT NULL,
  `activitees_allemand` varchar(70) DEFAULT NULL,
  `activitees_russe` varchar(70) DEFAULT NULL,
  `activitees_chinois` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nom` varchar(35) NOT NULL,
  `type_oeuvre` varchar(35) NOT NULL,
  `dimensions` varchar(35) NOT NULL,
  `poids` smallint(5) UNSIGNED DEFAULT NULL,
  `description_oeuvre` mediumtext,
  `date_creation` date DEFAULT NULL,
  `livraison` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nom_anglais` varchar(35) DEFAULT NULL,
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
  `permission` enum('admin','utilisateur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `permission`) VALUES
(1, 'Fioret', 'Claudinette', 'm.fioret@fion.net', '$2y$10$FnOulbbWh8f8rKukr5xuDeYvbUoqZ.RsZ8FyeKE./5NhQm7.tl6vu', 'admin'),
(3, 'Webmin', 'MisterPanda', 'misterpandasta@gmail.com', '$2y$10$S4IS9CFLG3Dyh6mDgyvgQOasL1tG7eekSHA58jI8d/RCpuFLel1Pe', 'admin'),
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
-- Index pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD PRIMARY KEY (`id_exposition`);

--
-- Index pour la table `liste_expose`
--
ALTER TABLE `liste_expose`
  ADD PRIMARY KEY (`id_expose`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`id_oeuvre`);

--
-- Index pour la table `statisque`
--
ALTER TABLE `statisque`
  ADD PRIMARY KEY (`id_stats`);

--
-- Index pour la table `traduction_oeuvre`
--
ALTER TABLE `traduction_oeuvre`
  ADD PRIMARY KEY (`id_traduction`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
