<?php
/*
Fonction de test permettant de v�rifier si un �v�nement donn� a bien �t� modifi�.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = editEvent('6', '2013-03-19', '21 rue saint-honor�', 
					 'Orl�an');
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>