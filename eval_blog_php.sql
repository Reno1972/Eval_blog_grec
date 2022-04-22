-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 avr. 2022 à 08:45
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
-- Base de données : `eval_blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre_article` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `image_article` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `text_article` text COLLATE utf8_unicode_520_ci NOT NULL,
  `date_heure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre_article`, `image_article`, `text_article`, `date_heure`) VALUES
(6, 'Adès', 'hades.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, hic! Soluta labore reprehenderit excepturi mollitia quis quia earum maxime repellendus, ipsa autem, quo assumenda corporis dolor rem laudantium. Voluptatibus, provident.', '2022-04-20 16:34:07'),
(5, 'Poseidon', 'poseidon.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, hic! Soluta labore reprehenderit excepturi mollitia quis quia earum maxime repellendus, ipsa autem, quo assumenda corporis dolor rem laudantium. Voluptatibus, provident.', '2022-04-20 15:57:23'),
(8, 'Zeus', 'zeus.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, hic! Soluta labore reprehenderit excepturi mollitia quis quia earum maxime repellendus, ipsa autem, quo assumenda corporis dolor rem laudantium. Voluptatibus, provident.', '2022-04-21 10:06:46');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_520_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `password`, `role`) VALUES
(1, 'Jean', '$2y$10$V899qrn206NSRRhrGVXLGOQaDbrNOkRyiwFkPERI281TMtdqPabeO', 'admin'),
(3, 'Reno', '$2y$10$mxMF1Ox50/o7XG9wCSeUhOIkMP3gS7YPGKwd3KiuJZe080u7uU.fG', 'user'),
(4, 'Machin', '$2y$10$rdXffswZ5FbXe5G9477CLOv90K6kVjiCIwQS2r2iUVtQnhzENfjai', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
