<?php
/*
La fonction checkVoteMovieEvent permet de voir si l'utilisateur n'a pas déjà
voté pour un film donné d'un événement donné.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK
-1	:	l'utilisateur a déjà voté.
-2	:	l'utilisateur n'a pas le droit de voter

Auteur : Vincent Ricard
*/

function checkVoteMovieEvent($IdEvent, $IdMovie, $IdUser)
{
	$error = 0;

	$query = sprintf("SELECT Status FROM EventsInvitations 
					  WHERE IdUser = '%d' AND IdEvent = '%d'",
					  $IdUser, $IdEvent);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (1);
	 }
	 else
	 {
		$status = mysql_fetch_assoc($result);
		if ($status == -2 || $status == 0)
		{
			return (-2);
		}
	 }
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