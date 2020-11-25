-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 oct. 2020 à 10:10
-- Version du serveur :  5.7.28
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE IF NOT EXISTS `don` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_streamer` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `montant` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_streamer` (`id_streamer`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id`, `id_streamer`, `pseudo`, `message`, `montant`, `date`) VALUES
(1, 1, 'Kevin', 'Let\'s goooooooooooooooo', 1000, '2020-10-16 00:24:19');

-- --------------------------------------------------------

--
-- Structure de la table `streamer`
--

DROP TABLE IF EXISTS `streamer`;
CREATE TABLE IF NOT EXISTS `streamer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `url_twitch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `streamer`
--

INSERT INTO `streamer` (`id`, `nom`, `url_twitch`) VALUES
(1, 'Zerator', 'https://www.twitch.tv/zerator'),
(2, 'Squeezie', 'https://www.twitch.tv/squeezie'),
(3, 'Kenny', 'https://www.twitch.tv/kennystream'),
(4, 'Moman', 'https://www.twitch.tv/moman'),
(5, 'Sardoche', 'https://www.twitch.tv/sardoche');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
