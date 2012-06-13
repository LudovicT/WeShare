<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if(isset($_GET['do']))
{
	switch($_GET['do'])
	{
		case "ajouter":
		if(isset($_POST['IdMovie'], $_POST['support'], $_POST['available']))
		{
			addUserMovie($userId, $_POST['IdMovie'], $_POST['support'], $_POST['available']);
		}
		break;
		case "delete":
		if(isset($_POST['IdMovie'], $_POST['support'], $_POST['available']))
		{
			deleteUserMovie($userId, $_POST['IdMovie'], $_POST['support'], $_POST['available']);
		}
		break;
	}
}
$movies = searchData(1,"");
$layout="filmsProfil.php";
$userMovie = getUserMovies($userId);
?>