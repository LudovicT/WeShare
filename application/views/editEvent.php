<h3>Modifier l'événement</h3>
<p>Ici vous pouvez modifier l'événement : </p>

<table border='1'>
	<th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th>
	<tr>
		<td>
<?php echo($event['DateOfEvent']); ?>	
		</td>
		<td>
<?php echo($event['Address']); ?>	
		</td>
		<td>
<?php echo($event['City']); ?>	
		</td>
		<td>
<?php echo($event['CreationDate']); ?>	
		</td>
	</tr>
</table>
<br /><br />	
<strong>Pour modifier l'événement ci-dessus, veuillez insérer les nouvelles données :</strong><br />
Par défaut, les actuelles valeurs sont mises, donc ne changez que celles que vous voulez changer.
<br /><br />
<div class="indent2">
		<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo ($event['IdEvent']);?>/">	
				<fieldset>
					<div class="field"><label>Date de l'événement :</label><input type="text" name="modifiy_DateOfEvent" id="DateOfEvent" value="<?php echo($event['DateOfEvent']); ?>"/> YYYY-MM-DD</div><br />
					<div class="field"><label>Adresse Postale	 :</label><input type="text" name="modify_Address" value="<?php echo($event['Address']); ?>"/></div><br />
					<div class="field"><label>Ville :</label><input type="text"  name="modify_City" value="<?php echo($event['City']); ?>"/></div><br />
					<input type="hidden" name="EditEvent" value="<?php echo $event['IdEvent'] ?>">
					<div class="wrapper"><input type="submit" value="Modifier l'événement"></div>
				</fieldset>
		</form>
</div>