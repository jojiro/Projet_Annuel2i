-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Mai 2018 à 11:30
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `booking` (
  `id_room` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `day` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `begin_booking` datetime NOT NULL,
  `end_booking` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id_room`, `name`, `day`, `hour`, `begin_booking`, `end_booking`) VALUES
(1, 'Salle Reunion', '2018-04-26 18:38:37', '2018-04-26 16:38:37', '2018-04-26 00:00:00', '2018-04-26 02:12:39'),
(2, 'Bureau Ovale', '2018-04-26 18:39:19', '2018-04-26 16:39:19', '2018-04-27 14:17:04', '2018-04-27 17:19:17');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `equipment`
--

CREATE TABLE `equipment` (
  `id_equipment` int(11) NOT NULL,
  `name_equipment` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_location` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `town` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `location`
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
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offers`
--

INSERT INTO `offers` (`id`, `name`, `duration`, `price`) VALUES
(1, 'Abonnement Mensuel', '1', '75'),
(2, 'Abonnement Annuel', '12', '600');

-- --------------------------------------------------------

--
-- Structure de la table `renting_equipment`
--

CREATE TABLE `renting_equipment` (
  `id` int(11) NOT NULL,
  `id_equipment` int(11) NOT NULL,
  `date_rent` datetime DEFAULT NULL,
  `date_return` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `type_room` varchar(100) NOT NULL,
  `booked` tinyint(2) NOT NULL DEFAULT '0',
  `id_location` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `room`
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

CREATE TABLE `subscription` (
  `id_subscription` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `subscription`
--

INSERT INTO `subscription` (`id_subscription`, `price`, `name`, `date_payment`) VALUES
(3, '24', 'Abonnement Simple Sans Engagement', '2018-05-09 16:35:27'),
(4, '20', 'Abonnement Simple Avec Engagement', '2018-05-09 16:35:27'),
(1, '300', 'Abonnement Résident sans Engagement', '2018-05-09 16:39:45'),
(2, '252', 'Abonnement Résident avec Engagement', '2018-05-09 16:39:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
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
  `boolean_key` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`name`, `surname`, `id`, `password`, `birthday`, `phone`, `email`, `is_deleted`, `date_updated`, `is_admin`, `expiration`, `id_subscription`, `user_key`, `boolean_key`) VALUES
('Kenji', 'Yoroba', 6, '$2y$10$zL4s.caVx1al2ajy0FzqpuuNdGeFmBcD1ha7VVqCAbSmYBXFvTM/a', '1998-05-12', '0659530959', 'kenjiyoroba@yahoo.fr', 0, NULL, 1, NULL, 3, '', 0),
('TESTO', 'Test', 7, '$2y$10$QfLqAvRORPq7I4kz3yTjW.xWEOWxtSnQzpHdEFb8wbddAbcCMNpE6', '1990-07-08', '0687542165', 'test@gmail.fr', 1, NULL, 0, NULL, 0, '', 0),
('JALAL', 'Joachim', 4, '$2y$10$l1Qy2Y5.mMv4otKRKSuPLO26VAudFEnUfGhy2v9Lg72y3HEfF0cqa', '1998-01-12', '0659530959', 'kill@yahoo.fr', 0, NULL, 1, NULL, 0, '', 0),
('Precarite', 'precarite', 8, '$2y$10$imUCzaNpT9Fl4m1FD/Q8mukfLi/MXUgh.TL6ZXF2NEBWrjt0GitOu', '1997-07-12', '0612457898', 'precarite@yahoo.fr', 0, NULL, 0, NULL, 0, '', 0),
('CHALANA', 'Mangue', 9, '$2y$10$yIdpH4WNrrctBxEAqA3B9eRYDr71dUb/SW3190BwP3w2.LzTmmLSa', '1989-12-14', '0612459878', 'chalana@yahoo.fr', 1, NULL, 0, NULL, 0, '', 0),
('KY', 'Stephalafele', 10, '$2y$10$3zcvYNkLhqygBcUAy/p.PO1AQ8Hn9s1z4XBgBb7qTeNQv4ij2mf6y', '1992-04-23', '0632459875', 'stephane@yahoo.fr', 0, NULL, 0, NULL, 0, '', 0),
('caroline', 'skyline', 11, '$2y$10$q1bpJtf9dGlaj5.RtZa6b.6kvwosNAxSb2MlZI./K4a0O0k7WidYC', '1995-01-12', '0654742125', 'carolineskyline@yahoo.fr', 0, NULL, 0, NULL, 0, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_room`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id_equipment`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `renting_equipment`
--
ALTER TABLE `renting_equipment`
  ADD PRIMARY KEY (`id`,`id_equipment`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Index pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id_subscription`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id_equipment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id_subscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
