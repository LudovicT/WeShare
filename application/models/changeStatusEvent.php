<?php
/*
La fonction changeStatusEvent permet � l'utilisateur de changer son status
sur un �v�nement donn�. Ainsi, il peut choisir entre
- refuser d'y participer
- accepter l'invitation
- se d�cider plus tard.

Cela concerne bien �videmment que les �v�nements o� il est invit�
et non dont il serait l'organisateur.

$error

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
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