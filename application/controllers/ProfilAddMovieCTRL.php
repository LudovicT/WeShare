<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["Name"]) && !empty($_POST["Name"]) &&
	isset($_POST["movieSupport"])&&  !empty($_POST["movieSupport"]))
{
	$addMovie_Name = $_POST["Name"];
	$addMovie_Support = $_POST["movieSupport"];
	if(isset($_POST["movieSupport"]) && !empty($_POST["movieSupport"]))
	{
		$addMovie_Support = $_POST["movieSupport"];
	}
	else
	{
		$addMovie_Support = null;
	}
	
	$error_addMovie = addMovie($addMovie_Name,
								$addMovie_Support);
	if ($error_addMovie[0] == 0 && $error_addMovie[1] == 0)
	{
		$search = searchData(0,"");
		$layout = "filmsProfil.php";
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