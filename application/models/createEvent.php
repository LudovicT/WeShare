<?php
/*
La fonction createEvent permet � l'utilisateur de cr�er un �v�nement.

$error

$error (S): int
1	:	erreur requ�te invalide/probl�me avec la BDD;
0	:	OK

Auteur : Vincent Ricard
*/

function createEvent($IdUser, $DateOfEvent, $Address, $City, $Status)
{
$error = 0;

// Requ�te qui ajoute un �v�nement et qui met l'utilisateur en tant que cr�ateur
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
 
// Requ�te qui r�cup�re l'IdEvent de l'�v�nement qui vient d'�tre cr��
$query = sprintf("SELECT LAST_INSERT_ID()");
$result = mysql_query($query, dbConnect());
if ($result == false)
 {
	$error = 1;
 }
 $idEvent = mysql_fetch_row($result)

 // Requ�te qui ajoute l'utilisateur, par d�faut, � la liste des participants
$query = sprintf("INSERT INTO EventsInvitations (IdEvent, IdUser, Status) 
				  VALUES ('%d', '%d', '%d')", 
				  $IdEvent, $IdUser, $Statuts);
return ($error);
}
?>