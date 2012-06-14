<?php
/*
La fonction editEvent permet à l'utilisateur de modifier un événement donné.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function editEvent($IdEvent, $DateOfEvent, $Address, $City)
{
	$error = 0;

	// Requête qui modifie un événement préalablement créé
	$query = sprintf("UPDATE Events 
					  SET DateOfEvent = '%s',
					  Address = '%d',
					  City = '%d'
					  WHERE IdEvent = '%d'",
					  $DateOfEvent,
					  $Address,
					  $City,
					  $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}
?>