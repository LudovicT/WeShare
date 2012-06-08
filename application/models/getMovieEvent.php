<?php
/*
La fonction getMovieEvent permet de r�cup�rer le ou les films
ayant �t� ajout�(s) � un �v�nement donn�.

$error
$MovieEvent

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
-2	:	il n'y aucun film
$MovieEvent (S) : tableau associatif de int

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;
	$MovieEvent;
	$iterator = 0;
	
	// Requ�te r�cup�rant la liste des �v�nements
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
		// while de parseur de r�cup�ter toutes les donn�es de chaque film par ID
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