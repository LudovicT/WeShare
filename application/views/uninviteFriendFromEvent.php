<h3>D�sinviter "<?php echo $pseudo ?>" de l'�v�nement</h3>
<p>Souhaitez-vous d�sinviter cet ami de l'�v�nement ? </p>

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
				<input type="submit" value="D�sinviter l'ami">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>