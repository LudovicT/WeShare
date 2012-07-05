<h3>Ajouter un film à l'événement</h3>
<?php
	if ($UserMovies != 0)
	{ ?>
<p>Voici la liste des films que vous possédez : </p>
<table border='0' rules='rows' width='100%'>
	<th> <h2>Nom du film</h2> </th><th> <h2>Synopsis</h2> </th><th> <h2>Durée</h2> </th>
<?php
		foreach($UserMovies as $key)
		{ 
?>
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
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="AddMovie" value="<?php echo $key['IdMovie'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Ajouter le film">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
<?php }?>

</table>
<?php
	}
	else {?>
	<p> Vous n'avez aucun film. <?php } ?>