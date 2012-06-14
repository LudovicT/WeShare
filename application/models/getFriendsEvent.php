<?php
/*
La fonction getFriendsEvent permet à l'organisateur d'un événement de
récupérer la liste de ses amis qui participent à cet événement.

$ListFriendsEvent
$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

$ListFriendsEvent (S) : tableau associatif contenant les pseudos invités à 
l'événement

Auteur : Vincent Ricard
*/

function getFriendsEvent($IdEvent)
{
	$error = 0;

	// Requête qui change le status de participation de l'utilisateur
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