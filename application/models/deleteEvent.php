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

function deleteEvent($IdUser, $IdEvent)
{
	$error = 0;
	$query = sprintf("DELETE FROM Events WHERE idOrganizer = '%d'
					  AND IdEvent = '%d'", $IdUser, $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}
?>