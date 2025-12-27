-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 déc. 2025 à 00:32
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `ville`) VALUES
(1, 'Paris'),
(2, 'Lyon'),
(3, 'Marseille'),
(4, 'Toulouse'),
(5, 'Nice'),
(6, 'Nantes'),
(7, 'Strasbourg'),
(8, 'Montpellier'),
(9, 'Bordeaux'),
(10, 'Lille'),
(11, 'Rennes'),
(12, 'Reims');

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `telephone`, `mot_de_passe`, `role`, `password`) VALUES
(1, 'Martin', 'Alexandre', 'alexandre.martin@email.fr', '0612345678', '', 'USER', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1UwN/h6JAku'),
(2, 'Dubois', 'Sophie', 'sophie.dubois@email.fr', '0698765432', '', 'USER', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1UwN/h6JAku'),
(3, 'Bernard', 'Julien', 'julien.bernard@email.fr', '0622446688', '', 'USER', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1UwN/h6JAku'),
(4, 'Moreau', 'Camille', 'camille.moreau@email.fr', '0611223344', '', 'ADMIN', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1.'),
(5, 'Lefèvre', 'Lucie', 'lucie.lefevre@email.fr', '0777889900', '', 'ADMIN', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1.'),
(6, 'Leroy', 'Thomas', 'thomas.leroy@email.fr', '0655443322', '', 'ADMIN', '$2y$12$o32pWeQGbC.C/e8tDny.cOpTScit9fEWN7N/Ew/Kmj1.'),
(7, 'Roux', 'Chloé', 'chloe.roux@email.fr', '0633221199', '', 'USER', ''),
(8, 'Petit', 'Maxime', 'maxime.petit@email.fr', '0766778899', '', 'USER', ''),
(9, 'Garnier', 'Laura', 'laura.garnier@email.fr', '0688776655', '', 'USER', ''),
(10, 'Dupuis', 'Antoine', 'antoine.dupuis@email.fr', '0744556677', '', 'USER', ''),
(11, 'Lefebvre', 'Emma', 'emma.lefebvre@email.fr', '0699887766', '', 'USER', ''),
(12, 'Fontaine', 'Louis', 'louis.fontaine@email.fr', '0655667788', '', 'USER', ''),
(13, 'Chevalier', 'Clara', 'clara.chevalier@email.fr', '0788990011', '', 'USER', ''),
(14, 'Robin', 'Nicolas', 'nicolas.robin@email.fr', '0644332211', '', 'USER', ''),
(15, 'Gauthier', 'Marine', 'marine.gauthier@email.fr', '0677889922', '', 'USER', ''),
(16, 'Fournier', 'Pierre', 'pierre.fournier@email.fr', '0722334455', '', 'USER', ''),
(17, 'Girard', 'Sarah', 'sarah.girard@email.fr', '0688665544', '', 'USER', ''),
(18, 'Lambert', 'Hugo', 'hugo.lambert@email.fr', '0611223366', '', 'USER', ''),
(19, 'Masson', 'Julie', 'julie.masson@email.fr', '0733445566', '', 'USER', ''),
(20, 'Henry', 'Arthur', 'arthur.henry@email.fr', '0666554433', '', 'USER', '');

--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`id`, `ville_depart`, `ville_arrivee`, `date_trajet`, `places`, `prix`, `agence_id`, `employe_id`) VALUES
(2, 'Marseille', 'Nice', '2025-12-28', 2, 15.50, 3, 2),
(3, 'Toulouse', 'Bordeaux', '2025-12-27', 4, 18.00, 4, 3),
(10, 'Caen', 'Lyon', '2026-03-12', 3, 12.00, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
