<?php
/*
La fonction getFriendsEvent permet � l'organisateur d'un �v�nement de
r�cup�rer la liste de ses amis qui participent � cet �v�nement.

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