<?php
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