<?php
/*
Fonction pour tester getEvents et donc de voir si les films ont bien été
récupérés

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

echo ('Liste des films pour l\'utilisateur \'Macko\' <br />');

$events = getEvents(getId('Macko'));
if ($events == FALSE)
{
	echo('Erreur : <br />'.mysql_error());
}
else
{
	echo ('OK');
}
?>