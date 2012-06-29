<?php
/*
La fonction AddFriendToEvent permet l'utilisateur d'inviter des amis
à un événement qu'il a créé.

$error

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
0	:	OK
1	:	l'utilisateur veut inviter un ami déjà invité

Auteur : Vincent Ricard
*/

function addMovieToEvent($IdEvent, $IdUser)
{
	$error = 0;
	
	// Requête permettant de voir si l'ami n'a pas déjà été invité
	$query = sprintf ("SELECT IdUser FROM EventsInvitations 
					   WHERE IdEvent = '%d' AND IdUser = '%d'"
					   ,$IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	$check = mysql_fetch_assoc($result); 
	if ($check != false)
	{
		return (1);
	}
	// Requête insérant un ami invité à l'événement donné
	$query = sprintf("INSERT INTO EventsInvitations 
					(IdEvent, IdUser, Status)   
					 VALUES ('%d', '%d', '%d')" 
					 ,$IdEvent, $IdUser, '0');
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return (-1);
	 }
	return ($error);
}
?>