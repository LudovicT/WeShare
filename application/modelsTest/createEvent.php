<?php
/*
Fonction de test permettant de v�rifier si un �v�nement a bien �t� cr��.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = createEvent(getId('Dacove'), '2013-03-16', 'Od�on', 'Paris');
if ($error == 0)
{
echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>