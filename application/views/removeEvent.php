<h3>Supprimer un �v�nement</h3>
<p>Veuillez confirmer la suppression de l'�v�nement : </p>

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
<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
<input type="hidden" name="SuppEvent" value="<?php echo $event['IdEvent'] ?>">
<input type="submit" value="Supprimer cet �v�nement">
</form>
<!--<a href='/WeShare/Evenements/Supprimer/<?php echo $event['IdEvent'] ?>/' > Supprimer cet �v�nement</a>-->