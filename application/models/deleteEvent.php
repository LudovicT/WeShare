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