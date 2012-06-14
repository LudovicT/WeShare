<h3>Ajouter un film à l'événement N°<?php echo $IdEvent ?></h3>
<p>Voici la liste des films que vous possédez : </p>

<?php
	foreach($UserMovies as $key)
	{ 
?>
<table border='1'>
	<th> Nom du film </th><th> Synopsis </th>
	<th> Durée </th>
	<tr>
		<td>
<?php echo ($key['Name']) ?>
		</td>
		<td>
<?php echo($key['Synopsis']); ?>	
		</td>
		<td>
<?php echo($key['Runtime']); ?>	
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="AddMovie" value="<?php echo $key['IdMovie'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Ajouter le film">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="hidden" name="Cancel" value="<?php echo $event['IdEvent'] ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>
<?php } ?>