<div Align="center">
	<div>
		<br />
		<span style="font-family:'georgia';font-size:2.5em;color:#113E6B">
		<b> <?php echo $movieInfo[0]['Name']; ?> </b>
		</span><br /><br />
	</div>
	<div> <!-- css affiche film -->
		<img src="<?php echo $movieInfo[0]['Poster']; ?>" width="300" height="400" />
		<br /><br />
	</div>
		<div id="tab_infos">
			<table width="100%" border="1">
				<tr>
					<td width="50%">
						<!-- requêtes SQL sur les infos du films (titre original, date sortie etc... -->
						<p> 
						<b>Titre original :</b> <?php echo $movieInfo[0]['Name']; ?> <br />
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
						<b>Sortie :</b> <?php echo $movieInfo[0]['DateOfRecord']; ?> <br />
						<b>Durée :</b> 3H <?php //echo $movieInfo[0]['Runtime']; ?> 
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
			<?php echo $movieInfo[0]['Synopsis']; ?>
		<br /><br />
		<div id='blogvision' style='width:540px; height:360px'>
			<object width='100%' height='100%'>
				<param name='movie' value='http://www.allocine.fr/blogvision/19263225'></param>
				<param name='allowFullScreen' value='true'></param><param name='allowScriptAccess' value='always'></param>
				<embed src='http://www.allocine.fr/blogvision/19263225' type='application/x-shockwave-flash' width='100%' height='100%' allowFullScreen='true' allowScriptAccess='always'/>
			</object></div>
		</div>
	<br />