<?php
/*
La fonction createEvent permet à l'utilisateur de créer un événement.
$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function createEvent($IdUser, $DateOfEvent, $Adress, $City)
{
	$error = 0;
	$query = sprintf("INSERT INTO Events 
					  (DateOfEvent, Adress, City, CreationDate, IdOrganizer) 
					  VALUES ('%s', '%s', '%s', '%s', '%d')",
					  $DateOfEvent,
					  $Adress,
					  $City,
					  date("y-m-d"),
					  $IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = 1;
	 }
return ($error);
}
?>