-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 oct. 2023 à 14:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beautyfashion_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique_pwd`
--

DROP TABLE IF EXISTS `historique_pwd`;
CREATE TABLE IF NOT EXISTS `historique_pwd` (
  `id_pwd_history` int NOT NULL AUTO_INCREMENT,
  `date_history` datetime NOT NULL,
  `user_id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pwd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pwd_history`),
  KEY `foreignkey` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique_pwd`
--

INSERT INTO `historique_pwd` (`id_pwd_history`, `date_history`, `user_id`, `full_name`, `user_pwd`) VALUES
(1, '2023-07-30 15:58:13', 1, 'Tohouri Henoc Desire', 'D17F25ECFBCC7857F7BEBEA469308BE0B2580943E96D13A3AD98A13675C4BFC2'),
(2, '2023-07-30 15:58:49', 1, 'Tohouri Henoc Desire', 'AF41E68E1309FA29A5044CBDC36B90A3821D8807E68C7675A6C495112BC8A55F'),
(3, '2023-07-31 21:42:12', 1, 'Tohouri Henoc Desire', 'D17F25ECFBCC7857F7BEBEA469308BE0B2580943E96D13A3AD98A13675C4BFC2'),
(4, '2023-08-02 12:53:22', 1, 'Tohouri Henoc Desire', '94EDF28C6D6DA38FD35D7AD53E485307F89FBEAF120485C8D17A43F323DEEE71');

-- --------------------------------------------------------

--
-- Structure de la table `month`
--

DROP TABLE IF EXISTS `month`;
CREATE TABLE IF NOT EXISTS `month` (
  `month_id` int NOT NULL AUTO_INCREMENT,
  `month_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `month`
--

INSERT INTO `month` (`month_id`, `month_name`) VALUES
(1, 'Janvier'),
(2, 'Février'),
(3, 'Mars'),
(4, 'Avril'),
(5, 'Mai'),
(6, 'Juin'),
(7, 'Juillet'),
(8, 'Août'),
(9, 'Septembre'),
(10, 'Octobre'),
(11, 'Novembre'),
(12, 'Décembre');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `date_achat` date NOT NULL,
  `total` int NOT NULL,
  `quantité_article` int NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `id_produit`, `date_achat`, `total`, `quantité_article`, `update_at`) VALUES
(19, 2, '2023-10-26', 300, 3, '2023-10-02 15:15:50'),
(20, 2, '2023-10-02', 500, 5, '2023-10-02 17:12:56');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantité` int NOT NULL,
  `image_produit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix_unitaire` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `quantité`, `image_produit`, `prix_unitaire`, `update_at`) VALUES
(1, 'sac à dos homme noir ', 100, 'http://localhost/beautyfashion/public/uploads/1691594071_2a207df39728f087dfc1.jpeg', '100', '2023-09-27 18:26:31'),
(2, 'djelaba homme', 193, 'http://localhost/beautyfashion/public/uploads/1691766352_02d707f7f5b8e376488f.jpg', '200', '2023-09-27 18:26:31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pwd` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd_modification_flag` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO',
  `full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'INACTIVE',
  `user_adress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `activation_token` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `activation_time` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pwd`, `pwd_modification_flag`, `full_name`, `user_email`, `user_number`, `user_status`, `user_adress`, `level`, `code`, `token`, `updated_at`, `activation_token`, `activation_time`) VALUES
(3, 'admin', 'C507A68F3093E885765257ED3F176C757AAF62BB4CBC2EF94B2E7DA3406D9676', 'NO', 'm&#39;voubou m&#39;voubou dielvick', 'syntichemvoubou@gmail.com', '', 'ACTIVE', '', 'admin', 'aa686f', '425d97449b8de88d83a6aa31f2ea51e18b7659b2b1bb289fd0e88425633f', '2023-08-20 17:55:33', '', '0000-00-00 00:00:00'),
(25, 'henoc', 'D17F25ECFBCC7857F7BEBEA469308BE0B2580943E96D13A3AD98A13675C4BFC2', 'NO', '', 'henocdesiretohouri@gmail.com', '', 'ACTIVE', '', 'user', '', '', '0000-00-00 00:00:00', '7b7ee0e080ba5b52100ef6957454e2cf9c542e3aabbfe46d16a4db4f1f3b', '2023-10-03 14:34:49');

--
-- Déclencheurs `users`
--
DROP TRIGGER IF EXISTS `historisation_mot_de_passe`;
DELIMITER $$
CREATE TRIGGER `historisation_mot_de_passe` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    IF NEW.user_pwd <> OLD.user_pwd THEN
        INSERT INTO historique_pwd (user_id, date_history, full_name, user_pwd  )
        VALUES ( OLD.user_id, CURRENT_TIMESTAMP, OLD.full_name, OLD.user_pwd  );
    END IF ;
END
$$
DELIMITER ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique_pwd`
--
ALTER TABLE `historique_pwd`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`user_id`) REFERENCES `historique_pwd` (`id_pwd_history`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
