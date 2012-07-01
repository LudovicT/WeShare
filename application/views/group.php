	<!--Start of home page-->
	</br>
	<strong>Identifiant du groupe : </strong><?php echo $group['IdGroup'];?><br /></br>
	<strong>Nom du groupe : </strong><?php echo $group['Name'];?><br /></br>
	<strong>Membres du groupe :</strong>
	<table>
	<tr><th></th></tr></br></br>
	<?php
	if(isset($groupUser) && $groupUser != -1)
	{
		foreach($groupUser as $user)
		{
		?>
			<tr>
				<td>
					<a href='/WeShare/Membres/<?php echo $user['Pseudo']?>/'><?php echo $user['Pseudo']?></a><br />
				</td>
			</tr>
		<?php
		}
	}
	?>
	</table><br />
	<strong>Ajouter un membre : </strong></br></br>
	<form method="post" action="/WeShare/Groupe/Ajouter/<?php echo $group['IdGroup']?>/">
	<select name='membre' onchange='this.form.submit()'>
	<?php
	foreach($membres as $key)
	{ foreach($groupUser as $key2)
		{
			if (isset($key) && $key['Pseudo'] == $key2['Pseudo'])
			{
				unset($key);
			}
		}
		if(isset($key))
		{
		?>
			<option value='<?php echo $key['IdUser'];?>'>
			<?php echo $key['Pseudo'];?>
			</option>
		<?php 
		}
	} ?>
	</select>
	<input type='submit' class="button2" value='Ajouter'>
	</form>
	<strong></br>Retirer un membre :</strong></br></br>
	<form method="post" action="/WeShare/Groupe/Retirer/<?php echo $group['IdGroup']?>/">
	<select name='membre' onchange='this.form.submit()'>
	<?php
	foreach($groupUser as $key)
	{
		if ($key['IdUser'] == $group['IdCreator'])
		{
			unset($key);
		}
		if(isset($key))
		{?>
			<option value='<?php echo $key['IdUser'];?>'>
			<?php echo $key['Pseudo'];?>
			</option>
		<?php 
		}
	} ?>
	</select>
	<input type='submit' class="button2" value='Retirer'>
	</form>
	<br />
	<form method="post" action="/WeShare/Groupe/Supprimer/<?php echo $group['IdGroup']?>/">
	<input type='submit' class="button2" value='Supprimer le groupe'> Attention, cette action est définitive !
	</form>
	<!--End of home page-->
	