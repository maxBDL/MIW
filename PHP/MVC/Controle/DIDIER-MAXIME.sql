-- 
-- Sur la page d'accueil (donc à la racine monsite.com/) : afficher la liste des catégories avec un lien vers la page d'une catégorie et un lien vers la page de modification de la catégorie.
-- Page détail d'une catégorie : 
-- 	Afficher le nom et la description de la catégorie
-- 	Afficher la liste des articles (titre et date). Un lien sur le titre affichera le détail d'un article et ajouter deux liens: modifier et supprimer un article.
-- 	Mettre un lien pour ajouter un article (qui devra être automatiquement classé dans la catégorie en cours)
-- Page d'un article :
-- 	Afficher le titre, la date et le contenu de l'article.
-- 

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 déc. 2020 à 16:08
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `tpnote`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `id_categorie`, `titre`, `contenu`, `date_ajout`) VALUES
(1, 2, 'Comment générer un avatar de Fursona ?', 'Quand je vais trainer aux Geek Faeries chaque année, j’ai toujours le plaisir d’échanger avec des passionnés de Fursuit qui incarnent leur animal favori pour le plaisir des petits et des grands. Et je sais que certains d’entre vous ont cette passion des furries, d’où mon article du jour.\r\n\r\nIl s’agit de This Fursona Does Not Exist (TFDNE), qui est un générateur d’avatars de Fursona utilisant Tensorflow pour produire des images paramétrables et uniques puisqu’elles n’existent pas vraiment, mais sont « imaginées » (générées) par un moteur d’apprentissage.', '2020-06-09 00:00:00'),
(2, 2, 'Comment a été construite la Bugatti Chiron en LEGO ?', 'Vous avez sans doute vu un peu partout la semaine dernière, cette Bugatti Chiron fait presque entièrement de LEGO Technics ?\r\n\r\nMais savez-vous comment ce projet a été mené à bien et quels sont les défis techniques qu’il a fallu relever pour obtenir ce résultat de dingue ?\r\n\r\nNon ? Et bien ça tombe bien car il y a un petit reportage passionnant là dessus aussi, pour ceux qui veulent en savoir plus.', '2020-09-08 00:00:00'),
(3, 1, 'Animez en HTML / CSS vos dépôts Github', 'Vous êtes développeur, vous mettez du code sur Github et vous trouvez que ça manque un peu de joie, de pep’s, de design ?\r\n\r\nPas de souci, vous allez pouvoir remplir de joie votre readme.md affiché par défaut sur votre projet Github.\r\n\r\nAlors comment ?\r\n\r\nEt bien, vous pouvez tout simplement coder votre petite animation en HTML + CSS et l’encapsuler dans une balise <foreignObject/> à l’intérieur d’un fichier SVG.', '2020-10-15 00:00:00'),
(4, 1, 'Quill – L’éditeur WYSIWYG du futur', 'Si pour votre projet web, vous cherchez un éditeur de texte WYSIWYG qui soit compatible avec tous les navigateurs du marché (desktop et mobile), qui soit entièrement paramétrable et qu’on puisse étendre avec des modules spécifiques (coloration syntaxique, historique…etc.), j’ai ce qu’il vous faut.\r\n\r\nÇa s’appelle Quill et c’est un projet libre développé entièrement en JavaScript qui permet d’implémenter rapidement ce genre d’éditeur de texte riche, 100% personnalisable et disposant d’une API.\r\n\r\nQuill permet non seulement de disposer de tout ce qu’il faut en termes de formatage de texte (gras, italique, insertion d’images, passage en code HTML…etc.) mais également la possibilité d’une sauvegarde automatique, une compatibilité avec les formulaires, une hauteur d’éditeur adaptable à la longueur du texte, la possibilité d’ajouter des polices et des class / style personnalisés.', '2020-11-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Développement', 'Connaissez-vous la différence entre un bon et un mauvais codeur ? Le mauvais il code. Et le bon, il code et il lit Korben.info.'),
(2, 'Culture internet', 'Nous on a Internet. Les autres ont Hanouna.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
