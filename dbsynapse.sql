-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 15:00
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
(6, '2021-01-12 12:42:00', 'Thank you very much', 1, 'Loriane'),
(8, '2022-01-05 14:16:00', 'amazing !', 1, 'Arnaud');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tnews`
--

INSERT INTO `tnews` (`id`, `title`, `description`, `date`, `login_user`) VALUES
(1, 'Interpretable CNN for ischemic stroke', 'Methods :\r\nTo simulate the diagnosis process of neurologists, we drop the valueless features by XGB algorithm and rank the remaining ones. Utilizing active learning framework, we propose a novel causal CNN, in which it combines with a mixed active selection criterion to optimize the uncertainty of samples adaptively. Meanwhile, KL-focal loss derived from the enhancement of Focal loss by KL regularization is introduced to accelerate the iterative fine-tuning of the model.\r\nResults :\r\nTo evaluate the proposed method, we construct a dataset which consists of totally 2310 patients. In a series of sequential experiments, we verify the effectiveness of each contribution by different evaluation metrics. Experimental results show that the proposed method achieves competitive results on each evaluation metric. In this task, the improvement of AUC is the most obvious, reaching 77.4.', '2021-12-01', 'Arnaud'),
(2, 'Comparing machine learning algorithms for predicting COVID-19 mortality', 'Background :\r\n\r\nThe coronavirus disease (COVID-19) hospitalized patients are always at risk of death. Machine learning (ML) algorithms can be used as a potential solution for predicting mortality in COVID-19 hospitalized patients. So, our study aimed to compare several ML algorithms to predict the COVID-19 mortality using the patient’s data at the first time of admission and choose the best performing algorithm as a predictive tool for decision-making.\r\nMethods :\r\n\r\nIn this study, after feature selection, based on the confirmed predictors, information about 1500 eligible patients (1386 survivors and 144 deaths) obtained from the registry of Ayatollah Taleghani Hospital, Abadan city, Iran, was extracted. Afterwards, several ML algorithms were trained to predict COVID-19 mortality. Finally, to assess the models’ performance, the metrics derived from the confusion matrix were calculated.', '2022-01-04', 'Loriane'),
(3, 'Level and contributing factors of health data quality', 'Background :\r\n\r\nThe health management information system has been implemented at all levels of healthcare delivery to ensure quality data production and information use in Ethiopia. Including the capacity-building activities and provision of infrastructure, various efforts have been made to improve the production and use of quality health data though the result is still unsatisfactory. This study aimed to examine the quality of health data and use in Wogera and Tach-Armacheho districts and understand its barriers and facilitators.\r\nMethods :\r\n\r\nThe study utilized a mixed-method; for the quantitative approach, institution-based cross-sectional study was conducted to determine the quality of health data and use by 95 departments in the two districts. The qualitative approach involved 16 in-depth interviewees from Wogera district. A descriptive Phenomenological design was used to explore factors influencing the quality and use of health data. The quantitative data were expressed descriptively with tables, graphs, and percent whereas the qualitative data were analyzed with content analysis guided by the social-ecological model framework.', '2021-12-31', 'Loriane'),
(4, 'Multi-task learning for Chinese clinical', 'Background :\r\n\r\nNamed entity recognition (NER) on Chinese electronic medical/healthcare records has attracted significantly attentions as it can be applied to building applications to understand these records. Most previous methods have been purely data-driven, requiring high-quality and large-scale labeled medical data. However, labeled data is expensive to obtain, and these data-driven methods are difficult to handle rare and unseen entities.\r\nMethods :\r\n\r\nTo tackle these problems, this study presents a novel multi-task deep neural network model for Chinese NER in the medical domain. We incorporate dictionary features into neural networks, and a general secondary named entity segmentation is used as auxiliary task to improve the performance of the primary task of named entity recognition.', '2021-12-31', 'Arnaud'),
(5, 'Document-level medical relation extraction', 'Objective :\r\n\r\nRelation extraction (RE) is a fundamental task of natural language processing, which always draws plenty of attention from researchers, especially RE at the document-level. We aim to explore an effective novel method for document-level medical relation extraction.\r\nMethods :\r\n\r\nWe propose a novel edge-oriented graph neural network based on document structure and external knowledge for document-level medical RE, called SKEoG. This network has the ability to take full advantage of document structure and external knowledge.', '2021-12-30', 'Baptiste'),
(6, 'Ontological modeling of the International Classification of Functioning,', 'Background :\r\n\r\nThe International Classification of Functioning, Disability and Health (ICF) is a classification of health and health-related states developed by the World Health Organization (WHO) to provide a standard and unified language to be used as a reference model for the description of health and health-related states. The concept of functioning on which ICF is based is that of a “dynamic interaction between a person’s health condition, environmental factors and personal factors”. This overall model has been translated into a classification covering all the main components of functioning. However, the practical use of ICF has highlighted some formal problems, mainly concerning conceptual clarity and ontological coherence.\r\nMethods :\r\n\r\nIn the present work, we propose an initial ontological formalization of ICF beyond its current status, focusing specifically on the interaction between activities and participation and environmental factors. The formalization has been based on ontology engineering methods to drive goal and scope definition, knowledge acquisition, selection of an upper ontology for mapping, conceptual model definition and evaluation, and finally representation using the Ontology Web Language (OWL).', '2021-12-29', 'Arnaud'),
(7, 'Exploring the perspectives of primary care providers', 'Background :\r\n\r\nDigital health technologies can support primary care delivery, but clinical uptake in primary care is limited. This study explores enablers and barriers experienced by primary care providers when adopting new digital health technologies, using the example of the electronic Patient Reported Outcome (ePRO) tool; a mobile application and web portal designed to support goal-oriented care. To better understand implementation drivers and barriers primary care providers’ usage behaviours are compared to their perspectives on ePRO utility and fit to support care for patients with complex care needs.\r\nMethods :\r\n\r\nThis qualitative sub-analysis was part of a larger trial evaluating the use of the ePRO tool in primary care. Qualitative interviews were conducted with providers at the midpoint (i.e. 4.5–6 months after ePRO implementation) and end-point (i.e. 9–12 months after ePRO implementation) of the trial. Interviews explored providers’ experiences and perceptions of integrating the tool within their clinical practice. Interview data were analyzed using a hybrid thematic analysis and guided by the Technology Acceptance Model. Data from thirteen providers from three distinct primary care sites were included in the presented study.', '2021-12-29', 'Arnaud');

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
(1, 11),
(2, 9),
(3, 10),
(4, 6),
(5, 1),
(6, 7),
(7, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'tubes.jpg', 'tubing'),
(9, 'brain.jpg', 'braining'),
(10, 'robot.jpg', 'reboting'),
(11, 'netron.jpg', 'netroning');

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
