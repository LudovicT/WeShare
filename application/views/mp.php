<table border='0' rules='cols' width='100%'>
	<tr>
		<td width='15%' valign='top'>
		<table width='100%'>
			<tr>
				<td>
					<ol>
						<li><a href='/weshare/profil/messagerie/0'>Boîte de réception</a></li>
						<li><a href='/weshare/profil/messagerie/1'>Éléments envoyés</a></li>
						<br /><hr><br />
						<li><a href='/weshare/profil/messagerie/nouveau'>Envoyer un message</a></li>
					</ol>
				</td>
			</tr>
		</table>
		</td>
		<td width='85%'>
		<div class='padLeft'>
			<?php
			if(isset($mpInfo) && $mpInfo != -1)
			{
			$i = 0;
			if(isset($mpInfo[0]['mpUser'][0]['Pseudo'])) //detection boite réception ou boite envoie
			{
			?>
				<h3>Boite d'envoie</h3>
			<?php
			}
			else
			{
			?>
				<h3>Boite de réception</h3>
			<?php
			}
			foreach($mpInfo as $key)
			{
				if($i > 0)
				{
					echo "<hr>";
				}
				$i++;
				?>
				<ol>
					<div class='Titre'>Objet :
					<a href='/weshare/profil/messagerie/lire/<?php echo $key['IdPM']?>'><?php echo $key['Titre']?></a></div>
					<div class='rightAlign'>
					<a href='/weshare/profil/messagerie/supprimer/<?php echo $key['IdPM']?>'>Supprimer</a></div>
					<br /><hr width='40%'>
					<li>
					<?php
					if(isset($key['mpUser'][0]['Pseudo']))
					{
						echo "Envoyé à : ";
						foreach($key['mpUser'] as $key2)
						{
							echo $key2['Pseudo']." ";
						}
					}
					else
					{
						echo "Envoyé par : ";
						echo $key['mpUser'];
					}?>
					</li>
				</ol><br />
			<?php }
			}
			elseif(isset($mp) && $mp !=-1)
			{ ?>
			<table border='0' width='100%'>
				<tr>
					<td class='messageTop'>
					<?php echo formateDateTime($mp['MessageDate'])." - ".$mpSender ;?>
					</td>
				</tr>
				<tr>
					<td>
					<div class='Titre'>
					<?php echo $mp['Titre']; ?>
					</div>
					<br />
					<hr>
					<br />
					<?php echo $mp['Message']; ?>
					</td>
				</tr>
			</table>
			<?php
			}
			elseif(isset($newMp) && $newMp != -1)
			{ ?>
			<form method="post" action="/weshare/profil/messagerie/nouveau">
			<table width='100%'>
			<?php
			if(isset($mpFlag) && $mpFlag == 1)
			{?>
			<tr>
				<td>Destinataires:
					Les erreurs suivantes sont survenues quand ce message a été envoyé <br /><br />
					Les utilisateurs suivants n'ont pas été trouvés :
				</td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td>Destinataires:
				</td>
			</tr>
			<tr>
				<td><textarea name='users' rows='1' cols='80' class='textarea' wrap="hard"></textarea>
				</td>
			</tr>
			<tr>
				<td>Séparez chaque identifiant par un point-virgule « ; »<br /><br /><hr>
				</td>
			</tr>
			<tr>
				<td><br />Titre du message :
				</td>
			</tr>
			<tr>
				<td><textarea name='titre' rows='1' cols='80' class='textarea' wrap="hard"></textarea><br /><br /><hr>
				</td>
			</tr>
			<tr>
				<td><br />Message :
				</td>
			</tr>
			<tr>
				<td><textarea name='message' rows='5' cols='80' class='textarea2' wrap="hard"></textarea><br /><br />
				</td>
			</tr>
			<tr>
				<td><input type='submit' value='Envoyer le message'>
				</td>
			</tr>
			</table>
			</form>
			<?php 
			} ?>
			</div>
		</td>
	</tr>
</table>
<?php
?>