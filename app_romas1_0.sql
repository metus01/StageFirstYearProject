-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 30 mai 2023 à 21:38
-- Version du serveur : 8.0.33-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app_romas1.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_academique`
--

CREATE TABLE `annee_academique` (
  `id_an` int NOT NULL,
  `annee` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annee_academique`
--

INSERT INTO `annee_academique` (`id_an`, `annee`) VALUES
(1, '2021-2022'),
(2, '2019-2020');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `matricule` int NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `annee` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenoms`, `matricule`, `filiere`, `annee`) VALUES
(1, 'DONCOSSY', 'Saïd', 10195322, 'Informatique de gestion', '2019-2020'),
(2, 'eifueufye', 'eufefgeèfye_', 2566246, 'Statistiques de gestion', '2021-2022'),
(3, 'mathématiques', 'Analyse', 2566246, 'Informatique de gestion', '2021-2022'),
(4, 'CAPO CHICHI', 'Euvince', 125542264, 'Informatique de gestion', '2021-2022'),
(5, 'CAPO CHICHI', 'Euvince', 125542264, 'Informatique de gestion', '2021-2022'),
(6, 'CAPO CHICHI', 'Euvince', 125542264, 'Statistiques de gestion', '2021-2022'),
(7, 'CAPO CHICHI', 'Euvince', 125542264, 'Statistiques de gestion', '2021-2022'),
(8, 'CAPO CHICHI', 'Euvince', 125542264, 'Informatique de gestion', '2021-2022'),
(9, 'CAPO CHICHI', 'Euvince', 26459498, 'Statistiques de gestion', '2021-2022'),
(10, 'CAPO CHICHI', 'Euvince', 26459498, 'Statistiques de gestion', '2021-2022'),
(11, 'CAPO CHICHI', 'Euvince', 26459498, 'Informatique de gestion', '2021-2022'),
(12, '2', 'Algorithme', 26459498, 'Statistiques de gestion', '2021-2022'),
(13, 'CAPO CHICHI', 'Euvince', 26459498, 'Informatique de gestion', '2021-2022');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_fil` int NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_fil`, `nom`) VALUES
(1, 'Statistiques de gestion'),
(2, 'Informatique de gestion');

-- --------------------------------------------------------

--
-- Structure de la table `filiere_matiere`
--

CREATE TABLE `filiere_matiere` (
  `id_fil_mat` int NOT NULL,
  `id_fil` int NOT NULL,
  `id_mat` int NOT NULL,
  `credit` int NOT NULL,
  `masse` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `filiere_matiere`
--

INSERT INTO `filiere_matiere` (`id_fil_mat`, `id_fil`, `id_mat`, `credit`, `masse`) VALUES
(1, 1, 1, 5, 50),
(2, 1, 1, 4, 60),
(3, 2, 1, 5, 40),
(4, 2, 4, 3, 30),
(5, 2, 5, 4, 40),
(6, 2, 5, 4, 60),
(7, 2, 8, 2, 20),
(8, 2, 9, 1, 10),
(9, 2, 10, 115, 55);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id_mat` int NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id_mat`, `nom`) VALUES
(1, 'Analyse mathematiques'),
(2, 'mathematiques'),
(8, ',nbhjvjhv'),
(4, 'Web design'),
(5, 'C++'),
(9, 'gcfxtrxrtx'),
(10, 'hgyf-ftdtd('),
(11, 'tdrdrdtdt'),
(12, 'htdtrststrstsrs');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_notes` int NOT NULL,
  `id_etudiant` int NOT NULL,
  `id_an` int NOT NULL,
  `id_mat` int NOT NULL,
  `notes` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_notes`, `id_etudiant`, `id_an`, `id_mat`, `notes`) VALUES
(1, 1, 2, 1, 15),
(2, 1, 2, 4, 20),
(3, 1, 2, 5, 13),
(4, 2, 1, 1, 9),
(5, 2, 1, 1, 16),
(6, 3, 1, 1, 14),
(7, 3, 1, 4, 15),
(8, 3, 1, 5, 11),
(9, 8, 1, 1, 12),
(10, 8, 1, 4, 18),
(11, 8, 1, 5, 16),
(12, 8, 1, 5, 18),
(13, 9, 1, 1, 16),
(14, 9, 1, 1, 16),
(15, 11, 1, 1, 15),
(16, 11, 1, 4, 14),
(17, 11, 1, 5, 16),
(18, 11, 1, 5, 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  ADD PRIMARY KEY (`id_an`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_fil`);

--
-- Index pour la table `filiere_matiere`
--
ALTER TABLE `filiere_matiere`
  ADD PRIMARY KEY (`id_fil_mat`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_mat`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  MODIFY `id_an` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_fil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `filiere_matiere`
--
ALTER TABLE `filiere_matiere`
  MODIFY `id_fil_mat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_mat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
