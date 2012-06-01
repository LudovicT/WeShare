<?php
/*
Fonction de test permettant de voir si un film a bien été ajouté à
un événement.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = AddMovieToEvent('6', '1');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else if ($result == 1)
{
	echo('<br />Film déjà présent pour cet événement !');
}
else
{
	echo('OK');
}
?>