<?php
/*
Fonction de test permettant de vérifier si un événement a bien été supprimé
pour un utilisateur donné.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = deleteEvent('1');
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>