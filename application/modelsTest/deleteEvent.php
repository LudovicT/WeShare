<?php
/*
Fonction de test permettant de v�rifier si un �v�nement a bien �t� supprim�
pour un utilisateur donn�.

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