<?php
/*
La fonction checkVoteMovieEvent permet de voir si l'utilisateur n'a pas d�j�
vot� pour un film donn� d'un �v�nement donn�.

$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK
-1	:	l'utilisateur a d�j� vot�.

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