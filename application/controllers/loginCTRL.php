<?php
/*
Fichier de controle qui traite et redirige le login
Auteur : Ludovic Tresson
*/
if (isset($_POST["pseudo"]) && isset($_POST["password"]))
{
	$errorConnect = connect($_POST["pseudo"], $_POST["password"]);
	
	if ($errorConnect == 0)
	{
		$layout = "accueil.php";
		$user = @getUser();
		$userId = getId($user);
	}
	else	//errorConnect = 1 dans ce cas
	{
		$pseudo = $_POST["pseudo"];
		$password = '';
		$layout = "login.php";
	}
}
else
{
	$layout = "login.php";
}
?>