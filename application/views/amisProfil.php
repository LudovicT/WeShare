	<h3>Mes amis</h3>	

	<?php
	if($friend != -1)
	{
	echo "	<p>
				Vous �tes actuellement amis avec les personnes suivantes :
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
	<br /><br /><br /><br />
	<h3>Mes demandes d'amis</h3>	
	<?php
	if($friendRequest != -1)
	{
		?>
		<p>
			Voici vos groupes d'amis :
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
		Vous n'avez pas encore de demande d'amis. Ou vous avez d�j� r�pondu � toute les demandes.<br /><br /><br /><br />
		<?php
	}
	?>
	<br /><br /><br /><br />
	<h3>Mes groupes d'amis</h3>	
	<?php
	if($friendRequest != -1)
	{
		?>
		<p>
			Voici vos groupes d'amis :
		</p>
		<table>
		<?php
		foreach($friendRequest as $key3)
		{?>
			<tr>
			<td  class='TableAmisProfil'>
				<center>
				<a href='/WeShare/Membres/<?php echo $key3['Pseudo']?>/'><?php echo $key3['Pseudo']?></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Accepter/<?php echo $key3['Pseudo']?>/'><em>Accepter</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Refuser/<?php echo $key3['Pseudo']?>/'><em>Refuser</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Ignorer/<?php echo $key3['Pseudo'] ?>/'><em>Ignorer</em></a>  <br />
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
		Vous n'avez pas encore de groupe d'amis. Ou vous avez �t� expuls� comme un gros rat�.<br /><br /><br /><br />
		<?php
	}
	?>