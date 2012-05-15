<?php
/*
Fonction de test permettant de vérifier si un événement a bien été récupéré
pour un IdEvent donné.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$event = getEvent('20');
if ($event == -2)
{
	echo('<br />FAIL :<br />{'.mysql_error().'}');
}
else
{
	echo ('OK');
	var_dump($event);
}
?>