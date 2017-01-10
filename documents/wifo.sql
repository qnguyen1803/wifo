-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Janvier 2017 à 16:58
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

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Arts'),
(2, 'Animaux - Vie Sauvage'),
(3, 'Abstrait'),
(4, 'Fond-Textures'),
(5, 'Beauté - Mode'),
(6, 'Bâtiments - Monuments'),
(7, 'Affaires - Finances'),
(8, 'Célébrités'),
(9, 'Éditorial'),
(10, 'Éducation'),
(11, 'Nourriture - Boisson'),
(12, 'Santé - Médical'),
(13, 'Vacances'),
(14, 'Illustrations - Clip-Art'),
(15, 'Industriel'),
(16, 'Interieurs'),
(17, 'Divers'),
(18, 'Modèle'),
(19, 'Nature'),
(20, 'Objets'),
(21, 'Parcs - Plein air'),
(22, 'Etre-humain'),
(23, 'Religion'),
(24, 'Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `idUtilisateur` int(255) NOT NULL,
  `vote` int(255) NOT NULL,
  `sujet` varchar(25) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `dateDePub` datetime DEFAULT NULL,
  `idImage` int(11) DEFAULT NULL,
  `idProjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `idUtilisateur`, `vote`, `sujet`, `contenu`, `dateDePub`, `idImage`, `idProjet`) VALUES
(30, 8, 4, 'comment1', 'c\'est le premier commentaire', '2017-01-04 16:57:32', 31, NULL),
(31, 8, 1, 'comment 2', 'C\'est le deuxieme commentaire', '2017-01-04 16:58:05', 31, NULL),
(32, 8, 1, 'comment 2', 'C\'est le deuxieme commentaire', '2017-01-04 16:59:40', 31, NULL),
(33, 8, 5, 'comment 3', 'troiseidjfkjdshfk', '2017-01-04 17:12:27', 31, NULL),
(34, 14, 5, 'hahah', 'jdsqkdhkqshkj jkhfdkjsf', '2017-01-04 17:57:51', 31, NULL),
(35, 8, 4, 'je sais pas quoi dire', 'trop belle', '2017-01-04 22:27:52', 32, NULL),
(36, 8, 4, 'blabla', 'dsqdjl klhlkds lkjlkjdsq ', '2017-01-04 22:40:26', 34, NULL),
(37, 8, 3, 'dfdsn jdlksd', 'hkjfhds hljfhd ', '2017-01-05 17:41:18', 35, NULL),
(38, 8, 5, 'j\'adore les tanks', 'impecables', '2017-01-05 23:29:16', 37, NULL),
(39, 8, 5, 'belle', 'Très belle photo', '2017-01-06 03:38:37', 39, NULL),
(40, 15, 3, 'fdsf', 'fdsfs fsdfds', '2017-01-08 02:02:52', 54, NULL),
(41, 15, 1, 'dsqd', 'dsqdqs', '2017-01-08 02:03:08', 54, NULL),
(42, 15, 1, 'dsqdsq', 'dsqdsdsq', '2017-01-09 10:39:42', 54, NULL);

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
  `dateDePub` date DEFAULT NULL,
  `repository` varchar(255) DEFAULT NULL,
  `note` int(25) DEFAULT NULL,
  `idCategorie` int(20) DEFAULT NULL,
  `idUtilisateur` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `titre`, `description`, `dateDePub`, `repository`, `note`, `idCategorie`, `idUtilisateur`) VALUES
(53, 'une belle fille', 'C\'est une belle fille', '2017-01-08', 'webroot/user_repository/image/jpg/unebellefille_WifoCopyleft_createByratatouillea0867be0bde02453c0a0fafa748a29ad.jpg', 0, 5, 15),
(54, 'fdsfsd', 'fdsfsdfdsf sqdsd', '2017-01-08', 'webroot/user_repository/image/jpg/fdsfsd_WifoCopyleft_createByratatouilleac750335e27a0210b664d87faf05f54c.jpg,webroot/user_repository/image/png/fdsfsd_WifoCopyleft_createByratatouillebe6cc03e852ba2475cefa5f8f52e5a8b.png', 2, 1, 15),
(55, 'un bebe', 'fsfdsf fdsfsdf', '2017-01-08', 'webroot/user_repository/image/jpg/unbebe_WifoCopyleft_createByratatouillea0fe663d8515c67f304049bc698e1150.jpg', 0, 12, 15),
(56, 'un autre bebe', 'fdsfds', '2017-01-08', 'webroot/user_repository/image/jpg/unautrebebe_WifoCopyleft_createByratatouille1c81f5c196d1a05e7aafed519e4ed06c.jpg', 0, 1, 15),
(57, 'gdjkqsd', 'dqsd jhdqsd', '2017-01-09', 'webroot/user_repository/image/jpg/gdjkqsd_WifoCopyleft_createByratatouille393596132cc4e3e15184ffe318fc8f54.jpg,webroot/user_repository/image/png/gdjkqsd_WifoCopyleft_createByratatouillef47d690ed59dee312ccaa2744be0632f.png', 0, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `contentMessage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `contentMessage`) VALUES
(1, 'nguyen', 'quanghuy.18031992@gmail.com', 'question', 'Comment utiliser le site?');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `imageIllustration` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `dateDePub` datetime DEFAULT NULL,
  `compteur` varchar(50) DEFAULT NULL,
  `membres` varchar(45) DEFAULT NULL,
  `idUtilisateur` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `imageIllustration`, `description`, `dateDePub`, `compteur`, `membres`, `idUtilisateur`) VALUES
(2, 'jojsdsqd', 'webroot/user_repository/projet/jojsdsqd_WifoCopyleft_ProjectOfratatouille.jpg', 'dsdsq dsqd', '2017-01-08 00:00:00', '0/0', '15', 15),
(3, 'new projectds', 'webroot/user_repository/projet/newprojectds_WifoCopyleft_ProjectOfratatouille.jpg', 'dsqd', '2017-01-08 00:00:00', '0/0', '15', 15),
(4, 'dsqdqs', 'webroot/user_repository/projet/dsqdqs_WifoCopyleft_ProjectOfratatouille.jpg', 'dsd', '2017-01-09 00:00:00', '0/0', '15', 15);

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
(15, 'NGUYEN', 'Quang Huy', 'ratatouille', 'b1c3ebcac0f2a9dae6b014515b3a51379cb20d04', 'quanghuy.18031992@gmail.com', 'm', 'cuisine, voyage', 646314568, 'Etudiant', 'Développeur web, Graphiste', 'Je suis passionné du développement PHP', '2017-01-08', '2017-01-09', 'webroot/user_repository/avatar/15.png');

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
-- Index pour la table `message`
--
ALTER TABLE `message`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
