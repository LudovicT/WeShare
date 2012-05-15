<?php
/* La fonction getEvent permet de récupérer toutes les données pour un 
événement donné.

$Event

$Event (S): int
-1	:	l'événement n'existe pas
-2	:	erreur requête invalide/problème avec la BDD
$Events (S): tableau associatif contenant tous les données de l'événement 
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