<?php
/*
Fonction de test permettant de voir si on a bien récupéré la liste des films
appartenants à l'utilisateur

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = getUserMovies('1');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else
{
	var_dump($result);
}
?>