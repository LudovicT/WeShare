<?php
/*
La fonction createEvent permet � l'utilisateur de cr�er un �v�nement.
$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function	createEvent($IdUser, $Adress, $City, $PollEnding)
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