<?php
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
	
// Requête qui supprime d'abord l'événement dans la table "EventsInvitations"
	$query = sprintf("DELETE FROM EventsInvitations WHERE IdEvent = '%d'", 
					  $IdEvent);	
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }

// Requête qui supprime enfin l'événement dans la table "Events"
	$query = sprintf("DELETE FROM Events WHERE IdEvent = '%d'", $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}
?>