<?php
/*
La fonction getFriendsEvent permet à l'organisateur d'un événement de
récupérer la liste de ses amis qui participent à cet événement.

$error

$error (S): int
-1	:	l'utilisateur tente de quitter un événement qu'il a créé
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
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
?>