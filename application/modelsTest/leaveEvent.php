<?php
/*
Fonction de test permettant de v�rifier si un utilisateur a pu refuser une
invitation � un �v�nement

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
	echo ("haha, bien tent� l'ami.");
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>