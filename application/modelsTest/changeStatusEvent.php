<?php
/*
Fonction de test permettant de vérifier si un utilisateur a pu refuser une
invitation à un événement

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = leaveEvent(getId('Mackovich'), '3');
if ($error == 0)
{
	echo ('OK');
}
else if ($error == -1)
{
	echo ("haha, bien tenté l'ami.");
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>