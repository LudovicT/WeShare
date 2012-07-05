<h3>Désinviter "<?php echo $pseudo ?>" de l'événement</h3>
<p>Souhaitez-vous désinviter cet ami de l'événement ? </p>

<table border='0' rules='rows' width='100%'>
	<th> <h2>Pseudo</h2> </th>
	<tr>
		<td>
<?php echo $pseudo ?>
		</td>
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