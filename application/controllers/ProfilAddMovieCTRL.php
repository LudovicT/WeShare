<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
<<<<<<< HEAD
$movies = searchData(1,"");
$layout="filmsProfil.php";
$userMovie = getUserMovies($IdUser);
=======
>>>>>>> 5e3f744a219b64f6626a647362ec300cd64dec8c
if(isset($_GET['do']))
{
	switch($_GET['do'])
	{
		case "ajouter":
<<<<<<< HEAD
		getUserMovies($IdUser);
=======
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
>>>>>>> 5e3f744a219b64f6626a647362ec300cd64dec8c
		break;
	}
}
$movies = searchData(1,"");
$layout="filmsProfil.php";
$userMovie = getUserMovies($userId);
?>