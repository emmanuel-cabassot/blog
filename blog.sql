-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 déc. 2020 à 21:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1338 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'Manu', '$2y$10$lMIoADnyYtgkNGyybn3bautooWFbZVmse55/RibuCU5V1hrkVWlvK', 'emmanu.cabassot@laplateforme.iopp', 1),
(2, 'Chacha', '$2y$10$eE/GBzvjRoZWzBR4244RgeGi3diBllqCAgD39HuXvEv9EN/P0Ezfa', 'chcha@hotmail.fr', 1),
(3, 'jerome', '$2y$10$oaPC1n3G4XNqrCyJ7FXKI.VsTqxZ47Yy.qJBikNCOQMVh4/nbB0ka', 'jeje@hotmail.fr', 1),
(4, 'cjosi', '$2y$10$5yW0vyFW7FtIYfR4pVhcOuZvrhwlUooh81f2ikNjPWcWgvFn5mhb2', 'dd@gmial', 1),
(5, 'Michel', '$2y$10$X/Lim4WxShczrdIsX8UHWeB8PS9FZm/VImSU.NbpC13f0oLMyJPV6', 'micho@gmail.fr', 1),
(6, ',', '$2y$10$Y8QES7jDD3kd30j4LFFCVueOeyxlnKcZmaInYnMp2MTuYPgAHG96y', 'fref@fr', 1),
(8, 'llll', '$2y$10$rpUoEtOPAEibgtiX2KwtbO51tsZMniP8Y6pFb2LmaWn9faKAUguHO', 'emmanuel.cabassot@hotmail.fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
