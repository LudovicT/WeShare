<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
$movies = searchData(1,"");
$layout="filmsProfil.php";
$userMovie = getUserMovies($userId);
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