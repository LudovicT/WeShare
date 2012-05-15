<?php
/*
La fonction leaveEvent permet à l'utilisateur de quitter un événement auquel
il aura été préalablement invité.
L'utilisateur ne peut pas quitter un événement dont il est l'organisateur.

$error

$error (S): int
-1	:	l'utilisateur tente de quitter un événement qu'il a créé
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function leaveEvent($IdEvent, $IdUser)
{
	$error = 0;

	// Requête qui vérifie si l'utilisateur a créé l'événement qu'il veut quitter
	$query = sprintf("SELECT IdOrganizer FROM Events WHERE IdEvent = '%d'", 
					  $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	{
		return (1);
	}
	$IdOrganizer = mysql_fetch_assoc($result);
	if ($IdUser == $IdOrganizer['IdOrganizer']);
	{
		return (-1);
	}
	// Requête qui change le status de participation de l'utilisateur
	$query = sprintf("UPDATE EventsInvitations 
					  Set Status '-1' WHERE IdEvent = '%d'", $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	return ($error);
}
?>