<h3>Supprimer l'�v�nement</h3>
<p>Veuillez confirmer la suppression de l'�v�nement : </p>

<table border='0' rules='rows' width='100%'>
	<th><h2> �v�nement N� </h2></th><th><h2> Date de l'�v�nement </h2></th><th><h2> Adresse </h2></th><th><h2> Ville </h2></th><th><h2> Date de cr�ation </h2></th>
	<tr>
		<td>
<?php echo $event['IdEvent'] ?>
		</td>
		<td>
<?php echo(formateDate($event['DateOfEvent'])); ?>	
		</td>
		<td>
<?php echo($event['Address']); ?>	
		</td>
		<td>
<?php echo($event['City']); ?>	
		</td>
		<td>
<?php echo(formateDate($event['CreationDate'])); ?>	
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<input type="hidden" name="SuppEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Supprimer cet �v�nement">
			</form>
		</td>
	</tr>
</table>