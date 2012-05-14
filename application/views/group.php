	<!--Start of home page-->
	Identifiant du groupe : <?php echo $group['IdGroup'];?><br />
	Nom du groupe : <?php echo $group['Name'];?><br />
	Membres du groupe :
	<table>
	<tr><th>Pseudo</th></tr>
	<?php
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
	?>
	</table><br />
	Ajouter un membre : 
	<form method="post" action="/WeShare/Groupe/Ajouter/<?php echo $group['IdGroup']?>/">
	<select name='membre' onchange='this.form.submit()'>
	<?php
	foreach($membres as $key)
	{ foreach($groupUser as $key2)
		{
			if ($key['Pseudo'] == $key2['Pseudo'])
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
	<input type='submit' value='Ajouter'>
	</form>
	Retirer un membre :
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
	<input type='submit' value='Retirer'>
	</form>
	<br />
	<form method="post" action="/WeShare/Groupe/Supprimer/<?php echo $group['IdGroup']?>/">
	<input type='submit' value='Suprimer le groupe'> Attention, cette action est définitive !
	</form>
	<!--End of home page-->
	