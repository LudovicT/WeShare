<?php
/*
La fonction getMovieEvent permet de r�cup�rer la liste du ou des films
ayant �t� ajout� � un �v�nement donn�.

$error
$MovieEvent

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
$MovieEvent (S) : tableau associatif de int

Auteur : Vincent Ricard
*/

function getMovieEvent($IdEvent)
{
	$error = 0;

	// Requ�te ins�rant un nouveau film � l'�v�nement donn�
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