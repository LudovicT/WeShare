<?php
/*
La fonction getPollMovieEvent permet de r�cup�rer l'�tat du vote
pour un film donn�.

$error
$NbVote

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

$NbVote (S): int
Contient la nombre de vote(s).

Auteur : Vincent Ricard
*/

function getPollMovieEvent($IdEvent, $IdMovie)
{
	$error = 0;

	// Requ�te qui modifie un �v�nement pr�alablement cr��
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