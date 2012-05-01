	<!--Start of home page-->
		<div class="add_films"><a href="/WeShare/Films/addFilms/">Ajouter un film</a></div>
	<?php
	if(isset($search[1]) && $search[1] == -1)
	{
		echo "Il n'y a pas de films";
	}
	elseif (isset($search[0][0]['IdMovie']))
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
						<a href='/WeShare/Film/<?php echo (generateUrl($key['Name'])."/".$key['IdMovie']); ?>/'><?php echo $key['Name'] ?></a>
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
	?>
	<!--End of home page-->
