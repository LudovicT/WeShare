<div Align="center">
	<div>
		<br />
		<span style="font-family:'georgia';font-size:2.5em;color:#113E6B">
		<b> <?php echo $movieInfo['Name']; ?> </b>
		</span><br /><br />
	</div>
	<div> <!-- css affiche film -->
		<img src="<?php echo $movieInfo['Poster']; ?>" width="300" height="400" />
		<br /><br />
	</div>
		<div id="tab_infos">
			<table width="100%" border="1">
				<tr>
					<td width="50%">
						<!-- requêtes SQL sur les infos du films (titre original, date sortie etc... -->
						<p> 
						<b>Titre original :</b> <?php echo $movieInfo['Name']; ?> <br />
						<b>Réalisateur : </b>
						<?php
						if($movieStaff != false)
						{
							$i = 0;
							$espaceo = "";
							$espacef = "";
							foreach($movieStaff as $key)
							{
								if($key['StaffWork'] == "realisateur")
								{
									echo "<a href='/WeShare/Personne/".generateUrl($key['FirstName']." ".$key['LastName'])."/".$key['IdStaff']."/'>".
									$espaceo.$key['FirstName']." ".$key['LastName']."</a>".$espacef."<br />";
									$i++;
								}
								if($i == 1)
								{
									$espaceo = "<span class='staff2'>";
									$espacef = "</span>";
								}
							}
							if($i == 0)
							{
								echo "<br />";
							}
						}
						else
						{
							echo "<br />";
						}
						?>
						<b>Acteurs : </b>
						<?php
						if($movieStaff != false)
						{
							$i = 0;
							$espaceo = "";
							$espacef = "";
							foreach($movieStaff as $key)
							{
								if($key['StaffWork'] == "acteur")
								{
									echo "<a href='/WeShare/Personne/".generateUrl($key['FirstName']." ".$key['LastName'])."/".$key['IdStaff']."/'>".
									$espaceo.$key['FirstName']." ".$key['LastName']."</a>".$espacef."<br />";
									$i++;
								}
								if($i == 1)
								{
									$espaceo = "<span class='staff3'>";
									$espacef = "</span>";
								}
							}
						}
						else
						{
							echo "<br />";
						}
						?>
						<b>Sortie :</b> <?php echo $movieInfo['DateOfRelease']; ?> <br />
						<b>Durée :</b> <?php echo $movieInfo['Runtime']; ?> 
						</p>
					</td> 
					<td width="50%">
						<!-- requêtes SQL sur le support (physique et format) langues et sous-titres) -->
						<p>
						Support (Quantité disponible): <br />
						<?php
						if($movieSupport != false)
						{
							foreach($movieSupport as $key)
							{
								echo $key['Support']." (".$key['Quantity'].")<br />";
							}
						}
						else
						{
							echo "<br />";
						}
						?>
						</p>
					</td>
				</tr>
			</table>
		</div>
		<br /><br />
			<?php echo $movieInfo['Synopsis']; ?>
		<br /><br />
		</div>
	<br />