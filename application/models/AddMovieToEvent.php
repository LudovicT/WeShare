<?php
/*
La fonction AddMovieToEvent permet  �l'utilisateur d'ajouter des films
� un �v�nement qu'il a cr��.

$error

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK
1	:	l'utilisateur veut ajouter un film d�j� ajout�
Auteur : Vincent Ricard
*/

function addMovieToEvent($IdEvent, $IdMovie)
{
	$error = 0;

	// Requ�te permettant de voir si le film n'a pas d�j� �t� ajout�
	$query = sprintf ("SELECT IdMovie FROM EventsSelections 
					   WHERE IdEvent = '%d' AND IdMovie = '%d'"
					   ,$IdEvent, $IdMovie);
	$result = mysql_query($query, dbConnect());
	$check = mysql_fetch_assoc($result); 
	if ($check != false)
	{
		return (1);
	}
	// Requ�te ins�rant un nouveau film � l'�v�nement donn�
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