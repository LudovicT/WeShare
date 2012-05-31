<?php
/*
Fichier de controle qui traite et les différentes fonctionnalitées de la messagerie
*/

$userId = getId($user);
if(isset($_GET['folder']))
{
	switch ($_GET['folder'])
	{
		case "0":
			$mp = -1;
			$mpInfo = getMp(0,$userId);
			break;
		case "1":
			$mp = -1;
			$mpInfo = getMp(1,$userId);
			break;
		default:
			$mp = -1;
			$mpInfo = getMp(0,$userId);
	}
}
elseif(isset($_GET['do']))
{
	switch ($_GET['do'])
	{
		case "newMp":
			if(isset($_POST['message']) && !empty($_POST['message'])
			&& isset($_POST['users']) && !empty($_POST['users']))
			{
				$mpData['message'] = $_POST['message'];
				$mpData['users'] = $_POST['users'];
				if(isset($_POST['titre']) && !empty($_POST['titre']))
				{
					$mpData['titre'] = $_POST['titre'];
				}
				else
				{
					$mpData['titre'] = "Sans objet";
				}
				sendMp($mpData);
			}
			break;
		case "delMp":
			$mp = -1;
			$mpInfo = getMp(0,$userId);
			break;
		case "read":
			if(isset($_GET['IdMP']) && is_numeric($_GET['IdMP']))
			{
				$mpUser = getMPSendTo($_GET['IdMP']);
				$mp = readMp($_GET['IdMP'],$userId);
				$mpSender = getPseudo($mp['IdSender']);
				$mpInfo = -1;
			}
			else
			{
				$mp = -1;
				$mpInfo = getMp(0,$userId);
			}
			break;
		default:
			$mp = -1;
			$mpInfo = getMp(0,$userId);
	}
}
else
{
	$mp = -1;
	$mpInfo = getMp(0,$userId);
}
?>