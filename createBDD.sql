-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 09 nov. 2021 à 08:52
-- Version du serveur :  5.7.32
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `multimetreBDD`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `luminosite` varchar(10) NOT NULL,
  `humidite` varchar(10) NOT NULL,
  `temperature` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`id`, `event`, `luminosite`, `humidite`, `temperature`) VALUES
(124, '2021-11-08 19:17:11', '26', '51.90', '20.60'),
(125, '2021-11-08 19:17:21', '1000', '52.40', '20.60'),
(126, '2021-11-08 19:17:31', '200', '52.70', '20.60'),
(127, '2021-11-08 19:17:41', '4', '52.30', '20.60'),
(128, '2021-11-08 19:19:01', '0', '50.90', '20.60'),
(129, '2021-11-08 19:19:11', '200', '51.80', '20.60'),
(130, '2021-11-08 19:19:22', '500', '51.80', '20.60'),
(131, '2021-11-08 19:19:32', '50', '52.40', '20.70'),
(132, '2021-11-08 19:19:42', '10000', '51.80', '20.70'),
(133, '2021-11-08 19:20:10', '2889', '53.10', '20.80'),
(134, '2021-11-08 19:20:27', '610', '52.20', '20.80'),
(135, '2021-11-08 19:20:37', '996', '52.80', '20.80'),
(136, '2021-11-08 20:24:57', '222', '57.90', '20.00'),
(137, '2021-11-08 20:24:59', '100', '56.80', '19.90'),
(138, '2021-11-08 20:25:02', '100', '55.80', '20.00'),
(139, '2021-11-08 20:25:04', '299', '55.60', '20.00'),
(140, '2021-11-08 20:25:06', '10000', '55.40', '20.00'),
(141, '2021-11-08 20:25:17', '10000', '55.40', '20.00'),
(142, '2021-11-08 20:25:19', '4', '56.40', '20.00'),
(143, '2021-11-08 20:25:21', '2', '55.50', '20.00'),
(144, '2021-11-08 20:25:23', '5000', '55.50', '20.00'),
(145, '2021-11-08 20:25:25', '4', '55.30', '20.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
