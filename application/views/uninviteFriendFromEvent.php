<h3>D�sinviter "<?php echo $pseudo ?>" de l'�v�nement N�<?php echo $IdEvent ?></h3>
<p>Souhaitez-vous d�sinviter cet ami de l'�v�nement ? </p>

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