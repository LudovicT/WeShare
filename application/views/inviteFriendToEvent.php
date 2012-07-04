<h3>Inviter des amis à l'événement</h3>

<?php
if ($UserFriends != -1)
{
?> <p>Voici la liste de vos amis que vous pouvez inviter : </p> <?php
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
				<input type="submit" class="button2" value="Inviter l'ami">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo $IdEvent ?>">
				<input type="submit" class="button2" value="Annuler">
			</form>
		</td>
	</tr>
</table>
<?php } 
} else {?> <p> Vous n'avez aucun ami. <?php } ?>