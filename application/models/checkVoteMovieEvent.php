<?php
/*
La fonction checkVoteMovieEvent permet de voir si l'utilisateur n'a pas déjà
voté pour un film donné d'un événement donné.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK
-1	:	l'utilisateur a déjà voté.

Auteur : Vincent Ricard
*/

function checkVoteMovieEvent($IdEvent, $IdMovie, $IdUser)
{
	$error = 0;

	$query = sprintf("SELECT IdEvent, IdMovie, IdUser FROM EventsVote
					  WHERE IdMovie = '%d' AND IdEvent = '%d' AND IdUser = '%d'",
					  $IdMovie, $IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	return ($error);
}
?>