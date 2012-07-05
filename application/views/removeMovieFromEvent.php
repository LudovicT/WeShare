<h3>Supprimer le film "<?php echo $movie['Name'] ?>" de l'événement N°<?php echo $IdEvent ?></h3>
<p>Souhaitez-vous retirer ce film de l'événement ? </p>

<table border='0' rules='rows' width='100%'>
	<th> <h2>Nom du film</h2> </th><th> <h2>Date de sortie</h2> </th><th> <h2>Durée</h2> </th>
	<tr>
		<td>
<?php echo $movie['Name'] ?>
		</td>
		<td>
<?php echo($movie['DateOfRelease']); ?>	
		</td>
		<td>
<?php echo($movie['Runtime']); ?>	
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="SuppMovie" value="<?php echo $movie['IdMovie'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Retirer le film">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>