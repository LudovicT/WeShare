	<!--Start of home page-->
	<div id="connexion">
	<h1> Fiche du groupe </h1>
	</br>
	<strong>&nbsp;&nbsp;Identifiant du groupe : </strong><?php echo $group['IdGroup'];?><br /></br>
	<strong>&nbsp;&nbsp;Nom du groupe : </strong><?php echo $group['Name'];?><br /></br>
	<strong>&nbsp;&nbsp;Membres du groupe :</strong>
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
	<strong>&nbsp;&nbsp;Ajouter un membre : </strong></br></br>
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
	<strong></br>&nbsp;&nbsp;Retirer un membre :</strong></br></br>
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
	</br>
		<div class='row-4'>
			<div class='fright2'>
				<ul>
					<li><a href="/WeShare/Groupe/Supprimer/<?php echo $group['IdGroup']?>/" ><em><b> Supprimer le groupe </b></em></a></li>
				</ul>
			</div>
		</div>
	</br></br></br>Attention, cette action est définitive !
	
	</div>
	<!--End of home page-->
	