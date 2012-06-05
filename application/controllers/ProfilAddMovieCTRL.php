<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["IdMovie"]) && !empty($_POST["IdMovie"]) &&
	isset($_POST["Support"])&&  !empty($_POST["Support"]))
{
	$addMovie_IdMovie = $_POST["IdMovie"];
	$addMovie_Support = $_POST["Support"];
	if(isset($_POST["Support"]) && !empty($_POST["Support"]))
	{
		$addMovie_Support = $_POST["Support"];
	}
	else
	{
		$addMovie_Support = null;
	}
	
	$error_addMovie = addMovie($addMovie_IdMovie,
								$addMovie_Support);
	if ($error_addMovie[0] == 0 && $error_addMovie[1] == 0)
	{
		$movies = searchData(1,"");
		$layout = "filmsProfil.php";
	}
	else
	{
			$layout="filmsProfil.php";

	}
}
else
{
	$movies = searchData(1,"");
	$layout="filmsProfil.php";
}
if(isset($_GET['do']))
{
	switch($_GET['do'])
	{
		case "ajouter":
		addFilmToProfil($_GET['film'],$_POST['Name']);
		break;
	}
}
?>