<table border='1' width='100%'>
	<tr>
		<td width='15%'>
			<ol>
				<li><a href='/weshare/profil/messagerie/0'>Boîte de réception</a></li>
				<li><a href='/weshare/profil/messagerie/1'>Éléments envoyés</a></li>
				<br /><hr><br />
				<li><a href='/weshare/profil/messagerie/nouveau'>Envoyer un message</a></li>
			</ol>
		</td width='85%'>
		<td>
			<?php
			if(isset($mpInfo) && $mpInfo != -1)
			{
			$i = 0;
			foreach($mpInfo as $key)
			{
				if($i > 0)
				{
					echo "<hr>";
				}
				$i++;
				?>
				<ol>
					<div class='Titre'>
					<li><a href='/weshare/profil/messagerie/lire/<?php echo $key['IdPM']?>'><?php echo $key['Titre']?></a></li>
					</div>
					<li><?php
					if(isset($key['mpUser'][0]['Pseudo']))
					{
						foreach($key['mpUser'] as $key2)
						{
							echo $key2['Pseudo']." ";
						}
					}
					else
					{
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
			<table>
			<!--Les erreurs suivantes sont survenues quand ce message a été envoyé

    Les utilisateurs suivants n'ont pas été trouvés :

-->
			<tr>
				<td>Destinataires:
				</td>
			</tr>
			<tr>
				<td><textarea name='users' rows='1' cols='80' class='textarea'></textarea>
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
				<td><textarea name='titre' rows='1' cols='80' class='textarea2'></textarea><br /><br /><hr>
				</td>
			</tr>
			<tr>
				<td><br />Message :
				</td>
			</tr>
			<tr>
				<td><textarea name='message' rows='5' cols='80' class='textarea3'></textarea><br /><br />
				</td>
			</tr>
			<tr>
				<td><input type='submit' value='Envoyer le message'><br /><br /><hr>
				</td>
			</tr>
			</table>
			</form>
			<?php 
			} ?>
		</td>
	</tr>
</table>
<?php
var_dump($_POST);
?>