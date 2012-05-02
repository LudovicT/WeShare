<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["Name"]) && !empty($_POST["Name"]) &&
	isset($_POST["Synopsis"])&&  !empty($_POST["Synopsis"]) &&
	isset($_POST["DateOfRelease"]) && !empty($_POST["DateOfRelease"]))
{
	$addMovie_Name = $_POST["Name"];
	$addMovie_Synopsis = $_POST["Synopsis"];
	$addMovie_DateOfRelease = $_POST["DateOfRelease"];
	settype($addMovie_DateOfRelease, "integer");
	if(isset($_POST["Poster"]) && !empty($_POST["Poster"]))
	{
		$addMovie_Poster = $_POST["Poster"];
	}
	else
	{
		$addMovie_Poster = null;
	}
	
	$error_addMovie = addMovie($addMovie_Name,
								$addMovie_Synopsis, 
								$addMovie_DateOfRelease,
								$addMovie_Poster);
	if ($error_addMovie[0] == 0 && $error_addMovie[1] == 0 && $error_addMovie[2] == 0 && $error_addMovie[3] == 0)
	{
		$search = searchData(0,"");
		$layout = "films.php";
	}
	else
	{
		$layout = "addMovie.php";
	}
}
else
{
	$layout = "addMovie.php";
}
?>