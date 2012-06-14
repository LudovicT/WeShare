<?php
/*
La fonction AddMovieToEvent permet  àl'utilisateur d'ajouter des films
à un événement qu'il a créé.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0	:	OK
1	:	l'utilisateur veut ajouter un film déjà ajouté
Auteur : Vincent Ricard
*/

function addMovieToEvent($IdEvent, $IdMovie)
{
	$error = 0;

	// Requête permettant de voir si le film n'a pas déjà été ajouté
	$query = sprintf ("SELECT IdMovie FROM EventsSelections 
					   WHERE IdEvent = '%d' AND IdMovie = '%d'"
					   ,$IdEvent, $IdMovie);
	$result = mysql_query($query, dbConnect());
	$check = mysql_fetch_assoc($result); 
	if ($check != false)
	{
		return (1);
	}
	// Requête insérant un nouveau film à l'événement donné
	$query = sprintf("INSERT INTO EventsSelections 
					(IdEvent, IdMovie, NumberOfVote)   
					  VALUES ('%d', '%d', '%d')" 
					  ,$IdEvent, $IdMovie, '0');
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}
?>