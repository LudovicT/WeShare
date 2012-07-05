<h3>Modifier l'événement</h3>
<p>Ici vous pouvez modifier l'événement : </p>

	<table width='60%' border='1' rules='none' cellspacing='12' style='margin-left:200px'>
		<tr>
			<td width='35%'>
			<h2>Date de l'événement : 
			</td>
			<td>
			<?php echo formateDate($event['DateOfEvent']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Adresse : 
			</td>
			<td>
			<?php echo($event['Address']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Ville : 
			</td>
			<td>
			<?php echo($event['City']); ?>
			</td>
		</tr>
		<tr>
			<td>
			<h2>Date de création : 
			</td>
			<td>
			<?php echo(formateDate($event['CreationDate'])); ?>
			</td>
		</tr>
	</table>
<br /><br />	
<strong>Pour modifier l'événement ci-dessus, veuillez insérer les nouvelles informations :</strong><br />
<br /><br />
<div id="connexion">
	<h1>Modifier l'événement</h1>
		<form method="post" action="/WeShare/Evenements/Manage/<?php echo ($event['IdEvent']);?>/">
			<p><label>Date de l'événement :</label><input type="text" onkeyup='validate(this,0)' name="modifiy_DateOfEvent" id="DateOfEvent" value="<?php echo(formateDate($event['DateOfEvent'])); ?>"/><br /><small>Sous le format jj/mm/aaaa</small></p>
			<p><label>Adresse Postale :</label><input type="text" id='address' onkeyup='validate(this,0)' name="modify_Address" value="<?php echo($event['Address']); ?>"/>
					<br /><small>Utiliser votre addresse<input type='checkbox' onclick='info(this)' id='ownAddress' value='address'></small></p>
			<p><label>Ville :</label><input type="text" id='city' onkeyup='validate(this,0)' name="modify_City" value="<?php echo($event['City']); ?>"/>
					<br /><small>Utiliser votre addresse<input type='checkbox' onclick='info(this)' id='ownCity' value='city'></small></p>
			<p><input type="hidden" name="EditEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Modifier l'événement"></p>
		</form>
</div>