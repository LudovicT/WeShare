<?php
/*
La fonction getMovieEvent permet de r�cup�rer la liste du ou des films
ayant �t� ajout� � un �v�nement donn�.

$error
$MovieEvent

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
$MovieEvent (S) : tableau associatif contenant les films et leurs infos

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;
	$MovieEvent;
	
	// Requ�te ins�rant un nouveau film � l'�v�nement donn�
	$query = sprintf("SELECT IdMovie FROM EventsSelections WHERE IdEvent = '%d'" 
					 ,$IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	 $MovieListEvent = mysql_fetch_assoc($result);
	 
	 foreach ($MovieListEvent as $key)
	 {
		$MovieEvent = getMovie($key['IdMovie']);
	 }
	return ($MovieEvent);
}
?>