<?php
/*
Fonction pour tester getEvents et donc de voir si les films ont bien �t�
r�cup�r�s

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

echo ('Liste des �v�nements pour l\'utilisateur \'Dacove\' <br />');

$events = getEvents(getId('Dacove'));
if ($events == -2)
{
	echo('Erreur : <br />'.mysql_error());
}
else
{
	foreach($events[0] as $key)
	{
		var_dump($key);
	}
}
?>