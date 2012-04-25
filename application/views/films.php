<?php
if (isset($search[0][0]['IdMovie']))
		{
			?>
			<table border='1'>
			<th> Jaquette </th><th> Titre </th><th> Synopsie </th><th> Date de sortie </th>
			<?php
			foreach($search[0] as $key)
			{
			?>
				<tr>
				<td>
				<img id='PhotoProfil' src='<?php
					if(!empty($key['Poster']))
					{
						echo $key['Poster'];
					}
					else
					{
						echo DIR_PUBLICS."/images/vide.gif"; 
					}
					?>'>
				</td>
					<td>
						<a href='/WeShare/Film/<?php echo $key['Name']; ?>/'><?php echo $key['Name'] ?></a>
					</td>
					<td>
						<?php echo $key['Synopsis'] ?>
					</td>
					<td>
						<?php echo $key['DateOfRecord'] ?>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
			<?php
		}
?>