<?php
/*
La fonction leaveEvent permet � l'utilisateur de quitter un �v�nement auquel
il aura �t� pr�alablement invit�.
L'utilisateur ne peut pas quitter un �v�nement dont il est l'organisateur.

$error

$error (S): int
-1	:	l'utilisateur tente de quitter un �v�nement qu'il a cr��
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function leaveEvent($IdEvent, $IdUser)
{
	$error = 0;

	// Requ�te qui v�rifie si l'utilisateur a cr�� l'�v�nement qu'il veut quitter
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
	// Requ�te qui change le status de participation de l'utilisateur
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