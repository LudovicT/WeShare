<?php
/*
Fonction de test permettant de voir si on a bien récupéré la liste d'amis
parcipant à un événement.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

$result = getFriendsEvent('6');

if ($result == -1)
{
	echo('<br />FAIL :{'.mysql_error().'}');
}
else
{
	var_dump($result);
}
?>