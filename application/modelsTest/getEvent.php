<?php
/*
Fonction de test permettant de v�rifier si un �v�nement a bien �t� r�cup�r�
pour un IdEvent donn�.

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