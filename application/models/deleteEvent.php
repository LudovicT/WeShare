<?php
/*
La fonction deleteEvent permet � l'utilisateur de supprimer un �v�nement
qu'il a cr�� et donc dont il est l'organisateur.

$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function deleteEvent($IdEvent)
{
	$error = 0;
	
// Requ�te qui supprime d'abord l'�v�nement dans la table "EventsInvitations"
	$query = sprintf("DELETE FROM EventsInvitations WHERE IdEvent = '%d'", 
					  $IdEvent);	
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }

// Requ�te qui supprime enfin l'�v�nement dans la table "Events"
	$query = sprintf("DELETE FROM Events WHERE IdEvent = '%d'", $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}
?>