-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 jan. 2024 à 17:45
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
-- Base de données : `footing_club`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `code`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'DA1', 'DÃ©veloppement abdominal', '2023-12-29 21:33:41', '2023-12-31 20:15:52'),
(3, 'FS2', 'Footing santÃ©', '2023-12-31 18:33:12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`telephone`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 'Alissou', '+22966829885', 'alialissou24@gmail.com', '0777662189', '2024-01-02 16:12:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `educateurs`
--

DROP TABLE IF EXISTS `educateurs`;
CREATE TABLE IF NOT EXISTS `educateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `licencie_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `licencie_id` (`licencie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `educateurs`
--

INSERT INTO `educateurs` (`id`, `email`, `password`, `role`, `licencie_id`, `created_at`, `updated_at`) VALUES
(3, 'ibrahimnabil@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 1, 4, '2024-01-03 00:13:28', NULL),
(2, 'saccayarou@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 0, 3, '2024-01-02 23:59:46', NULL),
(6, 'ibrahimnabil@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 1, 7, '2024-01-03 11:55:57', NULL),
(5, 'alialissou@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 1, 6, '2024-01-03 02:40:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `licencies`
--

DROP TABLE IF EXISTS `licencies`;
CREATE TABLE IF NOT EXISTS `licencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licence` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`),
  KEY `contact_id` (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `licencies`
--

INSERT INTO `licencies` (`id`, `licence`, `nom`, `prenom`, `categorie_id`, `contact_id`, `created_at`, `updated_at`) VALUES
(4, '14211117', 'IBRAHIM', 'NABIL', 3, 1, '2024-01-03 00:13:28', NULL),
(3, '12141512', 'SACCA', 'NABIL', 1, 1, '2024-01-02 23:59:46', NULL),
(7, '124576', 'IBRAHIM', 'NABIL', 3, 1, '2024-01-03 11:55:57', NULL),
(6, '14211119', 'Alissou', 'ALI', 3, 1, '2024-01-03 02:40:05', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
