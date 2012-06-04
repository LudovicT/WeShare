<?php
/*
Fonction de test permettant de voir si on récupére bien la liste du ou des films
ajouté(s) à un événement donné.

Note : on récupère en fait que des Id, qui seront traités plus tard, pour
retrouver les films correspondants.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = getMovieEvent('6');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else
{
	var_dump($result);
}
?>