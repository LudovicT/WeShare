<?php
/*
Fonction de test permettant de voir si un film a bien �t� ajout� �
un �v�nement.

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
	echo('<br />Ami d�j� invit� !');
}
else
{
	echo('OK');
}
?>