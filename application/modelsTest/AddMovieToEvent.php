<?php
/*
Fonction de test permettant de voir si un film a bien �t� ajout� �
un �v�nement.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = AddMovieToEvent('1', '1');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else if ($result == 1)
{
	echo('<br />FILM d�j� pr�sent pour cet �v�nement !');
}
else
{
	echo('OK');
}
?>