<h3>Inviter des amis à l'événement</h3>

<?php
if ($UserFriends != -1)
{
?> <p>Voici la liste de vos amis que vous pouvez inviter : </p>
<table border='0' rules='rows' width='100%'>
	<th> <h2>Pseudo</h2> </th> <?php
	foreach($UserFriends as $key)
	{ 
?>
	<tr>
		<td>
<?php echo ($key['Pseudo']) ?>
		</td>
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
<?php } ?> 
</table>
<?php } else { ?> <p> Vous n'avez aucun ami. <?php } ?>