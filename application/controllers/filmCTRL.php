<?php
/*
Fichier de controle pour la page des films
Auteur : ARNAL Alexandre & Ludovic Tresson
*/
if (isset($_GET["action"]))
{
	switch($_GET["action"])
	{
		case "addFilms":
			include_once("addMovieCTRL.php");
			$layout = "addfilms.php";
			break;
	}
}
else
{
	$search = searchData(0,"");
	$layout = "films.php";
}
?>