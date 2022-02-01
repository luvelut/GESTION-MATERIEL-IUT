-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 01 fév. 2022 à 16:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `label`) VALUES
(5, 'Photos'),
(6, 'Vidéos'),
(8, 'string');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211207131308', '2021-12-08 17:09:40', 644),
('DoctrineMigrations\\Version20211207133305', '2021-12-08 17:09:41', 34),
('DoctrineMigrations\\Version20211207140413', '2021-12-08 17:09:41', 115),
('DoctrineMigrations\\Version20211208131943', '2021-12-08 17:09:41', 200),
('DoctrineMigrations\\Version20211208163625', '2021-12-08 17:09:41', 112);

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`id`, `label`) VALUES
(4, 'Licence professionnelle'),
(5, 'DUT MMI');

-- --------------------------------------------------------

--
-- Structure de la table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `finished_at` datetime NOT NULL,
  `returned_at` datetime DEFAULT NULL,
  `ressource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C5D30D03FC6CD52A` (`ressource_id`),
  KEY `IDX_C5D30D03A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loan`
--

INSERT INTO `loan` (`id`, `created_at`, `finished_at`, `returned_at`, `ressource_id`, `user_id`) VALUES
(3, '2021-12-15 14:33:27', '2021-12-16 00:00:00', '2021-12-15 17:33:00', 6, 5),
(4, '2021-12-15 16:31:00', '2021-12-17 16:31:00', NULL, 6, 5),
(5, '2021-12-16 17:01:00', '2021-12-18 17:01:00', NULL, 9, 6),
(6, '2021-12-15 17:02:00', '2021-12-24 17:02:00', NULL, 6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
CREATE TABLE IF NOT EXISTS `ressource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quantity_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`id`, `label`, `image`, `description`, `quantity_total`) VALUES
(6, 'Caméra', NULL, NULL, NULL),
(7, 'Trépied caméra', NULL, NULL, NULL),
(8, 'Micro', NULL, NULL, NULL),
(9, 'Ordinateur', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ressource_category`
--

DROP TABLE IF EXISTS `ressource_category`;
CREATE TABLE IF NOT EXISTS `ressource_category` (
  `ressource_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`ressource_id`,`category_id`),
  KEY `IDX_48FDA01BFC6CD52A` (`ressource_id`),
  KEY `IDX_48FDA01B12469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ressource_category`
--

INSERT INTO `ressource_category` (`ressource_id`, `category_id`) VALUES
(9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ressource_group`
--

DROP TABLE IF EXISTS `ressource_group`;
CREATE TABLE IF NOT EXISTS `ressource_group` (
  `ressource_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`ressource_id`,`group_id`),
  KEY `IDX_F954C041FC6CD52A` (`ressource_id`),
  KEY `IDX_F954C041FE54D947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ressource_group`
--

INSERT INTO `ressource_group` (`ressource_id`, `group_id`) VALUES
(9, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D649FE54D947` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `roles`, `group_id`) VALUES
(5, 'Lucile', 'Velut', 'lucilevelut@orange.fr', '$2y$10$H3y2.bxiQjGvo3YBCHA8N.NzrRW/S9R0dHF/Q2rl4yBF4Uf53e6aS', 'a:0:{}', 4),
(6, 'Anthony', 'Devoize', 'anthony.devoize@gmail.com', 'test', 'a:0:{}', 4),
(7, 'Elise', 'Gigot', 'elise@gmail.com', 'test', 'a:0:{}', 4),
(8, 'Getoar', 'Limani', 'getoa@gmail.com', '$2y$10$ezYnKuTsgmZRLARzatV10u8sZ99OWB52E3t3D8NAshraNeA9t1lfe', 'a:0:{}', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `FK_C5D30D03A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C5D30D03FC6CD52A` FOREIGN KEY (`ressource_id`) REFERENCES `ressource` (`id`);

--
-- Contraintes pour la table `ressource_category`
--
ALTER TABLE `ressource_category`
  ADD CONSTRAINT `FK_48FDA01B12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_48FDA01BFC6CD52A` FOREIGN KEY (`ressource_id`) REFERENCES `ressource` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ressource_group`
--
ALTER TABLE `ressource_group`
  ADD CONSTRAINT `FK_F954C041FC6CD52A` FOREIGN KEY (`ressource_id`) REFERENCES `ressource` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F954C041FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
