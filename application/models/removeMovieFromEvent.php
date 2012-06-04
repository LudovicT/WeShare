<?php
/*
La fonction removeMovieFromEvent permet à l'utilisateur de retirer un film
qu'il avait ajouté un événement dont il est l'organisateur.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0 	:	OK

Auteur : Vincent Ricard
*/

function removeMovieFromEvent($IdEvent, $IdMovie)
{
	$error = 0;
	$MovieEvent;
	
	// Requête retirant un film de l'événement donné
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