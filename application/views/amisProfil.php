	<h3>Mes amis</h3>	

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
	<br /><br /><br /><br />
	<h3>Mes demandes d'amis</h3>	
	<?php
	if($friendRequest != -1)
	{
	echo "	<p>
				Vous avez une requête d'ami de la part de ces personnes :
			</p>
			<table>";
		foreach($friendRequest as $key2)
		{
			echo "<tr>
			<td  class='TableAmisProfil'
				<center>
				<a href='/WeShare/Membres/".$key2['Pseudo']."/'>".$key2['Pseudo']."</a>
				</center>
			</td>
			<td width=70px>
				<center>
				<a href='/WeShare/Profil/Amis/Accepter/" .
			$key2['Pseudo'] . "/'><em>Accepter</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
			<a href='/WeShare/Profil/Amis/Refuser/" .
			$key2['Pseudo'] . "/'><em>Refuser</em></a>
				</center>
			</td>
			<td width=70px>
				<center>
			<a href='/WeShare/Profil/Amis/Ignorer/" .
			$key2['Pseudo'] . "/'><em>Ignorer</em></a>  <br />
				</center>
			</td>
			</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "Vous n'avez pas encore de demande d'amis. Ou vous avez déjà répondu à toute les demandes.<br /><br /><br /><br />\n";
	}
	?>