<?php
/*
Fonction de test permettant de vérifier le système de vote

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = addVoteMovieEvent('6', '3');
if ($error != 1)
{
	var_dump($error);
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>