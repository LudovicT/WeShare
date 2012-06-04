<?php
/*
La fonction getMovieEvent permet de récupérer la liste du ou des films
ayant été ajouté à un événement donné.

$error
$MovieEvent

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
$MovieEvent (S) : tableau associatif de int

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;

	// Requête insérant un nouveau film à l'événement donné
	$query = sprintf("SELECT IdMovie FROM EventsSelections WHERE IdEvent = '%d'" 
					 ,$IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	 $MovieEvent = mysql_fetch_assoc($result);
	return ($MovieEvent);
}	
?>