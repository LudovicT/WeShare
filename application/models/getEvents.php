<?php
/*
La fonction getEvents permet de récupérer le(s) événement(s) concernant
l'utilisateur, qu'il en soit le créateur ou qu'il y soit invité.

$Events

$Events (S): int
-1	:	Il n'y a aucun événement concernant l'utilisateur
-2	:	erreur requête invalide/problème avec la BDD
$Events[2] (S): tableau contenant deux tableaux associatif contenant 
tous les événements en question

Auteur : Vincent Ricard
*/

function	getEvents($IdUser)
{
	$query = sprintf("SELECT * FROM Events WHERE IdOrganizer = %d",
					 $IdUser);
	
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return -2;
	 }
	while(($Events[] = mysql_fetch_assoc($result)) || array_pop($Events));
	
	return ($Events);
}
?>