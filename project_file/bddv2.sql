-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 sep. 2021 à 11:54
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
-- Base de données : `esport`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ARTICLE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ARTICLE_TITLE` char(100) DEFAULT NULL,
  `ARTICLE_DATE` date DEFAULT NULL,
  `ARTICLE_TYPE` char(50) DEFAULT NULL,
  `ARTICLE_LINK` char(200) DEFAULT NULL,
  `ARTICLE_IMAGE` char(200) DEFAULT NULL,
  `ARTICLE_DESC` char(200) DEFAULT NULL,
  `ARTICLE_AUTHOR` char(100) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ARTICLE_ID`),
  KEY `FK_article_USER_ID` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `defaultlogo`
--

DROP TABLE IF EXISTS `defaultlogo`;
CREATE TABLE IF NOT EXISTS `defaultlogo` (
  `DEFAULTLOGO_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `DEFAULTLOGO_NAME` char(50) DEFAULT NULL,
  PRIMARY KEY (`DEFAULTLOGO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `defaultlogo`
--

INSERT INTO `defaultlogo` (`DEFAULTLOGO_ID`, `DEFAULTLOGO_NAME`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Structure de la table `maps`
--

DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `MAPS_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MAPS_NAME` char(50) DEFAULT NULL,
  PRIMARY KEY (`MAPS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maps`
--

INSERT INTO `maps` (`MAPS_ID`, `MAPS_NAME`) VALUES
(1, 'Al Marj'),
(2, 'Provence'),
(3, 'Lofoten'),
(4, 'Underground'),
(5, 'Devastation'),
(6, 'Rotterdam');

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

DROP TABLE IF EXISTS `matches`;
CREATE TABLE IF NOT EXISTS `matches` (
  `MATCH_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MATCH_DATE` date DEFAULT NULL,
  `MATCH_LINK_VOD` char(200) DEFAULT NULL,
  `TOURNAMENT_ID` bigint(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  `TEAM1_ID` int(11) DEFAULT NULL,
  `TEAM2_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`MATCH_ID`),
  KEY `FK_matches_USER_ID` (`USER_ID`),
  KEY `FK_matches_tournament_tournament_id` (`TOURNAMENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matches`
--

INSERT INTO `matches` (`MATCH_ID`, `MATCH_DATE`, `MATCH_LINK_VOD`, `TOURNAMENT_ID`, `USER_ID`, `TEAM1_ID`, `TEAM2_ID`) VALUES
(18, '2021-09-01', 'https://www.youtube.com/watch?v=LrnR9tlF1Hg', 1, 1, 1, 1),
(19, '2021-09-03', 'https://www.twitch.tv/ofcunderground', 1, 1, 1, 1),
(20, '2021-09-22', 'https://www.twitch.tv/ofcunderground', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matches_score`
--

DROP TABLE IF EXISTS `matches_score`;
CREATE TABLE IF NOT EXISTS `matches_score` (
  `SCORE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `SCORE_TEAM1` char(50) DEFAULT NULL,
  `SCORE_TEAM2` char(50) DEFAULT NULL,
  `MAPS_ID` bigint(20) DEFAULT NULL,
  `MATCH_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SCORE_ID`),
  KEY `FK_matches_score_MAPS_ID` (`MAPS_ID`),
  KEY `FK_matches_score_matches_matches_id` (`MATCH_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matches_score`
--

INSERT INTO `matches_score` (`SCORE_ID`, `SCORE_TEAM1`, `SCORE_TEAM2`, `MAPS_ID`, `MATCH_ID`) VALUES
(21, '55', '0', 1, 18),
(22, '0', '26', 2, 18),
(23, '12', '0', 3, 18),
(24, '0', '66', 3, 19),
(25, '22', '0', 2, 19),
(26, '0', '21', 1, 19),
(27, '33', '0', 1, 20),
(28, '21', '0', 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `PLAYER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PLAYER_NAME` char(50) DEFAULT NULL,
  `TEAM_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PLAYER_ID`),
  KEY `TEAM_ID` (`TEAM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `PROFIL_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PROFIL_LOGO` char(200) DEFAULT NULL,
  `PROFIL_HEADER` char(200) DEFAULT NULL,
  `PROFIL_ORIGIN_ID` char(100) DEFAULT NULL,
  `PROFIL_TWITTER` char(200) DEFAULT NULL,
  `PROFIL_YOUTUBE` char(200) DEFAULT NULL,
  `PROFIL_TWITCH` char(200) DEFAULT NULL,
  `user_user_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PROFIL_ID`),
  KEY `FK_profil_user_user_id` (`user_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE IF NOT EXISTS `proposal` (
  `PROPOSAL_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PROPOSAL_TITLE` char(200) DEFAULT NULL,
  `PROPOSAL_DESC` char(1) DEFAULT NULL,
  `PROPOSAL_LINK` char(1) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PROPOSAL_ID`),
  KEY `FK_proposal_USER_ID` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `STATUS_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `STATUS_ROLE` char(50) DEFAULT NULL,
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`STATUS_ID`, `STATUS_ROLE`) VALUES
(1, 'visiteur'),
(2, 'joueur'),
(3, 'modérateur'),
(4, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `TEAM_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TEAM_NAME` char(50) DEFAULT NULL,
  `TEAM_LOGO` char(100) DEFAULT NULL,
  `TEAM_COUNTRY` char(50) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  `TEAM_SHORTNAME` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`TEAM_ID`),
  KEY `FK_teams_USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`TEAM_ID`, `TEAM_NAME`, `TEAM_LOGO`, `TEAM_COUNTRY`, `USER_ID`, `TEAM_SHORTNAME`) VALUES
(1, 'DAW esport', 'daw.png', 'EU', 1, 'DAW');

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `TOURNAMENT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TOURNAMENT_NAME` char(50) DEFAULT NULL,
  `TOURNAMENT_LOGO` char(50) DEFAULT NULL,
  `TOURNAMENT_FORMAT` char(100) DEFAULT NULL,
  `TOURNAMENT_START` date DEFAULT NULL,
  `TOURNAMENT_STATUS` char(50) DEFAULT NULL,
  `TOURNAMENT_LINK` char(200) DEFAULT NULL,
  `TEAM_ID` bigint(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`TOURNAMENT_ID`),
  KEY `FK_tournament_USER_ID` (`USER_ID`),
  KEY `FK_tournament_teams_teams_id` (`TEAM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tournament`
--

INSERT INTO `tournament` (`TOURNAMENT_ID`, `TOURNAMENT_NAME`, `TOURNAMENT_LOGO`, `TOURNAMENT_FORMAT`, `TOURNAMENT_START`, `TOURNAMENT_STATUS`, `TOURNAMENT_LINK`, `TEAM_ID`, `USER_ID`) VALUES
(1, 'SCRIM', 'gdfgd', 'gdfg', '2021-05-25', 'sdfds', 'fsfs', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_USERNAME` char(50) DEFAULT NULL,
  `USER_MAIL` char(200) DEFAULT NULL,
  `USER_PASSWORD` char(200) DEFAULT NULL,
  `USER_LOGO` char(200) DEFAULT NULL,
  `USER_HEADER` char(200) DEFAULT NULL,
  `USER_ORIGIN_ID` char(100) DEFAULT NULL,
  `USER_TWITTER` char(200) DEFAULT NULL,
  `USER_YOUTUBE` char(200) DEFAULT NULL,
  `USER_TWITCH` char(200) DEFAULT NULL,
  `STATUS_ID` bigint(20) DEFAULT NULL,
  `DEFAULTLOGO_ID` bigint(20) DEFAULT NULL,
  `USER_TOKEN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `FK_user_STATUS_ID` (`STATUS_ID`),
  KEY `FK_user_DEFAULTLOGO_ID` (`DEFAULTLOGO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_USERNAME`, `USER_MAIL`, `USER_PASSWORD`, `USER_LOGO`, `USER_HEADER`, `USER_ORIGIN_ID`, `USER_TWITTER`, `USER_YOUTUBE`, `USER_TWITCH`, `STATUS_ID`, `DEFAULTLOGO_ID`, `USER_TOKEN`) VALUES
(1, 'Hohnn', 'jean-bateee@hotmail.fr', '$2y$10$uJBhzLIVMmxAWtMYl7CmR.e7hFisbQ4hxI07K8VnG/sXXoFiqffna', 'Hohnn6128e69accf86.png', NULL, 'Hohnn', 'https://twitter.com/HohenJ', 'https://www.youtube.com/channel/UCMZuXjc-W3Kb-e89_wR1xlw', '', 4, 3, NULL),
(4, 'demo', 'demo@gmail.com', '$2y$10$UfgDP4cA3LUVotzChLk2ye5mD1MbHcgZaWhIDqtJXgsWcnnNzBiBG', NULL, NULL, 'Hohnn', '', '', '', 1, 1, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `FK_matches_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_matches_tournament_tournament_id` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tournament` (`TOURNAMENT_ID`);

--
-- Contraintes pour la table `matches_score`
--
ALTER TABLE `matches_score`
  ADD CONSTRAINT `FK_matches_score_MAPS_ID` FOREIGN KEY (`MAPS_ID`) REFERENCES `maps` (`MAPS_ID`),
  ADD CONSTRAINT `FK_matches_score_matches_matches_id` FOREIGN KEY (`MATCH_ID`) REFERENCES `matches` (`MATCH_ID`);

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`TEAM_ID`) REFERENCES `teams` (`TEAM_ID`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_profil_user_user_id` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `FK_proposal_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `FK_teams_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `FK_tournament_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_tournament_teams_teams_id` FOREIGN KEY (`TEAM_ID`) REFERENCES `teams` (`TEAM_ID`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_DEFAULTLOGO_ID` FOREIGN KEY (`DEFAULTLOGO_ID`) REFERENCES `defaultlogo` (`DEFAULTLOGO_ID`),
  ADD CONSTRAINT `FK_user_STATUS_ID` FOREIGN KEY (`STATUS_ID`) REFERENCES `status` (`STATUS_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
