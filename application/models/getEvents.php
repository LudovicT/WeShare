<?php
/*
La fonction getEvents permet de r�cup�rer le(s) �v�nement(s) concernant
l'utilisateur, qu'il en soit le cr�ateur ou qu'il y soit invit�.

$Events

$Events (S): int
-1	:	Il n'y a aucun �v�nement concernant l'utilisateur
-2	:	erreur requ�te invalide/probl�me avec la BDD
$Events[2] (S): tableau contenant deux tableaux associatif contenant 
tous les �v�nements en question

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