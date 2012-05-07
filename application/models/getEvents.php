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
// Requête pour récupérer les évenements que l'utilisateur a créé
	$query = sprintf("SELECT * FROM Events WHERE IdOrganizer = '%d'",
					 $IdUser);
	
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return -2;
	 }
	while(($Events[0][] = mysql_fetch_assoc($result)) || array_pop($Events[0]));

// Requête pour récupérer les évenements auxquelles participe l'utilisateur 	
	$query = sprintf("SELECT * FROM Eventsinvitation WHERE IdUser = '%d'", 
					  $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return -2;
	 }
	while(($Events[1][] = mysql_fetch_assoc($result)) || array_pop($Events[0]));
return ($Events);
}
?>