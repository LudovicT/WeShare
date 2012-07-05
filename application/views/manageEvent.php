<h3>Détails de l'événement</h3>
<br />
<div class='row-4'>
	<div class='fright2'>
		<ul>
			<li><a href="/WeShare/Evenements/Edit/<?php echo $IdEvent ?>/" ><em><b> Modifier l'événement </b></em></a></li>
			<li><a href="#" onclick="toggle_visibility('infoEvent');"><em><b>Cacher/afficher les détails de l'événement</b></em></a></li>
		</ul>
	</div>
</div>
<div id='infoEvent' class='fade' style="display: block; opacity: 1;">
	<table width='60%' border='1' rules='none' cellspacing='12' style='margin-left:200px'>
		<tr>
			<td width='35%'>
			<h2>Date de l'événement : 
			</td>
			<td>
			<?php echo formateDate($event['DateOfEvent']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Adresse : 
			</td>
			<td>
			<?php echo($event['Address']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Ville : 
			</td>
			<td>
			<?php echo($event['City']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Date de création : 
			</td>
			<td>
			<?php echo(formateDate($event['CreationDate'])); ?>
			</td>
		</tr>
	</table>
</div>
<br />
<h3><small>Films de l'événement</small></h3>
<div class='row-4'>
	<div class='fright2'>
		<ul>
			<li><a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/AjouterFilm/' ><em><b> Ajouter un film </b></em></a></li>
<?php if ($movies != -2)
{ ?>
			<li><a href="#" onclick="toggle_visibility('movie');"><em><b>Afficher les films sélectionnés</b></em></a></li>
		</ul>
	</div>
</div>
<div id='movie' class='fade' style="display: none; opacity: 0;">
Voici la liste des films que vous avez ajoutés à cet événement : <br /><br />
<?php
	foreach($movies as $key)
	{ 
	?>
	<table border='0' rules='rows' width='100%'>
		<th width='25%'><h2> Nom du film </h2></th><th width='25%'><h2> Date de sortie </h2></th><th width='25%'><h2> Durée </h2></th><th width='25%'></th>
		<tr>
			<td>
	<?php echo ($key['Name']) ?>
			</td>
			<td>
	<?php echo($key['DateOfRelease']); ?>	
			</td>
			<td>
	<?php echo($key['Runtime']); ?>	
			</td>
			<td>
			<a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/RetirerFilm/<?php echo $key['IdMovie']; ?>/' > Retirer le film </a>
			</td>
		</tr>
	</table>
</div>
	<?php }
} 
else
{?>
		</ul>
	</div>
</div>
<br />Vous n'avez prévu aucun film pour cet événement.<br />
<?php
}?>
<br /><br /><br />
<h3><small>Amis participants à l'événement</small></h3>
<div class='row-4'>
	<div class='fright2'>
		<ul>
			<li><a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/InviteFriend/'  ><em><b> Inviter un ami </b></em></a></li>
<?php
if ($friends != -1 && $friends != -2)
{
?>
			<li><a href="#" onclick="toggle_visibility('friends');"><em><b>Afficher les amis invités</b></em></a></li>
		</ul>
	</div>
</div>
<div id='friends' class='fade' style="display: none; opacity: 0;">
<br /><br /><p>Liste des vos amis qui participent à cet événement :</p>
<?php 
	foreach ($friends as $key)
	{
	?>
<table border='1'>
	<th> Pseudo </th><th>Status</th><th>Action</th>
	<tr>
		<td>
<?php echo ($key['Pseudo'])?>
		</td>
		<td>
<?php if ($key['Status'] == 1)
		{
			echo ('a accepté de participer');
		}
	elseif ($key['Status'] == -1)
		{
			echo('a refusé de participer');
		}
	else
		{
			echo('ne s\'est pas encore décidé');
		}
?>
		</td>
		<td>
		<a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/UninviteFriend/<?php echo $key['IdUser']; ?>/' > Désinviter </a>
		</td>
	</tr>
</table>
</div>
<?php } 
}else
{?>
		</ul>
	</div>
</div>
<br />Vous n'avez inviter aucun amis à participer à l'évènement.<br />
<?php
}?>