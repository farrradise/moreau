-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 12 Octobre 2017 à 14:27
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `moreau`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `password`, `email`, `prenom`, `nom`) VALUES
(14, '8cb2237d0679ca88db6464eac60da96345513964', 'marzini.f@gmail.com', 'farrah', 'marzini'),
(18, '8cb2237d0679ca88db6464eac60da96345513964', 'bla@blabla.Fr', 'Youssef', 'MERCIER'),
(19, '8cb2237d0679ca88db6464eac60da96345513964', 'oumar@gmail.fr', 'Oumar', 'Youssouf'),
(20, '8cb2237d0679ca88db6464eac60da96345513964', 'cin@cin.fr', 'Cindy', 'Nicolay'),
(21, 'd4b437e4d8693802b544744a4458aaaea5e49a5c', 'sanchez-clement@live.fr', 'Clément', 'Sanchez'),
(22, '8cb2237d0679ca88db6464eac60da96345513964', 'bug@bug.fr', 'buggi', 'buggi'),
(23, '8cb2237d0679ca88db6464eac60da96345513964', 'rara@rara.fr', 'Fatiha', 'Talsi');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `ID` int(11) NOT NULL,
  `ID_projets` int(11) NOT NULL,
  `intitule_etape` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etapes`
--

INSERT INTO `etapes` (`ID`, `ID_projets`, `intitule_etape`, `etat`, `date_expiration`) VALUES
(1, 20, 'test', 1, '2018-03-21'),
(2, 20, 'test2', 1, '2018-04-24'),
(4, 20, 'Encore 1', 1, '2018-05-26'),
(5, 20, 'toujours ', 1, '2019-03-21'),
(10, 20, 'ma nouvelle etape', 1, '2018-08-21'),
(11, 18, 'test', 1, '2018-03-21'),
(13, 21, 'Peinture', 1, '2018-03-21'),
(14, 22, 'premiere étape', 1, '2018-04-12'),
(15, 22, 'une autre étape', 1, '2018-03-21'),
(16, 22, 'la génialitude', 1, '2018-06-12'),
(18, 16, 'détapisser', 1, '2018-03-12'),
(23, 16, 'test', 1, '2018-03-21'),
(24, 23, 'nettoyage', 1, '2018-03-21'),
(25, 25, 'sdfghqdsfbesd', 0, '2018-03-21'),
(26, 25, 'test', 1, '2018-03-21'),
(27, 26, 'fondations', 1, '2017-03-21'),
(28, 25, 'une nouvelle étape', 1, '2018-02-20');

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `ID` int(11) NOT NULL,
  `etape_ID` int(11) NOT NULL,
  `intitule_mission` varchar(250) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `missions`
--

INSERT INTO `missions` (`ID`, `etape_ID`, `intitule_mission`, `etat`) VALUES
(1, 4, 'sfdsfdsf', 0),
(2, 10, 'Cela marche-t-il ? ', 1),
(3, 4, 'test 2', 0),
(4, 2, 'verifier que personne ne soit à l\'intérieur', 0),
(5, 2, 'voler les merdes qu il reste', 0),
(7, 13, 'repeindre la chambre', 0),
(8, 4, 'nouvelle mission', 0),
(9, 14, 'yihaaaaa', 0),
(10, 15, 'ou ?', 0),
(11, 16, 'test', 0),
(12, 16, 'une autre ', 0),
(14, 5, 'mission', 0),
(15, 5, 'test', 0),
(20, 18, 'emprunter la décolleuse à jean claude', 1),
(21, 18, 'mettre quelque chose au sol pour tout ramasser plus facilement', 1),
(27, 23, 'test', 0),
(28, 24, 'faire devis sous traitance', 1),
(31, 26, 'prout', 1),
(32, 27, 'couler la dalle', 1),
(33, 25, 'la nouvelle mission', 0),
(34, 25, 'test encore', 1),
(35, 28, 'encore une mission', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `ID` int(11) NOT NULL,
  `nom_projet` varchar(100) NOT NULL,
  `delai` date NOT NULL,
  `date_creation` date NOT NULL,
  `admin_ID` int(11) NOT NULL,
  `etat_archive` tinyint(1) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `budget` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`ID`, `nom_projet`, `delai`, `date_creation`, `admin_ID`, `etat_archive`, `nom_client`, `budget`, `categorie`, `ville`) VALUES
(11, 'titre', '2012-12-30', '2017-10-04', 20, 0, 'CLIENT', 6500, 'construction', ''),
(12, 'yay', '2012-12-12', '2017-10-04', 20, 0, 'TEST', 89000, 'surelevation', ''),
(15, 'Renovation Lesquin', '2017-12-21', '2017-10-04', 20, 0, 'DESCAMPS', 9400, 'renovation', ''),
(16, 'SOIR', '2012-12-30', '2017-10-04', 14, 1, 'DESCAMPS', 6800, 'renovation', ''),
(18, 'maison deb chris', '2012-12-30', '2017-10-05', 20, 0, 'DEHONDT', 5600, 'extension', 'mouchin'),
(19, 'La cabane dans les bois', '2017-12-21', '2017-10-05', 20, 0, 'GOSSART', 6700, 'demolition', 'Lille'),
(20, 'Cest mon titre ', '2018-03-21', '2017-10-05', 14, 1, 'VAN BELLE', 6900, 'demolition', 'Lille'),
(21, 'Rénovation Maison Clément', '2019-12-30', '2017-10-09', 21, 0, 'SYLVAIN', 5200, 'renovation', 'Ronchin'),
(22, 'Chantier Bello', '2018-12-21', '2017-10-09', 22, 0, 'BELLIT', 5600, 'extension', 'Libercourt'),
(23, 'Extension bois ', '2019-12-30', '2017-10-10', 14, 1, 'COUSTEAU', 6600, 'extension', 'Ronchin'),
(24, 'le novueau projet ', '2017-12-21', '2017-10-10', 14, 1, 'RADOUJI', 8400, 'extension', 'Berk'),
(25, 'dernier projet', '2012-12-30', '2017-10-11', 14, 0, 'DESCAMPS', 6600, 'demolition', 'Ronchin'),
(26, 'mon premier projet', '2017-12-21', '2017-10-11', 23, 1, 'MARZINI', 6800, 'construction', 'Libercourt');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_projets` (`ID_projets`),
  ADD KEY `ID_projets_2` (`ID_projets`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `etape_ID` (`etape_ID`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `admin_ID` (`admin_ID`),
  ADD KEY `etat_archive` (`etat_archive`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `etapes_ibfk_1` FOREIGN KEY (`ID_projets`) REFERENCES `projets` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_ibfk_1` FOREIGN KEY (`etape_ID`) REFERENCES `etapes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`admin_ID`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
