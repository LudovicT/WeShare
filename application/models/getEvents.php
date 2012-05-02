<?php
/*
La fonction getEvents permet de récupérer le(s) événement(s) concernant
un utilisateur, qu'il en soit le créateur ou qu'il y participe.

$Events

$Events (S): int
-1	:	L'utilisateur a créé aucun événement
-2	:	erreur requête invalide/problème avec la BDD;
$Events (S): tableau associatif contenant tous les événements

Auteur : Vincent Ricard
*/

function	getEvents($IdUser)
{
	$query = sprintf("SELECT * FROM Events WHERE IdOrganizer = %d",
					 $IdUser);
	
	$result = mysql_query($query, dbConnect());
	if (!isset($result))
	 {
		return -1;
	 }
	$Events = mysql_fetch_assoc($result);
	return ($Events);
}
?>