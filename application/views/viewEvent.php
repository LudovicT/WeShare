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
<table border='1'>
	<th>Film(s)</th><th>Action</th>
	<tr>
		<td>
		<?php echo $movies['Name']; ?>
		</td>
		<td>
		<a href='/WeShare/Evenements/View/<?php echo $event['IdEvent'] ?>/RetirerFilm/<?php echo $movies['IdMovie']; ?>/' > Retirer le film </a>
		</td>
	</tr>
</table>
<br /><p>Liste des vos amis qui participent à cet événement :</p>
