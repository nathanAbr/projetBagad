

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `instrument` (`nom`) VALUES
('caisse-claire'),
('bombarde'),
('cornemuse'),
('percussion'),
('grosse-caisse');

INSERT INTO `reponse` (`libelle`) VALUES
('oui'),
('non'),
('peut-être'),
('non répondu');

INSERT INTO `role` (`libelle`) VALUES
('publier actualités'),
('créer évenements'),
('ajouter des membres'),
('acceder aux évenements');

INSERT INTO `typeevenement` (`libelle`) VALUES
('sortie'),
('répétition'),
('concours'),
('assemblée générale'),
('réunion');

INSERT INTO `groupe` (`libelle`) VALUES
('membre'),
('bureau');

INSERT INTO `referentexterieur` (`nom`, `prenom`, `telephone`, `mail`) VALUES
('Pussault', 'Pierre', '0621477', 'pierre@gmail.com'),
('Tanchereau', 'Victor', '0621477', 'victor@gmail.com'),
('Abraham', 'Nathan', '0621477', 'nathan@gmail.com'),
('Martin', 'Coline', '0621477', 'coline@gmail.com'),
('Pereira', 'Michael', '0621477', 'mik@gmail.com');

INSERT INTO `localite` (`ville`, `pays`, `codePostale`) VALUES
('Lorient', 'France', '56100'),
('Ploemeur', 'France', '56270'),
('Morea', 'Tahiti', '99'),
('Paris', 'France', '75000'),
('Saint-Herblain', 'France', '44800');


INSERT INTO `grouperole` (`fk_groupe`, `fk_role`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 4);

INSERT INTO `adresse` (`rue1`, `rue2`, `complement`, `fk_localite`) VALUES
('alle michel fourniret', NULL, NULL, 1),
('alle francois fion', NULL, NULL, 2),
('alle alain raté', NULL, NULL, 3),
('alle claude cramé', NULL, NULL, 4),
('alle balavoine hélico', NULL, NULL, 5);


INSERT INTO `membre` (`mail`, `nom`, `prenom`, `dateNaissance`, `telephone`, `login`, `motDePasse`, `fk_instrument`, `fk_adresse`, `fk_groupe`) VALUES
('gmail@gmail.com', 'Raulo', 'Erwan', '1991-11-08 00:00:00', '0621494336', 'log1 ', md5('log1'), 1, 1, 1),
('gmail@gmail.com', 'Guillaume', 'Adrien', '1991-10-08 00:00:00', '062148256', 'log2 ', md5('log2'), 2, 2, 1),
('gmail@gmail.com', 'Meneghin', 'Jean-Pierre', '1991-06-08 00:00:00', '0621842336', 'log3 ', md5('log3'), 3, 3, 2),
('gmail@gmail.com', 'Wakedman', 'Erwan', '1991-05-08 00:00:00', '063654336', 'log4 ', md5('log4'), 4, 4, 2),
('gmail@gmail.com', 'Cohuet', 'Kilian', '1991-12-08 00:00:00', '062141026', 'log5 ', md5('log5'), 5, 5, 2);


INSERT INTO `membrerole` (`fk_membre`, `fk_role`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 4);

INSERT INTO `actualite` (`titre`, `image`, `description`, `date`, `fk_membre`) VALUES
('Concours', 'image', 'resultats concours lorient 2017', '2017-07-21 00:00:00', 1),
('Fete du slip', 'myPath', 'soirée cuir et moustache', '2017-06-15 00:00:00', 1);


INSERT INTO `evenement` (`nom`, `dateDebut`, `dateFin`, `cachet`, `description`, `image`, `valider`, `fk_adresse`, `fk_type`, `fk_membre`, `fk_referentExterieur`) VALUES
('HellFest', '2017-06-16 00:00:00', '2017-06-17 00:00:00', 1000, 'festoch', 'myPath', 1, 1, 1, 3, 1),
('Concours Lorient 2017', '2017-08-05 00:00:00', '2017-08-06 00:00:00', 2000, 'concours national des bagadou ', 'myPath', 0, 2, 3, 3, 2),
('Reunion commission musicale', '2017-10-01 00:00:00', '2017-10-01 00:00:00', null, 'reflechir au programme de l\'année suivante', 'myPath', 0, 3, 5, 3, 3);



INSERT INTO `participant` (`fk_reponce`, `fk_membre`, `fk_evenement`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 4, 1),
(1, 5, 1);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
