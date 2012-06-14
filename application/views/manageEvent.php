<h3>Détails sur l'événement N° <?php echo $event['IdEvent'] ?></h3>
<p>Ici vous pouvez ajouter un ou plusieurs films et de même pour vos amis</p>
<br />

<table border='1'>
	<th> N° de l'événement </th><th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th>
	<tr>
		<td>
<?php echo $event['IdEvent'] ?>
		</td>
		<td>
<?php echo($event['DateOfEvent']); ?>	
		</td>
		<td>
<?php echo($event['Address']); ?>	
		</td>
		<td>
<?php echo($event['City']); ?>	
		</td>
		<td>
<?php echo($event['CreationDate']); ?>	
		</td>
	</tr>
</table>
<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Edit/<?php echo $IdEvent ?>/">
	<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
	<input type="submit" value="Modifier l'événement">
</form>
<br /> <br />
<?php if (!($movies == -2))
{ ?>
Voici la liste des films que vous avez ajoutés à cet événement : <br /><br />
<?php
	foreach($movies as $key)
	{ 
?>
<table border='1'>
	<th> Nom du film </th><th> Date de sortie </th>
	<th> Durée </th><th>Action</th>
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
<?php }
 } 
	else
	{
		echo "<br />Vous n'avez aucun film de prévu pour cet événement.<br />";
	}?>
		<br />
		<a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/AjouterFilm/' > Ajouter un film </a>
	
<?php
if ($friends != -1 && $friends != -2)
{
?>
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
<?php } 
}
else
{?>
<br /><br/>Vous n'avez invité aucun ami à cet événement.<br />
<?php } ?>
<br /> <a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/InviteFriend/' > Inviter un ami </a>