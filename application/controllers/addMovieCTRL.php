<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["name"]) && !empty($_POST["name"]) &&
	isset($_POST["synopsis"])&&  !empty($_POST["synopsis"]) &&
	isset($_POST["DateOfRelease"]) && !empty($_POST["DateOfRelease"]))
{
	$addMovie_name = $_POST["name"];
	$addMovie_synopsis = $_POST["synopsis"];
	$addMovie_DateOfRelease = $_POST["DateOfRelease"];
	
	if(isset($_POST["poster"]) && !empty($_POST["poster"]))
	{
		$addMovie_poster = $_POST["poster"];
	}
	else
	{
		$addMovie_poster = null;
	}
	
	$error_addMovie = addMovie($addMovie_name,
								$addMovie_synopsis, 
								$addMovie_DateOfRelease,
								$addMovie_Poster);
	if ($error_addMovie[0] == 0 && $error_addMovie[1] == 0 && $error_addMovie[2] == 0 && $error_addMovie[3] == 0)
	{
		$layout = "editMovie.php";
	}
	else
	{
		$layout = "addMovie.php";
	}
}
else
{
	$layout = "editMovie.php";
}
?>