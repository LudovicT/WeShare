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
			break;
		case "addStaff":
			include_once("addStaffCTRL.php");
			break;
		case "deleteMovie":
			deleteMovie($_GET['idMovie']);
			$search = searchData(0,"");
			$layout = "films.php";
			break;
		case "editMovie.php":
			if(!empty($_GET['idMovie']))
			{
				$infoMovie = getMovie($_GET['idMovie']);
				$layout = "editMovie.php";
			}
			else
			{
				$search = searchData(0,"");
				$layout = "films.php";
			}
			break;
		case "editMovie":
			include_once("editMovieCTRL.php");
			break;
	}
}
else
{
	$search = searchData(0,"");
	$layout = "films.php";
}
?>