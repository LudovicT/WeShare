<h3>D�tail sur l'�v�nement N� <?php echo $event['IdEvent'] ?></h3>
<p>Ici vous pouvez ajouter un ou plusieurs films et de m�me pour vos amis</p>

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
<br /><p>Liste des vos amis qui participent � cet �v�nement :</p>
