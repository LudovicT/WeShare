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
<div id='contenu'>
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
			break;
		case "login":
			$active[0]= " class='active'";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			break;
		case "films.php":
			$active[0]= "";
			$active[1]= " class='active'";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
			break;
		case "evenements.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= " class='active'";
			$active[3]= "";
			$active[4]= "";
			break;
		case "membres.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= "";
			$active[3]= " class='active'";
			$active[4]= "";
			break;
		case "profil.php":
			$active[0]= "";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= " class='active'";
			break;
			break;
		default:
			$active[0]= " class='active'";
			$active[1]= "";
			$active[2]= "";
			$active[3]= "";
			$active[4]= "";
	}
}
elseif (!isset($_GET['page']))
{
	$active[0]= " class='active'";
	$active[1]= "";
	$active[2]= "";
	$active[3]= "";
	$active[4]= "";
}
?>
	<div id="header">
		<div class="row-1">
			<div class="fright">
				<ul>
					<li><a href="/WeShare/Accueil/"><img id='logo' src="<?php echo DIR_PUBLICS; ?>/images/logo2.png" alt="" /></a></li>
					<li><a href="/WeShare/Accueil/"<?php echo $active[0];?>><em><b>Accueil</b></em></a></li>
					<li><a href="/WeShare/Films/"<?php echo $active[1];?>><em><b>Films</b></em></a></li>
					<li><a href="/WeShare/Evenements/"<?php echo $active[2];?>><em><b>Evénements<?php echo $newNotifEvents;?></b></em></a></li>
					<li><a href="/WeShare/Membres/"<?php echo $active[3];?>><em><b>Membres</b></em></a></li>
				</ul>
			</div>
			<div class="conteneur">
				<div class="bloc">
					<div id="homePage" tabindex="99998">
					<center>
						<form id="homeSearch2" class="" action="/WeShare/Search/" method="POST">
						<div id="searchBar2">
							<div class="searchBar2_left"></div>
							<div class="searchBar2_inner"></div>
							<div class="searchBar2_right"></div>
							<div class="searchBar2_inner_left"></div>
							<div class="searchBar2_inner_inner"></div>
							<div class="searchBar2_inner_right"></div>
							<div id="searchBar2_input">
								<input name="mot" type="text" class="formulaireBoite" id="srchval" placeholder="Rechercher" size="18">
							</div>
						</div>
						</form>
						</center>
					</div>
				</div>
			</div>
			<div id="profil">
				<ul><img class='miniprofilpic' src='
				<?php
				if(!empty($profil['Avatar']))
				{
					echo $profil['Avatar'];
				}
				else
				{
					echo DIR_PUBLICS."/images/vide.gif"; 
				}
				?>
				'>
				</ul>
			</div>
			<div id="profil">
				<ul>
					<li><a href="/WeShare/Profil/"<?php echo $active[4];?> style="margin-top: 5px";><b>Profil<?php echo $newNotifProfil;?></b></a></li>
					<li><a href="/WeShare/Deconnexion/" style="margin-top: 35px";><b>Déconnexion</b></a></li>
				</ul>
			</div>
		</div>

		
	<!--End of header -->