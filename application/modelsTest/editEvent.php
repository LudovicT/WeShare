<?php
/*
Fonction de test permettant de vérifier si un événement donné a bien été modifié.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$error = editEvent('6', '2013-03-19', '21 rue saint-honoré', 
					 'Orléan');
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>