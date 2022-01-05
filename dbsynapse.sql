-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 14:42
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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

--
-- Déchargement des données de la table `tcomment`
--

INSERT INTO `tcomment` (`id`, `date`, `content`, `id_news`, `login_user`) VALUES
(6, '2021-01-12 12:42:00', 'cezca', 1, 'Arnaud'),
(8, '2022-01-05 14:16:00', 'amazing !', 1, 'Arnaud'),
(7, '2022-01-05 13:43:00', 'ceci est un commentaire', 1, 'Arnaud');

-- --------------------------------------------------------

--
-- Structure de la table `tnews`
--

DROP TABLE IF EXISTS `tnews`;
CREATE TABLE IF NOT EXISTS `tnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Interpretable CNN for ischemic stroke', 'Methods :\r\nTo simulate the diagnosis process of neurologists, we drop the valueless features by XGB algorithm and rank the remaining ones. Utilizing active learning framework, we propose a novel causal CNN, in which it combines with a mixed active selection criterion to optimize the uncertainty of samples adaptively. Meanwhile, KL-focal loss derived from the enhancement of Focal loss by KL regularization is introduced to accelerate the iterative fine-tuning of the model.\r\nResults :\r\nTo evaluate the proposed method, we construct a dataset which consists of totally 2310 patients. In a series of sequential experiments, we verify the effectiveness of each contribution by different evaluation metrics. Experimental results show that the proposed method achieves competitive results on each evaluation metric. In this task, the improvement of AUC is the most obvious, reaching 77.4.', '2021-12-01', 'Arnaud'),
(2, 'Comparing machine learning algorithms for predicting COVID-19 mortality', 'Background :\r\n\r\nThe coronavirus disease (COVID-19) hospitalized patients are always at risk of death. Machine learning (ML) algorithms can be used as a potential solution for predicting mortality in COVID-19 hospitalized patients. So, our study aimed to compare several ML algorithms to predict the COVID-19 mortality using the patient’s data at the first time of admission and choose the best performing algorithm as a predictive tool for decision-making.\r\nMethods :\r\n\r\nIn this study, after feature selection, based on the confirmed predictors, information about 1500 eligible patients (1386 survivors and 144 deaths) obtained from the registry of Ayatollah Taleghani Hospital, Abadan city, Iran, was extracted. Afterwards, several ML algorithms were trained to predict COVID-19 mortality. Finally, to assess the models’ performance, the metrics derived from the confusion matrix were calculated.', '2022-01-04', 'Loriane');

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

--
-- Déchargement des données de la table `tnewsincludepicture`
--

INSERT INTO `tnewsincludepicture` (`id_news`, `id_picture`) VALUES
(1, 5),
(2, 6),
(3, 7);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tpicture`
--

INSERT INTO `tpicture` (`id`, `uri`, `alt`) VALUES
(2, 'microscope.jpeg', 'microscoping'),
(3, 'Views/Resources/Pictures/no_data_found.png', 'no_picture_given'),
(4, 'Views/Resources/Pictures/no_data_found.png', 'no_picture_given'),
(5, 'omar_sy.jpg', 'Picture of Omar SY the French BG'),
(1, 'measure.jpg', 'measuring'),
(8, 'simple_avatar.png', 'default avatar picture'),
(6, 'research.jpg', 'researching'),
(7, 'tubes.jpg', 'tubing');

-- --------------------------------------------------------

--
-- Structure de la table `tuser`
--

DROP TABLE IF EXISTS `tuser`;
CREATE TABLE IF NOT EXISTS `tuser` (
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('Loriane', '$2y$10$jiNL2KD8bAzEtaG5qWsCBOM/AR/fyr4cOlXJY.SpF0m34bm4FDD7.', 'loriane.lhostis@email.com', 1, 8),
('Arnaud', '$2y$10$p5v5ksFhHKtF6SuVrg2CP.YhDyQ0dmY6.fPfap6AsUALofkzMlXby', 'arnaud.allemand@email.com', 1, 8),
('Baptiste', '$2y$10$aWztToneaS30GMN/846RgOWDmy1bGGfdmNghozbBR9UWsSgA0pkcu', 'baptiste.foucras@email.com', 0, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
