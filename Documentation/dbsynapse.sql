-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 déc. 2021 à 13:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbsynapse`
--

-- --------------------------------------------------------

--
-- Structure de la table `tcomment`
--

DROP TABLE IF EXISTS `tcomment`;
CREATE TABLE IF NOT EXISTS `tcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_news` int(11) NOT NULL,
  `login_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_news` (`id_news`),
  KEY `login_user` (`login_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

DROP TABLE IF EXISTS `tnews`;
CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `login_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login_user` (`login_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`id`, `title`, `description`, `date`, `login_user`) VALUES
(1, 'Lorinane ', 'prends pas (trop) la conf non plus', '2021-12-12', 'Arn'),
(2, 'DDD', 'DEZDZ', '2021-11-04', 'Chpatata'),
(3, 'Testing News 3', 'THis is a testing news 3', '2021-12-15', 'Arn');

-- --------------------------------------------------------

--
-- Structure de la table `tnewsincludepicture`
--

DROP TABLE IF EXISTS `tnewsincludepicture`;
CREATE TABLE IF NOT EXISTS `tnewsincludepicture` (
  `id_news` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  PRIMARY KEY (`id_news`,`id_picture`),
  KEY `id_picture` (`id_picture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tpicture`
--

DROP TABLE IF EXISTS `tpicture`;
CREATE TABLE IF NOT EXISTS `tpicture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tpicture`
--

INSERT INTO `tpicture` (`id`, `uri`, `alt`) VALUES
(1, '/images/chpatata.png', 'image de chpatata'),
(2, '/pictures/arano', 'D2'),
(3, 'Views/Resources/Pictures/no_data_found.png', 'no_picture_given'),
(4, 'Views/Resources/Pictures/no_data_found.png', 'no_picture_given');

-- --------------------------------------------------------

--
-- Structure de la table `tuser`
--

DROP TABLE IF EXISTS `tuser`;
CREATE TABLE IF NOT EXISTS `tuser` (
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `id_picture` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `email` (`email`),
  KEY `id_picture` (`id_picture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tuser`
--

INSERT INTO `tuser` (`login`, `password`, `email`, `is_admin`, `id_picture`) VALUES
('Chpatata', 'chatonchaton', 'chpatata@gmail.com', 1, 1),
('Arn', 'chaton', 'a@a.a', 1, 1),
('Lorianeuh', 'Chpatata', 'adorable@cvrai.fr', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
