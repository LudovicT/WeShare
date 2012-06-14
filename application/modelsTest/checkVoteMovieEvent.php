<?php
/*
Fonction de test permettant de vérifier si un utilisateur a déjà voté pour
un film donné d'un événement donné.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = checkVoteMovieEvent('6', '3', '18');
if ($error != 1)
{
	echo('N\'a pas encore voté');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>