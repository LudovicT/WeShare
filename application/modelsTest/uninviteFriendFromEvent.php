<?php
/*
Fonction de test permettant de voir si on a bien désinviter un ami à un
événement donné.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = uninviteFriendFromEvent('6', '1');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else
{
	echo('OK');
}
?>