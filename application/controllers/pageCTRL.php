<?php
/*
Fichier qui redirige sur les différentes pages
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
			else
			{
				$layout = "erreur.php";
			}
			$layout = "search.php";
			break;
		case "films.php":
			include_once("filmCTRL.php");
			break;
		case "ficheFilm.php":
		
			if(isset($_GET['idMovie']) && !empty($_GET['idMovie']))
			{
				$movieInfo = getMovie($_GET['idMovie']);
				if(generateUrl($movieInfo['Name'])== $_GET['redirect'])
				{
					$movieStaff = getMovieStaff($_GET['idMovie']);
					$movieSupport = getMovieSupport($_GET['idMovie']);
					$layout = "ficheFilm.php";
				}
				else
				{
					$location = generateUrl($movieInfo['Name']);
					header('Location: /WeShare/Film/'.$location.'/'.$_GET['idMovie'].'/');
				}
			}
			else
			{
				$layout = "erreur.php";
			}
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
		case "group.php":
			$userId = getId($user);
			$group = getGroup($_GET['group']);
			if($group['IdCreator'] == $userId)
			{
			if(isset($_GET['action']) && isset($_POST['membre']))
			{
				switch($_GET['action'])
				{
					case "add":
						addMemberToGroup($_GET['group'],$_POST['membre']);
						break;
					case "delete":
						deleteMemberFromGroup($_GET['group'],$_POST['membre']);
						break;
				}
			}
			$groupUser = getGroupUser($_GET['group']);
			$membres = getMember($user);
			$layout = "group.php";
			}
			else
			{
				header('Location: /WeShare/Profil/Amis/');
			}
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