<?php
/*
La fonction createEvent permet à l'utilisateur de créer un événement.

$error

$error (S): int
1	:	erreur requête invalide/problème avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function createEvent($IdUser, $DateOfEvent, $Address, $City, $Status)
{
$error = 0;

// Requête qui ajoute un événement et qui met l'utilisateur en tant que créateur
$query = sprintf("INSERT INTO Events 
				  (DateOfEvent, Address, City, CreationDate, IdOrganizer) 
				  VALUES ('%s', '%s', '%s', '%s', '%d')",
				  $DateOfEvent,
				  $Address,
				  $City,
				  date("y-m-d"),
				  $IdUser);
$result = mysql_query($query, dbConnect());
if ($result == false)
 {
	$error = 1;
 }
 
// Requête qui récupère l'IdEvent de l'événement qui vient d'être créé
$query = sprintf("SELECT LAST_INSERT_ID()");
$result = mysql_query($query, dbConnect());
if ($result == false)
 {
	$error = 1;
 }
 $idEvent = mysql_fetch_row($result)

 // Requête qui ajoute l'utilisateur, par défaut, à la liste des participants
$query = sprintf("INSERT INTO EventsInvitations (IdEvent, IdUser, Status) 
				  VALUES ('%d', '%d', '%d')", 
				  $IdEvent, $IdUser, $Statuts);
return ($error);
}
?>