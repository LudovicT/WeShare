<?php
/*
Fichier de controle qui traite et redirige le login
*/

if(isset($_GET['action'])){
	switch ($_GET['action'])
	{
		case "profil":
			$layout="profil.php";
			$layoutAdd = 0;
			break;
		case "edit":
			if (isset($_GET['subaction']))
			{
				switch ($_GET['subaction'])
				{
				case "changeprofil":
					$IdUser = getId($user);
					include_once("changeProfilCTRL.php");
					break;
				}
			}
			else
			{
				$layout="editProfil.php";
				$layoutAdd = 1;
			}
			break;
		case "amis":
			$userId = getId($user);
			//gestion des ajouts d'amis
			if(isset($_GET['suppr']) && !empty($_GET['suppr']))
			{
				replyToFriendship($userId, getId($_GET['suppr']), 0);
			}
			if(isset($_GET['add']) && !empty($_GET['add']))
			{
				replyToFriendship($userId, getId($_GET['add']), 1);
			}
			if((isset($_GET['no']) && !empty($_GET['no'])))
			{
				replyToFriendship($userId, getId($_GET['no']), 2);
			}
			if((isset($_GET['ignore']) && !empty($_GET['ignore'])))
			{
				replyToFriendship($userId, getId($_GET['ignore']), 3);
			}
			
			$friend = getFriends($userId);
			$friendRequest = getFriendshipRequest($userId);
			$group = getGroups($userId);
			$layout="amisProfil.php";
			$layoutAdd = 2;
			break;
		case "films":
			$IdUser = getId($user);
			include_once("ProfilAddMovieCTRL.php");
			$layoutAdd = 3;
			break;
		case "mp":
			include_once("mpCTRL.php");
			$layout="mp.php";
			$layoutAdd = 4;
			break;
		default:
			$layout="profil.php";
			$layoutAdd = 0;
	}
}
else
{
	$layout="profil.php";
	$layoutAdd = 0;
}
$profil = getProfil($user);
?>