<?php
/*
Fonction de test permettant de voir si on a bien r�cup�r� la liste des films
appartenants � l'utilisateur

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