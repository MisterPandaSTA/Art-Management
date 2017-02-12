-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 05 Février 2017 à 15:51
-- Version du serveur: 5.5.53-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `art_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id_artiste` int(10) unsigned NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telephone` tinyint(3) unsigned NOT NULL,
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
  `activitees_chinois` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_artiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

CREATE TABLE IF NOT EXISTS `exposition` (
  `id_exposition` int(10) unsigned NOT NULL,
  `id_artiste` int(10) unsigned NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `theme` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_exposition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liste_expose`
--

CREATE TABLE IF NOT EXISTS `liste_expose` (
  `id_expose` int(10) unsigned NOT NULL,
  `id_oeuvre` int(10) unsigned NOT NULL,
  `id_exposition` int(10) unsigned NOT NULL,
  `coordonnee_x` float NOT NULL,
  `coordonnee_y` float NOT NULL,
  PRIMARY KEY (`id_expose`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` int(10) unsigned NOT NULL,
  `id_oeuvre` int(10) unsigned NOT NULL,
  `id_artiste` int(10) unsigned NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `retour_artiste` date DEFAULT NULL,
  `livreur` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_livraison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(10) unsigned NOT NULL,
  `type_media` enum('video','photo','qrcode') DEFAULT NULL,
  `id_oeuvre` int(10) unsigned NOT NULL,
  `id_artiste` int(10) unsigned NOT NULL,
  `id_exposition` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE IF NOT EXISTS `oeuvre` (
  `id_oeuvre` int(10) unsigned NOT NULL,
  `nom` varchar(35) NOT NULL,
  `type_oeuvre` varchar(35) NOT NULL,
  `dimensions` varchar(35) NOT NULL,
  `poids` smallint(5) unsigned DEFAULT NULL,
  `description_oeuvre` mediumtext,
  `date_creation` date DEFAULT NULL,
  `livraison` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_oeuvre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statisque`
--

CREATE TABLE IF NOT EXISTS `statisque` (
  `id_stats` int(10) unsigned NOT NULL,
  `date_stats` date NOT NULL,
  `nb_visite_oeuvre` mediumint(8) unsigned DEFAULT NULL,
  `nb_visite_exposition` mediumint(8) unsigned DEFAULT NULL,
  `id_oeuvre` int(10) unsigned DEFAULT NULL,
  `id_exposition` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_stats`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traduction_oeuvre`
--

CREATE TABLE IF NOT EXISTS `traduction_oeuvre` (
  `id_traduction` int(10) unsigned NOT NULL,
  `id_oeuvre` int(10) unsigned NOT NULL,
  `nom_anglais` varchar(35) DEFAULT NULL,
  `type_oeuvre` varchar(35) DEFAULT NULL,
  `description_oeuvre` mediumtext,
  `langue` enum('anglais','allemand','russe','chinois') DEFAULT NULL,
  PRIMARY KEY (`id_traduction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` smallint(5) unsigned NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` char(13) NOT NULL DEFAULT '012345678912',
  `permission` enum('admin','utilisateur') DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `permission`) VALUES
(0, 'Fioret', 'Claudinette', 'm.fioret@fion.net', '012345678912', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
