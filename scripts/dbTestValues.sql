SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

USE WESHARE;
--
-- Base de données: `weshare`
--

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(1, '2012-04-18', 'Dacove', '1234', 'tresson@intechinfo.fr', 'Tresson', 'Ludovic', '0000-00-00', 'somewhere else', 'epinay', 'france', '0612143720', 'http://image.noelshack.com/fichiers/2012/17/1335530261-Dacove-Copie-Copie.jpg');
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(10, '2012-04-19', 'Froutch', '12345', 'aarnal@intechinfo.fr', 'Arnal', 'Alexandre', '1991-05-03', 'same as the guy before me', 'blablaville', 'france', '0000000000', 'http://www.mypokecard.com/fr/Galerie/my/galery/S263jyPNfCli.jpg');
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(11, '2012-04-20', 'Proust', '12345', 'proust@intechinfo.fr', 'Proust', 'François', '0000-00-00', '37 rip', 'moon', 'france', '0101010101', 'http://www.cabourg.net/IMG/arton54.jpg');
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(12, '2012-04-20', 'Ricard', '12345', 'ricard@intechinfo.fr', 'Ricard', 'Vincent', '1992-05-03', '37 rue picard', 'Paris', 'France', '0202020202', 'http://www.weimax.com/images/Ricard_Vincent_Pouring_Tastes.jpg');
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(13, '2012-04-23', 'Lambda', 'Lambda', 'Lambda', '', '', '0000-00-00', '', '', '', '0', NULL);
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(14, '2012-04-23', 'azerty', 'azerty', 'azerty@azerty.az', 'gerard', '', '0000-00-00', '0123456789', '', '', '0', NULL);
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(16, '2012-04-23', 'cico', 'ccc', 'ccc', '', '', '0000-00-00', '', '', '', '0', NULL);
INSERT INTO `users` (`IdUser`, `RegisterDate`, `Pseudo`, `Password`, `Mail`, `LastName`, `FirstName`, `BornDate`, `Address`, `City`, `Country`, `Phone`, `Avatar`) VALUES(17, '2012-04-24', 'aaa', 'aaa', 'aaa', '', '', '0000-00-00', '', '', '', '0', NULL);

--
-- Contenu de la table `friends`
--

INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(10, 1, 1);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(14, 1, 1);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(14, 10, 0);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(14, 11, 0);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(11, 10, 0);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(11, 1, 1);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(1, 10, 1);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(1, 11, 1);
INSERT INTO `friends` (`IdUser`, `IdFriend`, `Status`) VALUES(1, 14, 1);

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`IdMovie`, `Name`, `Synopsis`, `Runtime`, `DateOfRelease`, `Poster`) VALUES(1, 'Transformers', 'des robots qui veulent détruirent le monde (enfin non mais bon c''est compliquer)', '01:50:00', 2007, 'http://upload.wikimedia.org/wikipedia/en/thumb/6/66/Transformers07.jpg/220px-Transformers07.jpg');
INSERT INTO `movies` (`IdMovie`, `Name`, `Synopsis`, `Runtime`, `DateOfRelease`, `Poster`) VALUES(2, 'Avatar', 'Les Schtroumpfs en balade dans la galaxie', '02:20:00', 2009, 'http://ia.media-imdb.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1._SY317_CR0,0,214,317_.jpg');
INSERT INTO `movies` (`IdMovie`, `Name`, `Synopsis`, `Runtime`, `DateOfRelease`, `Poster`) VALUES(3, 'Inception', 'Inception[Inception[Inception[Inception[Inception[Inception[Inception[Inception[]]]]]]]]', '01:40:00', 2010, 'http://ia.media-imdb.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1._SY317_.jpg');


--
-- Contenu de la table `staffs`
--

