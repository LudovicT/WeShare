	<!--Start of home page-->
		<div class="add_films"><a href="/WeShare/Profil/Films/addFilms/">Ajouter un film</a></div>
	<?php
	if(isset($search[1]) && $search[1] == -1)
	{
		echo "Il n'y a pas de films";
	}
	elseif (isset($search[0][0]['IdMovie']))
		{
			?>
			<table border='1' width="100%">
			<th> Titre </th><th> Support disponible </th> <th> Supprimer </th>
			<?php
			foreach($search[0] as $key)
			{
			?>
				<tr>
					<td width="30%">
						<a href='/WeShare/Profil/Films/<?php echo (generateUrl($key['Name'])."/".$key['IdMovie']); ?>/'><?php echo $key['Name'] ?></a>
					</td>
					<td width="40%">
						<?php echo $key['$movieSupport'] ?>
					</td>
					<td width="30%">
					<a href='/WeShare/Profil/Films/Supprimer/<?php echo ($key['IdMovie']); ?>/'><em>Supprimer</em></a><br />
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
