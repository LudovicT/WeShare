<?php
/*
Fonction de test permettant de v�rifier si un utilisateur a d�j� vot� pour
un film donn� d'un �v�nement donn�.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = checkVoteMovieEvent('6', '3', '18');
if ($error != 1)
{
	echo('N\'a pas encore vot�');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>