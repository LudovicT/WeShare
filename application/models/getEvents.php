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
// Requ�te pour r�cup�rer les �venements que l'utilisateur a cr��
	$query = sprintf("SELECT * FROM Events WHERE IdOrganizer = '%d'",
					 $IdUser);
	
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		return -2;
	 }
	while(($Events[0][] = mysql_fetch_assoc($result)) || array_pop($Events[0]));

// Requ�te pour r�cup�rer les �venements auxquelles participe l'utilisateur 	
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