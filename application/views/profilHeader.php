<?php

$active[0]= "";
$active[1]= "";
$active[2]= "";
$active[3]= "";
$active[4]= "";
switch($layoutAdd)
{
	case "0":
		$active[0]= " class='active'";
		break;
	case "1":
		$active[1]= " class='active'";
		break;
	case "2":
		$active[2]= " class='active'";
		break;
	case "3":
		$active[3]= " class='active'";
		break;
	case "3":
		$active[4]= " class='active'";
		break;
}
		echo"
			<div class='row-4'>
				<div class='fright2'>
					<ul>
						<li><a href='/WeShare/Profil/'".$active[0]."><em><b>Profil</b></em></a></li>
						<li><a href='/WeShare/Profil/Edit/'".$active[1]."><em><b>Edition du profil</b></em></a></li>
						<li><a href='/WeShare/Profil/Amis/'".$active[2]."><em><b>".$newNotifProfilFriends."Amis".$newNotifProfilEndFriends."</b></em></a></li>
						<li><a href='/WeShare/Profil/Films/'".$active[3]."><em><b>Mes films</b></em></a></li>
						<li><a href='/WeShare/Profil/Messagerie/'".$active[4]."><em><b>".$newNotifProfilPms."Messagerie".$newNotifProfilEndPms."</b></em></a></li>
					</ul>
				</div>
			</div>"; ?>