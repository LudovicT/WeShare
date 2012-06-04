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
		case "evenements.php":
			if (isset($_POST['create_DateOfEvent']) && !empty($_POST['create_DateOfEvent']) &&
				isset($_POST['create_Address']) && !empty($_POST['create_Address']) &&
				isset($_POST['create_City']) && !empty($_POST['create_City']))
			{
				createEvent(getId($user),
							$_POST['create_DateOfEvent'], 
							$_POST['create_Address'],
							$_POST['create_City'],
							2);
			}
			if (isset($_POST['RefusEvent']) && !empty($_POST['RefusEvent']))
			{
				changeStatusEvent($_POST['RefusEvent'], getId($user), '-1');
			}
			if (isset($_POST['AcceptEvent']) && !empty($_POST['AcceptEvent']))
			{
				changeStatusEvent($_POST['AcceptEvent'], getId($user), '1');
			}
			if (isset($_POST['IsNotSure']) && !empty($_POST['IsNotSure']))
			{
				changeStatusEvent($_POST['IsNotSure'], getId($user), '0');
			}		
			if (isset($_POST['SuppEvent']) && !empty($_POST['SuppEvent']))
			{
				deleteEvent($_POST['SuppEvent']);
			}
			$events = getEvents(getId($user));
			$layout = "evenements.php";
			if (isset($_GET['action']) && !empty($_GET['action']))
			{
				switch ($_GET['action'])
				{
					case "newEvent":
						$layout = "newEvent.php";
						break;
					case "removeEvent":
						if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
						{
							$IdEvent = $_GET['idEvent'];
							$event = getEvent($IdEvent);
							$layout = "removeEvent.php";
						}
						break;
					case "changeStatusEvent":
						if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
						{
							$IdEvent = $_GET['idEvent'];
							$event = getEvent($IdEvent);
							$layout = "changeStatusEvent.php";
						}
						break;
					case "viewEvent":
						if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
						{
							$IdEvent = $_GET['idEvent'];
							$event = getEvent($IdEvent);
							$movies = getMovieEvent($IdEvent);
							$layout = "viewEvent.php";
						}
						if(isset($_POST['SuppMovie']) && !empty($_POST['SuppMovie']))
						{
							removeMovieFromEvent($_GET['IdMovie'], $_POST['SuppMovie']);
						}
						if (isset($_GET['do']) && $_GET['do'] == 'removeMovie')
						{
							if(isset($_GET['IdMovie']) && !empty($_GET['IdMovie']))
							{
								$IdMovie = $_GET['IdMovie'];
								$IdEvent = $_GET['idEvent'];
								$movie = getMovie($IdMovie);
								$layout = "removeMovie.php";
							}
						}
						break;
					//case "editEvent":
					default:
					$layout = "erreur.php"; 
				}
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
					$userId = getId($user);
					requestFriendship($userId, getId($_GET['addFriend']));
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
			if(isset($_POST['Nom']) && !empty($_POST['Nom']))
			{
				$error = createGroup($userId,$_POST['Nom']);
				if($error ==0)
				{
					header('Location: /WeShare/Groupe/'.generateUrl($_POST['Nom']).'/'.(lastSqlAutoInc("Groups")-1).'/');
				}
			}
			if(isset($_GET['action']) && $_GET['action'] == "createGroup")
			{
				$layout = "createGroup.php";
			}
			else
			{
				if(isset($_GET['action']) && $_GET['action'] == "supprimer")
				{
					deleteGroup($userId, $_GET['group']);
				}
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
							default:
								$layout = "group.php";
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