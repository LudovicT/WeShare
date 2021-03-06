<?php
/*
Fichier principale de controle redirigeant les requ�tes sur les fichiers
concern�es et traitant les information.
Auteur : Ludovic Tresson

requiert au minimum les fichiers suivants pour fonctionner:
-config.php
-mainModels.php
-smallHeader.php
-footer.php
-login.php
*/

/* obtention des configurations et des mod�les */

require_once(".".DS."config".DS."config.php");
require_once(DIR_MODELS.DS."mainModels.php");

/* d�gagement de tout les �l�ments probl�matique pour les requ�te sql */
$patterns = array("/'/",'/"/');
$replacements = array('&#39;','&#34;');
$_POST = preg_replace($patterns,$replacements,$_POST);

/* traitement des informations */
$user = getUser();
$userId = getId($user);

if (isset($_GET["page"]) && $user == null && !isset($_SESSION['User']))
{
	switch($_GET["page"])
	{
		case "login.php":
			$errorConnect = 0;
			$pseudo = '';
			$password = '';
			$layout = "login.php";
			break;
		case "register.php":
			$layout = "register.php";
			break;
		case "login":
			include_once("loginCTRL.php");
			break;
		case "register":
			$errorConnect = 0;
			include_once("registerCTRL.php");
			break;
		case "home.php":
			$layout = "home.php";
			break;
		case "deconnexion":
			disconnect();
			$layout = "home.php";
			break;
		case "erreur.php":
			$layout = "erreur.php";
			break;
		default:
			$layout = "home.php";
	}
}
elseif ($user == null)
{
	$layout = "home.php";
}
else
{
	include_once("pageCTRL.php");
}
require_once("notifCTRL.php");
/* affichage */
if(($layout == "register.php" || $layout == "login.php" || $layout == "home.php") && !isset($_SESSION['User']))
{
	include_once(DIR_VIEWS."/smallHeader.php");
}
else
{
	include_once(DIR_VIEWS."/header.php");
}

if(isset($layoutAdd))
{
	include_once(DIR_VIEWS."/profilHeader.php");
}
require_once(DIR_VIEWS."/".$layout);
require_once(DIR_VIEWS."/footer.php");
?>