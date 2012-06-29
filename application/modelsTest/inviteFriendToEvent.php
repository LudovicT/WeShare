<?php
/*
Fonction de test permettant de voir si un film a bien été ajouté à
un événement.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = inviteFriendToEvent('9', '1');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else if ($result == 1)
{
	echo('<br />Ami déjà invité !');
}
else
{
	echo('OK');
}
?>