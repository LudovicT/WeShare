<h3>Modifier l'�v�nement</h3>
<p>Ici vous pouvez modifier l'�v�nement : </p>

<table border='1'>
	<th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Date de cr�ation </th>
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
<strong>Pour modifier l'�v�nement ci-dessus, veuillez ins�rer les nouvelles donn�es :</strong><br />
Par d�faut, les actuelles valeurs sont mises, donc ne changez que celles que vous voulez changer.
<br /><br />
<div class="indent2">
		<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Manage/<?php echo ($event['IdEvent']);?>/">	
				<fieldset>
					<div class="field"><label>Date de l'�v�nement :</label><input type="text" name="modifiy_DateOfEvent" id="DateOfEvent" value="<?php echo($event['DateOfEvent']); ?>"/> YYYY-MM-DD</div><br />
					<div class="field"><label>Adresse Postale	 :</label><input type="text" name="modify_Address" value="<?php echo($event['Address']); ?>"/></div><br />
					<div class="field"><label>Ville :</label><input type="text"  name="modify_City" value="<?php echo($event['City']); ?>"/></div><br />
					<input type="hidden" name="EditEvent" value="<?php echo $event['IdEvent'] ?>">
					<div class="wrapper"><input type="submit" value="Modifier l'�v�nement"></div>
				</fieldset>
		</form>
</div>