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

$error = createEvent(getId('Dacove'), '2013-03-19', '21 rue saint-honoré', 'Orléan');
if ($error == 0)
{
	echo ('OK');
}
else
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
?>