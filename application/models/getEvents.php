<?php
/*
La fonction getEvents permet de r�cup�rer le(s) �v�nement(s) concernant
un utilisateur, qu'il en soit le cr�ateur ou qu'il y participe.

$Events

$Events (S): int
-1	:	L'utilisateur a cr�� aucun �v�nement
-2	:	erreur requ�te invalide/probl�me avec la BDD;
$Events (S): tableau associatif contenant tous les �v�nements

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