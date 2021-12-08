-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql113.epizy.com
-- Généré le :  ven. 08 nov. 2019 à 07:16
-- Version du serveur :  5.6.45-86.1
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `electroroland`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `patch` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `patch`) VALUES
(1, 'Cables', 'cable.jpg'),
(2, 'Condensateurs', 'condensateur.jpg'),
(3, 'Diodes', 'diode.png'),
(4, 'Résistances', 'resistance.jpg'),
(5, 'Circuit Imprimé', 'circuit_imprime.png'),
(6, 'Interrupteurs', 'interrupteur.jpg'),
(7, 'LEDs', 'led.png'),
(8, 'Transistors', 'transistor.jpg'),
(9, 'Circuits Intégré', 'circuit_integrer.jpg'),
(10, 'Kit Electronique', 'kit_electronique.jpg'),
(11, 'Thyristors', 'thyristorsss.jpg'),
(13, 'Batterie', 'batterie.png');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `description` text,
  `type` int(11) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `patch` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `type`, `prix`, `stock`, `patch`) VALUES
(2, 'Kit débutant', 'Kit électronique pour débutant', 10, 53, 4, 'D4E28B1D-940A-4AA7-A625-64FE72C7F292.jpeg'),
(6, 'R 10K ', 'Résistances 10k', 4, 1, 34, '5051ADD8-9F6E-4F05-BDD8-48CCD5D11A6B.jpeg'),
(4, 'R 1k', 'Résistances 1k 1/2 watt', 4, 1, 100, '8698DCAD-8635-41F7-9FD7-0C866F9DB5F3.jpeg'),
(7, 'Transistor BC547', 'Transistor NPN BC547', 8, 2, 12, 'CED0B013-05A7-43F8-9920-DC0A486210CF.jpeg'),
(8, 'Transistor BC557', 'Transistor PNP BC557', 8, 2, 5, '545B4D95-3DEA-4A58-BCE8-779689B5CDEC.jpeg'),
(9, 'Transistors 2N2222', 'Transistor NPN 2N2222', 8, 3, 10, '19E3C485-FEF2-4DC3-B93F-7CB9A7DEDA5C.png'),
(10, 'Thyristor BT137', 'Thyristor BT137', 11, 6, 4, 'DEEC2DB6-738A-4882-A5AA-C83197CD39B6.jpeg'),
(11, 'BC107', 'Transistor NPN 30 volts', 8, 1.5, 23, 'F9397425-DFE2-421A-80BA-53811252CC92.jpeg'),
(13, 'R 4K7', 'Résistances 4,7 K  1/2 watt', 4, 1, 56, '632FAF3E-D0A7-4E30-AB17-F87D56A5A38B.jpeg'),
(14, 'R100K', 'Résistances 100k. 1/2 watt', 4, 1, 98, '152806FB-D925-41EB-8065-10548CFC675E.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `question` text,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `login` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `privileges` varchar(50) DEFAULT NULL,
  `hash` binary(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `gender`, `privileges`, `hash`) VALUES
('Pierre', 'Male', 'Admin', 0x24327924313024505a4a6c7342567a476a344a474d564d3063526b6f7566594f347872444d576b583770704577446a34644730617832746d35533357000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('Papa', 'male', 'Admin', 0x243279243130246b4358756b6a356133777849706d78774b6b66344575584d484d4262503661726c55654457613746636952504b4c4c372f6c684965000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `patch` (`patch`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `patch` (`patch`),
  ADD KEY `FK_produits_type__caterogies_id` (`type`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prenom` (`prenom`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
