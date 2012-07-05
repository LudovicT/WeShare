<h3>Vote du film "<?php echo $movie['Name'] ?>" de l'événement</h3>
<p>Vous pouvez voter pour ou contre </p>

<table border='0' rules='rows' width='100%'>
	<th> Nom du film </th><th> Synopsis </th>
	<th> Durée </th><th>Vote</th><th>Action</th>
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
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Voir/<?php echo $IdEvent ?>/">
				<select name="vote">
				<?php
					for($i=0;$i<=10;$i++)
					{
						echo "<option value='$i'>$i</option>";
					}
				?>
				</select>
		</td>
		<td>
					<input type="hidden" name="For" value="<?php echo $movie['IdMovie'] ?>">
					<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
					<input type="submit" value="Voter">
					ou 
					<input type="submit" value="Annuler">
			</form>
	</tr>
</table>

<p> <br />Pour voter pour ce film, choisissez un nombre en <b>0</b> et <b>10</b>,
	<b>0</b> étant "Ne m'intéresse pas" et <b>10</b> étant "Hâte de le voir" </p>