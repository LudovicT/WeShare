	<!--Start of home page-->
	</br></br>
		<div class="add_films"><a href="/WeShare/Films/addFilms/" class="button2">Ajouter un Film</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/WeShare/Films/addStaff/" class="button2">Ajouter un membre au Casting</a></div></br></br>

	<?php
	if(isset($search[1]) && $search[1] == -1)
	{
		echo "Il n'y a pas de films";
	}
	elseif (isset($search[0][0]['IdMovie']))
		{
			?>
			<table border='0' width="100%" rules='rows'>
			<th> Jaquette </th><th> Titre </th><th> Synopsis </th><th> Date de sortie </th> <th> Editer un film </th> <th> Supprimer </th> 
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
					<td width="40%">
						<?php echo $key['Synopsis'] ?>
					</td>
					<td width="10%">
						<?php echo $key['DateOfRelease'] ?>
					</td>
					<td width="10%">
					<a href='/WeShare/Films/EditerFilm/<?php echo (generateUrl($key['Name'])."/".$key['IdMovie']); ?>/' class="buttonEdit"><em>Editer</em></a><br />
					</td>
					<td width="10%">
					<a href='/WeShare/Films/Suppression/<?php echo ($key['IdMovie']); ?>/' class="buttonDelete"><em>Supprimer</em></a><br />
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
