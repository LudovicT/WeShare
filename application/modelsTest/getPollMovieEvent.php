<?php
/*
Fonction de test permettant de vérifier si un événement donné a bien été modifié.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = getPollMovieEvent('6', '3');
if ($error != 1)
{
	var_dump($error);
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>