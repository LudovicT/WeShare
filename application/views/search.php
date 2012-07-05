	<!--Start of home page-->
	<?php
	if(isset($search[0]) && empty($search[0]) && isset($search[1]) && empty($search[1]))
	{
	?>
	<div id='home'>
		<h2>
			Votre recherche n'a retourné aucun résultat.
		</h2>
	</div>
	<?php
	}
	else
	{
		if (isset($search[0][0]['IdMovie']))
		{
			if(isset($search[0][0]['Support']))
			{
				echo "<h3>Films disponibles selon leur support recherché sur le terme ' ".$_POST['mot']." '</h3><br/>";
			}
			else
			{
				if(isset($_POST['mot']) && $_POST['mot'])
					echo "<h3> Films qui correspondent à votre recherche ' ".$_POST['mot']." '</h3>";
				else
					echo "<h3> Films qui correspondent à votre recherche </h3>";
			}
			?>
			<div class='row-4'>
				<div class='fright2'>
					<ul>
						<li><a href="#" onclick="toggle_visibility('movieList');"><em><b>Cacher/afficher les films</b></em></a></li>
					</ul>
				</div>
			</div>
			<div id='movieList' class='fade' style="display: block; opacity: 1;">
			<table border='0' rules='rows' width='100%'>
			<th> <h2>Jaquette</h2> </th><th width='1%'></th><th> <h2>Titre <?php
			if(isset($search[0][0]['Exemplaires']))
			{
				echo "(exemplaires)";
			}
			?></h2></th><th width='1%'></th><th> <h2>Synopsie</h2> </th><th width='1%'></th><th> <h2>Date de sortie</h2> </th>
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
				<td width="1%">
				</td>
					<td width="15%">
						<a href='/WeShare/Film/<?php echo (generateUrl($key['Name'])."/".$key['IdMovie']); ?>/'><?php echo $key['Name'] ?></a><?php
						if(isset($key['Exemplaires']))
						{
							echo " ($key[Exemplaires] $key[Support])";
						}
						?>
					</td>
				<td width="1%">
				</td>
					<td width="55%">
						<?php echo $key['Synopsis'] ?>
					</td>
				<td width="1%">
				</td>
					<td width="15%">
						<?php echo $key['DateOfRelease'] ?>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
		</div><br /><br /><br /><br />
			<?php
		}
		if (isset($search[1][0]['IdStaff']))
		{?><?php
				if(isset($_POST['mot']) && $_POST['mot'])
					echo "<h3> Acteurs/Réalisateurs qui correspondent à votre recherche ' ".$_POST['mot']." '</h3>";
				else
					echo "<h3> Acteurs/Réalisateurs qui correspondent à votre recherche </h3>";
					?>
			<div class='row-4'>
				<div class='fright2'>
					<ul>
						<li><a href="#" onclick="toggle_visibility('staff');"><em><b>Cacher/afficher le casting des films</b></em></a></li>
					</ul>
				</div>
			</div>
			<div id='staff' class='fade' style="display: block; opacity: 1;">
			<table border='0' rules='rows' width='100%'>
			<th> <h2>Photographie</h2> </th><th width='1%'></th><th> <h2>Nom</h2> </th><th width='1%'></th><th> <h2>Biographie</h2> </th><th width='1%'></th><th> <h2>Date de naissance</h2> </th>
			<?php
			foreach($search[1] as $key)
			{
			?>
				<tr>
				<td width="15%">
				<img id='PhotoProfil' src='<?php
					if(!empty($key['Picture']))
					{
						echo DIR_PUBLICS."/images/staff_pic/".$key['Picture'];
					}
					else
					{
						echo DIR_PUBLICS."/images/vide.gif"; 
					}
					?>'>
				</td>
				<td width="1%">
				</td>
					<td width="15%">
						<a href='/WeShare/Personne/<?php echo generateUrl($key['FirstName']." ".$key['LastName'])."/".$key['IdStaff']; ?>/'><?php echo $key['FirstName']." ".$key['LastName'] ?></a>
					</td>
				<td width="1%">
				</td>
					<td width="55%">
						<?php echo $key['Bio'] ?>
					</td>
				<td width="1%">
				</td>
					<td width="15%">
						<?php echo formateDate($key['BornDate']) ?>
					</td>
				</tr>
			<?php
			}
			?>
			</table>
			</div><br/><br/><br/><br/>
			<?php
		}
	}
	?>
	<!--End of home page-->
	