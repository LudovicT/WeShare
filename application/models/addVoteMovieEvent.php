<?php
/*
La fonction addVoteMovieEvent ajoute le vote (+1 ou -1) sur un film donné
de l'utilisateur participant à un événement donné.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function checkVoteMovieEvent($IdEvent, $IdMovie, $IdUser, $Vote)
{
	$error = 0;

	$query = sprintf("UPDATE EventsSelections
					  SET (NumberOfVote = (NumberOfVote + '%d'))
					  WHERE IdMovie = '%d' AND IdEvent = '%d' AND 'IdUser = '%d'",
					  $Vote, $IdMovie, $IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	 $query = sprintf("UPDATE EventsVote
					  SET NumberOfVote = '%d'
					  WHERE IdMovie = '%d' AND IdEvent = '%d' AND 'IdUser = '%d'",
					  $IdMovie, $IdEvent, $IdUser);
	return ($error);
}
?>