<?php
/*
La fonction editEvent permet � l'utilisateur de modifier un �v�nement donn�.

$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function editEvent($IdEvent, $DateOfEvent, $Address, $City)
{
	$error = 0;

	// Requ�te qui modifie un �v�nement pr�alablement cr��
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