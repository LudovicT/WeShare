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

$error = changeStatusEvent( '7', '18', '1');
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>