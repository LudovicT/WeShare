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

function changeStatusEvent($IdEvent, $IdUser, $Status)
{
	$error = 0;

	// Requ�te qui change le status de participation de l'utilisateur
	$query = sprintf("UPDATE EventsInvitations 
					  SET Status '%d' WHERE IdEvent = '%d'", $IdEvent, $Status);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	return ($error);
}
?>