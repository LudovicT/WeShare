<?php
/*
La fonction addVoteMovieEvent ajoute le vote (+1 ou -1) sur un film donn�
de l'utilisateur participant � un �v�nement donn�.

$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
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