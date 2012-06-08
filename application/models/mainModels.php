<?php
/*
Fonction qui trouve si l'utilisateur est connecté

retourne l'utilisateur si il est trouver.
auteur: Ludovic Tresson
*/
function getUser()
{
	session_start();
	if (isset($_SESSION["User"]))
	{
		return $_SESSION["User"];
	}
	else
	{
		return;
	}
}


/* 
Cette fonction sert à se connecter à la base de donnée

$error (S): int : 
0 -> pas d'erreurs
1 -> Connexion impossible à la bdd ;
2 -> Selection impossible de la bdd ;

$link (S) : retourne le lien de mysql_connect()

Auteur: Vincent Ricard
Modifié par: Ludovic Tresson (ajout erreur(0|2)/constantes de la bdd)
*/
function dbConnect ()
{
	static $link = null;
	if ($link === null)
	{
		$error = 0;
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		if (empty($link))
		{
			die("Impossible de se connecter : " . mysql_error());
			$error = 1;
			return ($error);
		}
		else
		{
			$db_selected = mysql_select_db('WeShare', $link);
			if (empty($db_selected))
			{
				die("Impossible de sélectionner la base de données : " 
				. mysql_error());
				$error = 2;
				return ($error);
			}
		}
	}
	return ($link);
}

