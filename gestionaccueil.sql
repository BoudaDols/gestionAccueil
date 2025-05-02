-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 mars 2021 à 14:52
-- Version du serveur :  8.0.18
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
-- Base de données :  `gestionaccueil`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  `naissance` varchar(32) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `tel` int(12) NOT NULL,
  `whatsapp` int(12) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `employeur` varchar(255) DEFAULT NULL,
  `profession` int(255) NOT NULL,
  `rdv` tinyint(1) NOT NULL,
  `assurance` tinyint(1) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `nomAssurance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `noms`, `naissance`, `lieu`, `tel`, `whatsapp`, `street`, `employeur`, `profession`, `rdv`, `assurance`, `objet`, `nomAssurance`) VALUES
(2, 'Bouda Dolsom', '1995-06-09', 'Ouaga', 72544547, 72544543, 'Secteur 52', 'BCB', 0, 0, 0, 'position de compte', ''),
(3, 'kone Issa', '1979-12-12', 'kokologo', 77121288, 70121513, 'ouagadougou', 'ONEA', 0, 0, 1, 'création de compte', 'GRAS SAVOIE');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `libelle`) VALUES
(1, 'Consultation généraliste'),
(2, 'Consultation cardiologique'),
(3, 'Consultation chirurgicale'),
(4, 'Opération chirurgicale'),
(5, 'Visite medicale');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agence` varchar(32) NOT NULL,
  `status` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `noms`, `username`, `password`, `agence`, `status`) VALUES
(1, 'Bouda Dolsom', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'administrateur'),
(2, 'Ouedraogo Ouedraogo', 'traiteurEx', '4882c8f46d28a2002c9292e3c12f0316', 'default', 'traiteur'),
(3, 'Ilboudo Ilboudo', 'accueil', '2a9e0c7baf1cb5b706656fcfcec240ed', 'default', 'accueil');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `client` int(22) NOT NULL,
  `motif` int(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
