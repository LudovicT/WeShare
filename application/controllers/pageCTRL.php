<?php
/*
Fichier qui redirige sur les diff�rentes pages
Auteur : Ludovic Tresson
*/
if (isset($_GET["page"]))
{
	switch ($_GET["page"])
	{
		case "accueil.php":
			$layout = "accueil.php";
			break;
		case "search":
			if(isset($_POST['mot']) && !empty($_POST['mot']))
			{
				$search = searchData(0,$_POST['mot']);
			}
			elseif(isset($_POST['mot']) && empty($_POST['mot']))
			{
				$search = searchData(0,"");
			}
			$layout = "search.php";
			break;
		case "films.php":
			include_once("filmCTRL.php");
			break;
		case "membres.php":
			if(isset($_GET['profil']))
			{
				$profil = getProfil($_GET['profil']);
				$layout = "profil.php";
			}
			else
			{
				if(isset($_GET['addFriend']) && !empty($_GET['addFriend']))
				{
					@session_start();
					requestFriendship($user, getId($_GET['addFriend']));
				}
				$membres = getMember($user);
				$layout = "membres.php";
			}
			break;
		case "profil.php":
			include_once("profilCTRL.php");
			break;
		case "deconnexion":
			disconnect();
			$layout = "home.php";
			break;
		default:
			$layout = "erreur.php";
		
	}
}
else
{
	$layout = "accueil.php";
}
?>