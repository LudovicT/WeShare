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
	if (isset($_POST["tri"]))
	{
		switch($_POST["tri"])
		{
			case "ans":
				if (isset($_POST["id"]))
				{
					$moviesList = searchData(1,1,$_POST["id"]);
				}
				else
				{
					$moviesList = searchData(1,0);
				}
				break;
			case "genre":
				if (isset($_POST["id"]))
				{
					$moviesList = searchData(1,2,$_POST["id"]);
				}
				else
				{
					$moviesList = searchData(1,0);
				}
				break;
			default:
				$moviesList = searchData(1,0);
			
		}
	}
	else
	{
		searchdata(1,0);
	}
$layout = "films.php";
}
?>