	<!--Start of home page-->
	</br></br>
	<div class='row-4'>
		<div class='fright2'>
			<ul>
				<li><a href="/WeShare/Films/addFilms/"><em><b>Ajouter un Film</b></em></a></li>
				<li><a href="/WeShare/Films/addStaff/"><em><b>Ajouter un membre au casting</b></em></a></li>
			</ul>
		</div>
	</div>

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
							echo DIR_PUBLICS."/images/movie_pic/".$key['Poster'];
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
					<div class='row-4'>
						<div class='fright2'>
							<ul>
								<li><a href='/WeShare/Films/EditerFilm/<?php echo (generateUrl($key['Name'])."/".$key['IdMovie']); ?>/'><em><b>Editer</b></em></a></li>
							</ul>
						</div>
					</div>
					</td>
					<td width="10%">
					<div class='row-4'>
						<div class='fright2'>
							<ul>
								<li><a href='/WeShare/Films/Suppression/<?php echo ($key['IdMovie']); ?>/'><em><b>Supprimer</b></em></a></li>
							</ul>
						</div>
					</div>
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
