<?php
/*
Fonction de test permettant de voir si on r�cup�re bien la liste du ou des films
ajout�(s) � un �v�nement donn�.

Note : on r�cup�re en fait que des Id, qui seront trait�s plus tard, pour
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