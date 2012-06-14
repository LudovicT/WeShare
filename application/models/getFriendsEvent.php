<?php
/*
La fonction getFriendsEvent permet � l'organisateur d'un �v�nement de
r�cup�rer la liste de ses amis qui participent � cet �v�nement.

$ListFriendsEvent
$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

$ListFriendsEvent (S) : tableau associatif contenant les pseudos invit�s � 
l'�v�nement

Auteur : Vincent Ricard
*/

function getFriendsEvent($IdEvent)
{
	$error = 0;

	// Requ�te qui change le status de participation de l'utilisateur
	$query = sprintf("SELECT EI.IdUser, U.Pseudo FROM EventsInvitations AS EI
					  LEFT JOIN Users AS U
					  ON EI.IdUser = U.IdUser
					  WHERE EI.IdEvent = '%d'"
					  ,$IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
		return ($error);
	 }
	 $ListFriendsEvent = mysql_fetch_assoc($result);
	 
	 while(($ListFriendsEvent[0][] = mysql_fetch_assoc($result)) 
			|| array_pop($ListFriendsEvent[0]));
	return ($ListFriendsEvent);
}
?>