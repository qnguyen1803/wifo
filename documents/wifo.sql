-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 13 Novembre 2016 à 18:28
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wifo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idUtilisateur` int(20) DEFAULT NULL,
  `idImage` int(11) DEFAULT NULL,
  `idProjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `idUtilisateur` int(255) NOT NULL,
  `idProjet` int(255) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateDePub` datetime DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `taille` varchar(20) DEFAULT NULL,
  `note` decimal(20,0) DEFAULT NULL,
  `idCategorie` int(20) DEFAULT NULL,
  `idUtilisateur` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `imageIllustration` varchar(255) DEFAULT NULL,
  `videoIllustration` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `dateDePub` datetime DEFAULT NULL,
  `compteur` decimal(50,0) DEFAULT NULL,
  `membres` varchar(45) DEFAULT NULL,
  `idUtilisateur` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `favori` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `metier` varchar(45) DEFAULT NULL,
  `competences` varchar(255) DEFAULT NULL,
  `descriptionSup` varchar(255) DEFAULT NULL,
  `dateCreation` date NOT NULL,
  `derniereConnexion` date NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `mdp`, `email`, `sexe`, `favori`, `telephone`, `metier`, `competences`, `descriptionSup`, `dateCreation`, `derniereConnexion`, `avatar`) VALUES
(2, 'NGUYEN', 'Quang Huy', 'LALA', 'b1c3ebcac0f2a9dae6b014515b3a51379cb20d04', 'ratataouille1803@yahoo.com.vn', 'm', 'Voyager', 646314568, 'Etudiant', 'Js, Photoshop', 'Je suis passionné du développement web', '2016-11-11', '2016-11-11', 'webroot/user_repository/avatar/avatar-default.png'),
(5, 'lele', 'le', 'nguyen', 'b1c3ebcac0f2a9dae6b014515b3a51379cb20d04', 'quanghuy.18031992@gmail.com', 'm', '0123455667', 123455667, 'lolo', 'hoho', 'haha', '2016-11-12', '2016-11-12', 'webroot/user_repository/avatar/5.jpg'),
(6, '', '', 'nguyen quang huy', 'b1c3ebcac0f2a9dae6b014515b3a51379cb20d04', 'quanghuy.18031992@gmail.co', 'm', '', 0, '', '', '', '2016-11-13', '2016-11-13', 'webroot/user_repository/avatar/6.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
