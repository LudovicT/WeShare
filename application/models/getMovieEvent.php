<?php
/*
La fonction getMovieEvent permet de récupérer le ou les films
ayant été ajouté(s) à un événement donné.

$error
$MovieEvent

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
-2	:	il n'y aucun film
$MovieEvent (S) : tableau associatif de int

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;
	$MovieEvent;
	$iterator = 0;
	
	// Requête récupérant la liste des événements
	$query = sprintf("SELECT IdMovie FROM EventsSelections WHERE IdEvent = '%d'" 
					 ,$IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	 else
	 {
		while(($MovieListEvent[] = mysql_fetch_assoc($result)) || array_pop($MovieListEvent));
		// while de parseur de récupéter toutes les données de chaque film par ID
		while (isset($MovieListEvent[$iterator]) && !empty($MovieListEvent[$iterator]))
		{
			 foreach ($MovieListEvent[$iterator] as $key)
			 {
				$MovieEvent[$iterator] = getMovie($key['IdMovie']);
			 }
			$iterator++;
		}
		return ($MovieEvent);
	}
	return (-2);
}
?>