/* 
La fonction register sert à enregistrer l'utilisateur dans la base de donnée.
$register_pseudo,
$register_password, 
$register_retypePassword,
$register_email,
$register_lastName,
$register_firstName,
$register_day,
$register_month,
$register_year,
$register_address,
$register_city,
$register_country,
$register_phoneNumber

$error[] (S): array 
[0|1|2|3]=>0	: OK 
  [0|1|2]=>1	: trop long ;
      [3]=>1	: erreur requête invalide/problème avec la BDD;
    [0|2]=>2	: pseudo/mail déjà utilisé;
      [1]=>2	: mot de pass ne correspondent pas;


Auteur: Vincent Ricard
Réecriture complète par Ludovic Tresson
*/
function register($register_pseudo,
		$register_password, 
		$register_retypePassword,
		$register_email,
		$register_lastName,
		$register_firstName,
		$register_day,
		$register_month,
		$register_year,
		$register_address,
		$register_city,
		$register_country,
		$register_phoneNumber)
{
	$error[0] = 0;
	$error[1] = 0;
	$error[2] = 0;
	$error[3] = 0;
	
	//verif pseudo
	$S_result = mysql_query("SELECT Pseudo FROM Users
						WHERE Pseudo='" . $register_pseudo . "'", dbConnect());
	$S_isPseudoInUse = mysql_num_rows($S_result);
	if ($S_result == false)
	{
		$error[3] = 1;
		echo "coucou1";
	}
	
	if (strlen($register_pseudo) > 33)
	{
		$error[0] = 1;
	}
	elseif ($S_isPseudoInUse == 1)
	{
		$error[0] = 2;
	}
	
	//verif pass
	if (strlen($register_password) > 61)
	{
		$error[1] = 1;
	}
	elseif($register_password != $register_retypePassword)
	{
		$error[1] = 2;
	}
	
	//verif mail
	$S_result = mysql_query("SELECT Mail FROM Users
						WHERE Mail='" . $register_email . "'", dbConnect());
	$S_isMailInUse = mysql_num_rows($S_result);
	if ($S_result == false)
	{
		$error[3] = 1;
		echo "coucou2";
	}
	
	if (strlen($register_email) > 211)
	{
		$error[2] = 1;
	}
	elseif($S_isMailInUse == 1)
	{
		$error[2] = 2;
	}
	
	
	$register_bornDate = '';
	$register_bornDate = $register_year."-".$register_month."-".$register_day;
	//enregistrement dans la bdd
	if($error[0] == 0 && $error[1] == 0 && $error[2] == 0)
	{
		$S_query = sprintf("INSERT INTO Users
						(RegisterDate, Pseudo, Password, Mail, LastName,
							FirstName, BornDate, Address, City, Country, Phone)
						VALUES ('%s', '%s', '%s', '%s', '%s',
								'%s', '%s', '%s', '%s', '%s', '%s')", 
						date("y-m-d"),
						$register_pseudo,
						$register_password,
						$register_email,
						$register_lastName,
						$register_firstName,
						$register_bornDate,
						$register_address,
						$register_city,
						$register_country,
-						$register_phoneNumber);
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			$error[3] = 1;
		echo "coucou3";
		}
	}
	mysql_close();
	return ($error);
}

/* 
Fonction qui permet de se connecter
$error = 1; ---> Pseudo ou Mot de passe incorrect

auteur : Alexandre Arnal.
*/
function connect($pseudo, $pass)
{
	$error = 0;
	
	$S_query = "SELECT Pseudo, Password FROM Users 
					WHERE Pseudo = '".$pseudo."' AND Password = '".$pass."'";  

	$S_result = mysql_query($S_query,dbConnect()) or die(mysql_error());

	// Création du tableau associatif du résultat
	$S_info = mysql_fetch_assoc($S_result);

	// Les valeurs (si elles existent) sont retournées dans le tableau $info;
	if (isset($S_info['Pseudo']) && isset($S_info['Password'])) 
	{
		@session_start();
		$_SESSION['User'] = $pseudo;
	}
	else
	{   
		$error = 1;
	}
	mysql_close();
	return $error;
}

/*
Fonction permettant de lister les membres

$membres (S): array contenant les pseudo et date d'inscription des membres,
					retourne -1 si il y a une erreur

auteur : Ludovic Tresson
*/
function getMember($userPseudo)
{
	/* on cherche a savoir l'id de la personne qui fais la requete 
		(sert a savoir les liens d'amitié)*/

	$userId = getId($userPseudo);
	$membres = "";
	
	$S_query = ("SELECT U.IdUser, U.Pseudo, U.RegisterDate, F.Status 
				FROM Users AS U 
				LEFT JOIN Friends AS F
				ON (U.IdUser = F.IdFriend AND F.IdUser = '".$userId."')
				WHERE U.IdUser != '".$userId."'
				ORDER BY U.Pseudo");
	$S_result = mysql_query($S_query, dbConnect());
	$S_nbRow = mysql_num_rows($S_result);
	if ($S_nbRow == false)
	{
		return -1;
	}
	for ($i=0;$i< $S_nbRow;$i++)
	{
		$membres[] = mysql_fetch_assoc($S_result);
		$membres[$i]['RegisterDate']= formateDate($membres[$i]['RegisterDate']);
	}
	mysql_close();
	return $membres;
}

/*
fonction qui transforme la date de yyyy-mm-dd a dd/mm/yyyy-mm-dd

auteur : Ludovic Tresson
*/
function formateDate($date)
{
	list($year, $month, $day) = explode('-', $date);
	$newDate = $day."/".$month."/".$year;
	
	return $newDate;
}

/*
fonction qui transforme l'heure en fonction d'un format
$format :	0 -> HH/MM/SS
			1 -> HH/MM
			2 -> HHhMMmSSs
			3 -> HHmMM

auteur : Ludovic Tresson
*/
function formateHour($hour,$format)
{
	list($HH, $MM, $SS) = explode(':', $hour);
	switch($format)
	{
		case "0":
			$newtime = $HH."/".$MM."/".$SS;
		break;
		case "1":
			$newtime = $HH."/".$MM;
		break;
		case "2":
			$newtime = $HH."h".$MM."m".$SS."s";
		break;
		case "3":
			$newtime = $HH."h".$MM;
		break;
	}
	return $newtime;
}
/*
fonction qui transforme la date de "yyyy-mm-dd HH:MM:SS" a "dd/mm/yyyy, HHhMM"

auteur : Ludovic Tresson
*/
function formateDateTime($date)
{
	list($year,$hour) = explode(' ', $date);
	$year = formateDate($year);
	$hour = formateHour($hour,'3');
	$time = $year.", ".$hour;
	return $time;
}

/* 
Fonction qui permet de se deconnecter

auteur : Alexandre Arnal.
*/
function disconnect()
{
// On appelle la session 

@session_start(); 
 
// On écrase le tableau de session 

$_SESSION = array(); 
 
// On détruit la session 

session_destroy();  
}

/*
fonction pour faire une demande d'amis

retourne :	0 si ok
			1 si pb de connection bdd
			2 si déjà existant
auteur : Ludovic Tresson
*/
function requestFriendship($userId, $newFriend)
{
	//on cherche si l'amis n'est pas déjà rentrer
	$S_query = ("SELECT U.IdUser, F.Status
			FROM Users AS U
			LEFT JOIN Friends AS F ON (F.IdFriend = '".$newFriend."' AND F.IdUser = '".$userId."')
			WHERE U.IdUser = '".$userId."'");
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		return 1;
	}
	$S_exist[] = mysql_fetch_assoc($S_result);
	
	//si il existe deja alors $S_exist[0] existe 
							//mais $S_exist[0]['Status'] n'existe pas
	if((isset($S_exist[0]) && $S_exist[0]['Status'] == null))
	{
		$S_query = ("INSERT INTO Friends (IdUser, IdFriend, Status)
						VALUES ('".$userId."','".$newFriend."','0')");
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return 1;
		}
	}
	else
	{
		return 2;
	}
	return 0;
}

function getProfil($user)
{
	$S_query = ("SELECT * 
				FROM Users
				HAVING Pseudo = '".$user."'");
				
	$S_result = mysql_query($S_query, dbConnect());

	$profil = mysql_fetch_assoc($S_result);
	if ($profil == false)
	{
		return -1;
	}
	$profil['RegisterDate'] = formateDate($profil['RegisterDate']);
	$profil['BornDate'] = formateDate($profil['BornDate']);

	mysql_close();
	return $profil;
}


function getId($pseudo)
{
	$S_query = ("SELECT * FROM Users HAVING Pseudo = '".$pseudo."'");
				
	$S_result = mysql_query($S_query, dbConnect());
	$S_user = mysql_fetch_assoc($S_result);
	if ($S_user == false)
	{
		return -1;
	}
	return $S_user['IdUser'];
}

function getPseudo($IdUser)
{
	$S_query = ("SELECT * FROM Users HAVING IdUser ='".$IdUser."'");
				
	$S_result = mysql_query($S_query, dbConnect());
	$S_user = mysql_fetch_assoc($S_result);
	if ($S_user == false)
	{
		return -1;
	}
	return $S_user['Pseudo'];
}

function getFriends($idUser)
{
	$S_friend = false;
	$S_query = ("SELECT U.Pseudo,U.IdUser FROM Users AS U
					LEFT JOIN Friends AS F
					ON U.IdUser = F.IdFriend AND F.IdUser = '".$idUser."'
					WHERE F.Status = 1");
	$S_result = mysql_query($S_query, dbConnect());
	$S_nbRow = mysql_num_rows($S_result);
	if ($S_nbRow == false)
	{
		return -1;
	}
	
	for ($i=0;$i< $S_nbRow;$i++)
	{
		$S_friend[] = mysql_fetch_assoc($S_result);
	}
	
	if($S_friend == false)
	{
		return -1;
	}
	return $S_friend;
}

function getFriendshipRequest($idUser)
{
	$S_friendRequest = false;
	$S_query = ("SELECT U.Pseudo,U.IdUser FROM Users AS U
					LEFT JOIN Friends AS F
					ON U.IdUser = F.IdUser AND F.IdFriend = '".$idUser."'
					WHERE F.Status = 0");
	$S_result = mysql_query($S_query, dbConnect());
	$S_nbRow = mysql_num_rows($S_result);
	if ($S_nbRow == false)
	{
		return -1;
	}
	for ($i=0;$i< $S_nbRow;$i++)
	{
		$S_friendRequest[] = mysql_fetch_assoc($S_result);
	}
	//si il n'y a pas de résultat on sort prématurément en retournant -1
	if($S_friendRequest == false)
	{
		return -1;
	}
	
	return $S_friendRequest;
}
/*

$type (E) : type de la requete, 0 = tout,
								1 = tout les films, 
								2 = tout le staff ,
								3 = film en particulier, 
								4 = staff en particulier
*/
function searchData($type, $recherche)
{
	switch($type)
	{
		case "0":
			$S_query = ("SELECT * FROM Movies WHERE Name LIKE '%".$recherche."%'");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				$S_data[0] = -1;
			}
			else
			{
				while(($S_data[0][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[0]));
			}
			
			$S_query = ("SELECT * FROM Staffs WHERE LastName LIKE '%".$recherche."%' OR FirstName LIKE 'LIKE".$recherche."LIKE'");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				$S_data[2] = -1;
			}
			else
			{
				while(($S_data[1][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[1]));
			}
			break;
		case "1":
			$S_query = ("SELECT * FROM Movies");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				return -1;
			}
			while(($S_data[0][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[0]));
			break;
		case "2":
			$S_query = ("SELECT * FROM Staffs");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				return -1;
			}
			while(($S_data[1][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[1]));
			break;
		case "3":
			$S_query = ("SELECT * FROM Movies WHERE Name LIKE 'LIKE".$recherche."LIKE'");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				return -1;
			}
			while(($S_data[0][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[0]));
			break;
		case "4":
			$S_query = ("SELECT * FROM Staffs WHERE Name LIKE 'LIKE".$recherche."LIKE'");
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result== false)
			{
				return -1;
			}
			while(($S_data[1][] = mysql_fetch_assoc($S_result)) || array_pop($S_data[1]));
			break;
	}
	return $S_data;
}

function replyToFriendship($userId, $friendId, $status)
{
	$S_query = ("UPDATE Friends
				SET Status = '".$status."'
				WHERE IdUser ='".$friendId."' AND IdFriend = '".$userId."'");
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		return 1;
	}
	
	//ajout d'une autre entré pour que l'on soit amis des deux cotés
	if($status == 1)
	{
		$S_query = ("INSERT INTO Friends (IdUser, IdFriend, Status)
						VALUES ('".$userId."','".$friendId."','1')");
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return 1;
		}
	}
	//suppression d'un ami
	if($status == 0)
	{
		$S_query = ("DELETE FROM Friends
					WHERE IdUser ='".$userId."' AND IdFriend = '".$friendId."'");
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return 1;
		}
	}
}

/* 
La fonction changeProfil sert à entrer le(s) modification(s) des données utilisateur, faite(s) par lui-même, dans la base de donnée.
$IdUser, 
$FirstName, 
$LastName, 
$Password, 
$RetypePwd, 
$Mail, 
$BornDate, 
$address, 
$City, 
$Country, 
$Phone, 
$Avatarr

$error (S): int 
0	: OK 
1	: trop long ;
2	: erreur requête invalide/problème avec la BDD;
3	: numéro de téléphone trop long ou trop court
4	: erreur format image avatar invalide
5	: la confirmation du mot de passe a échoué
Auteur: Vincent Ricard avec l^heureuse participation partielle mais utile de Tresson. Merci à lui.
*/

function changeProfil($IdUser, $FirstName, $LastName, $Password, $RetypePwd, $Mail, 
					   	 $BornDate, $address, $City, $Country, $Phone, $Avatar)
{
	$error = 0;
	if (!empty($FirstName))
	{
		if (strlen($FirstName) < 20)
		{
			$S_query = sprintf("UPDATE USERS SET FirstName = '%s' 
							 WHERE IdUser = %d",
							 $FirstName, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (isset($LastName))
	{
		if (strlen($LastName) < 20)
		{
			$S_query = sprintf("UPDATE USERS SET LastName = '%s' 
							WHERE IdUser = %d",
							$LastName, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($Password))
	{
		if (strlen($Password) < 61)
		{
			if ($Password != $RetypePwd)
			{
				$error = 5;
			}
			else
			{
				$S_query = sprintf("UPDATE USERS SET Password = '%s'
								 WHERE IdUser = %d",
								$Password, $IdUser);
				$S_result = mysql_query($S_query, dbConnect());
				if ($S_result == false)
				{
					$error = 2;
				}
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($Mail))
	{
		if (strlen($Mail) < 211)
		{
			$S_query = sprintf("UPDATE USERS SET Mail = '%s' 
							 WHERE IdUser = %d",
							$Mail, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($BornDate))
	{
		$S_query = sprintf("UPDATE USERS SET BornDate = '%s' 
						 WHERE IdUser = %d",
						$BornDate, $IdUser);
		$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 1;
			}
	}
	if (!empty($address))
	{
		if (strlen($address) < 211)
		{
			$S_query = sprintf("UPDATE USERS SET address = '%s' 
							WHERE IdUser = %d",
							$address, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($City))
	{
		if (strlen($City) < 60) // voir http://fr.wikipedia.org/wiki/Llanfairpwllgwyngyllgogerychwyrndrobwllllantysiliogogogoch
		{
			$S_query = sprintf("UPDATE USERS SET City = '%s' 
							 WHERE IdUser = %d",
							$City, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($Country))
	{
		if (strlen($Country) < 31)
		{
			$S_query = sprintf("UPDATE USERS SET Country = '%s' 
							 WHERE IdUser = %d",
							$Country, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($Phone))
	{
		if (strlen($Phone) == 10)
		{
			$S_query = sprintf("UPDATE USERS SET Phone = '%s' 
							 WHERE IdUser = %d",
							 $Phone, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 3;
		}
	}
	if (!empty($Avatar))
	{
		if (stristr($Avatar, ".jpg") || stristr($Avatar, ".jpeg") 
		 || stristr($Avatar, ".gif") || stristr($Avatar, ".png")
		 || stristr($Avatar, ".bmp"))
		{
			$S_query = sprintf("UPDATE USERS SET Avatar = '%s' 
							 WHERE IdUser = %d",
							 $Avatar, $IdUser);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = 2;
			}
		}
		else
		{
			$error = 4;
		}
	}
return ($error);
}

/*
La fonction getEvents permet de récupérer le(s) événement(s) concernant
l'utilisateur, qu'il en soit le créateur ou qu'il y soit invité.

$Events

$Events (S): int
-1	:	Il n'y a aucun événement concernant l'utilisateur
-2	:	erreur requête invalide/problème avec la BDD
$Events[2] (S): tableau contenant deux tableaux associatif contenant 
tous les événements en question

Auteur : Vincent Ricard
*/

function	getEvents($IdUser)
{
// Requête pour récupérer les évenements que l'utilisateur a créé
	$S_query = sprintf("SELECT * FROM Events WHERE IdOrganizer = '%d'",
					 $IdUser);
	
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		return -2;
	 }
	while(($Events[0][] = mysql_fetch_assoc($S_result)) || array_pop($Events[0]));

// Requête pour récupérer les évenements auxquelles participe l'utilisateur 	
	$S_query = sprintf("SELECT EI.IdEvent, EI.IdUser, EI.Status, E.IdOrganizer, 
					  E.DateOfEvent, E.Address, E.City
					  FROM EventsInvitations AS EI
					  LEFT JOIN Events AS E ON E.IdEvent = EI.IdEvent
					  WHERE IdUser = '%d'", 
					  $IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		return -2;
	 }
	while(($Events[1][] = mysql_fetch_assoc($S_result)) || array_pop($Events[1]));
return ($Events);
}

/*
La fonction createEvent permet à l'utilisateur de créer un événement.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function createEvent($IdUser, $DateOfEvent, $Address, $City, $Status)
{
	$error = 0;

	// Requête qui ajoute un événement et qui met l'utilisateur en tant que créateur
	$S_query = sprintf("INSERT INTO Events 
				  (DateOfEvent, Address, City, CreationDate, IdOrganizer) 
				  VALUES ('%s', '%s', '%s', '%s', '%d')",
				  $DateOfEvent,
				  $Address,
				  $City,
				  date("y-m-d"),
				  $IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		$error = 1;
	 }
	 
	// Requête qui récupère l'IdEvent de l'événement qui vient d'être créé
	$S_query = sprintf("SELECT LAST_INSERT_ID()");
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		$error = 1;
	 }
	 $IdEvent = mysql_fetch_row($S_result);
	// Requête qui ajoute l'utilisateur, par défaut, à la liste des participants
	$S_query = sprintf("INSERT INTO EventsInvitations (IdEvent, IdUser, Status) 
					  VALUES ('%d', '%d', '%d')", 
					  $IdEvent[0], $IdUser, $Status);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		$error = 1;
	 }
	return ($error);
}

/*
Permet de récuperer les infos d'un film. (général)
$IdMovie (E) id du film
$S_data (S) info du film

Auteur : Ludovic Tresson
*/
function getMovie($idMovie)
{
	$S_query = ("SELECT * FROM Movies WHERE idMovie = '".$idMovie."'");
	$S_result = mysql_query($S_query, dbConnect());
	$S_data = mysql_fetch_assoc($S_result);
	if ($S_data == false)
	{
		return -1;
	}
	return $S_data;
}
/*
Permet de récuperer les infos d'un film.(staff du film)
$IdMovie (E) id du film
$S_data (S) info du film

Auteur : Ludovic Tresson
*/
function getMovieStaff($idMovie)
{
	$S_query = ("SELECT S.IdStaff, S.LastName, S.FirstName, M.StaffWork 
				FROM MoviesStaffs AS M 
				LEFT JOIN Staffs AS S
				ON M.IdStaff = S.IdStaff
				WHERE M.idMovie = '".$idMovie."'");
	$S_result = mysql_query($S_query, dbConnect());
	
	//essaie d'une nouvelle methode fetch tout les résultats
	while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
	if ($S_data == false)
	{
		return -1;
	}
	
	return $S_data;
}
/*
Permet de récuperer les infos d'un film.(supports dispo)
$IdMovie (E) id du film
$S_data (S) info du film

Auteur : Ludovic Tresson
*/
function getMovieSupport($idMovie)
{
	$S_query = ("SELECT Support, SUM(Available) AS Quantity
				FROM UserMovies 
				WHERE idMovie = '".$idMovie."'
				GROUP BY Support");
	$S_result = mysql_query($S_query, dbConnect());
	while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
	if ($S_result== false)
	{
		return -1;
	}
	return $S_data;
}
/*
fonction générant des morceaux d'url correct a partir d'un string quelconque.

Auteur : Ludovic Tresson
*/
function generateUrl ($url) {
  //on convertie les caractères accentué
  $from = explode (',', "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,(,),[,],'");
  $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
  //on convertie tout le reste par des -
  $url = preg_replace ('~[^\w\d]+~', '-', str_replace ($from, $to, trim ($url)));
  //on enlève les - en trop et on met tout en minuscule
  return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $url)));
}


/*
	Fonction qui permet de rajouter un film
	Auteur : ARNAL Alexandre + Ludo
	Dernière mise a jour : 26/04/2012
*/

function addMovie($name, $synopsis, $DateOfRelease, $Poster)
{

	$error[0] = 0;
	$error[1] = 0;
	$error[2] = 0;
	$error[3] = 1;
	if (strlen ($name) > 81)
	{
		$error[0] = 1;
	}
	if (strlen ($synopsis) > 2500)
	{
		$error[1] = 1;
	}
	if ($DateOfRelease > 2500 || $DateOfRelease < 1700)
	{
		$error[2] = 1;
	}
	if (stristr($Poster, ".jpg") || stristr($Poster, ".jpeg") 
		 || stristr($Poster, ".gif") || stristr($Poster, ".png")
		 || stristr($Poster, ".bmp"))
	{
		$error[3] = 0;
	
	}
	if ($error[0] == 0 && $error[1] == 0 && $error[2] == 0 && $error[3] == 0)
	{
			$S_query = sprintf("INSERT INTO Movies (Name, Synopsis, DateOfRelease, Poster)
								VALUES ('%s','%s','%d','%s')",
							 $name, $synopsis, $DateOfRelease, $Poster);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				return ($error);
			}
	}
	else
	{
		return ($error);
	}
}

/*
	Fonction qui permet de supprimer un film du site
	Auteur : ARNAL Alexandre
	Dernière mise a jour : 02/05/2012
*/

function deleteMovie($MovieId)
{
	$S_query = ("DELETE FROM Movies
				WHERE IdMovie ='".$MovieId."'");
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		return 1;
	}
}

/* 
La fonction editMovie sert à entrer le(s) modification(s) des films dans la base de donnée.
$name, 
$synopsis, 
$DateOfRelease, 
$Poster,
 
$error (S): int 
				0	: OK 
				1	: trop long ;
				2	: erreur requête invalide/problème avec la BDD;
				3	: erreur format image avatar invalide ;
				Auteur: ARNAL Alexandre
*/

function editMovie($IdMovie, $Name, $synopsis, $DateOfRelease, $Runtime, $Poster)
{
	$error = 0;
	if (!empty($Name))
	{
		if (strlen($Name) < 55)
		{
			$S_query = sprintf("UPDATE Movies SET Name = '%s' 
							 WHERE IdMovie = '%d'",
							 $Name, $IdMovie);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = -1;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (isset($synopsis))
	{
		if (!empty ($synopsis))
		{
			$S_query = sprintf("UPDATE Movies SET Synopsis = '%s' 
							WHERE IdMovie = '%d'",
							$synopsis, $IdMovie);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = -1;
			}
		}
		else
		{
			$error = 2;
		}
	}
	if (!empty($DateOfRelease))
	{
		if ($DateOfRelease < 2156 || $DateOfRelease > 1900)
		{
			$S_query = sprintf("UPDATE Movies SET DateOfRelease = '%d' 
							 WHERE IdMovie = '%d'",
							$DateOfRelease, $IdMovie);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = -1;
			}
		}
		else
		{
			$error = 3;
		}
		echo $DateOfRelease;
	}
	if (!empty($Runtime))
	{
		if (strlen($Runtime) != 0)
		{
			$S_query = sprintf("UPDATE Movies SET Runtime = '%s' 
							 WHERE IdMovie = '%d'",
							 $Runtime, $IdMovie);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = -1;
			}
		}
		else
		{
			$error = 4;
		}
	}
	if (!empty($Poster))
	{
		if (stristr($Poster, ".jpg") || stristr($Poster, ".jpeg") 
		 || stristr($Poster, ".gif") || stristr($Poster, ".png")
		 || stristr($Poster, ".bmp"))
		{
			$S_query = sprintf("UPDATE Movies SET Poster = '%s' 
							 WHERE IdMovie = '%d'",
							 $Poster, $IdMovie);
			$S_result = mysql_query($S_query, dbConnect());
			if ($S_result == false)
			{
				$error = -1;
			}
		}
		else
		{
			$error = 5;
		}
	}
	return ($error);
}

/*
La fonction deleteEvent permet à l'utilisateur de supprimer un événement
qu'il a créé et donc dont il est l'organisateur.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function deleteEvent($IdEvent)
{
	$error = 0;

// Requête qui supprime enfin l'événement dans la table "Events"
	$query = sprintf("DELETE FROM Events WHERE IdEvent = '%d'", $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}


/*
Fonction permettant de créer un groupe

Auteur : Ludovic Tresson
*/
function createGroup($IdUser, $groupName)
{
	$error = 0;
	$S_query = sprintf("INSERT INTO Groups 
						(Name, IdCreator) 
						VALUES ('%s', '%d')",
						$groupName,
						$IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		$error = 1;
	}
	return ($error);
}

/*
Fonction permettant de supprimer un groupe

Auteur : Ludovic Tresson
*/
function deleteGroup($IdUser, $groupId)
{
	$error = 0;
	$S_query = sprintf("DELETE FROM Groups 
						WHERE IdGroup ='%d' AND IdCreator = '%d' ",
						$groupId,
						$IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		$error = 1;
	}
	return ($error);
}

/*
Fonction permettant de trouver tout les groupes de l'utilisateurs (les groupes sont privés)

Auteur : Ludovic Tresson
*/
function getGroups($IdUser)
{
	$error = 0;
	$S_query = sprintf("SELECT * FROM Groups
						WHERE IdCreator = '%s'",
						$IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
	if ($S_data == false)
	{
		return -1;
	}
	return ($S_data);
}

/*
Fonction permettant de trouver les infos d'un groupe

Auteur : Ludovic Tresson
*/
function getGroup($IdGroup)
{
	$error = 0;
	$S_query = sprintf("SELECT *
						FROM Groups
						WHERE IdGroup = '%d'",
						$IdGroup);
	$S_result = mysql_query($S_query, dbConnect());
	$S_data = mysql_fetch_assoc($S_result);
	if ($S_data == false)
	{
		return -1;
	}
	return ($S_data);
}

/*
Fonction permettant de trouver tout les membres d'un groupe

Auteur : Ludovic Tresson
*/
function getGroupUser($IdGroup)
{
	$error = 0;
	$S_query = sprintf("SELECT U.IdUser, U.Pseudo
						FROM Groups AS G
						LEFT JOIN UserGroups AS UG
							ON G.IdGroup = UG.IdGroup
						LEFT JOIN Users AS U
							ON UG.IdUser = U.IdUser
						WHERE UG.IdGroup = '%d'",
						$IdGroup);
	$S_result = mysql_query($S_query, dbConnect());
	while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
	if ($S_data == false)
	{
		return -1;
	}
	return ($S_data);
}

function addMemberToGroup($IdGroup, $IdUser)
{
	$error = 0;
	// verif déjà existant ?
	$S_query = sprintf("SELECT IdUser, IdGroup
						FROM UserGroups
						WHERE IdUser ='%d' AND IdGroup ='%d'",
						$IdUser,
						$IdGroup);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		$error = 1;
	}

	if(mysql_fetch_assoc($S_result) == false)
	{
		$S_query = sprintf("INSERT INTO UserGroups
							(IdUser, IdGroup)
							VALUES ('%d', '%d')",
							$IdUser,
							$IdGroup);
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			$error = 1;
		}
	}
	return ($error);
}

function deleteMemberFromGroup($IdGroup, $IdUser)
{
	$error = 0;
	$S_query = sprintf("DELETE FROM UserGroups 
						WHERE IdUser = '%d' AND IdGroup = '%d'",
						$IdUser,
						$IdGroup);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		$error = 1;
	}
	return ($error);
}

function lastSqlAutoInc($table)
{
	$result = mysql_query("SHOW TABLE STATUS LIKE '$table'", dbConnect());
	$row = mysql_fetch_array($result);
	$nextId = $row['Auto_increment'];
	mysql_free_result($result);
	
	return $nextId;
}

/* La fonction getEvent permet de récupérer toutes les données pour un 
événement donné.

$Event

$Event (S): int
-1	:	l'événement n'existe pas
-2	:	erreur requête invalide/problème avec la BDD
$Events (S): tableau associatif contenant tous les données de l'événement 
en question

Auteur : Vincent Ricard
*/

function getEvent($IdEvent)
{
	$S_query = sprintf("SELECT * FROM Events HAVING IdEvent = '%d'",
					 $IdEvent);
	
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		return -2;
	 }
	$Event = mysql_fetch_assoc($S_result);
	return ($Event);
}

/*
$folder : 0 pour les recu, 1 pour les envoie
*/
function getMp($folder,$userId)
{
	if($folder == 0)
	{
		$S_query = sprintf("SELECT * FROM UserPMs AS UPM
							LEFT JOIN PMs AS PM
							ON UPM.IdPM = PM.IdPM
							WHERE IdUser = '%d'",
							$userId);
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return -1;
		}
		while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
		
		$rowCount = mysql_num_rows($S_result);
		if($rowCount != false)
		{
			for($i = 0;$i < $rowCount; $i++)
			{
				$S_data[$i]['mpUser'] = getPseudo($S_data[$i]['IdSender']);
			}
		}
	}
	elseif($folder == 1)
	{
		$S_query = sprintf("SELECT * FROM PMs WHERE IdSender='%d'",
							$userId);
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return -1;
		}
		while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
		
		$rowCount = mysql_num_rows($S_result);
		if($rowCount != false)
		{
			for($i = 0;$i < $rowCount; $i++)
			{
				$S_data[$i]['mpUser'] = getMPSendTo($S_data[$i]['IdPM']);
			}
		}
	}
	return($S_data);
}

function getMPSendTo($IdPM)
{
	$S_query = sprintf("SELECT Pseudo FROM UserPMs AS UPM 
						LEFT JOIN Users AS U 
						ON U.IdUser = UPM.IdUser 
						WHERE UPM.IdPM = '%d'",
						$IdPM);
	$S_result = mysql_query($S_query, dbConnect());
	while(($S_data[] = mysql_fetch_assoc($S_result)) || array_pop($S_data));
	if ($S_data == false)
	{
		return -1;
	}
	return($S_data);
}

function readMp($IdPM,$IdUser)
{
	
	$S_query = sprintf("SELECT * FROM PMs
						WHERE IdPM='%d' AND IdSender='%d'
						OR IdPM = (SELECT IdPM FROM UserPMs WHERE IdPM='%d' AND IdUser='%d' GROUP BY IdPM)",
						$IdPM,
						$IdUser,
						$IdPM,
						$IdUser);
	$S_result = mysql_query($S_query, dbConnect());
	$S_data = mysql_fetch_assoc($S_result);
	if ($S_data == false)
	{
		return -1;
	}
	return($S_data);
}

/*
La fonction changeStatusEvent permet à l'utilisateur de changer son status
sur un événement donné. Ainsi, il peut choisir entre
- refuser d'y participer
- accepter l'invitation
- se décider plus tard.

Cela concerne bien évidemment que les événements où il est invité
et non dont il serait l'organisateur.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0
*/
function changeStatusEvent($IdEvent, $IdUser, $Status)
{
	$error = 0;

	// Requête qui change le status de participation de l'utilisateur
	$query = sprintf("UPDATE EventsInvitations 
					  SET Status = '%d' 
					  WHERE IdEvent = '%d' AND IdUser = '%d'"
					  ,$Status, $IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	return ($error);
}

function sendMp($data,$IdSender)
{
	$rawUsers = explode(';',$data['users']);
	foreach($rawUsers as $key)
	{
		$userId = getId(trim($key));
		if(!empty($key) && $userId != -1)
		{
			$users[] = getId(trim($key));
		}
		else
		{
			$badUsers[] = $key;
		}
	}
	if(isset($badUsers) && count($badUsers) > 0)
	{
		return $badUsers;
	}
	$S_query = sprintf("INSERT INTO PMs
						(IdSender, Titre, Message, MessageDate)
						VALUES ('%d','%s','%s',NOW())",
						$IdSender,
						$data['titre'],
						$data['message']);
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	{
		return -1;
	}
	$insertId = mysql_insert_id();
	foreach($users as $key)
	{
	var_dump($key);
	var_dump($insertId);
		$S_query = sprintf("INSERT INTO UserPMs
							(IdUser, IdPM, ReadStatus)
							VALUES ('%d','%d','0')",
							$key,
							$insertId);
		$S_result = mysql_query($S_query, dbConnect());
		if ($S_result == false)
		{
			return -2;
		}
	}
	return 0;
}

/*
La fonction AddMovieToEvent permet l'utilisateur d'ajouter des films
à un événement qu'il a créé.

$error

$error (S): int§
-1	:	erreur requête invalide/problème avec la BDD;
0	:	OK
1	:	l'utilisateur veut ajouter un film déjà ajouté
Auteur : Vincent Ricard
*/

function addMovieToEvent($IdEvent, $IdMovie)
{
	$error = 0;

	// Requête permettant de voir si le film n'a pas déjà été ajouté
	$query = sprintf ("SELECT IdMovie FROM EventsSelections 
					   WHERE IdEvent = '%d' AND IdMovie = '%d'"
					   ,$IdEvent, $IdMovie);
	$result = mysql_query($query, dbConnect());
	$check = mysql_fetch_assoc($result); 
	if ($check != false)
	{
		return (1);
	}
	// Requête insérant un nouveau film à l'événement donné
	$query = sprintf("INSERT INTO EventsSelections 
					(IdEvent, IdMovie, NumberOfVote)   
					  VALUES ('%d', '%d', '%d')" 
					  ,$IdEvent, $IdMovie, '0');
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}

/*
La fonction getMovieEvent permet de récupérer le ou les films
ayant été ajouté(s) à un événement donné.

$error
$MovieEvent

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
-2	:	il n'y aucun film
$MovieEvent (S) : tableau associatif de int

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;
	$MovieEvent;
	$iterator = 0;
	
	// Requête récupérant la liste des événements
	$query = sprintf("SELECT IdMovie FROM EventsSelections WHERE IdEvent = '%d'" 
					 ,$IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	 else
	 {
		while(($MovieListEvent[] = mysql_fetch_assoc($result)) || array_pop($MovieListEvent));
		// while de parseur de récupéter toutes les données de chaque film par ID
		while (isset($MovieListEvent[$iterator]) && !empty($MovieListEvent[$iterator]))
		{
			 foreach ($MovieListEvent[$iterator] as $key)
			 {
				$MovieEvent[$iterator] = getMovie($key['IdMovie']);
			 }
			$iterator++;
		}
		return ($MovieEvent);
	}
	return (-2);
}

/*
La fonction removeMovieFromEvent permet à l'utilisateur de retirer un film
qu'il avait ajouté un événement dont il est l'organisateur.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0 	:	OK

Auteur : Vincent Ricard
*/

function removeMovieFromEvent($IdEvent, $IdMovie)
{
	$error = 0;
	
	// Requête retirant un film de l'événement donné
	$query = sprintf("DELETE FROM EventsSelections 
					  WHERE IdEvent = '%d' AND IdMovie = '%d'" 
					 ,$IdEvent, $IdMovie);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}

function deleteMP($IdPM,$IdSender)
{
	$error = 0;
	$query = sprintf("DELETE FROM PMs
					WHERE IdPM = '%d' AND IdSender = '%d'",
					$IdPM,
					$IdSender);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	{
		return (-1);
	}
	return ($error);
}
/*
La fonction getUserMovies permet de récupérer la liste des films appartenants
à l'utilisateur.

$error
$UserMovies

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
$UserMovies (S) : tableau associatif contenant les films appartenants à
l'utilisateur.

Auteur : Vincent Ricard
*/

function getUserMovies($IdUser)
{
	$UserMovies;
	$iterator = 0;
	
	// Requête récupérant les ID des films appartenants à l'utilisateur
	$query = sprintf("SELECT IdMovie FROM UserMovies WHERE IdUser = '%d'" 
					 ,$IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = -1;
		return ($error);
	 }
	while(($ListIDMovieUser[] = mysql_fetch_assoc($result)) || array_pop($ListIDMovieUser));
	// while de parser permettant de récupéter toutes les données de chaque film
	while (isset($ListIDMovieUser[$iterator]) && !empty($ListIDMovieUser[$iterator]))
	{
		 foreach ($ListIDMovieUser[$iterator] as $key)
		 {
			$UserMovies[$iterator] = getMovie($key['IdMovie']);
		 }
		$iterator++;
	}
	return ($UserMovies);
}
?>