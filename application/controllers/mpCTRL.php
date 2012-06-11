<?php
/*
Fichier de controle qui traite et les différentes fonctionnalitées de la messagerie
*/

$mp = -1;
$mpInfo = -1;
$newMp = -1;
if(isset($_GET['folder']))
{
	switch ($_GET['folder'])
	{
		case "0":
			$mpInfo = getMp(0,$userId);
			break;
		case "1":
			$mpInfo = getMp(1,$userId);
			break;
		default:
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
				$mpData['message'] = nl2br($_POST['message']);
				$mpData['users'] = $_POST['users'];
				if(isset($_POST['titre']) && !empty($_POST['titre']))
				{
					$mpData['titre'] = $_POST['titre'];
				}
				else
				{
					$mpData['titre'] = "Sans objet";
				}
				$mpError = sendMp($mpData,$userId);
				var_dump($mpError);
				if(is_array($mpError))
				{
					$mpFlag = 1;
				}
				else
				{
					$mpInfo = getMp(0,$userId);
				}
			}
			else
			{
				$newMp = 1;
			}
			break;
		case "delMp":
			if(isset($_GET['IdMP']) && !empty($_GET['IdMP']) && is_numeric($_GET['IdMP']))
			{
				deleteMP($_GET['IdMP'],$userId);
			}
			$mpInfo = getMp(0,$userId);
			break;
		case "read":
			if(isset($_GET['IdMP']) && is_numeric($_GET['IdMP']))
			{
				$mpUser = getMPSendTo($_GET['IdMP']);
				$mp = readMp($_GET['IdMP'],$userId);
				$mpSender = getPseudo($mp['IdSender']);
			}
			else
			{
				$mp = -1;
				$mpInfo = getMp(0,$userId);
			}
			break;
		default:
			$mpInfo = getMp(0,$userId);
	}
}
else
{
	$mpInfo = getMp(0,$userId);
}
?>