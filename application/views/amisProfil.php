	<h3>Mes amis</h3>	

		<div class='row-4'>
			<div class='fright2'>
				<ul>
					<li><a href="#" onclick="toggle_visibility('friends');"><em><b>Afficher les amis</b></em></a></li>
				</ul>
			</div>
		</div>
		<div id='friends' class='fade' style="display: none; opacity: 0;">
	<?php
	if($friend != -1)
	{
	echo "	<p>
				Vous êtes actuellement amis avec les personnes suivantes :
			</p>
			<table>
			<tr>
				<th>Pseudo</th>
				<th width=150px>
					<center>
						Action
					</center>
				</th>
			</tr>";
		foreach($friend as $key)
		{
			echo "<tr>
			<td  class='TableAmisProfil'>
				<center>
				<a href='/WeShare/Membres/".$key['Pseudo']."/'>".$key['Pseudo']."</a>
				</center>
			</td>
			<td>
				<center>
				<a href='/WeShare/Profil/Amis/Retirer/" .
				$key['Pseudo'] . "/'><em>Supprimer</em></a><br />
				</center>
			</td>
			</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "Vous n'avez pas encore d'amis\n";
	}
	?>
	</div>
	<br /><br /><br /><br />
	<h3>Mes demandes d'amis</h3>
		<div class='row-4'>
			<div class='fright2'>
				<ul>
					<li><a href="#" onclick="toggle_visibility('friendsR');"><em><b>Afficher les demandes d'amis</b></em></a></li>
				</ul>
			</div>
		</div>
		<div id='friendsR' class='fade' style="display: none; opacity: 0;">
	<?php
	if($friendRequest != -1)
	{
		?>
		<p>
			Voici vos demandes d'amis :
		</p>
		<table>
		<?php
		foreach($friendRequest as $key2)
		{?>
			<tr>
			<td  class='TableAmisProfil'>
				<center>
				<a href='/WeShare/Membres/<?php echo $key2['Pseudo']?>/'><?php echo $key2['Pseudo']?></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Accepter/<?php echo $key2['Pseudo']?>/'><em>Accepter</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Refuser/<?php echo $key2['Pseudo']?>/'><em>Refuser</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Ignorer/<?php echo $key2['Pseudo'] ?>/'><em>Ignorer</em></a>  <br />
				</center>
			</td>
			</tr><?php
		}
		?></table>
	<?php
	}
	else
	{
		?>
		Vous n'avez pas encore de demande d'amis. Ou vous avez déjà répondu à toute les demandes.<br /><br /><br /><br />
		<?php
	}
	?>
	</div>
	<br /><br /><br /><br />
	<h3>Mes groupes d'amis</h3>	
	<?php
	if(isset($group) && !empty($group) && $group != -1)
	{
		?>
		<div class='row-4'>
			<div class='fright2'>
				<ul>
					<li><a href="#" onclick="toggle_visibility('group');"><em><b>Afficher les groupes d'amis</b></em></a></li>
					<li><a href='/WeShare/Groupe/Creer/' ><em><b>Créer un groupe d'amis</b></em></a></li>
				</ul>
			</div>
		</div>
		<div id='group' class='fade' style="display: none; opacity: 0;">
		<p>
			Voici vos groupes d'amis :
		</p>
			<table>
			<?php
			foreach($group as $key3)
			{?>
				<tr>
				<td  class='TableAmisProfil'>
					<center>
					<a href='/WeShare/Groupe/<?php echo generateUrl($key3['Name'])."/".$key3['IdGroup']?>/'><?php echo $key3['Name']?></a>
					</center>
				</td>
				</tr><?php
			}
			?></table>
		</div>
		<br /> <br />
	<?php
	}
	else
	{
		?>
		<div class='row-4'>
			<div class='fright2'>
				<ul>
					<li><a href='/WeShare/Groupe/Creer/' ><em><b>Créer un groupe d'amis</b></em></a></li>
				</ul>
			</div>
		</div>
		Vous n'avez pas encore de groupe d'amis.<br /><br />
		</br>
		<?php
	}
	?>