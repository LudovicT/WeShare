<?php
/*
La fonction uninviteFriendFromEvent permet � l'utilisateur de d�sinviter
un ami pr�alablement invit� � un �v�nement donn�.

$error

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
0 	:	OK

Auteur : Vincent Ricard
*/

function uninviteFriendFromEvent($IdEvent, $IdUser)
{
	$error = 0;
	
	// Requ�te retirant un ami de l'�v�nement donn�
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