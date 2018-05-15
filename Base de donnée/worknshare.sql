-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 mai 2018 à 08:35
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `worknshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id_room` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `day` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `begin_booking` datetime NOT NULL,
  `end_booking` datetime NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id_room`, `name`, `day`, `hour`, `begin_booking`, `end_booking`) VALUES
(1, 'Salle Reunion', '2018-04-26 18:38:37', '2018-04-26 16:38:37', '2018-04-26 00:00:00', '2018-04-26 02:12:39'),
(2, 'Bureau Ovale', '2018-04-26 18:39:19', '2018-04-26 16:39:19', '2018-04-27 14:17:04', '2018-04-27 17:19:17');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id_equipment` int(11) NOT NULL AUTO_INCREMENT,
  `name_equipment` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `town` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_location`, `town`, `address`) VALUES
(1, 'Bastille', '2 place de la Bastille 75004 PARIS'),
(2, 'Beaubourg', '6 place Georges-Pompidou 75004 PARIS'),
(3, 'Odeon', '24 place de l’Odéon 75006 PARIS'),
(4, 'Place dItalie', '17 place d’Italie 75013 PARIS'),
(5, 'Republique', '72 place de la République 75011 PARIS'),
(6, 'Ternes', '33 avenue des Ternes 75017 PARIS');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `reference` varchar(15) NOT NULL,
  `localisation` tinyint(1) DEFAULT NULL,
  `problems` text NOT NULL,
  `status` int(11) NOT NULL,
  `entered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`reference`, `localisation`, `problems`, `status`, `entered_at`, `type`) VALUES
('H2VS67PY', 6, 'L\'ampoule ne s\'allume plus.\r\nPiÃ¨ce commandÃ©.\n- \r\nAmpoule rÃ©parÃ© .  ', 2, '2018-05-14 23:29:28', 5),
('A59VD43K', 1, 'Faibles traces d\'usure sur le cotÃ© droit et touche f7 bloquÃ©e.', 2, '2018-05-14 23:28:11', 2),
('B78TR63J', 5, '\r\n', 1, '2018-05-14 23:26:35', 3),
('93QM19AN', 2, 'Un client a renversÃ© un tasse de cafÃ© sur ce clavier.\r\nIrrÃ©parable.', 4, '2018-05-14 23:30:38', 4),
('6F7C2TY3', 3, 'Nouvelle Imprimante.', 1, '2018-05-14 23:31:17', 6);

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offers`
--

INSERT INTO `offers` (`id`, `name`, `duration`, `price`) VALUES
(1, 'Abonnement Mensuel', '1', '75'),
(2, 'Abonnement Annuel', '12', '600');

-- --------------------------------------------------------

--
-- Structure de la table `renting_equipment`
--

DROP TABLE IF EXISTS `renting_equipment`;
CREATE TABLE IF NOT EXISTS `renting_equipment` (
  `id` int(11) NOT NULL,
  `id_equipment` int(11) NOT NULL,
  `date_rent` datetime DEFAULT NULL,
  `date_return` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_equipment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `type_room` varchar(100) NOT NULL,
  `booked` tinyint(2) NOT NULL DEFAULT '0',
  `id_location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `type_room`, `booked`, `id_location`) VALUES
