<?php
/*
Fonction de test permettant de v�rifier si un �v�nement donn� a bien �t� modifi�.

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