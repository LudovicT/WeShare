<h3>Vote du film "<?php echo $movie['Name'] ?>" de l'événement N°<?php echo $IdEvent ?></h3>
<p>Vous pouvez voter pour ou contre </p>

<table border='1'>
	<th> Nom du film </th><th> Synopsis </th>
	<th> Durée </th>
	<tr>
		<td>
<?php echo $movie['Name'] ?>
		</td>
		<td>
<?php echo($movie['Synopsis']); ?>	
		</td>
		<td>
<?php echo($movie['Runtime']); ?>	
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="For" value="<?php echo $movie['IdMovie'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Voter POUR ce film">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="Against" value="<?php echo $movie['IdMovie'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Voter CONTRE ce film">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>