(1, 'Salle Réunion', 0, 1),
(2, 'Salle Travail', 0, 1),
(3, 'Bureau Oval', 0, 1),
(4, 'Salle Gaming', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id_subscription` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subscription`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscription`
--

INSERT INTO `subscription` (`id_subscription`, `price`, `name`, `date_payment`) VALUES
(3, '24', 'Abonnement Simple Sans Engagement', '2018-05-09 16:35:27'),
(4, '20', 'Abonnement Simple Avec Engagement', '2018-05-09 16:35:27'),
(1, '300', 'Abonnement Résident sans Engagement', '2018-05-09 16:39:45'),
(2, '252', 'Abonnement Résident avec Engagement', '2018-05-09 16:39:45');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `message`, `status`, `created_at`) VALUES
(9, 'test@email.test', 'J\'ai renversÃ© mon cafÃ© sur un clavier', 'En plein travail ce jeudi,j\'ai malencontreusement renversÃ© mon cafÃ© sur un clavier de la salle d\'appel 2 de Beaubourg.\r\nIl Ã  dÃ©jÃ  Ã©tÃ© remplacÃ© par un de vos collÃ¨gues cependant je laisse une trac pour un Ã©ventuelle facturation des dÃ©gÃ¢ts.\nRÃ©ponse de l\'administrateur: Ceci vous Ã  Ã©tÃ© facturÃ© sur votre prochain abonnement.\r\nMerci de votre honnÃªtetÃ©.      ', 3, '2018-05-14 23:55:27'),
(8, 'test@email.test', 'Le portique Ã  odÃ©on grince affreusement', 'le portique le plus Ã  gauche au site d\'odÃ©on Ã©met un bruit monstrueux et peu discret dÃ¨s qu\'il est activÃ©.\r\nAfin de nous permettre de travailler dans les meilleurs conditions,je vous prie d\'y jeter un Å“il.\nRÃ©ponse de l\'administrateur: Le portique en question Ã  Ã©tÃ© inspectÃ© et est en effet dÃ©fectueux.\r\nun rechange Ã  Ã©tÃ© commandÃ©.          ', 2, '2018-05-14 23:53:09'),
(7, 'test@email.test', 'Borne Wifi de la salle de repos Ã©teint', 'La borne Wifi de la salle de repos 1 de Bastille est en panne car elle n\'est pas allumÃ© et ne veut pas se mettre en route.\r\n        	', 1, '2018-05-14 23:51:07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(60) NOT NULL,
  `birthday` date NOT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_updated` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `expiration` datetime DEFAULT NULL,
  `id_subscription` int(11) DEFAULT '0',
  `user_key` varchar(100) DEFAULT NULL,
  `boolean_key` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`name`, `surname`, `id`, `password`, `birthday`, `phone`, `email`, `is_deleted`, `date_updated`, `is_admin`, `expiration`, `id_subscription`, `user_key`, `boolean_key`) VALUES
('Kenji', 'Yoroba', 6, '$2y$10$zL4s.caVx1al2ajy0FzqpuuNdGeFmBcD1ha7VVqCAbSmYBXFvTM/a', '1998-05-12', '0659530959', 'kenjiyoroba@yahoo.fr', 0, NULL, 1, NULL, 3, '', 0),
('TESTO', 'Test', 7, '$2y$10$QfLqAvRORPq7I4kz3yTjW.xWEOWxtSnQzpHdEFb8wbddAbcCMNpE6', '1990-07-08', '0687542165', 'test@gmail.fr', 1, NULL, 0, NULL, 0, '', 0),
('JALAL', 'Joachim', 4, '$2y$10$l1Qy2Y5.mMv4otKRKSuPLO26VAudFEnUfGhy2v9Lg72y3HEfF0cqa', '1998-01-12', '0659530959', 'kill@yahoo.fr', 0, NULL, 1, NULL, 0, '', 0),
('Precarite', 'precarite', 8, '$2y$10$imUCzaNpT9Fl4m1FD/Q8mukfLi/MXUgh.TL6ZXF2NEBWrjt0GitOu', '1997-07-12', '0612457898', 'precarite@yahoo.fr', 0, NULL, 0, NULL, 0, '', 0),
('CHALANA', 'Mangue', 9, '$2y$10$yIdpH4WNrrctBxEAqA3B9eRYDr71dUb/SW3190BwP3w2.LzTmmLSa', '1989-12-14', '0612459878', 'chalana@yahoo.fr', 1, NULL, 0, NULL, 0, '', 0),
('KY', 'Stephalafele', 10, '$2y$10$3zcvYNkLhqygBcUAy/p.PO1AQ8Hn9s1z4XBgBb7qTeNQv4ij2mf6y', '1992-04-23', '0632459875', 'stephane@yahoo.fr', 0, NULL, 0, NULL, 0, '', 0),
('caroline', 'skyline', 11, '$2y$10$q1bpJtf9dGlaj5.RtZa6b.6kvwosNAxSb2MlZI./K4a0O0k7WidYC', '1995-01-12', '0654742125', 'carolineskyline@yahoo.fr', 0, NULL, 0, NULL, 0, NULL, NULL),
('CIGDEM', 'jonathan', 12, '$2y$10$ATHxN7s7IFiN6zfeCsb.s.wljtJIC.OOaxd.ozPzMJPmktsIQjyDW', '1996-07-14', '0505050505', 'azn_jojiro@outlook.fr', 0, NULL, 0, NULL, 3, '123456azertyuiop', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
