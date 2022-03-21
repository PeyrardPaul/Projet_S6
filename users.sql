-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 21 mars 2022 à 13:11
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_s6_indice_de_vie`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `code_dep` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `adresse_email` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `code_activation` varchar(50) NOT NULL,
  `code_reset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `code_dep`, `nom`, `prenom`, `pseudo`, `password`, `adresse_email`, `adresse`, `photo`, `type`, `code_activation`, `code_reset`) VALUES
(1, 10, 'hannebert', 'augustin', 'AU', 'mdp', 'mail@mail.fr', 'rue du truc ', 'ma_tete ', '1', '123', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `code_dep` (`code_dep`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`code_dep`) REFERENCES `departement` (`Département`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
