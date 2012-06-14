<!DOCTYPE html>
<!--Start of header-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>WeShare</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ANSI" />
	<meta name="description" content="Place your description here" />
	<meta name="keywords" content="put, your, keyword, here" />
	<meta name="author" content="Team Weshare" />
	<link href="<?php echo DIR_PUBLICS; ?>/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo DIR_PUBLICS; ?>/layout.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo DIR_PUBLICS; ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="<?php echo DIR_PUBLICS; ?>/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo DIR_PUBLICS; ?>/js/cufon-replace.js" type="text/javascript"></script>
	<script src="<?php echo DIR_PUBLICS; ?>/js/Myriad_Pro_300.font.js" type="text/javascript"></script>
	<script src="<?php echo DIR_PUBLICS; ?>/js/Myriad_Pro_400.font.js" type="text/javascript"></script>
</head>
<body id="page1">
<div id="taille">
<div class="tail-bottom">
<!-- HEADER -->
<?php
if (isset($_GET['page']))
{
	switch($_GET['page'])
	{
		case "accueil.php":
			$active[0]= " class='active'";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			$active[5]= "";
			break;
		case "login":
			$active[0]= " class='active'";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			$active[5]= "";
			break;
		case "films.php":
			$active[0]= "";
			$active[1]= " class='active'";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			$active[5]= "";
			break;
		case "evenements.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= " class='active'";
			$active[3]= "";
			$active[4]= "";
			$active[5]= "";
			break;
		case "membres.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= "";
			$active[3]= " class='active'";
			$active[4]= "";
			$active[5]= "";
			break;
		case "profil.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= " class='active'";
			$active[5]= "";
			break;
		case "deconnexion":
			$active[0]= "";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			$active[5]= " class='active'";
			break;
		default:
			$active[0]= " class='active'";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			$active[5]= "";
	}
}
elseif (!isset($_GET['page']))
{
	$active[0]= " class='active'";
	$active[1]= "";
	$active[2]= "";
	$active[3]= "";
	$active[4]= "";
	$active[5]= "";	
}
?>
	<div id="header">
		<div class="row-1">
			<div class="fright">
				<ul>
					<li><a href="/WeShare/Accueil/"><img src="<?php echo DIR_PUBLICS; ?>/images/logo.png" alt="" /></a></li>
					<li><a href="/WeShare/Accueil/"<?php echo $active[0];?>><em><b>Accueil</b></em></a></li>
					<li><a href="/WeShare/Films/"<?php echo $active[1];?>><em><b>Films</b></em></a></li>
					<li><a href="/WeShare/Evenements/"<?php echo $active[2];?>><em><b><?php echo $newNotifEvents;?>Ev�nements<?php echo $newNotifEventsEnd;?></b></em></a></li>
					<li><a href="/WeShare/Membres/"<?php echo $active[3];?>><em><b>Membres</b></em></a></li>
					<li><a href="/WeShare/Profil/"<?php echo $active[4];?>><em><b><?php echo $newNotifProfil;?>Profil<?php echo $newNotifProfilEnd;?></b></em></a></li>
					<li><a href="/WeShare/Deconnexion/"<?php echo $active[5];?>><em><b>D�connexion</b></em></a></li>
				</ul>
			</div>
		</div>

		
	<!--End of header -->