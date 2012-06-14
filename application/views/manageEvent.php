<h3>D�tails sur l'�v�nement N� <?php echo $event['IdEvent'] ?></h3>
<p>Ici vous pouvez ajouter un ou plusieurs films et de m�me pour vos amis</p>
<br />

<table border='1'>
	<th> N� de l'�v�nement </th><th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Date de cr�ation </th>
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
	<input type="submit" value="Modifier l'�v�nement">
</form>
<br /> <br />
<?php if (!($movies == -2))
{ ?>
Voici la liste des films que vous avez ajout�s � cet �v�nement : <br /><br />
<?php
	foreach($movies as $key)
	{ 
?>
<table border='1'>
	<th> Nom du film </th><th> Date de sortie </th>
	<th> Dur�e </th><th>Action</th>
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
		echo "<br />Vous n'avez aucun film de pr�vu pour cet �v�nement.<br />";
	}?>
		<br />
		<a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/AjouterFilm/' > Ajouter un film </a>
	
<?php
if ($friends != -1 && $friends != -2)
{
?>
<br /><br /><p>Liste des vos amis qui participent � cet �v�nement :</p>
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
			echo ('a accept� de participer');
		}
	elseif ($key['Status'] == -1)
		{
			echo('a refus� de participer');
		}
	else
		{
			echo('ne s\'est pas encore d�cid�');
		}
?>
		</td>
		<td>
		<a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/UninviteFriend/<?php echo $key['IdUser']; ?>/' > D�sinviter </a>
		</td>
	</tr>
</table>
<?php } 
}
else
{?>
<br /><br/>Vous n'avez invit� aucun ami � cet �v�nement.<br />
<?php } ?>
<br /> <a href='/WeShare/Evenements/Manage/<?php echo $event['IdEvent'] ?>/InviteFriend/' > Inviter un ami </a>