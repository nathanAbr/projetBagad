-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 13 Avril 2017 à 11:57
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbbagad`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `idActualite` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `fk_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`idActualite`, `titre`, `image`, `description`, `date`, `fk_membre`) VALUES
(1, 'Concours', 'image', 'resultats concours lorient 2017', '2017-07-21 00:00:00', 1),
(2, 'Fete du slip', 'myPath', 'soirée cuir et moustache', '2017-06-15 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `idAdresse` int(11) NOT NULL,
  `rue1` varchar(45) NOT NULL,
  `rue2` varchar(45) DEFAULT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `fk_localite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`idAdresse`, `rue1`, `rue2`, `complement`, `fk_localite`) VALUES
(1, 'alle michel fourniret', NULL, NULL, 1),
(2, 'alle francois fion', NULL, NULL, 2),
(3, 'alle alain raté', NULL, NULL, 3),
(4, 'alle claude cramé', NULL, NULL, 4),
(5, 'alle balavoine hélico', NULL, NULL, 5),
(27, 'Boulevard Vincent Gâche', 'Face de la loire', '', 47);

-- --------------------------------------------------------

--
-- Structure de la table `emploidutemps`
--

CREATE TABLE `emploidutemps` (
  `idEmploiDuTemps` int(11) NOT NULL,
  `EmploiDuTempscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `cachet` float DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `valider` tinyint(4) NOT NULL,
  `fk_adresse` int(11) NOT NULL,
  `fk_type` int(11) NOT NULL,
  `fk_membre` int(11) NOT NULL,
  `fk_referentExterieur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nom`, `dateDebut`, `dateFin`, `cachet`, `description`, `image`, `valider`, `fk_adresse`, `fk_type`, `fk_membre`, `fk_referentExterieur`) VALUES
