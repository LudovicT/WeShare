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

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

echo ('Liste des �v�nements pour l\'utilisateur \'Dacove\' <br />');

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