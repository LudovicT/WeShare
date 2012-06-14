<?php
/*
La fonction uninviteFriendFromEvent permet à l'utilisateur de désinviter
un ami préalablement invité à un événement donné.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0 	:	OK

Auteur : Vincent Ricard
*/

function uninviteFriendFromEvent($IdEvent, $IdUser)
{
	$error = 0;
	
	// Requête retirant un ami de l'événement donné
	$query = sprintf("DELETE FROM EventsInvitations 
					  WHERE IdEvent = '%d' AND IdUser = '%d'" 
					 ,$IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}
?>