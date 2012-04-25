	<!--Start of home page-->
	<?php
	if(isset($search[1]) && $search[1] == -1 && isset($search[3]) && $search[3] == -1)
	{
	?>
		<div id='NoResult'>
			Votre recherche n'a retourné aucun résultat.
		</div>
	<?php
	}
	else
	{
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
		if (isset($search[1][0]['IdStaff']))
		{
			?>
			<table border='1'>
			<th> Photographie </th><th> Nom </th><th> Date de naissance </th><th> Description </th>
			<?php
			foreach($search[1] as $key)
			{
			?>
				<tr>
				<td>
				<img id='PhotoProfil' src='<?php
					if(!empty($key['Picture']))
					{
						echo $key['Picture'];
					}
					else
					{
						echo DIR_PUBLICS."/images/vide.gif"; 
					}
					?>'>
				</td>
					<td>
						<a href='/WeShare/Film/<?php echo $key['LastName']; ?>/'><?php echo $key['FirstName']." ".$key['LastName'] ?></a>
					</td>
					<td>
						<?php echo formateDate($key['BornDate']) ?>
					</td>
					<td>
						<?php echo $key['Bio'] ?>
					</td>
				</tr>
			<?php
			}
			?>
			</table>
			<?php
		}
	}
	?>
	<!--End of home page-->
	