INSERT INTO `staffs` (`IdStaff`, `LastName`, `FirstName`, `BornDate`, `Bio`, `Picture`) VALUES(1, 'DiCaprio', 'Leonardo', '1974-11-11', 'Leonardo DiCaprio, né le 11 novembre 1974 à Los Angeles en Californie, est un acteur, scénariste et producteur de cinéma américain.', 'http://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/LeonardoDiCaprioNov08.jpg/220px-LeonardoDiCaprioNov08.jpg');
INSERT INTO `staffs` (`IdStaff`, `LastName`, `FirstName`, `BornDate`, `Bio`, `Picture`) VALUES(2, 'Cameron', 'James', '1954-08-16', 'James Francis Cameron est un réalisateur, scénariste et producteur canadien, né le 16 août 1954 à Kapuskasing (Ontario, Canada). Il a réalisé, écrit ou produit les films Terminator (1984), Aliens, le retour (1986), Abyss (1989), Terminator 2 (1991), True Lies (1994), Titanic (1997), Les fantômes du Titanic (2003) et Avatar (2009).', 'http://upload.wikimedia.org/wikipedia/commons/thumb/5/50/JamesCameronDec09.jpg/220px-JamesCameronDec09.jpg');
INSERT INTO `staffs` (`IdStaff`, `LastName`, `FirstName`, `BornDate`, `Bio`, `Picture`) VALUES(3, 'Fox', 'Megan', '1986-05-16', 'Megan Denise Fox, née le 16 mai 1986 à Oak Ridge dans le Tennessee, est une actrice, mannequin et comédienne de doublage américaine.', 'http://upload.wikimedia.org/wikipedia/commons/thumb/0/06/MeganFoxTIFFSept2011.jpg/220px-MeganFoxTIFFSept2011.jpg');
INSERT INTO `staffs` (`IdStaff`, `LastName`, `FirstName`, `BornDate`, `Bio`, `Picture`) VALUES(4, 'Worthington', 'Sam', '1976-08-02', 'Sam Worthington, né Samuel Henry J. Worthington le 2 août 1976 à Godalming dans le Surrey au Royaume-Uni, est un acteur australien connu notamment pour ses rôles dans les films Terminator Renaissance, Avatar et Le Choc des Titans.', 'http://upload.wikimedia.org/wikipedia/commons/c/c2/Sam.worthington.gif');
INSERT INTO `staffs` (`IdStaff`, `LastName`, `FirstName`, `BornDate`, `Bio`, `Picture`) VALUES(5, 'Cotillard', 'Marion', '1975-09-30', 'Marion Cotillard, née le 30 septembre 1975 à Paris3, est une actrice française dont la carrière est internationale. En 2008, elle remporte de nombreuses récompenses grâce à son interprétation d''Edith Piaf dans le film La Môme , dont un César, un Golden Globe, un BAFTA et un Oscar. Elle devient la troisième Française à être désignée « meilleure actrice » par la prestigieuse Académie hollywoodienne des Oscars, après Claudette Colbert en 1935 et Simone Signoret en 1960. Ce prix lui ouvre les portes des studios outre-Atlantique et lui permet de tourner avec de grands réalisateurs américains et britanniques (Michael Mann, Woody Allen, Rob Marshall, Christopher Nolan...).', 'http://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Marion_Cotillard_1_%28July_2009%29.jpg/220px-Marion_Cotillard_1_%28July_2009%29.jpg');

--
-- Contenu de la table `moviesmarks`
--

INSERT INTO `moviesmarks` (`IdMovie`, `IdUser`, `Mark`, `UserComment`) VALUES(1, 1, 3, 'C''est cool');
INSERT INTO `moviesmarks` (`IdMovie`, `IdUser`, `Mark`, `UserComment`) VALUES(2, 10, 0, 'm''ok');
INSERT INTO `moviesmarks` (`IdMovie`, `IdUser`, `Mark`, `UserComment`) VALUES(3, 11, 5, NULL);

--
-- Contenu de la table `moviesstaffs`
--

INSERT INTO `moviesstaffs` (`IdMovie`, `IdStaff`, `StaffWork`) VALUES(1, 3, 'acteur');
INSERT INTO `moviesstaffs` (`IdMovie`, `IdStaff`, `StaffWork`) VALUES(3, 1, 'acteur');
INSERT INTO `moviesstaffs` (`IdMovie`, `IdStaff`, `StaffWork`) VALUES(2, 4, 'acteur');
INSERT INTO `moviesstaffs` (`IdMovie`, `IdStaff`, `StaffWork`) VALUES(2, 2, 'realisateur');
INSERT INTO `moviesstaffs` (`IdMovie`, `IdStaff`, `StaffWork`) VALUES(3, 5, 'acteur');

--
-- Contenu de la table `usermovies`
--

INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(1, 1, 'cd', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(1, 2, 'fichier', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(1, 3, 'fichier', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(10, 2, 'blue-ray', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(11, 1, 'dvd', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(13, 1, 'cd', 1);
INSERT INTO `usermovies` (`IdUser`, `IdMovie`, `Support`, `Available`) VALUES(14, 2, 'blue-ray', 1);

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`IdGroup`, `Name`, `IdCreator`) VALUES (1, 'blablateurs', 1);

--
-- Contenu de la table `moviesmarks`
--

INSERT INTO `moviesmarks` (`IdMovie`, `IdUser`, `Mark`, `UserComment`) VALUES (1, 1, 3, 'C''est cool'), (2, 10, 0, 'm''ok'), (3, 11, 5, NULL);

--
-- Contenu de la table `usergroups`
--

INSERT INTO `usergroups` (`IdUser`, `IdGroup`) VALUES (1, 1), (10, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
