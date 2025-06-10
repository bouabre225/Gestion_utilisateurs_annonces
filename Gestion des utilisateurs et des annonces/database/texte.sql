-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 juin 2025 à 18:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `texte`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `image`, `date_creation`) VALUES
(5, 'Une Pomme', 'Une pomme est un fruit à pépins du pommier, généralement rond, de couleur et de saveur variables selon les espèces', './uploads/6846163f6d6f4.jpeg', '2025-06-09 00:01:19'),
(6, 'Une Fraise', 'Une fraise est un fruit rouge, souvent de forme conique ou arrondie, avec une peau lisse et une chair juteuse et sucrée. Elles sont le fruit du fraisier, une plante herbacée de la famille des Rosacées. ', './uploads/684616656f433.jpeg', '2025-06-09 00:01:57'),
(7, 'Une Pasteque', 'La pastèque est un gros fruit juteux, avec une peau verte rayée ou unie, et une chair rouge, rose ou jaune, selon les variétés. ', './uploads/6846168dcc4d1.jpeg', '2025-06-09 00:02:37'),
(8, 'Une Mangue', 'Une mangue est un fruit tropical sucré, souvent de forme ovale ou allongée, avec une peau qui peut être verte, rouge ou jaune selon la variété.', './uploads/684616bc12e98.jpeg', '2025-06-09 00:03:24'),
(9, 'Un Panier De Fruit', 'Un panier de fruits est une corbeille contenant une variété de fruits, souvent utilisés pour être offerts en cadeau ou pour être dégustés comme un en-cas', './uploads/684616f8a505e.jpeg', '2025-06-09 00:04:24'),
(10, 'Un Ananas', 'L\'ananas est un gros fruit tropical à écorce écailleuse et de couleur variable (vert, jaune, marron, rose), surmonté d\'une couronne de feuilles vertes.', './uploads/684617178fe93.jpeg', '2025-06-09 00:04:55');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `created_at`, `remember_token`) VALUES
(33, 'ITACHI', 'azerty', 'a@gmail.com', '$2y$10$Iw8', '2025-06-05 23:37:48', ''),
(36, 'luc', 'luc', 'a@gmail.com', '$2y$10$eTO', '2025-06-05 23:37:48', ''),
(37, 'ITACHI', 'luc', 'ce463@gmail.com', '$2y$10$cOF', '2025-06-08 22:07:41', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
