-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 28 Mai 2016 à 16:21
-- Version du serveur :  5.5.47-0ubuntu0.14.04.1
-- Version de PHP :  5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_organizer`
--

-- --------------------------------------------------------

--
-- Structure de la table `EVENT`
--

CREATE TABLE `EVENT` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `BUDGET` int(11) NOT NULL,
  `PLACE` varchar(200) NOT NULL,
  `DATE` date NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `TYPE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `EVENT`
--

INSERT INTO `EVENT` (`ID`, `NAME`, `BUDGET`, `PLACE`, `DATE`, `DESCRIPTION`, `TYPE`) VALUES
(8, 'Basketball game :)', 3, 'Fortune stadiu', '2016-05-30', 'The day has almost come for this event, let\'s do it my friends !', 'Sport'),
(9, 'blues/funk Jamming session', 0, 'At my place.', '2016-04-05', 'Jamming Session at my place, just come and enjoy, you need to be experimented this an advanced level session. Bring your instruments :)', 'Music'),
(10, 'Chill party at my house !!!', 0, 'At my home', '2016-05-29', 'A party at my, I\'ll give more information about the location when the day will aproach.\r\nIf you could bring snacks and drinks it would be great :)', 'Party');

-- --------------------------------------------------------

--
-- Structure de la table `EVENT_USER_ASSOC`
--

CREATE TABLE `EVENT_USER_ASSOC` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `EVENT_USER_ASSOC`
--

INSERT INTO `EVENT_USER_ASSOC` (`ID`, `ID_USER`, `ID_EVENT`) VALUES
(2, 1, 8),
(3, 1, 9),
(4, 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `PARTICIPANTS`
--

CREATE TABLE `PARTICIPANTS` (
  `ID` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PARTICIPANTS`
--

INSERT INTO `PARTICIPANTS` (`ID`, `ID_EVENT`, `ID_USER`) VALUES
(14, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `ID` int(11) NOT NULL,
  `SURNAME` varchar(40) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `NICKNAME` varchar(40) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `PASSWORD` int(11) NOT NULL,
  `IMG_FILE` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `USER`
--

INSERT INTO `USER` (`ID`, `SURNAME`, `NAME`, `NICKNAME`, `BIRTHDAY`, `EMAIL`, `PASSWORD`, `IMG_FILE`) VALUES
(1, 'Hichem', 'Hamza', 'Termaa', '1994-01-14', 'hichemterma@gmail.com', 12345, '0'),
(2, 'Yassine', 'Derrar', 'yderrar', '1996-03-01', 'yderrar94@gmail.com', 123456, '0'),
(3, 'Meng', 'Phu', 'Ckabee', '1993-01-01', 'kevin.phu@gmail.com', 123456, '0');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `EVENT`
--
ALTER TABLE `EVENT`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `EVENT_USER_ASSOC`
--
ALTER TABLE `EVENT_USER_ASSOC`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `PARTICIPANTS`
--
ALTER TABLE `PARTICIPANTS`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `EVENT`
--
ALTER TABLE `EVENT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `EVENT_USER_ASSOC`
--
ALTER TABLE `EVENT_USER_ASSOC`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `PARTICIPANTS`
--
ALTER TABLE `PARTICIPANTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
