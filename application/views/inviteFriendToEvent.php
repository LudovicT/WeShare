<h3>Inviter des amis à l'événement</h3>
<p>Voici la liste de vos amis que vous pouvez inviter : </p>

<?php
	foreach($UserFriends as $key)
	{ 
?>
<table border='1'>
	<th> Pseudo </th>
	<tr>
		<td>
<?php echo ($key['Pseudo']) ?>
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>/">
				<input type="hidden" name="InviteFriend" value="<?php echo $key['IdUser'] ?>">
				<input type="hidden" name="IdEvent" value="<?php echo $IdEvent ?>">
				<input type="submit" value="Inviter l'ami">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" value="Annuler">
			</form>
		</td>
	</tr>
</table>
<?php } ?>