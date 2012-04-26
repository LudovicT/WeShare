<?php
/*
Fonction de test permettant de vérifier si un événement a bien été créé.

Auteur : Vincent Ricard
*/

include("../models/mainModels.php");
define('DS', '/');
define('ADDRESS', '/');
include("../../config/config.php");

function	createEvent($IdUser)
{
	$error = 0;
	$query = sprintf("INSERT INTO Events 
					  (DateOfEvent, Adress, City, CreationDate, IdOrganizer) 
					  VALUES ('%s', '%s', '%s', '%s', '%s') 
					  WHERE IdOrganizer = %d",
					  $DateOfEvent,
					  $Adress,
					  $City,
					  date("y-m-d"),
					  /*$PollEnding,*/
					  $IdOrganizer);
	
	$result = mysql_query($query, dbConnect());
	if (!isset($result))
	 {
		$error = 1;
	 }
return ($error);
}
?>