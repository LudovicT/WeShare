<h3>Désinviter "<?php echo $pseudo ?>" de l'événement N°<?php echo $IdEvent ?></h3>
<p>Souhaitez-vous désinviter cet ami de l'événement ? </p>

<table border='1'>
	<th> Pseudo </th>
	<tr>
		<td>
<?php echo $pseudo ?>
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="UninviteFriend" value="<?php echo $IdUser ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Désinviter l'ami">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>