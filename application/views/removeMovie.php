<h3>Supprimer le film "<?php echo $movie['Name'] ?>" de l'événement N°<?php echo $IdEvent ?></h3>
<p>Souhaitez-vous retirer ce film de l'événement ? </p>

<table border='1'>
	<th> Nom du film </th><th> Date de sortie </th>
	<th> Durée </th>
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
	</tr>
</table>
<form id="edit-profile-form" method="post" action="/WeShare/Evenements/View/<?php echo $IdEvent ?>/">
<input type="hidden" name="SuppMovie" value="<?php echo $movie['IdMovie'] ?>">
<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
<input type="submit" value="Retirer le film">
</form>