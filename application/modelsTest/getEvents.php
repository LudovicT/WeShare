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

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

echo ('Liste des événements pour l\'utilisateur \'Dacove\' <br />');

$events = getEvents(getId('Dacove'));

if ($events[0] == -2)
{
	echo('Erreur : <br />'.mysql_error());
}
else if ($events[1] == -2)
{
	echo('Erreur : <br />'.mysql_error());
}
else
{
	var_dump($events);
}
?>