<?php
/*
Fonction de test permettant de v�rifier si un �v�nement a bien �t� cr��.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = createEvent(getId('Macko'), '16-03-2013', 'Od�on', 'Paris');
if ($error == 0)
{
echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>