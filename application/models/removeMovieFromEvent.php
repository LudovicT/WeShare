<?php
/*
La fonction removeMovieFromEvent permet � l'utilisateur de retirer un film
qu'il avait ajout� un �v�nement dont il est l'organisateur.

$error

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
0 	:	OK

Auteur : Vincent Ricard
*/

function removeMovieFromEvent($IdEvent, $IdMovie)
{
	$error = 0;
	$MovieEvent;
	
	// Requ�te retirant un film de l'�v�nement donn�
	$query = sprintf("DELETE FROM EventsSelections 
					  WHERE IdEvent = '%d' AND IdMovie = '%d'" 
					 ,$IdEvent, $IdMovie);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}
?>