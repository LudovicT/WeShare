<?php
/*
La fonction AddFriendToEvent permet l'utilisateur d'inviter des amis
� un �v�nement qu'il a cr��.

$error

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK
1	:	l'utilisateur veut inviter un ami d�j� invit�

Auteur : Vincent Ricard
*/

function addMovieToEvent($IdEvent, $IdUser)
{
	$error = 0;
	
	// Requ�te permettant de voir si l'ami n'a pas d�j� �t� invit�
	$query = sprintf ("SELECT IdUser FROM EventsInvitations 
					   WHERE IdEvent = '%d' AND IdUser = '%d'"
					   ,$IdEvent, $IdUser);
	$result = mysql_query($query, dbConnect());
	$check = mysql_fetch_assoc($result); 
	if ($check != false)
	{
		return (1);
	}
	// Requ�te ins�rant un ami invit� � l'�v�nement donn�
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