<?php
/* La fonction getEvent permet de r�cup�rer toutes les donn�es pour un 
�v�nement donn�.

$Event

$Event (S): int
-1	:	l'�v�nement n'existe pas
-2	:	erreur requ�te invalide/probl�me avec la BDD
$Events (S): tableau associatif contenant tous les donn�es de l'�v�nement 
en question

Auteur : Vincent Ricard
*/

function	getEvent($IdEvent)
{
	$S_query = sprintf("SELECT * FROM Events HAVING IdEvent = '%d'",
					 $IdEvent);
	
	$S_result = mysql_query($S_query, dbConnect());
	if ($S_result == false)
	 {
		return -2;
	 }
$Event = mysql_fetch_assoc($S_result);
return ($Event);
}
?>