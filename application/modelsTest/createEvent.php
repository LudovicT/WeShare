<?php
/*
Fonction de test permettant de v�rifier si un �v�nement a bien �t� cr��.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = createEvent(getId('Mackovich'), '2013-03-19', '21 rue saint-honor�', 
					 'Orl�an', 0);
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>