<h3>Détail sur l'événement N° <?php echo $event['IdEvent'] ?></h3>
<p>Ici vous pouvez ajouter un ou plusieurs films et de même pour vos amis</p>

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
<br /> <br />
<?php if (!($movies == -2))
{ ?>
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
		<a href='/WeShare/Evenements/View/<?php echo $event['IdEvent'] ?>/RetirerFilm/<?php echo $key['IdMovie']; ?>/' > Retirer le film </a>
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
		<a href='/WeShare/Evenements/View/<?php echo $event['IdEvent'] ?>/AjouterFilm/' > Ajouter un film </a>
	
	
<br /><br /><p>Liste des vos amis qui participent à cet événement :</p>
