<?php
/*
La fonction getPollMovieEvent permet de récupérer l'état du vote
pour un film donné.

$error
$NbVote

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

$NbVote (S): int
Contient la nombre de vote(s).

Auteur : Vincent Ricard
*/

function getPollMovieEvent($IdEvent, $IdMovie)
{
	$error = 0;

	// Requête qui modifie un événement préalablement créé
	$query = sprintf("SELECT NumberOfVote FROM EventsSelections
					  WHERE IdMovie = '%d' and IdEvent = '%d'",
					  $IdMovie, $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	 $NbVote = mysql_fetch_assoc($result);
	return ($NbVote['NumberOfVote']);
}
?>