(1, 'HellFest', '2017-06-16 00:00:00', '2017-06-17 00:00:00', 1000, 'festoch', 'myPath', 1, 1, 1, 3, 1),
(2, 'Concours Lorient 2017', '2017-08-05 00:00:00', '2017-08-06 00:00:00', 2000, 'concours national des bagadou ', 'myPath', 0, 2, 3, 3, 2),
(3, 'Reunion commission musicale', '2017-10-01 00:00:00', '2017-10-01 00:00:00', NULL, 'reflechir au programme de l\'année suivante', 'myPath', 0, 3, 5, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idgroupe` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `libelle`) VALUES
(1, 'membre'),
(2, 'bureau');

-- --------------------------------------------------------

--
-- Structure de la table `grouperole`
--

CREATE TABLE `grouperole` (
  `fk_groupe` int(11) NOT NULL,
  `fk_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `grouperole`
--

INSERT INTO `grouperole` (`fk_groupe`, `fk_role`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE `instrument` (
  `idInstrument` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `instrument`
--

INSERT INTO `instrument` (`idInstrument`, `nom`) VALUES
(1, 'caisse-claire'),
(2, 'bombarde'),
(3, 'cornemuse'),
(4, 'percussion'),
(5, 'grosse-caisse');

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

CREATE TABLE `localite` (
  `idlocalite` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `codePostale` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `localite`
--

INSERT INTO `localite` (`idlocalite`, `ville`, `pays`, `codePostale`) VALUES
(1, 'Lorient', 'France', '56100'),
(2, 'Ploemeur', 'France', '56270'),
(3, 'Morea', 'Tahiti', '99'),
(4, 'Paris', 'France', '75000'),
(5, 'Saint-Herblain', 'France', '44800'),
(47, 'Nantes', 'France', '44200'),
(48, 'Nantes', 'France', '44000'),
(49, 'Nantes', 'France', '44300');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `dateNaissance` datetime NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `login` varchar(45) NOT NULL,
  `motDePasse` varchar(45) NOT NULL,
  `fk_instrument` int(11) DEFAULT NULL,
  `fk_adresse` int(11) NOT NULL,
  `fk_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `mail`, `nom`, `prenom`, `dateNaissance`, `telephone`, `login`, `motDePasse`, `fk_instrument`, `fk_adresse`, `fk_groupe`) VALUES
(1, 'gmail@gmail.com', 'Raulo', 'Erwan', '1991-11-08 00:00:00', '0621494336', 'log1 ', 'log1', 1, 1, 1),
(2, 'gmail@gmail.com', 'Guillaume', 'Adrien', '1991-10-08 00:00:00', '062148256', 'log2 ', 'log2', 2, 2, 1),
(3, 'gmail@gmail.com', 'Meneghin', 'Jean-Pierre', '1991-06-08 00:00:00', '0621842336', 'log3 ', 'log3', 3, 3, 2),
(4, 'gmail@gmail.com', 'Wakedman', 'Erwan', '1991-05-08 00:00:00', '063654336', 'log4 ', 'log4', 4, 4, 2),
(5, 'gmail@gmail.com', 'Cohuet', 'Kilian', '1991-12-08 00:00:00', '062141026', 'log5 ', '972303bebdd6ab98eaa78bf516349ecd', 5, 5, 2),
(18, 'jfjung@itechsup.fr', 'JUNG', 'Jean-François', '1982-06-06 12:00:00', '0606060606', 'JUNGJean-François', 'c494ddeb469e4fbd326b8c483059d83b', 1, 27, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membrerole`
--

CREATE TABLE `membrerole` (
  `fk_membre` int(11) NOT NULL,
  `fk_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membrerole`
--

INSERT INTO `membrerole` (`fk_membre`, `fk_role`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `fk_reponce` int(11) NOT NULL,
  `fk_membre` int(11) NOT NULL,
  `fk_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participant`
--

INSERT INTO `participant` (`fk_reponce`, `fk_membre`, `fk_evenement`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 4, 1),
(1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `referentexterieur`
--

CREATE TABLE `referentexterieur` (
  `idreferentExterieur` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `referentexterieur`
--

INSERT INTO `referentexterieur` (`idreferentExterieur`, `nom`, `prenom`, `telephone`, `mail`) VALUES
(1, 'Pussault', 'Pierre', '0621477', 'pierre@gmail.com'),
(2, 'Tanchereau', 'Victor', '0621477', 'victor@gmail.com'),
(3, 'Abraham', 'Nathan', '0621477', 'nathan@gmail.com'),
(4, 'Martin', 'Coline', '0621477', 'coline@gmail.com'),
(5, 'Pereira', 'Michael', '0621477', 'mik@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `libelle`) VALUES
(1, 'oui'),
(2, 'non'),
(3, 'peut-être'),
(4, 'non répondu');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`idRole`, `libelle`) VALUES
(1, 'publier actualités'),
(2, 'créer évenements'),
(3, 'ajouter des membres'),
(4, 'acceder aux évenements');

-- --------------------------------------------------------

--
-- Structure de la table `typeevenement`
--

CREATE TABLE `typeevenement` (
  `idType` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeevenement`
--

INSERT INTO `typeevenement` (`idType`, `libelle`) VALUES
(1, 'sortie'),
(2, 'répétition'),
(3, 'concours'),
(4, 'assemblée générale'),
(5, 'réunion');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idActualite`),
  ADD KEY `fk_membre_idx` (`fk_membre`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`idAdresse`),
  ADD KEY `fk_villeAdresse_idx` (`fk_localite`);

--
-- Index pour la table `emploidutemps`
--
ALTER TABLE `emploidutemps`
  ADD PRIMARY KEY (`idEmploiDuTemps`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`),
  ADD KEY `fk_adresseEvenement_idx` (`fk_adresse`),
  ADD KEY `fk_typeEvenement_idx` (`fk_type`),
  ADD KEY `fk_referentExterieur_idx` (`fk_referentExterieur`),
  ADD KEY `fk_membre_idx` (`fk_membre`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idgroupe`);

--
-- Index pour la table `grouperole`
--
ALTER TABLE `grouperole`
  ADD KEY `fk_groupe_idx` (`fk_groupe`),
  ADD KEY `fk_role_idx` (`fk_role`);

--
-- Index pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`idInstrument`);

--
-- Index pour la table `localite`
--
ALTER TABLE `localite`
  ADD PRIMARY KEY (`idlocalite`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`,`mail`),
  ADD KEY `fk_instrumentMembre_idx` (`fk_instrument`),
  ADD KEY `fk_adresseMembre_idx` (`fk_adresse`),
  ADD KEY `fk_typeUtilisateur_idx` (`fk_groupe`);

--
-- Index pour la table `membrerole`
--
ALTER TABLE `membrerole`
  ADD KEY `fk_membre_idx` (`fk_membre`),
  ADD KEY `fk_Role_idx` (`fk_role`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD KEY `fk_membresParticipant_idx` (`fk_membre`),
  ADD KEY `fk_evenementParticipant_idx` (`fk_evenement`),
  ADD KEY `fk_reponceParticipant_idx` (`fk_reponce`);

--
-- Index pour la table `referentexterieur`
--
ALTER TABLE `referentexterieur`
  ADD PRIMARY KEY (`idreferentExterieur`,`mail`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `typeevenement`
--
ALTER TABLE `typeevenement`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `idActualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `idAdresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `emploidutemps`
--
ALTER TABLE `emploidutemps`
  MODIFY `idEmploiDuTemps` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idgroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `instrument`
--
ALTER TABLE `instrument`
  MODIFY `idInstrument` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `localite`
--
ALTER TABLE `localite`
  MODIFY `idlocalite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `referentexterieur`
--
ALTER TABLE `referentexterieur`
  MODIFY `idreferentExterieur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `typeevenement`
--
ALTER TABLE `typeevenement`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `fk_membreActu` FOREIGN KEY (`fk_membre`) REFERENCES `membre` (`idMembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `fk_localiteAdresse` FOREIGN KEY (`fk_localite`) REFERENCES `localite` (`idlocalite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_adresseEvenement` FOREIGN KEY (`fk_adresse`) REFERENCES `adresse` (`idAdresse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membreEvenement` FOREIGN KEY (`fk_membre`) REFERENCES `membre` (`idMembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_referentExterieurEvenement` FOREIGN KEY (`fk_referentExterieur`) REFERENCES `referentexterieur` (`idreferentExterieur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_typeEvenement` FOREIGN KEY (`fk_type`) REFERENCES `typeevenement` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `grouperole`
--
ALTER TABLE `grouperole`
  ADD CONSTRAINT `fk_groupeGR` FOREIGN KEY (`fk_groupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roleGR` FOREIGN KEY (`fk_role`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_adresseMembre` FOREIGN KEY (`fk_adresse`) REFERENCES `adresse` (`idAdresse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrumentMembre` FOREIGN KEY (`fk_instrument`) REFERENCES `instrument` (`idInstrument`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_typeMembres` FOREIGN KEY (`fk_groupe`) REFERENCES `groupe` (`idgroupe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membrerole`
--
ALTER TABLE `membrerole`
  ADD CONSTRAINT `fk_RoleMR` FOREIGN KEY (`fk_role`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membreMR` FOREIGN KEY (`fk_membre`) REFERENCES `membre` (`idMembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_evenementParticipant` FOREIGN KEY (`fk_evenement`) REFERENCES `evenement` (`idEvenement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membresParticipant` FOREIGN KEY (`fk_membre`) REFERENCES `membre` (`idMembre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reponceParticipant` FOREIGN KEY (`fk_reponce`) REFERENCES `reponse` (`idReponse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
