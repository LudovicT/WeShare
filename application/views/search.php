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
			<table border='1' width="100%">
			<th> Jaquette </th><th> Titre </th><th> Synopsie </th><th> Date de sortie </th>
			<?php
			foreach($search[0] as $key)
			{
			?>
				<tr>
				<td width="15%">
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
					<td width="15%">
						<a href='/WeShare/Film/<?php echo $key['Name']; ?>/'><?php echo $key['Name'] ?></a>
					</td>
					<td width="55%">
						<?php echo $key['Synopsis'] ?>
					</td>
					<td width="15%">
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
			<table border='1' width="100%">
			<th> Photographie </th><th> Nom </th><th> Description </th><th> Date de naissance </th>
			<?php
			foreach($search[1] as $key)
			{
			?>
				<tr>
				<td width="15%">
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
					<td width="15%">
						<a href='/WeShare/Film/<?php echo $key['LastName']; ?>/'><?php echo $key['FirstName']." ".$key['LastName'] ?></a>
					</td>
					<td width="55%">
						<?php echo $key['Bio'] ?>
					</td>
					<td width="15%">
						<?php echo formateDate($key['BornDate']) ?>
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
	